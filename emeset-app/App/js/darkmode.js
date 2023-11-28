// Función para alternar el modo oscuro y guardar la preferencia
function toggleDarkMode() {
  const htmlElement = document.getElementById('html');
  const isDarkModeEnabled = htmlElement.classList.toggle('dark');

  // Guardar la preferencia en localStorage
  localStorage.setItem('darkMode', isDarkModeEnabled ? 'enabled' : 'disabled');
}

// Agregar evento de cambio al botón para alternar y guardar el modo oscuro
const toggleDarkModeButton = document.getElementById('toggleDarkModeButton');
toggleDarkModeButton.addEventListener('change', toggleDarkMode);

// Verificar y aplicar la preferencia almacenada en localStorage al cargar la página
document.addEventListener('DOMContentLoaded', function() {
  const htmlElement = document.getElementById('html');
  const storedDarkMode = localStorage.getItem('darkMode');

  // Si la preferencia está almacenada y es 'enabled', aplicarla
  if (storedDarkMode === 'enabled') {
    htmlElement.classList.add('dark');
    toggleDarkModeButton.checked = true;
  } else {
    htmlElement.classList.remove('dark');
    toggleDarkModeButton.checked = false;
  }
});



export {toggleDarkMode};