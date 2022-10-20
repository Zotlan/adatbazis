<!DOCTYPE html>
<html lang="hu">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<?php 
/*
    $servername = "localhost";
    $username = "zotlan";
    $password = "FbDikkM1csvcrNt4";
    $dbname = "phptest";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    //username zotlan
    //password FbDikkM1csvcrNt4 
*/
?>
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
<?php
/*
if(isset($_POST['keresettNev'])){
    $sql = "SELECT osztalyid FROM szemelyek INNER JOIN sorok 
    ON (szemelyek.szemelyid = sorok.nev1 
    OR szemelyek.szemelyid = sorok.nev2 
    OR szemelyek.szemelyid = sorok.nev3 
    OR szemelyek.szemelyid = sorok.nev4 
    OR szemelyek.szemelyid = sorok.nev5) 
    WHERE nev LIKE '".$_POST['keresettNev']."';";

    if($result = $db->dbSelect($sql)) {
        $row = $result->fetch_assoc();
        $osztaly = $row['osztalyid'];
    }
}*/
?>

<form method="post" action="lista.php">
    <input type="text"  name="keresettNev">
    <input type="submit"  value="KERES">
</form>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

<img src="uploads/Capture001.png" alt="Cum" style="width:128px;height:128px;">
    
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
                    echo "<td style=\"color:rgb(101, 1, 252);\">".$nev."</td>\n";
                }else{
                    echo"<td style=\"$bg\">".$nev."</td>";
                }
            }
            echo"<tr>";
        }
        echo"</table>";
    }
    
    /*
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        echo '<table>';
        while($row = $result->fetch_assoc()) {
           echo "<tr>";
           echo "<td>".$row['nev1']."</td>\n";
           echo "<td>".$row['nev2']."</td>\n";
           echo "<td>".$row['nev3']."</td>\n";
           echo "<td>".$row['nev4']."</td>\n";
           echo "<td>".$row['nev5']."</td>\n";
           echo "</tr>";
          }
          echo '</table>';
        } else {
          echo "Nincs ilyen osztaly";
        

    }
    




*/
    ?>

</body>
</html>