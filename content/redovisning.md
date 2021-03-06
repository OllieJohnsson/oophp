---
---
Redovisning
=========================

Kmom01
-------------------------
###Hur känns det att hoppa rakt in i objekt och klasser med PHP, gick det bra och kan du relatera till andra objektorienterade språk?
Det kändes mycket bra. Jag kände till objekt och klasser sedan tidigare, så det gällde mest att ta reda på hur man skriver i PHP. Klasser fungerar på samma sätt som i andra programmeringsspråk såsom Javascript och Swift. De har properties och methods som kan göras privata eller publika. Man kan initiera en klass med en inbyggd metod.

###Berätta hur det gick det att utföra uppgiften “Gissa numret” med GET, POST och SESSION?
Det gick bra! Klassen Guess hade redan property- och method-namn färdiga, så det var bara att fylla i vad de olika funktionerna skulle göra. I makeGuess-metoden fångas ett exception ifall det gissade värdet är utanför 1-100. Jag använde en switch-sats för de olika retur-strängarna.

Alla varianter fungerar på ungefär samma sätt. Om man trycker på "Make a guess" kallas makeGuess() på med ett värde från formuläret. Finns "reset" i POST- eller GET-variabeln, återställs spelet.
Ifall exceptionet "GuessException" kastas, fångas error-meddelandet upp och sätts till variabeln "message".

För GET/POST hämtas värdena för "correctNumber" och "tries" från gömda fält i formuläret.
I Session sparas hela guess-objektet i sessionen. Det gör att man inte behöver återskapa objektet, utan kan använda dess metoder fritt. Man behöver inte heller ha några dolda inputs i formuläret på det sättet. Den känns som den smidigaste varianten för uppgiften.

###Har du några inledande reflektioner kring me-sidan och dess struktur?
Jag har kollat igenom fil-strukturen och friskat upp minnet lite sen design-kursen. Det behövdes inte grävas så djupt för att lösa veckans uppgifter. Jag skickade med $navbar till footern också i page.php, för att enkelt komma åt länkarna. Jag stylade sidan en del och lade till en egen test-sida.


###Vilken är din TIL för detta kmom?
Veckans TIL är autoload.php. Det krävdes inte många rader kod för att slippa skriva in allt som ska importeras varje gång. Också att man kan "appenda" arrayer genom att bara skriva "[] =" i en loop.




Kmom02
-------------------------
###Hur gick det att överföra spelet “Gissa mitt nummer” in i din me-sida?
Det gick bra! Jag skapade routes för de olika versionerna. Sen lade jag till mappen view/guess. Där började jag med att skapa en vy för varje route. Men när jag var klar såg jag att vyerna var väldigt lika. Då valde jag att istället skicka med lite variabler som gjorde att det räckte med en gemensam vy. Jag testade också att använda mig av ramverkets "$app->session" för att skapa och förstöra sessionen.

###Berätta om din syn på modellering likt UML jämfört med verktyg som phpDocumentor. Fördelar, nackdelar, användningsområde? Vad tycker du om konceptet make doc?
Modellering av typen UML har man mer användning för om man gör den innan man börjar koda.
Man kan då se ungefär vilka klasser, properties och metoder man kommer att behöva. Men man får antagligen uppdatera diagrammet allteftersom man kommer på nya delar som behövs.

PhpDocumentor genererar automatisk dokumentation av din kod. Det är ett smidigt sätt att skapa en manual för alla klasser. En fördel är att man får allting uppdaterat automatiskt och behöver inte som med UML-diagram uppdatera på flera platser. Jag ser vitsen med att skriva docblock-kommentarer för att få en bättre dokumentation. Det gäller bara att komma ihåg att skriva dem kontinuerligt.

Make doc var väldigt enkelt att använda. Ett kommando i terminalen, sen var det bara att öppna webbläsaren och få en överblick över klasserna.

###Hur känns det att skriva kod utanför och inuti ramverket, ser du fördelar och nackdelar med de olika sätten?
Det kändes bra att först kopiera in ett befintligt spel, för att senare skapa direkt i ramverket. Jag kände att jag hade ganska bra koll på router och vyer sen databas-kursen. Jag försökte hålla mina routes så små som möjligt och sköta den mesta logiken inuti klasserna. Framförallt i tärningsspelet som jag hann börja på innan det blev flyttat till nästa kmom. En fördel med att koda inuti ramverket är att man får en hel del hjälp vid felsökning. Man kan lätt komma åt vilka routes som finns tillgängliga och se vad som finns i nuvarande session.

###Vilken är din TIL för detta kmom?
Veckans TIL är att docblock-kommentarerna faktiskt kan vara användbara.




Kmom03
-------------------------

###Har du tidigare erfarenheter av att skriva kod som testar annan kod?
Jag har provat på enhetstestning i OOPython-kursen. Så jag hade lite koll på vad det handlade om. Det fungerade på sammas sätt i PHP. Man använder assertions för att kontrollera att vissa värden stämmer överens med det förväntade värdet.

