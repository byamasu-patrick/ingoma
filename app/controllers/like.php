<?php
            session_start();
            require_once("../models/like.php");
            $model = new Like();
            //var_dump($_POST);
            if(isset($_SESSION['user_id'])){
                if(isset($_GET['song_id'])){

                    if(!empty($_GET['song_id'])){
                        $song_id = (int)trim($_GET['song_id']);
                            //$song_id, $like_state, $user_id
                        $is_like = $model -> check_like($song_id, (int)$_SESSION['user_id']);
                        if($is_like == null){
                            $model -> insert_new_likes($song_id, 1, (int)$_SESSION['user_id'] );
                        }
                        $data_like = $model -> get_like_by_id($song_id);
                        //print($data_like['COUNT(likes_table.like_state)']);
                        //var_dump($data_like);
                        header("Location: ../../song_play.php?song_id=". (int)$_GET['song_id'] ."&like_number=". $data_like['COUNT(likes_table.like_state)'] );
                        //print("Liked ". $data_like);

                    }
                    else{
                        $data_like = $model -> get_like_by_id((int)$_GET['song_id']);
                        //var_dump($data_like);
                        header("Location: ../../song_play.php?song_id=". (int)$_GET['song_id'] ."&like_number=". $data_like['COUNT(likes_table.like_state)']);
                    }

            }else{
                $data_like = $model -> get_like_by_id((int)$_GET['song_id']);
                //var_dump($data_like);
                header("Location: ../../song_play.php?song_id=". (int)$_GET['song_id'] ."&like_number=". $data_like['COUNT(likes_table.like_state)']);
            }
            }else{
                $data_like = $model -> get_like_by_id((int)$_GET['song_id']);
                //var_dump($data_like);
                header("Location: ../../song_play.php?song_id=". (int)$_GET['song_id'] ."&like_number=". $data_like['COUNT(likes_table.like_state)']);
            }
            
            