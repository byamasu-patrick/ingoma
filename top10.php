<?php include("parts/header.php"); ?>
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col text-center col-xs-8 col-sm-12 col-md-3 col-lg-2" style="padding-right: 5px;padding-left: 5px;">
                    <a class="text-center d-sm-flex justify-content-sm-center" href="#" style="text-decoration:none;">
                        <div class="card d-sm-flex justify-content-sm-center align-items-sm-center" style="width: 150px;">
                            <div class="card-body" style="padding: 0px;"><img style="width: 145px;height: 145px;padding-top: 2px;" src="assets/img/32410_nwU45UKXcY84zVBiWWP9SV6V1Rtj_s.jpg"></div>
                        </div>
                    </a>
                    <div class="d-block"><i class="fa fa-download" style="color: rgb(52,58,64);font-size: 33px;"></i><i class="fa fa-heart-o" style="font-size: 33px;color: rgb(255,184,0);"></i></div>
                </div>
                <div class="col col-xs-12 col-sm-12 col-md-9 col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Top 10&nbsp;</h4>
                            <div class="row" style="padding-right: 5px;padding-left: 5px;">
                                <div class="col" style="padding: 0px;">
                                    <ul class="list-group">
                                        <?php 
                                             require("helper/songs_display.php"); 
                                             list($_artist, $_songs) = show();
                                             $i = 0;
                                             while($i < 10){
                                                if($i !== count($_songs)){
                                                     echo $_songs[$i];
                                                     $i++;
                                                }else{
                                                    break;
                                                }
                                             }
                                        
                                        ?>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </section>
    
<?php include("parts/footer.php"); ?>