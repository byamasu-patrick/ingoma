<?php
        session_start();
            require_once("../models/song.php");
            $model = new Song();
            $auhtorized_extensions = 'mp3';
            $file_contents = "";
            if(isset($_POST['song_name']) && isset($_POST['song_type'])){

                    if(!empty($_POST['song_name']) && !empty($_POST['song_type']) ){
                            if(isset($_FILES['song_file']) && isset($_FILES['song_cover'])){
                                if($_FILES['song_file']['error'] == 0 && $_FILES['song_cover']['error'] == 0){

                                    $cover_path = '../../assets/covers/'. $_FILES['song_cover']['name']; 

                                    $file_info = pathinfo($_FILES['song_file']['name']);
                                    $file_extension = $file_info['extension'];
                                    // var_dump($file_info);
                                    if( strtolower($auhtorized_extensions) == strtolower($file_extension)){
                                        move_uploaded_file($_FILES['song_file']['tmp_name'], '../../assets/songs/'. basename($_FILES['song_file']['name']));
                                        // Move the cover file
                                        move_uploaded_file($_FILES['song_cover']['tmp_name'], '../../assets/covers/'. basename($_FILES['song_cover']['name']));
                                           // $file_contents = file_get_contents($cover_path);


                                    }
                                    
                                }

                            }
                            
                            $data_to_be_inserted = array(
                                'song_name' => trim($_POST['song_name']) .",". $_FILES['song_file']['name'],
                                'song_type' => trim($_POST['song_type']),
                                'song_cover' => $_FILES['song_cover']['name'],
                                'artist_id' => (int) $_SESSION['user_id'],
                            );
                            
                        $model -> insert_new_song($data_to_be_inserted);
                        header("Location: ../../user_profile.php");

                    }
                    else{
                        header("Location: ../../ulpoad_file.php");
                        //$this -> view("register", []);
                    }

            }else{
                header("Location: ../../ulpoad_file.php");
                //$this -> view("register", []);
            }
            