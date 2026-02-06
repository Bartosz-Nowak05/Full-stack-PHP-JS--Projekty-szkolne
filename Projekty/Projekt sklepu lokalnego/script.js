    function pokazCzas() {
        let teraz = new Date();
        let dzien = teraz.getDate();
        let miesiac = teraz.getMonth();
        let rok = teraz.getFullYear();
        let godzina = teraz.getHours();

        document.getElementById("czas").innerText = " Data:" + dzien + ":" + miesiac + ":" + rok + " Godzina: " + godzina;
    }

    setInterval(pokazCzas, 1000);
    

  let licznikKoszyka = 0;

  function dodaj() {
    licznikKoszyka++;
    document.getElementById("kropkakoszyk").textContent = licznikKoszyka;
  }
