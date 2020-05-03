<?php
    include 'main.php';
    session_start();
    $obj = new Main;
    $user_id = $_SESSION['user_id'];
    if(isset($_POST['to_user_id'])){
        $to_user_id = $_POST['to_user_id'];
        
        $chat_message = $_POST['chat_message'];
        $status = $obj->send_chat_message($to_user_id,$user_id,$chat_message);
        if($status == 4){
            
            echo $data = $obj->fetch_user_history($user_id,$_POST['to_user_id']);
            // if($data == false){
            //     echo "no";
            // }

        }else{
            echo 'no';
        }
    }










?>