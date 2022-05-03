<?php
require_once "Connect.php";

class Material extends Connect{
     
    public $messErrors = [];

###############################################################
########################     display all materials     ########
    public function display($sub_id){
        $sql = "SELECT * FROM `material` WHERE `sub_id` = '$sub_id' ORDER BY date_mat";
        $result = $this->conn->query($sql);
        return $result;
    }

###############################################################
########################     insert new material       ########
public function store($request){
    /********************************************
        *** get inputs request
        */
    $description = $request['description'];
    $date_mat=  date('Y-m-d',strtotime($request['date_mat']));
    $sub_id = $request['sub_id'];
    $sub_name = $request['sub_name'];
    $lev_name = $request['lev_name'];
    /********************************************
        *** get path location
        */
    $location = '../../../upload/'.$lev_name.'/'.$sub_name.'/';
    /********************************************
        *** check inputs empty
        */
        if(empty($description)) $this->messErrors[] = "the input material name is empty";
        /********************************************
        *** check inputs length
        */
        if(strlen($description) > 50) $this->messErrors[] = "the material name max length char 50";
        /********************************************
        *** check validation inputs
        */
        if (file_exists($location . $description))$this->messErrors[] = "This material already exists";
    if(empty($this->messErrors)){
    mkdir($location . $description);
    $sql = "INSERT INTO `material`(`id`,`description`,`date_mat`,`sub_id`) VALUES (null,'$description','$date_mat',$sub_id)";
    $result = $this->conn->exec($sql);
    $_SESSION['checkMessage'] = 1;
    $_SESSION['success'] = "subject created successfully";
        header("Refresh:0");
        }else{
            return $this->messErrors;
        }
}

###############################################################
########################     show single material   ########
public function show($material_id){
        try{
    $sql = "SELECT material.id,material.description,material.sub_id,subjects.name,subjects.lev_id 
    FROM `material` JOIN `subjects` ON subjects.id = material.sub_id WHERE material.id = '$material_id'";
    $result = $this->conn->query($sql);
     return $result->fetch(PDO::FETCH_ASSOC);
    }
    catch(Exception $e) {
       header('location:/admin_panal/500/');
   }
}

###############################################################
########################     delete current material   ########
    public function destroy($material_id,$material_name,$sub_id,$sub_name,$lev_name){
        
        $location = '../../../upload/'.$lev_name.'/'.$sub_name.'/'.$material_name;
        
        $ckechLocation = scandir($location);

        if(isset($ckechLocation[2])){
            $_SESSION['checkMessage'] = 1;
            $_SESSION['error'] = "The folder cannot be deleted because it contains other files";
            header('location:/admin_panal/padges/material/?ref='.$sub_id);
        }else{
            rmdir($location);
            $sql = "DELETE FROM material WHERE `id` = $material_id";
            $result = $this->conn->exec($sql);
            
            $_SESSION['checkMessage'] = 1;
            $_SESSION['success'] = "material deleted successfully";
            header('location:/admin_panal/padges/material/?ref='.$sub_id);
        }
    }
}
