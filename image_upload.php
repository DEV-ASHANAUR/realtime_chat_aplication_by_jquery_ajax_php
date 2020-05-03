<?php
    include 'main.php';
    session_start();
    $obj = new Main;
    $user_id = $_SESSION['user_id'];
    //$user_data = $obj->fetch_user($user_id);
    $image = $obj->fetch_user_img($user_id);
    if($image->num_rows>0){
        while($row = $image->fetch_object()){
            $img = $row->user_photo;
        }
    }
    if(isset($_POST['image'])){
        $data = $_POST['image'];
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
        $imageName = time() . '.png';
        if(file_put_contents('upload/' . $imageName, $data)){
            if(!empty($img)){
                unlink('upload/'.$img);
                $obj->update_profile($user_id,$imageName);
            }else{
                $obj->update_profile($user_id,$imageName);
            }
        }
        //$image_file = addcslashes(file_get_contents($imageName));
        

    }















    ?>