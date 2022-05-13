<?php
require_once "Connect.php";
class Revision extends Connect{


###############################################################
########################     display all exams      ########
public function display($exam_id){
    $sql = "SELECT student_revisions.student_id,student_revisions.exam_id,student_revisions.marks,student_revisions.question_id,
    question.question_title,student_revisions.answar_option,exams.subject_id 
    FROM `student_revisions` 
    JOIN `exams` ON exams.exam_id = student_revisions.exam_id 
    JOIN `question` ON question.question_id = student_revisions.question_id 
    WHERE student_revisions.exam_id = $exam_id 
    ORDER BY `revision_id` DESC";
    $result = $this->conn->query($sql);        
    return $result;
}
###############################################################
########################     display exams of level      ########
    public function ExamsOfStudents($exam_id){
        $sql = "SELECT student.name,student_revisions.student_id,exams.exam_title,exams.total_question, 
        SUM(student_revisions.marks) AS mark 
        FROM `student_revisions` 
        JOIN `exams` ON exams.exam_id = student_revisions.exam_id 
        JOIN student ON student.code_st = student_revisions.student_id 
        WHERE student_revisions.exam_id = $exam_id GROUP BY student.name";
        $result = $this->conn->query($sql);
        return $result;
    }
###############################################################
########################     display exams of level      ########
    public function resultStudent($exam_id,$student_id){
        $sql = "SELECT student_revisions.student_id,student_revisions.marks,student_revisions.question_id, question.question_title,student_revisions.answar_option 
        FROM `student_revisions` 
        JOIN `question` ON question.question_id = student_revisions.question_id 
        WHERE student_revisions.exam_id = $exam_id AND student_revisions.student_id = $student_id";
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

}
