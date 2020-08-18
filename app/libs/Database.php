<?php 
    class Database extends PDO{
        /* 
            This function is the which apply the connection to the databse 
        */
        public function __construct(){
            parent::__construct("mysql:host=localhost; dname=ingoma", "root", "");            
        }
    }