<?php include("parts/header.php"); ?>
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col text-center col-xs-8 col-sm-12 col-md-3 col-lg-2" style="padding-right: 5px;padding-left: 5px;">
                    <div class="card d-sm-flex justify-content-sm-center align-items-sm-center" style="width: 150px;">
                        <div class="card-body" id="profile" style="padding: 0px;"><span>Song cover</span><img id="image" style="width: 145px;height: 145px;padding-top: 2px;" src="assets/img/aid.png"></div>
                    </div><a class="text-center d-sm-flex justify-content-sm-center" href="#" style="text-decoration:none;"></a>
                    <div class="d-block"></div>
                </div>
                <div class="col col-xs-12 col-sm-12 col-md-9 col-lg-10">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="card-title">Upload new song</h4>
                            <form method="POST" action="app/controllers/song.php" enctype="multipart/form-data">
                                <div class="form-group"><input class="form-control d-none" name="song_cover" type="file" onchange="setPicture(event);" placeholder="" id="songCover"></div>
                                <div class="form-group"><input class="form-control" name="song_name" type="text" placeholder="Song title"></div>
                                <div class="form-group"><input class="form-control" name="song_type" type="text" placeholder="Genre"></div>
                                <div class="form-group"><input class="form-control" type="file" name="song_file"></div><button class="btn btn-primary d-lg-flex" type="submit">Upload</button></form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 13px;">
                <div class="col-lg-12 text-center" style="margin-top: 21px;">
                    <h2 class="text-uppercase section-heading" style="margin-bottom: 0px;">BEST SONGS</h2>
                </div>
            </div>
            <div class="row" style="padding-right: 5px;padding-left: 5px;">
                <div class="col col-xs-8 col-sm-12 col-md-3 col-lg-2"></div>
                <div class="col col-xs-12 col-sm-12 col-md-9 col-lg-10" style="padding: 0px;">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group">
                            <?php 
                                require("helper/songs_display.php"); 
                                list($_artist, $_songs) = show();
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
        </div>
        </div>
    </section>
   
    <script type="text/javascript">
        window.onload = () => {
            document.getElementById("profile").addEventListener("click", () => {
                var element_input = document.getElementById("songCover");
                if( element_input && document.createEvent){
                        var event_ = document.createEvent("MouseEvent");
                        event_.initEvent("click", true, false);
                        element_input.dispatchEvent(event_);
                }
            });
            
        };
        function setPicture(event){
            var selectedFile = event.target.files[0];
            var fileReaderImg = new FileReader();
            var imageTag = document.getElementById("image");
            fileReaderImg.onload = function(event){
                imageTag.src = event.target.result;
            }
            fileReaderImg.readAsDataURL(selectedFile);
  
        }

    </script>
<?php include("parts/header.php"); ?>