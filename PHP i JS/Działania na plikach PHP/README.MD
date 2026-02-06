## 📂 Moduły PHP

W repozytorium znajdują się również proste skrypty PHP obsługujące zapis i odczyt danych z pliku. To podstawowy przykład pracy z formularzami, metodą POST oraz operacjami na plikach.

### 1. **formularz-zapis-do-pliku.php**
Strona zawierająca formularz HTML, który pozwala użytkownikowi wprowadzić dane (np. imię, wiadomość, komentarz).  
Po wysłaniu formularza dane są przekazywane do skryptu odpowiedzialnego za zapis.

### 2. **zapis-wpisu.php**
Skrypt odbierający dane z formularza metodą **POST** i zapisujący je do pliku tekstowego.  
Przykład użycia funkcji takich jak `fopen()`, `fwrite()`, `fclose()` oraz podstawowej walidacji danych.

### 3. **odczyt-plik.php**
Skrypt odpowiedzialny za odczyt zawartości pliku tekstowego i wyświetlenie zapisanych wcześniej wpisów.  
Demonstruje pracę z funkcjami `file()`, `fread()` lub `file_get_contents()` oraz prostą prezentację danych.
