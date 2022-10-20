<?php


require_once 'dbinc.php';

class Szemely{

    private $szemelyid;
    private $nev;

    private $db;

    function __construct($db){
        $this->db=$db;
    }

    public function getNev($szemelyid){
        $sql = "SELECT nev FROM szemelyek WHERE szemelyid = ".$szemelyid;
        if($resultnev = $this->db->dbselect($sql)){
            $szemelysor = $resultnev->fetch_assoc();
            $this->nev = $szemelysor['nev'];
            $this->szemelyid = $szemelyid;
        }
        return $this->nev;
    }

    public function nevetKeres($szoveg){ 
        $talalatok = array();
        $sql = "SELECT szemelyid,nev FROM szemelyek WHERE nev LIKE '%$szoveg%'";
        if($result = $this->db->dbselect($sql)){
            while($row = $result->fetch_assoc()){
                $talalatok[$row['szemelyid']] = $row['nev'];
            }
        }
        return $talalatok;
    }



    public function getOsztaly($szemelyid){
            $sql = "SELECT osztalyid FROM sorok WHERE (";
            for($i=1; $i<=5; $i++){
                $sql .= "nev$i = ".$szemelyid;
                if($i < 5) $sql .= " OR ";
                else $sql .= " )";
            }       
        if ($result = $this->db->dbselect($sql)){
            if($row = $result->fetch_assoc()){
            return $row['osztalyid'];
            }
        }
    }
    }

?>