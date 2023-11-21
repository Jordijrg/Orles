<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/main.css">

  <title>Registre</title>
</head>

<div class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="bg-gray-800 p-8 rounded-md shadow-md w-100 text-center">

        <img src="graduacion.png" alt="Logo" class="mx-auto max-w-full h-auto mb-4" style="max-height: 100px;">

        <h2 class="text-2xl font-semibold mb-4 text-white">Registrarse</h2>

        <form action="#" method="POST">

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="username" class="block text-gray-300 text-sm font-medium mb-2">Nom</label>
                    <input type="text" id="username" name="username" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500 bg-gray-700 text-gray-300" required>
                </div>
                <div>
                    <label for="surname" class="block text-gray-300 text-sm font-medium mb-2">Cognom</label>
                    <input type="text" id="surname" name="surname" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500 bg-gray-700 text-gray-300" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-300 text-sm font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500 bg-gray-700 text-gray-300" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-300 text-sm font-medium mb-2">Contrasenya</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500 bg-gray-700 text-gray-300" required>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Registrarse</button>

        </form>

        <p class="mt-4 text-gray-300 text-sm">Ja tens una contrasenya? <a href="#" class="text-blue-500">Inicia Sessio</a></p>

    </div>
</div>


</html>