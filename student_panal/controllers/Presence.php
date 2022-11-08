<?php
require_once "Connect.php";
class Presence extends Connect{
##########################################################################################
########################  Registration of student attendance of study materials   ########
    public function addPresence($sub_id){
        $code_std = $_SESSION['code_std'];


// check presences if exists
$check = "SELECT * FROM `presences` WHERE `std_id` = $code_std AND `sub_id` = $sub_id";
$result  = $this->conn->query($check);
$row = $result->fetch(PDO::FETCH_ASSOC);

if(!$row){
    $sql = "INSERT INTO `presences`(`pres_id`, `std_id`, `sub_id`, `presence_count`) VALUES (null,'$code_std','$sub_id',1)";
        $this->conn->exec($sql);
}else{
    date_default_timezone_set('America/Los_Angeles');
                                                           
    if(date("Y-m-d", strtotime($row['pres_date'])) !== date("Y-m-d") ){
    $presence = $row['presence_count'] + 1;
    $sql = "UPDATE `presences` SET `presence_count`='$presence',`pres_date`=current_timestamp() WHERE `std_id` = $code_std AND `sub_id` = $sub_id";
        $this->conn->exec($sql);
    }else{
        $sql = "UPDATE `presences` SET `pres_date`=current_timestamp() WHERE `std_id` = $code_std AND `sub_id` = $sub_id";
            $this->conn->exec($sql);
    }
}

        
    }

    
}