<?php

session_start();

if(isset($_GET['kilepes'])){
    session_unset();
}

?>


<!DOCTYPE html>
<html lang="hu">
<head>


<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<head>


<?php 
    require 'dbinc.php';
    $db = new DataBase();

    require 'szemely.php';
    $szemely= new Szemely($db);

    require 'osztaly.php';

    $eredmeny = "";

    $eredmenySzovegek = array(
        "Nincs ilyen felhasznalonev",
        "Sikerestelen belepes: Hibas jelszo",
        "Sikeres belepes",
    );

    if(isset($_POST['felnev']) && isset($_POST['jelszo'])){

        $login = $szemely->checkLogin($_POST['felnev'], $_POST['jelszo']);

        $eredmeny = $eredmenySzovegek[$login];

        }

    ?>
    

<title>Belepes</title>


    <style>
        body{
            background-color: grey;
        }
        html{
            text-align: center;
        }
    </style>
    
</head>


<body>

    <?php

    if(!isset($_SESSION['id'])){
    echo ' <form action="Belepes.php" method="post">
                Felhasznalonev: <br><input type="text" name="felnev" placeholder="Ird be a felhasznaloneved" required><br>
                Jelszo: <br><input type="password" name="jelszo" placeholder="Ird be a jelszavad" required"><br>
                <input type="submit">
            </form>';
    }
    else{
    echo '  <form action="upload.php" method="post" enctype="multipart/form-data">
                    Toltson fel profilkepet:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit">
            </form>';
    }

    ?>
    <div style="text-align:center">
    <?php
    echo $eredmeny . "<br>";
    //print_r($_SESSION);

    if(isset($_SESSION['nev'])){
        echo "Udv, " . $_SESSION['nev'] . "<br>";
    }
    ?>
    </div>


    <hr>

    <div style="text-align:center">
        <a href="index.php" >Vissza</a>
    </div>
    


</body>
</html>