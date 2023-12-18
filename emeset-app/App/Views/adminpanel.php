<!doctype html>
<html lang="en" id="html">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="main.css">
<?php include "script_icons.php" ?>
<style>

</style>
  <title>Admin Panel</title>
</head>



<body class="dark:bg-gray-900">
<!-- INCLUDE HEADER -->
<?php include "header.php" ?>

<!-- CREATE SIDEBAR TO MOVE IN DIFFERENT DIVS -->
<div>
    <nav class="navbar dark:bg-gray-900 border-inherit">
  <ul class="navbar__menu">
    <li class="navbar__item cursor-pointer" id="usuarisbtn">
      <a class="navbar__link" ><i data-feather="user"></i><span>Usuaris</span></a>        
    </li>
    <li class="navbar__item cursor-pointer" id="grupsbtn">
      <a href="#" class="navbar__link"><i data-feather="users"></i><span>Grups</span></a>        
    </li>
    <li class="navbar__item cursor-pointer" id="orlasbtn">
      <a  class="navbar__link" ><i data-feather="folder"></i><span>Orles</span></a>        
    </li>
    <li class="navbar__item cursor-pointer" id="usuarigrupsbtn">
      <a href="#" class="navbar__link"><i data-feather="users"></i><span>Usuari/Grup</span></a>        
    </li>
    
               <li class="navbar__item cursor-pointer" id="orlas_generadasbtn">
      <a href="#" class="navbar__link"><i data-feather="users"></i><span>Orles Existents</span></a>        
    </li>
    <?php
    if ($user["rol"] === "equip_directiu" || $user["rol"] === "profe" || $user["rol"] === "admin") { ?>
            <li class="navbar__item">
              <a href="/editororles" class="navbar__link cursor-pointer"><i data-feather="message-square"></i><span>Plantilles</span></a>
            </li>
            <?php
    }
    ?>
  </ul>
  </ul>
</nav>
</div>

