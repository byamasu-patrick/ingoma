<?php
   
   function show_song_to_lay($data_id){
        require_once("app/models/song.php");
            $model = new Song();
            $data = $model -> get_song_by_id($data_id);
            //var_dump($data);
            while($row = $data -> fetch(PDO::FETCH_ASSOC)){
                //if(!empty($row)){
                    $song_name = explode(",", $row['song_name']);
                    echo '<li class="list-group-item">
                    <div class="float-right"><a href="app/controllers/like.php?song_id='. $row['song_id'] .'"><i class="fa fa-heart-o" style="font-size: 33px;color: rgb(208,8,44);"></i></a></div>
                    <div class="d-block d-lg-flex align-items-lg-center">
                        <div class="d-inline" style="margin-right: 8px;"><a href="assets/songs/'. $song_name[1] .'"><i class="fa fa-download" style="color: rgb(52,58,64);font-size: 33px;"></i></a><a href="#"><i class="fa fa-play-circle" style="color: rgb(255,184,0);font-size: 33px;margin-left: 7px;"></i></a></div>
                        <div class="d-inline-block">
                            <div class="text-left">
                                <a href="song_play.php?song_id='. $row['song_id'] .'" style="text-decoration: none;">
                                    <div><span>'. $song_name[0] .'</span><small class="d-block">'. $row['fullname'] .'</small></div>
                                </a>
                            </div>
                        </div>
                    </div><audio class="d-none" controls="assets/songs/'. $song_name[1] .'" style="width: 100%;"></audio></li>';
            //s }
            }
    }