<?php
    session_start();

    include_once("../models/connect.php");
    $model = new Connect();
    if(isset($_SESSION['user_id']) && isset($_SESSION['categories'])){
        if(isset($_GET['user_id'])){
            $model -> new_connection(array(
                'artist_id' => (int)$_GET['user_id'],
                'user_id' => (int)$_SESSION['user_id']
            ));
            header("Location: ../../connect.php");
        }
        else{
            header("Location: ../../connect.php");
        }
    }else{
        $model -> new_connection([
            'artist_id' => (int) $_SESSION['user_id'],
            'user_id' => (int) $_GET['user_id']
        ]);
        echo "No Session";

        header("Location: ../../connect.php");
    }


?>