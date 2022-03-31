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
    <h1>Phase  8  </h1>
    <label for="">School: </label>
    <input type="text" name="phase8_name_of_school">

    <br>

    <label for="">School ID:</label>
    <input type="text" name="phase8_school_id">
    

    <br>
    <label for="">District: </label>
    <input type="text" name="phase8_district">

    <br>
    <label for="">Division: </label>
    <input type="text" name="phase8_division">

    <br>
    <label for="">Region:</label>
    <input type="text" name="phase8_region">

    <br>

    <label for="">Classified as Grade: </label>
    <input type="text" name="phase8_classified_as_grade">

    <br>

    <label for="">Section: </label>
    <input type="text" name="phase8_section">

    <br>

    <label for="">School Year: </label>
    <input type="text" name="phase8_school_year">

    <br>

    <label for="">Name of Teacher:</label>
    <input type="text" name="phase8_name_of_teacher">

    <br>

    <label for="">Signature:</label>
    <input type="text" name="phase8_signature" >

    

    <!---learning areas (subjects na ito)---->

    <h2>Learning Areas</h2>

    
    <h3>Quarter 1</h3>

    <label for="">Mother Tongue</label>
    <input type="text" name="term1_phase8_mother_tongue">

    <br>

    <label for="">Filipino</label>
    <input type="text" name="term1_phase8_filipino">

    <br>

    <label for="">English</label>
    <input type="text" name="term1_phase8_english">


    <br>
    <label for="">Mathematics</label>
    <input type="text" name="term1_phase8_mathematics">

    <br>
    <label for="">Science</label>
    <input type="text" name="term1_phase8_science">

    <br>
    <label for="">Araling Panlipunan</label>
    <input type="text" name="term1_phase8_araling_panlipunan">

    <br>
    <label for="">EPP / TLE</label>
    <input type="text" name="term1_phase8_epp_tle">

    <br>

    <label for="">MAPEH</label>
    <input type="text" name="term1_phase8_mapeh" readonly>

    <br>

    <label for="">Music</label>
    <input type="text" name="term1_phase8_music">

    <br>
    <label for="">Arts</label>
    <input type="text" name="term1_phase8_arts">

    <br>
    <label for="">Physical Education</label>
    <input type="text" name="term1_phase8_pe" id="">

    <br>
    <label for="">Health</label>
    <input type="text" name="term1_phase8_health">

    <br>
    <label for="">Eduk. sa Pagpapakatao</label>
    <input type="text" name="term1_phase8_esp">

    <br>
    <label for="">*Arabic Language</label>
    <input type="text" name="term1_phase8_arabic_language">


    <br>
    <label for="">*Islamic Values Education</label>
    <input type="text" name="term1_phase8_islamic_values">

    <br>

    <label for="">General Average</label>
    <input type="text" readonly>


    <!----term 2--->

    <h3>Quarter 2</h3>

    <label for="">Mother Tongue</label>
    <input type="text" name="term2_phase8_mother_tongue">

    <br>

    <label for="">Filipino</label>
    <input type="text" name="term2_phase8_filipino">

    <br>

    <label for="">English</label>
    <input type="text" name="term2_phase8_english">


    <br>
    <label for="">Mathematics</label>
    <input type="text" name="term2_phase8_mathematics">

    <br>
    <label for="">Science</label>
    <input type="text" name="term2_phase8_science">

    <br>
    <label for="">Araling Panlipunan</label>
    <input type="text" name="term2_phase8_araling_panlipunan">

    <br>
    <label for="">EPP / TLE</label>
    <input type="text" name="term2_phase8_epp_tle">

    <br>

    <label for="">MAPEH</label>
    <input type="text" name="term2_phase8_mapeh" readonly>

    <br>

    <label for="">Music</label>
    <input type="text" name="term2_phase8_music">

    <br>
    <label for="">Arts</label>
    <input type="text" name="term2_phase8_arts">

    <br>
    <label for="">Physical Education</label>
    <input type="text" name="term2_phase8_pe" id="">

    <br>
    <label for="">Health</label>
    <input type="text" name="term2_phase8_health">

    <br>
    <label for="">Eduk. sa Pagpapakatao</label>
    <input type="text" name="term2_phase8_esp">

    <br>
    <label for="">*Arabic Language</label>
    <input type="text" name="term2_phase8_arabic_language">


    <br>
    <label for="">*Islamic Values Education</label>
    <input type="text" name="term2_phase8_islamic_values">

    <br>

    <label for="">General Average</label>
    <input type="text" readonly>


    
    <h3>Quarter 3</h3>

    <label for="">Mother Tongue</label>
    <input type="text" name="term3_phase8_mother_tongue">

    <br>

    <label for="">Filipino</label>
    <input type="text" name="term3_phase8_filipino">

    <br>

    <label for="">English</label>
    <input type="text" name="term3_phase8_english">


    <br>
    <label for="">Mathematics</label>
    <input type="text" name="term3_phase8_mathematics">

    <br>
    <label for="">Science</label>
    <input type="text" name="term3_phase8_science">

    <br>
    <label for="">Araling Panlipunan</label>
    <input type="text" name="term3_phase8_araling_panlipunan">

    <br>
    <label for="">EPP / TLE</label>
    <input type="text" name="term3_phase8_epp_tle">

    <br>

    <label for="">MAPEH</label>
    <input type="text" name="term3_phase8_mapeh" readonly>

    <br>

    <label for="">Music</label>
    <input type="text" name="term3_phase8_music">

    <br>
    <label for="">Arts</label>
    <input type="text" name="term3_phase8_arts">

    <br>
    <label for="">Physical Education</label>
    <input type="text" name="term3_phase8_pe" id="">

    <br>
    <label for="">Health</label>
    <input type="text" name="term3_phase8_health">

    <br>
    <label for="">Eduk. sa Pagpapakatao</label>
    <input type="text" name="term3_phase8_esp">

    <br>
    <label for="">*Arabic Language</label>
    <input type="text" name="term3_phase8_arabic_language">


    <br>
    <label for="">*Islamic Values Education</label>
    <input type="text" name="term3_phase8_islamic_values">

    <br>

    <label for="">General Average</label>
    <input type="text" readonly>



    <h3>Quarter 4</h3>

    <label for="">Mother Tongue</label>
    <input type="text" name="term4_phase8_mother_tongue">

    <br>

    <label for="">Filipino</label>
    <input type="text" name="term4_phase8_filipino">

    <br>

    <label for="">English</label>
    <input type="text" name="term4_phase8_english">


    <br>
    <label for="">Mathematics</label>
    <input type="text" name="term4_phase8_mathematics">

    <br>
    <label for="">Science</label>
    <input type="text" name="term4_phase8_science">

    <br>
    <label for="">Araling Panlipunan</label>
    <input type="text" name="term4_phase8_araling_panlipunan">

    <br>
    <label for="">EPP / TLE</label>
    <input type="text" name="term4_phase8_epp_tle">

    <br>

    <label for="">MAPEH</label>
    <input type="text" name="term4_phase8_mapeh" readonly>

    <br>

    <label for="">Music</label>
    <input type="text" name="term4_phase8_music">

    <br>
    <label for="">Arts</label>
    <input type="text" name="term4_phase8_arts">

    <br>
    <label for="">Physical Education</label>
    <input type="text" name="term4_phase8_pe" id="">

    <br>
    <label for="">Health</label>
    <input type="text" name="term4_phase8_health">

    <br>
    <label for="">Eduk. sa Pagpapakatao</label>
    <input type="text" name="term4_phase8_esp">

    <br>
    <label for="">*Arabic Language</label>
    <input type="text" name="term4_phase8_arabic_language">


    <br>
    <label for="">*Islamic Values Education</label>
    <input type="text" name="term4_phase8_islamic_values">

    <br>
    <label for="">General Average</label>
    <input type="text" readonly>

    <br>


    <h1>Remedial Class</h1>

<label for="">Conducted From</label>
<input type="date" name="phase8_remedial_from" >
<br>

<label for="">TO: </label>
<input type="date" name="phase8_remedial_to" >
<br>

