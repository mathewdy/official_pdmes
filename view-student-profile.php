<?php
ob_start();
include('connection.php');
// session_start();
// if(empty($_SESSION['username'])){
//     echo "<script>window.location.href='login.php'</script>";
// }

// error_reporting(E_ERROR & E_WARNING);
// $lrn = $_SESSION['lrn'];
// if(empty($_SESSION['lrn'])){
//   echo "<script>window,location.href='addrecord.php' </script>";
// }


// $query_lrn = "SELECT * FROM learners_personal_infos WHERE lrn = '$lrn' ";
// $run_query_lrn = mysqli_query($conn,$query_lrn);

// if(isset($_GET['sid'])){
//     foreach ($_GET as $encrypting_lrn => $encrypt_lrn){
//         $decrypt_lrn = $_GET[$encrypting_lrn] = base64_decode(urldecode($encrypt_lrn));
//         $decrypted_lrn = ((($decrypt_lrn*859475)/5977)/123456789);
//         }
    
//     if(empty($_GET['sid'])){    //lrn verification starts here
//         echo "<script>alert('LRN not found');
//         window.location = 'index.php';</script>";
//         exit();
//     }
//     $verify_lrn = "SELECT learners_personal_infos.lrn FROM `learners_personal_infos` WHERE lrn = '$decrypted_lrn'";
//     $query_request = mysqli_query($conn, $verify_lrn) or die (mysqli_error($conn));
//     if(mysqli_num_rows($query_request) == 0){
//             echo "
//             <script type = 'text/javascript'>
//             window.location = 'index.php';
//             </script>";
//             exit();
//     } 
    // echo $decrypted_lrn . '<br>';
    // inalis ko muna palatandaan mo lang naman to jd


?>

