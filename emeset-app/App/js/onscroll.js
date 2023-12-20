window.addEventListener("scroll", scrollFunction);
//Funcio per fer qe aparegui el boto de pujar al principi
function scrollFunction() {
    var scrollToTopBtn = document.getElementById("scrollToTopBtn");

    // Muestra u oculta el botón dependiendo del desplazamiento vertical
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollToTopBtn.style.display = "block";
    } else {
        scrollToTopBtn.style.display = "none";
    }
}

function scrollToTop() {
    document.body.scrollTop = 0; // Para navegadores Safari
    document.documentElement.scrollTop = 0; // Para otros navegadores
}

// Agrega un event listener al botón para llamar a la función scrollToTop
document.getElementById("scrollToTopBtn").addEventListener("click", scrollToTop);

export { scrollFunction, scrollToTop };