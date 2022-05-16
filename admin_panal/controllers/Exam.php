<?php
require_once "Connect.php";
class Exam extends Connect{
    public $messErrors = [];


###############################################################
########################     checkDateEaxam all exams      ########
    public function checkDateEaxam(){
        $sql = "SELECT exam_id,exam_datetime FROM `exams`";
        $exams = $this->conn->query($sql);  
        date_default_timezone_set('Canada/Pacific');
        foreach ($exams as $item) {
            $exam_id = $item['exam_id'];
            if (date("Y-m-d h:i A", strtotime($item['exam_datetime'])) <= date("Y-m-d h:i A")) {
                $sql = "UPDATE `exams` SET `status`='completed' WHERE `exam_id` = '$exam_id'";
                $this->conn->exec($sql);
            }
        }
    }
###############################################################
########################     display all exams      ########
    public function display(){
        $sql = "SELECT * FROM `exams` ORDER BY exam_id DESC";
        $result = $this->conn->query($sql);        
        return $result;
    }
###############################################################
########################     display exams of level      ########
    public function displayOfLevel($level_id){
        $sql = "SELECT * FROM `exams` WHERE level_id = $level_id";
        $result = $this->conn->query($sql);
        return $result;
    }
###############################################################
########################     count question      ########
public function questionCount($exam_id){
    $sql = "SELECT COUNT(exam_id) AS c FROM `question` WHERE exam_id = $exam_id";
    $result = $this->conn->query($sql);
    return $result->fetch(PDO::FETCH_ASSOC);
}
###############################################################
########################     store exam             ########
    public function store($request){
        $title=  $request['title'];
        $exam_datetime=  date('Y-m-d H:i',strtotime($request['exam_datetime']));
        $duration=  $request['duration'];
        $total_question=  $request['total_question'];
        $lev_id= $request['lev_id'];
        $sub_id=  $request['sub_id'];
        /********************************************
        *** check inputs empty
        */
        if(empty($title)) $this->messErrors[] = "the input title is empty";
        if(empty($exam_datetime)) $this->messErrors[] = "the input exam_datetime is empty";
        if(empty($duration)) $this->messErrors[] = "the input duration is empty";
        if(empty($total_question)) $this->messErrors[] = "the input total_question is empty";
        if(empty($lev_id)) $this->messErrors[] = "the input lev_id is empty";
        if(empty($sub_id)) $this->messErrors[] = "the input sub_id is empty";
        /********************************************
        *** check inputs length
        */
        if(strlen($title) < 5) $this->messErrors[] = "the name max length char 5";
        if(strlen($title) > 200) $this->messErrors[] = "the address max length char 200";     
            // #### Check for errors ####
            if(empty($this->messErrors)){
                $sql = "INSERT INTO `exams`(`exam_id`, `exam_title`, `exam_datetime`, `exam_duration`, `total_question`,`level_id`,`subject_id`) 
                VALUES (NULL,'$title','$exam_datetime','$duration',$total_question,$lev_id,$sub_id)";
                $result = $this->conn->exec($sql);
                $_SESSION['success'] = "The exam has been successfully registered";
                header("Refresh:0");
                exit;
            }else{
                
              return  $this->messErrors;
            }
    }

###############################################################
########################     display single exam    ########
    public function show($exam_id){
        try{
        $sql = "SELECT * 
        FROM `exams` WHERE `exam_id` = '$exam_id'";
        $result = $this->conn->query($sql);
         return $result->fetch(PDO::FETCH_ASSOC);
        }
         catch(Exception $e) {
            header('location:/HICMIS/admin_panal/500/');
        }
    }

###############################################################
########################     status Exam  ########
public function status($exam_id,$status){
    $sql = "UPDATE `exams` SET `status`='$status' WHERE `exam_id` = '$exam_id'";
    $result = $this->conn->exec($sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} 
###############################################################
########################     delete Exam  ########
public function destroy($exam_id){

        $sql = "DELETE FROM exams WHERE `exam_id` = $exam_id";
        $result = $this->conn->exec($sql);
        
        $_SESSION['success'] = "exam deleted successfully";
        header('location:/HICMIS/admin_panal/padges/exam/');
        exit;
    
}
}
