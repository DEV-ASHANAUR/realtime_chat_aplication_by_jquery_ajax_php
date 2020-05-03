<?php
    include 'main.php';
    session_start();
    $obj = new Main;
    $log_d_id = $_SESSION['login_details_id'];
    if(isset($_POST['is_type'])){

        $obj->update_is_type($_POST['is_type'],$log_d_id);


    }










?>