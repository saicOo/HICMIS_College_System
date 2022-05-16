<?php

class Auth{
    function __construct(){
        if(!isset($_SESSION['admin']))header('location:/HICMIS/admin_panal/padges/auth/login.php');
}
    public function checkAuth(){
        if(isset($_SESSION['admin'])) header('location:/HICMIS/admin_panal/');
        
    }
}