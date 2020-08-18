<?php
    require_once("app/models/song.php");
    require_once("app/models/user.php");
    require_once("app/models/like.php");
           
  function filter_artist($artist_to_filter){
    $get_data_to_filter = array();
   
    for($i = 0; $i < count($artist_to_filter); $i++){
        $get_data_to_filter[$i] = $artist_to_filter[$i]['user_id'];
        //echo "Value : ". $top_[$i]['hit_number'];
    }
    return $get_data_to_filter;
  }
   function show(){
        
            $model = new Song();
            $user_model = new User();
            $like_model = new Like();
            //$data = $model -> get_all_songs();
            $data_filtered = filter_songs(show_top_song()); 
            $show_songs = array();
            $show_artists = array();
            $i = 0; $index = $i; $b = 0; $c = 0;
            while($i < count($data_filtered)){
                //if(!empty($row)){
                    $row =  $model  -> show_all_top_songs($data_filtered[$i]['song_id']);
                    $user_display_top_artist = $user_model -> get_top_artist((int)$data_filtered[$i]['song_id']);
                    //var_dump($user_display_top_artist);

                    if( $user_display_top_artist != null){
                        if($b < 5){   
                            $data_to_filter = filter_artist($show_artists);
                            if(!in_array($user_display_top_artist['user_id'], $data_to_filter)){
                                $show_artists[$b] = array(
                                    'fullname' => $user_display_top_artist['fullname'],
                                    'profile' => $user_display_top_artist['profile'],
                                    'user_id' => $user_display_top_artist['user_id']
                                );
                                $b++;   
                            }                    
                                                   
                        }
                    }                    
                    if($row != null){
                        $song_name = explode(",", $row['song_name']);
                        //var_dump($row);
                        $index = $c;
                        $like = $like_model -> get_like_by_id($row['song_id']);
                        $show_songs[$c] = '<li class="list-group-item">
                        <div class="float-right"><a href="app/controllers/like.php?song_id='. $row['song_id'] .'"><i class="fa fa-heart-o" style="font-size: 33px;color: rgb(208,8,44);">'. $like['COUNT(likes_table.like_state)'] .'</i></a></div>
                        <div class="d-block d-lg-flex align-items-lg-center">
                            <div class="d-inline" style="margin-right: 8px;"><a href="assets/songs/'. $song_name[1] .'"><i class="fa fa-download" style="color: rgb(52,58,64);font-size: 33px;"></i></a><a href="assets/songs/'. $song_name[1] .'"><i class="fa fa-play-circle" id="play" style="color: rgb(255,184,0);font-size: 33px;margin-left: 7px;"></i></a></div>
                            <div class="d-inline-block">
                                <div class="text-left"  onclick="get_item_id(this.id);">
                                    <a href="app/controllers/song_hit.php?song_id='. $row['song_id'] .'"  style="text-decoration: none;">
                                        <div><span>'. $song_name[0] .'</span><small class="d-block">'. $row['fullname'] .'</small></div>
                                    </a>
                                </div>
                            </div>
                        </div><audio id="song" class="d-none" controls="assets/songs/'. $song_name[1] .'" style="width: 100%;"></audio></li>';
                        $c++;
                    }                    
                $i++;
            }
            $data = $model -> get_all_songs();
            //var_dump($data);
            $final_show_songs = show_other($data, $show_songs, $data_filtered, $index);
            
            return array( $show_artists, $final_show_songs);

    }

    function show_other($data, $show_songs, $data_filtered, $index){
        $like_model = new Like();
        
        while($row = $data -> fetch(PDO::FETCH_ASSOC)){
            $state = true;
           // for($i = 0; $i < count($data_filtered); $i++){
            $unautorized_song = array();
                        
                for($i = 0; $i < count($data_filtered); $i++){
                    $unautorized_song[$i] = $data_filtered[$i]['song_id'];
                    //echo "Value : ". $top_[$i]['hit_number'];
                }
                            
                if(in_array($row['song_id'], $unautorized_song)){
                    $state = false;
                }
                else{
                    $state = true;
                }
            if($state){
                $song_name = explode(",", $row['song_name']);
                $like = $like_model -> get_like_by_id($row['song_id']);
                $show_songs[$index] = '<li class="list-group-item">
                <div class="float-right"><a href="app/controllers/like.php?song_id='. $row['song_id'] .'"><i class="fa fa-heart-o" style="font-size: 33px;color: rgb(208,8,44);">'. $like['COUNT(likes_table.like_state)'] .'</i></a></div>
                <div class="d-block d-lg-flex align-items-lg-center">
                    <div class="d-inline" style="margin-right: 8px;"><a href="assets/songs/'. $song_name[1] .'"><i class="fa fa-download" style="color: rgb(52,58,64);font-size: 33px;"></i></a><a href="assets/songs/'. $song_name[1] .'"><i class="fa fa-play-circle" id="play" style="color: rgb(255,184,0);font-size: 33px;margin-left: 7px;"></i></a></div>
                    <div class="d-inline-block">
                        <div class="text-left"  onclick="get_item_id(this.id);">
                            <a href="app/controllers/song_hit.php?song_id='. $row['song_id'] .'"  style="text-decoration: none;">
                                <div><span>'. $song_name[0] .'</span><small class="d-block">'. $row['fullname'] .'</small></div>
                            </a>
                        </div>
                    </div>
                </div><audio id="song" class="d-none" controls="assets/songs/'. $song_name[1] .'" style="width: 100%;"></audio></li>';

            }
        }
        return $show_songs;
    }
    function show_top_song(){
        $model = new Song();
        $data = $model -> top_songs();
        //
        $top_ = array();
        $i = 0;
        while($row = $data -> fetch(PDO::FETCH_ASSOC)){
           
            $top_data =  $model -> get_top_songs((int)$row['song_id']);
            $top_[$i] = array(
                'song_id' => $row['song_id'],
                'hit_number' => $top_data['COUNT(song_id)']
            );
           $i++;
        }
        
        //var_dump($final_data);
        return $top_;
    }
    function filter_songs($top_ ){
       
        $get_max = array();
        $final_data = array();
         
        for($i = 0; $i < count($top_); $i++){
            $get_max[$i] = $top_[$i]['hit_number'];
            //echo "Value : ". $top_[$i]['hit_number'];
        }
        rsort($get_max);
        for($i = 0; $i < count($get_max); $i++){
           
            for($j = 0; $j < count($top_); $j++){
               
                if(isset( $top_[$j]['hit_number'] ) && isset( $top_[$j]['song_id'] )){
                    if($get_max[$i] == $top_[$j]['hit_number']){
                        $final_data[$j] = array(
                            'hit_number' => $top_[$j]['hit_number'],
                            'song_id' => $top_[$j]['song_id']
                        );
                        unset( $top_[$j]['hit_number'] );
                        unset( $top_[$j]['song_id'] );
                       
                    }
                }else{
                    continue;
                }            
            }
        }
        return $final_data;
    }
    function show_user_profile(){
        $model = new Song();
        $like_model = new Like();
        $data = $model -> get_all_songs();
       
        //var_dump($data);
        while($row = $data -> fetch(PDO::FETCH_ASSOC)){
            //if(!empty($row)){
                $like = $like_model -> get_like_by_id($row['song_id']);
                $song_name = explode(",", $row['song_name']);
            echo '<li class="list-group-item">
            <div class="float-right"><a href="app/controllers/like.php?song_id='. $row['song_id'] .'"><i class="fa fa-heart-o" style="font-size: 33px;color: rgb(255,184,0);"></i></a></div>
            <div class="d-block d-lg-flex align-items-lg-center">
                <div class="d-inline" style="margin-right: 8px;"><a href="assets/songs/'. $song_name[1] .'"><i class="fa fa-download" style="color: rgb(52,58,64);font-size: 33px;"></i></a><a href="assets/songs/'. $song_name[1] .'"><i class="fa fa-play-circle" style="color: rgb(255,184,0);font-size: 33px;margin-left: 7px;"></i></a></div>
                <div class="d-inline-block">
                    <div class="text-left">
                        <a href="song_play.php?song_id='. $row['song_id'] .'&like_number='. $like['COUNT(likes_table.like_state)'] .'" style="text-decoration: none;">
                            <div style="color: rgb(0,193,205);"><span>'. $song_name[0] .'&nbsp;</span><small class="d-block">'. $row['fullname'] .'</small></div>
                        </a>
                    </div>
                </div>
            </div><audio class="d-none" controls="" style="width: 100%;"></audio></li>';
        }
    }