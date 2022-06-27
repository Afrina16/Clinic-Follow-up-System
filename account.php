<?php
    include("include/connection.php");

if (isset($_POST['create'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $password = $_POST['pass'];
    $con_pass = $_POST['con_pass'];

    $error = array();

    if (empty($fname)){
        $error['ac'] = "Enter Firstname";
    }else if(empty($lname)){
        $error['ac'] = "Enter Lastname";
    }else if(empty($uname)){
        $error['ac'] = "Enter Isername";
    }else if(empty($email)){
        $error['ac'] = "Enter Email";
    }else if(empty($phone)){
        $error['ac'] = "Enter Phone Number";
    }else if($gender == ""){
        $error['ac'] = "Select Gender";
    }else if(empty($password)){
        $error['ac'] = "Enter Password";
    }else if($con_pass != $password){
        $error['ac'] = "Both password does not match";
    }

    if(count($error)== 0) {

        $query = "INSERT INTO patient(firstname,lastname,username,email,phone,gender,password,date_reg) 
        VALUES('$fname','$lname','$uname','$email',
        '$phone','$gender','$password',NOW())";

        $res = mysqli_query($connect,$query);

        if ($res) {
        header("Location:patient_login.php");
        }else{
            echo "<scirpt>alert('Failed')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Create Account</title>
    </head>
    <body style="background-image: url(img/bg2.jpg); background-size: cover; background-position: center;">

    <?php
        include("include/header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-2 jumbotron">
                    <h5 class="text-center text-info my-2">Create Account</h5>

                    <form method="post">
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" name="fname" class="form-control"
                            autocomplete="off" placeholder="Enter Firstname">
                        </div>

                        <div class="form-group">
                            <label>Lastname</label>
                            <input type="text" name="lname" class="form-control"
                            autocomplete="off" placeholder="Enter Lastname">
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control"
                            autocomplete="off" placeholder="Enter Username">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control"
                            autocomplete="off" placeholder="Enter Email">
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" name="phone" class="form-control"
                            autocomplete="off" placeholder="Enter Phone Number">
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass1" class="form-control"
                            autocomplete="off" placeholder="Enter Password">
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="con_pass" class="form-control"
                            autocomplete="off" placeholder="Enter Confirm Password">
                        </div>

                        <input type="submit" name="create" value="Create Account" 
                        class="btn btn-info"><br>
                        <br>
                        <p>I already have an account <a href="patient_login.php">Click here!</a></p>

                  </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>

</body>
</html>