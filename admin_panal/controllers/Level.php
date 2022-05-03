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
       }
    }
    // // insert new levels
    // public function store($request){
    //     $name = $request['name'];
    //     $email = $request['email'];
    //     $password = $request['password'];
    //     $sql = "INSERT INTO `levels`(`id`, `name`, `email`, `password`) VALUES (null,'$name','$email','$password')";
    //     $result = $this->conn->exec($sql);
    //     header('location:/hicmis_system');
    // }
}