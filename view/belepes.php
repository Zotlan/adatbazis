<!DOCTYPE html>
<html lang="en">
<head>


<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

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

    echo $eredmeny;

    if(!isset($_SESSION['id'])){
        ?>
            <form action="index.php" method="post">
            Felhasznalonev: <br>
            <input type="text" name="felnev" placeholder="Ird be a felhasznaloneved" required><br>
            Jelszo: <br>
            <input type="password" name="jelszo" placeholder="Ird be a jelszavad" required"><br>
            <input type="submit">
            </form>;
            <?php
        }
        else{
            ?>
            <form action="upload.php" method="post" enctype="multipart/form-data">
            Toltson fel profilkepet:
            <input type="file" name="fileToUpload" id="fileToUpload">
             <input type="submit" value="Upload Image" name="submit">
            </form>
            <?php
        }
        ?>

    <hr>

    <div style="text-align:center">
        <a href="index.php">Vissza</a>
    </div>

</body>
</html>