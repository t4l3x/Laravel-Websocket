<!DOCTYPE html>
<html>
<head>
    <title>Currency Rates</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            font-family: Arial, sans-serif;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: left;
            padding: 10px;
        }

        td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
    @vite('resources/js/app.js', 'resources/css/app.css','vendor/courier/build')
</head>
<body>
    <div id="currency-rates"></div>
</body>
</html>
