<?php
require_once 'Model/Catalogue.php';
session_start(); // démarrage d'une session
$undlg = new Catalogue();
$products = $undlg->getCategories() ?>


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