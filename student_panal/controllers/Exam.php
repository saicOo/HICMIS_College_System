<?php
require_once "Connect.php";
class Exam extends Connect{
    
###############################################################
########################     display all exams      ########
    public function display($exam_id,$page){
        $sql = "SELECT * FROM `question` WHERE exam_id = $exam_id";
        $result = $this->conn->query($sql);
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        $countRow = $row;
        
        return count($countRow) >= $page ? $row[$page - 1] : $row[0];
        
    }

    public function option($question_id){
        $sql = "SELECT * FROM `option` WHERE question_id = $question_id";
        $result = $this->conn->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function saveAnswarNext($exam_id,$page){
        ++$page;
        $sql = "SELECT * FROM `question` WHERE exam_id = $exam_id";
        $result = $this->conn->query($sql);
        $countRow = $result->fetchAll(PDO::FETCH_ASSOC);
        $page = count($countRow) >= $page ? $page : 1;
        header('location:/student_panal/padges/exam/index.php?ref='.$exam_id.'&page='.$page);
        exit;
    }
    public function saveAnswarPrev($exam_id,$page){
        // check admin if exists
$check = "SELECT * FROM `presences` WHERE `std_id` = $code_std AND `sub_id` = $sub_id";
$result  = $this->conn->query($check);
$row = $result->fetch(PDO::FETCH_ASSOC);

if(!$row){
    $sql = "INSERT INTO `presences`(`pres_id`, `std_id`, `sub_id`, `presence_count`) VALUES (null,'$code_std','$sub_id',1)";
        $this->conn->exec($sql);
}else{
    date_default_timezone_set('Canada/Pacific');
                                                           
    if(date("Y-m-d", strtotime($row['pres_date'])) !== date("Y-m-d") ){
    $presence = $row['presence_count'] + 1;
    $sql = "UPDATE `presences` SET `presence_count`='$presence',`pres_date`=current_timestamp() WHERE `std_id` = $code_std AND `sub_id` = $sub_id";
        $this->conn->exec($sql);
    }else{
        $sql = "UPDATE `presences` SET `pres_date`=current_timestamp() WHERE `std_id` = $code_std AND `sub_id` = $sub_id";
            $this->conn->exec($sql);
    }
}



        --$page;
        $sql = "SELECT * FROM `question` WHERE exam_id = $exam_id";
        $result = $this->conn->query($sql);
        $countRow = $result->fetchAll(PDO::FETCH_ASSOC);
        $page = $page === 0 || $page > count($countRow) ? count($countRow) : $page;
        header('location:/student_panal/padges/exam/index.php?ref='.$exam_id.'&page='.$page);
        exit;
    }

}