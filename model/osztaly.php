<?php

require_once 'dbinc.php';

class Osztaly {
    private $osztalyid;
    private $osztalynev;

    function __construct($osztalyid, $db){
        $sql = "SELECT osztalynev FROM osztalyok WHERE osztalyid = ".$osztalyid;
        if($resultnev = $db->dbselect($sql)){
            $osztalysor = $resultnev->fetch_assoc();
            $this->osztalyev = $osztalysor['osztalynev'];
            $this->osztalyid = $osztalyid;
        }
    }
    public function getNev(){
        return $this->nev;
    }
    public function getAll($db){
        $osztalyok = array();

        $sql = "SELECT osztalyid, osztalynev FROM osztalyok";

        if($result = $db->dbselect($sql)){
            while($row = $result->fetch_assoc()){
                $osztalyok[$row['osztalyid']] = $row['osztalynev'];
            }
        }
        return $osztalyok;
    }
}

