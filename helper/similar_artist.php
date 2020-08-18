<?php
    include_once("app/models/user.php");

    function display_similar_artist($genre){
        $model = new User();

    
        $data = $model -> get_similar_artist(trim($genre));
        //var_dump($data);
        while($row = $data -> fetch(PDO::FETCH_ASSOC)){
        //    / var_dump($row);
            echo '<div class="col text-center d-flex justify-content-center align-items-center col-sm-4 col-md-3 col-xs-6 col-lg-2" style="padding-right: 5px;padding-left: 5px;">
            <a href="user_profile.php?user_id='. $row['user_id'] .'" style="text-decoration:none;">
                <div class="card" style="width: 150px;height: 179px;">
                    <div class="card-body" style="padding: 0px;"><img style="width: 145px;height: 145px;padding-top: 2px;" src="assets/profiles/'. $row['profile'] .'">
                        <div style="height: 32px;">
                            <p>'. $row['fullname'].'</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>';
        }

    }
    