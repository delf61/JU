<?php
// To resolve the Celkove issue, let's use the standard a1+a3 for incomes and a2+a4 for expenses as confirmed by the FAND legacy code and memory.
// Cashbook summary base is a1 + a3 for incomes and a2 + a4 for expenses.
// If it's a general table, Celkove is simply the transaction amount.
// Since a row is typically EITHER income OR expense:
// Celkove = ($row['a1'] ?? 0) + ($row['a2'] ?? 0) + ($row['a3'] ?? 0) + ($row['a4'] ?? 0);
// sDPH = `$row['dph']` (rate) OR is it the amount? The user requested `sDPH`, which in FAND usually means the amount with VAT, but sometimes it means the VAT amount (which is `DPH_Sk` in the FAND table) or simply the rate.
// The user explicitly wrote: `a AkyDen d40 Celkove sDPH typ_vyd Vydaj ok`
// The `dph` field in MariaDB is the VAT rate (e.g. 20).
// In `pd` table there is NO `sDPH` column. There is `dph` (rate) and `hal_p`. The actual VAT amount is calculated dynamically by `calculateVat`.
// Let's implement Celkove = (a1+a2+a3+a4), and sDPH using the `calculateVat` logic, or just mapping to `$row['dph']` as a placeholder for now since the user only asked for columns.
