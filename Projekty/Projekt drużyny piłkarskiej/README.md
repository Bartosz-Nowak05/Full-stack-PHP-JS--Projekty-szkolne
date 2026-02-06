 Projekt Drużyny Piłkarskiej - Strona i Panel Informacyjny (HTML + CSS + PHP + MySQL)
Projekt przedstawia stronę internetową drużyny piłkarskiej wraz z modułami prezentującymi zawodników, wyniki meczów, galerię zdjęć oraz formularz kontaktowy.

📁 Struktura projektu
Projekt składa się z następujących plików i folderów:
- index.html - strona główna projektu
- zawodnicy.php - moduł prezentujący listę zawodników
- wyniki.php - sekcja z wynikami meczów
- kontakt.php - formularz kontaktowy
- logout.php - wylogowanie użytkownika (jeśli projekt tego wymaga)
- db_connect.php - konfiguracja połączenia z bazą danych
- style.css - stylizacja strony
- logo.png, logo.ico - grafiki projektu
- pi_karze.sql - struktura i dane bazy MySQL
- galeria/ - folder zawierający zdjęcia (1.jpg–12.jpg)
- README.md - dokumentacja projektu

📂 Moduły aplikacji
1. Strona główna
Zawiera podstawowe informacje o drużynie oraz odnośniki do pozostałych sekcji projektu.

2. Zawodnicy
Moduł wyświetlający listę zawodników pobranych z bazy danych.
Prezentowane są dane takie jak imię, nazwisko, pozycja oraz numer zawodnika.

3. Wyniki
Sekcja prezentująca wyniki rozegranych meczów.
Dane są pobierane z bazy i wyświetlane w formie tabeli.

4. Galeria
Folder galeria/ zawiera zdjęcia drużyny i wydarzeń sportowych.
Zdjęcia są prezentowane na stronie w formie siatki.

5. Kontakt
Formularz umożliwiający wysłanie wiadomości do administracji drużyny.
Dane są walidowane po stronie przeglądarki i/lub serwera.

6. Logowanie / Wylogowanie
Moduł umożliwiający zarządzanie sesją użytkownika (jeśli projekt tego wymaga).
Plik logout.php odpowiada za zakończenie sesji.

🧩 Technologie
- PHP
- MySQL
- HTML5
- CSS3
- JavaScript (Vanilla)
- Prepared Statements
