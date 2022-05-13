<?php
require_once "Connect.php";
class Student extends Connect{
    public $messErrors = [];
    
###############################################################
########################     login student             ########
    public function login($request){
        $code_st = $request['code_st'];
        $national = $request['national'];
        /********************************************
        *** check inputs empty
        */
        if(empty($code_st)) $this->messErrors['code'] = "the input code is empty";
        if(empty($national)) $this->messErrors['national'] = "the input national is empty";
        /********************************************
        *** check validation inputs
        */
        if(empty($this->messErrors)){
            $sql = "SELECT * FROM `student` WHERE `code_st` = '$code_st' AND `national` = '$national' ";
            $result = $this->conn->query($sql);
            $row = $result->fetch(PDO::FETCH_ASSOC);

            if($row){
                if($row['status'] != "accept"){
                    $this->messErrors['worng'] = "Your account has been temporarily suspended";
                }else{
                    $_SESSION['code_std'] = $row['code_st'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['lev_id'] = $row['lev_id'];
                    header('location:/student_panal/');
                }
               
            }else{
                $this->messErrors['worng'] = "Wrong code or national number";
            }
        }
        
    }


###############################################################
########################     display single student    ########
    public function show($code_std){
        try{
        $sql = "SELECT code_st,national,student.name,address,phone,gender,birthday,lev_id,levels.name AS lev_name 
        FROM `student` JOIN `levels` ON student.lev_id = levels.id WHERE `code_st` = '$code_std'";
        $result = $this->conn->query($sql);
         return $result->fetch(PDO::FETCH_ASSOC);
        }
         catch(Exception $e) {
            header('location:/admin_panal/500/');
        }
    }
###############################################################
########################     display single student    ########
    public function result($code_std){
        
        $sql = "SELECT SUM(student_revisions.marks) AS mark,exams.exam_title,exams.total_question 
        FROM `student_revisions` JOIN `student` ON student.code_st = student_revisions.student_id 
        JOIN `exams` ON exams.exam_id = student_revisions.exam_id 
        WHERE student.code_st =$code_std GROUP BY student_revisions.exam_id";
        $result = $this->conn->query($sql);
         return $result;
        }

###############################################################
########################     delete current student    ########
    public function destroy($id){
        $sql = "DELETE FROM student WHERE `id` = '$id'";
        $result = $this->conn->exec($sql);
        header("Refresh:0");
    }

}