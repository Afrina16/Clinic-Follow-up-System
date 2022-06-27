<?php
session_start();

include("include/connection.php");

if(isset($_POST['login'])) {

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    if (empty($uname)) {
        echo "<script>alert('Enter Username')</script>";
    }else if(empty($pass)){
        echo "<script>alert('Enter Password')</script>";
    }else{
        $query = "SELECT * FROM doctor WHERE username='$uname' AND password='$pass'";
        $res = mysqli_query($connect,$query);

        if (mysqli_num_rows($res)==1) {
            echo "<script>alert('You have login as doctor')</script>";

            $_SESSION['doctor'] = $uname;

            header("Location: doctor/index.php");
            exit();
        }else{

            echo "<script>alert('Invalid Account')</script>";
         }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor Login Page</title>
</head>

<body style="background-image: url(img/bg2.jpg); background-size: cover; background-position: center;">

<?php
include("include/header.php")
?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 jumbotron my-3">
                <h5 class="text-center my-2">Doctor Login</h5>
                   
            
                <form method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                    </div>

                   <div class="form-group">
                       <label>Password</label>
                       <input type="password" name="pass" class="form-control" autocomplete="off">
                    </div>

                   <input type="submit" name="login" class="btn btn-success" value="Login"><br>

                   <br>
                   <p>I dont have an account <a href="register.php">Register Now!</a></p>

                  
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>



</div>