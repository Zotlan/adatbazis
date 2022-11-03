<?php
include 'view/layout/head.php';

    $kulcs = array_keys($osztalyok);


    foreach($osztalyok as $kulcs => $ertek){
        if($kulcs != $osztaly){
            echo "<h2><a href=\"index.php?page=index&osztalynev=$kulcs\">$ertek </a><br></h2>";
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
                    if(isset($_SESSION['id'])){
                        if($_SESSION['id'] == $row[$mezoNev]){
                            echo "<td style=\"color:rgb(101, 1, 252);\">".$nev."</td>\n";
    
                }else
                    echo"<td style=\"$bg\">".$nev."</td>";
                }
            }
            echo"<tr>";
        }
        echo"</table>";
    }
        $files = glob("uploads/*.*");
        for ($i = 0; $i < count($files); $i++) {
            $image = $files[$i];
            //echo basename($image) . "<br />";
            echo '<img src="' . $image . '" alt="cum" style="height:20%" />';
        
        }
    ?>
</body>
</html>