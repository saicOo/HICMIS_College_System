<?php
require_once "Connect.php";
class Admin extends Connect{
    public $messErrors = [];
##############################################################
########################     display all admins       ########
    public function display(){
        $sql = "SELECT * FROM `admin`";
        $result = $this->conn->query($sql);
        return $result;
    }
##############################################################
########################     login admin              ########
    public function login($request){
        $email = $request['email'];
        $password = $request['password'];
        /********************************************
        *** check inputs empty
        */
        if(empty($email)) $this->messErrors[] = "the input email is empty";
        if(empty($password)) $this->messErrors[] = "the input password is empty";
        /********************************************
        *** check validation inputs
        */
        if(!empty($email) && !empty($password)){
            $sql = "SELECT * FROM `admin` WHERE `email` = '$email'";
            $result = $this->conn->query($sql);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            if($row){
                $hash= $row['password'];
                if (!password_verify($password, $hash)) $this->messErrors[] = 'Invalid password';
            }else{
                $this->messErrors[] = "Invalid email";
            } 
        }

        // #### Check for errors ####
        if(empty($this->messErrors)){
                
                $_SESSION['admin'] = $row['id'];
                $_SESSION['adminName'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role'];
                header('location:/admin_panal/');
            }else{
                return $this->messErrors;
            }  
    }
###############################################################
########################     register admin            ########
    public function register($request){
        $name = $request['name'];
        $email = $request['email'];
        $password = $request['password'];
        $password_confirm = $request['password_confirm'];
        $role = $request['role'];
        /********************************************
        *** check inputs empty
        */
        if(empty($name)) $this->messErrors[] = "the input name is empty";
        if(empty($email)) $this->messErrors[] = "the input email is empty";
        if(empty($password)) $this->messErrors[] = "the input password is empty";
        if(empty($password_confirm)) $this->messErrors[] = "the input password_confirm is empty";
        if(empty($role)) $this->messErrors[] = "the input role is empty";
        /********************************************
        *** check inputs length
        */
        if(strlen($password) < 5) $this->messErrors[] = "The password must be at least 5 characters long";
        if(strlen($password) > 12) $this->messErrors[] = "The password must be no more than 12 characters";
        /********************************************
        *** check validation inputs
        */
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) $this->messErrors[] = "Please enter an email containing @";
        if($password != $password_confirm) $this->messErrors[] = "Password does not match";

        // check admin if exists
        $check = "SELECT * FROM `admin` WHERE `email` = '$email'";
        $checkRow  = $this->conn->query($check);
        if($checkRow->fetch(PDO::FETCH_ASSOC)) $this->messErrors[] = "This email already exists";

        // #### Check for errors ####
            if(empty($this->messErrors)){

            $password_hash = password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `admin`(`id`, `name`, `email`, `password`,`role`) VALUES (null,'$name','$email','$password_hash',$role)";
            $result = $this->conn->exec($sql);

            $_SESSION['success'] = "Admin registed successfully";
            header("Refresh:0");
                exit;
            }else{
                return $this->messErrors;
            }
    }
    
###############################################################
########################     update current admin      ########
    public function update($request,$id){
        $name = $request['name'];
        $role = $request['role'];
        /********************************************
        *** check inputs empty
        */
        if(empty($name)) $this->messErrors[] = "the input name is empty";
        if(empty($role)) $this->messErrors[] = "the input role is empty";
        if(empty($this->messErrors)){
        $sql = "UPDATE `admin` SET `name`='$name',`role`='$role' WHERE `id` = $id";
        $result = $this->conn->exec($sql);
        $_SESSION['adminName'] = $name;
        $_SESSION['role'] = $role;
        $_SESSION['success'] = "Admin updated successfully";
        header("Refresh:0");
        exit;
        }else{
            return $this->messErrors;
        }
    }
###############################################################
########################     display single admin       ########
    public function show($id){
        $sql = "SELECT * FROM  admin WHERE `id` = $id";
        $result = $this->conn->query($sql);
         return $result->fetch(PDO::FETCH_ASSOC);
    }
    ###############################################################
########################     accepted current student  ########
public function accepted($id,$accepted){
    $sql = "UPDATE `admin` SET `status`='$accepted' WHERE `id` = '$id'";
    $result = $this->conn->exec($sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
} 
}