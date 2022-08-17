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
    <title>phase 8</title>
</head>
<body>
<form action="phase8.php" method="POST">
        <!-- Phase 8 -->
<div class="form-container" style="padding:0 0 7px 7px;">
        <section class="header">
            <span class="d-flex justify-content-between">

            <label for="">Learner Reference Number (LRN):</label>
            <input type="number" style="margin: 0 1em 0 0; width:30%;" name="lrn" required>
                
            <span>
                    <label>School:</label>
                    <input type="text" id="text-only" name="phase8_name_of_school"  class="school">
                </span>
                <span>
                    <label>School ID:</label>
                    <input type="text" name="phase8_school_id" id="dash"class="school_id">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                    <label>District:</label>
                    <input type="text" class="w-50" name="phase8_district" class="district">
                </span>
                <span>
                    <label>Division:</label>
                    <input type="text" class="w-50" name="phase8_division" class="division">
                </span>
                <span class="text-end">
                    <label>Region:</label>
                    <input type="text" class="w-50" name="phase8_region" id="dash"class="region">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                    <label>Classified as Grade:</label>
                    <input type="number" id="number-only" style="width: 20%;" name="phase8_classified_as_grade">
                </span>
                <span>
                    <label>Section:</label>
                    <input type="text" class="w-50" name="phase8_section"> 
                </span>
                <span>
                    <label>School Year:</label>
                    <input type="text" class="w-50" name="phase8_school_year" id="dash">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                <label for="">Name of Adviser:</label>
                <input type="text" id="text-only" name="phase8_name_of_teacher">
                </span>
                <span>
                    <label>Signature:</label>
                    <input type="text" id="text-only" name="phase8_signature" class="school_id">
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
                    <td><input type="number" name="term1_phase8_mother_tongue" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase8_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase8_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase8_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Filipino</td>
                    <td><input type="number" name="term1_phase8_filipino" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase8_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase8_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase8_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">English</td>
                    <td><input type="number" name="term1_phase8_english" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase8_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase8_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase8_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only"readonly ></td>
                    <td></td>
                </tr>
                    <td class="text-start fw-bold">Mathematics</td>
                    <td><input type="number" name="term1_phase8_mathematics" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase8_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase8_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase8_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Science</td>
                    <td><input type="number" name="term1_phase8_science" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase8_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase8_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase8_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only"readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Araling Panlipunan</td>
                    <td><input type="number" name="term1_phase8_araling_panlipunan" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase8_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase8_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase8_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">EPP/TLE</td>
                    <td><input type="number" name="term1_phase8_epp_tle" id="grade"  title="Please input 2 Numbers only" ></td>           
                    <td><input type="number" name="term2_phase8_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase8_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase8_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">MAPEH</td>
                    <td><input type="text" name="term1_phase8_mapeh" readonly></td>
                    <td><input type="text" name="term2_phase8_mapeh" readonly></td>
                    <td><input type="text" name="term3_phase8_mapeh" readonly></td>
                    <td><input type="text" name="term4_phase8_mapeh" readonly></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>               
                    <td class="text-start"><i>Music</i></td>           
                    <td><input type="number" name="term1_phase8_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase8_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase8_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase8_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only"readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Arts</i></td>
                    <td><input type="number" name="term1_phase8_arts" id="grade" title="Please input 2 Numbers only" ></td>       
                    <td><input type="number" name="term2_phase8_arts"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase8_arts" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase8_arts"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Physical Education</i></td>
                    <td><input type="number" name="term1_phase8_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase8_pe"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase8_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase8_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Health</i></td>
                    <td><input type="number" name="term1_phase8_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase8_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase8_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase8_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only"readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Edukasyon sa Pagpapakatao</td>
                    <td><input type="number" name="term1_phase8_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase8_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase8_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase8_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only"readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start">*Arabic Language</td>        
                    <td><input type="number" name="term1_phase8_arabic_language" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase8_arabic_language" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase8_arabic_language"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase8_arabic_language" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only"readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start">*Islamic Values Education</td>
                    <td><input type="number" name="term1_phase8_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase8_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase8_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase8_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
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
        <!-- Remedial Table PHASE 8 -->
        <table class="table-condensed text-center w-100">
            <thead> 
                <tr>
                    <th colspan="2">Remedial Classes</th>
                    <th colspan="4">
                        <span class="d-flex flex-row justify-content-between">
                            <span>
                                <label for="">Date conducted: </label>
                                <input type="date" class="datefrom"  name="phase8_remedial_from">
                            </span>
                            <span>
                                <label for="">To: </label>
                                <input type="date" class="dateto" name="phase8_remedial_to" >
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
                    <td><input type="text" class="learning-areas1" name="phase8_remedial_learning_areas_1"></td>
                    <td><input type="number" id="grade" class="final_rating1" name="phase8_remedial_final_rating_1"></td>
                    <td><input type="text" name="phase8_remedial_class_mark_1" id=""></td>
                    <td><input type="number" id="grade" name="phase8_recomputed_final_grade_1" title="Please input 2 Numbers only"></td>
                    <td><input type="text" name="phase8_remedial_remarks_1" id=""></td>
                </tr>
                <tr>
                    <td><input type="text" class="learning_areas2" name="phase8_remedial_learning_areas_2"></td>
                    <td><input type="number" id="grade" class="final_rating2" name="phase8_remedial_final_rating_2"></td>
                    <td><input type="text" name="phase8_remedial_class_mark_2" id=""> </td>
                    <td><input type="number" id="grade" name="phase8_recomputed_final_grade_2" title="Please input 2 Numbers only"></td>
                    <td><input type="text" name="phase8_remedial_remarks_2" id=""></td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>

    <div class="row pb-5" style="padding:0 14px;">
    <div class="col-lg-12 p-0">
        <p class="fw-bold m-0">For Transfer Out /Elementary School Completer Only</p>
        <section class="certification-box">
            <h6 class="text-center py-1 " style="background: #ddd; border:none;">CERTIFICATION</h6>
                <span class="cert-card px-lg-4 ">
                    <span class="d-flex flex-row align-items-center">
                        <label>I CERTIFY that this is a true record of</label>
                        <input type="text" name="phase1_cert_name" id="">
                    </span>
                    <span class="hstack d-flex justify-content-end align-items-end">
                        <label>with LRN</label>
                        <input type="text" name="phase1_cert_lrn" id="">
                    </span>
                    <span>
                        <label>and that he/she is eligible for admission to Grade </label>
                        <input type="text" size="4" style="width: auto;" name = "phase1_cert_grade">
                    </span> 
                </span>
                <span class="d-flex flex-row justify-content-start align-items-center px-lg-4">
                    <span class="d-flex flex-row align-items-center justify-content-end">
                        <label>School Name: </label>
                        <input type="text" style="width: auto;" name="phase1_cert_school" id="">
                    </span>
                    <span class="hstack d-flex justify-content-center align-items-end">
                        <label>School ID</label>
                        <input type="text" name="phase1_cert_id" id="dash">
                    </span>
                    <span>
                        <label>Division</label>
                        <input type="text" size="4" name = "phase1_cert_div">
                    </span> 
                    <span class="hstack d-flex justify-content-center align-items-end">
                        <label>Last School Year Attended:</label>
                        <input type="text" name="phase1_cert_attend" id="dash">
                    </span>
                </span>
                <div class="container pt-5">
                    <div class="row ">
                        <div class="col-3">
                            <span class="vstack d-flex flex-column-reverse text-center">
                                <label for="" class="">Date</label>
                                <input type="text" name = "phase1_cert_date" >
                            </span>
                        </div>
                        <div class="col-5">
                            <span class="vstack d-flex flex-column-reverse">
                                <label for="" class="text-center">Name of Principal/School Head over Printed Name</label>
                                <input type="text" name = "phase1_cert_principal">
                            </span>
                        </div>
                        <div class="col-4" style="display:grid; place-items:end;">
                            <p style="font-size: 14px; letter-spacing:1px; font-weight:500; padding:0; margin:0;">(Affix School Seal here)</p>
                        </div>
                    </div>
                </div>
        </section>
    </div>
    <div class="col-lg-12 p-0">
        <p class="fw-bold m-0">For Transfer Out /Elementary School Completer Only</p>
        <section class="certification-box">
            <h6 class="text-center py-1 " style="background: #ddd; border:none;">CERTIFICATION</h6>
                <span class="cert-card px-lg-4 ">
                    <span class="d-flex flex-row align-items-center">
                        <label>I CERTIFY that this is a true record of</label>
                        <input type="text" name="phase2_cert_name" id="">
                    </span>
                    <span class="hstack d-flex justify-content-end align-items-end">
                        <label>with LRN</label>
                        <input type="text" name="phase2_cert_lrn" id="">
                    </span>
                    <span>
                        <label>and that he/she is eligible for admission to Grade </label>
                        <input type="text" size="4" style="width: auto;" name="phase2_cert_grade">
                    </span> 
                </span>
                <span class="d-flex flex-row justify-content-start align-items-center px-lg-4">
                    <span class="d-flex flex-row align-items-center justify-content-end">
                        <label>School Name: </label>
                        <input type="text" style="width: auto;" name="phase2_cert_school" id="">
                    </span>
                    <span class="hstack d-flex justify-content-center align-items-end">
                        <label>School ID</label>
                        <input type="text" name="phase2_cert_id" id="dash">
                    </span>
                    <span>
                        <label>Division</label>
                        <input type="text" size="4" name ="phase2_cert_div" >
                    </span> 
                    <span class="hstack d-flex justify-content-center align-items-end">
                        <label>Last School Year Attended:</label>
                        <input type="text" name="phase2_cert_attend" id="dash">
                    </span>
                </span>
                <div class="container pt-5">
                    <div class="row ">
                        <div class="col-3">
                            <span class="vstack d-flex flex-column-reverse text-center">
                                <label for="" class="">Date</label>
                                <input type="text" name = "phase2_cert_date" >
                            </span>
                        </div>
                        <div class="col-5">
                            <span class="vstack d-flex flex-column-reverse">
                                <label for="" class="text-center">Name of Principal/School Head over Printed Name</label>
                                <input type="text" name = "phase2_cert_principal" >
                            </span>
                        </div>
                        <div class="col-4" style="display:grid; place-items:end;">
                            <p style="font-size: 14px; letter-spacing:1px; font-weight:500; padding:0; margin:0;">(Affix School Seal here)</p>
                        </div>
                    </div>
                </div>
        </section>
    </div>
    <div class="col-lg-12 p-0">
        <p class="fw-bold m-0">For Transfer Out /Elementary School Completer Only</p>
        <section class="certification-box">
            <h6 class="text-center py-1 " style="background: #ddd; border:none;">CERTIFICATION</h6>
                <span class="cert-card px-lg-4 ">
                    <span class="d-flex flex-row align-items-center">
                        <label>I CERTIFY that this is a true record of</label>
                        <input type="text" name="phase3_cert_name" id="">
                    </span>
                    <span class="hstack d-flex justify-content-end align-items-end">
                        <label>with LRN</label>
                        <input type="text" name="phase3_cert_lrn" id="">
                    </span>
                    <span>
                        <label>and that he/she is eligible for admission to Grade </label>
                        <input type="text" size="4" style="width: auto;" name = "phase3_cert_grade" >
                    </span> 
                </span>
                <span class="d-flex flex-row justify-content-between align-items-center px-lg-4">
                    <span class="d-flex flex-row align-items-center justify-content-end">
                        <label>School Name: </label>
                        <input type="text" style="width: auto;" name="phase3_cert_school" id="">
                    </span>
                    <span class="hstack d-flex justify-content-center align-items-end">
                        <label>School ID</label>
                        <input type="text" name="phase3_cert_id" id="dash">
                    </span>
                    <span>
                        <label>Division</label>
                        <input type="text" size="4" name = "phase3_cert_div" >
                    </span> 
                    <span class="hstack d-flex justify-content-center align-items-end">
                        <label>Last School Year Attended:</label>
                        <input type="text" name="phase3_cert_attend" id="dash">
                    </span>
                </span>
                <div class="container pt-5">
                    <div class="row ">
                        <div class="col-3">
                            <span class="vstack d-flex flex-column-reverse text-center">
                                <label for="" class="">Date</label>
                                <input type="text" name = "phase3_cert_date" >
                            </span>
                        </div>
                        <div class="col-5">
                            <span class="vstack d-flex flex-column-reverse">
                                <label for="" class="text-center">Name of Principal/School Head over Printed Name</label>
                                <input type="text" name = "phase3_cert_principal">
                            </span>
                        </div>
                        <div class="col-4" style="display:grid; place-items:end;">
                            <p style="font-size: 14px; letter-spacing:1px; font-weight:500; padding:0; margin:0;">(Affix School Seal here)</p>
                        </div>
                    </div>
                </div>
        </section>
    </div>

    </div>
    

    <input type="submit" name="submit">
