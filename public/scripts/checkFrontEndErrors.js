const puppeteer = require('puppeteer');

(async () => {
    const browser = await puppeteer.launch();
    const page = await browser.newPage();

    // Navegar a la URL
    await page.goto('https://www.queridodinero.com/qdplay');

    // Hacer clic en un botón
    await page.click('#submit-button');

    // Verificar si aparece un mensaje de éxito
    const successMessage = await page.$eval('.success-message', el => el.textContent);
    if (!successMessage.includes('Éxito')) {
        console.error('El mensaje de éxito no apareció');
    }

    // Cerrar el navegador
    await browser.close();
})();