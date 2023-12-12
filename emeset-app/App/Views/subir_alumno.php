<!doctype html>
<html lang="en" id="html">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/main.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
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

  <title>Todo APP</title>
</head>

<body>
  
  <?php include "header.php";  ?>


  <form action="/subir_alumno/<?php echo $id; ?>/<?php echo $id_grupo;?>" method="post" enctype="multipart/form-data">

  <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
    <div class="sm:hidden">
        <label for="tabs" class="sr-only">Select tab</label>
        <select id="tabs" class="bg-gray-50 border-0 border-b border-gray-200 text-gray-900 text-sm rounded-t-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-20">
            <option>Imagenes</option>
            <option>Subir imagenes</option>
        </select>
    </div>
    <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400 rtl:divide-x-reverse" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
        <li class="w-full">
            <button id="stats-tab" data-tabs-target="#stats" type="button" role="tab" aria-controls="stats" aria-selected="true" class="inline-block w-full p-4 rounded-ss-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Imagenes</button>
        </li>
        <li class="w-full">
            <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="false" class="inline-block w-full p-4 bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Subir imagenes</button>
        </li>
  
    </ul>
    <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="stats" role="tabpanel" aria-labelledby="stats-tab" style="">
        <div style="display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;">
        <dl class="lg:grid max-w-screen-xl grid-cols-2 gap-3 p-4 mx-auto text-gray-900  dark:text-white sm:p-8">            

            <?php 
            foreach ($fotografies as $key => $value) {?>
                    <div class="flex">
                        
                        <img class="h-auto max-w-lg rounded-lg " src="/images/<?php echo $value["Srcimatge"]; ?>" alt="image description">
                            <input type="radio" name="imagen_user" id="" value="<?php echo $value["IdImatge"]; ?>">

                    </div>
            <?php } ?>
            </dl>
            <button type="submit" id="btn_sumbit" style="background-color:red;">enviar</button>
            </div>
        </div>
        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel" aria-labelledby="about-tab">
            <!-- List -->
       
            <div id="upload_image_div" class="	mt-5 bg-white	p-14	" >
    <h2 class="mt-5 text-center	">Sube las imagenes para el usuario:</h2>

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
        <div style="display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;">
        <button type="submit" id="btn_sumbit" style="background-color:red;" class="flex justify-center	    ">enviar</button>
            </div>
            </div>
        </div>
    </div>
    
</div>

</form>


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


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

<script src="js/bundle.js"></script>



</body>

</html>