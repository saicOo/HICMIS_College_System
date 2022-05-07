<?php
require_once "Connect.php";
class Exam extends Connect{
    public $messErrors = [];
    
###############################################################
########################     display all exams      ########
    public function display(){
        $sql = "SELECT code_st,national,`status`,exam.name,lev_id,levels.name AS lev_name 
        FROM `exam` JOIN `levels` ON exam.lev_id = levels.id ORDER BY `name`";
        $result = $this->conn->query($sql);
        return $result;
    }
###############################################################
########################     display all exams      ########
    public function search($search){
        $sql = "SELECT code_st,national,`status`,exam.name,lev_id,levels.name AS lev_name 
        FROM `exam` JOIN `levels` ON exam.lev_id = levels.id 
        WHERE exam.name LIKE '%$search%' OR code_st = '$search' OR national = '$search'
        ORDER BY `name`";
        $result = $this->conn->query($sql);
        return $result;
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
########################     update current exam    ########
    public function update($request,$code){
        $name = $request['name'];
        $phone = $request['phone'];
        $address = $request['address'];
        /********************************************
        *** check inputs empty
        */
        if(empty($name)) $this->messErrors[] = "the input name is empty";
        if(empty($phone)) $this->messErrors[] = "the input phone is empty";
        if(empty($address)) $this->messErrors[] = "the input address is empty";
        /********************************************
        *** check inputs length
        */
        if(strlen($name) > 30) $this->messErrors[] = "the name max length char 30";
        if(strlen($phone) != 11) $this->messErrors[] = "Phone numbers must be 11 . long";
        if(strlen($address) > 30) $this->messErrors[] = "the address max length char 30";
        if(empty($this->messErrors)){
            $sql = "UPDATE `exam` SET `name`='$name',`phone`='$phone',`address`='$address' WHERE `code_st` = $code";
            $result = $this->conn->exec($sql);
            $_SESSION['success'] = "The exam has been successfully registered";
            header("Refresh:0");
            exit;
        }
    }

###############################################################
########################     display single exam    ########
    public function show($code_std){
        try{
        $sql = "SELECT code_st,national,exam.name,address,phone,gender,birthday,lev_id,levels.name AS lev_name 
        FROM `exam` JOIN `levels` ON exam.lev_id = levels.id WHERE `code_st` = '$code_std'";
        $result = $this->conn->query($sql);
         return $result->fetch(PDO::FETCH_ASSOC);
        }
         catch(Exception $e) {
            header('location:/admin_panal/500/');
        }
    }


}