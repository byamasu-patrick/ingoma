<?php
    //require_once("../libs/Model.php");
    //require_once("../libs/Database.php");
    class Song{
        public function __construct(){
            //
            $this -> db = new PDO("mysql:host=localhost; dname=ingoma", "root", ""); 
        }
        public function insert_new_song($data){
            // Creating new user account 
            $current_time = date("Y-m-d H:i:s");
            
            $sql = "INSERT INTO ingoma.songs_table (song_name, artist_id, song_type, song_cover, uploaded_time)
                 VALUES (?, ?, ?, ?, ?)";
            $stmt = $this -> db -> prepare($sql);
            
            //var_dump($data);
            $stmt -> execute([
                $data['song_name'],
                $data['artist_id'],
                $data['song_type'],
                $data['song_cover'],
                $current_time
            ]);
        }
        public function get_song_by_id($data){
            $sql = "SELECT songs_table.song_id, songs_table.song_name, songs_table.song_cover, songs_table.song_type,
            users_table.fullname FROM ingoma.songs_table, ingoma.users_table WHERE users_table.user_id = songs_table.artist_id 
            AND song_id = ?";
            $stmt = $this -> db -> prepare($sql);
      
            $stmt -> execute([
                (int) $data
            ]);
            //var_dump((int)$data);
           
            return $stmt;
        }
        public function get_all_songs(){
            $sql = "SELECT songs_table.song_id, songs_table.song_name, users_table.fullname FROM 
            ingoma.songs_table, ingoma.users_table WHERE songs_table.artist_id = users_table.user_id";
            $stmt = $this -> db -> prepare($sql);
      
            $stmt -> execute();

            return $stmt;
        }
        public function top_songs(){
            $sql = "SELECT DISTINCT hits_table.song_id FROM ingoma.hits_table";
            $stmt = $this -> db -> prepare($sql);
      
            $stmt -> execute();

            return $stmt;
        }
        public function show_all_top_songs($song_id){
            $sql = "SELECT songs_table.song_id, songs_table.song_name, users_table.fullname FROM ingoma.songs_table, ingoma.users_table 
             WHERE songs_table.artist_id = users_table.user_id AND songs_table.song_id = ?";
            $stmt = $this -> db -> prepare($sql);
      
            $stmt -> execute([$song_id]);
            if($data = $stmt -> fetch(PDO::FETCH_ASSOC)){
                return $data;
            }
            return null;
        }
        public function get_top_songs($song_id){
            $sql = "SELECT COUNT(song_id) FROM ingoma.hits_table WHERE song_id = ?";
            $stmt = $this -> db -> prepare($sql);
      
            $stmt -> execute([$song_id]);
            if($data = $stmt -> fetch(PDO::FETCH_ASSOC)){
                return $data;
            }

        }
    }