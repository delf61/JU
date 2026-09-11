const { chromium } = require('playwright');

(async () => {
  const browser = await chromium.launch({ headless: true });
  console.log("Playwright launched successfully.");
  await browser.close();
})();
