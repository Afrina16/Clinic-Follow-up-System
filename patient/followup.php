<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Follow-up</title>
    </head>
<body style="background-color:powderblue;">

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

            <div class="col-md-5 my-3">
            <?php
                include("../include/connection.php");

                $pat = $_SESSION['patient'];
                $sel = mysqli_query($connect, "SELECT * FROM patient 
                WHERE username='$pat'");

                $row = mysqli_fetch_array($sel);

                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $gender = $row['gender'];
                $phone = $row['phone'];

                if(isset($_POST['followup'])){

                    $fever = $_POST['fever'];
                    $nausea = $_POST['nausea'];
                    $diarrhea = $_POST['diarrhea'];
                    $cough = $_POST['cough'];
                    $symptoms = $_POST['symptoms'];
                    $oxygen = $_POST['oxygen'];
                    $bp = $_POST['bp'];
                    $heart = $_POST['heart'];
                    $temp = $_POST['temp'];

                    $error = array();

                    if (empty($fever)){
                    $error['followup'] = "Enter Fever";
                    }else if(empty($nausea)){
                    $error['followup'] = "Enter Nausea";
                    }else if(empty($diarrhea)){
                    $error['followup'] = "Enter Diarrhea";
                    }else if(empty($cough)){
                    $error['followup'] = "Enter Date";
                    }else if(empty($symptoms)){
                    $error['followup'] = "Enter Time";
                    }else if(empty($oxygen)){
                    $error['followup'] = "Enter Diagnosis";
                    }else if(empty($bp)){
                    $error['followup'] = "Enter Description";
                    }else if(empty($heart)){
                    $error['followup'] = "Enter Allergy if any";
                    }else if(empty($temp)){
                    $error['followup'] = "Enter Allergy if any";
                    }

                    if(count($error) == 0){

                    $query = "INSERT INTO followup(firstname,lastname,gender,phone,fever,nausea, 
                    diarrhea,cough,symptoms,oxygen,bp,heart,temp,date_updated) VALUES ('$firstname','$lastname','$gender',
                    '$phone','$fever','$nausea','$diarrhea','$cough','$symptoms','$oxygen','$bp','$heart','$temp',NOW())";

                    $res = mysqli_query($connect,$query);

                    if ($res) {
                        echo "<scirpt>alert('Followup Added!')</script>";
                    }else{
                        echo "<scirpt>alert('Failed')</script>";
                    }
                }
            }
        ?>

                <h5 class="text=center">Follow-up Questions</h5>
                    <form method="post" enctype="multipart/form-data">
        
                        <div class="form-group">
                            <label>1. Do you have a fever ?</label>
                            <p><input type="radio" name="fever" value="Yes"> Yes<br></p>
                            <p><input type="radio" name="fever" value="No"> No<br></p>
                        </div>

                        <div class="form-group">
                            <p>2. Do you have any nausea and vomitting ?</p>
                            <p><input type="radio" name="nausea" value="Yes"> Yes<br></p>
                            <p><input type="radio" name="nausea" value="No"> No<br></p>
                        </div>

                        <div class="form-group">
                            <p>3. Do you have any diarrhea ?</p>
                            <p><input type="radio" name="diarrhea" value="Yes"> Yes<br></p>
                            <p><input type="radio" name="diarrhea" value="No"> No<br></p>
                        </div>

                        <div class="form-group">
                            <p>4. Do you have any cough ?</p>
                            <p><input type="radio" name="cough" value="Yes"> Yes<br></p>
                            <p><input type="radio" name="cough" value="No"> No<br></p>
                        </div>
                        <div class="form-group">
                            <p>5. Do you have any other symptoms ?</p>
                            <p><input type="radio" name="symptoms" value="Yes"> Yes<br></p>
                            <p><input type="radio" name="symptoms" value="No"> No<br></p>
                        </div>
            </div> 
            
            <div class="col-md-5 my-3">
                <br>
                <br>   
                <div class="form-group">
                    <p>6.What is your oxygen saturation ?</p>
                    <p><input type="radio" name="oxygen" value=">95"> More than 95<br></p>
                    <p><input type="radio" name="oxygen" value="<95"> Less than 95<br></p>
                    </div>

                <div class="form-group">
                    <label>7. What is your recorded blood pressure (mmHg) ?</label>
                    <p>Note: Input - if no equipment available</p>
                    <input type="text" name="bp" class="form-control" autocomplete="off"
                    placeholder='Blood Pressure' required>
                </div>

                <div class="form-group">
                    <label>8. What is your heart rate (beats per minute) ?</label>
                    <p>Note: Input - if no equipment available</p>
                    <input type="text" name="heart" class="form-control" autocomplete="off"
                    placeholder='Heart Rate' required>
                </div>

                <div class="form-group">
                    <label>9. What is your body temperature (°C) ?</label>
                    <p>Note: Input - if no equipment available</p>
                    <input type="text" name="temp" class="form-control" autocomplete="off"
                    placeholder='Temperature' required>
                </div>


                <p allign="right">
                <input type="submit" name="followup" value="Add " class="btn btn-success">
                </p>

                </form>

            </div>

            <div class="col-md-3"></div>
        
        </div>
    
    </div>

</div>



</body>
</html>