<!-- DIV TO SHOW THE USERS -->
<div id="usuaris" class="relative overflow-x-auto shadow-md sm:rounded-lg ml-36 mr-10">
    <div class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="text" id="table-search-users" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" aria-label="Buscador per usuaris">

        </div>
    </div>
    <table id="userTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Usuaris
                </th>
                <th scope="col" class="px-6 py-3">
                    Nom
                </th>
                <th scope="col" class="px-6 py-3">
                    Correu
                </th>
                <th scope="col" class="px-6 py-3">
                    Rol
                </th>
                <th scope="col" class="px-6 py-3">
                    Estat
                </th>
                <th scope="col" class="px-6 py-3">
                    Editar
                </th>
                <th scope="col" class="px-6 py-3">
                    Eliminar
                </th>
            </tr>
        </thead>
        <tbody>
           
        <?php foreach ($usuaris as $usuari) {
            ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-10 h-10 rounded-full" src="images/inici.png" alt="Jese image">
                    <div class="ps-3">
                        <div class="text-base font-semibold"><?php echo $usuari['Nom'] . " " . $usuari["Cognom"]; ?></div>
                        <div class="font-normal text-gray-500"><?php echo $usuari['Correu']; ?></div>
                    </div>  
                </th>
                <td class="px-6 py-4">
                    <?php echo $usuari['Nom'] . " " . $usuari["Cognom"]; ?>
                </td>
                <td class="px-6 py-4">
                    <?php echo $usuari['Correu']; ?>
                </td>
                <td class="px-6 py-4">
                    <?php echo $usuari['rol']; ?>
                </td>
                <td class="px-6 py-4">
                    <?php if ($usuari['estado'] === "desactivat") { ?>
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-red-600 me-2"></div> <?php echo $usuari['estado']; ?>
                            </div>
               <?php } elseif (($usuari['estado'] === "pendent")) { ?>
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-yellow-400 me-2"></div> <?php echo $usuari['estado']; ?>
                            </div>
                    <?php } else { ?>
                                <div class="flex items-center">
                                    <div class="h-2.5 w-2.5 rounded-full bg-lime-500 me-2"></div> <?php echo $usuari['estado']; ?>
                                </div>
                    <?php } ?>
                </td>
                <td class="px-6 py-4">
                    <a href="#" type="button" data-modal-target="editUserModal" data-modal-show="editUserModal" data-user-id="<?= $usuari['IdUsuari'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline openModal focus:animate-ping animate-once">Editar</a>

                </td>
                <td class="px-6 py-4">
                  <a href="/deleteuser/<?= $usuari['IdUsuari'] ?>" class="delete font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Eliminar</a>
                </td>
            </tr>
            <?php
        }
        ?>

    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 cursor-pointer" data-modal-target="crud-modal" data-modal-toggle="crud-modal">
        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
            <a class="navbar__link" id="afgUser"><i data-feather="plus"></i></a> 
            <div class="ps-3">
                <div class="text-base font-semibold" >Afegir Usuari</div>
                
            </div>  
        </th>
        
    </tr>
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 cursor-pointer"
                    data-modal-target="default-modal" data-modal-toggle="default-modal">
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <a class="navbar__link"><i data-feather="plus"></i></a>
                        <div class="ps-3">
                            <div class="text-base font-semibold">Afegir CSV</div>

                        </div>
                    </th>

                </tr>
                <!-- Main modal -->
                <div id="default-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Terms of Service
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="default-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <h1 class="text-lg font-semibold mb-4">Importar Usuarios</h1>
                                <form id="csvForm" method="POST" action="/userimport" enctype="multipart/form-data">
                                    <label for="csvFile">Selecciona un archivo CSV:</label>
                                    <input name="CSV" type="file" id="csvFile" accept=".csv" required>
                                    <button class="font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-green-300" type="submit">Importar</button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            
        </tbody>
    </table>

    <!-- DIV TO SHOW THE USERS -->
    
                

            </tbody>
        </table>


        <!-- MODAL TO ADD USERS -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Afegir usuari
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form method="POST" class="p-4 md:p-5 flex flex-wrap" action="/adduser">
                        <div class="grid gap-4 mb-4 grid-cols-7">
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                                <input type="text" name="Nom" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required="">
                            </div>
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cognom</label>
                                <input type="text" name="surname" id="surname"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required="">
                            </div>
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correu</label>
                                <input type="text" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required="">
                            </div>
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contrasenya</label>
                                <input type="text" name="Contrasenya" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required="">
                            </div>
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol</label>
                                <input type="text" name="role" id="role"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                                <input type="text" name="state" id="state"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required="">

                            </div>
                            <div>
                                <button type="submit"
                                    class="mt-7 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 focus:animate-ping animate-once">Afegir</button>
                            </div>
                            <div>
                                <a href="#" id="userrandom" type="button" data-modal-target="randommodal"
                                    data-modal-show="randommodal" data-user-id="<?= $usuari['IdUsuari'] ?>"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline modalRandom focus:animate-ping animate-once">Usuari
                                    Aleatori</a>
                            </div>
                        </div>
                </div>
                </form>

            </div>
        </div>
        
    </div>

    <div id="randommodal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Afegir usuari
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="randommodal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form method="POST" class="p-4 md:p-5 flex flex-wrap" action="/adduserrandom">
                    <div class="grid gap-4 mb-4 grid-cols-7">
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                            <input type="text" name="namess" id="namess"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                        </div>
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cognom</label>
                            <input type="text" name="surnames" id="surnames"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                        </div>
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correu</label>
                            <input type="text" name="emails" id="emails"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                        </div>
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contrasenya</label>
                            <input type="text" name="password" id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                        </div>
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol</label>
                            <input type="text" name="roles" id="roles"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                            <input type="text" name="states" id="states"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">

                        </div>
                        <div>
                            <button type="submit"
                                class="mt-7 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 focus:animate-ping animate-once">Afegir</button>
                        </div>
                    </div>
            </div>
            </form>

        </div>
    </div>
    </div>

    <!-- MODAL TO EDIT USERS -->
    <div id="editUserModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Editar usuari
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="editUserModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form method="POST" class="p-4 md:p-5 flex flex-wrap" action="/updateuser">
                    <div class="grid gap-4 mb-4 grid-cols-7">
                        <div>
                            <input type="hidden" name="IdUsuari" id="ID"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                            <input type="text" name="Nom" id="Nom"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                        </div>
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cognom</label>
                            <input type="text" name="Cognom" id="Cognom"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                        </div>
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correu</label>
                            <input type="text" name="Correu" id="Correu"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                        </div>
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contrasenya</label>
                            <input type="text" name="Contrasenya" id="Contrasenya1"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol</label>
                            <input type="text" name="rol" id="Rol"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div>
                            <label for="estado"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                            <select name="estado" id="Estado"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                                <option value="desactivat">Desactivat</option>
                                <option value="pendent">Pendent</option>
                                <option value="actiu">Actiu</option>
                            </select>
                        </div>

                        <div>
                            <button type="submit"
                                class="mt-7 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 focus:animate-ping animate-once">Actualitzar</button>
                        </div>

                    </div>
            </div>
            </form>

        </div>
    </div>
