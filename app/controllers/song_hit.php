<?php
    if(isset($_GET['song_id'])){
            session_start();
            require_once("../models/hit.php");
            require_once("../models/like.php");
            $like_model = new Like();

            $model = new Hit();

            if(isset($_SESSION['user_id'])){
                $song_id = $_GET['song_id'];
                $model -> add_hit((int)$song_id, (int)$_SESSION['user_id']);
                $data_like = $like_model -> get_like_by_id((int)$song_id);
                header("Location: ../../song_play.php?song_id=". $_GET['song_id'] ."&like_number=". $data_like['COUNT(likes_table.like_state)']);
              // echo $_POST['song_id'];
            }else{
                $song_id = $_GET['song_id'];
                $model -> add_hit((int)$song_id, 1);
                header("Location: ../../song_play.php?song_id=". $_GET['song_id'] ."&like_number=". $data_like['COUNT(likes_table.like_state)']);
            }
            
        
    }