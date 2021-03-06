<?php include("parts/header.php"); ?>
    <section class="bg-light">
        <div class="container">
            <div class="row" style="margin-bottom: 10px;">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading" style="margin-bottom: 0px;">Top Artists</h2>
                    <h3 class="section-subheading text-muted" style="margin: 0px;">Ingoma - The Power of Music</h3>
                </div>
            </div>
            <div class="row">
                <?php 
                            require("helper/songs_display.php"); 
                            list($_artist, $_songs) = show();
                           // var_dump(count($_artist));
                    $i = 0;
                    
                    while($i < count($_artist)){
                       // if(isset($_artist[$i])){
                            //var_dump($row);
                            echo '<div class="col text-center d-flex justify-content-center align-items-center col-sm-4 col-md-3 col-xs-6 col-lg-2" style="padding-right: 5px;padding-left: 5px;">
                            <a href="user_profile.php?user_id='. $_artist[$i]['user_id'] .'" style="text-decoration:none;">
                                <div class="card" style="width: 150px;height: 179px;">
                                    <div class="card-body" style="padding: 0px;"><img style="width: 145px;height: 145px;padding-top: 2px;" src="assets/profiles/'. $_artist[$i]['profile'] .'">
                                        <div style="height: 32px;">
                                            <p>'. $_artist[$i]['fullname'] .'</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>';
                        $i++;
                      //  }

                    }
                ?>
                
            </div>
            <div class="row" style="margin-top: 40px;">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading" style="margin-bottom: 0px;">Top Songs</h2>
                </div>
            </div>
            <div class="row" style="padding-right: 5px;padding-left: 5px;">
                <div class="col">
                    <ul class="list-group">
                       
                      <?php 
                        
                        $i = 0;
                        while($i < count($_songs)){
                            //if(isset($_songs)){
                                echo $_songs[$i];
                                $i++;
                            //}
                        }
                        ?>
                       
                    </ul>
                </div>
            </div>
        </div>
    </section>
  
<?php include("parts/footer.php"); ?>