<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <title>Treatment List </title>
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
                <div class="col-md-10"><br>
                    <h5 class="text-center my-2">Treatment List</h5>

                    <?php

                        $query = "SELECT * FROM treatment";
                        $res = mysqli_query($connect,$query);

                        $output = "";

                        $output .="

                        <br>
                        <table class='table table-bordered'>
                        <tr>
                            <th>ID</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Phone</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                            <th>Diagnosis</th>
                            <th>Description</th>
                            <th>Medicine</th>

                        </tr>

                        ";

                        if(mysqli_num_rows($res) < 1) {

                            $output .="
                                <tr>
                                    <td class='text-center' colspan='9'>
                                    No Treatment Yet </td>

                                </tr>
                            ";

                        }

                        while ($row = mysqli_fetch_array($res)) {

                            $output .="

                            <tr>
                                <td>".$row['id']."</td>
                                <td>".$row['firstname']."</td>
                                <td>".$row['lastname']."</td>
                                <td>".$row['phonenum']."</td>
                                <td>".$row['date']."</td>
                                <td>".$row['time']."</td>
                                <td>".$row['diagnosis']."</td>
                                <td>".$row['description']."</td>
                                <td>".$row['medicine']."</td>
                             
                            ";
                        }

                        $output .="</tr></table>";

                        echo $output;

                    ?>

                </div>
            </div>

        </div>
    
    </div>

    </body>
    </html>