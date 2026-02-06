Agencja Marketingowa „Kreatywny Impuls” - Panel Zarządzania (PHP + MySQL)
Projekt przedstawia kompletny panel administracyjny agencji marketingowej, stworzony w czystym PHP, MySQL, HTML, CSS i JavaScript. Aplikacja umożliwia zarządzanie pracownikami, usługami, klientami oraz projektami, a także prezentuje podstawowe statystyki.

📁 Struktura projektu
Projekt składa się z następujących plików:
- index.php - główny panel administracyjny
- dodaj.php - moduł dodawania klientów
- login.php - konfiguracja połączenia z bazą danych
- skrypty.js - obsługa interfejsu i walidacji
- style.css - stylizacja aplikacji
- agencja_marketingowa.sql - struktura i dane bazy
- README.md - dokumentacja projektu
- fav.ico, back.png - zasoby graficzne
- instrukcja zadania.txt - oryginalna treść zadania

📂 Moduły aplikacji
1. Pracownicy
Sekcja wyświetlająca listę pracowników pobranych z bazy danych.
Prezentowane informacje obejmują imię, nazwisko, stanowisko oraz datę zatrudnienia.
Widoczność sekcji jest przełączana za pomocą funkcji JavaScript.

2. Usługi
Moduł prezentujący ofertę agencji.
Wyświetlane są nazwy usług, ceny netto oraz opisy.
Sekcja jest przełączana dynamicznie z poziomu interfejsu.

3. Wyszukiwarka klientów i projektów
Formularz umożliwia wyszukiwanie klientów po nazwie firmy.
Po wpisaniu nazwy wyświetlane są powiązane projekty wraz z informacjami o usłudze, statusie oraz koszcie.
Domyślna tabela pracowników zostaje ukryta po wykonaniu wyszukiwania.

4. Statystyki projektów
W stopce strony prezentowane są podstawowe statystyki:
- liczba projektów w trakcie realizacji
- średni szacowany koszt projektów
Dane są pobierane bezpośrednio z bazy i aktualizowane przy każdym odświeżeniu strony.

5. JavaScript - interakcje i walidacja
Plik skrypty.js odpowiada za:
- przełączanie sekcji (pracownicy / usługi / klienci)
- walidację formularza (np. sprawdzanie poprawności adresu e‑mail)
- ukrywanie tabeli po wyszukiwaniu
- podświetlanie klikniętych wierszy tabeli
Kod jest prosty, czytelny i oparty na natywnym JavaScript.

🧩 Technologie
- PHP
- MySQL
- HTML5
- CSS3
- JavaScript (Vanilla)
- Prepared Statements