###Hur ser du på begreppen enhetstestning och att skriva testbar kod?
När jag gjorde enhetstester för tärningsspelet upptäckte jag att jag kunnat skriva min kod annorlunda för att underlätta testningen. Så om man har enhetstestning i åtanke från början kommer det gå mycket enklare att testa. Man kan också använda enhetstestning som felsökning. Jag hade en del buggar i min kod som jag inte kunde lösa. Då provade jag att skriva några enhetstester och felen kom fram. Jag tycker det känns bra att köra enhetstester. Man får en "garanti" på att allt fungerar som det är tänkt.

###Förklara kort begreppen white/grey/black box testing samt positiva och negativa tester, med dina egna ord.
White-box är när man har tillgång till all källkod och kan se vilka variabler och metoder som finns tillgängliga för testning.
Black-box är motsatsen. Man ser applikationen ur användarens synvinkel och får basera testningen på dess beteende istället för kod. Grey-box är en kombination av de två andra. Man har kanske bara tillgång till delar av källkoden.

Positiva tester är för att kontrollera att allt fungerar som tänkt vid korrekt input.
Vid negativa tester kan man t.ex. skicka in ett felaktigt argument och kontrollera så att programmet beter sig på rätt sätt.

###Berätta om hur du löste uppgiften med Tärningsspelet 100, hur du tänkte, planerade och utförde uppgiften samt hur du organiserade din kod?
Först skapade jag de klasser jag trodde skulle krävas. Sen lade jag till variabler och metoder efterhand som de behövdes. Jag började med att testa spelets funktioner med utskrifter innan jag skapade vyerna. Då kunde jag se att det fungerade ungefär som jag ville. Sen lade jag till routes och vyer, där jag försökte få så lite kod som möjligt. I varje route kallas i princip bara en metod från game-klassen och redirectar till nästa route eller renderar en vy.

###Hur väl lyckades du testa tärningsspelet 100?
Efter att ha ändrat om lite i min kod för att täcka fler olika flöden, fick jag 97.7% kodtäckning. Jag lade till tester som täcker nästan hela kod-flödet, men det finns många fler test-fall man skulle kunna göra.

###Vilken är din TIL för detta kmom?
Veckans TIL är lite hur man kan tänka när man skriver sin kod för att underlätta för testning. Jag skulle använt mer argument i mina metoder för att enklare kunna styra de olika test-fallen.




Kmom04
-------------------------

###Vilka är dina tankar och funderingar kring trait och interface?
Jag tycker det känns användbart. Det är smart att dela upp återanvändbar kod i traits och sen bara skicka in där det behövs. På det sättet kan man slippa upprepning. Det kändes också smidigt att använda traits i samband med interface för att vara säker på att de metoder dom krävs finns i klassen.
I den andra kursen bygger jag en IOS-app i Swift. Där har jag precis bekantat mig med delegates och protocols. Protocol verkar vara en variant på interface, man bestämmer vilka metoder som måste finnas i en klass för att den ska kunna använda interfacet/protocolet.

###Hur gick det att skapa intelligensen och taktiken till tärningsspelet, hur gjorde du?
Jag skapade några villkor som jag tyckte var rimliga inuti metoden shouldComputerPlay() i Game-klassen.
Datorn spelar igen om något av detta gäller:

- Om datorn har under 80 poäng och motståndaren mer än 90.
- Om datorn har mer än 60 poäng och motståndaren mindre än 40.
- Om både datorn och motståndaren har under 40 poäng.

Datorn sparar rundan om rundans värde är 40 eller mer.

###Några reflektioner från att integrera hårdare in i ramverkets klasser och struktur?
Det känns logiskt att använda de metoder och klasser som ramverket erbjuder. Det blir renare och om ramverket uppdateras behöver inte min kod påverkas.

###Berätta hur väl du lyckades med make test inuti ramverket och hur väl du lyckades att testa din kod med enhetstester och vilken kodtäckning du fick.
Jag kände att jag hade väldigt många metoder och det började kännas rörigt. Därför skrev jag om delar av min kod och förenklade så mycket som jag kunde. Det tog längre tid än vad jag tänkte, men jag det känns som att jag fick bättre koll på min kod när jag var färdig. Sen blev det enklare med enhetstesterna, men jag lyckades ändå inte nå 100%. Jag landade på 93.91% för Dice-klassen. Problemet var att jag inte på ett enkelt sätt kunde styra ifall datorn slog en etta eller inte. Hade jag haft mer tid kanske jag löst det.

###Vilken är din TIL för detta kmom?
Det får bli hur man kan använda trait och interface. Jag har greppat ungefär hur det fungerar, men det krävs nog att jag upprepar det några gånger till innan det sitter helt. Dessutom har jag återigen lärt mig att saker inte går lika snabbt som man tror.


