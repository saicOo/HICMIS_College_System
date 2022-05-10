<?php
require_once "Connect.php";
class Exam extends Connect{
    
###############################################################
########################     display all exams      ########
    public function displayExam(){
        $level_id = $_SESSION['lev_id'];
        $sql = "SELECT * FROM `exams` WHERE level_id = $level_id";
        $result = $this->conn->query($sql);
        return $result;
       
    }
    public function showExam($exam_id){
        $sql = "SELECT * FROM `exams` WHERE exam_id = $exam_id";
        $result = $this->conn->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
       
    }
    public function showQuestion($exam_id,$page){
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


    public function saveAnswar($exam_id,$student_id,$ques_id,$option){
        // check admin if exists
        $check = "SELECT * FROM `student_revisions` WHERE `student_id` = $student_id AND `question_id` = $ques_id";
        $result  = $this->conn->query($check);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        
        $getQuestion = "SELECT * FROM `question` WHERE question_id = $ques_id";
            $question = $this->conn->query($getQuestion);
            $answer_option = $question->fetch(PDO::FETCH_ASSOC)['answer_option'];
        $mark = $option === $answer_option ? "5 mark" : "- 5 mark";
        if(!$row){
            $insert = "INSERT INTO `student_revisions`(`revision_id`, `student_id`, `exam_id`, `question_id`,`answar_option`,`marks`) VALUES (null,$student_id,$exam_id,$ques_id,'$option','$mark')";
                $this->conn->exec($insert);
        }else{
            $insert = "UPDATE `student_revisions` SET `answar_option`='$option',`marks`='$mark' WHERE `student_id` = $student_id AND `question_id` = $ques_id";
                $this->conn->exec($insert);
        
        }
    }
    

    public function saveAnswarNext($exam_id,$student_id,$page,$ques_id,$option){
        if(isset($option))
        $this->saveAnswar($exam_id,$student_id,$ques_id,$option);
        ++$page;
        $sql = "SELECT * FROM `question` WHERE exam_id = $exam_id";
        $result = $this->conn->query($sql);
        $countRow = $result->fetchAll(PDO::FETCH_ASSOC);
        $page = count($countRow) >= $page ? $page : 1;
        header('location:/student_panal/padges/exam/index.php?ref='.$exam_id.'&page='.$page);
        exit;
    }



    public function saveAnswarPrev($exam_id,$student_id,$page,$ques_id,$option){
        if(isset($option))
        $this->saveAnswar($exam_id,$student_id,$ques_id,$option);

        --$page;
        $sql = "SELECT * FROM `question` WHERE exam_id = $exam_id";
        $result = $this->conn->query($sql);
        $countRow = $result->fetchAll(PDO::FETCH_ASSOC);
        $page = $page === 0 || $page > count($countRow) ? count($countRow) : $page;
        header('location:/student_panal/padges/exam/index.php?ref='.$exam_id.'&page='.$page);
        exit;
    }

}