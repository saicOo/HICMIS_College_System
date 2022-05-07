<?php
require_once "Connect.php";

class Lecture extends Connect{
     
    public $messErrors = [];

    ###############################################################
    ########################    display all lectures       ########
    public function display($material_id){
        $sql = "SELECT *,IF(typ = 2, 'section' ,'lecture') as `type` FROM `lectures` WHERE `material_id` = '$material_id'";
        $result = $this->conn->query($sql);
        return $result;
    }
    ###############################################################
########################     show single material   ########
public function show($lecture_id){
    try{
$sql = "SELECT *,IF(typ = 2, 'section' ,'lecture') as `type` FROM `lectures` WHERE lecture_id = '$lecture_id'";
$result = $this->conn->query($sql);
 return $result->fetch(PDO::FETCH_ASSOC);
}
catch(Exception $e) {
   header('location:/admin_panal/500/');
}
}


    
}