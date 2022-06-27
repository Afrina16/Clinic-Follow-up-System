<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Patient Dashboard</title>
    </head>
<body>

    <?php
        include("../include/header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -50px;">
                <?php
                    include("sidenav.php");
                ?>
                </div>

                <div class="col-md-10 jumbotron">
                        
                        <div class="container-fluid">
                          <h5>Patient's Dashboard</h5>
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-3 my-2 bg-info" style="height: 150px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-4">My Profile</h5>
                                                </div>

                                                <div class="col-md-4">
                                                    <a href="profile.php"><i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="col-md-3 my-2 bg-warning mx-2" style="height: 150px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-4">Book</h5>
                                                    <h5 class="text-white my-4">Appointment</h5>
                                                </div>

                                                <div class="col-md-4">
                                                    <a href="appointment.php"><i class="fa fa-calendar fa-3x my-4 fa-3x my-4" style="color: white;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="col-md-3 my-2 bg-success mx-2" style="height: 150px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-4">Manage</h5>
                                                    <h5 class="text-white my-4">Follow Up</h5>
                                                </div>

                                                <div class="col-md-4">
                                                    <a href="followup.php"><i class="fa fa-file-medical fa-3x my-4" style="color: white;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 my-2 bg-danger" style="height: 150px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-4">My Treatment</h5>
                                                </div>

                                                <div class="col-md-4">
                                                    <a href="treatment.php"><i class="fa fa-book-medical fa-3x my-4" style="color: white;"></i></a>
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
        </div>








    </body>


</html>
