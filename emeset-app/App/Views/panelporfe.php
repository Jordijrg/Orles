<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="main.css">
  <script src="https://unpkg.com/feather-icons"></script>
<style>
#btnmenu{
  left: -1%;
  animation: prueba 2s infinite ;
}
@keyframes prueba {
  0%{
    left: -9px;
  }
  1%{
    left: -8px;
  }
  2%{
    left: -7px;
  }
  3%{
    left: -6px;
  }
  4%{
    left: -5px;
  }
  5%{
    left: -4px;
  }
  6%{
    left: -3px;
  }
  7%{
    left: -2px;
  }
  8%{
    left: -1px;
  }
  9%{
    left: 0px;
  }
  10%{
    left: 1px;
  }
  11%{
    left: 2px;
  }
  12%{
    left: 3px;
  }
  13%{
    left: 4px;
  }
  14%{
    left: 5px;
  }
  15%{
    left: 6px;
  }
  16%{
    left: 7px;
  }
  17%{
    left: 8px;
  }
  18%{
    left: 9px;
  }
  19%{
    left: 8px;
  }
  20%{
    left: 7px;
  }
  21%{
    left: 6px;
  }
  22%{
    left: 5px;
  }
  23%{
    left: 4px;
  }
  24%{
    left: 3px;
  }
  25%{
    left: 2px;
  }
  26%{
    left: 1px;
  }
  27%{
    left: 0px;
  }
  28%{
    left: -1px;
  }
  29%{
    left: -2px;
  }
  30%{
    left: -4px;
  }
  31%{
    left: -5px;
  }
  32%{
    left: -6px;
  }
  34%{
    left: -7px;
  }
  35%{
    left: -8px;
  }
  36%{
    left: -9px;
  }

 
}
</style>
  <title>Todo APP</title>
</head>

<body>
  <?php include "header.php";  ?>
<section class="bg-indigo-50 h-screen">

  <div class="grid grid-cols-7 gap-1">
    <div class="col-span-1" >
        <div >
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10" id="btnmenu" data-status="closed">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
        </div>
        <nav class="navbar">
  <ul class="navbar__menu" id="menu_main">
    <li class="navbar__item">
      <a href="#" class="navbar__link"><i data-feather="home"></i><span>Home</span></a>
    </li>
    <li class="navbar__item">
      <a href="#" class="navbar__link"><i data-feather="message-square"></i><span>Messages</span></a>        
    </li>
    <li class="navbar__item">
      <a href="#" class="navbar__link"><i data-feather="users"></i><span>Customers</span></a>        
    </li>
    <li class="navbar__item">
      <a href="#" class="navbar__link"><i data-feather="folder"></i><span>Projects</span></a>        
    </li>
    <li class="navbar__item">
      <a href="#" class="navbar__link"><i data-feather="archive"></i><span>Resources</span></a>        
    </li>
    <li class="navbar__item">
      <a href="#" class="navbar__link"><i data-feather="help-circle"></i><span>Help</span></a>        
    </li>
    <li class="navbar__item">
      <a href="#" class="navbar__link" id="btn_close"><i data-feather="x" ></i><span>Cerrar</span></a>        
    </li>
  </ul>
</nav>

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