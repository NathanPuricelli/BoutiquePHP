<?php
require_once 'Model/DialogueBD.php';
session_start(); // démarrage d'une session
$undlg = new DialogueBD();
$products = $undlg->getAllProducts() ?>


<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Panier</title>
    <link rel="stylesheet" href="presentation/CSS/style.css" />
</head>
<body>
<div id="container">

    <?php foreach ($products as $p){
        echo "<p>". $p['name'] ."</p> <br>";
    } ?>
</div>
</body>

</html>