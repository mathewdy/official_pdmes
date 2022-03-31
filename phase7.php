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

    <form action = "" method = "post">

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
    <h1>Phase 7</h1>
    <label for="">School: </label>
    <input type="text" name="phase7_name_of_school">

    <br>

    <label for="">School ID:</label>
    <input type="text" name="phase7_school_id">
    

    <br>
    <label for="">District: </label>
    <input type="text" name="phase7_district">

    <br>
    <label for="">Division: </label>
    <input type="text" name="phase7_division">

    <br>
    <label for="">Region:</label>
    <input type="text" name="phase7_region">

    <br>

    <label for="">Classified as Grade: </label>
    <input type="text" name="phase7_classified_as_grade">

    <br>

    <label for="">Section: </label>
    <input type="text" name="phase7_section">

    <br>

    <label for="">School Year: </label>
    <input type="text" name="phase7_school_year">

    <br>

    <label for="">Name of Teacher:</label>
    <input type="text" name="phase7_name_of_teacher">

    <br>

    <label for="">Signature:</label>
    <input type="text" name="phase7_signature" >

    

    <!---learning areas (subjects na ito)---->

    <h2>Learning Areas</h2>

    
    <h3>Quarter 1</h3>

    <label for="">Mother Tongue</label>
    <input type="text" name="term1_phase7_mother_tongue">

    <br>

    <label for="">Filipino</label>
    <input type="text" name="term1_phase7_filipino">

    <br>

    <label for="">English</label>
    <input type="text" name="term1_phase7_english">


    <br>
    <label for="">Mathematics</label>
    <input type="text" name="term1_phase7_mathematics">

    <br>
    <label for="">Science</label>
    <input type="text" name="term1_phase7_science">

    <br>
    <label for="">Araling Panlipunan</label>
    <input type="text" name="term1_phase7_araling_panlipunan">

    <br>
    <label for="">EPP / TLE</label>
    <input type="text" name="term1_phase7_epp_tle">

    <br>

    <label for="">MAPEH</label>
    <input type="text" name="term1_phase7_mapeh" readonly>

    <br>

    <label for="">Music</label>
    <input type="text" name="term1_phase7_music">

    <br>
    <label for="">Arts</label>
    <input type="text" name="term1_phase7_arts">

    <br>
    <label for="">Physical Education</label>
    <input type="text" name="term1_phase7_pe" id="">

    <br>
    <label for="">Health</label>
    <input type="text" name="term1_phase7_health">

    <br>
    <label for="">Eduk. sa Pagpapakatao</label>
    <input type="text" name="term1_phase7_esp">

    <br>
    <label for="">*Arabic Language</label>
    <input type="text" name="term1_phase7_arabic_language">


    <br>
    <label for="">*Islamic Values Education</label>
    <input type="text" name="term1_phase7_islamic_values">

    <br>

    <label for="">General Average</label>
    <input type="text" readonly>


    <!----term 2--->

    <h3>Quarter 2</h3>

    <label for="">Mother Tongue</label>
    <input type="text" name="term2_phase7_mother_tongue">

    <br>

    <label for="">Filipino</label>
    <input type="text" name="term2_phase7_filipino">

    <br>

    <label for="">English</label>
    <input type="text" name="term2_phase7_english">


    <br>
    <label for="">Mathematics</label>
    <input type="text" name="term2_phase7_mathematics">

    <br>
    <label for="">Science</label>
    <input type="text" name="term2_phase7_science">

    <br>
    <label for="">Araling Panlipunan</label>
    <input type="text" name="term2_phase7_araling_panlipunan">

    <br>
    <label for="">EPP / TLE</label>
    <input type="text" name="term2_phase7_epp_tle">

    <br>

    <label for="">MAPEH</label>
    <input type="text" name="term2_phase7_mapeh" readonly>

    <br>

    <label for="">Music</label>
    <input type="text" name="term2_phase7_music">

    <br>
    <label for="">Arts</label>
    <input type="text" name="term2_phase7_arts">

    <br>
    <label for="">Physical Education</label>
    <input type="text" name="term2_phase7_pe" id="">

    <br>
    <label for="">Health</label>
    <input type="text" name="term2_phase7_health">

    <br>
    <label for="">Eduk. sa Pagpapakatao</label>
    <input type="text" name="term2_phase7_esp">

    <br>
    <label for="">*Arabic Language</label>
    <input type="text" name="term2_phase7_arabic_language">


    <br>
    <label for="">*Islamic Values Education</label>
    <input type="text" name="term2_phase7_islamic_values">

    <br>

    <label for="">General Average</label>
    <input type="text" readonly>


    
    <h3>Quarter 3</h3>

    <label for="">Mother Tongue</label>
    <input type="text" name="term3_phase7_mother_tongue">

    <br>

    <label for="">Filipino</label>
    <input type="text" name="term3_phase7_filipino">

    <br>

    <label for="">English</label>
    <input type="text" name="term3_phase7_english">


    <br>
    <label for="">Mathematics</label>
    <input type="text" name="term3_phase7_mathematics">

    <br>
    <label for="">Science</label>
    <input type="text" name="term3_phase7_science">

    <br>
    <label for="">Araling Panlipunan</label>
    <input type="text" name="term3_phase7_araling_panlipunan">

    <br>
    <label for="">EPP / TLE</label>
    <input type="text" name="term3_phase7_epp_tle">

    <br>

    <label for="">MAPEH</label>
    <input type="text" name="term3_phase7_mapeh" readonly>

    <br>

    <label for="">Music</label>
    <input type="text" name="term3_phase7_music">

    <br>
    <label for="">Arts</label>
    <input type="text" name="term3_phase7_arts">

    <br>
    <label for="">Physical Education</label>
    <input type="text" name="term3_phase7_pe" id="">

    <br>
    <label for="">Health</label>
    <input type="text" name="term3_phase7_health">

    <br>
    <label for="">Eduk. sa Pagpapakatao</label>
    <input type="text" name="term3_phase7_esp">

    <br>
    <label for="">*Arabic Language</label>
    <input type="text" name="term3_phase7_arabic_language">


    <br>
    <label for="">*Islamic Values Education</label>
    <input type="text" name="term3_phase7_islamic_values">

    <br>

    <label for="">General Average</label>
    <input type="text" readonly>



    <h3>Quarter 4</h3>

    <label for="">Mother Tongue</label>
    <input type="text" name="term4_phase7_mother_tongue">

    <br>

    <label for="">Filipino</label>
    <input type="text" name="term4_phase7_filipino">

    <br>

    <label for="">English</label>
    <input type="text" name="term4_phase7_english">


    <br>
    <label for="">Mathematics</label>
    <input type="text" name="term4_phase7_mathematics">

    <br>
    <label for="">Science</label>
    <input type="text" name="term4_phase7_science">

    <br>
    <label for="">Araling Panlipunan</label>
    <input type="text" name="term4_phase7_araling_panlipunan">

    <br>
    <label for="">EPP / TLE</label>
    <input type="text" name="term4_phase7_epp_tle">

    <br>

    <label for="">MAPEH</label>
    <input type="text" name="term4_phase7_mapeh" readonly>

    <br>

    <label for="">Music</label>
    <input type="text" name="term4_phase7_music">

    <br>
    <label for="">Arts</label>
    <input type="text" name="term4_phase7_arts">

    <br>
    <label for="">Physical Education</label>
    <input type="text" name="term4_phase7_pe" id="">

    <br>
    <label for="">Health</label>
    <input type="text" name="term4_phase7_health">

    <br>
    <label for="">Eduk. sa Pagpapakatao</label>
    <input type="text" name="term4_phase7_esp">

    <br>
    <label for="">*Arabic Language</label>
    <input type="text" name="term4_phase7_arabic_language">


    <br>
    <label for="">*Islamic Values Education</label>
    <input type="text" name="term4_phase7_islamic_values">

    <br>
    <label for="">General Average</label>
    <input type="text" readonly>
    
    <br>
    <input type = "submit" name= "add" value = "submit">


    </form>
