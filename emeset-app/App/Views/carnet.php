<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="manifest" href="/wepapp.json">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="main.css">
    <?php include "script_icons.php" ?>
    <style>

    </style>
    <title>Document</title>
</head>
<body>
<div class="p-4 md:p-5 space-y-4">

<div class="card">
    <div class="content">
        <span></span>
        <div class="img">
            <img src="images/inici.png" alt="">
        </div>
        <img class="qr" src="images/qr.png" alt="">
        <div class="text">
            <h1>
                <?= $usuari['Nom'] . " " . $usuari['Cognom'] ?>
            </h1>
            <h6><?= $usuari['Nomgrup'] ?></h6>
            <h2>
                <?= $usuari['Correu'] ?>
            </h2>
        </div>



    </div>
</div>
</div>
<script src="js/flowbite.js"></script>
    <script src="js/bundle.js"></script>
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

    .text {
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