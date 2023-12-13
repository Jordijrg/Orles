<!DOCTYPE html>
<html lang="en" id="html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>

<body class="dark:bg-gray-900">
    
    <div id="header">
        <?php include 'header.php'; ?>
    </div>
    <?php if ($_SESSION["user"]["rol"] == "gestor") {
        ; ?>
        <div class="grid grid-cols-2 gap-7 p-5 content-start ">
                <div class="col-span-1 grid grid-cols-2 gap-7 ">
                    <div class="col-span-2">
                        <h1 class="text-3xl font-bold text-center dark:text-white">Missatges sense llegir <?php echo $missatgesnovists[0]["Count"]; ?> </h1>
                    </div>
                    <?php foreach ($missatgesnovists as $missatgenovist): ?>
                        <div class="bg-gray-100 col-span-2 p-2 block  rounded-lg bg-warning border border-2 border-black dark:border-zinc-600 dark:bg-gray-700">
                            <div class="text-xl border-b-2 border-[#0000002d] px-6 py-3 text-black text-center dark:text-white bg-yellow-400 rounded-lg">
                            <?php echo ($missatgenovist["Nom"]); ?> <?php echo ($missatgenovist["Cognom"]); ?> 
                            </div>
                            <div class="p-6">
                                <h5 class=" text-lg font-medium leading-tight text-black dark:text-white">
                                    Missatge: 
                                </h5>
                                <p class="bg-gray-200 rounded-lg p-3 text-base text-black text-center dark:bg-gray-800 mt-5 break-words dark:text-white">
                                    <?php echo $missatgenovist["TextoError"]; ?> 
                                </p>
                            </div>
                            <a href="/updmissatge/<?php echo $missatgenovist["IdError"]; ?>"><button type="button"
                                    class="mt-2 bg-green-500 missid focus:outline-none text-white  hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2  dark:hover:bg-green-700 dark:focus:ring-green-800">Marcar
                                    com a vist</button></a>
                        </div>
                    <?php endforeach; ?>
                    
                </div>
                <div class="col-span-1 grid grid-cols-2 gap-7">
                    <div class="col-span-2">
                        <h1 class="text-3xl font-bold text-center dark:text-white">Missatges llegits <?php echo $missatgesvists[0]["Count"] ?> </h1>
                    </div>
                    <?php foreach ($missatgesvists as $missatgevist): ?>
                        <div class="col-span-2 dark:text-white">
                            <div
                                class="bg-gray-100 col-span-2 p-2 block  rounded-lg bg-warning border border-2 border-black dark:border-zinc-600 dark:bg-gray-700">
                                <div class="text-xl border-b-2 border-[#0000002d] px-6 py-3 text-black text-center dark:text-white bg-green-500 rounded-lg ">
                                <?php echo ($missatgevist["Nom"]); ?> <?php echo ($missatgevist["Cognom"]); ?> 
                                </div>
                                <div class="p-6">
                                    <h5 class=" text-lg font-medium leading-tight text-black dark:text-white">
                                        Missatge:
                                    </h5>
                                    <p class="rounded-lg p-3 text-base text-black text-center bg-gray-200 mt-5 break-words dark:text-white dark:bg-gray-800">
                                        <?php echo $missatgevist["TextoError"]; ?> 
                                    </p>
                                </div>
                                <button id="<?php echo $missatgevist['IdError'] ?>" data-modal-target="popup-modal"
                                    data-modal-toggle="popup-modal"
                                    class="delmssg mt-2 lock text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-blue-800"
                                    type="button">
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
        </div>
    <?php } else { ?>
        <div>No ets un gestor, no pots veure la pagina</div>
    <?php } ?>
    <div id="popup-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Estas segur?
                    </h3>
                    <a href="/delmssg/{}" data-modal-hide="popup-modal" type="button"
                        class="confdelmssg text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                        Sí, ho estic
                    </a>
                    <button data-modal-hide="popup-modal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                        cancelar</button>
                </div>
            </div>
        </div>
    </div>
    
    <button id="scrollToTopBtn"
        class="fixed bottom-4 end-4 bg-black dark:bg-white text-white p-2 rounded-full hidden z-50">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="h-6 w-6 dark:stroke-black">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18">
            </path>
        </svg>
    </button>
    <script src="/js/bundle.js"></script>
</body>

</html>