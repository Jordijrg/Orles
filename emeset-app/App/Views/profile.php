<!doctype html>
<html lang="en" id="html" dark>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="main.css">
<?php include "script_icons.php" ?>
<style>

</style>
  <title>Todo APP</title>
</head>

<body class="dark:bg-gray-900">
<div id="header">
        <?php include 'header.php'; ?>
</div>
        
<div class=" px-4 mx-auto max-w-screen-xl">
<div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg md:p-12 mb-4 mt-4">
<center>                     
<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700 border-none">
    <div class="flex flex-col items-center pb-10">
        
        <img id="img_profile" class="w-24 h-24 mb-3 rounded-full shadow-lg" style="  object-fit: contain;" data-modal-target="static-modal2" data-modal-toggle="static-modal2" src="/images/<?php 

     
if(!is_array($avatar)){
            echo "inici.png";
        }else{
            echo $avatar["srcimagen"];

        }
        ?>" alt="Bonnie image"/>
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"><?= $usuaris['Nom'] . " " . $usuaris['Cognom']?></h5>
        <span class="text-sm text-gray-500 dark:text-gray-400"><?= $usuaris['Correu']?></span>
        <div class="flex mt-4 md:mt-6">
            <a href="#" data-modal-target="static-modal" data-modal-toggle="static-modal" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700 ms-3">Veure el carnet</a>
            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700 ms-3">Enviar un missatge</a>
        </div>
    </div>
</div>
</center>  

</div>
</div>
        
        





<div class=" px-4 mx-auto max-w-screen-xl">
<div id="usuaris" class="w-full max-w-screen p-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-medium leading-none text-gray-900 dark:text-white">Informació de l'usuari</h5>
        <button type="submit" id="editbtn" class=" text-blue-500 font-bold py-2 px-4 rounded">
            <span class="material-icons">edit</span>
        </button>
   </div>
   <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            <li class="py-3">
                <div class="flex items-center">
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Nom
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            <input type="text" name="Cognom" id="name" class="dark:bg-gray-800 border-none w-full" 
                            required="" value="<?= $usuaris['Nom']?>" disabled>
                        </p>
                    </div>
                </div>
            </li>
            <li class="py-3">
                <div class="flex items-center ">
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Cognom
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            <input type="text" name="Cognom" id="name" class="dark:bg-gray-800 border-none w-full" 
                            required="" value="<?= $usuaris['Cognom']?>" disabled>
                        </p>
                    </div>
                </div>
            </li>
            <li class="py-3">
                <div class="flex items-center">
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Correu
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            <input type="text" name="Cognom" id="name" class="dark:bg-gray-800 border-none w-full" 
                            required="" value="<?= $usuaris['Correu']?>" disabled>
                        </p>
                    </div>
                </div>
            </li>
            <!-- <li class="py-3">
                <div class="flex items-center ">
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Contrasenya
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            <input type="text" name="Contrasenya" id="name" class="dark:bg-gray-800 border-none w-full">
                        </p>
                    </div>
                </div>
            </li> -->
            <li class="py-3">
                <div class="flex items-center ">
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Estat
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            <input type="text" name="estado" id="name" class="dark:bg-gray-800 border-none w-full" 
                            required="" value="<?= $usuaris['estado']?>" disabled>
                        </p>
                    </div>
                </div>
            </li>
            <li class="py-3">
                <div class="flex items-center ">
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Rol
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            <input type="text" name="rol" id="name" class="dark:bg-gray-800 border-none w-full" 
                            required="" value="<?= $usuaris['rol']?>" disabled>
                        </p>
                    </div>
                </div>
            </li>
        </ul>
   </div>
</div>
</div>









<div class=" px-4 mx-auto max-w-screen-xl">
<div id="editusuaris" class="w-full max-w-screen p-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 hidden">
    <form method="POST" action="/updateuser_user">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Editar</h5>
        <button type="submit" class=" text-blue-500 font-bold py-2 px-4 rounded">
            <span class="material-icons">save</span>
        </button>
   </div>
   <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            <li class="py-3">
                <div class="flex items-center">
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Nom
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            <input type="hidden" name="IdUsuari" id="name" class="dark:bg-gray-800 border-none w-full" 
                            required="" value="<?= $usuaris['IdUsuari']?>">
                            <input type="text" name="Nom" id="name" class="dark:bg-gray-800 border-none w-full" 
                            required="" value="<?= $usuaris['Nom']?>">
                        </p>
                    </div>
                </div>
            </li>
            <li class="py-3">
                <div class="flex items-center ">
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Cognom
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            <input type="text" name="Cognom" id="name" class="dark:bg-gray-800 border-none w-full" 
                            required="" value="<?= $usuaris['Cognom']?>">
                        </p>
                    </div>
                </div>
            </li>
            <li class="py-3">
                <div class="flex items-center">
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Correu
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            <input type="text" name="Correu" id="name" class="dark:bg-gray-800 border-none w-full" 
                            required="" value="<?= $usuaris['Correu']?>">
                        </p>
                    </div>
                </div>
            </li>
            <li class="py-3">
                <div class="flex items-center ">
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Contrasenya
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            <input type="text" name="Contrasenya" id="name" class="dark:bg-gray-800 border-none w-full">
                        </p>
                    </div>
                </div>
            </li>
            <li class="py-3">
                <div class="flex items-center ">
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Estat
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            <input type="text" name="Cognom" id="name" class="dark:bg-gray-800 border-none w-full" 
                            required="" value="<?= $usuaris['estado']?>" disabled>
                        </p>
                    </div>
                </div>
            </li>
            <li class="py-3">
                <div class="flex items-center ">
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Rol
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            <input type="text" name="Cognom" id="name" class="dark:bg-gray-800 border-none w-full" 
                            required="" value="<?= $usuaris['rol']?>" disabled>
                        </p>
                    </div>
                </div>
            </li>
        </ul>
        
    </form>
   </div>
