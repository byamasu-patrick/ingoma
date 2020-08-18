<?php
    //require_once("../libs/Model.php");
    //require_once("../libs/Database.php");
    class Additional{
        public function __construct(){
            //
            $this -> db = new PDO("mysql:host=localhost; dname=ingoma", "root", ""); 
        }
        public function insert_new_info($data){
            // Creating new user account 
            $current_time = date("Y-m-d H:i:s");
            $update_time = $current_time;

            $sql = "INSERT INTO ingoma.additional_info ( user_id, genre, biography, facebook_link, linkedin_link,
                 twitter_link, timestamp) VALUES (?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $this -> db -> prepare($sql);  
            
            $stmt -> execute(array(
                $data['user_id'],
                $data['genre'],
                $data['biography'],
                $data['facebook_link'],
                $data['linkedin_link'],
                $data['twitter_link'],
                $current_time
            ));
            
        }
        public function update_additional_info($data){
            // Creating new user account 
            $current_time = date("Y-m-d H:i:s");
            $update_time = $current_time;

            $sql = "UPDATE ingoma.additional_info SET genre = ?, biography = ? , facebook_link = ?, linkedin_link = ?,
                 twitter_link = ?, timestamp = ? WHERE user_id = ?";
            
            $stmt = $this -> db -> prepare($sql);  
            
            $stmt -> execute([
                $data['genre'],
                $data['biography'],
                $data['facebook_link'],
                $data['linkedin_link'],
                $data['twitter_link'],
                $current_time,
                $data['user_id']
            ]);
            
        }
        public function get_additional_info($data){
            // Creating new user account 
            $current_time = date("Y-m-d H:i:s");
            $update_time = $current_time;

            $sql = "SELECT * FROM ingoma.additional_info WHERE user_id = ?";
            
            $stmt = $this -> db -> prepare($sql);  
            
            $stmt -> execute([ (int)$data ]);
            
        }
    }