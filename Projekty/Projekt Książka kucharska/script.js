function sniadanie() {
    document.querySelector("#sniadanie").style.display = "block";
    document.querySelector("#obiad").style.display = "none";
    document.querySelector("#kolacja").style.display = "none";
    
}
function obiad() {
    document.querySelector("#sniadanie").style.display = "none";
    document.querySelector("#obiad").style.display = "block";
    document.querySelector("#kolacja").style.display = "none";
}
function kolacja() {
    document.querySelector("#sniadanie").style.display = "none";
    document.querySelector("#obiad").style.display = "none";
    document.querySelector("#kolacja").style.display = "block";
}
// search
document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.getElementById("searchInput");

    searchInput.addEventListener("keyup", function () {
        const filter = this.value.toLowerCase();
        const przepisy = document.querySelectorAll("main section div");

        przepisy.forEach(przepis => {
            const text = przepis.innerText.toLowerCase();
            if (text.includes(filter)) {
                przepis.style.display = "";
            } else {
                przepis.style.display = "none";
            }
        });
    });
});


