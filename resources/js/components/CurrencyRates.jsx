import React, { useState, useEffect } from 'react';
import ReactDOM from "react-dom/client";

const CurrencyRates = () => {
    const [rates, setRates] = useState([]);

    useEffect(() => {

        window.Echo.channel('currency-updates').listen('CurrencyUpdated', (data) => {
            console.log(data.data);
            setRates(data.data);
        })

    }, []);

    return (
        <div>
            <h1>Currency Rates</h1>
            <table>
                <thead>
                <tr>
                    <th>Currency A</th>
                    <th>Currency B</th>
                    <th>Date</th>
                    <th>Buy Rate</th>
                    <th>Cross Rate</th>
                    <th>Sell Rate</th>
                </tr>
                </thead>
                <tbody>
                {rates.map((rate, index) => (

                    <tr key={rate.currencyCodeA + rate.currencyCodeB + rate.date}>
                        <td>{rate.currencyCodeA}</td>
                        <td>{rate.currencyCodeB}</td>
                        <td>{new Date(rate.date * 1000).toLocaleString()}</td>
                        <td>{rate.rateBuy}</td>
                        <td>{rate.rateCross}</td>
                        <td>{rate.rateSell}</td>
                    </tr>
                ))}
                </tbody>
            </table>
        </div>
    );
};

export default CurrencyRates;
if (document.getElementById('currency-rates')) {
    const Index = ReactDOM.createRoot(document.getElementById("currency-rates"));

    Index.render(
        <React.StrictMode>
            <CurrencyRates/>
        </React.StrictMode>
    )
}
