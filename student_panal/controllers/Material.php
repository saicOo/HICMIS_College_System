<?php
require_once "Connect.php";

class Material extends Connect{
     
    public $messErrors = [];

###############################################################
########################     display all materials     ########
    public function display($sub_id){
        $sql = "SELECT * FROM `material` WHERE `sub_id` = '$sub_id' ORDER BY date_mat";
        $result = $this->conn->query($sql);
        return $result;
    }

###############################################################
########################     show single material   ########
public function show($material_id){
     
        try{
            $sql = "SELECT material.id,material.description,material.date_mat,material.sub_id,subjects.name,subjects.lev_id,levels.name AS lev_name
            FROM `material` JOIN `subjects` ON subjects.id = material.sub_id INNER JOIN levels ON levels.id = subjects.lev_id WHERE material.id = '$material_id'";
    $result = $this->conn->query($sql);
     return $result->fetch(PDO::FETCH_ASSOC);
    }
    catch(Exception $e) {
       header('location:/admin_panal/500/');
   }
}


}
