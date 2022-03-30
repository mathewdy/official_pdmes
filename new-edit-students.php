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



?>

<?php include 'includes/header.php';?>
<link rel="stylesheet" href="src/css/phase-style.css">
<?php include 'includes/topnav.php';?>

<div class="container-xl bg-white">
    <form novalidate action="new-edit-students.php" id="up_form" class="pb-3 pt-2 mx-0" method="POST">
    <fieldset>
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
                    <input type="text"  name="last_name" value="<?php echo " " . $rows['last_name'];?>" required>    
            </span>
            <span class="hstack d-flex align-items-center">
                <label for="">FIRST NAME:</label>
                <input type="text" name="first_name" value="<?php echo " " . $rows['first_name'];?>" required>   
            </span>
            <span class="hstack d-flex align-items-center" >
                <label for="">NAME EXTN. (Jr,I,II): </label>
                <input type="text" name="suffix_name" value="<?php echo " " . $rows['suffix'];?>">
            </span>
            <span class="hstack d-flex justify-content-end align-items-center">
                <label for="">MIDDLE NAME: </label>
                <input type="text" name="middle_name" value="<?php echo " " . $rows['middle_name'];?>" required>                    
            </span>
        </section>
        <section class="line-2 d-flex justify-content-between">
            <span class="hstack d-flex align-items-end w-75">
                <label for="">Learner Reference Number (LRN):</label>
                <input type="text" style="margin: 0 1em 0 0; width:30%;" name="lrn" value="<?php echo " " . $rows['lrn'];?>" required>

                <label for="">Birthdate (mm/dd/yyyy):</label>
                <input type="date" name="birthday" value="<?php echo strftime('%Y-%m-%d', strtotime($rows['birth_date']));?>" required>  
            </span>
            <span class="hstack d-flex align-items-center w-25">
            <label for="">Sex:</label>
                <select class=" w-100" name="sex" id="" required>
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
                    <input type="checkbox" class="form-check-input" name="credential_presented[]" value="Kinder Progress Report"
                    <?php echo (in_array("Kinder Progress Report", $credentials)? 'checked':'') ?>>
                </span>
                <span class="form-check form-check-inline">
                    <label class="form-check-label">ECCD Checklist </label>
                    <input type="checkbox" class="form-check-input" name="credential_presented[]" value="ECCD Checklist"
                    <?php echo (in_array("ECCD Checklist", $credentials)? 'checked':'') ?>>
                </span>
                <span class="form-check form-check-inline">
                    <label class="form-check-label">Kindergarden Certificate of Completion </label>
                    <input type="checkbox" class="form-check-input" name="credential_presented[]" value="Kindergarden Certificate of Completion"
                    <?php echo (in_array("Kindergarden Certificate of Completion", $credentials)? 'checked':'') ?>>
                </span>
            </div>
            <section class="cred-info d-flex flex-row justify-content-between">
                <span class="hstack d-flex align-items-center">
                    <label for="">Name of School:</label>
                    <input type="text" name="efese_name_of_school" value="<?php echo " " . $rows['name_of_school'];?>" required>
                </span>
                <span class="hstack d-flex align-items-center justify-content-start">
                    <label for="">School ID:</label>
                    <input type="text" name="efese_school_id" value="<?php echo " " . $rows['school_id'];?>" required>
                </span>
                <span class="hstack d-flex align-items-center">
                <label for="">Address of School:</label>
                <input type="text" name="efese_address_of_school" value="<?php echo " " . $rows['address_of_school'];?>" required>
                </span>
              </section>
          </div>
        <div class="other-cred">
            <p>Other Credential Presented</p>
            <span class="wrapper d-flex flex-row justify-content-evenly">
                <span>
                <input type="checkbox" class="form-check-input" name="pept_passer" value="1"
                <?php echo (in_array("1", $pept_passer)? 'checked':'') ?>>
                  <label class="form-check-label" style="padding: 0 2px 0 0;">PEPT Passer</label>
                  <label for="">Rating:</label>
                  <input type="text" class="w-30" name="efese_rating" value="<?php echo " " . $rows['rating'];?>" required>
                </span>
                <span>
                  <label for="">Date of Examination/Assessment (dd/mm/yyyy):</label>
                  <input type="date" name="date_of_assessment" value="<?php echo strftime('%Y-%m-%d', strtotime($rows['date_of_assessment']));?>" id=""> 
                  
                  <input type="checkbox" class="form-check-input" name="efese_others" value="1"
                  <?php echo (in_array("1", $efese_others)? 'checked':'') ?>>
                  <label for="">Others (Pls. Specify):</label>
                  <input type="text" style="width:20%;" value="<?php echo " " . $rows['specify'];?>" name="efese_specify" id="">
              </span>
            </span>
            <section class="last-cred d-flex flex-row justify-content-evenly px-5">
                <span class="hstack w-75">
                    <label for="">Name and Address of Testing Center:</label>
                    <input type="text" class="w-50" name="efese_testing_center" 
                    value="<?php echo " " . $rows['name_and_address_testing_center'];?>" id="">
                </span>
                <span class="w-50">
                    <label for="">Remark:</label>
                    <input type="text" class="w-75" name="efese_remarks" value="<?php echo " " . $rows['remarks'];?>" id="">
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
          <input type="text" name="phase1_sr_school" value="<?php echo " " . $rows['school'];?>" class="school">
        </span>
        <span>
          <label>School ID:</label>
          <input type="text" name="phase1_sr_school_id" value="<?php echo " " . $rows['school_id'];?>" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District:</label>
          <input type="text" class="w-50" name="phase1_sr_district" value="<?php echo " " . $rows['district'];?>" class="district">
        </span>
        <span>
          <label>Division:</label>
          <input type="text" class="w-50" name="phase1_sr_division" value="<?php echo " " . $rows['division'];?>" class="division">
        </span>
        <span class="text-end">
          <label>Region:</label>
          <input type="text" class="w-50" name="phase1_sr_region" value="<?php echo " " . $rows['region'];?>" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade:</label>
          <input type="text" style="width: 20%;" name="phase1_sr_classified_as_grade" value="<?php echo " " . $rows['classified_as_grade'];?>" >
        </span>
        <span>
          <label>Section:</label>
          <input type="text" class="w-50" name="phase1_sr_section" value="<?php echo " " . $rows['section'];?>"> 
        </span>
        <span>
          <label>School Year:</label>
          <input type="text" class="w-50" name="phase1_sr_school_year" value="<?php echo " " . $rows['school_year'];?>">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
        <label for="">Name of Adviser:</label>
        <input type="text" name="phase1_sr_name_of_adviser" value="<?php echo " " . $rows['name_of_teacher'];?>">
        </span>
        <span>
          <label>Signature:</label>
          <input type="text" name="phase1_sr_signature" value="<?php echo " " . $rows['signature'];?>" class="school_id">
        </span>
      </span>
    
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
            <th rowspan="2" class="w-50">Learner's Area</th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
          </tr>
          <tr style="width: 5%;">
          
                <th class="w-10"><input type="hidden" name="sg_term[]" value="1" readonly>1</th>
                <th class="w-10"><input type="hidden" name="sg_term[]" value="2" readonly>2</th>
                <th class="w-10"><input type="hidden" name="sg_term[]" value="3" readonly>3</th>
                <th class="w-10"><input type="hidden" name="sg_term[]" value="4" readonly>4</th>
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
            while($rows = mysqli_fetch_array($query_phase1_mother_tounge)){
            ?>
            <td><input type="number" name="phase1_mother_tounge_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo " "; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
            <?php }?>
            <?php
            $phase1_finalrating_mother_tounge = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '1' AND phase = '1'";
            $query_phase1_finalrating_mother_tounge = mysqli_query($conn, $phase1_finalrating_mother_tounge);
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_mother_tounge);
            ?>
            <td><?php echo $final_rating['final_rating'];?></td>
          </tr>


          <tr>
          <?php
            $phase1_filipino = "SELECT * FROM student_grades
            WHERE lrn = '109857060083' AND phase = '1' AND subject_id = '2'";
            $query_phase1_filipino = mysqli_query($conn, $phase1_filipino) or die (mysqli_error($conn));
            ?>
            <td class="text-start fw-bold">Filipino</td>
            <?php 
            while($rows = mysqli_fetch_array($query_phase1_filipino)){
            ?>
            <td><input type="number" name="phase1_filipino_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo " "; }else{ echo $rows['grade'];}?>"title="Please input 2 Numbers only" ></td>
            <?php }?>
            <?php
            $phase1_finalrating_filipino = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '2' AND phase = '1'";
            $query_phase1_finalrating_filipino = mysqli_query($conn, $phase1_finalrating_filipino);
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_filipino);
            ?>
            <td><?php echo $final_rating['final_rating'];?></td>
          </tr>
          <tr>
          <?php
            $phase1_english = "SELECT * FROM student_grades
            WHERE lrn = '109857060083' AND phase = '1' AND subject_id = '3'";
            $query_phase1_english = mysqli_query($conn, $phase1_english) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">English</td>
            <?php 
            while($rows = mysqli_fetch_array($query_phase1_english)){
            ?>
            <td><input type="number" name="phase1_english_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo " "; }else{ echo $rows['grade'];}?>"title="Please input 2 Numbers only" ></td>
            <?php }?>
            <?php
            $phase1_finalrating_english = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '3' AND phase = '1'";
            $query_phase1_finalrating_english = mysqli_query($conn, $phase1_finalrating_english);
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_english);
            ?>
            <td><?php echo $final_rating['final_rating'];?></td>
          </tr>


          <tr>
          <?php
            $phase1_math = "SELECT * FROM student_grades
            WHERE lrn = '109857060083' AND phase = '1' AND subject_id = '4'";
            $query_phase1_math = mysqli_query($conn, $phase1_math) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Mathematics</td>
            <?php 
            while($rows = mysqli_fetch_array($query_phase1_math)){
            ?>
            <td><input type="number" name="phase1_math_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo " "; }else{ echo $rows['grade'];}?>"title="Please input 2 Numbers only" ></td>
            <?php }?>
            <?php
            $phase1_finalrating_math = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '4' AND phase = '1'";
            $query_phase1_finalrating_math = mysqli_query($conn, $phase1_finalrating_math);
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_math);
            ?>
            <td><?php echo $final_rating['final_rating'];?></td>
          </tr>


          <tr>
          <?php
            $phase1_science = "SELECT * FROM student_grades
            WHERE lrn = '109857060083' AND phase = '1' AND subject_id = '5'";
            $query_phase1_science = mysqli_query($conn, $phase1_science) or die (mysqli_error($conn));
            ?>
            <td class="text-start fw-bold">Science</td>
            <?php 
            while($rows = mysqli_fetch_array($query_phase1_science)){
            ?>
            <td><input type="number" name="phase1_science_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo " "; }else{ echo $rows['grade'];}?>"title="Please input 2 Numbers only" ></td>
            <?php }?>
            <?php
            $phase1_finalrating_science = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '5' AND phase = '1'";
            $query_phase1_finalrating_science = mysqli_query($conn, $phase1_finalrating_science);
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_science);
            ?>
            <td><?php echo $final_rating['final_rating'];?></td>
          </tr>


          <tr>
          <?php
            $phase1_araling_panlipunan = "SELECT * FROM student_grades
            WHERE lrn = '109857060083' AND phase = '1' AND subject_id = '6'";
            $query_phase1_araling_panlipunan = mysqli_query($conn, $phase1_araling_panlipunan) or die (mysqli_error($conn));
            ?>
            <td class="text-start fw-bold">Araling Panlipunan</td>
            <?php 
            while($rows = mysqli_fetch_array($query_phase1_araling_panlipunan)){
            ?>
            <td><input type="number" name="phase1_araling_panlipunan_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo " "; }else{ echo $rows['grade'];}?>"title="Please input 2 Numbers only" ></td>
            <?php }?>
            <?php
            $phase1_finalrating_araling_panlipunan = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '6' AND phase = '1'";
            $query_phase1_finalrating_araling_panlipunan = mysqli_query($conn, $phase1_finalrating_araling_panlipunan);
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_araling_panlipunan);
            ?>
            <td><?php echo $final_rating['final_rating'];?></td>
          </tr>


          <tr>
          <?php
            $phase1_epp_tle = "SELECT * FROM student_grades
            WHERE lrn = '109857060083' AND phase = '1' AND subject_id = '7'";
            $query_phase1_epp_tle = mysqli_query($conn, $phase1_epp_tle) or die (mysqli_error($conn));
            ?>
            <td class="text-start fw-bold">EPP/TLE</td>
            <?php 
            while($rows = mysqli_fetch_array($query_phase1_epp_tle)){
            ?>
            <td><input type="number" name="phase1_epp_tle_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo " "; }else{ echo $rows['grade'];}?>"title="Please input 2 Numbers only" ></td>
            <?php }?>
            <?php
            $phase1_finalrating_epp_tle = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '7' AND phase = '1'";
            $query_phase1_finalrating_epp_tle = mysqli_query($conn, $phase1_finalrating_epp_tle);
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_epp_tle);
            ?>
            <td><?php echo $final_rating['final_rating'];?></td>
          </tr>


          <tr>
          <?php
            $phase1_mapeh = "SELECT * FROM student_grades
            WHERE lrn = '109857060083' AND phase = '1' AND subject_id = '8'";
            $query_phase1_mapeh = mysqli_query($conn, $phase1_mapeh) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">MAPEH</td>
            <?php 
            while($rows = mysqli_fetch_array($query_phase1_mapeh)){
            ?>
            <td><input type="number" readonly name="phase1_mapeh_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo " "; }else{ echo $rows['grade'];}?>"title="Please input 2 Numbers only" ></td>
            <?php }?> 
            <?php
            $phase1_finalrating_mapeh = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '8' AND phase = '1'";
            $query_phase1_finalrating_mapeh = mysqli_query($conn, $phase1_finalrating_mapeh);
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_mapeh);
            ?>
            <td><?php echo $final_rating['final_rating'];?></td>
          </tr>


          <tr>
          <?php
            $phase1_music = "SELECT * FROM student_grades
            WHERE lrn = '109857060083' AND phase = '1' AND subject_id = '9'";
            $query_phase1_music = mysqli_query($conn, $phase1_music) or die (mysqli_error($conn));
            ?>
            <td class="text-start"><i>Music</i></td>
            <?php 
            while($rows = mysqli_fetch_array($query_phase1_music)){
            ?>
            <td><input type="number" name="phase1_music_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo " "; }else{ echo $rows['grade'];}?>"title="Please input 2 Numbers only" ></td>
            <?php }?>
            <?php
            $phase1_finalrating_music = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '9' AND phase = '1'";
            $query_phase1_finalrating_music = mysqli_query($conn, $phase1_finalrating_music);
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_music);
            ?>
            <td><?php echo $final_rating['final_rating'];?></td>
          </tr>


          <tr>
          <?php
            $phase1_art = "SELECT * FROM student_grades
            WHERE lrn = '109857060083' AND phase = '1' AND subject_id = '10'";
            $query_phase1_art = mysqli_query($conn, $phase1_art) or die (mysqli_error($conn));
            ?>
            <td class="text-start"><i>Arts</i></td>
            <?php 
            while($rows = mysqli_fetch_array($query_phase1_art)){
            ?>
            <td><input type="number" name="phase1_art_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo " "; }else{ echo $rows['grade'];}?>"title="Please input 2 Numbers only" ></td>
            <?php }?>
            <?php
            $phase1_finalrating_art = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '10' AND phase = '1'";
            $query_phase1_finalrating_art = mysqli_query($conn, $phase1_finalrating_art);
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_art);
            ?>
            <td><?php echo $final_rating['final_rating'];?></td>
          </tr>

          
          <tr>
          <?php
            $phase1_pe = "SELECT * FROM student_grades
            WHERE lrn = '109857060083' AND phase = '1' AND subject_id = '11'";
            $query_phase1_pe = mysqli_query($conn, $phase1_pe) or die (mysqli_error($conn));
            ?>
            <td class="text-start"><i>Physical Education</i></td>
            <?php 
            while($rows = mysqli_fetch_array($query_phase1_pe)){
            ?>
            <td><input type="number" name="phase1_pe_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo " "; }else{ echo $rows['grade'];}?>"title="Please input 2 Numbers only" ></td>
            <?php }?>
            <?php
            $phase1_finalrating_pe = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '11' AND phase = '1'";
            $query_phase1_finalrating_pe = mysqli_query($conn, $phase1_finalrating_pe);
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_pe);
            ?>
            <td><?php echo $final_rating['final_rating'];?></td>
          </tr>


          <tr>
          <?php
            $phase1_health = "SELECT * FROM student_grades
            WHERE lrn = '109857060083' AND phase = '1' AND subject_id = '12'";
            $query_phase1_health = mysqli_query($conn, $phase1_health) or die (mysqli_error($conn));
            ?>
            <td class="text-start"><i>Health</i></td>
            <?php 
            while($rows = mysqli_fetch_array($query_phase1_health)){
            ?>
            <td><input type="number" name="phase1_health_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo " "; }else{ echo $rows['grade'];}?>"title="Please input 2 Numbers only" ></td>
            <?php }?>
            <?php
            $phase1_finalrating_health = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '12' AND phase = '1'";
            $query_phase1_finalrating_health = mysqli_query($conn, $phase1_finalrating_health);
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_health);
            ?>
            <td><?php echo $final_rating['final_rating'];?></td>
          </tr>


          <tr>
          <?php
            $phase1_esp = "SELECT * FROM student_grades
            WHERE lrn = '109857060083' AND phase = '1' AND subject_id = '13'";
            $query_phase1_esp = mysqli_query($conn, $phase1_esp) or die (mysqli_error($conn));
            
            ?>
            <td class="text-start fw-bold">Edukasyon sa Pagpapakatao</td>
            <?php 
            while($rows = mysqli_fetch_array($query_phase1_esp)){
            ?>
            <td><input type="number" name="phase1_esp_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo " "; }else{ echo $rows['grade'];}?>"title="Please input 2 Numbers only" ></td>
            <?php }?>
            <?php
            $phase1_finalrating_esp = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '13' AND phase = '1'";
            $query_phase1_finalrating_esp = mysqli_query($conn, $phase1_finalrating_esp);
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_esp);
            ?>
            <td><?php echo $final_rating['final_rating'];?></td>
          </tr>


          <tr>
          <?php
            $phase1_arabic_lang = "SELECT * FROM student_grades
            WHERE lrn = '109857060083' AND phase = '1' AND subject_id = '14'";
            $query_phase1_arabic_lang = mysqli_query($conn, $phase1_arabic_lang) or die (mysqli_error($conn));
            ?>
            <td class="text-start"><i>Arabic Language</i></td>
            <?php 
            while($rows = mysqli_fetch_array($query_phase1_arabic_lang)){
            ?>
            <td><input type="number" name="phase1_arabic_lang_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo " "; }else{ echo $rows['grade'];}?>"title="Please input 2 Numbers only" ></td>
            <?php }?>
            <?php
            $phase1_finalrating_arabic_lang = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '14' AND phase = '1'";
            $query_phase1_finalrating_arabic_lang = mysqli_query($conn, $phase1_finalrating_arabic_lang);
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_arabic_lang);
            ?>
            <td><?php echo $final_rating['final_rating'];?></td>
          </tr>


          <tr>
          <?php
            $phase1_islamic_values = "SELECT * FROM student_grades
            WHERE lrn = '109857060083' AND phase = '1' AND subject_id = '15'";
            $query_phase1_islamic_values = mysqli_query($conn, $phase1_islamic_values) or die (mysqli_error($conn));
            ?>
            <td class="text-start"><i>Islamic Values Education</i></td>
            <?php 
            while($rows = mysqli_fetch_array($query_phase1_islamic_values)){
            ?>
            <td><input type="number" name="phase1_islamic_values_grades[]" id="grade" 
            value="<?php if($rows['grade'] == 0){ echo " "; }else{ echo $rows['grade'];}?>"title="Please input 2 Numbers only" ></td>
            <?php }?>
            <?php
            $phase1_finalrating_islamic_values = "SELECT * FROM student_final_ratings
            WHERE lrn = '109857060083' AND subject_id = '15' AND phase = '1'";
            $query_phase1_finalrating_islamic_values = mysqli_query($conn, $phase1_finalrating_islamic_values);
            $final_rating = mysqli_fetch_array($query_phase1_finalrating_islamic_values);
            ?>
            <td><?php echo $final_rating['final_rating'];?></td>
          </tr>

          
          <tr>
            <td class="text-start fw-bold">General Average</td>
            <td><input type="number" name="general_average1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
        </tbody>
      </table>

  <!-- Remedial Table phase 1 -->
        <?php
        $phase1_remedial_classes_dates = "SELECT * FROM remedial_classes
        WHERE lrn = '109857060083' AND phase ='1'";
        $query_phase1_remedial_classes_dates = mysqli_query($conn, $phase1_remedial_classes_dates);
        $row = mysqli_fetch_array($query_phase1_remedial_classes_dates);
        ?>
      <table class="table-condensed text-center w-100">
        <thead> 
          <tr>
            <th colspan="2">Remedial Classes</th>
            <th colspan="4">
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" class="datefrom" name="date_from" value="<?php echo strftime('%Y-%m-%d', strtotime($row['date_from']));?>">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" class="dateto" name="date_to" value="<?php echo strftime('%Y-%m-%d', strtotime($row['date_to']));?>">
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
            <td><input type="text" class="learning-areas1" name="learning_areas1" value="<?php echo $row['learning_areas'];?>"></td>
            <td><input type="number" id="grade" class="final_rating1" name="final_rating1" value="<?php echo $row['final_rating'];?>"></td>
            <td><input type="text" name="remedial_class_mark1" value="<?php echo $row['remedial_class_mark'];?>" id=""></td>
            <td><input type="number" id="grade" name="recomputed_final_grade1" value="<?php echo $row['recomputed_final_grade'];?>" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" name="remedial_remarks1" value="<?php echo $row['remarks'];?>" id=""></td>
          </tr>
          <tr>
            <td><input type="text" class="learning_areas2" name="learning_areas2"></td>
            <td><input type="number" id="grade" class="final_rating2" name="final_rating2"></td>
            <td><input type="text" name="remedial_class_mark2" id=""> </td>
            <td><input type="number" id="grade" name="recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text"name="remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
      </div>
      <br>
      <br>
      <div class="form-container" style="padding:0 0 7px 7px;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <span>
          <label>School</label>
          <input type="text" name="school" class="school">
        </span>
        <span>
          <label>School ID</label>
          <input type="text" name="school_id" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District</label>
          <input type="text" class="w-50" name="school" class="district">
        </span>
        <span>
          <label>Division</label>
          <input type="text" class="w-50" name="school_id" class="division">
        </span>
        <span class="text-end">
          <label>Region</label>
          <input type="text" class="w-50" name="school_id" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade</label>
          <input type="text" style="width: 20%;" name="classified_as_grade" >
        </span>
        <span>
          <label>Section</label>
          <input type="text" class="w-50" name="section"> 
        </span>
        <span>
          <label>School Year</label>
          <input type="text" class="w-50" name="school_year">
        </span>
      </span>
      <span class="d-flex">
        <label for="">Name of Adviser: </label>
        <input type="text" name="name_of_adviser">
      </span>
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
            <th rowspan="2" class="w-50">Learner's Area</th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
          </tr>
          <tr style="width: 5%;">
            <th class="w-10">1</th>
            <th class="w-10">2</th>
            <th class="w-10">3</th>
            <th class="w-10">4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-start fw-bold">Mother Tongue</td>
            <td><input type="number" name="mother_tounge1" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge2" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge3" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge4" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge5" id="grade" title="Please input 2 Numbers only" ></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Filipino</td>
            <td><input type="number" name="filipino1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">English</td>
            <td><input type="number" name="english1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Math</td>
            <td><input type="number" name="math1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Science</td>
            <td><input type="number" name="science1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Aralin Panlipunan</td>
            <td><input type="number" name="araling_panlipunan1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">EPP/TLE</td>
            <td><input type="number" name="epp_tle1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">MAPEH</td>
            <td><input type="number" name="mapeh1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Music</i></td>
            <td><input type="number" name="music1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>PE</i></td>
            <td><input type="number" name="p_e1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Health</i></td>
            <td><input type="number" name="health1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Edukasyon sa Pagkakatao</td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Arabic Language</i></td>
            <td><input type="number" name="arabic_language1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Islamic Values</i></td>
            <td><input type="number" name="islamic_values1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">General Average</td>
            <td><input type="number" name="general_average1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
        </tbody>
      </table>
  <!-- Remedial Table phase 2 -->
      <table class="table-condensed text-center w-100">
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" class="datefrom" name="date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" class="dateto" name="date_to">
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
            <td><input type="text" class="learning-areas1" name="learning_areas1"></td>
            <td><input type="number" id="grade" class="final_rating1" name="final_rating1"></td>
            <td><input type="text" name="remedial_class_mark1" id=""></td>
            <td><input type="number" id="grade" name="recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" name="remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" class="learning_areas2" name="learning_areas2"></td>
            <td><input type="number" id="grade" class="final_rating2" name="final_rating2"></td>
            <td><input type="text" name="remedial_class_mark2" id=""> </td>
            <td><input type="number" id="grade" name="recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text"name="remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
      </div>
      </div>
      <div class="gen-container d-flex">
      <div class="form-container" style="padding: 7px 7px 0 0 ;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <span>
          <label>School</label>
          <input type="text" name="school" class="school">
        </span>
        <span>
          <label>School ID</label>
          <input type="text" name="school_id" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District</label>
          <input type="text" class="w-50" name="school" class="district">
        </span>
        <span>
          <label>Division</label>
          <input type="text" class="w-50" name="school_id" class="division">
        </span>
        <span class="text-end">
          <label>Region</label>
          <input type="text" class="w-50" name="school_id" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade</label>
          <input type="text" style="width: 20%;" name="classified_as_grade" >
        </span>
        <span>
          <label>Section</label>
          <input type="text" class="w-50" name="section"> 
        </span>
        <span>
          <label>School Year</label>
          <input type="text" class="w-50" name="school_year">
        </span>
      </span>
      <span class="d-flex">
        <label for="">Name of Adviser: </label>
        <input type="text" name="name_of_adviser">
      </span>
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
            <th rowspan="2" class="w-50">Learner's Area</th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
          </tr>
          <tr style="width: 5%;">
            <th class="w-10">1</th>
            <th class="w-10">2</th>
            <th class="w-10">3</th>
            <th class="w-10">4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-start fw-bold">Mother Tongue</td>
            <td><input type="number" name="mother_tounge1" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge2" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge3" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge4" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge5" id="grade" title="Please input 2 Numbers only" ></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Filipino</td>
            <td><input type="number" name="filipino1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">English</td>
            <td><input type="number" name="english1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Math</td>
            <td><input type="number" name="math1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Science</td>
            <td><input type="number" name="science1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Aralin Panlipunan</td>
            <td><input type="number" name="araling_panlipunan1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">EPP/TLE</td>
            <td><input type="number" name="epp_tle1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">MAPEH</td>
            <td><input type="number" name="mapeh1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Music</i></td>
            <td><input type="number" name="music1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>PE</i></td>
            <td><input type="number" name="p_e1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Health</i></td>
            <td><input type="number" name="health1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Edukasyon sa Pagkakatao</td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Arabic Language</i></td>
            <td><input type="number" name="arabic_language1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Islamic Values</i></td>
            <td><input type="number" name="islamic_values1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">General Average</td>
            <td><input type="number" name="general_average1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
        </tbody>
      </table>
  <!-- Remedial Table phase 3 -->
      <table class="table-condensed mb-5 text-center w-100">
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" class="datefrom" name="date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" class="dateto" name="date_to">
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
            <td><input type="text" class="learning-areas1" name="learning_areas1"></td>
            <td><input type="number" id="grade" class="final_rating1" name="final_rating1"></td>
            <td><input type="text" name="remedial_class_mark1" id=""></td>
            <td><input type="number" id="grade" name="recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" name="remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" class="learning_areas2" name="learning_areas2"></td>
            <td><input type="number" id="grade" class="final_rating2" name="final_rating2"></td>
            <td><input type="text" name="remedial_class_mark2" id=""> </td>
            <td><input type="number" id="grade" name="recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text"name="remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="form-container" style="padding: 7px 0 0 7px ;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <span>
          <label>School</label>
          <input type="text" name="school" class="school">
        </span>
        <span>
          <label>School ID</label>
          <input type="text" name="school_id" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District</label>
          <input type="text" class="w-50" name="school" class="district">
        </span>
        <span>
          <label>Division</label>
          <input type="text" class="w-50" name="school_id" class="division">
        </span>
        <span class="text-end">
          <label>Region</label>
          <input type="text" class="w-50" name="school_id" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade</label>
          <input type="text" style="width: 20%;" name="classified_as_grade" >
        </span>
        <span>
          <label>Section</label>
          <input type="text" class="w-50" name="section"> 
        </span>
        <span>
          <label>School Year</label>
          <input type="text" class="w-50" name="school_year">
        </span>
      </span>
      <span class="d-flex">
        <label for="">Name of Adviser: </label>
        <input type="text" name="name_of_adviser">
      </span>
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
            <th rowspan="2" class="w-50">Learner's Area</th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
          </tr>
          <tr style="width: 5%;">
            <th class="w-10">1</th>
            <th class="w-10">2</th>
            <th class="w-10">3</th>
            <th class="w-10">4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-start fw-bold">Mother Tongue</td>
            <td><input type="number" name="mother_tounge1" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge2" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge3" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge4" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge5" id="grade" title="Please input 2 Numbers only" ></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Filipino</td>
            <td><input type="number" name="filipino1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">English</td>
            <td><input type="number" name="english1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Math</td>
            <td><input type="number" name="math1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Science</td>
            <td><input type="number" name="science1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Aralin Panlipunan</td>
            <td><input type="number" name="araling_panlipunan1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">EPP/TLE</td>
            <td><input type="number" name="epp_tle1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">MAPEH</td>
            <td><input type="number" name="mapeh1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Music</i></td>
            <td><input type="number" name="music1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>PE</i></td>
            <td><input type="number" name="p_e1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Health</i></td>
            <td><input type="number" name="health1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Edukasyon sa Pagkakatao</td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Arabic Language</i></td>
            <td><input type="number" name="arabic_language1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Islamic Values</i></td>
            <td><input type="number" name="islamic_values1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">General Average</td>
            <td><input type="number" name="general_average1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
        </tbody>
      </table>
  <!-- Remedial Table phase 3 -->
      <table class="table-condensed mb-5 text-center w-100">
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" class="datefrom" name="date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" class="dateto" name="date_to">
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
            <td><input type="text" class="learning-areas1" name="learning_areas1"></td>
            <td><input type="number" id="grade" class="final_rating1" name="final_rating1"></td>
            <td><input type="text" name="remedial_class_mark1" id=""></td>
            <td><input type="number" id="grade" name="recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" name="remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" class="learning_areas2" name="learning_areas2"></td>
            <td><input type="number" id="grade" class="final_rating2" name="final_rating2"></td>
            <td><input type="text" name="remedial_class_mark2" id=""> </td>
            <td><input type="number" id="grade" name="recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text"name="remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
      </div>
    </div>
      <input type="button" class="next-form text-end btn btn-success" style="float: right;" value="Next" />
    </fieldset>
    <fieldset>
      <!-- back -->
      <div class="gen-container d-flex flex-row">
      <div class="form-container" style="padding: 0 7px 7px 0;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <span>
          <label>School</label>
          <input type="text" name="school" class="school">
        </span>
        <span>
          <label>School ID</label>
          <input type="text" name="school_id" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District</label>
          <input type="text" class="w-50" name="school" class="district">
        </span>
        <span>
          <label>Division</label>
          <input type="text" class="w-50" name="school_id" class="division">
        </span>
        <span class="text-end">
          <label>Region</label>
          <input type="text" class="w-50" name="school_id" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade</label>
          <input type="text" style="width: 20%;" name="classified_as_grade" >
        </span>
        <span>
          <label>Section</label>
          <input type="text" class="w-50" name="section"> 
        </span>
        <span>
          <label>School Year</label>
          <input type="text" class="w-50" name="school_year">
        </span>
      </span>
      <span class="d-flex">
        <label for="">Name of Adviser: </label>
        <input type="text" name="name_of_adviser">
      </span>
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
            <th rowspan="2" class="w-50">Learner's Area</th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
          </tr>
          <tr style="width: 5%;">
            <th class="w-10">1</th>
            <th class="w-10">2</th>
            <th class="w-10">3</th>
            <th class="w-10">4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-start fw-bold">Mother Tongue</td>
            <td><input type="number" name="mother_tounge1" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge2" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge3" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge4" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge5" id="grade" title="Please input 2 Numbers only" ></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Filipino</td>
            <td><input type="number" name="filipino1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">English</td>
            <td><input type="number" name="english1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Math</td>
            <td><input type="number" name="math1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Science</td>
            <td><input type="number" name="science1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Aralin Panlipunan</td>
            <td><input type="number" name="araling_panlipunan1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">EPP/TLE</td>
            <td><input type="number" name="epp_tle1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">MAPEH</td>
            <td><input type="number" name="mapeh1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Music</i></td>
            <td><input type="number" name="music1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>PE</i></td>
            <td><input type="number" name="p_e1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Health</i></td>
            <td><input type="number" name="health1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Edukasyon sa Pagkakatao</td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Arabic Language</i></td>
            <td><input type="number" name="arabic_language1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Islamic Values</i></td>
            <td><input type="number" name="islamic_values1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">General Average</td>
            <td><input type="number" name="general_average1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
        </tbody>
      </table>
  <!-- Remedial Table phase 5 -->
      <table class="table-condensed text-center w-100" >
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" class="datefrom" name="date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" class="dateto" name="date_to">
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
            <td><input type="text" class="learning-areas1" name="learning_areas1"></td>
            <td><input type="number" id="grade" class="final_rating1" name="final_rating1"></td>
            <td><input type="text" name="remedial_class_mark1" id=""></td>
            <td><input type="number" id="grade" name="recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" name="remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" class="learning_areas2" name="learning_areas2"></td>
            <td><input type="number" id="grade" class="final_rating2" name="final_rating2"></td>
            <td><input type="text" name="remedial_class_mark2" id=""> </td>
            <td><input type="number" id="grade" name="recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text"name="remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="form-container" style="padding: 0 0 7px 7px ;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <span>
          <label>School</label>
          <input type="text" name="school" class="school">
        </span>
        <span>
          <label>School ID</label>
          <input type="text" name="school_id" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District</label>
          <input type="text" class="w-50" name="school" class="district">
        </span>
        <span>
          <label>Division</label>
          <input type="text" class="w-50" name="school_id" class="division">
        </span>
        <span class="text-end">
          <label>Region</label>
          <input type="text" class="w-50" name="school_id" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade</label>
          <input type="text" style="width: 20%;" name="classified_as_grade" >
        </span>
        <span>
          <label>Section</label>
          <input type="text" class="w-50" name="section"> 
        </span>
        <span>
          <label>School Year</label>
          <input type="text" class="w-50" name="school_year">
        </span>
      </span>
      <span class="d-flex">
        <label for="">Name of Adviser: </label>
        <input type="text" name="name_of_adviser">
      </span>
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
            <th rowspan="2" class="w-50">Learner's Area</th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
          </tr>
          <tr style="width: 5%;">
            <th class="w-10">1</th>
            <th class="w-10">2</th>
            <th class="w-10">3</th>
            <th class="w-10">4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-start fw-bold">Mother Tongue</td>
            <td><input type="number" name="mother_tounge1" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge2" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge3" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge4" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge5" id="grade" title="Please input 2 Numbers only" ></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Filipino</td>
            <td><input type="number" name="filipino1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">English</td>
            <td><input type="number" name="english1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Math</td>
            <td><input type="number" name="math1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Science</td>
            <td><input type="number" name="science1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Aralin Panlipunan</td>
            <td><input type="number" name="araling_panlipunan1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">EPP/TLE</td>
            <td><input type="number" name="epp_tle1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">MAPEH</td>
            <td><input type="number" name="mapeh1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Music</i></td>
            <td><input type="number" name="music1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>PE</i></td>
            <td><input type="number" name="p_e1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Health</i></td>
            <td><input type="number" name="health1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Edukasyon sa Pagkakatao</td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Arabic Language</i></td>
            <td><input type="number" name="arabic_language1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Islamic Values</i></td>
            <td><input type="number" name="islamic_values1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">General Average</td>
            <td><input type="number" name="general_average1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
        </tbody>
      </table>
  <!-- Remedial Table phase 6 -->
      <table class="table-condensed text-center w-100">
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" class="datefrom" name="date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" class="dateto" name="date_to">
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
            <td><input type="text" class="learning-areas1" name="learning_areas1"></td>
            <td><input type="number" id="grade" class="final_rating1" name="final_rating1"></td>
            <td><input type="text" name="remedial_class_mark1" id=""></td>
            <td><input type="number" id="grade" name="recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" name="remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" class="learning_areas2" name="learning_areas2"></td>
            <td><input type="number" id="grade" class="final_rating2" name="final_rating2"></td>
            <td><input type="text" name="remedial_class_mark2" id=""> </td>
            <td><input type="number" id="grade" name="recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text"name="remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
      </div>
      </div>
      <div class="gen-container d-flex">
      <div class="form-container" style="padding:7px 7px 0 0;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <span>
          <label>School</label>
          <input type="text" name="school" class="school">
        </span>
        <span>
          <label>School ID</label>
          <input type="text" name="school_id" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District</label>
          <input type="text" class="w-50" name="school" class="district">
        </span>
        <span>
          <label>Division</label>
          <input type="text" class="w-50" name="school_id" class="division">
        </span>
        <span class="text-end">
          <label>Region</label>
          <input type="text" class="w-50" name="school_id" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade</label>
          <input type="text" style="width: 20%;" name="classified_as_grade" >
        </span>
        <span>
          <label>Section</label>
          <input type="text" class="w-50" name="section"> 
        </span>
        <span>
          <label>School Year</label>
          <input type="text" class="w-50" name="school_year">
        </span>
      </span>
      <span class="d-flex">
        <label for="">Name of Adviser: </label>
        <input type="text" name="name_of_adviser">
      </span>
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
            <th rowspan="2" class="w-50">Learner's Area</th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
          </tr>
          <tr style="width: 5%;">
            <th class="w-10">1</th>
            <th class="w-10">2</th>
            <th class="w-10">3</th>
            <th class="w-10">4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-start fw-bold">Mother Tongue</td>
            <td><input type="number" name="mother_tounge1" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge2" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge3" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge4" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge5" id="grade" title="Please input 2 Numbers only" ></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Filipino</td>
            <td><input type="number" name="filipino1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">English</td>
            <td><input type="number" name="english1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Math</td>
            <td><input type="number" name="math1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Science</td>
            <td><input type="number" name="science1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Aralin Panlipunan</td>
            <td><input type="number" name="araling_panlipunan1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">EPP/TLE</td>
            <td><input type="number" name="epp_tle1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">MAPEH</td>
            <td><input type="number" name="mapeh1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Music</i></td>
            <td><input type="number" name="music1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>PE</i></td>
            <td><input type="number" name="p_e1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Health</i></td>
            <td><input type="number" name="health1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Edukasyon sa Pagkakatao</td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Arabic Language</i></td>
            <td><input type="number" name="arabic_language1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Islamic Values</i></td>
            <td><input type="number" name="islamic_values1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">General Average</td>
            <td><input type="number" name="general_average1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
        </tbody>
      </table>
  <!-- Remedial Table phase 7 -->
      <table class="table-condensed mb-5 text-center w-100">
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" class="datefrom" name="date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" class="dateto" name="date_to">
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
            <td><input type="text" class="learning-areas1" name="learning_areas1"></td>
            <td><input type="number" id="grade" class="final_rating1" name="final_rating1"></td>
            <td><input type="text" name="remedial_class_mark1" id=""></td>
            <td><input type="number" id="grade" name="recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" name="remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" class="learning_areas2" name="learning_areas2"></td>
            <td><input type="number" id="grade" class="final_rating2" name="final_rating2"></td>
            <td><input type="text" name="remedial_class_mark2" id=""> </td>
            <td><input type="number" id="grade" name="recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text"name="remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="form-container" style="padding: 7px 0 0 7px;">
      <section class="header">
      <span class="d-flex justify-content-between">
        <span>
          <label>School</label>
          <input type="text" name="school" class="school">
        </span>
        <span>
          <label>School ID</label>
          <input type="text" name="school_id" class="school_id">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>District</label>
          <input type="text" class="w-50" name="school" class="district">
        </span>
        <span>
          <label>Division</label>
          <input type="text" class="w-50" name="school_id" class="division">
        </span>
        <span class="text-end">
          <label>Region</label>
          <input type="text" class="w-50" name="school_id" class="region">
        </span>
      </span>
      <span class="d-flex justify-content-between">
        <span>
          <label>Classified as Grade</label>
          <input type="text" style="width: 20%;" name="classified_as_grade" >
        </span>
        <span>
          <label>Section</label>
          <input type="text" class="w-50" name="section"> 
        </span>
        <span>
          <label>School Year</label>
          <input type="text" class="w-50" name="school_year">
        </span>
      </span>
      <span class="d-flex">
        <label for="">Name of Adviser: </label>
        <input type="text" name="name_of_adviser">
      </span>
    </section>
      <table class="table table-condensed text-center" style="margin:0 0 5px 0;">
        <thead>
          <tr>
            <th rowspan="2" class="w-50">Learner's Area</th>
            <th colspan="4">Quarterly Rating</th>
            <th rowspan="2">Final Rating</th>
          </tr>
          <tr style="width: 5%;">
            <th class="w-10">1</th>
            <th class="w-10">2</th>
            <th class="w-10">3</th>
            <th class="w-10">4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-start fw-bold">Mother Tongue</td>
            <td><input type="number" name="mother_tounge1" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge2" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge3" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge4" id="grade" title="Please input 2 Numbers only" ></td>
            <td><input type="number" name="mother_tounge5" id="grade" title="Please input 2 Numbers only" ></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Filipino</td>
            <td><input type="number" name="filipino1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="filipino5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">English</td>
            <td><input type="number" name="english1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="english5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Math</td>
            <td><input type="number" name="math1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="math5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Science</td>
            <td><input type="number" name="science1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="science5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Aralin Panlipunan</td>
            <td><input type="number" name="araling_panlipunan1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="araling_panlipunan5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">EPP/TLE</td>
            <td><input type="number" name="epp_tle1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="epp_tle5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">MAPEH</td>
            <td><input type="number" name="mapeh1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="mapeh5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Music</i></td>
            <td><input type="number" name="music1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="music5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>PE</i></td>
            <td><input type="number" name="p_e1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="p_e5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Health</i></td>
            <td><input type="number" name="health1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="health5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">Edukasyon sa Pagkakatao</td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="edukasyon_sa_pagpapakatao5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Arabic Language</i></td>
            <td><input type="number" name="arabic_language1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="arabic_language5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start"><i>Islamic Values</i></td>
            <td><input type="number" name="islamic_values1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="islamic_values5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
          <tr>
            <td class="text-start fw-bold">General Average</td>
            <td><input type="number" name="general_average1" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average2" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average3" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average4" id="grade" title="Please input 2 Numbers only"></td>
            <td><input type="number" name="general_average5" id="grade" title="Please input 2 Numbers only"></td>
          </tr>
        </tbody>
      </table>
  <!-- Remedial Table phase 8 -->
      <table class="table-condensed mb-5 text-center w-100">
        <thead> 
          <tr>
            <th colspan="2" >Remedial Classes</th>
            <th colspan="4" >
              <span class="d-flex flex-row justify-content-between">
                <span>
                  <label for="">Date conducted: </label>
                  <input type="date" class="datefrom" name="date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" class="dateto" name="date_to">
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
            <td><input type="text" class="learning-areas1" name="learning_areas1"></td>
            <td><input type="number" id="grade" class="final_rating1" name="final_rating1"></td>
            <td><input type="text" name="remedial_class_mark1" id=""></td>
            <td><input type="number" id="grade" name="recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" name="remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" class="learning_areas2" name="learning_areas2"></td>
            <td><input type="number" id="grade" class="final_rating2" name="final_rating2"></td>
            <td><input type="text" name="remedial_class_mark2" id=""> </td>
            <td><input type="number" id="grade" name="recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text"name="remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
      </div>
    </div>
      <input type="button" name="previous" style="float:left;" class="previous-form btn btn-default" value="Previous" /> 
      <input type="submit" name="update" style="float:right;" class="submitbtn btn btn-success" value="Submit">
      <!-- <input type="button" class="next-form text-end btn btn-success" value="Next" /> -->
    </fieldset>
      <!-- -->
  </form>