</div>
</div>




<!-- Main modal -->
<div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Carnet
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                
                <div class="card">
        <div class="content">
            <span></span>
            <div class="img">
                <img src="images/inici.png" alt="">
            </div>
            <img class="qr" src="images/qr.png" alt="">
            <div class="text">
            <h1><?= $usuaris['Nom'] . " " . $usuaris['Cognom']?></h1>
            <h6>DAW</h6>
            <h2><?= $usuaris['Correu']?></h2>
            </div>
            
                
            
        </div>
    </div>

    

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



</div>
<?php include 'modalperfil.php'; ?>
<button id="scrollToTopBtn"
            class="fixed bottom-4 end-4 bg-black dark:bg-white text-white p-2 rounded-full hidden z-50">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="h-6 w-6 dark:stroke-black">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </button>
<script src="js/flowbite.js"></script>
<script src="js/bundle.js"></script>

<script src="path/to/html2pdf.bundle.js"></script>

<script>
    $(document).ready(function() {
        
        $("#editbtn").click(function() {
            $("#usuaris").hide();
            $("#editusuaris").show();
        });
    });
</script>


<!-- Modal toggle -->
<button  type="button">
  Toggle modal
</button>

<!-- Main modal -->
<div id="static-modal2" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
<form action="/subir_logos" method="post" enctype="multipart/form-data">
   
<div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Puja el teu avatar
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal2">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Tancar</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                    <input type="file" name="avatar" id="">
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="static-modal2" type="sumbit    " class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Aceptar</button>
                
            </div>
        </div>
    </div>
    </form>

</div>



</body>

<style>
    

.card {
    position: relative;
    height: 350px;
    border-radius: 10px;
    box-shadow: 2px 3px 5px rgba(73, 69, 52, 0.4);
    margin: 40px;
}

.card .content {
    position: relative;
    z-index: 100;
    width: 100%;
    height: 100%;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    overflow: hidden;  
    text-align: center;  
    padding: 20px;
    background: #fff;
}

.card .content .img {
    height: 50%;
    margin-bottom: 20px;
}

.card .content .img img {
    position: relative;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
}

.qr {
    height: 50%;
    margin-bottom: 20px;
}

.qr {
    position: relative;
    width: 150px;
    height: 150px;
    object-fit: cover;

}

.text{
    position: absolute;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    overflow: hidden;  
    text-align: center;
    margin-top: 100px;
    margin-left: 30px;
    padding: 20px;
}

.card .content span {
    position: absolute;
    width: 800px;
    height: 300px;
    background-color: blue;
    transform: rotate(-35deg);
    top: -200px;
    left: -300px;
}



.card .content h1 {
    font-size: 25px;
    color: #1a1919;
    margin-bottom: 5px;
}

.card .content h2 {
    font-size: 15px;
    color: #1a1919;
    margin-bottom: 5px;
}

.card .content h4 {
    font-size: 18px;
    color: #1a1919;
    margin-bottom: 5px;
}

.card .content h6 {
    font-size: 15px;
    color: #5e2066;
}

.card .content p {
    font-size: 13px;
    color: #1a161f;
    margin-top: 10px;
}

.card .links {
    position: absolute;
    z-index: 90;
    width: 50px;
    display: flex;
    flex-direction: column;
    gap: 20px;
    background: rgba(255, 255, 255, 0.5);
    box-shadow: 2px 3px 5px rgba(73, 69, 52, 0.4);
    padding: 20px;
    align-items: center;
    right: 10px;
    top: 15px;
    transition: .5s;
}


.card .links a {
    font-size: 20px;
    color: #646069;
}

.card .links a:nth-child(1):hover {
    color: #0158ca;
}

.card .links a:nth-child(2):hover {
    color: #1C93E4;
}

.card .links a:nth-child(3):hover {
    color: #5D277D;
}

.card .links a:nth-child(4):hover {
    color: #FE0000;
}
</style>




</html>