</div> 

<div id="randommodal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-7xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Afegir usuari
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="randommodal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form method="POST" class="p-4 md:p-5 flex flex-wrap" action="/adduserrandom">
    <div class="grid gap-4 mb-4 grid-cols-7">
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
            <input type="text" name="namess" id="namess" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
        </div>
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cognom</label>
            <input type="text" name="surnames" id="surnames" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
        </div>
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correu</label>
            <input type="text" name="emails" id="emails" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
        </div>
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contrasenya</label>
            <input type="text" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
        </div>
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol</label>
            <input type="text" name="roles" id="roles" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
        </div>
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
            <input type="text" name="states" id="states" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">

        </div>
        <div>
          <button type="submit" class="mt-7 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 focus:animate-ping animate-once">Afegir</button>
        </div>
      </div>
    </div>
</form>

        </div>
    </div>
</div> 

    <!-- MODAL TO EDIT USERS -->
    <div id="editUserModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-7xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Editar usuari
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editUserModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form method="POST" class="p-4 md:p-5 flex flex-wrap" action="/updateuser">
    <div class="grid gap-4 mb-4 grid-cols-7">
        <div>
            <input type="hidden" name="IdUsuari" id="ID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
            <input type="text" name="Nom" id="Nom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
        </div>
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cognom</label>
            <input type="text" name="Cognom" id="Cognom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
        </div>
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correu</label>
            <input type="text" name="Correu" id="Correu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="" >
        </div>
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contrasenya</label>
            <input type="text" name="Contrasenya" id="Contrasenya1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
        </div>
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol</label>
            <input type="text" name="rol" id="Rol" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
        </div>
        <div>
    <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
    <select name="estado" id="Estado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
        <option value="desactivat">Desactivat</option>
        <option value="pendent">Pendent</option>
        <option value="actiu">Actiu</option>
    </select>
</div>

        <div>
          <button type="submit" class="mt-7 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 focus:animate-ping animate-once">Actualitzar</button>
        </div>
        
      </div>
    </div>
</form>

        </div>
    </div>
</div>


    <!-- DIV TO SHOW THE ORLAS -->
    <div id="orlas" class="relative sm:rounded-lg ml-36 mr-10 hidden">
        <div class="flex items-center	">
            <div class="ps-3">
                <a href="/crear_orlaplantilla">
                    <div class="text-base font-semibold flex items-center" style="    border: 2px solid;
    padding: 20px;
    margin-top: 20px;
    margin-bottom: 20px;
    border-radius:10px;
">
                        <p>Afegir plantilla d'una orle</p>
                        <a class="" style="float:right;"><i data-feather="plus"></i></a>
                    </div>

                        </div>        
                        </a>     
      
                      
                        </div>
<div class="grid grid-cols-3">
 
<?php  

