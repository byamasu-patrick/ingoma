<?php
    //require_once("../libs/Model.php");
    //require_once("../libs/Database.php");
    class Connect{
        public function __construct(){
            //
            $this -> db = new PDO("mysql:host=localhost; dname=ingoma", "root", ""); 
        }
        
        public function new_connection($data){
            $sql = "INSERT INTO ingoma.connect (artist_id, user_id, timestamp) VALUES (?, ?, ?)";
  
            $cur_time = date('Y-m-d H:i:s');
            $stmt = $this -> db -> prepare($sql);
    
            $stmt -> execute([
                $data['artist_id'],
                $data['user_id'],
                $cur_time              
          ]);
        }
        public function get_connect($currect_id){
            $sql = "SELECT users_table.user_id, users_table.fullname, users_table.profile, additional_info.genre, additional_info.biography FROM ingoma.users_table, 
            ingoma.additional_info WHERE additional_info.user_id = users_table.user_id";

            $stmt = $this -> db -> prepare($sql);
            $stmt -> execute();


            return $stmt;
        }
        public function get_connect_by_id($currect_id){
            $sql = "SELECT users_table.user_id, users_table.fullname, users_table.profile, additional_info.genre, additional_info.biography, connect.connect_id FROM ingoma.users_table, 
            ingoma.additional_info, ingoma.connect WHERE additional_info.user_id = users_table.user_id AND connect.artist_id = users_table.user_id AND connect.user_id = ?";

            $stmt = $this -> db -> prepare($sql);
            
            $stmt -> execute([$currect_id]);
            
            return $stmt;
        }
        public function get_not_connected_by_id($currect_id){
            $sql = "SELECT users_table.user_id, users_table.fullname, users_table.profile, additional_info.genre, additional_info.biography, connect.connect_id FROM ingoma.users_table, 
            ingoma.additional_info, ingoma.connect WHERE additional_info.user_id = users_table.user_id AND connect.artist_id = users_table.user_id AND connect.user_id != ?";

            $stmt = $this -> db -> prepare($sql);
            $stmt -> execute([$currect_id]);

            return $stmt;
        }
        public function check_connect_by_id($currect_id, $artist_id){
            $sql = "SELECT * FROM ingoma.connect WHERE connect.user_id = ? AND connect.artist_id = ?";

            $stmt = $this -> db -> prepare($sql);
            $stmt -> execute([$currect_id, $artist_id]);
            if($data = $stmt -> fetch(PDO::FETCH_ASSOC)){
               return $data; 
            }
            return NULL;
        }

    }