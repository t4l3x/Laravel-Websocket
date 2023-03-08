
## Currency Rates Web Application
This is a web application that displays live currency exchange rates using websockets. The exchange rates are fetched from an API and displayed in a table that is updated in real-time using websockets.

#### Installation
To install and run the application, follow these steps:

1. Clone the repository:
git clone https://github.com/t4l3x/Laravel-Websocket.git
2. Run the setup script:
./setup.sh 
* (Wait for the script to finish)
3. Open your web browser and navigate to http://localhost/laravel-websockets will show the websockets dashboard.
4. Open your web browser and navigate to http://localhost. You should see a blank page with the text "Currency Rates".(if not please open the public/hot file and change to http://localhost:5173
  )
5. Open a new tab in your web browser and navigate to http://localhost/show. This will trigger
the event and fetching data.
6. Now go back to the tab you recently opened which a blank page with the text "Currency Rates". You should now see a table with the latest currency exchange rates.

