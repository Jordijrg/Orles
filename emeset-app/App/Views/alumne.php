<!DOCTYPE html>
<html lang="en" dark>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="dark:bg-gray-900">
    <div id="header">
        <?php include 'header.php'; ?>
    </div>
    <div class="grid grid-cols-2 gap-4 p-10">
        <div class=" col-span-1 grid grid-cols-3 gap-4">
            <div class="col-span-3 dark:text-white">
                <h2 class="border-l-2 border-l-black pl-2 dark:border-l-white">ORLES</h2>
            </div>

            <?php foreach ($orles as $orla): ?>
                <div class=" col-span-1">
                    <a class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 idgrup"
                        id-grup="<?php echo $orla['IdGrup'] ?>">

                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <?php echo $orla['Nom'] ?>
                        </h5>
                        <div class="font-normal text-gray-700 dark:text-gray-400"><img class="rounded-xl"
                                src="images/<?php echo $orla['SrcImatge'] ?>"></div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="col-span-1 grid grid-cols-3 gap-4">
            <div class="col-span-3 dark:text-white">
                <h2 class="border-l-2 border-l-black pl-2  dark:border-l-white">FOTOGRAFIES</h2>
            </div>
            <?php foreach ($fotografies as $fotografia): ?>
                <div class=" col-span-1">
                    <a href="#" id="<?php echo $fotografia['IdImatge'] ?>"
                        class="imgft block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <?php echo $fotografia['IdImatge'] ?>
                        </h5>
                        <div class="font-normal text-gray-700 dark:text-gray-400"><img
                                data-user="<?php echo $lastorla['IdUsuari'] ?>" id="<?php echo $fotografia['IdImatge'] ?>"
                                class="rounded-xl" src="images/<?php echo $fotografia['Srcimatge'] ?>"></div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div id="addfotoorla" class="col-span-2 grid grid-cols-2 gap-4 hidden mt-3">
            <div class="col-span-2 dark:text-white flex justify-center">
                <div class=" w-auto  text-center text-3xl p-3 ">AFEGIR UNA IMATGE</div>
            </div>
            <div class="col-span-1 dark:text-white">
                <h2 class="border-l-2 border-l-black pl-2  dark:border-l-white">ORLA</h2>
            </div>
            <div class="col-span-1 dark:text-white">
                <h2 class="border-l-2 border-l-black pl-2  dark:border-l-white">IMATGE</h2>
            </div>
            <div class=" col-span-1">
                <a
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white ">
                        <?php echo $lastorla["IdOrla"]; ?>
                    </h5>
                    <div class="font-normal text-gray-700 dark:text-gray-400 "><img class="rounded-xl"
                            src="images/<?php echo $lastorla["SrcImatge"]; ?>"></div>
                </a>
            </div>
            <div class=" col-span-1">
                <a
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white Idfoto">
                        Nom
                    </h5>
                    <div class="font-normal text-gray-700 dark:text-gray-400 srcfoto iduser"><img class="rounded-xl"
                            src="">
                    </div>
                </a>
            </div>
            <div class="col-span-1">
                <a href="/selfoto/{}" class="bt-img" id="">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        Seleccionar Imatge
                    </button></a>
            </div>
            <div class="col-span-1">

            </div>
            <div class="col-span-2 grid grid-cols-6 gap-4 mt-3">
                <div class="col-span-6 dark:text-white ">
                    <h2 class="border-l-2 border-l-black pl-2  dark:border-l-white">IMATGES SELECCIONADES</h2>
                </div>
                <?php foreach ($imgselects as $imgselect): ?>
                    <div class=" col-span-2">
                        <a
                            class="imgft block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">

                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                <?php echo $imgselect['IdImatge'] ?>
                            </h5>
                            <div class="font-normal text-gray-700 dark:text-gray-400"><img class="rounded-xl"
                                    src="images/<?php echo $imgselect['Srcimatge'] ?>"></div>

                        </a>
                        <!-- Modal -->
                        <button id="<?php echo $imgselect['IdImatge'] ?>" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                            class="delft lock text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-blue-800"
                            type="button">
                            Eliminar
                        </button>
                    </div>
                <?php endforeach; ?>
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
    </div>
                            <div id="popup-modal" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="popup-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Estas segur?
                                        </h3>
                                        <a href="/delselfoto/{}" data-modal-hide="popup-modal" type="button"
                                            class="confdel text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                            Sí, ho estic
                                        </a>
                                        <button data-modal-hide="popup-modal" type="button"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                            Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
    <script src="/js/bundle.js"></script>
</body>

</html>