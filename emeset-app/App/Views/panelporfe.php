  <!doctype html>
<html lang="en" id="html">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="main.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
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

  <title>Panel de Professor</title>
</head>

<body>
  
  <?php include "header.php";  ?>
<section class="bg-indigo-50 h-screen">

  <div class="grid grid-cols-1 gap-1">
   
    
    <div class="col-span-6  mt-50 ">
    <h1 class="mt-20 mb-20 text-center">Aquí pots fer una cerca dels grups i orles</h1>
      <div class="grid  gap-5" >
        <div   class="">
        <form>   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="grupo_search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar grup
" required>
            </div>
        </form>
        <div class="grupos " id="valores_grupos">
        <div id="accordion" class="valores_grupos">

                                </div>
 
          </div>  
      </div>
     
      </div>
      </div>
    
    </div>

  </div>
  

<!-- 



 -->
<!-- Modal toggle -->



</section>





</form>

<button id="scrollToTopBtn"
            class="fixed bottom-4 end-4 bg-black dark:bg-white text-white p-2 rounded-full hidden z-50">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="h-6 w-6 dark:stroke-black">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </button>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

<script src="/js/bundle.js"></script>



</body>

</html>
