<?php
    session_start();
    if(!$_SESSION["patient"])
 {
   header("Location:patient_login.php");
 }
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

<div class="col-md-10"><br>
    <h5 class="text my-2">Patient Treatment Detail</h5>
        <div class="card-body">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="input" class="form-control" placeholder="Search Your Firstname">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" name="search" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Diagnosis</th>
                        <th scope="col">Description</th>
                        <th scope="col">Medicine</th>
                    </tr>
                </thead>

                <body>
                    <?php
                        include("../include/connection.php");

                        if(isset($_POST['search']))
                        {
                            $search = $_POST['search'];
                            $value_filter = $_POST['input'];
                            $query = "SELECT * FROM treatment WHERE firstname 
                            LIKE '%$value_filter%' ";

                            $query_run = mysqli_query($connect, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                while($row = mysqli_fetch_array($query_run))
                                {

                                    ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['firstname']; ?></td>
                                        <td><?php echo $row['date']; ?></td>
                                        <td><?php echo $row['time']; ?></td>
                                        <td><?php echo $row['diagnosis']; ?></td>
                                        <td><?php echo $row['description']; ?></td>
                                        <td><?php echo $row['medicine']; ?></td>
                                    </tr>

                                    <?php
                                }
                            }
                            else
                                {
                                    ?>
                                    <tr>
                                        <td colspan="7">No Record Found</td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>
        </div>
</div>


