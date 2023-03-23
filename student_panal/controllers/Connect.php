<?php
class Connect{
    private $host = "localhost";
    private $db ="hicmis_college_system";
    private $user ="root";
    private $pass ="";
    public $conn;
    function __construct(){
        try{
            $this->conn = new PDO ("mysql:host=".$this->host.";dbname=".$this->db."","$this->user",$this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            header('location:/student_panal/500/');
        }
    }
}