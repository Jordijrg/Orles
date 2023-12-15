<!DOCTYPE html>
<html lang="en" dark id="html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/main.css">
<style>
    hr {
  border: none;
  
  height: 1px;
  
  /* Set the hr color */
  color: #333;  /* old IE */
  background-color: #333;  /* Modern Browsers */
}
.row {
  display: flex;
  flex-wrap: wrap;
}

.col {
  flex: 1 0 18%; /* The important bit. This percentage decides your columns. 
 The percent can be px. It just represents your minimum starting width.
  */
  margin: 5px;
  background: tomato;
  height: 50px;
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
</head>

<body class="dark:bg-gray-900">
    <div id="header">
        <?php include 'header.php'; ?>
    </div>
    <div id="back_orla">
    <div class="flex flex-col items-center">
    <h1 class="text-2xl font-semibold my-4">Alumnes</h1>
    <div class="flex flex-wrap justify-center">
    </div>
</div>

<div class="flex flex-wrap justify-center">
<?php
   for($i=0;$i<count($imagenes_orlas);$i++) {
          
    if($usuarios_orlas[$i]["rol"]=="alumne"){?>        <div class="w-full max-w-sm bg-white rounded-lg dark:bg-gray-800 dark:border-gray-700 mx-2 my-2">
            <div class="flex justify-end px-4 pt-4">
            </div>
            <div class="flex flex-col items-center pb-10">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="/images/<?php echo $imagenes_orlas[$i]["Srcimatge"] ?>"  alt="Bonnie image"  style="    object-fit: cover;"/>
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"><?php echo $usuarios_orlas[$i]["Nom"]." ".$usuarios_orlas[$i]["Cognom"]?></h5>
                <span class="text-sm text-gray-500 dark:text-gray-400"><?php echo $grupos_orlas[0]["Nom"] ?></span>
            </div>
        </div>
    <?php }
    } ?>
</div>

<div class="flex flex-col items-center">
    <h1 class="text-2xl font-semibold my-4">Professors</h1>
    <div class="flex flex-wrap justify-center">
    </div>
</div>

<div class="flex flex-wrap justify-center">
    <?php 

        for($i=0;$i<count($imagenes_orlas);$i++) {
        if($usuarios_orlas[$i]["rol"]=="profe"){
 ?>
        <div class="w-full max-w-sm bg-white rounded-lg dark:bg-gray-800 dark:border-gray-700 mx-2 my-2">
            <div class="flex justify-end px-4 pt-4">
            </div>
            <div class="flex flex-col items-center pb-10">
            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="/images/<?php echo $imagenes_orlas[$i]["Srcimatge"] ?>"  alt="Bonnie image"  style="    object-fit: cover;"/>
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"><?php echo $usuarios_orlas[$i]["Nom"]." ".$usuarios_orlas[$i]["Cognom"]?></h5>
                <span class="text-sm text-gray-500 dark:text-gray-400"><?php echo $grupos_orlas[0]["Nom"] ?></span>
                
            </div>
        </div>
    <?php }
    }    ?>
</div>  
    <!-- Dentro de tu archivo PHP donde generas la vista -->
    <a href="/pdforla">aqui</a>
    <script src="/js/bundle.js"></script>
</body>

</html>