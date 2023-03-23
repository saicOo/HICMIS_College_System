<?php 
if(isset($_POST['lev'])){
    
    function getSubject(){
        $host = "localhost";
        $db ="hicmis_system";
        $user ="root";
        $pass ="";
       $conn = new PDO ("mysql:host=".$host.";dbname=".$db."","$user",$pass);
       $lev_id =$_POST['lev'];
       $sql = "SELECT * FROM `subjects` WHERE `lev_id` = '$lev_id'";
           $result = $conn->query($sql);
           $data['subject']= $result->fetchAll(PDO::FETCH_ASSOC);
           return json_encode($data);
    }
     
    echo getSubject();
        
    }
