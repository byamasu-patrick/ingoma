<?php
    //require_once("../libs/Model.php");
    //require_once("../libs/Database.php");
    class Artist{
        public function __construct(){
            //
            $this -> db = new PDO("mysql:host=localhost; dname=ingoma", "root", ""); 
        }
        
        public function get_other_artist(){
            $sql = "SELECT users_table.user_id, users_table.fullname, users_table.profile FROM ingoma.users_table
            WHERE categories = ?  ORDER BY RAND() LIMIT 5";
            $stmt = $this -> db -> prepare($sql);
      
            $stmt -> execute(['Artist']);

            return $stmt;
        }
        public function get_other_artist_play(){
            $sql = "SELECT users_table.user_id, users_table.fullname, users_table.profile FROM ingoma.users_table
            WHERE  categories = ? LIMIT 4";
            $stmt = $this -> db -> prepare($sql);
      
            $stmt -> execute(['Artist']);

            return $stmt;
        }
        public function get_artists(){
            $sql = "SELECT users_table.user_id, users_table.fullname, users_table.profile FROM ingoma.users_table WHERE  users_table.categories = 'Artist' ORDER BY RAND()  LIMIT 6";
            $stmt = $this -> db -> prepare($sql);
      
            $stmt -> execute(['Artist']);

            return $stmt;
        }
    }