import re

with open("ci4_app/app/Controllers/BankStatementController.php", "r") as f:
    view = f.read()

# I also need to remove the var_sym assignment for kp invoices in getUnpaidInvoices
# FAND definition: var_sym is mostly for kz (supplier invoices), not kp (issued invoices)

old_logic = """            if (abs($zn - $uhrada) > 0.1) {
                // Pridame zostatok
                $inv['zn'] = number_format($zn, 2, '.', '');
                $inv['uhrada'] = number_format($uhrada, 2, '.', '');
                $inv['zostatok'] = number_format($zn - $uhrada, 2, '.', '');
                $inv['var_sym'] = isset($inv['var_sym']) ? trim($inv['var_sym']) : '';
                $unpaid[] = $inv;
            }"""

new_logic = """            if (abs($zn - $uhrada) > 0.1) {
                // Pridame zostatok
                $inv['zn'] = number_format($zn, 2, '.', '');
                $inv['uhrada'] = number_format($uhrada, 2, '.', '');
                $inv['zostatok'] = number_format($zn - $uhrada, 2, '.', '');
                if ($type === 'kz') {
                    $inv['var_sym'] = isset($inv['var_sym']) ? trim($inv['var_sym']) : '';
                }
                $unpaid[] = $inv;
            }"""

view = view.replace(old_logic, new_logic)

with open("ci4_app/app/Controllers/BankStatementController.php", "w") as f:
    f.write(view)
