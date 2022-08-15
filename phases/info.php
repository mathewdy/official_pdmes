<?php
include('../connection.php');
date_default_timezone_set('Asia/Manila');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
</head>
<body>

<form action="info.php" method="POST">


<p style="background:#808080; text-align:center; font-size:12pt; font-weight:600; margin:0; border:1px solid black;">LEARNER'S PERSONAL INFORMATION</p>
    <section class="line-1 pt-2 pb-2 d-flex justify-content-between">
    <span class="hstack d-flex align-items-center">
            <label for="">LAST NAME:</label>
            <input type="text" id="text-only" name="last_name" required>    
    </span>
    <span class="hstack d-flex align-items-center">
        <label for="">FIRST NAME:</label>
        <input type="text" id="text-only" name="first_name" required>   
    </span>
    <span class="hstack d-flex align-items-center" >
        <label for="">NAME EXTN. (Jr,I,II): </label>
        <input type="text" id="text-only" name="suffix">
    </span>
    <span class="hstack d-flex justify-content-end align-items-center">
        <label for="">MIDDLE NAME: </label>
        <input type="text" id="text-only" name="middle_name" required>                    
    </span>
    </section>
    <section class="line-2 d-flex justify-content-between">
        <span class="hstack d-flex align-items-end w-75">
            <label for="">Learner Reference Number (LRN):</label>
            <input type="number" style="margin: 0 1em 0 0; width:30%;" name="lrn" required>
            <label for="">Birthdate (mm/dd/yyyy):</label>
            <input type="date" name="birth_date" required>  
        </span>
        <span class="hstack d-flex align-items-center w-25">
        <label for="">Sex:</label>
            <select class=" w-100" name="sex" id="" required>
            <option value="">-Gender-</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            </select>
        </span>
    </section>
    <p style="background:#d3d3d3; text-align:center; font-size:12pt; font-weight:600; margin:0; border:1px solid black;">ELIGIBILITY FOR ELEMENTARY SCHOOL ENROLLMENT</p>
    <div class="credentials-row border border-dark px-2">
        <div class="d-flex flex-row justify-content-between">
            <i>Credential Presented for Grade 1</i>
            <span class="form-check form-check-inline">
                <label class="form-check-label">Kinder Progress Report </label>
                <input type="checkbox" class="form-check-input" name="credential_presented[]" value="Kinder progress report">
            </span>
            <span class="form-check form-check-inline">
                <label class="form-check-label">ECCD Checklist </label>
                <input type="checkbox" class="form-check-input" name="credential_presented[]" value="ECCD Checklist">
            </span>
            <span class="form-check form-check-inline">
                <label class="form-check-label">Kindergarten Certificate of Completion </label>
                <input type="checkbox" class="form-check-input" name="credential_presented[]" value="Kindergarten Certificate of Completion">
            </span>
        </div>
        <section class="cred-info d-flex flex-row justify-content-between">
            <span class="hstack d-flex align-items-center">
                <label for="">Name of School:</label>
                <input type="text" name="eligibility_name_of_school" required>
            </span>
            <span class="hstack d-flex align-items-center justify-content-start">
                <label for="">School ID:</label>
                <input type="text" name="school_id" id="dash" required>
            </span>
            <span class="hstack d-flex align-items-center">
                <label for="">Address of School:</label>
                <input type="text" name="address_of_school" required>
            </span>
        </section>
    </div>
    <div class="other-cred">
    <p>Other Credential Presented</p>
    <span class="wrapper d-flex flex-row justify-content-evenly">
        <span>
        <input type="checkbox" name="pept_passer" value="1" class="form-check-input">
            <label class="form-check-label" style="padding: 0 2px 0 0;">PEPT Passer</label>
            <label for="">Rating:</label>
            <input type="number" class="w-30" name="rating" required>
        </span>
        <span>
            <label for="">Date of Examination/Assessment (mm/dd/yyyy):</label>
            <input type="date" name="date_of_assessment" id=""> 
            <input type="checkbox" class="form-check-input" name="others" value="1" >
            <label for="">Others (Pls. Specify):</label>
            <input type="text" style="width:20%;" name="others_please_specify" id="">
        </span>
    </span>
    <section class="last-cred d-flex flex-row justify-content-evenly px-5">
        <span class="hstack w-75">
            <label for="">Name and Address of Testing Center:</label>
            <input type="text" class="w-50" name="name_and_address_testing_center" id="">
        </span>
        <span class="w-50">
            <label for="">Remark:</label>
            <input type="text" class="w-75"  name="eligibility_remarks" id="">
        </span>
    </section>
</div>

<input type="submit" name="next">
</form>

    
</body>
</html>


<?php

