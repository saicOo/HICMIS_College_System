<?php
require_once "Connect.php";

class Lecture extends Connect{
     
    public $messErrors = [];

    ###############################################################
    ########################    display all lectures       ########
    public function display($material_id){
        $sql = "SELECT *,IF(typ = 2, 'section' ,'lecture') as `type` FROM `lectures` WHERE `material_id` = '$material_id'";
        $result = $this->conn->query($sql);
        return $result;
    }

    ###############################################################
    ########################    insert new lectures        ########
    public function store($request){
        $material_id = $request['material_id'];
        $sub_name= $request['sub_name'];
        $material_name= $request['material_name'];
        $lev_name= $request['lev_name'];
        $type = $request['type'];
        $lecture_type = $request['lecture_type'];
        $lecture_name = $request['lecture_name'];
        $lecture_tmp = $request['lecture_tmp'];
        $location = '../../../upload/'.'/'.$lev_name.'/'.$sub_name.'/'.$material_name.'/';
    /********************************************
        *** check inputs empty
        */
        if(empty($lecture_name)) $this->messErrors[] = "the input lecture name is empty";
        /********************************************
        *** check inputs length
        */
        if(strlen($lecture_name) > 200) $this->messErrors[] = "the lecture name max length char 200";
        /********************************************
        *** check validation inputs
        */
        if ($lecture_type != "video/mp4")$this->messErrors[] = "The lecture type not mp4";

        if (file_exists($location . $lecture_name))$this->messErrors[] = "This lecture already exists";
    // #### Check for errors ####
    if(empty($this->messErrors)){
    move_uploaded_file($lecture_tmp ,$location.$lecture_name );
    $sql = "INSERT INTO `lectures`(`lecture_id`, `lecture_name`, `typ`,`material_id`) VALUES (null,'$lecture_name','$type',$material_id)";
    $result = $this->conn->exec($sql);
    $_SESSION['success'] = "lecture created successfully";
    header("Refresh:0");
    exit;
    }else{
        return $this->messErrors;
    }
    }
    ###############################################################
    ########################    delete current lectures    ########
    public function destroy($lecture_name,$material_id,$material_name,$sub_name,$lev_name){
        $location = '../../../upload/'.$lev_name.'/'.$sub_name.'/'.$material_name.'/'.$lecture_name;
        if(file_exists($location)){
        $sql = "DELETE FROM lectures WHERE `lecture_name` = '$lecture_name' AND `material_id` = '$material_id'";
        $result = $this->conn->query($sql);
        unlink($location);
        $_SESSION['success'] = "lecture deleted successfully";
        
        }else{
            $_SESSION['error'] = "File name not found";
        }
    header('location:/HICMIS/admin_panal/padges/lecture/?ref='.$material_id);
    exit;
        
        
    }
    
}