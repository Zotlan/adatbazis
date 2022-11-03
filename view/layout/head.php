<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">

        <title><?php echo $osztalyok[$osztaly] ?></title>
</head>
<body>
<?php
    
    if(isset($_SESSION['id'])){
        echo "Udv ".$_SESSION['nev']."<br>";
        echo '<a href="index.php?page=user&action=logout">Log out</a>';
    }
    else{
        echo '<a href="index.php?page=user&action=login">Login</a>';
    }
     
    ?>