if(isset($_POST['next'])){

    $last_name = ucfirst($_POST['last_name']);
    $first_name = ucfirst($_POST['first_name']);
    $suffix = $_POST['suffix'];
    $middle_name = ucfirst($_POST['middle_name']);
    $lrn = $_POST['lrn'];
    $birth_date = date('Y-m-d',strtotime($_POST['birth_date']));
    $sex = $_POST['sex'];
    $dateCreated = date("m-d-Y h:i:a");
    $dateUpdated = date("m-d-Y h:i:a");
    $remarks = 'none';


    //eligibility 
    $eligibility_name_of_school = strtoupper($_POST['eligibility_name_of_school']);
    $school_id = strtoupper($_POST['school_id']);
    $address_of_school = strtoupper($_POST['address_of_school']);
    $dateCreated = date("y-m-d h:i:s");
    $dateUpdated = date("y-m-d h:i:s");
    $remarks = 'none';
    $rating = $_POST['rating'];
    $date_of_assessment = date("Y-m-d", strtotime($_POST['date_of_assessment']));
    $name_and_address_testing_center = strtoupper($_POST['name_and_address_testing_center']);
    $eligibility_remarks = $_POST['eligibility_remarks'];


    if(isset($_POST['credential_presented'])){
        $new_credential = implode(',', $_POST['credential_presented']);
    }else{
        $new_credential = " ";
    }


    if(isset($_POST['pept_passer'])){
    $pept_passer = $_POST['pept_passer'];
    }else{
    $pept_passer = " ";
    }

    if(isset($_POST['others'])){
    $others_checkbox  = $_POST['others_please_specify'];
    $others = $_POST['others'];
    }else{
        $others  = " ";
        $others_checkbox = " ";
    }





      // insert of learners info  

    //validation

    $validation_learners = "SELECT lrn, last_name,first_name,middle_name,suffix,birth_date
    FROM learners_personal_infos WHERE lrn = '$lrn'";
    $run_validation = mysqli_query($conn,$validation_learners);

    if(mysqli_num_rows($run_validation) > 0){
        echo "<script>alert('This student is already added')</script>";
        echo "<script>window.location.href='home.php' </script>";
    }else{

    


    $insert_learners_info = "INSERT INTO learners_personal_infos (lrn,last_name,first_name,middle_name,suffix,birth_date,sex,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn' , '$last_name' , '$first_name' ,'$middle_name', '$suffix' , '$birth_date' , '$sex','$remarks', '$dateCreated', '$dateUpdated')
    ";

    $run_insert_learners_info = mysqli_query($conn,$insert_learners_info);

    echo "inserted leanrer" . '<br>';

    //insert eligibility

    $insert_elibility = "INSERT INTO eligibility_for_elementary_school_enrollment 
    (lrn, credential_presented, name_of_school, school_id, address_of_school, pept_passer, rating, date_of_assessment, others, specify, name_and_address_testing_center, remarks, date_time_created, date_time_updated) VALUES
    ('$lrn' , '$new_credential','$eligibility_name_of_school', '$school_id' , '$address_of_school', '$pept_passer', '$rating', '$date_of_assessment', '$others' ,'$others_checkbox', '$name_and_address_testing_center' , '$eligibility_remarks', '$dateCreated' , '$dateUpdated')";
    $run_eligibility = mysqli_query($conn,$insert_elibility);

    if($run_eligibility){
        echo "added eligibility";
    }else{
        echo "error";
    }




    $insert_learners_info = "INSERT INTO learners_personal_infos (lrn,last_name,first_name,middle_name,suffix,birth_date,sex,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn' , '$last_name' , '$first_name' ,'$middle_name', '$suffix' , '$birth_date' , '$sex','$remarks', '$dateCreated', '$dateUpdated')
    ";

    $run_insert_learners_info = mysqli_query($conn,$insert_learners_info);

    echo "inserted leanrer" . '<br>';

    //insert eligibility

    $insert_elibility = "INSERT INTO eligibility_for_elementary_school_enrollment 
    (lrn, credential_presented, name_of_school, school_id, address_of_school, pept_passer, rating, date_of_assessment, others, specify, name_and_address_testing_center, remarks, date_time_created, date_time_updated) VALUES
    ('$lrn' , '$new_credential','$eligibility_name_of_school', '$school_id' , '$address_of_school', '$pept_passer', '$rating', '$date_of_assessment', '$others' ,'$others_checkbox', '$name_and_address_testing_center' , '$eligibility_remarks', '$dateCreated' , '$dateUpdated')";
    $run_eligibility = mysqli_query($conn,$insert_elibility);

    if($run_eligibility){
        echo "added eligibility";
    }else{
        echo "error";
    }



}



}

?>