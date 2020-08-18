<?php include("parts/header.php"); ?>
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col text-center col-xs-8 col-sm-12 col-md-3 col-lg-2" style="padding-right: 5px;padding-left: 5px;">
                    <a class="text-center d-sm-flex justify-content-sm-center" href="#" style="text-decoration:none;">
                        <div class="card d-sm-flex justify-content-sm-center align-items-sm-center" style="width: 150px;">
                            <div class="card-body" style="padding: 0px;"><img style="width: 145px;height: 145px;padding-top: 2px;" src="assets/covers/<?php 
                                require_once("app/models/song.php");
                                $model = new Song();
                                if(isset($_GET['song_id'])){
                                    $data = $model -> get_song_by_id($_GET['song_id']);
                                    //var_dump($data);
                                    $row = null;
                                    if($row = $data -> fetch(PDO::FETCH_ASSOC)){   
                                       
                                        //file_put_contents("assets/profiles/image.jpg", $row['song_cover']);
                                        echo $row['song_cover'];
                                    }
                                }

                            ?>"></div>
                        </div>
                    </a>
                    <div class="d-block"><i class="fa fa-download" style="color: rgb(52,58,64);font-size: 33px;"></i><i class="fa fa-heart-o" id="like_state" style="font-size: 33px;color: rgb(255,184,0);"><?php echo $_GET['like_number'];?><span id="like_display_element"></span></i></div>
                </div>
                <div class="col col-xs-12 col-sm-12 col-md-9 col-lg-10">
                    <div class="card">
                    <?php 
                            if(isset($row['song_name'])){
                                $song_name = explode(",", $row['song_name']);
                               
                                echo '<div class="card-body">
                                <h4 class="card-title">'. $song_name[0] .'</h4>
                                <h6 class="text-muted card-subtitle mb-2">#'. $row['song_type'] .'</h6>
                                <p class="card-text">'. $row['fullname'] .'</p><audio src="assets/songs/'. $song_name[1] .'" class="float-left" controls="" style="color: rgb(0,193,205);width: 100%;margin-bottom: 24px;" autoplay></audio>
                                ';
                         
                            }else{
                                header("Location: index.php");
                            }
                               
                       
                    ?>
                            <div class="row" style="padding-right: 5px;padding-left: 5px;">
                                    <div class="col" style="padding: 0px;">
                                        <ul class="list-group">
                                            <?php 
                                                    require("helper/songs_display.php"); 
                                                    show_user_profile();
                                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        <div class="row" style="margin-top: 13px;">
            <div class="col-lg-12 text-center" style="margin-top: 21px;">
                <h2 class="text-uppercase section-heading" style="margin-bottom: 0px;">Other Artist</h2>
            </div>
        </div>
       <div class="container">
      
        <div class="row">
           
                <?php   
                    
                    include_once("app/models/artist.php");
                    $model = new Artist();
                    $data = $model -> get_other_artist();
                    //var_dump($data);
                    while($row = $data -> fetch(PDO::FETCH_ASSOC)){
                        //if($row){
                            //var_dump($row);
                            echo '<div class="col text-center d-flex justify-content-center align-items-center col-sm-4 col-md-3 col-xs-6 col-lg-2" style="padding-right: 5px;padding-left: 5px;">
                            <a href="user_profile.php?user_id='. $row['user_id'] .'" style="text-decoration:none;">
                                <div class="card" style="width: 150px;height: 179px;">
                                    <div class="card-body" style="padding: 0px;"><img style="width: 145px;height: 145px;padding-top: 2px;" src="assets/profiles/'. $row['profile'] .'">
                                        <div style="height: 32px;">
                                            <p>'. $row['fullname'] .'</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>';
                        // /}
                    }
                ?>
           
        </div>
    </section>
<?php include("parts/footer.php"); ?>