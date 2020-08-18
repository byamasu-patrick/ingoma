<?php include("parts/header.php"); ?>
    <section class="bg-light">
    <?php include_once("helper/get_user_info.php"); 
        $display = "";
        if(strtolower($data['categories']) == strtolower("Artist")){
            $display = "block";
            $display_cus = "none";
        }else{
            $display = "none"; 
            $display_cus = "block";
        }?>
        <div class="container">
            <div class="row">
                <div class="col text-center d-flex justify-content-center align-items-center col-sm-4 col-md-3 col-xs-6 col-lg-2" style="padding-right: 5px;padding-left: 5px;">
                    <a href="#" style="text-decoration:none; position: absolute; top:0;">
                        <div class="card" style="width: 150px;">
                            <div class="card-body" style="padding: 0px;" id="profile"><img id="image" style="width: 145px;height: 145px;padding-top: 2px;" src="assets/profiles/<?php echo $data['profile']; ?>"></div>
                        </div>
                    </a>
                </div> 
                
                <div class="col col-sm-8 col-md-9 col-xs-12 col-lg-10" style="padding: 0px;padding-right: 5px;padding-left: 5px;">
                    <h1>Edit Profile</h1>
                    <?php  $data['fullname'];  ?>
                    <form  method="POST" style="display: <?php echo $display_cus; ?>" id="not-artist" action="app/controllers/update_user.php" enctype="multipart/form-data">
                        <!-- <div class="form-group"><input class="form-control d-none" type="file" id="songCover" onchange="setPicture(event)" name="profilePicture" required="" placeholder=""></div> -->
                        <div class="form-group"><input class="form-control" type="text" value="<?php echo $data['fullname']; ?>" name="fullname"></div>
                        <div class="form-group"><input class="form-control" type="text" value="<?php echo $data['phone_number']; ?>" name="phone_number"></div>
                        <div class="form-group"><input class="form-control" type="text" value="<?php echo $data['email']; ?>" name="email"></div><button class="btn btn-primary" type="button" style="float: right;">Update</button>
                    </form>
                    <form id="artist" method="POST" style="display: <?php echo $display; ?>" action="app/controllers/update_user.php" enctype="multipart/form-data">
                        <div class="form-group"><input class="form-control d-none" type="file" id="songCover" onchange="setPicture(event)" name="profilePicture" placeholder=""></div>
                        <div class="form-group"><input class="form-control" type="text" value="<?php echo $data['fullname']; ?>" name="fullname"></div>
                        <div class="form-group"><input class="form-control" type="text" value="<?php echo $data['phone_number']; ?>" name="phone_number"></div>
                        <div class="form-group"><input class="form-control" type="text" value="<?php echo $data['email']; ?>" name="email"></div>
                        <div class="form-group"><select class="form-control" name="genre"><optgroup label="Music Genre"><option value="Rock music">Rock music</option><option value="Electronic music">Electronic music</option><option value="Soul music/R&amp;B">Soul music/R&amp;B</option><option value="Funk">Funk</option><option value="Country music">Country music</option><option value="">Latin Music</option><option value="Reggae">Reggae</option><option value="Hip hop music">Hip hop music</option><option value="Polka">Polka</option><option value="Religious music">Religious music</option><option value="Traditional and folk music">Traditional and folk music</option></optgroup></select></div>
                        <div style="display: <?php echo $display; ?>"
                            class="form-group"><textarea class="form-control" name="biography" placeholder="Biography"></textarea></div>
                        <div style="display: <?php echo $display; ?>" class="form-group"><input class="form-control" type="text" name="facebook_link" placeholder="facebook link"></div>
                        <div style="display: <?php echo $display; ?>" class="form-group"><input class="form-control" type="text" name="instagram_link" placeholder="instagram link"></div>
                        <div style="display: <?php echo $display; ?>" class="form-group"><input class="form-control" type="text" name="twitter_link" placeholder="twitter link"></div><button class="btn btn-primary" type="submit" style="float: right;">Update</button>
                    </form>
            </div>
        </div>
        </div>
    </section>
   
<?php include("parts/footer.php"); ?>