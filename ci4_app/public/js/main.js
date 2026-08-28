import { initCashbook } from './modules/cashbook.js';

document.addEventListener('DOMContentLoaded', () => {
    console.log('App initialized');

    // Example: Initialize cashbook if we are on the cashbook view
    if (document.getElementById('cashbook-container')) {
        initCashbook();
    }
});
