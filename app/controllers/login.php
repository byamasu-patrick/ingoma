<?php
            session_start();
            require_once("../models/user.php");
            require_once("../models/registercheck.php");
            $model = new User();
            $check = new Registercheck();

            $message = "Your username or password is not correct";
            if(isset($_POST['username']) && isset($_POST['password'])){
                  
                    if(!empty($_POST['username']) && !empty($_POST['password'])){
                        $encrypted_paasword = sha1(trim($_POST['password']));

                            $data_to_be_inserted = array(
                                'username' => trim($_POST['username']),
                                'password' => $encrypted_paasword
                            );
                        $data = $model -> login_user($data_to_be_inserted);
                        if($data != null){
                            $register_check = $check -> check_additional_info($data['user_id']);
                            if(($register_check == null)){
                                if(strtolower($data['categories']) == strtolower("Artist")){
                                    $_SESSION['user_id'] = $data['user_id'];
                                    $_SESSION['profile'] = $data['profile'];
                                    $_SESSION['fullname'] = $data['fullname'];
                                    $_SESSION['profile'] = $data['profile'];
                                    $_SESSION['categories'] = $data['categories'];
                                    
                                    header("Location: ../../editAccount.php?user_id=". $data['user_id'] ."");
                                }
                                else{
                                    $_SESSION['user_id'] = $data['user_id'];
                                    $_SESSION['profile'] = $data['profile'];
                                    $_SESSION['fullname'] = $data['fullname'];
                                    $_SESSION['profile'] = $data['profile'];
                                    $_SESSION['categories'] = $data['categories'];
                                    //var_dump($data);
                                    header("Location: ../../user_profile.php");
                                }

                            }else{
                                $_SESSION['user_id'] = $data['user_id'];
                                $_SESSION['profile'] = $data['profile'];
                                $_SESSION['fullname'] = $data['fullname'];
                                $_SESSION['profile'] = $data['profile'];
                                $_SESSION['categories'] = $data['categories'];


                                $genre_state = $model -> get_genre($data['user_id']);

                                //var_dump($genre_state);
                                if($genre_state != null){
                                    $_SESSION['genre'] = $genre_state['genre'];

                                }
                                //var_dump($data);
                               header("Location: ../../user_profile.php");
                               
                            }
                            
                        }
                        else
                            header("Location: ../../login.php?message=$message");
                        
                    }
                    else{
                        header("Location: ../../login.php?message=$message");
                        //$this -> view("register", []);
                    }

            }else{
                $message = "Fill all the form please";
                header("Location: ../../login.php?message=$message");
                //$this -> view("register", []);
            }
            