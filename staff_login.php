<?php
session_start();

include("include/connection.php");

if (isset($_POST['login'])) {

    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    if (empty($username)) {
        $error['staff'] = "Enter Username";
    }else if (empty($password)) {
        $error['staff'] = "Enter Password";
    }

    if (count($error)==0) {

        $query = "SELECT * FROM staff WHERE username= '$username' AND password= '$password'";
        
        $result = mysqli_query($connect,$query);

        if ($result) {
            echo "<script>alert('You have login as clinic staff')</script>";

            $_SESSION['staff'] = $username;

            header("Location: clinicstaff/index.php");
            exit();
        }else{
            echo "<script>alert('Invalid Username or Password')</script>";
        }
    }
}


?> 

<!DOCTYPE html>
<html>
    <head>
        <title>Clinic Staff Login Page</title>
    </head>
    <body style="background-image: url(img/bg2.jpg); background-size: cover; background-position: center;">
    <?php
        include("include/header.php");
    ?>

    <div style="margin-top: 20px;"></div>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"> </div>
                <div class="col-md-6 jumbotron"> 
                    <h5 class="text-center my-2">Staff Login</h5>
                 
                    <form method="post" class="my-2">

                        <div>
                        <?php

                            if (isset($error['staff'])) {

                                $show = $error['staff'];

                            }else {
                                $show = "";
                            }

                            echo $show;

                        ?>
                        </div>

                
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" placeholder="Enter Password">
                        </div>
                       
                        <input type="submit" name="login" class="btn btn-success" value="Login">

                   </form>
                </div>
                <div class="col-md-4"> </div>
            </div>
        </div>
    </div>
</body>
</html>
