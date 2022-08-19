
<?php
ob_start();
include('connection.php');
session_start();
date_default_timezone_set('Asia/Manila');
include('security.php');

?>
<?php include 'includes/header.php';?>
<link rel="stylesheet" href="src/css/phase-style.css">
<?php include 'includes/topnav.php';?>
<?php include 'includes/pre-load.php';?> 
<div class="container-xl bg-white">
<form novalidate action="new-student.php" id="up_form" class="pt-2 mx-0" method="POST">
    <fieldset class="pb-5">
    <section class="form-top d-flex flex-row justify-content-around align-items-center">
        <img src="src/images/DepEd.png" width="120" height="120" alt="">
        <span class="text-center">
            <p class="p-0 m-0">Republic of the Philippines</p>
            <p class="p-0 m-0">Department of Education	</p> 
            <h4 class="fw-bold">Learner's Permanent Academic Record for Elementary School</h4>
            <h4 class="p-0 m-0">(SF10-ES)</h4>
            <p class="p-0 m-0"><i>(Formerly Form 137)</i></p>
        </span>
        <img src="src/images/DepEd_2.png" width="150" height="100" alt="">
    </section>
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
                <input type="checkbox" class="form-check-input" name="credential_presented[]" value="Kinder Progress Report">
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
    <!-- Phase 1 -->
    <p style="background:#c0c0c0; text-align:center; font-size:12pt; font-weight:600; margin:0; border:1px solid black;">SCHOLASTIC RECORDS</p>
    <div class="gen-container d-flex flex-row mt-0 pt-0">
        <div class="form-container" style="padding: 0 7px 7px 0 ;">
        <section class="header">
            <span class="d-flex justify-content-between">
                <span>
                    <label>School:</label>
                    <input type="text" id="text-only" name="phase1_name_of_school"  class="school">
                </span>
                <span>
                    <label>School ID:</label>
                    <input type="text" name="phase1_school_id" id="dash" class="school_id">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                    <label>District:</label>
                    <input type="text" class="w-50" name="phase1_district" class="district">
                </span>
                <span>
                    <label>Division:</label>
                    <input type="text" class="w-50" name="phase1_division" class="division">
                </span>
                <span class="text-end">
                    <label>Region:</label>
                    <input type="text" class="w-50" name="phase1_region" id="dash" class="region">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                    <label>Classified as Grade:</label>
                    <input type="number" id="number-only" style="width: 20%;" name="phase1_classified_as_grade">
                </span>
                <span>
                    <label>Section:</label>
                    <input type="text" class="w-50" name="phase1_section"> 
                </span>
                <span>
                    <label>School Year:</label>
                    <input type="text" class="w-50" id="dash" name="phase1_school_year">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                <label for="">Name of Adviser:</label>
                <input type="text" id="text-only" name="phase1_name_of_teacher">
                </span>
                <span>
                    <label>Signature:</label>
                    <input type="text" id="text-only" name="phase1_signature" class="school_id">
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
                    <td><input type="number" name="term1_phase1_mother_tongue" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase1_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase1_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase1_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Filipino</td>
                    <td><input type="number" name="term1_phase1_filipino" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase1_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase1_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase1_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">English</td>
                    <td><input type="number" name="term1_phase1_english" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase1_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase1_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase1_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly  ></td>
                    <td></td>
                </tr>
                    <td class="text-start fw-bold">Mathematics</td>
                    <td><input type="number" name="term1_phase1_mathematics" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase1_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase1_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase1_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Science</td>
                    <td><input type="number" name="term1_phase1_science" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase1_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase1_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase1_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Araling Panlipunan</td>
                    <td><input type="number" name="term1_phase1_araling_panlipunan" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase1_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase1_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase1_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">EPP/TLE</td>
                    <td><input type="number" name="term1_phase1_epp_tle" id="grade"  title="Please input 2 Numbers only" ></td>           
                    <td><input type="number" name="term2_phase1_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase1_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase1_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">MAPEH</td>
                    <td><input type="text" name="term1_phase1_mapeh" readonly></td>
                    <td><input type="text" name="term2_phase1_mapeh" readonly></td>
                    <td><input type="text" name="term3_phase1_mapeh" readonly></td>
                    <td><input type="text" name="term4_phase1_mapeh" readonly></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>               
                    <td class="text-start"><i>Music</i></td>           
                    <td><input type="number" name="term1_phase1_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase1_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase1_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase1_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Arts</i></td>
                    <td><input type="number" name="term1_phase1_arts" id="grade" title="Please input 2 Numbers only" ></td>       
                    <td><input type="number" name="term2_phase1_arts"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase1_arts" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase1_arts"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Physical Education</i></td>
                    <td><input type="number" name="term1_phase1_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase1_pe"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase1_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase1_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Health</i></td>
                    <td><input type="number" name="term1_phase1_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase1_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase1_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase1_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Edukasyon sa Pagpapakatao</td>
                    <td><input type="number" name="term1_phase1_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase1_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase1_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase1_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start">*Arabic Language</td>        
                    <td><input type="number" name="term1_phase1_arabic_language" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase1_arabic_language" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase1_arabic_language"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase1_arabic_language" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start">*Islamic Values Education</td>
                    <td><input type="number" name="term1_phase1_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase1_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase1_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase1_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">General Average</td>
                    <td><input type="number" name="general_average1" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td><input type="number" name="general_average2" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td><input type="number" name="general_average3" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td><input type="number" name="general_average4" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td><input type="number" name="general_average5" id="grade" title="Please input 2 Numbers only" readonly></td>
                </tr>
            </tbody>
        </table>
        <!-- Remedial Table PHASE 1 -->
        <table class="table-condensed text-center w-100">
            <thead> 
                <tr>
                    <th colspan="2">Remedial Classes</th>
                    <th colspan="4">
                        <span class="d-flex flex-row justify-content-between">
                            <span>
                                <label for="">Date conducted: </label>
                                <input type="date" class="datefrom"  name="phase1_remedial_from">
                            </span>
                            <span>
                                <label for="">To: </label>
                                <input type="date" class="dateto" name="phase1_remedial_to" >
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
                    <td><input type="text" class="learning-areas1" name="phase1_remedial_learning_areas_1"></td>
                    <td><input type="number" id="grade" class="final_rating1" name="phase1_remedial_final_rating_1"></td>
                    <td><input type="text" name="phase1_remedial_class_mark_1" id=""></td>
                    <td><input type="number" id="grade" name="phase1_recomputed_final_grade_1" title="Please input 2 Numbers only"></td>
                    <td><input type="text" name="phase1_remedial_remarks_1" id=""></td>
                </tr>
                <tr>
                    <td><input type="text" class="learning_areas2" name="phase1_remedial_learning_areas_2"></td>
                    <td><input type="number" id="grade" class="final_rating2" name="phase1_remedial_final_rating_2"></td>
                    <td><input type="text" name="phase1_remedial_class_mark_2" id=""> </td>
                    <td><input type="number" id="grade" name="phase1_recomputed_final_grade_2" title="Please input 2 Numbers only"></td>
                    <td><input type="text" name="phase1_remedial_remarks_2" id=""></td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Phase 2 -->
    <div class="form-container" style="padding:0 0 7px 7px;">
        <section class="header">
            <span class="d-flex justify-content-between">
                <span>
                    <label>School:</label>
                    <input type="text" id="text-only" name="phase2_name_of_school"  class="school">
                </span>
                <span>
                    <label>School ID:</label>
                    <input type="text" name="phase2_school_id" id="dash" class="school_id">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                    <label>District:</label>
                    <input type="text" class="w-50" name="phase2_district" class="district">
                </span>
                <span>
                    <label>Division:</label>
                    <input type="text" class="w-50" name="phase2_division" class="division">
                </span>
                <span class="text-end">
                    <label>Region:</label>
                    <input type="text" class="w-50" name="phase2_region" id="dash" class="region">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                    <label>Classified as Grade:</label>
                    <input type="number" id="number-only" style="width: 20%;" name="phase2_classified_as_grade">
                </span>
                <span>
                    <label>Section:</label>
                    <input type="text" class="w-50" name="phase2_section"> 
                </span>
                <span>
                    <label>School Year:</label>
                    <input type="text" class="w-50" id="dash" name="phase2_school_year">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                <label for="">Name of Adviser:</label>
                <input type="text" id="text-only" name="phase2_name_of_teacher">
                </span>
                <span>
                    <label>Signature:</label>
                    <input type="text" id="text-only" name="phase2_signature" class="school_id">
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
                    <td><input type="number" name="term1_phase2_mother_tongue" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase2_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase2_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase2_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Filipino</td>
                    <td><input type="number" name="term1_phase2_filipino" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase2_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase2_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase2_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">English</td>
                    <td><input type="number" name="term1_phase2_english" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase2_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase2_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase2_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                    <td class="text-start fw-bold">Mathematics</td>
                    <td><input type="number" name="term1_phase2_mathematics" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase2_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase2_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase2_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Science</td>
                    <td><input type="number" name="term1_phase2_science" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase2_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase2_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase2_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Araling Panlipunan</td>
                    <td><input type="number" name="term1_phase2_araling_panlipunan" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase2_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase2_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase2_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only"readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">EPP/TLE</td>
                    <td><input type="number" name="term1_phase2_epp_tle" id="grade"  title="Please input 2 Numbers only" ></td>           
                    <td><input type="number" name="term2_phase2_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase2_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase2_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only"readonly ></td>
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
                    <td><input type="number" name="term1_phase2_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase2_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase2_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase2_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Arts</i></td>
                    <td><input type="number" name="term1_phase2_arts" id="grade" title="Please input 2 Numbers only" ></td>       
                    <td><input type="number" name="term2_phase2_arts"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase2_arts" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase2_arts"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Physical Education</i></td>
                    <td><input type="number" name="term1_phase2_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase2_pe"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase2_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase2_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Health</i></td>
                    <td><input type="number" name="term1_phase2_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase2_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase2_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase2_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only"readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Edukasyon sa Pagpapakatao</td>
                    <td><input type="number" name="term1_phase2_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase2_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase2_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase2_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only"readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start">*Arabic Language</td>        
                    <td><input type="number" name="term1_phase2_arabic_language" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase2_arabic_language" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase2_arabic_language"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase2_arabic_language" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start">*Islamic Values Education</td>
                    <td><input type="number" name="term1_phase2_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase2_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase2_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase2_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
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
        <!-- Remedial Table PHASE 2 -->
        <table class="table-condensed text-center w-100">
            <thead> 
                <tr>
                    <th colspan="2">Remedial Classes</th>
                    <th colspan="4">
                        <span class="d-flex flex-row justify-content-between">
                            <span>
                                <label for="">Date conducted: </label>
                                <input type="date" class="datefrom"  name="phase2_remedial_from">
                            </span>
                            <span>
                                <label for="">To: </label>
                                <input type="date" class="dateto" name="phase2_remedial_to" >
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
                    <td><input type="text" class="learning-areas1" name="phase2_remedial_learning_areas_1"></td>
                    <td><input type="number" id="grade" class="final_rating1" name="phase2_remedial_final_rating_1"></td>
                    <td><input type="text" name="phase2_remedial_class_mark_1" id=""></td>
                    <td><input type="number" id="grade" name="phase2_recomputed_final_grade_1" title="Please input 2 Numbers only"></td>
                    <td><input type="text" name="phase2_remedial_remarks_1" id=""></td>
                </tr>
                <tr>
                    <td><input type="text" class="learning_areas2" name="phase2_remedial_learning_areas_2"></td>
                    <td><input type="number" id="grade" class="final_rating2" name="phase2_remedial_final_rating_2"></td>
                    <td><input type="text" name="phase2_remedial_class_mark_2" id=""> </td>
                    <td><input type="number" id="grade" name="phase2_recomputed_final_grade_2" title="Please input 2 Numbers only"></td>
                    <td><input type="text" name="phase2_remedial_remarks_2" id=""></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
    <div class="gen-container d-flex flex-row mt-0 pb-5 pt-0">
        <!-- Phase 3 -->
        <div class="form-container" style="padding: 0 7px 7px 0 ;">
        <section class="header">
            <span class="d-flex justify-content-between">
                <span>
                    <label>School:</label>
                    <input type="text" id="text-only" name="phase3_name_of_school"  class="school">
                </span>
                <span>
                    <label>School ID:</label>
                    <input type="text" name="phase3_school_id" id="dash" class="school_id">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                    <label>District:</label>
                    <input type="text" class="w-50" name="phase3_district" class="district">
                </span>
                <span>
                    <label>Division:</label>
                    <input type="text" class="w-50" name="phase3_division" class="division">
                </span>
                <span class="text-end">
                    <label>Region:</label>
                    <input type="text" class="w-50" name="phase3_region" id="dash" class="region">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                    <label>Classified as Grade:</label>
                    <input type="number" id="number-only" style="width: 20%;" name="phase3_classified_as_grade">
                </span>
                <span>
                    <label>Section:</label>
                    <input type="text" class="w-50" name="phase3_section"> 
                </span>
                <span>
                    <label>School Year:</label>
                    <input type="text" class="w-50" id="dash" name="phase3_school_year">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                <label for="">Name of Adviser:</label>
                <input type="text" id="text-only" name="phase3_name_of_teacher">
                </span>
                <span>
                    <label>Signature:</label>
                    <input type="text" id="text-only" name="phase3_signature" class="school_id">
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
                    <td><input type="number" name="term1_phase3_mother_tongue" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase3_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase3_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase3_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Filipino</td>
                    <td><input type="number" name="term1_phase3_filipino" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase3_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase3_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase3_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">English</td>
                    <td><input type="number" name="term1_phase3_english" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase3_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase3_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase3_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                    <td class="text-start fw-bold">Mathematics</td>
                    <td><input type="number" name="term1_phase3_mathematics" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase3_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase3_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase3_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Science</td>
                    <td><input type="number" name="term1_phase3_science" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase3_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase3_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase3_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Araling Panlipunan</td>
                    <td><input type="number" name="term1_phase3_araling_panlipunan" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase3_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase3_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase3_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">EPP/TLE</td>
                    <td><input type="number" name="term1_phase3_epp_tle" id="grade"  title="Please input 2 Numbers only" ></td>           
                    <td><input type="number" name="term2_phase3_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase3_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase3_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">MAPEH</td>
                    <td><input type="text" name="term1_phase3_mapeh" readonly></td>
                    <td><input type="text" name="term2_phase3_mapeh" readonly></td>
                    <td><input type="text" name="term3_phase3_mapeh" readonly></td>
                    <td><input type="text" name="term4_phase3_mapeh" readonly></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>               
                    <td class="text-start"><i>Music</i></td>           
                    <td><input type="number" name="term1_phase3_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase3_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase3_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase3_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Arts</i></td>
                    <td><input type="number" name="term1_phase3_arts" id="grade" title="Please input 2 Numbers only" ></td>       
                    <td><input type="number" name="term2_phase3_arts"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase3_arts" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase3_arts"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only"readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Physical Education</i></td>
                    <td><input type="number" name="term1_phase3_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase3_pe"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase3_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase3_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Health</i></td>
                    <td><input type="number" name="term1_phase3_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase3_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase3_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase3_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Edukasyon sa Pagpapakatao</td>
                    <td><input type="number" name="term1_phase3_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase3_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase3_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase3_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start">*Arabic Language</td>        
                    <td><input type="number" name="term1_phase3_arabic_language" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase3_arabic_language" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase3_arabic_language"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase3_arabic_language" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start">*Islamic Values Education</td>
                    <td><input type="number" name="term1_phase3_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase3_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase3_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase3_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
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
        <!-- Remedial Table PHASE 3 -->
        <table class="table-condensed text-center w-100">
            <thead> 
                <tr>
                    <th colspan="2">Remedial Classes</th>
                    <th colspan="4">
                        <span class="d-flex flex-row justify-content-between">
                            <span>
                                <label for="">Date conducted: </label>
                                <input type="date" class="datefrom"  name="phase3_remedial_from">
                            </span>
                            <span>
                                <label for="">To: </label>
                                <input type="date" class="dateto" name="phase3_remedial_to" >
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
                    <td><input type="text" class="learning-areas1" name="phase3_remedial_learning_areas_1"></td>
                    <td><input type="number" id="grade" class="final_rating1" name="phase3_remedial_final_rating_1"></td>
                    <td><input type="text" name="phase3_remedial_class_mark_1" id=""></td>
                    <td><input type="number" id="grade" name="phase3_recomputed_final_grade_1" title="Please input 2 Numbers only"></td>
                    <td><input type="text" name="phase3_remedial_remarks_1" id=""></td>
                </tr>
                <tr>
                    <td><input type="text" class="learning_areas2" name="phase3_remedial_learning_areas_2"></td>
                    <td><input type="number" id="grade" class="final_rating2" name="phase3_remedial_final_rating_2"></td>
                    <td><input type="text" name="phase3_remedial_class_mark_2" id=""> </td>
                    <td><input type="number" id="grade" name="phase3_recomputed_final_grade_2" title="Please input 2 Numbers only"></td>
                    <td><input type="text" name="phase3_remedial_remarks_2" id=""></td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Phase 4 -->
    <div class="form-container" style="padding:0 0 7px 7px;">
        <section class="header">
            <span class="d-flex justify-content-between">
                <span>
                    <label>School:</label>
                    <input type="text" id="text-only" name="phase4_name_of_school"  class="school">
                </span>
                <span>
                    <label>School ID:</label>
                    <input type="text" name="phase4_school_id" id="dash" class="school_id">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                    <label>District:</label>
                    <input type="text" class="w-50" name="phase4_district" class="district">
                </span>
                <span>
                    <label>Division:</label>
                    <input type="text" class="w-50" name="phase4_division" class="division">
                </span>
                <span class="text-end">
                    <label>Region:</label>
                    <input type="text" class="w-50" name="phase4_region" id="dash" class="region">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                    <label>Classified as Grade:</label>
                    <input type="number" id="number-only" style="width: 20%;" name="phase4_classified_as_grade">
                </span>
                <span>
                    <label>Section:</label>
                    <input type="text" class="w-50" name="phase4_section"> 
                </span>
                <span>
                    <label>School Year:</label>
                    <input type="text" class="w-50" id="dash" name="phase4_school_year">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                <label for="">Name of Adviser:</label>
                <input type="text" id="text-only" name="phase4_name_of_teacher">
                </span>
                <span>
                    <label>Signature:</label>
                    <input type="text" id="text-only" name="phase4_signature" class="school_id">
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
                    <td><input type="number" name="term1_phase4_mother_tongue" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase4_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase4_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase4_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only"readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Filipino</td>
                    <td><input type="number" name="term1_phase4_filipino" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase4_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase4_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase4_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">English</td>
                    <td><input type="number" name="term1_phase4_english" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase4_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase4_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase4_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only"readonly ></td>
                    <td></td>
                </tr>
                    <td class="text-start fw-bold">Mathematics</td>
                    <td><input type="number" name="term1_phase4_mathematics" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase4_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase4_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase4_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only"readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Science</td>
                    <td><input type="number" name="term1_phase4_science" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase4_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase4_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase4_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Araling Panlipunan</td>
                    <td><input type="number" name="term1_phase4_araling_panlipunan" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase4_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase4_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase4_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">EPP/TLE</td>
                    <td><input type="number" name="term1_phase4_epp_tle" id="grade"  title="Please input 2 Numbers only" ></td>           
                    <td><input type="number" name="term2_phase4_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase4_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase4_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only"readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">MAPEH</td>
                    <td><input type="text" name="term1_phase4_mapeh" readonly></td>
                    <td><input type="text" name="term2_phase4_mapeh" readonly></td>
                    <td><input type="text" name="term3_phase4_mapeh" readonly></td>
                    <td><input type="text" name="term4_phase4_mapeh" readonly></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>               
                    <td class="text-start"><i>Music</i></td>           
                    <td><input type="number" name="term1_phase4_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase4_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase4_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase4_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Arts</i></td>
                    <td><input type="number" name="term1_phase4_arts" id="grade" title="Please input 2 Numbers only" ></td>       
                    <td><input type="number" name="term2_phase4_arts"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase4_arts" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase4_arts"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only"readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Physical Education</i></td>
                    <td><input type="number" name="term1_phase4_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase4_pe"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase4_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase4_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Health</i></td>
                    <td><input type="number" name="term1_phase4_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase4_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase4_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase4_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Edukasyon sa Pagpapakatao</td>
                    <td><input type="number" name="term1_phase4_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase4_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase4_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase4_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start">*Arabic Language</td>        
                    <td><input type="number" name="term1_phase4_arabic_language" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase4_arabic_language" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase4_arabic_language"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase4_arabic_language" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start">*Islamic Values Education</td>
                    <td><input type="number" name="term1_phase4_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase4_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase4_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase4_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
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
        <!-- Remedial Table PHASE 4 -->
        <table class="table-condensed text-center w-100">
            <thead> 
                <tr>
                    <th colspan="2">Remedial Classes</th>
                    <th colspan="4">
                        <span class="d-flex flex-row justify-content-between">
                            <span>
                                <label for="">Date conducted: </label>
                                <input type="date" class="datefrom"  name="phase4_remedial_from">
                            </span>
                            <span>
                                <label for="">To: </label>
                                <input type="date" class="dateto" name="phase4_remedial_to" >
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
                    <td><input type="text" class="learning-areas1" name="phase4_remedial_learning_areas_1"></td>
                    <td><input type="number" id="grade" class="final_rating1" name="phase4_remedial_final_rating_1"></td>
                    <td><input type="text" name="phase4_remedial_class_mark_1" id=""></td>
                    <td><input type="number" id="grade" name="phase4_recomputed_final_grade_1" title="Please input 2 Numbers only"></td>
                    <td><input type="text" name="phase4_remedial_remarks_1" id=""></td>
                </tr>
                <tr>
                    <td><input type="text" class="learning_areas2" name="phase4_remedial_learning_areas_2"></td>
                    <td><input type="number" id="grade" class="final_rating2" name="phase4_remedial_final_rating_2"></td>
                    <td><input type="text" name="phase4_remedial_class_mark_2" id=""> </td>
                    <td><input type="number" id="grade" name="phase4_recomputed_final_grade_2" title="Please input 2 Numbers only"></td>
                    <td><input type="text" name="phase4_remedial_remarks_2" id=""></td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
    <input type="button" class="next-form text-end btn btn-success" style="float: right;" value="Next" />
    </fieldset>
    <fieldset class="pb-5">
    <!-- Phase 5 -->
    <p style="background:#c0c0c0; text-align:center; font-size:12pt; font-weight:600; margin:0; border:1px solid black;">SCHOLASTIC RECORDS</p>
    <div class="gen-container d-flex flex-row mt-0 pt-0">
        <div class="form-container" style="padding: 0 7px 7px 0 ;">
        <section class="header">
            <span class="d-flex justify-content-between">
                <span>
                    <label>School:</label>
                    <input type="text" id="text-only" name="phase5_name_of_school"  class="school">
                </span>
                <span>
                    <label>School ID:</label>
                    <input type="text" name="phase5_school_id" id="dash"class="school_id">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                    <label>District:</label>
                    <input type="text" class="w-50" name="phase5_district" class="district">
                </span>
                <span>
                    <label>Division:</label>
                    <input type="text" class="w-50" name="phase5_division" class="division">
                </span>
                <span class="text-end">
                    <label>Region:</label>
                    <input type="text" class="w-50" name="phase5_region" id="dash"class="region">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                    <label>Classified as Grade:</label>
                    <input type="number" id="number-only" style="width: 20%;" name="phase5_classified_as_grade">
                </span>
                <span>
                    <label>Section:</label>
                    <input type="text" class="w-50" name="phase5_section"> 
                </span>
                <span>
                    <label>School Year:</label>
                    <input type="text" class="w-50" name="phase5_school_year" id="dash">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                <label for="">Name of Adviser:</label>
                <input type="text" id="text-only" name="phase5_name_of_teacher">
                </span>
                <span>
                    <label>Signature:</label>
                    <input type="text" id="text-only" name="phase5_signature" class="school_id">
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
                    <td><input type="number" name="term1_phase5_mother_tongue" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase5_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase5_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase5_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only"readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Filipino</td>
                    <td><input type="number" name="term1_phase5_filipino" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase5_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase5_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase5_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">English</td>
                    <td><input type="number" name="term1_phase5_english" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase5_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase5_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase5_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                    <td class="text-start fw-bold">Mathematics</td>
                    <td><input type="number" name="term1_phase5_mathematics" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase5_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase5_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase5_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Science</td>
                    <td><input type="number" name="term1_phase5_science" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase5_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase5_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase5_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Araling Panlipunan</td>
                    <td><input type="number" name="term1_phase5_araling_panlipunan" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase5_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase5_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase5_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">EPP/TLE</td>
                    <td><input type="number" name="term1_phase5_epp_tle" id="grade"  title="Please input 2 Numbers only" ></td>           
                    <td><input type="number" name="term2_phase5_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase5_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase5_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">MAPEH</td>
                    <td><input type="text" name="term1_phase5_mapeh" readonly></td>
                    <td><input type="text" name="term2_phase5_mapeh" readonly></td>
                    <td><input type="text" name="term3_phase5_mapeh" readonly></td>
                    <td><input type="text" name="term4_phase5_mapeh" readonly></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>               
                    <td class="text-start"><i>Music</i></td>           
                    <td><input type="number" name="term1_phase5_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase5_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase5_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase5_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Arts</i></td>
                    <td><input type="number" name="term1_phase5_arts" id="grade" title="Please input 2 Numbers only" ></td>       
                    <td><input type="number" name="term2_phase5_arts"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase5_arts" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase5_arts"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Physical Education</i></td>
                    <td><input type="number" name="term1_phase5_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase5_pe"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase5_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase5_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only"readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Health</i></td>
                    <td><input type="number" name="term1_phase5_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase5_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase5_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase5_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Edukasyon sa Pagpapakatao</td>
                    <td><input type="number" name="term1_phase5_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase5_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase5_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase5_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start">*Arabic Language</td>        
                    <td><input type="number" name="term1_phase5_arabic_language" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase5_arabic_language" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase5_arabic_language"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase5_arabic_language" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start">*Islamic Values Education</td>
                    <td><input type="number" name="term1_phase5_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase5_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase5_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase5_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
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
        <!-- Remedial Table PHASE 5 -->
        <table class="table-condensed text-center w-100">
            <thead> 
                <tr>
                    <th colspan="2">Remedial Classes</th>
                    <th colspan="4">
                        <span class="d-flex flex-row justify-content-between">
                            <span>
                                <label for="">Date conducted: </label>
                                <input type="date" class="datefrom"  name="phase5_remedial_from">
                            </span>
                            <span>
                                <label for="">To: </label>
                                <input type="date" class="dateto" name="phase5_remedial_to" >
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
                    <td><input type="text" class="learning-areas1" name="phase5_remedial_learning_areas_1"></td>
                    <td><input type="number" id="grade" class="final_rating1" name="phase5_remedial_final_rating_1"></td>
                    <td><input type="text" name="phase5_remedial_class_mark_1" id=""></td>
                    <td><input type="number" id="grade" name="phase5_recomputed_final_grade_1" title="Please input 2 Numbers only"></td>
                    <td><input type="text" name="phase5_remedial_remarks_1" id=""></td>
                </tr>
                <tr>
                    <td><input type="text" class="learning_areas2" name="phase5_remedial_learning_areas_2"></td>
                    <td><input type="number" id="grade" class="final_rating2" name="phase5_remedial_final_rating_2"></td>
                    <td><input type="text" name="phase5_remedial_class_mark_2" id=""> </td>
                    <td><input type="number" id="grade" name="phase5_recomputed_final_grade_2" title="Please input 2 Numbers only"></td>
                    <td><input type="text" name="phase5_remedial_remarks_2" id=""></td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Phase 6 -->
    <div class="form-container" style="padding:0 0 7px 7px;">
        <section class="header">
            <span class="d-flex justify-content-between">
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
    <div class="gen-container d-flex flex-row mt-0 pt-0">
        <!-- Phase 7 -->
        <div class="form-container" style="padding: 0 7px 7px 0 ;">
        <section class="header">
            <span class="d-flex justify-content-between">
                <span>
                    <label>School:</label>
                    <input type="text" id="text-only" name="phase7_name_of_school"  class="school">
                </span>
                <span>
                    <label>School ID:</label>
                    <input type="text" name="phase7_school_id" id="dash"class="school_id">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                    <label>District:</label>
                    <input type="text" class="w-50" name="phase7_district" class="district">
                </span>
                <span>
                    <label>Division:</label>
                    <input type="text" class="w-50" name="phase7_division" class="division">
                </span>
                <span class="text-end">
                    <label>Region:</label>
                    <input type="text" class="w-50" name="phase7_region" id="dash"class="region">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                    <label>Classified as Grade:</label>
                    <input type="number" id="number-only" style="width: 20%;" name="phase7_classified_as_grade">
                </span>
                <span>
                    <label>Section:</label>
                    <input type="text" class="w-50" name="phase7_section"> 
                </span>
                <span>
                    <label>School Year:</label>
                    <input type="text" class="w-50" name="phase7_school_year" id="dash">
                </span>
            </span>
            <span class="d-flex justify-content-between">
                <span>
                <label for="">Name of Adviser:</label>
                <input type="text" id="text-only" name="phase7_name_of_teacher">
                </span>
                <span>
                    <label>Signature:</label>
                    <input type="text" id="text-only" name="phase7_signature" class="school_id">
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
                    <td><input type="number" name="term1_phase7_mother_tongue" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase7_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase7_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase7_mother_tongue" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Filipino</td>
                    <td><input type="number" name="term1_phase7_filipino" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase7_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase7_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase7_filipino" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">English</td>
                    <td><input type="number" name="term1_phase7_english" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase7_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase7_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase7_english" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                    <td class="text-start fw-bold">Mathematics</td>
                    <td><input type="number" name="term1_phase7_mathematics" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase7_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase7_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase7_mathematics" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Science</td>
                    <td><input type="number" name="term1_phase7_science" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase7_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase7_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase7_science" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Araling Panlipunan</td>
                    <td><input type="number" name="term1_phase7_araling_panlipunan" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase7_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase7_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase7_araling_panlipunan" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">EPP/TLE</td>
                    <td><input type="number" name="term1_phase7_epp_tle" id="grade"  title="Please input 2 Numbers only" ></td>           
                    <td><input type="number" name="term2_phase7_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase7_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase7_epp_tle" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only"readonly ></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">MAPEH</td>
                    <td><input type="text" name="term1_phase7_mapeh" readonly></td>
                    <td><input type="text" name="term2_phase7_mapeh" readonly></td>
                    <td><input type="text" name="term3_phase7_mapeh" readonly></td>
                    <td><input type="text" name="term4_phase7_mapeh" readonly></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>               
                    <td class="text-start"><i>Music</i></td>           
                    <td><input type="number" name="term1_phase7_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase7_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase7_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase7_music" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Arts</i></td>
                    <td><input type="number" name="term1_phase7_arts" id="grade" title="Please input 2 Numbers only" ></td>       
                    <td><input type="number" name="term2_phase7_arts"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase7_arts" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase7_arts"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Physical Education</i></td>
                    <td><input type="number" name="term1_phase7_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase7_pe"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase7_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase7_pe" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start"><i>Health</i></td>
                    <td><input type="number" name="term1_phase7_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase7_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase7_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase7_health" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Edukasyon sa Pagpapakatao</td>
                    <td><input type="number" name="term1_phase7_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase7_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase7_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase7_esp" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start">*Arabic Language</td>        
                    <td><input type="number" name="term1_phase7_arabic_language" id="grade"  title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase7_arabic_language" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase7_arabic_language"id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase7_arabic_language" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" id="grade" title="Please input 2 Numbers only" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-start">*Islamic Values Education</td>
                    <td><input type="number" name="term1_phase7_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term2_phase7_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term3_phase7_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
                    <td><input type="number" name="term4_phase7_islamic_values" id="grade" title="Please input 2 Numbers only" ></td>
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
        <!-- Remedial Table PHASE 7 -->
        <table class="table-condensed text-center w-100">
            <thead> 
                <tr>
                    <th colspan="2">Remedial Classes</th>
                    <th colspan="4">
                        <span class="d-flex flex-row justify-content-between">
                            <span>
                                <label for="">Date conducted: </label>
                                <input type="date" class="datefrom"  name="phase7_remedial_from">
                            </span>
                            <span>
                                <label for="">To: </label>
                                <input type="date" class="dateto" name="phase7_remedial_to" >
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
                    <td><input type="text" class="learning-areas1" name="phase7_remedial_learning_areas_1"></td>
                    <td><input type="number" id="grade" class="final_rating1" name="phase7_remedial_final_rating_1"></td>
                    <td><input type="text" name="phase7_remedial_class_mark_1" id=""></td>
                    <td><input type="number" id="grade" name="phase7_recomputed_final_grade_1" title="Please input 2 Numbers only"></td>
                    <td><input type="text" name="phase7_remedial_remarks_1" id=""></td>
                </tr>
                <tr>
                    <td><input type="text" class="learning_areas2" name="phase7_remedial_learning_areas_2"></td>
                    <td><input type="number" id="grade" class="final_rating2" name="phase7_remedial_final_rating_2"></td>
                    <td><input type="text" name="phase7_remedial_class_mark_2" id=""> </td>
                    <td><input type="number" id="grade" name="phase7_recomputed_final_grade_2" title="Please input 2 Numbers only"></td>
                    <td><input type="text" name="phase7_remedial_remarks_2" id=""></td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Phase 8 -->
    <div class="form-container" style="padding:0 0 7px 7px;">
        <section class="header">
            <span class="d-flex justify-content-between">
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
    <input type="button" name="previous" style="float:left;" class="previous-form btn btn-danger" value="Previous" />
    <input type = "submit" name= "add" class="btn btn-success" style="float:right; border-radius:20px;" value = "Add Record"> 
</fieldset>
</div>

<script src="src/js/number_limitation.js"></script>
<script src="src/js/loading_screen.js"></script>
<?php include 'includes/footer.php'; ?>





<?php

if(isset($_POST['add'])){
    
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
    }else{
        $others  = " ";
        $others_checkbox = " ";
    }

    
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


    $phase1 = '1';
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
    $term1_phase1_mother_tongue = intval($_POST['term1_phase1_mother_tongue']);
    $term1_phase1_filipino = intval($_POST['term1_phase1_filipino']);
    $term1_phase1_english = intval($_POST['term1_phase1_english']);
    $term1_phase1_mathematics = intval($_POST['term1_phase1_mathematics']);
    $term1_phase1_science = intval($_POST['term1_phase1_science']);
    $term1_phase1_araling_panlipunan = intval($_POST['term1_phase1_araling_panlipunan']);
    $term1_phase1_epp_tle = intval($_POST['term1_phase1_epp_tle']);
    $term1_phase1_music = intval($_POST['term1_phase1_music']);
    $term1_phase1_arts = intval($_POST['term1_phase1_arts']);
    $term1_phase1_pe = intval($_POST['term1_phase1_pe']);
    $term1_phase1_health = intval($_POST['term1_phase1_health']);
    $term1_phase1_esp = intval($_POST['term1_phase1_esp']);
    $term1_phase1_arabic_language = intval($_POST['term1_phase1_arabic_language']);
    $term1_phase1_islamic_values = intval($_POST['term1_phase1_islamic_values']);
    $term1_phase1_remarks = 'none'; 

    //term2_phase1 grades
    //term2_phase1 
    $term2_phase1 = 2;
    $term2_phase1_mother_tongue = intval($_POST['term2_phase1_mother_tongue']);
    $term2_phase1_filipino = intval($_POST['term2_phase1_filipino']);
    $term2_phase1_english = intval($_POST['term2_phase1_english']);
    $term2_phase1_mathematics = intval($_POST['term2_phase1_mathematics']);
    $term2_phase1_science = intval($_POST['term2_phase1_science']);
    $term2_phase1_araling_panlipunan = intval($_POST['term2_phase1_araling_panlipunan']);
    $term2_phase1_epp_tle = intval($_POST['term2_phase1_epp_tle']);
    $term2_phase1_music = intval($_POST['term2_phase1_music']);
    $term2_phase1_arts = intval($_POST['term2_phase1_arts']);
    $term2_phase1_pe = intval($_POST['term2_phase1_pe']);
    $term2_phase1_health = intval($_POST['term2_phase1_health']);
    $term2_phase1_esp = intval($_POST['term2_phase1_esp']);
    $term2_phase1_arabic_language = intval($_POST['term2_phase1_arabic_language']);
    $term2_phase1_islamic_values = intval($_POST['term2_phase1_islamic_values']);
    $term2_phase1_remarks = 'none'; 

    //term3_phase1
    //term3_phase1 grades

    $term3_phase1 = 3;
    $term3_phase1_mother_tongue = intval($_POST['term3_phase1_mother_tongue']);
    $term3_phase1_filipino = intval($_POST['term3_phase1_filipino']);
    $term3_phase1_english = intval($_POST['term3_phase1_english']);
    $term3_phase1_mathematics = intval($_POST['term3_phase1_mathematics']);
    $term3_phase1_science = intval($_POST['term3_phase1_science']);
    $term3_phase1_araling_panlipunan = intval($_POST['term3_phase1_araling_panlipunan']);
    $term3_phase1_epp_tle = intval($_POST['term3_phase1_epp_tle']);
    $term3_phase1_music = intval($_POST['term3_phase1_music']);
    $term3_phase1_arts = intval($_POST['term3_phase1_arts']);
    $term3_phase1_pe = intval($_POST['term3_phase1_pe']);
    $term3_phase1_health = intval($_POST['term3_phase1_health']);
    $term3_phase1_esp = intval($_POST['term3_phase1_esp']);
    $term3_phase1_arabic_language = intval($_POST['term3_phase1_arabic_language']);
    $term3_phase1_islamic_values = intval($_POST['term3_phase1_islamic_values']);
    $term3_phase1_remarks = 'none'; 

    //term4_phase1
    //term4_phase1 grades

    $term4_phase1 = 4;
    $term4_phase1_mother_tongue = intval($_POST['term4_phase1_mother_tongue']);
    $term4_phase1_filipino = intval($_POST['term4_phase1_filipino']);
    $term4_phase1_english = intval($_POST['term4_phase1_english']);
    $term4_phase1_mathematics = intval($_POST['term4_phase1_mathematics']);
    $term4_phase1_science = intval($_POST['term4_phase1_science']);
    $term4_phase1_araling_panlipunan = intval($_POST['term4_phase1_araling_panlipunan']);
    $term4_phase1_epp_tle = intval($_POST['term4_phase1_epp_tle']);
    $term4_phase1_music = intval($_POST['term4_phase1_music']);
    $term4_phase1_arts = intval($_POST['term4_phase1_arts']);
    $term4_phase1_pe = intval($_POST['term2_phase1_pe']);
    $term4_phase1_health = intval($_POST['term4_phase1_health']);
    $term4_phase1_esp = intval($_POST['term4_phase1_esp']);
    $term4_phase1_arabic_language = intval($_POST['term4_phase1_arabic_language']);
    $term4_phase1_islamic_values = intval($_POST['term4_phase1_islamic_values']);
    $term4_phase1_remarks = 'none';

    // remedial phase1

    $phase1_remedial_from = date("Y-m-d",strtotime($_POST['phase1_remedial_from']));
    $phase1_remedial_to = date("Y-m-d" ,strtotime($_POST['phase1_remedial_to']));
    $phase1_remedial_learning_areas_1 = $_POST['phase1_remedial_learning_areas_1'] ;
    $phase1_remedial_final_rating_1 =$_POST['phase1_remedial_final_rating_1'];
    $phase1_remedial_class_mark_1 = $_POST['phase1_remedial_class_mark_1'];
    $phase1_recomputed_final_grade_1 = $_POST['phase1_recomputed_final_grade_1'];
    $phase1_remedial_remarks_1 = $_POST['phase1_remedial_remarks_1'];

    $phase1_remedial_learning_areas_2 = $_POST['phase1_remedial_learning_areas_2'] ;
    $phase1_remedial_final_rating_2 =$_POST['phase1_remedial_final_rating_2'];
    $phase1_remedial_class_mark_2 = $_POST['phase1_remedial_class_mark_2'];
    $phase1_recomputed_final_grade_2 = $_POST['phase1_recomputed_final_grade_2'];
    $phase1_remedial_remarks_2 = $_POST['phase1_remedial_remarks_2'];

    //phase 2 scholastic records

    $phase2 = '2';
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


    $term1_phase2 = 1;
    $term1_phase2_mother_tongue = intval($_POST['term1_phase2_mother_tongue']);
    $term1_phase2_filipino = intval($_POST['term1_phase2_filipino']);
    $term1_phase2_english = intval($_POST['term1_phase2_english']);
    $term1_phase2_mathematics = intval($_POST['term1_phase2_mathematics']);
    $term1_phase2_science = intval($_POST['term1_phase2_science']);
    $term1_phase2_araling_panlipunan = intval($_POST['term1_phase2_araling_panlipunan']);
    $term1_phase2_epp_tle = intval($_POST['term1_phase2_epp_tle']);
    $term1_phase2_music = intval($_POST['term1_phase2_music']);
    $term1_phase2_arts = intval($_POST['term1_phase2_arts']);
    $term1_phase2_pe = intval($_POST['term1_phase2_pe']);
    $term1_phase2_health = intval($_POST['term1_phase2_health']);
    $term1_phase2_esp = intval($_POST['term1_phase2_esp']);
    $term1_phase2_arabic_language = intval($_POST['term1_phase2_arabic_language']);
    $term1_phase2_islamic_values = intval($_POST['term1_phase2_islamic_values']);
    $term1_phase2_remarks = 'none'; 

    //term2_phase2 grades
    //term2_phase2 
    $term2_phase2 = 2;
    $term2_phase2_mother_tongue = intval($_POST['term2_phase2_mother_tongue']);
    $term2_phase2_filipino = intval($_POST['term2_phase2_filipino']);
    $term2_phase2_english = intval($_POST['term2_phase2_english']);
    $term2_phase2_mathematics = intval($_POST['term2_phase2_mathematics']);
    $term2_phase2_science = intval($_POST['term2_phase2_science']);
    $term2_phase2_araling_panlipunan = intval($_POST['term2_phase2_araling_panlipunan']);
    $term2_phase2_epp_tle = intval($_POST['term2_phase2_epp_tle']);
    $term2_phase2_music = intval($_POST['term2_phase2_music']);
    $term2_phase2_arts = intval($_POST['term2_phase2_arts']);
    $term2_phase2_pe = intval($_POST['term2_phase2_pe']);
    $term2_phase2_health = intval($_POST['term2_phase2_health']);
    $term2_phase2_esp = intval($_POST['term2_phase2_esp']);
    $term2_phase2_arabic_language = intval($_POST['term2_phase2_arabic_language']);
    $term2_phase2_islamic_values = intval($_POST['term2_phase2_islamic_values']);
    $term2_phase2_remarks = 'none'; 

    //term3_phase2
    //term3_phase2 grades

    $term3_phase2 = 3;
    $term3_phase2_mother_tongue = intval($_POST['term3_phase2_mother_tongue']);
    $term3_phase2_filipino = intval($_POST['term3_phase2_filipino']);
    $term3_phase2_english = intval($_POST['term3_phase2_english']);
    $term3_phase2_mathematics = intval($_POST['term3_phase2_mathematics']);
    $term3_phase2_science = intval($_POST['term3_phase2_science']);
    $term3_phase2_araling_panlipunan = intval($_POST['term3_phase2_araling_panlipunan']);
    $term3_phase2_epp_tle = intval($_POST['term3_phase2_epp_tle']);
    $term3_phase2_music = intval($_POST['term3_phase2_music']);
    $term3_phase2_arts = intval($_POST['term3_phase2_arts']);
    $term3_phase2_pe = intval($_POST['term3_phase2_pe']);
    $term3_phase2_health = intval($_POST['term3_phase2_health']);
    $term3_phase2_esp = intval($_POST['term3_phase2_esp']);
    $term3_phase2_arabic_language = intval($_POST['term3_phase2_arabic_language']);
    $term3_phase2_islamic_values = intval($_POST['term3_phase2_islamic_values']);

    $term3_phase2_remarks = 'none'; 

    //term4_phase2
    //term4_phase2 grades

    $term4_phase2 = 4;
    $term4_phase2_mother_tongue = intval($_POST['term4_phase2_mother_tongue']);
    $term4_phase2_filipino = intval($_POST['term4_phase2_filipino']);
    $term4_phase2_english = intval($_POST['term4_phase2_english']);
    $term4_phase2_mathematics = intval($_POST['term4_phase2_mathematics']);
    $term4_phase2_science = intval($_POST['term4_phase2_science']);
    $term4_phase2_araling_panlipunan = intval($_POST['term4_phase2_araling_panlipunan']);
    $term4_phase2_epp_tle = intval($_POST['term4_phase2_epp_tle']);
    $term4_phase2_music = intval($_POST['term4_phase2_music']);
    $term4_phase2_arts = intval($_POST['term4_phase2_arts']);
    $term4_phase2_pe = intval($_POST['term2_phase2_pe']);
    $term4_phase2_health = intval($_POST['term4_phase2_health']);
    $term4_phase2_esp = intval($_POST['term4_phase2_esp']);
    $term4_phase2_arabic_language = intval($_POST['term4_phase2_arabic_language']);
    $term4_phase2_islamic_values = intval($_POST['term4_phase2_islamic_values']);
    $term4_phase2_remarks = 'none';


    //remedial phase 2

    $phase2_remedial_from = date("Y-m-d",strtotime($_POST['phase2_remedial_from']));
    $phase2_remedial_to = date("Y-m-d" ,strtotime($_POST['phase2_remedial_to']));
    $phase2_remedial_learning_areas_1 = $_POST['phase2_remedial_learning_areas_1'] ;
    $phase2_remedial_final_rating_1 =$_POST['phase2_remedial_final_rating_1'];
    $phase2_remedial_class_mark_1 = $_POST['phase2_remedial_class_mark_1'];
    $phase2_recomputed_final_grade_1 = $_POST['phase2_recomputed_final_grade_1'];
    $phase2_remedial_remarks_1 = $_POST['phase2_remedial_remarks_1'];

    $phase2_remedial_learning_areas_2 = $_POST['phase2_remedial_learning_areas_2'] ;
    $phase2_remedial_final_rating_2 =$_POST['phase2_remedial_final_rating_2'];
    $phase2_remedial_class_mark_2 = $_POST['phase2_remedial_class_mark_2'];
    $phase2_recomputed_final_grade_2 = $_POST['phase2_recomputed_final_grade_2'];
    $phase2_remedial_remarks_2 = $_POST['phase2_remedial_remarks_2'];


    //average of mapeh  phase1 

    // $term1_phase1_average_of_mapeh = round(($term1_phase1_music + $term1_phase1_arts + $term1_phase1_pe + $term1_phase1_health) / 4) ;

    //average of mapeh  phase1 

    // $term1_phase1_average_of_mapeh = round(($term1_phase1_music + $term1_phase1_arts + $term1_phase1_pe + $term1_phase1_health) / 4) ;

    $phase1_term1_average_mapeh_numbers = array($term1_phase1_music, $term1_phase1_arts, $term1_phase1_pe, $term1_phase1_health);
    $phase1_term1_average_mapeh_count = count(array_filter($phase1_term1_average_mapeh_numbers));
        if( $phase1_term1_average_mapeh_count != 0 ){

            $phase1_term1_average_mapeh_sum = array_sum($phase1_term1_average_mapeh_numbers);
           
            $term1_phase1_average_of_mapeh = $phase1_term1_average_mapeh_sum / $phase1_term1_average_mapeh_count;
        }

        else{
            $term1_phase1_average_of_mapeh = 0;
        }
  

    // $term2_phase1_average_of_mapeh = round(($term2_phase1_music + $term2_phase1_arts + $term2_phase1_pe + $term2_phase1_health) / 4) ;

    $phase1_term2_average_mapeh_numbers = array($term2_phase1_music, $term2_phase1_arts, $term2_phase1_pe, $term2_phase1_health);
    $phase1_term2_average_mapeh_count = count(array_filter($phase1_term2_average_mapeh_numbers));

    if($phase1_term2_average_mapeh_count !=0){

        $phase1_term2_average_mapeh_sum = array_sum($phase1_term2_average_mapeh_numbers);
        
        $term2_phase1_average_of_mapeh = $phase1_term2_average_mapeh_sum / $phase1_term2_average_mapeh_count;
    }

    else{
        $term2_phase1_average_of_mapeh = 0;
    }

    // $term3_phase1_average_of_mapeh = round(($term3_phase1_music + $term3_phase1_arts + $term3_phase1_pe + $term3_phase1_health) / 4) ;

    $phase1_term3_average_mapeh_numbers = array($term3_phase1_music, $term3_phase1_arts, $term3_phase1_pe, $term3_phase1_health);
    $phase1_term3_average_mapeh_count = count(array_filter($phase1_term3_average_mapeh_numbers));
    
    if($phase1_term3_average_mapeh_count !=0){

        $phase1_term3_average_mapeh_sum = array_sum($phase1_term3_average_mapeh_numbers);
        $term3_phase1_average_of_mapeh = $phase1_term3_average_mapeh_sum / $phase1_term3_average_mapeh_count;
    }
    
    else{
        
        $term3_phase1_average_of_mapeh = 0;

    }



    // $term4_phase1_average_of_mapeh = round(($term4_phase1_music + $term4_phase1_arts + $term4_phase1_pe + $term4_phase1_health) / 4) ;


    
    $phase1_term4_average_mapeh_numbers = array($term4_phase1_music, $term4_phase1_arts, $term4_phase1_pe, $term4_phase1_health);
    $phase1_term4_average_mapeh_count = count(array_filter($phase1_term4_average_mapeh_numbers));
    
    if($phase1_term4_average_mapeh_count !=0 ){
        $phase1_term4_average_mapeh_sum = array_sum($phase1_term4_average_mapeh_numbers);
        
        $term4_phase1_average_of_mapeh = $phase1_term4_average_mapeh_sum / $phase1_term4_average_mapeh_count;
    }

    else{
        $term4_phase1_average_of_mapeh = 0;
    }
   

    //final rating
    $phase1_term5 ='Final Rating';
  

    // $phase1_final_rating_mother_tongue = round(($term1_phase1_mother_tongue + $term2_phase1_mother_tongue + 
    // $term3_phase1_mother_tongue + $term4_phase1_mother_tongue) / 4);

        $phase1_mt_numbers = array($term1_phase1_mother_tongue, $term2_phase1_mother_tongue, $term3_phase1_mother_tongue,$term4_phase1_mother_tongue);
        $phase1_mt_count = count(array_filter($phase1_mt_numbers));
        if($phase1_mt_count != 0){

            $phase1_mt_sum = array_sum($phase1_mt_numbers);
        
            $phase1_final_rating_mother_tongue = $phase1_mt_sum / $phase1_mt_count;
        }
       else{
        $phase1_final_rating_mother_tongue = 0;
       }


    // $phase1_final_rating_filipino = round(($term1_phase1_filipino + $term2_phase1_filipino + $term3_phase1_filipino + $term4_phase1_filipino) / 4);

    $phase1_filipino_numbers = array($term1_phase1_filipino, $term2_phase1_filipino, $term3_phase1_filipino, $term4_phase1_filipino);
    $phase1_filipino_count = count(array_filter($phase1_filipino_numbers));

    if($phase1_filipino_count != 0){

        $phase1_filipino_sum = array_sum($phase1_filipino_numbers);

        $phase1_final_rating_filipino = $phase1_filipino_sum / $phase1_filipino_count;

    }

    else{

        $phase1_final_rating_filipino = 0;

    }

   

    // $phase1_final_rating_english = round(($term1_phase1_english + $term2_phase1_english + $term3_phase1_english + $term4_phase1_english) / 4);

    
    $phase1_english_numbers = array($term1_phase1_english, $term2_phase1_english, $term3_phase1_english, $term4_phase1_english);
    $phase1_english_count = count(array_filter($phase1_english_numbers));
    if($phase1_english_count != 0 ){
        $phase1_english_sum = array_sum($phase1_english_numbers);

        $phase1_final_rating_english = $phase1_english_sum / $phase1_english_count;
    }
    
    else{

        $phase1_final_rating_english = 0;
    }


    // $phase1_final_rating_math = round(($term1_phase1_mathematics + $term2_phase1_mathematics + $term3_phase1_mathematics + $term4_phase1_mathematics ) / 4);

    $phase1_math_numbers = array($term1_phase1_mathematics, $term2_phase1_mathematics,  $term3_phase1_mathematics, $term4_phase1_mathematics);
    $phase1_math_count = count(array_filter($phase1_math_numbers));
    
    if($phase1_math_count != 0){
        $phase1_math_sum = array_sum($phase1_math_numbers);
    
        $phase1_final_rating_math = $phase1_math_sum / $phase1_math_count;

    }

    else{
        $phase1_final_rating_math = 0;

    }

   

    // $phase1_final_rating_science = round(($term1_phase1_science + $term2_phase1_science + $term3_phase1_science + $term4_phase1_science) / 4);

    $phase1_science_numbers = array($term1_phase1_science, $term2_phase1_science, $term3_phase1_science, $term4_phase1_science);
    $phase1_science_count = count(array_filter($phase1_science_numbers));
    
    if($phase1_science_count != 0){

        $phase1_science_sum = array_sum($phase1_science_numbers);

    $phase1_final_rating_science = $phase1_science_sum / $phase1_science_count;
    }

    else{

        $phase1_final_rating_science = 0;
    }

    

    // $phase1_final_rating_AP = round(($term1_phase1_araling_panlipunan + $term2_phase1_araling_panlipunan + $term3_phase1_araling_panlipunan + $term4_phase1_araling_panlipunan) / 4);

    $phase1_ap_numbers = array($term1_phase1_araling_panlipunan, $term2_phase1_araling_panlipunan, $term3_phase1_araling_panlipunan, $term4_phase1_araling_panlipunan);
    $phase1_ap_count = count(array_filter($phase1_ap_numbers));

    if($phase1_ap_count != 0){
        $phase1_ap_sum = array_sum($phase1_ap_numbers);

        $phase1_final_rating_AP = $phase1_ap_sum / $phase1_ap_count;

    }

    else{
        $phase1_final_rating_AP = 0;
        
    }

    // $phase1_final_rating_epp_tle = round(($term1_phase1_epp_tle + $term2_phase1_epp_tle + $term3_phase1_epp_tle + $term4_phase1_epp_tle) / 4);

    $phase1_epp_tle_numbers = array($term1_phase1_epp_tle, $term2_phase1_epp_tle, $term3_phase1_epp_tle, $term4_phase1_epp_tle);
    $phase1_epp_tle_count = count(array_filter($phase1_epp_tle_numbers));

    if($phase1_epp_tle_count != 0){

        $phase1_epp_tle_sum = array_sum($phase1_epp_tle_numbers);
    
    $phase1_final_rating_epp_tle = $phase1_epp_tle_sum / $phase1_epp_tle_count;
    }

    else{
        $phase1_final_rating_epp_tle = 0;
    }
    
    
    

    // $phase1_final_rating_mapeh = round(($term1_phase1_average_of_mapeh + $term2_phase1_average_of_mapeh + $term3_phase1_average_of_mapeh + $term4_phase1_average_of_mapeh) / 4 );

    $phase1_mapeh_numbers = array($term1_phase1_average_of_mapeh, $term2_phase1_average_of_mapeh, $term3_phase1_average_of_mapeh, $term4_phase1_average_of_mapeh);
    $phase1_mapeh_count = count(array_filter($phase1_mapeh_numbers));
    
    if($phase1_mapeh_count != 0){

        $phase1_mapeh_sum = array_sum($phase1_mapeh_numbers);
    
        $phase1_final_rating_mapeh = $phase1_mapeh_sum / $phase1_mapeh_count;

    }

    else{
        
        $phase1_final_rating_mapeh = 0;

    }
   

    // $phase1_final_rating_music = round(($term1_phase1_music + $term2_phase1_music + $term3_phase1_music + $term4_phase1_music) / 4);

    $phase1_music_numbers = array($term1_phase1_music, $term2_phase1_music, $term3_phase1_music, $term4_phase1_music);
    $phase1_music_count = count(array_filter($phase1_music_numbers));
    
    if($phase1_music_count != 0){
        $phase1_music_sum = array_sum($phase1_music_numbers);
    
        $phase1_final_rating_music =  $phase1_music_sum / $phase1_music_count;

    }

    else {
        $phase1_final_rating_music = 0;
    }
   
    

    // $phase1_final_rating_arts = round(($term1_phase1_arts + $term2_phase1_arts + $term3_phase1_arts + $term4_phase1_arts ) / 4);

    
    $phase1_arts_numbers = array($term1_phase1_arts, $term2_phase1_arts, $term3_phase1_arts, $term4_phase1_arts);
    $phase1_arts_count = count(array_filter($phase1_arts_numbers)); 
    
    if ($phase1_arts_count != 0) {
        
        $phase1_arts_sum = array_sum($phase1_arts_numbers);
    
        $phase1_final_rating_arts =  $phase1_arts_sum / $phase1_arts_count;

    }

    else{
        $phase1_final_rating_arts = 0;
    }
    
    // $phase1_final_rating_PE = round(($term1_phase1_pe + $term2_phase1_pe + $term3_phase1_pe + $term4_phase1_pe) / 4);

    $phase1_pe_numbers = array($term1_phase1_pe, $term2_phase1_pe, $term3_phase1_pe, $term4_phase1_pe);
    $phase1_pe_count = count(array_filter($phase1_pe_numbers));
    
    if($phase1_pe_count != 0){
        $phase1_pe_sum = array_sum($phase1_pe_numbers);
    
        $phase1_final_rating_PE = $phase1_pe_sum / $phase1_pe_count;
    }

    else{
        $phase1_final_rating_PE = 0;
    }
    

    



    // $phase1_final_rating_health = round(($term1_phase1_health + $term2_phase1_health + $term3_phase1_health + $term4_phase1_health)/ 4);

    $phase1_health_numbers = array($term1_phase1_health, $term2_phase1_health, $term3_phase1_health, $term4_phase1_health);
    $phase1_health_count = count(array_filter($phase1_health_numbers));
    
    if($phase1_health_count != 0){
        $phase1_health_sum = array_sum($phase1_health_numbers);
    
        $phase1_final_rating_health = $phase1_health_sum / $phase1_health_count;
    }

    else {
        $phase1_final_rating_health = 0;
    }

    

     // $phase1_final_rating_esp = round(($term1_phase1_esp + $term2_phase1_esp + $term3_phase1_esp + $term4_phase1_esp) / 4);
    
     $phase1_esp_numbers = array($term1_phase1_esp, $term2_phase1_esp, $term3_phase1_esp, $term4_phase1_esp);
     $phase1_esp_count = count (array_filter($phase1_esp_numbers));
     
     if($phase1_esp_count != 0){

        $phase1_esp_sum = array_sum($phase1_esp_numbers);
     
        $phase1_final_rating_esp = $phase1_esp_sum / $phase1_esp_count;
     }
     else{
        $phase1_final_rating_esp = 0;
     }
     



     // $phase1_final_rating_arabic_language = round(($term1_phase1_arabic_language + $term2_phase1_arabic_language + $term3_phase1_arabic_language + $term4_phase1_arabic_language) / 4);

    
     $phase1_arabic_numbers = array($term1_phase1_arabic_language, $term2_phase1_arabic_language, $term3_phase1_arabic_language, $term4_phase1_arabic_language);
     $phase1_arabic_count = count(array_filter($phase1_arabic_numbers));
    
     if($phase1_arabic_count != 0){
        $phase1_arabic_sum = array_sum($phase1_arabic_numbers);
     
        $phase1_final_rating_arabic_language = $phase1_arabic_sum / $phase1_arabic_count;
     }

     else{

        $phase1_final_rating_arabic_language = 0;

     }

    

    // $phase1_final_rating_islamic_values = round(($term1_phase1_islamic_values + $term2_phase1_islamic_values + $term3_phase1_islamic_values + $term4_phase1_islamic_values) / 4);

    $phase1_islamic_numbers = array($term1_phase1_islamic_values, $term2_phase1_islamic_values, $term3_phase1_islamic_values, $term4_phase1_islamic_values);
    $phase1_islamic_count = count(array_filter($phase1_islamic_numbers));
    
    if($phase1_islamic_count !=0){
        $phase1_islamic_sum = array_sum($phase1_islamic_numbers);
    
        $phase1_final_rating_islamic_values = $phase1_islamic_sum / $phase1_islamic_count;
    }

    else{
        $phase1_final_rating_islamic_values = 0;
    }






    // validation of finalrating 


    if($phase1_final_rating_mother_tongue >= 75){
        $phase1_final_rating_mother_tongue_output = 'PASSED';
    }else{
        $phase1_final_rating_mother_tongue_output = 'FAILED';
    }

    if($phase1_final_rating_filipino >= 75){
        $phase1_final_rating_filipino_output = 'PASSED';
    }else{
        $phase1_final_rating_filipino_output ='FAILED';
    }

    if($phase1_final_rating_english >= 75){
        $phase1_final_rating_english_output ='PASSED';
    }else{
        $phase1_final_rating_english_output = 'FAILED';
    }

    if($phase1_final_rating_math >= 75){
        $phase1_final_rating_math_output = 'PASSED';
    }else{
        $phase1_final_rating_math_output =  'FAILED';
    }

    if($phase1_final_rating_science >= 75){
        $phase1_final_rating_science_output = 'PASSED';
    }else{
        $phase1_final_rating_science_output = 'FAILED';
    }

    if($phase1_final_rating_AP >= 75){
        $phase1_final_rating_AP_output = 'PASSED';
    }else{
        $phase1_final_rating_AP_output = 'FAILED';
    }

    if($phase1_final_rating_epp_tle >= 75){
        $phase1_final_rating_epp_tle_output = 'PASSED';
    }else{
        $phase1_final_rating_epp_tle_output = 'FAILED';
    }

    if($phase1_final_rating_mapeh >= 75){
        $phase1_final_rating_mapeh_output = 'PASSED';
    }else{
        $phase1_final_rating_mapeh_output = 'FAILED';
    }

    if($phase1_final_rating_music >= 75){
        $phase1_final_rating_music_output = 'PASSED';
    }else{
        $phase1_final_rating_music_output = 'FAILED';
    }

    if($phase1_final_rating_arts >= 75){
        $phase1_final_rating_arts_output = 'PASSED';
    }else{
        $phase1_final_rating_arts_output = 'FAILED';
    }

    if($phase1_final_rating_PE >= 75){
        $phase1_final_rating_PE_output = 'PASSED';
    }else{
        $phase1_final_rating_PE_output ='FAILED';
    }

    if($phase1_final_rating_health >= 75){
        $phase1_final_rating_health_output = 'PASSED';
    }else{
        $phase1_final_rating_health_output = 'FAILED';
    }

    if($phase1_final_rating_esp >= 75){
        $phase1_final_rating_esp_output = 'PASSED';
    }else{
        $phase1_final_rating_esp_output = 'FAILED';
    }

    if($phase1_final_rating_arabic_language >= 75){
        $phase1_final_rating_arabic_language_output = 'PASSED';
    }else{
        $phase1_final_rating_arabic_language_output = 'FAILED';
    }

    if($phase1_final_rating_islamic_values >= 75){
        $phase1_final_rating_islamic_values_output = 'PASSED';
    }else{
        $phase1_final_rating_islamic_values_output = 'FAILED';
    }


    // computation of general average

    // $phase1_term1_general_average = round(($term1_phase1_mother_tongue + $term1_phase1_filipino + $term1_phase1_english + $term1_phase1_mathematics + $term1_phase1_science + $term1_phase1_araling_panlipunan + $term1_phase1_epp_tle + $term1_phase1_average_of_mapeh + $term1_phase1_esp) / 9);
    
    $phase1_term1_gen_numbers = array($term1_phase1_mother_tongue, $term1_phase1_filipino, $term1_phase1_english, $term1_phase1_mathematics, $term1_phase1_science, $term1_phase1_araling_panlipunan, $term1_phase1_epp_tle, $term1_phase1_average_of_mapeh, $term1_phase1_esp);
    $phase1_term1_gen_count = count(array_filter($phase1_term1_gen_numbers));

    if($phase1_term1_gen_count != 0){
        
        $phase1_term1_gen_sum = array_sum($phase1_term1_gen_numbers);
    
        $phase1_term1_general_average = $phase1_term1_gen_sum / $phase1_term1_gen_count;
        
    }
    
    else{
        $phase1_term1_general_average = 0;
    }
    
    // $phase1_term2_general_average = round(($term2_phase1_mother_tongue + $term2_phase1_filipino + $term2_phase1_english + $term2_phase1_mathematics + $term2_phase1_science + $term2_phase1_araling_panlipunan + $term2_phase1_epp_tle + $term2_phase1_average_of_mapeh + $term2_phase1_esp) / 9);
    $phase1_term2_gen_numbers = array($term2_phase1_mother_tongue, $term2_phase1_filipino, $term2_phase1_english, $term2_phase1_mathematics, $term2_phase1_science, $term2_phase1_araling_panlipunan, $term2_phase1_epp_tle, $term2_phase1_average_of_mapeh, $term2_phase1_esp);
    $phase1_term2_gen_count = count(array_filter($phase1_term2_gen_numbers));
    
    if ($phase1_term2_gen_count != 0){
        
        $phase1_term2_gen_sum = array_sum($phase1_term2_gen_numbers);
    
        $phase1_term2_general_average = $phase1_term2_gen_sum / $phase1_term2_gen_count;

    }

    else {
        $phase1_term2_general_average = 0;
    }

   
    
     // $phase1_term3_general_average = round(($term3_phase1_mother_tongue + $term3_phase1_filipino + $term3_phase1_english + $term3_phase1_mathematics + $term3_phase1_science + $term3_phase1_araling_panlipunan + $term3_phase1_epp_tle + $term3_phase1_average_of_mapeh + $term3_phase1_esp) / 9);
    
     $phase1_term3_gen_numbers = array($term3_phase1_mother_tongue, $term3_phase1_filipino, $term3_phase1_english, $term3_phase1_mathematics, $term3_phase1_science, $term3_phase1_araling_panlipunan, $term3_phase1_epp_tle, $term3_phase1_average_of_mapeh, $term3_phase1_esp);
     $phase1_term3_gen_count = count(array_filter($phase1_term3_gen_numbers));
     

        if($phase1_term3_gen_count != 0){
            $phase1_term3_gen_sum = array_sum($phase1_term3_gen_numbers);
     
            $phase1_term3_general_average = $phase1_term3_gen_sum / $phase1_term3_gen_count;

        }

        else{
            $phase1_term3_general_average = 0;

        }


     
    
    
    
     // $phase1_term4_general_average = round(($term4_phase1_mother_tongue + $term4_phase1_filipino + $term4_phase1_english + $term4_phase1_mathematics + $term4_phase1_science + $term4_phase1_araling_panlipunan + $term4_phase1_epp_tle + $term4_phase1_average_of_mapeh + $term4_phase1_esp) / 9);
    
     $phase1_term4_gen_numbers = array($term4_phase1_mother_tongue, $term4_phase1_filipino, $term4_phase1_english, $term4_phase1_mathematics, $term4_phase1_science, $term4_phase1_araling_panlipunan, $term4_phase1_epp_tle, $term4_phase1_average_of_mapeh, $term4_phase1_esp);
     $phase1_term4_gen_count = count(array_filter($phase1_term4_gen_numbers));
    
        if($phase1_term4_gen_count != 0){
            $phase1_term4_gen_sum = array_sum($phase1_term4_gen_numbers);
     
            $phase1_term4_general_average = $phase1_term4_gen_sum / $phase1_term4_gen_count;

        }

        else{
            $phase1_term4_general_average = 0;

        }

    
    
    
    
    
     // $phase1_term5_general_average = round(($phase1_final_rating_mother_tongue  + $phase1_final_rating_filipino + $phase1_final_rating_english + $phase1_final_rating_math + $phase1_final_rating_science + $phase1_final_rating_AP + $phase1_final_rating_epp_tle + $phase1_final_rating_mapeh + $phase1_final_rating_esp) / 9);


     $phase1_term5_gen_numbers = array($phase1_final_rating_mother_tongue, $phase1_final_rating_filipino, $phase1_final_rating_english, $phase1_final_rating_math, $phase1_final_rating_science, $phase1_final_rating_AP, $phase1_final_rating_epp_tle, $phase1_final_rating_mapeh, $phase1_final_rating_esp);
     $phase1_term5_gen_count = count(array_filter($phase1_term5_gen_numbers));

     if($phase1_term5_gen_count != 0){
        
        $phase1_term5_gen_sum = array_sum($phase1_term5_gen_numbers);
        
        $phase1_term5_general_average = $phase1_term5_gen_sum / $phase1_term5_gen_count;
   }

     else{
        $phase1_term5_general_average = 0;

     }




     $phase2_term1_average_mapeh_numbers = array($term1_phase2_music, $term1_phase2_arts, $term1_phase2_pe, $term1_phase2_health);
     $phase2_term1_average_mapeh_count = count(array_filter($phase2_term1_average_mapeh_numbers));
         if( $phase2_term1_average_mapeh_count != 0 ){
 
             $phase2_term1_average_mapeh_sum = array_sum($phase2_term1_average_mapeh_numbers);
            
             $term1_phase2_average_of_mapeh = $phase2_term1_average_mapeh_sum / $phase2_term1_average_mapeh_count;
         }
 
         else{
             $term1_phase2_average_of_mapeh = 0;
         }
   
 
     // $term2_phase2_average_of_mapeh = round(($term2_phase2_music + $term2_phase2_arts + $term2_phase2_pe + $term2_phase2_health) / 4) ;
 
     $phase2_term2_average_mapeh_numbers = array($term2_phase2_music, $term2_phase2_arts, $term2_phase2_pe, $term2_phase2_health);
     $phase2_term2_average_mapeh_count = count(array_filter($phase2_term2_average_mapeh_numbers));
 
     if($phase2_term2_average_mapeh_count !=0){
 
         $phase2_term2_average_mapeh_sum = array_sum($phase2_term2_average_mapeh_numbers);
         
         $term2_phase2_average_of_mapeh = $phase2_term2_average_mapeh_sum / $phase2_term2_average_mapeh_count;
     }
 
     else{
         $term2_phase2_average_of_mapeh = 0;
     }
 
     // $term3_phase2_average_of_mapeh = round(($term3_phase2_music + $term3_phase2_arts + $term3_phase2_pe + $term3_phase2_health) / 4) ;
 
     $phase2_term3_average_mapeh_numbers = array($term3_phase2_music, $term3_phase2_arts, $term3_phase2_pe, $term3_phase2_health);
     $phase2_term3_average_mapeh_count = count(array_filter($phase2_term3_average_mapeh_numbers));
     
     if($phase2_term3_average_mapeh_count !=0){
 
         $phase2_term3_average_mapeh_sum = array_sum($phase2_term3_average_mapeh_numbers);
         $term3_phase2_average_of_mapeh = $phase2_term3_average_mapeh_sum / $phase2_term3_average_mapeh_count;
     }
     
     else{
         
         $term3_phase2_average_of_mapeh = 0;
 
     }
 
 
 
     // $term4_phase2_average_of_mapeh = round(($term4_phase2_music + $term4_phase2_arts + $term4_phase2_pe + $term4_phase2_health) / 4) ;
 
 
     
     $phase2_term4_average_mapeh_numbers = array($term4_phase2_music, $term4_phase2_arts, $term4_phase2_pe, $term4_phase2_health);
     $phase2_term4_average_mapeh_count = count(array_filter($phase2_term4_average_mapeh_numbers));
     
     if($phase2_term4_average_mapeh_count !=0 ){
         $phase2_term4_average_mapeh_sum = array_sum($phase2_term4_average_mapeh_numbers);
         
         $term4_phase2_average_of_mapeh = $phase2_term4_average_mapeh_sum / $phase2_term4_average_mapeh_count;
     }
 
     else{
         $term4_phase2_average_of_mapeh = 0;
     }
    
 
     //final rating
     $phase2_term5 ='Final Rating';
   
 
     // $phase2_final_rating_mother_tongue = round(($term1_phase2_mother_tongue + $term2_phase2_mother_tongue + 
     // $term3_phase2_mother_tongue + $term4_phase2_mother_tongue) / 4);
 
         $phase2_mt_numbers = array($term1_phase2_mother_tongue, $term2_phase2_mother_tongue, $term3_phase2_mother_tongue,$term4_phase2_mother_tongue);
         $phase2_mt_count = count(array_filter($phase2_mt_numbers));
         if($phase2_mt_count != 0){
 
             $phase2_mt_sum = array_sum($phase2_mt_numbers);
         
             $phase2_final_rating_mother_tongue = $phase2_mt_sum / $phase2_mt_count;
         }
        else{
         $phase2_final_rating_mother_tongue = 0;
        }
 
 
     // $phase2_final_rating_filipino = round(($term1_phase2_filipino + $term2_phase2_filipino + $term3_phase2_filipino + $term4_phase2_filipino) / 4);
 
     $phase2_filipino_numbers = array($term1_phase2_filipino, $term2_phase2_filipino, $term3_phase2_filipino, $term4_phase2_filipino);
     $phase2_filipino_count = count(array_filter($phase2_filipino_numbers));
 
     if($phase2_filipino_count != 0){
 
         $phase2_filipino_sum = array_sum($phase2_filipino_numbers);
 
         $phase2_final_rating_filipino = $phase2_filipino_sum / $phase2_filipino_count;
 
     }
 
     else{
 
         $phase2_final_rating_filipino = 0;
 
     }
 
    
 
     // $phase2_final_rating_english = round(($term1_phase2_english + $term2_phase2_english + $term3_phase2_english + $term4_phase2_english) / 4);
 
     
     $phase2_english_numbers = array($term1_phase2_english, $term2_phase2_english, $term3_phase2_english, $term4_phase2_english);
     $phase2_english_count = count(array_filter($phase2_english_numbers));
     if($phase2_english_count != 0 ){
         $phase2_english_sum = array_sum($phase2_english_numbers);
 
         $phase2_final_rating_english = $phase2_english_sum / $phase2_english_count;
     }
     
     else{
 
         $phase2_final_rating_english = 0;
     }
 
 
     // $phase2_final_rating_math = round(($term1_phase2_mathematics + $term2_phase2_mathematics + $term3_phase2_mathematics + $term4_phase2_mathematics ) / 4);
 
     $phase2_math_numbers = array($term1_phase2_mathematics, $term2_phase2_mathematics,  $term3_phase2_mathematics, $term4_phase2_mathematics);
     $phase2_math_count = count(array_filter($phase2_math_numbers));
     
     if($phase2_math_count != 0){
         $phase2_math_sum = array_sum($phase2_math_numbers);
     
         $phase2_final_rating_math = $phase2_math_sum / $phase2_math_count;
 
     }
 
     else{
         $phase2_final_rating_math = 0;
 
     }
 
    
 
     // $phase2_final_rating_science = round(($term1_phase2_science + $term2_phase2_science + $term3_phase2_science + $term4_phase2_science) / 4);
 
     $phase2_science_numbers = array($term1_phase2_science, $term2_phase2_science, $term3_phase2_science, $term4_phase2_science);
     $phase2_science_count = count(array_filter($phase2_science_numbers));
     
     if($phase2_science_count != 0){
 
         $phase2_science_sum = array_sum($phase2_science_numbers);
 
     $phase2_final_rating_science = $phase2_science_sum / $phase2_science_count;
     }
 
     else{
 
         $phase2_final_rating_science = 0;
     }
 
     
 
     // $phase2_final_rating_AP = round(($term1_phase2_araling_panlipunan + $term2_phase2_araling_panlipunan + $term3_phase2_araling_panlipunan + $term4_phase2_araling_panlipunan) / 4);
 
     $phase2_ap_numbers = array($term1_phase2_araling_panlipunan, $term2_phase2_araling_panlipunan, $term3_phase2_araling_panlipunan, $term4_phase2_araling_panlipunan);
     $phase2_ap_count = count(array_filter($phase2_ap_numbers));
 
     if($phase2_ap_count != 0){
         $phase2_ap_sum = array_sum($phase2_ap_numbers);
 
         $phase2_final_rating_AP = $phase2_ap_sum / $phase2_ap_count;
 
     }
 
     else{
         $phase2_final_rating_AP = 0;
         
     }
 
     // $phase2_final_rating_epp_tle = round(($term1_phase2_epp_tle + $term2_phase2_epp_tle + $term3_phase2_epp_tle + $term4_phase2_epp_tle) / 4);
 
     $phase2_epp_tle_numbers = array($term1_phase2_epp_tle, $term2_phase2_epp_tle, $term3_phase2_epp_tle, $term4_phase2_epp_tle);
     $phase2_epp_tle_count = count(array_filter($phase2_epp_tle_numbers));
 
     if($phase2_epp_tle_count != 0){
 
         $phase2_epp_tle_sum = array_sum($phase2_epp_tle_numbers);
     
     $phase2_final_rating_epp_tle = $phase2_epp_tle_sum / $phase2_epp_tle_count;
     }
 
     else{
         $phase2_final_rating_epp_tle = 0;
     }
     
     
     
 
     // $phase2_final_rating_mapeh = round(($term1_phase2_average_of_mapeh + $term2_phase2_average_of_mapeh + $term3_phase2_average_of_mapeh + $term4_phase2_average_of_mapeh) / 4 );
 
     $phase2_mapeh_numbers = array($term1_phase2_average_of_mapeh, $term2_phase2_average_of_mapeh, $term3_phase2_average_of_mapeh, $term4_phase2_average_of_mapeh);
     $phase2_mapeh_count = count(array_filter($phase2_mapeh_numbers));
     
     if($phase2_mapeh_count != 0){
 
         $phase2_mapeh_sum = array_sum($phase2_mapeh_numbers);
     
         $phase2_final_rating_mapeh = $phase2_mapeh_sum / $phase2_mapeh_count;
 
     }
 
     else{
         
         $phase2_final_rating_mapeh = 0;
 
     }
    
 
     // $phase2_final_rating_music = round(($term1_phase2_music + $term2_phase2_music + $term3_phase2_music + $term4_phase2_music) / 4);
 
     $phase2_music_numbers = array($term1_phase2_music, $term2_phase2_music, $term3_phase2_music, $term4_phase2_music);
     $phase2_music_count = count(array_filter($phase2_music_numbers));
     
     if($phase2_music_count != 0){
         $phase2_music_sum = array_sum($phase2_music_numbers);
     
         $phase2_final_rating_music =  $phase2_music_sum / $phase2_music_count;
 
     }
 
     else {
         $phase2_final_rating_music = 0;
     }
    
     
 
     // $phase2_final_rating_arts = round(($term1_phase2_arts + $term2_phase2_arts + $term3_phase2_arts + $term4_phase2_arts ) / 4);
 
     
     $phase2_arts_numbers = array($term1_phase2_arts, $term2_phase2_arts, $term3_phase2_arts, $term4_phase2_arts);
     $phase2_arts_count = count(array_filter($phase2_arts_numbers)); 
     
     if ($phase2_arts_count != 0) {
         
         $phase2_arts_sum = array_sum($phase2_arts_numbers);
     
         $phase2_final_rating_arts =  $phase2_arts_sum / $phase2_arts_count;
 
     }
 
     else{
         $phase2_final_rating_arts = 0;
     }
     
     // $phase2_final_rating_PE = round(($term1_phase2_pe + $term2_phase2_pe + $term3_phase2_pe + $term4_phase2_pe) / 4);
 
     $phase2_pe_numbers = array($term1_phase2_pe, $term2_phase2_pe, $term3_phase2_pe, $term4_phase2_pe);
     $phase2_pe_count = count(array_filter($phase2_pe_numbers));
     
     if($phase2_pe_count != 0){
         $phase2_pe_sum = array_sum($phase2_pe_numbers);
     
         $phase2_final_rating_PE = $phase2_pe_sum / $phase2_pe_count;
     }
 
     else{
         $phase2_final_rating_PE = 0;
     }
     
 
     
 
 
 
     // $phase2_final_rating_health = round(($term1_phase2_health + $term2_phase2_health + $term3_phase2_health + $term4_phase2_health)/ 4);
 
     $phase2_health_numbers = array($term1_phase2_health, $term2_phase2_health, $term3_phase2_health, $term4_phase2_health);
     $phase2_health_count = count(array_filter($phase2_health_numbers));
     
     if($phase2_health_count != 0){
         $phase2_health_sum = array_sum($phase2_health_numbers);
     
         $phase2_final_rating_health = $phase2_health_sum / $phase2_health_count;
     }
 
     else {
         $phase2_final_rating_health = 0;
     }
 
     
 
      // $phase2_final_rating_esp = round(($term1_phase2_esp + $term2_phase2_esp + $term3_phase2_esp + $term4_phase2_esp) / 4);
     
      $phase2_esp_numbers = array($term1_phase2_esp, $term2_phase2_esp, $term3_phase2_esp, $term4_phase2_esp);
      $phase2_esp_count = count (array_filter($phase2_esp_numbers));
      
      if($phase2_esp_count != 0){
 
         $phase2_esp_sum = array_sum($phase2_esp_numbers);
      
         $phase2_final_rating_esp = $phase2_esp_sum / $phase2_esp_count;
      }
      else{
         $phase2_final_rating_esp = 0;
      }
      
 
 
 
      // $phase2_final_rating_arabic_language = round(($term1_phase2_arabic_language + $term2_phase2_arabic_language + $term3_phase2_arabic_language + $term4_phase2_arabic_language) / 4);
 
     
      $phase2_arabic_numbers = array($term1_phase2_arabic_language, $term2_phase2_arabic_language, $term3_phase2_arabic_language, $term4_phase2_arabic_language);
      $phase2_arabic_count = count(array_filter($phase2_arabic_numbers));
     
      if($phase2_arabic_count != 0){
         $phase2_arabic_sum = array_sum($phase2_arabic_numbers);
      
         $phase2_final_rating_arabic_language = $phase2_arabic_sum / $phase2_arabic_count;
      }
 
      else{
 
         $phase2_final_rating_arabic_language = 0;
 
      }
 
     
 
     // $phase2_final_rating_islamic_values = round(($term1_phase2_islamic_values + $term2_phase2_islamic_values + $term3_phase2_islamic_values + $term4_phase2_islamic_values) / 4);
 
     $phase2_islamic_numbers = array($term1_phase2_islamic_values, $term2_phase2_islamic_values, $term3_phase2_islamic_values, $term4_phase2_islamic_values);
     $phase2_islamic_count = count(array_filter($phase2_islamic_numbers));
     
     if($phase2_islamic_count !=0){
         $phase2_islamic_sum = array_sum($phase2_islamic_numbers);
     
         $phase2_final_rating_islamic_values = $phase2_islamic_sum / $phase2_islamic_count;
     }
 
     else{
         $phase2_final_rating_islamic_values = 0;
     }
 
    


        // validation of final rating


    if($phase2_final_rating_mother_tongue >= 75){
        $phase2_final_rating_mother_tongue_output = 'PASSED';
    }else{
        $phase2_final_rating_mother_tongue_output = 'FAILED';
    }

    if($phase2_final_rating_filipino >= 75){
        $phase2_final_rating_filipino_output = 'PASSED';
    }else{
        $phase2_final_rating_filipino_output ='FAILED';
    }

    if($phase2_final_rating_english >= 75){
        $phase2_final_rating_english_output ='PASSED';
    }else{
        $phase2_final_rating_english_output = 'FAILED';
    }

    if($phase2_final_rating_math >= 75){
        $phase2_final_rating_math_output = 'PASSED';
    }else{
        $phase2_final_rating_math_output =  'FAILED';
    }

    if($phase2_final_rating_science >= 75){
        $phase2_final_rating_science_output = 'PASSED';
    }else{
        $phase2_final_rating_science_output = 'FAILED';
    }

    if($phase2_final_rating_AP >= 75){
        $phase2_final_rating_AP_output = 'PASSED';
    }else{
        $phase2_final_rating_AP_output = 'FAILED';
    }

    if($phase2_final_rating_epp_tle >= 75){
        $phase2_final_rating_epp_tle_output = 'PASSED';
    }else{
        $phase2_final_rating_epp_tle_output = 'FAILED';
    }

    if($phase2_final_rating_mapeh >= 75){
        $phase2_final_rating_mapeh_output = 'PASSED';
    }else{
        $phase2_final_rating_mapeh_output = 'FAILED';
    }

    if($phase2_final_rating_music >= 75){
        $phase2_final_rating_music_output = 'PASSED';
    }else{
        $phase2_final_rating_music_output = 'FAILED';
    }

    if($phase2_final_rating_arts >= 75){
        $phase2_final_rating_arts_output = 'PASSED';
    }else{
        $phase2_final_rating_arts_output = 'FAILED';
    }

    if($phase2_final_rating_PE >= 75){
        $phase2_final_rating_PE_output = 'PASSED';
    }else{
        $phase2_final_rating_PE_output ='FAILED';
    }

    if($phase2_final_rating_health >= 75){
        $phase2_final_rating_health_output = 'PASSED';
    }else{
        $phase2_final_rating_health_output = 'FAILED';
    }

    if($phase2_final_rating_esp >= 75){
        $phase2_final_rating_esp_output = 'PASSED';
    }else{
        $phase2_final_rating_esp_output = 'FAILED';
    }

    if($phase2_final_rating_arabic_language >= 75){
        $phase2_final_rating_arabic_language_output = 'PASSED';
    }else{
        $phase2_final_rating_arabic_language_output = 'FAILED';
    }

    if($phase2_final_rating_islamic_values >= 75){
        $phase2_final_rating_islamic_values_output = 'PASSED';
    }else{
        $phase2_final_rating_islamic_values_output = 'FAILED';
    }


    //computation of general average

    // $phase2_term1_general_average = round(($term1_phase2_mother_tongue + $term1_phase2_filipino + $term1_phase2_english + $term1_phase2_mathematics + $term1_phase2_science + $term1_phase2_araling_panlipunan + $term1_phase2_epp_tle + $term1_phase2_average_of_mapeh + $term1_phase2_esp) / 9);
    
    $phase2_term4_gen_numbers = array($term4_phase2_mother_tongue, $term4_phase2_filipino, $term4_phase2_english, $term4_phase2_mathematics, $term4_phase2_science, $term4_phase2_araling_panlipunan, $term4_phase2_epp_tle, $term4_phase2_average_of_mapeh, $term4_phase2_esp);
    $phase2_term4_gen_count = count(array_filter($phase2_term4_gen_numbers));
   
       if($phase2_term4_gen_count != 0){
           $phase2_term4_gen_sum = array_sum($phase2_term4_gen_numbers);
    
           $phase2_term4_general_average = $phase2_term4_gen_sum / $phase2_term4_gen_count;
   
       }
   
       else{
           $phase2_term4_general_average = 0;
   
       }
   
   
   
   
   
   
    // $phase2_term5_general_average = round(($phase2_final_rating_mother_tongue  + $phase2_final_rating_filipino + $phase2_final_rating_english + $phase2_final_rating_math + $phase2_final_rating_science + $phase2_final_rating_AP + $phase2_final_rating_epp_tle + $phase2_final_rating_mapeh + $phase2_final_rating_esp) / 9);
   
   
    $phase2_term5_gen_numbers = array($phase2_final_rating_mother_tongue, $phase2_final_rating_filipino, $phase2_final_rating_english, $phase2_final_rating_math, $phase2_final_rating_science, $phase2_final_rating_AP, $phase2_final_rating_epp_tle, $phase2_final_rating_mapeh, $phase2_final_rating_esp);
    $phase2_term5_gen_count = count(array_filter($phase2_term5_gen_numbers));
   
    if($phase2_term5_gen_count != 0){
       
       $phase2_term5_gen_sum = array_sum($phase2_term5_gen_numbers);
       
       $phase2_term5_general_average = $phase2_term5_gen_sum / $phase2_term5_gen_count;
   }
   
    else{
       $phase2_term5_general_average = 0;
   
    }
   
   
    //phase3

    $phase3 = '3';
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
    $term1_phase3_mother_tongue = intval($_POST['term1_phase3_mother_tongue']);
    $term1_phase3_filipino = intval($_POST['term1_phase3_filipino']);
    $term1_phase3_english = intval($_POST['term1_phase3_english']);
    $term1_phase3_mathematics = intval($_POST['term1_phase3_mathematics']);
    $term1_phase3_science = intval($_POST['term1_phase3_science']);
    $term1_phase3_araling_panlipunan = intval($_POST['term1_phase3_araling_panlipunan']);
    $term1_phase3_epp_tle = intval($_POST['term1_phase3_epp_tle']);
    $term1_phase3_music = intval($_POST['term1_phase3_music']);
    $term1_phase3_arts = intval($_POST['term1_phase3_arts']);
    $term1_phase3_pe = intval($_POST['term1_phase3_pe']);
    $term1_phase3_health = intval($_POST['term1_phase3_health']);
    $term1_phase3_esp = intval($_POST['term1_phase3_esp']);
    $term1_phase3_arabic_language = intval($_POST['term1_phase3_arabic_language']);
    $term1_phase3_islamic_values = intval($_POST['term1_phase3_islamic_values']);
    $term1_phase3_remarks = 'none'; 

    //term2_phase3 grades
    //term2_phase3 
    $term2_phase3 = 2;
    $term2_phase3_mother_tongue = intval($_POST['term2_phase3_mother_tongue']);
    $term2_phase3_filipino = intval($_POST['term2_phase3_filipino']);
    $term2_phase3_english = intval($_POST['term2_phase3_english']);
    $term2_phase3_mathematics = intval($_POST['term2_phase3_mathematics']);
    $term2_phase3_science = intval($_POST['term2_phase3_science']);
    $term2_phase3_araling_panlipunan = intval($_POST['term2_phase3_araling_panlipunan']);
    $term2_phase3_epp_tle = intval($_POST['term2_phase3_epp_tle']);
    $term2_phase3_music = intval($_POST['term2_phase3_music']);
    $term2_phase3_arts = intval($_POST['term2_phase3_arts']);
    $term2_phase3_pe = intval($_POST['term2_phase3_pe']);
    $term2_phase3_health = intval($_POST['term2_phase3_health']);
    $term2_phase3_esp = intval($_POST['term2_phase3_esp']);
    $term2_phase3_arabic_language = intval($_POST['term2_phase3_arabic_language']);
    $term2_phase3_islamic_values = intval($_POST['term2_phase3_islamic_values']);
    $term2_phase3_remarks = 'none'; 

    //term3_phase3
    //term3_phase3 grades

    $term3_phase3 = 3;
    $term3_phase3_mother_tongue = intval($_POST['term3_phase3_mother_tongue']);
    $term3_phase3_filipino = intval($_POST['term3_phase3_filipino']);
    $term3_phase3_english = intval($_POST['term3_phase3_english']);
    $term3_phase3_mathematics = intval($_POST['term3_phase3_mathematics']);
    $term3_phase3_science = intval($_POST['term3_phase3_science']);
    $term3_phase3_araling_panlipunan = intval($_POST['term3_phase3_araling_panlipunan']);
    $term3_phase3_epp_tle = intval($_POST['term3_phase3_epp_tle']);
    $term3_phase3_music = intval($_POST['term3_phase3_music']);
    $term3_phase3_arts = intval($_POST['term3_phase3_arts']);
    $term3_phase3_pe = intval($_POST['term3_phase3_pe']);
    $term3_phase3_health = intval($_POST['term3_phase3_health']);
    $term3_phase3_esp = intval($_POST['term3_phase3_esp']);
    $term3_phase3_arabic_language = intval($_POST['term3_phase3_arabic_language']);
    $term3_phase3_islamic_values = intval($_POST['term3_phase3_islamic_values']);
    $term3_phase3_remarks = 'none'; 

    //term4_phase3
    //term4_phase3 grades

    $term4_phase3 = 4;
    $term4_phase3_mother_tongue = intval($_POST['term4_phase3_mother_tongue']);
    $term4_phase3_filipino = intval($_POST['term4_phase3_filipino']);
    $term4_phase3_english = intval($_POST['term4_phase3_english']);
    $term4_phase3_mathematics = intval($_POST['term4_phase3_mathematics']);
    $term4_phase3_science = intval($_POST['term4_phase3_science']);
    $term4_phase3_araling_panlipunan = intval($_POST['term4_phase3_araling_panlipunan']);
    $term4_phase3_epp_tle = intval($_POST['term4_phase3_epp_tle']);
    $term4_phase3_music = intval($_POST['term4_phase3_music']);
    $term4_phase3_arts = intval($_POST['term4_phase3_arts']);
    $term4_phase3_pe = intval($_POST['term2_phase3_pe']);
    $term4_phase3_health = intval($_POST['term4_phase3_health']);
    $term4_phase3_esp = intval($_POST['term4_phase3_esp']);
    $term4_phase3_arabic_language = intval($_POST['term4_phase3_arabic_language']);
    $term4_phase3_islamic_values = intval($_POST['term4_phase3_islamic_values']);
    $term4_phase3_remarks = 'none';

    // remedial phase 3 

    $phase3_remedial_from = date("Y-m-d",strtotime($_POST['phase3_remedial_from']));
    $phase3_remedial_to = date("Y-m-d" ,strtotime($_POST['phase3_remedial_to']));
    $phase3_remedial_learning_areas_1 = $_POST['phase3_remedial_learning_areas_1'] ;
    $phase3_remedial_final_rating_1 =$_POST['phase3_remedial_final_rating_1'];
    $phase3_remedial_class_mark_1 = $_POST['phase3_remedial_class_mark_1'];
    $phase3_recomputed_final_grade_1 = $_POST['phase3_recomputed_final_grade_1'];
    $phase3_remedial_remarks_1 = $_POST['phase3_remedial_remarks_1'];

    $phase3_remedial_learning_areas_2 = $_POST['phase3_remedial_learning_areas_2'] ;
    $phase3_remedial_final_rating_2 =$_POST['phase3_remedial_final_rating_2'];
    $phase3_remedial_class_mark_2 = $_POST['phase3_remedial_class_mark_2'];
    $phase3_recomputed_final_grade_2 = $_POST['phase3_recomputed_final_grade_2'];
    $phase3_remedial_remarks_2 = $_POST['phase3_remedial_remarks_2'];


    // average of mapeh phase 3


    $phase3_term1_average_mapeh_numbers = array($term1_phase3_music, $term1_phase3_arts, $term1_phase3_pe, $term1_phase3_health);
    $phase3_term1_average_mapeh_count = count(array_filter($phase3_term1_average_mapeh_numbers));
        if( $phase3_term1_average_mapeh_count != 0 ){

            $phase3_term1_average_mapeh_sum = array_sum($phase3_term1_average_mapeh_numbers);
           
            $term1_phase3_average_of_mapeh = $phase3_term1_average_mapeh_sum / $phase3_term1_average_mapeh_count;
        }

        else{
            $term1_phase3_average_of_mapeh = 0;
        }
  

    // $term2_phase3_average_of_mapeh = round(($term2_phase3_music + $term2_phase3_arts + $term2_phase3_pe + $term2_phase3_health) / 4) ;

    $phase3_term2_average_mapeh_numbers = array($term2_phase3_music, $term2_phase3_arts, $term2_phase3_pe, $term2_phase3_health);
    $phase3_term2_average_mapeh_count = count(array_filter($phase3_term2_average_mapeh_numbers));

    if($phase3_term2_average_mapeh_count !=0){

        $phase3_term2_average_mapeh_sum = array_sum($phase3_term2_average_mapeh_numbers);
        
        $term2_phase3_average_of_mapeh = $phase3_term2_average_mapeh_sum / $phase3_term2_average_mapeh_count;
    }

    else{
        $term2_phase3_average_of_mapeh = 0;
    }

    // $term3_phase3_average_of_mapeh = round(($term3_phase3_music + $term3_phase3_arts + $term3_phase3_pe + $term3_phase3_health) / 4) ;

    $phase3_term3_average_mapeh_numbers = array($term3_phase3_music, $term3_phase3_arts, $term3_phase3_pe, $term3_phase3_health);
    $phase3_term3_average_mapeh_count = count(array_filter($phase3_term3_average_mapeh_numbers));
    
    if($phase3_term3_average_mapeh_count !=0){

        $phase3_term3_average_mapeh_sum = array_sum($phase3_term3_average_mapeh_numbers);
        $term3_phase3_average_of_mapeh = $phase3_term3_average_mapeh_sum / $phase3_term3_average_mapeh_count;
    }
    
    else{
        
        $term3_phase3_average_of_mapeh = 0;

    }



    // $term4_phase3_average_of_mapeh = round(($term4_phase3_music + $term4_phase3_arts + $term4_phase3_pe + $term4_phase3_health) / 4) ;


    
    $phase3_term4_average_mapeh_numbers = array($term4_phase3_music, $term4_phase3_arts, $term4_phase3_pe, $term4_phase3_health);
    $phase3_term4_average_mapeh_count = count(array_filter($phase3_term4_average_mapeh_numbers));
    
    if($phase3_term4_average_mapeh_count !=0 ){
        $phase3_term4_average_mapeh_sum = array_sum($phase3_term4_average_mapeh_numbers);
        
        $term4_phase3_average_of_mapeh = $phase3_term4_average_mapeh_sum / $phase3_term4_average_mapeh_count;
    }

    else{
        $term4_phase3_average_of_mapeh = 0;
    }
   

    //final rating
    $phase3_term5 ='Final Rating';
  

    // $phase3_final_rating_mother_tongue = round(($term1_phase3_mother_tongue + $term2_phase3_mother_tongue + 
    // $term3_phase3_mother_tongue + $term4_phase3_mother_tongue) / 4);

        $phase3_mt_numbers = array($term1_phase3_mother_tongue, $term2_phase3_mother_tongue, $term3_phase3_mother_tongue,$term4_phase3_mother_tongue);
        $phase3_mt_count = count(array_filter($phase3_mt_numbers));
        if($phase3_mt_count != 0){

            $phase3_mt_sum = array_sum($phase3_mt_numbers);
        
            $phase3_final_rating_mother_tongue = $phase3_mt_sum / $phase3_mt_count;
        }
       else{
        $phase3_final_rating_mother_tongue = 0;
       }


    // $phase3_final_rating_filipino = round(($term1_phase3_filipino + $term2_phase3_filipino + $term3_phase3_filipino + $term4_phase3_filipino) / 4);

    $phase3_filipino_numbers = array($term1_phase3_filipino, $term2_phase3_filipino, $term3_phase3_filipino, $term4_phase3_filipino);
    $phase3_filipino_count = count(array_filter($phase3_filipino_numbers));

    if($phase3_filipino_count != 0){

        $phase3_filipino_sum = array_sum($phase3_filipino_numbers);

        $phase3_final_rating_filipino = $phase3_filipino_sum / $phase3_filipino_count;

    }

    else{

        $phase3_final_rating_filipino = 0;

    }

   

    // $phase3_final_rating_english = round(($term1_phase3_english + $term2_phase3_english + $term3_phase3_english + $term4_phase3_english) / 4);

    
    $phase3_english_numbers = array($term1_phase3_english, $term2_phase3_english, $term3_phase3_english, $term4_phase3_english);
    $phase3_english_count = count(array_filter($phase3_english_numbers));
    if($phase3_english_count != 0 ){
        $phase3_english_sum = array_sum($phase3_english_numbers);

        $phase3_final_rating_english = $phase3_english_sum / $phase3_english_count;
    }
    
    else{

        $phase3_final_rating_english = 0;
    }


    // $phase3_final_rating_math = round(($term1_phase3_mathematics + $term2_phase3_mathematics + $term3_phase3_mathematics + $term4_phase3_mathematics ) / 4);

    $phase3_math_numbers = array($term1_phase3_mathematics, $term2_phase3_mathematics,  $term3_phase3_mathematics, $term4_phase3_mathematics);
    $phase3_math_count = count(array_filter($phase3_math_numbers));
    
    if($phase3_math_count != 0){
        $phase3_math_sum = array_sum($phase3_math_numbers);
    
        $phase3_final_rating_math = $phase3_math_sum / $phase3_math_count;

    }

    else{
        $phase3_final_rating_math = 0;

    }

   

    // $phase3_final_rating_science = round(($term1_phase3_science + $term2_phase3_science + $term3_phase3_science + $term4_phase3_science) / 4);

    $phase3_science_numbers = array($term1_phase3_science, $term2_phase3_science, $term3_phase3_science, $term4_phase3_science);
    $phase3_science_count = count(array_filter($phase3_science_numbers));
    
    if($phase3_science_count != 0){

        $phase3_science_sum = array_sum($phase3_science_numbers);

    $phase3_final_rating_science = $phase3_science_sum / $phase3_science_count;
    }

    else{

        $phase3_final_rating_science = 0;
    }

    

    // $phase3_final_rating_AP = round(($term1_phase3_araling_panlipunan + $term2_phase3_araling_panlipunan + $term3_phase3_araling_panlipunan + $term4_phase3_araling_panlipunan) / 4);

    $phase3_ap_numbers = array($term1_phase3_araling_panlipunan, $term2_phase3_araling_panlipunan, $term3_phase3_araling_panlipunan, $term4_phase3_araling_panlipunan);
    $phase3_ap_count = count(array_filter($phase3_ap_numbers));

    if($phase3_ap_count != 0){
        $phase3_ap_sum = array_sum($phase3_ap_numbers);

        $phase3_final_rating_AP = $phase3_ap_sum / $phase3_ap_count;

    }

    else{
        $phase3_final_rating_AP = 0;
        
    }

    // $phase3_final_rating_epp_tle = round(($term1_phase3_epp_tle + $term2_phase3_epp_tle + $term3_phase3_epp_tle + $term4_phase3_epp_tle) / 4);

    $phase3_epp_tle_numbers = array($term1_phase3_epp_tle, $term2_phase3_epp_tle, $term3_phase3_epp_tle, $term4_phase3_epp_tle);
    $phase3_epp_tle_count = count(array_filter($phase3_epp_tle_numbers));

    if($phase3_epp_tle_count != 0){

        $phase3_epp_tle_sum = array_sum($phase3_epp_tle_numbers);
    
    $phase3_final_rating_epp_tle = $phase3_epp_tle_sum / $phase3_epp_tle_count;
    }

    else{
        $phase3_final_rating_epp_tle = 0;
    }
    
    
    

    // $phase3_final_rating_mapeh = round(($term1_phase3_average_of_mapeh + $term2_phase3_average_of_mapeh + $term3_phase3_average_of_mapeh + $term4_phase3_average_of_mapeh) / 4 );

    $phase3_mapeh_numbers = array($term1_phase3_average_of_mapeh, $term2_phase3_average_of_mapeh, $term3_phase3_average_of_mapeh, $term4_phase3_average_of_mapeh);
    $phase3_mapeh_count = count(array_filter($phase3_mapeh_numbers));
    
    if($phase3_mapeh_count != 0){

        $phase3_mapeh_sum = array_sum($phase3_mapeh_numbers);
    
        $phase3_final_rating_mapeh = $phase3_mapeh_sum / $phase3_mapeh_count;

    }

    else{
        
        $phase3_final_rating_mapeh = 0;

    }
   

    // $phase3_final_rating_music = round(($term1_phase3_music + $term2_phase3_music + $term3_phase3_music + $term4_phase3_music) / 4);

    $phase3_music_numbers = array($term1_phase3_music, $term2_phase3_music, $term3_phase3_music, $term4_phase3_music);
    $phase3_music_count = count(array_filter($phase3_music_numbers));
    
    if($phase3_music_count != 0){
        $phase3_music_sum = array_sum($phase3_music_numbers);
    
        $phase3_final_rating_music =  $phase3_music_sum / $phase3_music_count;

    }

    else {
        $phase3_final_rating_music = 0;
    }
   
    

    // $phase3_final_rating_arts = round(($term1_phase3_arts + $term2_phase3_arts + $term3_phase3_arts + $term4_phase3_arts ) / 4);

    
    $phase3_arts_numbers = array($term1_phase3_arts, $term2_phase3_arts, $term3_phase3_arts, $term4_phase3_arts);
    $phase3_arts_count = count(array_filter($phase3_arts_numbers)); 
    
    if ($phase3_arts_count != 0) {
        
        $phase3_arts_sum = array_sum($phase3_arts_numbers);
    
        $phase3_final_rating_arts =  $phase3_arts_sum / $phase3_arts_count;

    }

    else{
        $phase3_final_rating_arts = 0;
    }
    
    // $phase3_final_rating_PE = round(($term1_phase3_pe + $term2_phase3_pe + $term3_phase3_pe + $term4_phase3_pe) / 4);

    $phase3_pe_numbers = array($term1_phase3_pe, $term2_phase3_pe, $term3_phase3_pe, $term4_phase3_pe);
    $phase3_pe_count = count(array_filter($phase3_pe_numbers));
    
    if($phase3_pe_count != 0){
        $phase3_pe_sum = array_sum($phase3_pe_numbers);
    
        $phase3_final_rating_PE = $phase3_pe_sum / $phase3_pe_count;
    }

    else{
        $phase3_final_rating_PE = 0;
    }
    

    



    // $phase3_final_rating_health = round(($term1_phase3_health + $term2_phase3_health + $term3_phase3_health + $term4_phase3_health)/ 4);

    $phase3_health_numbers = array($term1_phase3_health, $term2_phase3_health, $term3_phase3_health, $term4_phase3_health);
    $phase3_health_count = count(array_filter($phase3_health_numbers));
    
    if($phase3_health_count != 0){
        $phase3_health_sum = array_sum($phase3_health_numbers);
    
        $phase3_final_rating_health = $phase3_health_sum / $phase3_health_count;
    }

    else {
        $phase3_final_rating_health = 0;
    }

    

     // $phase3_final_rating_esp = round(($term1_phase3_esp + $term2_phase3_esp + $term3_phase3_esp + $term4_phase3_esp) / 4);
    
     $phase3_esp_numbers = array($term1_phase3_esp, $term2_phase3_esp, $term3_phase3_esp, $term4_phase3_esp);
     $phase3_esp_count = count (array_filter($phase3_esp_numbers));
     
     if($phase3_esp_count != 0){

        $phase3_esp_sum = array_sum($phase3_esp_numbers);
     
        $phase3_final_rating_esp = $phase3_esp_sum / $phase3_esp_count;
     }
     else{
        $phase3_final_rating_esp = 0;
     }
     



     // $phase3_final_rating_arabic_language = round(($term1_phase3_arabic_language + $term2_phase3_arabic_language + $term3_phase3_arabic_language + $term4_phase3_arabic_language) / 4);

    
     $phase3_arabic_numbers = array($term1_phase3_arabic_language, $term2_phase3_arabic_language, $term3_phase3_arabic_language, $term4_phase3_arabic_language);
     $phase3_arabic_count = count(array_filter($phase3_arabic_numbers));
    
     if($phase3_arabic_count != 0){
        $phase3_arabic_sum = array_sum($phase3_arabic_numbers);
     
        $phase3_final_rating_arabic_language = $phase3_arabic_sum / $phase3_arabic_count;
     }

     else{

        $phase3_final_rating_arabic_language = 0;

     }

    

    // $phase3_final_rating_islamic_values = round(($term1_phase3_islamic_values + $term2_phase3_islamic_values + $term3_phase3_islamic_values + $term4_phase3_islamic_values) / 4);

    $phase3_islamic_numbers = array($term1_phase3_islamic_values, $term2_phase3_islamic_values, $term3_phase3_islamic_values, $term4_phase3_islamic_values);
    $phase3_islamic_count = count(array_filter($phase3_islamic_numbers));
    
    if($phase3_islamic_count !=0){
        $phase3_islamic_sum = array_sum($phase3_islamic_numbers);
    
        $phase3_final_rating_islamic_values = $phase3_islamic_sum / $phase3_islamic_count;
    }

    else{
        $phase3_final_rating_islamic_values = 0;
    }
    

    // validation of phase 3 


    if($phase3_final_rating_mother_tongue >= 75){
        $phase3_final_rating_mother_tongue_output = 'PASSED';
    }else{
        $phase3_final_rating_mother_tongue_output = 'FAILED';
    }
    
    if($phase3_final_rating_filipino >= 75){
        $phase3_final_rating_filipino_output = 'PASSED';
    }else{
        $phase3_final_rating_filipino_output ='FAILED';
    }
    
    if($phase3_final_rating_english >= 75){
        $phase3_final_rating_english_output ='PASSED';
    }else{
        $phase3_final_rating_english_output = 'FAILED';
    }
    
    if($phase3_final_rating_math >= 75){
        $phase3_final_rating_math_output = 'PASSED';
    }else{
        $phase3_final_rating_math_output =  'FAILED';
    }
    
    if($phase3_final_rating_science >= 75){
        $phase3_final_rating_science_output = 'PASSED';
    }else{
        $phase3_final_rating_science_output = 'FAILED';
    }
    
    if($phase3_final_rating_AP >= 75){
        $phase3_final_rating_AP_output = 'PASSED';
    }else{
        $phase3_final_rating_AP_output = 'FAILED';
    }
    
    if($phase3_final_rating_epp_tle >= 75){
        $phase3_final_rating_epp_tle_output = 'PASSED';
    }else{
        $phase3_final_rating_epp_tle_output = 'FAILED';
    }
    
    if($phase3_final_rating_mapeh >= 75){
        $phase3_final_rating_mapeh_output = 'PASSED';
    }else{
        $phase3_final_rating_mapeh_output = 'FAILED';
    }
    
    if($phase3_final_rating_music >= 75){
        $phase3_final_rating_music_output = 'PASSED';
    }else{
        $phase3_final_rating_music_output = 'FAILED';
    }
    
    if($phase3_final_rating_arts >= 75){
        $phase3_final_rating_arts_output = 'PASSED';
    }else{
        $phase3_final_rating_arts_output = 'FAILED';
    }
    
    if($phase3_final_rating_PE >= 75){
        $phase3_final_rating_PE_output = 'PASSED';
    }else{
        $phase3_final_rating_PE_output ='FAILED';
    }
    
    if($phase3_final_rating_health >= 75){
        $phase3_final_rating_health_output = 'PASSED';
    }else{
        $phase3_final_rating_health_output = 'FAILED';
    }
    
    if($phase3_final_rating_esp >= 75){
        $phase3_final_rating_esp_output = 'PASSED';
    }else{
        $phase3_final_rating_esp_output = 'FAILED';
    }
    
    if($phase3_final_rating_arabic_language >= 75){
        $phase3_final_rating_arabic_language_output = 'PASSED';
    }
    else{
        $phase3_final_rating_arabic_language_output = 'FAILED';
    }
    
    if($phase3_final_rating_islamic_values >= 75){
        $phase3_final_rating_islamic_values_output = 'PASSED';
    }else{
        $phase3_final_rating_islamic_values_output = 'FAILED';
    }


    //phase 3 general average

   // $phase3_term1_general_average = round(($term1_phase3_mother_tongue + $term1_phase3_mathematics + $term1_phase3_araling_panlipunan + $term1_phase3_average_of_mapeh + $term1_phase3_esp ) / 5);

   $phase3_term1_gen_numbers = array($term1_phase3_mother_tongue, $term1_phase3_filipino, $term1_phase3_english, $term1_phase3_mathematics, $term1_phase3_science, $term1_phase3_araling_panlipunan, $term1_phase3_epp_tle, $term1_phase3_average_of_mapeh, $term1_phase3_esp);
   $phase3_term1_gen_count = count(array_filter($phase3_term1_gen_numbers));

   if($phase3_term1_gen_count != 0){
       
       $phase3_term1_gen_sum = array_sum($phase3_term1_gen_numbers);
   
       $phase3_term1_general_average = $phase3_term1_gen_sum / $phase3_term1_gen_count;
       
   }
   
   else{
       $phase3_term1_general_average = 0;
   }
   
   // $phase3_term2_general_average = round(($term2_phase3_mother_tongue + $term2_phase3_filipino + $term2_phase3_english + $term2_phase3_mathematics + $term2_phase3_science + $term2_phase3_araling_panlipunan + $term2_phase3_epp_tle + $term2_phase3_average_of_mapeh + $term2_phase3_esp) / 9);
   $phase3_term2_gen_numbers = array($term2_phase3_mother_tongue, $term2_phase3_filipino, $term2_phase3_english, $term2_phase3_mathematics, $term2_phase3_science, $term2_phase3_araling_panlipunan, $term2_phase3_epp_tle, $term2_phase3_average_of_mapeh, $term2_phase3_esp);
   $phase3_term2_gen_count = count(array_filter($phase3_term2_gen_numbers));
   
   if ($phase3_term2_gen_count != 0){
       
       $phase3_term2_gen_sum = array_sum($phase3_term2_gen_numbers);
   
       $phase3_term2_general_average = $phase3_term2_gen_sum / $phase3_term2_gen_count;

   }

   else {
       $phase3_term2_general_average = 0;
   }

  
   
    // $phase3_term3_general_average = round(($term3_phase3_mother_tongue + $term3_phase3_filipino + $term3_phase3_english + $term3_phase3_mathematics + $term3_phase3_science + $term3_phase3_araling_panlipunan + $term3_phase3_epp_tle + $term3_phase3_average_of_mapeh + $term3_phase3_esp) / 9);
   
    $phase3_term3_gen_numbers = array($term3_phase3_mother_tongue, $term3_phase3_filipino, $term3_phase3_english, $term3_phase3_mathematics, $term3_phase3_science, $term3_phase3_araling_panlipunan, $term3_phase3_epp_tle, $term3_phase3_average_of_mapeh, $term3_phase3_esp);
    $phase3_term3_gen_count = count(array_filter($phase3_term3_gen_numbers));
    

       if($phase3_term3_gen_count != 0){
           $phase3_term3_gen_sum = array_sum($phase3_term3_gen_numbers);
    
           $phase3_term3_general_average = $phase3_term3_gen_sum / $phase3_term3_gen_count;

       }

       else{
           $phase3_term3_general_average = 0;

       }


    
   
   
   
    // $phase3_term4_general_average = round(($term4_phase3_mother_tongue + $term4_phase3_filipino + $term4_phase3_english + $term4_phase3_mathematics + $term4_phase3_science + $term4_phase3_araling_panlipunan + $term4_phase3_epp_tle + $term4_phase3_average_of_mapeh + $term4_phase3_esp) / 9);
   
    $phase3_term4_gen_numbers = array($term4_phase3_mother_tongue, $term4_phase3_filipino, $term4_phase3_english, $term4_phase3_mathematics, $term4_phase3_science, $term4_phase3_araling_panlipunan, $term4_phase3_epp_tle, $term4_phase3_average_of_mapeh, $term4_phase3_esp);
    $phase3_term4_gen_count = count(array_filter($phase3_term4_gen_numbers));
   
       if($phase3_term4_gen_count != 0){
           $phase3_term4_gen_sum = array_sum($phase3_term4_gen_numbers);
    
           $phase3_term4_general_average = $phase3_term4_gen_sum / $phase3_term4_gen_count;

       }

       else{
           $phase3_term4_general_average = 0;

       }

   
   
   
   
   
    // $phase3_term5_general_average = round(($phase3_final_rating_mother_tongue  + $phase3_final_rating_filipino + $phase3_final_rating_english + $phase3_final_rating_math + $phase3_final_rating_science + $phase3_final_rating_AP + $phase3_final_rating_epp_tle + $phase3_final_rating_mapeh + $phase3_final_rating_esp) / 9);


    $phase3_term5_gen_numbers = array($phase3_final_rating_mother_tongue, $phase3_final_rating_filipino, $phase3_final_rating_english, $phase3_final_rating_math, $phase3_final_rating_science, $phase3_final_rating_AP, $phase3_final_rating_epp_tle, $phase3_final_rating_mapeh, $phase3_final_rating_esp);
    $phase3_term5_gen_count = count(array_filter($phase3_term5_gen_numbers));

    if($phase3_term5_gen_count != 0){
       
       $phase3_term5_gen_sum = array_sum($phase3_term5_gen_numbers);
       
       $phase3_term5_general_average = $phase3_term5_gen_sum / $phase3_term5_gen_count;
  }

    else{
       $phase3_term5_general_average = 0;

    }
   
    // phase 4
    $phase4 = '4';
    $phase4_name_of_school = $_POST['phase4_name_of_school'];
    $phase4_school_id = $_POST['phase4_school_id'];
    $phase4_district = $_POST['phase4_district'];
    $phase4_division = $_POST['phase4_division'];
    $phase4_region = $_POST['phase4_region'];
    $phase4_classified_as_grade = $_POST['phase4_classified_as_grade'];
    $phase4_section = $_POST['phase4_section'];
    $phase4_school_year = $_POST['phase4_school_year'];
    $phase4_name_of_teacher = $_POST['phase4_name_of_teacher'];
    $phase4_signature = $_POST['phase4_signature'];
    $phase4_remarks = 'none';

        //term 1 phase 4
    $term1_phase4 = 1;
    $term1_phase4_mother_tongue = intval($_POST['term1_phase4_mother_tongue']);
    $term1_phase4_filipino = intval($_POST['term1_phase4_filipino']);
    $term1_phase4_english = intval($_POST['term1_phase4_english']);
    $term1_phase4_mathematics = intval($_POST['term1_phase4_mathematics']);
    $term1_phase4_science = intval($_POST['term1_phase4_science']);
    $term1_phase4_araling_panlipunan = intval($_POST['term1_phase4_araling_panlipunan']);
    $term1_phase4_epp_tle = intval($_POST['term1_phase4_epp_tle']);
    $term1_phase4_music = intval($_POST['term1_phase4_music']);
    $term1_phase4_arts = intval($_POST['term1_phase4_arts']);
    $term1_phase4_pe = intval($_POST['term1_phase4_pe']);
    $term1_phase4_health = intval($_POST['term1_phase4_health']);
    $term1_phase4_esp = intval($_POST['term1_phase4_esp']);
    $term1_phase4_arabic_language = intval($_POST['term1_phase4_arabic_language']);
    $term1_phase4_islamic_values = intval($_POST['term1_phase4_islamic_values']);
    $term1_phase4_remarks = 'none'; 

    //term2_phase4 grades
    //term2_phase4 
    $term2_phase4 = 2;
    $term2_phase4_mother_tongue = intval($_POST['term2_phase4_mother_tongue']);
    $term2_phase4_filipino = intval($_POST['term2_phase4_filipino']);
    $term2_phase4_english = intval($_POST['term2_phase4_english']);
    $term2_phase4_mathematics = intval($_POST['term2_phase4_mathematics']);
    $term2_phase4_science = intval($_POST['term2_phase4_science']);
    $term2_phase4_araling_panlipunan = intval($_POST['term2_phase4_araling_panlipunan']);
    $term2_phase4_epp_tle = intval($_POST['term2_phase4_epp_tle']);
    $term2_phase4_music = intval($_POST['term2_phase4_music']);
    $term2_phase4_arts = intval($_POST['term2_phase4_arts']);
    $term2_phase4_pe = intval($_POST['term2_phase4_pe']);
    $term2_phase4_health = intval($_POST['term2_phase4_health']);
    $term2_phase4_esp = intval($_POST['term2_phase4_esp']);
    $term2_phase4_arabic_language = intval($_POST['term2_phase4_arabic_language']);
    $term2_phase4_islamic_values = intval($_POST['term2_phase4_islamic_values']);
    $term2_phase4_remarks = 'none'; 

    //term3_phase4
    //term3_phase4 grades

    $term3_phase4 = 3;
    $term3_phase4_mother_tongue = intval($_POST['term3_phase4_mother_tongue']);
    $term3_phase4_filipino = intval($_POST['term3_phase4_filipino']);
    $term3_phase4_english = intval($_POST['term3_phase4_english']);
    $term3_phase4_mathematics = intval($_POST['term3_phase4_mathematics']);
    $term3_phase4_science = intval($_POST['term3_phase4_science']);
    $term3_phase4_araling_panlipunan = intval($_POST['term3_phase4_araling_panlipunan']);
    $term3_phase4_epp_tle = intval($_POST['term3_phase4_epp_tle']);
    $term3_phase4_music = intval($_POST['term3_phase4_music']);
    $term3_phase4_arts = intval($_POST['term3_phase4_arts']);
    $term3_phase4_pe = intval($_POST['term3_phase4_pe']);
    $term3_phase4_health = intval($_POST['term3_phase4_health']);
    $term3_phase4_esp = intval($_POST['term3_phase4_esp']);
    $term3_phase4_arabic_language = intval($_POST['term3_phase4_arabic_language']);
    $term3_phase4_islamic_values = intval($_POST['term3_phase4_islamic_values']);
    $term3_phase4_remarks = 'none'; 

    //term4_phase4
    //term4_phase4 grades

    $term4_phase4 = 4;
    $term4_phase4_mother_tongue = intval($_POST['term4_phase4_mother_tongue']);
    $term4_phase4_filipino = intval($_POST['term4_phase4_filipino']);
    $term4_phase4_english = intval($_POST['term4_phase4_english']);
    $term4_phase4_mathematics = intval($_POST['term4_phase4_mathematics']);
    $term4_phase4_science = intval($_POST['term4_phase4_science']);
    $term4_phase4_araling_panlipunan = intval($_POST['term4_phase4_araling_panlipunan']);
    $term4_phase4_epp_tle = intval($_POST['term4_phase4_epp_tle']);
    $term4_phase4_music = intval($_POST['term4_phase4_music']);
    $term4_phase4_arts = intval($_POST['term4_phase4_arts']);
    $term4_phase4_pe = intval($_POST['term2_phase4_pe']);
    $term4_phase4_health = intval($_POST['term4_phase4_health']);
    $term4_phase4_esp = intval($_POST['term4_phase4_esp']);
    $term4_phase4_arabic_language = intval($_POST['term4_phase4_arabic_language']);
    $term4_phase4_islamic_values = intval($_POST['term4_phase4_islamic_values']);
    $term4_phase4_remarks = 'none';

    //remedial phase 4 

    $phase4_remedial_from = date("Y-m-d",strtotime($_POST['phase4_remedial_from']));
    $phase4_remedial_to = date("Y-m-d" ,strtotime($_POST['phase4_remedial_to']));
    $phase4_remedial_learning_areas_1 = $_POST['phase4_remedial_learning_areas_1'] ;
    $phase4_remedial_final_rating_1 =$_POST['phase4_remedial_final_rating_1'];
    $phase4_remedial_class_mark_1 = $_POST['phase4_remedial_class_mark_1'];
    $phase4_recomputed_final_grade_1 = $_POST['phase4_recomputed_final_grade_1'];
    $phase4_remedial_remarks_1 = $_POST['phase4_remedial_remarks_1'];

    $phase4_remedial_learning_areas_2 = $_POST['phase4_remedial_learning_areas_2'] ;
    $phase4_remedial_final_rating_2 =$_POST['phase4_remedial_final_rating_2'];
    $phase4_remedial_class_mark_2 = $_POST['phase4_remedial_class_mark_2'];
    $phase4_recomputed_final_grade_2 = $_POST['phase4_recomputed_final_grade_2'];
    $phase4_remedial_remarks_2 = $_POST['phase4_remedial_remarks_2'];
    

    //average of mapeh phase 4



    $phase4_term1_average_mapeh_numbers = array($term1_phase4_music, $term1_phase4_arts, $term1_phase4_pe, $term1_phase4_health);
    $phase4_term1_average_mapeh_count = count(array_filter($phase4_term1_average_mapeh_numbers));
        if( $phase4_term1_average_mapeh_count != 0 ){

            $phase4_term1_average_mapeh_sum = array_sum($phase4_term1_average_mapeh_numbers);
           
            $term1_phase4_average_of_mapeh = $phase4_term1_average_mapeh_sum / $phase4_term1_average_mapeh_count;
        }

        else{
            $term1_phase4_average_of_mapeh = 0;
        }
  

    // $term2_phase4_average_of_mapeh = round(($term2_phase4_music + $term2_phase4_arts + $term2_phase4_pe + $term2_phase4_health) / 4) ;

    $phase4_term2_average_mapeh_numbers = array($term2_phase4_music, $term2_phase4_arts, $term2_phase4_pe, $term2_phase4_health);
    $phase4_term2_average_mapeh_count = count(array_filter($phase4_term2_average_mapeh_numbers));

    if($phase4_term2_average_mapeh_count !=0){

        $phase4_term2_average_mapeh_sum = array_sum($phase4_term2_average_mapeh_numbers);
        
        $term2_phase4_average_of_mapeh = $phase4_term2_average_mapeh_sum / $phase4_term2_average_mapeh_count;
    }

    else{
        $term2_phase4_average_of_mapeh = 0;
    }

    // $term3_phase4_average_of_mapeh = round(($term3_phase4_music + $term3_phase4_arts + $term3_phase4_pe + $term3_phase4_health) / 4) ;

    $phase4_term3_average_mapeh_numbers = array($term3_phase4_music, $term3_phase4_arts, $term3_phase4_pe, $term3_phase4_health);
    $phase4_term3_average_mapeh_count = count(array_filter($phase4_term3_average_mapeh_numbers));
    
    if($phase4_term3_average_mapeh_count !=0){

        $phase4_term3_average_mapeh_sum = array_sum($phase4_term3_average_mapeh_numbers);
        $term3_phase4_average_of_mapeh = $phase4_term3_average_mapeh_sum / $phase4_term3_average_mapeh_count;
    }
    
    else{
        
        $term3_phase4_average_of_mapeh = 0;

    }



    // $term4_phase4_average_of_mapeh = round(($term4_phase4_music + $term4_phase4_arts + $term4_phase4_pe + $term4_phase4_health) / 4) ;


    
    $phase4_term4_average_mapeh_numbers = array($term4_phase4_music, $term4_phase4_arts, $term4_phase4_pe, $term4_phase4_health);
    $phase4_term4_average_mapeh_count = count(array_filter($phase4_term4_average_mapeh_numbers));
    
    if($phase4_term4_average_mapeh_count !=0 ){
        $phase4_term4_average_mapeh_sum = array_sum($phase4_term4_average_mapeh_numbers);
        
        $term4_phase4_average_of_mapeh = $phase4_term4_average_mapeh_sum / $phase4_term4_average_mapeh_count;
    }

    else{
        $term4_phase4_average_of_mapeh = 0;
    }
   

    //final rating
    $phase4_term5 ='Final Rating';
  

    // $phase4_final_rating_mother_tongue = round(($term1_phase4_mother_tongue + $term2_phase4_mother_tongue + 
    // $term3_phase4_mother_tongue + $term4_phase4_mother_tongue) / 4);

        $phase4_mt_numbers = array($term1_phase4_mother_tongue, $term2_phase4_mother_tongue, $term3_phase4_mother_tongue,$term4_phase4_mother_tongue);
        $phase4_mt_count = count(array_filter($phase4_mt_numbers));
        if($phase4_mt_count != 0){

            $phase4_mt_sum = array_sum($phase4_mt_numbers);
        
            $phase4_final_rating_mother_tongue = $phase4_mt_sum / $phase4_mt_count;
        }
       else{
        $phase4_final_rating_mother_tongue = 0;
       }


    // $phase4_final_rating_filipino = round(($term1_phase4_filipino + $term2_phase4_filipino + $term3_phase4_filipino + $term4_phase4_filipino) / 4);

    $phase4_filipino_numbers = array($term1_phase4_filipino, $term2_phase4_filipino, $term3_phase4_filipino, $term4_phase4_filipino);
    $phase4_filipino_count = count(array_filter($phase4_filipino_numbers));

    if($phase4_filipino_count != 0){

        $phase4_filipino_sum = array_sum($phase4_filipino_numbers);

        $phase4_final_rating_filipino = $phase4_filipino_sum / $phase4_filipino_count;

    }

    else{

        $phase4_final_rating_filipino = 0;

    }

   

    // $phase4_final_rating_english = round(($term1_phase4_english + $term2_phase4_english + $term3_phase4_english + $term4_phase4_english) / 4);

    
    $phase4_english_numbers = array($term1_phase4_english, $term2_phase4_english, $term3_phase4_english, $term4_phase4_english);
    $phase4_english_count = count(array_filter($phase4_english_numbers));
    if($phase4_english_count != 0 ){
        $phase4_english_sum = array_sum($phase4_english_numbers);

        $phase4_final_rating_english = $phase4_english_sum / $phase4_english_count;
    }
    
    else{

        $phase4_final_rating_english = 0;
    }


    // $phase4_final_rating_math = round(($term1_phase4_mathematics + $term2_phase4_mathematics + $term3_phase4_mathematics + $term4_phase4_mathematics ) / 4);

    $phase4_math_numbers = array($term1_phase4_mathematics, $term2_phase4_mathematics,  $term3_phase4_mathematics, $term4_phase4_mathematics);
    $phase4_math_count = count(array_filter($phase4_math_numbers));
    
    if($phase4_math_count != 0){
        $phase4_math_sum = array_sum($phase4_math_numbers);
    
        $phase4_final_rating_math = $phase4_math_sum / $phase4_math_count;

    }

    else{
        $phase4_final_rating_math = 0;

    }

   

    // $phase4_final_rating_science = round(($term1_phase4_science + $term2_phase4_science + $term3_phase4_science + $term4_phase4_science) / 4);

    $phase4_science_numbers = array($term1_phase4_science, $term2_phase4_science, $term3_phase4_science, $term4_phase4_science);
    $phase4_science_count = count(array_filter($phase4_science_numbers));
    
    if($phase4_science_count != 0){

        $phase4_science_sum = array_sum($phase4_science_numbers);

    $phase4_final_rating_science = $phase4_science_sum / $phase4_science_count;
    }

    else{

        $phase4_final_rating_science = 0;
    }

    

    // $phase4_final_rating_AP = round(($term1_phase4_araling_panlipunan + $term2_phase4_araling_panlipunan + $term3_phase4_araling_panlipunan + $term4_phase4_araling_panlipunan) / 4);

    $phase4_ap_numbers = array($term1_phase4_araling_panlipunan, $term2_phase4_araling_panlipunan, $term3_phase4_araling_panlipunan, $term4_phase4_araling_panlipunan);
    $phase4_ap_count = count(array_filter($phase4_ap_numbers));

    if($phase4_ap_count != 0){
        $phase4_ap_sum = array_sum($phase4_ap_numbers);

        $phase4_final_rating_AP = $phase4_ap_sum / $phase4_ap_count;

    }

    else{
        $phase4_final_rating_AP = 0;
        
    }

    // $phase4_final_rating_epp_tle = round(($term1_phase4_epp_tle + $term2_phase4_epp_tle + $term3_phase4_epp_tle + $term4_phase4_epp_tle) / 4);

    $phase4_epp_tle_numbers = array($term1_phase4_epp_tle, $term2_phase4_epp_tle, $term3_phase4_epp_tle, $term4_phase4_epp_tle);
    $phase4_epp_tle_count = count(array_filter($phase4_epp_tle_numbers));

    if($phase4_epp_tle_count != 0){

        $phase4_epp_tle_sum = array_sum($phase4_epp_tle_numbers);
    
    $phase4_final_rating_epp_tle = $phase4_epp_tle_sum / $phase4_epp_tle_count;
    }

    else{
        $phase4_final_rating_epp_tle = 0;
    }
    
    
    

    // $phase4_final_rating_mapeh = round(($term1_phase4_average_of_mapeh + $term2_phase4_average_of_mapeh + $term3_phase4_average_of_mapeh + $term4_phase4_average_of_mapeh) / 4 );

    $phase4_mapeh_numbers = array($term1_phase4_average_of_mapeh, $term2_phase4_average_of_mapeh, $term3_phase4_average_of_mapeh, $term4_phase4_average_of_mapeh);
    $phase4_mapeh_count = count(array_filter($phase4_mapeh_numbers));
    
    if($phase4_mapeh_count != 0){

        $phase4_mapeh_sum = array_sum($phase4_mapeh_numbers);
    
        $phase4_final_rating_mapeh = $phase4_mapeh_sum / $phase4_mapeh_count;

    }

    else{
        
        $phase4_final_rating_mapeh = 0;

    }
   

    // $phase4_final_rating_music = round(($term1_phase4_music + $term2_phase4_music + $term3_phase4_music + $term4_phase4_music) / 4);

    $phase4_music_numbers = array($term1_phase4_music, $term2_phase4_music, $term3_phase4_music, $term4_phase4_music);
    $phase4_music_count = count(array_filter($phase4_music_numbers));
    
    if($phase4_music_count != 0){
        $phase4_music_sum = array_sum($phase4_music_numbers);
    
        $phase4_final_rating_music =  $phase4_music_sum / $phase4_music_count;

    }

    else {
        $phase4_final_rating_music = 0;
    }
   
    

    // $phase4_final_rating_arts = round(($term1_phase4_arts + $term2_phase4_arts + $term3_phase4_arts + $term4_phase4_arts ) / 4);

    
    $phase4_arts_numbers = array($term1_phase4_arts, $term2_phase4_arts, $term3_phase4_arts, $term4_phase4_arts);
    $phase4_arts_count = count(array_filter($phase4_arts_numbers)); 
    
    if ($phase4_arts_count != 0) {
        
        $phase4_arts_sum = array_sum($phase4_arts_numbers);
    
        $phase4_final_rating_arts =  $phase4_arts_sum / $phase4_arts_count;

    }

    else{
        $phase4_final_rating_arts = 0;
    }
    
    // $phase4_final_rating_PE = round(($term1_phase4_pe + $term2_phase4_pe + $term3_phase4_pe + $term4_phase4_pe) / 4);

    $phase4_pe_numbers = array($term1_phase4_pe, $term2_phase4_pe, $term3_phase4_pe, $term4_phase4_pe);
    $phase4_pe_count = count(array_filter($phase4_pe_numbers));
    
    if($phase4_pe_count != 0){
        $phase4_pe_sum = array_sum($phase4_pe_numbers);
    
        $phase4_final_rating_PE = $phase4_pe_sum / $phase4_pe_count;
    }

    else{
        $phase4_final_rating_PE = 0;
    }
    

    



    // $phase4_final_rating_health = round(($term1_phase4_health + $term2_phase4_health + $term3_phase4_health + $term4_phase4_health)/ 4);

    $phase4_health_numbers = array($term1_phase4_health, $term2_phase4_health, $term3_phase4_health, $term4_phase4_health);
    $phase4_health_count = count(array_filter($phase4_health_numbers));
    
    if($phase4_health_count != 0){
        $phase4_health_sum = array_sum($phase4_health_numbers);
    
        $phase4_final_rating_health = $phase4_health_sum / $phase4_health_count;
    }

    else {
        $phase4_final_rating_health = 0;
    }

    

     // $phase4_final_rating_esp = round(($term1_phase4_esp + $term2_phase4_esp + $term3_phase4_esp + $term4_phase4_esp) / 4);
    
     $phase4_esp_numbers = array($term1_phase4_esp, $term2_phase4_esp, $term3_phase4_esp, $term4_phase4_esp);
     $phase4_esp_count = count (array_filter($phase4_esp_numbers));
     
     if($phase4_esp_count != 0){

        $phase4_esp_sum = array_sum($phase4_esp_numbers);
     
        $phase4_final_rating_esp = $phase4_esp_sum / $phase4_esp_count;
     }
     else{
        $phase4_final_rating_esp = 0;
     }
     



     // $phase4_final_rating_arabic_language = round(($term1_phase4_arabic_language + $term2_phase4_arabic_language + $term3_phase4_arabic_language + $term4_phase4_arabic_language) / 4);

    
     $phase4_arabic_numbers = array($term1_phase4_arabic_language, $term2_phase4_arabic_language, $term3_phase4_arabic_language, $term4_phase4_arabic_language);
     $phase4_arabic_count = count(array_filter($phase4_arabic_numbers));
    
     if($phase4_arabic_count != 0){
        $phase4_arabic_sum = array_sum($phase4_arabic_numbers);
     
        $phase4_final_rating_arabic_language = $phase4_arabic_sum / $phase4_arabic_count;
     }

     else{

        $phase4_final_rating_arabic_language = 0;

     }

    

    // $phase4_final_rating_islamic_values = round(($term1_phase4_islamic_values + $term2_phase4_islamic_values + $term3_phase4_islamic_values + $term4_phase4_islamic_values) / 4);

    $phase4_islamic_numbers = array($term1_phase4_islamic_values, $term2_phase4_islamic_values, $term3_phase4_islamic_values, $term4_phase4_islamic_values);
    $phase4_islamic_count = count(array_filter($phase4_islamic_numbers));
    
    if($phase4_islamic_count !=0){
        $phase4_islamic_sum = array_sum($phase4_islamic_numbers);
    
        $phase4_final_rating_islamic_values = $phase4_islamic_sum / $phase4_islamic_count;
    }

    else{
        $phase4_final_rating_islamic_values = 0;
    }

    // valdiation of phase 4 




    if($phase4_final_rating_mother_tongue >= 75){
        $phase4_final_rating_mother_tongue_output = 'PASSED';
    }else{
        $phase4_final_rating_mother_tongue_output = 'FAILED';
    }

    if($phase4_final_rating_filipino >= 75){
        $phase4_final_rating_filipino_output = 'PASSED';
    }else{
        $phase4_final_rating_filipino_output ='FAILED';
    }

    if($phase4_final_rating_english >= 75){
        $phase4_final_rating_english_output ='PASSED';
    }else{
        $phase4_final_rating_english_output = 'FAILED';
    }

    if($phase4_final_rating_math >= 75){
        $phase4_final_rating_math_output = 'PASSED';
    }else{
        $phase4_final_rating_math_output =  'FAILED';
    }

    if($phase4_final_rating_science >= 75){
        $phase4_final_rating_science_output = 'PASSED';
    }else{
        $phase4_final_rating_science_output = 'FAILED';
    }

    if($phase4_final_rating_AP >= 75){
        $phase4_final_rating_AP_output = 'PASSED';
    }else{
        $phase4_final_rating_AP_output = 'FAILED';
    }

    if($phase4_final_rating_epp_tle >= 75){
        $phase4_final_rating_epp_tle_output = 'PASSED';
    }else{
        $phase4_final_rating_epp_tle_output = 'FAILED';
    }

    if($phase4_final_rating_mapeh >= 75){
        $phase4_final_rating_mapeh_output = 'PASSED';
    }else{
        $phase4_final_rating_mapeh_output = 'FAILED';
    }

    if($phase4_final_rating_music >= 75){
        $phase4_final_rating_music_output = 'PASSED';
    }else{
        $phase4_final_rating_music_output = 'FAILED';
    }

    if($phase4_final_rating_arts >= 75){
        $phase4_final_rating_arts_output = 'PASSED';
    }else{
        $phase4_final_rating_arts_output = 'FAILED';
    }

    if($phase4_final_rating_PE >= 75){
        $phase4_final_rating_PE_output = 'PASSED';
    }else{
        $phase4_final_rating_PE_output ='FAILED';
    }

    if($phase4_final_rating_health >= 75){
        $phase4_final_rating_health_output = 'PASSED';
    }else{
        $phase4_final_rating_health_output = 'FAILED';
    }

    if($phase4_final_rating_esp >= 75){
        $phase4_final_rating_esp_output = 'PASSED';
    }else{
        $phase4_final_rating_esp_output = 'FAILED';
    }

    if($phase4_final_rating_arabic_language >= 75){
        $phase4_final_rating_arabic_language_output = 'PASSED';
    }else{
        $phase4_final_rating_arabic_language_output = 'FAILED';
    }

    if($phase4_final_rating_islamic_values >= 75){
        $phase4_final_rating_islamic_values_output = 'PASSED';
    }else{
        $phase4_final_rating_islamic_values_output = 'FAILED';
    }


    // general average of phase 4

    // $phase4_term1_general_average = round(($term1_phase4_mother_tongue + $term1_phase4_filipino + $term1_phase4_english + $term1_phase4_mathematics + $term1_phase4_science + $term1_phase4_araling_panlipunan + $term1_phase4_epp_tle + $term1_phase4_average_of_mapeh + $term1_phase4_esp) / 9);
    
    $phase4_term1_gen_numbers = array($term1_phase4_mother_tongue, $term1_phase4_filipino, $term1_phase4_english, $term1_phase4_mathematics, $term1_phase4_science, $term1_phase4_araling_panlipunan, $term1_phase4_epp_tle, $term1_phase4_average_of_mapeh, $term1_phase4_esp);
    $phase4_term1_gen_count = count(array_filter($phase4_term1_gen_numbers));

    if($phase4_term1_gen_count != 0){
        
        $phase4_term1_gen_sum = array_sum($phase4_term1_gen_numbers);
    
        $phase4_term1_general_average = $phase4_term1_gen_sum / $phase4_term1_gen_count;
        
    }
    
    else{
        $phase4_term1_general_average = 0;
    }
    
    // $phase4_term2_general_average = round(($term2_phase4_mother_tongue + $term2_phase4_filipino + $term2_phase4_english + $term2_phase4_mathematics + $term2_phase4_science + $term2_phase4_araling_panlipunan + $term2_phase4_epp_tle + $term2_phase4_average_of_mapeh + $term2_phase4_esp) / 9);
    $phase4_term2_gen_numbers = array($term2_phase4_mother_tongue, $term2_phase4_filipino, $term2_phase4_english, $term2_phase4_mathematics, $term2_phase4_science, $term2_phase4_araling_panlipunan, $term2_phase4_epp_tle, $term2_phase4_average_of_mapeh, $term2_phase4_esp);
    $phase4_term2_gen_count = count(array_filter($phase4_term2_gen_numbers));
    
    if ($phase4_term2_gen_count != 0){
        
        $phase4_term2_gen_sum = array_sum($phase4_term2_gen_numbers);
    
        $phase4_term2_general_average = $phase4_term2_gen_sum / $phase4_term2_gen_count;

    }

    else {
        $phase4_term2_general_average = 0;
    }

   
    
     // $phase4_term3_general_average = round(($term3_phase4_mother_tongue + $term3_phase4_filipino + $term3_phase4_english + $term3_phase4_mathematics + $term3_phase4_science + $term3_phase4_araling_panlipunan + $term3_phase4_epp_tle + $term3_phase4_average_of_mapeh + $term3_phase4_esp) / 9);
    
     $phase4_term3_gen_numbers = array($term3_phase4_mother_tongue, $term3_phase4_filipino, $term3_phase4_english, $term3_phase4_mathematics, $term3_phase4_science, $term3_phase4_araling_panlipunan, $term3_phase4_epp_tle, $term3_phase4_average_of_mapeh, $term3_phase4_esp);
     $phase4_term3_gen_count = count(array_filter($phase4_term3_gen_numbers));
     

        if($phase4_term3_gen_count != 0){
            $phase4_term3_gen_sum = array_sum($phase4_term3_gen_numbers);
     
            $phase4_term3_general_average = $phase4_term3_gen_sum / $phase4_term3_gen_count;

        }

        else{
            $phase4_term3_general_average = 0;

        }


     
    
    
    
     // $phase4_term4_general_average = round(($term4_phase4_mother_tongue + $term4_phase4_filipino + $term4_phase4_english + $term4_phase4_mathematics + $term4_phase4_science + $term4_phase4_araling_panlipunan + $term4_phase4_epp_tle + $term4_phase4_average_of_mapeh + $term4_phase4_esp) / 9);
    
     $phase4_term4_gen_numbers = array($term4_phase4_mother_tongue, $term4_phase4_filipino, $term4_phase4_english, $term4_phase4_mathematics, $term4_phase4_science, $term4_phase4_araling_panlipunan, $term4_phase4_epp_tle, $term4_phase4_average_of_mapeh, $term4_phase4_esp);
     $phase4_term4_gen_count = count(array_filter($phase4_term4_gen_numbers));
    
        if($phase4_term4_gen_count != 0){
            $phase4_term4_gen_sum = array_sum($phase4_term4_gen_numbers);
     
            $phase4_term4_general_average = $phase4_term4_gen_sum / $phase4_term4_gen_count;

        }

        else{
            $phase4_term4_general_average = 0;

        }

    
    
    
    
    
     // $phase4_term5_general_average = round(($phase4_final_rating_mother_tongue  + $phase4_final_rating_filipino + $phase4_final_rating_english + $phase4_final_rating_math + $phase4_final_rating_science + $phase4_final_rating_AP + $phase4_final_rating_epp_tle + $phase4_final_rating_mapeh + $phase4_final_rating_esp) / 9);


     $phase4_term5_gen_numbers = array($phase4_final_rating_mother_tongue, $phase4_final_rating_filipino, $phase4_final_rating_english, $phase4_final_rating_math, $phase4_final_rating_science, $phase4_final_rating_AP, $phase4_final_rating_epp_tle, $phase4_final_rating_mapeh, $phase4_final_rating_esp);
     $phase4_term5_gen_count = count(array_filter($phase4_term5_gen_numbers));

     if($phase4_term5_gen_count != 0){
        
        $phase4_term5_gen_sum = array_sum($phase4_term5_gen_numbers);
        
        $phase4_term5_general_average = $phase4_term5_gen_sum / $phase4_term5_gen_count;
   }

     else{
        $phase4_term5_general_average = 0;

     }



    //Phase 5
    $phase5 = '5';
    $phase5_name_of_school = $_POST['phase5_name_of_school'];
    $phase5_school_id = $_POST['phase5_school_id'];
    $phase5_district = $_POST['phase5_district'];
    $phase5_division = $_POST['phase5_division'];
    $phase5_region = $_POST['phase5_region'];
    $phase5_classified_as_grade = $_POST['phase5_classified_as_grade'];
    $phase5_section = $_POST['phase5_section'];
    $phase5_school_year = $_POST['phase5_school_year'];
    $phase5_name_of_teacher = $_POST['phase5_name_of_teacher'];
    $phase5_signature = $_POST['phase5_signature'];
    $phase5_remarks = 'none';


    //term1_phase5 grades
    $term1_phase5 = 1;
    $term1_phase5_mother_tongue = intval($_POST['term1_phase5_mother_tongue']);
    $term1_phase5_filipino = intval($_POST['term1_phase5_filipino']);
    $term1_phase5_english = intval($_POST['term1_phase5_english']);
    $term1_phase5_mathematics = intval($_POST['term1_phase5_mathematics']);
    $term1_phase5_science = intval($_POST['term1_phase5_science']);
    $term1_phase5_araling_panlipunan = intval($_POST['term1_phase5_araling_panlipunan']);
    $term1_phase5_epp_tle = intval($_POST['term1_phase5_epp_tle']);
    $term1_phase5_music = intval($_POST['term1_phase5_music']);
    $term1_phase5_arts = intval($_POST['term1_phase5_arts']);
    $term1_phase5_pe = intval($_POST['term1_phase5_pe']);
    $term1_phase5_health = intval($_POST['term1_phase5_health']);
    $term1_phase5_esp = intval($_POST['term1_phase5_esp']);
    $term1_phase5_arabic_language = intval($_POST['term1_phase5_arabic_language']);
    $term1_phase5_islamic_values = intval($_POST['term1_phase5_islamic_values']);
    $term1_phase5_remarks = 'none'; 

    //term2_phase5 grades
    //term2_phase5 
    $term2_phase5 = 2;
    $term2_phase5_mother_tongue = intval($_POST['term2_phase5_mother_tongue']);
    $term2_phase5_filipino = intval($_POST['term2_phase5_filipino']);
    $term2_phase5_english = intval($_POST['term2_phase5_english']);
    $term2_phase5_mathematics = intval($_POST['term2_phase5_mathematics']);
    $term2_phase5_science = intval($_POST['term2_phase5_science']);
    $term2_phase5_araling_panlipunan = intval($_POST['term2_phase5_araling_panlipunan']);
    $term2_phase5_epp_tle = intval($_POST['term2_phase5_epp_tle']);
    $term2_phase5_music = intval($_POST['term2_phase5_music']);
    $term2_phase5_arts = intval($_POST['term2_phase5_arts']);
    $term2_phase5_pe = intval($_POST['term2_phase5_pe']);
    $term2_phase5_health = intval($_POST['term2_phase5_health']);
    $term2_phase5_esp = intval($_POST['term2_phase5_esp']);
    $term2_phase5_arabic_language = intval($_POST['term2_phase5_arabic_language']);
    $term2_phase5_islamic_values = intval($_POST['term2_phase5_islamic_values']);
    $term2_phase5_remarks = 'none'; 

    //term3_phase5
    //term3_phase5 grades

    $term3_phase5 = 3;
    $term3_phase5_mother_tongue = intval($_POST['term3_phase5_mother_tongue']);
    $term3_phase5_filipino = intval($_POST['term3_phase5_filipino']);
    $term3_phase5_english = intval($_POST['term3_phase5_english']);
    $term3_phase5_mathematics = intval($_POST['term3_phase5_mathematics']);
    $term3_phase5_science = intval($_POST['term3_phase5_science']);
    $term3_phase5_araling_panlipunan = intval($_POST['term3_phase5_araling_panlipunan']);
    $term3_phase5_epp_tle = intval($_POST['term3_phase5_epp_tle']);
    $term3_phase5_music = intval($_POST['term3_phase5_music']);
    $term3_phase5_arts = intval($_POST['term3_phase5_arts']);
    $term3_phase5_pe = intval($_POST['term3_phase5_pe']);
    $term3_phase5_health = intval($_POST['term3_phase5_health']);
    $term3_phase5_esp = intval($_POST['term3_phase5_esp']);
    $term3_phase5_arabic_language = intval($_POST['term3_phase5_arabic_language']);
    $term3_phase5_islamic_values = intval($_POST['term3_phase5_islamic_values']);
    $term3_phase5_remarks = 'none'; 

    //term4_phase5
    //term4_phase5 grades

    $term4_phase5 = 4;
    $term4_phase5_mother_tongue = intval($_POST['term4_phase5_mother_tongue']);
    $term4_phase5_filipino = intval($_POST['term4_phase5_filipino']);
    $term4_phase5_english = intval($_POST['term4_phase5_english']);
    $term4_phase5_mathematics = intval($_POST['term4_phase5_mathematics']);
    $term4_phase5_science = intval($_POST['term4_phase5_science']);
    $term4_phase5_araling_panlipunan = intval($_POST['term4_phase5_araling_panlipunan']);
    $term4_phase5_epp_tle = intval($_POST['term4_phase5_epp_tle']);
    $term4_phase5_music = intval($_POST['term4_phase5_music']);
    $term4_phase5_arts = intval($_POST['term4_phase5_arts']);
    $term4_phase5_pe = intval($_POST['term2_phase5_pe']);
    $term4_phase5_health = intval($_POST['term4_phase5_health']);
    $term4_phase5_esp = intval($_POST['term4_phase5_esp']);
    $term4_phase5_arabic_language = intval($_POST['term4_phase5_arabic_language']);
    $term4_phase5_islamic_values = intval($_POST['term4_phase5_islamic_values']);
    $term4_phase5_remarks = 'none';

    //remedial phase 5 

    $phase5_remedial_from = date("Y-m-d",strtotime($_POST['phase5_remedial_from']));
    $phase5_remedial_to = date("Y-m-d" ,strtotime($_POST['phase5_remedial_to']));
    $phase5_remedial_learning_areas_1 = $_POST['phase5_remedial_learning_areas_1'] ;
    $phase5_remedial_final_rating_1 =$_POST['phase5_remedial_final_rating_1'];
    $phase5_remedial_class_mark_1 = $_POST['phase5_remedial_class_mark_1'];
    $phase5_recomputed_final_grade_1 = $_POST['phase5_recomputed_final_grade_1'];
    $phase5_remedial_remarks_1 = $_POST['phase5_remedial_remarks_1'];

    $phase5_remedial_learning_areas_2 = $_POST['phase5_remedial_learning_areas_2'] ;
    $phase5_remedial_final_rating_2 =$_POST['phase5_remedial_final_rating_2'];
    $phase5_remedial_class_mark_2 = $_POST['phase5_remedial_class_mark_2'];
    $phase5_recomputed_final_grade_2 = $_POST['phase5_recomputed_final_grade_2'];
    $phase5_remedial_remarks_2 = $_POST['phase5_remedial_remarks_2'];

    

    //phase 5 average mapeh

    $phase5_term1_average_mapeh_numbers = array($term1_phase5_music, $term1_phase5_arts, $term1_phase5_pe, $term1_phase5_health);
    $phase5_term1_average_mapeh_count = count(array_filter($phase5_term1_average_mapeh_numbers));
        if( $phase5_term1_average_mapeh_count != 0 ){

            $phase5_term1_average_mapeh_sum = array_sum($phase5_term1_average_mapeh_numbers);
           
            $term1_phase5_average_of_mapeh = $phase5_term1_average_mapeh_sum / $phase5_term1_average_mapeh_count;
        }

        else{
            $term1_phase5_average_of_mapeh = 0;
        }
  

    // $term2_phase5_average_of_mapeh = round(($term2_phase5_music + $term2_phase5_arts + $term2_phase5_pe + $term2_phase5_health) / 4) ;

    $phase5_term2_average_mapeh_numbers = array($term2_phase5_music, $term2_phase5_arts, $term2_phase5_pe, $term2_phase5_health);
    $phase5_term2_average_mapeh_count = count(array_filter($phase5_term2_average_mapeh_numbers));

    if($phase5_term2_average_mapeh_count !=0){

        $phase5_term2_average_mapeh_sum = array_sum($phase5_term2_average_mapeh_numbers);
        
        $term2_phase5_average_of_mapeh = $phase5_term2_average_mapeh_sum / $phase5_term2_average_mapeh_count;
    }

    else{
        $term2_phase5_average_of_mapeh = 0;
    }

    // $term3_phase5_average_of_mapeh = round(($term3_phase5_music + $term3_phase5_arts + $term3_phase5_pe + $term3_phase5_health) / 4) ;

    $phase5_term3_average_mapeh_numbers = array($term3_phase5_music, $term3_phase5_arts, $term3_phase5_pe, $term3_phase5_health);
    $phase5_term3_average_mapeh_count = count(array_filter($phase5_term3_average_mapeh_numbers));
    
    if($phase5_term3_average_mapeh_count !=0){

        $phase5_term3_average_mapeh_sum = array_sum($phase5_term3_average_mapeh_numbers);
        $term3_phase5_average_of_mapeh = $phase5_term3_average_mapeh_sum / $phase5_term3_average_mapeh_count;
    }
    
    else{
        
        $term3_phase5_average_of_mapeh = 0;

    }



    // $term4_phase5_average_of_mapeh = round(($term4_phase5_music + $term4_phase5_arts + $term4_phase5_pe + $term4_phase5_health) / 4) ;


    
    $phase5_term4_average_mapeh_numbers = array($term4_phase5_music, $term4_phase5_arts, $term4_phase5_pe, $term4_phase5_health);
    $phase5_term4_average_mapeh_count = count(array_filter($phase5_term4_average_mapeh_numbers));
    
    if($phase5_term4_average_mapeh_count !=0 ){
        $phase5_term4_average_mapeh_sum = array_sum($phase5_term4_average_mapeh_numbers);
        
        $term4_phase5_average_of_mapeh = $phase5_term4_average_mapeh_sum / $phase5_term4_average_mapeh_count;
    }

    else{
        $term4_phase5_average_of_mapeh = 0;
    }
   

    //final rating
    $phase5_term5 ='Final Rating';
  

    // $phase5_final_rating_mother_tongue = round(($term1_phase5_mother_tongue + $term2_phase5_mother_tongue + 
    // $term3_phase5_mother_tongue + $term4_phase5_mother_tongue) / 4);

        $phase5_mt_numbers = array($term1_phase5_mother_tongue, $term2_phase5_mother_tongue, $term3_phase5_mother_tongue,$term4_phase5_mother_tongue);
        $phase5_mt_count = count(array_filter($phase5_mt_numbers));
        if($phase5_mt_count != 0){

            $phase5_mt_sum = array_sum($phase5_mt_numbers);
        
            $phase5_final_rating_mother_tongue = $phase5_mt_sum / $phase5_mt_count;
        }
       else{
        $phase5_final_rating_mother_tongue = 0;
       }


    // $phase5_final_rating_filipino = round(($term1_phase5_filipino + $term2_phase5_filipino + $term3_phase5_filipino + $term4_phase5_filipino) / 4);

    $phase5_filipino_numbers = array($term1_phase5_filipino, $term2_phase5_filipino, $term3_phase5_filipino, $term4_phase5_filipino);
    $phase5_filipino_count = count(array_filter($phase5_filipino_numbers));

    if($phase5_filipino_count != 0){

        $phase5_filipino_sum = array_sum($phase5_filipino_numbers);

        $phase5_final_rating_filipino = $phase5_filipino_sum / $phase5_filipino_count;

    }

    else{

        $phase5_final_rating_filipino = 0;

    }

   

    // $phase5_final_rating_english = round(($term1_phase5_english + $term2_phase5_english + $term3_phase5_english + $term4_phase5_english) / 4);

    
    $phase5_english_numbers = array($term1_phase5_english, $term2_phase5_english, $term3_phase5_english, $term4_phase5_english);
    $phase5_english_count = count(array_filter($phase5_english_numbers));
    if($phase5_english_count != 0 ){
        $phase5_english_sum = array_sum($phase5_english_numbers);

        $phase5_final_rating_english = $phase5_english_sum / $phase5_english_count;
    }
    
    else{

        $phase5_final_rating_english = 0;
    }


    // $phase5_final_rating_math = round(($term1_phase5_mathematics + $term2_phase5_mathematics + $term3_phase5_mathematics + $term4_phase5_mathematics ) / 4);

    $phase5_math_numbers = array($term1_phase5_mathematics, $term2_phase5_mathematics,  $term3_phase5_mathematics, $term4_phase5_mathematics);
    $phase5_math_count = count(array_filter($phase5_math_numbers));
    
    if($phase5_math_count != 0){
        $phase5_math_sum = array_sum($phase5_math_numbers);
    
        $phase5_final_rating_math = $phase5_math_sum / $phase5_math_count;

    }

    else{
        $phase5_final_rating_math = 0;

    }

   

    // $phase5_final_rating_science = round(($term1_phase5_science + $term2_phase5_science + $term3_phase5_science + $term4_phase5_science) / 4);

    $phase5_science_numbers = array($term1_phase5_science, $term2_phase5_science, $term3_phase5_science, $term4_phase5_science);
    $phase5_science_count = count(array_filter($phase5_science_numbers));
    
    if($phase5_science_count != 0){

        $phase5_science_sum = array_sum($phase5_science_numbers);

    $phase5_final_rating_science = $phase5_science_sum / $phase5_science_count;
    }

    else{

        $phase5_final_rating_science = 0;
    }

    

    // $phase5_final_rating_AP = round(($term1_phase5_araling_panlipunan + $term2_phase5_araling_panlipunan + $term3_phase5_araling_panlipunan + $term4_phase5_araling_panlipunan) / 4);

    $phase5_ap_numbers = array($term1_phase5_araling_panlipunan, $term2_phase5_araling_panlipunan, $term3_phase5_araling_panlipunan, $term4_phase5_araling_panlipunan);
    $phase5_ap_count = count(array_filter($phase5_ap_numbers));

    if($phase5_ap_count != 0){
        $phase5_ap_sum = array_sum($phase5_ap_numbers);

        $phase5_final_rating_AP = $phase5_ap_sum / $phase5_ap_count;

    }

    else{
        $phase5_final_rating_AP = 0;
        
    }

    // $phase5_final_rating_epp_tle = round(($term1_phase5_epp_tle + $term2_phase5_epp_tle + $term3_phase5_epp_tle + $term4_phase5_epp_tle) / 4);

    $phase5_epp_tle_numbers = array($term1_phase5_epp_tle, $term2_phase5_epp_tle, $term3_phase5_epp_tle, $term4_phase5_epp_tle);
    $phase5_epp_tle_count = count(array_filter($phase5_epp_tle_numbers));

    if($phase5_epp_tle_count != 0){

        $phase5_epp_tle_sum = array_sum($phase5_epp_tle_numbers);
    
    $phase5_final_rating_epp_tle = $phase5_epp_tle_sum / $phase5_epp_tle_count;
    }

    else{
        $phase5_final_rating_epp_tle = 0;
    }
    
    
    

    // $phase5_final_rating_mapeh = round(($term1_phase5_average_of_mapeh + $term2_phase5_average_of_mapeh + $term3_phase5_average_of_mapeh + $term4_phase5_average_of_mapeh) / 4 );

    $phase5_mapeh_numbers = array($term1_phase5_average_of_mapeh, $term2_phase5_average_of_mapeh, $term3_phase5_average_of_mapeh, $term4_phase5_average_of_mapeh);
    $phase5_mapeh_count = count(array_filter($phase5_mapeh_numbers));
    
    if($phase5_mapeh_count != 0){

        $phase5_mapeh_sum = array_sum($phase5_mapeh_numbers);
    
        $phase5_final_rating_mapeh = $phase5_mapeh_sum / $phase5_mapeh_count;

    }

    else{
        
        $phase5_final_rating_mapeh = 0;

    }
   

    // $phase5_final_rating_music = round(($term1_phase5_music + $term2_phase5_music + $term3_phase5_music + $term4_phase5_music) / 4);

    $phase5_music_numbers = array($term1_phase5_music, $term2_phase5_music, $term3_phase5_music, $term4_phase5_music);
    $phase5_music_count = count(array_filter($phase5_music_numbers));
    
    if($phase5_music_count != 0){
        $phase5_music_sum = array_sum($phase5_music_numbers);
    
        $phase5_final_rating_music =  $phase5_music_sum / $phase5_music_count;

    }

    else {
        $phase5_final_rating_music = 0;
    }
   
    

    // $phase5_final_rating_arts = round(($term1_phase5_arts + $term2_phase5_arts + $term3_phase5_arts + $term4_phase5_arts ) / 4);

    
    $phase5_arts_numbers = array($term1_phase5_arts, $term2_phase5_arts, $term3_phase5_arts, $term4_phase5_arts);
    $phase5_arts_count = count(array_filter($phase5_arts_numbers)); 
    
    if ($phase5_arts_count != 0) {
        
        $phase5_arts_sum = array_sum($phase5_arts_numbers);
    
        $phase5_final_rating_arts =  $phase5_arts_sum / $phase5_arts_count;

    }

    else{
        $phase5_final_rating_arts = 0;
    }
    
    // $phase5_final_rating_PE = round(($term1_phase5_pe + $term2_phase5_pe + $term3_phase5_pe + $term4_phase5_pe) / 4);

    $phase5_pe_numbers = array($term1_phase5_pe, $term2_phase5_pe, $term3_phase5_pe, $term4_phase5_pe);
    $phase5_pe_count = count(array_filter($phase5_pe_numbers));
    
    if($phase5_pe_count != 0){
        $phase5_pe_sum = array_sum($phase5_pe_numbers);
    
        $phase5_final_rating_PE = $phase5_pe_sum / $phase5_pe_count;
    }

    else{
        $phase5_final_rating_PE = 0;
    }
    

    



    // $phase5_final_rating_health = round(($term1_phase5_health + $term2_phase5_health + $term3_phase5_health + $term4_phase5_health)/ 4);

    $phase5_health_numbers = array($term1_phase5_health, $term2_phase5_health, $term3_phase5_health, $term4_phase5_health);
    $phase5_health_count = count(array_filter($phase5_health_numbers));
    
    if($phase5_health_count != 0){
        $phase5_health_sum = array_sum($phase5_health_numbers);
    
        $phase5_final_rating_health = $phase5_health_sum / $phase5_health_count;
    }

    else {
        $phase5_final_rating_health = 0;
    }

    

     // $phase5_final_rating_esp = round(($term1_phase5_esp + $term2_phase5_esp + $term3_phase5_esp + $term4_phase5_esp) / 4);
    
     $phase5_esp_numbers = array($term1_phase5_esp, $term2_phase5_esp, $term3_phase5_esp, $term4_phase5_esp);
     $phase5_esp_count = count (array_filter($phase5_esp_numbers));
     
     if($phase5_esp_count != 0){

        $phase5_esp_sum = array_sum($phase5_esp_numbers);
     
        $phase5_final_rating_esp = $phase5_esp_sum / $phase5_esp_count;
     }
     else{
        $phase5_final_rating_esp = 0;
     }
     



     // $phase5_final_rating_arabic_language = round(($term1_phase5_arabic_language + $term2_phase5_arabic_language + $term3_phase5_arabic_language + $term4_phase5_arabic_language) / 4);

    
     $phase5_arabic_numbers = array($term1_phase5_arabic_language, $term2_phase5_arabic_language, $term3_phase5_arabic_language, $term4_phase5_arabic_language);
     $phase5_arabic_count = count(array_filter($phase5_arabic_numbers));
    
     if($phase5_arabic_count != 0){
        $phase5_arabic_sum = array_sum($phase5_arabic_numbers);
     
        $phase5_final_rating_arabic_language = $phase5_arabic_sum / $phase5_arabic_count;
     }

     else{

        $phase5_final_rating_arabic_language = 0;

     }

    

    // $phase5_final_rating_islamic_values = round(($term1_phase5_islamic_values + $term2_phase5_islamic_values + $term3_phase5_islamic_values + $term4_phase5_islamic_values) / 4);

    $phase5_islamic_numbers = array($term1_phase5_islamic_values, $term2_phase5_islamic_values, $term3_phase5_islamic_values, $term4_phase5_islamic_values);
    $phase5_islamic_count = count(array_filter($phase5_islamic_numbers));
    
    if($phase5_islamic_count !=0){
        $phase5_islamic_sum = array_sum($phase5_islamic_numbers);
    
        $phase5_final_rating_islamic_values = $phase5_islamic_sum / $phase5_islamic_count;
    }

    else{
        $phase5_final_rating_islamic_values = 0;
    }

    // phase 5 validation

    if($phase5_final_rating_mother_tongue >= 75){
        $phase5_final_rating_mother_tongue_output = 'PASSED';
    }else{
        $phase5_final_rating_mother_tongue_output = 'FAILED';
    }
    
    if($phase5_final_rating_filipino >= 75){
        $phase5_final_rating_filipino_output = 'PASSED';
    }else{
        $phase5_final_rating_filipino_output ='FAILED';
    }
    
    if($phase5_final_rating_english >= 75){
        $phase5_final_rating_english_output ='PASSED';
    }else{
        $phase5_final_rating_english_output = 'FAILED';
    }
    
    if($phase5_final_rating_math >= 75){
        $phase5_final_rating_math_output = 'PASSED';
    }else{
        $phase5_final_rating_math_output =  'FAILED';
    }
    
    if($phase5_final_rating_science >= 75){
        $phase5_final_rating_science_output = 'PASSED';
    }else{
        $phase5_final_rating_science_output = 'FAILED';
    }
    
    if($phase5_final_rating_AP >= 75){
        $phase5_final_rating_AP_output = 'PASSED';
    }else{
        $phase5_final_rating_AP_output = 'FAILED';
    }
    
    if($phase5_final_rating_epp_tle >= 75){
        $phase5_final_rating_epp_tle_output = 'PASSED';
    }else{
        $phase5_final_rating_epp_tle_output = 'FAILED';
    }
    
    if($phase5_final_rating_mapeh >= 75){
        $phase5_final_rating_mapeh_output = 'PASSED';
    }else{
        $phase5_final_rating_mapeh_output = 'FAILED';
    }
    
    if($phase5_final_rating_music >= 75){
        $phase5_final_rating_music_output = 'PASSED';
    }else{
        $phase5_final_rating_music_output = 'FAILED';
    }
    
    if($phase5_final_rating_arts >= 75){
        $phase5_final_rating_arts_output = 'PASSED';
    }else{
        $phase5_final_rating_arts_output = 'FAILED';
    }
    
    if($phase5_final_rating_PE >= 75){
        $phase5_final_rating_PE_output = 'PASSED';
    }else{
        $phase5_final_rating_PE_output ='FAILED';
    }
    
    if($phase5_final_rating_health >= 75){
        $phase5_final_rating_health_output = 'PASSED';
    }else{
        $phase5_final_rating_health_output = 'FAILED';
    }
    
    if($phase5_final_rating_esp >= 75){
        $phase5_final_rating_esp_output = 'PASSED';
    }else{
        $phase5_final_rating_esp_output = 'FAILED';
    }
    
    if($phase5_final_rating_arabic_language >= 75){
        $phase5_final_rating_arabic_language_output = 'PASSED';
    }else{
        $phase5_final_rating_arabic_language_output = 'FAILED';
    }
    
    if($phase5_final_rating_islamic_values >= 75){
        $phase5_final_rating_islamic_values_output = 'PASSED';
    }else{
        $phase5_final_rating_islamic_values_output = 'FAILED';
    }

    // average phase 5


    $phase5_term1_gen_numbers = array($term1_phase5_mother_tongue, $term1_phase5_filipino, $term1_phase5_english, $term1_phase5_mathematics, $term1_phase5_science, $term1_phase5_araling_panlipunan, $term1_phase5_epp_tle, $term1_phase5_average_of_mapeh, $term1_phase5_esp);
    $phase5_term1_gen_count = count(array_filter($phase5_term1_gen_numbers));
 
    if($phase5_term1_gen_count != 0){
        
        $phase5_term1_gen_sum = array_sum($phase5_term1_gen_numbers);
    
        $phase5_term1_general_average = $phase5_term1_gen_sum / $phase5_term1_gen_count;
        
    }
    
    else{
        $phase5_term1_general_average = 0;
    }
    
    // $phase5_term2_general_average = round(($term2_phase5_mother_tongue + $term2_phase5_filipino + $term2_phase5_english + $term2_phase5_mathematics + $term2_phase5_science + $term2_phase5_araling_panlipunan + $term2_phase5_epp_tle + $term2_phase5_average_of_mapeh + $term2_phase5_esp) / 9);
    $phase5_term2_gen_numbers = array($term2_phase5_mother_tongue, $term2_phase5_filipino, $term2_phase5_english, $term2_phase5_mathematics, $term2_phase5_science, $term2_phase5_araling_panlipunan, $term2_phase5_epp_tle, $term2_phase5_average_of_mapeh, $term2_phase5_esp);
    $phase5_term2_gen_count = count(array_filter($phase5_term2_gen_numbers));
    
    if ($phase5_term2_gen_count != 0){
        
        $phase5_term2_gen_sum = array_sum($phase5_term2_gen_numbers);
    
        $phase5_term2_general_average = $phase5_term2_gen_sum / $phase5_term2_gen_count;
 
    }
 
    else {
        $phase5_term2_general_average = 0;
    }
 
   
    
     // $phase5_term3_general_average = round(($term3_phase5_mother_tongue + $term3_phase5_filipino + $term3_phase5_english + $term3_phase5_mathematics + $term3_phase5_science + $term3_phase5_araling_panlipunan + $term3_phase5_epp_tle + $term3_phase5_average_of_mapeh + $term3_phase5_esp) / 9);
    
     $phase5_term3_gen_numbers = array($term3_phase5_mother_tongue, $term3_phase5_filipino, $term3_phase5_english, $term3_phase5_mathematics, $term3_phase5_science, $term3_phase5_araling_panlipunan, $term3_phase5_epp_tle, $term3_phase5_average_of_mapeh, $term3_phase5_esp);
     $phase5_term3_gen_count = count(array_filter($phase5_term3_gen_numbers));
     
 
        if($phase5_term3_gen_count != 0){
            $phase5_term3_gen_sum = array_sum($phase5_term3_gen_numbers);
     
            $phase5_term3_general_average = $phase5_term3_gen_sum / $phase5_term3_gen_count;
 
        }
 
        else{
            $phase5_term3_general_average = 0;
 
        }
 
 
     
    
    
    
     // $phase5_term4_general_average = round(($term4_phase5_mother_tongue + $term4_phase5_filipino + $term4_phase5_english + $term4_phase5_mathematics + $term4_phase5_science + $term4_phase5_araling_panlipunan + $term4_phase5_epp_tle + $term4_phase5_average_of_mapeh + $term4_phase5_esp) / 9);
    
     $phase5_term4_gen_numbers = array($term4_phase5_mother_tongue, $term4_phase5_filipino, $term4_phase5_english, $term4_phase5_mathematics, $term4_phase5_science, $term4_phase5_araling_panlipunan, $term4_phase5_epp_tle, $term4_phase5_average_of_mapeh, $term4_phase5_esp);
     $phase5_term4_gen_count = count(array_filter($phase5_term4_gen_numbers));
    
        if($phase5_term4_gen_count != 0){
            $phase5_term4_gen_sum = array_sum($phase5_term4_gen_numbers);
     
            $phase5_term4_general_average = $phase5_term4_gen_sum / $phase5_term4_gen_count;
 
        }
 
        else{
            $phase5_term4_general_average = 0;
 
        }
 
    
    
    
    
    
     // $phase5_term5_general_average = round(($phase5_final_rating_mother_tongue  + $phase5_final_rating_filipino + $phase5_final_rating_english + $phase5_final_rating_math + $phase5_final_rating_science + $phase5_final_rating_AP + $phase5_final_rating_epp_tle + $phase5_final_rating_mapeh + $phase5_final_rating_esp) / 9);
 
 
     $phase5_term5_gen_numbers = array($phase5_final_rating_mother_tongue, $phase5_final_rating_filipino, $phase5_final_rating_english, $phase5_final_rating_math, $phase5_final_rating_science, $phase5_final_rating_AP, $phase5_final_rating_epp_tle, $phase5_final_rating_mapeh, $phase5_final_rating_esp);
     $phase5_term5_gen_count = count(array_filter($phase5_term5_gen_numbers));
 
     if($phase5_term5_gen_count != 0){
        
        $phase5_term5_gen_sum = array_sum($phase5_term5_gen_numbers);
        
        $phase5_term5_general_average = $phase5_term5_gen_sum / $phase5_term5_gen_count;
   }
 
     else{
        $phase5_term5_general_average = 0;
 
     }
    

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
    $phase6_term1_average_mapeh_count = count(array_filter($phase6_term1_average_mapeh_numbers));
        if( $phase6_term1_average_mapeh_count != 0 ){

            $phase6_term1_average_mapeh_sum = array_sum($phase6_term1_average_mapeh_numbers);
           
            $term1_phase6_average_of_mapeh = $phase6_term1_average_mapeh_sum / $phase6_term1_average_mapeh_count;
        }

        else{
            $term1_phase6_average_of_mapeh = 0;
        }
  

    // $term2_phase6_average_of_mapeh = round(($term2_phase6_music + $term2_phase6_arts + $term2_phase6_pe + $term2_phase6_health) / 4) ;

    $phase6_term2_average_mapeh_numbers = array($term2_phase6_music, $term2_phase6_arts, $term2_phase6_pe, $term2_phase6_health);
    $phase6_term2_average_mapeh_count = count(array_filter($phase6_term2_average_mapeh_numbers));

    if($phase6_term2_average_mapeh_count !=0){

        $phase6_term2_average_mapeh_sum = array_sum($phase6_term2_average_mapeh_numbers);
        
        $term2_phase6_average_of_mapeh = $phase6_term2_average_mapeh_sum / $phase6_term2_average_mapeh_count;
    }

    else{
        $term2_phase6_average_of_mapeh = 0;
    }

    // $term3_phase6_average_of_mapeh = round(($term3_phase6_music + $term3_phase6_arts + $term3_phase6_pe + $term3_phase6_health) / 4) ;

    $phase6_term3_average_mapeh_numbers = array($term3_phase6_music, $term3_phase6_arts, $term3_phase6_pe, $term3_phase6_health);
    $phase6_term3_average_mapeh_count = count(array_filter($phase6_term3_average_mapeh_numbers));
    
    if($phase6_term3_average_mapeh_count !=0){

        $phase6_term3_average_mapeh_sum = array_sum($phase6_term3_average_mapeh_numbers);
        $term3_phase6_average_of_mapeh = $phase6_term3_average_mapeh_sum / $phase6_term3_average_mapeh_count;
    }
    
    else{
        
        $term3_phase6_average_of_mapeh = 0;

    }



    // $term4_phase6_average_of_mapeh = round(($term4_phase6_music + $term4_phase6_arts + $term4_phase6_pe + $term4_phase6_health) / 4) ;


    
    $phase6_term4_average_mapeh_numbers = array($term4_phase6_music, $term4_phase6_arts, $term4_phase6_pe, $term4_phase6_health);
    $phase6_term4_average_mapeh_count = count(array_filter($phase6_term4_average_mapeh_numbers));
    
    if($phase6_term4_average_mapeh_count !=0 ){
        $phase6_term4_average_mapeh_sum = array_sum($phase6_term4_average_mapeh_numbers);
        
        $term4_phase6_average_of_mapeh = $phase6_term4_average_mapeh_sum / $phase6_term4_average_mapeh_count;
    }

    else{
        $term4_phase6_average_of_mapeh = 0;
    }
   

    //final rating
    $phase6_term5 ='Final Rating';
  

    // $phase6_final_rating_mother_tongue = round(($term1_phase6_mother_tongue + $term2_phase6_mother_tongue + 
    // $term3_phase6_mother_tongue + $term4_phase6_mother_tongue) / 4);

        $phase6_mt_numbers = array($term1_phase6_mother_tongue, $term2_phase6_mother_tongue, $term3_phase6_mother_tongue,$term4_phase6_mother_tongue);
        $phase6_mt_count = count(array_filter($phase6_mt_numbers));
        if($phase6_mt_count != 0){

            $phase6_mt_sum = array_sum($phase6_mt_numbers);
        
            $phase6_final_rating_mother_tongue = $phase6_mt_sum / $phase6_mt_count;
        }
       else{
        $phase6_final_rating_mother_tongue = 0;
       }


    // $phase6_final_rating_filipino = round(($term1_phase6_filipino + $term2_phase6_filipino + $term3_phase6_filipino + $term4_phase6_filipino) / 4);

    $phase6_filipino_numbers = array($term1_phase6_filipino, $term2_phase6_filipino, $term3_phase6_filipino, $term4_phase6_filipino);
    $phase6_filipino_count = count(array_filter($phase6_filipino_numbers));

    if($phase6_filipino_count != 0){

        $phase6_filipino_sum = array_sum($phase6_filipino_numbers);

        $phase6_final_rating_filipino = $phase6_filipino_sum / $phase6_filipino_count;

    }

    else{

        $phase6_final_rating_filipino = 0;

    }

   

    // $phase6_final_rating_english = round(($term1_phase6_english + $term2_phase6_english + $term3_phase6_english + $term4_phase6_english) / 4);

    
    $phase6_english_numbers = array($term1_phase6_english, $term2_phase6_english, $term3_phase6_english, $term4_phase6_english);
    $phase6_english_count = count(array_filter($phase6_english_numbers));
    if($phase6_english_count != 0 ){
        $phase6_english_sum = array_sum($phase6_english_numbers);

        $phase6_final_rating_english = $phase6_english_sum / $phase6_english_count;
    }
    
    else{

        $phase6_final_rating_english = 0;
    }


    // $phase6_final_rating_math = round(($term1_phase6_mathematics + $term2_phase6_mathematics + $term3_phase6_mathematics + $term4_phase6_mathematics ) / 4);

    $phase6_math_numbers = array($term1_phase6_mathematics, $term2_phase6_mathematics,  $term3_phase6_mathematics, $term4_phase6_mathematics);
    $phase6_math_count = count(array_filter($phase6_math_numbers));
    
    if($phase6_math_count != 0){
        $phase6_math_sum = array_sum($phase6_math_numbers);
    
        $phase6_final_rating_math = $phase6_math_sum / $phase6_math_count;

    }

    else{
        $phase6_final_rating_math = 0;

    }

   

    // $phase6_final_rating_science = round(($term1_phase6_science + $term2_phase6_science + $term3_phase6_science + $term4_phase6_science) / 4);

    $phase6_science_numbers = array($term1_phase6_science, $term2_phase6_science, $term3_phase6_science, $term4_phase6_science);
    $phase6_science_count = count(array_filter($phase6_science_numbers));
    
    if($phase6_science_count != 0){

        $phase6_science_sum = array_sum($phase6_science_numbers);

    $phase6_final_rating_science = $phase6_science_sum / $phase6_science_count;
    }

    else{

        $phase6_final_rating_science = 0;
    }

    

    // $phase6_final_rating_AP = round(($term1_phase6_araling_panlipunan + $term2_phase6_araling_panlipunan + $term3_phase6_araling_panlipunan + $term4_phase6_araling_panlipunan) / 4);

    $phase6_ap_numbers = array($term1_phase6_araling_panlipunan, $term2_phase6_araling_panlipunan, $term3_phase6_araling_panlipunan, $term4_phase6_araling_panlipunan);
    $phase6_ap_count = count(array_filter($phase6_ap_numbers));

    if($phase6_ap_count != 0){
        $phase6_ap_sum = array_sum($phase6_ap_numbers);

        $phase6_final_rating_AP = $phase6_ap_sum / $phase6_ap_count;

    }

    else{
        $phase6_final_rating_AP = 0;
        
    }

    // $phase6_final_rating_epp_tle = round(($term1_phase6_epp_tle + $term2_phase6_epp_tle + $term3_phase6_epp_tle + $term4_phase6_epp_tle) / 4);

    $phase6_epp_tle_numbers = array($term1_phase6_epp_tle, $term2_phase6_epp_tle, $term3_phase6_epp_tle, $term4_phase6_epp_tle);
    $phase6_epp_tle_count = count(array_filter($phase6_epp_tle_numbers));

    if($phase6_epp_tle_count != 0){

        $phase6_epp_tle_sum = array_sum($phase6_epp_tle_numbers);
    
    $phase6_final_rating_epp_tle = $phase6_epp_tle_sum / $phase6_epp_tle_count;
    }

    else{
        $phase6_final_rating_epp_tle = 0;
    }
    
    
    

    // $phase6_final_rating_mapeh = round(($term1_phase6_average_of_mapeh + $term2_phase6_average_of_mapeh + $term3_phase6_average_of_mapeh + $term4_phase6_average_of_mapeh) / 4 );

    $phase6_mapeh_numbers = array($term1_phase6_average_of_mapeh, $term2_phase6_average_of_mapeh, $term3_phase6_average_of_mapeh, $term4_phase6_average_of_mapeh);
    $phase6_mapeh_count = count(array_filter($phase6_mapeh_numbers));
    
    if($phase6_mapeh_count != 0){

        $phase6_mapeh_sum = array_sum($phase6_mapeh_numbers);
    
        $phase6_final_rating_mapeh = $phase6_mapeh_sum / $phase6_mapeh_count;

    }

    else{
        
        $phase6_final_rating_mapeh = 0;

    }
   

    // $phase6_final_rating_music = round(($term1_phase6_music + $term2_phase6_music + $term3_phase6_music + $term4_phase6_music) / 4);

    $phase6_music_numbers = array($term1_phase6_music, $term2_phase6_music, $term3_phase6_music, $term4_phase6_music);
    $phase6_music_count = count(array_filter($phase6_music_numbers));
    
    if($phase6_music_count != 0){
        $phase6_music_sum = array_sum($phase6_music_numbers);
    
        $phase6_final_rating_music =  $phase6_music_sum / $phase6_music_count;

    }

    else {
        $phase6_final_rating_music = 0;
    }
   
    

    // $phase6_final_rating_arts = round(($term1_phase6_arts + $term2_phase6_arts + $term3_phase6_arts + $term4_phase6_arts ) / 4);

    
    $phase6_arts_numbers = array($term1_phase6_arts, $term2_phase6_arts, $term3_phase6_arts, $term4_phase6_arts);
    $phase6_arts_count = count(array_filter($phase6_arts_numbers)); 
    
    if ($phase6_arts_count != 0) {
        
        $phase6_arts_sum = array_sum($phase6_arts_numbers);
    
        $phase6_final_rating_arts =  $phase6_arts_sum / $phase6_arts_count;

    }

    else{
        $phase6_final_rating_arts = 0;
    }
    
    // $phase6_final_rating_PE = round(($term1_phase6_pe + $term2_phase6_pe + $term3_phase6_pe + $term4_phase6_pe) / 4);

    $phase6_pe_numbers = array($term1_phase6_pe, $term2_phase6_pe, $term3_phase6_pe, $term4_phase6_pe);
    $phase6_pe_count = count(array_filter($phase6_pe_numbers));
    
    if($phase6_pe_count != 0){
        $phase6_pe_sum = array_sum($phase6_pe_numbers);
    
        $phase6_final_rating_PE = $phase6_pe_sum / $phase6_pe_count;
    }

    else{
        $phase6_final_rating_PE = 0;
    }
    

    



    // $phase6_final_rating_health = round(($term1_phase6_health + $term2_phase6_health + $term3_phase6_health + $term4_phase6_health)/ 4);

    $phase6_health_numbers = array($term1_phase6_health, $term2_phase6_health, $term3_phase6_health, $term4_phase6_health);
    $phase6_health_count = count(array_filter($phase6_health_numbers));
    
    if($phase6_health_count != 0){
        $phase6_health_sum = array_sum($phase6_health_numbers);
    
        $phase6_final_rating_health = $phase6_health_sum / $phase6_health_count;
    }

    else {
        $phase6_final_rating_health = 0;
    }

    

     // $phase6_final_rating_esp = round(($term1_phase6_esp + $term2_phase6_esp + $term3_phase6_esp + $term4_phase6_esp) / 4);
    
     $phase6_esp_numbers = array($term1_phase6_esp, $term2_phase6_esp, $term3_phase6_esp, $term4_phase6_esp);
     $phase6_esp_count = count (array_filter($phase6_esp_numbers));
     
     if($phase6_esp_count != 0){

        $phase6_esp_sum = array_sum($phase6_esp_numbers);
     
        $phase6_final_rating_esp = $phase6_esp_sum / $phase6_esp_count;
     }
     else{
        $phase6_final_rating_esp = 0;
     }
     



     // $phase6_final_rating_arabic_language = round(($term1_phase6_arabic_language + $term2_phase6_arabic_language + $term3_phase6_arabic_language + $term4_phase6_arabic_language) / 4);

    
     $phase6_arabic_numbers = array($term1_phase6_arabic_language, $term2_phase6_arabic_language, $term3_phase6_arabic_language, $term4_phase6_arabic_language);
     $phase6_arabic_count = count(array_filter($phase6_arabic_numbers));
    
     if($phase6_arabic_count != 0){
        $phase6_arabic_sum = array_sum($phase6_arabic_numbers);
     
        $phase6_final_rating_arabic_language = $phase6_arabic_sum / $phase6_arabic_count;
     }

     else{

        $phase6_final_rating_arabic_language = 0;

     }

    

    // $phase6_final_rating_islamic_values = round(($term1_phase6_islamic_values + $term2_phase6_islamic_values + $term3_phase6_islamic_values + $term4_phase6_islamic_values) / 4);

    $phase6_islamic_numbers = array($term1_phase6_islamic_values, $term2_phase6_islamic_values, $term3_phase6_islamic_values, $term4_phase6_islamic_values);
    $phase6_islamic_count = count(array_filter($phase6_islamic_numbers));
    
    if($phase6_islamic_count !=0){
        $phase6_islamic_sum = array_sum($phase6_islamic_numbers);
    
        $phase6_final_rating_islamic_values = $phase6_islamic_sum / $phase6_islamic_count;
    }

    else{
        $phase6_final_rating_islamic_values = 0;
    }

    // validation for phase 6 

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
    
    $phase6_term1_gen_numbers = array($term1_phase6_mother_tongue, $term1_phase6_filipino, $term1_phase6_english, $term1_phase6_mathematics, $term1_phase6_science, $term1_phase6_araling_panlipunan, $term1_phase6_epp_tle, $term1_phase6_average_of_mapeh, $term1_phase6_esp);
    $phase6_term1_gen_count = count(array_filter($phase6_term1_gen_numbers));

    if($phase6_term1_gen_count != 0){
        
        $phase6_term1_gen_sum = array_sum($phase6_term1_gen_numbers);
    
        $phase6_term1_general_average = $phase6_term1_gen_sum / $phase6_term1_gen_count;
        
    }
    
    else{
        $phase6_term1_general_average = 0;
    }
    
    // $phase6_term2_general_average = round(($term2_phase6_mother_tongue + $term2_phase6_filipino + $term2_phase6_english + $term2_phase6_mathematics + $term2_phase6_science + $term2_phase6_araling_panlipunan + $term2_phase6_epp_tle + $term2_phase6_average_of_mapeh + $term2_phase6_esp) / 9);
    $phase6_term2_gen_numbers = array($term2_phase6_mother_tongue, $term2_phase6_filipino, $term2_phase6_english, $term2_phase6_mathematics, $term2_phase6_science, $term2_phase6_araling_panlipunan, $term2_phase6_epp_tle, $term2_phase6_average_of_mapeh, $term2_phase6_esp);
    $phase6_term2_gen_count = count(array_filter($phase6_term2_gen_numbers));
    
    if ($phase6_term2_gen_count != 0){
        
        $phase6_term2_gen_sum = array_sum($phase6_term2_gen_numbers);
    
        $phase6_term2_general_average = $phase6_term2_gen_sum / $phase6_term2_gen_count;

    }

    else {
        $phase6_term2_general_average = 0;
    }

   
    
     // $phase6_term3_general_average = round(($term3_phase6_mother_tongue + $term3_phase6_filipino + $term3_phase6_english + $term3_phase6_mathematics + $term3_phase6_science + $term3_phase6_araling_panlipunan + $term3_phase6_epp_tle + $term3_phase6_average_of_mapeh + $term3_phase6_esp) / 9);
    
     $phase6_term3_gen_numbers = array($term3_phase6_mother_tongue, $term3_phase6_filipino, $term3_phase6_english, $term3_phase6_mathematics, $term3_phase6_science, $term3_phase6_araling_panlipunan, $term3_phase6_epp_tle, $term3_phase6_average_of_mapeh, $term3_phase6_esp);
     $phase6_term3_gen_count = count(array_filter($phase6_term3_gen_numbers));
     

        if($phase6_term3_gen_count != 0){
            $phase6_term3_gen_sum = array_sum($phase6_term3_gen_numbers);
     
            $phase6_term3_general_average = $phase6_term3_gen_sum / $phase6_term3_gen_count;

        }

        else{
            $phase6_term3_general_average = 0;

        }


     
    
    
    
     // $phase6_term4_general_average = round(($term4_phase6_mother_tongue + $term4_phase6_filipino + $term4_phase6_english + $term4_phase6_mathematics + $term4_phase6_science + $term4_phase6_araling_panlipunan + $term4_phase6_epp_tle + $term4_phase6_average_of_mapeh + $term4_phase6_esp) / 9);
    
     $phase6_term4_gen_numbers = array($term4_phase6_mother_tongue, $term4_phase6_filipino, $term4_phase6_english, $term4_phase6_mathematics, $term4_phase6_science, $term4_phase6_araling_panlipunan, $term4_phase6_epp_tle, $term4_phase6_average_of_mapeh, $term4_phase6_esp);
     $phase6_term4_gen_count = count(array_filter($phase6_term4_gen_numbers));
    
        if($phase6_term4_gen_count != 0){
            $phase6_term4_gen_sum = array_sum($phase6_term4_gen_numbers);
     
            $phase6_term4_general_average = $phase6_term4_gen_sum / $phase6_term4_gen_count;

        }

        else{
            $phase6_term4_general_average = 0;

        }

    
    
    
    
    
     // $phase6_term5_general_average = round(($phase6_final_rating_mother_tongue  + $phase6_final_rating_filipino + $phase6_final_rating_english + $phase6_final_rating_math + $phase6_final_rating_science + $phase6_final_rating_AP + $phase6_final_rating_epp_tle + $phase6_final_rating_mapeh + $phase6_final_rating_esp) / 9);


     $phase6_term5_gen_numbers = array($phase6_final_rating_mother_tongue, $phase6_final_rating_filipino, $phase6_final_rating_english, $phase6_final_rating_math, $phase6_final_rating_science, $phase6_final_rating_AP, $phase6_final_rating_epp_tle, $phase6_final_rating_mapeh, $phase6_final_rating_esp);
     $phase6_term5_gen_count = count(array_filter($phase6_term5_gen_numbers));

     if($phase6_term5_gen_count != 0){
        
        $phase6_term5_gen_sum = array_sum($phase6_term5_gen_numbers);
        
        $phase6_term5_general_average = $phase6_term5_gen_sum / $phase6_term5_gen_count;
   }

     else{
        $phase6_term5_general_average = 0;

     }



    //Phase 7
    $phase7 = '7';
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
    $term1_phase7_mother_tongue = intval($_POST['term1_phase7_mother_tongue']);
    $term1_phase7_filipino = intval($_POST['term1_phase7_filipino']);
    $term1_phase7_english = intval($_POST['term1_phase7_english']);
    $term1_phase7_mathematics = intval($_POST['term1_phase7_mathematics']);
    $term1_phase7_science = intval($_POST['term1_phase7_science']);
    $term1_phase7_araling_panlipunan = intval($_POST['term1_phase7_araling_panlipunan']);
    $term1_phase7_epp_tle = intval($_POST['term1_phase7_epp_tle']);
    $term1_phase7_music = intval($_POST['term1_phase7_music']);
    $term1_phase7_arts = intval($_POST['term1_phase7_arts']);
    $term1_phase7_pe = intval($_POST['term1_phase7_pe']);
    $term1_phase7_health = intval($_POST['term1_phase7_health']);
    $term1_phase7_esp = intval($_POST['term1_phase7_esp']);
    $term1_phase7_arabic_language = intval($_POST['term1_phase7_arabic_language']);
    $term1_phase7_islamic_values = intval($_POST['term1_phase7_islamic_values']);
    $term1_phase7_remarks = 'none'; 

    //term2_phase7 grades
    //term2_phase7
    $term2_phase7 = 2;
    $term2_phase7_mother_tongue = intval($_POST['term2_phase7_mother_tongue']);
    $term2_phase7_filipino = intval($_POST['term2_phase7_filipino']);
    $term2_phase7_english = intval($_POST['term2_phase7_english']);
    $term2_phase7_mathematics = intval($_POST['term2_phase7_mathematics']);
    $term2_phase7_science = intval($_POST['term2_phase7_science']);
    $term2_phase7_araling_panlipunan = intval($_POST['term2_phase7_araling_panlipunan']);
    $term2_phase7_epp_tle = intval($_POST['term2_phase7_epp_tle']);
    $term2_phase7_music = intval($_POST['term2_phase7_music']);
    $term2_phase7_arts = intval($_POST['term2_phase7_arts']);
    $term2_phase7_pe = intval($_POST['term2_phase7_pe']);
    $term2_phase7_health = intval($_POST['term2_phase7_health']);
    $term2_phase7_esp = intval($_POST['term2_phase7_esp']);
    $term2_phase7_arabic_language = intval($_POST['term2_phase7_arabic_language']);
    $term2_phase7_islamic_values = intval($_POST['term2_phase7_islamic_values']);
    $term2_phase7_remarks = 'none'; 

    //term3_phase7
    //term3_phase7 grades

    $term3_phase7 = 3;
    $term3_phase7_mother_tongue = intval($_POST['term3_phase7_mother_tongue']);
    $term3_phase7_filipino = intval($_POST['term3_phase7_filipino']);
    $term3_phase7_english = intval($_POST['term3_phase7_english']);
    $term3_phase7_mathematics = intval($_POST['term3_phase7_mathematics']);
    $term3_phase7_science = intval($_POST['term3_phase7_science']);
    $term3_phase7_araling_panlipunan = intval($_POST['term3_phase7_araling_panlipunan']);
    $term3_phase7_epp_tle = intval($_POST['term3_phase7_epp_tle']);
    $term3_phase7_music = intval($_POST['term3_phase7_music']);
    $term3_phase7_arts = intval($_POST['term3_phase7_arts']);
    $term3_phase7_pe = intval($_POST['term3_phase7_pe']);
    $term3_phase7_health = intval($_POST['term3_phase7_health']);
    $term3_phase7_esp = intval($_POST['term3_phase7_esp']);
    $term3_phase7_arabic_language = intval($_POST['term3_phase7_arabic_language']);
    $term3_phase7_islamic_values = intval($_POST['term3_phase7_islamic_values']);
    $term3_phase7_remarks = 'none'; 

    //term4_phase7
    //term4_phase7 grades

    $term4_phase7 = 4;
    $term4_phase7_mother_tongue = intval($_POST['term4_phase7_mother_tongue']);
    $term4_phase7_filipino = intval($_POST['term4_phase7_filipino']);
    $term4_phase7_english = intval($_POST['term4_phase7_english']);
    $term4_phase7_mathematics = intval($_POST['term4_phase7_mathematics']);
    $term4_phase7_science = intval($_POST['term4_phase7_science']);
    $term4_phase7_araling_panlipunan = intval($_POST['term4_phase7_araling_panlipunan']);
    $term4_phase7_epp_tle = intval($_POST['term4_phase7_epp_tle']);
    $term4_phase7_music = intval($_POST['term4_phase7_music']);
    $term4_phase7_arts = intval($_POST['term4_phase7_arts']);
    $term4_phase7_pe = intval($_POST['term2_phase7_pe']);
    $term4_phase7_health = intval($_POST['term4_phase7_health']);
    $term4_phase7_esp = intval($_POST['term4_phase7_esp']);
    $term4_phase7_arabic_language = intval($_POST['term4_phase7_arabic_language']);
    $term4_phase7_islamic_values = intval($_POST['term4_phase7_islamic_values']);
    $term4_phase7_remarks = 'none';


    //phase 7 remedial


    $phase7_remedial_from = date("Y-m-d",strtotime($_POST['phase7_remedial_from']));
    $phase7_remedial_to = date("Y-m-d" ,strtotime($_POST['phase7_remedial_to']));
    $phase7_remedial_learning_areas_1 = $_POST['phase7_remedial_learning_areas_1'] ;
    $phase7_remedial_final_rating_1 =$_POST['phase7_remedial_final_rating_1'];
    $phase7_remedial_class_mark_1 = $_POST['phase7_remedial_class_mark_1'];
    $phase7_recomputed_final_grade_1 = $_POST['phase7_recomputed_final_grade_1'];
    $phase7_remedial_remarks_1 = $_POST['phase7_remedial_remarks_1'];

    $phase7_remedial_learning_areas_2 = $_POST['phase7_remedial_learning_areas_2'] ;
    $phase7_remedial_final_rating_2 =$_POST['phase7_remedial_final_rating_2'];
    $phase7_remedial_class_mark_2 = $_POST['phase7_remedial_class_mark_2'];
    $phase7_recomputed_final_grade_2 = $_POST['phase7_recomputed_final_grade_2'];
    $phase7_remedial_remarks_2 = $_POST['phase7_remedial_remarks_2'];

    //phase 7 average of mapeh


    $phase7_term1_average_mapeh_numbers = array($term1_phase7_music, $term1_phase7_arts, $term1_phase7_pe, $term1_phase7_health);
    $phase7_term1_average_mapeh_count = count(array_filter($phase7_term1_average_mapeh_numbers));
        if( $phase7_term1_average_mapeh_count != 0 ){

            $phase7_term1_average_mapeh_sum = array_sum($phase7_term1_average_mapeh_numbers);
           
            $term1_phase7_average_of_mapeh = $phase7_term1_average_mapeh_sum / $phase7_term1_average_mapeh_count;
        }

        else{
            $term1_phase7_average_of_mapeh = 0;
        }
  

    // $term2_phase7_average_of_mapeh = round(($term2_phase7_music + $term2_phase7_arts + $term2_phase7_pe + $term2_phase7_health) / 4) ;

    $phase7_term2_average_mapeh_numbers = array($term2_phase7_music, $term2_phase7_arts, $term2_phase7_pe, $term2_phase7_health);
    $phase7_term2_average_mapeh_count = count(array_filter($phase7_term2_average_mapeh_numbers));

    if($phase7_term2_average_mapeh_count !=0){

        $phase7_term2_average_mapeh_sum = array_sum($phase7_term2_average_mapeh_numbers);
        
        $term2_phase7_average_of_mapeh = $phase7_term2_average_mapeh_sum / $phase7_term2_average_mapeh_count;
    }

    else{
        $term2_phase7_average_of_mapeh = 0;
    }

    // $term3_phase7_average_of_mapeh = round(($term3_phase7_music + $term3_phase7_arts + $term3_phase7_pe + $term3_phase7_health) / 4) ;

    $phase7_term3_average_mapeh_numbers = array($term3_phase7_music, $term3_phase7_arts, $term3_phase7_pe, $term3_phase7_health);
    $phase7_term3_average_mapeh_count = count(array_filter($phase7_term3_average_mapeh_numbers));
    
    if($phase7_term3_average_mapeh_count !=0){

        $phase7_term3_average_mapeh_sum = array_sum($phase7_term3_average_mapeh_numbers);
        $term3_phase7_average_of_mapeh = $phase7_term3_average_mapeh_sum / $phase7_term3_average_mapeh_count;
    }
    
    else{
        
        $term3_phase7_average_of_mapeh = 0;

    }



    // $term4_phase7_average_of_mapeh = round(($term4_phase7_music + $term4_phase7_arts + $term4_phase7_pe + $term4_phase7_health) / 4) ;


    
    $phase7_term4_average_mapeh_numbers = array($term4_phase7_music, $term4_phase7_arts, $term4_phase7_pe, $term4_phase7_health);
    $phase7_term4_average_mapeh_count = count(array_filter($phase7_term4_average_mapeh_numbers));
    
    if($phase7_term4_average_mapeh_count !=0 ){
        $phase7_term4_average_mapeh_sum = array_sum($phase7_term4_average_mapeh_numbers);
        
        $term4_phase7_average_of_mapeh = $phase7_term4_average_mapeh_sum / $phase7_term4_average_mapeh_count;
    }

    else{
        $term4_phase7_average_of_mapeh = 0;
    }
   

    //final rating
    $phase7_term5 ='Final Rating';
  

    // $phase7_final_rating_mother_tongue = round(($term1_phase7_mother_tongue + $term2_phase7_mother_tongue + 
    // $term3_phase7_mother_tongue + $term4_phase7_mother_tongue) / 4);

        $phase7_mt_numbers = array($term1_phase7_mother_tongue, $term2_phase7_mother_tongue, $term3_phase7_mother_tongue,$term4_phase7_mother_tongue);
        $phase7_mt_count = count(array_filter($phase7_mt_numbers));
        if($phase7_mt_count != 0){

            $phase7_mt_sum = array_sum($phase7_mt_numbers);
        
            $phase7_final_rating_mother_tongue = $phase7_mt_sum / $phase7_mt_count;
        }
       else{
        $phase7_final_rating_mother_tongue = 0;
       }


    // $phase7_final_rating_filipino = round(($term1_phase7_filipino + $term2_phase7_filipino + $term3_phase7_filipino + $term4_phase7_filipino) / 4);

    $phase7_filipino_numbers = array($term1_phase7_filipino, $term2_phase7_filipino, $term3_phase7_filipino, $term4_phase7_filipino);
    $phase7_filipino_count = count(array_filter($phase7_filipino_numbers));

    if($phase7_filipino_count != 0){

        $phase7_filipino_sum = array_sum($phase7_filipino_numbers);

        $phase7_final_rating_filipino = $phase7_filipino_sum / $phase7_filipino_count;

    }

    else{

        $phase7_final_rating_filipino = 0;

    }

   

    // $phase7_final_rating_english = round(($term1_phase7_english + $term2_phase7_english + $term3_phase7_english + $term4_phase7_english) / 4);

    
    $phase7_english_numbers = array($term1_phase7_english, $term2_phase7_english, $term3_phase7_english, $term4_phase7_english);
    $phase7_english_count = count(array_filter($phase7_english_numbers));
    if($phase7_english_count != 0 ){
        $phase7_english_sum = array_sum($phase7_english_numbers);

        $phase7_final_rating_english = $phase7_english_sum / $phase7_english_count;
    }
    
    else{

        $phase7_final_rating_english = 0;
    }


    // $phase7_final_rating_math = round(($term1_phase7_mathematics + $term2_phase7_mathematics + $term3_phase7_mathematics + $term4_phase7_mathematics ) / 4);

    $phase7_math_numbers = array($term1_phase7_mathematics, $term2_phase7_mathematics,  $term3_phase7_mathematics, $term4_phase7_mathematics);
    $phase7_math_count = count(array_filter($phase7_math_numbers));
    
    if($phase7_math_count != 0){
        $phase7_math_sum = array_sum($phase7_math_numbers);
    
        $phase7_final_rating_math = $phase7_math_sum / $phase7_math_count;

    }

    else{
        $phase7_final_rating_math = 0;

    }

   

    // $phase7_final_rating_science = round(($term1_phase7_science + $term2_phase7_science + $term3_phase7_science + $term4_phase7_science) / 4);

    $phase7_science_numbers = array($term1_phase7_science, $term2_phase7_science, $term3_phase7_science, $term4_phase7_science);
    $phase7_science_count = count(array_filter($phase7_science_numbers));
    
    if($phase7_science_count != 0){

        $phase7_science_sum = array_sum($phase7_science_numbers);

    $phase7_final_rating_science = $phase7_science_sum / $phase7_science_count;
    }

    else{

        $phase7_final_rating_science = 0;
    }

    

    // $phase7_final_rating_AP = round(($term1_phase7_araling_panlipunan + $term2_phase7_araling_panlipunan + $term3_phase7_araling_panlipunan + $term4_phase7_araling_panlipunan) / 4);

    $phase7_ap_numbers = array($term1_phase7_araling_panlipunan, $term2_phase7_araling_panlipunan, $term3_phase7_araling_panlipunan, $term4_phase7_araling_panlipunan);
    $phase7_ap_count = count(array_filter($phase7_ap_numbers));

    if($phase7_ap_count != 0){
        $phase7_ap_sum = array_sum($phase7_ap_numbers);

        $phase7_final_rating_AP = $phase7_ap_sum / $phase7_ap_count;

    }

    else{
        $phase7_final_rating_AP = 0;
        
    }

    // $phase7_final_rating_epp_tle = round(($term1_phase7_epp_tle + $term2_phase7_epp_tle + $term3_phase7_epp_tle + $term4_phase7_epp_tle) / 4);

    $phase7_epp_tle_numbers = array($term1_phase7_epp_tle, $term2_phase7_epp_tle, $term3_phase7_epp_tle, $term4_phase7_epp_tle);
    $phase7_epp_tle_count = count(array_filter($phase7_epp_tle_numbers));

    if($phase7_epp_tle_count != 0){

        $phase7_epp_tle_sum = array_sum($phase7_epp_tle_numbers);
    
    $phase7_final_rating_epp_tle = $phase7_epp_tle_sum / $phase7_epp_tle_count;
    }

    else{
        $phase7_final_rating_epp_tle = 0;
    }
    
    
    

    // $phase7_final_rating_mapeh = round(($term1_phase7_average_of_mapeh + $term2_phase7_average_of_mapeh + $term3_phase7_average_of_mapeh + $term4_phase7_average_of_mapeh) / 4 );

    $phase7_mapeh_numbers = array($term1_phase7_average_of_mapeh, $term2_phase7_average_of_mapeh, $term3_phase7_average_of_mapeh, $term4_phase7_average_of_mapeh);
    $phase7_mapeh_count = count(array_filter($phase7_mapeh_numbers));
    
    if($phase7_mapeh_count != 0){

        $phase7_mapeh_sum = array_sum($phase7_mapeh_numbers);
    
        $phase7_final_rating_mapeh = $phase7_mapeh_sum / $phase7_mapeh_count;

    }

    else{
        
        $phase7_final_rating_mapeh = 0;

    }
   

    // $phase7_final_rating_music = round(($term1_phase7_music + $term2_phase7_music + $term3_phase7_music + $term4_phase7_music) / 4);

    $phase7_music_numbers = array($term1_phase7_music, $term2_phase7_music, $term3_phase7_music, $term4_phase7_music);
    $phase7_music_count = count(array_filter($phase7_music_numbers));
    
    if($phase7_music_count != 0){
        $phase7_music_sum = array_sum($phase7_music_numbers);
    
        $phase7_final_rating_music =  $phase7_music_sum / $phase7_music_count;

    }

    else {
        $phase7_final_rating_music = 0;
    }
   
    

    // $phase7_final_rating_arts = round(($term1_phase7_arts + $term2_phase7_arts + $term3_phase7_arts + $term4_phase7_arts ) / 4);

    
    $phase7_arts_numbers = array($term1_phase7_arts, $term2_phase7_arts, $term3_phase7_arts, $term4_phase7_arts);
    $phase7_arts_count = count(array_filter($phase7_arts_numbers)); 
    
    if ($phase7_arts_count != 0) {
        
        $phase7_arts_sum = array_sum($phase7_arts_numbers);
    
        $phase7_final_rating_arts =  $phase7_arts_sum / $phase7_arts_count;

    }

    else{
        $phase7_final_rating_arts = 0;
    }
    
    // $phase7_final_rating_PE = round(($term1_phase7_pe + $term2_phase7_pe + $term3_phase7_pe + $term4_phase7_pe) / 4);

    $phase7_pe_numbers = array($term1_phase7_pe, $term2_phase7_pe, $term3_phase7_pe, $term4_phase7_pe);
    $phase7_pe_count = count(array_filter($phase7_pe_numbers));
    
    if($phase7_pe_count != 0){
        $phase7_pe_sum = array_sum($phase7_pe_numbers);
    
        $phase7_final_rating_PE = $phase7_pe_sum / $phase7_pe_count;
    }

    else{
        $phase7_final_rating_PE = 0;
    }
    

    



    // $phase7_final_rating_health = round(($term1_phase7_health + $term2_phase7_health + $term3_phase7_health + $term4_phase7_health)/ 4);

    $phase7_health_numbers = array($term1_phase7_health, $term2_phase7_health, $term3_phase7_health, $term4_phase7_health);
    $phase7_health_count = count(array_filter($phase7_health_numbers));
    
    if($phase7_health_count != 0){
        $phase7_health_sum = array_sum($phase7_health_numbers);
    
        $phase7_final_rating_health = $phase7_health_sum / $phase7_health_count;
    }

    else {
        $phase7_final_rating_health = 0;
    }

    

     // $phase7_final_rating_esp = round(($term1_phase7_esp + $term2_phase7_esp + $term3_phase7_esp + $term4_phase7_esp) / 4);
    
     $phase7_esp_numbers = array($term1_phase7_esp, $term2_phase7_esp, $term3_phase7_esp, $term4_phase7_esp);
     $phase7_esp_count = count (array_filter($phase7_esp_numbers));
     
     if($phase7_esp_count != 0){

        $phase7_esp_sum = array_sum($phase7_esp_numbers);
     
        $phase7_final_rating_esp = $phase7_esp_sum / $phase7_esp_count;
     }
     else{
        $phase7_final_rating_esp = 0;
     }
     



     // $phase7_final_rating_arabic_language = round(($term1_phase7_arabic_language + $term2_phase7_arabic_language + $term3_phase7_arabic_language + $term4_phase7_arabic_language) / 4);

    
     $phase7_arabic_numbers = array($term1_phase7_arabic_language, $term2_phase7_arabic_language, $term3_phase7_arabic_language, $term4_phase7_arabic_language);
     $phase7_arabic_count = count(array_filter($phase7_arabic_numbers));
    
     if($phase7_arabic_count != 0){
        $phase7_arabic_sum = array_sum($phase7_arabic_numbers);
     
        $phase7_final_rating_arabic_language = $phase7_arabic_sum / $phase7_arabic_count;
     }

     else{

        $phase7_final_rating_arabic_language = 0;

     }

    

    // $phase7_final_rating_islamic_values = round(($term1_phase7_islamic_values + $term2_phase7_islamic_values + $term3_phase7_islamic_values + $term4_phase7_islamic_values) / 4);

    $phase7_islamic_numbers = array($term1_phase7_islamic_values, $term2_phase7_islamic_values, $term3_phase7_islamic_values, $term4_phase7_islamic_values);
    $phase7_islamic_count = count(array_filter($phase7_islamic_numbers));
    
    if($phase7_islamic_count !=0){
        $phase7_islamic_sum = array_sum($phase7_islamic_numbers);
    
        $phase7_final_rating_islamic_values = $phase7_islamic_sum / $phase7_islamic_count;
    }

    else{
        $phase7_final_rating_islamic_values = 0;
    }
    

    
    // phase 7 validation

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


    //phase 7 general average

    // $phase7_term1_general_average = round(($term1_phase7_mother_tongue + $term1_phase7_mathematics + $term1_phase7_araling_panlipunan + $term1_phase7_average_of_mapeh + $term1_phase7_esp ) / 5);

    $phase7_term1_gen_numbers = array($term1_phase7_mother_tongue, $term1_phase7_filipino, $term1_phase7_english, $term1_phase7_mathematics, $term1_phase7_science, $term1_phase7_araling_panlipunan, $term1_phase7_epp_tle, $term1_phase7_average_of_mapeh, $term1_phase7_esp);
    $phase7_term1_gen_count = count(array_filter($phase7_term1_gen_numbers));

    if($phase7_term1_gen_count != 0){
        
        $phase7_term1_gen_sum = array_sum($phase7_term1_gen_numbers);
    
        $phase7_term1_general_average = $phase7_term1_gen_sum / $phase7_term1_gen_count;
        
    }
    
    else{
        $phase7_term1_general_average = 0;
    }
    
    // $phase7_term2_general_average = round(($term2_phase7_mother_tongue + $term2_phase7_filipino + $term2_phase7_english + $term2_phase7_mathematics + $term2_phase7_science + $term2_phase7_araling_panlipunan + $term2_phase7_epp_tle + $term2_phase7_average_of_mapeh + $term2_phase7_esp) / 9);
    $phase7_term2_gen_numbers = array($term2_phase7_mother_tongue, $term2_phase7_filipino, $term2_phase7_english, $term2_phase7_mathematics, $term2_phase7_science, $term2_phase7_araling_panlipunan, $term2_phase7_epp_tle, $term2_phase7_average_of_mapeh, $term2_phase7_esp);
    $phase7_term2_gen_count = count(array_filter($phase7_term2_gen_numbers));
    
    if ($phase7_term2_gen_count != 0){
        
        $phase7_term2_gen_sum = array_sum($phase7_term2_gen_numbers);
    
        $phase7_term2_general_average = $phase7_term2_gen_sum / $phase7_term2_gen_count;

    }

    else {
        $phase7_term2_general_average = 0;
    }

   
    
     // $phase7_term3_general_average = round(($term3_phase7_mother_tongue + $term3_phase7_filipino + $term3_phase7_english + $term3_phase7_mathematics + $term3_phase7_science + $term3_phase7_araling_panlipunan + $term3_phase7_epp_tle + $term3_phase7_average_of_mapeh + $term3_phase7_esp) / 9);
    
     $phase7_term3_gen_numbers = array($term3_phase7_mother_tongue, $term3_phase7_filipino, $term3_phase7_english, $term3_phase7_mathematics, $term3_phase7_science, $term3_phase7_araling_panlipunan, $term3_phase7_epp_tle, $term3_phase7_average_of_mapeh, $term3_phase7_esp);
     $phase7_term3_gen_count = count(array_filter($phase7_term3_gen_numbers));
     

        if($phase7_term3_gen_count != 0){
            $phase7_term3_gen_sum = array_sum($phase7_term3_gen_numbers);
     
            $phase7_term3_general_average = $phase7_term3_gen_sum / $phase7_term3_gen_count;

        }

        else{
            $phase7_term3_general_average = 0;

        }


     
    
    
    
     // $phase7_term4_general_average = round(($term4_phase7_mother_tongue + $term4_phase7_filipino + $term4_phase7_english + $term4_phase7_mathematics + $term4_phase7_science + $term4_phase7_araling_panlipunan + $term4_phase7_epp_tle + $term4_phase7_average_of_mapeh + $term4_phase7_esp) / 9);
    
     $phase7_term4_gen_numbers = array($term4_phase7_mother_tongue, $term4_phase7_filipino, $term4_phase7_english, $term4_phase7_mathematics, $term4_phase7_science, $term4_phase7_araling_panlipunan, $term4_phase7_epp_tle, $term4_phase7_average_of_mapeh, $term4_phase7_esp);
     $phase7_term4_gen_count = count(array_filter($phase7_term4_gen_numbers));
    
        if($phase7_term4_gen_count != 0){
            $phase7_term4_gen_sum = array_sum($phase7_term4_gen_numbers);
     
            $phase7_term4_general_average = $phase7_term4_gen_sum / $phase7_term4_gen_count;

        }

        else{
            $phase7_term4_general_average = 0;

        }

    
    
    
    
    
     // $phase7_term5_general_average = round(($phase7_final_rating_mother_tongue  + $phase7_final_rating_filipino + $phase7_final_rating_english + $phase7_final_rating_math + $phase7_final_rating_science + $phase7_final_rating_AP + $phase7_final_rating_epp_tle + $phase7_final_rating_mapeh + $phase7_final_rating_esp) / 9);


     $phase7_term5_gen_numbers = array($phase7_final_rating_mother_tongue, $phase7_final_rating_filipino, $phase7_final_rating_english, $phase7_final_rating_math, $phase7_final_rating_science, $phase7_final_rating_AP, $phase7_final_rating_epp_tle, $phase7_final_rating_mapeh, $phase7_final_rating_esp);
     $phase7_term5_gen_count = count(array_filter($phase7_term5_gen_numbers));

     if($phase7_term5_gen_count != 0){
        
        $phase7_term5_gen_sum = array_sum($phase7_term5_gen_numbers);
        
        $phase7_term5_general_average = $phase7_term5_gen_sum / $phase7_term5_gen_count;
   }

     else{
        $phase7_term5_general_average = 0;

     }


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


    //CHECK DITO kung papasa si student, RETAINED, REMEDIAL OR PROMOTED
    //if 3 bagsak pataas RETAINED
    // if 2 bagsak Remedial
    // if 1 or 0 Promoted

    //phase1 munaaaa
    //**query muna ako mula sa database*******//







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




        //phase1 Insert Scholastic Records

    $phase1_insert_scholastic_records = "INSERT INTO scholastic_records (lrn,school,school_id,district,division,region,classified_as_grade,section,school_year,name_of_teacher,signature,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn' ,'$phase1_name_of_school', '$phase1_school_id' , '$phase1_district', '$phase1_division', '$phase1_region', '$phase1_classified_as_grade', '$phase1_section', '$phase1_school_year', '$phase1_name_of_school', '$phase1_signature', '$phase1','$phase1_remarks', '$dateCreated', '$dateUpdated')";

    $phase1_run_scholastic_records = mysqli_query($conn,$phase1_insert_scholastic_records);
    if($phase1_run_scholastic_records){

        //inserting of students grades

        // phase 1 term1 inserting of mother toungue 
        $insert_student_grades_term1_phase1_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
        VALUES ('$lrn','$mother_tongue', '$term1_phase1_mother_tongue','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term1_phase1_mother_tongue = mysqli_query($conn,$insert_student_grades_term1_phase1_mother_tongue);
        
        if($insert_student_grades_term1_phase1_mother_tongue){
            echo"term1 mothertongue";
        }

        else{
            $conn->error;;
        }

        // phase 1 term1 inserting of filipino

        $insert_student_grades_term1_phase1_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
        VALUES ('$lrn','$filipino', '$term1_phase1_filipino','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term1_phase1_filipino = mysqli_query($conn,$insert_student_grades_term1_phase1_filipino);
        
        if($insert_student_grades_term1_phase1_filipino){
            echo"term1 Filipino";
        }

        else{
            $conn->error;
        }

        // phase 1 term1 inserting of english

        $insert_student_grades_term1_phase1_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
        VALUES ('$lrn','$english', '$term1_phase1_english','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term1_phase1_english = mysqli_query($conn,$insert_student_grades_term1_phase1_english);
        
        if($insert_student_grades_term1_phase1_english){
            echo"term1 english";
        }

        else{
            $conn->error;
        }

        //phase 1 term1 inserting of math

        $insert_student_grades_term1_phase1_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$math', '$term1_phase1_mathematics','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase1_math = mysqli_query($conn,$insert_student_grades_term1_phase1_math);
        
        if($insert_student_grades_term1_phase1_math){
            echo"term1 math";
        }

        else{
            $conn->error;
        }

        //  phase 1 term1 inserting of science

        $insert_student_grades_term1_phase1_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$science', '$term1_phase1_science','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase1_science = mysqli_query($conn,$insert_student_grades_term1_phase1_science);
        
        if($insert_student_grades_term1_phase1_science){
            echo"term1 science";
        }

        else{
            $conn->error;
        }

        // phase 1 term1 inserting of araling panlipunan

        $insert_student_grades_term1_phase1_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$AP', '$term1_phase1_araling_panlipunan','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase1_ap = mysqli_query($conn,$insert_student_grades_term1_phase1_ap);
        
        if($insert_student_grades_term1_phase1_ap){
            echo"term1 Araling panlipunan";
        }

        else{
            $conn->error;
        }
            //
        //phase 1 term1 inserting of epp and tle

        $insert_student_grades_term1_phase1_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
        VALUES ('$lrn','$epp_tle', '$term1_phase1_epp_tle','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term1_phase1_epp_tle = mysqli_query($conn,$insert_student_grades_term1_phase1_epp_tle);
        
        if($insert_student_grades_term1_phase1_epp_tle){
            echo"term1 EPP_TLE";
        }

        else{
            $conn->error;
        }

        // phase 1 term1 inserting of mapeh

        $insert_student_grades_term1_phase1_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
        VALUES ('$lrn','$mapeh', '$term1_phase1_average_of_mapeh','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term1_phase1_mapeh = mysqli_query($conn,$insert_student_grades_term1_phase1_mapeh);

            if($run_student_grades_term1_phase1_mapeh){
            echo  "added term mapeh";
            }
            else{
                $conn->error;
            }
            

            // phase 1 term inserting of music

        $insert_student_grades_term1_phase1_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
        VALUES ('$lrn','$music', '$term1_phase1_music','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term1_phase1_music = mysqli_query($conn,$insert_student_grades_term1_phase1_music);

            if($run_student_grades_term1_phase1_music){
                echo  "added term music" . '<br>';
            }
                else{
                $conn->error;
            }

        // phase 1 term1 inserting of arts

        $insert_student_grades_term1_phase1_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
        VALUES ('$lrn','$arts', '$term1_phase1_arts','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term1_phase1_arts = mysqli_query($conn,$insert_student_grades_term1_phase1_arts);

            
            if($run_student_grades_term1_phase1_arts){
                echo  "added term arts" . '<br>';
            }

                else{
                    $conn->error;
                }



        // phase 1 term1 inserting of pe

        $insert_student_grades_term1_phase1_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
        VALUES ('$lrn','$PE', '$term1_phase1_pe','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term1_phase1_pe = mysqli_query($conn,$insert_student_grades_term1_phase1_pe);

            if($run_student_grades_term1_phase1_pe){
                echo  "added term PE" . '<br>';
            }
                
                else{
                    $conn->error;
                }


            // phase 1 term1 inserting of heatlh 

            $insert_student_grades_term1_phase1_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$health', '$term1_phase1_health','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase1_health = mysqli_query($conn,$insert_student_grades_term1_phase1_health);

                 if($run_student_grades_term1_phase1_health){

                     echo  "added term health" . '<br>';
                 }
                    
                     else{
                        $conn->error;
                    }   

            // phase 1 term1 inserting of esp

            $insert_student_grades_term1_phase1_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$esp', '$term1_phase1_esp','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase1_esp = mysqli_query($conn,$insert_student_grades_term1_phase1_esp);

                if($run_student_grades_term1_phase1_esp){
                    echo  "added term esp" . '<br>';
                }else{
                        $conn->error;
                    }


            // phase 1 term1 inserting of arabic language

            $insert_student_grades_term1_phase1_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arabic_language', '$term1_phase1_arabic_language','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase1_arabic = mysqli_query($conn,$insert_student_grades_term1_phase1_arabic);

            if($run_student_grades_term1_phase1_arabic){
                 echo  "added term arabic" . '<br>';
            }   
                
                 else{
                    $conn->error;
                }


                // phase 1 term1 inserting of islamic 

            $insert_student_grades_term1_phase1_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$islamic_values', '$term1_phase1_islamic_values','$term1_phase1', '$phase1', '$term1_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term1_phase1_islamic = mysqli_query($conn,$insert_student_grades_term1_phase1_islamic);

            if($run_student_grades_term1_phase1_islamic){
                 echo  "added term islamic" . '<br>';
                                                                        
             }
             
             else{
                  echo "error term1_phase1 islamic" . '<br>';
                }
                    // phase 1 term 1 general average

                $insert_phase1_term1_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
                VALUES ('$lrn','$phase1_term1_general_average','$term1_phase1','$phase1','$phase1_remarks','$dateCreated','$dateUpdated');";
                $run_phase1_term1_student_averages = mysqli_query($conn,$insert_phase1_term1_general_average);
    
                if($run_phase1_term1_student_averages){
                    echo "added student averages term1";
                
                    
                }else{
                    echo "error student_averages" . $conn->error;
                }


                    // end of phase 1 term 1 




                //  phase 1 term 2 

                    //inserting of grade 


                    //  term 2 phase 1  mother tongue


                $insert_student_grades_term2_phase1_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mother_tongue', '$term2_phase1_mother_tongue','$term2_phase1', '$phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase1_mother_tongue = mysqli_query($conn,$insert_student_grades_term2_phase1_mother_tongue);
            
            if($insert_student_grades_term2_phase1_mother_tongue){
                echo"term2 phase 1  mothertongue";
            }

            else{
                $conn->error;;
            }

                // term 2 phase 1 filipino



            $insert_student_grades_term2_phase1_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$filipino', '$term2_phase1_filipino','$term2_phase1', '$phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase1_filipino = mysqli_query($conn,$insert_student_grades_term2_phase1_filipino);
            
            if($insert_student_grades_term2_phase1_filipino){
                echo"term2 Filipino";
            }

            else{
                $conn->error;
            }

            //term 2 phase 1 english 

            $insert_student_grades_term2_phase1_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$english', '$term2_phase1_english','$term2_phase1', '$phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase1_english = mysqli_query($conn,$insert_student_grades_term2_phase1_english);
            

            if($insert_student_grades_term2_phase1_english){
                echo"term2 phase 1 english";
            }

            else{
                $conn->error;
            }

                //term 2 phase 1 math

            $insert_student_grades_term2_phase1_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$math', '$term2_phase1_mathematics','$term2_phase1', '$phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')" ;
              $run_student_grades_term2_phase1_math = mysqli_query($conn,$insert_student_grades_term2_phase1_math);
            
            if($insert_student_grades_term2_phase1_math){
                echo"term2 phase 1 math";
            }

            else{
                $conn->error;
            }

            //term 2 phase 1 science

            $insert_student_grades_term2_phase1_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$science', '$term2_phase1_science','$term2_phase1', '$phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')" ;
              $run_student_grades_term2_phase1_science = mysqli_query($conn,$insert_student_grades_term2_phase1_science);
            
            if($insert_student_grades_term2_phase1_science){
                echo"term2 phase 1  science";
            }

            else{
                $conn->error;
            }

            //term 2 phase 1 araling panlipunan 

            $insert_student_grades_term2_phase1_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
              VALUES ('$lrn','$AP', '$term2_phase1_araling_panlipunan','$term2_phase1', '$phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')" ;
                $run_student_grades_term2_phase1_ap = mysqli_query($conn,$insert_student_grades_term2_phase1_ap);
            
            if($insert_student_grades_term2_phase1_ap){
                echo"term2 phase 1 Araling panlipunan";
            }

            else{
                $conn->error;
            }

            //term 2 phase 1 epp tle 

            $insert_student_grades_term2_phase1_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$epp_tle', '$term2_phase1_epp_tle','$term2_phase1', '$phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase1_epp_tle = mysqli_query($conn,$insert_student_grades_term2_phase1_epp_tle);
            
            if($insert_student_grades_term2_phase1_epp_tle){
                echo"term2 EPP_TLE";
            }

            else{
                $conn->error;
            }


            //term 2 phase 1 mapeh 

            $insert_student_grades_term2_phase1_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mapeh', '$term2_phase1_average_of_mapeh','$term2_phase1', '$phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase1_mapeh = mysqli_query($conn,$insert_student_grades_term2_phase1_mapeh);

              if($run_student_grades_term2_phase1_mapeh){
                echo  "added term2 phase 1 mapeh";
              }
                else{
                    $conn->error;
                }


                //term 2 phase 1 music 

            $insert_student_grades_term2_phase1_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$music', '$term2_phase1_music','$term2_phase1', '$phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase1_music = mysqli_query($conn,$insert_student_grades_term2_phase1_music);

               if($run_student_grades_term2_phase1_music){
                   echo  "added term music" . '<br>';
               }
                   else{
                    $conn->error;
                }


                //term 2 phase 1 arts 

            $insert_student_grades_term2_phase1_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arts', '$term2_phase1_arts','$term2_phase1', '$phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase1_arts = mysqli_query($conn,$insert_student_grades_term2_phase1_arts);


                if($run_student_grades_term2_phase1_arts){
                    echo  "added term arts" . '<br>';
                }

                    else{
                        $conn->error;
                    }


                    //term 2 phase 1 PE 

            $insert_student_grades_term2_phase1_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$PE', '$term2_phase1_pe','$term2_phase1', '$phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase1_pe = mysqli_query($conn,$insert_student_grades_term2_phase1_pe);

                if($run_student_grades_term2_phase1_pe){
                    echo  "added term PE" . '<br>';
                }
                   
                    else{
                        $conn->error;
                    }


                    //term 2 phase 1 health

            $insert_student_grades_term2_phase1_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$health', '$term2_phase1_health','$term2_phase1', '$phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase1_health = mysqli_query($conn,$insert_student_grades_term2_phase1_health);

                 if($run_student_grades_term2_phase1_health){

                     echo  "added term health" . '<br>';
                 }
                    
                     else{
                        $conn->error;
                    }

                    //term 2 phase 1 eduk sa pag papakatao

            $insert_student_grades_term2_phase1_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$esp', '$term2_phase1_esp','$term2_phase1', '$phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase1_esp = mysqli_query($conn,$insert_student_grades_term2_phase1_esp);

                if($run_student_grades_term2_phase1_esp){
                    echo  "added term esp" . '<br>';
                }
                    else{
                        $conn->error;
                    }

                    //term 2 phase 1 arabic language 

            $insert_student_grades_term2_phase1_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arabic_language', '$term2_phase1_arabic_language','$term2_phase1', '$phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase1_arabic = mysqli_query($conn,$insert_student_grades_term2_phase1_arabic);

            if($run_student_grades_term2_phase1_arabic){
                 echo  "added term arabic" . '<br>';
            }   
                
                 else{
                    $conn->error;
                }

                //term 2 phase 1 islamic 

            $insert_student_grades_term2_phase1_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$islamic_values', '$term2_phase1_islamic_values','$term2_phase1', '$phase1', '$term2_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term2_phase1_islamic = mysqli_query($conn,$insert_student_grades_term2_phase1_islamic);

            if($run_student_grades_term2_phase1_islamic){
                 echo  "added term islamic" . '<br>';
                                                                        
             }
             
             else{
                  echo "error term2_phase1 islamic" . '<br>';
                }



                        // inserting 
                    // general average of term 2

                    $insert_phase1_term2_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
                VALUES ('$lrn','$phase1_term2_general_average','$term2_phase1','$phase1',' $term2_phase1_remarks','$dateCreated','$dateUpdated');";
                $run_phase1_term2_student_averages = mysqli_query($conn,$insert_phase1_term2_general_average);
    
                if($run_phase1_term2_student_averages){
                    echo "added student averages term1";
                    
                }else{
                    echo "error student_averages" . $conn->error;
                }


            ////////////////////////////////////END OF TERM 2 ////////////////////////////////


            // INSERTING OF GRADES 

                // TERM 3 PHASE 1 MOTHER TONGUE

                $insert_student_grades_term3_phase1_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mother_tongue', '$term3_phase1_mother_tongue','$term3_phase1', '$phase1', '$term3_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase1_mother_tongue = mysqli_query($conn,$insert_student_grades_term3_phase1_mother_tongue);
            
            if($insert_student_grades_term3_phase1_mother_tongue){
                echo"term3 mothertongue";
            }

            else{
                $conn->error;;
            }


            // TERM 3 PHASE 1 FILIPINO

            $insert_student_grades_term3_phase1_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$filipino', '$term3_phase1_filipino','$term3_phase1', '$phase1', '$term3_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase1_filipino = mysqli_query($conn,$insert_student_grades_term3_phase1_filipino);
            
            if($insert_student_grades_term3_phase1_filipino){
                echo"term3 Filipino";
            }

            else{
                $conn->error;
            }

            // TERM 3 PHASE 1 ENGLISH 

            $insert_student_grades_term3_phase1_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$english', '$term3_phase1_english','$term3_phase1', '$phase1', '$term3_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase1_english = mysqli_query($conn,$insert_student_grades_term3_phase1_english);
            
            if($insert_student_grades_term3_phase1_english){
                echo"term3 english";
            }

            else{
                $conn->error;
            }

            // TERM 3 PHASE 1 MATH 

            $insert_student_grades_term3_phase1_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$math', '$term3_phase1_mathematics','$term3_phase1', '$phase1', '$term3_phase1_remarks','$dateCreated', '$dateUpdated')" ;
              $run_student_grades_term3_phase1_math = mysqli_query($conn,$insert_student_grades_term3_phase1_math);
            
            if($insert_student_grades_term3_phase1_math){
                echo"term3 math";
            }

            else{
                $conn->error;
            }


            // TERM 3 PHASE 1 SCIENCE

            $insert_student_grades_term3_phase1_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$science', '$term3_phase1_science','$term3_phase1', '$phase1', '$term3_phase1_remarks','$dateCreated', '$dateUpdated')" ;
              $run_student_grades_term3_phase1_science = mysqli_query($conn,$insert_student_grades_term3_phase1_science);
            
            if($insert_student_grades_term3_phase1_science){
                echo"term3 science";
            }

            else{
                $conn->error;
            }


            // TERM 3 PHASE 1 ARALING PANLIPUNAN

            $insert_student_grades_term3_phase1_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
              VALUES ('$lrn','$AP', '$term3_phase1_araling_panlipunan','$term3_phase1', '$phase1', '$term3_phase1_remarks','$dateCreated', '$dateUpdated')" ;
                $run_student_grades_term3_phase1_ap = mysqli_query($conn,$insert_student_grades_term3_phase1_ap);
            
            if($insert_student_grades_term3_phase1_ap){
                echo"term3 Araling panlipunan";
            }

            else{
                $conn->error;
            }

            // TERM 3 PHASE 1 EPP TLE 

            $insert_student_grades_term3_phase1_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$epp_tle', '$term3_phase1_epp_tle','$term3_phase1', '$phase1', '$term3_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase1_epp_tle = mysqli_query($conn,$insert_student_grades_term3_phase1_epp_tle);
            
            if($insert_student_grades_term3_phase1_epp_tle){
                echo"term3 EPP_TLE";
            }

            else{
                $conn->error;
            }

            // TERM 3 PHASE 1 MAPEH

            $insert_student_grades_term3_phase1_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mapeh', '$term3_phase1_average_of_mapeh','$term3_phase1', '$phase1', '$term3_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase1_mapeh = mysqli_query($conn,$insert_student_grades_term3_phase1_mapeh);

              if($run_student_grades_term3_phase1_mapeh){
                echo  "added term mapeh";
              }
                else{
                    $conn->error;
                }

                // TERM 3 PHASE 1 MUSIC 

            $insert_student_grades_term3_phase1_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$music', '$term3_phase1_music','$term3_phase1', '$phase1', '$term3_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase1_music = mysqli_query($conn,$insert_student_grades_term3_phase1_music);

               if($run_student_grades_term3_phase1_music){
                   echo  "added term music" . '<br>';
               }
                   else{
                    $conn->error;
                }

                // TERM 3 PHASE 1 ARTS 

            $insert_student_grades_term3_phase1_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arts', '$term3_phase1_arts','$term3_phase1', '$phase1', '$term3_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase1_arts = mysqli_query($conn,$insert_student_grades_term3_phase1_arts);


                if($run_student_grades_term3_phase1_arts){
                    echo  "added term arts" . '<br>';
                }

                    else{
                        $conn->error;
                    }

                        // TERM 3 PHASE 1 PE 


            $insert_student_grades_term3_phase1_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$PE', '$term3_phase1_pe','$term3_phase1', '$phase1', '$term3_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase1_pe = mysqli_query($conn,$insert_student_grades_term3_phase1_pe);

                if($run_student_grades_term3_phase1_pe){
                    echo  "added term PE" . '<br>';
                }
                   
                    else{
                        $conn->error;
                    }

                    // TERM 3 PHASE 1 HEALTH 


            $insert_student_grades_term3_phase1_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$health', '$term3_phase1_health','$term3_phase1', '$phase1', '$term3_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase1_health = mysqli_query($conn,$insert_student_grades_term3_phase1_health);

                 if($run_student_grades_term3_phase1_health){

                     echo  "added term health" . '<br>';
                 }
                    
                     else{
                        $conn->error;
                    }

                    // TERM 3 PHASE 1 EDUK SA PAG PAPAKATAO 

            $insert_student_grades_term3_phase1_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$esp', '$term3_phase1_esp','$term3_phase1', '$phase1', '$term3_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase1_esp = mysqli_query($conn,$insert_student_grades_term3_phase1_esp);

                if($run_student_grades_term3_phase1_esp){
                    echo  "added term esp" . '<br>';
                }
                    else{
                        $conn->error;
                    }


                    // TERM 3 PHASE 1 ARABIC LANGUAGE 


            $insert_student_grades_term3_phase1_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arabic_language', '$term3_phase1_arabic_language','$term3_phase1', '$phase1', '$term3_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase1_arabic = mysqli_query($conn,$insert_student_grades_term3_phase1_arabic);

            if($run_student_grades_term3_phase1_arabic){
                 echo  "added term arabic" . '<br>';
            }   
                
                 else{
                    $conn->error;
                }

                // TERM 3 PHASE 1 ISLAMIC VALUES 

            $insert_student_grades_term3_phase1_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$islamic_values', '$term3_phase1_islamic_values','$term3_phase1', '$phase1', '$term3_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term3_phase1_islamic = mysqli_query($conn,$insert_student_grades_term3_phase1_islamic);

            if($run_student_grades_term3_phase1_islamic){
                 echo  "added term islamic" . '<br>';
                                                                        
             }
             
             else{
                  echo "error term3_phase1 islamic" . '<br>';
                }



                    // INSERTING OF  general average of term 3

                    $insert_phase1_term3_general_average = "INSERT INTO student_general_averages (`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
                VALUES ('$lrn','$phase1_term3_general_average','$term3_phase1','$phase1',' $term3_phase1_remarks','$dateCreated','$dateUpdated');";
                $run_phase1_term3_student_averages = mysqli_query($conn,$insert_phase1_term3_general_average);
    
                if($run_phase1_term3_student_averages){
                    echo "added student averages term1";
                   
                }else{
                    echo "error student_averages" . $conn->error;
                }
                

//////////////////////////////////////////////// PHASE 1 TERM 3 ENDS HERE ////////////////////////////////
                
                    
                    // INSERTING OF GRADES TERM 4 

                // TERM 4 PHASE 1 MOTHER TONGUE 

         



                $insert_student_grades_term4_phase1_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mother_tongue', '$term4_phase1_mother_tongue','$term4_phase1', '$phase1', '$term4_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase1_mother_tongue = mysqli_query($conn,$insert_student_grades_term4_phase1_mother_tongue);
            
            if($insert_student_grades_term4_phase1_mother_tongue){
                echo"term4 mothertongue";
            }

            else{
                $conn->error;;
            }

            // TERM 4 PHASE 1 FILIPINO

            $insert_student_grades_term4_phase1_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$filipino', '$term4_phase1_filipino','$term4_phase1', '$phase1', '$term4_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase1_filipino = mysqli_query($conn,$insert_student_grades_term4_phase1_filipino);
            
            if($insert_student_grades_term4_phase1_filipino){
                echo"term4 Filipino";
            }

            else{
                $conn->error;
            }


            // TERM 4 PHASE 1 ENGLISH 

            $insert_student_grades_term4_phase1_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$english', '$term4_phase1_english','$term4_phase1', '$phase1', '$term4_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase1_english = mysqli_query($conn,$insert_student_grades_term4_phase1_english);
            
            if($insert_student_grades_term4_phase1_english){
                echo"term4 english";
            }

            else{
                $conn->error;
            }

            // TERM 4 PHASE 1 MATH 

            $insert_student_grades_term4_phase1_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$math', '$term4_phase1_mathematics','$term4_phase1', '$phase1', '$term4_phase1_remarks','$dateCreated', '$dateUpdated')" ;
              $run_student_grades_term4_phase1_math = mysqli_query($conn,$insert_student_grades_term4_phase1_math);
            
            if($insert_student_grades_term4_phase1_math){
                echo"term4 math";
            }

            else{
                $conn->error;
            }

                // TERM 4 PHASE 1 SCIENCE 


            $insert_student_grades_term4_phase1_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$science', '$term4_phase1_science','$term4_phase1', '$phase1', '$term4_phase1_remarks','$dateCreated', '$dateUpdated')" ;
              $run_student_grades_term4_phase1_science = mysqli_query($conn,$insert_student_grades_term4_phase1_science);
            
            if($insert_student_grades_term4_phase1_science){
                echo"term4 science";
            }

            else{
                $conn->error;
            }

            // TERM 4 PHASE 1 ARALING PANLIPUNAN

            $insert_student_grades_term4_phase1_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
              VALUES ('$lrn','$AP', '$term4_phase1_araling_panlipunan','$term4_phase1', '$phase1', '$term4_phase1_remarks','$dateCreated', '$dateUpdated')" ;
                $run_student_grades_term4_phase1_ap = mysqli_query($conn,$insert_student_grades_term4_phase1_ap);
            
            if($insert_student_grades_term4_phase1_ap){
                echo"term4 Araling panlipunan";
            }

            else{
                $conn->error;
            }

            // TERM 4 PHASE 1 EPP AND TLE 


            $insert_student_grades_term4_phase1_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$epp_tle', '$term4_phase1_epp_tle','$term4_phase1', '$phase1', '$term4_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase1_epp_tle = mysqli_query($conn,$insert_student_grades_term4_phase1_epp_tle);
            
            if($insert_student_grades_term4_phase1_epp_tle){
                echo"term4 EPP_TLE";
            }

            else{
                $conn->error;
            }

            // TERM 4 PHASE 1 MAPEH 

            $insert_student_grades_term4_phase1_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$mapeh', '$term4_phase1_average_of_mapeh','$term4_phase1', '$phase1', '$term4_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase1_mapeh = mysqli_query($conn,$insert_student_grades_term4_phase1_mapeh);

              if($run_student_grades_term4_phase1_mapeh){
                echo  "added term mapeh";
              }
                else{
                    $conn->error;
                }

                // TERM 4 PHASE 1 MUSIC 

            $insert_student_grades_term4_phase1_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$music', '$term4_phase1_music','$term4_phase1', '$phase1', '$term4_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase1_music = mysqli_query($conn,$insert_student_grades_term4_phase1_music);

               if($run_student_grades_term4_phase1_music){
                   echo  "added term music" . '<br>';
               }
                   else{
                    $conn->error;
                }


                // TERM 4 PHASE 1 ARTS

                
            $insert_student_grades_term4_phase1_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arts', '$term4_phase1_arts','$term4_phase1', '$phase1', '$term4_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase1_arts = mysqli_query($conn,$insert_student_grades_term4_phase1_arts);


                if($run_student_grades_term4_phase1_arts){
                    echo  "added term arts" . '<br>';
                }

                    else{
                        $conn->error;
                    }


                    // TERM 4 PHASE 1 PE

            $insert_student_grades_term4_phase1_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$PE', '$term4_phase1_pe','$term4_phase1', '$phase1', '$term4_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase1_pe = mysqli_query($conn,$insert_student_grades_term4_phase1_pe);

                if($run_student_grades_term4_phase1_pe){
                    echo  "added term PE" . '<br>';
                }
                   
                    else{
                        $conn->error;
                    }

                    // TERM 4 PHASE 1 HEALTH 

            $insert_student_grades_term4_phase1_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
             VALUES ('$lrn','$health', '$term4_phase1_health','$term4_phase1', '$phase1', '$term4_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase1_health = mysqli_query($conn,$insert_student_grades_term4_phase1_health);

                 if($run_student_grades_term4_phase1_health){

                     echo  "added term health" . '<br>';
                 }
                    
                     else{
                        $conn->error;
                    }

                    // TERM 4 PHASE 1 EDUK SA PAG PAPAKATAO

            $insert_student_grades_term4_phase1_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$esp', '$term4_phase1_esp','$term4_phase1', '$phase1', '$term4_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase1_esp = mysqli_query($conn,$insert_student_grades_term4_phase1_esp);

                if($run_student_grades_term4_phase1_esp){
                    echo  "added term esp" . '<br>';
                }
                    else{
                        $conn->error;
                    }

                    // TERM 4 PHASE 1 ARABIC LANGUAGE 

            $insert_student_grades_term4_phase1_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$arabic_language', '$term4_phase1_arabic_language','$term4_phase1', '$phase1', '$term4_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase1_arabic = mysqli_query($conn,$insert_student_grades_term4_phase1_arabic);

            if($run_student_grades_term4_phase1_arabic){
                 echo  "added term arabic" . '<br>';
            }   
                
                 else{
                    $conn->error;
                }

                     // TERM 4 PHASE 1 ISLAMIC VALUES 


            $insert_student_grades_term4_phase1_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn','$islamic_values', '$term4_phase1_islamic_values','$term4_phase1', '$phase1', '$term4_phase1_remarks','$dateCreated', '$dateUpdated')" ;
            $run_student_grades_term4_phase1_islamic = mysqli_query($conn,$insert_student_grades_term4_phase1_islamic);

            if($run_student_grades_term4_phase1_islamic){
                 echo  "added term islamic" . '<br>';
                                                                        
             }
             
             else{
                  echo "error term4_phase1 islamic" . '<br>';
                }




        
                    // general average of term 4

                    $insert_phase1_term4_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
                VALUES ('$lrn','$phase1_term4_general_average','$term4_phase1','$phase1',' $term4_phase1_remarks','$dateCreated','$dateUpdated');";
                $run_phase1_term4_student_averages = mysqli_query($conn,$insert_phase1_term4_general_average);
    
                if($run_phase1_term4_student_averages){
                    echo "added student averages term1";
                    
                }else{
                    echo "error student_averages" . $conn->error;
                }

                    ////////////////// PHASE 1 TERM 4 ENDS HERE /////////////////////////


                   // INSERTING OF FINAL RATINGS  

                  //insert ko sa FINAL RATINGS table PER SUBJECT Science

                $insert_student_final_ratings_mt = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$mother_tongue','$phase1_final_rating_mother_tongue', '$phase1_term5', '$phase1', '$phase1_final_rating_mother_tongue_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_mt = mysqli_query($conn,$insert_student_final_ratings_mt);

            if($run_student_final_ratings_mt){
                echo "added to student final ratings MT" . '<br>';
            }else{
                echo "Error student final ratings MT" . '<br>';
            }


             ///insert ko sa FINAL RATINGS table PER SUBJECT FILIPINO

            $insert_student_final_ratings_filipino = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$filipino', '$phase1_final_rating_filipino','$phase1_term5', '$phase1', '$phase1_final_rating_filipino_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_filipino = mysqli_query($conn,$insert_student_final_ratings_filipino);

            if($run_student_final_ratings_filipino){
                echo "added to student final ratings filipino" . '<br>';
            }else{
                echo "Error student final ratings filipino" . '<br>';
            }

   //insert ko sa FINAL RATINGS table PER SUBJECT ENGLISH 


            $insert_student_final_ratings_english = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$english','$phase1_final_rating_english', '$phase1_term5', '$phase1', '$phase1_final_rating_english_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_english = mysqli_query($conn,$insert_student_final_ratings_english);

            if($run_student_final_ratings_english){
                echo "added to student final ratings english" . '<br>';
            }else{
                echo "Error student final ratings english" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT Math

            $insert_student_final_ratings_math = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$math','$phase1_final_rating_math', '$phase1_term5', '$phase1', '$phase1_final_rating_math_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_math = mysqli_query($conn,$insert_student_final_ratings_math);

            if($run_student_final_ratings_math){
                echo "added to student final ratings math" . '<br>';
            }else{
                echo "Error student final ratings math" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT Science

            $insert_student_final_ratings_science = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$science','$phase1_final_rating_science', '$phase1_term5', '$phase1', '$phase1_final_rating_science_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_science = mysqli_query($conn,$insert_student_final_ratings_science);

            if($run_student_final_ratings_science){
                echo "added to student final ratings math" . '<br>';
            }else{
                echo "Error student final ratings math" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT AP

            $insert_student_final_ratings_AP = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$AP','$phase1_final_rating_AP', '$phase1_term5', '$phase1', '$phase1_final_rating_AP_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_AP = mysqli_query($conn,$insert_student_final_ratings_AP);

            if($run_student_final_ratings_AP){
                echo "added to student final ratings AP" . '<br>';
            }else{
                echo "Error student final ratings AP" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT EPP / TLE

            $insert_student_final_ratings_epp_tle = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$epp_tle','$phase1_final_rating_epp_tle', '$phase1_term5', '$phase1', '$phase1_final_rating_epp_tle_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_epp_tle = mysqli_query($conn,$insert_student_final_ratings_epp_tle);

            if($run_student_final_ratings_epp_tle){
                echo "added to student final ratings epp tle" . '<br>';
            }else{
                echo "Error student final ratings epp tle" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT MAPEH

            $insert_student_final_ratings_mapeh = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$mapeh','$phase1_final_rating_mapeh', '$phase1_term5', '$phase1', '$phase1_final_rating_mapeh_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_mapeh = mysqli_query($conn,$insert_student_final_ratings_mapeh);

            if($run_student_final_ratings_mapeh){
                echo "added to student final ratings mapeh" . '<br>';
            }else{
                echo "Error student final ratings mapeh" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT music

            $insert_student_final_ratings_music = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$music','$phase1_final_rating_music', '$phase1_term5', '$phase1', '$phase1_final_rating_music_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_music = mysqli_query($conn,$insert_student_final_ratings_music);

            if($run_student_final_ratings_music){
                echo "added to student final ratings music" . '<br>';
            }else{
                echo "Error student final ratings music" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT arts

            $insert_student_final_ratings_arts = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$arts','$phase1_final_rating_arts', '$phase1_term5', '$phase1', '$phase1_final_rating_arts_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_arts = mysqli_query($conn,$insert_student_final_ratings_arts);

            if($run_student_final_ratings_music){
                echo "added to student final ratings arts" . '<br>';
            }else{
                echo "Error student final ratings arts" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT pe

            $insert_student_final_ratings_pe = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$PE','$phase1_final_rating_PE', '$phase1_term5', '$phase1', '$phase1_final_rating_PE_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_pe = mysqli_query($conn,$insert_student_final_ratings_pe);

            if($run_student_final_ratings_pe){
                echo "added to student final ratings PE" . '<br>';
            }else{
                echo "Error student final ratings PE" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT health

            $insert_student_final_ratings_health = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$health','$phase1_final_rating_health', '$phase1_term5', '$phase1', '$phase1_final_rating_health_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_health = mysqli_query($conn,$insert_student_final_ratings_health);

            if($run_student_final_ratings_pe){
                echo "added to student final ratings health" . '<br>';
            }else{
                echo "Error student final ratings health" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT ESP

            $insert_student_final_ratings_esp = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$esp', '$phase1_final_rating_esp','$phase1_term5', '$phase1', '$phase1_final_rating_esp_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_esp = mysqli_query($conn,$insert_student_final_ratings_esp);

            if($run_student_final_ratings_pe){
                echo "added to student final ratings esp" . '<br>';
            }else{
                echo "Error student final ratings esp" . '<br>';
            }


            //insert ko sa FINAL RATINGS table PER SUBJECT arabic language

            $insert_student_final_ratings_arabic = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$arabic_language','$phase1_final_rating_arabic_language', '$phase1_term5', '$phase1', '$phase1_final_rating_arabic_language_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_arabic = mysqli_query($conn,$insert_student_final_ratings_arabic);

            if($run_student_final_ratings_arabic){
                echo "added to student final ratings arabic" . '<br>';
            }else{
                echo "Error student final ratings arabic" . '<br>';
            }

            //insert ko sa FINAL RATINGS table PER SUBJECT islamic values

            $insert_student_final_ratings_islam = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
            VALUES ('$lrn', '$islamic_values','$phase1_final_rating_islamic_values', '$phase1_term5', '$phase1', '$phase1_final_rating_islamic_values_output', '$dateCreated' , '$dateUpdated')";
            $run_student_final_ratings_islam = mysqli_query($conn,$insert_student_final_ratings_islam);

            if($run_student_final_ratings_islam){
                echo "added to student final ratings islamic" . '<br>';
            }else{
                echo "Error student final ratings islamic" . '<br>';
            }


                //general averag of phase 1 term 5 
            $insert_phase1_term5_general_average = "INSERT INTO student_general_averages(lrn,general_average,term,phase,remarks,date_time_created,date_time_updated) 
            VALUES ('$lrn','$phase1_term5_general_average', '$phase1_term5','$phase1','$term1_phase1_remarks', '$dateCreated','$dateUpdated')";

            $run_phase1_term5_general_average = mysqli_query($conn,$insert_phase1_term5_general_average);

            if($run_phase1_term5_general_average){
                echo "added student averages phase 1 term5";
            }else{
                echo "added student averages phase 1 term5";
            }


            // INSERTING OF REMEDIAL TERM 1 AND 2 


            for ($phase1_remedial_term = 1; $phase1_remedial_term <=2 ; $phase1_remedial_term++){

                if($phase1_remedial_term ==1){
                $phase1_remedial_query= "INSERT INTO `remedial_classes`(`lrn`, `date_from`, `date_to`, `learning_areas`, `final_rating`, `remedial_class_mark`, `recomputed_final_grade`, `phase`, `term`, `remarks`, `date_time_created`, `date_time_updated`) 
                VALUES ('$lrn','$phase1_remedial_from','$phase1_remedial_to','$phase1_remedial_learning_areas_1',' $phase1_remedial_final_rating_1','$phase1_remedial_class_mark_1','$phase1_recomputed_final_grade_1','$phase1','$phase1_remedial_term','$phase1_remedial_remarks_1','$dateCreated','$dateUpdated')";
                
                $phase1_run_query = mysqli_query($conn,$phase1_remedial_query);
            
                if($phase1_run_query){
                echo "remedial query success <br>";
                }
                else
                {
                    $conn->error;
                }
                
            }
        
        
        
            elseif($phase1_remedial_term ==2) {
        
            $phase1_remedial_query= "INSERT INTO `remedial_classes`(`lrn`, `date_from`, `date_to`, `learning_areas`, `final_rating`, `remedial_class_mark`, `recomputed_final_grade`, `phase`, `term`, `remarks`, `date_time_created`, `date_time_updated`) 
            VALUES ('$lrn','$phase1_remedial_from','$phase1_remedial_to','$phase1_remedial_learning_areas_2',' $phase1_remedial_final_rating_2','$phase1_remedial_class_mark_2','$phase1_recomputed_final_grade_2','$phase1','$phase1_remedial_term','$phase1_remedial_remarks_2','$dateCreated','$dateUpdated')";
                $phase1_run_query = mysqli_query($conn,$phase1_remedial_query);
            
            if($phase1_run_query){
                echo "remedial query success term2  <br>";
            }else
                {
                    $conn->error;
                }
            }   
        
        }

    }
//////////////////////////////////// END OF PHASE1////////////////////////////////////////



///////////////////////////////////////////START OF PHASE 2 /////////////////////////////////////////


//Phase2 Insert Scholastic Records

$phase2_insert_scholastic_records = "INSERT INTO scholastic_records (lrn,school,school_id,district,division,region,classified_as_grade,section,school_year,name_of_teacher,signature,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn' ,'$phase2_name_of_school', '$phase2_school_id' , '$phase2_district', '$phase2_division', '$phase2_region', '$phase2_classified_as_grade', '$phase2_section', '$phase2_school_year', '$phase2_name_of_teacher', '$phase2_signature', '$phase2','$phase2_remarks', '$dateCreated', '$dateUpdated')";

$phase2_run_scholastic_records = mysqli_query($conn,$phase2_insert_scholastic_records);
if($phase2_run_scholastic_records){

    //inserting of students grades

    // phase 2 term 1 mother tongue


    $insert_student_grades_term1_phase2_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term1_phase2_mother_tongue','$term1_phase2', '$phase2', '$term1_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase2_mother_tongue = mysqli_query($conn,$insert_student_grades_term1_phase2_mother_tongue);
    
    if($insert_student_grades_term1_phase2_mother_tongue){
        echo"term1 mothertongue";
    }

    else{
        $conn->error;;
    }

    // phase 2 term 1 filipino

    $insert_student_grades_term1_phase2_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term1_phase2_filipino','$term1_phase2', '$phase2', '$term1_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase2_filipino = mysqli_query($conn,$insert_student_grades_term1_phase2_filipino);
    
    if($insert_student_grades_term1_phase2_filipino){
        echo"term1 Filipino";
    }

    else{
        $conn->error;
    }


     // phase 2 term 1 english

    $insert_student_grades_term1_phase2_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term1_phase2_english','$term1_phase2', '$phase2', '$term1_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase2_english = mysqli_query($conn,$insert_student_grades_term1_phase2_english);
    
    if($insert_student_grades_term1_phase2_english){
        echo"term1 english";
    }

    else{
        $conn->error;
    }

        // phase 2 term 1 math

    $insert_student_grades_term1_phase2_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term1_phase2_mathematics','$term1_phase2', '$phase2', '$term1_phase2_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term1_phase2_math = mysqli_query($conn,$insert_student_grades_term1_phase2_math);
    
    if($insert_student_grades_term1_phase2_math){
        echo"term1 math";
    }

    else{
        $conn->error;
    }

         // phase 2 term 1 science


    $insert_student_grades_term1_phase2_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term1_phase2_science','$term1_phase2', '$phase2', '$term1_phase2_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term1_phase2_science = mysqli_query($conn,$insert_student_grades_term1_phase2_science);
    
    if($insert_student_grades_term1_phase2_science){
        echo"term1 science";
    }

    else{
        $conn->error;
    }

     // phase 2 term 1 ap

    $insert_student_grades_term1_phase2_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term1_phase2_araling_panlipunan','$term1_phase2', '$phase2', '$term1_phase2_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term1_phase2_ap = mysqli_query($conn,$insert_student_grades_term1_phase2_ap);
    
    if($insert_student_grades_term1_phase2_ap){
        echo"term1 Araling panlipunan";
    }

    else{
        $conn->error;
    } 

     // phase 2 term 1 epp tle 

    $insert_student_grades_term1_phase2_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term1_phase2_epp_tle','$term1_phase2', '$phase2', '$term1_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase2_epp_tle = mysqli_query($conn,$insert_student_grades_term1_phase2_epp_tle);
    
    if($insert_student_grades_term1_phase2_epp_tle){
        echo"term1 EPP_TLE";
    }

    else{
        $conn->error;
    }

     // phase 2 term 1 mapeh

    $insert_student_grades_term1_phase2_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term1_phase2_average_of_mapeh','$term1_phase2', '$phase2', '$term1_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase2_mapeh = mysqli_query($conn,$insert_student_grades_term1_phase2_mapeh);

      if($run_student_grades_term1_phase2_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }


         // phase 2 term 1 music

    $insert_student_grades_term1_phase2_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term1_phase2_music','$term1_phase2', '$phase2', '$term1_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase2_music = mysqli_query($conn,$insert_student_grades_term1_phase2_music);

       if($run_student_grades_term1_phase2_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }

         // phase 2 term 1 arts

    $insert_student_grades_term1_phase2_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term1_phase2_arts','$term1_phase2', '$phase2', '$term1_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase2_arts = mysqli_query($conn,$insert_student_grades_term1_phase2_arts);


        if($run_student_grades_term1_phase2_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }

             // phase 2 term 1 PE

    $insert_student_grades_term1_phase2_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term1_phase2_pe','$term1_phase2', '$phase2', '$term1_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase2_pe = mysqli_query($conn,$insert_student_grades_term1_phase2_pe);

        if($run_student_grades_term1_phase2_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }

             // phase 2 term 1 health

    $insert_student_grades_term1_phase2_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term1_phase2_health','$term1_phase2', '$phase2', '$term1_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase2_health = mysqli_query($conn,$insert_student_grades_term1_phase2_health);

         if($run_student_grades_term1_phase2_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }

             // phase 2 term 1 esp

    $insert_student_grades_term1_phase2_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term1_phase2_esp','$term1_phase2', '$phase2', '$term1_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase2_esp = mysqli_query($conn,$insert_student_grades_term1_phase2_esp);

        if($run_student_grades_term1_phase2_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }

             // phase 2 term 1 arabic language

    $insert_student_grades_term1_phase2_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term1_phase2_arabic_language','$term1_phase2', '$phase2', '$term1_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase2_arabic = mysqli_query($conn,$insert_student_grades_term1_phase2_arabic);

    if($run_student_grades_term1_phase2_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }

             // phase 2 term 1 islamic value
        

    $insert_student_grades_term1_phase2_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$islamic_values', '$term1_phase2_islamic_values','$term1_phase2', '$phase2', '$term1_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase2_islamic = mysqli_query($conn,$insert_student_grades_term1_phase2_islamic);

    if($run_student_grades_term1_phase2_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term1_phase2 islamic" . '<br>';
        }


            //general average phase 2 term 1
        $insert_phase2_term1_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase2_term1_general_average','$term1_phase2','$phase2','$phase2_remarks','$dateCreated','$dateUpdated');";
        $run_phase2_term1_student_averages = mysqli_query($conn,$insert_phase2_term1_general_average);

        if($run_phase2_term1_student_averages){
            echo "added student averages term1";
        
            
        }else{
            echo "error student_averages" . $conn->error;
        }
            ////////// phase 2 term1 ends here//////////////////

       
       
            //  phase 2 term 2 mother tongue



        $insert_student_grades_term2_phase2_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term2_phase2_mother_tongue','$term2_phase2', '$phase2', '$term2_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase2_mother_tongue = mysqli_query($conn,$insert_student_grades_term2_phase2_mother_tongue);
    
    if($insert_student_grades_term2_phase2_mother_tongue){
        echo"term2 mothertongue";
    }

    else{
        $conn->error;;
    }


    //  phase 2 term 2 filipino

    $insert_student_grades_term2_phase2_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term2_phase2_filipino','$term2_phase2', '$phase2', '$term2_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase2_filipino = mysqli_query($conn,$insert_student_grades_term2_phase2_filipino);
    
    if($insert_student_grades_term2_phase2_filipino){
        echo"term2 Filipino";
    }

    else{
        $conn->error;
    }


    //  phase 2 term 2 english

    $insert_student_grades_term2_phase2_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term2_phase2_english','$term2_phase2', '$phase2', '$term2_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase2_english = mysqli_query($conn,$insert_student_grades_term2_phase2_english);
    
    if($insert_student_grades_term2_phase2_english){
        echo"term2 english";
    }

    else{
        $conn->error;
    }

    //  phase 2 term 2 math

    $insert_student_grades_term2_phase2_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term2_phase2_mathematics','$term2_phase2', '$phase2', '$term2_phase2_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term2_phase2_math = mysqli_query($conn,$insert_student_grades_term2_phase2_math);
    
    if($insert_student_grades_term2_phase2_math){
        echo"term2 math";
    }

    else{
        $conn->error;
    }

    //  phase 2 term 2 science

    $insert_student_grades_term2_phase2_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term2_phase2_science','$term2_phase2', '$phase2', '$term2_phase2_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term2_phase2_science = mysqli_query($conn,$insert_student_grades_term2_phase2_science);
    
    if($insert_student_grades_term2_phase2_science){
        echo"term2 science";
    }

    else{
        $conn->error;
    }

    //  phase 2 term 2 araling panlipunan


    $insert_student_grades_term2_phase2_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term2_phase2_araling_panlipunan','$term2_phase2', '$phase2', '$term2_phase2_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term2_phase2_ap = mysqli_query($conn,$insert_student_grades_term2_phase2_ap);
    
    if($insert_student_grades_term2_phase2_ap){
        echo"term2 Araling panlipunan";
    }

    else{
        $conn->error;
    }


    //  phase 2 term 2 tle _ epp

    $insert_student_grades_term2_phase2_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term2_phase2_epp_tle','$term2_phase2', '$phase2', '$term2_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase2_epp_tle = mysqli_query($conn,$insert_student_grades_term2_phase2_epp_tle);
    
    if($insert_student_grades_term2_phase2_epp_tle){
        echo"term2 EPP_TLE";
    }

    else{
        $conn->error;
    }

    //  phase 2 term 2 mapeh

    $insert_student_grades_term2_phase2_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term2_phase2_average_of_mapeh','$term2_phase2', '$phase2', '$term2_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase2_mapeh = mysqli_query($conn,$insert_student_grades_term2_phase2_mapeh);

      if($run_student_grades_term2_phase2_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }

        //  phase 2 term 2 music


    $insert_student_grades_term2_phase2_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term2_phase2_music','$term2_phase2', '$phase2', '$term2_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase2_music = mysqli_query($conn,$insert_student_grades_term2_phase2_music);

       if($run_student_grades_term2_phase2_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }


        //  phase 2 term 2  arts 


    $insert_student_grades_term2_phase2_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term2_phase2_arts','$term2_phase2', '$phase2', '$term2_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase2_arts = mysqli_query($conn,$insert_student_grades_term2_phase2_arts);


        if($run_student_grades_term2_phase2_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }

                //  phase 2 term 2 pe

    $insert_student_grades_term2_phase2_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term2_phase2_pe','$term2_phase2', '$phase2', '$term2_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase2_pe = mysqli_query($conn,$insert_student_grades_term2_phase2_pe);

        if($run_student_grades_term2_phase2_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }

                //  phase 2 term 2 health


    $insert_student_grades_term2_phase2_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term2_phase2_health','$term2_phase2', '$phase2', '$term2_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase2_health = mysqli_query($conn,$insert_student_grades_term2_phase2_health);

         if($run_student_grades_term2_phase2_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }


            //  phase 2 term 2 eduk sa pag papakatao

    $insert_student_grades_term2_phase2_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term2_phase2_esp','$term2_phase2', '$phase2', '$term2_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase2_esp = mysqli_query($conn,$insert_student_grades_term2_phase2_esp);

        if($run_student_grades_term2_phase2_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }

            //  phase 2 term 2 arabic language

    $insert_student_grades_term2_phase2_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term2_phase2_arabic_language','$term2_phase2', '$phase2', '$term2_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase2_arabic = mysqli_query($conn,$insert_student_grades_term2_phase2_arabic);

    if($run_student_grades_term2_phase2_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }


        //  phase 2 term 2 islamic values 

    $insert_student_grades_term2_phase2_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$islamic_values', '$term2_phase2_islamic_values','$term2_phase2', '$phase2', '$term2_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase2_islamic = mysqli_query($conn,$insert_student_grades_term2_phase2_islamic);

    if($run_student_grades_term2_phase2_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term2_phase2 islamic" . '<br>';
        }




            // general average of term 2

            $insert_phase2_term2_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase2_term2_general_average','$term2_phase2','$phase2',' $term2_phase2_remarks','$dateCreated','$dateUpdated');";
        $run_phase2_term2_student_averages = mysqli_query($conn,$insert_phase2_term2_general_average);

        if($run_phase2_term2_student_averages){
            echo "added student averages term1";
            
        }else{
            echo "error student_averages" . $conn->error;
        }

        ////////////////////// phase 2 term 2 ends here/////////////////

            // inserting of grades 
        //phase 2 term 3 mother tongue 

        $insert_student_grades_term3_phase2_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term3_phase2_mother_tongue','$term3_phase2', '$phase2', '$term3_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase2_mother_tongue = mysqli_query($conn,$insert_student_grades_term3_phase2_mother_tongue);
    
    if($insert_student_grades_term3_phase2_mother_tongue){
        echo"term3 mothertongue";
    }

    else{
        $conn->error;;
    }

    //phase 2 term 3 filipino

    $insert_student_grades_term3_phase2_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term3_phase2_filipino','$term3_phase2', '$phase2', '$term3_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase2_filipino = mysqli_query($conn,$insert_student_grades_term3_phase2_filipino);
    
    if($insert_student_grades_term3_phase2_filipino){
        echo"term3 Filipino";
    }

    else{
        $conn->error;
    }

    //phase 2 term 3  english

    $insert_student_grades_term3_phase2_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term3_phase2_english','$term3_phase2', '$phase2', '$term3_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase2_english = mysqli_query($conn,$insert_student_grades_term3_phase2_english);
    
    if($insert_student_grades_term3_phase2_english){
        echo"term3 english";
    }

    else{
        $conn->error;
    }

    //phase 2 term 3  math

    $insert_student_grades_term3_phase2_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term3_phase2_mathematics','$term3_phase2', '$phase2', '$term3_phase2_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term3_phase2_math = mysqli_query($conn,$insert_student_grades_term3_phase2_math);
    
    if($insert_student_grades_term3_phase2_math){
        echo"term3 math";
    }

    else{
        $conn->error;
    }

    //phase 2 term 3  science

    $insert_student_grades_term3_phase2_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term3_phase2_science','$term3_phase2', '$phase2', '$term3_phase2_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term3_phase2_science = mysqli_query($conn,$insert_student_grades_term3_phase2_science);
    
    if($insert_student_grades_term3_phase2_science){
        echo"term3 science";
    }

    else{
        $conn->error;
    }


    //phase 2 term 3  araling panlipunan


    $insert_student_grades_term3_phase2_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term3_phase2_araling_panlipunan','$term3_phase2', '$phase2', '$term3_phase2_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term3_phase2_ap = mysqli_query($conn,$insert_student_grades_term3_phase2_ap);
    
    if($insert_student_grades_term3_phase2_ap){
        echo"term3 Araling panlipunan";
    }

    else{
        $conn->error;
    }

    //phase 2 term 3  epp tle

    $insert_student_grades_term3_phase2_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term3_phase2_epp_tle','$term3_phase2', '$phase2', '$term3_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase2_epp_tle = mysqli_query($conn,$insert_student_grades_term3_phase2_epp_tle);
    
    if($insert_student_grades_term3_phase2_epp_tle){
        echo"term3 EPP_TLE";
    }

    else{
        $conn->error;
    }


    //phase 2 term 3 mapeh


    $insert_student_grades_term3_phase2_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term3_phase2_average_of_mapeh','$term3_phase2', '$phase2', '$term3_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase2_mapeh = mysqli_query($conn,$insert_student_grades_term3_phase2_mapeh);

      if($run_student_grades_term3_phase2_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }


        //phase 2 term 3  music

    $insert_student_grades_term3_phase2_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term3_phase2_music','$term3_phase2', '$phase2', '$term3_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase2_music = mysqli_query($conn,$insert_student_grades_term3_phase2_music);

       if($run_student_grades_term3_phase2_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }

        //phase 2 term 3 arts

    $insert_student_grades_term3_phase2_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term3_phase2_arts','$term3_phase2', '$phase2', '$term3_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase2_arts = mysqli_query($conn,$insert_student_grades_term3_phase2_arts);


        if($run_student_grades_term3_phase2_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }

            //phase 2 term 3  pe 

    $insert_student_grades_term3_phase2_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term3_phase2_pe','$term3_phase2', '$phase2', '$term3_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase2_pe = mysqli_query($conn,$insert_student_grades_term3_phase2_pe);

        if($run_student_grades_term3_phase2_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }

            //phase 2 term 3  health

    $insert_student_grades_term3_phase2_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term3_phase2_health','$term3_phase2', '$phase2', '$term3_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase2_health = mysqli_query($conn,$insert_student_grades_term3_phase2_health);

         if($run_student_grades_term3_phase2_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }

            //phase 2 term 3 esp 

    $insert_student_grades_term3_phase2_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term3_phase2_esp','$term3_phase2', '$phase2', '$term3_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase2_esp = mysqli_query($conn,$insert_student_grades_term3_phase2_esp);

        if($run_student_grades_term3_phase2_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }

            //phase 2 term 3  arabic language

    $insert_student_grades_term3_phase2_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term3_phase2_arabic_language','$term3_phase2', '$phase2', '$term3_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase2_arabic = mysqli_query($conn,$insert_student_grades_term3_phase2_arabic);

    if($run_student_grades_term3_phase2_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }

        //phase 2 term 3 islamic

    $insert_student_grades_term3_phase2_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$islamic_values', '$term3_phase2_islamic_values','$term3_phase2', '$phase2', '$term3_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase2_islamic = mysqli_query($conn,$insert_student_grades_term3_phase2_islamic);

    if($run_student_grades_term3_phase2_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term3_phase2 islamic" . '<br>';
        }




            // general average of term 3

            $insert_phase2_term3_general_average = "INSERT INTO student_general_averages (`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase2_term3_general_average','$term3_phase2','$phase2',' $term3_phase2_remarks','$dateCreated','$dateUpdated');";
        $run_phase2_term3_student_averages = mysqli_query($conn,$insert_phase2_term3_general_average);

        if($run_phase2_term3_student_averages){
            echo "added student averages term1";
           
        }else{
            echo "error student_averages" . $conn->error;
        }
        
        //////////////// //phase 2 term 3 ends here///////////// 


        // phase 2 term 4 mother tongue 



        $insert_student_grades_term4_phase2_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term4_phase2_mother_tongue','$term4_phase2', '$phase2', '$term4_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase2_mother_tongue = mysqli_query($conn,$insert_student_grades_term4_phase2_mother_tongue);
    
    if($insert_student_grades_term4_phase2_mother_tongue){
        echo"term4 mothertongue";
    }

    else{
        $conn->error;;
    }

     // phase 2 term 4 filipino

    $insert_student_grades_term4_phase2_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term4_phase2_filipino','$term4_phase2', '$phase2', '$term4_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase2_filipino = mysqli_query($conn,$insert_student_grades_term4_phase2_filipino);
    
    if($insert_student_grades_term4_phase2_filipino){
        echo"term4 Filipino";
    }

    else{
        $conn->error;
    }

     // phase 2 term 4 english

    $insert_student_grades_term4_phase2_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term4_phase2_english','$term4_phase2', '$phase2', '$term4_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase2_english = mysqli_query($conn,$insert_student_grades_term4_phase2_english);
    
    if($insert_student_grades_term4_phase2_english){
        echo"term4 english";
    }

    else{
        $conn->error;
    }

     // phase 2 term 4 math 

    $insert_student_grades_term4_phase2_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term4_phase2_mathematics','$term4_phase2', '$phase2', '$term4_phase2_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term4_phase2_math = mysqli_query($conn,$insert_student_grades_term4_phase2_math);
    
    if($insert_student_grades_term4_phase2_math){
        echo"term4 math";
    }

    else{
        $conn->error;
    }

     // phase 2 term 4 science

    $insert_student_grades_term4_phase2_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term4_phase2_science','$term4_phase2', '$phase2', '$term4_phase2_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term4_phase2_science = mysqli_query($conn,$insert_student_grades_term4_phase2_science);
    
    if($insert_student_grades_term4_phase2_science){
        echo"term4 science";
    }

    else{
        $conn->error;
    }

     // phase 2 term 4 ap

    $insert_student_grades_term4_phase2_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term4_phase2_araling_panlipunan','$term4_phase2', '$phase2', '$term4_phase2_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term4_phase2_ap = mysqli_query($conn,$insert_student_grades_term4_phase2_ap);
    
    if($insert_student_grades_term4_phase2_ap){
        echo"term4 Araling panlipunan";
    }

    else{
        $conn->error;
    }

     // phase 2 term 4 epp tle

    $insert_student_grades_term4_phase2_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term4_phase2_epp_tle','$term4_phase2', '$phase2', '$term4_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase2_epp_tle = mysqli_query($conn,$insert_student_grades_term4_phase2_epp_tle);
    
    if($insert_student_grades_term4_phase2_epp_tle){
        echo"term4 EPP_TLE";
    }

    else{
        $conn->error;
    }

     // phase 2 term 4 mapeh

    $insert_student_grades_term4_phase2_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term4_phase2_average_of_mapeh','$term4_phase2', '$phase2', '$term4_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase2_mapeh = mysqli_query($conn,$insert_student_grades_term4_phase2_mapeh);

      if($run_student_grades_term4_phase2_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }

         // phase 2 term 4 music

    $insert_student_grades_term4_phase2_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term4_phase2_music','$term4_phase2', '$phase2', '$term4_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase2_music = mysqli_query($conn,$insert_student_grades_term4_phase2_music);

       if($run_student_grades_term4_phase2_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }

        // phase 2 term 4 arts 


    $insert_student_grades_term4_phase2_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term4_phase2_arts','$term4_phase2', '$phase2', '$term4_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase2_arts = mysqli_query($conn,$insert_student_grades_term4_phase2_arts);


        if($run_student_grades_term4_phase2_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }


            // phase 2 term 4  pe 
    $insert_student_grades_term4_phase2_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term4_phase2_pe','$term4_phase2', '$phase2', '$term4_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase2_pe = mysqli_query($conn,$insert_student_grades_term4_phase2_pe);

        if($run_student_grades_term4_phase2_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }

            // phase 2 term 4 health

    $insert_student_grades_term4_phase2_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term4_phase2_health','$term4_phase2', '$phase2', '$term4_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase2_health = mysqli_query($conn,$insert_student_grades_term4_phase2_health);

         if($run_student_grades_term4_phase2_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }

            // phase 2 term 4  esp 

    $insert_student_grades_term4_phase2_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term4_phase2_esp','$term4_phase2', '$phase2', '$term4_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase2_esp = mysqli_query($conn,$insert_student_grades_term4_phase2_esp);

        if($run_student_grades_term4_phase2_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }

            // phase 2 term 4  arabic language

    $insert_student_grades_term4_phase2_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term4_phase2_arabic_language','$term4_phase2', '$phase2', '$term4_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase2_arabic = mysqli_query($conn,$insert_student_grades_term4_phase2_arabic);

    if($run_student_grades_term4_phase2_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }


        // phase 2 term 4  islammic values

    $insert_student_grades_term4_phase2_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$islamic_values', '$term4_phase2_islamic_values','$term4_phase2', '$phase2', '$term4_phase2_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase2_islamic = mysqli_query($conn,$insert_student_grades_term4_phase2_islamic);

    if($run_student_grades_term4_phase2_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term4_phase2 islamic" . '<br>';
        }




            // general average of term 4 phase 2

            $insert_phase2_term4_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase2_term4_general_average','$term4_phase2','$phase2',' $term4_phase2_remarks','$dateCreated','$dateUpdated');";
        $run_phase2_term4_student_averages = mysqli_query($conn,$insert_phase2_term4_general_average);

        if($run_phase2_term4_student_averages){
            echo "added student averages term1";
            
        }else{
            echo "error student_averages" . $conn->error;
        }

        // phase 2 term 4 ends here////////////////////////////// 

        // phase 2 final rating inserting  

        //insert PHASE 2  ko sa FINAL RATINGS table PER SUBJECT mother tongue

        $insert_student_final_ratings_mt = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$mother_tongue','$phase2_final_rating_mother_tongue', '$phase2_term5', '$phase2', '$phase2_final_rating_mother_tongue_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_mt = mysqli_query($conn,$insert_student_final_ratings_mt);

    if($run_student_final_ratings_mt){
        echo "added to student final ratings MT" . '<br>';
    }else{
        echo "Error student final ratings MT" . '<br>';
    }


    //insert PHASE 2  ko sa FINAL RATINGS table PER SUBJECT filipino

    $insert_student_final_ratings_filipino = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$filipino', '$phase2_final_rating_filipino','$phase2_term5', '$phase2', '$phase2_final_rating_filipino_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_filipino = mysqli_query($conn,$insert_student_final_ratings_filipino);

    if($run_student_final_ratings_filipino){
        echo "added to student final ratings filipino" . '<br>';
    }else{
        echo "Error student final ratings filipino" . '<br>';
    }

    //insert PHASE 2  ko sa FINAL RATINGS table PER SUBJECT English

    $insert_student_final_ratings_english = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$english','$phase2_final_rating_english', '$phase2_term5', '$phase2', '$phase2_final_rating_english_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_english = mysqli_query($conn,$insert_student_final_ratings_english);

    if($run_student_final_ratings_english){
        echo "added to student final ratings english" . '<br>';
    }else{
        echo "Error student final ratings english" . '<br>';
    }

    //insert PHASE 2  ko sa FINAL RATINGS table PER SUBJECT Math

    $insert_student_final_ratings_math = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$math','$phase2_final_rating_math', '$phase2_term5', '$phase2', '$phase2_final_rating_math_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_math = mysqli_query($conn,$insert_student_final_ratings_math);

    if($run_student_final_ratings_math){
        echo "added to student final ratings math" . '<br>';
    }else{
        echo "Error student final ratings math" . '<br>';
    }

    //insert PHASE 2  ko sa FINAL RATINGS table PER SUBJECT Science

    $insert_student_final_ratings_science = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$science','$phase2_final_rating_science', '$phase2_term5', '$phase2', '$phase2_final_rating_science_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_science = mysqli_query($conn,$insert_student_final_ratings_science);

    if($run_student_final_ratings_science){
        echo "added to student final ratings math" . '<br>';
    }else{
        echo "Error student final ratings math" . '<br>';
    }

    //insert PHASE 2  ko sa FINAL RATINGS table PER SUBJECT AP

    $insert_student_final_ratings_AP = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$AP','$phase2_final_rating_AP', '$phase2_term5', '$phase2', '$phase2_final_rating_AP_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_AP = mysqli_query($conn,$insert_student_final_ratings_AP);

    if($run_student_final_ratings_AP){
        echo "added to student final ratings AP" . '<br>';
    }else{
        echo "Error student final ratings AP" . '<br>';
    }

    //insert PHASE 2  ko sa FINAL RATINGS table PER SUBJECT EPP / TLE

    $insert_student_final_ratings_epp_tle = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$epp_tle','$phase2_final_rating_epp_tle', '$phase2_term5', '$phase2', '$phase2_final_rating_epp_tle_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_epp_tle = mysqli_query($conn,$insert_student_final_ratings_epp_tle);

    if($run_student_final_ratings_epp_tle){
        echo "added to student final ratings epp tle" . '<br>';
    }else{
        echo "Error student final ratings epp tle" . '<br>';
    }

    //insert PHASE 2  ko sa FINAL RATINGS table PER SUBJECT MAPEH

    $insert_student_final_ratings_mapeh = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$mapeh','$phase2_final_rating_mapeh', '$phase2_term5', '$phase2', '$phase2_final_rating_mapeh_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_mapeh = mysqli_query($conn,$insert_student_final_ratings_mapeh);

    if($run_student_final_ratings_mapeh){
        echo "added to student final ratings mapeh" . '<br>';
    }else{
        echo "Error student final ratings mapeh" . '<br>';
    }

    //insert PHASE 2  ko sa FINAL RATINGS table PER SUBJECT music

    $insert_student_final_ratings_music = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$music','$phase2_final_rating_music', '$phase2_term5', '$phase2', '$phase2_final_rating_music_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_music = mysqli_query($conn,$insert_student_final_ratings_music);

    if($run_student_final_ratings_music){
        echo "added to student final ratings music" . '<br>';
    }else{
        echo "Error student final ratings music" . '<br>';
    }

    //insert PHASE 2  ko sa FINAL RATINGS table PER SUBJECT arts

    $insert_student_final_ratings_arts = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$arts','$phase2_final_rating_arts', '$phase2_term5', '$phase2', '$phase2_final_rating_arts_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_arts = mysqli_query($conn,$insert_student_final_ratings_arts);

    if($run_student_final_ratings_music){
        echo "added to student final ratings arts" . '<br>';
    }else{
        echo "Error student final ratings arts" . '<br>';
    }

    //insert PHASE 2  ko sa FINAL RATINGS table PER SUBJECT pe

    $insert_student_final_ratings_pe = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$PE','$phase2_final_rating_PE', '$phase2_term5', '$phase2', '$phase2_final_rating_PE_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_pe = mysqli_query($conn,$insert_student_final_ratings_pe);

    if($run_student_final_ratings_pe){
        echo "added to student final ratings PE" . '<br>';
    }else{
        echo "Error student final ratings PE" . '<br>';
    }

    //insert PHASE 2  ko sa FINAL RATINGS table PER SUBJECT health

    $insert_student_final_ratings_health = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$health','$phase2_final_rating_health', '$phase2_term5', '$phase2', '$phase2_final_rating_health_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_health = mysqli_query($conn,$insert_student_final_ratings_health);

    if($run_student_final_ratings_pe){
        echo "added to student final ratings health" . '<br>';
    }else{
        echo "Error student final ratings health" . '<br>';
    }

    //insert PHASE 2  ko sa FINAL RATINGS table PER SUBJECT ESP

    $insert_student_final_ratings_esp = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$esp', '$phase2_final_rating_esp','$phase2_term5', '$phase2', '$phase2_final_rating_esp_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_esp = mysqli_query($conn,$insert_student_final_ratings_esp);

    if($run_student_final_ratings_pe){
        echo "added to student final ratings esp" . '<br>';
    }else{
        echo "Error student final ratings esp" . '<br>';
    }


    //insert PHASE 2  ko sa FINAL RATINGS table PER SUBJECT arabic language

    $insert_student_final_ratings_arabic = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$arabic_language','$phase2_final_rating_arabic_language', '$phase2_term5', '$phase2', '$phase2_final_rating_arabic_language_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_arabic = mysqli_query($conn,$insert_student_final_ratings_arabic);

    if($run_student_final_ratings_arabic){
        echo "added to student final ratings arabic" . '<br>';
    }else{
        echo "Error student final ratings arabic" . '<br>';
    }

    //insert PHASE 2  ko sa FINAL RATINGS table PER SUBJECT islamic values

    $insert_student_final_ratings_islam = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$islamic_values','$phase2_final_rating_islamic_values', '$phase2_term5', '$phase2', '$phase2_final_rating_islamic_values_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_islam = mysqli_query($conn,$insert_student_final_ratings_islam);

    if($run_student_final_ratings_islam){
        echo "added to student final ratings islamic" . '<br>';
    }else{
        echo "Error student final ratings islamic" . '<br>';
    }


        //general averag of phase 2 term 5 
    $insert_phase2_term5_general_average = "INSERT INTO student_general_averages(lrn,general_average,term,phase,remarks,date_time_created,date_time_updated) 
    VALUES ('$lrn','$phase2_term5_general_average', '$phase2_term5','$phase2','$term1_phase2_remarks', '$dateCreated','$dateUpdated')";

    $run_phase2_term5_general_average = mysqli_query($conn,$insert_phase2_term5_general_average);

    if($run_phase2_term5_general_average){
        echo "added student averages term5";
    }else{
        echo "added student averages term5";
    }


    //// inserting of remedial here 

    for ($phase2_remedial_term = 1; $phase2_remedial_term <=2 ; $phase2_remedial_term++){

    if($phase2_remedial_term ==1){
        $phase2_remedial_query= "INSERT INTO `remedial_classes`(`lrn`, `date_from`, `date_to`, `learning_areas`, `final_rating`, `remedial_class_mark`, `recomputed_final_grade`, `phase`, `term`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase2_remedial_from','$phase2_remedial_to','$phase2_remedial_learning_areas_1',' $phase2_remedial_final_rating_1','$phase2_remedial_class_mark_1','$phase2_recomputed_final_grade_1','$phase2','$phase2_remedial_term','$phase2_remedial_remarks_1','$dateCreated','$dateUpdated')";
        $phase2_run_query = mysqli_query($conn,$phase2_remedial_query);

        if($phase2_run_query){
            echo "remedial query success <br>";
        }else
        {
            $conn->error;
        }
        
    }

        elseif($phase2_remedial_term ==2) {
           
        $phase2_remedial_query= "INSERT INTO `remedial_classes`(`lrn`, `date_from`, `date_to`, `learning_areas`, `final_rating`, `remedial_class_mark`, `recomputed_final_grade`, `phase`, `term`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase2_remedial_from','$phase2_remedial_to','$phase2_remedial_learning_areas_2',' $phase2_remedial_final_rating_2','$phase2_remedial_class_mark_2','$phase2_recomputed_final_grade_2','$phase2','$phase2_remedial_term','$phase2_remedial_remarks_2','$dateCreated','$dateUpdated')";
        $phase2_run_query = mysqli_query($conn,$phase2_remedial_query);

         if($phase2_run_query){
             echo "remedial query success term2  <br>";
        }else
        {
            $conn->error;
        }
    }   
}



}


////////////////////////////////END OF PHASE 2 ////////////////////////////////// 


/////////////////////////////////START OF PHASE 3 /////////////////////////////////////////////////

//Phase3 Insert Scholastic Records

    $phase3_insert_scholastic_records = "INSERT INTO scholastic_records (lrn,school,school_id,district,division,region,classified_as_grade,section,school_year,name_of_teacher,signature,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn' ,'$phase3_name_of_school', '$phase3_school_id' , '$phase3_district', '$phase3_division', '$phase3_region', '$phase3_classified_as_grade', '$phase3_section', '$phase3_school_year', '$phase3_name_of_school', '$phase3_signature', '$phase3','$phase3_remarks', '$dateCreated', '$dateUpdated')";
    $phase3_run_scholastic_records = mysqli_query($conn,$phase3_insert_scholastic_records);
if($phase3_run_scholastic_records){

    //inserting of students grades 

    //phase 3 term 1 mother tongue


    $insert_student_grades_term1_phase3_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term1_phase3_mother_tongue','$term1_phase3', '$phase3', '$term1_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase3_mother_tongue = mysqli_query($conn,$insert_student_grades_term1_phase3_mother_tongue);
    
    if($insert_student_grades_term1_phase3_mother_tongue){
        echo"term1 mothertongue";
    }

    else{
        $conn->error;;
    }

    //phase 3 term 1  filipino

    $insert_student_grades_term1_phase3_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term1_phase3_filipino','$term1_phase3', '$phase3', '$term1_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase3_filipino = mysqli_query($conn,$insert_student_grades_term1_phase3_filipino);
    
    if($insert_student_grades_term1_phase3_filipino){
        echo"term1 Filipino";
    }

    else{
        $conn->error;
    }

    //phase 3 term 1 english

    $insert_student_grades_term1_phase3_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term1_phase3_english','$term1_phase3', '$phase3', '$term1_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase3_english = mysqli_query($conn,$insert_student_grades_term1_phase3_english);
    
    if($insert_student_grades_term1_phase3_english){
        echo"term1 english";
    }

    else{
        $conn->error;
    }

    //phase 3 term 1 math

    $insert_student_grades_term1_phase3_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term1_phase3_mathematics','$term1_phase3', '$phase3', '$term1_phase3_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term1_phase3_math = mysqli_query($conn,$insert_student_grades_term1_phase3_math);
    
    if($insert_student_grades_term1_phase3_math){
        echo"term1 math";
    }

    else{
        $conn->error;
    }

    //phase 3 term 1  science

    $insert_student_grades_term1_phase3_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term1_phase3_science','$term1_phase3', '$phase3', '$term1_phase3_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term1_phase3_science = mysqli_query($conn,$insert_student_grades_term1_phase3_science);
    
    if($insert_student_grades_term1_phase3_science){
        echo"term1 science";
    }

    else{
        $conn->error;
    }

    //phase 3 term 1  ap

    $insert_student_grades_term1_phase3_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term1_phase3_araling_panlipunan','$term1_phase3', '$phase3', '$term1_phase3_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term1_phase3_ap = mysqli_query($conn,$insert_student_grades_term1_phase3_ap);
    
    if($insert_student_grades_term1_phase3_ap){
        echo"term1 Araling panlipunan";
    }

    else{
        $conn->error;
    }

    //phase 3 term 1  epp tle

    $insert_student_grades_term1_phase3_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term1_phase3_epp_tle','$term1_phase3', '$phase3', '$term1_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase3_epp_tle = mysqli_query($conn,$insert_student_grades_term1_phase3_epp_tle);
    
    if($insert_student_grades_term1_phase3_epp_tle){
        echo"term1 EPP_TLE";
    }

    else{
        $conn->error;
    }

    //phase 3 term 1 mapeh

    $insert_student_grades_term1_phase3_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term1_phase3_average_of_mapeh','$term1_phase3', '$phase3', '$term1_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase3_mapeh = mysqli_query($conn,$insert_student_grades_term1_phase3_mapeh);

      if($run_student_grades_term1_phase3_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }

        //phase 3 term 1 music

    $insert_student_grades_term1_phase3_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term1_phase3_music','$term1_phase3', '$phase3', '$term1_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase3_music = mysqli_query($conn,$insert_student_grades_term1_phase3_music);

       if($run_student_grades_term1_phase3_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }

        //phase 3 term 1  arts 

    $insert_student_grades_term1_phase3_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term1_phase3_arts','$term1_phase3', '$phase3', '$term1_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase3_arts = mysqli_query($conn,$insert_student_grades_term1_phase3_arts);


        if($run_student_grades_term1_phase3_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }

            //phase 3 term 1  pe

    $insert_student_grades_term1_phase3_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term1_phase3_pe','$term1_phase3', '$phase3', '$term1_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase3_pe = mysqli_query($conn,$insert_student_grades_term1_phase3_pe);

        if($run_student_grades_term1_phase3_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }

            //phase 3 term 1  health

    $insert_student_grades_term1_phase3_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term1_phase3_health','$term1_phase3', '$phase3', '$term1_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase3_health = mysqli_query($conn,$insert_student_grades_term1_phase3_health);

         if($run_student_grades_term1_phase3_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }


            //phase 3 term 1  esp

    $insert_student_grades_term1_phase3_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term1_phase3_esp','$term1_phase3', '$phase3', '$term1_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase3_esp = mysqli_query($conn,$insert_student_grades_term1_phase3_esp);

        if($run_student_grades_term1_phase3_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }


            //phase 3 term 1  arabic

    $insert_student_grades_term1_phase3_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term1_phase3_arabic_language','$term1_phase3', '$phase3', '$term1_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase3_arabic = mysqli_query($conn,$insert_student_grades_term1_phase3_arabic);

    if($run_student_grades_term1_phase3_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }

        //phase 3 term 1  islamic

    $insert_student_grades_term1_phase3_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$islamic_values', '$term1_phase3_islamic_values','$term1_phase3', '$phase3', '$term1_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase3_islamic = mysqli_query($conn,$insert_student_grades_term1_phase3_islamic);

    if($run_student_grades_term1_phase3_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term1_phase3 islamic" . '<br>';
        }
            //general average term 1 phase 3
        $insert_phase3_term1_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase3_term1_general_average','$term1_phase3','$phase3','$phase3_remarks','$dateCreated','$dateUpdated');";
        $run_phase3_term1_student_averages = mysqli_query($conn,$insert_phase3_term1_general_average);

        if($run_phase3_term1_student_averages){
            echo "added student averages term1";
        
            
        }else{
            echo "error student_averages" . $conn->error;
        }
        ////// end of phase 3 term 1

        //inserting of grades 




        // phase 3 term 2 mother tongue


        $insert_student_grades_term2_phase3_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term2_phase3_mother_tongue','$term2_phase3', '$phase3', '$term2_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase3_mother_tongue = mysqli_query($conn,$insert_student_grades_term2_phase3_mother_tongue);
    
    if($insert_student_grades_term2_phase3_mother_tongue){
        echo"term2 mothertongue";
    }

    else{
        $conn->error;;
    }

    //phase 3 term 2 filipino

    $insert_student_grades_term2_phase3_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term2_phase3_filipino','$term2_phase3', '$phase3', '$term2_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase3_filipino = mysqli_query($conn,$insert_student_grades_term2_phase3_filipino);
    
    if($insert_student_grades_term2_phase3_filipino){
        echo"term2 Filipino";
    }

    else{
        $conn->error;
    }

    //phase 3 term 2 english

    $insert_student_grades_term2_phase3_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term2_phase3_english','$term2_phase3', '$phase3', '$term2_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase3_english = mysqli_query($conn,$insert_student_grades_term2_phase3_english);
    
    if($insert_student_grades_term2_phase3_english){
        echo"term2 english";
    }

    else{
        $conn->error;
    }

    //phase 3 term 2 math

    $insert_student_grades_term2_phase3_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term2_phase3_mathematics','$term2_phase3', '$phase3', '$term2_phase3_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term2_phase3_math = mysqli_query($conn,$insert_student_grades_term2_phase3_math);
    
    if($insert_student_grades_term2_phase3_math){
        echo"term2 math";
    }

    else{
        $conn->error;
    }

    //phase 3 term 2 science

    $insert_student_grades_term2_phase3_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term2_phase3_science','$term2_phase3', '$phase3', '$term2_phase3_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term2_phase3_science = mysqli_query($conn,$insert_student_grades_term2_phase3_science);
    
    if($insert_student_grades_term2_phase3_science){
        echo"term2 science";
    }

    else{
        $conn->error;
    }

    //phase 3 term 2 ap 

    $insert_student_grades_term2_phase3_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term2_phase3_araling_panlipunan','$term2_phase3', '$phase3', '$term2_phase3_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term2_phase3_ap = mysqli_query($conn,$insert_student_grades_term2_phase3_ap);
    
    if($insert_student_grades_term2_phase3_ap){
        echo"term2 Araling panlipunan";
    }

    else{
        $conn->error;
    }

    //phase 3 term 2 tle epp

    $insert_student_grades_term2_phase3_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term2_phase3_epp_tle','$term2_phase3', '$phase3', '$term2_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase3_epp_tle = mysqli_query($conn,$insert_student_grades_term2_phase3_epp_tle);
    
    if($insert_student_grades_term2_phase3_epp_tle){
        echo"term2 EPP_TLE";
    }

    else{
        $conn->error;
    }

    //phase 3 term 2 mapeh

    $insert_student_grades_term2_phase3_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term2_phase3_average_of_mapeh','$term2_phase3', '$phase3', '$term2_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase3_mapeh = mysqli_query($conn,$insert_student_grades_term2_phase3_mapeh);

      if($run_student_grades_term2_phase3_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }

        //phase 3 term 2 music

    $insert_student_grades_term2_phase3_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term2_phase3_music','$term2_phase3', '$phase3', '$term2_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase3_music = mysqli_query($conn,$insert_student_grades_term2_phase3_music);

       if($run_student_grades_term2_phase3_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }

        //phase 3 term 2 arts 
    $insert_student_grades_term2_phase3_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term2_phase3_arts','$term2_phase3', '$phase3', '$term2_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase3_arts = mysqli_query($conn,$insert_student_grades_term2_phase3_arts);


        if($run_student_grades_term2_phase3_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }


            //phase 3 term 2 pe


    $insert_student_grades_term2_phase3_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term2_phase3_pe','$term2_phase3', '$phase3', '$term2_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase3_pe = mysqli_query($conn,$insert_student_grades_term2_phase3_pe);

        if($run_student_grades_term2_phase3_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }

            //phase 3 term 2 health

    $insert_student_grades_term2_phase3_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term2_phase3_health','$term2_phase3', '$phase3', '$term2_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase3_health = mysqli_query($conn,$insert_student_grades_term2_phase3_health);

         if($run_student_grades_term2_phase3_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }


            //phase 3 term 2 ESP 

    $insert_student_grades_term2_phase3_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term2_phase3_esp','$term2_phase3', '$phase3', '$term2_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase3_esp = mysqli_query($conn,$insert_student_grades_term2_phase3_esp);

        if($run_student_grades_term2_phase3_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }


                //phase 3 term 2 arabic language

    $insert_student_grades_term2_phase3_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term2_phase3_arabic_language','$term2_phase3', '$phase3', '$term2_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase3_arabic = mysqli_query($conn,$insert_student_grades_term2_phase3_arabic);

    if($run_student_grades_term2_phase3_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }


        //phase 3 term 2 islamic

    $insert_student_grades_term2_phase3_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$islamic_values', '$term2_phase3_islamic_values','$term2_phase3', '$phase3', '$term2_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase3_islamic = mysqli_query($conn,$insert_student_grades_term2_phase3_islamic);

    if($run_student_grades_term2_phase3_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term2_phase3 islamic" . '<br>';
        }




            // general average of term 2

            $insert_phase3_term2_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase3_term2_general_average','$term2_phase3','$phase3',' $term2_phase3_remarks','$dateCreated','$dateUpdated');";
        $run_phase3_term2_student_averages = mysqli_query($conn,$insert_phase3_term2_general_average);

        if($run_phase3_term2_student_averages){
            echo "added student averages term1";
            
        }else{
            echo "error student_averages" . $conn->error;
        }

        ///////////phase 3 term 2 ends here ////////////////

            // inserting of grades phase 3 term 3


        //phase 3 term 3 mother tongue

        $insert_student_grades_term3_phase3_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term3_phase3_mother_tongue','$term3_phase3', '$phase3', '$term3_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase3_mother_tongue = mysqli_query($conn,$insert_student_grades_term3_phase3_mother_tongue);
    
    if($insert_student_grades_term3_phase3_mother_tongue){
        echo"term3 mothertongue";
    }

    else{
        $conn->error;;
    }

     //phase 3 term 3  filipino

    $insert_student_grades_term3_phase3_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term3_phase3_filipino','$term3_phase3', '$phase3', '$term3_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase3_filipino = mysqli_query($conn,$insert_student_grades_term3_phase3_filipino);
    
    if($insert_student_grades_term3_phase3_filipino){
        echo"term3 Filipino";
    }

    else{
        $conn->error;
    }

     //phase 3 term 3  english 

    $insert_student_grades_term3_phase3_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term3_phase3_english','$term3_phase3', '$phase3', '$term3_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase3_english = mysqli_query($conn,$insert_student_grades_term3_phase3_english);
    
    if($insert_student_grades_term3_phase3_english){
        echo"term3 english";
    }

    else{
        $conn->error;
    }

     //phase 3 term 3 math

    $insert_student_grades_term3_phase3_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term3_phase3_mathematics','$term3_phase3', '$phase3', '$term3_phase3_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term3_phase3_math = mysqli_query($conn,$insert_student_grades_term3_phase3_math);
    
    if($insert_student_grades_term3_phase3_math){
        echo"term3 math";
    }

    else{
        $conn->error;
    }

     //phase 3 term 3 science

    $insert_student_grades_term3_phase3_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term3_phase3_science','$term3_phase3', '$phase3', '$term3_phase3_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term3_phase3_science = mysqli_query($conn,$insert_student_grades_term3_phase3_science);
    
    if($insert_student_grades_term3_phase3_science){
        echo"term3 science";
    }

    else{
        $conn->error;
    }

     //phase 3 term 3 ap

    $insert_student_grades_term3_phase3_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term3_phase3_araling_panlipunan','$term3_phase3', '$phase3', '$term3_phase3_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term3_phase3_ap = mysqli_query($conn,$insert_student_grades_term3_phase3_ap);
    
    if($insert_student_grades_term3_phase3_ap){
        echo"term3 Araling panlipunan";
    }

    else{
        $conn->error;
    }

     //phase 3 term 3  epp tle 

    $insert_student_grades_term3_phase3_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term3_phase3_epp_tle','$term3_phase3', '$phase3', '$term3_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase3_epp_tle = mysqli_query($conn,$insert_student_grades_term3_phase3_epp_tle);
    
    if($insert_student_grades_term3_phase3_epp_tle){
        echo"term3 EPP_TLE";
    }

    else{
        $conn->error;
    }

     //phase 3 term 3  mapeh

    $insert_student_grades_term3_phase3_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term3_phase3_average_of_mapeh','$term3_phase3', '$phase3', '$term3_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase3_mapeh = mysqli_query($conn,$insert_student_grades_term3_phase3_mapeh);

      if($run_student_grades_term3_phase3_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }

         //phase 3 term 3  music

    $insert_student_grades_term3_phase3_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term3_phase3_music','$term3_phase3', '$phase3', '$term3_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase3_music = mysqli_query($conn,$insert_student_grades_term3_phase3_music);

       if($run_student_grades_term3_phase3_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }

         //phase 3 term 3  arts 

    $insert_student_grades_term3_phase3_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term3_phase3_arts','$term3_phase3', '$phase3', '$term3_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase3_arts = mysqli_query($conn,$insert_student_grades_term3_phase3_arts);


        if($run_student_grades_term3_phase3_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }


             //phase 3 term 3  pe

    $insert_student_grades_term3_phase3_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term3_phase3_pe','$term3_phase3', '$phase3', '$term3_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase3_pe = mysqli_query($conn,$insert_student_grades_term3_phase3_pe);

        if($run_student_grades_term3_phase3_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }


             //phase 3 term 3 health

    $insert_student_grades_term3_phase3_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term3_phase3_health','$term3_phase3', '$phase3', '$term3_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase3_health = mysqli_query($conn,$insert_student_grades_term3_phase3_health);

         if($run_student_grades_term3_phase3_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }

             //phase 3 term 3  esp

    $insert_student_grades_term3_phase3_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term3_phase3_esp','$term3_phase3', '$phase3', '$term3_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase3_esp = mysqli_query($conn,$insert_student_grades_term3_phase3_esp);

        if($run_student_grades_term3_phase3_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }

             //phase 3 term 3 arabic 

    $insert_student_grades_term3_phase3_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term3_phase3_arabic_language','$term3_phase3', '$phase3', '$term3_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase3_arabic = mysqli_query($conn,$insert_student_grades_term3_phase3_arabic);

    if($run_student_grades_term3_phase3_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }   

         //phase 3 term 3 islam allahu hakbar

    $insert_student_grades_term3_phase3_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$islamic_values', '$term3_phase3_islamic_values','$term3_phase3', '$phase3', '$term3_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase3_islamic = mysqli_query($conn,$insert_student_grades_term3_phase3_islamic);

    if($run_student_grades_term3_phase3_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term3_phase3 islamic" . '<br>';
        }




            // general average of term 3

            $insert_phase3_term3_general_average = "INSERT INTO student_general_averages (`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase3_term3_general_average','$term3_phase3','$phase3',' $term3_phase3_remarks','$dateCreated','$dateUpdated');";
        $run_phase3_term3_student_averages = mysqli_query($conn,$insert_phase3_term3_general_average);

        if($run_phase3_term3_student_averages){
            echo "added student averages term1";
           
        }else{
            echo "error student_averages" . $conn->error;
        }
        
         //phase 3 term 3  ends here///////////////////////////////////////

         //inserting of grades 

        // phase 3 term 4 mother tongue



        $insert_student_grades_term4_phase3_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term4_phase3_mother_tongue','$term4_phase3', '$phase3', '$term4_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase3_mother_tongue = mysqli_query($conn,$insert_student_grades_term4_phase3_mother_tongue);
    
    if($insert_student_grades_term4_phase3_mother_tongue){
        echo"term4 mothertongue";
    }

    else{
        $conn->error;;
    }

     // phase 3 term 4 filipino

    $insert_student_grades_term4_phase3_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term4_phase3_filipino','$term4_phase3', '$phase3', '$term4_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase3_filipino = mysqli_query($conn,$insert_student_grades_term4_phase3_filipino);
    
    if($insert_student_grades_term4_phase3_filipino){
        echo"term4 Filipino";
    }

    else{
        $conn->error;
    }

     // phase 3 term 4 english 

    $insert_student_grades_term4_phase3_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term4_phase3_english','$term4_phase3', '$phase3', '$term4_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase3_english = mysqli_query($conn,$insert_student_grades_term4_phase3_english);
    
    if($insert_student_grades_term4_phase3_english){
        echo"term4 english";
    }

    else{
        $conn->error;
    }

     // phase 3 term 4 math

    $insert_student_grades_term4_phase3_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term4_phase3_mathematics','$term4_phase3', '$phase3', '$term4_phase3_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term4_phase3_math = mysqli_query($conn,$insert_student_grades_term4_phase3_math);
    
    if($insert_student_grades_term4_phase3_math){
        echo"term4 math";
    }

    else{
        $conn->error;
    }

     // phase 3 term 4 science

    $insert_student_grades_term4_phase3_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term4_phase3_science','$term4_phase3', '$phase3', '$term4_phase3_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term4_phase3_science = mysqli_query($conn,$insert_student_grades_term4_phase3_science);
    
    if($insert_student_grades_term4_phase3_science){
        echo"term4 science";
    }

    else{
        $conn->error;
    }

     // phase 3 term 4  ap

    $insert_student_grades_term4_phase3_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term4_phase3_araling_panlipunan','$term4_phase3', '$phase3', '$term4_phase3_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term4_phase3_ap = mysqli_query($conn,$insert_student_grades_term4_phase3_ap);
    
    if($insert_student_grades_term4_phase3_ap){
        echo"term4 Araling panlipunan";
    }

    else{
        $conn->error;
    }

     // phase 3 term 4 epp tle

    $insert_student_grades_term4_phase3_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term4_phase3_epp_tle','$term4_phase3', '$phase3', '$term4_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase3_epp_tle = mysqli_query($conn,$insert_student_grades_term4_phase3_epp_tle);
    
    if($insert_student_grades_term4_phase3_epp_tle){
        echo"term4 EPP_TLE";
    }

    else{
        $conn->error;
    }


     // phase 3 term 4 mapeh

    $insert_student_grades_term4_phase3_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term4_phase3_average_of_mapeh','$term4_phase3', '$phase3', '$term4_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase3_mapeh = mysqli_query($conn,$insert_student_grades_term4_phase3_mapeh);

      if($run_student_grades_term4_phase3_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }

         // phase 3 term 4  music

    $insert_student_grades_term4_phase3_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term4_phase3_music','$term4_phase3', '$phase3', '$term4_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase3_music = mysqli_query($conn,$insert_student_grades_term4_phase3_music);

       if($run_student_grades_term4_phase3_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }

         // phase 3 term 4 arts

    $insert_student_grades_term4_phase3_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term4_phase3_arts','$term4_phase3', '$phase3', '$term4_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase3_arts = mysqli_query($conn,$insert_student_grades_term4_phase3_arts);


        if($run_student_grades_term4_phase3_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }

             // phase 3 term 4  pe
    $insert_student_grades_term4_phase3_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term4_phase3_pe','$term4_phase3', '$phase3', '$term4_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase3_pe = mysqli_query($conn,$insert_student_grades_term4_phase3_pe);

        if($run_student_grades_term4_phase3_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }


             // phase 3 term 4  health

    $insert_student_grades_term4_phase3_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term4_phase3_health','$term4_phase3', '$phase3', '$term4_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase3_health = mysqli_query($conn,$insert_student_grades_term4_phase3_health);

         if($run_student_grades_term4_phase3_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }

             // phase 3 term 4  esp 

    $insert_student_grades_term4_phase3_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term4_phase3_esp','$term4_phase3', '$phase3', '$term4_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase3_esp = mysqli_query($conn,$insert_student_grades_term4_phase3_esp);

        if($run_student_grades_term4_phase3_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }

             // phase 3 term 4  arabic
    $insert_student_grades_term4_phase3_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term4_phase3_arabic_language','$term4_phase3', '$phase3', '$term4_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase3_arabic = mysqli_query($conn,$insert_student_grades_term4_phase3_arabic);

    if($run_student_grades_term4_phase3_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }

         // phase 3 term 4  islamic

    $insert_student_grades_term4_phase3_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn',' $islamic_values', '$term4_phase3_islamic_values','$term4_phase3', '$phase3', '$term4_phase3_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase3_islamic = mysqli_query($conn,$insert_student_grades_term4_phase3_islamic);

    if($run_student_grades_term4_phase3_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term4_phase3 islamic" . '<br>';
        }




            // general average of term 4

            $insert_phase3_term4_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase3_term4_general_average','$term4_phase3','$phase3',' $term4_phase3_remarks','$dateCreated','$dateUpdated');";
        $run_phase3_term4_student_averages = mysqli_query($conn,$insert_phase3_term4_general_average);

        if($run_phase3_term4_student_averages){
            echo "added student averages term1";
            
        }else{
            echo "error student_averages" . $conn->error;
        }
         // phase 3 term 4  ends here /////////////////////

         //inserting of final rating 

         //insert PHASE 3 ko sa FINAL RATINGS table PER SUBJECT mother tongue

        $insert_student_final_ratings_mt = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$mother_tongue','$phase3_final_rating_mother_tongue', '$phase3_term5', '$phase3', '$phase3_final_rating_mother_tongue_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_mt = mysqli_query($conn,$insert_student_final_ratings_mt);

    if($run_student_final_ratings_mt){
        echo "added to student final ratings MT" . '<br>';
    }else{
        echo "Error student final ratings MT" . '<br>';
    }

        //insert PHASE 3 ko sa FINAL RATINGS table PER SUBJECT filipino

    $insert_student_final_ratings_filipino = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$filipino', '$phase3_final_rating_filipino','$phase3_term5', '$phase3', '$phase3_final_rating_filipino_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_filipino = mysqli_query($conn,$insert_student_final_ratings_filipino);

    if($run_student_final_ratings_filipino){
        echo "added to student final ratings filipino" . '<br>';
    }else{
        echo "Error student final ratings filipino" . '<br>';
    }

    //insert PHASE 3 ko sa FINAL RATINGS table PER SUBJECT English

    $insert_student_final_ratings_english = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$english','$phase3_final_rating_english', '$phase3_term5', '$phase3', '$phase3_final_rating_english_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_english = mysqli_query($conn,$insert_student_final_ratings_english);

    if($run_student_final_ratings_english){
        echo "added to student final ratings english" . '<br>';
    }else{
        echo "Error student final ratings english" . '<br>';
    }

    //insert PHASE 3 ko sa FINAL RATINGS table PER SUBJECT Math

    $insert_student_final_ratings_math = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$math','$phase3_final_rating_math', '$phase3_term5', '$phase3', '$phase3_final_rating_math_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_math = mysqli_query($conn,$insert_student_final_ratings_math);

    if($run_student_final_ratings_math){
        echo "added to student final ratings math" . '<br>';
    }else{
        echo "Error student final ratings math" . '<br>';
    }

    //insert PHASE 3 ko sa FINAL RATINGS table PER SUBJECT Science

    $insert_student_final_ratings_science = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$science','$phase3_final_rating_science', '$phase3_term5', '$phase3', '$phase3_final_rating_science_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_science = mysqli_query($conn,$insert_student_final_ratings_science);

    if($run_student_final_ratings_science){
        echo "added to student final ratings math" . '<br>';
    }else{
        echo "Error student final ratings math" . '<br>';
    }

    //insert PHASE 3 ko sa FINAL RATINGS table PER SUBJECT AP

    $insert_student_final_ratings_AP = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$AP','$phase3_final_rating_AP', '$phase3_term5', '$phase3', '$phase3_final_rating_AP_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_AP = mysqli_query($conn,$insert_student_final_ratings_AP);

    if($run_student_final_ratings_AP){
        echo "added to student final ratings AP" . '<br>';
    }else{
        echo "Error student final ratings AP" . '<br>';
    }

    //insert PHASE 3 ko sa FINAL RATINGS table PER SUBJECT EPP / TLE

    $insert_student_final_ratings_epp_tle = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$epp_tle','$phase3_final_rating_epp_tle', '$phase3_term5', '$phase3', '$phase3_final_rating_epp_tle_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_epp_tle = mysqli_query($conn,$insert_student_final_ratings_epp_tle);

    if($run_student_final_ratings_epp_tle){
        echo "added to student final ratings epp tle" . '<br>';
    }else{
        echo "Error student final ratings epp tle" . '<br>';
    }

    //insert PHASE 3 ko sa FINAL RATINGS table PER SUBJECT MAPEH

    $insert_student_final_ratings_mapeh = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$mapeh','$phase3_final_rating_mapeh', '$phase3_term5', '$phase3', '$phase3_final_rating_mapeh_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_mapeh = mysqli_query($conn,$insert_student_final_ratings_mapeh);

    if($run_student_final_ratings_mapeh){
        echo "added to student final ratings mapeh" . '<br>';
    }else{
        echo "Error student final ratings mapeh" . '<br>';
    }

    //insert PHASE 3 ko sa FINAL RATINGS table PER SUBJECT music

    $insert_student_final_ratings_music = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$music','$phase3_final_rating_music', '$phase3_term5', '$phase3', '$phase3_final_rating_music_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_music = mysqli_query($conn,$insert_student_final_ratings_music);

    if($run_student_final_ratings_music){
        echo "added to student final ratings music" . '<br>';
    }else{
        echo "Error student final ratings music" . '<br>';
    }

    //insert PHASE 3 ko sa FINAL RATINGS table PER SUBJECT arts

    $insert_student_final_ratings_arts = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$arts','$phase3_final_rating_arts', '$phase3_term5', '$phase3', '$phase3_final_rating_arts_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_arts = mysqli_query($conn,$insert_student_final_ratings_arts);

    if($run_student_final_ratings_music){
        echo "added to student final ratings arts" . '<br>';
    }else{
        echo "Error student final ratings arts" . '<br>';
    }

    //insert PHASE 3 ko sa FINAL RATINGS table PER SUBJECT pe

    $insert_student_final_ratings_pe = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$PE','$phase3_final_rating_PE', '$phase3_term5', '$phase3', '$phase3_final_rating_PE_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_pe = mysqli_query($conn,$insert_student_final_ratings_pe);

    if($run_student_final_ratings_pe){
        echo "added to student final ratings PE" . '<br>';
    }else{
        echo "Error student final ratings PE" . '<br>';
    }

    //insert PHASE 3 ko sa FINAL RATINGS table PER SUBJECT health

    $insert_student_final_ratings_health = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$health','$phase3_final_rating_health', '$phase3_term5', '$phase3', '$phase3_final_rating_health_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_health = mysqli_query($conn,$insert_student_final_ratings_health);

    if($run_student_final_ratings_pe){
        echo "added to student final ratings health" . '<br>';
    }else{
        echo "Error student final ratings health" . '<br>';
    }

    //insert PHASE 3 ko sa FINAL RATINGS table PER SUBJECT ESP

    $insert_student_final_ratings_esp = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$esp', '$phase3_final_rating_esp','$phase3_term5', '$phase3', '$phase3_final_rating_esp_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_esp = mysqli_query($conn,$insert_student_final_ratings_esp);

    if($run_student_final_ratings_pe){
        echo "added to student final ratings esp" . '<br>';
    }else{
        echo "Error student final ratings esp" . '<br>';
    }


    //insert PHASE 3 ko sa FINAL RATINGS table PER SUBJECT arabic language

    $insert_student_final_ratings_arabic = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$arabic_language', '$phase3_final_rating_arabic_language','$phase3_term5', '$phase3', '$phase3_final_rating_arabic_language_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_arabic = mysqli_query($conn,$insert_student_final_ratings_arabic);


    if($run_student_final_ratings_arabic){
        echo "added to student final ratings arabic" . '<br>';
    }else{
        echo "Error student final ratings arabic" . $conn->error;
    }

    //insert PHASE 3 ko sa FINAL RATINGS table PER SUBJECT islamic values

    $insert_student_final_ratings_islam = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$islamic_values','$phase3_final_rating_arabic_language', '$phase3_term5', '$phase3', '$phase3_final_rating_islamic_values_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_islam = mysqli_query($conn,$insert_student_final_ratings_islam);

    if($run_student_final_ratings_islam){
        echo "added to student final ratings islamic" . '<br>';
    }else{
        echo "Error student final ratings islamic" . '<br>';
    }


        //general average of phase 3 term 5 
    $insert_phase3_term5_general_average = "INSERT INTO student_general_averages(lrn,general_average,term,phase,remarks,date_time_created,date_time_updated) 
    VALUES ('$lrn','$phase3_term5_general_average', '$phase3_term5','$phase3','$term1_phase3_remarks', '$dateCreated','$dateUpdated')";

    $run_phase3_term5_general_average = mysqli_query($conn,$insert_phase3_term5_general_average);

    if($run_phase3_term5_general_average){
        echo "added student averages term5";
    }else{
        echo "added student averages term5";
    }



        // inserting of  remedial phase 3


        for ($phase3_remedial_term = 1; $phase3_remedial_term <=2 ; $phase3_remedial_term++){

        if($phase3_remedial_term ==1){
            $phase3_remedial_query= "INSERT INTO `remedial_classes`(`lrn`, `date_from`, `date_to`, `learning_areas`, `final_rating`, `remedial_class_mark`, `recomputed_final_grade`, `phase`, `term`, `remarks`, `date_time_created`, `date_time_updated`) 
            VALUES ('$lrn','$phase3_remedial_from','$phase3_remedial_to','$phase3_remedial_learning_areas_1',' $phase3_remedial_final_rating_1','$phase3_remedial_class_mark_1','$phase3_recomputed_final_grade_1','$phase3','$phase3_remedial_term','$phase3_remedial_remarks_1','$dateCreated','$dateUpdated')";
            
            $phase3_run_query = mysqli_query($conn,$phase3_remedial_query);
        
            if($phase3_run_query){
            echo "remedial query success <br>";
            }
            else
            {
                $conn->error;
            }
            
        }elseif($phase3_remedial_term ==2) {
            $phase3_remedial_query= "INSERT INTO `remedial_classes`(`lrn`, `date_from`, `date_to`, `learning_areas`, `final_rating`, `remedial_class_mark`, `recomputed_final_grade`, `phase`, `term`, `remarks`, `date_time_created`, `date_time_updated`) 
            VALUES ('$lrn','$phase3_remedial_from','$phase3_remedial_to','$phase3_remedial_learning_areas_2',' $phase3_remedial_final_rating_2','$phase3_remedial_class_mark_2','$phase3_recomputed_final_grade_2','$phase3','$phase3_remedial_term','$phase3_remedial_remarks_2','$dateCreated','$dateUpdated')";
            $phase3_run_query = mysqli_query($conn,$phase3_remedial_query);
                if($phase3_run_query){
                    echo "remedial query success term2  <br>";
                }else{
                        $conn->error;
                    }
                 }      
            }

}

/////////////////////////////////END OF PHASE 3 /////////////////////////////////


/////////////////////////////////////////START OF PHASE 4 /////////////////////////////////////

//Phase4 Insert Scholastic Records

$phase4_insert_scholastic_records = "INSERT INTO scholastic_records (lrn,school,school_id,district,division,region,classified_as_grade,section,school_year,name_of_teacher,signature,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn' ,'$phase4_name_of_school', '$phase4_school_id' , '$phase4_district', '$phase4_division', '$phase4_region', '$phase4_classified_as_grade', '$phase4_section', '$phase4_school_year', '$phase4_name_of_school', '$phase4_signature', '$phase4','$phase4_remarks', '$dateCreated', '$dateUpdated')";

$phase4_run_scholastic_records = mysqli_query($conn,$phase4_insert_scholastic_records);
if($phase4_run_scholastic_records){

    //inserting of students grades

    //phase 4 term 1 mother tongue


    $insert_student_grades_term1_phase4_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term1_phase4_mother_tongue','$term1_phase4', '$phase4', '$term1_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase4_mother_tongue = mysqli_query($conn,$insert_student_grades_term1_phase4_mother_tongue);
    
    if($insert_student_grades_term1_phase4_mother_tongue){
        echo"term1 mothertongue";
    }

    else{
        $conn->error;
    }


    //phase 4 term 1 filipino

    $insert_student_grades_term1_phase4_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term1_phase4_filipino','$term1_phase4', '$phase4', '$term1_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase4_filipino = mysqli_query($conn,$insert_student_grades_term1_phase4_filipino);
    
    if($insert_student_grades_term1_phase4_filipino){
        echo"term1 Filipino";
    }

    else{
        $conn->error;
    }

    //phase 4 term 1 english 

    $insert_student_grades_term1_phase4_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term1_phase4_english','$term1_phase4', '$phase4', '$term1_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase4_english = mysqli_query($conn,$insert_student_grades_term1_phase4_english);
    
    if($insert_student_grades_term1_phase4_english){
        echo"term1 english";
    }

    else{
        $conn->error;
    }

    //phase 4 term 1  math 

    $insert_student_grades_term1_phase4_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term1_phase4_mathematics','$term1_phase4', '$phase4', '$term1_phase4_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term1_phase4_math = mysqli_query($conn,$insert_student_grades_term1_phase4_math);
    
    if($insert_student_grades_term1_phase4_math){
        echo"term1 math";
    }

    else{
        $conn->error;
    }


    //phase 4 term 1 science

    $insert_student_grades_term1_phase4_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term1_phase4_science','$term1_phase4', '$phase4', '$term1_phase4_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term1_phase4_science = mysqli_query($conn,$insert_student_grades_term1_phase4_science);
    
    if($insert_student_grades_term1_phase4_science){
        echo"term1 science";
    }

    else{
        $conn->error;
    }

    //phase 4 term 1  ap 

    $insert_student_grades_term1_phase4_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term1_phase4_araling_panlipunan','$term1_phase4', '$phase4', '$term1_phase4_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term1_phase4_ap = mysqli_query($conn,$insert_student_grades_term1_phase4_ap);
    
    if($insert_student_grades_term1_phase4_ap){
        echo"term1 Araling panlipunan";
    }

    else{
        $conn->error;
    }

    //phase 4 term 1 tle 

    $insert_student_grades_term1_phase4_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term1_phase4_epp_tle','$term1_phase4', '$phase4', '$term1_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase4_epp_tle = mysqli_query($conn,$insert_student_grades_term1_phase4_epp_tle);
    
    if($insert_student_grades_term1_phase4_epp_tle){
        echo"term1 EPP_TLE";
    }

    else{
        $conn->error;
    }

    //phase 4 term 1 mapeh 

    $insert_student_grades_term1_phase4_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term1_phase4_average_of_mapeh','$term1_phase4', '$phase4', '$term1_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase4_mapeh = mysqli_query($conn,$insert_student_grades_term1_phase4_mapeh);

      if($run_student_grades_term1_phase4_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }

        //phase 4 term 1 music 

    $insert_student_grades_term1_phase4_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term1_phase4_music','$term1_phase4', '$phase4', '$term1_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase4_music = mysqli_query($conn,$insert_student_grades_term1_phase4_music);

       if($run_student_grades_term1_phase4_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }

         //phase 4 term 1  arts 
    $insert_student_grades_term1_phase4_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term1_phase4_arts','$term1_phase4', '$phase4', '$term1_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase4_arts = mysqli_query($conn,$insert_student_grades_term1_phase4_arts);


        if($run_student_grades_term1_phase4_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }

            //phase 4 term 1  pe 
    $insert_student_grades_term1_phase4_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term1_phase4_pe','$term1_phase4', '$phase4', '$term1_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase4_pe = mysqli_query($conn,$insert_student_grades_term1_phase4_pe);

        if($run_student_grades_term1_phase4_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }

            //phase 4 term 1  health 

    $insert_student_grades_term1_phase4_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term1_phase4_health','$term1_phase4', '$phase4', '$term1_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase4_health = mysqli_query($conn,$insert_student_grades_term1_phase4_health);

         if($run_student_grades_term1_phase4_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }

            //phase 4 term 1  esp 

    $insert_student_grades_term1_phase4_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term1_phase4_esp','$term1_phase4', '$phase4', '$term1_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase4_esp = mysqli_query($conn,$insert_student_grades_term1_phase4_esp);

        if($run_student_grades_term1_phase4_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }

            //phase 4 term 1  arabic

    $insert_student_grades_term1_phase4_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term1_phase4_arabic_language','$term1_phase4', '$phase4', '$term1_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase4_arabic = mysqli_query($conn,$insert_student_grades_term1_phase4_arabic);

    if($run_student_grades_term1_phase4_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }

        //phase 4 term 1  islamic 

    $insert_student_grades_term1_phase4_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$islamic_values', '$term1_phase4_islamic_values','$term1_phase4', '$phase4', '$term1_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase4_islamic = mysqli_query($conn,$insert_student_grades_term1_phase4_islamic);

    if($run_student_grades_term1_phase4_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term1_phase4 islamic" . '<br>';
        }
            //general average
        $insert_phase4_term1_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase4_term1_general_average','$term1_phase4','$phase4','$phase4_remarks','$dateCreated','$dateUpdated');";
        $run_phase4_term1_student_averages = mysqli_query($conn,$insert_phase4_term1_general_average);

        if($run_phase4_term1_student_averages){
            echo "added student averages term1";
        
            
        }else{
            echo "error student_averages" . $conn->error;
        }
            //phase 4 term 1  ends here//


            //inserting of grades phase 4 term 2 

        // phase 4 term 2 mother tongue   


        $insert_student_grades_term2_phase4_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term2_phase4_mother_tongue','$term2_phase4', '$phase4', '$term2_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase4_mother_tongue = mysqli_query($conn,$insert_student_grades_term2_phase4_mother_tongue);
    
    if($insert_student_grades_term2_phase4_mother_tongue){
        echo"term2 mothertongue";
    }

    else{
        $conn->error;;
    }

    // phase 4 term 2 filipino

    $insert_student_grades_term2_phase4_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term2_phase4_filipino','$term2_phase4', '$phase4', '$term2_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase4_filipino = mysqli_query($conn,$insert_student_grades_term2_phase4_filipino);
    
    if($insert_student_grades_term2_phase4_filipino){
        echo"term2 Filipino";
    }

    else{
        $conn->error;
    }

    // phase 4 term 2  english 


    $insert_student_grades_term2_phase4_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term2_phase4_english','$term2_phase4', '$phase4', '$term2_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase4_english = mysqli_query($conn,$insert_student_grades_term2_phase4_english);
    
    if($insert_student_grades_term2_phase4_english){
        echo"term2 english";
    }

    else{
        $conn->error;
    }

    // phase 4 term 2  math

    $insert_student_grades_term2_phase4_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term2_phase4_mathematics','$term2_phase4', '$phase4', '$term2_phase4_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term2_phase4_math = mysqli_query($conn,$insert_student_grades_term2_phase4_math);
    
    if($insert_student_grades_term2_phase4_math){
        echo"term2 math";
    }

    else{
        $conn->error;
    }

    // phase 4 term 2  science

    $insert_student_grades_term2_phase4_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term2_phase4_science','$term2_phase4', '$phase4', '$term2_phase4_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term2_phase4_science = mysqli_query($conn,$insert_student_grades_term2_phase4_science);
    
    if($insert_student_grades_term2_phase4_science){
        echo"term2 science";
    }

    else{
        $conn->error;
    }

    // phase 4 term 2  ap

    $insert_student_grades_term2_phase4_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term2_phase4_araling_panlipunan','$term2_phase4', '$phase4', '$term2_phase4_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term2_phase4_ap = mysqli_query($conn,$insert_student_grades_term2_phase4_ap);
    
    if($insert_student_grades_term2_phase4_ap){
        echo"term2 Araling panlipunan";
    }

    else{
        $conn->error;
    }

    // phase 4 term 2  epp tle 

    $insert_student_grades_term2_phase4_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term2_phase4_epp_tle','$term2_phase4', '$phase4', '$term2_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase4_epp_tle = mysqli_query($conn,$insert_student_grades_term2_phase4_epp_tle);
    
    if($insert_student_grades_term2_phase4_epp_tle){
        echo"term2 EPP_TLE";
    }

    else{
        $conn->error;
    }

    // phase 4 term 2  mapeh

    $insert_student_grades_term2_phase4_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term2_phase4_average_of_mapeh','$term2_phase4', '$phase4', '$term2_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase4_mapeh = mysqli_query($conn,$insert_student_grades_term2_phase4_mapeh);

      if($run_student_grades_term2_phase4_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }

        // phase 4 term 2 music

    $insert_student_grades_term2_phase4_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term2_phase4_music','$term2_phase4', '$phase4', '$term2_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase4_music = mysqli_query($conn,$insert_student_grades_term2_phase4_music);

       if($run_student_grades_term2_phase4_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }

        // phase 4 term 2  arts

    $insert_student_grades_term2_phase4_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term2_phase4_arts','$term2_phase4', '$phase4', '$term2_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase4_arts = mysqli_query($conn,$insert_student_grades_term2_phase4_arts);


        if($run_student_grades_term2_phase4_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }


            // phase 4 term 2  pe

    $insert_student_grades_term2_phase4_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term2_phase4_pe','$term2_phase4', '$phase4', '$term2_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase4_pe = mysqli_query($conn,$insert_student_grades_term2_phase4_pe);

        if($run_student_grades_term2_phase4_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }


                // phase 4 term 2 heatlh 

    $insert_student_grades_term2_phase4_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term2_phase4_health','$term2_phase4', '$phase4', '$term2_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase4_health = mysqli_query($conn,$insert_student_grades_term2_phase4_health);

         if($run_student_grades_term2_phase4_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }

            // phase 4 term 2 esp 

    $insert_student_grades_term2_phase4_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term2_phase4_esp','$term2_phase4', '$phase4', '$term2_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase4_esp = mysqli_query($conn,$insert_student_grades_term2_phase4_esp);

        if($run_student_grades_term2_phase4_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }

            // phase 4 term 2 arabic

    $insert_student_grades_term2_phase4_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term2_phase4_arabic_language','$term2_phase4', '$phase4', '$term2_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase4_arabic = mysqli_query($conn,$insert_student_grades_term2_phase4_arabic);

    if($run_student_grades_term2_phase4_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }

        // phase 4 term 2  islamic

    $insert_student_grades_term2_phase4_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$islamic_values', '$term2_phase4_islamic_values','$term2_phase4', '$phase4', '$term2_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase4_islamic = mysqli_query($conn,$insert_student_grades_term2_phase4_islamic);

    if($run_student_grades_term2_phase4_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term2_phase4 islamic" . '<br>';
        }




            // general average of term 2

            $insert_phase4_term2_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase4_term2_general_average','$term2_phase4','$phase4',' $term2_phase4_remarks','$dateCreated','$dateUpdated');";
        $run_phase4_term2_student_averages = mysqli_query($conn,$insert_phase4_term2_general_average);

        if($run_phase4_term2_student_averages){
            echo "added student averages term1";
            
        }else{
            echo "error student_averages" . $conn->error;
        }
        ////////////////// phase 4 term 2  ends here 
        
        
        // inserting grades phase 3 term 3

        //phase 4 term 3 mother tongue

        $insert_student_grades_term3_phase4_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term3_phase4_mother_tongue','$term3_phase4', '$phase4', '$term3_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase4_mother_tongue = mysqli_query($conn,$insert_student_grades_term3_phase4_mother_tongue);
    
    if($insert_student_grades_term3_phase4_mother_tongue){
        echo"term3 mothertongue";
    }

    else{
        $conn->error;;
    }

    //phase 4 term 3 filipino

    $insert_student_grades_term3_phase4_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term3_phase4_filipino','$term3_phase4', '$phase4', '$term3_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase4_filipino = mysqli_query($conn,$insert_student_grades_term3_phase4_filipino);
    
    if($insert_student_grades_term3_phase4_filipino){
        echo"term3 Filipino";
    }

    else{
        $conn->error;
    }

    //phase 4 term 3 english

    $insert_student_grades_term3_phase4_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term3_phase4_english','$term3_phase4', '$phase4', '$term3_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase4_english = mysqli_query($conn,$insert_student_grades_term3_phase4_english);
    
    if($insert_student_grades_term3_phase4_english){
        echo"term3 english";
    }

    else{
        $conn->error;
    }

    //phase 4 term 3 math

    $insert_student_grades_term3_phase4_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term3_phase4_mathematics','$term3_phase4', '$phase4', '$term3_phase4_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term3_phase4_math = mysqli_query($conn,$insert_student_grades_term3_phase4_math);
    
    if($insert_student_grades_term3_phase4_math){
        echo"term3 math";
    }

    else{
        $conn->error;
    }

    //phase 4 term 3 science

    $insert_student_grades_term3_phase4_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term3_phase4_science','$term3_phase4', '$phase4', '$term3_phase4_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term3_phase4_science = mysqli_query($conn,$insert_student_grades_term3_phase4_science);
    
    if($insert_student_grades_term3_phase4_science){
        echo"term3 science";
    }

    else{
        $conn->error;
    }

    //phase 4 term 3 ap

    $insert_student_grades_term3_phase4_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term3_phase4_araling_panlipunan','$term3_phase4', '$phase4', '$term3_phase4_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term3_phase4_ap = mysqli_query($conn,$insert_student_grades_term3_phase4_ap);
    
    if($insert_student_grades_term3_phase4_ap){
        echo"term3 Araling panlipunan";
    }

    else{
        $conn->error;
    }

    //phase 4 term 3 epp tle

    $insert_student_grades_term3_phase4_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term3_phase4_epp_tle','$term3_phase4', '$phase4', '$term3_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase4_epp_tle = mysqli_query($conn,$insert_student_grades_term3_phase4_epp_tle);
    
    if($insert_student_grades_term3_phase4_epp_tle){
        echo"term3 EPP_TLE";
    }

    else{
        $conn->error;
    }

    //phase 4 term 3 mapeh

    $insert_student_grades_term3_phase4_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term3_phase4_average_of_mapeh','$term3_phase4', '$phase4', '$term3_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase4_mapeh = mysqli_query($conn,$insert_student_grades_term3_phase4_mapeh);

      if($run_student_grades_term3_phase4_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }

        //phase 4 term 3  music

    $insert_student_grades_term3_phase4_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term3_phase4_music','$term3_phase4', '$phase4', '$term3_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase4_music = mysqli_query($conn,$insert_student_grades_term3_phase4_music);

       if($run_student_grades_term3_phase4_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }

        //phase 4 term 3  arts 
    $insert_student_grades_term3_phase4_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term3_phase4_arts','$term3_phase4', '$phase4', '$term3_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase4_arts = mysqli_query($conn,$insert_student_grades_term3_phase4_arts);


        if($run_student_grades_term3_phase4_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }

            //phase 4 term 3  pe
    $insert_student_grades_term3_phase4_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term3_phase4_pe','$term3_phase4', '$phase4', '$term3_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase4_pe = mysqli_query($conn,$insert_student_grades_term3_phase4_pe);

        if($run_student_grades_term3_phase4_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }

            //phase 4 term 3  health

    $insert_student_grades_term3_phase4_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term3_phase4_health','$term3_phase4', '$phase4', '$term3_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase4_health = mysqli_query($conn,$insert_student_grades_term3_phase4_health);

         if($run_student_grades_term3_phase4_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }

            //phase 4 term 3  esp

    $insert_student_grades_term3_phase4_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term3_phase4_esp','$term3_phase4', '$phase4', '$term3_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase4_esp = mysqli_query($conn,$insert_student_grades_term3_phase4_esp);

        if($run_student_grades_term3_phase4_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }

            //phase 4 term 3  arabic

    $insert_student_grades_term3_phase4_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term3_phase4_arabic_language','$term3_phase4', '$phase4', '$term3_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase4_arabic = mysqli_query($conn,$insert_student_grades_term3_phase4_arabic);

    if($run_student_grades_term3_phase4_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }

        //phase 4 term 3 islamic

    $insert_student_grades_term3_phase4_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$islamic_values', '$term3_phase4_islamic_values','$term3_phase4', '$phase4', '$term3_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase4_islamic = mysqli_query($conn,$insert_student_grades_term3_phase4_islamic);

    if($run_student_grades_term3_phase4_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term3_phase4 islamic" . '<br>';
        }




            // general average of term 3

            $insert_phase4_term3_general_average = "INSERT INTO student_general_averages (`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase4_term3_general_average','$term3_phase4','$phase4',' $term3_phase4_remarks','$dateCreated','$dateUpdated');";
        $run_phase4_term3_student_averages = mysqli_query($conn,$insert_phase4_term3_general_average);

        if($run_phase4_term3_student_averages){
            echo "added student averages term1";
           
        }else{
            echo "error student_averages" . $conn->error;
        }
        
    //=========phase 4 term 3  ends here--------------------------------------


        //inserting grades 
        // phase 4 term 4 mother tongue



        $insert_student_grades_term4_phase4_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term4_phase4_mother_tongue','$term4_phase4', '$phase4', '$term4_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase4_mother_tongue = mysqli_query($conn,$insert_student_grades_term4_phase4_mother_tongue);
    
    if($insert_student_grades_term4_phase4_mother_tongue){
        echo"term4 mothertongue";
    }

    else{
        $conn->error;;
    }

    // phase 4 term 4 filipino

    $insert_student_grades_term4_phase4_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term4_phase4_filipino','$term4_phase4', '$phase4', '$term4_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase4_filipino = mysqli_query($conn,$insert_student_grades_term4_phase4_filipino);
    
    if($insert_student_grades_term4_phase4_filipino){
        echo"term4 Filipino";
    }

    else{
        $conn->error;
    }

    // phase 4 term 4 english

    $insert_student_grades_term4_phase4_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term4_phase4_english','$term4_phase4', '$phase4', '$term4_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase4_english = mysqli_query($conn,$insert_student_grades_term4_phase4_english);
    
    if($insert_student_grades_term4_phase4_english){
        echo"term4 english";
    }

    else{
        $conn->error;
    }

    // phase 4 term 4 math

    $insert_student_grades_term4_phase4_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term4_phase4_mathematics','$term4_phase4', '$phase4', '$term4_phase4_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term4_phase4_math = mysqli_query($conn,$insert_student_grades_term4_phase4_math);
    
    if($insert_student_grades_term4_phase4_math){
        echo"term4 math";
    }

    else{
        $conn->error;
    }

    // phase 4 term 4 science

    $insert_student_grades_term4_phase4_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term4_phase4_science','$term4_phase4', '$phase4', '$term4_phase4_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term4_phase4_science = mysqli_query($conn,$insert_student_grades_term4_phase4_science);
    
    if($insert_student_grades_term4_phase4_science){
        echo"term4 science";
    }

    else{
        $conn->error;
    }

    // phase 4 term 4  ap

    $insert_student_grades_term4_phase4_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term4_phase4_araling_panlipunan','$term4_phase4', '$phase4', '$term4_phase4_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term4_phase4_ap = mysqli_query($conn,$insert_student_grades_term4_phase4_ap);
    
    if($insert_student_grades_term4_phase4_ap){
        echo"term4 Araling panlipunan";
    }

    else{
        $conn->error;
    }

    // phase 4 term 4 epp tle

    $insert_student_grades_term4_phase4_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term4_phase4_epp_tle','$term4_phase4', '$phase4', '$term4_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase4_epp_tle = mysqli_query($conn,$insert_student_grades_term4_phase4_epp_tle);
    
    if($insert_student_grades_term4_phase4_epp_tle){
        echo"term4 EPP_TLE";
    }

    else{
        $conn->error;
    }

    // phase 4 term 4 mapeh

    $insert_student_grades_term4_phase4_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term4_phase4_average_of_mapeh','$term4_phase4', '$phase4', '$term4_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase4_mapeh = mysqli_query($conn,$insert_student_grades_term4_phase4_mapeh);

      if($run_student_grades_term4_phase4_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }

        // phase 4 term 4 music

    $insert_student_grades_term4_phase4_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term4_phase4_music','$term4_phase4', '$phase4', '$term4_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase4_music = mysqli_query($conn,$insert_student_grades_term4_phase4_music);

       if($run_student_grades_term4_phase4_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }


        // phase 4 term 4  arts 

    $insert_student_grades_term4_phase4_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term4_phase4_arts','$term4_phase4', '$phase4', '$term4_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase4_arts = mysqli_query($conn,$insert_student_grades_term4_phase4_arts);


        if($run_student_grades_term4_phase4_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }

            // phase 4 term 4  pe

    $insert_student_grades_term4_phase4_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term4_phase4_pe','$term4_phase4', '$phase4', '$term4_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase4_pe = mysqli_query($conn,$insert_student_grades_term4_phase4_pe);

        if($run_student_grades_term4_phase4_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }

            // phase 4 term 4 health

    $insert_student_grades_term4_phase4_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term4_phase4_health','$term4_phase4', '$phase4', '$term4_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase4_health = mysqli_query($conn,$insert_student_grades_term4_phase4_health);

         if($run_student_grades_term4_phase4_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }

            // phase 4 term 4 esp

    $insert_student_grades_term4_phase4_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term4_phase4_esp','$term4_phase4', '$phase4', '$term4_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase4_esp = mysqli_query($conn,$insert_student_grades_term4_phase4_esp);

        if($run_student_grades_term4_phase4_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }

            // phase 4 term 4 arabic

    $insert_student_grades_term4_phase4_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term4_phase4_arabic_language','$term4_phase4', '$phase4', '$term4_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase4_arabic = mysqli_query($conn,$insert_student_grades_term4_phase4_arabic);

    if($run_student_grades_term4_phase4_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }

        // phase 4 term 4 islamic

    $insert_student_grades_term4_phase4_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$islamic_values', '$term4_phase4_islamic_values','$term4_phase4', '$phase4', '$term4_phase4_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase4_islamic = mysqli_query($conn,$insert_student_grades_term4_phase4_islamic);

    if($run_student_grades_term4_phase4_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term4_phase4 islamic" . '<br>';
        }
       


        //inserting of general average

            // general average of term 4

            $insert_phase4_term4_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase4_term4_general_average','$term4_phase4','$phase4',' $term4_phase4_remarks','$dateCreated','$dateUpdated');";
        $run_phase4_term4_student_averages = mysqli_query($conn,$insert_phase4_term4_general_average);

        if($run_phase4_term4_student_averages){
            echo "added student averages term1";
            
        }else{
            echo "error student_averages" . $conn->error;
        }


         //------------------------------// phase 4 term 4  ends here----------------------------


        //insert ko sa PHASE 4 FINAL RATINGS table PER SUBJECT mother tongue

        $insert_student_final_ratings_mt = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$mother_tongue','$phase4_final_rating_mother_tongue', '$phase4_term5', '$phase4', '$phase4_final_rating_mother_tongue_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_mt = mysqli_query($conn,$insert_student_final_ratings_mt);

    if($run_student_final_ratings_mt){
        echo "added to student final ratings MT" . '<br>';
    }else{
        echo "Error student final ratings MT" . '<br>';
    }

    //insert ko sa PHASE 4 FINAL RATINGS table PER SUBJECT filipino

    $insert_student_final_ratings_filipino = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$filipino', '$phase4_final_rating_filipino','$phase4_term5', '$phase4', '$phase4_final_rating_filipino_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_filipino = mysqli_query($conn,$insert_student_final_ratings_filipino);

    if($run_student_final_ratings_filipino){
        echo "added to student final ratings filipino" . '<br>';
    }else{
        echo "Error student final ratings filipino" . '<br>';
    }

    //insert ko sa PHASE 4 FINAL RATINGS table PER SUBJECT English

    $insert_student_final_ratings_english = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$english','$phase4_final_rating_english', '$phase4_term5', '$phase4', '$phase4_final_rating_english_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_english = mysqli_query($conn,$insert_student_final_ratings_english);

    if($run_student_final_ratings_english){
        echo "added to student final ratings english" . '<br>';
    }else{
        echo "Error student final ratings english" . '<br>';
    }

    //insert ko sa PHASE 4 FINAL RATINGS table PER SUBJECT Math

    $insert_student_final_ratings_math = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$math','$phase4_final_rating_math', '$phase4_term5', '$phase4', '$phase4_final_rating_math_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_math = mysqli_query($conn,$insert_student_final_ratings_math);

    if($run_student_final_ratings_math){
        echo "added to student final ratings math" . '<br>';
    }else{
        echo "Error student final ratings math" . '<br>';
    }

    //insert ko sa PHASE 4 FINAL RATINGS table PER SUBJECT Science

    $insert_student_final_ratings_science = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$science','$phase4_final_rating_science', '$phase4_term5', '$phase4', '$phase4_final_rating_science_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_science = mysqli_query($conn,$insert_student_final_ratings_science);

    if($run_student_final_ratings_science){
        echo "added to student final ratings math" . '<br>';
    }else{
        echo "Error student final ratings math" . '<br>';
    }

    //insert ko sa PHASE 4 FINAL RATINGS table PER SUBJECT AP

    $insert_student_final_ratings_AP = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$AP','$phase4_final_rating_AP', '$phase4_term5', '$phase4', '$phase4_final_rating_AP_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_AP = mysqli_query($conn,$insert_student_final_ratings_AP);

    if($run_student_final_ratings_AP){
        echo "added to student final ratings AP" . '<br>';
    }else{
        echo "Error student final ratings AP" . '<br>';
    }

    //insert ko sa PHASE 4 FINAL RATINGS table PER SUBJECT EPP / TLE

    $insert_student_final_ratings_epp_tle = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$epp_tle','$phase4_final_rating_epp_tle', '$phase4_term5', '$phase4', '$phase4_final_rating_epp_tle_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_epp_tle = mysqli_query($conn,$insert_student_final_ratings_epp_tle);

    if($run_student_final_ratings_epp_tle){
        echo "added to student final ratings epp tle" . '<br>';
    }else{
        echo "Error student final ratings epp tle" . '<br>';
    }

    //insert ko sa PHASE 4 FINAL RATINGS table PER SUBJECT MAPEH

    $insert_student_final_ratings_mapeh = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$mapeh','$phase4_final_rating_mapeh', '$phase4_term5', '$phase4', '$phase4_final_rating_mapeh_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_mapeh = mysqli_query($conn,$insert_student_final_ratings_mapeh);

    if($run_student_final_ratings_mapeh){
        echo "added to student final ratings mapeh" . '<br>';
    }else{
        echo "Error student final ratings mapeh" . '<br>';
    }

    //insert ko sa PHASE 4 FINAL RATINGS table PER SUBJECT music

    $insert_student_final_ratings_music = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$music','$phase4_final_rating_music', '$phase4_term5', '$phase4', '$phase4_final_rating_music_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_music = mysqli_query($conn,$insert_student_final_ratings_music);

    if($run_student_final_ratings_music){
        echo "added to student final ratings music" . '<br>';
    }else{
        echo "Error student final ratings music" . '<br>';
    }

    //insert ko sa PHASE 4 FINAL RATINGS table PER SUBJECT arts

    $insert_student_final_ratings_arts = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$arts','$phase4_final_rating_arts', '$phase4_term5', '$phase4', '$phase4_final_rating_arts_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_arts = mysqli_query($conn,$insert_student_final_ratings_arts);

    if($run_student_final_ratings_music){
        echo "added to student final ratings arts" . '<br>';
    }else{
        echo "Error student final ratings arts" . '<br>';
    }

    //insert ko sa PHASE 4 FINAL RATINGS table PER SUBJECT pe

    $insert_student_final_ratings_pe = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$PE','$phase4_final_rating_PE', '$phase4_term5', '$phase4', '$phase4_final_rating_PE_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_pe = mysqli_query($conn,$insert_student_final_ratings_pe);

    if($run_student_final_ratings_pe){
        echo "added to student final ratings PE" . '<br>';
    }else{
        echo "Error student final ratings PE" . '<br>';
    }

    //insert ko sa PHASE 4 FINAL RATINGS table PER SUBJECT health

    $insert_student_final_ratings_health = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$health','$phase4_final_rating_health', '$phase4_term5', '$phase4', '$phase4_final_rating_health_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_health = mysqli_query($conn,$insert_student_final_ratings_health);

    if($run_student_final_ratings_pe){
        echo "added to student final ratings health" . '<br>';
    }else{
        echo "Error student final ratings health" . '<br>';
    }

    //insert ko sa PHASE 4 FINAL RATINGS table PER SUBJECT ESP

    $insert_student_final_ratings_esp = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$esp', '$phase4_final_rating_esp','$phase4_term5', '$phase4', '$phase4_final_rating_esp_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_esp = mysqli_query($conn,$insert_student_final_ratings_esp);

    if($run_student_final_ratings_pe){
        echo "added to student final ratings esp" . '<br>';
    }else{
        echo "Error student final ratings esp" . '<br>';
    }


    //insert ko sa PHASE 4 FINAL RATINGS table PER SUBJECT arabic language

    $insert_student_final_ratings_arabic = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$arabic_language','$phase4_final_rating_arabic_language', '$phase4_term5', '$phase4', '$phase4_final_rating_arabic_language_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_arabic = mysqli_query($conn,$insert_student_final_ratings_arabic);

    if($run_student_final_ratings_arabic){
        echo "added to student final ratings arabic" . '<br>';
    }else{
        echo "Error student final ratings arabic" . '<br>';
    }

    //insert ko sa PHASE 4 FINAL RATINGS table PER SUBJECT islamic values

    $insert_student_final_ratings_islam = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$islamic_values','$phase4_final_rating_islamic_values', '$phase4_term5', '$phase4', '$phase4_final_rating_islamic_values_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_islam = mysqli_query($conn,$insert_student_final_ratings_islam);

    if($run_student_final_ratings_islam){
        echo "added to student final ratings islamic" . '<br>';
    }else{
        echo "Error student final ratings islamic" . '<br>';
    }


        //general averag of phase 4 term 5 
    $insert_phase4_term5_general_average = "INSERT INTO student_general_averages(lrn,general_average,term,phase,remarks,date_time_created,date_time_updated) 
    VALUES ('$lrn','$phase4_term5_general_average', '$phase4_term5','$phase4','$term1_phase4_remarks', '$dateCreated','$dateUpdated')";

    $run_phase4_term5_general_average = mysqli_query($conn,$insert_phase4_term5_general_average);

    if($run_phase4_term5_general_average){
        echo "added student averages term5";
    }else{
        echo "added student averages term5";
    }

    //inserting of remedial phase 4 

    for ($phase4_remedial_term = 1; $phase4_remedial_term <=2 ; $phase4_remedial_term++){



        if($phase4_remedial_term ==1){
    $phase4_remedial_query= "INSERT INTO `remedial_classes`(`lrn`, `date_from`, `date_to`, `learning_areas`, `final_rating`, `remedial_class_mark`, `recomputed_final_grade`, `phase`, `term`, `remarks`, `date_time_created`, `date_time_updated`) 
    VALUES ('$lrn','$phase4_remedial_from','$phase4_remedial_to','$phase4_remedial_learning_areas_1',' $phase4_remedial_final_rating_1','$phase4_remedial_class_mark_1','$phase4_recomputed_final_grade_1','$phase4','$phase4_remedial_term','$phase4_remedial_remarks_1','$dateCreated','$dateUpdated')";
    
    $phase4_run_query = mysqli_query($conn,$phase4_remedial_query);

        if($phase4_run_query){
            echo "remedial query success <br>";
            }
            else
            {
                $conn->error;
            }
            
        }

            elseif($phase4_remedial_term ==2) {
           

            $phase4_remedial_query= "INSERT INTO `remedial_classes`(`lrn`, `date_from`, `date_to`, `learning_areas`, `final_rating`, `remedial_class_mark`, `recomputed_final_grade`, `phase`, `term`, `remarks`, `date_time_created`, `date_time_updated`) 
            VALUES ('$lrn','$phase4_remedial_from','$phase4_remedial_to','$phase4_remedial_learning_areas_2',' $phase4_remedial_final_rating_2','$phase4_remedial_class_mark_2','$phase4_recomputed_final_grade_2','$phase4','$phase4_remedial_term','$phase4_remedial_remarks_2','$dateCreated','$dateUpdated')";
            $phase4_run_query = mysqli_query($conn,$phase4_remedial_query);

                if($phase4_run_query){
                    echo "remedial query success term2  <br>";
                }else
                    {
                        $conn->error;
                    }
                }   
        }




    }


//////////////////////////////////////////// End of Phase 4 /////////////////////////////


////////////////////Start of Phase 5/////////////////////////////////////////


//Phase5 Insert Scholastic Records

$phase5_insert_scholastic_records = "INSERT INTO scholastic_records (lrn,school,school_id,district,division,region,classified_as_grade,section,school_year,name_of_teacher,signature,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn' ,'$phase5_name_of_school', '$phase5_school_id' , '$phase5_district', '$phase5_division', '$phase5_region', '$phase5_classified_as_grade', '$phase5_section', '$phase5_school_year', '$phase5_name_of_school', '$phase5_signature', '$phase5','$phase5_remarks', '$dateCreated', '$dateUpdated')";

$phase5_run_scholastic_records = mysqli_query($conn,$phase5_insert_scholastic_records);
if($phase5_run_scholastic_records){

    //inserting of students grades

    //phase 5 term 1 mother tongue


    $insert_student_grades_term1_phase5_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term1_phase5_mother_tongue','$term1_phase5', '$phase5', '$term1_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase5_mother_tongue = mysqli_query($conn,$insert_student_grades_term1_phase5_mother_tongue);
    
    if($insert_student_grades_term1_phase5_mother_tongue){
        echo"term1 mothertongue";
    }

    else{
        $conn->error;;
    }

    //phase 5 term 1 filipino

    $insert_student_grades_term1_phase5_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term1_phase5_filipino','$term1_phase5', '$phase5', '$term1_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase5_filipino = mysqli_query($conn,$insert_student_grades_term1_phase5_filipino);
    
    if($insert_student_grades_term1_phase5_filipino){
        echo"term1 Filipino";
    }

    else{
        $conn->error;
    }

    //phase 5 term 1 english

    $insert_student_grades_term1_phase5_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term1_phase5_english','$term1_phase5', '$phase5', '$term1_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase5_english = mysqli_query($conn,$insert_student_grades_term1_phase5_english);
    
    if($insert_student_grades_term1_phase5_english){
        echo"term1 english";
    }

    else{
        $conn->error;
    }

     //phase 5 term 1 math

    $insert_student_grades_term1_phase5_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term1_phase5_mathematics','$term1_phase5', '$phase5', '$term1_phase5_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term1_phase5_math = mysqli_query($conn,$insert_student_grades_term1_phase5_math);
    
    if($insert_student_grades_term1_phase5_math){
        echo"term1 math";
    }

    else{
        $conn->error;
    }

     //phase 5 term 1 science

    $insert_student_grades_term1_phase5_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term1_phase5_science','$term1_phase5', '$phase5', '$term1_phase5_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term1_phase5_science = mysqli_query($conn,$insert_student_grades_term1_phase5_science);
    
    if($insert_student_grades_term1_phase5_science){
        echo"term1 science";
    }

    else{
        $conn->error;
    }

     //phase 5 term 1 ap

    $insert_student_grades_term1_phase5_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term1_phase5_araling_panlipunan','$term1_phase5', '$phase5', '$term1_phase5_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term1_phase5_ap = mysqli_query($conn,$insert_student_grades_term1_phase5_ap);
    
    if($insert_student_grades_term1_phase5_ap){
        echo"term1 Araling panlipunan";
    }

    else{
        $conn->error;
    }

     //phase 5 term 1  epp tle

    $insert_student_grades_term1_phase5_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term1_phase5_epp_tle','$term1_phase5', '$phase5', '$term1_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase5_epp_tle = mysqli_query($conn,$insert_student_grades_term1_phase5_epp_tle);
    
    if($insert_student_grades_term1_phase5_epp_tle){
        echo"term1 EPP_TLE";
    }

    else{
        $conn->error;
    }

     //phase 5 term 1  mapeh

    $insert_student_grades_term1_phase5_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term1_phase5_average_of_mapeh','$term1_phase5', '$phase5', '$term1_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase5_mapeh = mysqli_query($conn,$insert_student_grades_term1_phase5_mapeh);

      if($run_student_grades_term1_phase5_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }

         //phase 5 term 1  music

    $insert_student_grades_term1_phase5_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term1_phase5_music','$term1_phase5', '$phase5', '$term1_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase5_music = mysqli_query($conn,$insert_student_grades_term1_phase5_music);

       if($run_student_grades_term1_phase5_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }

         //phase 5 term 1  arts

    $insert_student_grades_term1_phase5_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term1_phase5_arts','$term1_phase5', '$phase5', '$term1_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase5_arts = mysqli_query($conn,$insert_student_grades_term1_phase5_arts);


        if($run_student_grades_term1_phase5_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }

             //phase 5 term 1  pe

    $insert_student_grades_term1_phase5_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term1_phase5_pe','$term1_phase5', '$phase5', '$term1_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase5_pe = mysqli_query($conn,$insert_student_grades_term1_phase5_pe);

        if($run_student_grades_term1_phase5_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }

             //phase 5 term 1 health

    $insert_student_grades_term1_phase5_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term1_phase5_health','$term1_phase5', '$phase5', '$term1_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase5_health = mysqli_query($conn,$insert_student_grades_term1_phase5_health);

         if($run_student_grades_term1_phase5_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }

             //phase 5 term 1 esp 

    $insert_student_grades_term1_phase5_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term1_phase5_esp','$term1_phase5', '$phase5', '$term1_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase5_esp = mysqli_query($conn,$insert_student_grades_term1_phase5_esp);

        if($run_student_grades_term1_phase5_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }

             //phase 5 term 1 arabic

    $insert_student_grades_term1_phase5_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term1_phase5_arabic_language','$term1_phase5', '$phase5', '$term1_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase5_arabic = mysqli_query($conn,$insert_student_grades_term1_phase5_arabic);

    if($run_student_grades_term1_phase5_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }

         //phase 5 term 1 islammic

    $insert_student_grades_term1_phase5_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$islamic_values', '$term1_phase5_islamic_values','$term1_phase5', '$phase5', '$term1_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase5_islamic = mysqli_query($conn,$insert_student_grades_term1_phase5_islamic);

    if($run_student_grades_term1_phase5_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term1_phase5 islamic" . '<br>';
        }
            //general average phase 5  term 1 
        $insert_phase5_term1_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase5_term1_general_average','$term1_phase5','$phase5','$phase5_remarks','$dateCreated','$dateUpdated');";
        $run_phase5_term1_student_averages = mysqli_query($conn,$insert_phase5_term1_general_average);

        if($run_phase5_term1_student_averages){
            echo "added student averages term1";
        
            
        }else{
            echo "error student_averages" . $conn->error;
        }
             //phase 5 term 1  ends here -----------------------------------

             //inserting of grades 


        //  phase 5 term 2 

         //  phase 5 term 2 mother tongue


        $insert_student_grades_term2_phase5_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term2_phase5_mother_tongue','$term2_phase5', '$phase5', '$term2_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase5_mother_tongue = mysqli_query($conn,$insert_student_grades_term2_phase5_mother_tongue);
    
    if($insert_student_grades_term2_phase5_mother_tongue){
        echo"term2 mothertongue";
    }

    else{
        $conn->error;;
    }

     //  phase 5 term 2 filipino

    $insert_student_grades_term2_phase5_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term2_phase5_filipino','$term2_phase5', '$phase5', '$term2_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase5_filipino = mysqli_query($conn,$insert_student_grades_term2_phase5_filipino);
    
    if($insert_student_grades_term2_phase5_filipino){
        echo"term2 Filipino";
    }

    else{
        $conn->error;
    }

     //  phase 5 term 2 english

    $insert_student_grades_term2_phase5_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term2_phase5_english','$term2_phase5', '$phase5', '$term2_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase5_english = mysqli_query($conn,$insert_student_grades_term2_phase5_english);
    
    if($insert_student_grades_term2_phase5_english){
        echo"term2 english";
    }

    else{
        $conn->error;
    }

     //  phase 5 term 2 math

    $insert_student_grades_term2_phase5_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term2_phase5_mathematics','$term2_phase5', '$phase5', '$term2_phase5_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term2_phase5_math = mysqli_query($conn,$insert_student_grades_term2_phase5_math);
    
    if($insert_student_grades_term2_phase5_math){
        echo"term2 math";
    }

    else{
        $conn->error;
    }

     //  phase 5 term 2 science

    $insert_student_grades_term2_phase5_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term2_phase5_science','$term2_phase5', '$phase5', '$term2_phase5_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term2_phase5_science = mysqli_query($conn,$insert_student_grades_term2_phase5_science);
    
    if($insert_student_grades_term2_phase5_science){
        echo"term2 science";
    }

    else{
        $conn->error;
    }

     //  phase 5 term 2 ap 

    $insert_student_grades_term2_phase5_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term2_phase5_araling_panlipunan','$term2_phase5', '$phase5', '$term2_phase5_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term2_phase5_ap = mysqli_query($conn,$insert_student_grades_term2_phase5_ap);
    
    if($insert_student_grades_term2_phase5_ap){
        echo"term2 Araling panlipunan";
    }

    else{
        $conn->error;
    }

     //  phase 5 term 2 tle

    $insert_student_grades_term2_phase5_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term2_phase5_epp_tle','$term2_phase5', '$phase5', '$term2_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase5_epp_tle = mysqli_query($conn,$insert_student_grades_term2_phase5_epp_tle);
    
    if($insert_student_grades_term2_phase5_epp_tle){
        echo"term2 EPP_TLE";
    }

    else{
        $conn->error;
    }

     //  phase 5 term 2 mapeh

    $insert_student_grades_term2_phase5_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term2_phase5_average_of_mapeh','$term2_phase5', '$phase5', '$term2_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase5_mapeh = mysqli_query($conn,$insert_student_grades_term2_phase5_mapeh);

      if($run_student_grades_term2_phase5_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }

         //  phase 5 term 2 music

    $insert_student_grades_term2_phase5_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term2_phase5_music','$term2_phase5', '$phase5', '$term2_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase5_music = mysqli_query($conn,$insert_student_grades_term2_phase5_music);

       if($run_student_grades_term2_phase5_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }


         //  phase 5 term 2 arts 

    $insert_student_grades_term2_phase5_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term2_phase5_arts','$term2_phase5', '$phase5', '$term2_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase5_arts = mysqli_query($conn,$insert_student_grades_term2_phase5_arts);


        if($run_student_grades_term2_phase5_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }

             //  phase 5 term 2  pe
    $insert_student_grades_term2_phase5_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term2_phase5_pe','$term2_phase5', '$phase5', '$term2_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase5_pe = mysqli_query($conn,$insert_student_grades_term2_phase5_pe);

        if($run_student_grades_term2_phase5_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }

             //  phase 5 term 2  health

    $insert_student_grades_term2_phase5_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term2_phase5_health','$term2_phase5', '$phase5', '$term2_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase5_health = mysqli_query($conn,$insert_student_grades_term2_phase5_health);

         if($run_student_grades_term2_phase5_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }

             //  phase 5 term 2  esp 

    $insert_student_grades_term2_phase5_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term2_phase5_esp','$term2_phase5', '$phase5', '$term2_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase5_esp = mysqli_query($conn,$insert_student_grades_term2_phase5_esp);

        if($run_student_grades_term2_phase5_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }

             //  phase 5 term 2  arabic

    $insert_student_grades_term2_phase5_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term2_phase5_arabic_language','$term2_phase5', '$phase5', '$term2_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase5_arabic = mysqli_query($conn,$insert_student_grades_term2_phase5_arabic);

    if($run_student_grades_term2_phase5_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }

         //  phase 5 term 2 islamic

    $insert_student_grades_term2_phase5_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$islamic_values', '$term2_phase5_islamic_values','$term2_phase5', '$phase5', '$term2_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase5_islamic = mysqli_query($conn,$insert_student_grades_term2_phase5_islamic);

    if($run_student_grades_term2_phase5_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term2_phase5 islamic" . '<br>';
        }




            // general average phase 5  of term 2

            $insert_phase5_term2_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase5_term2_general_average','$term2_phase5','$phase5',' $term2_phase5_remarks','$dateCreated','$dateUpdated');";
        $run_phase5_term2_student_averages = mysqli_query($conn,$insert_phase5_term2_general_average);

        if($run_phase5_term2_student_averages){
            echo "added student averages term1";
            
        }else{
            echo "error student_averages" . $conn->error;
        }

        // phase 5 term 2  ends here -------------------------------------------------------

        //inserting of grades 
        //phase 5 term 3 mother tounge


        $insert_student_grades_term3_phase5_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term3_phase5_mother_tongue','$term3_phase5', '$phase5', '$term3_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase5_mother_tongue = mysqli_query($conn,$insert_student_grades_term3_phase5_mother_tongue);
    
    if($insert_student_grades_term3_phase5_mother_tongue){
        echo"term3 mothertongue";
    }

    else{
        $conn->error;;
    }

    //phase 5 term 3 filipino

    $insert_student_grades_term3_phase5_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term3_phase5_filipino','$term3_phase5', '$phase5', '$term3_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase5_filipino = mysqli_query($conn,$insert_student_grades_term3_phase5_filipino);
    
    if($insert_student_grades_term3_phase5_filipino){
        echo"term3 Filipino";
    }

    else{
        $conn->error;
    }

    //phase 5 term 3 english

    $insert_student_grades_term3_phase5_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term3_phase5_english','$term3_phase5', '$phase5', '$term3_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase5_english = mysqli_query($conn,$insert_student_grades_term3_phase5_english);
    
    if($insert_student_grades_term3_phase5_english){
        echo"term3 english";
    }

    else{
        $conn->error;
    }

    //phase 5 term 3 math

    $insert_student_grades_term3_phase5_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term3_phase5_mathematics','$term3_phase5', '$phase5', '$term3_phase5_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term3_phase5_math = mysqli_query($conn,$insert_student_grades_term3_phase5_math);
    
    if($insert_student_grades_term3_phase5_math){
        echo"term3 math";
    }

    else{
        $conn->error;
    }

    //phase 5 term 3 science

    $insert_student_grades_term3_phase5_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term3_phase5_science','$term3_phase5', '$phase5', '$term3_phase5_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term3_phase5_science = mysqli_query($conn,$insert_student_grades_term3_phase5_science);
    
    if($insert_student_grades_term3_phase5_science){
        echo"term3 science";
    }

    else{
        $conn->error;
    }

    //phase 5 term 3 ap

    $insert_student_grades_term3_phase5_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term3_phase5_araling_panlipunan','$term3_phase5', '$phase5', '$term3_phase5_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term3_phase5_ap = mysqli_query($conn,$insert_student_grades_term3_phase5_ap);
    
    if($insert_student_grades_term3_phase5_ap){
        echo"term3 Araling panlipunan";
    }

    else{
        $conn->error;
    }

    //phase 5 term 3 epp tle

    $insert_student_grades_term3_phase5_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term3_phase5_epp_tle','$term3_phase5', '$phase5', '$term3_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase5_epp_tle = mysqli_query($conn,$insert_student_grades_term3_phase5_epp_tle);
    
    if($insert_student_grades_term3_phase5_epp_tle){
        echo"term3 EPP_TLE";
    }

    else{
        $conn->error;
    }

    //phase 5 term 3 mapeh

    $insert_student_grades_term3_phase5_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term3_phase5_average_of_mapeh','$term3_phase5', '$phase5', '$term3_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase5_mapeh = mysqli_query($conn,$insert_student_grades_term3_phase5_mapeh);

      if($run_student_grades_term3_phase5_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }

        //phase 5 term 3 music

    $insert_student_grades_term3_phase5_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term3_phase5_music','$term3_phase5', '$phase5', '$term3_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase5_music = mysqli_query($conn,$insert_student_grades_term3_phase5_music);

       if($run_student_grades_term3_phase5_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }

        //phase 5 term 3 arts

    $insert_student_grades_term3_phase5_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term3_phase5_arts','$term3_phase5', '$phase5', '$term3_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase5_arts = mysqli_query($conn,$insert_student_grades_term3_phase5_arts);


        if($run_student_grades_term3_phase5_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }

            //phase 5 term 3 pe

    $insert_student_grades_term3_phase5_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term3_phase5_pe','$term3_phase5', '$phase5', '$term3_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase5_pe = mysqli_query($conn,$insert_student_grades_term3_phase5_pe);

        if($run_student_grades_term3_phase5_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }

            //phase 5 term 3 health

    $insert_student_grades_term3_phase5_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term3_phase5_health','$term3_phase5', '$phase5', '$term3_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase5_health = mysqli_query($conn,$insert_student_grades_term3_phase5_health);

         if($run_student_grades_term3_phase5_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }

            //phase 5 term 3 esp

    $insert_student_grades_term3_phase5_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term3_phase5_esp','$term3_phase5', '$phase5', '$term3_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase5_esp = mysqli_query($conn,$insert_student_grades_term3_phase5_esp);

        if($run_student_grades_term3_phase5_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }

            //phase 5 term 3 arabic

    $insert_student_grades_term3_phase5_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term3_phase5_arabic_language','$term3_phase5', '$phase5', '$term3_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase5_arabic = mysqli_query($conn,$insert_student_grades_term3_phase5_arabic);

    if($run_student_grades_term3_phase5_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }

        //phase 5 term 3 islamic

    $insert_student_grades_term3_phase5_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$islamic_values', '$term3_phase5_islamic_values','$term3_phase5', '$phase5', '$term3_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase5_islamic = mysqli_query($conn,$insert_student_grades_term3_phase5_islamic);

    if($run_student_grades_term3_phase5_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term3_phase5 islamic" . '<br>';
        }




            // general average phase 5  of term 3

            $insert_phase5_term3_general_average = "INSERT INTO student_general_averages (`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase5_term3_general_average','$term3_phase5','$phase5',' $term3_phase5_remarks','$dateCreated','$dateUpdated');";
        $run_phase5_term3_student_averages = mysqli_query($conn,$insert_phase5_term3_general_average);

        if($run_phase5_term3_student_averages){
            echo "added student averages term1";
           
        }else{
            echo "error student_averages" . $conn->error;
        }
        //phase 5 term 3 ends here--------------------------------------------

        //inserting grades of 
        // phase 5 term 4 

        // phase 5 term 4 mother tongue



        $insert_student_grades_term4_phase5_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term4_phase5_mother_tongue','$term4_phase5', '$phase5', '$term4_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase5_mother_tongue = mysqli_query($conn,$insert_student_grades_term4_phase5_mother_tongue);
    
    if($insert_student_grades_term4_phase5_mother_tongue){
        echo"term4 mothertongue";
    }

    else{
        $conn->error;;
    }

    // phase 5 term 4 filipino

    $insert_student_grades_term4_phase5_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term4_phase5_filipino','$term4_phase5', '$phase5', '$term4_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase5_filipino = mysqli_query($conn,$insert_student_grades_term4_phase5_filipino);
    
    if($insert_student_grades_term4_phase5_filipino){
        echo"term4 Filipino";
    }

    else{
        $conn->error;
    }

    // phase 5 term 4 english

    $insert_student_grades_term4_phase5_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term4_phase5_english','$term4_phase5', '$phase5', '$term4_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase5_english = mysqli_query($conn,$insert_student_grades_term4_phase5_english);
    
    if($insert_student_grades_term4_phase5_english){
        echo"term4 english";
    }

    else{
        $conn->error;
    }

    // phase 5 term 4 math

    $insert_student_grades_term4_phase5_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term4_phase5_mathematics','$term4_phase5', '$phase5', '$term4_phase5_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term4_phase5_math = mysqli_query($conn,$insert_student_grades_term4_phase5_math);
    
    if($insert_student_grades_term4_phase5_math){
        echo"term4 math";
    }

    else{
        $conn->error;
    }

    // phase 5 term 4 science

    $insert_student_grades_term4_phase5_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term4_phase5_science','$term4_phase5', '$phase5', '$term4_phase5_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term4_phase5_science = mysqli_query($conn,$insert_student_grades_term4_phase5_science);
    
    if($insert_student_grades_term4_phase5_science){
        echo"term4 science";
    }

    else{
        $conn->error;
    }

    // phase 5 term 4 ap

    $insert_student_grades_term4_phase5_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term4_phase5_araling_panlipunan','$term4_phase5', '$phase5', '$term4_phase5_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term4_phase5_ap = mysqli_query($conn,$insert_student_grades_term4_phase5_ap);
    
    if($insert_student_grades_term4_phase5_ap){
        echo"term4 Araling panlipunan";
    }

    else{
        $conn->error;
    }

        // phase 5 term 4 epp_tle

    $insert_student_grades_term4_phase5_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term4_phase5_epp_tle','$term4_phase5', '$phase5', '$term4_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase5_epp_tle = mysqli_query($conn,$insert_student_grades_term4_phase5_epp_tle);
    
    if($insert_student_grades_term4_phase5_epp_tle){
        echo"term4 EPP_TLE";
    }

    else{
        $conn->error;
    }

    // phase 5 term 4 mapeh

    $insert_student_grades_term4_phase5_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term4_phase5_average_of_mapeh','$term4_phase5', '$phase5', '$term4_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase5_mapeh = mysqli_query($conn,$insert_student_grades_term4_phase5_mapeh);

      if($run_student_grades_term4_phase5_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }

        // phase 5 term 4 music

    $insert_student_grades_term4_phase5_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term4_phase5_music','$term4_phase5', '$phase5', '$term4_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase5_music = mysqli_query($conn,$insert_student_grades_term4_phase5_music);

       if($run_student_grades_term4_phase5_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }


        // phase 5 term 4  arts

    $insert_student_grades_term4_phase5_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term4_phase5_arts','$term4_phase5', '$phase5', '$term4_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase5_arts = mysqli_query($conn,$insert_student_grades_term4_phase5_arts);


        if($run_student_grades_term4_phase5_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }

            // phase 5 term 4 pe
    $insert_student_grades_term4_phase5_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term4_phase5_pe','$term4_phase5', '$phase5', '$term4_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase5_pe = mysqli_query($conn,$insert_student_grades_term4_phase5_pe);

        if($run_student_grades_term4_phase5_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }

            // phase 5 term 4 health

    $insert_student_grades_term4_phase5_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term4_phase5_health','$term4_phase5', '$phase5', '$term4_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase5_health = mysqli_query($conn,$insert_student_grades_term4_phase5_health);

         if($run_student_grades_term4_phase5_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }

            // phase 5 term 4 esp

    $insert_student_grades_term4_phase5_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term4_phase5_esp','$term4_phase5', '$phase5', '$term4_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase5_esp = mysqli_query($conn,$insert_student_grades_term4_phase5_esp);

        if($run_student_grades_term4_phase5_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }

            // phase 5 term 4 arabic

    $insert_student_grades_term4_phase5_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term4_phase5_arabic_language','$term4_phase5', '$phase5', '$term4_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase5_arabic = mysqli_query($conn,$insert_student_grades_term4_phase5_arabic);

    if($run_student_grades_term4_phase5_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }

        // phase 5 term 4 islamic

    $insert_student_grades_term4_phase5_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn',' $islamic_values', '$term4_phase5_islamic_values','$term4_phase5', '$phase5', '$term4_phase5_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase5_islamic = mysqli_query($conn,$insert_student_grades_term4_phase5_islamic);

    if($run_student_grades_term4_phase5_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term4_phase5 islamic" . '<br>';
        }




            // general average phase 5  of term 4

            $insert_phase5_term4_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase5_term4_general_average','$term4_phase5','$phase5',' $term4_phase5_remarks','$dateCreated','$dateUpdated');";
        $run_phase5_term4_student_averages = mysqli_query($conn,$insert_phase5_term4_general_average);

        if($run_phase5_term4_student_averages){
            echo "added student averages term1";
            
        }else{
            echo "error student_averages" . $conn->error;
        }   

        // phase 5 term 4 ends here------------------


        //insert ko sa PHASE 5 FINAL RATINGS table PER SUBJECT mother tongue

        $insert_student_final_ratings_mt = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$mother_tongue','$phase5_final_rating_mother_tongue', '$phase5_term5', '$phase5', '$phase5_final_rating_mother_tongue_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_mt = mysqli_query($conn,$insert_student_final_ratings_mt);

    if($run_student_final_ratings_mt){
        echo "added to student final ratings MT" . '<br>';
    }else{
        echo "Error student final ratings MT" . '<br>';
    }

    //insert ko sa PHASE 5 FINAL RATINGS table PER SUBJECT filipino

    $insert_student_final_ratings_filipino = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$filipino', '$phase5_final_rating_filipino','$phase5_term5', '$phase5', '$phase5_final_rating_filipino_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_filipino = mysqli_query($conn,$insert_student_final_ratings_filipino);

    if($run_student_final_ratings_filipino){
        echo "added to student final ratings filipino" . '<br>';
    }else{
        echo "Error student final ratings filipino" . '<br>';
    }

    //insert ko sa PHASE 5 FINAL RATINGS table PER SUBJECT English

    $insert_student_final_ratings_english = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$english','$phase5_final_rating_english', '$phase5_term5', '$phase5', '$phase5_final_rating_english_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_english = mysqli_query($conn,$insert_student_final_ratings_english);

    if($run_student_final_ratings_english){
        echo "added to student final ratings english" . '<br>';
    }else{
        echo "Error student final ratings english" . '<br>';
    }

    //insert ko sa PHASE 5 FINAL RATINGS table PER SUBJECT Math

    $insert_student_final_ratings_math = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$math','$phase5_final_rating_math', '$phase5_term5', '$phase5', '$phase5_final_rating_math_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_math = mysqli_query($conn,$insert_student_final_ratings_math);

    if($run_student_final_ratings_math){
        echo "added to student final ratings math" . '<br>';
    }else{
        echo "Error student final ratings math" . '<br>';
    }

    //insert ko sa PHASE 5 FINAL RATINGS table PER SUBJECT Science

    $insert_student_final_ratings_science = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$science','$phase5_final_rating_science', '$phase5_term5', '$phase5', '$phase5_final_rating_science_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_science = mysqli_query($conn,$insert_student_final_ratings_science);

    if($run_student_final_ratings_science){
        echo "added to student final ratings math" . '<br>';
    }else{
        echo "Error student final ratings math" . '<br>';
    }

    //insert ko sa PHASE 5 FINAL RATINGS table PER SUBJECT AP

    $insert_student_final_ratings_AP = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$AP','$phase5_final_rating_AP', '$phase5_term5', '$phase5', '$phase5_final_rating_AP_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_AP = mysqli_query($conn,$insert_student_final_ratings_AP);

    if($run_student_final_ratings_AP){
        echo "added to student final ratings AP" . '<br>';
    }else{
        echo "Error student final ratings AP" . '<br>';
    }

    //insert ko sa PHASE 5 FINAL RATINGS table PER SUBJECT EPP / TLE

    $insert_student_final_ratings_epp_tle = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$epp_tle','$phase5_final_rating_epp_tle', '$phase5_term5', '$phase5', '$phase5_final_rating_epp_tle_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_epp_tle = mysqli_query($conn,$insert_student_final_ratings_epp_tle);

    if($run_student_final_ratings_epp_tle){
        echo "added to student final ratings epp tle" . '<br>';
    }else{
        echo "Error student final ratings epp tle" . '<br>';
    }

    //insert ko sa PHASE 5 FINAL RATINGS table PER SUBJECT MAPEH

    $insert_student_final_ratings_mapeh = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$mapeh','$phase5_final_rating_mapeh', '$phase5_term5', '$phase5', '$phase5_final_rating_mapeh_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_mapeh = mysqli_query($conn,$insert_student_final_ratings_mapeh);

    if($run_student_final_ratings_mapeh){
        echo "added to student final ratings mapeh" . '<br>';
    }else{
        echo "Error student final ratings mapeh" . '<br>';
    }

    //insert ko sa PHASE 5 FINAL RATINGS table PER SUBJECT music

    $insert_student_final_ratings_music = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$music','$phase5_final_rating_music', '$phase5_term5', '$phase5', '$phase5_final_rating_music_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_music = mysqli_query($conn,$insert_student_final_ratings_music);

    if($run_student_final_ratings_music){
        echo "added to student final ratings music" . '<br>';
    }else{
        echo "Error student final ratings music" . '<br>';
    }

    //insert ko sa PHASE 5 FINAL RATINGS table PER SUBJECT arts

    $insert_student_final_ratings_arts = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$arts','$phase5_final_rating_arts', '$phase5_term5', '$phase5', '$phase5_final_rating_arts_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_arts = mysqli_query($conn,$insert_student_final_ratings_arts);

    if($run_student_final_ratings_music){
        echo "added to student final ratings arts" . '<br>';
    }else{
        echo "Error student final ratings arts" . '<br>';
    }

    //insert ko sa PHASE 5 FINAL RATINGS table PER SUBJECT pe

    $insert_student_final_ratings_pe = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$PE','$phase5_final_rating_PE', '$phase5_term5', '$phase5', '$phase5_final_rating_PE_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_pe = mysqli_query($conn,$insert_student_final_ratings_pe);

    if($run_student_final_ratings_pe){
        echo "added to student final ratings PE" . '<br>';
    }else{
        echo "Error student final ratings PE" . '<br>';
    }

    //insert ko sa PHASE 5 FINAL RATINGS table PER SUBJECT health

    $insert_student_final_ratings_health = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$health','$phase5_final_rating_health', '$phase5_term5', '$phase5', '$phase5_final_rating_health_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_health = mysqli_query($conn,$insert_student_final_ratings_health);

    if($run_student_final_ratings_pe){
        echo "added to student final ratings health" . '<br>';
    }else{
        echo "Error student final ratings health" . '<br>';
    }

    //insert ko sa PHASE 5 FINAL RATINGS table PER SUBJECT ESP

    $insert_student_final_ratings_esp = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$esp', '$phase5_final_rating_esp','$phase5_term5', '$phase5', '$phase5_final_rating_esp_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_esp = mysqli_query($conn,$insert_student_final_ratings_esp);

    if($run_student_final_ratings_pe){
        echo "added to student final ratings esp" . '<br>';
    }else{
        echo "Error student final ratings esp" . '<br>';
    }


    //insert ko sa PHASE 5 FINAL RATINGS table PER SUBJECT arabic language

    $insert_student_final_ratings_arabic = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$arabic_language', '$phase5_final_rating_arabic_language','$phase5_term5', '$phase5', '$phase5_final_rating_arabic_language_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_arabic = mysqli_query($conn,$insert_student_final_ratings_arabic);


    if($run_student_final_ratings_arabic){
        echo "added to student final ratings arabic" . '<br>';
    }else{
        echo "Error student final ratings arabic" . $conn->error;
    }

    //insert ko sa PHASE 5 FINAL RATINGS table PER SUBJECT islamic values

    $insert_student_final_ratings_islam = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$islamic_values','$phase5_final_rating_arabic_language', '$phase5_term5', '$phase5', '$phase5_final_rating_islamic_values_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_islam = mysqli_query($conn,$insert_student_final_ratings_islam);

    if($run_student_final_ratings_islam){
        echo "added to student final ratings islamic" . '<br>';
    }else{
        echo "Error student final ratings islamic" . '<br>';
    }


        //general averag of phase 5 term 5 
    $insert_phase5_term5_general_average = "INSERT INTO student_general_averages(lrn,general_average,term,phase,remarks,date_time_created,date_time_updated) 
    VALUES ('$lrn','$phase5_term5_general_average', '$phase5_term5','$phase5','$term1_phase5_remarks', '$dateCreated','$dateUpdated')";

    $run_phase5_term5_general_average = mysqli_query($conn,$insert_phase5_term5_general_average);

    if($run_phase5_term5_general_average){
        echo "added student averages term5";
    }else{
        echo "added student averages term5";
    }

    // inserting of phase 5 remedial


    for ($phase5_remedial_term = 1; $phase5_remedial_term <=2 ; $phase5_remedial_term++){



        if($phase5_remedial_term ==1){
            $phase5_remedial_query= "INSERT INTO `remedial_classes`(`lrn`, `date_from`, `date_to`, `learning_areas`, `final_rating`, `remedial_class_mark`, `recomputed_final_grade`, `phase`, `term`, `remarks`, `date_time_created`, `date_time_updated`) 
            VALUES ('$lrn','$phase5_remedial_from','$phase5_remedial_to','$phase5_remedial_learning_areas_1',' $phase5_remedial_final_rating_1','$phase5_remedial_class_mark_1','$phase5_recomputed_final_grade_1','$phase5','$phase5_remedial_term','$phase5_remedial_remarks_1','$dateCreated','$dateUpdated')";
            
            $phase5_run_query = mysqli_query($conn,$phase5_remedial_query);

            if($phase5_run_query){
            echo "remedial query success <br>";
            }
            else
            {
                $conn->error;
            }
        
        }elseif($phase5_remedial_term ==2) {

        $phase5_remedial_query= "INSERT INTO `remedial_classes`(`lrn`, `date_from`, `date_to`, `learning_areas`, `final_rating`, `remedial_class_mark`, `recomputed_final_grade`, `phase`, `term`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase5_remedial_from','$phase5_remedial_to','$phase5_remedial_learning_areas_2',' $phase5_remedial_final_rating_2','$phase5_remedial_class_mark_2','$phase5_recomputed_final_grade_2','$phase5','$phase5_remedial_term','$phase5_remedial_remarks_2','$dateCreated','$dateUpdated')";
        
        $phase5_run_query = mysqli_query($conn,$phase5_remedial_query);

        if($phase5_run_query){
            echo "remedial query success term2  <br>";
        }else{
                $conn->error;
            }
    }   
}


}



///////////////////////////////////////////////// END OF PHASE 5///////////////////////////////////

//////////////////////////////////////////Start of Phase 6//////////////////////////

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

////////////////////////////END OF PHASE 6 ///////////////////////////////////////////////
//////////////////////////////////////////////Start of Phase 7///////////////////////////////////////////

//Phase7 Insert Scholastic Records

$phase7_insert_scholastic_records = "INSERT INTO scholastic_records (lrn,school,school_id,district,division,region,classified_as_grade,section,school_year,name_of_teacher,signature,phase,remarks,date_time_created,date_time_updated) VALUES ('$lrn' ,'$phase7_name_of_school', '$phase7_school_id' , '$phase7_district', '$phase7_division', '$phase7_region', '$phase7_classified_as_grade', '$phase7_section', '$phase7_school_year', '$phase7_name_of_school', '$phase7_signature', '$phase7','$phase7_remarks', '$dateCreated', '$dateUpdated')";
$phase7_run_scholastic_records = mysqli_query($conn,$phase7_insert_scholastic_records);
if($phase7_run_scholastic_records){



    //inserting of students grades
    // phase 7 term 1 mother tongue

    $insert_student_grades_term1_phase7_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term1_phase7_mother_tongue','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase7_mother_tongue = mysqli_query($conn,$insert_student_grades_term1_phase7_mother_tongue);
    
    if($insert_student_grades_term1_phase7_mother_tongue){
        echo"term1 mothertongue";
    }

    else{
        $conn->error;;
    }

    // phase 7 term 1 filipino

    $insert_student_grades_term1_phase7_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term1_phase7_filipino','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase7_filipino = mysqli_query($conn,$insert_student_grades_term1_phase7_filipino);
    
    if($insert_student_grades_term1_phase7_filipino){
        echo"term1 Filipino";
    }

    else{
        $conn->error;
    }

    // phase 7 term 1 english

    $insert_student_grades_term1_phase7_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term1_phase7_english','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase7_english = mysqli_query($conn,$insert_student_grades_term1_phase7_english);
    
    if($insert_student_grades_term1_phase7_english){
        echo"term1 english";
    }

    else{
        $conn->error;
    }

    // phase 7 term 1 math

    $insert_student_grades_term1_phase7_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term1_phase7_mathematics','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term1_phase7_math = mysqli_query($conn,$insert_student_grades_term1_phase7_math);
    
    if($insert_student_grades_term1_phase7_math){
        echo"term1 math";
    }

    else{
        $conn->error;
    }

    // phase 7 term 1 science

    $insert_student_grades_term1_phase7_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term1_phase7_science','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term1_phase7_science = mysqli_query($conn,$insert_student_grades_term1_phase7_science);
    
    if($insert_student_grades_term1_phase7_science){
        echo"term1 science";
    }

    else{
        $conn->error;
    }

    // phase 7 term 1 ap

    $insert_student_grades_term1_phase7_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term1_phase7_araling_panlipunan','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term1_phase7_ap = mysqli_query($conn,$insert_student_grades_term1_phase7_ap);
    
    if($insert_student_grades_term1_phase7_ap){
        echo"term1 Araling panlipunan";
    }

    else{
        $conn->error;
    }

    // phase 7 term 1 epp tle

    $insert_student_grades_term1_phase7_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term1_phase7_epp_tle','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase7_epp_tle = mysqli_query($conn,$insert_student_grades_term1_phase7_epp_tle);
    
    if($insert_student_grades_term1_phase7_epp_tle){
        echo"term1 EPP_TLE";
    }

    else{
        $conn->error;
    }

    // phase 7 term 1 mapeh

    $insert_student_grades_term1_phase7_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term1_phase7_average_of_mapeh','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase7_mapeh = mysqli_query($conn,$insert_student_grades_term1_phase7_mapeh);

      if($run_student_grades_term1_phase7_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }

        // phase 7 term 1 music

    $insert_student_grades_term1_phase7_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term1_phase7_music','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase7_music = mysqli_query($conn,$insert_student_grades_term1_phase7_music);

       if($run_student_grades_term1_phase7_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }

        // phase 7 term 1 arts

    $insert_student_grades_term1_phase7_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term1_phase7_arts','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase7_arts = mysqli_query($conn,$insert_student_grades_term1_phase7_arts);


        if($run_student_grades_term1_phase7_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }

            // phase 7 term 1  pe

    $insert_student_grades_term1_phase7_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term1_phase7_pe','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase7_pe = mysqli_query($conn,$insert_student_grades_term1_phase7_pe);

        if($run_student_grades_term1_phase7_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }

            // phase 7 term 1 health

    $insert_student_grades_term1_phase7_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term1_phase7_health','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase7_health = mysqli_query($conn,$insert_student_grades_term1_phase7_health);

         if($run_student_grades_term1_phase7_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }

            // phase 7 term 1 esp

    $insert_student_grades_term1_phase7_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term1_phase7_esp','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase7_esp = mysqli_query($conn,$insert_student_grades_term1_phase7_esp);

        if($run_student_grades_term1_phase7_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }

            // phase 7 term 1 arabic

    $insert_student_grades_term1_phase7_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term1_phase7_arabic_language','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase7_arabic = mysqli_query($conn,$insert_student_grades_term1_phase7_arabic);

    if($run_student_grades_term1_phase7_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }

        // phase 7 term 1 islamic

    $insert_student_grades_term1_phase7_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$islamic_values', '$term1_phase7_islamic_values','$term1_phase7', '$phase7', '$term1_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term1_phase7_islamic = mysqli_query($conn,$insert_student_grades_term1_phase7_islamic);

    if($run_student_grades_term1_phase7_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term1_phase7 islamic" . '<br>';
        }
            //phase 7 general average
        $insert_phase7_term1_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase7_term1_general_average','$term1_phase7','$phase7','$phase7_remarks','$dateCreated','$dateUpdated');";
        $run_phase7_term1_student_averages = mysqli_query($conn,$insert_phase7_term1_general_average);

        if($run_phase7_term1_student_averages){
            echo "added student averages term1";
        
            
        }else{
            echo "error student_averages" . $conn->error;
        }

        // phase 7 term 1  ends here ------------------------------


        //  insertion of grades 
        //  phase 7 term 2 mother tongue


        $insert_student_grades_term2_phase7_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term2_phase7_mother_tongue','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase7_mother_tongue = mysqli_query($conn,$insert_student_grades_term2_phase7_mother_tongue);
    
    if($insert_student_grades_term2_phase7_mother_tongue){
        echo"term2 mothertongue";
    }

    else{
        $conn->error;;
    }


    //  phase 7 term 2 filipino

    $insert_student_grades_term2_phase7_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term2_phase7_filipino','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase7_filipino = mysqli_query($conn,$insert_student_grades_term2_phase7_filipino);
    
    if($insert_student_grades_term2_phase7_filipino){
        echo"term2 Filipino";
    }

    else{
        $conn->error;
    }

    //  phase 7 term 2 english

    $insert_student_grades_term2_phase7_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term2_phase7_english','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase7_english = mysqli_query($conn,$insert_student_grades_term2_phase7_english);
    
    if($insert_student_grades_term2_phase7_english){
        echo"term2 english";
    }

    else{
        $conn->error;
    }

    //  phase 7 term 2 math

    $insert_student_grades_term2_phase7_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term2_phase7_mathematics','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term2_phase7_math = mysqli_query($conn,$insert_student_grades_term2_phase7_math);
    
    if($insert_student_grades_term2_phase7_math){
        echo"term2 math";
    }

    else{
        $conn->error;
    }

    //  phase 7 term 2 science

    $insert_student_grades_term2_phase7_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term2_phase7_science','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term2_phase7_science = mysqli_query($conn,$insert_student_grades_term2_phase7_science);
    
    if($insert_student_grades_term2_phase7_science){
        echo"term2 science";
    }

    else{
        $conn->error;
    }

    //  phase 7 term 2 ap

    $insert_student_grades_term2_phase7_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term2_phase7_araling_panlipunan','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term2_phase7_ap = mysqli_query($conn,$insert_student_grades_term2_phase7_ap);
    
    if($insert_student_grades_term2_phase7_ap){
        echo"term2 Araling panlipunan";
    }

    else{
        $conn->error;
    }

    //  phase 7 term 2 epp tle

    $insert_student_grades_term2_phase7_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term2_phase7_epp_tle','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase7_epp_tle = mysqli_query($conn,$insert_student_grades_term2_phase7_epp_tle);
    
    if($insert_student_grades_term2_phase7_epp_tle){
        echo"term2 EPP_TLE";
    }

    else{
        $conn->error;
    }

    //  phase 7 term 2 mapeh

    $insert_student_grades_term2_phase7_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term2_phase7_average_of_mapeh','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase7_mapeh = mysqli_query($conn,$insert_student_grades_term2_phase7_mapeh);

      if($run_student_grades_term2_phase7_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }

        //  phase 7 term 2 music

    $insert_student_grades_term2_phase7_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term2_phase7_music','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase7_music = mysqli_query($conn,$insert_student_grades_term2_phase7_music);

       if($run_student_grades_term2_phase7_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }

        //  phase 7 term 2 arts

    $insert_student_grades_term2_phase7_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term2_phase7_arts','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase7_arts = mysqli_query($conn,$insert_student_grades_term2_phase7_arts);


        if($run_student_grades_term2_phase7_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }

            //  phase 7 term 2 pe

    $insert_student_grades_term2_phase7_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term2_phase7_pe','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase7_pe = mysqli_query($conn,$insert_student_grades_term2_phase7_pe);

        if($run_student_grades_term2_phase7_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }


            //  phase 7 term 2  health

    $insert_student_grades_term2_phase7_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term2_phase7_health','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase7_health = mysqli_query($conn,$insert_student_grades_term2_phase7_health);

         if($run_student_grades_term2_phase7_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }

            //  phase 7 term 2 esp

    $insert_student_grades_term2_phase7_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term2_phase7_esp','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase7_esp = mysqli_query($conn,$insert_student_grades_term2_phase7_esp);

        if($run_student_grades_term2_phase7_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }

            //  phase 7 term 2 arabic

    $insert_student_grades_term2_phase7_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term2_phase7_arabic_language','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase7_arabic = mysqli_query($conn,$insert_student_grades_term2_phase7_arabic);

    if($run_student_grades_term2_phase7_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }

        //  phase 7 term 2 islamic

    $insert_student_grades_term2_phase7_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$islamic_values', '$term2_phase7_islamic_values','$term2_phase7', '$phase7', '$term2_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term2_phase7_islamic = mysqli_query($conn,$insert_student_grades_term2_phase7_islamic);

    if($run_student_grades_term2_phase7_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term2_phase7 islamic" . '<br>';
        }




            // phase 7 general average of term 2

            $insert_phase7_term2_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase7_term2_general_average','$term2_phase7','$phase7',' $term2_phase7_remarks','$dateCreated','$dateUpdated');";
        $run_phase7_term2_student_averages = mysqli_query($conn,$insert_phase7_term2_general_average);

        if($run_phase7_term2_student_averages){
            echo "added student averages term1";
            
        }else{
            echo "error student_averages" . $conn->error;
        }

        //  phase 7 term 2  ends here ---------------------------

        //insertion of grades

        //phase 7 term 3 moother tongue

        $insert_student_grades_term3_phase7_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term3_phase7_mother_tongue','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase7_mother_tongue = mysqli_query($conn,$insert_student_grades_term3_phase7_mother_tongue);
    
    if($insert_student_grades_term3_phase7_mother_tongue){
        echo"term3 mothertongue";
    }

    else{
        $conn->error;;
    }

    //phase 7 term 3 filipino

    $insert_student_grades_term3_phase7_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term3_phase7_filipino','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase7_filipino = mysqli_query($conn,$insert_student_grades_term3_phase7_filipino);
    
    if($insert_student_grades_term3_phase7_filipino){
        echo"term3 Filipino";
    }

    else{
        $conn->error;
    }

    //phase 7 term 3 english

    $insert_student_grades_term3_phase7_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term3_phase7_english','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase7_english = mysqli_query($conn,$insert_student_grades_term3_phase7_english);
    
    if($insert_student_grades_term3_phase7_english){
        echo"term3 english";
    }

    else{
        $conn->error;
    }

    //phase 7 term 3 math

    $insert_student_grades_term3_phase7_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term3_phase7_mathematics','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term3_phase7_math = mysqli_query($conn,$insert_student_grades_term3_phase7_math);
    
    if($insert_student_grades_term3_phase7_math){
        echo"term3 math";
    }

    else{
        $conn->error;
    }

    //phase 7 term 3 science

    $insert_student_grades_term3_phase7_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term3_phase7_science','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term3_phase7_science = mysqli_query($conn,$insert_student_grades_term3_phase7_science);
    
    if($insert_student_grades_term3_phase7_science){
        echo"term3 science";
    }

    else{
        $conn->error;
    }

    //phase 7 term 3 ap

    $insert_student_grades_term3_phase7_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term3_phase7_araling_panlipunan','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term3_phase7_ap = mysqli_query($conn,$insert_student_grades_term3_phase7_ap);
    
    if($insert_student_grades_term3_phase7_ap){
        echo"term3 Araling panlipunan";
    }

    else{
        $conn->error;
    }

    //phase 7 term 3 epp tle

    $insert_student_grades_term3_phase7_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term3_phase7_epp_tle','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase7_epp_tle = mysqli_query($conn,$insert_student_grades_term3_phase7_epp_tle);
    
    if($insert_student_grades_term3_phase7_epp_tle){
        echo"term3 EPP_TLE";
    }

    else{
        $conn->error;
    }

    //phase 7 term 3 mapeh

    $insert_student_grades_term3_phase7_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term3_phase7_average_of_mapeh','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase7_mapeh = mysqli_query($conn,$insert_student_grades_term3_phase7_mapeh);

      if($run_student_grades_term3_phase7_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }

        //phase 7 term 3 music

    $insert_student_grades_term3_phase7_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term3_phase7_music','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase7_music = mysqli_query($conn,$insert_student_grades_term3_phase7_music);

       if($run_student_grades_term3_phase7_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }

        //phase 7 term 3  arts

    $insert_student_grades_term3_phase7_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term3_phase7_arts','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase7_arts = mysqli_query($conn,$insert_student_grades_term3_phase7_arts);


        if($run_student_grades_term3_phase7_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }

            //phase 7 term 3 pe

    $insert_student_grades_term3_phase7_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term3_phase7_pe','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase7_pe = mysqli_query($conn,$insert_student_grades_term3_phase7_pe);

        if($run_student_grades_term3_phase7_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }

            //phase 7 term 3 health 

    $insert_student_grades_term3_phase7_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term3_phase7_health','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase7_health = mysqli_query($conn,$insert_student_grades_term3_phase7_health);

         if($run_student_grades_term3_phase7_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }

            //phase 7 term 3 esp

    $insert_student_grades_term3_phase7_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term3_phase7_esp','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase7_esp = mysqli_query($conn,$insert_student_grades_term3_phase7_esp);

        if($run_student_grades_term3_phase7_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }

            //phase 7 term 3 arabic

    $insert_student_grades_term3_phase7_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term3_phase7_arabic_language','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase7_arabic = mysqli_query($conn,$insert_student_grades_term3_phase7_arabic);

    if($run_student_grades_term3_phase7_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }

        //phase 7 term 3 islamic

    $insert_student_grades_term3_phase7_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$islamic_values', '$term3_phase7_islamic_values','$term3_phase7', '$phase7', '$term3_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term3_phase7_islamic = mysqli_query($conn,$insert_student_grades_term3_phase7_islamic);

    if($run_student_grades_term3_phase7_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term3_phase7 islamic" . '<br>';
        }

        


            // phase 7 general average of term 3

            $insert_phase7_term3_general_average = "INSERT INTO student_general_averages (`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase7_term3_general_average','$term3_phase7','$phase7',' $term3_phase7_remarks','$dateCreated','$dateUpdated');";
        $run_phase7_term3_student_averages = mysqli_query($conn,$insert_phase7_term3_general_average);

        if($run_phase7_term3_student_averages){
            echo "added student averages term1";
           
        }else{
            echo "error student_averages" . $conn->error;
        }
        //phase 7 term 3  ends here ---------------------------
            //insertion of grades 

        // phase 7 term 4 mother tongue




        $insert_student_grades_term4_phase7_mother_tongue = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mother_tongue', '$term4_phase7_mother_tongue','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase7_mother_tongue = mysqli_query($conn,$insert_student_grades_term4_phase7_mother_tongue);
    
    if($insert_student_grades_term4_phase7_mother_tongue){
        echo"term4 mothertongue";
    }

    else{
        $conn->error;;
    }

    // phase 7 term 4  filipino

    $insert_student_grades_term4_phase7_filipino = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$filipino', '$term4_phase7_filipino','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase7_filipino = mysqli_query($conn,$insert_student_grades_term4_phase7_filipino);
    
    if($insert_student_grades_term4_phase7_filipino){
        echo"term4 Filipino";
    }

    else{
        $conn->error;
    }

    // phase 7 term 4 english

    $insert_student_grades_term4_phase7_english = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$english', '$term4_phase7_english','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase7_english = mysqli_query($conn,$insert_student_grades_term4_phase7_english);
    
    if($insert_student_grades_term4_phase7_english){
        echo"term4 english";
    }

    else{
        $conn->error;
    }

    // phase 7 term 4 math

    $insert_student_grades_term4_phase7_math = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$math', '$term4_phase7_mathematics','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term4_phase7_math = mysqli_query($conn,$insert_student_grades_term4_phase7_math);
    
    if($insert_student_grades_term4_phase7_math){
        echo"term4 math";
    }

    else{
        $conn->error;
    }

    // phase 7 term 4 science

    $insert_student_grades_term4_phase7_science = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$science', '$term4_phase7_science','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
      $run_student_grades_term4_phase7_science = mysqli_query($conn,$insert_student_grades_term4_phase7_science);
    
    if($insert_student_grades_term4_phase7_science){
        echo"term4 science";
    }

    else{
        $conn->error;
    }

    // phase 7 term 4 ap

    $insert_student_grades_term4_phase7_ap = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
      VALUES ('$lrn','$AP', '$term4_phase7_araling_panlipunan','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
        $run_student_grades_term4_phase7_ap = mysqli_query($conn,$insert_student_grades_term4_phase7_ap);
    
    if($insert_student_grades_term4_phase7_ap){
        echo"term4 Araling panlipunan";
    }

    else{
        $conn->error;
    }

    // phase 7 term 4  epp tle

    $insert_student_grades_term4_phase7_epp_tle = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$epp_tle', '$term4_phase7_epp_tle','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase7_epp_tle = mysqli_query($conn,$insert_student_grades_term4_phase7_epp_tle);
    
    if($insert_student_grades_term4_phase7_epp_tle){
        echo"term4 EPP_TLE";
    }

    else{
        $conn->error;
    }

    // phase 7 term 4 mapeh

    $insert_student_grades_term4_phase7_mapeh = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$mapeh', '$term4_phase7_average_of_mapeh','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase7_mapeh = mysqli_query($conn,$insert_student_grades_term4_phase7_mapeh);

      if($run_student_grades_term4_phase7_mapeh){
        echo  "added term mapeh";
      }
        else{
            $conn->error;
        }

        // phase 7 term 4 music

    $insert_student_grades_term4_phase7_music = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$music', '$term4_phase7_music','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase7_music = mysqli_query($conn,$insert_student_grades_term4_phase7_music);

       if($run_student_grades_term4_phase7_music){
           echo  "added term music" . '<br>';
       }
           else{
            $conn->error;
        }

        // phase 7 term 4 arts

    $insert_student_grades_term4_phase7_arts = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arts', '$term4_phase7_arts','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase7_arts = mysqli_query($conn,$insert_student_grades_term4_phase7_arts);


        if($run_student_grades_term4_phase7_arts){
            echo  "added term arts" . '<br>';
        }

            else{
                $conn->error;
            }

            // phase 7 term 4 pe

    $insert_student_grades_term4_phase7_pe = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$PE', '$term4_phase7_pe','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase7_pe = mysqli_query($conn,$insert_student_grades_term4_phase7_pe);

        if($run_student_grades_term4_phase7_pe){
            echo  "added term PE" . '<br>';
        }
           
            else{
                $conn->error;
            }

            // phase 7 term 4 health

    $insert_student_grades_term4_phase7_health = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
     VALUES ('$lrn','$health', '$term4_phase7_health','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase7_health = mysqli_query($conn,$insert_student_grades_term4_phase7_health);

         if($run_student_grades_term4_phase7_health){

             echo  "added term health" . '<br>';
         }
            
             else{
                $conn->error;
            }

            // phase 7 term 4 esp

    $insert_student_grades_term4_phase7_esp = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$esp', '$term4_phase7_esp','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase7_esp = mysqli_query($conn,$insert_student_grades_term4_phase7_esp);

        if($run_student_grades_term4_phase7_esp){
            echo  "added term esp" . '<br>';
        }
            else{
                $conn->error;
            }


            // phase 7 term 4 arabic

    $insert_student_grades_term4_phase7_arabic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn','$arabic_language', '$term4_phase7_arabic_language','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase7_arabic = mysqli_query($conn,$insert_student_grades_term4_phase7_arabic);

    if($run_student_grades_term4_phase7_arabic){
         echo  "added term arabic" . '<br>';
    }   
        
         else{
            $conn->error;
        }

        // phase 7 term 4 islamic

    $insert_student_grades_term4_phase7_islamic = "INSERT INTO student_grades (lrn,subject_id,grade,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn',' $islamic_values', '$term4_phase7_islamic_values','$term4_phase7', '$phase7', '$term4_phase7_remarks','$dateCreated', '$dateUpdated')" ;
    $run_student_grades_term4_phase7_islamic = mysqli_query($conn,$insert_student_grades_term4_phase7_islamic);

    if($run_student_grades_term4_phase7_islamic){
         echo  "added term islamic" . '<br>';
                                                                
     }
     
     else{
          echo "error term4_phase7 islamic" . '<br>';
        }




            // phase 7 general average of term 4

            $insert_phase7_term4_general_average = "INSERT INTO `student_general_averages`(`lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) 
        VALUES ('$lrn','$phase7_term4_general_average','$term4_phase7','$phase7',' $term4_phase7_remarks','$dateCreated','$dateUpdated');";
        $run_phase7_term4_student_averages = mysqli_query($conn,$insert_phase7_term4_general_average);

        if($run_phase7_term4_student_averages){
            echo "added student averages term1";
            
        }else{
            echo "error student_averages" . $conn->error;
        }

        // phase 7 term 4  ends here ----------------

        //inserting of final grades

         //insert ko sa PHASE 7  FINAL RATINGS table PER SUBJECT mother tongue

        $insert_student_final_ratings_mt = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$mother_tongue','$phase7_final_rating_mother_tongue', '$phase7_term5', '$phase7', '$phase7_final_rating_mother_tongue_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_mt = mysqli_query($conn,$insert_student_final_ratings_mt);

    if($run_student_final_ratings_mt){
        echo "added to student final ratings MT" . '<br>';
    }else{
        echo "Error student final ratings MT" . '<br>';
    }

     //insert ko sa PHASE 7  FINAL RATINGS table PER SUBJECT filipino

    $insert_student_final_ratings_filipino = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$filipino', '$phase7_final_rating_filipino','$phase7_term5', '$phase7', '$phase7_final_rating_filipino_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_filipino = mysqli_query($conn,$insert_student_final_ratings_filipino);

    if($run_student_final_ratings_filipino){
        echo "added to student final ratings filipino" . '<br>';
    }else{
        echo "Error student final ratings filipino" . '<br>';
    }

    //insert ko sa PHASE 7  FINAL RATINGS table PER SUBJECT English

    $insert_student_final_ratings_english = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$english','$phase7_final_rating_english', '$phase7_term5', '$phase7', '$phase7_final_rating_english_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_english = mysqli_query($conn,$insert_student_final_ratings_english);

    if($run_student_final_ratings_english){
        echo "added to student final ratings english" . '<br>';
    }else{
        echo "Error student final ratings english" . '<br>';
    }

    //insert ko sa PHASE 7  FINAL RATINGS table PER SUBJECT Math

    $insert_student_final_ratings_math = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$math','$phase7_final_rating_math', '$phase7_term5', '$phase7', '$phase7_final_rating_math_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_math = mysqli_query($conn,$insert_student_final_ratings_math);

    if($run_student_final_ratings_math){
        echo "added to student final ratings math" . '<br>';
    }else{
        echo "Error student final ratings math" . '<br>';
    }

    //insert ko sa PHASE 7  FINAL RATINGS table PER SUBJECT Science

    $insert_student_final_ratings_science = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$science','$phase7_final_rating_science', '$phase7_term5', '$phase7', '$phase7_final_rating_science_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_science = mysqli_query($conn,$insert_student_final_ratings_science);

    if($run_student_final_ratings_science){
        echo "added to student final ratings Science" . '<br>';
    }else{
        echo "Error student final ratings math" . '<br>';
    }

    //insert ko sa PHASE 7  FINAL RATINGS table PER SUBJECT AP

    $insert_student_final_ratings_AP = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$AP','$phase7_final_rating_AP', '$phase7_term5', '$phase7', '$phase7_final_rating_AP_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_AP = mysqli_query($conn,$insert_student_final_ratings_AP);

    if($run_student_final_ratings_AP){
        echo "added to student final ratings AP" . '<br>';
    }else{
        echo "Error student final ratings AP" . '<br>';
    }

    //insert ko sa PHASE 7  FINAL RATINGS table PER SUBJECT EPP / TLE

    $insert_student_final_ratings_epp_tle = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$epp_tle','$phase7_final_rating_epp_tle', '$phase7_term5', '$phase7', '$phase7_final_rating_epp_tle_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_epp_tle = mysqli_query($conn,$insert_student_final_ratings_epp_tle);

    if($run_student_final_ratings_epp_tle){
        echo "added to student final ratings epp tle" . '<br>';
    }else{
        echo "Error student final ratings epp tle" . '<br>';
    }

    //insert ko sa PHASE 7  FINAL RATINGS table PER SUBJECT MAPEH

    $insert_student_final_ratings_mapeh = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$mapeh','$phase7_final_rating_mapeh', '$phase7_term5', '$phase7', '$phase7_final_rating_mapeh_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_mapeh = mysqli_query($conn,$insert_student_final_ratings_mapeh);

    if($run_student_final_ratings_mapeh){
        echo "added to student final ratings mapeh" . '<br>';
    }else{
        echo "Error student final ratings mapeh" . '<br>';
    }

    //insert ko sa PHASE 7  FINAL RATINGS table PER SUBJECT music

    $insert_student_final_ratings_music = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$music','$phase7_final_rating_music', '$phase7_term5', '$phase7', '$phase7_final_rating_music_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_music = mysqli_query($conn,$insert_student_final_ratings_music);

    if($run_student_final_ratings_music){
        echo "added to student final ratings music" . '<br>';
    }else{
        echo "Error student final ratings music" . '<br>';
    }

    //insert ko sa PHASE 7  FINAL RATINGS table PER SUBJECT arts

    $insert_student_final_ratings_arts = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$arts','$phase7_final_rating_arts', '$phase7_term5', '$phase7', '$phase7_final_rating_arts_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_arts = mysqli_query($conn,$insert_student_final_ratings_arts);

    if($run_student_final_ratings_music){
        echo "added to student final ratings arts" . '<br>';
    }else{
        echo "Error student final ratings arts" . '<br>';
    }

    //insert ko sa PHASE 7  FINAL RATINGS table PER SUBJECT pe

    $insert_student_final_ratings_pe = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$PE','$phase7_final_rating_PE', '$phase7_term5', '$phase7', '$phase7_final_rating_PE_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_pe = mysqli_query($conn,$insert_student_final_ratings_pe);

    if($run_student_final_ratings_pe){
        echo "added to student final ratings PE" . '<br>';
    }else{
        echo "Error student final ratings PE" . '<br>';
    }

    //insert ko sa PHASE 7  FINAL RATINGS table PER SUBJECT health

    $insert_student_final_ratings_health = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$health','$phase7_final_rating_health', '$phase7_term5', '$phase7', '$phase7_final_rating_health_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_health = mysqli_query($conn,$insert_student_final_ratings_health);

    if($run_student_final_ratings_pe){
        echo "added to student final ratings health" . '<br>';
    }else{
        echo "Error student final ratings health" . '<br>';
    }

    //insert ko sa PHASE 7  FINAL RATINGS table PER SUBJECT ESP

    $insert_student_final_ratings_esp = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$esp', '$phase7_final_rating_esp','$phase7_term5', '$phase7', '$phase7_final_rating_esp_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_esp = mysqli_query($conn,$insert_student_final_ratings_esp);

    if($run_student_final_ratings_pe){
        echo "added to student final ratings esp" . '<br>';
    }else{
        echo "Error student final ratings esp" . '<br>';
    }


    //insert ko sa PHASE 7  FINAL RATINGS table PER SUBJECT arabic language

    $insert_student_final_ratings_arabic = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$arabic_language', '$phase7_final_rating_arabic_language','$phase7_term5', '$phase7', '$phase7_final_rating_arabic_language_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_arabic = mysqli_query($conn,$insert_student_final_ratings_arabic);


    if($run_student_final_ratings_arabic){
        echo "added to student final ratings arabic" . '<br>';
    }else{
        echo "Error student final ratings arabic" . $conn->error;
    }

    //insert ko sa PHASE 7  FINAL RATINGS table PER SUBJECT islamic values

    $insert_student_final_ratings_islam = "INSERT INTO student_final_ratings (lrn,subject_id,final_rating,term,phase,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn', '$islamic_values','$phase7_final_rating_arabic_language', '$phase7_term5', '$phase7', '$phase7_final_rating_islamic_values_output', '$dateCreated' , '$dateUpdated')";
    $run_student_final_ratings_islam = mysqli_query($conn,$insert_student_final_ratings_islam);

    if($run_student_final_ratings_islam){
        echo "added to student final ratings islamic" . '<br>';
    }else{
        echo "Error student final ratings islamic" . '<br>';
    }


        //general averag of phase 7 term 5 
    $insert_phase7_term5_general_average = "INSERT INTO student_general_averages(lrn,general_average,term,phase,remarks,date_time_created,date_time_updated) 
    VALUES ('$lrn','$phase7_term5_general_average', '$phase7_term5','$phase7','$term1_phase7_remarks', '$dateCreated','$dateUpdated')";

    $run_phase7_term5_general_average = mysqli_query($conn,$insert_phase7_term5_general_average);

    if($run_phase7_term5_general_average){
        echo "added student averages term5";
    }else{
        echo "added student averages term5";
    }

    for ($phase7_remedial_term = 1; $phase7_remedial_term <=2 ; $phase7_remedial_term++){



        if($phase7_remedial_term ==1){
    $phase7_remedial_query= "INSERT INTO `remedial_classes`(`lrn`, `date_from`, `date_to`, `learning_areas`, `final_rating`, `remedial_class_mark`, `recomputed_final_grade`, `phase`, `term`, `remarks`, `date_time_created`, `date_time_updated`) 
    VALUES ('$lrn','$phase7_remedial_from','$phase7_remedial_to','$phase7_remedial_learning_areas_1',' $phase7_remedial_final_rating_1','$phase7_remedial_class_mark_1','$phase7_recomputed_final_grade_1','$phase7','$phase7_remedial_term','$phase7_remedial_remarks_1','$dateCreated','$dateUpdated')";
    
    $phase7_run_query = mysqli_query($conn,$phase7_remedial_query);

    if($phase7_run_query){
    echo "remedial query success <br>";
    }
    else
    {
        $conn->error;
    }
        
}



     elseif($phase7_remedial_term ==2) {
        

    $phase7_remedial_query= "INSERT INTO `remedial_classes`(`lrn`, `date_from`, `date_to`, `learning_areas`, `final_rating`, `remedial_class_mark`, `recomputed_final_grade`, `phase`, `term`, `remarks`, `date_time_created`, `date_time_updated`) 
    VALUES ('$lrn','$phase7_remedial_from','$phase7_remedial_to','$phase7_remedial_learning_areas_2',' $phase7_remedial_final_rating_2','$phase7_remedial_class_mark_2','$phase7_recomputed_final_grade_2','$phase7','$phase7_remedial_term','$phase7_remedial_remarks_2','$dateCreated','$dateUpdated')";
    
    $phase7_run_query = mysqli_query($conn,$phase7_remedial_query);

        if($phase7_run_query){
            echo "remedial query success term2  <br>";
        }
            else
            {
                $conn->error;
            }
}   
}




}



/////////////////////////////////////////////END OF Phase 7///////////////////////////////////////
////////////////////////////////////////////Start of Phase 8////////////////////////////////


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

 /////////////////////////////////// FOR PROMOTION , RETAINED OR RMEDIAL ///////////////
/*
 //phase 1 

    $sql_total_remarks_phase1 = "SELECT COUNT(remarks) AS 'total_remarks' , lrn FROM student_final_ratings WHERE phase = '1' AND lrn = '$lrn' AND remarks= 'FAILED' ";
    $run_total_remarks_phase1 = mysqli_query($conn,$sql_total_remarks_phase1);

    if(mysqli_num_rows($run_total_remarks_phase1) > 0){
        $number = 0;
        foreach($run_total_remarks_phase1 as $row1){

            if($row1 ['total_remarks'] >= 3){
                echo "RETAINED"; 
            }else if ($row1 ['total_remarks'] == 2){
                echo "REMEDIAL";
            }else if($row1['total_remarks'] <= 1){
                echo "PROMOTED";
            }

        
        }
    }

    ////PHASE 2

    $sql_total_remarks_phase2 = "SELECT COUNT(remarks) AS 'total_remarks' , lrn FROM student_final_ratings WHERE phase = '2' AND lrn = '$lrn' AND remarks= 'FAILED' ";
    $run_total_remarks_phase2 = mysqli_query($conn,$sql_total_remarks_phase2);

    if(mysqli_num_rows($run_total_remarks_phase2) > 0){
        $number = 0;
        foreach($run_total_remarks_phase2 as $row2){

            if($row2 ['total_remarks'] >= 3){
                echo "RETAINED"; 
            }else if ($row2 ['total_remarks'] == 2){
                echo "REMEDIAL";
            }else if($row2 ['total_remarks'] <= 1){
                echo "PROMOTED";
            }
        }
    }
    ////PHASE 3

    $sql_total_remarks_phase3 = "SELECT COUNT(remarks) AS 'total_remarks' , lrn FROM student_final_ratings WHERE phase = '3' AND lrn = '$lrn' AND remarks= 'FAILED' ";
    $run_total_remarks_phase3 = mysqli_query($conn,$sql_total_remarks_phase3);

    if(mysqli_num_rows($run_total_remarks_phase3) > 0){
        $number = 0;
        foreach($run_total_remarks_phase3 as $row3){

            if($row3 ['total_remarks'] >= 3){
                echo "RETAINED"; 
            }else if ($row3 ['total_remarks'] == 2){
                echo "REMEDIAL";
            }else if($row3 ['total_remarks'] <= 1){
                echo "PROMOTED";
            }
        }
    }


    ////PHASE 4

    $sql_total_remarks_phase4 = "SELECT COUNT(remarks) AS 'total_remarks' , lrn FROM student_final_ratings WHERE phase = '4' AND lrn = '$lrn' AND remarks= 'FAILED' ";
    $run_total_remarks_phase4 = mysqli_query($conn,$sql_total_remarks_phase4);

    if(mysqli_num_rows($run_total_remarks_phase4) > 0){
        $number = 0;
        foreach($run_total_remarks_phase4 as $row4){

            if($row4 ['total_remarks'] >= 3){
                echo "RETAINED"; 
            }else if ($row4 ['total_remarks'] == 2){
                echo "REMEDIAL";
            }else if($row4 ['total_remarks'] <= 1){
                echo "PROMOTED";
            }
        }
    }

    ////PHASE 5

    $sql_total_remarks_phase5 = "SELECT COUNT(remarks) AS 'total_remarks' , lrn FROM student_final_ratings WHERE phase = '5' AND lrn = '$lrn' AND remarks= 'FAILED' ";
    $run_total_remarks_phase5 = mysqli_query($conn,$sql_total_remarks_phase5);

    if(mysqli_num_rows($run_total_remarks_phase5) > 0){
        $number = 0;
        foreach($run_total_remarks_phase5 as $row5){

            if($row5 ['total_remarks'] >= 3){
                echo "RETAINED"; 
            }else if ($row5 ['total_remarks'] == 2){
                echo "REMEDIAL";
            }else if($row5 ['total_remarks'] <= 1){
                echo "PROMOTED";
            }
        }
    }

    ////PHASE 6

    $sql_total_remarks_phase6 = "SELECT COUNT(remarks) AS 'total_remarks' , lrn FROM student_final_ratings WHERE phase = '6' AND lrn = '$lrn' AND remarks= 'FAILED' ";
    $run_total_remarks_phase6 = mysqli_query($conn,$sql_total_remarks_phase5);

    if(mysqli_num_rows($run_total_remarks_phase6) > 0){
        $number = 0;
        foreach($run_total_remarks_phase5 as $row6){

            if($row6 ['total_remarks'] >= 3){
                echo "RETAINED"; 
            }else if ($row6 ['total_remarks'] == 2){
                echo "REMEDIAL";
            }else if($row6 ['total_remarks'] <= 1){
                echo "PROMOTED";
            }
        }
    }

     ////PHASE 7

    $sql_total_remarks_phase7 = "SELECT COUNT(remarks) AS 'total_remarks' , lrn FROM student_final_ratings WHERE phase = '7' AND lrn = '$lrn' AND remarks= 'FAILED' ";
    $run_total_remarks_phase7 = mysqli_query($conn,$sql_total_remarks_phase5);

    if(mysqli_num_rows($run_total_remarks_phase7) > 0){
        $number = 0;
        foreach($run_total_remarks_phase5 as $row7){

            if($row7 ['total_remarks'] >= 3){
                echo "RETAINED"; 
            }else if ($row7 ['total_remarks'] == 2){
                echo "REMEDIAL";
            }else if($row7 ['total_remarks'] <= 1){
                echo "PROMOTED";
            }
        }
    }

     ////PHASE 8

    $sql_total_remarks_phase8 = "SELECT COUNT(remarks) AS 'total_remarks' , lrn FROM student_final_ratings WHERE phase = '8' AND lrn = '$lrn' AND remarks= 'FAILED' ";
    $run_total_remarks_phase8 = mysqli_query($conn,$sql_total_remarks_phase5);

    if(mysqli_num_rows($run_total_remarks_phase8) > 0){
        $number = 0;
        foreach($run_total_remarks_phase8 as $row8){

            if($row8 ['total_remarks'] >= 3){
                echo "RETAINED"; 
            }else if ($row8 ['total_remarks'] == 2){
                echo "REMEDIAL";
            }else if($row8 ['total_remarks'] <= 1){
                echo "PROMOTED";
            }
        }
    }

*/
ob_end_flush();

}
?>