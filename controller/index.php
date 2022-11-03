<?php
    require 'model/osztaly.php';

    require 'model/szemely.php';
        $szemely= new Szemely($db);

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

    $kulcs = array_keys($osztalyok);


    echo "<h1>$osztalyok[$osztaly]</h1>";

    $sql = "SELECT sorid, nev1, nev2, nev3, nev4, nev5 FROM sorok WHERE osztalyid =".$osztaly;

    $result = $db->dbselect($sql);

    require 'view/index.php';

?>