<?php
require_once "Connect.php";
class Question extends Connect{
    public $messErrors = [];
    
###############################################################
########################     display all exams      ########
    public function display(){
        $sql = "SELECT * FROM `exams` ";
        $result = $this->conn->query($sql);
        return $result;
    }
###############################################################
########################     store exam             ########
    public function store($request){
        $exam_id=  $request['exam_id'];
        $question_title=  $request['question_title'];

        $option_title1=  $request['option_title1'];
        $option_title2=  $request['option_title2'];
        $option_title3=  $request['option_title3'];
        $option_title4=  $request['option_title4'];
        $option_title = [$option_title1,$option_title2,$option_title3,$option_title4];

        $answer_option=  $request['answer_option'];
        /********************************************
        *** check inputs empty
        */
        if(empty($exam_id)) $this->messErrors[] = "the input exam_id is empty";
        if(empty($question_title)) $this->messErrors[] = "the input question_title is empty";
        if(empty($option_title)) $this->messErrors[] = "the input option_title is empty";
        if(empty($answer_option)) $this->messErrors[] = "the input answer_option is empty";
        /********************************************
        *** check inputs length
        */
            // #### Check for errors ####
            if(empty($this->messErrors)){
                // ISERT QUESTION
                $sql = "INSERT INTO `question`(`question_id`, `question_title`, `exam_id`) 
                VALUES (NULL,'$question_title','$exam_id')";
                $result = $this->conn->exec($sql);
                // GET LAST ROW ID
                $show = "SELECT * FROM `question` ORDER BY question_id DESC LIMIT 1 ";
                $row = $this->conn->query($show);
                $question_id = $row->fetch(PDO::FETCH_ASSOC)['question_id'] ;
                // INSERT OPTION
                for ($i=0; $i < 4; $i++) { 
                    $title = $option_title[$i];
                    $count = $i +1;
                $insertOption = "INSERT INTO `option`(`option_id`, `question_id`, `option_number`,`option_title`) 
                VALUES (NULL,$question_id,$count,'$title')";
                $this->conn->exec($insertOption);
                }
                // ISERT QUESTION
                $sql = "UPDATE `question` SET `answer_option` = $answer_option WHERE `question_id` = $question_id";
                $result = $this->conn->exec($sql);


                $_SESSION['success'] = "The exam has been successfully registered";
                header("Refresh:0");
                exit;
            }else{
                
              return  $this->messErrors;
            }
    }

}