<?php
    include 'main.php';
    session_start();
    $obj = new Main;
    $user_id = $_SESSION['user_id'];
    $image = $obj->fetch_user_img($user_id);
    if($image->num_rows>0){
        while($row = $image->fetch_object()){
            $img = $row->user_photo;
            $user_name = ucwords($row->username);
            // $output = $img;
            // echo $output;
            if(!empty($img)){
                $photo = $img;
            }else{
                $photo = 'default.jpg';
            }
            
            $output='<div class="profile_container" style="background-image: url(upload/'.$photo.');" >
                    <b class="user_name">'; 
                        if(isset($user_name)){
							$len = strlen($user_name);
							if($len>10){
								$output.=substr($user_name,0,10);
							}else{
								$output.=$user_name;
                            }
                        }
                        $output.='</b>
                    </div>';
                    echo $output;
        }
    }

?>    