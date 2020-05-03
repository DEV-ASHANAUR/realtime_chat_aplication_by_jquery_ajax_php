<?php
    include 'main.php';
    session_start();
    $last_id = $_SESSION['login_details_id'];
    $obj = new Main;
    $obj->update_last_activity($last_id);







?>