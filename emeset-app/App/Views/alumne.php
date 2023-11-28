<!DOCTYPE html>
<html lang="en" dark>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="dark:bg-black">
    <div id="header">
        <?php include 'header.php'; ?>
    </div>
    <div class="grid grid-cols-2 gap-4 p-10">
        <div class=" col-span-1 grid grid-cols-3 gap-4">
            <div class="col-span-3 dark:text-white"><h2 class="border-l-2 border-l-black pl-2 dark:border-l-white">ORLES</h2></div>
            <?php foreach ($orles as $orla): ?>
            <div class=" col-span-1">
                <a href="#"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $orla['Nom']?></h5>
                    <div class="font-normal text-gray-700 dark:text-gray-400"><img class="rounded-xl" src="images/<?php echo $orla['SrcImatge']?>"></div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="col-span-1 grid grid-cols-3 gap-4">
            <div class="col-span-3 dark:text-white"><h2 class="border-l-2 border-l-black pl-2  dark:border-l-white">FOTOGRAFIES</h2></div>
            <?php foreach ($fotografies as $fotografia): ?>
            <div class=" col-span-1">
                <a href="#"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> <?php echo $fotografia['IdImatge'] ?> </h5>
                    <div class="font-normal text-gray-700 dark:text-gray-400"><img class="rounded-xl" src="images/<?php echo $fotografia['Srcimatge']?>"></div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        
    </div>
</body>

</html>