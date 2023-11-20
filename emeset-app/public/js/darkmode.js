    // Función para alternar el modo oscuro y guardar la preferencia
    function toggleDarkMode() {
      const htmlElement = document.getElementById('html');
      htmlElement.classList.toggle('dark');

      // Guardar la preferencia en localStorage
      const isDarkModeEnabled = htmlElement.classList.contains('dark');
      localStorage.setItem('darkMode', isDarkModeEnabled ? 'enabled' : 'disabled');
    }

    // Agregar evento de clic al botón para alternar y guardar el modo oscuro
    document.getElementById('toggleDarkModeButton').addEventListener('click', toggleDarkMode);

    // Verificar y aplicar la preferencia almacenada en localStorage al cargar la página
    window.addEventListener('load', function() {
      const htmlElement = document.getElementById('html');
      const storedDarkMode = localStorage.getItem('darkMode');

      // Si la preferencia está almacenada, aplicarla
      if (storedDarkMode === 'enabled') {
        htmlElement.classList.add('dark');
      }
    });
