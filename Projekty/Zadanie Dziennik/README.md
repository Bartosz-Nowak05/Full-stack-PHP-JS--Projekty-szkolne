Projekt „Dziennik” - Wyświetlanie ocen i obliczanie średniej (PHP + MySQL)
Projekt przedstawia prostą aplikację dziennika szkolnego, która wyświetla listę uczniów wraz z ocenami oraz umożliwia obliczenie średniej ocen na podstawie podanego ID. 

📁 Struktura projektu
- index.php - główny plik aplikacji (tabela + formularz obliczania średniej)
- style1.css - stylizacja interfejsu
- dziennik.sql - struktura i dane bazy MySQL
- README.md - dokumentacja projektu

📂 Moduły aplikacji
1. Tabela uczniów
Wyświetla wszystkie rekordy z tabeli dziennik, w tym:
- ID
- imię
- nazwisko
- ocena 1
- ocena 2
- ocena 3
Dane pobierane są bezpośrednio z bazy MySQL.

2. Obliczanie średniej
Formularz umożliwia wpisanie ID ucznia, a następnie oblicza średnią z trzech ocen:
- wynik wyświetlany jest pod formularzem
- działanie wykonywane jest po stronie PHP

🧩 Technologie
- PHP
- MySQL
- HTML5
- CSS3
