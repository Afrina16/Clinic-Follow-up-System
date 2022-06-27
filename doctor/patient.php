<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <title>Patient Follow-up</title>
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
                    <h5 class="text-center my-2">Patient Follow-up List</h5>

                    <?php

                        $query = "SELECT * FROM followup";
                        
                        $res = mysqli_query($connect,$query);
                        
                        $output = "";

                        $output .=" 

                        <br>
                        <table class='table table-bordered'>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Phone Number</th>
                            <th>Fever</th>
                            <th>Blood Pressure</th>
                            <th>Temperature</th>
                            <th>Action</th>

                        </tr>

                        ";

                        if(mysqli_num_rows($res) < 1) {

                            $output .="
                                <tr>
                                    <td class='text-center' colspan='9'>
                                    No Follow-up Yet </td>

                                </tr>
                            ";

                        }

                        while ($row = mysqli_fetch_array($res)) {

                            $output .="

                            <tr>
                                <td>".$row['id']."</td>
                                <td>".$row['firstname']."</td>
                                <td>".$row['lastname']."</td>
                                <td>".$row['gender']."</td>
                                <td>".$row['phone']."</td>
                                <td>".$row['fever']."</td>
                                <td>".$row['bp']."</td>
                                <td>".$row['temp']."</td>
                                <td>
                                 
                                <a href='followup.php?id=".$row['id']."'>
                                    <button class='btn btn-info'>Check</button>
                                </a>

                                </td>
                             
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