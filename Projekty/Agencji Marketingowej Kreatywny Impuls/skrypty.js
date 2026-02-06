function pracownicy()
{
        document.querySelector(".pracownicy").style.backgroundColor = "rgba(203, 132, 247, 1)";
        document.querySelector(".uslugi").style.backgroundColor = "rgb(132, 195, 247)";
         document.querySelector("#uslugi").style. display = "none";
          document.querySelector("#pracownicy").style.display = "block";
              document.querySelector("#klienci").style.display = "none";
             
        
 
};
function uslugi()
{

     document.querySelector(".pracownicy").style.backgroundColor = "rgb(132, 195, 247)";
    document.querySelector(".uslugi").style.backgroundColor = "rgba(203, 132, 247, 1)";
    document.querySelector("#pracownicy").style.display = "none";
    document.querySelector("#uslugi").style.display = "block";
        document.querySelector("#klienci").style.display = "none";

};
function back()
{
       document.querySelector("#back").addEventListener("click", function () {
    window.location.href = "index.php";
});
}
function search()
{
        document.querySelector(".pracownicytabela").style.display = "none";
}

document.getElementById("myForm").addEventListener("submit", function(e) {
    let email = document.getElementById("email").value;

    if (!email.includes("@")) {
        e.preventDefault(); 
        alert("Podaj poprawny email brak znaku @");
    }
})

// tabela kolor zielony
document.querySelectorAll(".pracownicytabela tr").forEach(element => {
        element.addEventListener("click", function ()
{
        this.style.backgroundColor = "green";
})
});
