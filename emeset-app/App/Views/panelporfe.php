<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="main.css">
<?php include "script_icons.php" ?>
<style>

</style>
  <title>Todo APP</title>
</head>

<body>
  <?php include "header.php";  ?>
<section class="bg-indigo-50 h-screen">

  <div class="grid grid-cols-7 gap-1">
    <div class="col-span-1" >
       
    <?php include "nav_panel.php"; ?>
    </div>
    
    <div class="col-span-6  mt-50 ">
    <h1 class="mt-20 mb-20 text-center">Aqui puedes hacer una busqueda de los grupos y orlas</h1>
      <div class="grid grid-cols-2 gap-5" >
        <div   class="">
        <form>   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar grupo" required>
            </div>
        </form>
        <div class="grupos">
            <div class="border-b-2 border-b-indigo-400 mt-10 flex flex-row	justify-between	">
                <p>Nobre del grupo</p>
                <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                <span class="relative transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0 px-7 p-1">
                    Visualizar
                </span>
                </button>
            </div>
          </div>  
      </div>
      <div >
      <form>   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar orla" required>
            </div>
        </form>
        <div class="orlas">
            <div class="border-b-2 border-b-indigo-400 mt-10  flex flex-row	justify-center p-2">
                <p>Nombre de la orla </p>
            </div>
          </div>  
      </div>
      </div>
      </div>
    
    </div>

  </div>
</section>
<script src="js/flowbite.js"></script>
<script src="js/bundle.js"></script>


</body>

</html>