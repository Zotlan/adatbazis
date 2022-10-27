<?php

session_start();

?>
<!DOCTYPE html>
<html lang="hu">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
    <?php 
    require 'dbinc.php';

    $db = new DataBase();

    require 'szemely.php';
    $szemely= new Szemely($db);
    require 'osztaly.php';

            $osztaly = 1;
            if(isset($_REQUEST['osztalynev'])){
                $osztaly = $_REQUEST['osztalynev'];
            }

            if(isset($_GET['szemelyid'])){
                if($szemelyOsztalya = $szemely->getOsztaly($_GET['szemelyid']))
                $osztaly = $szemelyOsztalya;
            }

            $osztalypeldany = new Osztaly($osztaly,$db);

            $osztalyok = $osztalypeldany->getAll($db);
           


            if(!array_key_exists($osztaly, $osztalyok)){
                $osztaly = 1;
            }
            //$result = $conn->query($sql);
            
        ?>
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
            echo "<h2><a href=\"index.php?osztalynev=$kulcs\">$ertek </a><br></h2>";
        }
    }
    ?>
    <?php
    echo "<h1>$osztalyok[$osztaly]</h1>";
    ?>

        <form method="post" action="lista.php">
            <input type="text"  name="keresettNev">
            <input type="submit"  value="KERES">
        </form>

    
    
    <?php
    $magam = array('sorid' => 7, 'mezoNeve' => 'nev4');
    $sql = "SELECT sorid, nev1, nev2, nev3, nev4, nev5 FROM sorok WHERE osztalyid =".$osztaly;

    if ($result = $db->dbselect($sql)){
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
                if($row['sorid'] ==  $magam['sorid'] and $magam['mezoNeve'] == $mezoNev){
                    //if(isset($_SESSION['id']))
                        //
                    echo "<td style=\"color:rgb(101, 1, 252);\">".$nev."</td>\n";
                //}
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
            echo '<img src="' . $image . '" alt="cum" style="width:10%;height:10%" />';
        
        }

        /*if(file_exists("uploads/".$row[$mezoNev].".jpg")){
            echo "<img src=\"uploads/x.jpg\">";
        }*/

    ?>
</body>
</html>