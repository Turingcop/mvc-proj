## MVC, Projekt i Laravel, BTH 2021

#### Scrutinizer CI
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Turingcop/mvc-proj/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/Turingcop/mvc-proj/?branch=main)
[![Code Coverage](https://scrutinizer-ci.com/g/Turingcop/mvc-proj/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/Turingcop/mvc-proj/?branch=main)
[![Build Status](https://scrutinizer-ci.com/g/Turingcop/mvc-proj/badges/build.png?b=main)](https://scrutinizer-ci.com/g/Turingcop/mvc-proj/build-status/main)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/Turingcop/mvc-proj/badges/code-intelligence.svg?b=main)](https://scrutinizer-ci.com/code-intelligence)

#### Travis CI
[![Build Status](https://app.travis-ci.com/Turingcop/mvc-proj.svg?branch=main)](https://app.travis-ci.com/Turingcop/mvc-proj)

### Yatzy

![Yatzy spelbräde](/public/img/yatzy.png)

Applikationen är huvudsakligen ett Yatzy-spel, så kallat utan tvång. Det vill säga att spelaren kan fritt välja över hela protokollet var den aktuella handen ska föras in. Det krävs alltså inte att en spelar i en viss ordning eller att t ex övre protokollet fylls först.

För att spela skriver spelaren in ett valfritt användarnamn och trycker på knappen till att börja varpå första kastet görs. Spelaren kan då välja vilka tärningar som ska behållas innan den trycker på kasta för att kasta igen då bara omarkerade tärningar kastats. Efter tre kast får spelaren välja under vilken rubrik i protokollet den aktuella handen ska föras in och kan sedan klicka på "Vidare", för att en ny kastrunda ska inledas. Varje protokollrubrik kan bara väljas en gång per spelomgång.

När en spelomgång är slut kontrolleras poängen mot databasen som lagrar de tio bästa, är poängen bättre än den tionde i listan kommer istället den nya poängen föras in i databasen och visas i highscore-vyn med spelarens namn och när spelet genomfördes.

### Installation

För att koden ska fungera som tänkt krävs vid kloning av repot att en lokal .env-fil placeras i rot-katalogen. I detta repo finns en .env.example att utgå ifrån för att få rätt struktur. Det som framförallt behöver anges är vilken typ av databas som ska användas under env-variabeln DB_CONNECTION, samt detaljerna, så som namn på databasen, användarnamn och lösenord till den. Makefile innehåller i övrigt kommandon som kan för att installera eventuella beroenden och dylikt, samt köra testsviten som valideras koden och kör testerna. Tester av metoder som jobbar mot databasen körs mot en sqlite-databas som är inkluderad i repot. Det finns också migrationer för att skapa de tabeller i den valda produktionsdatabasen som krävs för att applikationen ska fungera. Dessa kan köras från kommandoraden med "php artisan migrate".

### Statistik

Statistiken som visas upp på index-sidan uppdateras dynamiskt och hämtar sin data från den databas som anges i .env och som applikationen jobbar mot. Diagrammen kommer därför vara tomma inledningsvis, men fyllas på allteftersom applikationen används. Den ena grafen visar utfallen för samtliga tärningar som kastats, hur många som varit ettor, hur många som varit tvåor etcetera. Den andra visar snittvärdet på de tärningshänder som användare valt att föra in under de olika rubrikerna i protokollet.

![Tärningskast utfall](/public/img/dicestats.png)
