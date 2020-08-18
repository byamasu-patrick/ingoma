<?php 
                            include_once("app/models/connect.php");
                            $model = new Connect();
                            $sec_stmt =$model -> get_connect_by_id((int)$_SESSION['user_id']);
                       
                                $stmt = $model -> get_connect((int)$_SESSION['user_id']);
                                $user_ids = array();
                                while($data_l = $sec_stmt -> fetch(PDO::FETCH_ASSOC)){
                                    // $checked = $model -> check_connect_by_id((int)$_SESSION['user_id'], $data_l['artist_id']);
                                     $user_ids[] = $data_l['user_id'];
                                         $state = 'success';
                                             echo '<li class="list-group-item">
                                     <div class="float-right"><a href="app/controllers/connect.php?user_id='. $data_l['user_id'] .'" class="btn btn-'. $state .'">Connect<i class="fab fa-nintendo-switch" style="font-size: 33px;color: rgb(208,8,44);margin-right: 10px;"></i><i class="fas fa-user-check" style="font-size: 33px;color: rgb(254,209,54);"></i></a></div>
                                     <div class="d-block d-lg-flex align-items-lg-center">
                                         <div class="d-inline" style="margin-right: 8px;"><a href="#"></a><a href="#"><img style="width: 80px;height: 80px;" src="assets/profiles/'. $data_l['profile'] .'"></a></div>
                                         <div class="d-inline-block">
                                             <div class="text-left">
                                                 <a href="#" style="text-decoration: none;">
                                                     <div><span style="font-size: 25px;">'. $data_l['fullname'] .' &nbsp;Band</span><small class="d-block" style="color: rgb(49,55,58);">Bio:&nbsp;&nbsp;<small style="color: rgb(49,55,58);">'. $data_l['biography'] .'&nbsp;</small></small>
                                                         <small
                                                             class="d-block" style="color: rgb(95,90,74);">Genre:&nbsp;<small style="color: rgb(95,90,74);">'. $data_l['genre'] .'&nbsp;</small></small>
                                                     </div>
                                                 </a>
                                             </div>                                   
                                         </div>                                
                                     </div>
                                     </li>';
     
                                 } 
                                
                                while($data = $stmt -> fetch(PDO::FETCH_ASSOC)){
                                                                       
                                    if(!in_array($data['user_id'], $user_ids)){
                                        $state = 'primary';
                                        echo '<li class="list-group-item">
                                        <div class="float-right"><a href="app/controllers/connect.php?user_id='. $data['user_id'] .'" class="btn btn-'. $state .'">Connect<i class="fab fa-nintendo-switch" style="font-size: 33px;color: rgb(208,8,44);margin-right: 10px;"></i><i class="fas fa-user-check" style="font-size: 33px;color: rgb(254,209,54);"></i></a></div>
                                        <div class="d-block d-lg-flex align-items-lg-center">
                                            <div class="d-inline" style="margin-right: 8px;"><a href="#"></a><a href="#"><img style="width: 80px;height: 80px;" src="assets/profiles/'. $data['profile'] .'"></a></div>
                                            <div class="d-inline-block">
                                                <div class="text-left">
                                                    <a href="#" style="text-decoration: none;">
                                                        <div><span style="font-size: 25px;">'. $data['fullname'] .' &nbsp;Band</span><small class="d-block" style="color: rgb(49,55,58);">Bio:&nbsp;&nbsp;<small style="color: rgb(49,55,58);">'. $data['biography'] .'&nbsp;</small></small>
                                                            <small
                                                                class="d-block" style="color: rgb(95,90,74);">Genre:&nbsp;<small style="color: rgb(95,90,74);">'. $data['genre'] .'&nbsp;</small></small>
                                                        </div>
                                                    </a>
                                                </div>                                   
                                            </div>                                
                                        </div>
                                        </li>';
                                    }
                                }
                                          
                        ?>