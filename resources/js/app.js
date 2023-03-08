import './bootstrap';

window.Echo.channel('currency-updates').listen('CurrencyUpdated', (e) => {
    console.log(e);
})
console.log('app.js loaded');
