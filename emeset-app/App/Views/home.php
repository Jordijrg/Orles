<!doctype html>
<html lang="en" id="html">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="main.css">

  <title>Orlify</title>
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
            <img src="images/slider2.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 " alt="1">
            <h2 class="absolute top-0 start-40 z-30 flex items-center justify-center h-full px-4 group focus:outline-none text-blue-600 text-3xl">AMB LES TEVES PRÒPIES </h2> <br>
            <h2 class="absolute top-10 start-40 z-30 flex items-center justify-center h-full px-4 group focus:outline-none text-blue-600 text-3xl"> FOTOS PERSONALITZADES</h2>
            <?php if ($logged) { ?>
            <a class="absolute top-24 start-40 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" href="/alumne"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 animate-jump animate-infinite animate-duration-[8000ms] animate-ease-linear focus:animate-ping animate-once">Anar</button></a>
            <?php }else {?>
            <a class="absolute top-24 start-40 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" href="/login"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 animate-jump animate-infinite animate-duration-[8000ms] animate-ease-linear focus:animate-ping animate-once">Començar</button></a>
            <?php }?>
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
            <img src="images/slider1.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 dark:bg-gray-900" alt="..2">
            <h2 class="absolute top-0 start-40 z-30 flex items-center justify-center h-full px-4 group focus:outline-none text-blue-600 text-3xl">FES LA TEVA ORLA</h2> <br>
            <h2 class="absolute top-10 start-40 z-30 flex items-center justify-center h-full px-4 group focus:outline-none text-blue-600 text-3xl"> PERSONALITZADA</h2>
            <?php if ($logged) { ?>
            <a class="absolute top-24 start-40 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" href="/alumne"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 animate-jump animate-infinite animate-duration-[8000ms] animate-ease-linear focus:animate-ping animate-once">Anar</button></a>
            <?php }else {?>
            <a class="absolute top-24 start-40 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" href="/login"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 animate-jump animate-infinite animate-duration-[8000ms] animate-ease-linear focus:animate-ping animate-once">Començar</button></a>
            <?php }?>
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