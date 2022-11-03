<?php

if(isset($_GET['kilepes'])){
    session_unset();
}

    require 'model/szemely.php';
    $szemely= new Szemely($db);

    require 'model/osztaly.php';

    $eredmeny = "";

    $action = "";

    $action = $_REQUEST['action'] ?? "";
    
    $eredmenySzovegek = array(
        "There is no user with such username",
        "Login Failed: Wrong Password",
        "Login Succesful",
    );

    switch ($action){
        case 'logout';
            session_unset();
            $eredmeny = "Logged out Succesful";
        break;
    
        case 'login';
            if(isset($_POST['felnev']) && isset($_POST['jelszo'])){
    
            $login = $szemely->checkLogin($_POST['felnev'], $_POST['jelszo']);
    
            $eredmeny = $eredmenySzovegek[$login];
    
    }
        break;
    
        case 'upload';
        $target_dir = "uploads/";
        $target_file = $target_dir. $_SESSION['id'].".jpg";
    
        if (move_uploaded_file($_FILES["profilkep"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars(basename($_FILES["profilkep"]["tmp_name"])). " has been uploaded.<br>";
            } else {
                echo "Sorry, there was an error uploading your file.<br>";
                }
        break;
    }

    echo $eredmeny . "<br>";
    //print_r($_SESSION);

if(isset($_SESSION['nev'])){
        echo "Greetings, " . $_SESSION['nev'] . "<br>";
}

    require 'view/user.php';
?>