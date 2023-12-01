<div id="modalperfil" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">

      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Editar Perfil
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modalperfil">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close Modal</span>
                </button>
            </div>
            <form method="POST" class="p-4 md:p-5 flex flex-wrap" action="/updateprofile">
            <div class="p-4 md:p-5 space-y-4">
            
                <input type="hidden" name="IdUsuari" id="IdUsuari" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="" value="<?php echo $user["IdUsuari"] ?>">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom</label>
                <input type="text" id="Nom" name="Nom" class="mt-1 p-2 border rounded-md w-full" placeholder="Nom" value="<?php echo $user["Nom"] ?>">

                <label for="surname" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mt-4">Cognoms</label>
                <input type="text" id="Cognom" name="Cognom" class="mt-1 p-2 border rounded-md w-full" placeholder="Cognoms" value="<?php echo $user["Cognom"] ?>">

                <!-- <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mt-4">Contrasenya</label> -->
                <!-- <input type="password" id="password" name="password" class="mt-1 p-2 border rounded-md w-full" placeholder="••••••••" value="<?php echo $user["Contrasenya"] ?>"> -->

                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mt-4">Email</label>
                <input type="email" id="Correu" name="Correu" class="mt-1 p-2 border rounded-md w-full" placeholder="blablabla@gmail.com" value="<?php echo $user["Correu"] ?>">
                
                <input type="hidden" name="Contrasenya" id="Contrasenya" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="" value="<?php echo $user["Contrasenya"] ?>">
                <input type="hidden" name="rol" id="rol" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="" value="<?php echo $user["rol"] ?>">
                <input type="hidden" name="estado" id="estado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="" value="<?php echo $user["estado"] ?>">

                <!-- <label for="profileImage" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mt-4">Imagen de Perfil</label>
                <input type="file" id="profileImage" name="profileImage" accept="image/*" class="mt-1 p-2 border rounded-md w-full">  -->

            </div>

            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="modalperfil" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
                <button data-modal-hide="modalperfil" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>
