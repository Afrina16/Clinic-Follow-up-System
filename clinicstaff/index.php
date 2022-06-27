<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Clinic Staff Dashboard</title>
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
                    ?>

                </div>
                <div class="col-md-10">

                    <h4 class="my-2">Clinic Staff Dashboard</h4>

                    <div class="col-md-12 my-1">
                        <div class="row">
                            <div class="col-md-3 bg-success mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">

                                            <h5 class="my-2 text-white" style="font-size: 30px;"></h5>
                                            <h5 class="text-white">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Clinic Staff</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="clinicstaff.php"><i class="fa fa-user-nurse fa-3x my-4" style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-info mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php

                                            $doctor = mysqli_query($connect, "SELECT * FROM 'doctor' WHERE 1");
                                            //$num2 = mysqli_num_rows($doctor)
                                            ?>

                                            <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Doctors</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><i class="fa fa-user-md fa-3x my-4" style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-warning mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Patient</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><i class="fa fa-procedures fa-3x my-4" style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-danger mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Record</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><i class="fa fa-flag fa-3x my-4" style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-warning mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Appointment</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><i class="fa fa-calendar-check fa-3x my-4" style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-success mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Follow Up</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><i class="fa fa-file-medical fa-3x my-4" style="color: white;"></i></a>
                                        </div>
                                    </div>
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