<?php
    session_start();
    include_once("app/models/user.php");
    $model = new User();
    $current_url = $_SERVER['REQUEST_URI'];

    $url = explode("/", $current_url);
    $username = $url[2];

    if(isset($username)){
        $data = $model -> login_user_by_username($username);
       
        //var_dump($result);
        if($data !== NULL){
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['profile'] = $data['profile'];
            $_SESSION['fullname'] = $data['fullname'];
            $_SESSION['profile'] = $data['profile'];
            $_SESSION['categories'] = $data['categories'];

            header("Location: user_profile.php");
        }

    } else{
        header("Location: index.php");
    }