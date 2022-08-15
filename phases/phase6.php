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
    <title>Phase 6</title>
 </head>
 <body>

 <form action="phase6.php" method="POST">

 <!-- Phase 6 -->
<div class="form-container" style="padding:0 0 7px 7px;">
        <section class="header">
            <span class="d-flex justify-content-between">

            <label for="">Learner Reference Number (LRN):</label>
            <input type="number" style="margin: 0 1em 0 0; width:30%;" name="lrn" required>

                <span>
                    <label>School:</label>
                    <input type="text" id="text-only" name="phase6_name_of_school"  class="school">
                </span>
                <span>
                    <label>School ID:</label>
                    <input type="text" name="phase6_school_id" id="dash"class="school_id">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                    <label>District:</label>
                    <input type="text" class="w-50" name="phase6_district" class="district">
                </span>
                <span>
                    <label>Division:</label>
                    <input type="text" class="w-50" name="phase6_division" class="division">
                </span>
                <span class="text-end">
                    <label>Region:</label>
                    <input type="text" class="w-50" name="phase6_region" id="dash"class="region">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                    <label>Classified as Grade:</label>
                    <input type="number" id="number-only" style="width: 20%;" name="phase6_classified_as_grade">
                </span>
                <span>
                    <label>Section:</label>
                    <input type="text" class="w-50" name="phase6_section"> 
                </span>
                <span>
                    <label>School Year:</label>
                    <input type="text" class="w-50" name="phase6_school_year" id="dash">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                <label for="">Name of Adviser:</label>
                <input type="text" id="text-only" name="phase6_name_of_teacher">
                </span>
                <span>
                    <label>Signature:</label>
                    <input type="text" id="text-only" name="phase6_signature" class="school_id">
                </span>
            </span>
        </section>
        <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
            <thead>
                <tr>
                    <th rowspan="2" style="width:40%;"><h6 style="font-size:12pt; font-weight:600; padding:0 0 5px 0;">LEARNING AREAS</h6></th>
                    <th colspan="4">Quarterly Rating</th>
                    <th rowspan="2">Final Rating</th>
                    <th rowspan="2" style="width:15%;"><h5 style="font-size:12pt; font-weight:600; padding:0 0 5px 0;">Remarks</h5></th>
                </tr>
                <tr style="width: 5%;">
                    <th><input type="hidden" value="1" readonly>1</th>
                    <th><input type="hidden" value="2" readonly>2</th>
                    <th><input type="hidden" value="3" readonly>3</th>
                    <th><input type="hidden" value="4" readonly>4</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-start fw-bold">Mother Tongue</td>
                    <td><input type="number" name="term1_phase6_mother_tongue" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase6_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase6_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase6_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Filipino</td>
                    <td><input type="number" name="term1_phase6_filipino" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase6_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase6_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase6_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">English</td>
                    <td><input type="number" name="term1_phase6_english" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase6_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase6_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase6_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only"readonly ></td>
                    <td></td>
                </tr>
                    <td class="text-start fw-bold">Mathematics</td>
                    <td><input type="number" name="term1_phase6_mathematics" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase6_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase6_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase6_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Science</td>
                    <td><input type="number" name="term1_phase6_science" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase6_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase6_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase6_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Araling Panlipunan</td>
                    <td><input type="number" name="term1_phase6_araling_panlipunan" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase6_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase6_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase6_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">EPP/TLE</td>
                    <td><input type="number" name="term1_phase6_epp_tle" id="grade"  title="Please input 2 Numbers only" ></td>           
                    <td><input type="number" name="term2_phase6_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase6_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase6_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">MAPEH</td>
                    <td><input type="text" name="term1_phase2_mapeh" readonly></td>
                    <td><input type="text" name="term2_phase2_mapeh" readonly></td>
                    <td><input type="text" name="term3_phase2_mapeh" readonly></td>
                    <td><input type="text" name="term4_phase2_mapeh" readonly></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>               
                    <td class="text-start"><i>Music</i></td>           
                    <td><input type="number" name="term1_phase6_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase6_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase6_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase6_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Arts</i></td>
                    <td><input type="number" name="term1_phase6_arts" id="grade" title="Please input 2 Numbers only" ></td>       
                    <td><input type="number" name="term2_phase6_arts"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase6_arts" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase6_arts"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Physical Education</i></td>
                    <td><input type="number" name="term1_phase6_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase6_pe"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase6_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase6_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Health</i></td>
                    <td><input type="number" name="term1_phase6_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase6_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase6_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase6_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Edukasyon sa Pagpapakatao</td>
                    <td><input type="number" name="term1_phase6_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase6_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase6_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase6_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start">*Arabic Language</td>        
                    <td><input type="number" name="term1_phase6_arabic_language" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase6_arabic_language" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase6_arabic_language"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase6_arabic_language" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only"readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start">*Islamic Values Education</td>
                    <td><input type="number" name="term1_phase6_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase6_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase6_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase6_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only"readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">General Average</td>
                    <td><input type="number" name="general_average1" id="grade" title="Please input 2 Numbers only"readonly></td>
                    <td><input type="number" name="general_average2" id="grade" title="Please input 2 Numbers only"readonly></td>
                    <td><input type="number" name="general_average3" id="grade" title="Please input 2 Numbers only"readonly></td>
                    <td><input type="number" name="general_average4" id="grade" title="Please input 2 Numbers only"readonly></td>
                    <td><input type="number" name="general_average5" id="grade" title="Please input 2 Numbers only"readonly></td>
                </tr>
            </tbody>
        </table>
        <!-- Remedial Table PHASE 6 -->
        <table class="table-condensed text-center w-100">
            <thead> 
                <tr>
                    <th colspan="2">Remedial Classes</th>
                    <th colspan="4">
                        <span class="d-flex flex-row justify-content-between">
                            <span>
                                <label for="">Date conducted: </label>
                                <input type="date" class="datefrom"  name="phase6_remedial_from">
                            </span>
                            <span>
                                <label for="">To: </label>
                                <input type="date" class="dateto" name="phase6_remedial_to" >
                            </span>
                        </span>
                    </th>
                </tr>
                <tr>
                    <th>Learning Areas</th>
                    <th>Final Rating</th>
                    <th>Remarks</th>
                    <th>Recomputed Final Grade</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" class="learning-areas1" name="phase6_remedial_learning_areas_1"></td>
                    <td><input type="number" id="grade" class="final_rating1" name="phase6_remedial_final_rating_1"></td>
                    <td><input type="text" name="phase6_remedial_class_mark_1" id=""></td>
                    <td><input type="number" id="grade" name="phase6_recomputed_final_grade_1" title="Please input 2 Numbers only"></td>
                    <td><input type="text" name="phase6_remedial_remarks_1" id=""></td>
                </tr>
                <tr>
                    <td><input type="text" class="learning_areas2" name="phase6_remedial_learning_areas_2"></td>
                    <td><input type="number" id="grade" class="final_rating2" name="phase6_remedial_final_rating_2"></td>
                    <td><input type="text" name="phase6_remedial_class_mark_2" id=""> </td>
                    <td><input type="number" id="grade" name="phase6_recomputed_final_grade_2" title="Please input 2 Numbers only"></td>
                    <td><input type="text" name="phase6_remedial_remarks_2" id=""></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

 <input type="submit" name="next">
 </form>
    
 </body>
 </html>




<?php

