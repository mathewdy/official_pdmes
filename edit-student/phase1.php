<?php
ob_start();
include('../connection.php');
$decrypted_lrn = 123456789456;
$lrn = 123456789456;
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
    <form action="" method="POST">
        <!-- PHASE 1 OF SCHOLASTIC RECORDS -->
    <?php
                        $phase1_scholastic_records = "SELECT * FROM scholastic_records
                        WHERE lrn = '$decrypted_lrn' AND phase = '1'";
                        $query_phase1_scholastic_records = mysqli_query($conn, $phase1_scholastic_records) or die (mysqli_error($conn,));
                        $rows = mysqli_fetch_array($query_phase1_scholastic_records);
                        ?>
                        <span>
                            <label>School:</label>
                            <input type="text" id="text-only" name="phase1_sr_school" 
                            value="<?php if(empty($rows['school'])){ echo "";}else{ echo $rows['school'];}?>" class="school">
                            </span>
                        <span>
                            <label>School ID:</label>
                            <input type="text" name="phase1_sr_school_id" id="dash"
                            value="<?php if(empty($rows['school_id'])){ echo "";}else{ echo $rows['school_id'];}?>" class="school_id">
                        </span>
                    </span>
                    <span class="d-flex justify-content-between">
                        <span>
                            <label>District:</label>
                            <input type="text" class="w-50" name="phase1_sr_district" 
                            value="<?php if(empty($rows['district'])){ echo "";}else{ echo $rows['district'];}?>" class="district">
                        </span>
                        <span>
                            <label>Division:</label>
                            <input type="text" class="w-50" name="phase1_sr_division" 
                            value="<?php if(empty($rows['division'])){ echo "";}else{ echo $rows['division'];}?>" class="division">
                        </span>
                        <span class="text-end">
                            <label>Region:</label>
                            <input type="text" class="w-50" name="phase1_sr_region" id="dash"
                            value="<?php if(empty($rows['region'])){ echo "";}else{ echo $rows['region'];}?>" class="region">
                        </span>
                    </span>
                    <span class="d-flex justify-content-between">
                        <span>
                            <label>Classified as Grade:</label>
                            <input type="number" id="number-only" style="width: 20%;" name="phase1_sr_classified_as_grade" 
                            value="<?php if(empty($rows['classified_as_grade'])){ echo "";}else{ echo $rows['classified_as_grade'];}?>" >
                        </span>
                        <span>
                            <label>Section:</label>
                            <input type="text" class="w-50" name="phase1_sr_section" 
                            value="<?php if(empty($rows['section'])){ echo "";}else{ echo $rows['section'];}?>"> 
                        </span>
                        <span>
                            <label>School Year:</label>
                            <input type="text" class="w-50" name="phase1_sr_school_year" id="dash"
                            value="<?php if(empty($rows['school_year'])){ echo "";}else{ echo $rows['school_year'];}?>">
                        </span>
                    </span>
                    <span class="d-flex justify-content-between">
                        <span>
                            <label for="">Name of Adviser:</label>
                            <input type="text" id="text-only" name="phase1_sr_name_of_adviser" 
                            value="<?php if(empty($rows['name_of_teacher'])){ echo "";}else{ echo $rows['name_of_teacher'];}?>">
                        </span>
                        <span>
                            <label>Signature:</label>
                            <input type="text" id="text-only" name="phase1_sr_signature" 
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
                            WHERE student_grades.lrn = '$decrypted_lrn' 
                            AND student_grades.phase = '1' AND student_grades.subject_id = '1'";
                            $query_phase1_mother_tounge = mysqli_query($conn, $phase1_mother_tounge) or die (mysqli_error($conn));
                            
                            ?>
                            <td class="text-start fw-bold">Mother Tongue</td>
                            <?php 
                            if(mysqli_num_rows($query_phase1_mother_tounge) > 0){
                            while($rows = mysqli_fetch_array($query_phase1_mother_tounge)){
                            ?>
                            <td><input type="number" name="phase1_mother_tounge_grades[]" id="grade" 
                            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
                            <?php }}else{?>
                            <td><input type="number" name="phase1_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_mother_tounge_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <?php
                            }
                            ?>
                            <?php
                            $phase1_finalrating_mother_tounge = "SELECT * FROM student_final_ratings
                            WHERE lrn = '$decrypted_lrn' AND subject_id = '1' AND phase = '1'";
                            $query_phase1_finalrating_mother_tounge = mysqli_query($conn, $phase1_finalrating_mother_tounge);
                            if(mysqli_num_rows($query_phase1_finalrating_mother_tounge) > 0){
                            $final_rating = mysqli_fetch_array($query_phase1_finalrating_mother_tounge);
                            ?>
                            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
                            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
                            <?php }else{?>
                            <td></td>
                            <td></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <?php
                                $phase1_filipino = "SELECT * FROM student_grades
                                WHERE student_grades.lrn = '$decrypted_lrn' 
                                AND student_grades.phase = '1' AND student_grades.subject_id = '2'";
                                $query_phase1_filipino = mysqli_query($conn, $phase1_filipino) or die (mysqli_error($conn));
                                
                                ?>
                                <td class="text-start fw-bold">Filipino</td>
                                <?php 
                                if(mysqli_num_rows($query_phase1_filipino) > 0){
                                while($rows = mysqli_fetch_array($query_phase1_filipino)){
                                ?>
                                <td><input type="number" name="phase1_filipino_grades[]" id="grade" 
                                value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
                                <?php }}else{?>
                                <td><input type="number" name="phase1_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <td><input type="number" name="phase1_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <td><input type="number" name="phase1_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <td><input type="number" name="phase1_filipino_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <?php
                                }
                                ?>
                                <?php
                                $phase1_finalrating_filipino = "SELECT * FROM student_final_ratings
                                WHERE lrn = '$decrypted_lrn' AND subject_id = '2' AND phase = '1'";
                                $query_phase1_finalrating_filipino = mysqli_query($conn, $phase1_finalrating_filipino);
                                if(mysqli_num_rows($query_phase1_finalrating_filipino) > 0){
                                $final_rating = mysqli_fetch_array($query_phase1_finalrating_filipino);
                                ?>
                                <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
                                <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
                                <?php }else{?>
                                <td></td>
                                <td></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <?php
                                $phase1_english = "SELECT * FROM student_grades
                                WHERE student_grades.lrn = '$decrypted_lrn' 
                                AND student_grades.phase = '1' AND student_grades.subject_id = '3'";
                                $query_phase1_english = mysqli_query($conn, $phase1_english) or die (mysqli_error($conn));
                                
                                ?>
                                <td class="text-start fw-bold">English</td>
                                <?php 
                                if(mysqli_num_rows($query_phase1_english) > 0){
                                while($rows = mysqli_fetch_array($query_phase1_english)){
                                ?>
                                <td><input type="number" name="phase1_english_grades[]" id="grade" 
                                value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
                                <?php }}else{?>
                                <td><input type="number" name="phase1_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <td><input type="number" name="phase1_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <td><input type="number" name="phase1_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <td><input type="number" name="phase1_english_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <?php
                                }
                                ?>
                                <?php
                                $phase1_finalrating_english = "SELECT * FROM student_final_ratings
                                WHERE lrn = '$decrypted_lrn' AND subject_id = '3' AND phase = '1'";
                                $query_phase1_finalrating_english = mysqli_query($conn, $phase1_finalrating_english);
                                if(mysqli_num_rows($query_phase1_finalrating_english) > 0){
                                $final_rating = mysqli_fetch_array($query_phase1_finalrating_english);
                                ?>
                                <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
                                <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
                                <?php }else{?>
                                <td></td>
                                <td></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <?php
                                $phase1_math = "SELECT * FROM student_grades
                                WHERE student_grades.lrn = '$decrypted_lrn' 
                                AND student_grades.phase = '1' AND student_grades.subject_id = '4'";
                                $query_phase1_math = mysqli_query($conn, $phase1_math) or die (mysqli_error($conn));
                                
                                ?>
                                <td class="text-start fw-bold">Mathematics</td>
                                <?php 
                                if(mysqli_num_rows($query_phase1_math) > 0){
                                while($rows = mysqli_fetch_array($query_phase1_math)){
                                ?>
                                <td><input type="number" name="phase1_math_grades[]" id="grade" 
                                value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
                                <?php }}else{?>
                                <td><input type="number" name="phase1_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <td><input type="number" name="phase1_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <td><input type="number" name="phase1_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <td><input type="number" name="phase1_math_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <?php
                                }
                                ?>
                                <?php
                                $phase1_finalrating_math = "SELECT * FROM student_final_ratings
                                WHERE lrn = '$decrypted_lrn' AND subject_id = '4' AND phase = '1'";
                                $query_phase1_finalrating_math = mysqli_query($conn, $phase1_finalrating_math);
                                if(mysqli_num_rows($query_phase1_finalrating_math) > 0){
                                $final_rating = mysqli_fetch_array($query_phase1_finalrating_math);
                                ?>
                                <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
                                <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
                                <?php }else{?>
                                <td></td>
                                <td></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <?php
                                $phase1_science = "SELECT * FROM student_grades
                                WHERE student_grades.lrn = '$decrypted_lrn' 
                                AND student_grades.phase = '1' AND student_grades.subject_id = '5'";
                                $query_phase1_science = mysqli_query($conn, $phase1_science) or die (mysqli_error($conn));
                                
                                ?>
                                <td class="text-start fw-bold">Science</td>
                                <?php 
                                if(mysqli_num_rows($query_phase1_science) > 0){
                                while($rows = mysqli_fetch_array($query_phase1_science)){
                                ?>
                                <td><input type="number" name="phase1_science_grades[]" id="grade" 
                                value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
                                <?php }}else{?>
                                <td><input type="number" name="phase1_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <td><input type="number" name="phase1_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <td><input type="number" name="phase1_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <td><input type="number" name="phase1_science_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <?php
                                }
                                ?>
                                <?php
                                $phase1_finalrating_science = "SELECT * FROM student_final_ratings
                                WHERE lrn = '$decrypted_lrn' AND subject_id = '5' AND phase = '1'";
                                $query_phase1_finalrating_science = mysqli_query($conn, $phase1_finalrating_science);
                                if(mysqli_num_rows($query_phase1_finalrating_science) > 0){
                                $final_rating = mysqli_fetch_array($query_phase1_finalrating_science);
                                ?>
                                <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
                                <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
                                <?php }else{?>
                                <td></td>
                                <td></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <?php
                                $phase1_araling_panlipunan = "SELECT * FROM student_grades
                                WHERE student_grades.lrn = '$decrypted_lrn' 
                                AND student_grades.phase = '1' AND student_grades.subject_id = '6'";
                                $query_phase1_araling_panlipunan= mysqli_query($conn, $phase1_araling_panlipunan) or die (mysqli_error($conn));
                                
                                ?>
                                <td class="text-start fw-bold">Araling Panlipunan</td>
                                <?php 
                                if(mysqli_num_rows($query_phase1_araling_panlipunan) > 0){
                                while($rows = mysqli_fetch_array($query_phase1_araling_panlipunan)){
                                ?>
                                <td><input type="number" name="phase1_araling_panlipunan_grades[]" id="grade" 
                                value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
                                <?php }}else{?>
                                <td><input type="number" name="phase1_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <td><input type="number" name="phase1_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <td><input type="number" name="phase1_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <td><input type="number" name="phase1_araling_panlipunan_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <?php
                                }
                                ?>
                                <?php
                                $phase1_finalrating_araling_panlipunan = "SELECT * FROM student_final_ratings
                                WHERE lrn = '$decrypted_lrn' AND subject_id = '6' AND phase = '1'";
                                $query_phase1_finalrating_araling_panlipunan= mysqli_query($conn, $phase1_finalrating_araling_panlipunan);
                                if(mysqli_num_rows($query_phase1_finalrating_araling_panlipunan) > 0){
                                $final_rating = mysqli_fetch_array($query_phase1_finalrating_araling_panlipunan);
                                ?>
                                <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
                                <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
                                <?php }else{?>
                                <td></td>
                                <td></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <?php
                                $phase1_epp_tle = "SELECT * FROM student_grades
                                WHERE student_grades.lrn = '$decrypted_lrn' 
                                AND student_grades.phase = '1' AND student_grades.subject_id = '7'";
                                $query_phase1_epp_tle= mysqli_query($conn, $phase1_epp_tle) or die (mysqli_error($conn));
                                
                                ?>
                                <td class="text-start fw-bold">EPP/TLE</td>
                                <?php 
                                if(mysqli_num_rows($query_phase1_epp_tle) > 0){
                                while($rows = mysqli_fetch_array($query_phase1_epp_tle)){
                                ?>
                                <td><input type="number" name="phase1_epp_tle_grades[]" id="grade" 
                                value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
                                <?php }}else{?>
                                <td><input type="number" name="phase1_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <td><input type="number" name="phase1_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <td><input type="number" name="phase1_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <td><input type="number" name="phase1_epp_tle_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                                <?php
                                }
                                ?>
                                <?php
                                $phase1_finalrating_epp_tle = "SELECT * FROM student_final_ratings
                                WHERE lrn = '$decrypted_lrn' AND subject_id = '7' AND phase = '1'";
                                $query_phase1_finalrating_epp_tle= mysqli_query($conn, $phase1_finalrating_epp_tle);
                                if(mysqli_num_rows($query_phase1_finalrating_epp_tle) > 0){
                                $final_rating = mysqli_fetch_array($query_phase1_finalrating_epp_tle);
                                ?>
                                <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
                                <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
                                <?php }else{?>
                                <td></td>
                                <td></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <?php
                                $phase1_mapeh = "SELECT * FROM student_grades
                                WHERE student_grades.lrn = '$decrypted_lrn' 
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
                                WHERE lrn = '$decrypted_lrn' AND subject_id = '8' AND phase = '1'";
                                $query_phase1_finalrating_mapeh= mysqli_query($conn, $phase1_finalrating_mapeh);
                                if(mysqli_num_rows($query_phase1_finalrating_mapeh) > 0){
                                $final_rating = mysqli_fetch_array($query_phase1_finalrating_mapeh);
                                ?>
                                <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
                                <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
                                <?php }else{?>
                                <td></td>
                                <td></td>
                            <?php } ?>
                        </tr>
                        <tr>
                        <?php
                            $phase1_music = "SELECT * FROM student_grades
                            WHERE student_grades.lrn = '$decrypted_lrn' 
                            AND student_grades.phase = '1' AND student_grades.subject_id = '9'";
                            $query_phase1_music= mysqli_query($conn, $phase1_music) or die (mysqli_error($conn));
                            
                            ?>
                            <td class="text-start"><i>Music</i></td>
                            <?php 
                            if(mysqli_num_rows($query_phase1_music) > 0){
                            while($rows = mysqli_fetch_array($query_phase1_music)){
                            ?>
                            <td><input type="number" name="phase1_music_grades[]" id="grade" 
                            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
                            <?php }}else{?>
                            <td><input type="number" name="phase1_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_music_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <?php
                            }
                            ?>
                            <?php
                            $phase1_finalrating_music = "SELECT * FROM student_final_ratings
                            WHERE lrn = '$decrypted_lrn' AND subject_id = '9' AND phase = '1'";
                            $query_phase1_finalrating_music= mysqli_query($conn, $phase1_finalrating_music);
                            if(mysqli_num_rows($query_phase1_finalrating_music) > 0){
                            $final_rating = mysqli_fetch_array($query_phase1_finalrating_music);
                            ?>
                            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
                            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
                            <?php }else{?>
                            <td></td>
                            <td></td>
                        <?php } ?>
                        </tr>


                        <tr>
                        <?php
                            $phase1_art = "SELECT * FROM student_grades
                            WHERE student_grades.lrn = '$decrypted_lrn' 
                            AND student_grades.phase = '1' AND student_grades.subject_id = '10'";
                            $query_phase1_art= mysqli_query($conn, $phase1_art) or die (mysqli_error($conn));
                            
                            ?>
                            <td class="text-start"><i>Arts</i></td>
                            <?php 
                            if(mysqli_num_rows($query_phase1_art) > 0){
                            while($rows = mysqli_fetch_array($query_phase1_art)){
                            ?>
                            <td><input type="number" name="phase1_art_grades[]" id="grade" 
                            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
                            <?php }}else{?>
                            <td><input type="number" name="phase1_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_art_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <?php
                            }
                            ?>
                            <?php
                            $phase1_finalrating_art = "SELECT * FROM student_final_ratings
                            WHERE lrn = '$decrypted_lrn' AND subject_id = '10' AND phase = '1'";
                            $query_phase1_finalrating_art= mysqli_query($conn, $phase1_finalrating_art);
                            if(mysqli_num_rows($query_phase1_finalrating_art) > 0){
                            $final_rating = mysqli_fetch_array($query_phase1_finalrating_art);
                            ?>
                            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
                            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
                            <?php }else{?>
                            <td></td>
                            <td></td>
                        <?php } ?>
                        </tr>

                        
                        <tr>
                        <?php
                            $phase1_pe = "SELECT * FROM student_grades
                            WHERE student_grades.lrn = '$decrypted_lrn' 
                            AND student_grades.phase = '1' AND student_grades.subject_id = '11'";
                            $query_phase1_pe= mysqli_query($conn, $phase1_pe) or die (mysqli_error($conn));
                            
                            ?>
                            <td class="text-start"><i>Physical Education</i></td>
                            <?php 
                            if(mysqli_num_rows($query_phase1_pe) > 0){
                            while($rows = mysqli_fetch_array($query_phase1_pe)){
                            ?>
                            <td><input type="number" name="phase1_pe_grades[]" id="grade" 
                            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
                            <?php }}else{?>
                            <td><input type="number" name="phase1_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_pe_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <?php
                            }
                            ?>
                            <?php
                            $phase1_finalrating_pe = "SELECT * FROM student_final_ratings
                            WHERE lrn = '$decrypted_lrn' AND subject_id = '11' AND phase = '1'";
                            $query_phase1_finalrating_pe= mysqli_query($conn, $phase1_finalrating_pe);
                            if(mysqli_num_rows($query_phase1_finalrating_pe) > 0){
                            $final_rating = mysqli_fetch_array($query_phase1_finalrating_pe);
                            ?>
                            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
                            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
                            <?php }else{?>
                            <td></td>
                            <td></td>
                        <?php } ?>
                        </tr>


                        <tr>
                        <?php
                            $phase1_health = "SELECT * FROM student_grades
                            WHERE student_grades.lrn = '$decrypted_lrn' 
                            AND student_grades.phase = '1' AND student_grades.subject_id = '12'";
                            $query_phase1_health= mysqli_query($conn, $phase1_health) or die (mysqli_error($conn));
                            
                            ?>
                            <td class="text-start"><i>Health</i></td>
                            <?php 
                            if(mysqli_num_rows($query_phase1_health) > 0){
                            while($rows = mysqli_fetch_array($query_phase1_health)){
                            ?>
                            <td><input type="number" name="phase1_health_grades[]" id="grade" 
                            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
                            <?php }}else{?>
                            <td><input type="number" name="phase1_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_health_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <?php
                            }
                            ?>
                            <?php
                            $phase1_finalrating_health = "SELECT * FROM student_final_ratings
                            WHERE lrn = '$decrypted_lrn' AND subject_id = '12' AND phase = '1'";
                            $query_phase1_finalrating_health= mysqli_query($conn, $phase1_finalrating_health);
                            if(mysqli_num_rows($query_phase1_finalrating_health) > 0){
                            $final_rating = mysqli_fetch_array($query_phase1_finalrating_health);
                            ?>
                            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
                            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
                            <?php }else{?>
                            <td></td>
                            <td></td>
                        <?php } ?>
                        </tr>


                        <tr>
                        <?php
                            $phase1_esp = "SELECT * FROM student_grades
                            WHERE student_grades.lrn = '$decrypted_lrn' 
                            AND student_grades.phase = '1' AND student_grades.subject_id = '13'";
                            $query_phase1_esp= mysqli_query($conn, $phase1_esp) or die (mysqli_error($conn));
                            
                            ?>
                            <td class="text-start fw-bold">Edukasyon sa Pagpapakatao</td>
                            <?php 
                            if(mysqli_num_rows($query_phase1_esp) > 0){
                            while($rows = mysqli_fetch_array($query_phase1_esp)){
                            ?>
                            <td><input type="number" name="phase1_esp_grades[]" id="grade" 
                            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
                            <?php }}else{?>
                            <td><input type="number" name="phase1_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_esp_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <?php
                            }
                            ?>
                            <?php
                            $phase1_finalrating_esp = "SELECT * FROM student_final_ratings
                            WHERE lrn = '$decrypted_lrn' AND subject_id = '13' AND phase = '1'";
                            $query_phase1_finalrating_esp= mysqli_query($conn, $phase1_finalrating_esp);
                            if(mysqli_num_rows($query_phase1_finalrating_esp) > 0){
                            $final_rating = mysqli_fetch_array($query_phase1_finalrating_esp);
                            ?>
                            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
                            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
                            <?php }else{?>
                            <td></td>
                            <td></td>
                        <?php } ?>
                        </tr>


                        <tr>
                        <?php
                            $phase1_arabic_lang = "SELECT * FROM student_grades
                            WHERE student_grades.lrn = '$decrypted_lrn' 
                            AND student_grades.phase = '1' AND student_grades.subject_id = '14'";
                            $query_phase1_arabic_lang= mysqli_query($conn, $phase1_arabic_lang) or die (mysqli_error($conn));
                            
                            ?>
                            <td class="text-start">*Arabic Language</td>
                            <?php 
                            if(mysqli_num_rows($query_phase1_arabic_lang) > 0){
                            while($rows = mysqli_fetch_array($query_phase1_arabic_lang)){
                            ?>
                            <td><input type="number" name="phase1_arabic_lang_grades[]" id="grade" 
                            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
                            <?php }}else{?>
                            <td><input type="number" name="phase1_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_arabic_lang_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <?php
                            }
                            ?>
                            <?php
                            $phase1_finalrating_arabic_lang = "SELECT * FROM student_final_ratings
                            WHERE lrn = '$decrypted_lrn' AND subject_id = '14' AND phase = '1'";
                            $query_phase1_finalrating_arabic_lang= mysqli_query($conn, $phase1_finalrating_arabic_lang);
                            if(mysqli_num_rows($query_phase1_finalrating_arabic_lang) > 0){
                            $final_rating = mysqli_fetch_array($query_phase1_finalrating_arabic_lang);
                            ?>
                            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
                            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
                            <?php }else{?>
                            <td></td>
                            <td></td>
                        <?php } ?>
                        </tr>


                        <tr>
                        <?php
                            $phase1_islamic_values = "SELECT * FROM student_grades
                            WHERE student_grades.lrn = '$decrypted_lrn' 
                            AND student_grades.phase = '1' AND student_grades.subject_id = '15'";
                            $query_phase1_islamic_values= mysqli_query($conn, $phase1_islamic_values) or die (mysqli_error($conn));
                            
                            ?>
                            <td class="text-start">*Islamic Values Education</td>
                            <?php 
                            if(mysqli_num_rows($query_phase1_islamic_values) > 0){
                            while($rows = mysqli_fetch_array($query_phase1_islamic_values)){
                            ?>
                            <td><input type="number" name="phase1_islamic_values_grades[]" id="grade" 
                            value="<?php if($rows['grade'] == 0){ echo ""; }else{ echo $rows['grade'];}?>" title="Please input 2 Numbers only" ></td>
                            <?php }}else{?>
                            <td><input type="number" name="phase1_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <td><input type="number" name="phase1_islamic_values_grades[]" id="grade" title="Please input 2 Numbers only" ></td>
                            <?php
                            }
                            ?>
                            <?php
                            $phase1_finalrating_islamic_values = "SELECT * FROM student_final_ratings
                            WHERE lrn = '$decrypted_lrn' AND subject_id = '15' AND phase = '1'";
                            $query_phase1_finalrating_islamic_values= mysqli_query($conn, $phase1_finalrating_islamic_values);
                            if(mysqli_num_rows($query_phase1_finalrating_islamic_values) > 0){
                            $final_rating = mysqli_fetch_array($query_phase1_finalrating_islamic_values);
                            ?>
                            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo $final_rating['final_rating'];}?></td>
                            <td><?php if($final_rating['final_rating'] == 0){ echo "";}else{ echo ucwords($final_rating['remarks']);}?></td>
                            <?php }else{?>
                            <td></td>
                            <td></td>
                        <?php } ?>
                        </tr>
                        
                        <tr>
                            <?php
                            $phase1_general_average = "SELECT general_average FROM student_general_averages
                            WHERE lrn = '$decrypted_lrn' AND phase = '1'";
                            $query_phase1_general_average = mysqli_query($conn, $phase1_general_average);
                            ?>
                            <td class="text-start fw-bold">General Average</td>
                            <?php
                            if(mysqli_num_rows($query_phase1_general_average) > 0){
                            while($rows = mysqli_fetch_array($query_phase1_general_average)){
                            ?>
                            <td><?php if($rows['general_average'] == 0 ){ echo "";}else{ echo $rows['general_average'];}?></td>
                            <?php
                            }}else{
                            ?>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        <?php }?>
                        <?php
                        $sql_total_remarks_phase1 = "SELECT final_rating, final_rating, COUNT(remarks) AS 'total_remarks' , lrn FROM student_final_ratings 
                        WHERE phase = '1' AND lrn = '$decrypted_lrn' AND remarks= 'FAILED' ";
                        $run_total_remarks_phase1 = mysqli_query($conn,$sql_total_remarks_phase1);
                        ?>
                        <td>
                            <?php
                            $rows = mysqli_fetch_array($run_total_remarks_phase1);
                            if($rows['total_remarks'] >= 3){
                              echo "RETAINED";
                            }else if ($rows['total_remarks'] == 2){
                                echo "REMEDIAL";
                            }else if($rows['total_remarks'] <= 1){
                                echo "PROMOTED";
                            }else if($rows['total_remarks'] == 15){
                              echo "";
                            }?>
                        </td>
                    </tr>
                    </tbody>
                </table>

  <!-- Remedial Table PHASE 1 -->
  
        <?php
        $phase1_remedial_classes_dates = "SELECT * FROM remedial_classes
        WHERE lrn = '$decrypted_lrn' AND phase = '1'";
        $query_phase1_remedial_classes_dates = mysqli_query($conn, $phase1_remedial_classes_dates);
        if(mysqli_num_rows($query_phase1_remedial_classes_dates) > 0){
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
                  <input type="date" class="datefrom" name="phase1_date_from" 
                  value="<?php if($row['date_from'] == "1970-01-01"){ echo strftime('%d-%m-%Y', strtotime($row['date_from']));
                  }else{ echo strftime('%Y-%m-%d', strtotime($row['date_from']));}?>">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" class="dateto" name="phase1_date_to" 
                  value="<?php if($row['date_to'] == "1970-01-01"){ echo strftime('%d-%m-%Y', strtotime($row['date_to']));
                  }else{ echo strftime('%Y-%m-%d', strtotime($row['date_to']));}?>">
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
        WHERE lrn = '$decrypted_lrn' AND phase = '1' AND term = '1'";
        $query_phase1_remedial_classes_term1 = mysqli_query($conn, $phase1_remedial_classes_term1) or die (mysqli_error($conn));
        $remedial_classes_term1 = mysqli_fetch_array($query_phase1_remedial_classes_term1);
        ?>
        <tbody>
        <tr>
            <td><input type="text" class="learning-areas1" name="phase1_learning_areas1" 
            value="<?php if(empty($remedial_classes_term1['learning_areas'])){ echo "";}else {echo $remedial_classes_term1['learning_areas'];}?>"></td>
            <td><input type="number" id="grade" class="final_rating1" name="phase1_final_rating1" 
            value="<?php if($remedial_classes_term1['final_rating'] == 0){ echo "";}else{ echo $remedial_classes_term1['final_rating'];}?>"></td>
            <td><input type="text" name="phase1_remedial_class_mark1" 
            value="<?php if(empty($remedial_classes_term1['remedial_class_mark'])){ echo "";}else{ echo $remedial_classes_term1['remedial_class_mark'];}?>" id=""></td>
            <td><input type="number" id="grade" name="phase1_recomputed_final_grade1" 
            value="<?php if($remedial_classes_term1['recomputed_final_grade'] == 0){ echo "";}else{echo $remedial_classes_term1['recomputed_final_grade'];}?>" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" name="phase1_remedial_remarks1" 
            value="<?php if(empty($remedial_classes_term1['remarks'])){ echo "";}else{ echo $remedial_classes_term1['remarks'];}?>" id=""></td>
          </tr>
          <?php
          $phase1_remedial_classes_term2 = "SELECT * FROM remedial_classes
          WHERE lrn = '$decrypted_lrn' AND phase = '1' AND term = '2'";
          $query_phase1_remedial_classes_term2 = mysqli_query($conn, $phase1_remedial_classes_term2) or die (mysqli_error($conn));
          $remedial_classes_term2 = mysqli_fetch_array($query_phase1_remedial_classes_term2);
        ?>
          <tr>
            <td><input type="text" class="learning_areas2" name="phase1_learning_areas2"
            value="<?php if(empty($remedial_classes_term2['learning_areas'])){ echo "";}else {echo $remedial_classes_term2['learning_areas'];}?>"></td>
            <td><input type="number" id="grade" class="final_rating2" name="phase1_final_rating2"
            value="<?php if($remedial_classes_term2['final_rating'] == 0){ echo "";}else{ echo $remedial_classes_term2['final_rating'];}?>"></td>
            <td><input type="text" name="phase1_remedial_class_mark2" 
            value="<?php if(empty($remedial_classes_term2['remedial_class_mark'])){ echo "";}else{ echo $remedial_classes_term2['remedial_class_mark'];}?>" id=""> </td>
            <td><input type="number" id="grade" name="phase1_recomputed_final_grade2" 
            value="<?php if($remedial_classes_term2['recomputed_final_grade'] == 0){ echo "";}else{echo $remedial_classes_term2['recomputed_final_grade'];}?>" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text"name="phase1_remedial_remarks2" 
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
                  <input type="date" class="datefrom" name="phase1_date_from">
                </span>
                <span>
                  <label for="">To: </label>
                  <input type="date" class="dateto" name="phase1_date_to">
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
            <td><input type="text" class="learning-areas1" name="phase1_learning_areas1"></td>
            <td><input type="number" id="grade" class="final_rating1" name="phase1_final_rating1"></td>
            <td><input type="text" name="phase1_remedial_class_mark1" id=""></td>
            <td><input type="number" id="grade" name="phase1_recomputed_final_grade1" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text" name="phase1_remedial_remarks1" id=""> </td>
          </tr>
          <tr>
            <td><input type="text" class="learning_areas2" name="phase1_learning_areas2"></td>
            <td><input type="number" id="grade" class="final_rating2" name="phase1_final_rating2"></td>
            <td><input type="text" name="phase1_remedial_class_mark2" id=""> </td>
            <td><input type="number" id="grade" name="phase1_recomputed_final_grade2" pattern="[0-9]{2}" title="Please input 2 Numbers only"></td>
            <td><input type="text"name="phase1_remedial_remarks2" id=""></td>
          </tr>
        </tbody>
      </table>
        <?php }?>
      <input type="submit" name="submit" value="Confirm">

    </form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
  // PHT +8:00 FOR UPDATE AND CREATED DATA//
  date_default_timezone_set('Asia/Manila');
  $date_time_created = date("Y-m-d h:i:s");
  $date_time_updated = date("Y-m-d h:i:s");
  $sg_term = $_POST['sg_term'];

  
    // PHASE 1 OF SCHOLASTIC RECORDS
    $phase1_sr_school = strtoupper($_POST['phase1_sr_school']);
    $phase1_sr_school_id = $_POST['phase1_sr_school_id'];
    $phase1_sr_district = $_POST['phase1_sr_district'];
    $phase1_sr_division = $_POST['phase1_sr_division'];
    $phase1_sr_region = strtoupper($_POST['phase1_sr_region']);
    $phase1_sr_classified_as_grade = $_POST['phase1_sr_classified_as_grade'];
    $phase1_sr_section = ucwords($_POST['phase1_sr_section']);
    $phase1_sr_school_year = $_POST['phase1_sr_school_year'];
    $phase1_sr_name_of_adviser = ucwords($_POST['phase1_sr_name_of_adviser']);
    $phase1_sr_signature = $_POST['phase1_sr_signature'];

    // PHASE 1 TERM 1 - 5 OF STUDENT GRADES IN SCHOLASTIC RECORDS
    $phase1_mother_tounge_grades = $_POST['phase1_mother_tounge_grades'];
    $phase1_filipino_grades = $_POST['phase1_filipino_grades'];
    $phase1_english_grades = $_POST['phase1_english_grades'];
    $phase1_math_grades = $_POST['phase1_math_grades'];
    $phase1_science_grades = $_POST['phase1_science_grades'];
    $phase1_araling_panlipunan_grades = $_POST['phase1_araling_panlipunan_grades'];
    $phase1_epp_tle_grades = $_POST['phase1_epp_tle_grades'];
    $phase1_music_grades = $_POST['phase1_music_grades'];
    $phase1_art_grades = $_POST['phase1_art_grades'];
    $phase1_pe_grades = $_POST['phase1_pe_grades'];
    $phase1_health_grades = $_POST['phase1_health_grades'];
    $phase1_esp_grades = $_POST['phase1_esp_grades'];
    $phase1_arabic_lang_grades = $_POST['phase1_arabic_lang_grades'];
    $phase1_islamic_values_grades = $_POST['phase1_islamic_values_grades'];

    // PHASE 1 REMEDIAL CLASSES
    $phase1_date_from = date("Y-m-d", strtotime($_POST['phase1_date_from']));
    $phase1_date_to = date("Y-m-d", strtotime($_POST['phase1_date_to']));

    // PHASE 1 REMEDIAL CLASSES LEARNING AREAS LINE 1
    $phase1_learning_areas1 = $_POST['phase1_learning_areas1'];
    $phase1_final_rating1 = $_POST['phase1_final_rating1'];
    $phase1_remedial_class_mark1 = $_POST['phase1_remedial_class_mark1'];
    $phase1_recomputed_final_grade1 = $_POST['phase1_recomputed_final_grade1'];
    $phase1_remedial_remarks1 = $_POST['phase1_remedial_remarks1'];

    // PHASE 1 REMEDIAL CLASSES LEARNING AREAS LINE 2
    $phase1_learning_areas2 = $_POST['phase1_learning_areas2'];
    $phase1_final_rating2 = $_POST['phase1_final_rating2'];
    $phase1_remedial_class_mark2 = $_POST['phase1_remedial_class_mark2'];
    $phase1_recomputed_final_grade2 = $_POST['phase1_recomputed_final_grade2'];
    $phase1_remedial_remarks2 = $_POST['phase1_remedial_remarks2'];


    // PHASE 1 AVERAGE(FINAL RATING) OF EVERY SUBJECTS
    $phase1_mother_tounge_count = count(array_filter($phase1_mother_tounge_grades));
    if($phase1_mother_tounge_count == 0){
        $phase1_ave_of_mother_tounge_grades = 0;
    }else{
        $phase1_ave_of_mother_tounge_grades = array_sum($phase1_mother_tounge_grades)/$phase1_mother_tounge_count;
    }

    $phase1_filipino_grades_count = count(array_filter($phase1_filipino_grades));
    if($phase1_filipino_grades_count == 0){
        $phase1_ave_of_filipino_grades = 0;
    }else{
        $phase1_ave_of_filipino_grades = array_sum($phase1_filipino_grades)/$phase1_filipino_grades_count;
    }

    $phase1_english_grades_count = count(array_filter($phase1_english_grades));
    if($phase1_english_grades_count == 0){
        $phase1_ave_of_english_grades = 0;
    }else{
        $phase1_ave_of_english_grades = array_sum($phase1_english_grades)/$phase1_english_grades_count;
    }

    $phase1_math_grades_count = count(array_filter($phase1_math_grades));
    if($phase1_english_grades_count == 0){
        $phase1_ave_of_math_grades = 0;
    }else{
        $phase1_ave_of_math_grades = array_sum($phase1_math_grades)/$phase1_math_grades_count;
    }

    $phase1_science_grades_count = count(array_filter($phase1_science_grades));
    if($phase1_science_grades_count == 0){
        $phase1_ave_of_science_grades = 0;
    }else{
        $phase1_ave_of_science_grades = array_sum($phase1_science_grades)/$phase1_science_grades_count;
    }
    
    $phase1_araling_panlipunan_grades_count = count(array_filter($phase1_araling_panlipunan_grades));
    if($phase1_araling_panlipunan_grades_count == 0){
        $phase1_ave_of_araling_panlipunan_grades = 0;
    }else{
        $phase1_ave_of_araling_panlipunan_grades = array_sum($phase1_araling_panlipunan_grades)/$phase1_araling_panlipunan_grades_count;
    }

    $phase1_epp_tle_grades_count = count(array_filter($phase1_epp_tle_grades));
    if($phase1_epp_tle_grades_count == 0){
        $phase1_ave_of_epp_tle_grades = 0;
    }else{
        $phase1_ave_of_epp_tle_grades = array_sum($phase1_epp_tle_grades)/$phase1_epp_tle_grades_count;
    }

    $phase1_music_grades_count = count(array_filter($phase1_music_grades));
    if($phase1_music_grades_count == 0){
        $phase1_ave_of_music_grades = 0;
    }else{
        $phase1_ave_of_music_grades = array_sum($phase1_music_grades)/$phase1_music_grades_count;
    }

    $phase1_art_grades_count = count(array_filter($phase1_art_grades));
    if($phase1_art_grades_count == 0){
        $phase1_ave_of_art_grades = 0;
    }else{
        $phase1_ave_of_art_grades = array_sum($phase1_art_grades)/$phase1_art_grades_count;
    }

    $phase1_pe_grades_count = count(array_filter($phase1_pe_grades));
    if($phase1_pe_grades_count == 0){
        $phase1_ave_of_pe_grades = 0;
    }else{
        $phase1_ave_of_pe_grades = array_sum($phase1_pe_grades)/$phase1_pe_grades_count;
    }

    $phase1_health_grades_count = count(array_filter($phase1_health_grades));
    if($phase1_health_grades_count == 0){
        $phase1_ave_of_health_grades = 0;
    }else{
        $phase1_ave_of_health_grades = array_sum($phase1_health_grades)/$phase1_health_grades_count;
    }

    $phase1_esp_grades_count = count(array_filter($phase1_esp_grades));
    if($phase1_esp_grades_count == 0){
        $phase1_ave_of_esp_grades = 0;
    }else{
        $phase1_ave_of_esp_grades = array_sum($phase1_esp_grades)/$phase1_esp_grades_count;
    }

    $phase1_arabic_lang_grades_count = count(array_filter($phase1_arabic_lang_grades));
    if($phase1_arabic_lang_grades_count == 0){
        $phase1_ave_of_arabic_lang_grades = 0;
    }else{
        $phase1_ave_of_arabic_lang_grades = array_sum($phase1_arabic_lang_grades)/$phase1_arabic_lang_grades_count;
    }

    $phase1_islamic_values_grades_count = count(array_filter($phase1_islamic_values_grades));
    if($phase1_islamic_values_grades_count == 0){
        $phase1_ave_of_islamic_values_grades = 0;
    }else{
        $phase1_ave_of_islamic_values_grades = array_sum($phase1_islamic_values_grades)/$phase1_islamic_values_grades_count;
    }

    // PHASE 1 OF UPDATE STUDENT SCHOLASTIC RECORDS
    $check_phase1_student_scholastic_record = "SELECT * FROM scholastic_records WHERE lrn = '$lrn'
    AND phase = '1'";
    $query_check_phase1_student_scholastic_record = mysqli_query($conn, $check_phase1_student_scholastic_record);
    if(mysqli_num_rows($query_check_phase1_student_scholastic_record) > 0){
      $update_phase1_student_scholastic_record = "UPDATE `scholastic_records` SET `lrn`='$lrn',
      `school`='$phase1_sr_school',`school_id`='$phase1_sr_school_id',`district`='$phase1_sr_district',
      `division`='$phase1_sr_division',`region`='$phase1_sr_region',`classified_as_grade`='$phase1_sr_classified_as_grade',
      `section`='$phase1_sr_section',`school_year`='$phase1_sr_school_year',`name_of_teacher`='$phase1_sr_name_of_adviser',
      `signature`='$phase1_sr_signature',`date_time_updated`='$date_time_updated' WHERE `lrn`='$lrn' AND phase = '1'";
      $query_update_phase1_student_scholastic_record = mysqli_query($conn, $update_phase1_student_scholastic_record) or die (mysqli_error($conn));
      if($query_update_phase1_student_scholastic_record == true){
        echo "PHASE 1 STUDENT SCHOLASTIC RECORDS UPDATE SUCCESSFULLY";
      }else{
        echo $conn->error;
      }
    }else{
      $insert_phase1_student_scholastic_record = "INSERT INTO `scholastic_records`(`lrn`, `school`, `school_id`, `district`, `division`, 
      `region`, `classified_as_grade`, `section`, `school_year`, `name_of_teacher`, 
      `signature`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) VALUES 
      ('$lrn','$phase1_sr_school','$phase1_sr_school_id','$phase1_sr_district','$phase1_sr_division',
      '$phase1_sr_region','$phase1_sr_classified_as_grade','$phase1_sr_section','$phase1_sr_school_year','$phase1_sr_name_of_adviser',
      '$phase1_sr_signature','1','none','$date_time_created','$date_time_updated')";
      $query_insert_phase1_student_scholastic_record = mysqli_query($conn, $insert_phase1_student_scholastic_record);
      if($query_insert_phase1_student_scholastic_record == true){
        echo "PHASE 1 STUDENT SCHOLASTIC RECORDS INSERT SUCCESSFULLY";
      }else{
        echo $conn->error;
      }
    }


    // UPDATE OF PHASE 1 TERM 1 - 4 STUDENT GRADES IN SCHOLASTIC RECORDS    
    $phase1_check_mother_tounge_grade = "SELECT * FROM student_grades WHERE lrn = '$decrypted_lrn' AND phase = '1'
    AND subject_id = '1'";
    $query_phase1_check_mother_tounge_grade = mysqli_query($conn, $phase1_check_mother_tounge_grade);
    if(mysqli_num_rows($query_phase1_check_mother_tounge_grade) > 0){
      for($i=0;$i<count($sg_term);$i++){
        $sql_update_phase1_student_mother_tounge_grade = "UPDATE `student_grades` SET `grade`='".$phase1_mother_tounge_grades[$i]."',
        `date_time_updated`='$date_time_updated' WHERE `term`= '".$sg_term[$i]."' AND `lrn` = '$lrn' AND `subject_id` = '1' AND phase = '1'";
        $query_update_phase1_student_mother_tounge_grade = mysqli_query($conn, $sql_update_phase1_student_mother_tounge_grade) or die (mysqli_error($conn));
        }
        if($query_update_phase1_student_mother_tounge_grade == true){
          echo "SUCCESS PHASE 1 MOTHER TOUNGE GRADE UPDATE <br>";
        }else{
          echo $conn->error;
        }
      }else{
      for($i=0;$i<count($sg_term);$i++){
        $sql_insert_phase1_student_mother_tounge_grade = "INSERT INTO `student_grades`(`lrn`, `subject_id`, `grade`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$lrn','1','".$phase1_mother_tounge_grades[$i]."','".$sg_term[$i]."','1','none','$date_time_created')";
        $query_insert_phase1_student_mother_tounge_grade = mysqli_query($conn, $sql_insert_phase1_student_mother_tounge_grade) or die (mysqli_error($conn));
        }
        if($query_insert_phase1_student_mother_tounge_grade == true){
          echo "SUCCESS PHASE 1 MOTHER TOUNGE GRADE INSERT <br>";
        }else{
          echo $conn->error;
        }
    }


    $phase1_check_filipino_grade = "SELECT * FROM student_grades WHERE lrn = '$decrypted_lrn' AND phase = '1'
    AND subject_id = '2'";
    $query_phase1_check_filipino_grade = mysqli_query($conn, $phase1_check_filipino_grade);
    if(mysqli_num_rows($query_phase1_check_filipino_grade) > 0){
      for($i=0;$i<count($sg_term);$i++){
        $sql_update_phase1_student_filipino_grade = "UPDATE `student_grades` SET `grade`='".$phase1_filipino_grades[$i]."',
        `date_time_updated`='$date_time_updated' WHERE `term`= '".$sg_term[$i]."' AND `lrn` = '$lrn' AND `subject_id` = '2' AND phase = '1'";
        $query_update_phase1_student_filipino_grade = mysqli_query($conn, $sql_update_phase1_student_filipino_grade) or die (mysqli_error($conn));
        }
        if($query_update_phase1_student_filipino_grade == true){
          echo "SUCCESS PHASE 1 FILIPINO GRADE UPDATE <br>";
        }else{
          echo $conn->error;
        }
      }else{
      for($i=0;$i<count($sg_term);$i++){
        $sql_insert_phase1_student_filipino_grade = "INSERT INTO `student_grades`(`lrn`, `subject_id`, `grade`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$lrn','2','".$phase1_filipino_grades[$i]."','".$sg_term[$i]."','1','none','$date_time_created')";
        $query_insert_phase1_student_filipino_grade = mysqli_query($conn, $sql_insert_phase1_student_filipino_grade) or die (mysqli_error($conn));
        }
        if($query_insert_phase1_student_filipino_grade == true){
          echo "SUCCESS PHASE 1 FILIPINO GRADE INSERT <br>";
        }else{
          echo $conn->error;
        }
    }


    $phase1_check_english_grade = "SELECT * FROM student_grades WHERE lrn = '$decrypted_lrn' AND phase = '1'
    AND subject_id = '3'";
    $query_phase1_check_english_grade = mysqli_query($conn, $phase1_check_english_grade);
    if(mysqli_num_rows($query_phase1_check_english_grade) > 0){
      for($i=0;$i<count($sg_term);$i++){
        $sql_update_phase1_student_english_grade = "UPDATE `student_grades` SET `grade`='".$phase1_english_grades[$i]."',
        `date_time_updated`='$date_time_updated' WHERE `term`= '".$sg_term[$i]."' AND `lrn` = '$lrn' AND `subject_id` = '3' AND phase = '1'";
        $query_update_phase1_student_english_grade = mysqli_query($conn, $sql_update_phase1_student_english_grade) or die (mysqli_error($conn));
        }
        if($query_update_phase1_student_english_grade == true){
          echo "SUCCESS PHASE 1 ENGLISH GRADE UPDATE <br>";
        }else{
          echo $conn->error;
        }
      }else{
      for($i=0;$i<count($sg_term);$i++){
        $sql_insert_phase1_student_english_grade = "INSERT INTO `student_grades`(`lrn`, `subject_id`, `grade`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$lrn','3','".$phase1_english_grades[$i]."','".$sg_term[$i]."','1','none','$date_time_created')";
        $query_insert_phase1_student_english_grade = mysqli_query($conn, $sql_insert_phase1_student_english_grade) or die (mysqli_error($conn));
        }
        if($query_insert_phase1_student_english_grade == true){
          echo "SUCCESS PHASE 1 ENGLISH GRADE INSERT <br>";
        }else{
          echo $conn->error;
        }
    }


    $phase1_check_math_grade = "SELECT * FROM student_grades WHERE lrn = '$decrypted_lrn' AND phase = '1'
    AND subject_id = '4'";
    $query_phase1_check_math_grade = mysqli_query($conn, $phase1_check_math_grade);
    if(mysqli_num_rows($query_phase1_check_math_grade) > 0){
      for($i=0;$i<count($sg_term);$i++){
        $sql_update_phase1_student_math_grade = "UPDATE `student_grades` SET `grade`='".$phase1_math_grades[$i]."',
        `date_time_updated`='$date_time_updated' WHERE `term`= '".$sg_term[$i]."' AND `lrn` = '$lrn' AND `subject_id` = '4' AND phase = '1'";
        $query_update_phase1_student_math_grade = mysqli_query($conn, $sql_update_phase1_student_math_grade) or die (mysqli_error($conn));
        }
        if($query_update_phase1_student_math_grade == true){
          echo "SUCCESS PHASE 1 MATHEMATICS GRADE UPDATE <br>";
        }else{
          echo $conn->error;
        }
      }else{
      for($i=0;$i<count($sg_term);$i++){
        $sql_insert_phase1_student_math_grade = "INSERT INTO `student_grades`(`lrn`, `subject_id`, `grade`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$lrn','4','".$phase1_math_grades[$i]."','".$sg_term[$i]."','1','none','$date_time_created')";
        $query_insert_phase1_student_math_grade = mysqli_query($conn, $sql_insert_phase1_student_math_grade) or die (mysqli_error($conn));
        }
        if($query_insert_phase1_student_math_grade == true){
          echo "SUCCESS PHASE 1 MATHEMATICS GRADE INSERT <br>";
        }else{
          echo $conn->error;
        }
    }


    $phase1_check_science_grade = "SELECT * FROM student_grades WHERE lrn = '$decrypted_lrn' AND phase = '1'
    AND subject_id = '5'";
    $query_phase1_check_science_grade = mysqli_query($conn, $phase1_check_science_grade);
    if(mysqli_num_rows($query_phase1_check_science_grade) > 0){
      for($i=0;$i<count($sg_term);$i++){
        $sql_update_phase1_student_science_grade = "UPDATE `student_grades` SET `grade`='".$phase1_science_grades[$i]."',
        `date_time_updated`='$date_time_updated' WHERE `term`= '".$sg_term[$i]."' AND `lrn` = '$lrn' AND `subject_id` = '5' AND phase = '1'";
        $query_update_phase1_student_science_grade = mysqli_query($conn, $sql_update_phase1_student_science_grade) or die (mysqli_error($conn));
        }
        if($query_update_phase1_student_science_grade == true){
          echo "SUCCESS PHASE 1 SCIENCE GRADE UPDATE <br>";
        }else{
          echo $conn->error;
        }
      }else{
      for($i=0;$i<count($sg_term);$i++){
        $sql_insert_phase1_student_science_grade = "INSERT INTO `student_grades`(`lrn`, `subject_id`, `grade`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$lrn','5','".$phase1_science_grades[$i]."','".$sg_term[$i]."','1','none','$date_time_created')";
        $query_insert_phase1_student_science_grade = mysqli_query($conn, $sql_insert_phase1_student_science_grade) or die (mysqli_error($conn));
        }
        if($query_insert_phase1_student_science_grade == true){
          echo "SUCCESS PHASE 1 SCIENCE GRADE INSERT <br>";
        }else{
          echo $conn->error;
        }
    }


    $phase1_check_araling_panlipunan_grade = "SELECT * FROM student_grades WHERE lrn = '$decrypted_lrn' AND phase = '1'
    AND subject_id = '6'";
    $query_phase1_check_araling_panlipunan_grade = mysqli_query($conn, $phase1_check_araling_panlipunan_grade);
    if(mysqli_num_rows($query_phase1_check_araling_panlipunan_grade) > 0){
      for($i=0;$i<count($sg_term);$i++){
        $sql_update_phase1_student_araling_panlipunan_grade = "UPDATE `student_grades` SET `grade`='".$phase1_araling_panlipunan_grades[$i]."',
        `date_time_updated`='$date_time_updated' WHERE `term`= '".$sg_term[$i]."' AND `lrn` = '$lrn' AND `subject_id` = '6' AND phase = '1'";
        $query_update_phase1_student_araling_panlipunan_grade = mysqli_query($conn, $sql_update_phase1_student_araling_panlipunan_grade) or die (mysqli_error($conn));
        }
        if($query_update_phase1_student_araling_panlipunan_grade == true){
          echo "SUCCESS PHASE 1 ARALING PANLIPUNAN GRADE UPDATE <br>";
        }else{
          echo $conn->error;
        }
      }else{
      for($i=0;$i<count($sg_term);$i++){
        $sql_insert_phase1_student_araling_panlipunan_grade = "INSERT INTO `student_grades`(`lrn`, `subject_id`, `grade`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$lrn','6','".$phase1_araling_panlipunan_grades[$i]."','".$sg_term[$i]."','1','none','$date_time_created')";
        $query_insert_phase1_student_araling_panlipunan_grade = mysqli_query($conn, $sql_insert_phase1_student_araling_panlipunan_grade) or die (mysqli_error($conn));
        }
        if($query_insert_phase1_student_araling_panlipunan_grade == true){
          echo "SUCCESS PHASE 1 ARALING PANLIPUNAN GRADE INSERT <br>";
        }else{
          echo $conn->error;
        }
    }


    $phase1_check_epp_tle_grade = "SELECT * FROM student_grades WHERE lrn = '$decrypted_lrn' AND phase = '1'
    AND subject_id = '7'";
    $query_phase1_check_epp_tle_grade = mysqli_query($conn, $phase1_check_epp_tle_grade);
    if(mysqli_num_rows($query_phase1_check_epp_tle_grade) > 0){
      for($i=0;$i<count($sg_term);$i++){
        $sql_update_phase1_student_epp_tle_grade = "UPDATE `student_grades` SET `grade`='".$phase1_epp_tle_grades[$i]."',
        `date_time_updated`='$date_time_updated' WHERE `term`= '".$sg_term[$i]."' AND `lrn` = '$lrn' AND `subject_id` = '7' AND phase = '1'";
        $query_update_phase1_student_epp_tle_grade = mysqli_query($conn, $sql_update_phase1_student_epp_tle_grade) or die (mysqli_error($conn));
        }
        if($query_update_phase1_student_epp_tle_grade == true){
          echo "SUCCESS PHASE 1 EPP/TLE GRADE UPDATE <br>";
        }else{
          echo $conn->error;
        }
      }else{
      for($i=0;$i<count($sg_term);$i++){
        $sql_insert_phase1_student_epp_tle_grade = "INSERT INTO `student_grades`(`lrn`, `subject_id`, `grade`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$lrn','7','".$phase1_epp_tle_grades[$i]."','".$sg_term[$i]."','1','none','$date_time_created')";
        $query_insert_phase1_student_epp_tle_grade = mysqli_query($conn, $sql_insert_phase1_student_epp_tle_grade) or die (mysqli_error($conn));
        }
        if($query_insert_phase1_student_epp_tle_grade == true){
          echo "SUCCESS PHASE 1 EPP/TLE GRADE INSERT <br>";
        }else{
          echo $conn->error;
        }
    }


    $phase1_check_music_grade = "SELECT * FROM student_grades WHERE lrn = '$decrypted_lrn' AND phase = '1'
    AND subject_id = '9'";
    $query_phase1_check_music_grade = mysqli_query($conn, $phase1_check_music_grade);
    if(mysqli_num_rows($query_phase1_check_music_grade) > 0){
      for($i=0;$i<count($sg_term);$i++){
        $sql_update_phase1_student_music_grade = "UPDATE `student_grades` SET `grade`='".$phase1_music_grades[$i]."',
        `date_time_updated`='$date_time_updated' WHERE `term`= '".$sg_term[$i]."' AND `lrn` = '$lrn' AND `subject_id` = '9' AND phase = '1'";
        $query_update_phase1_student_music_grade = mysqli_query($conn, $sql_update_phase1_student_music_grade) or die (mysqli_error($conn));
        }
        if($query_update_phase1_student_music_grade == true){
          echo "SUCCESS PHASE 1 MUSIC GRADE UPDATE <br>";
        }else{
          echo $conn->error;
        }
      }else{
      for($i=0;$i<count($sg_term);$i++){
        $sql_insert_phase1_student_music_grade = "INSERT INTO `student_grades`(`lrn`, `subject_id`, `grade`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$lrn','9','".$phase1_music_grades[$i]."','".$sg_term[$i]."','1','none','$date_time_created')";
        $query_insert_phase1_student_music_grade = mysqli_query($conn, $sql_insert_phase1_student_music_grade) or die (mysqli_error($conn));
        }
        if($query_insert_phase1_student_music_grade == true){
          echo "SUCCESS PHASE 1 MUSIC GRADE INSERT <br>";
        }else{
          echo $conn->error;
        }
    }


    $phase1_check_art_grade = "SELECT * FROM student_grades WHERE lrn = '$decrypted_lrn' AND phase = '1'
    AND subject_id = '10'";
    $query_phase1_check_art_grade = mysqli_query($conn, $phase1_check_art_grade);
    if(mysqli_num_rows($query_phase1_check_art_grade) > 0){
      for($i=0;$i<count($sg_term);$i++){
        $sql_update_phase1_student_art_grade = "UPDATE `student_grades` SET `grade`='".$phase1_art_grades[$i]."',
        `date_time_updated`='$date_time_updated' WHERE `term`= '".$sg_term[$i]."' AND `lrn` = '$lrn' AND `subject_id` = '10' AND phase = '1'";
        $query_update_phase1_student_art_grade = mysqli_query($conn, $sql_update_phase1_student_art_grade) or die (mysqli_error($conn));
        }
        if($query_update_phase1_student_art_grade == true){
          echo "SUCCESS PHASE 1 ART GRADE UPDATE <br>";
        }else{
          echo $conn->error;
        }
      }else{
      for($i=0;$i<count($sg_term);$i++){
        $sql_insert_phase1_student_art_grade = "INSERT INTO `student_grades`(`lrn`, `subject_id`, `grade`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$lrn','10','".$phase1_art_grades[$i]."','".$sg_term[$i]."','1','none','$date_time_created')";
        $query_insert_phase1_student_art_grade = mysqli_query($conn, $sql_insert_phase1_student_art_grade) or die (mysqli_error($conn));
        }
        if($query_insert_phase1_student_art_grade == true){
          echo "SUCCESS PHASE 1 ART GRADE INSERT <br>";
        }else{
          echo $conn->error;
        }
    }


    $phase1_check_pe_grade = "SELECT * FROM student_grades WHERE lrn = '$decrypted_lrn' AND phase = '1'
    AND subject_id = '11'";
    $query_phase1_check_pe_grade = mysqli_query($conn, $phase1_check_pe_grade);
    if(mysqli_num_rows($query_phase1_check_pe_grade) > 0){
      for($i=0;$i<count($sg_term);$i++){
        $sql_update_phase1_student_pe_grade = "UPDATE `student_grades` SET `grade`='".$phase1_pe_grades[$i]."',
        `date_time_updated`='$date_time_updated' WHERE `term`= '".$sg_term[$i]."' AND `lrn` = '$lrn' AND `subject_id` = '11' AND phase = '1'";
        $query_update_phase1_student_pe_grade = mysqli_query($conn, $sql_update_phase1_student_pe_grade) or die (mysqli_error($conn));
        }
        if($query_update_phase1_student_pe_grade == true){
          echo "SUCCESS PHASE 1 PE GRADE UPDATE <br>";
        }else{
          echo $conn->error;
        }
      }else{
      for($i=0;$i<count($sg_term);$i++){
        $sql_insert_phase1_student_pe_grade = "INSERT INTO `student_grades`(`lrn`, `subject_id`, `grade`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$lrn','11','".$phase1_pe_grades[$i]."','".$sg_term[$i]."','1','none','$date_time_created')";
        $query_insert_phase1_student_pe_grade = mysqli_query($conn, $sql_insert_phase1_student_pe_grade) or die (mysqli_error($conn));
        }
        if($query_insert_phase1_student_pe_grade == true){
          echo "SUCCESS PHASE 1 PE GRADE INSERT <br>";
        }else{
          echo $conn->error;
        }
    }


    $phase1_check_health_grade = "SELECT * FROM student_grades WHERE lrn = '$decrypted_lrn' AND phase = '1'
    AND subject_id = '12'";
    $query_phase1_check_health_grade = mysqli_query($conn, $phase1_check_health_grade);
    if(mysqli_num_rows($query_phase1_check_health_grade) > 0){
      for($i=0;$i<count($sg_term);$i++){
        $sql_update_phase1_student_health_grade = "UPDATE `student_grades` SET `grade`='".$phase1_health_grades[$i]."',
        `date_time_updated`='$date_time_updated' WHERE `term`= '".$sg_term[$i]."' AND `lrn` = '$lrn' AND `subject_id` = '12' AND phase = '1'";
        $query_update_phase1_student_health_grade = mysqli_query($conn, $sql_update_phase1_student_health_grade) or die (mysqli_error($conn));
        }
        if($query_update_phase1_student_health_grade == true){
          echo "SUCCESS PHASE 1 HEALTH GRADE UPDATE <br>";
        }else{
          echo $conn->error;
        }
      }else{
      for($i=0;$i<count($sg_term);$i++){
        $sql_insert_phase1_student_health_grade = "INSERT INTO `student_grades`(`lrn`, `subject_id`, `grade`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$lrn','12','".$phase1_health_grades[$i]."','".$sg_term[$i]."','1','none','$date_time_created')";
        $query_insert_phase1_student_health_grade = mysqli_query($conn, $sql_insert_phase1_student_health_grade) or die (mysqli_error($conn));
        }
        if($query_insert_phase1_student_health_grade == true){
          echo "SUCCESS PHASE 1 HEALTH GRADE INSERT <br>";
        }else{
          echo $conn->error;
        }
    }


    $phase1_check_esp_grade = "SELECT * FROM student_grades WHERE lrn = '$decrypted_lrn' AND phase = '1'
    AND subject_id = '13'";
    $query_phase1_check_esp_grade = mysqli_query($conn, $phase1_check_esp_grade);
    if(mysqli_num_rows($query_phase1_check_esp_grade) > 0){
      for($i=0;$i<count($sg_term);$i++){
        $sql_update_phase1_student_esp_grade = "UPDATE `student_grades` SET `grade`='".$phase1_esp_grades[$i]."',
        `date_time_updated`='$date_time_updated' WHERE `term`= '".$sg_term[$i]."' AND `lrn` = '$lrn' AND `subject_id` = '13' AND phase = '1'";
        $query_update_phase1_student_esp_grade = mysqli_query($conn, $sql_update_phase1_student_esp_grade) or die (mysqli_error($conn));
        }
        if($query_update_phase1_student_esp_grade == true){
          echo "SUCCESS PHASE 1 ESP GRADE UPDATE <br>";
        }else{
          echo $conn->error;
        }
      }else{
      for($i=0;$i<count($sg_term);$i++){
        $sql_insert_phase1_student_esp_grade = "INSERT INTO `student_grades`(`lrn`, `subject_id`, `grade`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$lrn','13','".$phase1_esp_grades[$i]."','".$sg_term[$i]."','1','none','$date_time_created')";
        $query_insert_phase1_student_esp_grade = mysqli_query($conn, $sql_insert_phase1_student_esp_grade) or die (mysqli_error($conn));
        }
        if($query_insert_phase1_student_esp_grade == true){
          echo "SUCCESS PHASE 1 ESP GRADE INSERT <br>";
        }else{
          echo $conn->error;
        }
    }


    $phase1_check_arabic_lang_grade = "SELECT * FROM student_grades WHERE lrn = '$decrypted_lrn' AND phase = '1'
    AND subject_id = '14'";
    $query_phase1_check_arabic_lang_grade = mysqli_query($conn, $phase1_check_arabic_lang_grade);
    if(mysqli_num_rows($query_phase1_check_arabic_lang_grade) > 0){
      for($i=0;$i<count($sg_term);$i++){
        $sql_update_phase1_student_arabic_lang_grade = "UPDATE `student_grades` SET `grade`='".$phase1_arabic_lang_grades[$i]."',
        `date_time_updated`='$date_time_updated' WHERE `term`= '".$sg_term[$i]."' AND `lrn` = '$lrn' AND `subject_id` = '14' AND phase = '1'";
        $query_update_phase1_student_arabic_lang_grade = mysqli_query($conn, $sql_update_phase1_student_arabic_lang_grade) or die (mysqli_error($conn));
        }
        if($query_update_phase1_student_arabic_lang_grade == true){
          echo "SUCCESS PHASE 1 ARABIC LANGUAGE GRADE UPDATE <br>";
        }else{
          echo $conn->error;
        }
      }else{
      for($i=0;$i<count($sg_term);$i++){
        $sql_insert_phase1_student_arabic_lang_grade = "INSERT INTO `student_grades`(`lrn`, `subject_id`, `grade`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$lrn','14','".$phase1_arabic_lang_grades[$i]."','".$sg_term[$i]."','1','none','$date_time_created')";
        $query_insert_phase1_student_arabic_lang_grade = mysqli_query($conn, $sql_insert_phase1_student_arabic_lang_grade) or die (mysqli_error($conn));
        }
        if($query_insert_phase1_student_arabic_lang_grade == true){
          echo "SUCCESS PHASE 1 ARABIC LANGUAGE GRADE INSERT <br>";
        }else{
          echo $conn->error;
        }
    }


    $phase1_check_islamic_values_grade = "SELECT * FROM student_grades WHERE lrn = '$decrypted_lrn' AND phase = '1'
    AND subject_id = '15'";
    $query_phase1_check_islamic_values_grade = mysqli_query($conn, $phase1_check_islamic_values_grade);
    if(mysqli_num_rows($query_phase1_check_islamic_values_grade) > 0){
      for($i=0;$i<count($sg_term);$i++){
        $sql_update_phase1_student_islamic_values_grade = "UPDATE `student_grades` SET `grade`='".$phase1_islamic_values_grades[$i]."',
        `date_time_updated`='$date_time_updated' WHERE `term`= '".$sg_term[$i]."' AND `lrn` = '$lrn' AND `subject_id` = '15' AND phase = '1'";
        $query_update_phase1_student_islamic_values_grade = mysqli_query($conn, $sql_update_phase1_student_islamic_values_grade) or die (mysqli_error($conn));
        }
        if($query_update_phase1_student_islamic_values_grade == true){
          echo "SUCCESS PHASE 1 ISLAMIC VALUES GRADE UPDATE <br>";
        }else{
          echo $conn->error;
        }
      }else{
      for($i=0;$i<count($sg_term);$i++){
        $sql_insert_phase1_student_islamic_values_grade = "INSERT INTO `student_grades`(`lrn`, `subject_id`, `grade`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$lrn','15','".$phase1_islamic_values_grades[$i]."','".$sg_term[$i]."','1','none','$date_time_created')";
        $query_insert_phase1_student_islamic_values_grade = mysqli_query($conn, $sql_insert_phase1_student_islamic_values_grade) or die (mysqli_error($conn));
        }
        if($query_insert_phase1_student_islamic_values_grade == true){
          echo "SUCCESS PHASE 1 ISLAMIC VALUES GRADE INSERT <br>";
        }else{
          echo $conn->error;
        }
    }

    // PHASE 1 OF AVERAGE OF MAPEH TERM 1 - 4 OF STUDENT SCHOLASTIC RECORD
    $phase1_term_1_get_mapeh = "SELECT AVG(student_grades.grade) FROM student_grades
    WHERE student_grades.subject_id IN ('9', '10', '11', '12') AND student_grades.term = '1'
    AND student_grades.phase = '1' AND student_grades.lrn = '$decrypted_lrn'";
    $query_phase1_term_1_get_mapeh = mysqli_query($conn, $phase1_term_1_get_mapeh);
    $rows = mysqli_fetch_array($query_phase1_term_1_get_mapeh);
    $phase1_term_1_average_mapeh = round($rows['AVG(student_grades.grade)']);
    if($query_phase1_term_1_get_mapeh == true){
        $check_phase1_average_mapeh_term_1 = "SELECT * FROM student_grades
        WHERE lrn = '$decrypted_lrn' AND subject_id = '8' AND phase = '1' AND term = '1'";
        $query_check_phase1_average_mapeh_term_1 = mysqli_query($conn, $check_phase1_average_mapeh_term_1);
        if(mysqli_num_rows($query_check_phase1_average_mapeh_term_1) > 0){
            $update_phase1_average_mapeh_term_1 = "UPDATE `student_grades` SET `grade`='$phase1_term_1_average_mapeh',
            `remarks`='none',`date_time_updated`='$date_time_updated' 
            WHERE `lrn` = '$decrypted_lrn' AND subject_id = '8' AND phase = '1' AND term = '1'";
            $query_update_phase1_average_mapeh_term_1 = mysqli_query($conn, $update_phase1_average_mapeh_term_1);
            if($query_update_phase1_average_mapeh_term_1 == true){
                echo "Phase 1 Average of term 1 of mapeh updated <br>";
            }else{
                echo $conn->error;
            }
        }else{
            $insert_phase1_average_mapeh_term_1 = "INSERT INTO `student_grades`( `lrn`, `subject_id`, `grade`, 
            `term`, `phase`, `remarks`,  `date_time_updated`) VALUES 
            ('$decrypted_lrn','8','$phase1_term_1_average_mapeh','1',
            '1','none','$date_time_created')";
            $query_phase1_average_mapeh_term_1 = mysqli_query($conn, $insert_phase1_average_mapeh_term_1);
            if($query_phase1_average_mapeh_term_1 == true){
                echo "Phase 1 Average of term 1 of mapeh inserted <br>";
            }else{
                echo $conn->error;
            }
        }
    }else{
        echo $conn->error;
    }


    $phase1_term_2_get_mapeh = "SELECT AVG(student_grades.grade) FROM student_grades
    WHERE student_grades.subject_id IN ('9', '10', '11', '12') AND student_grades.term = '2'
    AND student_grades.phase = '1' AND student_grades.lrn = '$decrypted_lrn'";
    $query_phase1_term_2_get_mapeh = mysqli_query($conn, $phase1_term_2_get_mapeh);
    $rows = mysqli_fetch_array($query_phase1_term_2_get_mapeh);
    $phase1_term_2_average_mapeh = round($rows['AVG(student_grades.grade)']);
    if($query_phase1_term_2_get_mapeh == true){
        $check_phase1_average_mapeh_term_2 = "SELECT * FROM student_grades
        WHERE lrn = '$decrypted_lrn' AND subject_id = '8' AND phase = '1' AND term = '2'";
        $query_check_phase1_average_mapeh_term_2 = mysqli_query($conn, $check_phase1_average_mapeh_term_2);
        if(mysqli_num_rows($query_check_phase1_average_mapeh_term_2) > 0){
            $update_phase1_average_mapeh_term_2 = "UPDATE `student_grades` SET `grade`='$phase1_term_2_average_mapeh',
            `remarks`='none',`date_time_updated`='$date_time_updated' 
            WHERE `lrn` = '$decrypted_lrn' AND subject_id = '8' AND phase = '1' AND term = '2'";
            $query_update_phase1_average_mapeh_term_2 = mysqli_query($conn, $update_phase1_average_mapeh_term_2);
            if($query_update_phase1_average_mapeh_term_2 == true){
                echo "Phase 1 Average of term 2 of mapeh updated <br>";
            }else{
                echo $conn->error;
            }
        }else{
            $insert_phase1_average_mapeh_term_2 = "INSERT INTO `student_grades`( `lrn`, `subject_id`, `grade`, 
            `term`, `phase`, `remarks`,  `date_time_updated`) VALUES 
            ('$decrypted_lrn','8','$phase1_term_2_average_mapeh','2',
            '1','none','$date_time_created')";
            $query_phase1_average_mapeh_term_2 = mysqli_query($conn, $insert_phase1_average_mapeh_term_2);
            if($query_phase1_average_mapeh_term_2 == true){
                echo "Phase 1 Average of term 2 of mapeh inserted <br>";
            }else{
                echo $conn->error;
            }
        }
    }else{
        echo $conn->error;
    }


    $phase1_term_3_get_mapeh = "SELECT AVG(student_grades.grade) FROM student_grades
    WHERE student_grades.subject_id IN ('9', '10', '11', '12') AND student_grades.term = '3'
    AND student_grades.phase = '1' AND student_grades.lrn = '$decrypted_lrn'";
    $query_phase1_term_3_get_mapeh = mysqli_query($conn, $phase1_term_3_get_mapeh);
    $rows = mysqli_fetch_array($query_phase1_term_3_get_mapeh);
    $phase1_term_3_average_mapeh = round($rows['AVG(student_grades.grade)']);
    if($query_phase1_term_3_get_mapeh == true){
        $check_phase1_average_mapeh_term_3 = "SELECT * FROM student_grades
        WHERE lrn = '$decrypted_lrn' AND subject_id = '8' AND phase = '1' AND term = '3'";
        $query_check_phase1_average_mapeh_term_3 = mysqli_query($conn, $check_phase1_average_mapeh_term_3);
        if(mysqli_num_rows($query_check_phase1_average_mapeh_term_3) > 0){
            $update_phase1_average_mapeh_term_3 = "UPDATE `student_grades` SET `grade`='$phase1_term_3_average_mapeh',
            `remarks`='none',`date_time_updated`='$date_time_updated' 
            WHERE `lrn` = '$decrypted_lrn' AND subject_id = '8' AND phase = '1' AND term = '3'";
            $query_update_phase1_average_mapeh_term_3 = mysqli_query($conn, $update_phase1_average_mapeh_term_3);
            if($query_update_phase1_average_mapeh_term_3 == true){
                echo "Phase 1 Average of term 3 of mapeh updated <br>";
            }else{
                echo $conn->error;
            }
        }else{
            $insert_phase1_average_mapeh_term_3 = "INSERT INTO `student_grades`( `lrn`, `subject_id`, `grade`, 
            `term`, `phase`, `remarks`,  `date_time_updated`) VALUES 
            ('$decrypted_lrn','8','$phase1_term_3_average_mapeh','3',
            '1','none','$date_time_created')";
            $query_phase1_average_mapeh_term_3 = mysqli_query($conn, $insert_phase1_average_mapeh_term_3);
            if($query_phase1_average_mapeh_term_3 == true){
                echo "Phase 1 Average of term 3 of mapeh inserted <br>";
            }else{
                echo $conn->error;
            }
        }
    }else{
        echo $conn->error;
    }
    
    
    $phase1_term_4_get_mapeh = "SELECT AVG(student_grades.grade) FROM student_grades
    WHERE student_grades.subject_id IN ('9', '10', '11', '12') AND student_grades.term = '4'
    AND student_grades.phase = '1' AND student_grades.lrn = '$decrypted_lrn'";
    $query_phase1_term_4_get_mapeh = mysqli_query($conn, $phase1_term_4_get_mapeh);
    $rows = mysqli_fetch_array($query_phase1_term_4_get_mapeh);
    $phase1_term_4_average_mapeh = round($rows['AVG(student_grades.grade)']);
    if($query_phase1_term_4_get_mapeh == true){
        $check_phase1_average_mapeh_term_4 = "SELECT * FROM student_grades
        WHERE lrn = '$decrypted_lrn' AND subject_id = '8' AND phase = '1' AND term = '4'";
        $query_check_phase1_average_mapeh_term_4 = mysqli_query($conn, $check_phase1_average_mapeh_term_4);
        if(mysqli_num_rows($query_check_phase1_average_mapeh_term_4) > 0){
            $update_phase1_average_mapeh_term_4 = "UPDATE `student_grades` SET `grade`='$phase1_term_4_average_mapeh',
            `remarks`='none',`date_time_updated`='$date_time_updated' 
            WHERE `lrn` = '$decrypted_lrn' AND subject_id = '8' AND phase = '1' AND term = '4'";
            $query_update_phase1_average_mapeh_term_4 = mysqli_query($conn, $update_phase1_average_mapeh_term_4);
            if($query_update_phase1_average_mapeh_term_4 == true){
                echo "Phase 1 Average of term 4 of mapeh updated <br>";
            }else{
                echo $conn->error;
            }
        }else{
            $insert_phase1_average_mapeh_term_4 = "INSERT INTO `student_grades`( `lrn`, `subject_id`, `grade`, 
            `term`, `phase`, `remarks`,  `date_time_updated`) VALUES 
            ('$decrypted_lrn','8','$phase1_term_4_average_mapeh','4',
            '1','none','$date_time_created')";
            $query_phase1_average_mapeh_term_4 = mysqli_query($conn, $insert_phase1_average_mapeh_term_4);
            if($query_phase1_average_mapeh_term_4 == true){
                echo "Phase 1 Average of term 4 of mapeh inserted <br>";
            }else{
                echo $conn->error;
            }
        }
    }else{
        echo $conn->error;
    }

    // PHASE 1 STUDENT FINAL RATING EVERY SUBJECT (SELECT, UPDATE, INSERT QUERIES)
    $phase1_round_off_ave_of_mother_tounge_grades = round($phase1_ave_of_mother_tounge_grades);
    if($phase1_round_off_ave_of_mother_tounge_grades >= 75){
        $remarks = "PASSED";
    }else{
        $remarks = "FAILED";
    }
    $phase1_check_finalrating_mother_tounge_grade = "SELECT * FROM student_final_ratings
    WHERE lrn = '$decrypted_lrn' AND subject_id = '1' AND phase = '1'";
    $query_phase1_check_finalrating_mother_tounge_grade = mysqli_query($conn, $phase1_check_finalrating_mother_tounge_grade);
    if(mysqli_num_rows($query_phase1_check_finalrating_mother_tounge_grade) > 0){
        $phase1_update_finalrating_mother_tounge_grade = "UPDATE student_final_ratings SET 
        final_rating = '$phase1_round_off_ave_of_mother_tounge_grades', remarks = '$remarks', date_time_updated = '$date_time_updated'
        WHERE lrn = '$decrypted_lrn' AND subject_id = '1' AND phase = '1'";
        $query_phase1_update_finalrating_mother_tounge_grade = mysqli_query($conn, $phase1_update_finalrating_mother_tounge_grade);
        if($query_phase1_update_finalrating_mother_tounge_grade == true){
            echo "Phase 1 Student Final Rating Mother Tounge Updated <br>";
        }else{
            echo $conn->error;
        }
    }else{
        $phase1_insert_finalrating_mother_tounge_grade = "INSERT INTO `student_final_ratings`(`lrn`, `subject_id`, 
        `final_rating`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$decrypted_lrn','1','$phase1_round_off_ave_of_mother_tounge_grades',
        'Final Rating','1','$remarks','$date_time_created')";
        $query_phase1_insert_finalrating_mother_tounge_grade = mysqli_query($conn, $phase1_insert_finalrating_mother_tounge_grade);
        if($query_phase1_insert_finalrating_mother_tounge_grade == true){
            echo "Phase 1 Student Final Rating Mother Tounge Inserted <br>";
        }else{
            echo $conn->error;
        }
    }




    $phase1_round_off_ave_of_filipino_grades = round($phase1_ave_of_filipino_grades);
    if($phase1_round_off_ave_of_filipino_grades >= 75){
        $remarks = "PASSED";
    }else{
        $remarks = "FAILED";
    }
    $phase1_check_finalrating_filipino_grade = "SELECT * FROM student_final_ratings
    WHERE lrn = '$decrypted_lrn' AND subject_id = '2' AND phase = '1'";
    $query_phase1_check_finalrating_filipino_grade = mysqli_query($conn, $phase1_check_finalrating_filipino_grade);
    if(mysqli_num_rows($query_phase1_check_finalrating_filipino_grade) > 0){
        $phase1_update_finalrating_filipino_grade = "UPDATE student_final_ratings SET 
        final_rating = '$phase1_round_off_ave_of_filipino_grades', remarks = '$remarks', date_time_updated = '$date_time_updated'
        WHERE lrn = '$decrypted_lrn' AND subject_id = '2' AND phase = '1'";
        $query_phase1_update_finalrating_filipino_grade = mysqli_query($conn, $phase1_update_finalrating_filipino_grade);
        if($query_phase1_update_finalrating_filipino_grade == true){
            echo "Phase 1 Student Final Rating Filipino Updated <br>";
        }else{
            echo $conn->error;
        }
    }else{
        $phase1_insert_finalrating_filipino_grade = "INSERT INTO `student_final_ratings`(`lrn`, `subject_id`, 
        `final_rating`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$decrypted_lrn','2','$phase1_round_off_ave_of_filipino_grades',
        'Final Rating','1','$remarks','$date_time_created')";
        $query_phase1_insert_finalrating_filipino_grade = mysqli_query($conn, $phase1_insert_finalrating_filipino_grade);
        if($query_phase1_insert_finalrating_filipino_grade == true){
            echo "Phase 1 Student Final Rating Filipino Inserted <br>";
        }else{
            echo $conn->error;
        }
    }




    $phase1_round_off_ave_of_english_grades = round($phase1_ave_of_english_grades);
    if($phase1_round_off_ave_of_english_grades >= 75){
        $remarks = "PASSED";
    }else{
        $remarks = "FAILED";
    }
    $phase1_check_finalrating_english_grade = "SELECT * FROM student_final_ratings
    WHERE lrn = '$decrypted_lrn' AND subject_id = '3' AND phase = '1'";
    $query_phase1_check_finalrating_english_grade = mysqli_query($conn, $phase1_check_finalrating_english_grade);
    if(mysqli_num_rows($query_phase1_check_finalrating_english_grade) > 0){
        $phase1_update_finalrating_english_grade = "UPDATE student_final_ratings SET 
        final_rating = '$phase1_round_off_ave_of_english_grades', remarks = '$remarks', date_time_updated = '$date_time_updated'
        WHERE lrn = '$decrypted_lrn' AND subject_id = '3' AND phase = '1'";
        $query_phase1_update_finalrating_english_grade = mysqli_query($conn, $phase1_update_finalrating_english_grade);
        if($query_phase1_update_finalrating_english_grade == true){
            echo "Phase 1 Student Final Rating English Updated <br>";
        }else{
            echo $conn->error;
        }
    }else{
        $phase1_insert_finalrating_english_grade = "INSERT INTO `student_final_ratings`(`lrn`, `subject_id`, 
        `final_rating`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$decrypted_lrn','3','$phase1_round_off_ave_of_english_grades',
        'Final Rating','1','$remarks','$date_time_created')";
        $query_phase1_insert_finalrating_english_grade = mysqli_query($conn, $phase1_insert_finalrating_english_grade);
        if($query_phase1_insert_finalrating_english_grade == true){
            echo "Phase 1 Student Final Rating English Inserted <br>";
        }else{
            echo $conn->error;
        }
    }




    $phase1_round_off_ave_of_math_grades = round($phase1_ave_of_math_grades);
    if($phase1_round_off_ave_of_math_grades >= 75){
        $remarks = "PASSED";
    }else{
        $remarks = "FAILED";
    }
    $phase1_check_finalrating_math_grade = "SELECT * FROM student_final_ratings
    WHERE lrn = '$decrypted_lrn' AND subject_id = '4' AND phase = '1'";
    $query_phase1_check_finalrating_math_grade = mysqli_query($conn, $phase1_check_finalrating_math_grade);
    if(mysqli_num_rows($query_phase1_check_finalrating_math_grade) > 0){
        $phase1_update_finalrating_math_grade = "UPDATE student_final_ratings SET 
        final_rating = '$phase1_round_off_ave_of_math_grades', remarks = '$remarks', date_time_updated = '$date_time_updated'
        WHERE lrn = '$decrypted_lrn' AND subject_id = '4' AND phase = '1'";
        $query_phase1_update_finalrating_math_grade = mysqli_query($conn, $phase1_update_finalrating_math_grade);
        if($query_phase1_update_finalrating_math_grade == true){
            echo "Phase 1 Student Final Rating Mathematics Updated <br>";
        }else{
            echo $conn->error;
        }
    }else{
        $phase1_insert_finalrating_math_grade = "INSERT INTO `student_final_ratings`(`lrn`, `subject_id`, 
        `final_rating`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$decrypted_lrn','4','$phase1_round_off_ave_of_math_grades',
        'Final Rating','1','$remarks','$date_time_created')";
        $query_phase1_insert_finalrating_math_grade = mysqli_query($conn, $phase1_insert_finalrating_math_grade);
        if($query_phase1_insert_finalrating_math_grade == true){
            echo "Phase 1 Student Final Rating Mathematics Inserted <br>";
        }else{
            echo $conn->error;
        }
    }




    $phase1_round_off_ave_of_science_grades = round($phase1_ave_of_science_grades);
    if($phase1_round_off_ave_of_science_grades >= 75){
        $remarks = "PASSED";
    }else{
        $remarks = "FAILED";
    }
    $phase1_check_finalrating_science_grade = "SELECT * FROM student_final_ratings
    WHERE lrn = '$decrypted_lrn' AND subject_id = '5' AND phase = '1'";
    $query_phase1_check_finalrating_science_grade = mysqli_query($conn, $phase1_check_finalrating_science_grade);
    if(mysqli_num_rows($query_phase1_check_finalrating_science_grade) > 0){
        $phase1_update_finalrating_science_grade = "UPDATE student_final_ratings SET 
        final_rating = '$phase1_round_off_ave_of_science_grades', remarks = '$remarks', date_time_updated = '$date_time_updated'
        WHERE lrn = '$decrypted_lrn' AND subject_id = '5' AND phase = '1'";
        $query_phase1_update_finalrating_science_grade = mysqli_query($conn, $phase1_update_finalrating_science_grade);
        if($query_phase1_update_finalrating_science_grade == true){
            echo "Phase 1 Student Final Rating Science Updated <br>";
        }else{
            echo $conn->error;
        }
    }else{
        $phase1_insert_finalrating_science_grade = "INSERT INTO `student_final_ratings`(`lrn`, `subject_id`, 
        `final_rating`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$decrypted_lrn','5','$phase1_round_off_ave_of_science_grades',
        'Final Rating','1','$remarks','$date_time_created')";
        $query_phase1_insert_finalrating_science_grade = mysqli_query($conn, $phase1_insert_finalrating_science_grade);
        if($query_phase1_insert_finalrating_science_grade == true){
            echo "Phase 1 Student Final Rating Science Inserted <br>";
        }else{
            echo $conn->error;
        }
    }




    $phase1_round_off_ave_of_araling_panlipunan_grades = round($phase1_ave_of_araling_panlipunan_grades);
    if($phase1_round_off_ave_of_araling_panlipunan_grades >= 75){
        $remarks = "PASSED";
    }else{
        $remarks = "FAILED";
    }
    $phase1_check_finalrating_araling_panlipunan_grade = "SELECT * FROM student_final_ratings
    WHERE lrn = '$decrypted_lrn' AND subject_id = '6' AND phase = '1'";
    $query_phase1_check_finalrating_araling_panlipunan_grade = mysqli_query($conn, $phase1_check_finalrating_araling_panlipunan_grade);
    if(mysqli_num_rows($query_phase1_check_finalrating_araling_panlipunan_grade) > 0){
        $phase1_update_finalrating_araling_panlipunan_grade = "UPDATE student_final_ratings SET 
        final_rating = '$phase1_round_off_ave_of_araling_panlipunan_grades', remarks = '$remarks', date_time_updated = '$date_time_updated'
        WHERE lrn = '$decrypted_lrn' AND subject_id = '6' AND phase = '1'";
        $query_phase1_update_finalrating_araling_panlipunan_grade = mysqli_query($conn, $phase1_update_finalrating_araling_panlipunan_grade);
        if($query_phase1_update_finalrating_araling_panlipunan_grade == true){
            echo "Phase 1 Student Final Rating Araling Panlipunan Updated <br>";
        }else{
            echo $conn->error;
        }
    }else{
        $phase1_insert_finalrating_araling_panlipunan_grade = "INSERT INTO `student_final_ratings`(`lrn`, `subject_id`, 
        `final_rating`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$decrypted_lrn','6','$phase1_round_off_ave_of_araling_panlipunan_grades',
        'Final Rating','1','$remarks','$date_time_created')";
        $query_phase1_insert_finalrating_araling_panlipunan_grade = mysqli_query($conn, $phase1_insert_finalrating_araling_panlipunan_grade);
        if($query_phase1_insert_finalrating_araling_panlipunan_grade == true){
            echo "Phase 1 Student Final Rating Araling Panlipunan Inserted <br>";
        }else{
            echo $conn->error;
        }
    }




    $phase1_round_off_ave_of_epp_tle_grades = round($phase1_ave_of_epp_tle_grades);
    if($phase1_round_off_ave_of_epp_tle_grades >= 75){
        $remarks = "PASSED";
    }else{
        $remarks = "FAILED";
    }
    $phase1_check_finalrating_epp_tle_grade = "SELECT * FROM student_final_ratings
    WHERE lrn = '$decrypted_lrn' AND subject_id = '7' AND phase = '1'";
    $query_phase1_check_finalrating_epp_tle_grade = mysqli_query($conn, $phase1_check_finalrating_epp_tle_grade);
    if(mysqli_num_rows($query_phase1_check_finalrating_epp_tle_grade) > 0){
        $phase1_update_finalrating_epp_tle_grade = "UPDATE student_final_ratings SET 
        final_rating = '$phase1_round_off_ave_of_epp_tle_grades', remarks = '$remarks', date_time_updated = '$date_time_updated'
        WHERE lrn = '$decrypted_lrn' AND subject_id = '7' AND phase = '1'";
        $query_phase1_update_finalrating_epp_tle_grade = mysqli_query($conn, $phase1_update_finalrating_epp_tle_grade);
        if($query_phase1_update_finalrating_epp_tle_grade == true){
            echo "Phase 1 Student Final Rating EPP/TLE Updated <br>";
        }else{
            echo $conn->error;
        }
    }else{
        $phase1_insert_finalrating_epp_tle_grade = "INSERT INTO `student_final_ratings`(`lrn`, `subject_id`, 
        `final_rating`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$decrypted_lrn','7','$phase1_round_off_ave_of_epp_tle_grades',
        'Final Rating','1','$remarks','$date_time_created')";
        $query_phase1_insert_finalrating_epp_tle_grade = mysqli_query($conn, $phase1_insert_finalrating_epp_tle_grade);
        if($query_phase1_insert_finalrating_epp_tle_grade == true){
            echo "Phase 1 Student Final Rating EPP/TLE Inserted <br>";
        }else{
            echo $conn->error;
        }
    }




    $phase1_get_mapeh = "SELECT AVG(student_grades.grade) FROM student_grades
    WHERE student_grades.subject_id = '8' AND student_grades.term IN ('1', '2', '3', '4')
    AND student_grades.phase = '1'
    AND student_grades.lrn = '$decrypted_lrn'";
    $query_mapeh = mysqli_query($conn, $phase1_get_mapeh);
    if($query_mapeh == true){
        $rows = mysqli_fetch_array($query_mapeh);
        $phase1_finalrating_mapeh_grade = round($rows['AVG(student_grades.grade)']);
        if($phase1_finalrating_mapeh_grade >= 75){
            $remarks = "PASSED";
    }else{
        $remarks = "FAILED";
        }
        $phase1_check_finalrating_mapeh_grade = "SELECT * FROM student_final_ratings
        WHERE lrn = '$decrypted_lrn' AND subject_id = '8' AND phase = '1'";
        $query_phase1_check_finalrating_mapeh_grade = mysqli_query($conn, $phase1_check_finalrating_mapeh_grade);
        if(mysqli_num_rows($query_phase1_check_finalrating_mapeh_grade) > 0){
            $update_phase1_finalrating_mapeh_grade = "UPDATE `student_final_ratings` SET `final_rating`='$phase1_finalrating_mapeh_grade',
            `remarks`='$remarks',`date_time_updated`='$date_time_updated' 
            WHERE phase = '1' AND subject_id = '8' AND `lrn` = '$decrypted_lrn'";
            $query_update_phase1_finalrating_mapeh_grade = mysqli_query($conn, $update_phase1_finalrating_mapeh_grade);
            if($query_update_phase1_finalrating_mapeh_grade == true){
                echo "Phase 1 Student Final Rating MAPEH Updated <br>";
            }else{
                echo $conn->error;
            }
        }else{
            $phase1_insert_finalrating_mapeh_grade = "INSERT INTO `student_final_ratings`(`lrn`, `subject_id`, 
            `final_rating`, `term`, `phase`, `remarks`, `date_time_created`) 
            VALUES ('$decrypted_lrn','8','$phase1_finalrating_mapeh_grade',
            'Final Rating','1','$remarks','$date_time_created')";
            $query_phase1_insert_finalrating_mother_tounge_grade = mysqli_query($conn, $phase1_insert_finalrating_mapeh_grade);
            if($query_phase1_insert_finalrating_mother_tounge_grade == true){
                echo "Phase 1 Student Final Rating MAPEH Inserted <br>";
            }else{
                echo $conn->error;
            }
        }
    }else{
        echo $conn->error;
    }




    $phase1_round_off_ave_of_music_grades = round($phase1_ave_of_music_grades);
    if($phase1_round_off_ave_of_music_grades >= 75){
        $remarks = "PASSED";
    }else{
        $remarks = "FAILED";
    }
    $phase1_check_finalrating_music_grade = "SELECT * FROM student_final_ratings
    WHERE lrn = '$decrypted_lrn' AND subject_id = '9' AND phase = '1'";
    $query_phase1_check_finalrating_music_grade = mysqli_query($conn, $phase1_check_finalrating_music_grade);
    if(mysqli_num_rows($query_phase1_check_finalrating_music_grade) > 0){
        $phase1_update_finalrating_music_grade = "UPDATE student_final_ratings SET 
        final_rating = '$phase1_round_off_ave_of_music_grades', remarks = '$remarks', date_time_updated = '$date_time_updated'
        WHERE lrn = '$decrypted_lrn' AND subject_id = '9' AND phase = '1'";
        $query_phase1_update_finalrating_music_grade = mysqli_query($conn, $phase1_update_finalrating_music_grade);
        if($query_phase1_update_finalrating_music_grade == true){
            echo "Phase 1 Student Final Rating Music Updated <br>";
        }else{
            echo $conn->error;
        }
    }else{
        $phase1_insert_finalrating_music_grade = "INSERT INTO `student_final_ratings`(`lrn`, `subject_id`, 
        `final_rating`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$decrypted_lrn','9','$phase1_round_off_ave_of_music_grades',
        'Final Rating','1','$remarks','$date_time_created')";
        $query_phase1_insert_finalrating_music_grade = mysqli_query($conn, $phase1_insert_finalrating_music_grade);
        if($query_phase1_insert_finalrating_music_grade == true){
            echo "Phase 1 Student Final Rating Music Inserted <br>";
        }else{
            echo $conn->error;
        }
    }




    $phase1_round_off_ave_of_art_grades = round($phase1_ave_of_art_grades);
    if($phase1_round_off_ave_of_art_grades >= 75){
        $remarks = "PASSED";
    }else{
        $remarks = "FAILED";
    }
    $phase1_check_finalrating_art_grade = "SELECT * FROM student_final_ratings
    WHERE lrn = '$decrypted_lrn' AND subject_id = '10' AND phase = '1'";
    $query_phase1_check_finalrating_art_grade = mysqli_query($conn, $phase1_check_finalrating_art_grade);
    if(mysqli_num_rows($query_phase1_check_finalrating_art_grade) > 0){
        $phase1_update_finalrating_art_grade = "UPDATE student_final_ratings SET 
        final_rating = '$phase1_round_off_ave_of_art_grades', remarks = '$remarks', date_time_updated = '$date_time_updated'
        WHERE lrn = '$decrypted_lrn' AND subject_id = '10' AND phase = '1'";
        $query_phase1_update_finalrating_art_grade = mysqli_query($conn, $phase1_update_finalrating_art_grade);
        if($query_phase1_update_finalrating_art_grade == true){
            echo "Phase 1 Student Final Rating Art Updated <br>";
        }else{
            echo $conn->error;
        }
    }else{
        $phase1_insert_finalrating_art_grade = "INSERT INTO `student_final_ratings`(`lrn`, `subject_id`, 
        `final_rating`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$decrypted_lrn','10','$phase1_round_off_ave_of_art_grades',
        'Final Rating','1','$remarks','$date_time_created')";
        $query_phase1_insert_finalrating_art_grade = mysqli_query($conn, $phase1_insert_finalrating_art_grade);
        if($query_phase1_insert_finalrating_art_grade == true){
            echo "Phase 1 Student Final Rating Art Inserted <br>";
        }else{
            echo $conn->error;
        }
    }




    $phase1_round_off_ave_of_pe_grades = round($phase1_ave_of_pe_grades);
    if($phase1_round_off_ave_of_pe_grades >= 75){
        $remarks = "PASSED";
    }else{
        $remarks = "FAILED";
    }
    $phase1_check_finalrating_pe_grade = "SELECT * FROM student_final_ratings
    WHERE lrn = '$decrypted_lrn' AND subject_id = '11' AND phase = '1'";
    $query_phase1_check_finalrating_pe_grade = mysqli_query($conn, $phase1_check_finalrating_pe_grade);
    if(mysqli_num_rows($query_phase1_check_finalrating_pe_grade) > 0){
        $phase1_update_finalrating_pe_grade = "UPDATE student_final_ratings SET 
        final_rating = '$phase1_round_off_ave_of_pe_grades', remarks = '$remarks', date_time_updated = '$date_time_updated'
        WHERE lrn = '$decrypted_lrn' AND subject_id = '11' AND phase = '1'";
        $query_phase1_update_finalrating_pe_grade = mysqli_query($conn, $phase1_update_finalrating_pe_grade);
        if($query_phase1_update_finalrating_pe_grade == true){
            echo "Phase 1 Student Final Rating PE Updated <br>";
        }else{
            echo $conn->error;
        }
    }else{
        $phase1_insert_finalrating_pe_grade = "INSERT INTO `student_final_ratings`(`lrn`, `subject_id`, 
        `final_rating`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$decrypted_lrn','11','$phase1_round_off_ave_of_pe_grades',
        'Final Rating','1','$remarks','$date_time_created')";
        $query_phase1_insert_finalrating_pe_grade = mysqli_query($conn, $phase1_insert_finalrating_pe_grade);
        if($query_phase1_insert_finalrating_pe_grade == true){
            echo "Phase 1 Student Final Rating PE Inserted <br>";
        }else{
            echo $conn->error;
        }
    }




    $phase1_round_off_ave_of_health_grades = round($phase1_ave_of_health_grades);
    if($phase1_round_off_ave_of_health_grades >= 75){
        $remarks = "PASSED";
    }else{
        $remarks = "FAILED";
    }
    $phase1_check_finalrating_health_grade = "SELECT * FROM student_final_ratings
    WHERE lrn = '$decrypted_lrn' AND subject_id = '12' AND phase = '1'";
    $query_phase1_check_finalrating_health_grade = mysqli_query($conn, $phase1_check_finalrating_health_grade);
    if(mysqli_num_rows($query_phase1_check_finalrating_health_grade) > 0){
        $phase1_update_finalrating_health_grade = "UPDATE student_final_ratings SET 
        final_rating = '$phase1_round_off_ave_of_health_grades', remarks = '$remarks', date_time_updated = '$date_time_updated'
        WHERE lrn = '$decrypted_lrn' AND subject_id = '12' AND phase = '1'";
        $query_phase1_update_finalrating_health_grade = mysqli_query($conn, $phase1_update_finalrating_health_grade);
        if($query_phase1_update_finalrating_health_grade == true){
            echo "Phase 1 Student Final Rating Health Updated <br>";
        }else{
            echo $conn->error;
        }
    }else{
        $phase1_insert_finalrating_health_grade = "INSERT INTO `student_final_ratings`(`lrn`, `subject_id`, 
        `final_rating`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$decrypted_lrn','12','$phase1_round_off_ave_of_health_grades',
        'Final Rating','1','$remarks','$date_time_created')";
        $query_phase1_insert_finalrating_health_grade = mysqli_query($conn, $phase1_insert_finalrating_health_grade);
        if($query_phase1_insert_finalrating_health_grade == true){
            echo "Phase 1 Student Final Rating Health Inserted <br>";
        }else{
            echo $conn->error;
        }
    }




    $phase1_round_off_ave_of_esp_grades = round($phase1_ave_of_esp_grades);
    if($phase1_round_off_ave_of_esp_grades >= 75){
        $remarks = "PASSED";
    }else{
        $remarks = "FAILED";
    }
    $phase1_check_finalrating_esp_grade = "SELECT * FROM student_final_ratings
    WHERE lrn = '$decrypted_lrn' AND subject_id = '13' AND phase = '1'";
    $query_phase1_check_finalrating_esp_grade = mysqli_query($conn, $phase1_check_finalrating_esp_grade);
    if(mysqli_num_rows($query_phase1_check_finalrating_esp_grade) > 0){
        $phase1_update_finalrating_esp_grade = "UPDATE student_final_ratings SET 
        final_rating = '$phase1_round_off_ave_of_esp_grades', remarks = '$remarks', date_time_updated = '$date_time_updated'
        WHERE lrn = '$decrypted_lrn' AND subject_id = '13' AND phase = '1'";
        $query_phase1_update_finalrating_esp_grade = mysqli_query($conn, $phase1_update_finalrating_esp_grade);
        if($query_phase1_update_finalrating_esp_grade == true){
            echo "Phase 1 Student Final Rating ESP Updated <br>";
        }else{
            echo $conn->error;
        }
    }else{
        $phase1_insert_finalrating_esp_grade = "INSERT INTO `student_final_ratings`(`lrn`, `subject_id`, 
        `final_rating`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$decrypted_lrn','13','$phase1_round_off_ave_of_esp_grades',
        'Final Rating','1','$remarks','$date_time_created')";
        $query_phase1_insert_finalrating_esp_grade = mysqli_query($conn, $phase1_insert_finalrating_esp_grade);
        if($query_phase1_insert_finalrating_esp_grade == true){
            echo "Phase 1 Student Final Rating ESP Inserted <br>";
        }else{
            echo $conn->error;
        }
    }




    $phase1_round_off_ave_of_arabic_lang_grades = round($phase1_ave_of_arabic_lang_grades);
    if($phase1_round_off_ave_of_arabic_lang_grades >= 75){
        $remarks = "PASSED";
    }else{
        $remarks = "FAILED";
    }
    $phase1_check_finalrating_arabic_lang_grade = "SELECT * FROM student_final_ratings
    WHERE lrn = '$decrypted_lrn' AND subject_id = '14' AND phase = '1'";
    $query_phase1_check_finalrating_arabic_lang_grade = mysqli_query($conn, $phase1_check_finalrating_arabic_lang_grade);
    if(mysqli_num_rows($query_phase1_check_finalrating_arabic_lang_grade) > 0){
        $phase1_update_finalrating_arabic_lang_grade = "UPDATE student_final_ratings SET 
        final_rating = '$phase1_round_off_ave_of_arabic_lang_grades', remarks = '$remarks', date_time_updated = '$date_time_updated'
        WHERE lrn = '$decrypted_lrn' AND subject_id = '14' AND phase = '1'";
        $query_phase1_update_finalrating_arabic_lang_grade = mysqli_query($conn, $phase1_update_finalrating_arabic_lang_grade);
        if($query_phase1_update_finalrating_arabic_lang_grade == true){
            echo "Phase 1 Student Final Rating Arabic Language Updated <br>";
        }else{
            echo $conn->error;
        }
    }else{
        $phase1_insert_finalrating_arabic_lang_grade = "INSERT INTO `student_final_ratings`(`lrn`, `subject_id`, 
        `final_rating`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$decrypted_lrn','14','$phase1_round_off_ave_of_arabic_lang_grades',
        'Final Rating','1','$remarks','$date_time_created')";
        $query_phase1_insert_finalrating_arabic_lang_grade = mysqli_query($conn, $phase1_insert_finalrating_arabic_lang_grade);
        if($query_phase1_insert_finalrating_arabic_lang_grade == true){
            echo "Phase 1 Student Final Rating Arabic Language Inserted <br>";
        }else{
            echo $conn->error;
        }
    }




    $phase1_round_off_ave_of_islamic_values_grades = round($phase1_ave_of_islamic_values_grades);
    if($phase1_round_off_ave_of_islamic_values_grades >= 75){
        $remarks = "PASSED";
    }else{
        $remarks = "FAILED";
    }
    $phase1_check_finalrating_islamic_values_grade = "SELECT * FROM student_final_ratings
    WHERE lrn = '$decrypted_lrn' AND subject_id = '15' AND phase = '1'";
    $query_phase1_check_finalrating_islamic_values_grade = mysqli_query($conn, $phase1_check_finalrating_islamic_values_grade);
    if(mysqli_num_rows($query_phase1_check_finalrating_islamic_values_grade) > 0){
        $phase1_update_finalrating_islamic_values_grade = "UPDATE student_final_ratings SET 
        final_rating = '$phase1_round_off_ave_of_islamic_values_grades', remarks = '$remarks', date_time_updated = '$date_time_updated'
        WHERE lrn = '$decrypted_lrn' AND subject_id = '15' AND phase = '1'";
        $query_phase1_update_finalrating_islamic_values_grade = mysqli_query($conn, $phase1_update_finalrating_islamic_values_grade);
        if($query_phase1_update_finalrating_islamic_values_grade == true){
            echo "Phase 1 Student Final Rating Islamic Values Updated <br>";
        }else{
            echo $conn->error;
        }
    }else{
        $phase1_insert_finalrating_islamic_values_grade = "INSERT INTO `student_final_ratings`(`lrn`, `subject_id`, 
        `final_rating`, `term`, `phase`, `remarks`, `date_time_created`) 
        VALUES ('$decrypted_lrn','15','$phase1_round_off_ave_of_islamic_values_grades',
        'Final Rating','1','$remarks','$date_time_created')";
        $query_phase1_insert_finalrating_islamic_values_grade = mysqli_query($conn, $phase1_insert_finalrating_islamic_values_grade);
        if($query_phase1_insert_finalrating_islamic_values_grade == true){
            echo "Phase 1 Student Final Rating Islamic Values Inserted <br>";
        }else{
            echo $conn->error;
        }
    }
}
?>