import re

# 1. Update Cashbook Modals
with open("ci4_app/app/Views/cashbook/index.php", "r") as f:
    cashbook_view = f.read()

cashbook_script_injection = """
        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modal = document.getElementById('codesModal');
                if (modal && modal.style.display !== 'none') {
                    closeCodesModal();
                }
            }
        });
"""

# Find closing script tag for codes modal
end_script_cb = cashbook_view.find('function closeCodesModal() {')
if end_script_cb != -1:
    cashbook_view = cashbook_view[:end_script_cb] + cashbook_script_injection + "\n        " + cashbook_view[end_script_cb:]

with open("ci4_app/app/Views/cashbook/index.php", "w") as f:
    f.write(cashbook_view)


# 2. Update Bank Modals
with open("ci4_app/app/Views/bank/index.php", "r") as f:
    bank_view = f.read()

bank_script_injection = """
        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const invModal = document.getElementById('invoiceModal');
                if (invModal && invModal.style.display !== 'none') {
                    closeInvoiceModal();
                }
                const cashModal = document.getElementById('cashModal');
                if (cashModal && cashModal.style.display !== 'none') {
                    cashModal.style.display = 'none';
                }
            }
        });
"""

end_script_bank = bank_view.find('function openCashTransferModal() {')
if end_script_bank != -1:
    bank_view = bank_view[:end_script_bank] + bank_script_injection + "\n        " + bank_view[end_script_bank:]

with open("ci4_app/app/Views/bank/index.php", "w") as f:
    f.write(bank_view)
