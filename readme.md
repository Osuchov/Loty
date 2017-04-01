#  Warsztaty

> Zadania warsztatowe staraj się wykonywać samodzielnie, możesz w każdej chwili poprosić wykładowcę o pomoc.

**WAŻNE -  nie zmieniaj struktury/nazw plików oraz korzystaj z przygotowanych zmiennych**  

**Po każdym zdaniu zrób commit z opisem w języku angielskim np. `added airports to form`**

#### Zadanie 1 - rozgrzewka (~20min.)

1. Stwórz stronę z formularzem, która:  
   * prosi o imię użytkownika
   * po kliknięciu przycisku `wyślij` przekierowuje na podstronę witającą użytkownika słowami `„Cześć, {$imię}!”`
   
### Wskazówki:
1. Formularz ma przekierowywać na tę samą stronę.
2. Na samym początku sprawdź, czy strona została wygenerowana przez zapytanie ```GET``` czy ```POST``` (użyj `if` i ```$_SERVER['REQUEST_METHOD']```)
3. Sprawdź, czy w tablicy `POST` znajduje się prawidłowa zmienna.
4. Jeżeli coś nie działa &ndash; debuguj!

#### Zadanie 2 (~30min.)

Napisz prosty symulator Lotto.  
1. Symulator ma się składać ze strony z formularzem pozwalającym wybrać `6` liczb z zakresu `1-49`
2. Po wysłaniu formularza strona ma sama wylosować `6` (różnych) liczb z tego samego zakresu
3. Po wylosowaniu wyświetl wylosowane liczby
4. Sprawdź, które liczby wybrane przez użytkownika pokrywają się z wylosowanymi i wyświetl stosowną informację

-------------------------------------------------------------------------------

> Kolejne zadania są ze sobą ściśle powiązane, wykonuj je po kolei i nie przechodź do kolejnego zadania, jeśli poprzednie nie zostało rozwiązane  
> **Zadania rozwiązuj w katalogu `flights`, gdzie będziesz dodawać kolejne etapy**  

> Celem kolejnych zadań jest napisanie funkcjonalnego formularza generowania biletów lotniczych w PDF  
> Twórz zmienne nazwane w sposób logiczny, aby wskazywały co w nich się znajduje używając `camelCase`

#### Zadanie 3 - wizyty na stronie (~30min.)

Celem zadania jest napisanie skryptu, wyświetlającego ostatnie odwiedziny na stronie
1. W katalogu znajduje się plik `index.php` z podstawową strukturą strony.
2. Stwórz w katalogu `includes` plik `visits.php` w którym:  
   * Sprawdź czy użytkownik posiada zapisane ciasteczko o nazwie `visits`, jeśli nie wyświetl komunikat: `Witaj pierwszy raz na naszej stronie`  
     Dodaj ciasteczko o nazwie `visits` zapisując mu wartość `1` i czas ważności `1` rok
   * Jeśli ciasteczko jest zapisane, pobierz jego aktualną wartość i wypisz na stronie komunikat `Witaj, odwiedziłeś nas już X razy`  
     Zwiększ wartość ciasteczka o `1`
3. Dołącz do głównego pliku, plik odpowiedzialny za informację o wizytach na stronie.

#### Zadanie 4 - formularz (~30min.)
 
 Celem zadania jest stworzenie formularza do generowania biletu lotniczego.  
 
 1. Stwórz formularz w html, który przesyła metodą `POST` dane do pliku `pdf.php` (ten plik stworzymy w kolejnych zadaniach)
 2. Formularz powinien być dodany do pliku `form.php` w katalogu `includes`
 3. Dołącz ten plik do głównej strony, aby mieć podgląd w trakcie tworzenia formularza
 4. Formularz powinien zawierać:  
    * Lotnisko wylotu - pole `select`
    * Lotnisko przylotu - pole `select`
    * Czas startu - pole `datetime-local` (będzie to czas wylotu w czasie lokalnym lotniska)
    * Długość lotu w godzinach - pole `number` `min="0"`, `step="1"`
    * Cenę lotu - pole `number` `min="0"`, `step="0.01"`
 5. Lista lotnisk została przygotowana w pliku `airports.php` w katalogu `includes`, użyj pętli aby wygenerować pola `option` z lotniskami,  
    Pamiętaj o dołączeniu pliku z lotniskami do pliku głównego  
    Każde lotnisko posiada:
    * Nazwę `name`
    * Kod `code`
    * Strefę czasową `timezone`
    
#### Zadanie 5 - obsługa formularza (~30min.)

Celem zadania jest obsługa i przetworzenie danych pobranych z formularza.  

