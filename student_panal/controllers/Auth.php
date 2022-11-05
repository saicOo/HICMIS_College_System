<?php

class Auth{
    function __construct(){
        if(!isset($_SESSION['code_std'])){
            header('location:/student_panal/login/index.php');
            exit;
        }
}
    public function checkAuth(){
        if(isset($_SESSION['code_std'])){
             header('location:/student_panal/');
             exit;
        }
        
    }
}