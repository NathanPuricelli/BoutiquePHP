<?php

require 'Controller/Routeur.php';

session_start();

$routeur = new Routeur();
$routeur->routerRequete();

