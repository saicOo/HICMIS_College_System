<?php
require_once "Connect.php";
class Level extends Connect{
    
    public $message = "";
    //  display all levelss
    public function display(){
        $sql = "SELECT * FROM `levels`";
        $result = $this->conn->query($sql);
        return $result;
    }
    // display single levels
    public function show($id){
        try{
        $sql = "SELECT * FROM  levels WHERE `id` = '$id'";
        $result = $this->conn->query($sql);
         return $result->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e) {
           header('location:/admin_panal/500/');
           exit;
       }
    }

}