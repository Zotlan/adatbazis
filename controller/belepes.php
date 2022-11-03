<?php

session_start();

if(isset($_GET['kilepes'])){
    session_unset();
}

    require 'dbinc.php';
    $db = new DataBase();

    require 'model/szemely.php';
    $szemely= new Szemely($db);

    require 'model/osztaly.php';

    $eredmeny = "";

    $eredmenySzovegek = array(
        "There is no user with such username",
        "Login Failed: Wrong Password",
        "Login Succesful",
    );

    if(isset($_POST['felnev']) && isset($_POST['jelszo'])){

        $login = $szemely->checkLogin($_POST['felnev'], $_POST['jelszo']);

        $eredmeny = $eredmenySzovegek[$login];

        }

    echo $eredmeny . "<br>";
    //print_r($_SESSION);

    if(isset($_SESSION['nev'])){
        echo "Greetings, " . $_SESSION['nev'] . "<br>";
    }
    require 'view/belepes.php';
    ?>