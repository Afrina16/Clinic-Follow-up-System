<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Clinic Staff</title>
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
                    include("../include/connection.php");

                    ?>

                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 my-3 jumbotron">
                                <h5 class="text-center"> Clinic Staff List</h5>


                                <table class='table table-bordered'>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th style='width: 10%;'>Action</th>

                                    <tr>
                                        <td>1</td>
                                        <td>Clinic Staf</td>
                                        <td>
                                            <button id="remove" class="btn btn-danger">Remove</button>

                                    </tr>
                                </table>

                            </div>
                            <div class="col-md-6 my-3 jumbotron">
                                <h5 class="text-center"> Add Clinic Staff</h5>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="uname" class="form-control" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="pass" class="form-control">
                                    </div>

                                    <input type="submit" name="add" value="Add New Clinic Staff" class="btn btn-success">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>