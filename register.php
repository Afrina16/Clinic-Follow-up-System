<?php

include("include/connection.php");

if(isset($_POST['register'])) {

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $phonenum= $_POST['phone'];
    $password= $_POST['pass'];
    $con_password= $_POST['con_pass'];

    $error = array();

    if (empty($firstname)){
        $error['register'] = "Enter Firtsname";
    }else if(empty($lastname)){
        $error['register'] = "Enter Lastname";
    }else if(empty($username)){
        $error['register'] = "Enter Username";
    }else if(empty($email)){
        $error['register'] = "Enter Email Address";
    }else if(empty($phonenum)){
        $error['register'] = "Enter Phone Number";
    }else if(empty($password)){
        $error['register'] = "Enter Password";
    }else if($con_password != $password){
        $error['register'] = "Both password do not match";
    }   

    if(count($error) == 0){
       
        $query = "INSERT INTO doctor(firstname,lastname,username,email,phonenum,password) 
        VALUES('$firstname','$lastname','$username','$email','$phonenum', '$password')";

    $result = mysqli_query($connect,$query);

    if($result) {
        echo "<scirpt>alert('You have successfully registered!')</script>";

        header("Location: doctor_login.php");

    }else{
        echo "<scirpt>alert('Failed')</script>";

    }
    }
}

if(isset($error['register'])){
    $s = $error['register'];

    $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
}else{
    $show = "";
}
?>

 
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
</head>
<body style="background-image: url(img/bg2.jpg); background-size: cover; background-position: center;">
    <?php
        include("include/header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-3 jumbotron">

                    <h5 class="text-center text-info my-2">Register Now!</h5>
                        <div>
                            <?php echo $show; ?>
                        </div>

                    <form method="post">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" 
                            value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>"> 
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lname" class="form-control" autocomplete="off" placeholder="Enter Lastname"
                            value="<?php if(isset($_POST['lname'])) echo $_POST['lname']; ?>"> 
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username"
                            value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address"
                            value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number"
                            value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>"> 
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Passsword"> 
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Passsword"> 
                        </div>

                        <div class="buttons">
                            <div class="action_btn">

                            <input type="submit" name="register" value="Register Now" class="btn btn-success"><br>
                            
                            </div>
                        </div>
                         
                        
                        <br>
                        <p> I already have an account <a href="doctor_login.php">Click here</a></p> 
                        
                    </form>

                </div>

                <div class="col-md-3"></div>
                

            </div>
        </div>
    </div>

</body>
</html>
