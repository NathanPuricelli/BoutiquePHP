<?php

require 'Controller/Router.php';

session_start();

$routeur = new Router();
$routeur->routRequest();

