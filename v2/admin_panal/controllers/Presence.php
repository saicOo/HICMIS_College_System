<?php
require_once "Connect.php";
class Presence extends Connect{
// display Presence
    public function display($code_std){

$sql = "SELECT * FROM `presences` JOIN subjects ON subjects.id = sub_id WHERE std_id = $code_std";
$result  = $this->conn->query($sql);
return $result;      
    }

    
}