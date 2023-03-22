<?php
require_once "Connect.php";
class Exam extends Connect{
    
###############################################################
########################   display exams index of level  ########
    public function displayExam(){
        $level_id = $_SESSION['lev_id'];
        $sql = "SELECT * FROM `exams` WHERE level_id = $level_id";
        $result = $this->conn->query($sql);
        return $result;
       
    }
###############################################################
########################     show one row exam      ########
    public function showExam($exam_id){
        $sql = "SELECT * FROM `exams` WHERE exam_id = $exam_id";
        $result = $this->conn->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
       
    }
############################################################################
########################     display all Question index of exam      ########
    public function showQuestion($exam_id,$page){
        $sql = "SELECT * FROM `question` WHERE exam_id = $exam_id";
        $result = $this->conn->query($sql);
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        $countRow = $row;
        return count($countRow) >= $page ? $row[$page - 1] : $row[0];
    }
###############################################################
######################## display all option index of question  ########
    public function option($question_id){
        $sql = "SELECT * FROM `option` WHERE question_id = $question_id";
        $result = $this->conn->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

###################################################################
########################     Save the student's answer      ########
    public function saveAnswar($exam_id,$student_id,$ques_id,$option){
        // check admin if exists
        $check = "SELECT * FROM `student_revisions` WHERE `student_id` = $student_id AND `question_id` = $ques_id";
        $result  = $this->conn->query($check);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        
        $getQuestion = "SELECT * FROM `question` WHERE question_id = $ques_id";
            $question = $this->conn->query($getQuestion);
            $answer_option = $question->fetch(PDO::FETCH_ASSOC)['answer_option'];
        $mark = $option === $answer_option ? "1 mark" : "0 mark";
        if(!$row){
            $insert = "INSERT INTO `student_revisions`(`revision_id`, `student_id`, `exam_id`, `question_id`,`answar_option`,`marks`) 
            VALUES (null,$student_id,$exam_id,$ques_id,'$option','$mark')";
                $this->conn->exec($insert);
        }else{
            $insert = "UPDATE `student_revisions` SET `answar_option`='$option',`marks`='$mark' WHERE `student_id` = $student_id AND `question_id` = $ques_id";
                $this->conn->exec($insert);
        
        }
    }
###############################################################
########################     next question     ########
    public function saveAnswarNext($exam_id,$page,$ques_id,$option){
        $student_id = $_SESSION['code_std'];
        if(isset($option))
        $this->saveAnswar($exam_id,$student_id,$ques_id,$option);
        ++$page;
        $sql = "SELECT COUNT(exam_id) AS c FROM `question` WHERE exam_id = $exam_id";
        $result = $this->conn->query($sql);
        $countExam = $result->fetch(PDO::FETCH_ASSOC);
        $page = $countExam['c'] >= $page ? $page : 1;
        header('location:/student_panal/padges/exam/index.php?ref='.$exam_id.'&page='.$page);
        exit;
    }
###############################################################
########################     Prev question      ########
    public function saveAnswarPrev($exam_id,$page,$ques_id,$option){
        $student_id = $_SESSION['code_std'];
        if(isset($option))
        $this->saveAnswar($exam_id,$student_id,$ques_id,$option);

        --$page;
        $sql = "SELECT COUNT(exam_id) AS c FROM `question` WHERE exam_id = $exam_id";
        $result = $this->conn->query($sql);
        $countExam = $result->fetch(PDO::FETCH_ASSOC);
        $page = $countExam['c'] >= $page ? $page : 1;
        header('location:/student_panal/padges/exam/index.php?ref='.$exam_id.'&page='.$page);
        exit;
    }

    ###############################################################
########################     check option exit     ########
public function checkOption($question_id){
    $student_id = $_SESSION['code_std'];
    $sql = "SELECT answar_option FROM `student_revisions` WHERE question_id = $question_id AND student_id = $student_id ";
    $row = $this->conn->query($sql);
    $option = $row->fetch(PDO::FETCH_ASSOC);
    $result = isset($option['answar_option']) ? $option['answar_option'] : 5; 
    return $result;
}
###############################################################
########################     enrol exam status      ########
public function enrollExam($exam_id,$finish){
    $student_id = $_SESSION['code_std'];
   $check = "SELECT exams.exam_duration,enroll.attendance_status,enroll.exam_end_time
   FROM `enroll` JOIN `exams` ON exams.exam_id = enroll.exam_id 
   WHERE enroll.student_id = $student_id AND enroll.exam_id = $exam_id";
   $result  = $this->conn->query($check);
   $row = $result->fetch(PDO::FETCH_ASSOC);
   date_default_timezone_set('Africa/Cairo');
   if(!$row){
       $exam_duration_count = $this->showExam($exam_id)['exam_duration'];
       $exam_duration = date("Y-m-d H:i", strtotime($exam_duration_count));
    //    exit($exam_duration);
       $insert = "INSERT INTO `enroll`(`enroll_id`, `student_id`, `exam_id`, `attendance_status`,`exam_end_time`) 
       VALUES (null,$student_id,$exam_id,'attend','$exam_duration')";
           $this->conn->exec($insert);
           
        }else{
            if(date("Y-m-d H:i", strtotime($row['exam_end_time'])) <= date("Y-m-d H:i")|| $row['attendance_status'] === "completed" || $finish === true){
                $insert = "UPDATE `enroll` SET attendance_status = 'completed' WHERE student_id = $student_id AND exam_id = $exam_id";
                   $this->conn->exec($insert);
                echo '<script> location.href ="/student_panal/" </script>';
                exit;
            }
        }
    
}
###############################################################
########################     get status exam student   ########
public function checkEnroll($exam_id){
    $student_id = $_SESSION['code_std'];
                    $sql = "SELECT attendance_status
                    FROM `enroll` 
                    WHERE student_id = $student_id AND exam_id = $exam_id";
                   $result = $this->conn->query($sql)->fetch(PDO::FETCH_ASSOC);
                   if($result){
                       return $result['attendance_status'];
                   }
}
###############################################################
########################     show timer ajax      ########
public function examDuration($exam_id){
    $student_id = $_SESSION['code_std'];
    $check = "SELECT exams.exam_duration,enroll.attendance_status,enroll.exam_end_time
    FROM `enroll` JOIN `exams` ON exams.exam_id = enroll.exam_id 
    WHERE enroll.student_id = $student_id AND enroll.exam_id = $exam_id";
    $result  = $this->conn->query($check);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return $row['exam_end_time'];
}

}