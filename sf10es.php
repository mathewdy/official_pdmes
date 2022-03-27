<?php
ob_start();
include('connection.php');
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



<form action="sf10es.php" method="POST">

<!---learner's personal info--->
<h1>Learner's Personal Information</h1>
<label for="">Last Name: </label>
<input type="text" name="last_name">
<br>
<label for="">First Name:</label>
<input type="text" name="first_name">
<br>
<label for="">Name EXTN. (Jr, I, II): </label>
<input type="text" name="suffix">
<br>
<label for="">Middle Name: </label>
<input type="text" name="middle_name">
<br>
<label for="">Learner Reference Number (LRN) :</label>
<input type="text" name="lrn">
<br>
<label for="">Birth Date:</label>
<input type="date" name="birth_date" id="">
<br>
<label for="">Sex:</label>
<select name="sex" id="">
    <option value="Male">Male</option>
    <option value="Female">Female</option>
</select>
<br>


<!--Eligibility for elementary school enrolment------>

<h1>Eligbility for Elementary School Enrolement</h1>

    <label for="">Credential Presented for Grade 1 : </label>
    <br>

    <label for="">Kinder Progress Report:</label>
    <input type="checkbox" name="credential_presented[]" value="Kinder progress report">
    <br>

    <label for="">ECCD Checklist:</label>
    <input type="checkbox" name="cedential_presented[]" value="ECCD Checklist" >
    <br>


    <label for="">Kindergarten Cetifcate of Completion:</label>
    <input type="checkbox" name="credential_presented[]" value="Kindergarten Certificate of Completion" >

    <br>
    <label for="">Name of School: </label>
    <input type="text" name="eligibility_name_of_school">

    <br>
    <label for="">School ID: </label>
    <input type="text" name="school_id">

    <br>
    <label for="">Address of School: </label>
    <input type="text" name="address_of_school">

    <br>

    <!--other credential-->

    <label for="">Other Credential Presented</label>

    <br>
    <!---dapat 1 kapag nag check, kapag hindi 0 ang value sa database-->

    <!---bukod to sa  eligiblity--->

    <label for="">PEPT Passer</label>
    <input type="checkbox" name="pept_passer[]" value="1">
    <br>

    <label for="">Rating:</label>
    <input type="text" name="rating">
    <br>

    <label for="">Date of Assessment: </label>
    <input type="date" name="date_of_assessment">
    <br>

    <label for="">Others: </label>
    <input type="checkbox" name="others[]" value="1">
    <input type="text" name="others_please_specify">

    <br>

    <label for="">Name and Address of Testing Center:</label>
    <input type="text" name="name_and_address_testing_center">

    <br>

    <label for="">Remark: </label>
    <input type="text" name="eligibility_remarks">
    <br>

    <!----Scholastic Record----->
    <!---phase1 ito-->

    <h1>Scholastic Record</h1>
    <label for="">School: </label>
    <input type="text" name="phase1_name_of_school">

    <br>

    <label for="">School ID:</label>
    <input type="text" name="phase1_school_id">
    

    <br>
    <label for="">District: </label>
    <input type="text" name="phase1_district">

    <br>
    <label for="">Division: </label>
    <input type="text" name="phase1_division">

    <br>
    <label for="">Region:</label>
    <input type="text" name="phase1_region">

    <br>

    <label for="">Classified as Grade: </label>
    <input type="text" name="phase1_classified_as_grade">

    <br>

    <label for="">Section: </label>
    <input type="text" name="phase1_section">

    <br>

    <label for="">School Year: </label>
    <input type="text" name="phase1_school_year">

    <br>

    <label for="">Name of Teacher:</label>
    <input type="text" name="phase1_name_of_teacher">

    <br>

    <label for="">Signature:</label>
    <input type="text" name="phase1_signature" >

    

    <!---learning areas (subjects na ito)---->

    <h2>Learning Areas</h2>
    <h3>Quarter 1</h3>

    <label for="">Mother Tongue</label>
    <input type="text" name="term1_phase1_mother_tongue">

    <br>

    <label for="">Filipino</label>
    <input type="text" name="term1_phase1_filipino">

    <br>

    <label for="">English</label>
    <input type="text" name="term1_phase1_english">


    <br>
    <label for="">Mathematics</label>
    <input type="text" name="term1_phase1_mathematics">

    <br>
    <label for="">Science</label>
    <input type="text" name="term1_phase1_science">

    <br>
    <label for="">Araling Panlipunan</label>
    <input type="text" name="term1_phase1_araling_panlipunan">

    <br>
    <label for="">EPP / TLE</label>
    <input type="text" name="term1_phase1_epp_tle">

    <br>

    <label for="">MAPEH</label>
    <input type="text" name="term1_phase1_mapeh" readonly>

    <br>

    <label for="">Music</label>
    <input type="text" name="term1_phase1_music">

    <br>
    <label for="">Arts</label>
    <input type="text" name="term1_phase1_arts">

    <br>
    <label for="">Physical Education</label>
    <input type="text" name="term1_phase1_pe" id="">

    <br>
    <label for="">Health</label>
    <input type="text" name="term1_phase1_health">

    <br>
    <label for="">Eduk. sa Pagpapakatao</label>
    <input type="text" name="term1_phase1_esp">

    <br>
    <label for="">*Arabic Language</label>
    <input type="text" name="term1_phase1_arabic_language">


    <br>
    <label for="">*Islamic Values Education</label>
    <input type="text" name="term1_phase1_islamic_values">

    <br>

    <label for="">General Average</label>
    <input type="text" readonly>


    <!----term 2--->

    <h3>Quarter 2</h3>

    <label for="">Mother Tongue</label>
    <input type="text" name="term2_phase1_mother_tongue">

    <br>

    <label for="">Filipino</label>
    <input type="text" name="term2_phase1_filipino">

    <br>

    <label for="">English</label>
    <input type="text" name="term2_phase1_english">


    <br>
    <label for="">Mathematics</label>
    <input type="text" name="term2_phase1_mathematics">

    <br>
    <label for="">Science</label>
    <input type="text" name="term2_phase1_science">

    <br>
    <label for="">Araling Panlipunan</label>
    <input type="text" name="term2_phase1_araling_panlipunan">

    <br>
    <label for="">EPP / TLE</label>
    <input type="text" name="term2_phase1_epp_tle">

    <br>

    <label for="">MAPEH</label>
    <input type="text" name="term2_phase1_mapeh" readonly>

    <br>

    <label for="">Music</label>
    <input type="text" name="term2_phase1_music">

    <br>
    <label for="">Arts</label>
    <input type="text" name="term2_phase1_arts">

    <br>
    <label for="">Physical Education</label>
    <input type="text" name="term2_phase1_pe" id="">

    <br>
    <label for="">Health</label>
    <input type="text" name="term2_phase1_health">

    <br>
    <label for="">Eduk. sa Pagpapakatao</label>
    <input type="text" name="term2_phase1_esp">

    <br>
    <label for="">*Arabic Language</label>
    <input type="text" name="term2_phase1_arabic_language">


    <br>
    <label for="">*Islamic Values Education</label>
    <input type="text" name="term2_phase1_islamic_values">

    <br>

    <label for="">General Average</label>
    <input type="text" readonly>


    <!-----term3_phase1----->
    
    <h3>Quarter 3</h3>

    <label for="">Mother Tongue</label>
    <input type="text" name="term3_phase1_mother_tongue">

    <br>

    <label for="">Filipino</label>
    <input type="text" name="term3_phase1_filipino">

    <br>

    <label for="">English</label>
    <input type="text" name="term3_phase1_english">


    <br>
    <label for="">Mathematics</label>
    <input type="text" name="term3_phase1_mathematics">

    <br>
    <label for="">Science</label>
    <input type="text" name="term3_phase1_science">

    <br>
    <label for="">Araling Panlipunan</label>
    <input type="text" name="term3_phase1_araling_panlipunan">

    <br>
    <label for="">EPP / TLE</label>
    <input type="text" name="term3_phase1_epp_tle">

    <br>

    <label for="">MAPEH</label>
    <input type="text" name="term3_phase1_mapeh" readonly>

    <br>

    <label for="">Music</label>
    <input type="text" name="term3_phase1_music">

    <br>
    <label for="">Arts</label>
    <input type="text" name="term3_phase1_arts">

    <br>
    <label for="">Physical Education</label>
    <input type="text" name="term3_phase1_pe" id="">

    <br>
    <label for="">Health</label>
    <input type="text" name="term3_phase1_health">

    <br>
    <label for="">Eduk. sa Pagpapakatao</label>
    <input type="text" name="term3_phase1_esp">

    <br>
    <label for="">*Arabic Language</label>
    <input type="text" name="term3_phase1_arabic_language">


    <br>
    <label for="">*Islamic Values Education</label>
    <input type="text" name="term3_phase1_islamic_values">

    <br>

    <label for="">General Average</label>
    <input type="text" readonly>



    <h3>Quarter 4</h3>

    <label for="">Mother Tongue</label>
    <input type="text" name="term4_phase1_mother_tongue">

    <br>

    <label for="">Filipino</label>
    <input type="text" name="term4_phase1_filipino">

    <br>

    <label for="">English</label>
    <input type="text" name="term4_phase1_english">


    <br>
    <label for="">Mathematics</label>
    <input type="text" name="term4_phase1_mathematics">

    <br>
    <label for="">Science</label>
    <input type="text" name="term4_phase1_science">

    <br>
    <label for="">Araling Panlipunan</label>
    <input type="text" name="term4_phase1_araling_panlipunan">

    <br>
    <label for="">EPP / TLE</label>
    <input type="text" name="term4_phase1_epp_tle">

    <br>

    <label for="">MAPEH</label>
    <input type="text" name="term4_phase1_mapeh" readonly>

    <br>

    <label for="">Music</label>
    <input type="text" name="term4_phase1_music">

    <br>
    <label for="">Arts</label>
    <input type="text" name="term4_phase1_arts">

    <br>
    <label for="">Physical Education</label>
    <input type="text" name="term4_phase1_pe" id="">

    <br>
    <label for="">Health</label>
    <input type="text" name="term4_phase1_health">

    <br>
    <label for="">Eduk. sa Pagpapakatao</label>
    <input type="text" name="term4_phase1_esp">

    <br>
    <label for="">*Arabic Language</label>
    <input type="text" name="term4_phase1_arabic_language">


    <br>
    <label for="">*Islamic Values Education</label>
    <input type="text" name="term4_phase1_islamic_values">

    <br>
    <label for="">General Average</label>
    <input type="text" readonly>




    <!-- Phase 2 Here -->
    <h1>Phase 2</h1>
    <label for="">School: </label>
    <input type="text" name="phase2_name_of_school">

    <br>

    <label for="">School ID:</label>
    <input type="text" name="phase2_school_id">
    

    <br>
    <label for="">District: </label>
    <input type="text" name="phase2_district">

    <br>
    <label for="">Division: </label>
    <input type="text" name="phase2_division">

    <br>
    <label for="">Region:</label>
    <input type="text" name="phase2_region">

    <br>

    <label for="">Classified as Grade: </label>
    <input type="text" name="phase2_classified_as_grade">

    <br>

    <label for="">Section: </label>
    <input type="text" name="phase2_section">

    <br>

    <label for="">School Year: </label>
    <input type="text" name="phase2_school_year">

    <br>

    <label for="">Name of Teacher:</label>
    <input type="text" name="phase2_name_of_teacher">

    <br>

    <label for="">Signature:</label>
    <input type="text" name="phase2_signature" >

    

    <!---learning areas (subjects na ito)---->

    <h2>Learning Areas</h2>
    <h3>Quarter 1</h3>

    <label for="">Mother Tongue</label>
    <input type="text" name="term1_phase2_mother_tongue">

    <br>

    <label for="">Filipino</label>
    <input type="text" name="term1_phase2_filipino">

    <br>

    <label for="">English</label>
    <input type="text" name="term1_phase2_english">


    <br>
    <label for="">Mathematics</label>
    <input type="text" name="term1_phase2_mathematics">

    <br>
    <label for="">Science</label>
    <input type="text" name="term1_phase2_science">

    <br>
    <label for="">Araling Panlipunan</label>
    <input type="text" name="term1_phase2_araling_panlipunan">

    <br>
    <label for="">EPP / TLE</label>
    <input type="text" name="term1_phase2_epp_tle">

    <br>

    <label for="">MAPEH</label>
    <input type="text" name="term1_phase2_mapeh" readonly>

    <br>

    <label for="">Music</label>
    <input type="text" name="term1_phase2_music">

    <br>
    <label for="">Arts</label>
    <input type="text" name="term1_phase2_arts">

    <br>
    <label for="">Physical Education</label>
    <input type="text" name="term1_phase2_pe" id="">

    <br>
    <label for="">Health</label>
    <input type="text" name="term1_phase2_health">

    <br>
    <label for="">Eduk. sa Pagpapakatao</label>
    <input type="text" name="term1_phase2_esp">

    <br>
    <label for="">*Arabic Language</label>
    <input type="text" name="term1_phase2_arabic_language">


    <br>
    <label for="">*Islamic Values Education</label>
    <input type="text" name="term1_phase2_islamic_values">

    <br>

    <label for="">General Average</label>
    <input type="text" readonly>


    <!----term 2--->

    <h3>Quarter 2</h3>

    <label for="">Mother Tongue</label>
    <input type="text" name="term2_phase2_mother_tongue">

    <br>

    <label for="">Filipino</label>
    <input type="text" name="term2_phase2_filipino">

    <br>

    <label for="">English</label>
    <input type="text" name="term2_phase2_english">


    <br>
    <label for="">Mathematics</label>
    <input type="text" name="term2_phase2_mathematics">

    <br>
    <label for="">Science</label>
    <input type="text" name="term2_phase2_science">

    <br>
    <label for="">Araling Panlipunan</label>
    <input type="text" name="term2_phase2_araling_panlipunan">

    <br>
    <label for="">EPP / TLE</label>
    <input type="text" name="term2_phase2_epp_tle">

    <br>

    <label for="">MAPEH</label>
    <input type="text" name="term2_phase2_mapeh" readonly>

    <br>

    <label for="">Music</label>
    <input type="text" name="term2_phase2_music">

    <br>
    <label for="">Arts</label>
    <input type="text" name="term2_phase2_arts">

    <br>
    <label for="">Physical Education</label>
    <input type="text" name="term2_phase2_pe" id="">

    <br>
    <label for="">Health</label>
    <input type="text" name="term2_phase2_health">

    <br>
    <label for="">Eduk. sa Pagpapakatao</label>
    <input type="text" name="term2_phase2_esp">

    <br>
    <label for="">*Arabic Language</label>
    <input type="text" name="term2_phase2_arabic_language">


    <br>
    <label for="">*Islamic Values Education</label>
    <input type="text" name="term2_phase2_islamic_values">

    <br>

    <label for="">General Average</label>
    <input type="text" readonly>


    <!-----term3_phase1----->
    
    <h3>Quarter 3</h3>

    <label for="">Mother Tongue</label>
    <input type="text" name="term3_phase2_mother_tongue">

    <br>

    <label for="">Filipino</label>
    <input type="text" name="term3_phase2_filipino">

    <br>

    <label for="">English</label>
    <input type="text" name="term3_phase2_english">


    <br>
    <label for="">Mathematics</label>
    <input type="text" name="term3_phase2_mathematics">

    <br>
    <label for="">Science</label>
    <input type="text" name="term3_phase2_science">

    <br>
    <label for="">Araling Panlipunan</label>
    <input type="text" name="term3_phase2_araling_panlipunan">

    <br>
    <label for="">EPP / TLE</label>
    <input type="text" name="term3_phase2_epp_tle">

    <br>

    <label for="">MAPEH</label>
    <input type="text" name="term3_phase2_mapeh" readonly>

    <br>

    <label for="">Music</label>
    <input type="text" name="term3_phase2_music">

    <br>
    <label for="">Arts</label>
    <input type="text" name="term3_phase2_arts">

    <br>
    <label for="">Physical Education</label>
    <input type="text" name="term3_phase2_pe" id="">

    <br>
    <label for="">Health</label>
    <input type="text" name="term3_phase2_health">

    <br>
    <label for="">Eduk. sa Pagpapakatao</label>
    <input type="text" name="term3_phase2_esp">

    <br>
    <label for="">*Arabic Language</label>
    <input type="text" name="term3_phase2_arabic_language">


    <br>
    <label for="">*Islamic Values Education</label>
    <input type="text" name="term3_phase2_islamic_values">

    <br>

    <label for="">General Average</label>
    <input type="text" readonly>



    <h3>Quarter 4</h3>

    <label for="">Mother Tongue</label>
    <input type="text" name="term4_phase2_mother_tongue">

    <br>

    <label for="">Filipino</label>
    <input type="text" name="term4_phase2_filipino">

    <br>

    <label for="">English</label>
    <input type="text" name="term4_phase2_english">


    <br>
    <label for="">Mathematics</label>
    <input type="text" name="term4_phase2_mathematics">

    <br>
    <label for="">Science</label>
    <input type="text" name="term4_phase2_science">

    <br>
    <label for="">Araling Panlipunan</label>
    <input type="text" name="term4_phase2_araling_panlipunan">

    <br>
    <label for="">EPP / TLE</label>
    <input type="text" name="term4_phase2_epp_tle">

    <br>

    <label for="">MAPEH</label>
    <input type="text" name="term4_phase2_mapeh" readonly>

    <br>

    <label for="">Music</label>
    <input type="text" name="term4_phase2_music">

    <br>
    <label for="">Arts</label>
    <input type="text" name="term4_phase2_arts">

    <br>
    <label for="">Physical Education</label>
    <input type="text" name="term4_phase2_pe" id="">

    <br>
    <label for="">Health</label>
    <input type="text" name="term4_phase2_health">

    <br>
    <label for="">Eduk. sa Pagpapakatao</label>
    <input type="text" name="term4_phase2_esp">

    <br>
    <label for="">*Arabic Language</label>
    <input type="text" name="term4_phase2_arabic_language">


    <br>
    <label for="">*Islamic Values Education</label>
    <input type="text" name="term4_phase2_islamic_values">

    <br>
    <label for="">General Average</label>
    <input type="text" readonly>


    <!-- Phase 3 -->
    <h1>Phase 3</h1>
    <label for="">School: </label>
    <input type="text" name="phase3_name_of_school">

    <br>

    <label for="">School ID:</label>
    <input type="text" name="phase3_school_id">
    

    <br>
    <label for="">District: </label>
    <input type="text" name="phase3_district">

    <br>
    <label for="">Division: </label>
    <input type="text" name="phase3_division">

    <br>
    <label for="">Region:</label>
    <input type="text" name="phase3_region">

    <br>

    <label for="">Classified as Grade: </label>
    <input type="text" name="phase3_classified_as_grade">

    <br>

    <label for="">Section: </label>
    <input type="text" name="phase3_section">

    <br>

    <label for="">School Year: </label>
    <input type="text" name="phase3_school_year">

    <br>

    <label for="">Name of Teacher:</label>
    <input type="text" name="phase3_name_of_teacher">

    <br>

    <label for="">Signature:</label>
    <input type="text" name="phase3_signature" >

    

    <!---learning areas (subjects na ito)---->

    <h2>Learning Areas</h2>
    <h3>Quarter 1</h3>

    <label for="">Mother Tongue</label>
    <input type="text" name="term1_phase3_mother_tongue">

    <br>

    <label for="">Filipino</label>
    <input type="text" name="term1_phase3_filipino">

    <br>

    <label for="">English</label>
    <input type="text" name="term1_phase3_english">


    <br>
    <label for="">Mathematics</label>
    <input type="text" name="term1_phase3_mathematics">

    <br>
    <label for="">Science</label>
    <input type="text" name="term1_phase3_science">

    <br>
    <label for="">Araling Panlipunan</label>
    <input type="text" name="term1_phase3_araling_panlipunan">

    <br>
    <label for="">EPP / TLE</label>
    <input type="text" name="term1_phase3_epp_tle">

    <br>

    <label for="">MAPEH</label>
    <input type="text" name="term1_phase3_mapeh" readonly>

    <br>

    <label for="">Music</label>
    <input type="text" name="term1_phase3_music">

    <br>
    <label for="">Arts</label>
    <input type="text" name="term1_phase3_arts">

    <br>
    <label for="">Physical Education</label>
    <input type="text" name="term1_phase3_pe" id="">

    <br>
    <label for="">Health</label>
    <input type="text" name="term1_phase3_health">

    <br>
    <label for="">Eduk. sa Pagpapakatao</label>
    <input type="text" name="term1_phase3_esp">

    <br>
    <label for="">*Arabic Language</label>
    <input type="text" name="term1_phase3_arabic_language">


    <br>
    <label for="">*Islamic Values Education</label>
    <input type="text" name="term1_phase3_islamic_values">

    <br>

    <label for="">General Average</label>
    <input type="text" readonly>


    <!----term 2--->

    <h3>Quarter 2</h3>

    <label for="">Mother Tongue</label>
    <input type="text" name="term2_phase3_mother_tongue">

    <br>

    <label for="">Filipino</label>
    <input type="text" name="term2_phase3_filipino">

    <br>

    <label for="">English</label>
    <input type="text" name="term2_phase3_english">


    <br>
    <label for="">Mathematics</label>
    <input type="text" name="term2_phase3_mathematics">

    <br>
    <label for="">Science</label>
    <input type="text" name="term2_phase3_science">

    <br>
    <label for="">Araling Panlipunan</label>
    <input type="text" name="term2_phase3_araling_panlipunan">

    <br>
    <label for="">EPP / TLE</label>
    <input type="text" name="term2_phase3_epp_tle">

    <br>

    <label for="">MAPEH</label>
    <input type="text" name="term2_phase3_mapeh" readonly>

    <br>

    <label for="">Music</label>
    <input type="text" name="term2_phase3_music">

    <br>
    <label for="">Arts</label>
    <input type="text" name="term2_phase3_arts">

    <br>
    <label for="">Physical Education</label>
    <input type="text" name="term2_phase3_pe" id="">

    <br>
    <label for="">Health</label>
    <input type="text" name="term2_phase3_health">

    <br>
    <label for="">Eduk. sa Pagpapakatao</label>
    <input type="text" name="term2_phase3_esp">

    <br>
    <label for="">*Arabic Language</label>
    <input type="text" name="term2_phase3_arabic_language">


    <br>
    <label for="">*Islamic Values Education</label>
    <input type="text" name="term2_phase3_islamic_values">

    <br>

    <label for="">General Average</label>
    <input type="text" readonly>


    <!-----term3_phase1----->
    
    <h3>Quarter 3</h3>

    <label for="">Mother Tongue</label>
    <input type="text" name="term3_phase3_mother_tongue">

    <br>

    <label for="">Filipino</label>
    <input type="text" name="term3_phase3_filipino">

    <br>

    <label for="">English</label>
    <input type="text" name="term3_phase3_english">


    <br>
    <label for="">Mathematics</label>
    <input type="text" name="term3_phase3_mathematics">

    <br>
    <label for="">Science</label>
    <input type="text" name="term3_phase3_science">

    <br>
    <label for="">Araling Panlipunan</label>
    <input type="text" name="term3_phase3_araling_panlipunan">

    <br>
    <label for="">EPP / TLE</label>
    <input type="text" name="term3_phase3_epp_tle">

    <br>

    <label for="">MAPEH</label>
    <input type="text" name="term3_phase3_mapeh" readonly>

    <br>

    <label for="">Music</label>
    <input type="text" name="term3_phase3_music">

    <br>
    <label for="">Arts</label>
    <input type="text" name="term3_phase3_arts">

    <br>
    <label for="">Physical Education</label>
    <input type="text" name="term3_phase3_pe" id="">

    <br>
    <label for="">Health</label>
    <input type="text" name="term3_phase3_health">

    <br>
    <label for="">Eduk. sa Pagpapakatao</label>
    <input type="text" name="term3_phase3_esp">

    <br>
    <label for="">*Arabic Language</label>
    <input type="text" name="term3_phase3_arabic_language">


    <br>
    <label for="">*Islamic Values Education</label>
    <input type="text" name="term3_phase3_islamic_values">

    <br>

    <label for="">General Average</label>
    <input type="text" readonly>



    <h3>Quarter 4</h3>

    <label for="">Mother Tongue</label>
    <input type="text" name="term4_phase3_mother_tongue">

    <br>

    <label for="">Filipino</label>
    <input type="text" name="term4_phase3_filipino">

    <br>

    <label for="">English</label>
    <input type="text" name="term4_phase3_english">


    <br>
    <label for="">Mathematics</label>
    <input type="text" name="term4_phase3_mathematics">

    <br>
    <label for="">Science</label>
    <input type="text" name="term4_phase3_science">

    <br>
    <label for="">Araling Panlipunan</label>
    <input type="text" name="term4_phase3_araling_panlipunan">

    <br>
    <label for="">EPP / TLE</label>
    <input type="text" name="term4_phase3_epp_tle">

    <br>

    <label for="">MAPEH</label>
    <input type="text" name="term4_phase3_mapeh" readonly>

    <br>

    <label for="">Music</label>
    <input type="text" name="term4_phase3_music">

    <br>
    <label for="">Arts</label>
    <input type="text" name="term4_phase3_arts">

    <br>
    <label for="">Physical Education</label>
    <input type="text" name="term4_phase3_pe" id="">

    <br>
    <label for="">Health</label>
    <input type="text" name="term4_phase3_health">

    <br>
    <label for="">Eduk. sa Pagpapakatao</label>
    <input type="text" name="term4_phase3_esp">

    <br>
    <label for="">*Arabic Language</label>
    <input type="text" name="term4_phase3_arabic_language">


    <br>
    <label for="">*Islamic Values Education</label>
    <input type="text" name="term4_phase3_islamic_values">

    <br>
    <label for="">General Average</label>
    <input type="text" readonly>

    <br>
    <input type="submit" name="next" value="Next">