<label for="">Learning Areas </label> <br>


<label for=""> term 1 </label> 
<input type= "text" name="phase8_remedial_learning_areas_1"> <br>

<label for=""> term 2 </label> 
<input type= "text" name="phase8_remedial_learning_areas_2"> <br>



<label for=""> Final Rating  </label> <br>
<label for =""> term 1  </label>
<input type= "text" name="phase8_remedial_final_rating_1"> <br>

<label for=""> term 2 </label>
<input type= "text" name="phase8_remedial_final_rating_2"> <br>


<label for=""> Remedial Class Mark </label> <br>
<label for=""> term 1 </label>
<input type= "text" name="phase8_remedial_class_mark_1"> <br>

<label for=""> term 2 </label>
<input type= "text" name="phase8_remedial_class_mark_2"> <br>


<label for="">Recomputed Final Grade </label> <br>
<label for=""> term 1 </label>
<input type= "text" name="phase8_recomputed_final_grade_1"> <br>

<label for=""> term 2 </label>
<input type= "text" name="phase8_recomputed_final_grade_2"> <br>



<label for=""> Remarks </label> <br>
<label for=""> term 1 </label>
<input type="text" name="phase8_remedial_remarks_1" > <Br>
<label for=""> term 2 </label>
<input type="text" name="phase8_remedial_remarks_2" > <br>




    <input type = "submit" name= "add" value = "submit">

    </form>

    <?php
    if(isset($_POST['add'])){
       
    $lrn = 123456789012;
    $dateCreated = date("y-m-d h:i:a");
    $dateUpdated = date("y-m-d h:i:a");
    $remarks = 'none';

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


    $phase8 = 8;
    $phase8_name_of_school = $_POST['phase8_name_of_school'];
    $phase8_school_id = $_POST['phase8_school_id'];
    $phase8_district = $_POST['phase8_district'];
    $phase8_division = $_POST['phase8_division'];
    $phase8_region = $_POST['phase8_region'];
    $phase8_classified_as_grade = $_POST['phase8_classified_as_grade'];
    $phase8_section = $_POST['phase8_section'];
    $phase8_school_year = $_POST['phase8_school_year'];
    $phase8_name_of_teacher = $_POST['phase8_name_of_teacher'];
    $phase8_signature = $_POST['phase8_signature'];
    $phase8_remarks = 'none';

    //term1_phase8 grades
    $term1_phase8 = 1;
    $term1_phase8_mother_tongue = $_POST['term1_phase8_mother_tongue'];
    $term1_phase8_filipino = $_POST['term1_phase8_filipino'];
    $term1_phase8_english = $_POST['term1_phase8_english'];
    $term1_phase8_mathematics = $_POST['term1_phase8_mathematics'];
    $term1_phase8_science = $_POST['term1_phase8_science'];
    $term1_phase8_araling_panlipunan = $_POST['term1_phase8_araling_panlipunan'];
    $term1_phase8_epp_tle = $_POST['term1_phase8_epp_tle'];
    $term1_phase8_music = $_POST['term1_phase8_music'];
    $term1_phase8_arts = $_POST['term1_phase8_arts'];
    $term1_phase8_pe = $_POST['term1_phase8_pe'];
    $term1_phase8_health = $_POST['term1_phase8_health'];
    $term1_phase8_esp = $_POST['term1_phase8_esp'];
    $term1_phase8_arabic_language = $_POST['term1_phase8_arabic_language'];
    $term1_phase8_islamic_values = $_POST['term1_phase8_islamic_values'];
    $term1_phase8_remarks = 'none'; 

    //term2_phase8 grades
    //term2_phase8
    $term2_phase8 = 2;
    $term2_phase8_mother_tongue = $_POST['term2_phase8_mother_tongue'];
    $term2_phase8_filipino = $_POST['term2_phase8_filipino'];
    $term2_phase8_english = $_POST['term2_phase8_english'];
    $term2_phase8_mathematics = $_POST['term2_phase8_mathematics'];
    $term2_phase8_science = $_POST['term2_phase8_science'];
    $term2_phase8_araling_panlipunan = $_POST['term2_phase8_araling_panlipunan'];
    $term2_phase8_epp_tle = $_POST['term2_phase8_epp_tle'];

    $term2_phase8_music = $_POST['term2_phase8_music'];
    $term2_phase8_arts = $_POST['term2_phase8_arts'];
    $term2_phase8_pe = $_POST['term2_phase8_pe'];
    $term2_phase8_health = $_POST['term2_phase8_health'];
    $term2_phase8_esp = $_POST['term2_phase8_esp'];
    $term2_phase8_arabic_language = $_POST['term2_phase8_arabic_language'];
    $term2_phase8_islamic_values = $_POST['term2_phase8_islamic_values'];
    $term2_phase8_remarks = 'none'; 

    //term3_phase8
    //term3_phase8 grades

    $term3_phase8 = 3;
    $term3_phase8_mother_tongue = $_POST['term3_phase8_mother_tongue'];
    $term3_phase8_filipino = $_POST['term3_phase8_filipino'];
    $term3_phase8_english = $_POST['term3_phase8_english'];
    $term3_phase8_mathematics = $_POST['term3_phase8_mathematics'];
    $term3_phase8_science = $_POST['term3_phase8_science'];
    $term3_phase8_araling_panlipunan = $_POST['term3_phase8_araling_panlipunan'];
    $term3_phase8_epp_tle = $_POST['term3_phase8_epp_tle'];
    $term3_phase8_music = $_POST['term3_phase8_music'];
    $term3_phase8_arts = $_POST['term3_phase8_arts'];
    $term3_phase8_pe = $_POST['term3_phase8_pe'];
    $term3_phase8_health = $_POST['term3_phase8_health'];
    $term3_phase8_esp = $_POST['term3_phase8_esp'];
    $term3_phase8_arabic_language = $_POST['term3_phase8_arabic_language'];
    $term3_phase8_islamic_values = $_POST['term3_phase8_islamic_values'];
    $term3_phase8_remarks = 'none'; 

    //term4_phase7
    //term4_phase7 grades

    $term4_phase8 = 4;
    $term4_phase8_mother_tongue = $_POST['term4_phase8_mother_tongue'];
    $term4_phase8_filipino = $_POST['term4_phase8_filipino'];
    $term4_phase8_english = $_POST['term4_phase8_english'];
    $term4_phase8_mathematics = $_POST['term4_phase8_mathematics'];
    $term4_phase8_science = $_POST['term4_phase8_science'];
    $term4_phase8_araling_panlipunan = $_POST['term4_phase8_araling_panlipunan'];
    $term4_phase8_epp_tle = $_POST['term4_phase8_epp_tle'];
    $term4_phase8_music = $_POST['term4_phase8_music'];
    $term4_phase8_arts = $_POST['term4_phase8_arts'];
    $term4_phase8_pe = $_POST['term2_phase8_pe'];
    $term4_phase8_health = $_POST['term4_phase8_health'];
    $term4_phase8_esp = $_POST['term4_phase8_esp'];
    $term4_phase8_arabic_language = $_POST['term4_phase8_arabic_language'];
    $term4_phase8_islamic_values = $_POST['term4_phase8_islamic_values'];
    $term4_phase8_remarks = 'none';

        // phase 8 remedial
        
    $phase8_remedial_from = date("m-d-y",strtotime($_POST['phase8_remedial_from']));
    $phase8_remedial_to = date("m-d-y" ,strtotime($_POST['phase8_remedial_to']));
    $phase8_remedial_learning_areas_1 = $_POST['phase8_remedial_learning_areas_1'] ;
    $phase8_remedial_final_rating_1 =$_POST['phase8_remedial_final_rating_1'];
    $phase8_remedial_class_mark_1 = $_POST['phase8_remedial_class_mark_1'];
    $phase8_recomputed_final_grade_1 = $_POST['phase8_recomputed_final_grade_1'];
    $phase8_remedial_remarks_1 = $_POST['phase8_remedial_remarks_1'];

    $phase8_remedial_learning_areas_2 = $_POST['phase8_remedial_learning_areas_2'] ;
    $phase8_remedial_final_rating_2 =$_POST['phase8_remedial_final_rating_2'];
    $phase8_remedial_class_mark_2 = $_POST['phase8_remedial_class_mark_2'];
    $phase8_recomputed_final_grade_2 = $_POST['phase8_recomputed_final_grade_2'];
    $phase8_remedial_remarks_2 = $_POST['phase8_remedial_remarks_2'];

    //PHASE 8 AVERAGE OF MAPEH

    $term1_phase8_average_of_mapeh = round(($term1_phase8_music + $term1_phase8_arts + $term1_phase8_pe + $term1_phase8_health) / 4) ;

    $term2_phase8_average_of_mapeh = round(($term2_phase8_music + $term2_phase8_arts + $term2_phase8_pe + $term2_phase8_health) / 4) ;

    $term3_phase8_average_of_mapeh = round(($term3_phase8_music + $term3_phase8_arts + $term3_phase8_pe + $term3_phase8_health) / 4) ;

    $term4_phase8_average_of_mapeh = round(($term4_phase8_music + $term4_phase8_arts + $term4_phase8_pe + $term4_phase8_health) / 4) ;



        // phases 8 final ratings 


    $phase8_term5 = 'Final Rating8';
  

    $phase8_final_rating_mother_tongue = round(($term1_phase8_mother_tongue + $term2_phase8_mother_tongue + 
    $term3_phase8_mother_tongue + $term4_phase8_mother_tongue) / 4);

    $phase8_final_rating_filipino = round(($term1_phase8_filipino + $term2_phase8_filipino + $term3_phase8_filipino + $term4_phase8_filipino) / 4);

    $phase8_final_rating_english = round(($term1_phase8_english + $term2_phase8_english + $term3_phase8_english + $term4_phase8_english) / 4);

    $phase8_final_rating_math = round(($term1_phase8_mathematics + $term2_phase8_mathematics + $term3_phase8_mathematics + $term4_phase8_mathematics ) / 4);

    $phase8_final_rating_science = round(($term1_phase8_science + $term2_phase8_science + $term3_phase8_science + $term4_phase8_science) / 4);

    $phase8_final_rating_AP = round(($term1_phase8_araling_panlipunan + $term2_phase8_araling_panlipunan + $term3_phase8_araling_panlipunan + $term4_phase8_araling_panlipunan) / 4);

    $phase8_final_rating_epp_tle = round(($term1_phase8_epp_tle + $term2_phase8_epp_tle + $term3_phase8_epp_tle + $term4_phase8_epp_tle) / 4);

    $phase8_final_rating_mapeh = round(($term1_phase8_average_of_mapeh + $term2_phase8_average_of_mapeh + $term3_phase8_average_of_mapeh + $term4_phase8_average_of_mapeh) / 4 );

    $phase8_final_rating_music = round(($term1_phase8_music + $term2_phase8_music + $term3_phase8_music + $term4_phase8_music) / 4);

    $phase8_final_rating_arts = round(($term1_phase8_arts + $term2_phase8_arts + $term3_phase8_arts + $term4_phase8_arts ) / 4);

    $phase8_final_rating_PE = round(($term1_phase8_pe + $term2_phase8_pe + $term3_phase8_pe + $term4_phase8_pe) / 4);

    $phase8_final_rating_health = round(($term1_phase8_health + $term2_phase8_health + $term3_phase8_health + $term4_phase8_health)/ 4);

    $phase8_final_rating_esp = round(($term1_phase8_esp + $term2_phase8_esp + $term3_phase8_esp + $term4_phase8_esp) / 4);
    
    $phase8_final_rating_arabic_language = round(($term1_phase8_arabic_language + $term2_phase8_arabic_language + $term3_phase8_arabic_language + $term4_phase8_arabic_language) / 4);

    $phase8_final_rating_islamic_values = round(($term1_phase8_islamic_values + $term2_phase8_islamic_values + $term3_phase8_islamic_values + $term4_phase8_islamic_values) / 4);



        //validation of phase 8

    if($phase8_final_rating_mother_tongue >= 75){
        $phase8_final_rating_mother_tongue_output = 'PASSED';
    }else{
        $phase8_final_rating_mother_tongue_output = 'FAILED';
    }
    
    if($phase8_final_rating_filipino >= 75){
        $phase8_final_rating_filipino_output = 'PASSED';
    }else{
        $phase8_final_rating_filipino_output ='FAILED';
    }
    
    if($phase8_final_rating_english >= 75){
        $phase8_final_rating_english_output ='PASSED';
    }else{
        $phase8_final_rating_english_output = 'FAILED';
    }
    
    if($phase8_final_rating_math >= 75){
        $phase8_final_rating_math_output = 'PASSED';
    }else{
        $phase8_final_rating_math_output =  'FAILED';
    }
    
    if($phase8_final_rating_science >= 75){
        $phase8_final_rating_science_output = 'PASSED';
    }else{
        $phase8_final_rating_science_output = 'FAILED';
    }
    
    if($phase8_final_rating_AP >= 75){
        $phase8_final_rating_AP_output = 'PASSED';
    }else{
        $phase8_final_rating_AP_output = 'FAILED';
    }
    
    if($phase8_final_rating_epp_tle >= 75){
        $phase8_final_rating_epp_tle_output = 'PASSED';
    }else{
        $phase8_final_rating_epp_tle_output = 'FAILED';
    }
    
    if($phase8_final_rating_mapeh >= 75){
        $phase8_final_rating_mapeh_output = 'PASSED';
    }else{
        $phase8_final_rating_mapeh_output = 'FAILED';
    }
    
    if($phase8_final_rating_music >= 75){
        $phase8_final_rating_music_output = 'PASSED';
    }else{
        $phase8_final_rating_music_output = 'FAILED';
    }
    
    if($phase8_final_rating_arts >= 75){
        $phase8_final_rating_arts_output = 'PASSED';
    }else{
        $phase8_final_rating_arts_output = 'FAILED';
    }
    
    if($phase8_final_rating_PE >= 75){
        $phase8_final_rating_PE_output = 'PASSED';
    }else{
        $phase8_final_rating_PE_output ='FAILED';
    }
    
    if($phase8_final_rating_health >= 75){
        $phase8_final_rating_health_output = 'PASSED';
    }else{
        $phase8_final_rating_health_output = 'FAILED';
    }
    
    if($phase8_final_rating_esp >= 75){
        $phase8_final_rating_esp_output = 'PASSED';
    }else{
        $phase8_final_rating_esp_output = 'FAILED';
    }
    
    if($phase8_final_rating_arabic_language >= 75){
        $phase8_final_rating_arabic_language_output = 'PASSED';
    }else{
        $phase8_final_rating_arabic_language_output = 'FAILED';
    }
    
    if($phase8_final_rating_islamic_values >= 75){
        $phase8_final_rating_islamic_values_output = 'PASSED';
    }else{
        $phase8_final_rating_islamic_values_output = 'FAILED';
        }

        // phase 8 general average


    $phase8_term1_general_average = round(($term1_phase8_mother_tongue + $term1_phase8_filipino + $term1_phase8_english + $term1_phase8_mathematics + $term1_phase8_science + $term1_phase8_araling_panlipunan + $term1_phase8_epp_tle + $term1_phase8_average_of_mapeh + $term1_phase8_esp) / 9);
    $phase8_term2_general_average = round(($term2_phase8_mother_tongue + $term2_phase8_filipino + $term2_phase8_english + $term2_phase8_mathematics + $term2_phase8_science + $term2_phase8_araling_panlipunan + $term2_phase8_epp_tle + $term2_phase8_average_of_mapeh + $term2_phase8_esp) / 9);
    $phase8_term3_general_average = round(($term3_phase8_mother_tongue + $term3_phase8_filipino + $term3_phase8_english + $term3_phase8_mathematics + $term3_phase8_science + $term3_phase8_araling_panlipunan + $term3_phase8_epp_tle + $term3_phase8_average_of_mapeh + $term3_phase8_esp) / 9);
    $phase8_term4_general_average = round(($term4_phase8_mother_tongue + $term4_phase8_filipino + $term4_phase8_english + $term4_phase8_mathematics + $term4_phase8_science + $term4_phase8_araling_panlipunan + $term4_phase8_epp_tle + $term4_phase8_average_of_mapeh + $term4_phase8_esp) / 9);
    $phase8_term5_general_average = round(($phase8_final_rating_mother_tongue  + $phase8_final_rating_filipino + $phase8_final_rating_english + $phase8_final_rating_math + $phase8_final_rating_science + $phase8_final_rating_AP + $phase8_final_rating_epp_tle + $phase8_final_rating_mapeh + $phase8_final_rating_esp) / 9);

        //Phase2 Insert Scholastic Records

        $phase8_insert_scholastic_records = "INSERT INTO scholastic_records (lrn,school,school_id,district,division,region,classified_as_grade,section,school_year,name_of_teacher,signature,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn' ,'$phase8_name_of_school', '$phase8_school_id' , '$phase8_district', '$phase8_division', '$phase8_region', '$phase8_classified_as_grade', '$phase8_section', '$phase8_school_year', '$phase8_name_of_school', '$phase8_signature', '$phase8','$phase8_remarks', '$dateCreated', '$dateUpdated')";

        $phase8_run_scholastic_records = mysqli_query($conn,$phase8_insert_scholastic_records);
        if($phase8_run_scholastic_records){

            //inserting of students grades

            //phase 8 term 1 mother tongue


            $insert_student_grades_term1_phase8_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mother_tongue', '$term1_phase8_mother_tongue','$term1_phase8', '$phase8', '$term1_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase8_mother_tongue = mysqli_query($conn,$insert_student_grades_term1_phase8_mother_tongue);
            
            if($insert_student_grades_term1_phase8_mother_tongue){
                echo"term1 mothertongue";
            }

            else{
                $conn->error;;
            }


            //phase 8 term 1 filipino

            $insert_student_grades_term1_phase8_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$filipino', '$term1_phase8_filipino','$term1_phase8', '$phase8', '$term1_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase8_filipino = mysqli_query($conn,$insert_student_grades_term1_phase8_filipino);
            
            if($insert_student_grades_term1_phase8_filipino){
                echo"term1 Filipino";
            }

            else{
                $conn->error;
            }

            //phase 8 term 1 english

            $insert_student_grades_term1_phase8_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$english', '$term1_phase8_english','$term1_phase8', '$phase8', '$term1_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase8_english = mysqli_query($conn,$insert_student_grades_term1_phase8_english);
            
            if($insert_student_grades_term1_phase8_english){
                echo"term1 english";
            }

            else{
                $conn->error;
            }

            //phase 8 term 1 math   

            $insert_student_grades_term1_phase8_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$math', '$term1_phase8_mathematics','$term1_phase8', '$phase8', '$term1_phase8_remarks','$dateCreated', '$dateUpdated')" ;
              $run_student_grades_term1_phase8_math = mysqli_query($conn,$insert_student_grades_term1_phase8_math);
            
            if($insert_student_grades_term1_phase8_math){
                echo"term1 math";
            }

            else{
                $conn->error;
            }

            //phase 8 term 1 science

            $insert_student_grades_term1_phase8_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$science', '$term1_phase8_science','$term1_phase8', '$phase8', '$term1_phase8_remarks','$dateCreated', '$dateUpdated')" ;
              $run_student_grades_term1_phase8_science = mysqli_query($conn,$insert_student_grades_term1_phase8_science);
            
            if($insert_student_grades_term1_phase8_science){
                echo"term1 science";
            }

            else{
                $conn->error;
            }

            //phase 8 term 1 ap

            $insert_student_grades_term1_phase8_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
              VALUES ('$lrn','$AP', '$term1_phase8_araling_panlipunan','$term1_phase8', '$phase8', '$term1_phase8_remarks','$dateCreated', '$dateUpdated')" ;
                $run_student_grades_term1_phase8_ap = mysqli_query($conn,$insert_student_grades_term1_phase8_ap);
            
            if($insert_student_grades_term1_phase8_ap){
                echo"term1 Araling panlipunan";
            }

            else{
                $conn->error;
            }

            //phase 8 term 1 tle

            $insert_student_grades_term1_phase8_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$epp_tle', '$term1_phase8_epp_tle','$term1_phase8', '$phase8', '$term1_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase8_epp_tle = mysqli_query($conn,$insert_student_grades_term1_phase8_epp_tle);
            
            if($insert_student_grades_term1_phase8_epp_tle){
                echo"term1 EPP_TLE";
            }

            else{
                $conn->error;
            }

            //phase 8 term 1  mapeh

            $insert_student_grades_term1_phase8_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mapeh', '$term1_phase8_average_of_mapeh','$term1_phase8', '$phase8', '$term1_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase8_mapeh = mysqli_query($conn,$insert_student_grades_term1_phase8_mapeh);

              if($run_student_grades_term1_phase8_mapeh){
                echo  "added term mapeh";
              }
                else{
                    $conn->error;
                }

                //phase 8 term 1 music

            $insert_student_grades_term1_phase8_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$music', '$term1_phase8_music','$term1_phase8', '$phase8', '$term1_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase8_music = mysqli_query($conn,$insert_student_grades_term1_phase8_music);

               if($run_student_grades_term1_phase8_music){
                   echo  "added term music" . '<br>';
               }
                   else{
                    $conn->error;
                }

                //phase 8 term 1 arts

            $insert_student_grades_term1_phase8_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arts', '$term1_phase8_arts','$term1_phase8', '$phase8', '$term1_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase8_arts = mysqli_query($conn,$insert_student_grades_term1_phase8_arts);


                if($run_student_grades_term1_phase8_arts){
                    echo  "added term arts" . '<br>';
                }

                    else{
                        $conn->error;
                    }

                    //phase 8 term 1 pe

            $insert_student_grades_term1_phase8_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$PE', '$term1_phase8_pe','$term1_phase8', '$phase8', '$term1_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase8_pe = mysqli_query($conn,$insert_student_grades_term1_phase8_pe);

                if($run_student_grades_term1_phase8_pe){
                    echo  "added term PE" . '<br>';
                }
                else{
                    $conn->error;
                }


                //phase 8 term 1 health

            $insert_student_grades_term1_phase8_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$health', '$term1_phase8_health','$term1_phase8', '$phase8', '$term1_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase8_health = mysqli_query($conn,$insert_student_grades_term1_phase8_health);

                 if($run_student_grades_term1_phase8_health){

                     echo  "added term health" . '<br>';
                 }
                    
                     else{
                        $conn->error;
                    }


                    //phase 8 term 1 esp

            $insert_student_grades_term1_phase8_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$esp', '$term1_phase8_esp','$term1_phase8', '$phase8', '$term1_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase8_esp = mysqli_query($conn,$insert_student_grades_term1_phase8_esp);

                if($run_student_grades_term1_phase8_esp){
                    echo  "added term esp" . '<br>';
                }
                    else{
                        $conn->error;
                    }


                    //phase 8 term 1 arabic

            $insert_student_grades_term1_phase8_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arabic_language', '$term1_phase8_arabic_language','$term1_phase8', '$phase8', '$term1_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase8_arabic = mysqli_query($conn,$insert_student_grades_term1_phase8_arabic);

            if($run_student_grades_term1_phase8_arabic){
                 echo  "added term arabic" . '<br>';
            }   
                
                 else{
                    $conn->error;
                }


                //phase 8 term 1 islamic

            $insert_student_grades_term1_phase8_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$islamic_values', '$term1_phase8_islamic_values','$term1_phase8', '$phase8', '$term1_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase8_islamic = mysqli_query($conn,$insert_student_grades_term1_phase8_islamic);

            if($run_student_grades_term1_phase8_islamic){
                 echo  "added term islamic" . '<br>';
                                                                        
             }
             
             else{
                  echo "error term1_phase8 islamic" . '<br>';
                }
                    //general average phase 8 
                $insert_phase8_term1_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
                VALUES ('$lrn','$phase8_term1_general_average','$term1_phase8','$phase8','$phase8_remarks','$dateCreated','$dateUpdated');";
                $run_phase8_term1_student_averages = mysqli_query($conn,$insert_phase8_term1_general_average);
    
                if($run_phase8_term1_student_averages){
                    echo "added student averages term1";
                
                    
                }else{
                    echo "error student_averages" . $conn->error;
                }
                    //phase 8 term 1  ends here ----------------------

                // grades insertion 

                //  phase 8 term 2 mother tongue


                $insert_student_grades_term2_phase8_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mother_tongue', '$term2_phase8_mother_tongue','$term2_phase8', '$phase8', '$term2_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase8_mother_tongue = mysqli_query($conn,$insert_student_grades_term2_phase8_mother_tongue);
            
            if($insert_student_grades_term2_phase8_mother_tongue){
                echo"term2 mothertongue";
            }

            else{
                $conn->error;;
            }

            //  phase 8 term 2 filipino

            $insert_student_grades_term2_phase8_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$filipino', '$term2_phase8_filipino','$term2_phase8', '$phase8', '$term2_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase8_filipino = mysqli_query($conn,$insert_student_grades_term2_phase8_filipino);
            
            if($insert_student_grades_term2_phase8_filipino){
                echo"term2 Filipino";
            }

            else{
                $conn->error;
            }

            //  phase 8 term 2 english

            $insert_student_grades_term2_phase8_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$english', '$term2_phase8_english','$term2_phase8', '$phase8', '$term2_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase8_english = mysqli_query($conn,$insert_student_grades_term2_phase8_english);
            
            if($insert_student_grades_term2_phase8_english){
                echo"term2 english";
            }

            else{
                $conn->error;
            }

            //  phase 8 term 2 math

            $insert_student_grades_term2_phase8_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$math', '$term2_phase8_mathematics','$term2_phase8', '$phase8', '$term2_phase8_remarks','$dateCreated', '$dateUpdated')" ;
              $run_student_grades_term2_phase8_math = mysqli_query($conn,$insert_student_grades_term2_phase8_math);
            
            if($insert_student_grades_term2_phase8_math){
                echo"term2 math";
            }

            else{
                $conn->error;
            }

            //  phase 8 term 2 science

            $insert_student_grades_term2_phase8_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$science', '$term2_phase8_science','$term2_phase8', '$phase8', '$term2_phase8_remarks','$dateCreated', '$dateUpdated')" ;
              $run_student_grades_term2_phase8_science = mysqli_query($conn,$insert_student_grades_term2_phase8_science);
            
            if($insert_student_grades_term2_phase8_science){
                echo"term2 science";
            }

            else{
                $conn->error;
            }

            //  phase 8 term 2 ap

            $insert_student_grades_term2_phase8_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
              VALUES ('$lrn','$AP', '$term2_phase8_araling_panlipunan','$term2_phase8', '$phase8', '$term2_phase8_remarks','$dateCreated', '$dateUpdated')" ;
                $run_student_grades_term2_phase8_ap = mysqli_query($conn,$insert_student_grades_term2_phase8_ap);
            
            if($insert_student_grades_term2_phase8_ap){
                echo"term2 Araling panlipunan";
            }

            else{
                $conn->error;
            }

            //  phase 8 term 2 epp tle

            $insert_student_grades_term2_phase8_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$epp_tle', '$term2_phase8_epp_tle','$term2_phase8', '$phase8', '$term2_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase8_epp_tle = mysqli_query($conn,$insert_student_grades_term2_phase8_epp_tle);
            
            if($insert_student_grades_term2_phase8_epp_tle){
                echo"term2 EPP_TLE";
            }

            else{
                $conn->error;
            }

            //  phase 8 term 2 mapeh

            $insert_student_grades_term2_phase8_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mapeh', '$term2_phase8_average_of_mapeh','$term2_phase8', '$phase8', '$term2_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase8_mapeh = mysqli_query($conn,$insert_student_grades_term2_phase8_mapeh);

              if($run_student_grades_term2_phase8_mapeh){
                echo  "added term mapeh";
              }
                else{
                    $conn->error;
                }

                //  phase 8 term 2 music

            $insert_student_grades_term2_phase8_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$music', '$term2_phase8_music','$term2_phase8', '$phase8', '$term2_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase8_music = mysqli_query($conn,$insert_student_grades_term2_phase8_music);

               if($run_student_grades_term2_phase8_music){
                   echo  "added term music" . '<br>';
               }
                   else{
                    $conn->error;
                }

                //  phase 8 term 2 arts

            $insert_student_grades_term2_phase8_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arts', '$term2_phase8_arts','$term2_phase8', '$phase8', '$term2_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase8_arts = mysqli_query($conn,$insert_student_grades_term2_phase8_arts);


                if($run_student_grades_term2_phase8_arts){
                    echo  "added term arts" . '<br>';
                }

                    else{
                        $conn->error;
                    }

                    //  phase 8 term 2 pe

            $insert_student_grades_term2_phase8_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$PE', '$term2_phase8_pe','$term2_phase8', '$phase8', '$term2_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase8_pe = mysqli_query($conn,$insert_student_grades_term2_phase8_pe);

                if($run_student_grades_term2_phase8_pe){
                    echo  "added term PE" . '<br>';
                }
                   
                    else{
                        $conn->error;
                    }

                    //  phase 8 term 2 health


            $insert_student_grades_term2_phase8_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$health', '$term2_phase8_health','$term2_phase8', '$phase8', '$term2_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase8_health = mysqli_query($conn,$insert_student_grades_term2_phase8_health);

                 if($run_student_grades_term2_phase8_health){

                     echo  "added term health" . '<br>';
                 }
                    
                     else{
                        $conn->error;
                    }

                    //  phase 8 term 2 esp

            $insert_student_grades_term2_phase8_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$esp', '$term2_phase8_esp','$term2_phase8', '$phase8', '$term2_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase8_esp = mysqli_query($conn,$insert_student_grades_term2_phase8_esp);

                if($run_student_grades_term2_phase8_esp){
                    echo  "added term esp" . '<br>';
                }
                    else{
                        $conn->error;
                    }

                    //  phase 8 term 2 arabic

            $insert_student_grades_term2_phase8_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arabic_language', '$term2_phase8_arabic_language','$term2_phase8', '$phase8', '$term2_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase8_arabic = mysqli_query($conn,$insert_student_grades_term2_phase8_arabic);

            if($run_student_grades_term2_phase8_arabic){
                 echo  "added term arabic" . '<br>';
            }   
                
                 else{
                    $conn->error;
                }

                //  phase 8 term 2 islamic

            $insert_student_grades_term2_phase8_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$islamic_values', '$term2_phase8_islamic_values','$term2_phase8', '$phase8', '$term2_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase8_islamic = mysqli_query($conn,$insert_student_grades_term2_phase8_islamic);

            if($run_student_grades_term2_phase8_islamic){
                 echo  "added term islamic" . '<br>';
                                                                        
             }
             
             else{
                  echo "error term2_phase8 islamic" . '<br>';
                }



        
                    // general average phase 8 of term 2

                    $insert_phase8_term2_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
                VALUES ('$lrn','$phase8_term2_general_average','$term2_phase8','$phase8',' $term2_phase8_remarks','$dateCreated','$dateUpdated');";
                $run_phase8_term2_student_averages = mysqli_query($conn,$insert_phase8_term2_general_average);
    
                if($run_phase8_term2_student_averages){
                    echo "added student averages term1";
                    
                }else{
                    echo "error student_averages" . $conn->error;
                }

                //  phase 8 term 2  ends here ----------------------


                //grade insertion
                //phase 8 term 3 mother tongue

                $insert_student_grades_term3_phase8_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mother_tongue', '$term3_phase8_mother_tongue','$term3_phase8', '$phase8', '$term3_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase8_mother_tongue = mysqli_query($conn,$insert_student_grades_term3_phase8_mother_tongue);
            
            if($insert_student_grades_term3_phase8_mother_tongue){
                echo"term3 mothertongue";
            }

            else{
                $conn->error;;
            }

            //phase 8 term 3 filipino

            $insert_student_grades_term3_phase8_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$filipino', '$term3_phase8_filipino','$term3_phase8', '$phase8', '$term3_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase8_filipino = mysqli_query($conn,$insert_student_grades_term3_phase8_filipino);
            
            if($insert_student_grades_term3_phase8_filipino){
                echo"term3 Filipino";
            }

            else{
                $conn->error;
            }

            //phase 8 term 3 english

            $insert_student_grades_term3_phase8_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$english', '$term3_phase8_english','$term3_phase8', '$phase8', '$term3_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase8_english = mysqli_query($conn,$insert_student_grades_term3_phase8_english);
            
            if($insert_student_grades_term3_phase8_english){
                echo"term3 english";
            }

            else{
                $conn->error;
            }

            //phase 8 term 3 math

            $insert_student_grades_term3_phase8_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$math', '$term3_phase8_mathematics','$term3_phase8', '$phase8', '$term3_phase8_remarks','$dateCreated', '$dateUpdated')" ;
              $run_student_grades_term3_phase8_math = mysqli_query($conn,$insert_student_grades_term3_phase8_math);
            
            if($insert_student_grades_term3_phase8_math){
                echo"term3 math";
            }

            else{
                $conn->error;
            }

            //phase 8 term 3 science

            $insert_student_grades_term3_phase8_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$science', '$term3_phase8_science','$term3_phase8', '$phase8', '$term3_phase8_remarks','$dateCreated', '$dateUpdated')" ;
              $run_student_grades_term3_phase8_science = mysqli_query($conn,$insert_student_grades_term3_phase8_science);
            
            if($insert_student_grades_term3_phase8_science){
                echo"term3 science";
            }

            else{
                $conn->error;
            }

            //phase 8 term 3 ap

            $insert_student_grades_term3_phase8_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
              VALUES ('$lrn','$AP', '$term3_phase8_araling_panlipunan','$term3_phase8', '$phase8', '$term3_phase8_remarks','$dateCreated', '$dateUpdated')" ;
                $run_student_grades_term3_phase8_ap = mysqli_query($conn,$insert_student_grades_term3_phase8_ap);
            
            if($insert_student_grades_term3_phase8_ap){
                echo"term3 Araling panlipunan";
            }

            else{
                $conn->error;
            }

            //phase 8 term 3 epp tle

            $insert_student_grades_term3_phase8_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$epp_tle', '$term3_phase8_epp_tle','$term3_phase8', '$phase8', '$term3_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase8_epp_tle = mysqli_query($conn,$insert_student_grades_term3_phase8_epp_tle);
            
            if($insert_student_grades_term3_phase8_epp_tle){
                echo"term3 EPP_TLE";
            }

            else{
                $conn->error;
            }

            //phase 8 term 3 mapeh

            $insert_student_grades_term3_phase8_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mapeh', '$term3_phase8_average_of_mapeh','$term3_phase8', '$phase8', '$term3_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase8_mapeh = mysqli_query($conn,$insert_student_grades_term3_phase8_mapeh);

              if($run_student_grades_term3_phase8_mapeh){
                echo  "added term mapeh";
              }
                else{
                    $conn->error;
                }

                //phase 8 term 3 music

            $insert_student_grades_term3_phase8_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$music', '$term3_phase8_music','$term3_phase8', '$phase8', '$term3_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase8_music = mysqli_query($conn,$insert_student_grades_term3_phase8_music);

               if($run_student_grades_term3_phase8_music){
                   echo  "added term music" . '<br>';
               }
                   else{
                    $conn->error;
                }

                //phase 8 term 3 arts

            $insert_student_grades_term3_phase8_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arts', '$term3_phase8_arts','$term3_phase8', '$phase8', '$term3_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase8_arts = mysqli_query($conn,$insert_student_grades_term3_phase8_arts);


                if($run_student_grades_term3_phase8_arts){
                    echo  "added term arts" . '<br>';
                }

                    else{
                        $conn->error;
                    }

                    //phase 8 term 3 pe

            $insert_student_grades_term3_phase8_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$PE', '$term3_phase8_pe','$term3_phase8', '$phase8', '$term3_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase8_pe = mysqli_query($conn,$insert_student_grades_term3_phase8_pe);

                if($run_student_grades_term3_phase8_pe){
                    echo  "added term PE" . '<br>';
                }
                   
                    else{
                        $conn->error;
                    }

                    //phase 8 term 3 heatlh

            $insert_student_grades_term3_phase8_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$health', '$term3_phase8_health','$term3_phase8', '$phase8', '$term3_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase8_health = mysqli_query($conn,$insert_student_grades_term3_phase8_health);

                 if($run_student_grades_term3_phase8_health){

                     echo  "added term health" . '<br>';
                 }
                    
                     else{
                        $conn->error;
                    }

                    //phase 8 term 3 esp

            $insert_student_grades_term3_phase8_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$esp', '$term3_phase8_esp','$term3_phase8', '$phase8', '$term3_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase8_esp = mysqli_query($conn,$insert_student_grades_term3_phase8_esp);

                if($run_student_grades_term3_phase8_esp){
                    echo  "added term esp" . '<br>';
                }
                    else{
                        $conn->error;
                    }

                    //phase 8 term 3 arabic

            $insert_student_grades_term3_phase8_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arabic_language', '$term3_phase8_arabic_language','$term3_phase8', '$phase8', '$term3_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase8_arabic = mysqli_query($conn,$insert_student_grades_term3_phase8_arabic);

            if($run_student_grades_term3_phase8_arabic){
                 echo  "added term arabic" . '<br>';
            }   
                
                 else{
                    $conn->error;
                }

                //phase 8 term 3 islamic

            $insert_student_grades_term3_phase8_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$islamic_values', '$term3_phase8_islamic_values','$term3_phase8', '$phase8', '$term3_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase8_islamic = mysqli_query($conn,$insert_student_grades_term3_phase8_islamic);

            if($run_student_grades_term3_phase8_islamic){
                 echo  "added term islamic" . '<br>';
                                                                        
             }
             
             else{
                  echo "error term3_phase8 islamic" . '<br>';
                }



        
                    // general average phase 8 of term 3

                    $insert_phase8_term3_general_average = "INSERT INTO student_general_averages (`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
                VALUES ('$lrn','$phase8_term3_general_average','$term3_phase8','$phase8',' $term3_phase8_remarks','$dateCreated','$dateUpdated');";
                $run_phase8_term3_student_averages = mysqli_query($conn,$insert_phase8_term3_general_average);
    
                if($run_phase8_term3_student_averages){
                    echo "added student averages term1";
                   
                }else{
                    echo "error student_averages" . $conn->error;
                }


                    // phase 8 term 3 ends here -----------------------------


                    // grades insertion

                // phase 8 term 4 mother tongue



                $insert_student_grades_term4_phase8_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mother_tongue', '$term4_phase8_mother_tongue','$term4_phase8', '$phase8', '$term4_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase8_mother_tongue = mysqli_query($conn,$insert_student_grades_term4_phase8_mother_tongue);
            
            if($insert_student_grades_term4_phase8_mother_tongue){
                echo"term4 mothertongue";
            }

            else{
                $conn->error;;
            }

            // phase 8 term 4 filipino

            $insert_student_grades_term4_phase8_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$filipino', '$term4_phase8_filipino','$term4_phase8', '$phase8', '$term4_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase8_filipino = mysqli_query($conn,$insert_student_grades_term4_phase8_filipino);
            
            if($insert_student_grades_term4_phase8_filipino){
                echo"term4 Filipino";
            }

            else{
                $conn->error;
            }

            // phase 8 term 4 english

            $insert_student_grades_term4_phase8_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$english', '$term4_phase8_english','$term4_phase8', '$phase8', '$term4_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase8_english = mysqli_query($conn,$insert_student_grades_term4_phase8_english);
            
            if($insert_student_grades_term4_phase8_english){
                echo"term4 english";
            }

            else{
                $conn->error;
            }

            // phase 8 term 4 math

            $insert_student_grades_term4_phase8_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$math', '$term4_phase8_mathematics','$term4_phase8', '$phase8', '$term4_phase8_remarks','$dateCreated', '$dateUpdated')" ;
              $run_student_grades_term4_phase8_math = mysqli_query($conn,$insert_student_grades_term4_phase8_math);
            
            if($insert_student_grades_term4_phase8_math){
                echo"term4 math";
            }

            else{
                $conn->error;
            }

            // phase 8 term 4 sceince

            $insert_student_grades_term4_phase8_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$science', '$term4_phase8_science','$term4_phase8', '$phase8', '$term4_phase8_remarks','$dateCreated', '$dateUpdated')" ;
              $run_student_grades_term4_phase8_science = mysqli_query($conn,$insert_student_grades_term4_phase8_science);
            
            if($insert_student_grades_term4_phase8_science){
                echo"term4 science";
            }

            else{
                $conn->error;
            }

            // phase 8 term 4 ap

            $insert_student_grades_term4_phase8_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
              VALUES ('$lrn','$AP', '$term4_phase8_araling_panlipunan','$term4_phase8', '$phase8', '$term4_phase8_remarks','$dateCreated', '$dateUpdated')" ;
                $run_student_grades_term4_phase8_ap = mysqli_query($conn,$insert_student_grades_term4_phase8_ap);
            
            if($insert_student_grades_term4_phase8_ap){
                echo"term4 Araling panlipunan";
            }

            else{
                $conn->error;
            }

            // phase 8 term 4 epp tle

            $insert_student_grades_term4_phase8_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$epp_tle', '$term4_phase8_epp_tle','$term4_phase8', '$phase8', '$term4_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase8_epp_tle = mysqli_query($conn,$insert_student_grades_term4_phase8_epp_tle);
            
            if($insert_student_grades_term4_phase8_epp_tle){
                echo"term4 EPP_TLE";
            }

            else{
                $conn->error;
            }

            // phase 8 term 4 mapeh

            $insert_student_grades_term4_phase8_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mapeh', '$term4_phase8_average_of_mapeh','$term4_phase8', '$phase8', '$term4_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase8_mapeh = mysqli_query($conn,$insert_student_grades_term4_phase8_mapeh);

              if($run_student_grades_term4_phase8_mapeh){
                echo  "added term mapeh";
              }
                else{
                    $conn->error;
                }

                // phase 8 term 4 music

            $insert_student_grades_term4_phase8_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$music', '$term4_phase8_music','$term4_phase8', '$phase8', '$term4_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase8_music = mysqli_query($conn,$insert_student_grades_term4_phase8_music);

               if($run_student_grades_term4_phase8_music){
                   echo  "added term music" . '<br>';
               }
                   else{
                    $conn->error;
                }

                // phase 8 term 4 arts


            $insert_student_grades_term4_phase8_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arts', '$term4_phase8_arts','$term4_phase8', '$phase8', '$term4_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase8_arts = mysqli_query($conn,$insert_student_grades_term4_phase8_arts);


                if($run_student_grades_term4_phase8_arts){
                    echo  "added term arts" . '<br>';
                }

                    else{
                        $conn->error;
                    }

                    // phase 8 term 4 pe

            $insert_student_grades_term4_phase8_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$PE', '$term4_phase8_pe','$term4_phase8', '$phase8', '$term4_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase8_pe = mysqli_query($conn,$insert_student_grades_term4_phase8_pe);

                if($run_student_grades_term4_phase8_pe){
                    echo  "added term PE" . '<br>';
                }
                   
                    else{
                        $conn->error;
                    }

                    // phase 8 term 4 health

            $insert_student_grades_term4_phase8_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$health', '$term4_phase8_health','$term4_phase8', '$phase8', '$term4_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase8_health = mysqli_query($conn,$insert_student_grades_term4_phase8_health);

                 if($run_student_grades_term4_phase8_health){

                     echo  "added term health" . '<br>';
                 }
                    
                     else{
                        $conn->error;
                    }

                    // phase 8 term 4 esp

            $insert_student_grades_term4_phase8_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$esp', '$term4_phase8_esp','$term4_phase8', '$phase8', '$term4_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase8_esp = mysqli_query($conn,$insert_student_grades_term4_phase8_esp);

                if($run_student_grades_term4_phase8_esp){
                    echo  "added term esp" . '<br>';
                }
                    else{
                        $conn->error;
                    }

                    // phase 8 term 4 arabic

            $insert_student_grades_term4_phase8_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arabic_language', '$term4_phase8_arabic_language','$term4_phase8', '$phase8', '$term4_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase8_arabic = mysqli_query($conn,$insert_student_grades_term4_phase8_arabic);

            if($run_student_grades_term4_phase8_arabic){
                 echo  "added term arabic" . '<br>';
            }   
                
                 else{
                    $conn->error;
                }

                // phase 8 term 4 islamic

            $insert_student_grades_term4_phase8_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn',' $islamic_values', '$term4_phase8_islamic_values','$term4_phase8', '$phase8', '$term4_phase8_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase8_islamic = mysqli_query($conn,$insert_student_grades_term4_phase8_islamic);

            if($run_student_grades_term4_phase8_islamic){
                 echo  "added term islamic" . '<br>';
                                                                        
             }
             
             else{
                  echo "error term4_phase8 islamic" . '<br>';
                }



        
                    // general average phase 8 of term 4

                    $insert_phase8_term4_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
                VALUES ('$lrn','$phase8_term4_general_average','$term4_phase8','$phase8',' $term4_phase8_remarks','$dateCreated','$dateUpdated');";
                $run_phase8_term4_student_averages = mysqli_query($conn,$insert_phase8_term4_general_average);
    
                if($run_phase8_term4_student_averages){
                    echo "added student averages term1";
                    
                }else{
                    echo "error student_averages" . $conn->error;
                }

                // phase 8 term 4  ends here ------


                // inserting of final ratings 

                //insert ko sa PHASE 8 FINAL RATINGS table PER SUBJECT mother tongue


                $insert_student_final_ratings_mt = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$mother_tongue','$phase8_final_rating_mother_tongue', '$phase8_term5', '$phase8', '$phase8_final_rating_mother_tongue_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_mt = mysqli_query($conn,$insert_student_final_ratings_mt);

            if($run_student_final_ratings_mt){
                echo "added to student final ratings MT" . '<br>';
            }else{
                echo "Error student final ratings MT" . '<br>';
            }

            //insert ko sa PHASE 8 FINAL RATINGS table PER SUBJECT filipino

            $insert_student_final_ratings_filipino = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$filipino', '$phase8_final_rating_filipino','$phase8_term5', '$phase8', '$phase8_final_rating_filipino_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_filipino = mysqli_query($conn,$insert_student_final_ratings_filipino);

            if($run_student_final_ratings_filipino){
                echo "added to student final ratings filipino" . '<br>';
            }else{
                echo "Error student final ratings filipino" . '<br>';
            }

            //insert ko sa PHASE 8 FINAL RATINGS table PER SUBJECT English

            $insert_student_final_ratings_english = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$english','$phase8_final_rating_english', '$phase8_term5', '$phase8', '$phase8_final_rating_english_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_english = mysqli_query($conn,$insert_student_final_ratings_english);

            if($run_student_final_ratings_english){
                echo "added to student final ratings english" . '<br>';
            }else{
                echo "Error student final ratings english" . '<br>';
            }

            //insert ko sa PHASE 8 FINAL RATINGS table PER SUBJECT Math

            $insert_student_final_ratings_math = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$math','$phase8_final_rating_math', '$phase8_term5', '$phase8', '$phase8_final_rating_math_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_math = mysqli_query($conn,$insert_student_final_ratings_math);

            if($run_student_final_ratings_math){
                echo "added to student final ratings math" . '<br>';
            }else{
                echo "Error student final ratings math" . '<br>';
            }

            //insert ko sa PHASE 8 FINAL RATINGS table PER SUBJECT Science

            $insert_student_final_ratings_science = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$science','$phase8_final_rating_science', '$phase8_term5', '$phase8', '$phase8_final_rating_science_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_science = mysqli_query($conn,$insert_student_final_ratings_science);

            if($run_student_final_ratings_science){
                echo "added to student final ratings math" . '<br>';
            }else{
                echo "Error student final ratings math" . '<br>';
            }

            //insert ko sa PHASE 8 FINAL RATINGS table PER SUBJECT AP

            $insert_student_final_ratings_AP = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$AP','$phase8_final_rating_AP', '$phase8_term5', '$phase8', '$phase8_final_rating_AP_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_AP = mysqli_query($conn,$insert_student_final_ratings_AP);

            if($run_student_final_ratings_AP){
                echo "added to student final ratings AP" . '<br>';
            }else{
                echo "Error student final ratings AP" . '<br>';
            }

            //insert ko sa PHASE 8 FINAL RATINGS table PER SUBJECT EPP / TLE

            $insert_student_final_ratings_epp_tle = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$epp_tle','$phase8_final_rating_epp_tle', '$phase8_term5', '$phase8', '$phase8_final_rating_epp_tle_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_epp_tle = mysqli_query($conn,$insert_student_final_ratings_epp_tle);

            if($run_student_final_ratings_epp_tle){
                echo "added to student final ratings epp tle" . '<br>';
            }else{
                echo "Error student final ratings epp tle" . '<br>';
            }

            //insert ko sa PHASE 8 FINAL RATINGS table PER SUBJECT MAPEH

            $insert_student_final_ratings_mapeh = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$mapeh','$phase8_final_rating_mapeh', '$phase8_term5', '$phase8', '$phase8_final_rating_mapeh_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_mapeh = mysqli_query($conn,$insert_student_final_ratings_mapeh);

            if($run_student_final_ratings_mapeh){
                echo "added to student final ratings mapeh" . '<br>';
            }else{
                echo "Error student final ratings mapeh" . '<br>';
            }

            //insert ko sa PHASE 8 FINAL RATINGS table PER SUBJECT music

            $insert_student_final_ratings_music = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$music','$phase8_final_rating_music', '$phase8_term5', '$phase8', '$phase8_final_rating_music_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_music = mysqli_query($conn,$insert_student_final_ratings_music);

            if($run_student_final_ratings_music){
                echo "added to student final ratings music" . '<br>';
            }else{
                echo "Error student final ratings music" . '<br>';
            }

            //insert ko sa PHASE 8 FINAL RATINGS table PER SUBJECT arts

            $insert_student_final_ratings_arts = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$arts','$phase8_final_rating_arts', '$phase8_term5', '$phase8', '$phase8_final_rating_arts_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_arts = mysqli_query($conn,$insert_student_final_ratings_arts);

            if($run_student_final_ratings_music){
                echo "added to student final ratings arts" . '<br>';
            }else{
                echo "Error student final ratings arts" . '<br>';
            }

            //insert ko sa PHASE 8 FINAL RATINGS table PER SUBJECT pe

            $insert_student_final_ratings_pe = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$PE','$phase8_final_rating_PE', '$phase8_term5', '$phase8', '$phase8_final_rating_PE_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_pe = mysqli_query($conn,$insert_student_final_ratings_pe);

            if($run_student_final_ratings_pe){
                echo "added to student final ratings PE" . '<br>';
            }else{
                echo "Error student final ratings PE" . '<br>';
            }

            //insert ko sa PHASE 8 FINAL RATINGS table PER SUBJECT health

            $insert_student_final_ratings_health = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$health','$phase8_final_rating_health', '$phase8_term5', '$phase8', '$phase8_final_rating_health_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_health = mysqli_query($conn,$insert_student_final_ratings_health);

            if($run_student_final_ratings_pe){
                echo "added to student final ratings health" . '<br>';
            }else{
                echo "Error student final ratings health" . '<br>';
            }

            //insert ko sa PHASE 8 FINAL RATINGS table PER SUBJECT ESP

            $insert_student_final_ratings_esp = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$esp', '$phase8_final_rating_esp','$phase8_term5', '$phase8', '$phase8_final_rating_esp_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_esp = mysqli_query($conn,$insert_student_final_ratings_esp);

            if($run_student_final_ratings_pe){
                echo "added to student final ratings esp" . '<br>';
            }else{
                echo "Error student final ratings esp" . '<br>';
            }


            //insert ko sa PHASE 8 FINAL RATINGS table PER SUBJECT arabic language

            $insert_student_final_ratings_arabic = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$arabic_language', '$phase8_final_rating_arabic_language','$phase8_term5', '$phase8', '$phase8_final_rating_arabic_language_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_arabic = mysqli_query($conn,$insert_student_final_ratings_arabic);


            if($run_student_final_ratings_arabic){
                echo "added to student final ratings arabic" . '<br>';
            }else{
                echo "Error student final ratings arabic" . $conn->error();
            }

            //insert ko sa PHASE 8 FINAL RATINGS table PER SUBJECT islamic values

            $insert_student_final_ratings_islam = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$islamic_values','$phase8_final_rating_arabic_language', '$phase8_term5', '$phase8', '$phase8_final_rating_islamic_values_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_islam = mysqli_query($conn,$insert_student_final_ratings_islam);

            if($run_student_final_ratings_islam){
                echo "added to student final ratings islamic" . '<br>';
            }else{
                echo "Error student final ratings islamic" . '<br>';
            }


                //general averag of phase 8 term 5 
            $insert_phase8_term5_general_average = "INSERT INTO student_general_averages(lrn,general_average,term,phase,remarks,date_time_created,date_time_updated) 
            VALUES ('$lrn','$phase8_term5_general_average', ' $phase8_term5','$term1_phase8_remarks', '$dateCreated','$dateUpdated')";

            $run_phase8_term5_general_average = mysqli_query($conn,$insert_phase8_term5_general_average);

            if($run_phase8_term5_general_average){
                echo "added student averages term5";
            }else{
                echo "added student averages term5";
            }



            for ($phase8_remedial_term = 1; $phase8_remedial_term <=2 ; $phase8_remedial_term++){



                if($phase8_remedial_term ==1){
            $phase8_remedial_query= "INSERT INTO `remedial_classes`(`lrn`, `date_from`, `date_to`, `learning_areas`, `final_rating`, `remedial_class_mark`, `recomputed_final_grade`, `phase`, `term`, `remarks`, `date_time_created`, `date_time_updated`) 
            VALUES ('$lrn','$phase8_remedial_from','$phase8_remedial_to','$phase8_remedial_learning_areas_1',' $phase8_remedial_final_rating_1','$phase8_remedial_class_mark_1','$phase8_recomputed_final_grade_1','$phase8','$phase8_remedial_term','$phase8_remedial_remarks_1','$dateCreated','$dateUpdated')";
            
            $phase8_run_query = mysqli_query($conn,$phase8_remedial_query);

            if($phase8_run_query){
            echo "remedial query success <br>";
            }
            else
            {
                $conn->error;
            }
                
        }



             elseif($phase8_remedial_term ==2) {
                

            $phase8_remedial_query= "INSERT INTO `remedial_classes`(`lrn`, `date_from`, `date_to`, `learning_areas`, `final_rating`, `remedial_class_mark`, `recomputed_final_grade`, `phase`, `term`, `remarks`, `date_time_created`, `date_time_updated`) 
            VALUES ('$lrn','$phase8_remedial_from','$phase8_remedial_to','$phase8_remedial_learning_areas_2',' $phase8_remedial_final_rating_2','$phase8_remedial_class_mark_2','$phase8_recomputed_final_grade_2','$phase8','$phase8_remedial_term','$phase8_remedial_remarks_2','$dateCreated','$dateUpdated')";
            
            $phase8_run_query = mysqli_query($conn,$phase8_remedial_query);

                if($phase8_run_query){
                    echo "remedial query success term2  <br>";
                }
                    else
                    {
                        $conn->error;
                    }
        }   
        }




        }

























    }
?>
</body>
</html>