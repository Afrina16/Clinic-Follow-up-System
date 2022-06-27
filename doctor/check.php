<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Check Patient Appointment</title>
    </head>
<body>
<?php
    include("../include/header.php");
    include("../include/connection.php");
?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left: -30px;">
                <?php
                    include("sidenav.php"); 
                ?>
            </div>
            <div class="col-md-10">
                <h5 class="text-center my-2">Patient Appointment</h5>

                <?php

                    if(isset($_GET['id'])){

                        $id = $_GET['id'];

                        $query = "SELECT * FROM appointment WHERE id='$id'";

                        $res = mysqli_query($connect,$query);

                        $row = mysqli_fetch_array($res);

                    }

                ?>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="2" class="text-center">Appointment Details</td>
                                </tr>

                                <br>
                                <tr>
                                    <td>Firstname</td>
                                    <td><?php echo $row['firstname']; ?></td>
                                </tr>
                                <tr>
                                    <td>Lastname</td>
                                    <td><?php echo $row['lastname']; ?></td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td><?php echo $row['gender']; ?></td>
                                </tr>
                                <tr>
                                    <td>Phone No.</td>
                                    <td><?php echo $row['phone']; ?></td>
                                </tr>
                                <tr>
                                    <td>Appointment Date</td>
                                    <td><?php echo $row['appointment_date']; ?></td>
                                </tr>
                                <tr>
                                    <td>Appointment Time</td>
                                    <td><?php echo $row['appointment_time']; ?></td>
                                </tr>
                                <tr>
                                    <td>Symptoms</td>
                                    <td><?php echo $row['symptoms']; ?></td>
                                </tr>      
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-center my-1">Status</h5><br>

                            <?php
                                if(isset($_POST['send'])){

                                    $status = $_POST['status'];
                                    $desc = $_POST['desc'];

                                    if(empty($status)){

                                    }else if(empty($desc)){

                                    }else{

                                        $doc = $_SESSION['doctor'];

                                        $fname = $row['firstname'];

                                        $query = "INSERT INTO status(doctor,patient,status,description) VALUES('$doc',
                                        '$fname', '$status', '$desc')";

                                        $res = mysqli_query($connect,$query);

                                        if($res) {

                                            echo "<script>alert('Status Updated')</script>";
                                            }
                                        }
                                }

                            ?>

                            <form method="post">
                                <label for="status"> Status</label>
                                <select name="status" id="status">
                                <option value="Approved">Approved</option>
                                <option value="Rejected">Rejected</option>
                                </select><br>

                                <label>Description</label>
                                <input type="text" name="desc" class="form-control"
                                autocomplete="off" placeholder="Enter Description">

                                <input type="submit" name="send" class="btn btn-info my-2"
                                value="Send">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</div>

</body>
</html>