<?php include 'includes/header.php';?>
<link rel="stylesheet" href="src/css/phase-style.css">
<?php include 'includes/topnav.php';?>
<?php include 'includes/pre-load.php';?>
<div class="container-xl bg-white">
    <form novalidate action="new-edit-students.php" id="up_form" class="pb-3 pt-2 mx-0" method="POST">
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
            <?php
            $sql_student_info = "SELECT * FROM learners_personal_infos
            LEFT JOIN eligibility_for_elementary_school_enrollment on eligibility_for_elementary_school_enrollment.lrn = learners_personal_infos.lrn
            WHERE learners_personal_infos.lrn = '109857060083'";
            $query_student_info = mysqli_query($conn, $sql_student_info);
            $rows = mysqli_fetch_array($query_student_info);
            $credentials = explode(',',$rows['credential_presented']);
            $pept_passer = explode(',', $rows['pept_passer']);
            $efese_others = explode(',', $rows['others']);
            ?>
                    <label for="">LAST NAME:</label>
                    <input type="text" readonly  id="text-only" name="last_name" 
                    value="<?php if(empty($rows['last_name'])){ echo "";}else{ echo $rows['last_name'];}?>" required>    
            </span>
            <span class="hstack d-flex align-items-center">
                <label for="">FIRST NAME:</label>
                <input type="text" readonly  id="text-only" name="first_name"
                value="<?php if(empty($rows['first_name'])){ echo "";}else{ echo $rows['first_name'];}?>" required>   
            </span>
            <span class="hstack d-flex align-items-center" >
                <label for="">NAME EXTN. (Jr,I,II): </label>
                <input type="text" readonly  id="text-only" name="suffix_name" 
                value="<?php if(empty($rows['suffix'])){ echo "";}else{ echo $rows['suffix'];}?>">
            </span>
            <span class="hstack d-flex justify-content-end align-items-center">
                <label for="">MIDDLE NAME: </label>
                <input type="text" readonly  id="text-only" name="middle_name" 
                value="<?php if(empty($rows['middle_name'])){ echo "";}else{ echo $rows['middle_name'];}?>" required>                    
            </span>
        </section>
        <section class="line-2 d-flex justify-content-between">
            <span class="hstack d-flex align-items-end w-75">
                <label for="">Learner Reference Number (LRN):</label>
                <input type="text" readonly  style="margin: 0 1em 0 0; width:30%;" name="lrn" 
                value="<?php if(empty($rows['lrn'])){ echo "";}else{ echo $rows['lrn'];}?>" required>

                <label for="">Birthdate (mm/dd/yyyy):&nbsp;</label>
                <span><?php echo strftime('%d/%m/%Y', strtotime($rows['birth_date']));?></span>
            </span>
            <span class="hstack d-flex align-items-center w-25">
            <label for="">Sex:</label>
                <select class=" w-100" name="sex" id="" disabled required>
                <option value="">-Gender-</option>
                <option value="Male"
                <?php
                    if ($rows['sex'] == "Male"){
                        echo "Selected";
                    }
                    ?>
                >Male</option>
                <option value="Female"
                <?php
                    if ($rows['sex'] == "Female"){
                        echo "Selected";
                    }
                ?>
                >Female</option>
                </select>
            </span>
        </section>
        <p style="background:#d3d3d3; text-align:center; font-size:12pt; font-weight:600; margin:0; border:1px solid black;">ELIGIBILITY FOR ELEMENTARY SCHOOL ENROLLMENT</p>
          <div class="credentials-row border border-dark px-2">
            <div class="d-flex flex-row justify-content-between">
                <i>Credential Presented for Grade 1</i>
                <span class="form-check form-check-inline">
                    <label class="form-check-label">Kinder Progress Report </label>
                    <input type = "checkbox" disabled class="form-check-input" name="credential_presented[]" value="Kinder Progress Report"
                    <?php echo (in_array("Kinder Progress Report", $credentials)? 'checked':'') ?>>
                </span>
                <span class="form-check form-check-inline">
                    <label class="form-check-label">ECCD Checklist </label>
                    <input type = "checkbox" disabled class="form-check-input" name="credential_presented[]" value="ECCD Checklist"
                    <?php echo (in_array("ECCD Checklist", $credentials)? 'checked':'') ?>>
                </span>
                <span class="form-check form-check-inline">
                    <label class="form-check-label">Kindergarden Certificate of Completion </label>
                    <input type = "checkbox" disabled class="form-check-input" name="credential_presented[]" value="Kindergarden Certificate of Completion"
                    <?php echo (in_array("Kindergarden Certificate of Completion", $credentials)? 'checked':'') ?>>
                </span>
            </div>
            <section class="cred-info d-flex flex-row justify-content-between">
                <span class="hstack d-flex align-items-center">
                    <label for="">Name of School:</label>
                    <input type="text" readonly  name="efese_name_of_school" 
                    value="<?php if(empty($rows['name_of_school'])){ echo "";}else{ echo $rows['name_of_school'];}?>" required>
                </span>
                <span class="hstack d-flex align-items-center justify-content-start">
                    <label for="">School ID:</label>
                    <input type="text" readonly  name="efese_school_id" 
                    value="<?php if(empty($rows['school_id'])){ echo "";}else{ echo $rows['school_id'];}?>" required>
                </span>
                <span class="hstack d-flex align-items-center">
                <label for="">Address of School:</label>
                <input type="text" readonly  name="efese_address_of_school" 
                value="<?php if(empty($rows['address_of_school'])){ echo "";}else{ echo $rows['address_of_school'];}?>" required>
                </span>
              </section>
          </div>
        <div class="other-cred">
            <p>Other Credential Presented</p>
            <span class="wrapper d-flex flex-row justify-content-evenly">
                <span>
                <input type = "checkbox" disabled class="form-check-input" name="pept_passer" value="1"
                <?php echo (in_array("1", $pept_passer)? 'checked':'') ?>>
                <label for ="" style="padding: 0 2px 0 0;">PEPT Passer</label>
                  <label for="">Rating:</label>
                  <input type="number" readonly class="w-30" name="efese_rating" 
                  value="<?php if(empty($rows['rating'])){ echo "";}else{ echo $rows['rating'];}?>" required>
                </span>
                <span>
                  <label for="">Date of Examination/Assessment (dd/mm/yyyy):</label>
                  <span style="margin: 0 5em 0 0;"><?php if(empty($rows['date_of_assessment'])){
                      echo "";
                  }else{ echo strftime('%d/%m/%Y', strtotime($rows['date_of_assessment']));}?></span> 
                  
                  <input type = "checkbox" disabled class="form-check-input" name="efese_others" value="1"
                  <?php echo (in_array("1", $efese_others)? 'checked':'') ?>>
                  <label for="">Others (Pls. Specify):</label>
                  <input type="text" readonly  style="width:20%;" 
                  value="<?php if(empty($rows['specify'])){ echo "";}else{ echo $rows['specify'];}?>" name="efese_specify" id="">
              </span>
            </span>
            <section class="last-cred d-flex flex-row justify-content-evenly px-5">
                <span class="hstack w-75">
                    <label for="">Name and Address of Testing Center:</label>
                    <input type="text" readonly  class="w-50" name="efese_testing_center" 
                    
                    value="<?php if(empty($rows['name_and_address_testing_center'])){ echo "";}else{ echo $rows['name_and_address_testing_center'];}?>" id="">
                </span>
                <span class="w-50">
                    <label for="">Remark:</label>
                    <input type="text" readonly  class="w-75" name="efese_remarks" 
                    value="<?php if(empty($rows['remarks'])){ echo "";}else{ echo $rows['remarks'];}?>" id="">
                </span>
            </section>
        </div>
      <p style="background:#c0c0c0; text-align:center; font-size:12pt; font-weight:600; margin:0; border:1px solid black;">SCHOLASTIC RECORDS</p>
      <div class="gen-container d-flex flex-row mt-0 pt-0">
      <div class="form-container" style="padding: 0 7px 7px 0 ;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <!-- PHASE 1 OF SCHOLASTIC RECORDS -->
        <?php
          $phase1_scholastic_records = "SELECT * FROM scholastic_records
          WHERE lrn = '109857060083' AND phase = '1'";
          $query_phase1_scholastic_records = mysqli_query($conn, $phase1_scholastic_records) or die (mysqli_error($conn,));
          $rows = mysqli_fetch_array($query_phase1_scholastic_records);
          ?>
        <span>
          <label>School:</label>
          <input type="text" readonly  id="text-only" name="phase1_sr_school" 
          value="<?php if(empty($rows['school'])){ echo "";}else{ echo $rows['school'];}?>" class="school">
        </span>
        <span>
          <label>School ID:</label>
          <input type="text" readonly  name="phase1_sr_school_id" 
          value="<?php if(empty($rows['school_id'])){ echo "";}else{ echo $rows['school_id'];}?>" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District:</label>
          <input type="text" readonly  class="w-50" name="phase1_sr_district" 
          value="<?php if(empty($rows['district'])){ echo "";}else{ echo $rows['district'];}?>" class="district">
        </span>
        <span>
          <label>Division:</label>
          <input type="text" readonly  class="w-50" name="phase1_sr_division" 
          value="<?php if(empty($rows['division'])){ echo "";}else{ echo $rows['division'];}?>" class="division">
        </span>
        <span class="text-end">
          <label>Region:</label>
          <input type="text" readonly  class="w-50" name="phase1_sr_region" 
          value="<?php if(empty($rows['region'])){ echo "";}else{ echo $rows['region'];}?>" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade:</label>
          <input type="number" readonly id="number-only" style="width: 20%;" name="phase1_sr_classified_as_grade" 
          value="<?php if(empty($rows['classified_as_grade'])){ echo "";}else{ echo $rows['classified_as_grade'];}?>" >
        </span>
        <span>
          <label>Section:</label>
          <input type="text" readonly  class="w-50" name="phase1_sr_section" 
          value="<?php if(empty($rows['section'])){ echo "";}else{ echo $rows['section'];}?>"> 
        </span>
        <span>
          <label>School Year:</label>
          <input type="text" readonly  class="w-50" name="phase1_sr_school_year" 
          value="<?php if(empty($rows['school_year'])){ echo "";}else{ echo $rows['school_year'];}?>">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
        <label for="">Name of Adviser:</label>
        <input type="text" readonly  id="text-only" name="phase1_sr_name_of_adviser" 
        value="<?php if(empty($rows['name_of_teacher'])){ echo "";}else{ echo $rows['name_of_teacher'];}?>">
        </span>
        <span>
          <label>Signature:</label>
          <input type="text" readonly  id="text-only" name="phase1_sr_signature" 
          value="<?php if(empty($rows['signature'])){ echo "";}else{ echo $rows['signature'];}?>" class="school_id">
        </span>
      </span>
    
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
            <th rowspan="2" style="width:40%;"><h6>Learner's Area</h6></th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
            <th rowspan="2" style="width:14%;">Remarks</th>
          </tr>
          <tr style="width: 5%;">
          
                <th><input type="hidden" name="sg_term[]" value="1" readonly>1</th>
                <th><input type="hidden" name="sg_term[]" value="2" readonly>2</th>
                <th><input type="hidden" name="sg_term[]" value="3" readonly>3</th>
                <th><input type="hidden" name="sg_term[]" value="4" readonly>4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            $phase1_mother_tounge = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '1' AND student_grades.subject_id = '1'";
            $query_phase1_mother_tounge = mysqli_query($conn, $phase1_mother_tounge) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Mother Tongue</td>
            <?php 
            if(mysqli_num_rows($query_phase1_mother_tounge) > 0){
            while($rows = mysqli_fetch_array($query_phase1_mother_tounge)){
            ?>
            <td><input type="number" readonly name="phase1_mother_tounge_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase1_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase1_finalrating_mother_tounge = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '1' AND phase = '1'";
            $query_phase1_finalrating_mother_tounge = mysqli_query($conn, $phase1_finalrating_mother_tounge);
            if(mysqli_num_rows($query_phase1_finalrating_mother_tounge) > 0){
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_mother_tounge);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase1_filipino = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '1' AND student_grades.subject_id = '2'";
            $query_phase1_filipino = mysqli_query($conn, $phase1_filipino) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Filipino</td>
            <?php 
            if(mysqli_num_rows($query_phase1_filipino) > 0){
            while($rows = mysqli_fetch_array($query_phase1_filipino)){
            ?>
            <td><input type="number" readonly name="phase1_filipino_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase1_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase1_finalrating_filipino = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '2' AND phase = '1'";
            $query_phase1_finalrating_filipino = mysqli_query($conn, $phase1_finalrating_filipino);
            if(mysqli_num_rows($query_phase1_finalrating_filipino) > 0){
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_filipino);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>
          <tr>
          <?php
            $phase1_english = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '1' AND student_grades.subject_id = '3'";
            $query_phase1_english = mysqli_query($conn, $phase1_english) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">English</td>
            <?php 
            if(mysqli_num_rows($query_phase1_english) > 0){
            while($rows = mysqli_fetch_array($query_phase1_english)){
            ?>
            <td><input type="number" readonly name="phase1_english_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase1_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase1_finalrating_english = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '3' AND phase = '1'";
            $query_phase1_finalrating_english = mysqli_query($conn, $phase1_finalrating_english);
            if(mysqli_num_rows($query_phase1_finalrating_english) > 0){
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_english);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>
          <tr>
          <?php
            $phase1_math = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '1' AND student_grades.subject_id = '4'";
            $query_phase1_math = mysqli_query($conn, $phase1_math) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Mathematics</td>
            <?php 
            if(mysqli_num_rows($query_phase1_math) > 0){
            while($rows = mysqli_fetch_array($query_phase1_math)){
            ?>
            <td><input type="number" readonly name="phase1_math_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase1_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase1_finalrating_math = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '4' AND phase = '1'";
            $query_phase1_finalrating_math = mysqli_query($conn, $phase1_finalrating_math);
            if(mysqli_num_rows($query_phase1_finalrating_math) > 0){
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_math);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase1_science = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '1' AND student_grades.subject_id = '5'";
            $query_phase1_science = mysqli_query($conn, $phase1_science) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Science</td>
            <?php 
            if(mysqli_num_rows($query_phase1_science) > 0){
            while($rows = mysqli_fetch_array($query_phase1_science)){
            ?>
            <td><input type="number" readonly name="phase1_science_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase1_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase1_finalrating_science = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '5' AND phase = '1'";
            $query_phase1_finalrating_science = mysqli_query($conn, $phase1_finalrating_science);
            if(mysqli_num_rows($query_phase1_finalrating_science) > 0){
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_science);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase1_araling_panlipunan = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '1' AND student_grades.subject_id = '6'";
            $query_phase1_araling_panlipunan= mysqli_query($conn, $phase1_araling_panlipunan) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Araling Panlipunan</td>
            <?php 
            if(mysqli_num_rows($query_phase1_araling_panlipunan) > 0){
            while($rows = mysqli_fetch_array($query_phase1_araling_panlipunan)){
            ?>
            <td><input type="number" readonly name="phase1_araling_panlipunan_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase1_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase1_finalrating_araling_panlipunan = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '6' AND phase = '1'";
            $query_phase1_finalrating_araling_panlipunan= mysqli_query($conn, $phase1_finalrating_araling_panlipunan);
            if(mysqli_num_rows($query_phase1_finalrating_araling_panlipunan) > 0){
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_araling_panlipunan);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase1_epp_tle = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '1' AND student_grades.subject_id = '7'";
            $query_phase1_epp_tle= mysqli_query($conn, $phase1_epp_tle) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">EPP/TLE</td>
            <?php 
            if(mysqli_num_rows($query_phase1_epp_tle) > 0){
            while($rows = mysqli_fetch_array($query_phase1_epp_tle)){
            ?>
            <td><input type="number" readonly name="phase1_epp_tle_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase1_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase1_finalrating_epp_tle = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '7' AND phase = '1'";
            $query_phase1_finalrating_epp_tle= mysqli_query($conn, $phase1_finalrating_epp_tle);
            if(mysqli_num_rows($query_phase1_finalrating_epp_tle) > 0){
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_epp_tle);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase1_mapeh = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '1' AND student_grades.subject_id = '8'";
            $query_phase1_mapeh= mysqli_query($conn, $phase1_mapeh) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">MAPEH</td>
            <?php 
            if(mysqli_num_rows($query_phase1_mapeh) > 0){
            while($rows = mysqli_fetch_array($query_phase1_mapeh)){
            ?>
            <td><?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?></td>
            <?php }}else{?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <?php
            }
            ?>
            <?php
            $phase1_finalrating_mapeh = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '8' AND phase = '1'";
            $query_phase1_finalrating_mapeh= mysqli_query($conn, $phase1_finalrating_mapeh);
            if(mysqli_num_rows($query_phase1_finalrating_mapeh) > 0){
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_mapeh);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase1_music = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '1' AND student_grades.subject_id = '9'";
            $query_phase1_music= mysqli_query($conn, $phase1_music) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Music</i></td>
            <?php 
            if(mysqli_num_rows($query_phase1_music) > 0){
            while($rows = mysqli_fetch_array($query_phase1_music)){
            ?>
            <td><input type="number" readonly name="phase1_music_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase1_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase1_finalrating_music = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '9' AND phase = '1'";
            $query_phase1_finalrating_music= mysqli_query($conn, $phase1_finalrating_music);
            if(mysqli_num_rows($query_phase1_finalrating_music) > 0){
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_music);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase1_art = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '1' AND student_grades.subject_id = '10'";
            $query_phase1_art= mysqli_query($conn, $phase1_art) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Arts</i></td>
            <?php 
            if(mysqli_num_rows($query_phase1_art) > 0){
            while($rows = mysqli_fetch_array($query_phase1_art)){
            ?>
            <td><input type="number" readonly name="phase1_art_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase1_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase1_finalrating_art = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '10' AND phase = '1'";
            $query_phase1_finalrating_art= mysqli_query($conn, $phase1_finalrating_art);
            if(mysqli_num_rows($query_phase1_finalrating_art) > 0){
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_art);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>

          
          <tr>
          <?php
            $phase1_pe = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '1' AND student_grades.subject_id = '11'";
            $query_phase1_pe= mysqli_query($conn, $phase1_pe) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Physical Education</i></td>
            <?php 
            if(mysqli_num_rows($query_phase1_pe) > 0){
            while($rows = mysqli_fetch_array($query_phase1_pe)){
            ?>
            <td><input type="number" readonly name="phase1_pe_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase1_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase1_finalrating_pe = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '11' AND phase = '1'";
            $query_phase1_finalrating_pe= mysqli_query($conn, $phase1_finalrating_pe);
            if(mysqli_num_rows($query_phase1_finalrating_pe) > 0){
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_pe);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase1_health = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '1' AND student_grades.subject_id = '12'";
            $query_phase1_health= mysqli_query($conn, $phase1_health) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Health</i></td>
            <?php 
            if(mysqli_num_rows($query_phase1_health) > 0){
            while($rows = mysqli_fetch_array($query_phase1_health)){
            ?>
            <td><input type="number" readonly name="phase1_health_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase1_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase1_finalrating_health = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '12' AND phase = '1'";
            $query_phase1_finalrating_health= mysqli_query($conn, $phase1_finalrating_health);
            if(mysqli_num_rows($query_phase1_finalrating_health) > 0){
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_health);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase1_esp = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '1' AND student_grades.subject_id = '13'";
            $query_phase1_esp= mysqli_query($conn, $phase1_esp) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Edukasyon sa Pagpapakatao</td>
            <?php 
            if(mysqli_num_rows($query_phase1_esp) > 0){
            while($rows = mysqli_fetch_array($query_phase1_esp)){
            ?>
            <td><input type="number" readonly name="phase1_esp_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase1_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase1_finalrating_esp = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '13' AND phase = '1'";
            $query_phase1_finalrating_esp= mysqli_query($conn, $phase1_finalrating_esp);
            if(mysqli_num_rows($query_phase1_finalrating_esp) > 0){
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_esp);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase1_arabic_lang = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '1' AND student_grades.subject_id = '14'";
            $query_phase1_arabic_lang= mysqli_query($conn, $phase1_arabic_lang) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start">*Arabic Language</td>
            <?php 
            if(mysqli_num_rows($query_phase1_arabic_lang) > 0){
            while($rows = mysqli_fetch_array($query_phase1_arabic_lang)){
            ?>
            <td><input type="number" readonly name="phase1_arabic_lang_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase1_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase1_finalrating_arabic_lang = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '14' AND phase = '1'";
            $query_phase1_finalrating_arabic_lang= mysqli_query($conn, $phase1_finalrating_arabic_lang);
            if(mysqli_num_rows($query_phase1_finalrating_arabic_lang) > 0){
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_arabic_lang);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase1_islamic_values = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '1' AND student_grades.subject_id = '15'";
            $query_phase1_islamic_values= mysqli_query($conn, $phase1_islamic_values) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start">*Islamic Values Education</td>
            <?php 
            if(mysqli_num_rows($query_phase1_islamic_values) > 0){
            while($rows = mysqli_fetch_array($query_phase1_islamic_values)){
            ?>
            <td><input type="number" readonly name="phase1_islamic_values_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase1_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase1_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase1_finalrating_islamic_values = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '15' AND phase = '1'";
            $query_phase1_finalrating_islamic_values= mysqli_query($conn, $phase1_finalrating_islamic_values);
            if(mysqli_num_rows($query_phase1_finalrating_islamic_values) > 0){
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_islamic_values);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>

          
          <tr>
            <?php
            $phase1_general_average = "SELECT general_average FROM student_general_averages
            WHERE lrn = '109857060083' AND phase = '1'";
            $query_phase1_general_average = mysqli_query($conn, $phase1_general_average);
            ?>
            <td class="text-start fw-bold">General Average</td>
            <?php
            if(mysqli_num_rows($query_phase1_general_average) > 0){
              while($rows = mysqli_fetch_array($query_phase1_general_average)){
            ?>
            <td><?php if($rows['general_average'] == 0){ echo "";}else{ echo $rows['general_average'];}?></td>
            <?php
            }}else{
            ?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          <?php }?>
          </tr>
        </tbody>
      </table>

  <!-- Remedial Table PHASE 1 -->
  
        <?php
        $phase1_remedial_classes_dates = "SELECT * FROM remedial_classes
        WHERE lrn = '109857060083' AND phase = '1'";
        $query_phase1_remedial_classes_dates = mysqli_query($conn, $phase1_remedial_classes_dates);
        if(mysqli_num_rows($query_phase1_remedial_classes_dates) > 0){
          $date = mysqli_fetch_array($query_phase1_remedial_classes_dates);
          ?>
          <table class="table-condensed text-center w-100">
        <thead> 
          <tr>
            <th colspan="2">Remedial Classes</th>
            <th colspan="4">
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" disabled class="datefrom" name="phase1_date_from" value="<?php echo strftime('%Y-%m-%d', strtotime($date['date_from']));?>">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" disabled class="dateto" name="phase1_date_to" value="<?php echo strftime('%Y-%m-%d', strtotime($date['date_to']));?>">
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
        <?php
        $phase1_remedial_classes_term1 = "SELECT * FROM remedial_classes
        WHERE lrn = '109857060083' AND phase = '1' AND term = '1'";
        $query_phase1_remedial_classes_term1 = mysqli_query($conn, $phase1_remedial_classes_term1) or die (mysqli_error($conn));
        $remedial_classes_term1 = mysqli_fetch_array($query_phase1_remedial_classes_term1);
        ?>
        <tbody>
        <tr>
            <td><input type="text" readonly  class="learning-areas1" name="phase1_learning_areas1" 
            value="<?php if(empty($remedial_classes_term1['learning_areas'])){ echo "";}else {echo $remedial_classes_term1['learning_areas'];}?>"></td>
            <td><input type="number" readonly id="grade" class="final_rating1" name="phase1_final_rating1" 
            value="<?php if($remedial_classes_term1['final_rating'] == 0){ echo "";}else{ echo $remedial_classes_term1['final_rating'];}?>"></td>
            <td><input type="text" readonly  name="phase1_remedial_class_mark1" 
            value="<?php if(empty($remedial_classes_term1['remedial_class_mark'])){ echo "";}else{ echo $remedial_classes_term1['remedial_class_mark'];}?>" id=""></td>
            <td><input type="number" readonly id="grade" name="phase1_recomputed_final_grade1" 
            value="<?php if($remedial_classes_term1['recomputed_final_grade'] == 0){ echo "";}else{echo $remedial_classes_term1['recomputed_final_grade'];}?>" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly  name="phase1_remedial_remarks1" 
            value="<?php if(empty($remedial_classes_term1['remarks'])){ echo "";}else{ echo $remedial_classes_term1['remarks'];}?>" id=""></td>
          </tr>
          <?php
          $phase1_remedial_classes_term2 = "SELECT * FROM remedial_classes
          WHERE lrn = '109857060083' AND phase = '1' AND term = '2'";
          $query_phase1_remedial_classes_term2 = mysqli_query($conn, $phase1_remedial_classes_term2) or die (mysqli_error($conn));
          $remedial_classes_term2 = mysqli_fetch_array($query_phase1_remedial_classes_term2);
        ?>
          <tr>
            <td><input type="text" readonly  class="learning_areas2" name="phase1_learning_areas2"
            value="<?php if(empty($remedial_classes_term2['learning_areas'])){ echo "";}else {echo $remedial_classes_term2['learning_areas'];}?>"></td>
            <td><input type="number" readonly id="grade" class="final_rating2" name="phase1_final_rating2"
            value="<?php if($remedial_classes_term2['final_rating'] == 0){ echo "";}else{ echo $remedial_classes_term2['final_rating'];}?>"></td>
            <td><input type="text" readonly  name="phase1_remedial_class_mark2" 
            value="<?php if(empty($remedial_classes_term2['remedial_class_mark'])){ echo "";}else{ echo $remedial_classes_term2['remedial_class_mark'];}?>" id=""> </td>
            <td><input type="number" readonly id="grade" name="phase1_recomputed_final_grade2" 
            value="<?php if($remedial_classes_term2['recomputed_final_grade'] == 0){ echo "";}else{echo $remedial_classes_term2['recomputed_final_grade'];}?>" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly name="phase1_remedial_remarks2" 
            value="<?php if(empty($remedial_classes_term2['remarks'])){ echo "";}else{ echo $remedial_classes_term2['remarks'];}?>" id=""></td>
          </tr>
        </tbody>
      </table>
        <?php }else{?>
          <table class="table-condensed text-center w-100">
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" disabled class="datefrom" name="phase1_date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" disabled class="dateto" name="phase1_date_to">
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
            <td><input type="text" readonly  class="learning-areas1" name="phase1_learning_areas1"></td>
            <td><input type="number" readonly id="grade" class="final_rating1" name="phase1_final_rating1"></td>
            <td><input type="text" readonly  name="phase1_remedial_class_mark1" id=""></td>
            <td><input type="number" readonly id="grade" name="phase1_recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly  name="phase1_remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" readonly  class="learning_areas2" name="phase1_learning_areas2"></td>
            <td><input type="number" readonly id="grade" class="final_rating2" name="phase1_final_rating2"></td>
            <td><input type="text" readonly  name="phase1_remedial_class_mark2" id=""> </td>
            <td><input type="number" readonly id="grade" name="phase1_recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly name="phase1_remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
        <?php }?>
      </div>
      <br>
      <br>
      <div class="form-container" style="padding:0 0 7px 7px;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <!-- PHASE 2 OF SCHOLASTIC RECORDS -->
          <?php
          $phase2_scholastic_records = "SELECT * FROM scholastic_records
          WHERE lrn = '109857060083' AND phase = '2'";
          $query_phase2_scholastic_records = mysqli_query($conn, $phase2_scholastic_records) or die (mysqli_error($conn,));
          $rows = mysqli_fetch_array($query_phase2_scholastic_records);
          ?>
        <span>
          <label>School:</label>
          <input type="text" readonly  id="text-only" name="phase2_sr_school" 
          value="<?php if(empty($rows['school'])){ echo "";}else{ echo $rows['school'];}?>" class="school">
        </span>
        <span>
          <label>School ID:</label>
          <input type="text" readonly  name="phase2_sr_school_id" 
          value="<?php if(empty($rows['school_id'])){ echo "";}else{ echo $rows['school_id'];}?>" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District:</label>
          <input type="text" readonly  class="w-50" name="phase2_sr_district" 
          value="<?php if(empty($rows['district'])){ echo "";}else{ echo $rows['district'];}?>" class="district">
        </span>
        <span>
          <label>Division:</label>
          <input type="text" readonly  class="w-50" name="phase2_sr_division" 
          value="<?php if(empty($rows['division'])){ echo "";}else{ echo $rows['division'];}?>" class="division">
        </span>
        <span class="text-end">
          <label>Region:</label>
          <input type="text" readonly  class="w-50" name="phase2_sr_region" 
          value="<?php if(empty($rows['region'])){ echo "";}else{ echo $rows['region'];}?>" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade:</label>
          <input type="number" readonly id="number-only" style="width: 20%;" name="phase2_sr_classified_as_grade" 
          value="<?php if(empty($rows['classified_as_grade'])){ echo "";}else{ echo $rows['classified_as_grade'];}?>" >
        </span>
        <span>
          <label>Section:</label>
          <input type="text" readonly  class="w-50" name="phase2_sr_section" 
          value="<?php if(empty($rows['section'])){ echo "";}else{ echo $rows['section'];}?>"> 
        </span>
        <span>
          <label>School Year:</label>
          <input type="text" readonly  class="w-50" name="phase2_sr_school_year" 
          value="<?php if(empty($rows['school_year'])){ echo "";}else{ echo $rows['school_year'];}?>">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
        <label for="">Name of Adviser:</label>
        <input type="text" readonly  id="text-only" name="phase2_sr_name_of_adviser" 
        value="<?php if(empty($rows['name_of_teacher'])){ echo "";}else{ echo $rows['name_of_teacher'];}?>">
        </span>
        <span>
          <label>Signature:</label>
          <input type="text" readonly  id="text-only" name="phase2_sr_signature" 
          value="<?php if(empty($rows['signature'])){ echo "";}else{ echo $rows['signature'];}?>" class="school_id">
        </span>
      </span>
    
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
          <th rowspan="2" style="width:40%;"><h6>Learner's Area</h6></th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
            <th rowspan="2" style="width:14%;">Remarks</th>
          </tr>
          <tr style="width: 5%;">
          
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            $phase2_mother_tounge = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '2' AND student_grades.subject_id = '1'";
            $query_phase2_mother_tounge = mysqli_query($conn, $phase2_mother_tounge) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Mother Tongue</td>
            <?php 
            if(mysqli_num_rows($query_phase2_mother_tounge) > 0){
            while($rows = mysqli_fetch_array($query_phase2_mother_tounge)){
            ?>
            <td><input type="number" readonly name="phase2_mother_tounge_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase2_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase2_finalrating_mother_tounge = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '1' AND phase = '2'";
            $query_phase2_finalrating_mother_tounge = mysqli_query($conn, $phase2_finalrating_mother_tounge);
            if(mysqli_num_rows($query_phase2_finalrating_mother_tounge) > 0){
            $final_rating = mysqli_fetch_array($query_phase2_finalrating_mother_tounge);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase2_filipino = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '2' AND student_grades.subject_id = '2'";
            $query_phase2_filipino = mysqli_query($conn, $phase2_filipino) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Filipino</td>
            <?php 
            if(mysqli_num_rows($query_phase2_filipino) > 0){
            while($rows = mysqli_fetch_array($query_phase2_filipino)){
            ?>
            <td><input type="number" readonly name="phase2_filipino_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase2_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase2_finalrating_filipino = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '2' AND phase = '2'";
            $query_phase2_finalrating_filipino = mysqli_query($conn, $phase2_finalrating_filipino);
            if(mysqli_num_rows($query_phase2_finalrating_filipino) > 0){
            $final_rating = mysqli_fetch_array($query_phase2_finalrating_filipino);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>
          <tr>
          <?php
            $phase2_english = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '2' AND student_grades.subject_id = '3'";
            $query_phase2_english = mysqli_query($conn, $phase2_english) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">English</td>
            <?php 
            if(mysqli_num_rows($query_phase2_english) > 0){
            while($rows = mysqli_fetch_array($query_phase2_english)){
            ?>
            <td><input type="number" readonly name="phase2_english_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase2_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase2_finalrating_english = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '3' AND phase = '2'";
            $query_phase2_finalrating_english = mysqli_query($conn, $phase2_finalrating_english);
            if(mysqli_num_rows($query_phase2_finalrating_english) > 0){
            $final_rating = mysqli_fetch_array($query_phase2_finalrating_english);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase2_math = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '2' AND student_grades.subject_id = '4'";
            $query_phase2_math = mysqli_query($conn, $phase2_math) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Mathematics</td>
            <?php 
            if(mysqli_num_rows($query_phase2_math) > 0){
            while($rows = mysqli_fetch_array($query_phase2_math)){
            ?>
            <td><input type="number" readonly name="phase2_math_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase2_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase2_finalrating_math = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '4' AND phase = '2'";
            $query_phase2_finalrating_math = mysqli_query($conn, $phase2_finalrating_math);
            if(mysqli_num_rows($query_phase2_finalrating_math) > 0){
            $final_rating = mysqli_fetch_array($query_phase2_finalrating_math);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase2_science = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '2' AND student_grades.subject_id = '5'";
            $query_phase2_science = mysqli_query($conn, $phase2_science) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Science</td>
            <?php 
            if(mysqli_num_rows($query_phase2_science) > 0){
            while($rows = mysqli_fetch_array($query_phase2_science)){
            ?>
            <td><input type="number" readonly name="phase2_science_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase2_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase2_finalrating_science = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '5' AND phase = '2'";
            $query_phase2_finalrating_science = mysqli_query($conn, $phase2_finalrating_science);
            if(mysqli_num_rows($query_phase2_finalrating_science) > 0){
            $final_rating = mysqli_fetch_array($query_phase2_finalrating_science);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase2_araling_panlipunan = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '2' AND student_grades.subject_id = '6'";
            $query_phase2_araling_panlipunan= mysqli_query($conn, $phase2_araling_panlipunan) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Araling Panlipunan</td>
            <?php 
            if(mysqli_num_rows($query_phase2_araling_panlipunan) > 0){
            while($rows = mysqli_fetch_array($query_phase2_araling_panlipunan)){
            ?>
            <td><input type="number" readonly name="phase2_araling_panlipunan_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase2_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase2_finalrating_araling_panlipunan = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '6' AND phase = '2'";
            $query_phase2_finalrating_araling_panlipunan= mysqli_query($conn, $phase2_finalrating_araling_panlipunan);
            if(mysqli_num_rows($query_phase2_finalrating_araling_panlipunan) > 0){
            $final_rating = mysqli_fetch_array($query_phase2_finalrating_araling_panlipunan);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase2_epp_tle = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '2' AND student_grades.subject_id = '7'";
            $query_phase2_epp_tle= mysqli_query($conn, $phase2_epp_tle) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">EPP/TLE</td>
            <?php 
            if(mysqli_num_rows($query_phase2_epp_tle) > 0){
            while($rows = mysqli_fetch_array($query_phase2_epp_tle)){
            ?>
            <td><input type="number" readonly name="phase2_epp_tle_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase2_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase2_finalrating_epp_tle = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '7' AND phase = '2'";
            $query_phase2_finalrating_epp_tle= mysqli_query($conn, $phase2_finalrating_epp_tle);
            if(mysqli_num_rows($query_phase2_finalrating_epp_tle) > 0){
            $final_rating = mysqli_fetch_array($query_phase2_finalrating_epp_tle);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase2_mapeh = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '2' AND student_grades.subject_id = '8'";
            $query_phase2_mapeh= mysqli_query($conn, $phase2_mapeh) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">MAPEH</td>
            <?php 
            if(mysqli_num_rows($query_phase2_mapeh) > 0){
            while($rows = mysqli_fetch_array($query_phase2_mapeh)){
            ?>
            <td><?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?></td>
            <?php }}else{?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <?php
            }
            ?>
            <?php
            $phase2_finalrating_mapeh = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '8' AND phase = '2'";
            $query_phase2_finalrating_mapeh= mysqli_query($conn, $phase2_finalrating_mapeh);
            if(mysqli_num_rows($query_phase2_finalrating_mapeh) > 0){
            $final_rating = mysqli_fetch_array($query_phase2_finalrating_mapeh);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase2_music = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '2' AND student_grades.subject_id = '9'";
            $query_phase2_music= mysqli_query($conn, $phase2_music) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Music</i></td>
            <?php 
            if(mysqli_num_rows($query_phase2_music) > 0){
            while($rows = mysqli_fetch_array($query_phase2_music)){
            ?>
            <td><input type="number" readonly name="phase2_music_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase2_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase2_finalrating_music = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '9' AND phase = '2'";
            $query_phase2_finalrating_music= mysqli_query($conn, $phase2_finalrating_music);
            if(mysqli_num_rows($query_phase2_finalrating_music) > 0){
            $final_rating = mysqli_fetch_array($query_phase2_finalrating_music);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase2_art = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '2' AND student_grades.subject_id = '10'";
            $query_phase2_art= mysqli_query($conn, $phase2_art) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Arts</i></td>
            <?php 
            if(mysqli_num_rows($query_phase2_art) > 0){
            while($rows = mysqli_fetch_array($query_phase2_art)){
            ?>
            <td><input type="number" readonly name="phase2_art_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase2_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase2_finalrating_art = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '10' AND phase = '2'";
            $query_phase2_finalrating_art= mysqli_query($conn, $phase2_finalrating_art);
            if(mysqli_num_rows($query_phase2_finalrating_art) > 0){
            $final_rating = mysqli_fetch_array($query_phase2_finalrating_art);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>

          
          <tr>
          <?php
            $phase2_pe = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '2' AND student_grades.subject_id = '11'";
            $query_phase2_pe= mysqli_query($conn, $phase2_pe) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Physical Education</i></td>
            <?php 
            if(mysqli_num_rows($query_phase2_pe) > 0){
            while($rows = mysqli_fetch_array($query_phase2_pe)){
            ?>
            <td><input type="number" readonly name="phase2_pe_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase2_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase2_finalrating_pe = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '11' AND phase = '2'";
            $query_phase2_finalrating_pe= mysqli_query($conn, $phase2_finalrating_pe);
            if(mysqli_num_rows($query_phase2_finalrating_pe) > 0){
            $final_rating = mysqli_fetch_array($query_phase2_finalrating_pe);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase2_health = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '2' AND student_grades.subject_id = '12'";
            $query_phase2_health= mysqli_query($conn, $phase2_health) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Health</i></td>
            <?php 
            if(mysqli_num_rows($query_phase2_health) > 0){
            while($rows = mysqli_fetch_array($query_phase2_health)){
            ?>
            <td><input type="number" readonly name="phase2_health_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase2_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase2_finalrating_health = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '12' AND phase = '2'";
            $query_phase2_finalrating_health= mysqli_query($conn, $phase2_finalrating_health);
            if(mysqli_num_rows($query_phase2_finalrating_health) > 0){
            $final_rating = mysqli_fetch_array($query_phase2_finalrating_health);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase2_esp = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '2' AND student_grades.subject_id = '13'";
            $query_phase2_esp= mysqli_query($conn, $phase2_esp) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Edukasyon sa Pagpapakatao</td>
            <?php 
            if(mysqli_num_rows($query_phase2_esp) > 0){
            while($rows = mysqli_fetch_array($query_phase2_esp)){
            ?>
            <td><input type="number" readonly name="phase2_esp_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase2_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase2_finalrating_esp = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '13' AND phase = '2'";
            $query_phase2_finalrating_esp= mysqli_query($conn, $phase2_finalrating_esp);
            if(mysqli_num_rows($query_phase2_finalrating_esp) > 0){
            $final_rating = mysqli_fetch_array($query_phase2_finalrating_esp);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase2_arabic_lang = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '2' AND student_grades.subject_id = '14'";
            $query_phase2_arabic_lang= mysqli_query($conn, $phase2_arabic_lang) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Arabic Language</i></td>
            <?php 
            if(mysqli_num_rows($query_phase2_arabic_lang) > 0){
            while($rows = mysqli_fetch_array($query_phase2_arabic_lang)){
            ?>
            <td><input type="number" readonly name="phase2_arabic_lang_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase2_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase2_finalrating_arabic_lang = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '14' AND phase = '2'";
            $query_phase2_finalrating_arabic_lang= mysqli_query($conn, $phase2_finalrating_arabic_lang);
            if(mysqli_num_rows($query_phase2_finalrating_arabic_lang) > 0){
            $final_rating = mysqli_fetch_array($query_phase2_finalrating_arabic_lang);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase2_islamic_values = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '2' AND student_grades.subject_id = '15'";
            $query_phase2_islamic_values= mysqli_query($conn, $phase2_islamic_values) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Islamic Values Education</i></td>
            <?php 
            if(mysqli_num_rows($query_phase2_islamic_values) > 0){
            while($rows = mysqli_fetch_array($query_phase2_islamic_values)){
            ?>
            <td><input type="number" readonly name="phase2_islamic_values_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase2_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase2_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase2_finalrating_islamic_values = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '15' AND phase = '2'";
            $query_phase2_finalrating_islamic_values= mysqli_query($conn, $phase2_finalrating_islamic_values);
            if(mysqli_num_rows($query_phase2_finalrating_islamic_values) > 0){
            $final_rating = mysqli_fetch_array($query_phase2_finalrating_islamic_values);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>

          
          <tr>
          <?php
            $phase2_general_average = "SELECT general_average FROM student_general_averages
            WHERE lrn = '109857060083' AND phase = '2'";
            $query_phase2_general_average = mysqli_query($conn, $phase2_general_average);
            ?>
            <td class="text-start fw-bold">General Average</td>
            <?php
            if(mysqli_num_rows($query_phase2_general_average) > 0){
              while($rows = mysqli_fetch_array($query_phase2_general_average)){
            ?>
            <td><?php if($rows['general_average'] == 0){ echo "";}else{ echo $rows['general_average'];}?></td>
            <?php
            }}else{
            ?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          <?php }?>
          </tr>
        </tbody>
      </table>

  <!-- Remedial Table PHASE 2 -->
  
<?php
        $phase2_remedial_classes_dates = "SELECT * FROM remedial_classes
        WHERE lrn = '109857060083' AND phase = '2'";
        $query_phase2_remedial_classes_dates = mysqli_query($conn, $phase2_remedial_classes_dates);
        if(mysqli_num_rows($query_phase2_remedial_classes_dates) > 0){
          $row = mysqli_fetch_array($query_phase2_remedial_classes_dates);
          ?>
          <table class="table-condensed text-center w-100">
        <thead> 
          <tr>
            <th colspan="2">Remedial Classes</th>
            <th colspan="4">
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" disabled class="datefrom" name="phase2_date_from" value="<?php echo strftime('%Y-%m-%d', strtotime($row['date_from']));?>">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" disabled class="dateto" name="phase2_date_to" value="<?php echo strftime('%Y-%m-%d', strtotime($row['date_to']));?>">
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
        <?php
        $phase2_remedial_classes_term1 = "SELECT * FROM remedial_classes
        WHERE lrn = '109857060083' AND phase = '2' AND term = '1'";
        $query_phase2_remedial_classes_term1 = mysqli_query($conn, $phase2_remedial_classes_term1) or die (mysqli_error($conn));
        $remedial_classes_term1 = mysqli_fetch_array($query_phase2_remedial_classes_term1);
        ?>
        <tbody>
        <tr>
            <td><input type="text" readonly  class="learning-areas1" name="phase2_learning_areas1" 
            value="<?php if(empty($remedial_classes_term1['learning_areas'])){ echo "";}else {echo $remedial_classes_term1['learning_areas'];}?>"></td>
            <td><input type="number" readonly id="grade" class="final_rating1" name="phase2_final_rating1" 
            value="<?php if($remedial_classes_term1['final_rating'] == 0){ echo "";}else{ echo $remedial_classes_term1['final_rating'];}?>"></td>
            <td><input type="text" readonly  name="phase2_remedial_class_mark1" 
            value="<?php if(empty($remedial_classes_term1['remedial_class_mark'])){ echo "";}else{ echo $remedial_classes_term1['remedial_class_mark'];}?>" id=""></td>
            <td><input type="number" readonly id="grade" name="phase2_recomputed_final_grade1" 
            value="<?php if($remedial_classes_term1['recomputed_final_grade'] == 0){ echo "";}else{echo $remedial_classes_term1['recomputed_final_grade'];}?>" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly  name="phase2_remedial_remarks1" 
            value="<?php if(empty($remedial_classes_term1['remarks'])){ echo "";}else{ echo $remedial_classes_term1['remarks'];}?>" id=""></td>
          </tr>
          <?php
          $phase2_remedial_classes_term2 = "SELECT * FROM remedial_classes
          WHERE lrn = '109857060083' AND phase = '2' AND term = '2'";
          $query_phase2_remedial_classes_term2 = mysqli_query($conn, $phase2_remedial_classes_term2) or die (mysqli_error($conn));
          $remedial_classes_term2 = mysqli_fetch_array($query_phase2_remedial_classes_term2);
        ?>
          <tr>
            <td><input type="text" readonly  class="learning_areas2" name="phase2_learning_areas2"
            value="<?php if(empty($remedial_classes_term2['learning_areas'])){ echo "";}else {echo $remedial_classes_term2['learning_areas'];}?>"></td>
            <td><input type="number" readonly id="grade" class="final_rating2" name="phase2_final_rating2"
            value="<?php if($remedial_classes_term2['final_rating'] == 0){ echo "";}else{ echo $remedial_classes_term2['final_rating'];}?>"></td>
            <td><input type="text" readonly  name="phase2_remedial_class_mark2" 
            value="<?php if(empty($remedial_classes_term2['remedial_class_mark'])){ echo "";}else{ echo $remedial_classes_term2['remedial_class_mark'];}?>" id=""> </td>
            <td><input type="number" readonly id="grade" name="phase2_recomputed_final_grade2" 
            value="<?php if($remedial_classes_term2['recomputed_final_grade'] == 0){ echo "";}else{echo $remedial_classes_term2['recomputed_final_grade'];}?>" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly name="phase2_remedial_remarks2" 
            value="<?php if(empty($remedial_classes_term2['remarks'])){ echo "";}else{ echo $remedial_classes_term2['remarks'];}?>" id=""></td>
          </tr>
        </tbody>
      </table>
        <?php }else{?>
          <table class="table-condensed text-center w-100">
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" disabled class="datefrom" name="phase2_date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" disabled class="dateto" name="phase2_date_to">
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
            <td><input type="text" readonly  class="learning-areas1" name="phase2_learning_areas1"></td>
            <td><input type="number" readonly id="grade" class="final_rating1" name="phase2_final_rating1"></td>
            <td><input type="text" readonly  name="phase2_remedial_class_mark1" id=""></td>
            <td><input type="number" readonly id="grade" name="phase2_recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly  name="phase2_remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" readonly  class="learning_areas2" name="phase2_learning_areas2"></td>
            <td><input type="number" readonly id="grade" class="final_rating2" name="phase2_final_rating2"></td>
            <td><input type="text" readonly  name="phase2_remedial_class_mark2" id=""> </td>
            <td><input type="number" readonly id="grade" name="phase2_recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly name="phase2_remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
        <?php }?>
      </div>
      </div>
      <div class="gen-container pb-5 d-flex">
      <div class="form-container" style="padding: 7px 7px 0 0 ;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <!-- PHASE 3 OF SCHOLASTIC RECORDS -->
        <?php
          $phase3_scholastic_records = "SELECT * FROM scholastic_records
          WHERE lrn = '109857060083' AND phase = '3'";
          $query_phase3_scholastic_records = mysqli_query($conn, $phase3_scholastic_records) or die (mysqli_error($conn,));
          $rows = mysqli_fetch_array($query_phase3_scholastic_records);
          ?>
        <span>
          <label>School:</label>
          <input type="text" readonly  id="text-only" name="phase3_sr_school" 
          value="<?php if(empty($rows['school'])){ echo "";}else{ echo $rows['school'];}?>" class="school">
        </span>
        <span>
          <label>School ID:</label>
          <input type="text" readonly  name="phase3_sr_school_id" 
          value="<?php if(empty($rows['school_id'])){ echo "";}else{ echo $rows['school_id'];}?>" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District:</label>
          <input type="text" readonly  class="w-50" name="phase3_sr_district" 
          value="<?php if(empty($rows['district'])){ echo "";}else{ echo $rows['district'];}?>" class="district">
        </span>
        <span>
          <label>Division:</label>
          <input type="text" readonly  class="w-50" name="phase3_sr_division" 
          value="<?php if(empty($rows['division'])){ echo "";}else{ echo $rows['division'];}?>" class="division">
        </span>
        <span class="text-end">
          <label>Region:</label>
          <input type="text" readonly  class="w-50" name="phase3_sr_region" 
          value="<?php if(empty($rows['region'])){ echo "";}else{ echo $rows['region'];}?>" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade:</label>
          <input type="number" readonly id="number-only" style="width: 20%;" name="phase3_sr_classified_as_grade" 
          value="<?php if(empty($rows['classified_as_grade'])){ echo "";}else{ echo $rows['classified_as_grade'];}?>" >
        </span>
        <span>
          <label>Section:</label>
          <input type="text" readonly  class="w-50" name="phase3_sr_section" 
          value="<?php if(empty($rows['section'])){ echo "";}else{ echo $rows['section'];}?>"> 
        </span>
        <span>
          <label>School Year:</label>
          <input type="text" readonly  class="w-50" name="phase3_sr_school_year" 
          value="<?php if(empty($rows['school_year'])){ echo "";}else{ echo $rows['school_year'];}?>">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
        <label for="">Name of Adviser:</label>
        <input type="text" readonly  id="text-only" name="phase3_sr_name_of_adviser" 
        value="<?php if(empty($rows['name_of_teacher'])){ echo "";}else{ echo $rows['name_of_teacher'];}?>">
        </span>
        <span>
          <label>Signature:</label>
          <input type="text" readonly  id="text-only" name="phase3_sr_signature" 
          value="<?php if(empty($rows['signature'])){ echo "";}else{ echo $rows['signature'];}?>" class="school_id">
        </span>
      </span>
    
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
          <th rowspan="2" style="width:40%;"><h6>Learner's Area</h6></th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
            <th rowspan="2" style="width:14%;">Remarks</th>
          </tr>
          <tr style="width: 5%;">
          
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            $phase3_mother_tounge = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '3' AND student_grades.subject_id = '1'";
            $query_phase3_mother_tounge = mysqli_query($conn, $phase3_mother_tounge) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Mother Tongue</td>
            <?php 
            if(mysqli_num_rows($query_phase3_mother_tounge) > 0){
            while($rows = mysqli_fetch_array($query_phase3_mother_tounge)){
            ?>
            <td><input type="number" readonly name="phase3_mother_tounge_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase3_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase3_finalrating_mother_tounge = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '1' AND phase = '3'";
            $query_phase3_finalrating_mother_tounge = mysqli_query($conn, $phase3_finalrating_mother_tounge);
            if(mysqli_num_rows($query_phase3_finalrating_mother_tounge) > 0){
            $final_rating = mysqli_fetch_array($query_phase3_finalrating_mother_tounge);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase3_filipino = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '3' AND student_grades.subject_id = '2'";
            $query_phase3_filipino = mysqli_query($conn, $phase3_filipino) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Filipino</td>
            <?php 
            if(mysqli_num_rows($query_phase3_filipino) > 0){
            while($rows = mysqli_fetch_array($query_phase3_filipino)){
            ?>
            <td><input type="number" readonly name="phase3_filipino_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase3_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase3_finalrating_filipino = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '2' AND phase = '3'";
            $query_phase3_finalrating_filipino = mysqli_query($conn, $phase3_finalrating_filipino);
            if(mysqli_num_rows($query_phase3_finalrating_filipino) > 0){
            $final_rating = mysqli_fetch_array($query_phase3_finalrating_filipino);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase3_english = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '3' AND student_grades.subject_id = '3'";
            $query_phase3_english = mysqli_query($conn, $phase3_english) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">English</td>
            <?php 
            if(mysqli_num_rows($query_phase3_english) > 0){
            while($rows = mysqli_fetch_array($query_phase3_english)){
            ?>
            <td><input type="number" readonly name="phase3_english_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase3_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase3_finalrating_english = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '3' AND phase = '3'";
            $query_phase3_finalrating_english = mysqli_query($conn, $phase3_finalrating_english);
            if(mysqli_num_rows($query_phase3_finalrating_english) > 0){
            $final_rating = mysqli_fetch_array($query_phase3_finalrating_english);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase3_math = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '3' AND student_grades.subject_id = '4'";
            $query_phase3_math = mysqli_query($conn, $phase3_math) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Mathematics</td>
            <?php 
            if(mysqli_num_rows($query_phase3_math) > 0){
            while($rows = mysqli_fetch_array($query_phase3_math)){
            ?>
            <td><input type="number" readonly name="phase3_math_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase3_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase3_finalrating_math = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '4' AND phase = '3'";
            $query_phase3_finalrating_math = mysqli_query($conn, $phase3_finalrating_math);
            if(mysqli_num_rows($query_phase3_finalrating_math) > 0){
            $final_rating = mysqli_fetch_array($query_phase3_finalrating_math);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase3_science = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '3' AND student_grades.subject_id = '5'";
            $query_phase3_science = mysqli_query($conn, $phase3_science) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Science</td>
            <?php 
            if(mysqli_num_rows($query_phase3_science) > 0){
            while($rows = mysqli_fetch_array($query_phase3_science)){
            ?>
            <td><input type="number" readonly name="phase3_science_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase3_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase3_finalrating_science = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '5' AND phase = '3'";
            $query_phase3_finalrating_science = mysqli_query($conn, $phase3_finalrating_science);
            if(mysqli_num_rows($query_phase3_finalrating_science) > 0){
            $final_rating = mysqli_fetch_array($query_phase3_finalrating_science);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase3_araling_panlipunan = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '3' AND student_grades.subject_id = '6'";
            $query_phase3_araling_panlipunan= mysqli_query($conn, $phase3_araling_panlipunan) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Araling Panlipunan</td>
            <?php 
            if(mysqli_num_rows($query_phase3_araling_panlipunan) > 0){
            while($rows = mysqli_fetch_array($query_phase3_araling_panlipunan)){
            ?>
            <td><input type="number" readonly name="phase3_araling_panlipunan_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase3_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase3_finalrating_araling_panlipunan = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '6' AND phase = '3'";
            $query_phase3_finalrating_araling_panlipunan= mysqli_query($conn, $phase3_finalrating_araling_panlipunan);
            if(mysqli_num_rows($query_phase3_finalrating_araling_panlipunan) > 0){
            $final_rating = mysqli_fetch_array($query_phase3_finalrating_araling_panlipunan);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase3_epp_tle = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '3' AND student_grades.subject_id = '7'";
            $query_phase3_epp_tle= mysqli_query($conn, $phase3_epp_tle) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">EPP/TLE</td>
            <?php 
            if(mysqli_num_rows($query_phase3_epp_tle) > 0){
            while($rows = mysqli_fetch_array($query_phase3_epp_tle)){
            ?>
            <td><input type="number" readonly name="phase3_epp_tle_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase3_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase3_finalrating_epp_tle = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '7' AND phase = '3'";
            $query_phase3_finalrating_epp_tle= mysqli_query($conn, $phase3_finalrating_epp_tle);
            if(mysqli_num_rows($query_phase3_finalrating_epp_tle) > 0){
            $final_rating = mysqli_fetch_array($query_phase3_finalrating_epp_tle);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase3_mapeh = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '3' AND student_grades.subject_id = '8'";
            $query_phase3_mapeh= mysqli_query($conn, $phase3_mapeh) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">MAPEH</td>
            <?php 
            if(mysqli_num_rows($query_phase3_mapeh) > 0){
            while($rows = mysqli_fetch_array($query_phase3_mapeh)){
            ?>
            <td><?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?></td>
            <?php }}else{?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <?php
            }
            ?>
            <?php
            $phase3_finalrating_mapeh = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '8' AND phase = '3'";
            $query_phase3_finalrating_mapeh= mysqli_query($conn, $phase3_finalrating_mapeh);
            if(mysqli_num_rows($query_phase3_finalrating_mapeh) > 0){
            $final_rating = mysqli_fetch_array($query_phase3_finalrating_mapeh);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase3_music = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '3' AND student_grades.subject_id = '9'";
            $query_phase3_music= mysqli_query($conn, $phase3_music) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Music</i></td>
            <?php 
            if(mysqli_num_rows($query_phase3_music) > 0){
            while($rows = mysqli_fetch_array($query_phase3_music)){
            ?>
            <td><input type="number" readonly name="phase3_music_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase3_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase3_finalrating_music = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '9' AND phase = '3'";
            $query_phase3_finalrating_music= mysqli_query($conn, $phase3_finalrating_music);
            if(mysqli_num_rows($query_phase3_finalrating_music) > 0){
            $final_rating = mysqli_fetch_array($query_phase3_finalrating_music);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase3_art = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '3' AND student_grades.subject_id = '10'";
            $query_phase3_art= mysqli_query($conn, $phase3_art) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Arts</i></td>
            <?php 
            if(mysqli_num_rows($query_phase3_art) > 0){
            while($rows = mysqli_fetch_array($query_phase3_art)){
            ?>
            <td><input type="number" readonly name="phase3_art_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase3_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase3_finalrating_art = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '10' AND phase = '3'";
            $query_phase3_finalrating_art= mysqli_query($conn, $phase3_finalrating_art);
            if(mysqli_num_rows($query_phase3_finalrating_art) > 0){
            $final_rating = mysqli_fetch_array($query_phase3_finalrating_art);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>

          
          <tr>
          <?php
            $phase3_pe = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '3' AND student_grades.subject_id = '11'";
            $query_phase3_pe= mysqli_query($conn, $phase3_pe) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Physical Education</i></td>
            <?php 
            if(mysqli_num_rows($query_phase3_pe) > 0){
            while($rows = mysqli_fetch_array($query_phase3_pe)){
            ?>
            <td><input type="number" readonly name="phase3_pe_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase3_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase3_finalrating_pe = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '11' AND phase = '3'";
            $query_phase3_finalrating_pe= mysqli_query($conn, $phase3_finalrating_pe);
            if(mysqli_num_rows($query_phase3_finalrating_pe) > 0){
            $final_rating = mysqli_fetch_array($query_phase3_finalrating_pe);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase3_health = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '3' AND student_grades.subject_id = '12'";
            $query_phase3_health= mysqli_query($conn, $phase3_health) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Health</i></td>
            <?php 
            if(mysqli_num_rows($query_phase3_health) > 0){
            while($rows = mysqli_fetch_array($query_phase3_health)){
            ?>
            <td><input type="number" readonly name="phase3_health_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase3_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase3_finalrating_health = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '12' AND phase = '3'";
            $query_phase3_finalrating_health= mysqli_query($conn, $phase3_finalrating_health);
            if(mysqli_num_rows($query_phase3_finalrating_health) > 0){
            $final_rating = mysqli_fetch_array($query_phase3_finalrating_health);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase3_esp = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '3' AND student_grades.subject_id = '13'";
            $query_phase3_esp= mysqli_query($conn, $phase3_esp) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Edukasyon sa Pagpapakatao</td>
            <?php 
            if(mysqli_num_rows($query_phase3_esp) > 0){
            while($rows = mysqli_fetch_array($query_phase3_esp)){
            ?>
            <td><input type="number" readonly name="phase3_esp_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase3_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase3_finalrating_esp = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '13' AND phase = '3'";
            $query_phase3_finalrating_esp= mysqli_query($conn, $phase3_finalrating_esp);
            if(mysqli_num_rows($query_phase3_finalrating_esp) > 0){
            $final_rating = mysqli_fetch_array($query_phase3_finalrating_esp);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase3_arabic_lang = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '3' AND student_grades.subject_id = '14'";
            $query_phase3_arabic_lang= mysqli_query($conn, $phase3_arabic_lang) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start">*Arabic Language</td>
            <?php 
            if(mysqli_num_rows($query_phase3_arabic_lang) > 0){
            while($rows = mysqli_fetch_array($query_phase3_arabic_lang)){
            ?>
            <td><input type="number" readonly name="phase3_arabic_lang_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase3_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase3_finalrating_arabic_lang = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '14' AND phase = '3'";
            $query_phase3_finalrating_arabic_lang= mysqli_query($conn, $phase3_finalrating_arabic_lang);
            if(mysqli_num_rows($query_phase3_finalrating_arabic_lang) > 0){
            $final_rating = mysqli_fetch_array($query_phase3_finalrating_arabic_lang);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase3_islamic_values = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '3' AND student_grades.subject_id = '15'";
            $query_phase3_islamic_values= mysqli_query($conn, $phase3_islamic_values) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start">*Islamic Values Education</td>
            <?php 
            if(mysqli_num_rows($query_phase3_islamic_values) > 0){
            while($rows = mysqli_fetch_array($query_phase3_islamic_values)){
            ?>
            <td><input type="number" readonly name="phase3_islamic_values_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase3_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase3_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase3_finalrating_islamic_values = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '15' AND phase = '3'";
            $query_phase3_finalrating_islamic_values= mysqli_query($conn, $phase3_finalrating_islamic_values);
            if(mysqli_num_rows($query_phase3_finalrating_islamic_values) > 0){
            $final_rating = mysqli_fetch_array($query_phase3_finalrating_islamic_values);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>     
          <tr>
          <?php
            $phase3_general_average = "SELECT general_average FROM student_general_averages
            WHERE lrn = '109857060083' AND phase = '3'";
            $query_phase3_general_average = mysqli_query($conn, $phase3_general_average);
            ?>
            <td class="text-start fw-bold">General Average</td>
            <?php
            if(mysqli_num_rows($query_phase3_general_average) > 0){
              while($rows = mysqli_fetch_array($query_phase3_general_average)){
            ?>
            <td><?php if($rows['general_average'] == 0){ echo "";}else{ echo $rows['general_average'];}?></td>
            <?php
            }}else{
            ?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          <?php }?>
          </tr>
        </tbody>
      </table>

  <!-- Remedial Table PHASE 3 -->
  
        <?php
        $phase3_remedial_classes_dates = "SELECT * FROM remedial_classes
        WHERE lrn = '109857060083' AND phase = '3'";
        $query_phase3_remedial_classes_dates = mysqli_query($conn, $phase3_remedial_classes_dates);
        if(mysqli_num_rows($query_phase3_remedial_classes_dates) > 0){
          $row = mysqli_fetch_array($query_phase3_remedial_classes_dates);
          ?>
          <table class="table-condensed text-center w-100">
        <thead> 
          <tr>
            <th colspan="2">Remedial Classes</th>
            <th colspan="4">
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" disabled class="datefrom" name="phase3_date_from" value="<?php echo strftime('%Y-%m-%d', strtotime($row['date_from']));?>">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" disabled class="dateto" name="phase3_date_to" value="<?php echo strftime('%Y-%m-%d', strtotime($row['date_to']));?>">
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
        <?php
        $phase3_remedial_classes_term1 = "SELECT * FROM remedial_classes
        WHERE lrn = '109857060083' AND phase = '3' AND term = '1'";
        $query_phase3_remedial_classes_term1 = mysqli_query($conn, $phase3_remedial_classes_term1) or die (mysqli_error($conn));
        $remedial_classes_term1 = mysqli_fetch_array($query_phase3_remedial_classes_term1);
        ?>
        <tbody>
        <tr>
            <td><input type="text" readonly  class="learning-areas1" name="phase3_learning_areas1" 
            value="<?php if(empty($remedial_classes_term1['learning_areas'])){ echo "";}else {echo $remedial_classes_term1['learning_areas'];}?>"></td>
            <td><input type="number" readonly id="grade" class="final_rating1" name="phase3_final_rating1" 
            value="<?php if($remedial_classes_term1['final_rating'] == 0){ echo "";}else{ echo $remedial_classes_term1['final_rating'];}?>"></td>
            <td><input type="text" readonly  name="phase3_remedial_class_mark1" 
            value="<?php if(empty($remedial_classes_term1['remedial_class_mark'])){ echo "";}else{ echo $remedial_classes_term1['remedial_class_mark'];}?>" id=""></td>
            <td><input type="number" readonly id="grade" name="phase3_recomputed_final_grade1" 
            value="<?php if($remedial_classes_term1['recomputed_final_grade'] == 0){ echo "";}else{echo $remedial_classes_term1['recomputed_final_grade'];}?>" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly  name="phase3_remedial_remarks1" 
            value="<?php if(empty($remedial_classes_term1['remarks'])){ echo "";}else{ echo $remedial_classes_term1['remarks'];}?>" id=""></td>
          </tr>
          <?php
          $phase3_remedial_classes_term2 = "SELECT * FROM remedial_classes
          WHERE lrn = '109857060083' AND phase = '3' AND term = '2'";
          $query_phase3_remedial_classes_term2 = mysqli_query($conn, $phase3_remedial_classes_term2) or die (mysqli_error($conn));
          $remedial_classes_term2 = mysqli_fetch_array($query_phase3_remedial_classes_term2);
        ?>
          <tr>
            <td><input type="text" readonly  class="learning_areas2" name="phase3_learning_areas2"
            value="<?php if(empty($remedial_classes_term2['learning_areas'])){ echo "";}else {echo $remedial_classes_term2['learning_areas'];}?>"></td>
            <td><input type="number" readonly id="grade" class="final_rating2" name="phase3_final_rating2"
            value="<?php if($remedial_classes_term2['final_rating'] == 0){ echo "";}else{ echo $remedial_classes_term2['final_rating'];}?>"></td>
            <td><input type="text" readonly  name="phase3_remedial_class_mark2" 
            value="<?php if(empty($remedial_classes_term2['remedial_class_mark'])){ echo "";}else{ echo $remedial_classes_term2['remedial_class_mark'];}?>" id=""> </td>
            <td><input type="number" readonly id="grade" name="phase3_recomputed_final_grade2" 
            value="<?php if($remedial_classes_term2['recomputed_final_grade'] == 0){ echo "";}else{echo $remedial_classes_term2['recomputed_final_grade'];}?>" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly name="phase3_remedial_remarks2" 
            value="<?php if(empty($remedial_classes_term2['remarks'])){ echo "";}else{ echo $remedial_classes_term2['remarks'];}?>" id=""></td>
          </tr>
        </tbody>
      </table>
        <?php }else{?>
          <table class="table-condensed text-center w-100">
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" disabled class="datefrom" name="phase3_date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" disabled class="dateto" name="phase3_date_to">
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
            <td><input type="text" readonly  class="learning-areas1" name="phase3_learning_areas1"></td>
            <td><input type="number" readonly id="grade" class="final_rating1" name="phase3_final_rating1"></td>
            <td><input type="text" readonly  name="phase3_remedial_class_mark1" id=""></td>
            <td><input type="number" readonly id="grade" name="phase3_recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly  name="phase3_remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" readonly  class="learning_areas2" name="phase3_learning_areas2"></td>
            <td><input type="number" readonly id="grade" class="final_rating2" name="phase3_final_rating2"></td>
            <td><input type="text" readonly  name="phase3_remedial_class_mark2" id=""> </td>
            <td><input type="number" readonly id="grade" name="phase3_recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly name="phase3_remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
        <?php }?>
      </div>
      <div class="form-container" style="padding: 7px 0 0 7px ;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <!-- PHASE 4 OF SCHOLASTIC RECORDS -->
        <?php
          $phase4_scholastic_records = "SELECT * FROM scholastic_records
          WHERE lrn = '109857060083' AND phase = '4'";
          $query_phase4_scholastic_records = mysqli_query($conn, $phase4_scholastic_records) or die (mysqli_error($conn,));
          $rows = mysqli_fetch_array($query_phase4_scholastic_records);
          ?>
        <span>
          <label>School:</label>
          <input type="text" readonly  id="text-only" name="phase4_sr_school" 
          value="<?php if(empty($rows['school'])){ echo "";}else{ echo $rows['school'];}?>" class="school">
        </span>
        <span>
          <label>School ID:</label>
          <input type="text" readonly  name="phase4_sr_school_id" 
          value="<?php if(empty($rows['school_id'])){ echo "";}else{ echo $rows['school_id'];}?>" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District:</label>
          <input type="text" readonly  class="w-50" name="phase4_sr_district" 
          value="<?php if(empty($rows['district'])){ echo "";}else{ echo $rows['district'];}?>" class="district">
        </span>
        <span>
          <label>Division:</label>
          <input type="text" readonly  class="w-50" name="phase4_sr_division" 
          value="<?php if(empty($rows['division'])){ echo "";}else{ echo $rows['division'];}?>" class="division">
        </span>
        <span class="text-end">
          <label>Region:</label>
          <input type="text" readonly  class="w-50" name="phase4_sr_region" 
          value="<?php if(empty($rows['region'])){ echo "";}else{ echo $rows['region'];}?>" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade:</label>
          <input type="number" readonly id="number-only" style="width: 20%;" name="phase4_sr_classified_as_grade" 
          value="<?php if(empty($rows['classified_as_grade'])){ echo "";}else{ echo $rows['classified_as_grade'];}?>" >
        </span>
        <span>
          <label>Section:</label>
          <input type="text" readonly  class="w-50" name="phase4_sr_section" 
          value="<?php if(empty($rows['section'])){ echo "";}else{ echo $rows['section'];}?>"> 
        </span>
        <span>
          <label>School Year:</label>
          <input type="text" readonly  class="w-50" name="phase4_sr_school_year" 
          value="<?php if(empty($rows['school_year'])){ echo "";}else{ echo $rows['school_year'];}?>">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
        <label for="">Name of Adviser:</label>
        <input type="text" readonly  id="text-only" name="phase4_sr_name_of_adviser" 
        value="<?php if(empty($rows['name_of_teacher'])){ echo "";}else{ echo $rows['name_of_teacher'];}?>">
        </span>
        <span>
          <label>Signature:</label>
          <input type="text" readonly  id="text-only" name="phase4_sr_signature" 
          value="<?php if(empty($rows['signature'])){ echo "";}else{ echo $rows['signature'];}?>" class="school_id">
        </span>
      </span>
    
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
          <th rowspan="2" style="width:40%;"><h6>Learner's Area</h6></th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
            <th rowspan="2" style="width:14%;">Remarks</th>
          </tr>
          <tr style="width: 5%;">
          
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            $phase4_mother_tounge = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '4' AND student_grades.subject_id = '1'";
            $query_phase4_mother_tounge = mysqli_query($conn, $phase4_mother_tounge) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Mother Tongue</td>
            <?php 
            if(mysqli_num_rows($query_phase4_mother_tounge) > 0){
            while($rows = mysqli_fetch_array($query_phase4_mother_tounge)){
            ?>
            <td><input type="number" readonly name="phase4_mother_tounge_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase4_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase4_finalrating_mother_tounge = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '1' AND phase = '4'";
            $query_phase4_finalrating_mother_tounge = mysqli_query($conn, $phase4_finalrating_mother_tounge);
            if(mysqli_num_rows($query_phase4_finalrating_mother_tounge) > 0){
            $final_rating = mysqli_fetch_array($query_phase4_finalrating_mother_tounge);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase4_filipino = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '4' AND student_grades.subject_id = '2'";
            $query_phase4_filipino = mysqli_query($conn, $phase4_filipino) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Filipino</td>
            <?php 
            if(mysqli_num_rows($query_phase4_filipino) > 0){
            while($rows = mysqli_fetch_array($query_phase4_filipino)){
            ?>
            <td><input type="number" readonly name="phase4_filipino_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase4_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase4_finalrating_filipino = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '2' AND phase = '4'";
            $query_phase4_finalrating_filipino = mysqli_query($conn, $phase4_finalrating_filipino);
            if(mysqli_num_rows($query_phase4_finalrating_filipino) > 0){
            $final_rating = mysqli_fetch_array($query_phase4_finalrating_filipino);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>
          <tr>
          <?php
            $phase4_english = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '4' AND student_grades.subject_id = '3'";
            $query_phase4_english = mysqli_query($conn, $phase4_english) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">English</td>
            <?php 
            if(mysqli_num_rows($query_phase4_english) > 0){
            while($rows = mysqli_fetch_array($query_phase4_english)){
            ?>
            <td><input type="number" readonly name="phase4_english_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase4_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase4_finalrating_english = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '3' AND phase = '4'";
            $query_phase4_finalrating_english = mysqli_query($conn, $phase4_finalrating_english);
            if(mysqli_num_rows($query_phase4_finalrating_english) > 0){
            $final_rating = mysqli_fetch_array($query_phase4_finalrating_english);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase4_math = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '4' AND student_grades.subject_id = '4'";
            $query_phase4_math = mysqli_query($conn, $phase4_math) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Mathematics</td>
            <?php 
            if(mysqli_num_rows($query_phase4_math) > 0){
            while($rows = mysqli_fetch_array($query_phase4_math)){
            ?>
            <td><input type="number" readonly name="phase4_math_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase4_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase4_finalrating_math = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '4' AND phase = '4'";
            $query_phase4_finalrating_math = mysqli_query($conn, $phase4_finalrating_math);
            if(mysqli_num_rows($query_phase4_finalrating_math) > 0){
            $final_rating = mysqli_fetch_array($query_phase4_finalrating_math);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase4_science = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '4' AND student_grades.subject_id = '5'";
            $query_phase4_science = mysqli_query($conn, $phase4_science) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Science</td>
            <?php 
            if(mysqli_num_rows($query_phase4_science) > 0){
            while($rows = mysqli_fetch_array($query_phase4_science)){
            ?>
            <td><input type="number" readonly name="phase4_science_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase4_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase4_finalrating_science = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '5' AND phase = '4'";
            $query_phase4_finalrating_science = mysqli_query($conn, $phase4_finalrating_science);
            if(mysqli_num_rows($query_phase4_finalrating_science) > 0){
            $final_rating = mysqli_fetch_array($query_phase4_finalrating_science);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase4_araling_panlipunan = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '4' AND student_grades.subject_id = '6'";
            $query_phase4_araling_panlipunan= mysqli_query($conn, $phase4_araling_panlipunan) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Araling Panlipunan</td>
            <?php 
            if(mysqli_num_rows($query_phase4_araling_panlipunan) > 0){
            while($rows = mysqli_fetch_array($query_phase4_araling_panlipunan)){
            ?>
            <td><input type="number" readonly name="phase4_araling_panlipunan_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase4_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase4_finalrating_araling_panlipunan = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '6' AND phase = '4'";
            $query_phase4_finalrating_araling_panlipunan= mysqli_query($conn, $phase4_finalrating_araling_panlipunan);
            if(mysqli_num_rows($query_phase4_finalrating_araling_panlipunan) > 0){
            $final_rating = mysqli_fetch_array($query_phase4_finalrating_araling_panlipunan);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase4_epp_tle = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '4' AND student_grades.subject_id = '7'";
            $query_phase4_epp_tle= mysqli_query($conn, $phase4_epp_tle) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">EPP/TLE</td>
            <?php 
            if(mysqli_num_rows($query_phase4_epp_tle) > 0){
            while($rows = mysqli_fetch_array($query_phase4_epp_tle)){
            ?>
            <td><input type="number" readonly name="phase4_epp_tle_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase4_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase4_finalrating_epp_tle = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '7' AND phase = '4'";
            $query_phase4_finalrating_epp_tle= mysqli_query($conn, $phase4_finalrating_epp_tle);
            if(mysqli_num_rows($query_phase4_finalrating_epp_tle) > 0){
            $final_rating = mysqli_fetch_array($query_phase4_finalrating_epp_tle);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase4_mapeh = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '4' AND student_grades.subject_id = '8'";
            $query_phase4_mapeh= mysqli_query($conn, $phase4_mapeh) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">MAPEH</td>
            <?php 
            if(mysqli_num_rows($query_phase4_mapeh) > 0){
            while($rows = mysqli_fetch_array($query_phase4_mapeh)){
            ?>
            <td><?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?></td>
            <?php }}else{?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <?php
            }
            ?>
            <?php
            $phase4_finalrating_mapeh = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '8' AND phase = '4'";
            $query_phase4_finalrating_mapeh= mysqli_query($conn, $phase4_finalrating_mapeh);
            if(mysqli_num_rows($query_phase4_finalrating_mapeh) > 0){
            $final_rating = mysqli_fetch_array($query_phase4_finalrating_mapeh);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase4_music = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '4' AND student_grades.subject_id = '9'";
            $query_phase4_music= mysqli_query($conn, $phase4_music) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Music</i></td>
            <?php 
            if(mysqli_num_rows($query_phase4_music) > 0){
            while($rows = mysqli_fetch_array($query_phase4_music)){
            ?>
            <td><input type="number" readonly name="phase4_music_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase4_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase4_finalrating_music = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '9' AND phase = '4'";
            $query_phase4_finalrating_music= mysqli_query($conn, $phase4_finalrating_music);
            if(mysqli_num_rows($query_phase4_finalrating_music) > 0){
            $final_rating = mysqli_fetch_array($query_phase4_finalrating_music);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase4_art = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '4' AND student_grades.subject_id = '10'";
            $query_phase4_art= mysqli_query($conn, $phase4_art) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Arts</i></td>
            <?php 
            if(mysqli_num_rows($query_phase4_art) > 0){
            while($rows = mysqli_fetch_array($query_phase4_art)){
            ?>
            <td><input type="number" readonly name="phase4_art_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase4_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase4_finalrating_art = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '10' AND phase = '4'";
            $query_phase4_finalrating_art= mysqli_query($conn, $phase4_finalrating_art);
            if(mysqli_num_rows($query_phase4_finalrating_art) > 0){
            $final_rating = mysqli_fetch_array($query_phase4_finalrating_art);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>

          
          <tr>
          <?php
            $phase4_pe = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '4' AND student_grades.subject_id = '11'";
            $query_phase4_pe= mysqli_query($conn, $phase4_pe) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Physical Education</i></td>
            <?php 
            if(mysqli_num_rows($query_phase4_pe) > 0){
            while($rows = mysqli_fetch_array($query_phase4_pe)){
            ?>
            <td><input type="number" readonly name="phase4_pe_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase4_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase4_finalrating_pe = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '11' AND phase = '4'";
            $query_phase4_finalrating_pe= mysqli_query($conn, $phase4_finalrating_pe);
            if(mysqli_num_rows($query_phase4_finalrating_pe) > 0){
            $final_rating = mysqli_fetch_array($query_phase4_finalrating_pe);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase4_health = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '4' AND student_grades.subject_id = '12'";
            $query_phase4_health= mysqli_query($conn, $phase4_health) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Health</i></td>
            <?php 
            if(mysqli_num_rows($query_phase4_health) > 0){
            while($rows = mysqli_fetch_array($query_phase4_health)){
            ?>
            <td><input type="number" readonly name="phase4_health_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase4_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase4_finalrating_health = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '12' AND phase = '4'";
            $query_phase4_finalrating_health= mysqli_query($conn, $phase4_finalrating_health);
            if(mysqli_num_rows($query_phase4_finalrating_health) > 0){
            $final_rating = mysqli_fetch_array($query_phase4_finalrating_health);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase4_esp = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '4' AND student_grades.subject_id = '13'";
            $query_phase4_esp= mysqli_query($conn, $phase4_esp) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Edukasyon sa Pagpapakatao</td>
            <?php 
            if(mysqli_num_rows($query_phase4_esp) > 0){
            while($rows = mysqli_fetch_array($query_phase4_esp)){
            ?>
            <td><input type="number" readonly name="phase4_esp_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase4_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase4_finalrating_esp = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '13' AND phase = '4'";
            $query_phase4_finalrating_esp= mysqli_query($conn, $phase4_finalrating_esp);
            if(mysqli_num_rows($query_phase4_finalrating_esp) > 0){
            $final_rating = mysqli_fetch_array($query_phase4_finalrating_esp);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase4_arabic_lang = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '4' AND student_grades.subject_id = '14'";
            $query_phase4_arabic_lang= mysqli_query($conn, $phase4_arabic_lang) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Arabic Language</i></td>
            <?php 
            if(mysqli_num_rows($query_phase4_arabic_lang) > 0){
            while($rows = mysqli_fetch_array($query_phase4_arabic_lang)){
            ?>
            <td><input type="number" readonly name="phase4_arabic_lang_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase4_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase4_finalrating_arabic_lang = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '14' AND phase = '4'";
            $query_phase4_finalrating_arabic_lang= mysqli_query($conn, $phase4_finalrating_arabic_lang);
            if(mysqli_num_rows($query_phase4_finalrating_arabic_lang) > 0){
            $final_rating = mysqli_fetch_array($query_phase4_finalrating_arabic_lang);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase4_islamic_values = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '4' AND student_grades.subject_id = '15'";
            $query_phase4_islamic_values= mysqli_query($conn, $phase4_islamic_values) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Islamic Values Education</i></td>
            <?php 
            if(mysqli_num_rows($query_phase4_islamic_values) > 0){
            while($rows = mysqli_fetch_array($query_phase4_islamic_values)){
            ?>
            <td><input type="number" readonly name="phase4_islamic_values_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase4_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase4_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase4_finalrating_islamic_values = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '15' AND phase = '4'";
            $query_phase4_finalrating_islamic_values= mysqli_query($conn, $phase4_finalrating_islamic_values);
            if(mysqli_num_rows($query_phase4_finalrating_islamic_values) > 0){
            $final_rating = mysqli_fetch_array($query_phase4_finalrating_islamic_values);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>

          
          <tr>
          <?php
            $phase4_general_average = "SELECT general_average FROM student_general_averages
            WHERE lrn = '109857060083' AND phase = '4'";
            $query_phase4_general_average = mysqli_query($conn, $phase4_general_average);
            ?>
            <td class="text-start fw-bold">General Average</td>
            <?php
            if(mysqli_num_rows($query_phase4_general_average) > 0){
              while($rows = mysqli_fetch_array($query_phase4_general_average)){
            ?>
            <td><?php if($rows['general_average'] == 0){ echo "";}else{ echo $rows['general_average'];}?></td>
            <?php
            }}else{
            ?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          <?php }?>
          </tr>
        </tbody>
      </table>

  <!-- Remedial Table PHASE 4 -->
  
        <?php
        $phase4_remedial_classes_dates = "SELECT * FROM remedial_classes
        WHERE lrn = '109857060083' AND phase = '4'";
        $query_phase4_remedial_classes_dates = mysqli_query($conn, $phase4_remedial_classes_dates);
        if(mysqli_num_rows($query_phase4_remedial_classes_dates) > 0){
          $row = mysqli_fetch_array($query_phase4_remedial_classes_dates);
          ?>
          <table class="table-condensed text-center w-100">
        <thead> 
          <tr>
            <th colspan="2">Remedial Classes</th>
            <th colspan="4">
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" disabled class="datefrom" name="phase4_date_from" value="<?php echo strftime('%Y-%m-%d', strtotime($row['date_from']));?>">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" disabled class="dateto" name="phase4_date_to" value="<?php echo strftime('%Y-%m-%d', strtotime($row['date_to']));?>">
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
        <?php
        $phase4_remedial_classes_term1 = "SELECT * FROM remedial_classes
        WHERE lrn = '109857060083' AND phase = '4' AND term = '1'";
        $query_phase4_remedial_classes_term1 = mysqli_query($conn, $phase4_remedial_classes_term1) or die (mysqli_error($conn));
        $remedial_classes_term1 = mysqli_fetch_array($query_phase4_remedial_classes_term1);
        ?>
        <tbody>
        <tr>
            <td><input type="text" readonly  class="learning-areas1" name="phase4_learning_areas1" 
            value="<?php if(empty($remedial_classes_term1['learning_areas'])){ echo "";}else {echo $remedial_classes_term1['learning_areas'];}?>"></td>
            <td><input type="number" readonly id="grade" class="final_rating1" name="phase4_final_rating1" 
            value="<?php if($remedial_classes_term1['final_rating'] == 0){ echo "";}else{ echo $remedial_classes_term1['final_rating'];}?>"></td>
            <td><input type="text" readonly  name="phase4_remedial_class_mark1" 
            value="<?php if(empty($remedial_classes_term1['remedial_class_mark'])){ echo "";}else{ echo $remedial_classes_term1['remedial_class_mark'];}?>" id=""></td>
            <td><input type="number" readonly id="grade" name="phase4_recomputed_final_grade1" 
            value="<?php if($remedial_classes_term1['recomputed_final_grade'] == 0){ echo "";}else{echo $remedial_classes_term1['recomputed_final_grade'];}?>" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly  name="phase4_remedial_remarks1" 
            value="<?php if(empty($remedial_classes_term1['remarks'])){ echo "";}else{ echo $remedial_classes_term1['remarks'];}?>" id=""></td>
          </tr>
          <?php
          $phase4_remedial_classes_term2 = "SELECT * FROM remedial_classes
          WHERE lrn = '109857060083' AND phase = '4' AND term = '2'";
          $query_phase4_remedial_classes_term2 = mysqli_query($conn, $phase4_remedial_classes_term2) or die (mysqli_error($conn));
          $remedial_classes_term2 = mysqli_fetch_array($query_phase4_remedial_classes_term2);
        ?>
          <tr>
            <td><input type="text" readonly  class="learning_areas2" name="phase4_learning_areas2"
            value="<?php if(empty($remedial_classes_term2['learning_areas'])){ echo "";}else {echo $remedial_classes_term2['learning_areas'];}?>"></td>
            <td><input type="number" readonly id="grade" class="final_rating2" name="phase4_final_rating2"
            value="<?php if($remedial_classes_term2['final_rating'] == 0){ echo "";}else{ echo $remedial_classes_term2['final_rating'];}?>"></td>
            <td><input type="text" readonly  name="phase4_remedial_class_mark2" 
            value="<?php if(empty($remedial_classes_term2['remedial_class_mark'])){ echo "";}else{ echo $remedial_classes_term2['remedial_class_mark'];}?>" id=""> </td>
            <td><input type="number" readonly id="grade" name="phase4_recomputed_final_grade2" 
            value="<?php if($remedial_classes_term2['recomputed_final_grade'] == 0){ echo "";}else{echo $remedial_classes_term2['recomputed_final_grade'];}?>" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly name="phase4_remedial_remarks2" 
            value="<?php if(empty($remedial_classes_term2['remarks'])){ echo "";}else{ echo $remedial_classes_term2['remarks'];}?>" id=""></td>
          </tr>
        </tbody>
      </table>
        <?php }else{?>
          <table class="table-condensed text-center w-100">
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" disabled class="datefrom" name="phase4_date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" disabled class="dateto" name="phase4_date_to">
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
            <td><input type="text" readonly  class="learning-areas1" name="phase4_learning_areas1"></td>
            <td><input type="number" readonly id="grade" class="final_rating1" name="phase4_final_rating1"></td>
            <td><input type="text" readonly  name="phase4_remedial_class_mark1" id=""></td>
            <td><input type="number" readonly id="grade" name="phase4_recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly  name="phase4_remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" readonly  class="learning_areas2" name="phase4_learning_areas2"></td>
            <td><input type="number" readonly id="grade" class="final_rating2" name="phase4_final_rating2"></td>
            <td><input type="text" readonly  name="phase4_remedial_class_mark2" id=""> </td>
            <td><input type="number" readonly id="grade" name="phase4_recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly name="phase4_remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
        <?php }?>
      </div>
    </div>
      <input type="button" class="next-form text-end btn btn-success" style="float: right;" value="Next" />
    </fieldset>
    <fieldset class="pb-5">
      <!-- BACK PHASES -->
      <div class="gen-container d-flex flex-row">
      <div class="form-container" style="padding: 0 7px 7px 0;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <!-- PHASE 5 OF SCHOLASTIC RECORDS -->
        <?php
          $phase5_scholastic_records = "SELECT * FROM scholastic_records
          WHERE lrn = '109857060083' AND phase = '5'";
          $query_phase5_scholastic_records = mysqli_query($conn, $phase5_scholastic_records) or die (mysqli_error($conn,));
          $rows = mysqli_fetch_array($query_phase5_scholastic_records);
          ?>
        <span>
          <label>School:</label>
          <input type="text" readonly  id="text-only" name="phase5_sr_school" 
          value="<?php if(empty($rows['school'])){ echo "";}else{ echo $rows['school'];}?>" class="school">
        </span>
        <span>
          <label>School ID:</label>
          <input type="text" readonly  name="phase5_sr_school_id" 
          value="<?php if(empty($rows['school_id'])){ echo "";}else{ echo $rows['school_id'];}?>" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District:</label>
          <input type="text" readonly  class="w-50" name="phase5_sr_district" 
          value="<?php if(empty($rows['district'])){ echo "";}else{ echo $rows['district'];}?>" class="district">
        </span>
        <span>
          <label>Division:</label>
          <input type="text" readonly  class="w-50" name="phase5_sr_division" 
          value="<?php if(empty($rows['division'])){ echo "";}else{ echo $rows['division'];}?>" class="division">
        </span>
        <span class="text-end">
          <label>Region:</label>
          <input type="text" readonly  class="w-50" name="phase5_sr_region" 
          value="<?php if(empty($rows['region'])){ echo "";}else{ echo $rows['region'];}?>" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade:</label>
          <input type="number" readonly id="number-only" style="width: 20%;" name="phase5_sr_classified_as_grade" 
          value="<?php if(empty($rows['classified_as_grade'])){ echo "";}else{ echo $rows['classified_as_grade'];}?>" >
        </span>
        <span>
          <label>Section:</label>
          <input type="text" readonly  class="w-50" name="phase5_sr_section" 
          value="<?php if(empty($rows['section'])){ echo "";}else{ echo $rows['section'];}?>"> 
        </span>
        <span>
          <label>School Year:</label>
          <input type="text" readonly  class="w-50" name="phase5_sr_school_year" 
          value="<?php if(empty($rows['school_year'])){ echo "";}else{ echo $rows['school_year'];}?>">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
        <label for="">Name of Adviser:</label>
        <input type="text" readonly  id="text-only" name="phase5_sr_name_of_adviser" 
        value="<?php if(empty($rows['name_of_teacher'])){ echo "";}else{ echo $rows['name_of_teacher'];}?>">
        </span>
        <span>
          <label>Signature:</label>
          <input type="text" readonly  id="text-only" name="phase5_sr_signature" 
          value="<?php if(empty($rows['signature'])){ echo "";}else{ echo $rows['signature'];}?>" class="school_id">
        </span>
      </span>
    
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
          <th rowspan="2" style="width:40%;"><h6>Learner's Area</h6></th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
            <th rowspan="2" style="width:14%;">Remarks</th>
          </tr>
          <tr style="width: 5%;">
          
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            $phase5_mother_tounge = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '5' AND student_grades.subject_id = '1'";
            $query_phase5_mother_tounge = mysqli_query($conn, $phase5_mother_tounge) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Mother Tongue</td>
            <?php 
            if(mysqli_num_rows($query_phase5_mother_tounge) > 0){
            while($rows = mysqli_fetch_array($query_phase5_mother_tounge)){
            ?>
            <td><input type="number" readonly name="phase5_mother_tounge_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase5_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase5_finalrating_mother_tounge = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '1' AND phase = '5'";
            $query_phase5_finalrating_mother_tounge = mysqli_query($conn, $phase5_finalrating_mother_tounge);
            if(mysqli_num_rows($query_phase5_finalrating_mother_tounge) > 0){
            $final_rating = mysqli_fetch_array($query_phase5_finalrating_mother_tounge);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase5_filipino = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '5' AND student_grades.subject_id = '2'";
            $query_phase5_filipino = mysqli_query($conn, $phase5_filipino) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Filipino</td>
            <?php 
            if(mysqli_num_rows($query_phase5_filipino) > 0){
            while($rows = mysqli_fetch_array($query_phase5_filipino)){
            ?>
            <td><input type="number" readonly name="phase5_filipino_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase5_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase5_finalrating_filipino = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '2' AND phase = '5'";
            $query_phase5_finalrating_filipino = mysqli_query($conn, $phase5_finalrating_filipino);
            if(mysqli_num_rows($query_phase5_finalrating_filipino) > 0){
            $final_rating = mysqli_fetch_array($query_phase5_finalrating_filipino);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>
          <tr>
          <?php
            $phase5_english = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '5' AND student_grades.subject_id = '3'";
            $query_phase5_english = mysqli_query($conn, $phase5_english) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">English</td>
            <?php 
            if(mysqli_num_rows($query_phase5_english) > 0){
            while($rows = mysqli_fetch_array($query_phase5_english)){
            ?>
            <td><input type="number" readonly name="phase5_english_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase5_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase5_finalrating_english = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '3' AND phase = '5'";
            $query_phase5_finalrating_english = mysqli_query($conn, $phase5_finalrating_english);
            if(mysqli_num_rows($query_phase5_finalrating_english) > 0){
            $final_rating = mysqli_fetch_array($query_phase5_finalrating_english);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase5_math = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '5' AND student_grades.subject_id = '4'";
            $query_phase5_math = mysqli_query($conn, $phase5_math) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Mathematics</td>
            <?php 
            if(mysqli_num_rows($query_phase5_math) > 0){
            while($rows = mysqli_fetch_array($query_phase5_math)){
            ?>
            <td><input type="number" readonly name="phase5_math_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase5_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase5_finalrating_math = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '4' AND phase = '5'";
            $query_phase5_finalrating_math = mysqli_query($conn, $phase5_finalrating_math);
            if(mysqli_num_rows($query_phase5_finalrating_math) > 0){
            $final_rating = mysqli_fetch_array($query_phase5_finalrating_math);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase5_science = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '5' AND student_grades.subject_id = '5'";
            $query_phase5_science = mysqli_query($conn, $phase5_science) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Science</td>
            <?php 
            if(mysqli_num_rows($query_phase5_science) > 0){
            while($rows = mysqli_fetch_array($query_phase5_science)){
            ?>
            <td><input type="number" readonly name="phase5_science_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase5_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase5_finalrating_science = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '5' AND phase = '5'";
            $query_phase5_finalrating_science = mysqli_query($conn, $phase5_finalrating_science);
            if(mysqli_num_rows($query_phase5_finalrating_science) > 0){
            $final_rating = mysqli_fetch_array($query_phase5_finalrating_science);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase5_araling_panlipunan = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '5' AND student_grades.subject_id = '6'";
            $query_phase5_araling_panlipunan= mysqli_query($conn, $phase5_araling_panlipunan) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Araling Panlipunan</td>
            <?php 
            if(mysqli_num_rows($query_phase5_araling_panlipunan) > 0){
            while($rows = mysqli_fetch_array($query_phase5_araling_panlipunan)){
            ?>
            <td><input type="number" readonly name="phase5_araling_panlipunan_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase5_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase5_finalrating_araling_panlipunan = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '6' AND phase = '5'";
            $query_phase5_finalrating_araling_panlipunan= mysqli_query($conn, $phase5_finalrating_araling_panlipunan);
            if(mysqli_num_rows($query_phase5_finalrating_araling_panlipunan) > 0){
            $final_rating = mysqli_fetch_array($query_phase5_finalrating_araling_panlipunan);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase5_epp_tle = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '5' AND student_grades.subject_id = '7'";
            $query_phase5_epp_tle= mysqli_query($conn, $phase5_epp_tle) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">EPP/TLE</td>
            <?php 
            if(mysqli_num_rows($query_phase5_epp_tle) > 0){
            while($rows = mysqli_fetch_array($query_phase5_epp_tle)){
            ?>
            <td><input type="number" readonly name="phase5_epp_tle_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase5_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase5_finalrating_epp_tle = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '7' AND phase = '5'";
            $query_phase5_finalrating_epp_tle= mysqli_query($conn, $phase5_finalrating_epp_tle);
            if(mysqli_num_rows($query_phase5_finalrating_epp_tle) > 0){
            $final_rating = mysqli_fetch_array($query_phase5_finalrating_epp_tle);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase5_mapeh = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '5' AND student_grades.subject_id = '8'";
            $query_phase5_mapeh= mysqli_query($conn, $phase5_mapeh) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">MAPEH</td>
            <?php 
            if(mysqli_num_rows($query_phase5_mapeh) > 0){
            while($rows = mysqli_fetch_array($query_phase5_mapeh)){
            ?>
            <td><?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?></td>
            <?php }}else{?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <?php
            }
            ?>
            <?php
            $phase5_finalrating_mapeh = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '8' AND phase = '5'";
            $query_phase5_finalrating_mapeh= mysqli_query($conn, $phase5_finalrating_mapeh);
            if(mysqli_num_rows($query_phase5_finalrating_mapeh) > 0){
            $final_rating = mysqli_fetch_array($query_phase5_finalrating_mapeh);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>
          <tr>
          <?php
            $phase5_music = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '5' AND student_grades.subject_id = '9'";
            $query_phase5_music= mysqli_query($conn, $phase5_music) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Music</i></td>
            <?php 
            if(mysqli_num_rows($query_phase5_music) > 0){
            while($rows = mysqli_fetch_array($query_phase5_music)){
            ?>
            <td><input type="number" readonly name="phase5_music_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase5_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase5_finalrating_music = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '9' AND phase = '5'";
            $query_phase5_finalrating_music= mysqli_query($conn, $phase5_finalrating_music);
            if(mysqli_num_rows($query_phase5_finalrating_music) > 0){
            $final_rating = mysqli_fetch_array($query_phase5_finalrating_music);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase5_art = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '5' AND student_grades.subject_id = '10'";
            $query_phase5_art= mysqli_query($conn, $phase5_art) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Arts</i></td>
            <?php 
            if(mysqli_num_rows($query_phase5_art) > 0){
            while($rows = mysqli_fetch_array($query_phase5_art)){
            ?>
            <td><input type="number" readonly name="phase5_art_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase5_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase5_finalrating_art = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '10' AND phase = '5'";
            $query_phase5_finalrating_art= mysqli_query($conn, $phase5_finalrating_art);
            if(mysqli_num_rows($query_phase5_finalrating_art) > 0){
            $final_rating = mysqli_fetch_array($query_phase5_finalrating_art);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>

          
          <tr>
          <?php
            $phase5_pe = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '5' AND student_grades.subject_id = '11'";
            $query_phase5_pe= mysqli_query($conn, $phase5_pe) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Physical Education</i></td>
            <?php 
            if(mysqli_num_rows($query_phase5_pe) > 0){
            while($rows = mysqli_fetch_array($query_phase5_pe)){
            ?>
            <td><input type="number" readonly name="phase5_pe_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase5_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase5_finalrating_pe = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '11' AND phase = '5'";
            $query_phase5_finalrating_pe= mysqli_query($conn, $phase5_finalrating_pe);
            if(mysqli_num_rows($query_phase5_finalrating_pe) > 0){
            $final_rating = mysqli_fetch_array($query_phase5_finalrating_pe);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase5_health = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '5' AND student_grades.subject_id = '12'";
            $query_phase5_health= mysqli_query($conn, $phase5_health) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Health</i></td>
            <?php 
            if(mysqli_num_rows($query_phase5_health) > 0){
            while($rows = mysqli_fetch_array($query_phase5_health)){
            ?>
            <td><input type="number" readonly name="phase5_health_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase5_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase5_finalrating_health = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '12' AND phase = '5'";
            $query_phase5_finalrating_health= mysqli_query($conn, $phase5_finalrating_health);
            if(mysqli_num_rows($query_phase5_finalrating_health) > 0){
            $final_rating = mysqli_fetch_array($query_phase5_finalrating_health);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase5_esp = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '5' AND student_grades.subject_id = '13'";
            $query_phase5_esp= mysqli_query($conn, $phase5_esp) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Edukasyon sa Pagpapakatao</td>
            <?php 
            if(mysqli_num_rows($query_phase5_esp) > 0){
            while($rows = mysqli_fetch_array($query_phase5_esp)){
            ?>
            <td><input type="number" readonly name="phase5_esp_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase5_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase5_finalrating_esp = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '13' AND phase = '5'";
            $query_phase5_finalrating_esp= mysqli_query($conn, $phase5_finalrating_esp);
            if(mysqli_num_rows($query_phase5_finalrating_esp) > 0){
            $final_rating = mysqli_fetch_array($query_phase5_finalrating_esp);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase5_arabic_lang = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '5' AND student_grades.subject_id = '14'";
            $query_phase5_arabic_lang= mysqli_query($conn, $phase5_arabic_lang) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Arabic Language</i></td>
            <?php 
            if(mysqli_num_rows($query_phase5_arabic_lang) > 0){
            while($rows = mysqli_fetch_array($query_phase5_arabic_lang)){
            ?>
            <td><input type="number" readonly name="phase5_arabic_lang_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase5_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase5_finalrating_arabic_lang = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '14' AND phase = '5'";
            $query_phase5_finalrating_arabic_lang= mysqli_query($conn, $phase5_finalrating_arabic_lang);
            if(mysqli_num_rows($query_phase5_finalrating_arabic_lang) > 0){
            $final_rating = mysqli_fetch_array($query_phase5_finalrating_arabic_lang);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase5_islamic_values = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '5' AND student_grades.subject_id = '15'";
            $query_phase5_islamic_values= mysqli_query($conn, $phase5_islamic_values) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Islamic Values Education</i></td>
            <?php 
            if(mysqli_num_rows($query_phase5_islamic_values) > 0){
            while($rows = mysqli_fetch_array($query_phase5_islamic_values)){
            ?>
            <td><input type="number" readonly name="phase5_islamic_values_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase5_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase5_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase5_finalrating_islamic_values = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '15' AND phase = '5'";
            $query_phase5_finalrating_islamic_values= mysqli_query($conn, $phase5_finalrating_islamic_values);
            if(mysqli_num_rows($query_phase5_finalrating_islamic_values) > 0){
            $final_rating = mysqli_fetch_array($query_phase5_finalrating_islamic_values);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>

          
          <tr>
          <?php
            $phase5_general_average = "SELECT general_average FROM student_general_averages
            WHERE lrn = '109857060083' AND phase = '5'";
            $query_phase5_general_average = mysqli_query($conn, $phase5_general_average);
            ?>
            <td class="text-start fw-bold">General Average</td>
            <?php
            if(mysqli_num_rows($query_phase5_general_average) > 0){
              while($rows = mysqli_fetch_array($query_phase5_general_average)){
            ?>
            <td><?php if($rows['general_average'] == 0){ echo "";}else{ echo $rows['general_average'];}?></td>
            <?php
            }}else{
            ?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          <?php }?>
          </tr>
        </tbody>
      </table>

  <!-- Remedial Table PHASE 5 -->
  
        <?php
        $phase5_remedial_classes_dates = "SELECT * FROM remedial_classes
        WHERE lrn = '109857060083' AND phase = '5'";
        $query_phase5_remedial_classes_dates = mysqli_query($conn, $phase5_remedial_classes_dates);
        if(mysqli_num_rows($query_phase5_remedial_classes_dates) > 0){
          $row = mysqli_fetch_array($query_phase5_remedial_classes_dates);
          ?>
          <table class="table-condensed text-center w-100">
        <thead> 
          <tr>
            <th colspan="2">Remedial Classes</th>
            <th colspan="4">
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" disabled class="datefrom" name="phase5_date_from" value="<?php echo strftime('%Y-%m-%d', strtotime($row['date_from']));?>">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" disabled class="dateto" name="phase5_date_to" value="<?php echo strftime('%Y-%m-%d', strtotime($row['date_to']));?>">
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
        <?php
        $phase5_remedial_classes_term1 = "SELECT * FROM remedial_classes
        WHERE lrn = '109857060083' AND phase = '5' AND term = '1'";
        $query_phase5_remedial_classes_term1 = mysqli_query($conn, $phase5_remedial_classes_term1) or die (mysqli_error($conn));
        $remedial_classes_term1 = mysqli_fetch_array($query_phase5_remedial_classes_term1);
        ?>
        <tbody>
        <tr>
            <td><input type="text" readonly  class="learning-areas1" name="phase5_learning_areas1" 
            value="<?php if(empty($remedial_classes_term1['learning_areas'])){ echo "";}else {echo $remedial_classes_term1['learning_areas'];}?>"></td>
            <td><input type="number" readonly id="grade" class="final_rating1" name="phase5_final_rating1" 
            value="<?php if($remedial_classes_term1['final_rating'] == 0){ echo "";}else{ echo $remedial_classes_term1['final_rating'];}?>"></td>
            <td><input type="text" readonly  name="phase5_remedial_class_mark1" 
            value="<?php if(empty($remedial_classes_term1['remedial_class_mark'])){ echo "";}else{ echo $remedial_classes_term1['remedial_class_mark'];}?>" id=""></td>
            <td><input type="number" readonly id="grade" name="phase5_recomputed_final_grade1" 
            value="<?php if($remedial_classes_term1['recomputed_final_grade'] == 0){ echo "";}else{echo $remedial_classes_term1['recomputed_final_grade'];}?>" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly  name="phase5_remedial_remarks1" 
            value="<?php if(empty($remedial_classes_term1['remarks'])){ echo "";}else{ echo $remedial_classes_term1['remarks'];}?>" id=""></td>
          </tr>
          <?php
          $phase5_remedial_classes_term2 = "SELECT * FROM remedial_classes
          WHERE lrn = '109857060083' AND phase = '5' AND term = '2'";
          $query_phase5_remedial_classes_term2 = mysqli_query($conn, $phase5_remedial_classes_term2) or die (mysqli_error($conn));
          $remedial_classes_term2 = mysqli_fetch_array($query_phase5_remedial_classes_term2);
        ?>
          <tr>
            <td><input type="text" readonly  class="learning_areas2" name="phase5_learning_areas2"
            value="<?php if(empty($remedial_classes_term2['learning_areas'])){ echo "";}else {echo $remedial_classes_term2['learning_areas'];}?>"></td>
            <td><input type="number" readonly id="grade" class="final_rating2" name="phase5_final_rating2"
            value="<?php if($remedial_classes_term2['final_rating'] == 0){ echo "";}else{ echo $remedial_classes_term2['final_rating'];}?>"></td>
            <td><input type="text" readonly  name="phase5_remedial_class_mark2" 
            value="<?php if(empty($remedial_classes_term2['remedial_class_mark'])){ echo "";}else{ echo $remedial_classes_term2['remedial_class_mark'];}?>" id=""> </td>
            <td><input type="number" readonly id="grade" name="phase5_recomputed_final_grade2" 
            value="<?php if($remedial_classes_term2['recomputed_final_grade'] == 0){ echo "";}else{echo $remedial_classes_term2['recomputed_final_grade'];}?>" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly name="phase5_remedial_remarks2" 
            value="<?php if(empty($remedial_classes_term2['remarks'])){ echo "";}else{ echo $remedial_classes_term2['remarks'];}?>" id=""></td>
          </tr>
        </tbody>
      </table>
        <?php }else{?>
          <table class="table-condensed text-center w-100">
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" disabled class="datefrom" name="phase5_date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" disabled class="dateto" name="phase5_date_to">
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
            <td><input type="text" readonly  class="learning-areas1" name="phase5_learning_areas1"></td>
            <td><input type="number" readonly id="grade" class="final_rating1" name="phase5_final_rating1"></td>
            <td><input type="text" readonly  name="phase5_remedial_class_mark1" id=""></td>
            <td><input type="number" readonly id="grade" name="phase5_recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly  name="phase5_remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" readonly  class="learning_areas2" name="phase5_learning_areas2"></td>
            <td><input type="number" readonly id="grade" class="final_rating2" name="phase5_final_rating2"></td>
            <td><input type="text" readonly  name="phase5_remedial_class_mark2" id=""> </td>
            <td><input type="number" readonly id="grade" name="phase5_recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly name="phase5_remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
        <?php }?>
      </div>
      <div class="form-container" style="padding: 0 0 7px 7px ;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <!-- PHASE 6 OF SCHOLASTIC RECORDS -->
        <?php
          $phase6_scholastic_records = "SELECT * FROM scholastic_records
          WHERE lrn = '109857060083' AND phase = '6'";
          $query_phase6_scholastic_records = mysqli_query($conn, $phase6_scholastic_records) or die (mysqli_error($conn,));
          $rows = mysqli_fetch_array($query_phase6_scholastic_records);
          ?>
        <span>
          <label>School:</label>
          <input type="text" readonly  id="text-only" name="phase6_sr_school" 
          value="<?php if(empty($rows['school'])){ echo "";}else{ echo $rows['school'];}?>" class="school">
        </span>
        <span>
          <label>School ID:</label>
          <input type="text" readonly  name="phase6_sr_school_id" 
          value="<?php if(empty($rows['school_id'])){ echo "";}else{ echo $rows['school_id'];}?>" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District:</label>
          <input type="text" readonly  class="w-50" name="phase6_sr_district" 
          value="<?php if(empty($rows['district'])){ echo "";}else{ echo $rows['district'];}?>" class="district">
        </span>
        <span>
          <label>Division:</label>
          <input type="text" readonly  class="w-50" name="phase6_sr_division" 
          value="<?php if(empty($rows['division'])){ echo "";}else{ echo $rows['division'];}?>" class="division">
        </span>
        <span class="text-end">
          <label>Region:</label>
          <input type="text" readonly  class="w-50" name="phase6_sr_region" 
          value="<?php if(empty($rows['region'])){ echo "";}else{ echo $rows['region'];}?>" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade:</label>
          <input type="number" readonly id="number-only" style="width: 20%;" name="phase6_sr_classified_as_grade" 
          value="<?php if(empty($rows['classified_as_grade'])){ echo "";}else{ echo $rows['classified_as_grade'];}?>" >
        </span>
        <span>
          <label>Section:</label>
          <input type="text" readonly  class="w-50" name="phase6_sr_section" 
          value="<?php if(empty($rows['section'])){ echo "";}else{ echo $rows['section'];}?>"> 
        </span>
        <span>
          <label>School Year:</label>
          <input type="text" readonly  class="w-50" name="phase6_sr_school_year" 
          value="<?php if(empty($rows['school_year'])){ echo "";}else{ echo $rows['school_year'];}?>">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
        <label for="">Name of Adviser:</label>
        <input type="text" readonly  id="text-only" name="phase6_sr_name_of_adviser" 
        value="<?php if(empty($rows['name_of_teacher'])){ echo "";}else{ echo $rows['name_of_teacher'];}?>">
        </span>
        <span>
          <label>Signature:</label>
          <input type="text" readonly  id="text-only" name="phase6_sr_signature" 
          value="<?php if(empty($rows['signature'])){ echo "";}else{ echo $rows['signature'];}?>" class="school_id">
        </span>
      </span>
    
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
          <th rowspan="2" style="width:40%;"><h6>Learner's Area</h6></th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
            <th rowspan="2" style="width:14%;">Remarks</th>
          </tr>
          <tr style="width: 5%;">
          
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            $phase6_mother_tounge = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '6' AND student_grades.subject_id = '1'";
            $query_phase6_mother_tounge = mysqli_query($conn, $phase6_mother_tounge) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Mother Tongue</td>
            <?php 
            if(mysqli_num_rows($query_phase6_mother_tounge) > 0){
            while($rows = mysqli_fetch_array($query_phase6_mother_tounge)){
            ?>
            <td><input type="number" readonly name="phase6_mother_tounge_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase6_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase6_finalrating_mother_tounge = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '1' AND phase = '6'";
            $query_phase6_finalrating_mother_tounge = mysqli_query($conn, $phase6_finalrating_mother_tounge);
            if(mysqli_num_rows($query_phase6_finalrating_mother_tounge) > 0){
            $final_rating = mysqli_fetch_array($query_phase6_finalrating_mother_tounge);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase6_filipino = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '6' AND student_grades.subject_id = '2'";
            $query_phase6_filipino = mysqli_query($conn, $phase6_filipino) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Filipino</td>
            <?php 
            if(mysqli_num_rows($query_phase6_filipino) > 0){
            while($rows = mysqli_fetch_array($query_phase6_filipino)){
            ?>
            <td><input type="number" readonly name="phase6_filipino_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase6_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase6_finalrating_filipino = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '2' AND phase = '6'";
            $query_phase6_finalrating_filipino = mysqli_query($conn, $phase6_finalrating_filipino);
            if(mysqli_num_rows($query_phase6_finalrating_filipino) > 0){
            $final_rating = mysqli_fetch_array($query_phase6_finalrating_filipino);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>
          <tr>
          <?php
            $phase6_english = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '6' AND student_grades.subject_id = '3'";
            $query_phase6_english = mysqli_query($conn, $phase6_english) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">English</td>
            <?php 
            if(mysqli_num_rows($query_phase6_english) > 0){
            while($rows = mysqli_fetch_array($query_phase6_english)){
            ?>
            <td><input type="number" readonly name="phase6_english_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase6_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase6_finalrating_english = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '3' AND phase = '6'";
            $query_phase6_finalrating_english = mysqli_query($conn, $phase6_finalrating_english);
            if(mysqli_num_rows($query_phase6_finalrating_english) > 0){
            $final_rating = mysqli_fetch_array($query_phase6_finalrating_english);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase6_math = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '6' AND student_grades.subject_id = '4'";
            $query_phase6_math = mysqli_query($conn, $phase6_math) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Mathematics</td>
            <?php 
            if(mysqli_num_rows($query_phase6_math) > 0){
            while($rows = mysqli_fetch_array($query_phase6_math)){
            ?>
            <td><input type="number" readonly name="phase6_math_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase6_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase6_finalrating_math = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '4' AND phase = '6'";
            $query_phase6_finalrating_math = mysqli_query($conn, $phase6_finalrating_math);
            if(mysqli_num_rows($query_phase6_finalrating_math) > 0){
            $final_rating = mysqli_fetch_array($query_phase6_finalrating_math);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase6_science = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '6' AND student_grades.subject_id = '5'";
            $query_phase6_science = mysqli_query($conn, $phase6_science) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Science</td>
            <?php 
            if(mysqli_num_rows($query_phase6_science) > 0){
            while($rows = mysqli_fetch_array($query_phase6_science)){
            ?>
            <td><input type="number" readonly name="phase6_science_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase6_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase6_finalrating_science = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '5' AND phase = '6'";
            $query_phase6_finalrating_science = mysqli_query($conn, $phase6_finalrating_science);
            if(mysqli_num_rows($query_phase6_finalrating_science) > 0){
            $final_rating = mysqli_fetch_array($query_phase6_finalrating_science);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase6_araling_panlipunan = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '6' AND student_grades.subject_id = '6'";
            $query_phase6_araling_panlipunan= mysqli_query($conn, $phase6_araling_panlipunan) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Araling Panlipunan</td>
            <?php 
            if(mysqli_num_rows($query_phase6_araling_panlipunan) > 0){
            while($rows = mysqli_fetch_array($query_phase6_araling_panlipunan)){
            ?>
            <td><input type="number" readonly name="phase6_araling_panlipunan_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase6_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase6_finalrating_araling_panlipunan = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '6' AND phase = '6'";
            $query_phase6_finalrating_araling_panlipunan= mysqli_query($conn, $phase6_finalrating_araling_panlipunan);
            if(mysqli_num_rows($query_phase6_finalrating_araling_panlipunan) > 0){
            $final_rating = mysqli_fetch_array($query_phase6_finalrating_araling_panlipunan);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase6_epp_tle = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '6' AND student_grades.subject_id = '7'";
            $query_phase6_epp_tle= mysqli_query($conn, $phase6_epp_tle) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">EPP/TLE</td>
            <?php 
            if(mysqli_num_rows($query_phase6_epp_tle) > 0){
            while($rows = mysqli_fetch_array($query_phase6_epp_tle)){
            ?>
            <td><input type="number" readonly name="phase6_epp_tle_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase6_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase6_finalrating_epp_tle = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '7' AND phase = '6'";
            $query_phase6_finalrating_epp_tle= mysqli_query($conn, $phase6_finalrating_epp_tle);
            if(mysqli_num_rows($query_phase6_finalrating_epp_tle) > 0){
            $final_rating = mysqli_fetch_array($query_phase6_finalrating_epp_tle);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase6_mapeh = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '6' AND student_grades.subject_id = '8'";
            $query_phase6_mapeh= mysqli_query($conn, $phase6_mapeh) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">MAPEH</td>
            <?php 
            if(mysqli_num_rows($query_phase6_mapeh) > 0){
            while($rows = mysqli_fetch_array($query_phase6_mapeh)){
            ?>
            <td><?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?></td>
            <?php }}else{?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <?php
            }
            ?>
            <?php
            $phase6_finalrating_mapeh = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '8' AND phase = '6'";
            $query_phase6_finalrating_mapeh= mysqli_query($conn, $phase6_finalrating_mapeh);
            if(mysqli_num_rows($query_phase6_finalrating_mapeh) > 0){
            $final_rating = mysqli_fetch_array($query_phase6_finalrating_mapeh);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase6_music = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '6' AND student_grades.subject_id = '9'";
            $query_phase6_music= mysqli_query($conn, $phase6_music) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Music</i></td>
            <?php 
            if(mysqli_num_rows($query_phase6_music) > 0){
            while($rows = mysqli_fetch_array($query_phase6_music)){
            ?>
            <td><input type="number" readonly name="phase6_music_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase6_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase6_finalrating_music = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '9' AND phase = '6'";
            $query_phase6_finalrating_music= mysqli_query($conn, $phase6_finalrating_music);
            if(mysqli_num_rows($query_phase6_finalrating_music) > 0){
            $final_rating = mysqli_fetch_array($query_phase6_finalrating_music);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase6_art = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '6' AND student_grades.subject_id = '10'";
            $query_phase6_art= mysqli_query($conn, $phase6_art) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Arts</i></td>
            <?php 
            if(mysqli_num_rows($query_phase6_art) > 0){
            while($rows = mysqli_fetch_array($query_phase6_art)){
            ?>
            <td><input type="number" readonly name="phase6_art_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase6_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase6_finalrating_art = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '10' AND phase = '6'";
            $query_phase6_finalrating_art= mysqli_query($conn, $phase6_finalrating_art);
            if(mysqli_num_rows($query_phase6_finalrating_art) > 0){
            $final_rating = mysqli_fetch_array($query_phase6_finalrating_art);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>

          
          <tr>
          <?php
            $phase6_pe = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '6' AND student_grades.subject_id = '11'";
            $query_phase6_pe= mysqli_query($conn, $phase6_pe) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Physical Education</i></td>
            <?php 
            if(mysqli_num_rows($query_phase6_pe) > 0){
            while($rows = mysqli_fetch_array($query_phase6_pe)){
            ?>
            <td><input type="number" readonly name="phase6_pe_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase6_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase6_finalrating_pe = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '11' AND phase = '6'";
            $query_phase6_finalrating_pe= mysqli_query($conn, $phase6_finalrating_pe);
            if(mysqli_num_rows($query_phase6_finalrating_pe) > 0){
            $final_rating = mysqli_fetch_array($query_phase6_finalrating_pe);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase6_health = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '6' AND student_grades.subject_id = '12'";
            $query_phase6_health= mysqli_query($conn, $phase6_health) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Health</i></td>
            <?php 
            if(mysqli_num_rows($query_phase6_health) > 0){
            while($rows = mysqli_fetch_array($query_phase6_health)){
            ?>
            <td><input type="number" readonly name="phase6_health_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase6_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase6_finalrating_health = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '12' AND phase = '6'";
            $query_phase6_finalrating_health= mysqli_query($conn, $phase6_finalrating_health);
            if(mysqli_num_rows($query_phase6_finalrating_health) > 0){
            $final_rating = mysqli_fetch_array($query_phase6_finalrating_health);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase6_esp = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '6' AND student_grades.subject_id = '13'";
            $query_phase6_esp= mysqli_query($conn, $phase6_esp) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Edukasyon sa Pagpapakatao</td>
            <?php 
            if(mysqli_num_rows($query_phase6_esp) > 0){
            while($rows = mysqli_fetch_array($query_phase6_esp)){
            ?>
            <td><input type="number" readonly name="phase6_esp_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase6_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase6_finalrating_esp = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '13' AND phase = '6'";
            $query_phase6_finalrating_esp= mysqli_query($conn, $phase6_finalrating_esp);
            if(mysqli_num_rows($query_phase6_finalrating_esp) > 0){
            $final_rating = mysqli_fetch_array($query_phase6_finalrating_esp);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase6_arabic_lang = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '6' AND student_grades.subject_id = '14'";
            $query_phase6_arabic_lang= mysqli_query($conn, $phase6_arabic_lang) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start">*Arabic Language</td>
            <?php 
            if(mysqli_num_rows($query_phase6_arabic_lang) > 0){
            while($rows = mysqli_fetch_array($query_phase6_arabic_lang)){
            ?>
            <td><input type="number" readonly name="phase6_arabic_lang_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase6_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase6_finalrating_arabic_lang = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '14' AND phase = '6'";
            $query_phase6_finalrating_arabic_lang= mysqli_query($conn, $phase6_finalrating_arabic_lang);
            if(mysqli_num_rows($query_phase6_finalrating_arabic_lang) > 0){
            $final_rating = mysqli_fetch_array($query_phase6_finalrating_arabic_lang);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase6_islamic_values = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '6' AND student_grades.subject_id = '15'";
            $query_phase6_islamic_values= mysqli_query($conn, $phase6_islamic_values) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start">*Islamic Values Education</td>
            <?php 
            if(mysqli_num_rows($query_phase6_islamic_values) > 0){
            while($rows = mysqli_fetch_array($query_phase6_islamic_values)){
            ?>
            <td><input type="number" readonly name="phase6_islamic_values_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase6_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase6_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase6_finalrating_islamic_values = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '15' AND phase = '6'";
            $query_phase6_finalrating_islamic_values= mysqli_query($conn, $phase6_finalrating_islamic_values);
            if(mysqli_num_rows($query_phase6_finalrating_islamic_values) > 0){
            $final_rating = mysqli_fetch_array($query_phase6_finalrating_islamic_values);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>

          
          <tr>
          <?php
            $phase6_general_average = "SELECT general_average FROM student_general_averages
            WHERE lrn = '109857060083' AND phase = '6'";
            $query_phase6_general_average = mysqli_query($conn, $phase6_general_average);
            ?>
            <td class="text-start fw-bold">General Average</td>
            <?php
            if(mysqli_num_rows($query_phase6_general_average) > 0){
              while($rows = mysqli_fetch_array($query_phase6_general_average)){
            ?>
            <td><?php if($rows['general_average'] == 0){ echo "";}else{ echo $rows['general_average'];}?></td>
            <?php
            }}else{
            ?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          <?php }?>
          </tr>
        </tbody>
      </table>

  <!-- Remedial Table PHASE 6 -->
  
        <?php
        $phase6_remedial_classes_dates = "SELECT * FROM remedial_classes
        WHERE lrn = '109857060083' AND phase = '6'";
        $query_phase6_remedial_classes_dates = mysqli_query($conn, $phase6_remedial_classes_dates);
        if(mysqli_num_rows($query_phase6_remedial_classes_dates) > 0){
          $row = mysqli_fetch_array($query_phase6_remedial_classes_dates);
          ?>
          <table class="table-condensed text-center w-100">
        <thead> 
          <tr>
            <th colspan="2">Remedial Classes</th>
            <th colspan="4">
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" disabled class="datefrom" name="phase6_date_from" value="<?php echo strftime('%Y-%m-%d', strtotime($row['date_from']));?>">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" disabled class="dateto" name="phase6_date_to" value="<?php echo strftime('%Y-%m-%d', strtotime($row['date_to']));?>">
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
        <?php
        $phase6_remedial_classes_term1 = "SELECT * FROM remedial_classes
        WHERE lrn = '109857060083' AND phase = '6' AND term = '1'";
        $phase6_remedial_classes_term1 = mysqli_query($conn, $phase6_remedial_classes_term1) or die (mysqli_error($conn));
        $remedial_classes_term1 = mysqli_fetch_array($phase6_remedial_classes_term1);
        ?>
        <tbody>
        <tr>
            <td><input type="text" readonly  class="learning-areas1" name="phase6_learning_areas1" 
            value="<?php if(empty($remedial_classes_term1['learning_areas'])){ echo "";}else {echo $remedial_classes_term1['learning_areas'];}?>"></td>
            <td><input type="number" readonly id="grade" class="final_rating1" name="phase6_final_rating1" 
            value="<?php if($remedial_classes_term1['final_rating'] == 0){ echo "";}else{ echo $remedial_classes_term1['final_rating'];}?>"></td>
            <td><input type="text" readonly  name="phase6_remedial_class_mark1" 
            value="<?php if(empty($remedial_classes_term1['remedial_class_mark'])){ echo "";}else{ echo $remedial_classes_term1['remedial_class_mark'];}?>" id=""></td>
            <td><input type="number" readonly id="grade" name="phase6_recomputed_final_grade1" 
            value="<?php if($remedial_classes_term1['recomputed_final_grade'] == 0){ echo "";}else{echo $remedial_classes_term1['recomputed_final_grade'];}?>" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly  name="phase6_remedial_remarks1" 
            value="<?php if(empty($remedial_classes_term1['remarks'])){ echo "";}else{ echo $remedial_classes_term1['remarks'];}?>" id=""></td>
          </tr>
          <?php
          $phase6_remedial_classes_term2 = "SELECT * FROM remedial_classes
          WHERE lrn = '109857060083' AND phase = '6' AND term = '2'";
          $phase6_remedial_classes_term2 = mysqli_query($conn, $phase6_remedial_classes_term2) or die (mysqli_error($conn));
          $remedial_classes_term2 = mysqli_fetch_array($phase6_remedial_classes_term2);
        ?>
          <tr>
            <td><input type="text" readonly  class="learning_areas2" name="phase6_learning_areas2"
            value="<?php if(empty($remedial_classes_term2['learning_areas'])){ echo "";}else {echo $remedial_classes_term2['learning_areas'];}?>"></td>
            <td><input type="number" readonly id="grade" class="final_rating2" name="phase6_final_rating2"
            value="<?php if($remedial_classes_term2['final_rating'] == 0){ echo "";}else{ echo $remedial_classes_term2['final_rating'];}?>"></td>
            <td><input type="text" readonly  name="phase6_remedial_class_mark2" 
            value="<?php if(empty($remedial_classes_term2['remedial_class_mark'])){ echo "";}else{ echo $remedial_classes_term2['remedial_class_mark'];}?>" id=""> </td>
            <td><input type="number" readonly id="grade" name="phase6_recomputed_final_grade2" 
            value="<?php if($remedial_classes_term2['recomputed_final_grade'] == 0){ echo "";}else{echo $remedial_classes_term2['recomputed_final_grade'];}?>" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly name="phase6_remedial_remarks2" 
            value="<?php if(empty($remedial_classes_term2['remarks'])){ echo "";}else{ echo $remedial_classes_term2['remarks'];}?>" id=""></td>
          </tr>
        </tbody>
      </table>
        <?php }else{?>
          <table class="table-condensed text-center w-100">
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" disabled class="datefrom" name="phase6_date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" disabled class="dateto" name="phase6_date_to">
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
            <td><input type="text" readonly  class="learning-areas1" name="phase6_learning_areas1"></td>
            <td><input type="number" readonly id="grade" class="final_rating1" name="phase6_final_rating1"></td>
            <td><input type="text" readonly  name="phase6_remedial_class_mark1" id=""></td>
            <td><input type="number" readonly id="grade" name="phase6_recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly  name="phase6_remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" readonly  class="learning_areas2" name="phase6_learning_areas2"></td>
            <td><input type="number" readonly id="grade" class="final_rating2" name="phase6_final_rating2"></td>
            <td><input type="text" readonly  name="phase6_remedial_class_mark2" id=""> </td>
            <td><input type="number" readonly id="grade" name="phase6_recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly  name="phase6_remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
        <?php }?>
      </div>
      </div>
      <div class="gen-container d-flex">
      <div class="form-container" style="padding:7px 7px 0 0;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <!-- PHASE 7 OF SCHOLASTIC RECORDS -->
        <?php
          $phase7_scholastic_records = "SELECT * FROM scholastic_records
          WHERE lrn = '109857060083' AND phase = '7'";
          $query_phase7_scholastic_records = mysqli_query($conn, $phase7_scholastic_records) or die (mysqli_error($conn,));
          $rows = mysqli_fetch_array($query_phase7_scholastic_records);
          ?>
        <span>
          <label>School:</label>
          <input type="text" readonly  id="text-only" name="phase7_sr_school" 
          value="<?php if(empty($rows['school'])){ echo "";}else{ echo $rows['school'];}?>" class="school">
        </span>
        <span>
          <label>School ID:</label>
          <input type="text" readonly  name="phase7_sr_school_id" 
          value="<?php if(empty($rows['school_id'])){ echo "";}else{ echo $rows['school_id'];}?>" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District:</label>
          <input type="text" readonly  class="w-50" name="phase7_sr_district" 
          value="<?php if(empty($rows['district'])){ echo "";}else{ echo $rows['district'];}?>" class="district">
        </span>
        <span>
          <label>Division:</label>
          <input type="text" readonly  class="w-50" name="phase7_sr_division" 
          value="<?php if(empty($rows['division'])){ echo "";}else{ echo $rows['division'];}?>" class="division">
        </span>
        <span class="text-end">
          <label>Region:</label>
          <input type="text" readonly  class="w-50" name="phase7_sr_region" 
          value="<?php if(empty($rows['region'])){ echo "";}else{ echo $rows['region'];}?>" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade:</label>
          <input type="number" readonly id="number-only" style="width: 20%;" name="phase7_sr_classified_as_grade" 
          value="<?php if(empty($rows['classified_as_grade'])){ echo "";}else{ echo $rows['classified_as_grade'];}?>" >
        </span>
        <span>
          <label>Section:</label>
          <input type="text" readonly  class="w-50" name="phase7_sr_section" 
          value="<?php if(empty($rows['section'])){ echo "";}else{ echo $rows['section'];}?>"> 
        </span>
        <span>
          <label>School Year:</label>
          <input type="text" readonly  class="w-50" name="phase7_sr_school_year" 
          value="<?php if(empty($rows['school_year'])){ echo "";}else{ echo $rows['school_year'];}?>">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
        <label for="">Name of Adviser:</label>
        <input type="text" readonly  id="text-only" name="phase7_sr_name_of_adviser" 
        value="<?php if(empty($rows['name_of_teacher'])){ echo "";}else{ echo $rows['name_of_teacher'];}?>">
        </span>
        <span>
          <label>Signature:</label>
          <input type="text" readonly  id="text-only" name="phase7_sr_signature" 
          value="<?php if(empty($rows['signature'])){ echo "";}else{ echo $rows['signature'];}?>" class="school_id">
        </span>
      </span>
    
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
          <th rowspan="2" style="width:40%;"><h6>Learner's Area</h6></th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
            <th rowspan="2" style="width:14%;">Remarks</th>
          </tr>
          <tr style="width: 5%;">
          
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            $phase7_mother_tounge = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '7' AND student_grades.subject_id = '1'";
            $query_phase7_mother_tounge = mysqli_query($conn, $phase7_mother_tounge) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Mother Tongue</td>
            <?php 
            if(mysqli_num_rows($query_phase7_mother_tounge) > 0){
            while($rows = mysqli_fetch_array($query_phase7_mother_tounge)){
            ?>
            <td><input type="number" readonly name="phase7_mother_tounge_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase7_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase7_finalrating_mother_tounge = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '1' AND phase = '7'";
            $query_phase7_finalrating_mother_tounge = mysqli_query($conn, $phase7_finalrating_mother_tounge);
            if(mysqli_num_rows($query_phase7_finalrating_mother_tounge) > 0){
            $final_rating = mysqli_fetch_array($query_phase7_finalrating_mother_tounge);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase7_filipino = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '7' AND student_grades.subject_id = '2'";
            $query_phase7_filipino = mysqli_query($conn, $phase7_filipino) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Filipino</td>
            <?php 
            if(mysqli_num_rows($query_phase7_filipino) > 0){
            while($rows = mysqli_fetch_array($query_phase7_filipino)){
            ?>
            <td><input type="number" readonly name="phase7_filipino_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase7_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase7_finalrating_filipino = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '2' AND phase = '7'";
            $query_phase7_finalrating_filipino = mysqli_query($conn, $phase7_finalrating_filipino);
            if(mysqli_num_rows($query_phase7_finalrating_filipino) > 0){
            $final_rating = mysqli_fetch_array($query_phase7_finalrating_filipino);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>
          <tr>
          <?php
            $phase7_english = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '7' AND student_grades.subject_id = '3'";
            $query_phase7_english = mysqli_query($conn, $phase7_english) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">English</td>
            <?php 
            if(mysqli_num_rows($query_phase7_english) > 0){
            while($rows = mysqli_fetch_array($query_phase7_english)){
            ?>
            <td><input type="number" readonly name="phase7_english_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase7_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase7_finalrating_english = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '3' AND phase = '7'";
            $query_phase7_finalrating_english = mysqli_query($conn, $phase7_finalrating_english);
            if(mysqli_num_rows($query_phase7_finalrating_english) > 0){
            $final_rating = mysqli_fetch_array($query_phase7_finalrating_english);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase7_math = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '7' AND student_grades.subject_id = '4'";
            $query_phase7_math = mysqli_query($conn, $phase7_math) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Mathematics</td>
            <?php 
            if(mysqli_num_rows($query_phase7_math) > 0){
            while($rows = mysqli_fetch_array($query_phase7_math)){
            ?>
            <td><input type="number" readonly name="phase7_math_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase7_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase7_finalrating_math = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '4' AND phase = '7'";
            $query_phase7_finalrating_math = mysqli_query($conn, $phase7_finalrating_math);
            if(mysqli_num_rows($query_phase7_finalrating_math) > 0){
            $final_rating = mysqli_fetch_array($query_phase7_finalrating_math);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase7_science = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '7' AND student_grades.subject_id = '5'";
            $query_phase7_science = mysqli_query($conn, $phase7_science) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Science</td>
            <?php 
            if(mysqli_num_rows($query_phase7_science) > 0){
            while($rows = mysqli_fetch_array($query_phase7_science)){
            ?>
            <td><input type="number" readonly name="phase7_science_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase7_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase7_finalrating_science = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '5' AND phase = '7'";
            $query_phase7_finalrating_science = mysqli_query($conn, $phase7_finalrating_science);
            if(mysqli_num_rows($query_phase7_finalrating_science) > 0){
            $final_rating = mysqli_fetch_array($query_phase7_finalrating_science);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase7_araling_panlipunan = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '7' AND student_grades.subject_id = '6'";
            $query_phase7_araling_panlipunan= mysqli_query($conn, $phase7_araling_panlipunan) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Araling Panlipunan</td>
            <?php 
            if(mysqli_num_rows($query_phase7_araling_panlipunan) > 0){
            while($rows = mysqli_fetch_array($query_phase7_araling_panlipunan)){
            ?>
            <td><input type="number" readonly name="phase7_araling_panlipunan_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase7_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase7_finalrating_araling_panlipunan = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '6' AND phase = '7'";
            $query_phase7_finalrating_araling_panlipunan= mysqli_query($conn, $phase7_finalrating_araling_panlipunan);
            if(mysqli_num_rows($query_phase7_finalrating_araling_panlipunan) > 0){
            $final_rating = mysqli_fetch_array($query_phase7_finalrating_araling_panlipunan);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase7_epp_tle = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '7' AND student_grades.subject_id = '7'";
            $query_phase7_epp_tle= mysqli_query($conn, $phase7_epp_tle) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">EPP/TLE</td>
            <?php 
            if(mysqli_num_rows($query_phase7_epp_tle) > 0){
            while($rows = mysqli_fetch_array($query_phase7_epp_tle)){
            ?>
            <td><input type="number" readonly name="phase7_epp_tle_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase7_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase7_finalrating_epp_tle = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '7' AND phase = '7'";
            $query_phase7_finalrating_epp_tle= mysqli_query($conn, $phase7_finalrating_epp_tle);
            if(mysqli_num_rows($query_phase7_finalrating_epp_tle) > 0){
            $final_rating = mysqli_fetch_array($query_phase7_finalrating_epp_tle);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase7_mapeh = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '7' AND student_grades.subject_id = '8'";
            $query_phase7_mapeh= mysqli_query($conn, $phase7_mapeh) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">MAPEH</td>
            <?php 
            if(mysqli_num_rows($query_phase7_mapeh) > 0){
            while($rows = mysqli_fetch_array($query_phase7_mapeh)){
            ?>
            <td><?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?></td>
            <?php }}else{?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <?php
            }
            ?>
            <?php
            $phase7_finalrating_mapeh = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '8' AND phase = '7'";
            $query_phase7_finalrating_mapeh= mysqli_query($conn, $phase7_finalrating_mapeh);
            if(mysqli_num_rows($query_phase7_finalrating_mapeh) > 0){
            $final_rating = mysqli_fetch_array($query_phase7_finalrating_mapeh);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase7_music = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '7' AND student_grades.subject_id = '9'";
            $query_phase7_music= mysqli_query($conn, $phase7_music) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Music</i></td>
            <?php 
            if(mysqli_num_rows($query_phase7_music) > 0){
            while($rows = mysqli_fetch_array($query_phase7_music)){
            ?>
            <td><input type="number" readonly name="phase7_music_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase7_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase7_finalrating_music = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '9' AND phase = '7'";
            $query_phase7_finalrating_music= mysqli_query($conn, $phase7_finalrating_music);
            if(mysqli_num_rows($query_phase7_finalrating_music) > 0){
            $final_rating = mysqli_fetch_array($query_phase7_finalrating_music);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase7_art = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '7' AND student_grades.subject_id = '10'";
            $query_phase7_art= mysqli_query($conn, $phase7_art) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Arts</i></td>
            <?php 
            if(mysqli_num_rows($query_phase7_art) > 0){
            while($rows = mysqli_fetch_array($query_phase7_art)){
            ?>
            <td><input type="number" readonly name="phase7_art_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase7_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase7_finalrating_art = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '10' AND phase = '7'";
            $query_phase7_finalrating_art= mysqli_query($conn, $phase7_finalrating_art);
            if(mysqli_num_rows($query_phase7_finalrating_art) > 0){
            $final_rating = mysqli_fetch_array($query_phase7_finalrating_art);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>

          
          <tr>
          <?php
            $phase7_pe = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '7' AND student_grades.subject_id = '11'";
            $query_phase7_pe= mysqli_query($conn, $phase7_pe) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Physical Education</i></td>
            <?php 
            if(mysqli_num_rows($query_phase7_pe) > 0){
            while($rows = mysqli_fetch_array($query_phase7_pe)){
            ?>
            <td><input type="number" readonly name="phase7_pe_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase7_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase7_finalrating_pe = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '11' AND phase = '7'";
            $query_phase7_finalrating_pe= mysqli_query($conn, $phase7_finalrating_pe);
            if(mysqli_num_rows($query_phase7_finalrating_pe) > 0){
            $final_rating = mysqli_fetch_array($query_phase7_finalrating_pe);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase7_health = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '7' AND student_grades.subject_id = '12'";
            $query_phase7_health= mysqli_query($conn, $phase7_health) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Health</i></td>
            <?php 
            if(mysqli_num_rows($query_phase7_health) > 0){
            while($rows = mysqli_fetch_array($query_phase7_health)){
            ?>
            <td><input type="number" readonly name="phase7_health_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase7_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase7_finalrating_health = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '12' AND phase = '7'";
            $query_phase7_finalrating_health= mysqli_query($conn, $phase7_finalrating_health);
            if(mysqli_num_rows($query_phase7_finalrating_health) > 0){
            $final_rating = mysqli_fetch_array($query_phase7_finalrating_health);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase7_esp = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '7' AND student_grades.subject_id = '13'";
            $query_phase7_esp= mysqli_query($conn, $phase7_esp) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Edukasyon sa Pagpapakatao</td>
            <?php 
            if(mysqli_num_rows($query_phase7_esp) > 0){
            while($rows = mysqli_fetch_array($query_phase7_esp)){
            ?>
            <td><input type="number" readonly name="phase7_esp_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase7_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase7_finalrating_esp = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '13' AND phase = '7'";
            $query_phase7_finalrating_esp= mysqli_query($conn, $phase7_finalrating_esp);
            if(mysqli_num_rows($query_phase7_finalrating_esp) > 0){
            $final_rating = mysqli_fetch_array($query_phase7_finalrating_esp);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase7_arabic_lang = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '7' AND student_grades.subject_id = '14'";
            $query_phase7_arabic_lang= mysqli_query($conn, $phase7_arabic_lang) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start">*Arabic Language</td>
            <?php 
            if(mysqli_num_rows($query_phase7_arabic_lang) > 0){
            while($rows = mysqli_fetch_array($query_phase7_arabic_lang)){
            ?>
            <td><input type="number" readonly name="phase7_arabic_lang_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase7_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase7_finalrating_arabic_lang = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '14' AND phase = '7'";
            $query_phase7_finalrating_arabic_lang= mysqli_query($conn, $phase7_finalrating_arabic_lang);
            if(mysqli_num_rows($query_phase7_finalrating_arabic_lang) > 0){
            $final_rating = mysqli_fetch_array($query_phase7_finalrating_arabic_lang);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase7_islamic_values = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '7' AND student_grades.subject_id = '15'";
            $query_phase7_islamic_values= mysqli_query($conn, $phase7_islamic_values) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start">*Islamic Values Education</td>
            <?php 
            if(mysqli_num_rows($query_phase7_islamic_values) > 0){
            while($rows = mysqli_fetch_array($query_phase7_islamic_values)){
            ?>
            <td><input type="number" readonly name="phase7_islamic_values_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase7_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase7_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase7_finalrating_islamic_values = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '15' AND phase = '7'";
            $query_phase7_finalrating_islamic_values= mysqli_query($conn, $phase7_finalrating_islamic_values);
            if(mysqli_num_rows($query_phase7_finalrating_islamic_values) > 0){
            $final_rating = mysqli_fetch_array($query_phase7_finalrating_islamic_values);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>

          
          <tr>
          <?php
            $phase7_general_average = "SELECT general_average FROM student_general_averages
            WHERE lrn = '109857060083' AND phase = '7'";
            $query_phase7_general_average = mysqli_query($conn, $phase7_general_average);
            ?>
            <td class="text-start fw-bold">General Average</td>
            <?php
            if(mysqli_num_rows($query_phase7_general_average) > 0){
              while($rows = mysqli_fetch_array($query_phase7_general_average)){
            ?>
            <td><?php if($rows['general_average'] == 0){ echo "";}else{ echo $rows['general_average'];}?></td>
            <?php
            }}else{
            ?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          <?php }?>
          </tr>
        </tbody>
      </table>

  <!-- Remedial Table PHASE 7 -->
  
        <?php
        $phase7_remedial_classes_dates = "SELECT * FROM remedial_classes
        WHERE lrn = '109857060083' AND phase = '7'";
        $query_phase7_remedial_classes_dates = mysqli_query($conn, $phase7_remedial_classes_dates);
        if(mysqli_num_rows($query_phase7_remedial_classes_dates) > 0){
          $row = mysqli_fetch_array($query_phase7_remedial_classes_dates);
          ?>
          <table class="table-condensed text-center w-100">
        <thead> 
          <tr>
            <th colspan="2">Remedial Classes</th>
            <th colspan="4">
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" disabled class="datefrom" name="phase7_date_from" value="<?php echo strftime('%Y-%m-%d', strtotime($row['date_from']));?>">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" disabled class="dateto" name="phase7_date_to" value="<?php echo strftime('%Y-%m-%d', strtotime($row['date_to']));?>">
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
        <?php
        $phase7_remedial_classes_term1 = "SELECT * FROM remedial_classes
        WHERE lrn = '109857060083' AND phase = '7' AND term = '1'";
        $phase7_remedial_classes_term1 = mysqli_query($conn, $phase7_remedial_classes_term1) or die (mysqli_error($conn));
        $remedial_classes_term1 = mysqli_fetch_array($phase7_remedial_classes_term1);
        ?>
        <tbody>
        <tr>
            <td><input type="text" readonly  class="learning-areas1" name="phase7_learning_areas1" 
            value="<?php if(empty($remedial_classes_term1['learning_areas'])){ echo "";}else {echo $remedial_classes_term1['learning_areas'];}?>"></td>
            <td><input type="number" readonly id="grade" class="final_rating1" name="phase7_final_rating1" 
            value="<?php if($remedial_classes_term1['final_rating'] == 0){ echo "";}else{ echo $remedial_classes_term1['final_rating'];}?>"></td>
            <td><input type="text" readonly  name="phase7_remedial_class_mark1" 
            value="<?php if(empty($remedial_classes_term1['remedial_class_mark'])){ echo "";}else{ echo $remedial_classes_term1['remedial_class_mark'];}?>" id=""></td>
            <td><input type="number" readonly id="grade" name="phase7_recomputed_final_grade1" 
            value="<?php if($remedial_classes_term1['recomputed_final_grade'] == 0){ echo "";}else{echo $remedial_classes_term1['recomputed_final_grade'];}?>" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly  name="phase7_remedial_remarks1" 
            value="<?php if(empty($remedial_classes_term1['remarks'])){ echo "";}else{ echo $remedial_classes_term1['remarks'];}?>" id=""></td>
          </tr>
          <?php
          $phase7_remedial_classes_term2 = "SELECT * FROM remedial_classes
          WHERE lrn = '109857060083' AND phase = '7' AND term = '2'";
          $phase7_remedial_classes_term2 = mysqli_query($conn, $phase7_remedial_classes_term2) or die (mysqli_error($conn));
          $remedial_classes_term2 = mysqli_fetch_array($phase7_remedial_classes_term2);
        ?>
          <tr>
            <td><input type="text" readonly  class="learning_areas2" name="phase7_learning_areas2"
            value="<?php if(empty($remedial_classes_term2['learning_areas'])){ echo "";}else {echo $remedial_classes_term2['learning_areas'];}?>"></td>
            <td><input type="number" readonly id="grade" class="final_rating2" name="phase7_final_rating2"
            value="<?php if($remedial_classes_term2['final_rating'] == 0){ echo "";}else{ echo $remedial_classes_term2['final_rating'];}?>"></td>
            <td><input type="text" readonly  name="phase7_remedial_class_mark2" 
            value="<?php if(empty($remedial_classes_term2['remedial_class_mark'])){ echo "";}else{ echo $remedial_classes_term2['remedial_class_mark'];}?>" id=""> </td>
            <td><input type="number" readonly id="grade" name="phase7_recomputed_final_grade2" 
            value="<?php if($remedial_classes_term2['recomputed_final_grade'] == 0){ echo "";}else{echo $remedial_classes_term2['recomputed_final_grade'];}?>" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly name="phase7_remedial_remarks2" 
            value="<?php if(empty($remedial_classes_term2['remarks'])){ echo "";}else{ echo $remedial_classes_term2['remarks'];}?>" id=""></td>
          </tr>
        </tbody>
      </table>
        <?php }else{?>
          <table class="table-condensed text-center w-100">
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" disabled class="datefrom" name="phase7_date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" disabled class="dateto" name="phase7_date_to">
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
            <td><input type="text" readonly  class="learning-areas1" name="phase7_learning_areas1"></td>
            <td><input type="number" readonly id="grade" class="final_rating1" name="phase7_final_rating1"></td>
            <td><input type="text" readonly  name="phase7_remedial_class_mark1" id=""></td>
            <td><input type="number" readonly id="grade" name="phase7_recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly  name="phase7_remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" readonly  class="learning_areas2" name="phase7_learning_areas2"></td>
            <td><input type="number" readonly id="grade" class="final_rating2" name="phase7_final_rating2"></td>
            <td><input type="text" readonly  name="phase7_remedial_class_mark2" id=""> </td>
            <td><input type="number" readonly id="grade" name="phase7_recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly name="phase7_remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
        <?php }?>
      </div>
      <div class="form-container" style="padding: 7px 0 0 7px;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <!-- PHASE 8 OF SCHOLASTIC RECORDS -->
        <?php
          $phase8_scholastic_records = "SELECT * FROM scholastic_records
          WHERE lrn = '109857060083' AND phase = '8'";
          $query_phase8_scholastic_records = mysqli_query($conn, $phase8_scholastic_records) or die (mysqli_error($conn,));
          $rows = mysqli_fetch_array($query_phase8_scholastic_records);
          ?>
        <span>
          <label>School:</label>
          <input type="text" readonly  id="text-only" name="phase8_sr_school" 
          value="<?php if(empty($rows['school'])){ echo "";}else{ echo $rows['school'];}?>" class="school">
        </span>
        <span>
          <label>School ID:</label>
          <input type="text" readonly  name="phase8_sr_school_id" 
          value="<?php if(empty($rows['school_id'])){ echo "";}else{ echo $rows['school_id'];}?>" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District:</label>
          <input type="text" readonly  class="w-50" name="phase8_sr_district" 
          value="<?php if(empty($rows['district'])){ echo "";}else{ echo $rows['district'];}?>" class="district">
        </span>
        <span>
          <label>Division:</label>
          <input type="text" readonly  class="w-50" name="phase8_sr_division" 
          value="<?php if(empty($rows['division'])){ echo "";}else{ echo $rows['division'];}?>" class="division">
        </span>
        <span class="text-end">
          <label>Region:</label>
          <input type="text" readonly  class="w-50" name="phase8_sr_region" 
          value="<?php if(empty($rows['region'])){ echo "";}else{ echo $rows['region'];}?>" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade:</label>
          <input type="number" readonly id="number-only" style="width: 20%;" name="phase8_sr_classified_as_grade" 
          value="<?php if(empty($rows['classified_as_grade'])){ echo "";}else{ echo $rows['classified_as_grade'];}?>" >
        </span>
        <span>
          <label>Section:</label>
          <input type="text" readonly  class="w-50" name="phase8_sr_section" 
          value="<?php if(empty($rows['section'])){ echo "";}else{ echo $rows['section'];}?>"> 
        </span>
        <span>
          <label>School Year:</label>
          <input type="text" readonly  class="w-50" name="phase8_sr_school_year" 
          value="<?php if(empty($rows['school_year'])){ echo "";}else{ echo $rows['school_year'];}?>">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
        <label for="">Name of Adviser:</label>
        <input type="text" readonly  id="text-only" name="phase8_sr_name_of_adviser" 
        value="<?php if(empty($rows['name_of_teacher'])){ echo "";}else{ echo $rows['name_of_teacher'];}?>">
        </span>
        <span>
          <label>Signature:</label>
          <input type="text" readonly  id="text-only" name="phase8_sr_signature" 
          value="<?php if(empty($rows['signature'])){ echo "";}else{ echo $rows['signature'];}?>" class="school_id">
        </span>
      </span>
    
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
          <th rowspan="2" style="width:40%;"><h6>Learner's Area</h6></th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
            <th rowspan="2" style="width:14%;">Remarks</th>
          </tr>
          <tr style="width: 5%;">
          
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            $phase8_mother_tounge = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '8' AND student_grades.subject_id = '1'";
            $query_phase8_mother_tounge = mysqli_query($conn, $phase8_mother_tounge) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Mother Tongue</td>
            <?php 
            if(mysqli_num_rows($query_phase8_mother_tounge) > 0){
            while($rows = mysqli_fetch_array($query_phase8_mother_tounge)){
            ?>
            <td><input type="number" readonly name="phase8_mother_tounge_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase8_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase8_finalrating_mother_tounge = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '1' AND phase = '8'";
            $query_phase8_finalrating_mother_tounge = mysqli_query($conn, $phase8_finalrating_mother_tounge);
            if(mysqli_num_rows($query_phase8_finalrating_mother_tounge) > 0){
            $final_rating = mysqli_fetch_array($query_phase8_finalrating_mother_tounge);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase8_filipino = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '8' AND student_grades.subject_id = '2'";
            $query_phase8_filipino = mysqli_query($conn, $phase8_filipino) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Filipino</td>
            <?php 
            if(mysqli_num_rows($query_phase8_filipino) > 0){
            while($rows = mysqli_fetch_array($query_phase8_filipino)){
            ?>
            <td><input type="number" readonly name="phase8_filipino_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase8_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase8_finalrating_filipino = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '2' AND phase = '8'";
            $query_phase8_finalrating_filipino = mysqli_query($conn, $phase8_finalrating_filipino);
            if(mysqli_num_rows($query_phase8_finalrating_filipino) > 0){
            $final_rating = mysqli_fetch_array($query_phase8_finalrating_filipino);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>
          <tr>
          <?php
            $phase8_english = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '8' AND student_grades.subject_id = '3'";
            $query_phase8_english = mysqli_query($conn, $phase8_english) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">English</td>
            <?php 
            if(mysqli_num_rows($query_phase8_english) > 0){
            while($rows = mysqli_fetch_array($query_phase8_english)){
            ?>
            <td><input type="number" readonly name="phase8_english_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase8_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase8_finalrating_english = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '3' AND phase = '8'";
            $query_phase8_finalrating_english = mysqli_query($conn, $phase8_finalrating_english);
            if(mysqli_num_rows($query_phase8_finalrating_english) > 0){
            $final_rating = mysqli_fetch_array($query_phase8_finalrating_english);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase8_math = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '8' AND student_grades.subject_id = '4'";
            $query_phase8_math = mysqli_query($conn, $phase8_math) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Mathematics</td>
            <?php 
            if(mysqli_num_rows($query_phase8_math) > 0){
            while($rows = mysqli_fetch_array($query_phase8_math)){
            ?>
            <td><input type="number" readonly name="phase8_math_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase8_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase8_finalrating_math = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '4' AND phase = '8'";
            $query_phase8_finalrating_math = mysqli_query($conn, $phase8_finalrating_math);
            if(mysqli_num_rows($query_phase8_finalrating_math) > 0){
            $final_rating = mysqli_fetch_array($query_phase8_finalrating_math);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase8_science = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '8' AND student_grades.subject_id = '5'";
            $query_phase8_science = mysqli_query($conn, $phase8_science) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Science</td>
            <?php 
            if(mysqli_num_rows($query_phase8_science) > 0){
            while($rows = mysqli_fetch_array($query_phase8_science)){
            ?>
            <td><input type="number" readonly name="phase8_science_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase8_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase8_finalrating_science = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '5' AND phase = '8'";
            $query_phase8_finalrating_science = mysqli_query($conn, $phase8_finalrating_science);
            if(mysqli_num_rows($query_phase8_finalrating_science) > 0){
            $final_rating = mysqli_fetch_array($query_phase8_finalrating_science);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase8_araling_panlipunan = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '8' AND student_grades.subject_id = '6'";
            $query_phase8_araling_panlipunan= mysqli_query($conn, $phase8_araling_panlipunan) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Araling Panlipunan</td>
            <?php 
            if(mysqli_num_rows($query_phase8_araling_panlipunan) > 0){
            while($rows = mysqli_fetch_array($query_phase8_araling_panlipunan)){
            ?>
            <td><input type="number" readonly name="phase8_araling_panlipunan_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase8_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase8_finalrating_araling_panlipunan = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '6' AND phase = '8'";
            $query_phase8_finalrating_araling_panlipunan= mysqli_query($conn, $phase8_finalrating_araling_panlipunan);
            if(mysqli_num_rows($query_phase8_finalrating_araling_panlipunan) > 0){
            $final_rating = mysqli_fetch_array($query_phase8_finalrating_araling_panlipunan);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase8_epp_tle = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '8' AND student_grades.subject_id = '7'";
            $query_phase8_epp_tle= mysqli_query($conn, $phase8_epp_tle) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">EPP/TLE</td>
            <?php 
            if(mysqli_num_rows($query_phase8_epp_tle) > 0){
            while($rows = mysqli_fetch_array($query_phase8_epp_tle)){
            ?>
            <td><input type="number" readonly name="phase8_epp_tle_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase8_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase8_finalrating_epp_tle = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '7' AND phase = '8'";
            $query_phase8_finalrating_epp_tle= mysqli_query($conn, $phase8_finalrating_epp_tle);
            if(mysqli_num_rows($query_phase8_finalrating_epp_tle) > 0){
            $final_rating = mysqli_fetch_array($query_phase8_finalrating_epp_tle);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase8_mapeh = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '8' AND student_grades.subject_id = '8'";
            $query_phase8_mapeh= mysqli_query($conn, $phase8_mapeh) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">MAPEH</td>
            <?php 
            if(mysqli_num_rows($query_phase8_mapeh) > 0){
            while($rows = mysqli_fetch_array($query_phase8_mapeh)){
            ?>
            <td><?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?></td>
            <?php }}else{?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <?php
            }
            ?>
            <?php
            $phase8_finalrating_mapeh = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '8' AND phase = '8'";
            $query_phase8_finalrating_mapeh= mysqli_query($conn, $phase8_finalrating_mapeh);
            if(mysqli_num_rows($query_phase8_finalrating_mapeh) > 0){
            $final_rating = mysqli_fetch_array($query_phase8_finalrating_mapeh);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase8_music = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '8' AND student_grades.subject_id = '9'";
            $query_phase8_music= mysqli_query($conn, $phase8_music) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Music</i></td>
            <?php 
            if(mysqli_num_rows($query_phase8_music) > 0){
            while($rows = mysqli_fetch_array($query_phase8_music)){
            ?>
            <td><input type="number" readonly name="phase8_music_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase8_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase8_finalrating_music = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '9' AND phase = '8'";
            $query_phase8_finalrating_music= mysqli_query($conn, $phase8_finalrating_music);
            if(mysqli_num_rows($query_phase8_finalrating_music) > 0){
            $final_rating = mysqli_fetch_array($query_phase8_finalrating_music);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase8_art = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '8' AND student_grades.subject_id = '10'";
            $query_phase8_art= mysqli_query($conn, $phase8_art) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Arts</i></td>
            <?php 
            if(mysqli_num_rows($query_phase8_art) > 0){
            while($rows = mysqli_fetch_array($query_phase8_art)){
            ?>
            <td><input type="number" readonly name="phase8_art_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase8_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase8_finalrating_art = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '10' AND phase = '8'";
            $query_phase8_finalrating_art= mysqli_query($conn, $phase8_finalrating_art);
            if(mysqli_num_rows($query_phase8_finalrating_art) > 0){
            $final_rating = mysqli_fetch_array($query_phase8_finalrating_art);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>

          
          <tr>
          <?php
            $phase8_pe = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '8' AND student_grades.subject_id = '11'";
            $query_phase8_pe= mysqli_query($conn, $phase8_pe) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Physical Education</i></td>
            <?php 
            if(mysqli_num_rows($query_phase8_pe) > 0){
            while($rows = mysqli_fetch_array($query_phase8_pe)){
            ?>
            <td><input type="number" readonly name="phase8_pe_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase8_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase8_finalrating_pe = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '11' AND phase = '8'";
            $query_phase8_finalrating_pe= mysqli_query($conn, $phase8_finalrating_pe);
            if(mysqli_num_rows($query_phase8_finalrating_pe) > 0){
            $final_rating = mysqli_fetch_array($query_phase8_finalrating_pe);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase8_health = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '8' AND student_grades.subject_id = '12'";
            $query_phase8_health= mysqli_query($conn, $phase8_health) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start"><i>Health</i></td>
            <?php 
            if(mysqli_num_rows($query_phase8_health) > 0){
            while($rows = mysqli_fetch_array($query_phase8_health)){
            ?>
            <td><input type="number" readonly name="phase8_health_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase8_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase8_finalrating_health = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '12' AND phase = '8'";
            $query_phase8_finalrating_health= mysqli_query($conn, $phase8_finalrating_health);
            if(mysqli_num_rows($query_phase8_finalrating_health) > 0){
            $final_rating = mysqli_fetch_array($query_phase8_finalrating_health);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase8_esp = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '8' AND student_grades.subject_id = '13'";
            $query_phase8_esp= mysqli_query($conn, $phase8_esp) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Edukasyon sa Pagpapakatao</td>
            <?php 
            if(mysqli_num_rows($query_phase8_esp) > 0){
            while($rows = mysqli_fetch_array($query_phase8_esp)){
            ?>
            <td><input type="number" readonly name="phase8_esp_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase8_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase8_finalrating_esp = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '13' AND phase = '8'";
            $query_phase8_finalrating_esp= mysqli_query($conn, $phase8_finalrating_esp);
            if(mysqli_num_rows($query_phase8_finalrating_esp) > 0){
            $final_rating = mysqli_fetch_array($query_phase8_finalrating_esp);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase8_arabic_lang = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '8' AND student_grades.subject_id = '14'";
            $query_phase8_arabic_lang= mysqli_query($conn, $phase8_arabic_lang) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start">*Arabic Language</td>
            <?php 
            if(mysqli_num_rows($query_phase8_arabic_lang) > 0){
            while($rows = mysqli_fetch_array($query_phase8_arabic_lang)){
            ?>
            <td><input type="number" readonly name="phase8_arabic_lang_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase8_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase8_finalrating_arabic_lang = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '14' AND phase = '8'";
            $query_phase8_finalrating_arabic_lang= mysqli_query($conn, $phase8_finalrating_arabic_lang);
            if(mysqli_num_rows($query_phase8_finalrating_arabic_lang) > 0){
            $final_rating = mysqli_fetch_array($query_phase8_finalrating_arabic_lang);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>


          <tr>
          <?php
            $phase8_islamic_values = "SELECT * FROM student_grades
            WHERE student_grades.lrn = '109857060083' 
            AND student_grades.phase = '8' AND student_grades.subject_id = '15'";
            $query_phase8_islamic_values= mysqli_query($conn, $phase8_islamic_values) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start">*Islamic Values Education</td>
            <?php 
            if(mysqli_num_rows($query_phase8_islamic_values) > 0){
            while($rows = mysqli_fetch_array($query_phase8_islamic_values)){
            ?>
            <td><input type="number" readonly name="phase8_islamic_values_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }}else{?>
            <td><input type="number" readonly name="phase8_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" readonly name="phase8_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
            <?php
            }
            ?>
            <?php
            $phase8_finalrating_islamic_values = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '15' AND phase = '8'";
            $query_phase8_finalrating_islamic_values= mysqli_query($conn, $phase8_finalrating_islamic_values);
            if(mysqli_num_rows($query_phase8_finalrating_islamic_values) > 0){
            $final_rating = mysqli_fetch_array($query_phase8_finalrating_islamic_values);
            ?>
            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
            <td><?php if(empty($final_rating['remarks'])){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
            <?php }else{?>
            <td></td>
            <td></td>
          <?php } ?>
          </tr>

          
          <tr>
          <?php
            $phase8_general_average = "SELECT general_average FROM student_general_averages
            WHERE lrn = '109857060083' AND phase = '8'";
            $query_phase8_general_average = mysqli_query($conn, $phase8_general_average);
            ?>
            <td class="text-start fw-bold">General Average</td>
            <?php
            if(mysqli_num_rows($query_phase8_general_average) > 0){
              while($rows = mysqli_fetch_array($query_phase8_general_average)){
            ?>
            <td><?php if($rows['general_average'] == 0){ echo "";}else{ echo $rows['general_average'];}?></td>
            <?php
            }}else{
            ?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          <?php }?>
          </tr>
        </tbody>
      </table>

  <!-- Remedial Table PHASE 8 -->
  
        <?php
        $phase8_remedial_classes_dates = "SELECT * FROM remedial_classes
        WHERE lrn = '109857060083' AND phase = '8'";
        $query_phase8_remedial_classes_dates = mysqli_query($conn, $phase8_remedial_classes_dates);
        if(mysqli_num_rows($query_phase8_remedial_classes_dates) > 0){
          $row = mysqli_fetch_array($query_phase8_remedial_classes_dates);
          ?>
          <table class="table-condensed text-center w-100">
        <thead> 
          <tr>
            <th colspan="2">Remedial Classes</th>
            <th colspan="4">
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" disabled class="datefrom" name="phase8_date_from" value="<?php echo strftime('%Y-%m-%d', strtotime($row['date_from']));?>">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" disabled class="dateto" name="phase8_date_to" value="<?php echo strftime('%Y-%m-%d', strtotime($row['date_to']));?>">
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
        <?php
        $phase8_remedial_classes_term1 = "SELECT * FROM remedial_classes
        WHERE lrn = '109857060083' AND phase = '8' AND term = '1'";
        $phase8_remedial_classes_term1 = mysqli_query($conn, $phase8_remedial_classes_term1) or die (mysqli_error($conn));
        $remedial_classes_term1 = mysqli_fetch_array($phase8_remedial_classes_term1);
        ?>
        <tbody>
        <tr>
            <td><input type="text" readonly  class="learning-areas1" name="phase8_learning_areas1" 
            value="<?php if(empty($remedial_classes_term1['learning_areas'])){ echo "";}else {echo $remedial_classes_term1['learning_areas'];}?>"></td>
            <td><input type="number" readonly id="grade" class="final_rating1" name="phase8_final_rating1" 
            value="<?php if($remedial_classes_term1['final_rating'] == 0){ echo "";}else{ echo $remedial_classes_term1['final_rating'];}?>"></td>
            <td><input type="text" readonly  name="phase8_remedial_class_mark1" 
            value="<?php if(empty($remedial_classes_term1['remedial_class_mark'])){ echo "";}else{ echo $remedial_classes_term1['remedial_class_mark'];}?>" id=""></td>
            <td><input type="number" readonly id="grade" name="phase8_recomputed_final_grade1" 
            value="<?php if($remedial_classes_term1['recomputed_final_grade'] == 0){ echo "";}else{echo $remedial_classes_term1['recomputed_final_grade'];}?>" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly  name="phase8_remedial_remarks1" 
            value="<?php if(empty($remedial_classes_term1['remarks'])){ echo "";}else{ echo $remedial_classes_term1['remarks'];}?>" id=""></td>
          </tr>
          <?php
          $phase8_remedial_classes_term2 = "SELECT * FROM remedial_classes
          WHERE lrn = '109857060083' AND phase = '8' AND term = '2'";
          $phase8_remedial_classes_term2 = mysqli_query($conn, $phase8_remedial_classes_term2) or die (mysqli_error($conn));
          $remedial_classes_term2 = mysqli_fetch_array($phase8_remedial_classes_term2);
        ?>
          <tr>
            <td><input type="text" readonly  class="learning_areas2" name="phase8_learning_areas2"
            value="<?php if(empty($remedial_classes_term2['learning_areas'])){ echo "";}else {echo $remedial_classes_term2['learning_areas'];}?>"></td>
            <td><input type="number" readonly id="grade" class="final_rating2" name="phase8_final_rating2"
            value="<?php if($remedial_classes_term2['final_rating'] == 0){ echo "";}else{ echo $remedial_classes_term2['final_rating'];}?>"></td>
            <td><input type="text" readonly  name="phase8_remedial_class_mark2" 
            value="<?php if(empty($remedial_classes_term2['remedial_class_mark'])){ echo "";}else{ echo $remedial_classes_term2['remedial_class_mark'];}?>" id=""> </td>
            <td><input type="number" readonly id="grade" name="phase8_recomputed_final_grade2" 
            value="<?php if($remedial_classes_term2['recomputed_final_grade'] == 0){ echo "";}else{echo $remedial_classes_term2['recomputed_final_grade'];}?>" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly name="phase8_remedial_remarks2" 
            value="<?php if(empty($remedial_classes_term2['remarks'])){ echo "";}else{ echo $remedial_classes_term2['remarks'];}?>" id=""></td>
          </tr>
        </tbody>
      </table>
        <?php }else{?>
          <table class="table-condensed text-center w-100">
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" disabled class="datefrom" name="phase8_date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" disabled class="dateto" name="phase8_date_to">
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
            <td><input type="text" readonly  class="learning-areas1" name="phase8_learning_areas1"></td>
            <td><input type="number" readonly id="grade" class="final_rating1" name="phase8_final_rating1"></td>
            <td><input type="text" readonly  name="phase8_remedial_class_mark1" id=""></td>
            <td><input type="number" readonly id="grade" name="phase8_recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly  name="phase8_remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" readonly  class="learning_areas2" name="phase8_learning_areas2"></td>
            <td><input type="number" readonly id="grade" class="final_rating2" name="phase8_final_rating2"></td>
            <td><input type="text" readonly  name="phase8_remedial_class_mark2" id=""> </td>
            <td><input type="number" readonly id="grade" name="phase8_recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" readonly name="phase8_remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
        <?php }?>
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
                        <input type="text" name="" id="">
                    </span>
                    <span class="hstack d-flex justify-content-end align-items-end">
                        <label>with LRN</label>
                        <input type="text" name="" id="">
                    </span>
                    <span>
                        <label>and that he/she is eligible for admission to Grade </label>
                        <input type="text" size="4" style="width: auto;">
                    </span> 
                </span>
                <span class="d-flex flex-row justify-content-start align-items-center px-lg-4">
                    <span class="d-flex flex-row align-items-center justify-content-end">
                        <label>School Name: </label>
                        <input type="text" style="width: auto;" name="" id="">
                    </span>
                    <span class="hstack d-flex justify-content-center align-items-end">
                        <label>School ID</label>
                        <input type="text" name="" id="">
                    </span>
                    <span>
                        <label>Division</label>
                        <input type="text" size="4">
                    </span> 
                    <span class="hstack d-flex justify-content-center align-items-end">
                        <label>Last School Year Attended:</label>
                        <input type="text" name="" id="">
                    </span>
                </span>
                <div class="container pt-5">
                    <div class="row ">
                        <div class="col-3">
                            <span class="vstack d-flex flex-column-reverse text-center">
                                <label for="" class="">Date</label>
                                <input type="text">
                            </span>
                        </div>
                        <div class="col-5">
                            <span class="vstack d-flex flex-column-reverse">
                                <label for="" class="text-center">Name of Principal/School Head over Printed Name</label>
                                <input type="text">
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
                        <input type="text" name="" id="">
                    </span>
                    <span class="hstack d-flex justify-content-end align-items-end">
                        <label>with LRN</label>
                        <input type="text" name="" id="">
                    </span>
                    <span>
                        <label>and that he/she is eligible for admission to Grade </label>
                        <input type="text" size="4" style="width: auto;">
                    </span> 
                </span>
                <span class="d-flex flex-row justify-content-start align-items-center px-lg-4">
                    <span class="d-flex flex-row align-items-center justify-content-end">
                        <label>School Name: </label>
                        <input type="text" style="width: auto;" name="" id="">
                    </span>
                    <span class="hstack d-flex justify-content-center align-items-end">
                        <label>School ID</label>
                        <input type="text" name="" id="">
                    </span>
                    <span>
                        <label>Division</label>
                        <input type="text" size="4">
                    </span> 
                    <span class="hstack d-flex justify-content-center align-items-end">
                        <label>Last School Year Attended:</label>
                        <input type="text" name="" id="">
                    </span>
                </span>
                <div class="container pt-5">
                    <div class="row ">
                        <div class="col-3">
                            <span class="vstack d-flex flex-column-reverse text-center">
                                <label for="" class="">Date</label>
                                <input type="text">
                            </span>
                        </div>
                        <div class="col-5">
                            <span class="vstack d-flex flex-column-reverse">
                                <label for="" class="text-center">Name of Principal/School Head over Printed Name</label>
                                <input type="text">
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
                        <input type="text" name="" id="">
                    </span>
                    <span class="hstack d-flex justify-content-end align-items-end">
                        <label>with LRN</label>
                        <input type="text" name="" id="">
                    </span>
                    <span>
                        <label>and that he/she is eligible for admission to Grade </label>
                        <input type="text" size="4" style="width: auto;">
                    </span> 
                </span>
                <span class="d-flex flex-row justify-content-between align-items-center px-lg-4">
                    <span class="d-flex flex-row align-items-center justify-content-end">
                        <label>School Name: </label>
                        <input type="text" style="width: auto;" name="" id="">
                    </span>
                    <span class="hstack d-flex justify-content-center align-items-end">
                        <label>School ID</label>
                        <input type="text" name="" id="">
                    </span>
                    <span>
                        <label>Division</label>
                        <input type="text" size="4">
                    </span> 
                    <span class="hstack d-flex justify-content-center align-items-end">
                        <label>Last School Year Attended:</label>
                        <input type="text" name="" id="">
                    </span>
                </span>
                <div class="container pt-5">
                    <div class="row ">
                        <div class="col-3">
                            <span class="vstack d-flex flex-column-reverse text-center">
                                <label for="" class="">Date</label>
                                <input type="text">
                            </span>
                        </div>
                        <div class="col-5">
                            <span class="vstack d-flex flex-column-reverse">
                                <label for="" class="text-center">Name of Principal/School Head over Printed Name</label>
                                <input type="text">
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
    </fieldset>
      <!-- -->
  </form>
</div>
<!-- <script src="src/js/stepper.js"></script> -->
<script src="src/js/loading_screen.js"></script>
<script src="src/js/number_limitation.js"></script>
<?php
include 'includes/footer.php';
?>