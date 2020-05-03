<?php
    include 'main.php';
    session_start();
    $obj = new Main;
    $user_id = $_SESSION['user_id'];
    echo $data = $obj->fetch_user_history($user_id,$_POST['to_user_id']);











?>