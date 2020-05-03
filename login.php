<?php
   session_start();
   include "Flash_data.php";
   if(isset($_SESSION['user_id'])){
    header('location:index.php');
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Log in Here</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--all css here--> 
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
    <link href="css/login.css" type="text/css" rel="stylesheet" />
    <link href="css/sweetalert2.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/sweetalert2.js"></script>
</head>
<body>

    <div class="login-form-wrapper">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-5 col-lg-4">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h2 class="text-center">Login Here</h2>
                        </div>
                        <!-- error message start-->
                        <?php
                            if(isset($_SESSION['msg']['log_error'])){
                                ?>
                                <div class="alert alert-danger">
                                    <strong class="text-center d-block text-danger"><?php echo Flass_data::show_error();?></strong>
                                </div> 
                            <?php
                            }
                        ?>
                        <!-- error message end-->
                        <div class="card-body bg-light">
                            <form action="auth.php" method="POST">
                                <input type="text" name="user" class="form-control rounded-0" placeholder="Username" required />

                                <input type="password" name="pass" class="form-control rounded-0 mt-3" placeholder="Password" required />

                                <button type="submit" name="submit" class="btn btn-danger btn-block rounded-0 mt-3 font-weight-bold mb-2">Login</button>
                                <a href="sign_up.php" class="account">Create an Account</a>
                                <div class="form-group form-check mt-3">
                                    <!-- <input type="checkbox" class="form-check-input" id="rem">
                                    <label class="form-check-label" for="rem">Remember Me</label> -->
                                    
                                </div>
                            </form>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!--all js here--> 
</body>
</html>