Formularz z Datalist - Insert do bazy (PHP + MySQL)
Projekt przedstawia prosty formularz internetowy umożliwiający dodawanie osób do bazy danych. Aplikacja korzysta z elementu datalist, który dynamicznie pobiera wartości z bazy MySQL, oraz wyświetla wszystkie rekordy w tabeli. 

📁 Struktura projektu
- index.php - główny plik aplikacji z formularzem i tabelą
- style.css - stylizacja interfejsu
- szkola25.sql - struktura i dane bazy MySQL
- README.md - dokumentacja projektu

📂 Moduły aplikacji
1. Formularz dodawania osób
Umożliwia wpisanie danych:
- imię
- nazwisko
- email
- narodowość (datalist z bazy)
- województwo (lista + dane z bazy)
Po wysłaniu formularza dane są zapisywane do tabeli osoby.

2. Datalist z bazy danych
Pole narodowość oraz część listy województwo pobierają wartości bezpośrednio z bazy MySQL, dzięki czemu lista automatycznie rozszerza się o nowe wpisy.

3. Tabela z rekordami
Pod formularzem wyświetlana jest tabela zawierająca wszystkie osoby zapisane w bazie:
- imię
- nazwisko
- email
- narodowość
- województwo
- data dodania

🧩 Technologie
- PHP
- MySQL
- HTML5
- CSS3
- Datalist (HTML)
