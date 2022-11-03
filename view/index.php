<!DOCTYPE html>
<html lang="hu">
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
        echo '<a href="belepes.php?kilepes=1">Kilepes</a>';
    }
    else{
        echo '<a href="belepes.php">Belepes</a>';
    }
    
    
    ?>

    <?php
    $kulcs = array_keys($osztalyok);


    foreach($osztalyok as $kulcs => $ertek){
        if($kulcs != $osztaly){
            echo "<h2><a href=\"index.php?osztalyid=$kulcs\">$ertek </a><br></h2>";
        }
    }
    ?>

        <form method="post" action="lista.php">
            <input type="text"  name="keresettNev">
            <input type="submit"  value="KERES">
        </form>

    
    
    <?php
    if ($result){
        echo '<table>';
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            for($i=1; $i<6; $i++){
                $nev =" ";
                $mezoNev = 'nev'.$i;
                if($row[$mezoNev] != null){
                    $nev = $szemely->getNev($row[$mezoNev]);
                }
                $bg="";
                if(isset($_GET['szemelyid'])){
                    if($_GET['szemelyid'] == $row[$mezoNev]){
                    $bg = "background-color: yellow;";
                    }
                }
                        if($_SESSION['id'] == $row[$mezoNev]){
                            echo "<td style=\"color:rgb(101, 1, 252);\">".$nev."</td>\n";
    
                }else{
                    echo"<td style=\"$bg\">".$nev."</td>";
                }
            }
            echo"<tr>";
        }
        echo"</table>";
    }
    ?>
    <?php
        $files = glob("uploads/*.*");
        for ($i = 0; $i < count($files); $i++) {
            $image = $files[$i];
            //echo basename($image) . "<br />";
            echo '<img src="' . $image . '" alt="cum" style="height:40%" />';
        
        }

        /*if(file_exists("uploads/".$row[$mezoNev].".jpg")){
            echo "<img src=\"uploads/x.jpg\">";
        }*/

    ?>
</body>
</html>