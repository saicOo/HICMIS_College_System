<?php
require_once "Connect.php";
class Home extends Connect{
    
    public function stdsCount(){
        $sql = "SELECT COUNT(code_st) AS c FROM `student`";
        $result = $this->conn->query($sql);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function levCount(){
        $sql = "SELECT COUNT(id) AS c FROM `levels`";
        $result = $this->conn->query($sql);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function stdsLevCount(){
        $totalCount = [];
        $all_id = "SELECT id FROM `levels`";
        $result_all = $this->conn->query($all_id);
        foreach ($result_all as $value) {
            $id = $value['id'];
            $sql = "SELECT COUNT(code_st) AS c,levels.name FROM `student` JOIN levels ON levels.id = student.lev_id WHERE student.lev_id = $id";
            $result = $this->conn->query($sql);
            $totalCount []=  $result->fetch(PDO::FETCH_ASSOC);
        }
        return $totalCount;
    }
    public function subLevCount(){
        $totalCount = [];
        $all_id = "SELECT id FROM `levels`";
        $result_all = $this->conn->query($all_id);
        foreach ($result_all as $value) {
            $id = $value['id'];
            $sql = "SELECT COUNT(subjects.id) AS c ,levels.name FROM `subjects` JOIN levels ON levels.id = subjects.lev_id WHERE subjects.lev_id = $id";
            $result = $this->conn->query($sql);
            $totalCount []=  $result->fetch(PDO::FETCH_ASSOC);
        }
        return $totalCount;
    }
}