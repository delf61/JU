# Logbook Golden Validation Coverage

This document outlines the scope, records tested, and exact discrepancies found during the Golden Test validation of the `Logbook` module.

The tests query the raw `ju_migration_test` DB to dynamically compute coverage, independent of the CodeIgniter services.

## Coverage Report

### Golden Validation Year

The direct database audit identified **2015** as the latest substantial year containing real SC data within the test dataset.

### FAND Table `SC`
*   **Golden dataset:** 2015
*   **Available records:** 268
*   **Tested records:** 268
*   **Skipped records:** 0
*   **Differences:** 0
*   **Validation status:** VERIFIED

### FAND Table `EVIAUTO`
*   **Dataset records:** 0
*   **Golden validation:** NOT PERFORMED
*   **Status:** OPEN ISSUE
*   **Reason:** No source records available in migration test database. `eviauto` contains no records in the available migration test dataset. Golden validation cannot be performed without source records.

## Final Conclusion
*   SC: 268 available / 268 tested / 0 skipped / 0 differences
*   EviAuto: 0 available / 0 tested / 0 skipped / 0 differences (OPEN ISSUE)

The core logic exactly matches FAND reference behavior for SC. EviAuto relies entirely on independent Unit Tests for mathematical validation.