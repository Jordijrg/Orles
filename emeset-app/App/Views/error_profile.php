<!DOCTYPE html>
<html lang="en" dark id="html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../main.css">

</head>

<body class="dark:bg-gray-900">

<a href="/perfil"></a>

<div id="popup-modal" tabindex="-1" class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-screen">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Error, recorda tenir en compta els seguents criteris:</h3>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">1. Tots els camps han de ser emplenats</h3>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">2. No es poden ingresar dos correus exactament iguals</h3>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">3. La contrasenya ha de tenir 6-13 caracters i almenys un guio, una lletra i un numero</h3>
                
                <a href="/perfil"><button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                    Tornar al perfil
                </button></a>
                </div>
        </div>
    </div>
</div>

<a href="/perfil"></a>

   
    <script src="/js/bundle.js"></script>
</body>

</html>