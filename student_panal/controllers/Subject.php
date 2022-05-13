<?php
require_once "Connect.php";
class Subject extends Connect{
    public $messErrors = [];

###############################################################
########################     display all subjects     ########
public function display($lev_id){
        
        $sql = "SELECT * FROM `subjects` LEFT JOIN presences ON presences.sub_id = subjects.id WHERE lev_id = $lev_id GROUP BY name";
        $result = $this->conn->query($sql);
        return $result;
    
    }
###############################################################
########################     count materials of subject     ########
    public function countMaterial($sub_id){
        $sql = "SELECT COUNT(id) AS countMate FROM `material` WHERE sub_id =$sub_id";
        $result = $this->conn->query($sql);
        $count = $result->fetch(PDO::FETCH_ASSOC);
        return $count['countMate'];
    }

###############################################################
########################     show single subjects   ########
    public function show($sub_id){
        $sql = "SELECT subjects.id,subjects.name,levels.name AS lev_name,levels.id AS lev_id FROM `subjects` JOIN `levels` ON levels.id = subjects.lev_id WHERE subjects.id = '$sub_id'";
        $result = $this->conn->query($sql);
         return $result->fetch(PDO::FETCH_ASSOC);
    }



}