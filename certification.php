<?php
include('connection.php');
ob_start();
session_start();
date_default_timezone_set('Asia/Manila');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="certification.php" method="POST">

<label>I CERTIFY that this is a true record of </label>
<input type="text" name="name">  
<!-- characters only -->
<br>

<label>with LRN</label>
<input type="text" name="lrn">
<!-- lrn only -->
<br>

<label>and that he/she is eligible for admission to Grade</label>
<input type="text" name="grade">
<label>.</label>
<!-- character only -->
<br>

<label>School Name: </label>
<input type="text" name="school_name">
<br>
<!-- character only -->

<label>School ID</label>
<input type="text" name="school_id">
<!-- character and numbers only -->
<br>

<label>Division: </label>
<input type="text" name="division">
<!-- character only -->
<br>

<label>Last School Year Attended: </label>
<input type="date" name="last_school_year_attended">
<!-- date -->
<br>

<label>Date: </label>
<input type="date" name="date">
<!-- date -->

<br>

<label>Name of Principal/School Head over printed name </label>
<input type="text" name="principal">
<!-- character only -->
<br>





<input type="submit" name="submit" value="Submit"> 

</body>
</html>

<?php

 if(isset($_POST['submit'])){
    $name= ucfirst($_POST['name']);
    $lrn = $_POST['lrn'];
    $grade = $_POST['grade'];
    $school = ucfirst ($_POST['school_name']);
    $school_id = $_POST['school_id'];
    $division = $_POST['division'];
    $last_school = date($_POST['last_school_year_attended']);
    $date = date($_POST['date']);
    $name_of_principal = ucfirst($_POST['principal']);
    $dateCreated = date("y-m-d h:i:a");
    $dateUpdated = date("y-m-d h:i:a");
    $remarks = 'none';



    $cert_query = "INSERT INTO `cetifications`(`lrn`, `name`, `grade`, `name_of_school`, `school_id`, `division`, `last_school_year_attended`, `date`, `Name_of_Principal`, `remarks`, `date_time_created`, `date_time_updated`) VALUES 
    ('$lrn','$name','$grade','$school','$school_id','$division','$last_school','$date', '$name_of_principal','$remarks','$dateCreated','$dateUpdated')" ;
    $cert_query_run = mysqli_query($conn,$cert_query);



        if($cert_query_run){

            echo"Certificated added";

        }

        else{
            echo "Not added";
        }





 }   


 ob_end_flush();

?>


