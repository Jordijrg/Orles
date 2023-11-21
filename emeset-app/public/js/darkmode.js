// Función para alternar el modo oscuro y guardar la preferencia
function toggleDarkMode() {
  const htmlElement = document.getElementById('html');
  const isDarkModeEnabled = htmlElement.classList.toggle('dark');

  // Actualizar el estado del toggle
  const toggleDarkModeButton = document.getElementById('toggleDarkModeButton');
  toggleDarkModeButton.checked = isDarkModeEnabled;

  // Guardar la preferencia en localStorage
  localStorage.setItem('darkMode', isDarkModeEnabled ? 'enabled' : 'disabled');
}

// Agregar evento de clic al botón para alternar y guardar el modo oscuro
const toggleDarkModeButton = document.getElementById('toggleDarkModeButton');
toggleDarkModeButton.addEventListener('click', toggleDarkMode);

// Verificar y aplicar la preferencia almacenada en localStorage al cargar la página
window.addEventListener('load', function() {
  const htmlElement = document.getElementById('html');
  const storedDarkMode = localStorage.getItem('darkMode');

  // Si la preferencia está almacenada, aplicarla y actualizar el estado del toggle
  if (storedDarkMode === 'enabled') {
    htmlElement.classList.add('dark');
    toggleDarkModeButton.checked = true;
  }
});
