<!DOCTYPE html>
<html lang="en">
<head>


<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login</title>


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
        ?>
            <form action="index.php" method="post">
            Username: <br>
            <input type="text" name="felnev" placeholder="Please Enter Your Username" required><br>
            Password: <br>
            <input type="password" name="jelszo" placeholder="Please Enter Your Password" required"><br>
            <input type="submit">
            <input type="hidden" name="action" value="login">
            <input type="hidden" name="page" value="user">
            </form>
            <?php
        }
        else{
            ?>
            <form action="index.php?page=user&action=upload" method="post" enctype="multipart/form-data">
            Please Upload A Profile Picture:
            <input type="file" name="profilkep" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
            </form>
            <?php
        }
        ?>
    <hr>

    <div style="text-align:center">
        <a href="index.php">Back to main page<br></a>
        <?php
        if(isset($_SESSION['id'])){
            echo '<a href="index.php?action=logout">Log out</a>';
        }
        ?>
    </div>

</body>
</html>