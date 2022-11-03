<?php

session_start();

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

    require 'model/szemely.php';
    $szemely= new Szemely($db);

    require 'model/osztaly.php';
    ?>

<title>Talalati lista</title>
<style>
        table,tr,td{
            border: 1px solid;
            border-collapse: collapse;
            font-weight: bold;
            width: 20%;
        }
        body{
            margin-left: 40%;
            background-color: grey;
        }
    </style>
    
</head>
<body>
    <?php
    if(isset($_POST['keresettNev'])){
        if(strlen($_POST['keresettNev']) < 3){
            echo "<h2>Irj be legalabb 3 karaktert a kereseshez</h2>";
        }
        else{
        if($talalatok = $szemely->nevetKeres($_POST['keresettNev'])){
            foreach($talalatok as $kulcs => $nev){
                echo "<a href=\"index.php?szemelyid=$kulcs\">$nev</a><br>";
            }
        } else {
            echo "<h2>Nem talalhato ilyen nev: ".$_POST['keresettNev']."</h2>";
        }
    }

    }
    ?>
</body>
</html>