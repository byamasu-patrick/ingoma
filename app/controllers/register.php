<?php
   
            require_once("../models/user.php");
            $model = new User();
            $auhtorized_extensions = array('png', 'jpg', 'jpeg', 'gif');
            if(isset($_POST['fullname']) && isset($_POST['phone_number']) &&
                isset($_POST['email']) && isset($_POST['username']) && 
                isset($_POST['password'])&& isset($_POST['categories'])){

                    if(!empty($_POST['fullname']) && !empty($_POST['phone_number']) &&
                        !empty($_POST['email']) && !empty($_POST['username']) && 
                        !empty($_POST['password']) && !empty($_POST['categories'])){
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
                            $encrypted_password = sha1(trim($_POST['password']));

                            $data_to_be_inserted = array(
                                'fullname' => trim($_POST['fullname']),
                                'phone_number' => trim($_POST['phone_number']),
                                'email' => trim($_POST['email']),
                                'username' => trim($_POST['username']),
                                'password' => $encrypted_password,
                                'profile' => $_FILES['profilePicture']['name'],
                                'categories' => trim($_POST['categories'])
                            );
                            
                        $model -> insert_new_user($data_to_be_inserted);
                        header("Location: ../../login.php");

                    }
                    else{
                        header("Location: ../../register.php");
                        //$this -> view("register", []);
                    }

            }else{
                header("Location: ../../register.php");
                //$this -> view("register", []);
            }
            