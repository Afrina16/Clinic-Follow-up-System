<?php
 session_start();
?>

 <!DOCTYPE html>
 <html>
     <head>
         <title>Edit Profile</title>
    </head>
<body>

<?php
    include("../include/header.php");
    include("../include/connection.php");
?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left: -50px;">
                <?php

                    include("sidenav.php");

                    if(isset($_GET['id'])) {

                    $id = $_GET['id'];

                    $query = "SELECT * FROM doctor WHERE id='$id'";

                    $res = mysqli_query($connect,$query);

                    $row = mysqli_fetch_array($res);
    
                    }

                ?>
            </div>

            <div class="col-md-10">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 jumbotron">
                            <h5 class="text-center">Edit Profile</h5><br>
                                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" name="fname" class="form-control" placeholder="Enter First Name"
                                            value="<?php echo $row['firstname']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" name="lname" class="form-control" placeholder="Enter Last Name"
                                            value="<?php echo $row['lastname']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="uname" class="form-control" placeholder="Enter Username"
                                            value="<?php echo $row['username']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control" placeholder="Enter Email"
                                            value="<?php echo $row['email']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" name="phonenum" class="form-control" placeholder="Enter Email"
                                            value="<?php echo $row['phonenum']; ?>">
                                        </div>

                                        <input type="submit" name="update1" class="btn btn-success my-2" value="Edit">
                                        <a href="profile.php" name="back" class="btn btn-success my-2">Back</a>

                                        </form>
                                        <?php  

                                            if (isset($_POST['update1'])){

                                            $fname = $_POST['fname'];
                                            $lname = $_POST['lname'];
                                            $uname = $_POST['uname'];
                                            $email = $_POST['email'];
                                            $phone = $_POST['phonenum'];

                                            $query = "UPDATE doctor SET firstname='$fname', lastname='$lname', username='$uname', email='$email',
                                            phonenum='$phone' WHERE id='$id'";

                                            $res = mysqli_query($connect,$query);

                                            //$row= mysqli_fetch_array($res);
                                            }

                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>