if(isset($_POST['next'])){

    $lrn = $_POST['lrn'];
    $dateCreated = date("m-d-Y h:i:a");
    $dateUpdated = date("m-d-Y h:i:a");
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


///Phase 6
$phase6 = '6';
$phase6_name_of_school = $_POST['phase6_name_of_school'];
$phase6_school_id = $_POST['phase6_school_id'];
$phase6_district = $_POST['phase6_district'];
$phase6_division = $_POST['phase6_division'];
$phase6_region = $_POST['phase6_region'];
$phase6_classified_as_grade = $_POST['phase6_classified_as_grade'];
$phase6_section = $_POST['phase6_section'];
$phase6_school_year = $_POST['phase6_school_year'];
$phase6_name_of_teacher = $_POST['phase6_name_of_teacher'];
$phase6_signature = $_POST['phase6_signature'];
$phase6_remarks = 'none';

//term1_phase6 grades
$term1_phase6 = 1;
$term1_phase6_mother_tongue = intval($_POST['term1_phase6_mother_tongue']);
$term1_phase6_filipino = intval($_POST['term1_phase6_filipino']);
$term1_phase6_english = intval($_POST['term1_phase6_english']);
$term1_phase6_mathematics = intval($_POST['term1_phase6_mathematics']);
$term1_phase6_science = intval($_POST['term1_phase6_science']);
$term1_phase6_araling_panlipunan = intval($_POST['term1_phase6_araling_panlipunan']);
$term1_phase6_epp_tle = intval($_POST['term1_phase6_epp_tle']);
$term1_phase6_music = intval($_POST['term1_phase6_music']);
$term1_phase6_arts = intval($_POST['term1_phase6_arts']);
$term1_phase6_pe = intval($_POST['term1_phase6_pe']);
$term1_phase6_health = intval($_POST['term1_phase6_health']);
$term1_phase6_esp = intval($_POST['term1_phase6_esp']);
$term1_phase6_arabic_language = intval($_POST['term1_phase6_arabic_language']);
$term1_phase6_islamic_values = intval($_POST['term1_phase6_islamic_values']);
$term1_phase6_remarks = 'none'; 

//term2_phase6 grades
//term2_phase6 
$term2_phase6 = 2;
$term2_phase6_mother_tongue = intval($_POST['term2_phase6_mother_tongue']);
$term2_phase6_filipino = intval($_POST['term2_phase6_filipino']);
$term2_phase6_english = intval($_POST['term2_phase6_english']);
$term2_phase6_mathematics = intval($_POST['term2_phase6_mathematics']);
$term2_phase6_science = intval($_POST['term2_phase6_science']);
$term2_phase6_araling_panlipunan = intval($_POST['term2_phase6_araling_panlipunan']);
$term2_phase6_epp_tle = intval($_POST['term2_phase6_epp_tle']);
$term2_phase6_music = intval($_POST['term2_phase6_music']);
$term2_phase6_arts = intval($_POST['term2_phase6_arts']);
$term2_phase6_pe = intval($_POST['term2_phase6_pe']);
$term2_phase6_health = intval($_POST['term2_phase6_health']);
$term2_phase6_esp = intval($_POST['term2_phase6_esp']);
$term2_phase6_arabic_language = intval($_POST['term2_phase6_arabic_language']);
$term2_phase6_islamic_values = intval($_POST['term2_phase6_islamic_values']);
$term2_phase6_remarks = 'none'; 

//term3_phase6
//term3_phase6 grades

$term3_phase6 = 3;
$term3_phase6_mother_tongue = intval($_POST['term3_phase6_mother_tongue']);
$term3_phase6_filipino = intval($_POST['term3_phase6_filipino']);
$term3_phase6_english = intval($_POST['term3_phase6_english']);
$term3_phase6_mathematics = intval($_POST['term3_phase6_mathematics']);
$term3_phase6_science = intval($_POST['term3_phase6_science']);
$term3_phase6_araling_panlipunan = intval($_POST['term3_phase6_araling_panlipunan']);
$term3_phase6_epp_tle = intval($_POST['term3_phase6_epp_tle']);
$term3_phase6_music = intval($_POST['term3_phase6_music']);
$term3_phase6_arts = intval($_POST['term3_phase6_arts']);
$term3_phase6_pe = intval($_POST['term3_phase6_pe']);
$term3_phase6_health = intval($_POST['term3_phase6_health']);
$term3_phase6_esp = intval($_POST['term3_phase6_esp']);
$term3_phase6_arabic_language = intval($_POST['term3_phase6_arabic_language']);
$term3_phase6_islamic_values = intval($_POST['term3_phase6_islamic_values']);
$term3_phase6_remarks = 'none'; 

//term4_phase6
//term4_phase6 grades

$term4_phase6 = 4;
$term4_phase6_mother_tongue = intval($_POST['term4_phase6_mother_tongue']);
$term4_phase6_filipino = intval($_POST['term4_phase6_filipino']);
$term4_phase6_english = intval($_POST['term4_phase6_english']);
$term4_phase6_mathematics = intval($_POST['term4_phase6_mathematics']);
$term4_phase6_science = intval($_POST['term4_phase6_science']);
$term4_phase6_araling_panlipunan = intval($_POST['term4_phase6_araling_panlipunan']);
$term4_phase6_epp_tle = intval($_POST['term4_phase6_epp_tle']);
$term4_phase6_music = intval($_POST['term4_phase6_music']);
$term4_phase6_arts = intval($_POST['term4_phase6_arts']);
$term4_phase6_pe = intval($_POST['term2_phase6_pe']);
$term4_phase6_health = intval($_POST['term4_phase6_health']);
$term4_phase6_esp = intval($_POST['term4_phase6_esp']);
$term4_phase6_arabic_language = intval($_POST['term4_phase6_arabic_language']);
$term4_phase6_islamic_values = intval($_POST['term4_phase6_islamic_values']);
$term4_phase6_remarks = 'none';

//phase 6 remedial

$phase6_remedial_from = date("Y-m-d",strtotime($_POST['phase6_remedial_from']));
$phase6_remedial_to = date("Y-m-d" ,strtotime($_POST['phase6_remedial_to']));
$phase6_remedial_learning_areas_1 = $_POST['phase6_remedial_learning_areas_1'] ;
$phase6_remedial_final_rating_1 =$_POST['phase6_remedial_final_rating_1'];
$phase6_remedial_class_mark_1 = $_POST['phase6_remedial_class_mark_1'];
$phase6_recomputed_final_grade_1 = $_POST['phase6_recomputed_final_grade_1'];
$phase6_remedial_remarks_1 = $_POST['phase6_remedial_remarks_1'];

$phase6_remedial_learning_areas_2 = $_POST['phase6_remedial_learning_areas_2'] ;
$phase6_remedial_final_rating_2 =$_POST['phase6_remedial_final_rating_2'];
$phase6_remedial_class_mark_2 = $_POST['phase6_remedial_class_mark_2'];
$phase6_recomputed_final_grade_2 = $_POST['phase6_recomputed_final_grade_2'];
$phase6_remedial_remarks_2 = $_POST['phase6_remedial_remarks_2'];


//phase 6 average of mapeh

$phase6_term1_average_mapeh_numbers = array($term1_phase6_music, $term1_phase6_arts, $term1_phase6_pe, $term1_phase6_health);
$phase6_term1_average_mapeh_sum = array_sum($phase6_term1_average_mapeh_numbers);
$phase6_term1_average_mapeh_count = count(array_filter($phase6_term1_average_mapeh_numbers));
$term1_phase6_average_of_mapeh = $phase6_term1_average_mapeh_sum / $phase6_term1_average_mapeh_count;


$phase6_term2_average_mapeh_numbers = array($term2_phase6_music, $term2_phase6_arts, $term2_phase6_pe, $term2_phase6_health);
$phase6_term2_average_mapeh_sum = array_sum($phase6_term2_average_mapeh_numbers);
$phase6_term2_average_mapeh_count = count(array_filter($phase6_term2_average_mapeh_numbers));
$term2_phase6_average_of_mapeh = $phase6_term2_average_mapeh_sum / $phase6_term2_average_mapeh_count;


$phase6_term3_average_mapeh_numbers = array($term3_phase6_music, $term3_phase6_arts, $term3_phase6_pe, $term3_phase6_health);
$phase6_term3_average_mapeh_sum = array_sum($phase6_term3_average_mapeh_numbers);
$phase6_term3_average_mapeh_count = count(array_filter($phase6_term3_average_mapeh_numbers));
$term3_phase6_average_of_mapeh = $phase6_term3_average_mapeh_sum / $phase6_term3_average_mapeh_count;



$phase6_term4_average_mapeh_numbers = array($term4_phase6_music, $term4_phase6_arts, $term4_phase6_pe, $term4_phase6_health);
$phase6_term4_average_mapeh_sum = array_sum($phase6_term4_average_mapeh_numbers);
$phase6_term4_average_mapeh_count = count(array_filter($phase6_term4_average_mapeh_numbers));
$term4_phase6_average_of_mapeh = $phase6_term4_average_mapeh_sum / $phase6_term4_average_mapeh_count;



// phase 6 final rating

$phase6_term5 ='Final Rating';


// $phase6_final_rating_mother_tongue = round(($term1_phase6_mother_tongue + $term2_phase6_mother_tongue + 
// $term3_phase6_mother_tongue + $term4_phase6_mother_tongue) / 4);
$phase6_mt_numbers = array($term1_phase6_mother_tongue, $term2_phase6_mother_tongue, $term3_phase6_mother_tongue,$term4_phase6_mother_tongue);
$phase6_mt_sum = array_sum($phase6_mt_numbers);
$phase6_mt_count = count(array_filter($phase6_mt_numbers));
$phase6_final_rating_mother_tongue = $phase6_mt_sum / $phase6_mt_count;


// $phase6_final_rating_filipino = round(($term1_phase6_filipino + $term2_phase6_filipino + $term3_phase6_filipino + $term4_phase6_filipino) / 4);

$phase6_filipino_numbers = array($term1_phase6_filipino, $term2_phase6_filipino, $term3_phase6_filipino, $term4_phase6_filipino);
$phase6_filipino_sum = array_sum($phase6_filipino_numbers);
$phase6_filipino_count = count(array_filter($phase6_filipino_numbers));
$phase6_final_rating_filipino = $phase6_filipino_sum / $phase6_filipino_count;

// $phase6_final_rating_english = round(($term1_phase6_english + $term2_phase6_english + $term3_phase6_english + $term4_phase6_english) / 4);

$phase6_english_numbers = array($term1_phase6_english, $term2_phase6_english, $term3_phase6_english, $term4_phase6_english);
$phase6_english_sum = array_sum($phase6_english_numbers);
$phase6_english_count = count(array_filter($phase6_english_numbers));
$phase6_final_rating_english = $phase6_english_sum / $phase6_english_count;


// $phase6_final_rating_math = round(($term1_phase6_mathematics + $term2_phase6_mathematics + $term3_phase6_mathematics + $term4_phase6_mathematics ) / 4);

$phase6_math_numbers = array($term1_phase6_mathematics, $term2_phase6_mathematics,  $term3_phase6_mathematics, $term4_phase6_mathematics);
$phase6_math_sum = array_sum($phase6_math_numbers);
$phase6_math_count = count(array_filter($phase6_math_numbers));
$phase6_final_rating_math = $phase6_math_sum / $phase6_math_count;

// $phase6_final_rating_science = round(($term1_phase6_science + $term2_phase6_science + $term3_phase6_science + $term4_phase6_science) / 4);

$phase6_science_numbers = array($term1_phase6_science, $term2_phase6_science, $term3_phase6_science, $term4_phase6_science);
$phase6_science_sum = array_sum($phase6_science_numbers);
$phase6_science_count = count(array_filter($phase6_science_numbers));
$phase6_final_rating_science = $phase6_science_sum / $phase6_science_count;

// $phase6_final_rating_AP = round(($term1_phase6_araling_panlipunan + $term2_phase6_araling_panlipunan + $term3_phase6_araling_panlipunan + $term4_phase6_araling_panlipunan) / 4);

$phase6_ap_numbers = array($term1_phase6_araling_panlipunan, $term2_phase6_araling_panlipunan, $term3_phase6_araling_panlipunan, $term4_phase6_araling_panlipunan);
$phase6_ap_sum = array_sum($phase6_ap_numbers);
$phase6_ap_count = count(array_filter($phase6_ap_numbers));
$phase6_final_rating_AP = $phase6_ap_sum / $phase6_ap_count;

// $phase6_final_rating_epp_tle = round(($term1_phase6_epp_tle + $term2_phase6_epp_tle + $term3_phase6_epp_tle + $term4_phase6_epp_tle) / 4);

$phase6_epp_tle_numbers = array($term1_phase6_epp_tle, $term2_phase6_epp_tle, $term3_phase6_epp_tle, $term4_phase6_epp_tle);
$phase6_epp_tle_sum = array_sum($phase6_epp_tle_numbers);
$phase6_epp_tle_count = count(array_filter($phase6_epp_tle_numbers));
$phase6_final_rating_epp_tle = $phase6_epp_tle_sum / $phase6_epp_tle_count;

// $phase6_final_rating_mapeh = round(($term1_phase6_average_of_mapeh + $term2_phase6_average_of_mapeh + $term3_phase6_average_of_mapeh + $term4_phase6_average_of_mapeh) / 4 );

$phase6_mapeh_numbers = array($term1_phase6_average_of_mapeh, $term2_phase6_average_of_mapeh, $term3_phase6_average_of_mapeh, $term4_phase6_average_of_mapeh);
$phase6_mapeh_sum = array_sum($phase6_mapeh_numbers);
$phase6_mapeh_count = count(array_filter($phase6_mapeh_numbers));
$phase6_final_rating_mapeh = $phase6_mapeh_sum / $phase6_mapeh_count;

// $phase6_final_rating_music = round(($term1_phase6_music + $term2_phase6_music + $term3_phase6_music + $term4_phase6_music) / 4);

$phase6_music_numbers = array($term1_phase6_music, $term2_phase6_music, $term3_phase6_music, $term4_phase6_music);
$phase6_music_sum = array_sum($phase6_music_numbers);
$phase6_music_count = count(array_filter($phase6_music_numbers));
$phase6_final_rating_music =  $phase6_music_sum / $phase6_music_count;

// $phase6_final_rating_arts = round(($term1_phase6_arts + $term2_phase6_arts + $term3_phase6_arts + $term4_phase6_arts ) / 4);

$phase6_arts_numbers = array($term1_phase6_arts, $term2_phase6_arts, $term3_phase6_arts, $term4_phase6_arts);
$phase6_arts_sum = array_sum($phase6_arts_numbers);
$phase6_arts_count = count(array_filter($phase6_ap_numbers));
$phase6_final_rating_arts =  $phase6_arts_sum / $phase6_arts_count;

// $phase6_final_rating_PE = round(($term1_phase6_pe + $term2_phase6_pe + $term3_phase6_pe + $term4_phase6_pe) / 4);

$phase6_pe_numbers = array($term1_phase6_pe, $term2_phase6_pe, $term3_phase6_pe, $term4_phase6_pe);
$phase6_pe_sum = array_sum($phase6_pe_numbers);
$phase6_pe_count = count(array_filter($phase6_pe_numbers));
$phase6_final_rating_PE = $phase6_pe_sum / $phase6_pe_count;

// $phase6_final_rating_health = round(($term1_phase6_health + $term2_phase6_health + $term3_phase6_health + $term4_phase6_health)/ 4);

$phase6_health_numbers = array($term1_phase6_health, $term2_phase6_health, $term3_phase6_health, $term4_phase6_health);
$phase6_health_sum = array_sum($phase6_health_numbers);
$phase6_health_count = count(array_filter($phase6_health_numbers));
$phase6_final_rating_health = $phase6_health_sum / $phase6_health_count;

// $phase6_final_rating_esp = round(($term1_phase6_esp + $term2_phase6_esp + $term3_phase6_esp + $term4_phase6_esp) / 4);

$phase6_esp_numbers = array($term1_phase6_esp, $term2_phase6_esp, $term3_phase6_esp, $term4_phase6_esp);
$phase6_esp_sum = array_sum($phase6_esp_numbers);
$phase6_esp_count = count (array_filter($phase6_esp_numbers));
$phase6_final_rating_esp = $phase6_esp_sum / $phase6_esp_count;



// $phase6_final_rating_arabic_language = round(($term1_phase6_arabic_language + $term2_phase6_arabic_language + $term3_phase6_arabic_language + $term4_phase6_arabic_language) / 4);

$phase6_arabic_numbers = array($term1_phase6_arabic_language, $term2_phase6_arabic_language, $term3_phase6_arabic_language, $term4_phase6_arabic_language);
$phase6_arabic_sum = array_sum($phase6_arabic_numbers);
$phase6_arabic_count = count(array_filter($phase6_arabic_numbers));
$phase6_final_rating_arabic_language = $phase6_arabic_sum / $phase6_arabic_count;

// $phase6_final_rating_islamic_values = round(($term1_phase6_islamic_values + $term2_phase6_islamic_values + $term3_phase6_islamic_values + $term4_phase6_islamic_values) / 4);

$phase6_islamic_numbers = array($term1_phase6_islamic_values, $term2_phase6_islamic_values, $term3_phase6_islamic_values, $term4_phase6_islamic_values);
$phase6_islamic_sum = array_sum($phase6_islamic_numbers);
$phase6_islamic_count = count(array_filter($phase6_islamic_numbers));
$phase6_final_rating_islamic_values = $phase6_islamic_sum / $phase6_islamic_count;


// validation of mother tongue


 if($phase6_final_rating_mother_tongue >= 75){
    $phase6_final_rating_mother_tongue_output = 'PASSED';
}else{
    $phase6_final_rating_mother_tongue_output = 'FAILED';
}

if($phase6_final_rating_filipino >= 75){
    $phase6_final_rating_filipino_output = 'PASSED';
}else{
    $phase6_final_rating_filipino_output ='FAILED';
}

if($phase6_final_rating_english >= 75){
    $phase6_final_rating_english_output ='PASSED';
}else{
    $phase6_final_rating_english_output = 'FAILED';
}

if($phase6_final_rating_math >= 75){
    $phase6_final_rating_math_output = 'PASSED';
}else{
    $phase6_final_rating_math_output =  'FAILED';
}

if($phase6_final_rating_science >= 75){
    $phase6_final_rating_science_output = 'PASSED';
}else{
    $phase6_final_rating_science_output = 'FAILED';
}

if($phase6_final_rating_AP >= 75){
    $phase6_final_rating_AP_output = 'PASSED';
}else{
    $phase6_final_rating_AP_output = 'FAILED';
}

if($phase6_final_rating_epp_tle >= 75){
    $phase6_final_rating_epp_tle_output = 'PASSED';
}else{
    $phase6_final_rating_epp_tle_output = 'FAILED';
}

if($phase6_final_rating_mapeh >= 75){
    $phase6_final_rating_mapeh_output = 'PASSED';
}else{
    $phase6_final_rating_mapeh_output = 'FAILED';
}

if($phase6_final_rating_music >= 75){
    $phase6_final_rating_music_output = 'PASSED';
}else{
    $phase6_final_rating_music_output = 'FAILED';
}

if($phase6_final_rating_arts >= 75){
    $phase6_final_rating_arts_output = 'PASSED';
}else{
    $phase6_final_rating_arts_output = 'FAILED';
}

if($phase6_final_rating_PE >= 75){
    $phase6_final_rating_PE_output = 'PASSED';
}else{
    $phase6_final_rating_PE_output ='FAILED';
}

if($phase6_final_rating_health >= 75){
    $phase6_final_rating_health_output = 'PASSED';
}else{
    $phase6_final_rating_health_output = 'FAILED';
}

if($phase6_final_rating_esp >= 75){
    $phase6_final_rating_esp_output = 'PASSED';
}else{
    $phase6_final_rating_esp_output = 'FAILED';
}

if($phase6_final_rating_arabic_language >= 75){
    $phase6_final_rating_arabic_language_output = 'PASSED';
}else{
    $phase6_final_rating_arabic_language_output = 'FAILED';
}

if($phase6_final_rating_islamic_values >= 75){
    $phase6_final_rating_islamic_values_output = 'PASSED';
}else{
    $phase6_final_rating_islamic_values_output = 'FAILED';
}


// phase 6 general average phase 6

// $phase6_term1_general_average = round(($term1_phase6_mother_tongue + $term1_phase6_filipino + $term1_phase6_english + $term1_phase6_mathematics + $term1_phase6_science + $term1_phase6_araling_panlipunan + $term1_phase6_epp_tle + $term1_phase6_average_of_mapeh + $term1_phase6_esp) / 9);

$phase6_term1_gen_numbers = array($term1_phase6_mother_tongue + $term1_phase6_filipino + $term1_phase6_english + $term1_phase6_mathematics + $term1_phase6_science + $term1_phase6_araling_panlipunan, $term1_phase6_epp_tle, $term1_phase6_average_of_mapeh, $term1_phase6_esp);
$phase6_term1_gen_sum = array_sum($phase6_term1_gen_numbers);
$phase6_term1_gen_count = count(array_filter($phase6_term1_gen_numbers));
$phase6_term1_general_average = $phase6_term1_gen_sum / $phase6_term1_gen_count;

// $phase6_term2_general_average = round(($term2_phase6_mother_tongue + $term2_phase6_filipino + $term2_phase6_english + $term2_phase6_mathematics + $term2_phase6_science + $term2_phase6_araling_panlipunan + $term2_phase6_epp_tle + $term2_phase6_average_of_mapeh + $term2_phase6_esp) / 9);
$phase6_term2_gen_numbers = array($term2_phase6_mother_tongue, $term2_phase6_filipino, $term2_phase6_english + $term2_phase6_mathematics, $term2_phase6_science + $term2_phase6_araling_panlipunan, $term2_phase6_epp_tle, $term2_phase6_average_of_mapeh, $term2_phase6_esp);
$phase6_term2_gen_sum = array_sum($phase6_term2_gen_numbers);
$phase6_term2_gen_count = count(array_filter($phase6_term2_gen_numbers));
$phase6_term2_general_average = $phase6_term2_gen_sum / $phase6_term2_gen_count;

// $phase6_term3_general_average = round(($term3_phase6_mother_tongue + $term3_phase6_filipino + $term3_phase6_english + $term3_phase6_mathematics + $term3_phase6_science + $term3_phase6_araling_panlipunan + $term3_phase6_epp_tle + $term3_phase6_average_of_mapeh + $term3_phase6_esp) / 9);

$phase6_term3_gen_numbers = array($term3_phase6_mother_tongue, $term3_phase6_filipino, $term3_phase6_english, $term3_phase6_mathematics, $term3_phase6_science + $term3_phase6_araling_panlipunan, $term3_phase6_epp_tle, $term3_phase6_average_of_mapeh, $term3_phase6_esp);
$phase6_term3_gen_sum = array_sum($phase6_term3_gen_numbers);
$phase6_term3_gen_count = count(array_filter($phase6_term3_gen_numbers));
$phase6_term3_general_average = $phase6_term3_gen_sum / $phase6_term3_gen_count;



// $phase6_term4_general_average = round(($term4_phase6_mother_tongue + $term4_phase6_filipino + $term4_phase6_english + $term4_phase6_mathematics + $term4_phase6_science + $term4_phase6_araling_panlipunan + $term4_phase6_epp_tle + $term4_phase6_average_of_mapeh + $term4_phase6_esp) / 9);

$phase6_term4_gen_numbers = array($term4_phase6_mother_tongue, $term4_phase6_filipino, $term4_phase6_english, $term4_phase6_mathematics, $term4_phase6_science + $term4_phase6_araling_panlipunan, $term4_phase6_epp_tle, $term4_phase6_average_of_mapeh, $term4_phase6_esp);
$phase6_term4_gen_sum = array_sum($phase6_term4_gen_numbers);
$phase6_term4_gen_count = count(array_filter($phase6_term4_gen_numbers));
$phase6_term4_general_average = $phase6_term4_gen_sum / $phase6_term4_gen_count;




// $phase6_term5_general_average = round(($phase6_final_rating_mother_tongue  + $phase6_final_rating_filipino + $phase6_final_rating_english + $phase6_final_rating_math + $phase6_final_rating_science + $phase6_final_rating_AP + $phase6_final_rating_epp_tle + $phase6_final_rating_mapeh + $phase6_final_rating_esp) / 9);


$phase6_term5_gen_numbers = array($phase6_final_rating_mother_tongue  + $phase6_final_rating_filipino + $phase6_final_rating_english, $phase6_final_rating_math, $phase6_final_rating_science, $phase6_final_rating_AP, $phase6_final_rating_epp_tle, $phase6_final_rating_mapeh, $phase6_final_rating_esp);
$phase6_term5_gen_sum = array_sum($phase6_term5_gen_numbers);
$phase6_term5_gen_count = count(array_filter($phase6_term5_gen_numbers));
$phase6_term5_general_average = $phase6_term5_gen_sum / $phase6_term5_gen_count;


//Phase6 Insert Scholastic Records

$phase6_insert_scholastic_records = "INSERT INTO scholastic_records (lrn,school,school_id,district,division,region,classified_as_grade,section,school_year,name_of_teacher,signature,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn' ,'$phase6_name_of_school', '$phase6_school_id' , '$phase6_district', '$phase6_division', '$phase6_region', '$phase6_classified_as_grade', '$phase6_section', '$phase6_school_year', '$phase6_name_of_school', '$phase6_signature', '$phase6','$phase6_remarks', '$dateCreated', '$dateUpdated')";

$phase6_run_scholastic_records = mysqli_query($conn,$phase6_insert_scholastic_records);
if($phase6_run_scholastic_records){

    //inserting of students grades

    //phase 6 term 1 mother tongue


    $insert_student_grades_term1_phase6_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term1_phase6_mother_tongue','$term1_phase6', '$phase6', '$term1_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase6_mother_tongue = mysqli_query($conn,$insert_student_grades_term1_phase6_mother_tongue);
    
    if($insert_student_grades_term1_phase6_mother_tongue){
        echo"term1 mothertongue";
    }

    else{
        $conn->error;;
    }

    //phase 6 term 1 filipino

    $insert_student_grades_term1_phase6_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term1_phase6_filipino','$term1_phase6', '$phase6', '$term1_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase6_filipino = mysqli_query($conn,$insert_student_grades_term1_phase6_filipino);
    
    if($insert_student_grades_term1_phase6_filipino){
        echo"term1 Filipino";
    }

    else{
        $conn->error;
    }

    //phase 6 term 1 english

    $insert_student_grades_term1_phase6_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term1_phase6_english','$term1_phase6', '$phase6', '$term1_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase6_english = mysqli_query($conn,$insert_student_grades_term1_phase6_english);
    
    if($insert_student_grades_term1_phase6_english){
        echo"term1 english";
    }

    else{
        $conn->error;
    }

    //phase 6 term 1 math

    $insert_student_grades_term1_phase6_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term1_phase6_mathematics','$term1_phase6', '$phase6', '$term1_phase6_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term1_phase6_math = mysqli_query($conn,$insert_student_grades_term1_phase6_math);
    
    if($insert_student_grades_term1_phase6_math){
        echo"term1 math";
    }

    else{
        $conn->error;
    }

    //phase 6 term 1 science

    $insert_student_grades_term1_phase6_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term1_phase6_science','$term1_phase6', '$phase6', '$term1_phase6_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term1_phase6_science = mysqli_query($conn,$insert_student_grades_term1_phase6_science);
    
    if($insert_student_grades_term1_phase6_science){
        echo"term1 science";
    }

    else{
        $conn->error;
    }

    //phase 6 term 1 ap 

    $insert_student_grades_term1_phase6_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term1_phase6_araling_panlipunan','$term1_phase6', '$phase6', '$term1_phase6_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term1_phase6_ap = mysqli_query($conn,$insert_student_grades_term1_phase6_ap);
    
    if($insert_student_grades_term1_phase6_ap){
        echo"term1 Araling panlipunan";
    }

    else{
        $conn->error;
    }

    //phase 6 term 1 epp tle

    $insert_student_grades_term1_phase6_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term1_phase6_epp_tle','$term1_phase6', '$phase6', '$term1_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase6_epp_tle = mysqli_query($conn,$insert_student_grades_term1_phase6_epp_tle);
    
    if($insert_student_grades_term1_phase6_epp_tle){
        echo"term1 EPP_TLE";
    }

    else{
        $conn->error;
    }

    //phase 6 term 1 mapeh

    $insert_student_grades_term1_phase6_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term1_phase6_average_of_mapeh','$term1_phase6', '$phase6', '$term1_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase6_mapeh = mysqli_query($conn,$insert_student_grades_term1_phase6_mapeh);

      if($run_student_grades_term1_phase6_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }


        //phase 6 term 1 music

    $insert_student_grades_term1_phase6_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term1_phase6_music','$term1_phase6', '$phase6', '$term1_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase6_music = mysqli_query($conn,$insert_student_grades_term1_phase6_music);

       if($run_student_grades_term1_phase6_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }

        //phase 6 term 1 arts

    $insert_student_grades_term1_phase6_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term1_phase6_arts','$term1_phase6', '$phase6', '$term1_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase6_arts = mysqli_query($conn,$insert_student_grades_term1_phase6_arts);


        if($run_student_grades_term1_phase6_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }

            //phase 6 term 1 pe

    $insert_student_grades_term1_phase6_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term1_phase6_pe','$term1_phase6', '$phase6', '$term1_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase6_pe = mysqli_query($conn,$insert_student_grades_term1_phase6_pe);

        if($run_student_grades_term1_phase6_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }

            //phase 6 term 1 health

    $insert_student_grades_term1_phase6_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term1_phase6_health','$term1_phase6', '$phase6', '$term1_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase6_health = mysqli_query($conn,$insert_student_grades_term1_phase6_health);

         if($run_student_grades_term1_phase6_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }

            //phase 6 term 1 esp

    $insert_student_grades_term1_phase6_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term1_phase6_esp','$term1_phase6', '$phase6', '$term1_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase6_esp = mysqli_query($conn,$insert_student_grades_term1_phase6_esp);

        if($run_student_grades_term1_phase6_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }

            //phase 6 term 1 arabic

    $insert_student_grades_term1_phase6_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term1_phase6_arabic_language','$term1_phase6', '$phase6', '$term1_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase6_arabic = mysqli_query($conn,$insert_student_grades_term1_phase6_arabic);

    if($run_student_grades_term1_phase6_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }

        //phase 6 term 1 islamic

    $insert_student_grades_term1_phase6_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$islamic_values', '$term1_phase6_islamic_values','$term1_phase6', '$phase6', '$term1_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase6_islamic = mysqli_query($conn,$insert_student_grades_term1_phase6_islamic);

    if($run_student_grades_term1_phase6_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term1_phase6 islamic" . '<br>';
        }
            //general average phase 6
        $insert_phase6_term1_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase6_term1_general_average','$term1_phase6','$phase6','$phase6_remarks','$dateCreated','$dateUpdated');";
        $run_phase6_term1_student_averages = mysqli_query($conn,$insert_phase6_term1_general_average);

        if($run_phase6_term1_student_averages){
            echo "added student averages term1";
        
            
        }else{
            echo "error student_averages" . $conn->error;
        }
        //phase 6 term 1  ends here------------------------

        //insertion of grades

        //  phase 6 term 2 mother tongue


        $insert_student_grades_term2_phase6_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term2_phase6_mother_tongue','$term2_phase6', '$phase6', '$term2_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase6_mother_tongue = mysqli_query($conn,$insert_student_grades_term2_phase6_mother_tongue);
    
    if($insert_student_grades_term2_phase6_mother_tongue){
        echo"term2 mothertongue";
    }

    else{
        $conn->error;;
    }

    //  phase 6 term 2 filipino

    $insert_student_grades_term2_phase6_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term2_phase6_filipino','$term2_phase6', '$phase6', '$term2_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase6_filipino = mysqli_query($conn,$insert_student_grades_term2_phase6_filipino);
    
    if($insert_student_grades_term2_phase6_filipino){
        echo"term2 Filipino";
    }

    else{
        $conn->error;
    }

    //  phase 6 term 2  english

    $insert_student_grades_term2_phase6_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term2_phase6_english','$term2_phase6', '$phase6', '$term2_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase6_english = mysqli_query($conn,$insert_student_grades_term2_phase6_english);
    
    if($insert_student_grades_term2_phase6_english){
        echo"term2 english";
    }

    else{
        $conn->error;
    }

    //  phase 6 term 2 math

    $insert_student_grades_term2_phase6_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term2_phase6_mathematics','$term2_phase6', '$phase6', '$term2_phase6_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term2_phase6_math = mysqli_query($conn,$insert_student_grades_term2_phase6_math);
    
    if($insert_student_grades_term2_phase6_math){
        echo"term2 math";
    }

    else{
        $conn->error;
    }

    //  phase 6 term 2 science

    $insert_student_grades_term2_phase6_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term2_phase6_science','$term2_phase6', '$phase6', '$term2_phase6_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term2_phase6_science = mysqli_query($conn,$insert_student_grades_term2_phase6_science);
    
    if($insert_student_grades_term2_phase6_science){
        echo"term2 science";
    }

    else{
        $conn->error;
    }

    //  phase 6 term 2 ap

    $insert_student_grades_term2_phase6_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term2_phase6_araling_panlipunan','$term2_phase6', '$phase6', '$term2_phase6_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term2_phase6_ap = mysqli_query($conn,$insert_student_grades_term2_phase6_ap);
    
    if($insert_student_grades_term2_phase6_ap){
        echo"term2 Araling panlipunan";
    }

    else{
        $conn->error;
    }

    //  phase 6 term 2 epp tle

    $insert_student_grades_term2_phase6_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term2_phase6_epp_tle','$term2_phase6', '$phase6', '$term2_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase6_epp_tle = mysqli_query($conn,$insert_student_grades_term2_phase6_epp_tle);
    
    if($insert_student_grades_term2_phase6_epp_tle){
        echo"term2 EPP_TLE";
    }

    else{
        $conn->error;
    }

    //  phase 6 term 2 mapeh

    $insert_student_grades_term2_phase6_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term2_phase6_average_of_mapeh','$term2_phase6', '$phase6', '$term2_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase6_mapeh = mysqli_query($conn,$insert_student_grades_term2_phase6_mapeh);

      if($run_student_grades_term2_phase6_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }

        //  phase 6 term 2 music

    $insert_student_grades_term2_phase6_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term2_phase6_music','$term2_phase6', '$phase6', '$term2_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase6_music = mysqli_query($conn,$insert_student_grades_term2_phase6_music);

       if($run_student_grades_term2_phase6_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }

        //  phase 6 term 2 arts

    $insert_student_grades_term2_phase6_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term2_phase6_arts','$term2_phase6', '$phase6', '$term2_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase6_arts = mysqli_query($conn,$insert_student_grades_term2_phase6_arts);


        if($run_student_grades_term2_phase6_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }

            //  phase 6 term 2 pe

    $insert_student_grades_term2_phase6_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term2_phase6_pe','$term2_phase6', '$phase6', '$term2_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase6_pe = mysqli_query($conn,$insert_student_grades_term2_phase6_pe);

        if($run_student_grades_term2_phase6_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }

            //  phase 6 term 2 health 

    $insert_student_grades_term2_phase6_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term2_phase6_health','$term2_phase6', '$phase6', '$term2_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase6_health = mysqli_query($conn,$insert_student_grades_term2_phase6_health);

         if($run_student_grades_term2_phase6_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }

        //  phase 6 term 2 esp

    $insert_student_grades_term2_phase6_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term2_phase6_esp','$term2_phase6', '$phase6', '$term2_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase6_esp = mysqli_query($conn,$insert_student_grades_term2_phase6_esp);

        if($run_student_grades_term2_phase6_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }


      //  phase 6 term 2 arabic      

    $insert_student_grades_term2_phase6_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term2_phase6_arabic_language','$term2_phase6', '$phase6', '$term2_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase6_arabic = mysqli_query($conn,$insert_student_grades_term2_phase6_arabic);

    if($run_student_grades_term2_phase6_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }

        //  phase 6 term 2 islamic 

    $insert_student_grades_term2_phase6_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$islamic_values', '$term2_phase6_islamic_values','$term2_phase6', '$phase6', '$term2_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase6_islamic = mysqli_query($conn,$insert_student_grades_term2_phase6_islamic);

    if($run_student_grades_term2_phase6_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term2_phase6 islamic" . '<br>';
        }




            // general average phase 6 of term 2

            $insert_phase6_term2_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase6_term2_general_average','$term2_phase6','$phase6',' $term2_phase6_remarks','$dateCreated','$dateUpdated');";
        $run_phase6_term2_student_averages = mysqli_query($conn,$insert_phase6_term2_general_average);

        if($run_phase6_term2_student_averages){
            echo "added student averages term1";
            
        }else{
            echo "error student_averages" . $conn->error;
        }

        //  phase 6 term 2  ends here----------------------

            //insertion of grades 

        //phase 6 term 3 mother tongue

        $insert_student_grades_term3_phase6_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term3_phase6_mother_tongue','$term3_phase6', '$phase6', '$term3_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase6_mother_tongue = mysqli_query($conn,$insert_student_grades_term3_phase6_mother_tongue);
    
    if($insert_student_grades_term3_phase6_mother_tongue){
        echo"term3 mothertongue";
    }

    else{
        $conn->error;;
    }

    //phase 6 term 3 filipino

    $insert_student_grades_term3_phase6_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term3_phase6_filipino','$term3_phase6', '$phase6', '$term3_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase6_filipino = mysqli_query($conn,$insert_student_grades_term3_phase6_filipino);
    
    if($insert_student_grades_term3_phase6_filipino){
        echo"term3 Filipino";
    }

    else{
        $conn->error;
    }

    //phase 6 term 3 english

    $insert_student_grades_term3_phase6_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term3_phase6_english','$term3_phase6', '$phase6', '$term3_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase6_english = mysqli_query($conn,$insert_student_grades_term3_phase6_english);
    
    if($insert_student_grades_term3_phase6_english){
        echo"term3 english";
    }

    else{
        $conn->error;
    }

    //phase 6 term 3 math

    $insert_student_grades_term3_phase6_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term3_phase6_mathematics','$term3_phase6', '$phase6', '$term3_phase6_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term3_phase6_math = mysqli_query($conn,$insert_student_grades_term3_phase6_math);
    
    if($insert_student_grades_term3_phase6_math){
        echo"term3 math";
    }

    else{
        $conn->error;
    }

    //phase 6 term 3 science

    $insert_student_grades_term3_phase6_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term3_phase6_science','$term3_phase6', '$phase6', '$term3_phase6_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term3_phase6_science = mysqli_query($conn,$insert_student_grades_term3_phase6_science);
    
    if($insert_student_grades_term3_phase6_science){
        echo"term3 science";
    }

    else{
        $conn->error;
    }

    //phase 6 term 3 ap

    $insert_student_grades_term3_phase6_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term3_phase6_araling_panlipunan','$term3_phase6', '$phase6', '$term3_phase6_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term3_phase6_ap = mysqli_query($conn,$insert_student_grades_term3_phase6_ap);
    
    if($insert_student_grades_term3_phase6_ap){
        echo"term3 Araling panlipunan";
    }

    else{
        $conn->error;
    }

    //phase 6 term 3 epp tle

    $insert_student_grades_term3_phase6_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term3_phase6_epp_tle','$term3_phase6', '$phase6', '$term3_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase6_epp_tle = mysqli_query($conn,$insert_student_grades_term3_phase6_epp_tle);
    
    if($insert_student_grades_term3_phase6_epp_tle){
        echo"term3 EPP_TLE";
    }

    else{
        $conn->error;
    }

    //phase 6 term 3 mapeh

    $insert_student_grades_term3_phase6_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term3_phase6_average_of_mapeh','$term3_phase6', '$phase6', '$term3_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase6_mapeh = mysqli_query($conn,$insert_student_grades_term3_phase6_mapeh);

      if($run_student_grades_term3_phase6_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }

        //phase 6 term 3 music

    $insert_student_grades_term3_phase6_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term3_phase6_music','$term3_phase6', '$phase6', '$term3_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase6_music = mysqli_query($conn,$insert_student_grades_term3_phase6_music);

       if($run_student_grades_term3_phase6_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }

        //phase 6 term 3 arts

    $insert_student_grades_term3_phase6_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term3_phase6_arts','$term3_phase6', '$phase6', '$term3_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase6_arts = mysqli_query($conn,$insert_student_grades_term3_phase6_arts);


        if($run_student_grades_term3_phase6_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }

            //phase 6 term 3 pe

    $insert_student_grades_term3_phase6_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term3_phase6_pe','$term3_phase6', '$phase6', '$term3_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase6_pe = mysqli_query($conn,$insert_student_grades_term3_phase6_pe);

        if($run_student_grades_term3_phase6_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }

            //phase 6 term 3 health

    $insert_student_grades_term3_phase6_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term3_phase6_health','$term3_phase6', '$phase6', '$term3_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase6_health = mysqli_query($conn,$insert_student_grades_term3_phase6_health);

         if($run_student_grades_term3_phase6_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }

            //phase 6 term 3 esp

    $insert_student_grades_term3_phase6_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term3_phase6_esp','$term3_phase6', '$phase6', '$term3_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase6_esp = mysqli_query($conn,$insert_student_grades_term3_phase6_esp);

        if($run_student_grades_term3_phase6_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }

            //phase 6 term 3 arabic

    $insert_student_grades_term3_phase6_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term3_phase6_arabic_language','$term3_phase6', '$phase6', '$term3_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase6_arabic = mysqli_query($conn,$insert_student_grades_term3_phase6_arabic);

    if($run_student_grades_term3_phase6_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }


        //phase 6 term 3 islamic

    $insert_student_grades_term3_phase6_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$islamic_values', '$term3_phase6_islamic_values','$term3_phase6', '$phase6', '$term3_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase6_islamic = mysqli_query($conn,$insert_student_grades_term3_phase6_islamic);

    if($run_student_grades_term3_phase6_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term3_phase6 islamic" . '<br>';
        }




            // general average phase 6 of term 3

            $insert_phase6_term3_general_average = "INSERT INTO student_general_averages (`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase6_term3_general_average','$term3_phase6','$phase6',' $term3_phase6_remarks','$dateCreated','$dateUpdated');";
        $run_phase6_term3_student_averages = mysqli_query($conn,$insert_phase6_term3_general_average);

        if($run_phase6_term3_student_averages){
            echo "added student averages term1";
           
        }else{
            echo "error student_averages" . $conn->error;
        }
        
        //phase 6 term 3 ends here----------------------------------------
        
        //insertion grades of 
        // phase 6 term 4 


        // phase 6 term 4 mother tongue

        $insert_student_grades_term4_phase6_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term4_phase6_mother_tongue','$term4_phase6', '$phase6', '$term4_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase6_mother_tongue = mysqli_query($conn,$insert_student_grades_term4_phase6_mother_tongue);
    
    if($insert_student_grades_term4_phase6_mother_tongue){
        echo"term4 mothertongue";
    }

    else{
        $conn->error;;
    }

    // phase 6 term 4 filipino

    $insert_student_grades_term4_phase6_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term4_phase6_filipino','$term4_phase6', '$phase6', '$term4_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase6_filipino = mysqli_query($conn,$insert_student_grades_term4_phase6_filipino);
    
    if($insert_student_grades_term4_phase6_filipino){
        echo"term4 Filipino";
    }

    else{
        $conn->error;
    }

    // phase 6 term 4 english

    $insert_student_grades_term4_phase6_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term4_phase6_english','$term4_phase6', '$phase6', '$term4_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase6_english = mysqli_query($conn,$insert_student_grades_term4_phase6_english);
    
    if($insert_student_grades_term4_phase6_english){
        echo"term4 english";
    }

    else{
        $conn->error;
    }

    // phase 6 term 4 math

    $insert_student_grades_term4_phase6_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term4_phase6_mathematics','$term4_phase6', '$phase6', '$term4_phase6_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term4_phase6_math = mysqli_query($conn,$insert_student_grades_term4_phase6_math);
    
    if($insert_student_grades_term4_phase6_math){
        echo"term4 math";
    }

    else{
        $conn->error;
    }

    // phase 6 term 4 science

    $insert_student_grades_term4_phase6_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term4_phase6_science','$term4_phase6', '$phase6', '$term4_phase6_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term4_phase6_science = mysqli_query($conn,$insert_student_grades_term4_phase6_science);
    
    if($insert_student_grades_term4_phase6_science){
        echo"term4 science";
    }

    else{
        $conn->error;
    }

    // phase 6 term 4 ap 

    $insert_student_grades_term4_phase6_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term4_phase6_araling_panlipunan','$term4_phase6', '$phase6', '$term4_phase6_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term4_phase6_ap = mysqli_query($conn,$insert_student_grades_term4_phase6_ap);
    
    if($insert_student_grades_term4_phase6_ap){
        echo"term4 Araling panlipunan";
    }

    else{
        $conn->error;
    }

    // phase 6 term 4 epp tle

    $insert_student_grades_term4_phase6_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term4_phase6_epp_tle','$term4_phase6', '$phase6', '$term4_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase6_epp_tle = mysqli_query($conn,$insert_student_grades_term4_phase6_epp_tle);
    
    if($insert_student_grades_term4_phase6_epp_tle){
        echo"term4 EPP_TLE";
    }

    else{
        $conn->error;
    }

    // phase 6 term 4 mapeh

    $insert_student_grades_term4_phase6_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term4_phase6_average_of_mapeh','$term4_phase6', '$phase6', '$term4_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase6_mapeh = mysqli_query($conn,$insert_student_grades_term4_phase6_mapeh);

      if($run_student_grades_term4_phase6_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }

        // phase 6 term 4 music

    $insert_student_grades_term4_phase6_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term4_phase6_music','$term4_phase6', '$phase6', '$term4_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase6_music = mysqli_query($conn,$insert_student_grades_term4_phase6_music);

       if($run_student_grades_term4_phase6_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }

        // phase 6 term 4 arts
    $insert_student_grades_term4_phase6_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term4_phase6_arts','$term4_phase6', '$phase6', '$term4_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase6_arts = mysqli_query($conn,$insert_student_grades_term4_phase6_arts);


        if($run_student_grades_term4_phase6_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }


           // phase 6 term 4 pe 
    $insert_student_grades_term4_phase6_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term4_phase6_pe','$term4_phase6', '$phase6', '$term4_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase6_pe = mysqli_query($conn,$insert_student_grades_term4_phase6_pe);

        if($run_student_grades_term4_phase6_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }


            // phase 6 term 4 health
    $insert_student_grades_term4_phase6_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term4_phase6_health','$term4_phase6', '$phase6', '$term4_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase6_health = mysqli_query($conn,$insert_student_grades_term4_phase6_health);

         if($run_student_grades_term4_phase6_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }

            // phase 6 term 4 esp

    $insert_student_grades_term4_phase6_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term4_phase6_esp','$term4_phase6', '$phase6', '$term4_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase6_esp = mysqli_query($conn,$insert_student_grades_term4_phase6_esp);

        if($run_student_grades_term4_phase6_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }

            // phase 6 term 4 arabic

    $insert_student_grades_term4_phase6_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term4_phase6_arabic_language','$term4_phase6', '$phase6', '$term4_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase6_arabic = mysqli_query($conn,$insert_student_grades_term4_phase6_arabic);

    if($run_student_grades_term4_phase6_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }

        // phase 6 term 4 islmic

    $insert_student_grades_term4_phase6_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$islamic_values', '$term4_phase6_islamic_values','$term4_phase6', '$phase6', '$term4_phase6_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase6_islamic = mysqli_query($conn,$insert_student_grades_term4_phase6_islamic);

    if($run_student_grades_term4_phase6_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term4_phase6 islamic" . '<br>';
        }




            // general average phase 6 of term 4

            $insert_phase6_term4_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase6_term4_general_average','$term4_phase6','$phase6',' $term4_phase6_remarks','$dateCreated','$dateUpdated');";
        $run_phase6_term4_student_averages = mysqli_query($conn,$insert_phase6_term4_general_average);

        if($run_phase6_term4_student_averages){
            echo "added student averages term1";
            
        }else{
            echo "error student_averages" . $conn->error;
        }

        // phase 6 term 4  ends here------------------------------

    //insert ko sa PHASE 6 FINAL RATINGS table PER SUBJECT mother tongue

        $insert_student_final_ratings_mt = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$mother_tongue','$phase6_final_rating_mother_tongue', '$phase6_term5', '$phase6', '$phase6_final_rating_mother_tongue_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_mt = mysqli_query($conn,$insert_student_final_ratings_mt);

    if($run_student_final_ratings_mt){
        echo "added to student final ratings MT" . '<br>';
    }else{
        echo "Error student final ratings MT" . '<br>';
    }

    //insert ko sa PHASE 6 FINAL RATINGS table PER SUBJECT filipino

    $insert_student_final_ratings_filipino = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$filipino', '$phase6_final_rating_filipino','$phase6_term5', '$phase6', '$phase6_final_rating_filipino_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_filipino = mysqli_query($conn,$insert_student_final_ratings_filipino);

    if($run_student_final_ratings_filipino){
        echo "added to student final ratings filipino" . '<br>';
    }else{
        echo "Error student final ratings filipino" . '<br>';
    }

    //insert ko sa PHASE 6 FINAL RATINGS table PER SUBJECT English

    $insert_student_final_ratings_english = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$english','$phase6_final_rating_english', '$phase6_term5', '$phase6', '$phase6_final_rating_english_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_english = mysqli_query($conn,$insert_student_final_ratings_english);

    if($run_student_final_ratings_english){
        echo "added to student final ratings english" . '<br>';
    }else{
        echo "Error student final ratings english" . '<br>';
    }

    //insert ko sa PHASE 6 FINAL RATINGS table PER SUBJECT Math

    $insert_student_final_ratings_math = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$math','$phase6_final_rating_math', '$phase6_term5', '$phase6', '$phase6_final_rating_math_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_math = mysqli_query($conn,$insert_student_final_ratings_math);

    if($run_student_final_ratings_math){
        echo "added to student final ratings math" . '<br>';
    }else{
        echo "Error student final ratings math" . '<br>';
    }

    //insert ko sa PHASE 6 FINAL RATINGS table PER SUBJECT Science

    $insert_student_final_ratings_science = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$science','$phase6_final_rating_science', '$phase6_term5', '$phase6', '$phase6_final_rating_science_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_science = mysqli_query($conn,$insert_student_final_ratings_science);

    if($run_student_final_ratings_science){
        echo "added to student final ratings math" . '<br>';
    }else{
        echo "Error student final ratings math" . '<br>';
    }

    //insert ko sa PHASE 6 FINAL RATINGS table PER SUBJECT AP

    $insert_student_final_ratings_AP = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$AP','$phase6_final_rating_AP', '$phase6_term5', '$phase6_term5', '$phase6_final_rating_AP_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_AP = mysqli_query($conn,$insert_student_final_ratings_AP);

    if($run_student_final_ratings_AP){
        echo "added to student final ratings AP" . '<br>';
    }else{
        echo "Error student final ratings AP" . '<br>';
    }

    //insert ko sa PHASE 6 FINAL RATINGS table PER SUBJECT EPP / TLE

    $insert_student_final_ratings_epp_tle = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$epp_tle','$phase6_final_rating_epp_tle', '$phase6_term5', '$phase6', '$phase6_final_rating_epp_tle_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_epp_tle = mysqli_query($conn,$insert_student_final_ratings_epp_tle);

    if($run_student_final_ratings_epp_tle){
        echo "added to student final ratings epp tle" . '<br>';
    }else{
        echo "Error student final ratings epp tle" . '<br>';
    }

    //insert ko sa PHASE 6 FINAL RATINGS table PER SUBJECT MAPEH

    $insert_student_final_ratings_mapeh = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$mapeh','$phase6_final_rating_mapeh', '$phase6_term5', '$phase6', '$phase6_final_rating_mapeh_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_mapeh = mysqli_query($conn,$insert_student_final_ratings_mapeh);

    if($run_student_final_ratings_mapeh){
        echo "added to student final ratings mapeh" . '<br>';
    }else{
        echo "Error student final ratings mapeh" . '<br>';
    }

    //insert ko sa PHASE 6 FINAL RATINGS table PER SUBJECT music

    $insert_student_final_ratings_music = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$music','$phase6_final_rating_music', '$phase6_term5', '$phase6', '$phase6_final_rating_music_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_music = mysqli_query($conn,$insert_student_final_ratings_music);

    if($run_student_final_ratings_music){
        echo "added to student final ratings music" . '<br>';
    }else{
        echo "Error student final ratings music" . '<br>';
    }

    //insert ko sa PHASE 6 FINAL RATINGS table PER SUBJECT arts

    $insert_student_final_ratings_arts = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$arts','$phase6_final_rating_arts', '$phase6_term5', '$phase6', '$phase6_final_rating_arts_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_arts = mysqli_query($conn,$insert_student_final_ratings_arts);

    if($run_student_final_ratings_music){
        echo "added to student final ratings arts" . '<br>';
    }else{
        echo "Error student final ratings arts" . '<br>';
    }

    //insert ko sa PHASE 6 FINAL RATINGS table PER SUBJECT pe

    $insert_student_final_ratings_pe = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$PE','$phase6_final_rating_PE', '$phase6_term5', '$phase6', '$phase6_final_rating_PE_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_pe = mysqli_query($conn,$insert_student_final_ratings_pe);

    if($run_student_final_ratings_pe){
        echo "added to student final ratings PE" . '<br>';
    }else{
        echo "Error student final ratings PE" . '<br>';
    }

    //insert ko sa PHASE 6 FINAL RATINGS table PER SUBJECT health

    $insert_student_final_ratings_health = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$health','$phase6_final_rating_health', '$phase6_term5', '$phase6', '$phase6_final_rating_health_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_health = mysqli_query($conn,$insert_student_final_ratings_health);

    if($run_student_final_ratings_pe){
        echo "added to student final ratings health" . '<br>';
    }else{
        echo "Error student final ratings health" . '<br>';
    }

    //insert ko sa PHASE 6 FINAL RATINGS table PER SUBJECT ESP

    $insert_student_final_ratings_esp = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$esp', '$phase6_final_rating_esp','$phase6_term5', '$phase6', '$phase6_final_rating_esp_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_esp = mysqli_query($conn,$insert_student_final_ratings_esp);

    if($run_student_final_ratings_pe){
        echo "added to student final ratings esp" . '<br>';
    }else{
        echo "Error student final ratings esp" . '<br>';
    }


    //insert ko sa PHASE 6 FINAL RATINGS table PER SUBJECT arabic language

    $insert_student_final_ratings_arabic = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$arabic_language','$phase6_final_rating_arabic_language', '$phase6_term5', '$phase6', '$phase6_final_rating_arabic_language_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_arabic = mysqli_query($conn,$insert_student_final_ratings_arabic);

    if($run_student_final_ratings_arabic){
        echo "added to student final ratings arabic" . '<br>';
    }else{
        echo "Error student final ratings arabic" . '<br>';
    }

    //insert ko sa PHASE 6 FINAL RATINGS table PER SUBJECT islamic values

    $insert_student_final_ratings_islam = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$islamic_values','$phase6_final_rating_islamic_values', '$phase6_term5', '$phase6', '$phase6_final_rating_islamic_values_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_islam = mysqli_query($conn,$insert_student_final_ratings_islam);

    if($run_student_final_ratings_islam){
        echo "added to student final ratings islamic" . '<br>';
    }else{
        echo "Error student final ratings islamic" . '<br>';
    }


        //general averag of phase 6 term 5 
    $insert_phase6_term5_general_average = "INSERT INTO student_general_averages(lrn,general_average,term,phase,remarks,date_time_created,date_time_updated) 
    VALUES ('$lrn','$phase6_term5_general_average', '$phase6_term5','$phase6','$term1_phase6_remarks', '$dateCreated','$dateUpdated')";

    $run_phase6_term5_general_average = mysqli_query($conn,$insert_phase6_term5_general_average);

    if($run_phase6_term5_general_average){
        echo "added student averages term5";
    }else{
        echo "added student averages term5";
    }

    //insert of remedial phase 6 


    for ($phase6_remedial_term = 1; $phase6_remedial_term <=2 ; $phase6_remedial_term++){



        if($phase6_remedial_term ==1){
    $phase6_remedial_query= "INSERT INTO `remedial_classes`(`lrn`, `date_from`, `date_to`, `learning_areas`, `final_rating`, `remedial_class_mark`, `recomputed_final_grade`, `phase`, `term`, `remarks`, `date_time_created`, `date_time_updated`) 
    VALUES ('$lrn','$phase6_remedial_from','$phase6_remedial_to','$phase6_remedial_learning_areas_1',' $phase6_remedial_final_rating_1','$phase6_remedial_class_mark_1','$phase6_recomputed_final_grade_1','$phase6','$phase6_remedial_term','$phase6_remedial_remarks_1','$dateCreated','$dateUpdated')";
    
    $phase6_run_query = mysqli_query($conn,$phase6_remedial_query);

    if($phase6_run_query){
    echo "remedial query success <br>";
    }
    else
    {
        $conn->error;
    }
        
}



     elseif($phase6_remedial_term ==2) {
        

    $phase6_remedial_query= "INSERT INTO `remedial_classes`(`lrn`, `date_from`, `date_to`, `learning_areas`, `final_rating`, `remedial_class_mark`, `recomputed_final_grade`, `phase`, `term`, `remarks`, `date_time_created`, `date_time_updated`) 
    VALUES ('$lrn','$phase6_remedial_from','$phase6_remedial_to','$phase6_remedial_learning_areas_2',' $phase6_remedial_final_rating_2','$phase6_remedial_class_mark_2','$phase6_recomputed_final_grade_2','$phase6','$phase6_remedial_term','$phase6_remedial_remarks_2','$dateCreated','$dateUpdated')";
    
    $phase6_run_query = mysqli_query($conn,$phase6_remedial_query);

        if($phase6_run_query){
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

////////////////////////////END OF PHASE 6 ///////////////////////////////////////////////

?>