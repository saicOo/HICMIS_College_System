<?php
require_once "Connect.php";
class Subject extends Connect{
    public $messErrors = [];

###############################################################
########################     display all subjects     ########
    public function display($lev_id){
        
        $sql = "SELECT * FROM `subjects` WHERE `lev_id` = '$lev_id'";
        $result = $this->conn->query($sql);
        return $result;
    
    }


###############################################################
########################     insert new subjects       ########
    public function store($request){
        $location = '../../../upload/';
        $name = $request['name'];
        $lev_id = $request['lev_id'];
        $lev_name = $request['lev_name'];
        /********************************************
        *** check inputs empty
        */
        if(empty($name)) $this->messErrors[] = "the input subject name is empty";
        /********************************************
        *** check inputs length
        */
        if(strlen($name) > 50) $this->messErrors[] = "the lev_name max length char 50";
        /********************************************
        *** check validation inputs
        */
        $check = "SELECT * FROM `subjects` WHERE `name` = '$name'";
        $checkRow  = $this->conn->query($check);
        if($checkRow->fetch(PDO::FETCH_ASSOC)){
            $this->messErrors[] = "This subjects already exists";
        }
        // #### Check for errors ####
        if(empty($this->messErrors)){
        if (!file_exists($location . $lev_name))mkdir($location . $lev_name);
        mkdir($location . $lev_name . '/' . $name);
        $sql = "INSERT INTO `subjects`(`id`, `name`, `lev_id`) VALUES (null,'$name',$lev_id)";
        $result = $this->conn->exec($sql);
        $_SESSION['checkMessage'] = 1;
        $_SESSION['success'] = "subject created successfully";

        header("Refresh:0");
        }else{
            return $this->messErrors;
        }
    }

###############################################################
########################     show single subjects   ########
    public function show($sub_id){
        try{
        $sql = "SELECT subjects.id,subjects.name,levels.name AS lev_name,levels.id AS lev_id FROM `subjects` JOIN `levels` ON levels.id = subjects.lev_id WHERE subjects.id = '$sub_id'";
        $result = $this->conn->query($sql);
         return $result->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e) {
            header('location:/admin_panal/500/');
        }
    }


###############################################################
########################     delete current subjects   ########
    public function destroy($sub_id,$dirName,$lev_id,$lev_name){
        $_SESSION['checkMessage'] = 1;

        $location = '../../../upload/'.$lev_name.'/'.$dirName;
        $ckechLocation = scandir($location);
        if(isset($ckechLocation[2])){
            $_SESSION['error'] = "The folder cannot be deleted because it contains other files";
        }else{
            rmdir($location);
            $sql = "DELETE FROM subjects WHERE `id` = $sub_id";
            $result = $this->conn->exec($sql);
            $_SESSION['success'] = "subject deleted successfully";
        }
        header('location:/admin_panal/padges/subjects/?ref='.$lev_id);
        
    }
}