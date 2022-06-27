<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Status</title>
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
                <h5 class="text-center my-2">My Appointment Status</h5><br>

                <?php

                    $pat = $_SESSION['patient'];

                    $query = "SELECT * FROM patient WHERE username='$pat'";
                    $res = mysqli_query($connect,$query);

                    $row = mysqli_fetch_array($res);

                    $fname = $row['firstname'];

                    $querys = mysqli_query($connect,"SELECT * FROM status WHERE
                    patient='$fname'");

                    $output = "";

                    $output .="

                    <table class='table table-bordered'>
                        <tr>
                            <th>ID</th>
                            <th>Doctor</th>
                            <th>Patient</th>
                            <th>Status</th>
                            <th>Description</th>

                        </tr>
                    ";

                    if(mysqli_num_rows($querys) < 1){

                        $output .= "
                            <tr>
                                <td colspan='6' class='text-center'>No Status Updated Yet </td>
                            </tr>
                        
                        ";
                    }

                    while ($row = mysqli_fetch_array($querys)) {

                        $output .= "
                            <tr>
                                <td>".$row['id']."</td>
                                <td>".$row['doctor']."</td>
                                <td>".$row['patient']."</td>
                                <td>".$row['status']."</td>
                                <td>".$row['description']."</td>
       
                        ";
                    }

                    $output .= "</tr></table>";

                    echo $output;
                ?>
                <br>
                <h5 class="text-center my-2">My Follow-up Status</h5><br>

                <?php
                     
                     $pat = $_SESSION['patient'];

                    $query = "SELECT * FROM patient WHERE username='$pat'";
                    $res = mysqli_query($connect,$query);

                    $row = mysqli_fetch_array($res);

                    $fname = $row['firstname'];

                    $querys = mysqli_query($connect,"SELECT * FROM message WHERE
                    patient='$fname'");

                    $output = "";

                    $output .="

                    <table class='table table-bordered'>
                        <tr>
                            <th>ID</th>
                            <th>Doctor</th>
                            <th>Patient</th>
                            <th>Message</th>

                        </tr>
                    ";

                    if(mysqli_num_rows($querys) < 1){

                        $output .= "
                            <tr>
                                <td colspan='6' class='text-center'>No Message Updated Yet </td>
                            </tr>
                        
                        ";
                    }

                    while ($row = mysqli_fetch_array($querys)) {

                        $output .= "
                            <tr>
                                <td>".$row['id']."</td>
                                <td>".$row['doctor']."</td>
                                <td>".$row['patient']."</td>
                                <td>".$row['message']."</td>
       
                        ";
                    }

                    $output .= "</tr></table>";

                    echo $output;

                ?>

            </div>
        </div>
    
    </div>

</div>

</body>
</html>
