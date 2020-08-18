<?php 
    //session_start();
    include_once("app/models/user.php");
    $model = new User();
    $data = "";
    if(isset($_GET['user_id'])){
        if(!empty($_GET['user_id'])){
           
                $data = $model -> get_user_by_id((int) $_GET['user_id']);
                if($data == NULL){
                    $data = $model -> get_user_by_id_2((int) $_GET['user_id']);
                }
        }
    }
   
    else{
        if($_SESSION['categories'] == "Artist"){
            $data = $model -> get_user_by_id((int) $_SESSION['user_id']);
        }
    }

    if(isset($_GET['user_id'])){
        $display = "none";
        $profile_img = $data['profile'];
        if(isset($data['genre'])){
            $genre = $data['genre'];
        }else{
            $display = "none";
        }                                 
    }
    else{
        $display = "block";
        $profile_img = $_SESSION['profile'];
        if(isset($data['genre'])){
            if(isset($_SESSION['genre'])){
                $genre =  $_SESSION['genre'];
            }else{
                $genre =  $data['genre'];
            }
           
        }else{
            $display = "none";
        }
    }
    
?>