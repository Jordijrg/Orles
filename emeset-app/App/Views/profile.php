<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/main.css">

  <title>Perfil</title>
</head>
<body>
<div id="header">
        <?php include 'header.php'; ?>
</div>
    
<div class="bg-gray-100 min-h-screen flex items-center justify-center dark:bg-gray-800">

  <div class="bg-white p-8 rounded-lg shadow-md max-w-xl w-full md:w-1/2 dark:bg-gray-700 relative">

  <button data-modal-target="modalperfil" data-modal-toggle="modalperfil" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
Editar Perfil</button>

    <div class="flex justify-center">
      <img src="images/inici.png" alt="Profile Picture" class="w-32 h-32 rounded-full">
    </div>
    <div class="mt-6 text-center">
      <div class="flex flex-col md:flex-row justify-center">
        <h1 class="text-3xl md:text-5xl font-semibold dark:text-white">Tu nombre</h1>
        <h1 class="text-3xl md:text-5xl font-semibold ml-2 md:ml-4 dark:text-white">Tu Apellido</h1>
      </div>
      <p class="text-gray-600 text-base md:text-lg dark:text-gray-400">Alumne/Professor</p>
      <p class="text-gray-600 text-base md:text-lg dark:text-gray-400">tu.email@example.com</p>
    </div>
  </div>
</div>



</div>
<?php include 'modalperfil.php'; ?>
</body>
</html>