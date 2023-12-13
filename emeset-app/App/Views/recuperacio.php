<?php
print_r($Correu);
?>
<!doctype html>
<html lang="en" id="html">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/main.css">

  <title>Inicia Sessio</title>
</head>

<body>
  <div><?php include 'header.php'; ?></div>
  

<?php if ($missatge == "success") { ?>
  <section class="bg-gray-50 dark:bg-gray-900 h-screen">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <div
        class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-slate-950 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Correu enviat
          </h1>
            <div>
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">El correu electrònic s'ha enviat correctament.</label>
            </div>
            <div>
              <label for="password"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Segueix els passos del correu electrònic per recuperar la contrasenya</label>
            </div>

            <a href="https://mail.google.com/mail/">
            <button type="submit"
              class="w-full bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 bg-gray-200 focus:animate-ping animate-once">Ves al correu</button>
              </a>
        </div>
      </div>
    </div>
  </section>
<?php } else { ?>
    <section class="bg-gray-50 dark:bg-gray-900 h-screen">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#"
        class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white dark:rounded-xl">
        <img class="w-24 h-24 mr-2 " src="/img/logo.png" alt="logo">

      </a>
      <div
        class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-slate-950 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Recuperar la contrasenya
          </h1>
          <form method="POST" class="space-y-4 md:space-y-6" action="/recuperarPass">
            <div>
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Introdueixel correu</label>
              <input type="text" name="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="name@company.com" required="">
            </div>
            <button type="submit"
              class="w-full bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 bg-gray-200 focus:animate-ping animate-once">Recuperar</button>
            
          </form>
        </div>
      </div>
    </div>
  </section>
<?php } ?>




  <script src="/js/bundle.js"></script>

</body>

</html>