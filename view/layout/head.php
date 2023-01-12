<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <!-- DON'T TOUCH! IT WORK!-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Classes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                    echo '<a class="dropdown-item" href="index.php?page=index&osztalynev=1">13.I</a>';
                    echo '<a class="dropdown-item" href="index.php?page=index&osztalynev=2">12.A</a>';
                        ?>
                    </div>
                </li>
                <li class="nav-item">
                    <?php
                    if(isset($_SESSION['id'])){
                        echo '<a class="nav-link disabled" href="index.php?page=user&action=logout">Logout</a>';
                    }
                    else{
                        echo '<a class="nav-link disabled" href="index.php?page=user&action=login">Login</a>';
                    }
                    ?>
                </li>
                </ul>
                <form class="form-inline" method="post" action="lista.php">
                    <input type="hidden" name="page" value="user">
                    <input name="keresettNev" class="form" type="search" onkeyup="showHint(this.value)">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    <div class="list-group" id="txtHint"></div>
                </form>
            </div>
        </nav>

        <title><?php echo $osztalyok[$osztaly] ?></title>
        
    <script>
    function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }
        };
        xmlhttp.open("GET", "index.php?page=user&action=ajaxkereses&keresettNev=" + str, true);
        xmlhttp.send();
    }
    }
    </script>
</head>
<body>
