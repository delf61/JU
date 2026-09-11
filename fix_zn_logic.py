import re

with open("ci4_app/app/Controllers/BankStatementController.php", "r") as f:
    ctrl = f.read()

# Zmena logiky v getUnpaidInvoices a payInvoice

old_logic = """        // Sumy z faktury (Zjednoduseny FAND prepocet dolezity pre MVC)
        $x = (float)($inv['x'] ?? 0);
        $y = (float)($inv['y'] ?? 0);
        $z = (float)($inv['z'] ?? 0);
        $dph1 = round($y * ((float)($inv['dph_1'] ?? 0)/100), 2);
        $dph  = round($z * ((float)($inv['dph'] ?? 0)/100), 2);
        $zn = $x + $y + $z + $dph1 + $dph;"""

new_logic = """        $x = (float)($inv['x'] ?? 0);
        $y = (float)($inv['y'] ?? 0);
        $z = (float)($inv['z'] ?? 0);
        $dph1 = round($y * ((float)($inv['dph_1'] ?? 0)/100), 2);
        $dph  = round($z * ((float)($inv['dph'] ?? 0)/100), 2);
        $vyrovn = (float)($inv['vyrovn'] ?? 0);

        $par69 = (!empty($inv['par_69']) || !empty($inv['par69'])) ? true : false;
        if ($par69) {
            $dph1 = 0;
            $dph = 0;
        }

        $zn = $x + $y + $z + $dph1 + $dph + $vyrovn;"""

ctrl = ctrl.replace(old_logic, new_logic)

old_logic2 = """            $x = (float)($inv['x'] ?? 0);
            $y = (float)($inv['y'] ?? 0);
            $z = (float)($inv['z'] ?? 0);
            $dph_rate1 = (float)($inv['dph_1'] ?? 0);
            $dph_rate = (float)($inv['dph'] ?? 0);

            $dph_val1 = round($y * ($dph_rate1 / 100), 2);
            $dph_val = round($z * ($dph_rate / 100), 2);

            $zn = $x + $y + $z + $dph_val1 + $dph_val;"""

new_logic2 = """            $x = (float)($inv['x'] ?? 0);
            $y = (float)($inv['y'] ?? 0);
            $z = (float)($inv['z'] ?? 0);
            $dph_rate1 = (float)($inv['dph_1'] ?? 0);
            $dph_rate = (float)($inv['dph'] ?? 0);
            $vyrovn = (float)($inv['vyrovn'] ?? 0);

            $par69 = (!empty($inv['par_69']) || !empty($inv['par69'])) ? true : false;

            $dph_val1 = round($y * ($dph_rate1 / 100), 2);
            $dph_val = round($z * ($dph_rate / 100), 2);

            if ($par69) {
                $dph_val1 = 0;
                $dph_val = 0;
            }

            $zn = $x + $y + $z + $dph_val1 + $dph_val + $vyrovn;"""

ctrl = ctrl.replace(old_logic2, new_logic2)

with open("ci4_app/app/Controllers/BankStatementController.php", "w") as f:
    f.write(ctrl)
