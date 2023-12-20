<!doctype html>
<html lang="en" id="html">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="main.css">

  <title>Orlify</title>
</head>

<body>

<div>
    <?php include 'header.php';?>
</div>

<div id="controls-carousel" class="relative w-full md:h-screen dark:bg-gray-900" data-carousel="static">
    
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden md:h-screen">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <a href="/alumne">
            <img src="images/slider2.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 " alt="1">
            </a>
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
          <a href="/alumne">
            <img src="images/slider1.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 dark:bg-gray-900" alt="..2">
            </a>
        </div>
       
        <!-- Item 3 -->
      
    </div>
    <!-- Slider controls -->
    <button type="button" class=" absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="bg-slate-950	inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-800/30">
            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="bg-slate-950	inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-800/30">
            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

<button id="scrollToTopBtn" class="fixed bottom-4 end-4 bg-black dark:bg-white text-white p-2 rounded-full hidden z-50" onclick="scrollToTop()" aria-label="Ir arriba">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 dark:stroke-black">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
  </svg>
</button>

<div id="cookieConsent" class="flowbite-modal">
    <div class="flowbite-modal-overlay"></div>
    <div class="flowbite-modal-container">
      <div class="flowbite-modal-content">
        <p>Aquesta web utilitza cookies per millorar la teva experiència</p>
        <button onclick="acceptCookies()">Acceptar</button>
      </div>
    </div>
  </div>









<script src="js/flowbite.js"></script>
<script src="js/bundle.js"></script>

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
    /* Add custom styles for the cookie consent modal */
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
      z-index: 1000; /* Ensure the modal is above other elements */
    }

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


</body>

</html>