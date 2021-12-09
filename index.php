<?php

define('URL', str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

//* ==========| Lance le router |==========
require_once('controllers/Router.php');


// on crée une instance de la classe Router
$router = new Router();
// on lance la méthode(fonction) routeRequest du fichier Router.php
$router -> routeRequest();