<?php
session_start();
define("PAGE_PATH",dirname(__DIR__));
function __autoload($class){
    require PAGE_PATH."/../controllers/".$class.".php";
}
date_default_timezone_set('Canada/Pacific');

if(isset($_POST['duration'])){
    $myTime= strtotime($_POST['duration']) - time();
    
    if(!isset($_COOKIE['time'])){
        // $_SESSION['time'] = time();
        // $_SESSION['unroll'] = date("Y-m-d h:i A", strtotime($_POST['duration']));
        
        setcookie('time',time(),strtotime($_POST['duration'])+1,);
        setcookie('enroll',date("Y-m-d h:i A", strtotime($_POST['duration'])),strtotime($_POST['duration']));
     }else{
        //  $diff =   time() -$_SESSION['time'];
         $diff =   time() - $_COOKIE['time'];
         $diff =   $myTime - $diff;
         
       $hours = floor($diff/60/60);
       $minute = (int)($diff/60);
       $sucnd = $diff%60;
       if($diff == 0 || $diff > 0 ){
     
           echo $hours . " : ".$minute ." : ". $sucnd;
       }else{
        $exam = new Exam;
     echo   $exam->checkTimer($_POST['exam']);
       }
}


}