Kmom05
-------------------------
###Några reflektioner kring koden i övningen för PHP PDO och MySQL?
Jag gick igenom hela koden och försökte sätta mig in i hur allt fungerade. Jag kände igen MySQL-koden från databas-kursen, så det var inte mycket nytt där. PDO verkar smidigt, med metoder som prepare() och lastInsertId(). Prepare() returnerar en statement-klass från vilken man kan kalla på execute(). Det fanns också en del smarta funktioner i function.php som jag kollade igenom, men hann inte implementera i min egen sida.

###Hur gick det att överföra koden in i ramverket, stötte du på några utmaningar?
Det gick bra. Databas-modulen gick enkelt att installera med Composer. Routes hade jag koll på sedan förra kursmomentet. Jag använde mig av de inbyggda metoderna getGet() och getPost() för att hämta värden.

###Berätta om din slutprodukt för filmdatabasen, gjorde du endast basfunktionaliteten eller lade du till extra features och hur tänkte du till kring användarvänligheten och din kodstruktur?
Jag hann bara med basfunktionaliteten denna veckan, den andra kursen tog för lång tid. Jag ville göra användningen så enkel och lättförståelig som möjligt och samtidigt inte upprepa kod.

Jag lade sök-funktionen på förstasidan, där har man redan en överblick över vilka filmer som finns. Jag skrev in "%" i sql-frågan så det behövs inte i sök-fältet. När sökresultatet visas finns en tillbaka-knapp för att visa alla filmer igen. Hittas inget på sökningen visas ett meddelande och alla filmer visas.

På första sidan finns en länk med en plus-ikon för att lägga till en ny film.
Formuläret har ett ifyllt default-värde för länken till bild-katalogen.

Varje film i listan har en länk till edit-sidan. Den använder samma formulär som add-sidan. Nuvarande data visas i formuläret och det går att uppdatera innehållet genom att trycka på "Redigera". Härifrån går det också att radera filmen.

###Vilken är din TIL för detta kmom?
Veckans TIL är hur man kan ladda in flera vyer i routen. Det var väldigt smidigt när jag ville lägga till sök-funktionen i min index-sida för movie. Det känns bra att ha de vyerna separerade så att de går att återanvända.


Kmom06
-------------------------
###Hur gick det att jobba med klassen för filtrering och formatting av texten?
Det gick bra. Jag följde tipsen i guiden och använde preg_replace för att konvertera till rätt taggar. I min egen parse-metod skickas det in två parametrar: texten som ska konverteras och en array av strängar som motsvarar filtren. En foreach-loop går igenom filtren, om filtret finns i den fördefinierade dictionaryn $filters så körs texten genom motsvarande metod och returneras. På så sätt går texten igenom alla inskickade filter i rätt ordning. Till sist returneras texten.

###Berätta om din klasstruktur och kodstruktur för din lösning av webbsidor med innehåll i databasen.
Jag började med att skriva alla min routes i "routes/050_content.php". När jag hade fått allt att fungera som jag ville började jag flytta över koden i klassen "src/Content/ContentController". Det gjorde att det bara krävdes en rad kod i "routes/050_content.php". All kod skrivs istället i ContentControllers metoder. Det blev en del nya begrepp att sätta sig in i. Men jag fick det att fungera genom att använda metoder i stil med indexActionGet(), där parametrar läggs på som paths i urlen.

Jag utgick från min bas-route "content/". Dessutom hade ytterligare en route "content/admin" som jag ville kunna förlänga till t.ex. "content/admin/create". För att få det att fungera skapade jag en ContentController till: "src/Content/ContentAdminController". Jag vet inte om det var rätt väg att gå då de båda routsen egentligen utgår från samma route. För att inte få ett error-meddelande när "content/admin" besöks var jag tvungen att lägga en tom metod: adminAction() i ContentController.

###Hur känner du rent allmänt för den koden du skrivit i din me/redovisa, vad är bra och mindre bra? Ser du potential till refactoring av din kod och/eller behov av stöd från ramverket?
Jag tycker det känns bättre och bättre efterhand som jag "refactorat". Det känns bra att ha så mycket som möjligt i klasser, de blir då enklare att återanvända kod och så småningom testa. Jag gillar också att dela upp mina vyer i många små filer som sen kan skickas in i olika kombinationer för att skapa en helhet. Varje vy har då en primär huvuduppgift som hålls separerad från annat.


###Vilken är din TIL för detta kmom?
Veckans TIL är hur man kan använda controller-klasser för att hantera routes.

###Övrigt
Jag gjorde så att allt innehåll oavsett raderat eller ej visas under "content/index". Men raderat innehåll visas ej under "content/blog" eller "content/pages". Det går att återställa raderat innehåll med med en länk i actions-kolumnen under "content/admin". Man kan också återställa hela databasen under "content/admin".



Kmom07-10
-------------------------

Här är redovisningstexten
