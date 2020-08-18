<?php
    //require_once("../libs/Model.php");
    //require_once("../libs/Database.php");
    class Registercheck{
        public function __construct(){
            //
            $this -> db = new PDO("mysql:host=localhost; dname=ingoma", "root", ""); 
        }
        
        public function check_additional_info($data){
            $sql = "SELECT * FROM ingoma.check_additional WHERE check_additional.user_id = ?";
            $stmt = $this -> db -> prepare($sql);
      
            $stmt -> execute([$data]);
            if($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
                return $row;
            }
            return null;
        }
        public function insert_additional_info_check($data){
            $sql = "INSERT INTO ingoma.check_additional (user_id, is_first_login, timestamp) VALUES (?, ?, ?)";
            $stmt = $this -> db -> prepare($sql);
            $current_time = date("Y-m-d H:i:s");
      
            $stmt -> execute([ (int)$data['user_id'], 1, $current_time]);
           //var_dump($data);
        }
    }