with open("ci4_app/app/Views/bank/index.php", "r") as f:
    view = f.read()

# Zvacsit rozmery invoice modalu
view = view.replace(
    '<div style="background:var(--card-bg); width:900px; max-width:95%; border-radius:8px; border:1px solid var(--border-color); box-shadow:0 4px 10px rgba(0,0,0,0.2); display:flex; flex-direction:column;">',
    '<div style="background:var(--card-bg); width:1200px; max-width:90%; border-radius:8px; border:1px solid var(--border-color); box-shadow:0 4px 10px rgba(0,0,0,0.2); display:flex; flex-direction:column;">'
)
view = view.replace('max-height:600px;', 'max-height:850px;')

# Pridat tlacitko zrusit do invoice modalu
old_invoice_body_end = """                </table>
            </div>
        </div>
    </div>"""
new_invoice_body_end = """                </table>
            </div>
            <div style="padding:15px; border-top:1px solid var(--border-color); text-align:right;">
                <button onclick="closeInvoiceModal()" class="btn" style="background:#6c757d; color:#fff;">Zrušiť</button>
            </div>
        </div>
    </div>"""
view = view.replace(old_invoice_body_end, new_invoice_body_end)

# Pridat button stylovanie .btn-secondary, ak chýba, alebo to natvrdo napisat ako background:#6c757d; color:#fff; (co som prave spravil).

# Co sa tyka Cash Transfer modalu, ten ma tlacidlo zrusit vo formate formulara, ale ma rovnaku sirku 400px.
# Zosuladim vizual hornej casti modalu cashModal podla codesModal
old_cash_modal = """    <!-- Cash Transfer Modal -->
    <div id="cashModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:10000; align-items:center; justify-content:center;">
        <div style="background:var(--card-bg); width:400px; border-radius:8px; border:1px solid var(--border-color); padding:20px; color:var(--text-color);">
            <h3 style="margin-top:0;">Výber / Vklad hotovosti</h3>"""

new_cash_modal = """    <!-- Cash Transfer Modal -->
    <div id="cashModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:10000; align-items:center; justify-content:center;">
        <div style="background:var(--card-bg); width:500px; max-width:90%; border-radius:8px; border:1px solid var(--border-color); box-shadow:0 4px 10px rgba(0,0,0,0.2); display:flex; flex-direction:column; color:var(--text-color);">
            <div style="padding:15px; border-bottom:1px solid var(--border-color); display:flex; justify-content:space-between; align-items:center;">
                <h3 style="margin:0;">Výber / Vklad hotovosti</h3>
                <button onclick="document.getElementById('cashModal').style.display='none';" style="background:none; border:none; color:var(--text-color); font-size:1.5em; cursor:pointer;">&times;</button>
            </div>
            <div style="padding:20px;">"""
view = view.replace(old_cash_modal, new_cash_modal)

# Oprava konca cashModalu
old_cash_modal_end = """                <div style="text-align:right;">
                    <button type="button" onclick="document.getElementById('cashModal').style.display='none';" class="btn" style="background:#6c757d; color: white;">Zrušiť</button>
                    <button type="submit" class="btn" style="background:#28a745;">Uložiť prevod</button>
                </div>
            </form>
        </div>
    </div>"""
new_cash_modal_end = """                <div style="text-align:right; margin-top:25px;">
                    <button type="button" onclick="document.getElementById('cashModal').style.display='none';" class="btn" style="background:#6c757d; color:#fff;">Zrušiť</button>
                    <button type="submit" class="btn" style="background:#28a745; color:#fff;">Uložiť prevod</button>
                </div>
            </form>
            </div>
        </div>
    </div>"""
view = view.replace(old_cash_modal_end, new_cash_modal_end)

with open("ci4_app/app/Views/bank/index.php", "w") as f:
    f.write(view)
