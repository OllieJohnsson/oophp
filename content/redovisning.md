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

Här är redovisningstexten



Kmom05
-------------------------

Här är redovisningstexten



Kmom06
-------------------------

Här är redovisningstexten



Kmom07-10
-------------------------

Här är redovisningstexten
