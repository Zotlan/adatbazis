<?php

$page = "belepes";

$controllerFile = 'controller/'.$page.'.php';

if(file_exists($controllerFile)){
    require $controllerFile;
}





?>