<!doctype html>
<html lang="en" id="html">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="main.css">

  <title>Todo APP</title>
</head>

<body>

<div>
    <?php include 'header.php';?>
</div>

<div id="controls-carousel" class="relative w-full md:h-screen dark:bg-gray-900" data-carousel="static">
    
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden md:h-screen">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <a href="/alumne">
            <img src="images/slider2.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 " alt="1">
            </a>
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
          <a href="/alumne">
            <img src="images/slider1.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 dark:bg-gray-900" alt="..2">
            </a>
        </div>
       
        <!-- Item 3 -->
      
    </div>
    <!-- Slider controls -->
    <button type="button" class=" absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="bg-slate-950	inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-800/30">
            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="bg-slate-950	inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-800/30">
            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

<button id="scrollToTopBtn" class="fixed bottom-4 end-4 bg-black dark:bg-white text-white p-2 rounded-full hidden z-50" onclick="scrollToTop()">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 dark:stroke-black">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
  </svg>
</button>


<div class="flex justify-center mt-8">

    
        <h1 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">COM FUNCIONA ?</h1>
  

</div>




<div class="flex justify-center mt-8">

    <!-- Primer div -->
    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-4">
        <div class="flex flex-col items-center pb-10">
            <img class="w-24 h-24 mb-3" src="/images/portatil.png" alt="Bonnie image"/>
            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Afegeix els usuaris</h5>
            <span class="text-sm text-gray-500 dark:text-gray-400">Afegeix els usuaris d'un en un o en masa</span>
        </div>
    </div>

    <!-- Segon div -->
    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-4">
        <div class="flex flex-col items-center pb-10">
            <img class="w-24 h-24 mb-3" src="/images/camara.png" alt="Bonnie image"/>
            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Afegeix les fotos</h5>
            <span class="text-sm text-gray-500 dark:text-gray-400">Pots pujar la foto o bé fer-la amb la camara del teu dispositiu</span>
        </div>
    </div>

    <!-- Tercer div -->
    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-4">
        <div class="flex flex-col items-center pb-10">
            <img class="w-24 h-24 mb-3" src="/images/diploma.png" alt="Bonnie image"/>
            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Tria el disseny</h5>
            <span class="text-sm text-gray-500 dark:text-gray-400">Tria el disseny i imprimeix la teva orla!</span>
        </div>
    </div>

</div>





<script src="js/flowbite.js"></script>
<!-- <script>
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
</script> -->
<script src="js/bundle.js"></script>

</body>

</html>