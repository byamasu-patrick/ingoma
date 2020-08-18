<?php
    //require_once("../libs/Model.php");
    //require_once("../libs/Database.php");
    class Like{
        public function __construct(){
            //
            $this -> db = new PDO("mysql:host=localhost; dname=ingoma", "root", ""); 
        }
        public function insert_new_likes($song_id, $like_state, $user_id){
            // Creating new user account 
            $current_time = date("Y-m-d H:i:s");
            
            $sql = "INSERT INTO ingoma.likes_table (song_id, like_state, user_id, timestamp) VALUES (?, ?, ?, ?)";
            $stmt = $this -> db -> prepare($sql);
            
            //var_dump($data);
            $stmt -> execute([
                $song_id,
                $like_state,
                $user_id,
                $current_time
            ]);
        }
        public function get_like_by_id($song_id){
            $sql = "SELECT COUNT(likes_table.like_state) FROM ingoma.likes_table WHERE likes_table.song_id = ?";
            $stmt = $this -> db -> prepare($sql);
      
            $stmt -> execute([ $song_id ]);
            if($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
                return $row;
            }
           // return null;
        }
        public function check_like($song_id, $user_id){
            $sql = "SELECT * FROM ingoma.likes_table WHERE likes_table.song_id = ? AND user_id = ?";
            $stmt = $this -> db -> prepare($sql);
      
            $stmt -> execute([ $song_id, $user_id ]);
            if($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
                return $row;
            }
            return null;
        }
        
    }