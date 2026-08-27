export function initCashbook() {
    console.log('Cashbook module loaded');
    fetchData();
}

async function fetchData() {
    try {
        const response = await fetch('/cashbook');
        const result = await response.json();
        console.log('Cashbook data:', result);
    } catch (error) {
        console.error('Error fetching cashbook data:', error);
    }
}
