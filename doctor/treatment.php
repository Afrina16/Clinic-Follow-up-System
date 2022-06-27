<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Treatment</title>
    </head>
<body>

<?php
    include("../include/header.php");
?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left: -30px;">
                <?php
                    include("sidenav.php");
                ?>
            </div>

            <div class="col-md-5 my-3 jumbotron">
                <?php
                    include("../include/connection.php");

                    if(isset($_POST['treatment'])){

                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $phonenum = $_POST['phonenum'];
                        $date = $_POST['date'];
                        $time = $_POST['time'];
                        $diagnosis = $_POST['diagnosis'];
                        $description = $_POST['description'];
                        $medicine = $_POST['medicine'];

                        $error = array();

                        if (empty($firstname)){
                            $error['treatment'] = "Enter Firstname";
                        }else if(empty($lastname)){
                            $error['treatment'] = "Enter Lastname";
                        }else if(empty($phonenum)){
                            $error['treatment'] = "Enter Phone Number";
                        }else if(empty($date)){
                            $error['treatment'] = "Enter Date";
                        }else if(empty($time)){
                            $error['treatment'] = "Enter Time";
                        }else if(empty($diagnosis)){
                            $error['treatment'] = "Enter Diagnosis";
                        }else if(empty($description)){
                            $error['treatment'] = "Enter Description";
                        }else if(empty($medicine)){
                            $error['treatment'] = "Enter Medicine";
                        }

                        if(count($error) == 0){

                            $query = "INSERT INTO treatment(firstname,lastname,phonenum,date,time, 
                            diagnosis,description,medicine)
                            VALUES ('$firstname','$lastname','$phonenum','$date','$time','$diagnosis','$description',
                            '$medicine')";

                            $res = mysqli_query($connect,$query);

                            if ($res) {
                                echo "<scirpt>alert('Treatment Added!')</script>";
                                }else{
                                    echo "<scirpt>alert('Failed')</script>";
                                }
                        }
                    }
                ?>

                <h5 class="text=center">Add Treatment</h5>
                    <form method="post" enctype="multipart/form-data">
                        <br>
                        <div class="form-group">
                            <label>Patient First Name</label>
                            <input type="text" name="firstname" class="form-control" autocomplete="off"
                            placeholder='Enter Patient First Name' required>
                        </div>

                        <div class="form-group">
                            <label>Patient Last Name</label>
                            <input type="text" name="lastname" class="form-control" autocomplete="off"
                            placeholder='Enter Patient Last Name' required>
                        </div>

                        <div class="form-group">
                            <label>Patient Phone Number</label>
                            <input type="number" name="phonenum" class="form-control" autocomplete="off"
                            placeholder='Enter Patient Phone Number' required>
                        </div>

                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="date" class="form-control">
                        </div>

            </div> 
            
            <div class="col-md-5 my-3 jumbotron">
                <br>
                <br>
                <div class="form-group">
                    <label>Time</label>
                    <input type="time" name="time" class="form-control">
                </div>

                <div class="form-group">
                    <label>Diagnosis Name</label>
                    <input type="text" name="diagnosis" class="form-control" autocomplete="off"
                    placeholder='Enter Diagnosis Name' required>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="description" class="form-control" autocomplete="off"
                    placeholder='Enter Description' required>
                </div>

                <div class="form-group">
                    <label>Medicine</label>
                    <input type="text" name="medicine" class="form-control" autocomplete="off"
                    placeholder='Enter Medicine' required><br>
                </div>

                <p allign="right">
                <input type="submit" name="treatment" value="Add" class="btn btn-success">
                </p>

                </form>

            </div>

            <div class="col-md-3"></div>
        
        </div>
    
    </div>

</div>

</body>
</html>