</form>
    
</body>
</html>




<?php

if(isset($_POST['submit'])){

    $lrn = $_POST['lrn'];
    $dateCreated = date("m-d-Y h:i:a");
    $dateUpdated = date("m-d-Y h:i:a");
    $remarks = 'none';

    // certification 

    //phase 1 certification

    $phase1_cert_lrn = $_POST['phase1_cert_lrn'];
    $phase1_cert_name = ucfirst($_POST['phase1_cert_name']);
    $phase1_cert_grade = ucfirst($_POST['phase1_cert_grade']);
    $phase1_cert_school = ucfirst($_POST['phase1_cert_grade']);
    $phase1_cert_id = ucfirst($_POST['phase1_cert_grade']);
    $phase1_cert_div = ucfirst($_POST['phase1_cert_grade']);
    $phase1_cert_attend = ucfirst($_POST['phase1_cert_grade']);
    $phase1_cert_date = date("m-d-Y",strtotime($_POST['phase1_cert_date']));
    $phase1_cert_principal = ucfirst($_POST['phase1_cert_grade']);

    // phase 2 certification
    $phase2_cert_lrn = $_POST['phase2_cert_lrn'];
    $phase2_cert_name = ucfirst($_POST['phase2_cert_name']);
    $phase2_cert_grade = ucfirst($_POST['phase2_cert_grade']);
    $phase2_cert_school = ucfirst($_POST['phase2_cert_grade']);
    $phase2_cert_id = ucfirst($_POST['phase2_cert_grade']);
    $phase2_cert_div = ucfirst($_POST['phase2_cert_grade']);
    $phase2_cert_attend = ucfirst($_POST['phase2_cert_grade']);
    $phase2_cert_date = date("m-d-Y",strtotime($_POST['phase2_cert_date']));
    $phase2_cert_principal = ucfirst($_POST['phase2_cert_grade']);


    // phase 3 certification

    $phase3_cert_lrn = $_POST['phase3_cert_lrn'];
    $phase3_cert_name = ucfirst($_POST['phase3_cert_name']);
    $phase3_cert_grade = ucfirst($_POST['phase3_cert_grade']);
    $phase3_cert_school = ucfirst($_POST['phase3_cert_grade']);
    $phase3_cert_id = ucfirst($_POST['phase3_cert_grade']);
    $phase3_cert_div = ucfirst($_POST['phase3_cert_grade']);
    $phase3_cert_attend = ucfirst($_POST['phase3_cert_grade']);
    $phase3_cert_date = date("m-d-Y",strtotime($_POST['phase3_cert_date']));
    $phase3_cert_principal = ucfirst($_POST['phase3_cert_grade']);

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


    //Phase 8
    $phase8 = '8';
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
    $term1_phase8_mother_tongue = intval($_POST['term1_phase8_mother_tongue']);
    $term1_phase8_filipino = intval($_POST['term1_phase8_filipino']);
    $term1_phase8_english = intval($_POST['term1_phase8_english']);
    $term1_phase8_mathematics = intval($_POST['term1_phase8_mathematics']);
    $term1_phase8_science = intval($_POST['term1_phase8_science']);
    $term1_phase8_araling_panlipunan = intval($_POST['term1_phase8_araling_panlipunan']);
    $term1_phase8_epp_tle = intval($_POST['term1_phase8_epp_tle']);
    $term1_phase8_music = intval($_POST['term1_phase8_music']);
    $term1_phase8_arts = intval($_POST['term1_phase8_arts']);
    $term1_phase8_pe = intval($_POST['term1_phase8_pe']);
    $term1_phase8_health = intval($_POST['term1_phase8_health']);
    $term1_phase8_esp = intval($_POST['term1_phase8_esp']);
    $term1_phase8_arabic_language = intval($_POST['term1_phase8_arabic_language']);
    $term1_phase8_islamic_values = intval($_POST['term1_phase8_islamic_values']);
    $term1_phase8_remarks = 'none'; 

    //term2_phase8 grades
    //term2_phase8
    $term2_phase8 = 2;
    $term2_phase8_mother_tongue = intval($_POST['term2_phase8_mother_tongue']);
    $term2_phase8_filipino = intval($_POST['term2_phase8_filipino']);
    $term2_phase8_english = intval($_POST['term2_phase8_english']);
    $term2_phase8_mathematics = intval($_POST['term2_phase8_mathematics']);
    $term2_phase8_science = intval($_POST['term2_phase8_science']);
    $term2_phase8_araling_panlipunan = intval($_POST['term2_phase8_araling_panlipunan']);
    $term2_phase8_epp_tle = intval($_POST['term2_phase8_epp_tle']);
    $term2_phase8_music = intval($_POST['term2_phase8_music']);
    $term2_phase8_arts = intval($_POST['term2_phase8_arts']);
    $term2_phase8_pe = intval($_POST['term2_phase8_pe']);
    $term2_phase8_health = intval($_POST['term2_phase8_health']);
    $term2_phase8_esp = intval($_POST['term2_phase8_esp']);
    $term2_phase8_arabic_language = intval($_POST['term2_phase8_arabic_language']);
    $term2_phase8_islamic_values = intval($_POST['term2_phase8_islamic_values']);
    $term2_phase8_remarks = 'none'; 

    //term3_phase8
    //term3_phase8 grades

    $term3_phase8 = 3;
    $term3_phase8_mother_tongue = intval($_POST['term3_phase8_mother_tongue']);
    $term3_phase8_filipino = intval($_POST['term3_phase8_filipino']);
    $term3_phase8_english = intval($_POST['term3_phase8_english']);
    $term3_phase8_mathematics = intval($_POST['term3_phase8_mathematics']);
    $term3_phase8_science = intval($_POST['term3_phase8_science']);
    $term3_phase8_araling_panlipunan = intval($_POST['term3_phase8_araling_panlipunan']);
    $term3_phase8_epp_tle = intval($_POST['term3_phase8_epp_tle']);
    $term3_phase8_music = intval($_POST['term3_phase8_music']);
    $term3_phase8_arts = intval($_POST['term3_phase8_arts']);
    $term3_phase8_pe = intval($_POST['term3_phase8_pe']);
    $term3_phase8_health = intval($_POST['term3_phase8_health']);
    $term3_phase8_esp = intval($_POST['term3_phase8_esp']);
    $term3_phase8_arabic_language = intval($_POST['term3_phase8_arabic_language']);
    $term3_phase8_islamic_values = intval($_POST['term3_phase8_islamic_values']);
    $term3_phase8_remarks = 'none'; 

    //term4_phase8
    //term4_phase8 grades

    $term4_phase8 = 4;
    $term4_phase8_mother_tongue = intval($_POST['term4_phase8_mother_tongue']);
    $term4_phase8_filipino = intval($_POST['term4_phase8_filipino']);
    $term4_phase8_english = intval($_POST['term4_phase8_english']);
    $term4_phase8_mathematics = intval($_POST['term4_phase8_mathematics']);
    $term4_phase8_science = intval($_POST['term4_phase8_science']);
    $term4_phase8_araling_panlipunan = intval($_POST['term4_phase8_araling_panlipunan']);
    $term4_phase8_epp_tle = intval($_POST['term4_phase8_epp_tle']);
    $term4_phase8_music = intval($_POST['term4_phase8_music']);
    $term4_phase8_arts = intval($_POST['term4_phase8_arts']);
    $term4_phase8_pe = intval($_POST['term2_phase8_pe']);
    $term4_phase8_health = intval($_POST['term4_phase8_health']);
    $term4_phase8_esp = intval($_POST['term4_phase8_esp']);
    $term4_phase8_arabic_language = intval($_POST['term4_phase8_arabic_language']);
    $term4_phase8_islamic_values = intval($_POST['term4_phase8_islamic_values']);
    $term4_phase8_remarks = 'none';

        // phase 8 remedial
        
    $phase8_remedial_from = date("Y-m-d",strtotime($_POST['phase8_remedial_from']));
    $phase8_remedial_to = date("Y-m-d" ,strtotime($_POST['phase8_remedial_to']));
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

    $phase8_term1_average_mapeh_numbers = array($term1_phase8_music, $term1_phase8_arts, $term1_phase8_pe, $term1_phase8_health);
    $phase8_term1_average_mapeh_count = count(array_filter($phase8_term1_average_mapeh_numbers));
        if( $phase8_term1_average_mapeh_count != 0 ){

            $phase8_term1_average_mapeh_sum = array_sum($phase8_term1_average_mapeh_numbers);
           
            $term1_phase8_average_of_mapeh = $phase8_term1_average_mapeh_sum / $phase8_term1_average_mapeh_count;
        }

        else{
            $term1_phase8_average_of_mapeh = 0;
        }
  

    // $term2_phase8_average_of_mapeh = round(($term2_phase8_music + $term2_phase8_arts + $term2_phase8_pe + $term2_phase8_health) / 4) ;

    $phase8_term2_average_mapeh_numbers = array($term2_phase8_music, $term2_phase8_arts, $term2_phase8_pe, $term2_phase8_health);
    $phase8_term2_average_mapeh_count = count(array_filter($phase8_term2_average_mapeh_numbers));

    if($phase8_term2_average_mapeh_count !=0){

        $phase8_term2_average_mapeh_sum = array_sum($phase8_term2_average_mapeh_numbers);
        
        $term2_phase8_average_of_mapeh = $phase8_term2_average_mapeh_sum / $phase8_term2_average_mapeh_count;
    }

    else{
        $term2_phase8_average_of_mapeh = 0;
    }

    // $term3_phase8_average_of_mapeh = round(($term3_phase8_music + $term3_phase8_arts + $term3_phase8_pe + $term3_phase8_health) / 4) ;

    $phase8_term3_average_mapeh_numbers = array($term3_phase8_music, $term3_phase8_arts, $term3_phase8_pe, $term3_phase8_health);
    $phase8_term3_average_mapeh_count = count(array_filter($phase8_term3_average_mapeh_numbers));
    
    if($phase8_term3_average_mapeh_count !=0){

        $phase8_term3_average_mapeh_sum = array_sum($phase8_term3_average_mapeh_numbers);
        $term3_phase8_average_of_mapeh = $phase8_term3_average_mapeh_sum / $phase8_term3_average_mapeh_count;
    }
    
    else{
        
        $term3_phase8_average_of_mapeh = 0;

    }



    // $term4_phase8_average_of_mapeh = round(($term4_phase8_music + $term4_phase8_arts + $term4_phase8_pe + $term4_phase8_health) / 4) ;


    
    $phase8_term4_average_mapeh_numbers = array($term4_phase8_music, $term4_phase8_arts, $term4_phase8_pe, $term4_phase8_health);
    $phase8_term4_average_mapeh_count = count(array_filter($phase8_term4_average_mapeh_numbers));
    
    if($phase8_term4_average_mapeh_count !=0 ){
        $phase8_term4_average_mapeh_sum = array_sum($phase8_term4_average_mapeh_numbers);
        
        $term4_phase8_average_of_mapeh = $phase8_term4_average_mapeh_sum / $phase8_term4_average_mapeh_count;
    }

    else{
        $term4_phase8_average_of_mapeh = 0;
    }
   

    //final rating
    $phase8_term5 ='Final Rating';
  

    // $phase8_final_rating_mother_tongue = round(($term1_phase8_mother_tongue + $term2_phase8_mother_tongue + 
    // $term3_phase8_mother_tongue + $term4_phase8_mother_tongue) / 4);

        $phase8_mt_numbers = array($term1_phase8_mother_tongue, $term2_phase8_mother_tongue, $term3_phase8_mother_tongue,$term4_phase8_mother_tongue);
        $phase8_mt_count = count(array_filter($phase8_mt_numbers));
        if($phase8_mt_count != 0){

            $phase8_mt_sum = array_sum($phase8_mt_numbers);
        
            $phase8_final_rating_mother_tongue = $phase8_mt_sum / $phase8_mt_count;
        }
       else{
        $phase8_final_rating_mother_tongue = 0;
       }


    // $phase8_final_rating_filipino = round(($term1_phase8_filipino + $term2_phase8_filipino + $term3_phase8_filipino + $term4_phase8_filipino) / 4);

    $phase8_filipino_numbers = array($term1_phase8_filipino, $term2_phase8_filipino, $term3_phase8_filipino, $term4_phase8_filipino);
    $phase8_filipino_count = count(array_filter($phase8_filipino_numbers));

    if($phase8_filipino_count != 0){

        $phase8_filipino_sum = array_sum($phase8_filipino_numbers);

        $phase8_final_rating_filipino = $phase8_filipino_sum / $phase8_filipino_count;

    }

    else{

        $phase8_final_rating_filipino = 0;

    }

   

    // $phase8_final_rating_english = round(($term1_phase8_english + $term2_phase8_english + $term3_phase8_english + $term4_phase8_english) / 4);

    
    $phase8_english_numbers = array($term1_phase8_english, $term2_phase8_english, $term3_phase8_english, $term4_phase8_english);
    $phase8_english_count = count(array_filter($phase8_english_numbers));
    if($phase8_english_count != 0 ){
        $phase8_english_sum = array_sum($phase8_english_numbers);

        $phase8_final_rating_english = $phase8_english_sum / $phase8_english_count;
    }
    
    else{

        $phase8_final_rating_english = 0;
    }


    // $phase8_final_rating_math = round(($term1_phase8_mathematics + $term2_phase8_mathematics + $term3_phase8_mathematics + $term4_phase8_mathematics ) / 4);

    $phase8_math_numbers = array($term1_phase8_mathematics, $term2_phase8_mathematics,  $term3_phase8_mathematics, $term4_phase8_mathematics);
    $phase8_math_count = count(array_filter($phase8_math_numbers));
    
    if($phase8_math_count != 0){
        $phase8_math_sum = array_sum($phase8_math_numbers);
    
        $phase8_final_rating_math = $phase8_math_sum / $phase8_math_count;

    }

    else{
        $phase8_final_rating_math = 0;

    }

   

    // $phase8_final_rating_science = round(($term1_phase8_science + $term2_phase8_science + $term3_phase8_science + $term4_phase8_science) / 4);

    $phase8_science_numbers = array($term1_phase8_science, $term2_phase8_science, $term3_phase8_science, $term4_phase8_science);
    $phase8_science_count = count(array_filter($phase8_science_numbers));
    
    if($phase8_science_count != 0){

        $phase8_science_sum = array_sum($phase8_science_numbers);

    $phase8_final_rating_science = $phase8_science_sum / $phase8_science_count;
    }

    else{

        $phase8_final_rating_science = 0;
    }

    

    // $phase8_final_rating_AP = round(($term1_phase8_araling_panlipunan + $term2_phase8_araling_panlipunan + $term3_phase8_araling_panlipunan + $term4_phase8_araling_panlipunan) / 4);

    $phase8_ap_numbers = array($term1_phase8_araling_panlipunan, $term2_phase8_araling_panlipunan, $term3_phase8_araling_panlipunan, $term4_phase8_araling_panlipunan);
    $phase8_ap_count = count(array_filter($phase8_ap_numbers));

    if($phase8_ap_count != 0){
        $phase8_ap_sum = array_sum($phase8_ap_numbers);

        $phase8_final_rating_AP = $phase8_ap_sum / $phase8_ap_count;

    }

    else{
        $phase8_final_rating_AP = 0;
        
    }

    // $phase8_final_rating_epp_tle = round(($term1_phase8_epp_tle + $term2_phase8_epp_tle + $term3_phase8_epp_tle + $term4_phase8_epp_tle) / 4);

    $phase8_epp_tle_numbers = array($term1_phase8_epp_tle, $term2_phase8_epp_tle, $term3_phase8_epp_tle, $term4_phase8_epp_tle);
    $phase8_epp_tle_count = count(array_filter($phase8_epp_tle_numbers));

    if($phase8_epp_tle_count != 0){

        $phase8_epp_tle_sum = array_sum($phase8_epp_tle_numbers);
    
    $phase8_final_rating_epp_tle = $phase8_epp_tle_sum / $phase8_epp_tle_count;
    }

    else{
        $phase8_final_rating_epp_tle = 0;
    }
    
    
    

    // $phase8_final_rating_mapeh = round(($term1_phase8_average_of_mapeh + $term2_phase8_average_of_mapeh + $term3_phase8_average_of_mapeh + $term4_phase8_average_of_mapeh) / 4 );

    $phase8_mapeh_numbers = array($term1_phase8_average_of_mapeh, $term2_phase8_average_of_mapeh, $term3_phase8_average_of_mapeh, $term4_phase8_average_of_mapeh);
    $phase8_mapeh_count = count(array_filter($phase8_mapeh_numbers));
    
    if($phase8_mapeh_count != 0){

        $phase8_mapeh_sum = array_sum($phase8_mapeh_numbers);
    
        $phase8_final_rating_mapeh = $phase8_mapeh_sum / $phase8_mapeh_count;

    }

    else{
        
        $phase8_final_rating_mapeh = 0;

    }
   

    // $phase8_final_rating_music = round(($term1_phase8_music + $term2_phase8_music + $term3_phase8_music + $term4_phase8_music) / 4);

    $phase8_music_numbers = array($term1_phase8_music, $term2_phase8_music, $term3_phase8_music, $term4_phase8_music);
    $phase8_music_count = count(array_filter($phase8_music_numbers));
    
    if($phase8_music_count != 0){
        $phase8_music_sum = array_sum($phase8_music_numbers);
    
        $phase8_final_rating_music =  $phase8_music_sum / $phase8_music_count;

    }

    else {
        $phase8_final_rating_music = 0;
    }
   
    

    // $phase8_final_rating_arts = round(($term1_phase8_arts + $term2_phase8_arts + $term3_phase8_arts + $term4_phase8_arts ) / 4);

    
    $phase8_arts_numbers = array($term1_phase8_arts, $term2_phase8_arts, $term3_phase8_arts, $term4_phase8_arts);
    $phase8_arts_count = count(array_filter($phase8_arts_numbers)); 
    
    if ($phase8_arts_count != 0) {
        
        $phase8_arts_sum = array_sum($phase8_arts_numbers);
    
        $phase8_final_rating_arts =  $phase8_arts_sum / $phase8_arts_count;

    }

    else{
        $phase8_final_rating_arts = 0;
    }
    
    // $phase8_final_rating_PE = round(($term1_phase8_pe + $term2_phase8_pe + $term3_phase8_pe + $term4_phase8_pe) / 4);

    $phase8_pe_numbers = array($term1_phase8_pe, $term2_phase8_pe, $term3_phase8_pe, $term4_phase8_pe);
    $phase8_pe_count = count(array_filter($phase8_pe_numbers));
    
    if($phase8_pe_count != 0){
        $phase8_pe_sum = array_sum($phase8_pe_numbers);
    
        $phase8_final_rating_PE = $phase8_pe_sum / $phase8_pe_count;
    }

    else{
        $phase8_final_rating_PE = 0;
    }
    

    



    // $phase8_final_rating_health = round(($term1_phase8_health + $term2_phase8_health + $term3_phase8_health + $term4_phase8_health)/ 4);

    $phase8_health_numbers = array($term1_phase8_health, $term2_phase8_health, $term3_phase8_health, $term4_phase8_health);
    $phase8_health_count = count(array_filter($phase8_health_numbers));
    
    if($phase8_health_count != 0){
        $phase8_health_sum = array_sum($phase8_health_numbers);
    
        $phase8_final_rating_health = $phase8_health_sum / $phase8_health_count;
    }

    else {
        $phase8_final_rating_health = 0;
    }

    

     // $phase8_final_rating_esp = round(($term1_phase8_esp + $term2_phase8_esp + $term3_phase8_esp + $term4_phase8_esp) / 4);
    
     $phase8_esp_numbers = array($term1_phase8_esp, $term2_phase8_esp, $term3_phase8_esp, $term4_phase8_esp);
     $phase8_esp_count = count (array_filter($phase8_esp_numbers));
     
     if($phase8_esp_count != 0){

        $phase8_esp_sum = array_sum($phase8_esp_numbers);
     
        $phase8_final_rating_esp = $phase8_esp_sum / $phase8_esp_count;
     }
     else{
        $phase8_final_rating_esp = 0;
     }
     



     // $phase8_final_rating_arabic_language = round(($term1_phase8_arabic_language + $term2_phase8_arabic_language + $term3_phase8_arabic_language + $term4_phase8_arabic_language) / 4);

    
     $phase8_arabic_numbers = array($term1_phase8_arabic_language, $term2_phase8_arabic_language, $term3_phase8_arabic_language, $term4_phase8_arabic_language);
     $phase8_arabic_count = count(array_filter($phase8_arabic_numbers));
    
     if($phase8_arabic_count != 0){
        $phase8_arabic_sum = array_sum($phase8_arabic_numbers);
     
        $phase8_final_rating_arabic_language = $phase8_arabic_sum / $phase8_arabic_count;
     }

     else{

        $phase8_final_rating_arabic_language = 0;

     }

    

    // $phase8_final_rating_islamic_values = round(($term1_phase8_islamic_values + $term2_phase8_islamic_values + $term3_phase8_islamic_values + $term4_phase8_islamic_values) / 4);

    $phase8_islamic_numbers = array($term1_phase8_islamic_values, $term2_phase8_islamic_values, $term3_phase8_islamic_values, $term4_phase8_islamic_values);
    $phase8_islamic_count = count(array_filter($phase8_islamic_numbers));
    
    if($phase8_islamic_count !=0){
        $phase8_islamic_sum = array_sum($phase8_islamic_numbers);
    
        $phase8_final_rating_islamic_values = $phase8_islamic_sum / $phase8_islamic_count;
    }

    else{
        $phase8_final_rating_islamic_values = 0;
    }
    



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


  // $phase8_term1_general_average = round(($term1_phase8_mother_tongue + $term1_phase8_filipino + $term1_phase8_english + $term1_phase8_mathematics + $term1_phase8_science + $term1_phase8_araling_panlipunan + $term1_phase8_epp_tle + $term1_phase8_average_of_mapeh + $term1_phase8_esp) / 9);
    
  $phase8_term1_gen_numbers = array($term1_phase8_mother_tongue, $term1_phase8_filipino, $term1_phase8_english, $term1_phase8_mathematics, $term1_phase8_science, $term1_phase8_araling_panlipunan, $term1_phase8_epp_tle, $term1_phase8_average_of_mapeh, $term1_phase8_esp);
  $phase8_term1_gen_count = count(array_filter($phase8_term1_gen_numbers));

  if($phase8_term1_gen_count != 0){
      
      $phase8_term1_gen_sum = array_sum($phase8_term1_gen_numbers);
  
      $phase8_term1_general_average = $phase8_term1_gen_sum / $phase8_term1_gen_count;
      
  }
  
  else{
      $phase8_term1_general_average = 0;
  }
  
  // $phase8_term2_general_average = round(($term2_phase8_mother_tongue + $term2_phase8_filipino + $term2_phase8_english + $term2_phase8_mathematics + $term2_phase8_science + $term2_phase8_araling_panlipunan + $term2_phase8_epp_tle + $term2_phase8_average_of_mapeh + $term2_phase8_esp) / 9);
  $phase8_term2_gen_numbers = array($term2_phase8_mother_tongue, $term2_phase8_filipino, $term2_phase8_english, $term2_phase8_mathematics, $term2_phase8_science, $term2_phase8_araling_panlipunan, $term2_phase8_epp_tle, $term2_phase8_average_of_mapeh, $term2_phase8_esp);
  $phase8_term2_gen_count = count(array_filter($phase8_term2_gen_numbers));
  
  if ($phase8_term2_gen_count != 0){
      
      $phase8_term2_gen_sum = array_sum($phase8_term2_gen_numbers);
  
      $phase8_term2_general_average = $phase8_term2_gen_sum / $phase8_term2_gen_count;

  }

  else {
      $phase8_term2_general_average = 0;
  }

 
  
   // $phase8_term3_general_average = round(($term3_phase8_mother_tongue + $term3_phase8_filipino + $term3_phase8_english + $term3_phase8_mathematics + $term3_phase8_science + $term3_phase8_araling_panlipunan + $term3_phase8_epp_tle + $term3_phase8_average_of_mapeh + $term3_phase8_esp) / 9);
  
   $phase8_term3_gen_numbers = array($term3_phase8_mother_tongue, $term3_phase8_filipino, $term3_phase8_english, $term3_phase8_mathematics, $term3_phase8_science, $term3_phase8_araling_panlipunan, $term3_phase8_epp_tle, $term3_phase8_average_of_mapeh, $term3_phase8_esp);
   $phase8_term3_gen_count = count(array_filter($phase8_term3_gen_numbers));
   

      if($phase8_term3_gen_count != 0){
          $phase8_term3_gen_sum = array_sum($phase8_term3_gen_numbers);
   
          $phase8_term3_general_average = $phase8_term3_gen_sum / $phase8_term3_gen_count;

      }

      else{
          $phase8_term3_general_average = 0;

      }


   
  
  
  
   // $phase8_term4_general_average = round(($term4_phase8_mother_tongue + $term4_phase8_filipino + $term4_phase8_english + $term4_phase8_mathematics + $term4_phase8_science + $term4_phase8_araling_panlipunan + $term4_phase8_epp_tle + $term4_phase8_average_of_mapeh + $term4_phase8_esp) / 9);
  
   $phase8_term4_gen_numbers = array($term4_phase8_mother_tongue, $term4_phase8_filipino, $term4_phase8_english, $term4_phase8_mathematics, $term4_phase8_science, $term4_phase8_araling_panlipunan, $term4_phase8_epp_tle, $term4_phase8_average_of_mapeh, $term4_phase8_esp);
   $phase8_term4_gen_count = count(array_filter($phase8_term4_gen_numbers));
  
      if($phase8_term4_gen_count != 0){
          $phase8_term4_gen_sum = array_sum($phase8_term4_gen_numbers);
   
          $phase8_term4_general_average = $phase8_term4_gen_sum / $phase8_term4_gen_count;

      }

      else{
          $phase8_term4_general_average = 0;

      }

  
  
  
  
  
   // $phase8_term5_general_average = round(($phase8_final_rating_mother_tongue  + $phase8_final_rating_filipino + $phase8_final_rating_english + $phase8_final_rating_math + $phase8_final_rating_science + $phase8_final_rating_AP + $phase8_final_rating_epp_tle + $phase8_final_rating_mapeh + $phase8_final_rating_esp) / 9);


   $phase8_term5_gen_numbers = array($phase8_final_rating_mother_tongue, $phase8_final_rating_filipino, $phase8_final_rating_english, $phase8_final_rating_math, $phase8_final_rating_science, $phase8_final_rating_AP, $phase8_final_rating_epp_tle, $phase8_final_rating_mapeh, $phase8_final_rating_esp);
   $phase8_term5_gen_count = count(array_filter($phase8_term5_gen_numbers));

   if($phase8_term5_gen_count != 0){
      
      $phase8_term5_gen_sum = array_sum($phase8_term5_gen_numbers);
      
      $phase8_term5_general_average = $phase8_term5_gen_sum / $phase8_term5_gen_count;
 }

   else{
      $phase8_term5_general_average = 0;

   }

 
//Phase8 Insert Scholastic Records

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
        echo "Error student final ratings arabic" . $conn->error;
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
    VALUES ('$lrn','$phase8_term5_general_average', '$phase8_term5','$phase8','$term1_phase8_remarks', '$dateCreated','$dateUpdated')";

    $run_phase8_term5_general_average = mysqli_query($conn,$insert_phase8_term5_general_average);

    if($run_phase8_term5_general_average){
        echo "added student averages term5";
    }else{
        echo "added student averages term5";
    }


    //insert certifation 1

   $insert_phase1_cert_query = "INSERT INTO `certifications`(`lrn`, `name`, `grade`, `name_of_school`, `school_id`, `division`, `last_school_year_attended`, `date`, `name_of_principal`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
   VALUES ('$phase1_cert_lrn','$phase1_cert_name','$phase1_cert_grade','$phase1_cert_school','$phase1_cert_id','$phase1_cert_div','$phase1_cert_attend','$phase1_cert_date','$phase1_cert_principal','$phase1','$remarks','$dateCreated','$dateUpdated')";
   $run_phase1_cert_query = mysqli_query($conn,$insert_phase1_cert_query);

   if($run_phase1_cert_query){
       echo "added Certification 1 ";
   }else{
       echo "error";
       
   }

   // insert certification 2 

   $insert_phase2_cert_query = "INSERT INTO `certifications`(`lrn`, `name`, `grade`, `name_of_school`, `school_id`, `division`, `last_school_year_attended`, `date`, `name_of_principal`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
VALUES ('$phase2_cert_lrn','$phase2_cert_name','$phase2_cert_grade','$phase2_cert_school','$phase2_cert_id','$phase2_cert_div','$phase2_cert_attend','$phase2_cert_date','$phase2_cert_principal','$phase2','$remarks','$dateCreated','$dateUpdated')";
$run_phase2_cert_query = mysqli_query($conn,$insert_phase2_cert_query);

if($run_phase2_cert_query){
   echo "added Certification 2 ";
}else{
   echo "error";
   
}

//insert certification 3 

$insert_phase3_cert_query = "INSERT INTO `certifications`(`lrn`, `name`, `grade`, `name_of_school`, `school_id`, `division`, `last_school_year_attended`, `date`, `name_of_principal`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
VALUES ('$phase3_cert_lrn','$phase3_cert_name','$phase3_cert_grade','$phase3_cert_school','$phase3_cert_id','$phase3_cert_div','$phase3_cert_attend','$phase3_cert_date','$phase3_cert_principal','$phase3','$remarks','$dateCreated','$dateUpdated')";
$run_phase3_cert_query = mysqli_query($conn,$insert_phase3_cert_query);

if($run_phase3_cert_query){
   echo "added Certification 3 ";
}else{
   echo "error";
   
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
       echo "<script>alert('Inserted Successfully');
       window.location = 'home.php';</script>";

   }
   else{
           $conn->error;
       }
   }   
}

}
}



////////////////////////////////////////////////////END OF PHASE 8/////////////////////////////
 

 ?>