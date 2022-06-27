<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Check Follow-up</title>
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
                <h5 class="text-center my-2">Patient Follow-up</h5>

                <?php

                    if(isset($_GET['id'])){ 

                        $id = $_GET['id'];

                        $query = "SELECT * FROM followup WHERE id='$id'";
                        
                        $res = mysqli_query($connect,$query);

                        $row = mysqli_fetch_array($res);

                    }

                ?>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <th colspan="2" class="text-center">Follow-up Details</th>
                                </tr>

                                <br>
                                <tr>
                                    <td>Fever</td>
                                    <td><?php echo $row['fever']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nausea</td>
                                    <td><?php echo $row['nausea']; ?></td>
                                </tr>
                                <tr>
                                    <td>Diarrhea</td>
                                    <td><?php echo $row['diarrhea']; ?></td>
                                </tr>
                                <tr>
                                    <td>Cough</td>
                                    <td><?php echo $row['cough']; ?></td>
                                </tr>
                                <tr>
                                    <td>Symptoms</td>
                                    <td><?php echo $row['symptoms']; ?></td>
                                </tr>
                                <tr>
                                    <td>Oxygen Level</td>
                                    <td><?php echo $row['oxygen']; ?></td>
                                </tr>
                                <tr>
                                    <td>Blood Pressure Rate</td>
                                    <td><?php echo $row['bp']; ?></td>
                                </tr>
                                <tr>
                                    <td>Heart Rate</td>
                                    <td><?php echo $row['heart']; ?></td>
                                </tr>
                                <tr>
                                    <td>Temperature</td>
                                    <td><?php echo $row['temp']; ?></td>
                                </tr>
                                
                                <tr>
                                    <td>Date Updated</td>
                                    <td><?php echo $row['date_updated']; ?></td>
                                </tr>
                                
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-center my-1">Send Message</h5><br>

                            <?php
                                if(isset($_POST['send'])){

                                    $message = $_POST['message'];
                                    
                                    if(empty($message)){

                                    }else if(empty($message)){

                                    }else{

                                        $doc = $_SESSION['doctor'];

                                        $fname = $row['firstname'];

                                        $query = "INSERT INTO message(doctor,patient,message) 
                                        VALUES('$doc','$fname','$message')";

                                        $res = mysqli_query($connect,$query);

                                        if($res) {

                                            echo "<script>alert('Message Sent!')</script>";
                                            }
                                        }
                                }

                            ?>

                            <form method="post">
                                
                                <label>Messages</label>
                                <input type="text" name="message" class="form-control"
                                autocomplete="off" placeholder="Enter Your Message">

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
