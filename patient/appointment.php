<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Book Appointemnt</title>
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
                <div class="col-md-10 jumbotron">
                    <h5 class="text-center my-2">Book Appointment</h5>

                    <?php

                        $pat = $_SESSION['patient'];
                        $sel = mysqli_query($connect, "SELECT * FROM patient WHERE
                        username='$pat'");

                        $row = mysqli_fetch_array($sel);

                        $firstname = $row['firstname'];
                        $lastname = $row['lastname'];
                        $gender = $row['gender'];
                        $phone = $row['phone'];

                        if(isset($_POST['book'])) {

                            $date = $_POST['date'];
                            $time = $_POST['time'];
                            $sym = $_POST['sym'];

                            if(empty($sym)){

                            }else{
                                $query = "INSERT INTO appointment(firstname,lastname,gender,phone, 
                                appointment_date,appointment_time,symptoms,status,date_reg) VALUES('$firstname','$lastname',
                                '$gender','$phone','$date','$time','$sym','Pending',NOW())";

                                $res = mysqli_query($connect,$query);
                                
                                 if ($res) {
                                     echo "<script>alert('You have booked an appointment')
                                     </script>";
                                 }
                            }

                        }

                    ?>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <form method="post">
                                    <label>Appointment Date</label>
                                    <input type="date" name="date" class="form-control">

                                    <label>Appointment Time</label>
                                    <input type="time" name="time" class="form-control">

                                    <label>Symptoms</label>
                                    <input type="text" name="sym" class="form-control"
                                    autocomplete="off" placeholder="Enter Symptoms">


                                    <br>
                                    <input type="submit" name="book" class="btn btn-info" 
                                    value="Book Appointment">

                                </form>

                            </div>
                            <div class="col-md-3"></div>
                        
                        </div>

                    </div>
                
                </div>
            

            </div>  
        </div>
    </div>




</body>
</html>