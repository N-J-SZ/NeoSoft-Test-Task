API -> backend API
-------------------------------------
API/sql -> MySQL database export file
.env -> db kapcsolódáshoz szükséges adatok
DotEnv.php -> .env fájl kezelése
server.php -> maga a REST API megvalósításom, egy egyszerű megoldás az alap CRUD műveletekhez (GET, POST, PATCH és DELETE http metódusok kezelése)
thunderclient_collection_to_test_the_ API_endpoints.json -> egy teszt az API endpointjaihoz (a VS Code ThunderClient nevű kiegészítőjének exportja)

App -> PHP MVC applikáció könyvtárai
-------------------------------------
Config -> konfigurációs adatok és a router (url kezelése)
Controllers -> kontrollerek mappája
Models -> a user osztály és a CRUD műveletek metódusai
Views -> az applikáció HTML nézet sablonjai
require.php -> függőségek betöltése és az app inicializálása


Public -> A web app-hoz szükséges egyéb dolgok
----------------------------------------------
css -> stíluslapok (bootstrap és saját)
fonts -> font ikonok (bootstrap icons)
js ->  scriptek (bootstrap)