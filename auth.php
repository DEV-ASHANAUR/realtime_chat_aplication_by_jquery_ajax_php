<?php
    include "main.php";
    $obj = new Main;
    session_start();
    include "Flash_data.php";
    if(isset($_SESSION['user_id'])){
        header('location:index.php');
    }
    if(isset($_POST['submit'])){
       $user = $_POST['user'];
       $pass = $_POST['pass'];
       $user_data = $obj->retrive_user_auth($user);
       if($user_data->num_rows>0){
            while($row = $user_data->fetch_object()){
                $user_id = $row->user_id;
                $user_name = $row->username;
                $user_password = $row->password;
                if($pass == $user_password){
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['username'] = $user_name;
                    $lastId = $obj->sub_query($user_id);
                    $_SESSION['login_details_id'] = $lastId;
                    header('location:index.php');

                }else{
                   
                    Flass_data::loging_error("Your Password is Worng!");
                    header('location:login.php');  
                }
            }
       }else{
           Flass_data::loging_error("Your Username is Worng!");
           header('location:login.php');
       } 



    }else{
        header('location:login.php');
    }









?>