</body>
</html>



<?php
if(isset($_POST['add'])){

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


    $phase7 = 7;
    $phase7_name_of_school = $_POST['phase7_name_of_school'];
    $phase7_school_id = $_POST['phase7_school_id'];
    $phase7_district = $_POST['phase7_district'];
    $phase7_division = $_POST['phase7_division'];
    $phase7_region = $_POST['phase7_region'];
    $phase7_classified_as_grade = $_POST['phase7_classified_as_grade'];
    $phase7_section = $_POST['phase7_section'];
    $phase7_school_year = $_POST['phase7_school_year'];
    $phase7_name_of_teacher = $_POST['phase7_name_of_teacher'];
    $phase7_signature = $_POST['phase7_signature'];
    $phase7_remarks = 'none';

    //term1_phase7 grades
    $term1_phase7 = 1;
    $term1_phase7_mother_tongue = $_POST['term1_phase7_mother_tongue'];
    $term1_phase7_filipino = $_POST['term1_phase7_filipino'];
    $term1_phase7_english = $_POST['term1_phase7_english'];
    $term1_phase7_mathematics = $_POST['term1_phase7_mathematics'];
    $term1_phase7_science = $_POST['term1_phase7_science'];
    $term1_phase7_araling_panlipunan = $_POST['term1_phase7_araling_panlipunan'];
    $term1_phase7_epp_tle = $_POST['term1_phase7_epp_tle'];
    $term1_phase7_music = $_POST['term1_phase7_music'];
    $term1_phase7_arts = $_POST['term1_phase7_arts'];
    $term1_phase7_pe = $_POST['term1_phase7_pe'];
    $term1_phase7_health = $_POST['term1_phase7_health'];
    $term1_phase7_esp = $_POST['term1_phase7_esp'];
    $term1_phase7_arabic_language = $_POST['term1_phase7_arabic_language'];
    $term1_phase7_islamic_values = $_POST['term1_phase7_islamic_values'];
    $term1_phase7_remarks = 'none'; 

    //term2_phase7 grades
    //term2_phase7
    $term2_phase7 = 2;
    $term2_phase7_mother_tongue = $_POST['term2_phase7_mother_tongue'];
    $term2_phase7_filipino = $_POST['term2_phase7_filipino'];
    $term2_phase7_english = $_POST['term2_phase7_english'];
    $term2_phase7_mathematics = $_POST['term2_phase7_mathematics'];
    $term2_phase7_science = $_POST['term2_phase7_science'];
    $term2_phase7_araling_panlipunan = $_POST['term2_phase7_araling_panlipunan'];
    $term2_phase7_epp_tle = $_POST['term2_phase7_epp_tle'];

    $term2_phase7_music = $_POST['term2_phase7_music'];
    $term2_phase7_arts = $_POST['term2_phase7_arts'];
    $term2_phase7_pe = $_POST['term2_phase7_pe'];
    $term2_phase7_health = $_POST['term2_phase7_health'];
    $term2_phase7_esp = $_POST['term2_phase7_esp'];
    $term2_phase7_arabic_language = $_POST['term2_phase7_arabic_language'];
    $term2_phase7_islamic_values = $_POST['term2_phase7_islamic_values'];
    $term2_phase7_remarks = 'none'; 

    //term3_phase7
    //term3_phase7 grades

    $term3_phase7 = 3;
    $term3_phase7_mother_tongue = $_POST['term3_phase7_mother_tongue'];
    $term3_phase7_filipino = $_POST['term3_phase7_filipino'];
    $term3_phase7_english = $_POST['term3_phase7_english'];
    $term3_phase7_mathematics = $_POST['term3_phase7_mathematics'];
    $term3_phase7_science = $_POST['term3_phase7_science'];
    $term3_phase7_araling_panlipunan = $_POST['term3_phase7_araling_panlipunan'];
    $term3_phase7_epp_tle = $_POST['term3_phase7_epp_tle'];
    $term3_phase7_music = $_POST['term3_phase7_music'];
    $term3_phase7_arts = $_POST['term3_phase7_arts'];
    $term3_phase7_pe = $_POST['term3_phase7_pe'];
    $term3_phase7_health = $_POST['term3_phase7_health'];
    $term3_phase7_esp = $_POST['term3_phase7_esp'];
    $term3_phase7_arabic_language = $_POST['term3_phase7_arabic_language'];
    $term3_phase7_islamic_values = $_POST['term3_phase7_islamic_values'];
    $term3_phase7_remarks = 'none'; 

    //term4_phase7
    //term4_phase7 grades

    $term4_phase7 = 4;
    $term4_phase7_mother_tongue = $_POST['term4_phase7_mother_tongue'];
    $term4_phase7_filipino = $_POST['term4_phase7_filipino'];
    $term4_phase7_english = $_POST['term4_phase7_english'];
    $term4_phase7_mathematics = $_POST['term4_phase7_mathematics'];
    $term4_phase7_science = $_POST['term4_phase7_science'];
    $term4_phase7_araling_panlipunan = $_POST['term4_phase7_araling_panlipunan'];
    $term4_phase7_epp_tle = $_POST['term4_phase7_epp_tle'];
    $term4_phase7_music = $_POST['term4_phase7_music'];
    $term4_phase7_arts = $_POST['term4_phase7_arts'];
    $term4_phase7_pe = $_POST['term2_phase7_pe'];
    $term4_phase7_health = $_POST['term4_phase7_health'];
    $term4_phase7_esp = $_POST['term4_phase7_esp'];
    $term4_phase7_arabic_language = $_POST['term4_phase7_arabic_language'];
    $term4_phase7_islamic_values = $_POST['term4_phase7_islamic_values'];
    $term4_phase7_remarks = 'none';


    $term1_phase7_average_of_mapeh = round(($term1_phase7_music + $term1_phase7_arts + $term1_phase7_pe + $term1_phase7_health) / 4) ;

    $term2_phase7_average_of_mapeh = round(($term2_phase7_music + $term2_phase7_arts + $term2_phase7_pe + $term2_phase7_health) / 4) ;

    $term3_phase7_average_of_mapeh = round(($term3_phase7_music + $term3_phase7_arts + $term3_phase7_pe + $term3_phase7_health) / 4) ;

    $term4_phase7_average_of_mapeh = round(($term4_phase7_music + $term4_phase7_arts + $term4_phase7_pe + $term4_phase7_health) / 4) ;



    $phase7_term5 = 'Final Rating7';
  

    $phase7_final_rating_mother_tongue = round(($term1_phase7_mother_tongue + $term2_phase7_mother_tongue + 
    $term3_phase7_mother_tongue + $term4_phase7_mother_tongue) / 4);

    $phase7_final_rating_filipino = round(($term1_phase7_filipino + $term2_phase7_filipino + $term3_phase7_filipino + $term4_phase7_filipino) / 4);

    $phase7_final_rating_english = round(($term1_phase7_english + $term2_phase7_english + $term3_phase7_english + $term4_phase7_english) / 4);

    $phase7_final_rating_math = round(($term1_phase7_mathematics + $term2_phase7_mathematics + $term3_phase7_mathematics + $term4_phase7_mathematics ) / 4);

    $phase7_final_rating_science = round(($term1_phase7_science + $term2_phase7_science + $term3_phase7_science + $term4_phase7_science) / 4);

    $phase7_final_rating_AP = round(($term1_phase7_araling_panlipunan + $term2_phase7_araling_panlipunan + $term3_phase7_araling_panlipunan + $term4_phase7_araling_panlipunan) / 4);

    $phase7_final_rating_epp_tle = round(($term1_phase7_epp_tle + $term2_phase7_epp_tle + $term3_phase7_epp_tle + $term4_phase7_epp_tle) / 4);

    $phase7_final_rating_mapeh = round(($term1_phase7_average_of_mapeh + $term2_phase7_average_of_mapeh + $term3_phase7_average_of_mapeh + $term4_phase7_average_of_mapeh) / 4 );

    $phase7_final_rating_music = round(($term1_phase7_music + $term2_phase7_music + $term3_phase7_music + $term4_phase7_music) / 4);

    $phase7_final_rating_arts = round(($term1_phase7_arts + $term2_phase7_arts + $term3_phase7_arts + $term4_phase7_arts ) / 4);

    $phase7_final_rating_PE = round(($term1_phase7_pe + $term2_phase7_pe + $term3_phase7_pe + $term4_phase7_pe) / 4);

    $phase7_final_rating_health = round(($term1_phase7_health + $term2_phase7_health + $term3_phase7_health + $term4_phase7_health)/ 4);

    $phase7_final_rating_esp = round(($term1_phase7_esp + $term2_phase7_esp + $term3_phase7_esp + $term4_phase7_esp) / 4);
    
    $phase7_final_rating_arabic_language = round(($term1_phase7_arabic_language + $term2_phase7_arabic_language + $term3_phase7_arabic_language + $term4_phase7_arabic_language) / 4);

    $phase7_final_rating_islamic_values = round(($term1_phase7_islamic_values + $term2_phase7_islamic_values + $term3_phase7_islamic_values + $term4_phase7_islamic_values) / 4);

    if($phase7_final_rating_mother_tongue >= 75){
        $phase7_final_rating_mother_tongue_output = 'PASSED';
    }else{
        $phase7_final_rating_mother_tongue_output = 'FAILED';
    }
    
    if($phase7_final_rating_filipino >= 75){
        $phase7_final_rating_filipino_output = 'PASSED';
    }else{
        $phase7_final_rating_filipino_output ='FAILED';
    }
    
    if($phase7_final_rating_english >= 75){
        $phase7_final_rating_english_output ='PASSED';
    }else{
        $phase7_final_rating_english_output = 'FAILED';
    }
    
    if($phase7_final_rating_math >= 75){
        $phase7_final_rating_math_output = 'PASSED';
    }else{
        $phase7_final_rating_math_output =  'FAILED';
    }
    
    if($phase7_final_rating_science >= 75){
        $phase7_final_rating_science_output = 'PASSED';
    }else{
        $phase7_final_rating_science_output = 'FAILED';
    }
    
    if($phase7_final_rating_AP >= 75){
        $phase7_final_rating_AP_output = 'PASSED';
    }else{
        $phase7_final_rating_AP_output = 'FAILED';
    }
    
    if($phase7_final_rating_epp_tle >= 75){
        $phase7_final_rating_epp_tle_output = 'PASSED';
    }else{
        $phase7_final_rating_epp_tle_output = 'FAILED';
    }
    
    if($phase7_final_rating_mapeh >= 75){
        $phase7_final_rating_mapeh_output = 'PASSED';
    }else{
        $phase7_final_rating_mapeh_output = 'FAILED';
    }
    
    if($phase7_final_rating_music >= 75){
        $phase7_final_rating_music_output = 'PASSED';
    }else{
        $phase7_final_rating_music_output = 'FAILED';
    }
    
    if($phase7_final_rating_arts >= 75){
        $phase7_final_rating_arts_output = 'PASSED';
    }else{
        $phase7_final_rating_arts_output = 'FAILED';
    }
    
    if($phase7_final_rating_PE >= 75){
        $phase7_final_rating_PE_output = 'PASSED';
    }else{
        $phase7_final_rating_PE_output ='FAILED';
    }
    
    if($phase7_final_rating_health >= 75){
        $phase7_final_rating_health_output = 'PASSED';
    }else{
        $phase7_final_rating_health_output = 'FAILED';
    }
    
    if($phase7_final_rating_esp >= 75){
        $phase7_final_rating_esp_output = 'PASSED';
    }else{
        $phase7_final_rating_esp_output = 'FAILED';
    }
    
    if($phase7_final_rating_arabic_language >= 75){
        $phase7_final_rating_arabic_language_output = 'PASSED';
    }else{
        $phase7_final_rating_arabic_language_output = 'FAILED';
    }
    
    if($phase7_final_rating_islamic_values >= 75){
        $phase7_final_rating_islamic_values_output = 'PASSED';
    }else{
        $phase7_final_rating_islamic_values_output = 'FAILED';
    }

    $phase7_term1_general_average = round(($term1_phase7_mother_tongue + $term1_phase7_mathematics + $term1_phase7_araling_panlipunan + $term1_phase7_average_of_mapeh + $term1_phase7_esp ) / 5);

    $phase7_term2_general_average = round(($term2_phase7_mother_tongue + $term2_phase7_filipino + $term2_phase7_mathematics + $term2_phase7_araling_panlipunan + $term2_phase7_average_of_mapeh + $term2_phase7_esp) / 6);

    $phase7_term3_general_average = round(($term3_phase7_mother_tongue + $term3_phase7_filipino + $term3_phase7_english + $term3_phase7_mathematics + $term3_phase7_araling_panlipunan + $term3_phase7_average_of_mapeh + $term3_phase7_esp) / 7);

    $phase7_term4_general_average = round(($term4_phase7_mother_tongue + $term4_phase7_filipino + $term4_phase7_english + $term4_phase7_mathematics + $term4_phase7_araling_panlipunan + $term4_phase7_average_of_mapeh + $term4_phase7_esp) / 7);

    $phase7_term5_general_average = round(($phase7_final_rating_mother_tongue + $phase7_final_rating_filipino + $phase7_final_rating_english + $phase7_final_rating_math + $phase7_final_rating_science + $phase7_final_rating_AP + $phase7_final_rating_epp_tle + $phase7_final_rating_mapeh + $phase7_final_rating_esp) / 9);


    $insert_learners_info = "INSERT INTO learners_personal_infos (lrn,last_name,first_name,middle_name,suffix,birth_date,sex,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn' , '$last_name' , '$first_name' ,'$middle_name', '$suffix' , '$birth_date' , '$sex','$remarks', '$dateCreated', '$dateUpdated')
    ";




    $run_insert_learners_info = mysqli_query($conn,$insert_learners_info);

        echo "inserted leanrer" . '<br>';


        //Phase2 Insert Scholastic Records

        $phase7_insert_scholastic_records = "INSERT INTO scholastic_records (lrn,school,school_id,district,division,region,classified_as_grade,section,school_year,name_of_teacher,signature,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn' ,'$phase7_name_of_school', '$phase7_school_id' , '$phase7_district', '$phase7_division', '$phase7_region', '$phase7_classified_as_grade', '$phase7_section', '$phase7_school_year', '$phase7_name_of_school', '$phase7_signature', '$phase7','$phase7_remarks', '$dateCreated', '$dateUpdated')";

        $phase7_run_scholastic_records = mysqli_query($conn,$phase7_insert_scholastic_records);
        if($phase7_run_scholastic_records){

            //inserting of students grades


            $insert_student_grades_term1_phase7_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mother_tongue', '$term1_phase7_mother_tongue','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase7_mother_tongue = mysqli_query($conn,$insert_student_grades_term1_phase7_mother_tongue);
            
            if($insert_student_grades_term1_phase7_mother_tongue){
                echo"term1 mothertongue";
            }

            else{
                $conn->error;;
            }

            $insert_student_grades_term1_phase7_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$filipino', '$term1_phase7_filipino','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase7_filipino = mysqli_query($conn,$insert_student_grades_term1_phase7_filipino);
            
            if($insert_student_grades_term1_phase7_filipino){
                echo"term1 Filipino";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term1_phase7_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$english', '$term1_phase7_english','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase7_english = mysqli_query($conn,$insert_student_grades_term1_phase7_english);
            
            if($insert_student_grades_term1_phase7_english){
                echo"term1 english";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term1_phase7_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$math', '$term1_phase7_mathematics','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
              $run_student_grades_term1_phase7_math = mysqli_query($conn,$insert_student_grades_term1_phase7_math);
            
            if($insert_student_grades_term1_phase7_math){
                echo"term1 math";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term1_phase7_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$science', '$term1_phase7_science','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
              $run_student_grades_term1_phase7_science = mysqli_query($conn,$insert_student_grades_term1_phase7_science);
            
            if($insert_student_grades_term1_phase7_science){
                echo"term1 science";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term1_phase7_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
              VALUES ('$lrn','$AP', '$term1_phase7_araling_panlipunan','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
                $run_student_grades_term1_phase7_ap = mysqli_query($conn,$insert_student_grades_term1_phase7_ap);
            
            if($insert_student_grades_term1_phase7_ap){
                echo"term1 Araling panlipunan";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term1_phase7_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$epp_tle', '$term1_phase7_epp_tle','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase7_epp_tle = mysqli_query($conn,$insert_student_grades_term1_phase7_epp_tle);
            
            if($insert_student_grades_term1_phase7_epp_tle){
                echo"term1 EPP_TLE";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term1_phase7_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mapeh', '$term1_phase7_average_of_mapeh','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase7_mapeh = mysqli_query($conn,$insert_student_grades_term1_phase7_mapeh);

              if($run_student_grades_term1_phase7_mapeh){
                echo  "added term mapeh";
              }
                else{
                    $conn->error;
                }

            $insert_student_grades_term1_phase7_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$music', '$term1_phase7_music','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase7_music = mysqli_query($conn,$insert_student_grades_term1_phase7_music);

               if($run_student_grades_term1_phase7_music){
                   echo  "added term music" . '<br>';
               }
                   else{
                    $conn->error;
                }
            $insert_student_grades_term1_phase7_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arts', '$term1_phase7_arts','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase7_arts = mysqli_query($conn,$insert_student_grades_term1_phase7_arts);


                if($run_student_grades_term1_phase7_arts){
                    echo  "added term arts" . '<br>';
                }

                    else{
                        $conn->error;
                    }
            $insert_student_grades_term1_phase7_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$PE', '$term1_phase7_pe','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase7_pe = mysqli_query($conn,$insert_student_grades_term1_phase7_pe);

                if($run_student_grades_term1_phase7_pe){
                    echo  "added term PE" . '<br>';
                }
                   
                    else{
                        $conn->error;
                    }

            $insert_student_grades_term1_phase7_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$health', '$term1_phase7_health','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase7_health = mysqli_query($conn,$insert_student_grades_term1_phase7_health);

                 if($run_student_grades_term1_phase7_health){

                     echo  "added term health" . '<br>';
                 }
                    
                     else{
                        $conn->error;
                    }

            $insert_student_grades_term1_phase7_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$esp', '$term1_phase7_esp','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase7_esp = mysqli_query($conn,$insert_student_grades_term1_phase7_esp);

                if($run_student_grades_term1_phase7_esp){
                    echo  "added term esp" . '<br>';
                }
                    else{
                        $conn->error;
                    }

            $insert_student_grades_term1_phase7_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arabic_language', '$term1_phase7_arabic_language','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase7_arabic = mysqli_query($conn,$insert_student_grades_term1_phase7_arabic);

            if($run_student_grades_term1_phase7_arabic){
                 echo  "added term arabic" . '<br>';
            }   
                
                 else{
                    $conn->error;
                }

            $insert_student_grades_term1_phase7_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$islamic_values', '$term1_phase7_islamic_values','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase7_islamic = mysqli_query($conn,$insert_student_grades_term1_phase7_islamic);

            if($run_student_grades_term1_phase7_islamic){
                 echo  "added term islamic" . '<br>';
                                                                        
             }
             
             else{
                  echo "error term1_phase7 islamic" . '<br>';
                }
                    //general average
                $insert_phase7_term1_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
                VALUES ('$lrn','$phase7_term1_general_average','$term1_phase7','$phase7','$phase7_remarks','$dateCreated','$dateUpdated');";
                $run_phase7_term1_student_averages = mysqli_query($conn,$insert_phase7_term1_general_average);
    
                if($run_phase7_term1_student_averages){
                    echo "added student averages term1";
                
                    
                }else{
                    echo "error student_averages" . $conn->error;
                }


                //  phase 1 term 2 


                $insert_student_grades_term2_phase7_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mother_tongue', '$term2_phase7_mother_tongue','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase7_mother_tongue = mysqli_query($conn,$insert_student_grades_term2_phase7_mother_tongue);
            
            if($insert_student_grades_term2_phase7_mother_tongue){
                echo"term2 mothertongue";
            }

            else{
                $conn->error;;
            }

            $insert_student_grades_term2_phase7_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$filipino', '$term2_phase7_filipino','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase7_filipino = mysqli_query($conn,$insert_student_grades_term2_phase7_filipino);
            
            if($insert_student_grades_term2_phase7_filipino){
                echo"term2 Filipino";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term2_phase7_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$english', '$term2_phase7_english','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase7_english = mysqli_query($conn,$insert_student_grades_term2_phase7_english);
            
            if($insert_student_grades_term2_phase7_english){
                echo"term2 english";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term2_phase7_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$math', '$term2_phase7_mathematics','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
              $run_student_grades_term2_phase7_math = mysqli_query($conn,$insert_student_grades_term2_phase7_math);
            
            if($insert_student_grades_term2_phase7_math){
                echo"term2 math";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term2_phase7_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$science', '$term2_phase7_science','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
              $run_student_grades_term2_phase7_science = mysqli_query($conn,$insert_student_grades_term2_phase7_science);
            
            if($insert_student_grades_term2_phase7_science){
                echo"term2 science";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term2_phase7_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
              VALUES ('$lrn','$AP', '$term2_phase7_araling_panlipunan','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
                $run_student_grades_term2_phase7_ap = mysqli_query($conn,$insert_student_grades_term2_phase7_ap);
            
            if($insert_student_grades_term2_phase7_ap){
                echo"term2 Araling panlipunan";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term2_phase7_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$epp_tle', '$term2_phase7_epp_tle','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase7_epp_tle = mysqli_query($conn,$insert_student_grades_term2_phase7_epp_tle);
            
            if($insert_student_grades_term2_phase7_epp_tle){
                echo"term2 EPP_TLE";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term2_phase7_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mapeh', '$term2_phase7_average_of_mapeh','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase7_mapeh = mysqli_query($conn,$insert_student_grades_term2_phase7_mapeh);

              if($run_student_grades_term2_phase7_mapeh){
                echo  "added term mapeh";
              }
                else{
                    $conn->error;
                }

            $insert_student_grades_term2_phase7_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$music', '$term2_phase7_music','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase7_music = mysqli_query($conn,$insert_student_grades_term2_phase7_music);

               if($run_student_grades_term2_phase7_music){
                   echo  "added term music" . '<br>';
               }
                   else{
                    $conn->error;
                }
            $insert_student_grades_term2_phase7_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arts', '$term2_phase7_arts','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase7_arts = mysqli_query($conn,$insert_student_grades_term2_phase7_arts);


                if($run_student_grades_term2_phase7_arts){
                    echo  "added term arts" . '<br>';
                }

                    else{
                        $conn->error;
                    }
            $insert_student_grades_term2_phase7_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$PE', '$term2_phase7_pe','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase7_pe = mysqli_query($conn,$insert_student_grades_term2_phase7_pe);

                if($run_student_grades_term2_phase7_pe){
                    echo  "added term PE" . '<br>';
                }
                   
                    else{
                        $conn->error;
                    }

            $insert_student_grades_term2_phase7_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$health', '$term2_phase7_health','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase7_health = mysqli_query($conn,$insert_student_grades_term2_phase7_health);

                 if($run_student_grades_term2_phase7_health){

                     echo  "added term health" . '<br>';
                 }
                    
                     else{
                        $conn->error;
                    }

            $insert_student_grades_term2_phase7_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$esp', '$term2_phase7_esp','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase7_esp = mysqli_query($conn,$insert_student_grades_term2_phase7_esp);

                if($run_student_grades_term2_phase7_esp){
                    echo  "added term esp" . '<br>';
                }
                    else{
                        $conn->error;
                    }

            $insert_student_grades_term2_phase7_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arabic_language', '$term2_phase7_arabic_language','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase7_arabic = mysqli_query($conn,$insert_student_grades_term2_phase7_arabic);

            if($run_student_grades_term2_phase7_arabic){
                 echo  "added term arabic" . '<br>';
            }   
                
                 else{
                    $conn->error;
                }

            $insert_student_grades_term2_phase7_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$islamic_values', '$term2_phase7_islamic_values','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase7_islamic = mysqli_query($conn,$insert_student_grades_term2_phase7_islamic);

            if($run_student_grades_term2_phase7_islamic){
                 echo  "added term islamic" . '<br>';
                                                                        
             }
             
             else{
                  echo "error term2_phase7 islamic" . '<br>';
                }



        
                    // general average of term 2

                    $insert_phase7_term2_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
                VALUES ('$lrn','$phase7_term2_general_average','$term2_phase7','$phase7',' $term2_phase7_remarks','$dateCreated','$dateUpdated');";
                $run_phase7_term2_student_averages = mysqli_query($conn,$insert_phase7_term2_general_average);
    
                if($run_phase7_term2_student_averages){
                    echo "added student averages term1";
                    
                }else{
                    echo "error student_averages" . $conn->error;
                }



                //phase 1 term 3 

                $insert_student_grades_term3_phase7_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mother_tongue', '$term3_phase7_mother_tongue','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase7_mother_tongue = mysqli_query($conn,$insert_student_grades_term3_phase7_mother_tongue);
            
            if($insert_student_grades_term3_phase7_mother_tongue){
                echo"term3 mothertongue";
            }

            else{
                $conn->error;;
            }

            $insert_student_grades_term3_phase7_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$filipino', '$term3_phase7_filipino','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase7_filipino = mysqli_query($conn,$insert_student_grades_term3_phase7_filipino);
            
            if($insert_student_grades_term3_phase7_filipino){
                echo"term3 Filipino";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term3_phase7_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$english', '$term3_phase7_english','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase7_english = mysqli_query($conn,$insert_student_grades_term3_phase7_english);
            
            if($insert_student_grades_term3_phase7_english){
                echo"term3 english";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term3_phase7_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$math', '$term3_phase7_mathematics','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
              $run_student_grades_term3_phase7_math = mysqli_query($conn,$insert_student_grades_term3_phase7_math);
            
            if($insert_student_grades_term3_phase7_math){
                echo"term3 math";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term3_phase7_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$science', '$term3_phase7_science','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
              $run_student_grades_term3_phase7_science = mysqli_query($conn,$insert_student_grades_term3_phase7_science);
            
            if($insert_student_grades_term3_phase7_science){
                echo"term3 science";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term3_phase7_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
              VALUES ('$lrn','$AP', '$term3_phase7_araling_panlipunan','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
                $run_student_grades_term3_phase7_ap = mysqli_query($conn,$insert_student_grades_term3_phase7_ap);
            
            if($insert_student_grades_term3_phase7_ap){
                echo"term3 Araling panlipunan";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term3_phase7_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$epp_tle', '$term3_phase7_epp_tle','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase7_epp_tle = mysqli_query($conn,$insert_student_grades_term3_phase7_epp_tle);
            
            if($insert_student_grades_term3_phase7_epp_tle){
                echo"term3 EPP_TLE";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term3_phase7_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mapeh', '$term3_phase7_average_of_mapeh','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase7_mapeh = mysqli_query($conn,$insert_student_grades_term3_phase7_mapeh);

              if($run_student_grades_term3_phase7_mapeh){
                echo  "added term mapeh";
              }
                else{
                    $conn->error;
                }

            $insert_student_grades_term3_phase7_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$music', '$term3_phase7_music','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase7_music = mysqli_query($conn,$insert_student_grades_term3_phase7_music);

               if($run_student_grades_term3_phase7_music){
                   echo  "added term music" . '<br>';
               }
                   else{
                    $conn->error;
                }
            $insert_student_grades_term3_phase7_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arts', '$term3_phase7_arts','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase7_arts = mysqli_query($conn,$insert_student_grades_term3_phase7_arts);


                if($run_student_grades_term3_phase7_arts){
                    echo  "added term arts" . '<br>';
                }

                    else{
                        $conn->error;
                    }
            $insert_student_grades_term3_phase7_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$PE', '$term3_phase7_pe','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase7_pe = mysqli_query($conn,$insert_student_grades_term3_phase7_pe);

                if($run_student_grades_term3_phase7_pe){
                    echo  "added term PE" . '<br>';
                }
                   
                    else{
                        $conn->error;
                    }

            $insert_student_grades_term3_phase7_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$health', '$term3_phase7_health','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase7_health = mysqli_query($conn,$insert_student_grades_term3_phase7_health);

                 if($run_student_grades_term3_phase7_health){

                     echo  "added term health" . '<br>';
                 }
                    
                     else{
                        $conn->error;
                    }

            $insert_student_grades_term3_phase7_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$esp', '$term3_phase7_esp','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase7_esp = mysqli_query($conn,$insert_student_grades_term3_phase7_esp);

                if($run_student_grades_term3_phase7_esp){
                    echo  "added term esp" . '<br>';
                }
                    else{
                        $conn->error;
                    }

            $insert_student_grades_term3_phase7_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arabic_language', '$term3_phase7_arabic_language','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase7_arabic = mysqli_query($conn,$insert_student_grades_term3_phase7_arabic);

            if($run_student_grades_term3_phase7_arabic){
                 echo  "added term arabic" . '<br>';
            }   
                
                 else{
                    $conn->error;
                }

            $insert_student_grades_term3_phase7_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$islamic_values', '$term3_phase7_islamic_values','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase7_islamic = mysqli_query($conn,$insert_student_grades_term3_phase7_islamic);

            if($run_student_grades_term3_phase7_islamic){
                 echo  "added term islamic" . '<br>';
                                                                        
             }
             
             else{
                  echo "error term3_phase7 islamic" . '<br>';
                }



        
                    // general average of term 3

                    $insert_phase7_term3_general_average = "INSERT INTO student_general_averages (`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
                VALUES ('$lrn','$phase7_term3_general_average','$term3_phase7','$phase7',' $term3_phase7_remarks','$dateCreated','$dateUpdated');";
                $run_phase7_term3_student_averages = mysqli_query($conn,$insert_phase7_term3_general_average);
    
                if($run_phase7_term3_student_averages){
                    echo "added student averages term1";
                   
                }else{
                    echo "error student_averages" . $conn->error;
                }
                


                // phase 1 term 4 



                $insert_student_grades_term4_phase7_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mother_tongue', '$term4_phase7_mother_tongue','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase7_mother_tongue = mysqli_query($conn,$insert_student_grades_term4_phase7_mother_tongue);
            
            if($insert_student_grades_term4_phase7_mother_tongue){
                echo"term4 mothertongue";
            }

            else{
                $conn->error;;
            }

            $insert_student_grades_term4_phase7_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$filipino', '$term4_phase7_filipino','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase7_filipino = mysqli_query($conn,$insert_student_grades_term4_phase7_filipino);
            
            if($insert_student_grades_term4_phase7_filipino){
                echo"term4 Filipino";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term4_phase7_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$english', '$term4_phase7_english','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase7_english = mysqli_query($conn,$insert_student_grades_term4_phase7_english);
            
            if($insert_student_grades_term4_phase7_english){
                echo"term4 english";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term4_phase7_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$math', '$term4_phase7_mathematics','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
              $run_student_grades_term4_phase7_math = mysqli_query($conn,$insert_student_grades_term4_phase7_math);
            
            if($insert_student_grades_term4_phase7_math){
                echo"term4 math";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term4_phase7_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$science', '$term4_phase7_science','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
              $run_student_grades_term4_phase7_science = mysqli_query($conn,$insert_student_grades_term4_phase7_science);
            
            if($insert_student_grades_term4_phase7_science){
                echo"term4 science";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term4_phase7_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
              VALUES ('$lrn','$AP', '$term4_phase7_araling_panlipunan','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
                $run_student_grades_term4_phase7_ap = mysqli_query($conn,$insert_student_grades_term4_phase7_ap);
            
            if($insert_student_grades_term4_phase7_ap){
                echo"term4 Araling panlipunan";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term4_phase7_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$epp_tle', '$term4_phase7_epp_tle','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase7_epp_tle = mysqli_query($conn,$insert_student_grades_term4_phase7_epp_tle);
            
            if($insert_student_grades_term4_phase7_epp_tle){
                echo"term4 EPP_TLE";
            }

            else{
                $conn->error;
            }

            $insert_student_grades_term4_phase7_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mapeh', '$term4_phase7_average_of_mapeh','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase7_mapeh = mysqli_query($conn,$insert_student_grades_term4_phase7_mapeh);

              if($run_student_grades_term4_phase7_mapeh){
                echo  "added term mapeh";
              }
                else{
                    $conn->error;
                }

            $insert_student_grades_term4_phase7_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$music', '$term4_phase7_music','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase7_music = mysqli_query($conn,$insert_student_grades_term4_phase7_music);

               if($run_student_grades_term4_phase7_music){
                   echo  "added term music" . '<br>';
               }
                   else{
                    $conn->error;
                }
            $insert_student_grades_term4_phase7_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arts', '$term4_phase7_arts','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase7_arts = mysqli_query($conn,$insert_student_grades_term4_phase7_arts);


                if($run_student_grades_term4_phase7_arts){
                    echo  "added term arts" . '<br>';
                }

                    else{
                        $conn->error;
                    }
            $insert_student_grades_term4_phase7_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$PE', '$term4_phase7_pe','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase7_pe = mysqli_query($conn,$insert_student_grades_term4_phase7_pe);

                if($run_student_grades_term4_phase7_pe){
                    echo  "added term PE" . '<br>';
                }
                   
                    else{
                        $conn->error;
                    }

            $insert_student_grades_term4_phase7_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$health', '$term4_phase7_health','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase7_health = mysqli_query($conn,$insert_student_grades_term4_phase7_health);

                 if($run_student_grades_term4_phase7_health){

                     echo  "added term health" . '<br>';
                 }
                    
                     else{
                        $conn->error;
                    }

            $insert_student_grades_term4_phase7_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$esp', '$term4_phase7_esp','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase7_esp = mysqli_query($conn,$insert_student_grades_term4_phase7_esp);

                if($run_student_grades_term4_phase7_esp){
                    echo  "added term esp" . '<br>';
                }
                    else{
                        $conn->error;
                    }

            $insert_student_grades_term4_phase7_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arabic_language', '$term4_phase7_arabic_language','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase7_arabic = mysqli_query($conn,$insert_student_grades_term4_phase7_arabic);

            if($run_student_grades_term4_phase7_arabic){
                 echo  "added term arabic" . '<br>';
            }   
                
                 else{
                    $conn->error;
                }

            $insert_student_grades_term4_phase7_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn',' $islamic_values', '$term4_phase7_islamic_values','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase7_islamic = mysqli_query($conn,$insert_student_grades_term4_phase7_islamic);

            if($run_student_grades_term4_phase7_islamic){
                 echo  "added term islamic" . '<br>';
                                                                        
             }
             
             else{
                  echo "error term4_phase7 islamic" . '<br>';
                }



        
                    // general average of term 4

                    $insert_phase7_term4_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
                VALUES ('$lrn','$phase7_term4_general_average','$term4_phase7','$phase7',' $term4_phase7_remarks','$dateCreated','$dateUpdated');";
                $run_phase7_term4_student_averages = mysqli_query($conn,$insert_phase7_term4_general_average);
    
                if($run_phase7_term4_student_averages){
                    echo "added student averages term1";
                    
                }else{
                    echo "error student_averages" . $conn->error;
                }



                $insert_student_final_ratings_mt = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$mother_tongue','$phase7_final_rating_mother_tongue', '$phase7_term5', '$phase7', '$phase7_final_rating_mother_tongue_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_mt = mysqli_query($conn,$insert_student_final_ratings_mt);

            if($run_student_final_ratings_mt){
                echo "added to student final ratings MT" . '<br>';
            }else{
                echo "Error student final ratings MT" . '<br>';
            }


            $insert_student_final_ratings_filipino = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$filipino', '$phase7_final_rating_filipino','$phase7_term5', '$phase7', '$phase7_final_rating_filipino_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_filipino = mysqli_query($conn,$insert_student_final_ratings_filipino);

            if($run_student_final_ratings_filipino){
                echo "added to student final ratings filipino" . '<br>';
            }else{
                echo "Error student final ratings filipino" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT English

            $insert_student_final_ratings_english = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$english','$phase7_final_rating_english', '$phase7_term5', '$phase7', '$phase7_final_rating_english_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_english = mysqli_query($conn,$insert_student_final_ratings_english);

            if($run_student_final_ratings_english){
                echo "added to student final ratings english" . '<br>';
            }else{
                echo "Error student final ratings english" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT Math

            $insert_student_final_ratings_math = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$math','$phase7_final_rating_math', '$phase7_term5', '$phase7', '$phase7_final_rating_math_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_math = mysqli_query($conn,$insert_student_final_ratings_math);

            if($run_student_final_ratings_math){
                echo "added to student final ratings math" . '<br>';
            }else{
                echo "Error student final ratings math" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT Science

            $insert_student_final_ratings_science = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$science','$phase7_final_rating_science', '$phase7_term5', '$phase7', '$phase7_final_rating_science_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_science = mysqli_query($conn,$insert_student_final_ratings_science);

            if($run_student_final_ratings_science){
                echo "added to student final ratings Science" . '<br>';
            }else{
                echo "Error student final ratings math" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT AP

            $insert_student_final_ratings_AP = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$AP','$phase7_final_rating_AP', '$phase7_term5', '$phase7', '$phase7_final_rating_AP_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_AP = mysqli_query($conn,$insert_student_final_ratings_AP);

            if($run_student_final_ratings_AP){
                echo "added to student final ratings AP" . '<br>';
            }else{
                echo "Error student final ratings AP" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT EPP / TLE

            $insert_student_final_ratings_epp_tle = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$epp_tle','$phase7_final_rating_epp_tle', '$phase7_term5', '$phase7', '$phase7_final_rating_epp_tle_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_epp_tle = mysqli_query($conn,$insert_student_final_ratings_epp_tle);

            if($run_student_final_ratings_epp_tle){
                echo "added to student final ratings epp tle" . '<br>';
            }else{
                echo "Error student final ratings epp tle" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT MAPEH

            $insert_student_final_ratings_mapeh = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$mapeh','$phase7_final_rating_mapeh', '$phase7_term5', '$phase7', '$phase7_final_rating_mapeh_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_mapeh = mysqli_query($conn,$insert_student_final_ratings_mapeh);

            if($run_student_final_ratings_mapeh){
                echo "added to student final ratings mapeh" . '<br>';
            }else{
                echo "Error student final ratings mapeh" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT music

            $insert_student_final_ratings_music = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$music','$phase7_final_rating_music', '$phase7_term5', '$phase7', '$phase7_final_rating_music_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_music = mysqli_query($conn,$insert_student_final_ratings_music);

            if($run_student_final_ratings_music){
                echo "added to student final ratings music" . '<br>';
            }else{
                echo "Error student final ratings music" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT arts

            $insert_student_final_ratings_arts = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$arts','$phase7_final_rating_arts', '$phase7_term5', '$phase7', '$phase7_final_rating_arts_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_arts = mysqli_query($conn,$insert_student_final_ratings_arts);

            if($run_student_final_ratings_music){
                echo "added to student final ratings arts" . '<br>';
            }else{
                echo "Error student final ratings arts" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT pe

            $insert_student_final_ratings_pe = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$PE','$phase7_final_rating_PE', '$phase7_term5', '$phase7', '$phase7_final_rating_PE_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_pe = mysqli_query($conn,$insert_student_final_ratings_pe);

            if($run_student_final_ratings_pe){
                echo "added to student final ratings PE" . '<br>';
            }else{
                echo "Error student final ratings PE" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT health

            $insert_student_final_ratings_health = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$health','$phase7_final_rating_health', '$phase7_term5', '$phase7', '$phase7_final_rating_health_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_health = mysqli_query($conn,$insert_student_final_ratings_health);

            if($run_student_final_ratings_pe){
                echo "added to student final ratings health" . '<br>';
            }else{
                echo "Error student final ratings health" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT ESP

            $insert_student_final_ratings_esp = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$esp', '$phase7_final_rating_esp','$phase7_term5', '$phase7', '$phase7_final_rating_esp_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_esp = mysqli_query($conn,$insert_student_final_ratings_esp);

            if($run_student_final_ratings_pe){
                echo "added to student final ratings esp" . '<br>';
            }else{
                echo "Error student final ratings esp" . '<br>';
            }


            //insert ko sa FINAL RATINGS table PER SUBJECT arabic language

            $insert_student_final_ratings_arabic = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$arabic_language', '$phase7_final_rating_arabic_language','$phase7_term5', '$phase7', '$phase7_final_rating_arabic_language_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_arabic = mysqli_query($conn,$insert_student_final_ratings_arabic);


            if($run_student_final_ratings_arabic){
                echo "added to student final ratings arabic" . '<br>';
            }else{
                echo "Error student final ratings arabic" . $conn->error();
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT islamic values

            $insert_student_final_ratings_islam = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$islamic_values','$phase7_final_rating_arabic_language', '$phase7_term5', '$phase7', '$phase7_final_rating_islamic_values_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_islam = mysqli_query($conn,$insert_student_final_ratings_islam);

            if($run_student_final_ratings_islam){
                echo "added to student final ratings islamic" . '<br>';
            }else{
                echo "Error student final ratings islamic" . '<br>';
            }


                //general averag of phase 1 term 5 
            $insert_phase7_term5_general_average = "INSERT INTO student_general_averages(lrn,general_average,term,phase,remarks,date_time_created,date_time_updated) 
            VALUES ('$lrn','$phase7_term5_general_average', ' $phase7_term5','$term1_phase7_remarks', '$dateCreated','$dateUpdated')";

            $run_phase7_term5_general_average = mysqli_query($conn,$insert_phase7_term5_general_average);

            if($run_phase7_term5_general_average){
                echo "added student averages term5";
            }else{
                echo "added student averages term5";
            }




        }









}
?>