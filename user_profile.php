<?php include("parts/header.php"); ?>
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col text-center d-flex justify-content-center align-items-center col-sm-4 col-md-3 col-xs-6 col-lg-2" style="padding-right: 5px;padding-left: 5px;">
                    <a href="#" style="text-decoration:none;">
                        <div class="card" style="width: 150px;">
                            <?php
                                include_once("helper/get_user_info.php");
                               
                            ?>
                            <div class="card-body" style="padding: 0px;"><img style="width: 145px;height: 145px;padding-top: 2px;" src="assets/profiles/<?php echo $profile_img; ?>"></div>
                        </div>
                    </a>
                </div>
               
                <div class="col col-sm-8 col-md-9 col-xs-12 col-lg-10" style="padding: 0px;padding-right: 5px;padding-left: 5px;">
                    <div style="width: 100%;background-color: #ffb800;color: rgb(253,254,255);"><span style="font-size: 25px;"><?php if(isset($_SESSION['fullname'])){ echo $_SESSION['fullname']; }else{ echo $data['fullname']; } ?></span></div>
                    <hr class="justify-content-md-start" style="width: 100%;margin: 0px;">
                    <div class="d-md-flex"><small style="font-size: 12px;">I started Music in 1980 when I performed at the camp manager</small></div>
                    <div  style="display:<?php echo $display; ?>;" class="text-center" style="margin-top: 22px;"><a href="editAccount.php?user_id=<?php echo $_SESSION['user_id'];  ?>" class="btn btn-info" role="button" data-aos="zoom-in" style="font-size: 8px;background-color: rgb(52,58,64);color: rgb(254,255,255);">Edit Profile</a><a class="btn btn-primary" role="button" data-aos="zoom-in" style="font-size: 8px;background-color: rgb(79,193,208);margin: 5px;margin-top: 0px;margin-bottom: 0px;margin-right: 5px;color: rgb(255,255,255);"
                            href="upload_song.php">Upload&nbsp;</a><a class="btn btn-primary" href="connect.php" role="button" data-aos="zoom-in" style="font-size: 8px;background-color: rgb(255,184,0);color: rgb(254,255,255);">Connect</a></div>
                    <div class="text-break text-right" style="position: absolute; bottom: 0px; right: 0px;">
                        <p style="text-decoration: none;margin: 0px;"><a href="#" style="text-decoration: none;color: rgb(0,204,217);"><i class="fa fa-twitter-square"></i></a><a href="#" style="text-decoration: none;color: rgb(0,193,205);">&nbsp;<i class="fa fa-facebook-square"></i></a><a href="#"
                                style="text-decoration: none;color: rgb(0,193,205);">&nbsp;<i class="fa fa-linkedin-square"></i></a>&nbsp;</p>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-right: 5px;padding-left: 5px;margin-top: 25px;">
                <div class="col" style="padding: 0px;">
                    <ul class="list-group">
                        
                       <?php 
                            require("helper/songs_display.php"); 
                            show_user_profile();
                       ?>
                    </ul>
                </div>
            </div>
            <div class="row" style="margin-top: 13px;">
                <div class="col-lg-12 text-center" style="margin-top: 21px;">
                    <h2 class="text-uppercase section-heading" style="margin-bottom: 0px;">Similar Artists</h2>
                </div>
            </div>
            <div class="row d-lg-flex justify-content-lg-center">
                <?php
                    include_once("helper/similar_artist.php");
                    if(isset($genre)){
                        display_similar_artist($genre);
                    }
                    
                ?>
               
               </div>
        </div>
    </section>

    <?php include("parts/footer.php"); ?>