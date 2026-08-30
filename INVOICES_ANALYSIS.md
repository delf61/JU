# Invoices Migration Analysis (Kniha vyšlých/došlých faktúr)

## 1. Tables and Primary Keys

The legacy FAND database uses composite keys for invoices and their items based on the fields `a` and `b`.

* `kp` (Kniha pohľadávok / Outgoing Invoices)
  * Represents header of an outgoing invoice (receivable).
  * Unique Identifier / PK: Composite of `a` (Date) and `b` (String, internal marking / invoice number).
  * FAND definition: `#K @ a,~b;`
* `kz` (Kniha záväzkov / Incoming Invoices)
  * Represents header of an incoming invoice (liability).
  * Unique Identifier / PK: Composite of `a` (Date) and `b` (String, internal marking / invoice number).
  * FAND definition: `#K @ a,~b;`
* `kppol` (Kniha pohľadávok položky / Outgoing Invoice Items)
  * Represents items of an outgoing invoice.
  * Unique Identifier / PK: Composite of `c` (Date), `d` (String) - representing parent `kp` invoice, and `intkodtov` (Int) - internal item code.
  * *Correction from source*: Wait, the primary key of `kppol` is `#K @ c,~d, intkodtov;`. The fields `a` and `b` are also present (used for referencing a KZ if this item is somehow linked to a liability). But it clearly states `Kp c,d;` meaning `c` and `d` map to `kp.a` and `kp.b`.
* `kzpol` (Kniha záväzkov položky / Incoming Invoice Items)
  * Represents items of an incoming invoice.
  * Unique Identifier / PK: Composite of `a` (Date), `b` (String), and `intkodtov` (Int).
  * FAND definition: `#K @ a,b, intkodtov;`
* `platby` (Evidencia platieb / Payments)
  * Contains recurring/scheduled payments (especially for Property Management).
  * Not purely an invoice table but handles liabilities (`záväzky`).
* `uhrady` (Evidencia úhrad / Settlements)
  * Contains payments made against `kp` or `kz`.
  * Unique Identifier / PK: Composite of `a` (Date) and `b` (String).
  * FAND definition: `#K @ * a,~b;` (indicates it might be non-unique or duplicate key `*`, need to verify).

## 2. Relationships

* `kppol` to `kp`: `kppol.c = kp.a` AND `kppol.d = kp.b`
* `kzpol` to `kz`: `kzpol.a = kz.a` AND `kzpol.b = kz.b`
* `kp` to `partner`: `kp.KODOP = partner.kodop` (In the `kp` schema it is `KODOP:F,3.0`)
* `kz` to `partner`: `kz.kodOP = partner.kodop` (In the `kz` schema it is `kodOP:F,3.0`)
* `uhrady` to `kp`: `uhrady.a = kp.a` AND `uhrady.b = kp.b` AND `uhrady.prirad_kp = true` (or via fields `a,b` when `prirad_kp` is set)
* `uhrady` to `kz`: `uhrady.a = kz.a` AND `uhrady.b = kz.b` AND `uhrady.prirad_kz = true` (or via fields `a,b` when `prirad_kz` is set)

## 3. Invoice Totals and Status Rules

* `kp` (Outgoing):
  * `z`: Amount without tax
  * `pc`: Paid amount
  * `dph`: VAT percentage
  * Amount calculations depend on year (pre-2009 SKK, post-2009 EUR).
  * `uhrady`: Seems to be a boolean/int flag for payment status. `uhrady_s := str(uhrady,'_') : A,1;`
* `kz` (Incoming):
  * `x`: Amount without tax (0% VAT)
  * `y`: Amount without tax (up to 15% VAT)
  * `z`: Amount without tax (over 15% VAT)
  * `pc`: Paid amount
  * `dph`: VAT percentage (over 15%)
  * `dph_1`: VAT percentage (up to 15%)

## 4. Unverified Items

* Meaning of `kp.uhrady` flag values.
* Exact interaction of `platby` table with normal invoices.

## 5. Settlement / Status flags logic
The legacy system calculates total invoice amount (`zn`) and compares it to paid amount (`uhrada` or `pc`).
The status character `uhr` is defined dynamically in `#C` logic:

* For `kp` (Outgoing):
  * `zn := z + DPH_Sk + vyrovn` (Total = Net + VAT + Adjustment)
  * `uhrada := pc`
  * Status logic:
    ```
    Uhr := cond ( today - a > 3 * 365 | (zn = uhrada & z<>0) |
    (zn = uhrada & zn=0 & zamok='a') |
    (zn= 0 & today - a > 30) : '■',
    uhrada=0 : '', zn > uhrada : '<', else : '>') : A,1;
    ```
    - `■` means fully paid (or archived/closed due to age > 3 years, etc).
    - empty string means `0` paid.
    - `<` means partially paid (`zn > uhrada`).
    - `>` means overpaid (`zn <= uhrada` but not exactly equal / matching other conditions).

* For `kz` (Incoming):
  * `zn_x := x`
  * `zn_y := y + DPH_Sk1`
  * `zn_z := z + DPH_Sk`
  * `zn := zn_x + zn_y + zn_z`
  * `uhrada := pc`
  * Status logic:
    ```
    Uhr   := cond (uhrada=0 : '', zn = uhrada : '■', zn > uhrada : '<', else : '>') : A,1;
    ```
    - `■` means fully paid.
    - empty string means `0` paid.
    - `<` means partially paid.
    - `>` means overpaid.

Note: In `kz`, the actual character used for fully paid might be `■` (represented as `?` in some text encodings depending on code page). The analysis confirms the meaning: `<` is partial, `■` or `?` is full, `>` is overpaid.

## 6. Implementation Plan for CodeIgniter 4
*   **Models**: `KpModel`, `KppolModel`, `KzModel`, `KzpolModel`, `PlatbyModel`, `UhradyModel`. The legacy tables don't have standard primary keys, but composite keys. We will configure models with `returnType = 'array'` and query them using standard Query Builder for composite keys since CI4 `Model` strictly expects single-column primary keys.
*   **Services**: `InvoiceService` to abstract away the composite keys (`a`, `b`) and unify reading/writing invoices and items.
*   **Controllers**: `ReceivableController` (`kp`) and `LiabilityController` (`kz`), delegating to `InvoiceService`.
