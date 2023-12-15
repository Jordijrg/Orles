<!DOCTYPE html>
<html lang="en" dark id="html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/main.css">

</head>

<body class="dark:bg-gray-900">
    <div id="header">
        <?php include 'header.php'; ?>
    </div>

    <div class="grid grid-cols-2 gap-4 p-10">
        <div class=" col-span-2 grid grid-cols-3 gap-4">
            <div class="col-span-3 dark:text-white">
                <h2 class="font-bold text-2xl border-l-2 border-l-black pl-2 dark:border-l-white">ORLES</h2>
            </div>

            <?php foreach ($orles as $orla): ?>
                <div class=" col-span-1 ">
                    <a class=" block max-w-sm p-6  idgrup" id-grup="<?php echo $orla['IdGrup'] ?>">

                        <h5
                            class="p-2 border-t-2 dark:border-t-white border-t-black mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                            <?php echo $orla['Nom'] ?>
                        </h5>
                        <div class=" font-normal text-gray-700 dark:text-gray-400"><img alt="imatge orla" class="rounded-lg"
                                src="/images/<?php echo $orla['SrcImatge'] ?>"></div>
                    </a>
                </div>
            <?php endforeach; ?>
            <?php if ($res == 1): ?>
                <!-- Modal -->
                <div id="myModal2"
                    class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-8 rounded shadow-md border border-2 border-black dark:border-zinc-600 dark:bg-gray-700 dark:text-white">
                    <!-- Contenido del modal -->
                    <p class="text-xl font-bold mb-4">La imatge s'ha afegit correctament</p>
                    <p class="text-gray-600 dark:text-gray-200">La teva imatge s'ha afegit correctament a la orla.</p>

                    <!-- Botón de cierre (X) -->
                    <button id="closeModal"
                        class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 focus:outline-none dark:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>

            <?php endif; ?>
            <?php if ($res2 == 1): ?>
                <!-- Modal -->
                <div id="myModal2"
                    class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-8 rounded shadow-md border border-2 border-black dark:border-zinc-600 dark:bg-gray-700 dark:text-white">
                    <!-- Contenido del modal -->
                    <p class="text-xl font-bold mb-4">La imatge s'ha eliminat correctament</p>
                    <p class="text-gray-600 dark:text-gray-200">La teva imatge s'ha eliminat correctament a la orla.</p>

                    <!-- Botón de cierre (X) -->
                    <button id="closeModal"
                        class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 focus:outline-none dark:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>

            <?php endif; ?>
        </div>

        <div class="col-span-2 grid grid-cols-3 gap-4">
            <div class="col-span-3 grid grid-cols-2 dark:text-white">
                <h2 class="font-bold text-2xl border-l-2 border-l-black pl-2  dark:border-l-white col-span-1">FOTOGRAFIES</h2>
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                    class="col-span-1 block text-white bg-black hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-blue-800"
                    type="button">
                    Notificar Error
                </button>
            </div>

            <!-- Main modal -->
            <div id="crud-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Notificar Error
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="crud-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5" method="POST" action="/noterror">
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Missatge
                                    </label>
                                    <textarea name="description" id="description" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Documenta el problema"></textarea>
                                </div>
                                <div class="col-span-2 font-medium dark:text-white">*En cas de que sigui un problema amb
                                    alguna imatge, cal especificar la imatge*</div>
                            </div>
                            <button type="submit"
                                class="text-white inline-flex items-center bg-lime-500 hover:bg-lime-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-lime-500 dark:hover:bg-lime-700 dark:focus:ring-blue-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Enviar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <?php foreach ($fotografies as $fotografia): ?>
                <div data-modal-target="default-modal" data-modal-toggle="default-modal" class=" col-span-1">
                    <a href="#" id="<?php echo $fotografia['IdImatge'] ?>" Nom
                        class="imgft block max-w-sm p-6  rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 ">

                        <h5
                            class="p-2 border-t-2 dark:border-t-white border-t-black mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                            <?php echo $fotografia['Nomuser']; ?>
                            <?php echo $fotografia['Coguser']; ?>
                        </h5>
                        <div class="font-normal text-gray-700 dark:text-gray-400 flex justify-center"><img alt="imatge persona"
                                data-user="<?php echo $lastorla['IdUsuari'] ?>"
                                class="object-cover w-32 h-32 mb-3 rounded-full shadow-lg overflow-hidden"
                                src="/images/<?php echo $fotografia['Srcimatge'] ?>"></div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Main modal -->
        <div id="default-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-4xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            AFEGIR UNA IMATGE A LA ORLA
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div id="modalselectorla" class="p-4 md:p-5 space-y-4 ">
                        <div id="addfotoorla" class="col-span-2 grid grid-cols-2 gap-4 hidden mt-3">
                            <div class="col-span-1 dark:text-white">
                                <h2 class="border-l-2 border-l-black pl-2  dark:border-l-white">ORLA</h2>
                            </div>
                            <div class="col-span-1 dark:text-white">
                                <h2 class="border-l-2 border-l-black pl-2  dark:border-l-white">IMATGE</h2>
                            </div>
                            <div class=" col-span-1 flex justify-center">
                                <a class="block max-w-sm p-6 rounded-lg  ">
                                    <div class="font-normal text-gray-700 dark:text-gray-400 "><img alt="imatge orla" class="rounded-lg"
                                            src="/images/<?php echo $lastorla["SrcImatge"]; ?>"></div>
                                </a>
                            </div>
                            <div class=" col-span-1 flex justify-center">
                                <a class="block max-w-sm p-6  rounded-lg  ">
                                    <div class="font-normal text-gray-700 dark:text-gray-400 srcfoto iduser"><img alt="imatge persona"
                                            class="object-cover w-48 h-48 mb-3 rounded-full shadow-lg" src="/">
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <a class="bt-img" id="redirecion">
                            <button id="imgft"
                                class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                Seleccionar Imatge
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-2 grid grid-cols-6 gap-4 mt-3">
            <div class="col-span-6 dark:text-white ">
                <h2 class="font-bold text-2xl border-l-2 border-l-black pl-2  dark:border-l-white">IMATGES SELECCIONADES</h2>
                <div>
                    <?php echo $error ?>
                </div>
            </div>
            <?php foreach ($imgselects as $imgselect): ?>
                <div class=" col-span-2">
                    <a class=" block max-w-sm p-6 rounded-lg   ">

                        <h5
                            class="p-2 border-t-2 dark:border-t-white border-t-black mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                            <?php echo $imgselect['Nomuser']; ?>
                            <?php echo $imgselect['Coguser']; ?>
                        </h5>
                        <div class="flex justify-center font-normal text-gray-700 dark:text-gray-400 "><img alt="Imatge Seleccionada"
                                class="object-cover w-32 h-32 mb-3 rounded-full shadow-lg"
                                src="/images/<?php echo $imgselect['Srcimatge'] ?>"></div>
                        <button data-id="<?php echo $imgselect['IdImatge'] ?>" data-modal-target="popup-modal"
                            data-modal-toggle="popup-modal"
                            class=" mt-2 delft lock text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-blue-800"
                            type="button">
                            Eliminar
                        </button>

                    </a>

                </div>
            <?php endforeach; ?>
        </div>
        <button id="scrollToTopBtn"
            class="fixed bottom-4 end-4 bg-black dark:bg-white text-white p-2 rounded-full hidden z-50" aria-label="Ir arriba">
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
                    <a href="/delselfoto/{}" data-modal-hide="popup-modal" type="button"
                        class="confdel text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                        Sí, ho estic
                    </a>
                    <button data-modal-hide="popup-modal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                        cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="myModal"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full flex">
        <div class="border border-2 border-black dark:border-zinc-600 dark:text-white modal-container bg-white dark:bg-gray-700 relative p-4 w-80 max-w-4xl max-h-full rounded overflow-y-auto">
            <div class="modal-content py-4 text-left px-6 h-full">
                <!-- Modal Header -->
                <div class="flex justify-between items-center pb-3">
                    <div class="text-2xl font-bold text-red-600">Alerta!</div>
                    <div class="modal-close cursor-pointer z-50">
                    <!-- <div class="modal-close cursor-pointer z-50" data-modal-hide="default-modal"> -->
                        <svg class="fill-current text-black dark:text-white" xmlns="http://www.w3.org/2000/svg"
                            width="18" height="18" viewBox="0 0 18 18">
                            <path
                                d="M18 1.5L16.5 0 9 7.5 1.5 0 0 1.5 7.5 9 0 16.5 1.5 18 9 10.5 16.5 18 18 16.5 10.5 9 18 1.5z" />
                        </svg>
                    </div>
                </div>
                <!-- Contenido del modal -->
                <div class="flex justify-center">
                    <p class="mt-auto mb-auto ">Aquesta imatge ja esta seleccionada</p>
                </div>
            </div>
        </div>
    </div>


    </div>

    <!-- Dentro de tu archivo PHP donde generas la vista -->

    <script src="/js/bundle.js"></script>
</body>

</html>