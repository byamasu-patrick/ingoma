<?php
    //require_once("../libs/Model.php");
    //require_once("../libs/Database.php");
    class User{
        public function __construct(){
            //
            $this -> db = new PDO("mysql:host=localhost; dname=ingoma", "root", ""); 
        }
        public function insert_new_user($data){
            // Creating new user account 
            $current_time = date("Y-m-d H:i:s");
            $update_time = $current_time;

            $sql = "INSERT INTO ingoma.users_table ( fullname, phone_number, email, username, password,
                 profile, categories, timestamp, update_at ) VALUES (:fullname, :phone_number, :email, :username, 
                 :password, :profile, :categories, :timestamp, :update_at)";

            //$sql = "INSERT INTO  ingoma.`users_table`( `fullname`, `phone_number`, `email`, `username`, `password`, `profile`, `timestamp`, `update_at`) VALUES (?,?,?,?,?,?,?,?)";
            $stmt = $this -> db -> prepare($sql);         
           
            
            $stmt -> execute(array(
                'fullname' => $data['fullname'],
                'phone_number' => $data['phone_number'],
                'email' => $data['email'],
                'username' => $data['username'],
                'password' => $data['password'],
                'profile' => $data['profile'],
                'categories' => $data['categories'],
                'timestamp' => $current_time,
                'update_at' => $update_time
            ));
           // var_dump($stmt);
           
            
        }
        public function login_user($data){
            $sql = "SELECT * FROM ingoma.users_table WHERE username = ? AND password = ?";
            $stmt = $this -> db -> prepare($sql);
      
            $stmt -> execute([
                $data['username'],
                $data['password']
            ]);
            if($info = $stmt -> fetch(PDO::FETCH_ASSOC)){
                return $info;
            }
            return null;
        }
        public function login_user_by_username($username){
            $sql = "SELECT * FROM ingoma.users_table WHERE username = ?";
            $stmt = $this -> db -> prepare($sql);
      
            $stmt -> execute([
                $username
            ]);
            if($info = $stmt -> fetch(PDO::FETCH_ASSOC)){
                return $info;
            }
            return null;
        }
        public function update_user($data){
            $sql = "UPDATE ingoma.users_table SET fullname = ?, email = ?, phone_number = ?, profile = ?,
                update_at = ? WHERE user_id = ? ";
      
             $cur_time = date('Y-m-d H:i:s');
             $stmt = $this -> db -> prepare($sql);
      
             $stmt -> execute([
                $data['fullname'],
                $data['email'],
                $data['phone_number'],
                $data['profile'],
                $cur_time,
                (int)$data['user_id']                
              ]);
        }
        public function get_user_by_id($user_id){
            $sql = "SELECT users_table.fullname, users_table.user_id, users_table.email, users_table.profile, users_table.phone_number,
            users_table.categories, additional_info.genre  FROM ingoma.users_table, ingoma.additional_info WHERE  
            additional_info.user_id = users_table.user_id AND users_table.user_id = ? ";
            $stmt = $this -> db -> prepare($sql);
      
            $stmt -> execute([ (int)$user_id ]);
            if($data = $stmt -> fetch(PDO::FETCH_ASSOC)){
                return $data;
            }
        }
        public function get_user_by_id_2($user_id){
            $sql = "SELECT * FROM ingoma.users_table WHERE users_table.user_id = ? ";
            $stmt = $this -> db -> prepare($sql);
      
            $stmt -> execute([ (int)$user_id ]);
            if($data = $stmt -> fetch(PDO::FETCH_ASSOC)){
                return $data;
            }
        }
        public function get_artists(){
            $sql = "SELECT users_table.profile_pic, users_table.user_id, 
            users_table.fullname FROM users_table ";
            $stmt = $this -> db -> prepare($sql);
      
            $stmt -> execute();
           
            return $stmt;
        }
        public function get_top_artist($data){
            $sql = "SELECT users_table.fullname, users_table.profile, users_table.user_id, songs_table.song_id, songs_table.artist_id
                    FROM ingoma.users_table, ingoma.songs_table WHERE users_table.user_id = songs_table.artist_id AND 
                    songs_table.song_id = ?";
            $stmt = $this -> db -> prepare($sql);
      
            $stmt -> execute([
               (int)$data
            ]);
            if($info = $stmt -> fetch(PDO::FETCH_ASSOC)){
                return $info;
            }
            return null;
        }
        public function get_genre($user_id){
            $sql = "SELECT * FROM ingoma.additional_info  WHERE additional_info.user_id = ?";
            $stmt = $this -> db -> prepare($sql);
    
            $stmt -> execute([
                $user_id
            ]);   
            if($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
                return $row;
            }        
            return [];
        }
        public function get_similar_artist($data){
            $sql = "SELECT users_table.user_id, users_table.fullname, users_table.profile, additional_info.genre FROM ingoma.users_table, 
                ingoma.additional_info WHERE additional_info.user_id = users_table.user_id AND additional_info.genre = ? ORDER BY RAND() LIMIT 6";
            $stmt = $this -> db -> prepare($sql);
      
            $stmt -> execute([
               $data
            ]);           
            return $stmt;
        }
    }