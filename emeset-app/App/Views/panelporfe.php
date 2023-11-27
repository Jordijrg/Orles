<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="main.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
 <script>
     $( function() {
                                    $( "#accordion" ).accordion({
                                      collapsible: true
                                    });
                                  } );
 </script>
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
                <input type="search" id="grupo_search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar grupo" required>
            </div>
        </form>
        <div class="grupos " id="valores_grupos">
        <div id="accordion" class="valores_grupos">
                               
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
  


<!-- Modal toggle -->
<button  data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  Toggle modal
</button>
<button  type="button">
  Toggle modal
</button>

<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full ">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Informacion del alumno
              </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Cerrar!</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="grid grid-cols-3 gap-1">

<div class="col-span-1 flex justify-center" >

<img class="rounded-full w-32 h-32 object-cover " src="images/logo.png" alt="image description">
</div>
<div class="col-span-2" >

<div class="flex flex-col ">
  <div class="mt-5">
<button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800  float-right">Añadir imagenes</button>
</div>

<h3 class="underline	text-center	"  >Imagenes del alumno</h3>
</div>
<div class="flex justify-center">
<div class="grid gap-7 grid-cols-3 	 ">
    <div><img src="" alt="1"></div>
</div>
</div>       
</div>
                  <hr class="mb-5">
</div>

</div>
            </div>
            <!-- Modal footer -->
         
        </div>
    </div>




</section>



<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

<script src="js/bundle.js"></script>



</body>

</html>