1. Stwórz plik `pdf.php` w katalogu głównym, który będzie odbierał dane z formularza
2. Sprawdź czy użytkownik nie wybrał takiego samego lotniska wylotu i przylotu
3. Sprawdź czy data i czas lotu zostały podana
4. Sprawdź czy cena lotu jest większa od `0`
5. Pobierz dane z formularza do zmiennych
6. Znajdź strefę czasową lotniska wylotu i zapisz ją do zmiennej
7. Znajdź strefę czasową lotniska przylotu i zapisz ją do zmiennej
8. Korzystając z `DateTime` stwórz obiekt z datą lotniska wylotu w jego strefie czasowej, i zapisz sformatowany czas (`DD.MM.RRRR GG:MM:SS`) do zmiennej 
9. Dodaj do daty czas lotu i zmień strefę czasową na lotnisko przylotu i zapisz sformatowany czas (`DD.MM.RRRR GG:MM:SS`) do zmiennej

Hint: Aby sprawdzić czy dane są prawidłowe możesz wypisać wartości zmiennych a następnie te linie kodu usnąć lub zakomentować

#### Zadanie 6 - wyświetlanie danych (~30min.)

Celem zadania jest wyświetlenie danych przetworzonych w poprzednim zadaniu.  

1. Stwórz w html tabelę zawierającą dane (wygląd tabeli nie ma znaczenia):  
   * lotnisko wylotu z czasem wylotu i kodem lotniska
   * lotnisko przylotu z czasem przylotu i kodem lotniska
   * czas lotu
   * cenę lotu

#### Zadanie 7 - pasażerowie (~40min.)

Celem zadania jest wygenerowanie danych pasażera i dodanie ich do tabeli.  
Pamiętaj aby katalog `vendor` dodać do `.gitignore`  

1. Korzystając z poznanej już biblioteki [fzaninotto/faker - packagist][fzaninotto/faker-packagist] [fzaninotto/faker - github][fzaninotto/faker-github],  
   wygeneruj imię i nazwisko pasażera i zapisz do zmiennej
2. Dodaj do tabeli dane pasażera

#### Zadanie 8 - cena słownie (~40min.)

Celem zadania jest wypisanie ceny lotu słownie.  

1. Korzystając z poznanej już biblioteki [kwn/number-to-words - packagist][kwn/number-to-words-packagist] [kwn/number-to-words - github][kwn/number-to-words-github],  
   wygeneruj słowną cenę lotu i zapisz do zmiennej
2. Dodaj do tabeli kwotę słowną
3. Po tym zadaniu w pliku `pdf.php` powinna być widoczna, po przesłaniu formularza, tabela z przykładowym lotem

#### Zadanie 9 - generowanie PDF (~60min.)

Celem zadania jest wygenerowanie gotowego pliku PDF zawierającego lot na podstawie danych z formularza.  

1. Korzystając z biblioteki [mpdf/mpdf - packagist][mpdf/mpdf-packagist] [mpdf/mpdf - github][mpdf/mpdf-github],  
   wygeneruj plik `PDF` po przesłaniu formularza
2. Aby to zrobić musisz zapisać do zmiennej całą strukturę wygenerowanego kodu html, zazwyczaj wystarczy umieszczenie kodu w apostrofach `'`
3. Dodaj plik `autoload.php` do pliku `pdf.php`
4. Stwórz obiekt `Mpdf` - użyj do tego `$mpdf = new mPDF();`, gdyż na repozytorium jest informacja o tworzeniu obiektu dla starej wersji biblioteki
5. Używając odpowiedniej metody wygeneruj plik `PDF`, przykład użycia znajduje się na repozytorium biblioteki
6. Domyślnie plik `PDF` zostanie załadowany w przeglądarce, aby wymusić pobranie pliku przeczytaj dokumentację metody `output` biblioteki [mpdf-output][mpdf-output] i zmień wywołanie metody aby wymuszała ona pobranie pliku `PDF`

#### Podsumowanie

W katalogu głównym znajduje się przykładowy wygenerowany plik `flight_ticket.pdf`

<!-- Links -->
[fzaninotto/faker-packagist]:https://packagist.org/packages/fzaninotto/faker
[fzaninotto/faker-github]:https://github.com/fzaninotto/Faker
[kwn/number-to-words-packagist]:https://packagist.org/packages/kwn/number-to-words
[kwn/number-to-words-github]:https://github.com/kwn/number-to-words
[mpdf/mpdf-packagist]:https://packagist.org/packages/mpdf/mpdf
[mpdf/mpdf-github]:https://github.com/mpdf/mpdf
[mpdf-output]:https://mpdf.github.io/reference/mpdf-functions/output.html