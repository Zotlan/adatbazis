<?php

    session_start();

    require 'dbinc.php';
    $db = new DataBase();

    $page = "user";

    $controllerFile = 'controller/'.$page.'.php';

    if(file_exists($controllerFile)){
        require $controllerFile;
    }





?>