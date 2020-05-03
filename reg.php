<?php
    include "main.php";
    $obj = new Main;
    session_start();
    include "Flash_data.php";

    if(isset($_POST['submit'])){
       $userName = $_POST['user'];
       $pass1 = $_POST['pass1'];
       $pass2 = $_POST['pass2'];
       if($pass1 == $pass2){
            $status = $obj->reg($userName,$pass1);
            if($status == true){
                //Flass_data::reg_done("Login Here!");
                header('location:login.php');  
            }else{
                Flass_data::reg_error("please Enter Unique UserName!");
                header('location:sign_up.php');  
            }
       }else{
        Flass_data::reg_error("Password do not match!");
        header('location:sign_up.php'); 
       } 
    }else{
        header('location:sign_up.php');
    }
















?>