foreach ($plantillaorla as $key => $value) {?>

<div data-modal-target="static-modal" data-modal-toggle="static-modal" class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div>
                <a href=""></a>
            </div>
            </a>


        </div>
        <div class="grid grid-cols-3">
            <div data-modal-target="static-modal" data-modal-toggle="static-modal"
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div>
                    <a href=""></a>
                </div>
                <a href="#">
                    <img class="rounded-t-lg" src="/images/img1.jpg" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <?php echo $value["nom"]; ?>
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                        technology
                        acquisitions of 2021 so far, in reverse chronological order.</p>
                </div>
            </div>
            <button id="scrollToTopBtn"
                class="fixed bottom-4 end-4 bg-black dark:bg-white text-white p-2 rounded-full hidden z-50">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="h-6 w-6 dark:stroke-black">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18">
                    </path>
                </svg>
            </button>
            <?php

            foreach ($plantillaorla as $key => $value) { ?>



            <?php } ?>
        </div>
    </div>







<button id="scrollToTopBtn" class="fixed bottom-4 end-4 bg-black dark:bg-white text-white p-2 rounded-full hidden z-50" onclick="scrollToTop()" style="display: none;">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
    <path d="M0 0h24v24H0V0z" fill="none"/>
    <path d="M7.41 15.41L12 12l4.59-4.59L18.58 12 12 18.58 7.41 15.41z"/>
  </svg>
  <span aria-label="Scroll to top">Scroll to top</span>
</button>
    
</div>





<!-- DIV TO SHOW ORLAS GENERATED -->
<div id="orlas_generadas" class="relative sm:rounded-lg ml-36 mr-10 hidden ">
       
<div class="grid grid-cols-3">
 
<?php  

foreach ($orlas as $key => $value) {?>

<div  class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div>
                <p>Estat de l'orle <span id="<?php  echo "estado".$value["IdOrla"]; ?>"> <?php echo $value["estat"]; ?></span></p> 
            <label class="relative inline-flex items-center cursor-pointer">
                 
            <input type="checkbox" value="<?php echo $value["estat"]; ?>" class="sr-only peer btn_viwer_ora" id="" data-id="<?php echo $value["IdOrla"]; ?>" <?php 
                if($value["estat"]=="invisible"){

                }else{
                    echo "checked";
                }
            
            ?>>
                    
                    <div
                      class="w-8 h-4 bg-gray-200 rounded-full peer peer-focus:ring-2 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-3 after:w-3 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>

                  </label>            </div>
            
                <img class="rounded-t-lg" src="/images/img1.jpg" alt="" />
            
            <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $value["nomorle"]; ?></h5>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $value["datacreacio"]; ?></h5>
                
            </div>
        
        </div>
        <button id="scrollToTopBtn"
            class="fixed bottom-4 end-4 bg-black dark:bg-white text-white p-2 rounded-full hidden z-50">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="h-6 w-6 dark:stroke-black">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </button>
        
        <?php }?>
        
</div>
    </div>







<button id="scrollToTopBtn" class="fixed bottom-4 end-4 bg-black dark:bg-white text-white p-2 rounded-full hidden z-50" onclick="scrollToTop()" style="display: none;">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
    <path d="M0 0h24v24H0V0z" fill="none"/>
    <path d="M7.41 15.41L12 12l4.59-4.59L18.58 12 12 18.58 7.41 15.41z"/>
  </svg>
  <span aria-label="Scroll to top">Scroll to top</span>
</button>
    
</div>

<!-- DIV TO SHOW THE GROUPS -->
<div id="grups" class="relative overflow-x-auto shadow-md sm:rounded-lg ml-36 mr-10 hidden">
    <div class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="text" id="table-search-grups" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" aria-label="Buscador per grups">
        </div>
    </div>
    <table id="grupTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nom
                </th>
                <th scope="col" class="px-6 py-3">
                    Data de creació
                </th>
                <th scope="col" class="px-6 py-3">
                    Estat
                </th>
                <th scope="col" class="px-6 py-3">
                    Editar
                </th>
                <th scope="col" class="px-6 py-3">
                    Eliminar
                </th>
            </tr>
        </thead>
        <tbody>
           
        <?php foreach ($grups as $grup) {
            ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="ps-3">
                        <div class="text-base font-semibold"><?php echo $grup['IdGrup'] ?></div>
                    </div>  
                </th>
                <td class="px-6 py-4">
                    <?php echo $grup['Nom'] ?>
                </td>
                <td class="px-6 py-4">
                    <?php echo $grup['data_grup']; ?>
                </td>
                <td class="px-6 py-4">
                    <?php if ($grup['estado'] === "desactivat") { ?>
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-red-600 me-2"></div> <?php echo $grup['estado']; ?>
                            </div>
                    <?php } else { ?>
                                <div class="flex items-center">
                                    <div class="h-2.5 w-2.5 rounded-full bg-lime-500 me-2"></div> <?php echo $grup['estado']; ?>
                                </div>
                    <?php } ?>
                </td>
        
                <td class="px-6 py-4">
                    <a href="#" type="button" data-modal-target="editGrupModal" data-modal-show="editGrupModal" data-grup-id="<?= $grup['IdGrup'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline openModal focus:animate-ping animate-once">Editar</a>

                </td>
                <td class="px-6 py-4">
                  <a href="/deletegrup/<?= $grup['IdGrup'] ?>" class="delete font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Eliminar</a>
                </td>
            </tr>
            <?php
        }
        ?>
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 cursor-pointer" data-modal-target="afegirUsuari" data-modal-toggle="afegirUsuari">
        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
            <a class="navbar__link" id="afgGrup"><i data-feather="plus"></i></a> 
            <div class="ps-3">
                <div class="text-base font-semibold" >Afegir Grup</div>
                
            </div>  
        </th>
        
    </tr>
            
        </tbody>
    </table>
</div> 

<!-- MODAL FOR EDIT GRUPS-->
 <div id="editGrupModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-7xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Editar usuari
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editGrupModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form method="POST" class="p-4 md:p-5 flex flex-wrap" action="/updategrup">
    <div class="grid gap-4 mb-4 grid-cols-7">
        <div>
            <input type="hidden" name="IdGrup" id="IdGrup" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
        </div>
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
            <input type="text" name="Nom" id="NomGrup" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
        </div>
        <div>
    <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
    <select name="estado" id="EstadoGrup" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
        <option value="desactivat">Desactivat</option>
        <option value="actiu">Actiu</option>
    </select>
</div>

<div>
    <select name="estado" id="nomGrup" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 hidden" required="">
        
    </select>
</div>

        <div>
          <button type="submit" class="mt-7 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 focus:animate-ping animate-once">Actualitzar</button>
        </div>
        
      </div>
    </div>
</form>

        </div>
    </div>
</div>


<!-- MODAL TO ADD GRUP -->
<div id="afegirUsuari" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-7xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Afegir grup
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="afegirUsuari">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form method="POST" class="p-4 md:p-5 flex flex-wrap" action="/addgrup">
    <div class="grid gap-4 mb-4 grid-cols-7">
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
            <input type="text" name="Nom" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
        </div>
        <div>
          <button type="submit" class="mt-7 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 focus:animate-ping animate-once">Afegir</button>
        </div>
        
      </div>
    </div>
</form>

        </div>
    </div>
</div>


<!-- DIV TO SHOW USUARIS AND HIS GROUP -->
<div id="usuariGrup" class="relative sm:rounded-lg ml-36 mr-10 hidden">
    <div class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="text" id="table-search-usuarigrup" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-50" aria-label="Buscador per usuaris i grups">

        </div>
    </div>
    <table id="usuarigrupTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nom
                </th>
                <th scope="col" class="px-6 py-3">
                    Grup
                </th>
                <th scope="col" class="px-6 py-3">
                    Editar
                </th>
                <th scope="col" class="px-6 py-3">
                    Eliminar
                </th>
            </tr>
        </thead>
        <tbody>
           
        <?php foreach ($usuari_grup as $usuarigrup) {
            ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="ps-3">
                        <div class="text-base font-semibold"><?php echo $usuarigrup['id_d'] ?></div>
                    </div>  
                </th>
                <td class="px-6 py-4">
                    <?php echo $usuarigrup['nom_usuari'] . " " . $usuarigrup['cognom_usuari'] ?>
                </td>
                <td class="px-6 py-4">
                    <?php echo $usuarigrup['nom_grup'] ?>
                </td>
        
                <td class="px-6 py-4">
                    <a href="#" type="button" data-modal-target="editUserGrupModal" data-modal-show="editUserGrupModal" data-usuarigrup-id="<?= $usuarigrup['id_d'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline openModal focus:animate-ping animate-once">Editar</a>

                </td>
                <td class="px-6 py-4">
                  <a href="/deleteusergrup/<?= $usuarigrup['id_d'] ?>" class="delete font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Eliminar</a>
                </td>
            </tr>
            <?php
        }
        ?>
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 cursor-pointer" data-modal-target="afegirUsuariGrup" data-modal-toggle="afegirUsuariGrup">
        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
            <a class="navbar__link" id="afgUserGrup"><i data-feather="plus"></i></a> 
            <div class="ps-3">
                <div class="text-base font-semibold" >Afegir Grup</div>
                
            </div>  
        </th>
        
    </tr>
            
        </tbody>
    </table>
</div>

<!-- MODAL FOR EDIT USERS AND GROUPS -->
<div id="editUserGrupModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Editar el grup de l'usuari
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editUserGrupModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="/updateusergrup" method="POST">
                    <div>
                        <input type="hidden" name="id_d" id="id_d" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        <input type="block" name="nomUsuari" id="nomUsuari" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" readonly>
                    </div>
                    <div>
                        <select name="nomGrup" id="nomGrup" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            <?php foreach ($grups as $grup) {
                                ?> 
                                    <option value="<?php echo $grup['Nom'] ?>"><?php echo $grup['Nom'] ?></option>
                                    <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualitzar</button>
                    
                </form>
            </div>
        </div>
    </div>
</div> 

<!-- MODAL TO ADD USER TO GROUP -->
<div id="afegirUsuariGrup" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-7xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Afegir usuari grup
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="afegirUsuariGrup">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form method="POST" class="p-4 md:p-5 flex flex-col md:flex-row items-center" action="/addusergrup">
                <div class="grid gap-4 mb-4 grid-cols-7 md:flex items-center">
                    <div class="flex-grow">
                        <select name="nomUsuari" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            <?php foreach ($usuaris as $usuari) { ?>
                                        <option value="<?php echo $usuari['Nom'] ?>"><?php echo $usuari['Nom'] . " " . $usuari['Cognom'] ?></option>
                            <?php } ?>
                        </select>
                        </td>

                        <td class="px-6 py-4">
                            <a href="#" type="button" data-modal-target="editGrupModal" data-modal-show="editGrupModal"
                                data-grup-id="<?= $grup['IdGrup'] ?>"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline openModal focus:animate-ping animate-once">Editar</a>

                        </td>
                        <td class="px-6 py-4">
                            <a href="/deletegrup/<?= $grup['IdGrup'] ?>"
                                class="delete font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Eliminar</a>
                        </td>
                    </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 cursor-pointer"
                    data-modal-target="afegirUsuari" data-modal-toggle="afegirUsuari">
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <a class="navbar__link" id="afgGrup"><i data-feather="plus"></i></a>
                        <div class="ps-3">
                            <div class="text-base font-semibold">Afegir Grup</div>

                        </div>
                    </th>

                </tr>

            </tbody>
        </table>
    </div>

    <!-- MODAL FOR EDIT GRUPS-->
    <div id="editGrupModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Editar usuari
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="editGrupModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form method="POST" class="p-4 md:p-5 flex flex-wrap" action="/updategrup">
                    <div class="grid gap-4 mb-4 grid-cols-7">
                        <div>
                            <input type="hidden" name="IdGrup" id="IdGrup"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                        </div>
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                            <input type="text" name="Nom" id="NomGrup"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                        </div>
                        <div>
                            <label for="estado"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                            <select name="estado" id="EstadoGrup"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                                <option value="desactivat">Desactivat</option>
                                <option value="actiu">Actiu</option>
                            </select>
                        </div>

                        <div>
                            <select name="estado" id="nomGrup"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 hidden"
                                required="">

                            </select>
                        </div>

                        <div>
                            <button type="submit"
                                class="mt-7 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 focus:animate-ping animate-once">Actualitzar</button>
                        </div>

                    </div>
                    <div class="flex-grow">
                        <select name="nomGrup" id="grup" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            <?php foreach ($grups as $grup) { ?>
                                        <option value="<?php echo $grup['Nom'] ?>"><?php echo $grup['Nom'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="mt-4 md:mt-0 w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 focus:animate-ping animate-once">Afegir</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Main modal -->
<div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Generem l'orla!
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Tancar modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form action="/general_orla" method="POST">
            <p>Selecciona un grup per generar l'orle:</p>

            <select name="grupo" id="underline_select" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
            <?php
            foreach ($grups as $key => $value) { ?>
                        <option value="<?php echo $value["IdGrup"] ?>"><?php echo $value["Nom"] . " - " . $value["data_grup"]; ?></option>

            <?php } ?>
                
            </select>
            <p>
                Escogueix les columnes per colocar les imatges
            </p>
            <select name="columnas" id="underline_select" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
            
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="static-modal" type="sumbit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Generar</button>
                <button data-modal-hide="static-modal" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
            </div>
            </form>

        </div>
    </div>
    </div>


    <!-- MODAL TO ADD GRUP -->
    <div id="afegirUsuari" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Afegir grup
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="afegirUsuari">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form method="POST" class="p-4 md:p-5 flex flex-wrap" action="/addgrup">
                    <div class="grid gap-4 mb-4 grid-cols-7">
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                            <input type="text" name="Nom" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                        </div>
                        <div>
                            <button type="submit"
                                class="mt-7 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 focus:animate-ping animate-once">Afegir</button>
                        </div>

                    </div>
            </div>
            </form>

        </div>
    </div>
    </div>


    <!-- DIV TO SHOW USUARIS AND HIS GROUP -->
    <div id="usuariGrup" class="relative sm:rounded-lg ml-36 mr-10 hidden">
        <div
            class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search-usuarigrup"
                    class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-50"
                    aria-label="Buscador per usuaris i grups">

            </div>
        </div>
        <table id="usuarigrupTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nom
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Grup
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Editar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Eliminar
                    </th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($usuari_grup as $usuarigrup) {
                    ?>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="ps-3">
                                        <div class="text-base font-semibold">
                                            <?php echo $usuarigrup['id_d'] ?>
                                        </div>
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    <?php echo $usuarigrup['nom_usuari'] . " " . $usuarigrup['cognom_usuari'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $usuarigrup['nom_grup'] ?>
                                </td>

                                <td class="px-6 py-4">
                                    <a href="#" type="button" data-modal-target="editUserGrupModal"
                                        data-modal-show="editUserGrupModal" data-usuarigrup-id="<?= $usuarigrup['id_d'] ?>"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline openModal focus:animate-ping animate-once">Editar</a>

                                </td>
                                <td class="px-6 py-4">
                                    <a href="/deleteusergrup/<?= $usuarigrup['id_d'] ?>"
                                        class="delete font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Eliminar</a>
                                </td>
                            </tr>
                            <?php
                }
                ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 cursor-pointer"
                    data-modal-target="afegirUsuariGrup" data-modal-toggle="afegirUsuariGrup">
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <a class="navbar__link" id="afgUserGrup"><i data-feather="plus"></i></a>
                        <div class="ps-3">
                            <div class="text-base font-semibold">Afegir Grup</div>

                        </div>
                    </th>

                </tr>


            </tbody>
        </table>
    </div>

    <!-- MODAL FOR EDIT USERS AND GROUPS -->
    <div id="editUserGrupModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Editar el grup de l'usuari
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="editUserGrupModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="/updateusergrup" method="POST">
                        <div>
                            <input type="hidden" name="id_d" id="id_d"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <input type="block" name="nomUsuari" id="nomUsuari"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                readonly>
                        </div>
                        <div>
                            <select name="nomGrup" id="nomGrup"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                                <?php foreach ($grups as $grup) {
                                    ?>
                                            <option value="<?php echo $grup['Nom'] ?>">
                                                <?php echo $grup['Nom'] ?>
                                            </option>
                                            <?php
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualitzar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL TO ADD USER TO GROUP -->
    <div id="afegirUsuariGrup" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Afegir usuari grup
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="afegirUsuariGrup">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form method="POST" class="p-4 md:p-5 flex flex-col md:flex-row items-center" action="/addusergrup">
                    <div class="grid gap-4 mb-4 grid-cols-7 md:flex items-center">
                        <div class="flex-grow">
                            <select name="nomUsuari" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                                <?php foreach ($usuaris as $usuari) { ?>
                                            <option value="<?php echo $usuari['Nom'] ?>">
                                                <?php echo $usuari['Nom'] . " " . $usuari['Cognom'] ?>
                                            </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="flex-grow">
                            <select name="nomGrup" id="grup"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                                <?php foreach ($grups as $grup) { ?>
                                            <option value="<?php echo $grup['Nom'] ?>">
                                                <?php echo $grup['Nom'] ?>
                                            </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div>
                            <button type="submit"
                                class="mt-4 md:mt-0 w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 focus:animate-ping animate-once">Afegir</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Main modal -->
    <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Generem l'orla!
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="static-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Tancar modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form action="/general_orla" method="POST">
                        <p>Selecciona un grup per generar l'orle:</p>

                        <select name="grupo" id="underline_select"
                            class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <?php
                            foreach ($grups as $key => $value) { ?>
                                        <option value="<?php echo $value["IdGrup"] ?>">
                                            <?php echo $value["Nom"] . " - " . $value["data_grup"]; ?>
                                        </option>

                            <?php } ?>

                        </select>
                        <p>
                            Escogueix les columnes per colocar les imatges
                        </p>
                        <select name="columnas" id="underline_select"
                            class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">

                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="static-modal" type="sumbit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Generar</button>
                    <button data-modal-hide="static-modal" type="button"
                        class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                </div>
                </form>

            </div>
        </div>
    </div>


    <script src="js/flowbite.js"></script>
    <script src="js/bundle.js"></script>


</body>



</html>