</body>
</html>

<?php

if(isset($_POST['next'])){


    //learners personal info
    $last_name = ucfirst($_POST['last_name']);
    $first_name = ucfirst($_POST['first_name']);
    $suffix = $_POST['suffix'];
    $middle_name = ucfirst($_POST['middle_name']);
    $lrn = $_POST['lrn'];
    $birth_date = date('M-d-Y',strtotime($_POST['birth_date']));
    $sex = $_POST['sex'];
    $dateCreated = date("y-m-d h:i:a");
    $dateUpdated = date("y-m-d h:i:a");
    $remarks = 'none';


    //eligibility
    $credential = $_POST['credential_presented'];
    $new_credential = implode(", " ,$credential);
    $eligibility_name_of_school = strtoupper($_POST['eligibility_name_of_school']);
    $school_id = strtoupper($_POST['school_id']);
    $address_of_school = strtoupper($_POST['address_of_school']);
    $pept_passer = $_POST['pept_passer'];

    foreach($pept_passer as $pept_passer1){
        echo $pept_passer1;
    }

    $rating = $_POST['rating'];
    
    $date_of_assessment = date('M-d-Y',strtotime ($_POST['date_of_assessment']));

    $others_checkbox = $_POST['others'];
    foreach($others_checkbox as $others_checkbox1){
        echo $others_checkbox1;
    }

    
    $others = $_POST['others_please_specify'];
    $name_and_address_testing_center = strtoupper($_POST['name_and_address_testing_center']);
    $eligibility_remarks = $_POST['eligibility_remarks'];



    //scholastic records
  

    //subjectssss
    $mother_tongue = 1;
    $filipino = 2;
    $english = 3;
    $math = 4;
    $science = 5;
    $AP = 6;
    $epp_tle = 7;
    $mapeh = 8;
    $music = 9;
    $arts = 10; 
    $PE = 11;
    $health = 12;
    $esp = 13;
    $arabic_language = 14;
    $islamic_values = 15;
    //phase1
    $phase1 = 1;
    $phase1_name_of_school = $_POST['phase1_name_of_school'];
    $phase1_school_id = $_POST['phase1_school_id'];
    $phase1_district = $_POST['phase1_district'];
    $phase1_division = $_POST['phase1_division'];
    $phase1_region = $_POST['phase1_region'];
    $phase1_classified_as_grade = $_POST['phase1_classified_as_grade'];
    $phase1_section = $_POST['phase1_section'];
    $phase1_school_year = $_POST['phase1_school_year'];
    $phase1_name_of_teacher = $_POST['phase1_name_of_teacher'];
    $phase1_signature = $_POST['phase1_signature'];
    $phase1_remarks = 'none';

    //term1_phase1 grades
    $term1_phase1 = 1;
    $term1_phase1_mother_tongue = $_POST['term1_phase1_mother_tongue'];
    $term1_phase1_filipino = $_POST['term1_phase1_filipino'];
    $term1_phase1_english = $_POST['term1_phase1_english'];
    $term1_phase1_mathematics = $_POST['term1_phase1_mathematics'];
    $term1_phase1_science = $_POST['term1_phase1_science'];
    $term1_phase1_araling_panlipunan = $_POST['term1_phase1_araling_panlipunan'];
    $term1_phase1_epp_tle = $_POST['term1_phase1_epp_tle'];
    $term1_phase1_music = $_POST['term1_phase1_music'];
    $term1_phase1_arts = $_POST['term1_phase1_arts'];
    $term1_phase1_pe = $_POST['term1_phase1_pe'];
    $term1_phase1_health = $_POST['term1_phase1_health'];
    $term1_phase1_esp = $_POST['term1_phase1_esp'];
    $term1_phase1_arabic_language = $_POST['term1_phase1_arabic_language'];
    $term1_phase1_islamic_values = $_POST['term1_phase1_islamic_values'];
    $term1_phase1_remarks = 'none'; 

    //term2_phase1 grades
    //term2_phase1 
    $term2_phase1 = 2;
    $term2_phase1_mother_tongue = $_POST['term2_phase1_mother_tongue'];
    $term2_phase1_filipino = $_POST['term2_phase1_filipino'];
    $term2_phase1_english = $_POST['term2_phase1_english'];
    $term2_phase1_mathematics = $_POST['term2_phase1_mathematics'];
    $term2_phase1_science = $_POST['term2_phase1_science'];
    $term2_phase1_araling_panlipunan = $_POST['term2_phase1_araling_panlipunan'];
    $term2_phase1_epp_tle = $_POST['term2_phase1_epp_tle'];

    $term2_phase1_music = $_POST['term2_phase1_music'];
    $term2_phase1_arts = $_POST['term2_phase1_arts'];
    $term2_phase1_pe = $_POST['term2_phase1_pe'];
    $term2_phase1_health = $_POST['term2_phase1_health'];
    $term2_phase1_esp = $_POST['term2_phase1_esp'];
    $term2_phase1_arabic_language = $_POST['term2_phase1_arabic_language'];
    $term2_phase1_islamic_values = $_POST['term2_phase1_islamic_values'];
    $term2_phase1_remarks = 'none'; 

    //term3_phase1
    //term3_phase1 grades

    $term3_phase1 = 3;
    $term3_phase1_mother_tongue = $_POST['term3_phase1_mother_tongue'];
    $term3_phase1_filipino = $_POST['term3_phase1_filipino'];
    $term3_phase1_english = $_POST['term3_phase1_english'];
    $term3_phase1_mathematics = $_POST['term3_phase1_mathematics'];
    $term3_phase1_science = $_POST['term3_phase1_science'];
    $term3_phase1_araling_panlipunan = $_POST['term3_phase1_araling_panlipunan'];
    $term3_phase1_epp_tle = $_POST['term3_phase1_epp_tle'];
    $term3_phase1_music = $_POST['term3_phase1_music'];
    $term3_phase1_arts = $_POST['term3_phase1_arts'];
    $term3_phase1_pe = $_POST['term3_phase1_pe'];
    $term3_phase1_health = $_POST['term3_phase1_health'];
    $term3_phase1_esp = $_POST['term3_phase1_esp'];
    $term3_phase1_arabic_language = $_POST['term3_phase1_arabic_language'];
    $term3_phase1_islamic_values = $_POST['term3_phase1_islamic_values'];
    $term3_phase1_remarks = 'none'; 

    //term4_phase1
    //term4_phase1 grades

    $term4_phase1 = 4;
    $term4_phase1_mother_tongue = $_POST['term4_phase1_mother_tongue'];
    $term4_phase1_filipino = $_POST['term4_phase1_filipino'];
    $term4_phase1_english = $_POST['term4_phase1_english'];
    $term4_phase1_mathematics = $_POST['term4_phase1_mathematics'];
    $term4_phase1_science = $_POST['term4_phase1_science'];
    $term4_phase1_araling_panlipunan = $_POST['term4_phase1_araling_panlipunan'];
    $term4_phase1_epp_tle = $_POST['term4_phase1_epp_tle'];
    $term4_phase1_music = $_POST['term4_phase1_music'];
    $term4_phase1_arts = $_POST['term4_phase1_arts'];
    $term4_phase1_pe = $_POST['term2_phase1_pe'];
    $term4_phase1_health = $_POST['term4_phase1_health'];
    $term4_phase1_esp = $_POST['term4_phase1_esp'];
    $term4_phase1_arabic_language = $_POST['term4_phase1_arabic_language'];
    $term4_phase1_islamic_values = $_POST['term4_phase1_islamic_values'];
    $term4_phase1_remarks = 'none'; 



    // Phase 2

    $phase2 = 2;
    $phase2_name_of_school = $_POST['phase2_name_of_school'];
    $phase2_school_id = $_POST['phase2_school_id'];
    $phase2_district = $_POST['phase2_district'];
    $phase2_division = $_POST['phase2_division'];
    $phase2_region = $_POST['phase2_region'];
    $phase2_classified_as_grade = $_POST['phase2_classified_as_grade'];
    $phase2_section = $_POST['phase2_section'];
    $phase2_school_year = $_POST['phase2_school_year'];
    $phase2_name_of_teacher = $_POST['phase2_name_of_teacher'];
    $phase2_signature = $_POST['phase2_signature'];
    $phase2_remarks = 'none';

    //term1_phase2 grades
    $term1_phase2 = 1;
    $term1_phase2_mother_tongue = $_POST['term1_phase2_mother_tongue'];
    $term1_phase2_filipino = $_POST['term1_phase2_filipino'];
    $term1_phase2_english = $_POST['term1_phase2_english'];
    $term1_phase2_mathematics = $_POST['term1_phase2_mathematics'];
    $term1_phase2_science = $_POST['term1_phase2_science'];
    $term1_phase2_araling_panlipunan = $_POST['term1_phase2_araling_panlipunan'];
    $term1_phase2_epp_tle = $_POST['term1_phase2_epp_tle'];
    $term1_phase2_music = $_POST['term1_phase2_music'];
    $term1_phase2_arts = $_POST['term1_phase2_arts'];
    $term1_phase2_pe = $_POST['term1_phase2_pe'];
    $term1_phase2_health = $_POST['term1_phase2_health'];
    $term1_phase2_esp = $_POST['term1_phase2_esp'];
    $term1_phase2_arabic_language = $_POST['term1_phase2_arabic_language'];
    $term1_phase2_islamic_values = $_POST['term1_phase2_islamic_values'];
    $term1_phase2_remarks = 'none'; 

    //term2_phase2 grades
    //term2_phase2 
    $term2_phase2 = 2;
    $term2_phase2_mother_tongue = $_POST['term2_phase2_mother_tongue'];
    $term2_phase2_filipino = $_POST['term2_phase2_filipino'];
    $term2_phase2_english = $_POST['term2_phase2_english'];
    $term2_phase2_mathematics = $_POST['term2_phase2_mathematics'];
    $term2_phase2_science = $_POST['term2_phase2_science'];
    $term2_phase2_araling_panlipunan = $_POST['term2_phase2_araling_panlipunan'];
    $term2_phase2_epp_tle = $_POST['term2_phase2_epp_tle'];

    $term2_phase2_music = $_POST['term2_phase2_music'];
    $term2_phase2_arts = $_POST['term2_phase2_arts'];
    $term2_phase2_pe = $_POST['term2_phase2_pe'];
    $term2_phase2_health = $_POST['term2_phase2_health'];
    $term2_phase2_esp = $_POST['term2_phase2_esp'];
    $term2_phase2_arabic_language = $_POST['term2_phase2_arabic_language'];
    $term2_phase2_islamic_values = $_POST['term2_phase2_islamic_values'];
    $term2_phase2_remarks = 'none'; 

    //term3_phase2
    //term3_phase2 grades

    $term3_phase2 = 3;
    $term3_phase2_mother_tongue = $_POST['term3_phase2_mother_tongue'];
    $term3_phase2_filipino = $_POST['term3_phase2_filipino'];
    $term3_phase2_english = $_POST['term3_phase2_english'];
    $term3_phase2_mathematics = $_POST['term3_phase2_mathematics'];
    $term3_phase2_science = $_POST['term3_phase2_science'];
    $term3_phase2_araling_panlipunan = $_POST['term3_phase2_araling_panlipunan'];
    $term3_phase2_epp_tle = $_POST['term3_phase2_epp_tle'];
    $term3_phase2_music = $_POST['term3_phase2_music'];
    $term3_phase2_arts = $_POST['term3_phase2_arts'];
    $term3_phase2_pe = $_POST['term3_phase2_pe'];
    $term3_phase2_health = $_POST['term3_phase2_health'];
    $term3_phase2_esp = $_POST['term3_phase2_esp'];
    $term3_phase2_arabic_language = $_POST['term3_phase2_arabic_language'];
    $term3_phase2_islamic_values = $_POST['term3_phase2_islamic_values'];
    $term3_phase2_remarks = 'none'; 

    //term4_phase2
    //term4_phase2 grades

    $term4_phase2 = 4;
    $term4_phase2_mother_tongue = $_POST['term4_phase2_mother_tongue'];
    $term4_phase2_filipino = $_POST['term4_phase2_filipino'];
    $term4_phase2_english = $_POST['term4_phase2_english'];
    $term4_phase2_mathematics = $_POST['term4_phase2_mathematics'];
    $term4_phase2_science = $_POST['term4_phase2_science'];
    $term4_phase2_araling_panlipunan = $_POST['term4_phase2_araling_panlipunan'];
    $term4_phase2_epp_tle = $_POST['term4_phase2_epp_tle'];
    $term4_phase2_music = $_POST['term4_phase2_music'];
    $term4_phase2_arts = $_POST['term4_phase2_arts'];
    $term4_phase2_pe = $_POST['term2_phase2_pe'];
    $term4_phase2_health = $_POST['term4_phase2_health'];
    $term4_phase2_esp = $_POST['term4_phase2_esp'];
    $term4_phase2_arabic_language = $_POST['term4_phase2_arabic_language'];
    $term4_phase2_islamic_values = $_POST['term4_phase2_islamic_values'];
    $term4_phase2_remarks = 'none'; 



    // Phase 3
    $phase3 = 2;
    $phase3_name_of_school = $_POST['phase3_name_of_school'];
    $phase3_school_id = $_POST['phase3_school_id'];
    $phase3_district = $_POST['phase3_district'];
    $phase3_division = $_POST['phase3_division'];
    $phase3_region = $_POST['phase3_region'];
    $phase3_classified_as_grade = $_POST['phase3_classified_as_grade'];
    $phase3_section = $_POST['phase3_section'];
    $phase3_school_year = $_POST['phase3_school_year'];
    $phase3_name_of_teacher = $_POST['phase3_name_of_teacher'];
    $phase3_signature = $_POST['phase3_signature'];
    $phase3_remarks = 'none';

    //term1_phase3 grades
    $term1_phase3 = 1;
    $term1_phase3_mother_tongue = $_POST['term1_phase3_mother_tongue'];
    $term1_phase3_filipino = $_POST['term1_phase3_filipino'];
    $term1_phase3_english = $_POST['term1_phase3_english'];
    $term1_phase3_mathematics = $_POST['term1_phase3_mathematics'];
    $term1_phase3_science = $_POST['term1_phase3_science'];
    $term1_phase3_araling_panlipunan = $_POST['term1_phase3_araling_panlipunan'];
    $term1_phase3_epp_tle = $_POST['term1_phase3_epp_tle'];
    $term1_phase3_music = $_POST['term1_phase3_music'];
    $term1_phase3_arts = $_POST['term1_phase3_arts'];
    $term1_phase3_pe = $_POST['term1_phase3_pe'];
    $term1_phase3_health = $_POST['term1_phase3_health'];
    $term1_phase3_esp = $_POST['term1_phase3_esp'];
    $term1_phase3_arabic_language = $_POST['term1_phase3_arabic_language'];
    $term1_phase3_islamic_values = $_POST['term1_phase3_islamic_values'];
    $term1_phase3_remarks = 'none'; 

    //term2_phase3 grades
    //term2_phase3 
    $term2_phase3 = 2;
    $term2_phase3_mother_tongue = $_POST['term2_phase3_mother_tongue'];
    $term2_phase3_filipino = $_POST['term2_phase3_filipino'];
    $term2_phase3_english = $_POST['term2_phase3_english'];
    $term2_phase3_mathematics = $_POST['term2_phase3_mathematics'];
    $term2_phase3_science = $_POST['term2_phase3_science'];
    $term2_phase3_araling_panlipunan = $_POST['term2_phase3_araling_panlipunan'];
    $term2_phase3_epp_tle = $_POST['term2_phase3_epp_tle'];

    $term2_phase3_music = $_POST['term2_phase3_music'];
    $term2_phase3_arts = $_POST['term2_phase3_arts'];
    $term2_phase3_pe = $_POST['term2_phase3_pe'];
    $term2_phase3_health = $_POST['term2_phase3_health'];
    $term2_phase3_esp = $_POST['term2_phase3_esp'];
    $term2_phase3_arabic_language = $_POST['term2_phase3_arabic_language'];
    $term2_phase3_islamic_values = $_POST['term2_phase3_islamic_values'];
    $term2_phase3_remarks = 'none'; 

    //term3_phase3
    //term3_phase3 grades

    $term3_phase3 = 3;
    $term3_phase3_mother_tongue = $_POST['term3_phase3_mother_tongue'];
    $term3_phase3_filipino = $_POST['term3_phase3_filipino'];
    $term3_phase3_english = $_POST['term3_phase3_english'];
    $term3_phase3_mathematics = $_POST['term3_phase3_mathematics'];
    $term3_phase3_science = $_POST['term3_phase3_science'];
    $term3_phase3_araling_panlipunan = $_POST['term3_phase3_araling_panlipunan'];
    $term3_phase3_epp_tle = $_POST['term3_phase3_epp_tle'];
    $term3_phase3_music = $_POST['term3_phase3_music'];
    $term3_phase3_arts = $_POST['term3_phase3_arts'];
    $term3_phase3_pe = $_POST['term3_phase3_pe'];
    $term3_phase3_health = $_POST['term3_phase3_health'];
    $term3_phase3_esp = $_POST['term3_phase3_esp'];
    $term3_phase3_arabic_language = $_POST['term3_phase3_arabic_language'];
    $term3_phase3_islamic_values = $_POST['term3_phase3_islamic_values'];
    $term3_phase3_remarks = 'none'; 

    //term4_phase3
    //term4_phase3 grades

    $term4_phase3 = 4;
    $term4_phase3_mother_tongue = $_POST['term4_phase3_mother_tongue'];
    $term4_phase3_filipino = $_POST['term4_phase3_filipino'];
    $term4_phase3_english = $_POST['term4_phase3_english'];
    $term4_phase3_mathematics = $_POST['term4_phase3_mathematics'];
    $term4_phase3_science = $_POST['term4_phase3_science'];
    $term4_phase3_araling_panlipunan = $_POST['term4_phase3_araling_panlipunan'];
    $term4_phase3_epp_tle = $_POST['term4_phase3_epp_tle'];
    $term4_phase3_music = $_POST['term4_phase3_music'];
    $term4_phase3_arts = $_POST['term4_phase3_arts'];
    $term4_phase3_pe = $_POST['term2_phase3_pe'];
    $term4_phase3_health = $_POST['term4_phase3_health'];
    $term4_phase3_esp = $_POST['term4_phase3_esp'];
    $term4_phase3_arabic_language = $_POST['term4_phase3_arabic_language'];
    $term4_phase3_islamic_values = $_POST['term4_phase3_islamic_values'];
    $term4_phase3_remarks = 'none';





    //final_term********
    //computation
    //gagawa ako ng computation dito ni term1_phase1 to term 4 sa subject na to
    // then papasok sya sa general average ni subject

    //MAPEH NAMAN Ditoooooooo average ni Mapeh to hihihi

    $term1_phase1_average_of_mapeh = round(($term1_phase1_music + $term1_phase1_arts + $term1_phase1_pe + $term1_phase1_health) / 4) ;

    $term2_phase1_average_of_mapeh = round(($term2_phase1_music + $term2_phase1_arts + $term2_phase1_pe + $term2_phase1_health) / 4) ;

    $term3_phase1_average_of_mapeh = round(($term3_phase1_music + $term3_phase1_arts + $term3_phase1_pe + $term3_phase1_health) / 4) ;

    $term4_phase1_average_of_mapeh = round(($term4_phase1_music + $term4_phase1_arts + $term4_phase1_pe + $term4_phase1_health) / 4) ;


    
    

    $term5 = 'Final Rating';
  

    $phase1_final_rating_mother_tongue = round(($term1_phase1_mother_tongue + $term2_phase1_mother_tongue + 
    $term3_phase1_mother_tongue + $term4_phase1_mother_tongue) / 4);

    $phase1_final_rating_filipino = round(($term1_phase1_filipino + $term2_phase1_filipino + $term3_phase1_filipino + $term4_phase1_filipino) / 4);

    $phase1_final_rating_english = round(($term1_phase1_english + $term2_phase1_english + $term3_phase1_english + $term4_phase1_english) / 4);

    $phase1_final_rating_math = round(($term1_phase1_mathematics + $term2_phase1_mathematics + $term3_phase1_mathematics + $term4_phase1_mathematics ) / 4);

    $phase1_final_rating_science = round(($term1_phase1_science + $term2_phase1_science + $term3_phase1_science + $term4_phase1_science) / 4);

    $phase1_final_rating_AP = round(($term1_phase1_araling_panlipunan + $term2_phase1_araling_panlipunan + $term3_phase1_araling_panlipunan + $term4_phase1_araling_panlipunan) / 4);

    $phase1_final_rating_epp_tle = round(($term1_phase1_epp_tle + $term2_phase1_epp_tle + $term3_phase1_epp_tle + $term4_phase1_epp_tle) / 4);

    $phase1_final_rating_mapeh = round(($term1_phase1_average_of_mapeh + $term2_phase1_average_of_mapeh + $term3_phase1_average_of_mapeh + $term4_phase1_average_of_mapeh) / 4 );

    $phase1_final_rating_music = round(($term1_phase1_music + $term2_phase1_music + $term3_phase1_music + $term4_phase1_music) / 4);

    $phase1_final_rating_arts = round(($term1_phase1_arts + $term2_phase1_arts + $term3_phase1_arts + $term4_phase1_arts ) / 4);

    $phase1_final_rating_PE = round(($term1_phase1_pe + $term2_phase1_pe + $term3_phase1_pe + $term4_phase1_pe) / 4);

    $phase1_final_rating_health = round(($term1_phase1_health + $term2_phase1_health + $term3_phase1_health + $term4_phase1_health)/ 4);

    $phase1_final_rating_esp = round(($term1_phase1_esp + $term2_phase1_esp + $term3_phase1_esp + $term4_phase1_esp) / 4);
    
    $phase1_final_rating_arabic_language = round(($term1_phase1_arabic_language + $term2_phase1_arabic_language + $term3_phase1_arabic_language + $term4_phase1_arabic_language) / 4);

    $phase1_final_rating_islamic_values = round(($term1_phase1_islamic_values + $term2_phase1_islamic_values + $term3_phase1_islamic_values + $term4_phase1_islamic_values) / 4);
    //gagawa naman ako ng if statement kapag more than 75 == passed else failed

    //remarks ito sa right side ng final rating
    if($phase1_final_rating_mother_tongue >= 75){
        $output = 'PASSED';
    }else{
        $output = 'FAILED';
    }

    if($phase1_final_rating_filipino >= 75){
        $output = 'PASSED';
    }else{
        $output = 'FAILED';
    }

    if($phase1_final_rating_english >= 75){
        $output = 'PASSED';
    }else{
        $output = 'FAILED';
    }

    if($phase1_final_rating_math >= 75){
        $output = 'PASSED';
    }else{
        $output = 'FAILED';
    }

    if($phase1_final_rating_science >= 75){
        $output = 'PASSED';
    }else{
        $output = 'FAILED';
    }

    if($phase1_final_rating_AP >= 75){
        $output = 'PASSED';
    }else{
        $output = 'FAILED';
    }

    if($phase1_final_rating_epp_tle >= 75){
        $output = 'PASSED';
    }else{
        $output = 'FAILED';
    }

    if($phase1_final_rating_mapeh >= 75){
        $output = 'PASSED';
    }else{
        $output = 'FAILED';
    }

    if($phase1_final_rating_music >= 75){
        $output = 'PASSED';
    }else{
        $output = 'FAILED';
    }

    if($phase1_final_rating_arts >= 75){
        $output = 'PASSED';
    }else{
        $output = 'FAILED';
    }

    if($phase1_final_rating_PE >= 75){
        $output = 'PASSED';
    }else{
        $output = 'FAILED';
    }

    if($phase1_final_rating_health >= 75){
        $output = 'PASSED';
    }else{
        $output = 'FAILED';
    }

    if($phase1_final_rating_esp >= 75){
        $output = 'PASSED';
    }else{
        $output = 'FAILED';
    }

    if($phase1_final_rating_arabic_language >= 75){
        $output = 'PASSED';
    }else{
        $output = 'FAILED';
    }

    if($phase1_final_rating_islamic_values >= 75){
        $output = 'PASSED';
    }else{
        $output = 'FAILED';
    }


    
    //general average NA AKOOOO 

 



    //left side ito
    //once na matapos ko to, mag query ako ng insert
    $phase1_term1_general_average = round(($term1_phase1_mother_tongue + $term1_phase1_mathematics + $term1_phase1_araling_panlipunan + $term1_phase1_average_of_mapeh + $term1_phase1_esp ) / 5);

    $phase1_term2_general_average = round(($term2_phase1_mother_tongue + $term2_phase1_filipino + $term2_phase1_mathematics + $term2_phase1_araling_panlipunan + $term2_phase1_average_of_mapeh + $term2_phase1_esp) / 6);

    $phase1_term3_general_average = round(($term3_phase1_mother_tongue + $term3_phase1_filipino + $term3_phase1_english + $term3_phase1_mathematics + $term3_phase1_araling_panlipunan + $term3_phase1_average_of_mapeh + $term3_phase1_esp) / 7);

    $phase1_term4_general_average = round(($term4_phase1_mother_tongue + $term4_phase1_filipino + $term4_phase1_english + $term4_phase1_mathematics + $term4_phase1_araling_panlipunan + $term4_phase1_average_of_mapeh + $term4_phase1_esp) / 7);

    $phase1_term5_general_average = round(($phase1_final_rating_mother_tongue + $phase1_final_rating_filipino + $phase1_final_rating_english + $phase1_final_rating_math + $phase1_final_rating_science + $phase1_final_rating_AP + $phase1_final_rating_epp_tle + $phase1_final_rating_mapeh + $phase1_final_rating_esp) / 9);

    



    




    //right side itooooo
  
    



    //validation 

    $validation_insert = "SELECT * FROM learners_personal_infos WHERE last_name = '$last_name' AND first_name = '$first_name' AND lrn = '$lrn' AND birth_date = '$birth_date' AND middle_name = '$middle_name' ";
    $run_validation = mysqli_query($conn,$validation_insert);

    if(mysqli_num_rows($run_validation) > 0){
        echo "already added" . '<br>';
    }else{

    //insertion ng personal info

    $insert_learners_info = "INSERT INTO learners_personal_infos (lrn,last_name,first_name,middle_name,suffix,birth_date,sex,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn' , '$last_name' , '$first_name' ,'$middle_name', '$suffix' , '$birth_date' , '$sex','$remarks', '$dateCreated', '$dateUpdated')
    ";
    $run_insert_learners_info = mysqli_query($conn,$insert_learners_info);



    if($run_insert_learners_info){
        echo "inserted leanrer" . '<br>';

        $insert_elibility = "INSERT INTO eligibility_for_elementary_school_enrollment (lrn,credential_presented,name_of_school,school_id,address_of_school,pept_passer,rating,date_of_assessment,others,specify,name_and_address_testing_center,remarks,date_time_created,date_time_updated) VALUES ('$lrn' , '$new_credential','$eligibility_name_of_school', '$school_id' , '$address_of_school', '$pept_passer1', '$rating', '$date_of_assessment', '$others_checkbox1' ,'$others', '$name_and_address_testing_center' , '$eligibility_remarks', '$dateCreated' , '$dateUpdated')";

        $run_eligibility = mysqli_query($conn,$insert_elibility);

        //Phase1 Insert Scholastic Records

        $phase1_insert_scholastic_records = "INSERT INTO scholastic_records (lrn,school,school_id,district,division,region,classified_as_grade,section,school_year,name_of_teacher,signature,remarks,date_time_created,date_time_updated) VALUES ('$lrn' ,'$phase1_name_of_school', '$phase1_school_id' , '$phase1_district', '$phase1_division', '$phase1_region', '$phase1_classified_as_grade', '$phase1_section', '$phase1_school_year', '$phase1_name_of_school', '$phase1_signature', '$phase1_remarks', '$dateCreated', '$dateUpdated')";

        $phase1_run_scholastic_records = mysqli_query($conn,$phase1_insert_scholastic_records);
        if($phase1_run_scholastic_records){
            echo "added phase 1 scholastic records";
        }

      






        if($run_eligibility){
        echo "inserted eligibility" . '<br>';


              //insert term2 phase 1 grades MT
        $insert_student_grades_term2_phase1_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn', '$mother_tongue','$term1_phase2_mother_tongue', '$term2_phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')";

        $run_student_grades_term2_phase1_mother_tongue = mysqli_query($conn,$insert_student_grades_term2_phase1_mother_tongue);
        if($run_student_grades_term2_phase1_mother_tongue){
            echo "added insert_student_grades_term2_phase1_mother_tongue ";
        }else{
            echo "error insert_student_grades_term2_phase1_mother_tongue". $conn->error;
        }

        //insert term2 phase 1 Filipino
        $insert_student_grades_term2_phase1_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn', '$filipino','$term2_phase1_filipino', '$term2_phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')";

        $run_student_grades_term2_phase1_filipino = mysqli_query($conn,$insert_student_grades_term2_phase1_filipino);
        if($run_student_grades_term2_phase1_filipino){
            echo "added insert_student_grades_term2_phase1_filipino ";
        }else{
            echo "error insert_student_grades_term2_phase1_filipino". $conn->error;
        }

        //insert term2 phase 1 English
        $insert_student_grades_term2_phase1_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn', '$english','$term2_phase1_english', '$term2_phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')";

        $run_student_grades_term2_phase1_english = mysqli_query($conn,$insert_student_grades_term2_phase1_english);
        if($run_student_grades_term2_phase1_english){
            echo "added insert_student_grades_term2_phase1_english ";
        }else{
            echo "error insert_student_grades_term2_phase1_english". $conn->error;
        }

        //insert term2 phase 1 math
        $insert_student_grades_term2_phase1_mathematics = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn', '$math','$term2_phase1_mathematics', '$term2_phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')";

        $run_student_grades_term2_phase1_mathematics = mysqli_query($conn,$insert_student_grades_term2_phase1_mathematics);
        if($run_student_grades_term2_phase1_mathematics){
            echo "added insert_student_grades_term1_phase1_mathematics ";
        }else{
            echo "error insert_student_grades_term1_phase1_mathematics". $conn->error;
        }

        //insert term2 phase 1 science
        $insert_student_grades_term2_phase1_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn', '$science','$term2_phase1_science', '$term2_phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')";

        $run_student_grades_term2_phase1_science = mysqli_query($conn,$insert_student_grades_term2_phase1_science);
        if($run_student_grades_term2_phase1_science){
            echo "added insert_student_grades_term2_phase1_science ";
        }else{
            echo "error insert_student_grades_term2_phase1_science". $conn->error;
        }


        //insert term2 phase 1 AP
        $insert_student_grades_term2_phase1_AP = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn', '$AP','$term2_phase1_araling_panlipunan', '$term2_phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')";

        $run_student_grades_term2_phase1_AP = mysqli_query($conn,$insert_student_grades_term2_phase1_AP);
        if($run_student_grades_term2_phase1_AP){
            echo "added insert_student_grades_term2_phase1_AP ";
        }else{
            echo "error insert_student_grades_term2_phase1_AP". $conn->error;
        }


        //insert term2 phase 1 epp tle
        $insert_student_grades_term2_phase1_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn', '$epp_tle','$term2_phase1_epp_tle', '$term2_phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')";

        $run_student_grades_term2_phase1_epp_tle = mysqli_query($conn,$insert_student_grades_term2_phase1_epp_tle);
        if($run_student_grades_term2_phase1_epp_tle){
            echo "added insert_student_grades_term2_phase1_epp_tle ";
        }else{
            echo "error insert_student_grades_term2_phase1_epp_tle". $conn->error;
        }

        //insert term2 phase 1 mapeh
        $insert_term2_phase1_average_of_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn', '$mapeh','$term2_phase1_average_of_mapeh', '$term2_phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')";

        $run_student_grades_term2_phase1_mapeh = mysqli_query($conn,$run_student_grades_term2_phase1_mapeh);
        if($run_student_grades_term2_phase1_epp_tle){
            echo "added insert_term2_phase1_average_of_mapeh ";
        }else{
            echo "error insert_term2_phase1_average_of_mapeh". $conn->error;
        }

        
        //insert term2 phase 1 mapeh
        $insert_term2_phase1_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn', '$music','$term2_phase1_music', '$term2_phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')";

        $run_student_grades_term2_phase1_music = mysqli_query($conn,$insert_term2_phase1_music);
        if($run_student_grades_term2_phase1_music){
            echo "added insert_term2_phase1_music ";
        }else{
            echo "error insert_term2_phase1_music". $conn->error;
        }

        //insert term2 phase 1 arts
        $insert_term2_phase1_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn', '$arts','$term2_phase1_arts', '$term2_phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')";

        $run_student_grades_term2_phase1_arts = mysqli_query($conn,$insert_term2_phase1_arts);
        if($run_student_grades_term2_phase1_arts){
            echo "added insert_term2_phase1_arts ";
        }else{
            echo "error insert_term2_phase1_arts". $conn->error;
        }

        //insert term2 phase 1 PE
        $insert_term2_phase1_PE = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn', '$PE','$term2_phase1_pe', '$term2_phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')";

        $run_student_grades_term2_phase1_pe = mysqli_query($conn,$insert_term2_phase1_PE);
        if($run_student_grades_term2_phase1_pe){
            echo "added insert_term2_phase1_PE ";
        }else{
            echo "error insert_term2_phase1_PE". $conn->error;
        }
        
        ERROR TJ





            //insert ko sa FINAL RATINGS table PER SUBJECT mother tongue

            $insert_student_final_ratings_mt = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$mother_tongue','$phase1_final_rating_mother_tongue', '$term5', '$phase1', '$output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_mt = mysqli_query($conn,$insert_student_final_ratings_mt);

            if($run_student_final_ratings_mt){
                echo "added to student final ratings MT" . '<br>';
            }else{
                echo "Error student final ratings MT" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT Filipino

            $insert_student_final_ratings_filipino = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$filipino', '$phase1_final_rating_filipino','$term5', '$phase1', '$output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_filipino = mysqli_query($conn,$insert_student_final_ratings_filipino);

            if($run_student_final_ratings_filipino){
                echo "added to student final ratings filipino" . '<br>';
            }else{
                echo "Error student final ratings filipino" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT English

            $insert_student_final_ratings_english = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$english','$phase1_final_rating_english', '$term5', '$phase1', '$output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_english = mysqli_query($conn,$insert_student_final_ratings_english);

            if($run_student_final_ratings_english){
                echo "added to student final ratings english" . '<br>';
            }else{
                echo "Error student final ratings english" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT Math

            $insert_student_final_ratings_math = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$math','$phase1_final_rating_math', '$term5', '$phase1', '$output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_math = mysqli_query($conn,$insert_student_final_ratings_math);

            if($run_student_final_ratings_math){
                echo "added to student final ratings math" . '<br>';
            }else{
                echo "Error student final ratings math" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT Science

            $insert_student_final_ratings_science = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$science','$phase1_final_rating_science', '$term5', '$phase1', '$output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_science = mysqli_query($conn,$insert_student_final_ratings_science);

            if($run_student_final_ratings_science){
                echo "added to student final ratings math" . '<br>';
            }else{
                echo "Error student final ratings math" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT AP

            $insert_student_final_ratings_AP = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$AP','$phase1_final_rating_AP', '$term5', '$phase1', '$output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_AP = mysqli_query($conn,$insert_student_final_ratings_AP);

            if($run_student_final_ratings_AP){
                echo "added to student final ratings AP" . '<br>';
            }else{
                echo "Error student final ratings AP" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT EPP / TLE

            $insert_student_final_ratings_epp_tle = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$epp_tle','$phase1_final_rating_epp_tle', '$term5', '$phase1', '$output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_epp_tle = mysqli_query($conn,$insert_student_final_ratings_epp_tle);

            if($run_student_final_ratings_epp_tle){
                echo "added to student final ratings epp tle" . '<br>';
            }else{
                echo "Error student final ratings epp tle" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT MAPEH

            $insert_student_final_ratings_mapeh = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$mapeh','$phase1_final_rating_mapeh', '$term5', '$phase1', '$output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_mapeh = mysqli_query($conn,$insert_student_final_ratings_mapeh);

            if($run_student_final_ratings_mapeh){
                echo "added to student final ratings mapeh" . '<br>';
            }else{
                echo "Error student final ratings mapeh" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT music

            $insert_student_final_ratings_music = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$music','$phase1_final_rating_music', '$term5', '$phase1', '$output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_music = mysqli_query($conn,$insert_student_final_ratings_music);

            if($run_student_final_ratings_music){
                echo "added to student final ratings music" . '<br>';
            }else{
                echo "Error student final ratings music" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT arts

            $insert_student_final_ratings_arts = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$arts','$phase1_final_rating_arts', '$term5', '$phase1', '$output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_arts = mysqli_query($conn,$insert_student_final_ratings_arts);

            if($run_student_final_ratings_music){
                echo "added to student final ratings arts" . '<br>';
            }else{
                echo "Error student final ratings arts" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT pe

            $insert_student_final_ratings_pe = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$PE','$phase1_final_rating_PE', '$term5', '$phase1', '$output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_pe = mysqli_query($conn,$insert_student_final_ratings_pe);

            if($run_student_final_ratings_pe){
                echo "added to student final ratings PE" . '<br>';
            }else{
                echo "Error student final ratings PE" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT health

            $insert_student_final_ratings_health = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$health','$phase1_final_rating_health', '$term5', '$phase1', '$output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_health = mysqli_query($conn,$insert_student_final_ratings_health);

            if($run_student_final_ratings_pe){
                echo "added to student final ratings health" . '<br>';
            }else{
                echo "Error student final ratings health" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT ESP

            $insert_student_final_ratings_esp = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$esp', '$phase1_final_rating_esp','$term5', '$phase1', '$output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_esp = mysqli_query($conn,$insert_student_final_ratings_esp);

            if($run_student_final_ratings_pe){
                echo "added to student final ratings esp" . '<br>';
            }else{
                echo "Error student final ratings esp" . '<br>';
            }


            //insert ko sa FINAL RATINGS table PER SUBJECT arabic language

            $insert_student_final_ratings_arabic = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$arabic_language','$phase1_final_rating_arabic_language', '$term5', '$phase1', '$output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_arabic = mysqli_query($conn,$insert_student_final_ratings_arabic);

            if($run_student_final_ratings_arabic){
                echo "added to student final ratings arabic" . '<br>';
            }else{
                echo "Error student final ratings arabic" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT islamic values

            $insert_student_final_ratings_arabic = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$islamic_values','$phase1_final_rating_islamic_values', '$term5', '$phase1', '$output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_arabic = mysqli_query($conn,$insert_student_final_ratings_arabic);

            if($run_student_final_ratings_arabic){
                echo "added to student final ratings arabic" . '<br>';
            }else{
                echo "Error student final ratings arabic" . '<br>';
            }


            //insert student averages eto yung kinompute ko sa taas
            $insert_phase1_term1_general_average = "INSERT INTO student_general_averages(lrn,general_average,term,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn', '$phase1_term1_general_average', '$term1_phase1','$phase1_remarks','$dateCreated', '$dateUpdated')";
            $run_phase1_term1_student_averages = mysqli_query($conn,$insert_phase1_term1_general_average);

            if($run_phase1_term1_student_averages){
                echo "added student averages term1";
            }else{
                echo "error student_averages" . $conn->error;
            }
            
            $insert_phase1_term2_general_average = "INSERT INTO student_general_averages(lrn,general_average,term,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn','$phase1_term2_general_average', '$term1_phase1','$term1_phase1_remarks', '$dateCreated','$dateUpdated')";
            $run_phase1_term2_general_average = mysqli_query($conn,$insert_phase1_term2_general_average);

            if($run_phase1_term2_general_average){
                echo "added student averages term2";
            }else{
                echo "error student averages term2";
            }
            
            $insert_phase1_term3_general_average = "INSERT INTO student_general_averages(lrn,general_average,term,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn','$phase1_term3_general_average', '$term1_phase1','$term1_phase1_remarks', '$dateCreated','$dateUpdated')";

            $run_phase1_term3_general_average = mysqli_query($conn,$insert_phase1_term3_general_average);

            if($run_phase1_term3_general_average){
                echo "added student averages term3";
            }else{
                echo "added student averages term3";
            }

            $insert_phase1_term4_general_average = "INSERT INTO student_general_averages(lrn,general_average,term,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn','$phase1_term4_general_average', '$term1_phase1','$term1_phase1_remarks', '$dateCreated','$dateUpdated')";

            $run_phase1_term4_general_average = mysqli_query($conn,$insert_phase1_term4_general_average);

            if($run_phase1_term4_general_average){
                echo "added student averages term4";
            }else{
                echo "added student averages term4";
            }

            $insert_phase1_term5_general_average = "INSERT INTO student_general_averages(lrn,general_average,term,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn','$phase1_term5_general_average', '$term1_phase1','$term1_phase1_remarks', '$dateCreated','$dateUpdated')";

            $run_phase1_term5_general_average = mysqli_query($conn,$insert_phase1_term5_general_average);

            if($run_phase1_term5_general_average){
                echo "added student averages term4";
            }else{
                echo "added student averages term4";
            }







            //then retrieve kapag kinuha yung passed and failed na words

            //phase1 ng student grades term1

            
            $insert_student_grades_term1_phase1_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mother_tongue', '$term1_phase1_mother_tongue','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase1_mother_tongue = mysqli_query($conn,$insert_student_grades_term1_phase1_mother_tongue);

            if($run_student_grades_term1_phase1_mother_tongue){
                echo "added term1_phase1 MT  " . '<br>';

                

                $insert_student_grades_term1_phase1_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
                VALUES ('$lrn','$filipino', '$term1_phase1_filipino','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
                $run_student_grades_term1_phase1_filipino = mysqli_query($conn,$insert_student_grades_term1_phase1_filipino);

                if($run_student_grades_term1_phase1_filipino){
                    echo "added term1_phase1 Filipino" . '<br>';

                    $insert_student_grades_term1_phase1_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
                    VALUES ('$lrn','$english', '$term1_phase1_english','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
                    $run_student_grades_term1_phase1_english = mysqli_query($conn,$insert_student_grades_term1_phase1_english);

                    if($run_student_grades_term1_phase1_english){

                        echo "added term1_phase1 english" . '<br>';

                        $insert_student_grades_term1_phase1_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
                        VALUES ('$lrn','$math', '$term1_phase1_mathematics','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
                        $run_student_grades_term1_phase1_math = mysqli_query($conn,$insert_student_grades_term1_phase1_math);

                        if($run_student_grades_term1_phase1_math){
                            echo "added term1_phase1 english" . '<br>';

                            $insert_student_grades_term1_phase1_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
                            VALUES ('$lrn','$science', '$term1_phase1_science','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
                            $run_student_grades_term1_phase1_science = mysqli_query($conn,$insert_student_grades_term1_phase1_science);

                            if($run_student_grades_term1_phase1_science){
                                echo "added term1_phase1 science". '<br>';

                                $insert_student_grades_term1_phase1_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
                                VALUES ('$lrn','$AP', '$term1_phase1_araling_panlipunan','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
                                $run_student_grades_term1_phase1_ap = mysqli_query($conn,$insert_student_grades_term1_phase1_ap);

                                if($run_student_grades_term1_phase1_ap){
                                    echo "added term1_phase1 ap";

                                    $insert_student_grades_term1_phase1_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
                                    VALUES ('$lrn','$epp_tle', '$term1_phase1_epp_tle','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
                                    $run_student_grades_term1_phase1_epp_tle = mysqli_query($conn,$insert_student_grades_term1_phase1_epp_tle);

                                    if($run_student_grades_term1_phase1_epp_tle){
                                        echo  "added term epp tle";

                                        $insert_student_grades_term1_phase1_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
                                        VALUES ('$lrn','$mapeh', '$term1_phase1_average_of_mapeh','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
                                        $run_student_grades_term1_phase1_mapeh = mysqli_query($conn,$insert_student_grades_term1_phase1_mapeh);

                                        if($run_student_grades_term1_phase1_mapeh){
                                            echo  "added term mapeh";


                                            $insert_student_grades_term1_phase1_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
                                            VALUES ('$lrn','$music', '$term1_phase1_music','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
                                            $run_student_grades_term1_phase1_music = mysqli_query($conn,$insert_student_grades_term1_phase1_music);

                                            if($run_student_grades_term1_phase1_music){
                                                echo  "added term music" . '<br>';

                                                $insert_student_grades_term1_phase1_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
                                                VALUES ('$lrn','$arts', '$term1_phase1_arts','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
                                                $run_student_grades_term1_phase1_arts = mysqli_query($conn,$insert_student_grades_term1_phase1_arts);


                                                if($run_student_grades_term1_phase1_arts){
                                                    echo  "added term arts" . '<br>';


                                                    $insert_student_grades_term1_phase1_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
                                                    VALUES ('$lrn','$PE', '$term1_phase1_pe','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
                                                    $run_student_grades_term1_phase1_pe = mysqli_query($conn,$insert_student_grades_term1_phase1_pe);

                                                    if($run_student_grades_term1_phase1_pe){
                                                        echo  "added term PE" . '<br>';

                                                        $insert_student_grades_term1_phase1_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
                                                        VALUES ('$lrn','$health', '$term1_phase1_health','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
                                                        $run_student_grades_term1_phase1_health = mysqli_query($conn,$insert_student_grades_term1_phase1_health);

                                                        if($run_student_grades_term1_phase1_health){

                                                            echo  "added term health" . '<br>';

                                                            $insert_student_grades_term1_phase1_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
                                                            VALUES ('$lrn','$esp', '$term1_phase1_esp','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
                                                            $run_student_grades_term1_phase1_esp = mysqli_query($conn,$insert_student_grades_term1_phase1_esp);

                                                            if($run_student_grades_term1_phase1_esp){
                                                                echo  "added term esp" . '<br>';

                                                                $insert_student_grades_term1_phase1_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
                                                                VALUES ('$lrn','$arabic_language', '$term1_phase1_arabic_language','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
                                                                $run_student_grades_term1_phase1_arabic = mysqli_query($conn,$insert_student_grades_term1_phase1_arabic);

                                                                if($run_student_grades_term1_phase1_arabic){
                                                                    echo  "added term arabic" . '<br>';

                                                                    
                                                                    $insert_student_grades_term1_phase1_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
                                                                    VALUES ('$lrn','$islamic_values', '$term1_phase1_islamic_values','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
                                                                    $run_student_grades_term1_phase1_islamic = mysqli_query($conn,$insert_student_grades_term1_phase1_islamic);

                                                                    if($run_student_grades_term1_phase1_islamic){
                                                                    echo  "added term islamic" . '<br>';
                                                                        
                                                                    }else{
                                                                        echo "error term1_phase1 islamic" . '<br>';
                                                                    }
                                                                }


                                                                    
                                                            }else{
                                                                echo "error term1_phase1 esp " . '<br>' . $conn->error;
                                                                    
                                                            }

                                                            
                                                        }else{
                                                            echo "error term1_phase1 health " . '<br>' . $conn->error;

                                                        }
                                                        
                                                    }else{
                                                        echo "error term1_phase1 PE " . '<br>' . $conn->error;

                                                    }
    


                                                }else{
                                                    echo "error term1_phase1 arts " . '<br>' . $conn->error;
                                                    
                                                }

                                                
                                            }else{
                                                echo "error term1_phase1 music " . '<br>' . $conn->error;
                                                
                                            }


                                        }else{
                                            echo "error term1_phase1 mapeh " . '<br>' . $conn->error;
                                            
                                        }



                                    }else{
                                        echo "error term1_phase1 epp " . '<br>' . $conn->error;
                                        
                                    }


                                }else{
                                    echo "error term1_phase1 ap " . '<br>' . $conn->error;
                                }

                                
                            }else{
                                echo "error term1_phase1 science" . '<br>' . $conn->error;
                            }


                        }else{
                            echo "error term1_phase1 english" . '<br>';
                        }



                    }else{
                        echo "error term1_phase1 english " . '<br>';
                    };


                }else{
                    echo "error term1_phase1 filipino" . $conn->error;
                }
                
            }else{
                echo "error term1_phase1 MT" . $conn->error;
            }
        }else{
            echo "error eligibility" . $conn->error;
        }

        $_SESSION['lrn'] = $lrn;
        header("Location: ");
        exit();
    }else{
        echo "error learners" . $conn->error;
    }
}
}

ob_end_flush();
?>