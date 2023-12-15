<!doctype html>
<html lang="en" id="html" dark>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="main.css">
<?php include "script_icons.php" ?>
<style>

</style>
  <title>Todo APP</title>
</head>

<body class="dark:bg-gray-900">
<div id="header">
        <?php include 'header.php'; ?>
</div>

<div class="flex flex-col items-center">
    <h1 class="text-2xl font-semibold my-4">Alumnes</h1>
    <div class="flex flex-wrap justify-center">
    </div>
</div>

<div class="flex flex-wrap justify-center">
    <?php for ($i = 0; $i < 20; $i++) { ?>
        <div class="w-full max-w-sm bg-white rounded-lg dark:bg-gray-800 dark:border-gray-700 mx-2 my-2 " style='width: 200px'>
            <div class="flex justify-end px-4 pt-4">
            </div>
            <div class="flex flex-col items-center pb-10">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="/images/inici.png" alt="Bonnie image"/>
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Adria Jofre</h5>
                <span class="text-sm text-gray-500 dark:text-gray-400">DAW</span>
            </div>
        </div>
    <?php } ?>
</div>

<div class="flex flex-col items-center">
    <h1 class="text-2xl font-semibold my-4">Professors</h1>
    <div class="flex flex-wrap justify-center">
    </div>
</div>

<div class="flex flex-wrap justify-center">
    <?php for ($i = 0; $i < 3; $i++) { ?>
        <div class="w-full max-w-sm bg-white rounded-lg dark:bg-gray-800 dark:border-gray-700 mx-2 my-2" style='width: 200px'>
            <div class="flex justify-end px-4 pt-4">
            </div>
            <div class="flex flex-col items-center pb-10">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="/images/inici.png" alt="Bonnie image"/>
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Adria Jofre</h5>
                <span class="text-sm text-gray-500 dark:text-gray-400">DAW</span>
            </div>
        </div>
    <?php } ?>
</div>










        

<script src="js/flowbite.js"></script>
<script src="js/bundle.js"></script>



</body>

</html>

