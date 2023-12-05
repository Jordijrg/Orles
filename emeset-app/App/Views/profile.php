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
  <title>Perfil</title>
</head>



<body class="dark:bg-gray-900">
        <?php include 'header.php'; ?>
    
<div class="bg-gray-100 min-h-screen flex items-center justify-center dark:bg-gray-800">

  <div class="bg-white p-8 rounded-lg shadow-md max-w-xl w-full md:w-1/2 dark:bg-gray-700 relative">

  <button data-modal-target="modalperfil" data-modal-toggle="modalperfil" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 focus:animate-ping animate-once" type="button">
Editar Perfil</button>

    <div class="flex justify-center">
      <img src="images/inici.png" alt="Profile Picture" class="w-32 h-32 rounded-full">
    </div>
    <div class="mt-6 text-center">
      <div class="flex flex-col md:flex-row justify-center">
        <h1 class="text-3xl md:text-5xl font-semibold dark:text-white"><?php echo $user["Nom"] ?></h1>
        <h1 class="text-3xl md:text-5xl font-semibold ml-2 md:ml-4 dark:text-white"><?php echo $user["Cognom"] ?></h1>
      </div>
      <p class="text-gray-600 text-base md:text-lg dark:text-gray-400"><?php echo $user["rol"] ?></p>
      <p class="text-gray-600 text-base md:text-lg dark:text-gray-400"><?php echo $user["Correu"] ?></p>
    </div>
  </div>
</div>



</div>
<?php include 'modalperfil.php'; ?>
<button id="scrollToTopBtn"
            class="fixed bottom-4 end-4 bg-black dark:bg-white text-white p-2 rounded-full hidden z-50">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="h-6 w-6 dark:stroke-black">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </button>
<script src="js/flowbite.js"></script>
<script src="js/bundle.js"></script>
</body>
</html>