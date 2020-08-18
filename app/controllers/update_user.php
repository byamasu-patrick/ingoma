<?php
        session_start();
            require_once("../models/user.php");
            require_once("../models/additional.php");
            require_once("../models/registercheck.php");

            $user_model = new User();
            $additional_model = new Additional();
            $additional_check = new Registercheck();

            $auhtorized_extensions = array('png', 'jpg', 'jpeg');
        if(isset($_SESSION['user_id'])){
            if(isset($_POST['fullname']) && isset($_POST['phone_number']) &&
                isset($_POST['email'])){

                    if(!empty($_POST['fullname']) && !empty($_POST['phone_number']) &&
                        !empty($_POST['email'])){
                            if(isset($_FILES['profilePicture'])){
                                if($_FILES['profilePicture']['error'] == 0){
                                   
                                    $file_info = pathinfo($_FILES['profilePicture']['name']);
                                    $file_extension = $file_info['extension'];

                                    if(in_array($file_extension, $auhtorized_extensions)){
                                        move_uploaded_file($_FILES['profilePicture']['tmp_name'],
                                    '../../assets/profiles/'. basename($_FILES['profilePicture']['name']));
                                    }
                                }
                            }
                            $data_to_be_inserted = array(
                                'fullname' => trim($_POST['fullname']),
                                'phone_number' => trim($_POST['phone_number']),
                                'email' => trim($_POST['email']),
                                'profile' => $_FILES['profilePicture']['name'],
                                'user_id' => $_SESSION['user_id']
                            );
                            if(strtolower($_SESSION['categories']) == strtolower("Artist")){
                                $data_additional = array(
                                    'user_id' => trim($_SESSION['user_id']),
                                    'genre' => trim($_POST['genre']),
                                    'biography' => trim($_POST['biography']),
                                    'facebook_link' => trim($_POST['facebook_link']),
                                    'linkedin_link' => trim($_POST['instagram_link']),
                                    'twitter_link' => trim($_POST['twitter_link'])
                                );
                                //var_dump($data_additional);
                                    $register_check = $additional_check -> check_additional_info($_SESSION['user_id']);
                                    if($register_check == null){
                                        $additional_model -> insert_new_info($data_additional);
                                        $additional_check -> insert_additional_info_check(['user_id' => $_SESSION['user_id']]);
                                    }else{
                                
                                    $additional_model -> update_additional_info($data_additional);
                                    }
                            }
                                $genre_state = $user_model -> get_genre($_SESSION['user_id']);
                                if($genre_state != null){
                                    $_SESSION['genre'] = $genre_state['genre'];

                                }                       
                                    $user_model -> update_user($data_to_be_inserted);
                                    header("Location: ../../user_profile.php");
                    }
                    else{
                        header("Location: ../../register.php");
                    }

            }else{
                header("Location: ../../register.php");
            }
        }
        else{
            header("Location: ../../login.php");
        }