</div>
<!-- <script src="src/js/stepper.js"></script> -->
<script src="src/js/number_limitation.js"></script>
<?php
include 'includes/footer.php';
?>
<?php
if(isset($_POST['update'])){
    // Learners Personal Info
    $lrn = $_POST['lrn'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $suffix = $_POST['suffix_name'];
    $middle_name = $_POST['middle_name'];
    $birthday = $_POST['birthday'];
    $sex = $_POST['sex'];

    // Eligibility for Elem School Enrollment
    $credential_presented = implode(',', $_POST['credential_presented']);
    $efese_name_of_school = $_POST['efese_name_of_school'];
    $efese_school_id = $_POST['efese_school_id'];
    $efese_address_of_school = $_POST['efese_address_of_school'];
    $pept_passer = $_POST['pept_passer'];
    $efese_rating = $_POST['efese_rating'];
    $date_of_assessment = $_POST['date_of_assessment'];
    $efese_others = $_POST['efese_others'];
    $efese_specify = $_POST['efese_specify'];
    $efese_testing_center = $_POST['efese_testing_center'];
    $efese_remarks = $_POST['efese_remarks'];


    // PHASE 1 OF SCHOLASTIC RECORDS
    $phase1_sr_school = $_POST['phase1_sr_school'];
    $phase1_sr_school_id = $_POST['phase1_sr_school_id'];
    $phase1_sr_district = $_POST['phase1_sr_district'];
    $phase1_sr_division = $_POST['phase1_sr_division'];
    $phase1_sr_region = $_POST['phase1_sr_region'];
    $phase1_sr_classified_as_grade = $_POST['phase1_sr_classified_as_grade'];
    $phase1_sr_section = $_POST['phase1_sr_section'];
    $phase1_sr_school_year = $_POST['phase1_sr_school_year'];
    $phase1_sr_name_of_adviser = $_POST['phase1_sr_name_of_adviser'];
    $phase1_sr_signature = $_POST['phase1_sr_signature'];

    // PHASE 1 TERM 1 - 5 OF STUDENT GRADES IN SCHOLASTIC RECORDS
    $sg_term = $_POST['sg_term'];
    $phase1_mother_tounge_grades = $_POST['phase1_mother_tounge_grades'];
    $phase1_filipino_grades = $_POST['phase1_filipino_grades'];
    $phase1_english_grades = $_POST['phase1_english_grades'];
    $phase1_math_grades = $_POST['phase1_math_grades'];
    $phase1_science_grades = $_POST['phase1_science_grades'];
    $phase1_araling_panlipunan_grades = $_POST['phase1_araling_panlipunan_grades'];
    $phase1_epp_tle_grades = $_POST['phase1_epp_tle_grades'];
    $phase1_mapeh_grades = $_POST['phase1_mapeh_grades'];
    $phase1_music_grades = $_POST['phase1_music_grades'];
    $phase1_art_grades = $_POST['phase1_art_grades'];
    $phase1_pe_grades = $_POST['phase1_pe_grades'];
    $phase1_health_grades = $_POST['phase1_health_grades'];
    $phase1_esp_grades = $_POST['phase1_esp_grades'];
    $phase1_arabic_lang_grades = $_POST['phase1_arabic_lang_grades'];
    $phase1_islamic_values_grades = $_POST['phase1_islamic_values_grades'];

    // PHASE 1 AVERAGE OF EVERY SUBJECTS
    $phase1_sum_of_mother_tounge_grades = array_sum($phase1_mother_tounge_grades);
    $phase1_ave_of_mother_tounge_grades = $phase1_sum_of_mother_tounge_grades/count($phase1_mother_tounge_grades);

    $phase1_sum_of_filipino_grades = array_sum($phase1_filipino_grades);
    $phase1_ave_of_filipino_grades = $phase1_sum_of_filipino_grades/count($phase1_filipino_grades);

    $phase1_sum_of_english_grades = array_sum($phase1_english_grades);
    $phase1_ave_of_english_grades = $phase1_sum_of_english_grades/count($phase1_english_grades);

    $phase1_sum_of_math_grades = array_sum($phase1_math_grades);
    $phase1_ave_of_math_grades = $phase1_sum_of_math_grades/count($phase1_math_grades);

    $phase1_sum_of_science_grades = array_sum($phase1_science_grades);
    $phase1_ave_of_science_grades = $phase1_sum_of_science_grades/count($phase1_science_grades);

    $phase1_sum_of_araling_panlipunan_grades = array_sum($phase1_araling_panlipunan_grades);
    $phase1_ave_of_araling_panlipunan_grades = $phase1_sum_of_araling_panlipunan_grades/count($phase1_araling_panlipunan_grades);

    $phase1_sum_of_epp_tle_grades = array_sum($phase1_epp_tle_grades);
    $phase1_ave_of_epp_tle_grades = $phase1_sum_of_epp_tle_grades/count($phase1_epp_tle_grades);

    $phase1_sum_of_mapeh_grades = array_sum($phase1_mapeh_grades);
    $phase1_ave_of_mapeh_grades = $phase1_sum_of_mapeh_grades/count($phase1_mapeh_grades);

    

}
ob_end_flush();
?>
