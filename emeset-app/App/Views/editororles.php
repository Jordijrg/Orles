<!DOCTYPE html>
<html lang="en" id="html">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="main.css">

  <title>Orles</title>
</head>

<body class="dark:bg-gray-900">
    <?php include 'header.php'; ?>

    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-semibold mb-4 dark:text-gray-200">Selecciona una plantilla</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <?php
            $templates = ["Plantilla 1", "Plantilla 2", "Plantilla 3", "Plantilla 4", "Plantilla 5", "Plantilla 6", "Plantilla 7", "Plantilla 8"]; 
            foreach ($templates as $templateIndex => $template) {
            ?>
                <div class="bg-white dark:bg-gray-800 p-4 rounded-md shadow-md relative">
                    <div id="accordion-collapse-<?php echo $templateIndex; ?>" data-accordion="collapse">
                        <h2 id="accordion-collapse-heading-<?php echo $templateIndex; ?>">
                            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-<?php echo $templateIndex; ?>" aria-expanded="false" aria-controls="accordion-collapse-body-<?php echo $templateIndex; ?>">
                                <span><?php echo $template; ?></span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-<?php echo $templateIndex; ?>" class="hidden" aria-labelledby="accordion-collapse-heading-<?php echo $templateIndex; ?>">
                            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            <!--<img src="template_image_<?php echo $template; ?>.jpg" alt="<?php echo $template; ?>" class="w-full mb-2 rounded-md">-->
                            <img src="images/logo.png" alt="<?php echo $template; ?>" class="w-full mb-2 rounded-md">
                            </div>
                        </div>
                    </div>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Seleccionar</button>
                </div>
            <?php } ?>
        </div>
    </div>

    <button id="scrollToTopBtn" class="fixed bottom-4 end-4 bg-black dark:bg-white text-white p-2 rounded-full hidden z-50">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 dark:stroke-black">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>

    <script src="js/flowbite.js"></script>
    <script src="js/bundle.js"></script>
</body>


</html>
