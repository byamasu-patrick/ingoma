<?php
    //require_once("../libs/Model.php");
    require_once("../libs/Database.php");
    class Hit{
        public function __construct(){
            //
            $this -> db = new Database();
        }
        public function add_hit($song_id, $user_id){
            // Creating new user account 
            $current_time = date("Y-m-d H:i:s");
            //SELECT * FROM ingoma.hits_table ORDER BY (SELECT COUNT(song_id) FROM ingoma.hits_table)

            // $sql_hit_song = "SELECT * FROM ingoma.hits_table WHERE (SELECT COUNT(song_id) FROM 
            //         ingoma.hits_table) = (SELECT MAX((SELECT COUNT(song_id) FROM ingoma.hits_table)) 
            //         FROM ingoma.hits_table ) LIMIT BY 4 ORDER BY DESC";
            
            $sql = "INSERT INTO ingoma.hits_table (song_id, user_id, timestamp) VALUES (?, ?, ?)";
            $stmt = $this -> db -> prepare($sql);
            
            //var_dump($data);
            $stmt -> execute([
                (int)$song_id,
                (int)$user_id,
                $current_time
            ]);
        }
        
        
    }