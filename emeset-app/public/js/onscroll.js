  window.onscroll = function() { scrollFunction() };

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
