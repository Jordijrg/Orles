<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/main.css">

  <title>Exemple de zona privada</title>
</head>

<body>
  <div class="container mx-auto p-10">
    <div class="grid grid-cols-1 gap-4">
      <div>
        <h1 class="mb-4 text-xl font-extrabold tracking-tight leading-none text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Exemple de zona privada del Framework Emeset</h1>

        <a href="/" class="focus:outline-none text-white bg-orange-400 hover:bg-orange-500 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 my-2">Accedeix a la zona pública</a>

        <a href="/tancar-sessio" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 my-2">Tanca la sessió de <?= $usuari ?></a>
      </div>
    </div>

    <div class="grid grid-cols-1 gap-4 mt-10">
      <div class="text-base">
        <p><?= $missatge  ?></p>
      </div>
    </div>
  </div>
  <div id="cookieConsent" class="flowbite-modal">
    <div class="flowbite-modal-overlay"></div>
    <div class="flowbite-modal-container">
      <div class="flowbite-modal-content">
        <p>Aquesta web utilitza cookies per millorar la teva experiència</p>
        <button onclick="acceptCookies()">Acceptar</button>
      </div>
    </div>
  </div>

<script>
    // Check if the user has already accepted cookies
    if (!localStorage.getItem('cookieConsent')) {
      // Show the cookie consent modal
      document.getElementById('cookieConsent').style.display = 'block';
    }

    // Function to set a flag in localStorage when the user accepts cookies
    function acceptCookies() {
      localStorage.setItem('cookieConsent', 'true');
      document.getElementById('cookieConsent').style.display = 'none';
    }
  </script>

<style>
    /* Add custom styles for the cookie consent modal /
    #cookieConsent {
      display: block;
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background-color: #333;
      color: #fff;
      padding: 10px;
      text-align: center;
      z-index: 1000; / Ensure the modal is above other elements }*/
    

    #cookieConsent button {
      background-color: #4CAF50;
      color: white;
      padding: 5px 10px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
      margin-top: 10px;
      margin-bottom: 10px;
    }
  </style>
  <script src="/js/bundle.js"></script>
</body>

</html>