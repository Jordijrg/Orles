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
<body>
<div><?php include 'header.php'; ?></div>
  <section class="bg-gray-50 dark:bg-gray-900 h-screen">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#"
        class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white dark:rounded-xl">
        <img class="w-24 h-24 mr-2 " src="img/logo.png" alt="logo">

      </a>
      <div
        class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-slate-950 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Registrarse
          </h1>
          <form method="POST" class="space-y-4 md:space-y-6" action="/register">
            <div class="flex space-x-4"> 
              <div class="w-1/2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nom" required="">
              </div>
              <div class="w-1/2">
                <label for="surname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cognoms</label>
                <input type="text" name="surname" id="surname" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cognoms" required="">
              </div>
            </div>
            <div>
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correu</label>
              <input type="text" name="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="name@company.com" required="">
                <?php if (isset($errorMessage)) : ?>
                  <p class="text-sm font-medium text-red-500"><?= $errorMessage ?></p>
                <?php endif; ?>
            </div>
            <div>
              <label for="password"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contrasenya</label>
              <input type="password" name="password" id="password" placeholder="••••••••"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required="">
            </div>
            <button type="submit"
              class="w-full bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 bg-gray-200">
            Registra't</button>
            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
              Ja tens una compta? <a href="/login"
                class="font-medium text-primary-600 hover:underline dark:text-primary-500">Inicia Sessio</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script src="/js/bundle.js"></script>
</div>

</body>
</html>