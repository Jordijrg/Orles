<!doctype html>
<html lang="en" id="html">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="main.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
 <script>
     $( function() {
                                    $( "#accordion" ).accordion({
                                      collapsible: true
                                    });
                                  } );
 </script>
<?php include "script_icons.php" ?>
<style>

</style>
  <title>Todo APP</title>
</head>

<body>
  <?php include "header.php";  ?>
<section class="bg-indigo-50 h-screen">

  <div class="grid grid-cols-7 gap-1">
    <div class="col-span-1" >
       
    
    </div>
    
    <div class="col-span-6  mt-50 ">
    <h1 class="mt-20 mb-20 text-center">Aqui puedes hacer una busqueda de los grupos y orlas</h1>
      <div class="grid grid-cols-2 gap-5" >
        <div   class="">
        <form>   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="grupo_search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar grupo" required>
            </div>
        </form>
        <div class="grupos " id="valores_grupos">
        <div id="accordion" class="valores_grupos">
                               
        </div>

  
 
          </div>  
      </div>
      <div >
      <form>   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar orla" required>
            </div>
        </form>
        <div class="orlas">
            <div class="border-b-2 border-b-indigo-400 mt-10  flex flex-row	justify-center p-2">
                <p>Nombre de la orla </p>
            </div>
          </div>  
      </div>
      </div>
      </div>
    
    </div>

  </div>
  


<!-- Modal toggle -->
<button  data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  Toggle modal
</button>
<button  type="button">
  Toggle modal
</button>

<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full ">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Informacion del alumno
              </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Cerrar!</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="grid grid-cols-3 gap-1">

<div class="col-span-1 flex justify-center" >

<img class="rounded-full w-32 h-32 object-cover " src="images/logo.png" alt="image description">
</div>
<div class="col-span-2" >

<div class="flex flex-col ">
  <div class="mt-5">
<button type="button" id="btn_uploaddiv" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800  float-right">Añadir imagenes</button>
</div>
<div id="upload_image_div">
<form action="/subir_alumno" method="post" enctype="multipart/form-data">

<div class="flex items-center justify-center w-full">
    <label id="dropContainer" for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
        <div  class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
            </svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
            <input type="file" id="fileInput"name="imagen[]" />

        </div>

    </label>
</div> 
  <button type="submit">enviar</button>
</form>
</div>

<h3 class="underline	text-center	"  >Imagenes del alumno</h3>

</div>
<div class="flex justify-center">
<div class="grid gap-7 grid-cols-3 	 ">
    <div><img src="" alt="1"></div>
</div>
</div>       
</div>
                  <hr class="mb-5">
</div>

</div>
            </div>
            <!-- Modal footer -->
         
        </div>
    </div>




</section>
<style>
  #drop_zone {
  border: 5px solid blue;
  width: 200px;
  height: 100px;
}

</style>


<script>
  dropContainer.ondragover = dropContainer.ondragenter = function(evt) {
  evt.preventDefault();
};

dropContainer.ondrop = function(evt) {
  // pretty simple -- but not for IE :(
  fileInput.files = evt.dataTransfer.files;
    
  // If you want to use some of the dropped files
  const dT = new DataTransfer();
  console.log()
  for(i=0;i< evt.dataTransfer.files.length;i++){
    console.log( )

    dT.items.add(evt.dataTransfer.files[i]);
  }
 
  
 
  
 
  fileInput.files = dT.files;

  evt.preventDefault();
};
</script>
<div
  id="drop_zone"
>
  <p>Zona de imagen provisional pruebas <i>zona de soltar</i>.</p>
</div>

  <input type="file" value="prueba" name="imagen" id="imagen"   ondrop="dropHandler(event);"
  ondragover="dragOverHandler(event);">
  <br>
</form>
<script>
  let image=[]
function dropHandler(ev) {
  console.log("File(s) dropped");

  // Prevent default behavior (Prevent file from being opened)
  ev.preventDefault();

  if (ev.dataTransfer.items) {
    // Use DataTransferItemList interface to access the file(s)
    [...ev.dataTransfer.items].forEach((item, i) => {
      // If dropped items aren't files, reject them
      if (item.kind === "file") {
        const file = item.getAsFile();
        var newObject  = {
   'lastModified'     : file.lastModified,
   'lastModifiedDate' : file.lastModifiedDate,
   'name'             : file.name,
   'size'             : file.size,
   'type'             : file.type
};
image.push(JSON.stringify(newObject))



      }
    });
  } else {
    // Use DataTransfer interface to access the file(s)
    [...ev.dataTransfer.files].forEach((file, i) => {
     

    });
  }
  document.getElementById("imagen").value=JSON.stringify(image)
}
function dragOverHandler(ev) {
  console.log("File(s) in drop zone");

  // Prevent default behavior (Prevent file from being opened)
  ev.preventDefault();
}

</script>
<button id="scrollToTopBtn"
            class="fixed bottom-4 end-4 bg-black dark:bg-white text-white p-2 rounded-full hidden z-50">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="h-6 w-6 dark:stroke-black">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </button>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

<script src="js/bundle.js"></script>



</body>

</html>