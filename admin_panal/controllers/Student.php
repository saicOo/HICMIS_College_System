<?php
require_once "Connect.php";
class Student extends Connect{
    public $messErrors = [];
    
###############################################################
########################     display all students      ########
    public function display(){
        $sql = "SELECT code_st,national,`status`,student.name,lev_id,levels.name AS lev_name 
        FROM `student` JOIN `levels` ON student.lev_id = levels.id ORDER BY `name`";
        $result = $this->conn->query($sql);
        return $result;
    }
###############################################################
########################     display all students      ########
    public function search($search){
        $sql = "SELECT code_st,national,`status`,student.name,lev_id,levels.name AS lev_name 
        FROM `student` JOIN `levels` ON student.lev_id = levels.id 
        WHERE student.name LIKE '%$search%' OR code_st = '$search' OR national = '$search'
        ORDER BY `name`";
        $result = $this->conn->query($sql);
        return $result;
    }
    
###############################################################
########################     register student          ########
    public function register($request){
        $code=  $request['code'];
        $confirm_code=  $request['confirm_code'];
        $national=  $request['national'];
        $confirm_national=  $request['confirm_national'];
        $name= $request['name'];
        $phone=  $request['phone'];
        $birthday=  date('Y-m-d',strtotime($request['birthday']));
        $address=  $request['address'];
        $gender=  $request['gender'];
        $lev_id=  $request['lev_id'];
        /********************************************
        *** check inputs empty
        */
        if(empty($code)) $this->messErrors[] = "the input code is empty";
        if(empty($national)) $this->messErrors[] = "the input national is empty";
        if(empty($name)) $this->messErrors[] = "the input name is empty";
        if(empty($phone)) $this->messErrors[] = "the input phone is empty";
        if(empty($birthday)) $this->messErrors[] = "the input birthday is empty";
        if(empty($address)) $this->messErrors[] = "the input address is empty";
        if(empty($gender)) $this->messErrors[] = "the input gender is empty";
        if(empty($lev_id)) $this->messErrors[] = "the input level is empty";
        /********************************************
        *** check inputs length
        */
        if(strlen($code)!= 4) $this->messErrors[] = "code numbers must be 4 . long";
        if(strlen($national)!= 14) $this->messErrors[] = "national numbers must be 14 . long";
        if(strlen($name) > 30) $this->messErrors[] = "the name max length char 30";
        if(strlen($phone) != 11) $this->messErrors[] = "Phone numbers must be 11 . long";
        if(strlen($address) > 30) $this->messErrors[] = "the address max length char 30";
        /********************************************
        *** check validation inputs
        */
        if(filter_var($code,FILTER_VALIDATE_INT) === false) $this->messErrors[] = "The code number must be integer";
        if(filter_var($national,FILTER_VALIDATE_INT) === false) $this->messErrors[] = "The national number must be integer";
        // check inputs code and national is confirm ********
        if($code != $confirm_code || $national != $confirm_national) $this->messErrors[] = "the input code or national is not confirm";
        // check student if exists ********
        $check = "SELECT * FROM `student` WHERE `national` = '$national' OR `code_st` = '$code'";
        $checkRow  = $this->conn->query($check);
        if($checkRow->fetch(PDO::FETCH_ASSOC)){
           $this->messErrors[] = "This national or code already exists";
        }else{
            // #### Check for errors ####
            if(empty($this->messErrors)){
                $sql = "INSERT INTO `student`(`code_st`, `national`, `name`, `phone`, `birthday`, `address`, `gender`, `lev_id`) 
                VALUES ($code,'$national','$name','$phone','$birthday','$address','$gender','$lev_id')";
                $result = $this->conn->exec($sql);
                $_SESSION['checkMessage'] = 1;
                $_SESSION['success'] = "The student has been successfully registered";
                header('location:/admin_panal/padges/students/');
            }else{
                
              return  $this->messErrors;
            }
        }
    }
###############################################################
########################     login student             ########
    public function login($request){
        $code_st = $request['code_st'];
        $national = $request['national'];
        if(!empty($code_st)||!empty($national)){
            $sql = "SELECT * FROM `student` WHERE `code_st` = '$code_st' AND `national` = '$national' ";
            $result = $this->conn->query($sql);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            if($row){
                $_SESSION['code_st'] = $row['code_st'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['lev_id'] = $row['lev_id'];
            }else{
                return  $this->messErrors[] = "Invalid email";
            }
        }else{
            return $this->messErrors[] = "the input is empty";
        }
        
    }
###############################################################
########################     update current student    ########
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
            $sql = "UPDATE `student` SET `name`='$name',`phone`='$phone',`address`='$address' WHERE `code_st` = $code";
            $result = $this->conn->exec($sql);
            $_SESSION['checkMessage'] = 1;
            $_SESSION['success'] = "The student has been successfully registered";
            header("Refresh:0");
        }
    }
###############################################################
########################     accepted current student  ########
    public function accepted($code_std,$accepted){
        $sql = "UPDATE `student` SET `status`='$accepted' WHERE `code_st` = '$code_std'";
        $result = $this->conn->exec($sql);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
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
########################     delete current student    ########
    public function destroy($id){
        $sql = "DELETE FROM student WHERE `id` = '$id'";
        $result = $this->conn->exec($sql);
        header("Refresh:0");
    }

}