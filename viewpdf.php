<?php 
include('connection.php');
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$lrn = 109857060083; 
$phase1 = 1;
$phase2 = 2;
$phase3 = 3;
$phase4 = 4;
$phase5 = 5;
$phase6 = 6;
$phase7 = 7;
$phase8 = 8;


$html='
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../pdmes/bootstrap-5.1.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
    <title>PDMES</title>
</head>

<style>
CSS DITO
</style>

    ';

    // leaners and eligibty query

   

    $learners_query = "SELECT * FROM learners_personal_infos  
    LEFT JOIN eligibility_for_elementary_school_enrollment 
    ON learners_personal_infos.lrn = eligibility_for_elementary_school_enrollment.lrn 
    WHERE learners_personal_infos.lrn = '$lrn'";

    $run_learners_query = mysqli_query($conn, $learners_query);
    if(mysqli_num_rows($run_learners_query) > 0){
    $rows = mysqli_fetch_array($run_learners_query);



while(mysqli_fetch_array($run_learners_query));

    
    $html.='

    <h2>LEARNER`S PERSONAL INFORMATION </h2>
    <label for="">LASTNAME: '.$rows['last_name'].' </label> <br>
    <label for="">FIRSTNAME: '.$rows['first_name'].' </label> <br>
    <label for="">MIDDLENAME: '.$rows['middle_name'].' </label><br>
    <label for="">NAMEEXTN(JR,I,II): '.$rows['suffix'].' </label><br>
    <label for="">Learner Reference Number (LRN): '.$rows['lrn'].' </label><br>
    <label for="">Birthdate(mm/yy/dd): '.$rows['birth_date'].' </label><br>
    <label for="">Sex: '.$rows['sex'].' </label><br>

    <h2> ELIGIBITY FOR ELEMENTARY SCHOOL ENROLLMENT </h2>
    <label for="">Credential Presented for grade 1: </label><br>
    <label for="">Name of School: '.$rows['name_of_school'].' </label><br>
    <label for="">School ID: '.$rows['school_id'].' </label><br>
    <label for="">Address of School: '.$rows['address_of_school'].' </label><br>
    <label for="">Address of School: '.$rows['pept_passer'].' </label><br>
    <label for="">Rating: '.$rows['rating'].' </label><br>
    <label for="">Date of Assesment '.$rows['date_of_assessment'].' </label><br>
    
      ';
    
    }


    // phase 1 scohlastic query 

    $phase1_scholastic_query = "SELECT * FROM `scholastic_records` WHERE lrn = '$lrn' AND phase = $phase1";
    $run_phase1_scholastic = mysqli_query($conn,$phase1_scholastic_query);
    if(mysqli_num_rows($run_phase1_scholastic) > 0){
        $rows = mysqli_fetch_array($run_phase1_scholastic);

        while(mysqli_fetch_array($run_phase1_scholastic));

    
        $html.='<h2> Scholastic Record </h2>

        <label for="">School: '.$rows['school'].' </label> <br>
        <label for="">School ID: '.$rows['school_id'].' </label> <br>
        <label for="">District: '.$rows['district'].' </label><br>
        <label for="">Division: '.$rows['division'].' </label><br>
        <label for="">Region: '.$rows['region'].' </label><br>
        <label for="">Classified as Grade: '.$rows['classified_as_grade'].' </label><br>
        <label for="">Section: '.$rows['section'].' </label><br>
        <label for="">School year: '.$rows['school_year'].' </label><br>
        <label for="">Name of adviser: '.$rows['name_of_teacher'].' </label><br>
        <label for="">Signature: '.$rows['signature'].' </label><br>
        ';
    }
    
    //phase 1 term 1 

    for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 1;
        

                if($phase1_subject_id == 1){
            
                            //phase 1 term 1 mother tongue 
                    $phase1_mt = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_mt = mysqli_query($conn,$phase1_mt);
                    if(mysqli_num_rows($run_phase1_mt) > 0){
                        $rows = mysqli_fetch_array($run_phase1_mt);
                        while(mysqli_fetch_array($run_phase1_mt));

                            $html.=' <h2> 1</h2>
                            
                             <label for="">Mother Tongue: '.$rows['grade'].' </label> <br> ';
                        
                        }
                    }

                //phase 1 term 1 filipino

                if($phase1_subject_id == 2 ){
                    $phase1_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_filipino = mysqli_query($conn,$phase1_filipino);
                    if(mysqli_num_rows($run_phase1_filipino) > 0){
                        $rows = mysqli_fetch_array($run_phase1_filipino);
                        while(mysqli_fetch_array($run_phase1_filipino));

                            $html.='
                            <label for="">Filipino: '.$rows['grade'].' </label> <br>  ';
                        
                        }

                
                    }

                // phase 1 term 1 english 

                if($phase1_subject_id == 3 ){
                    $phase1_english = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_english = mysqli_query($conn,$phase1_english);
                    if(mysqli_num_rows($run_phase1_english) > 0){
                        $rows = mysqli_fetch_array($run_phase1_english);
                        while(mysqli_fetch_array($run_phase1_english));

                            $html.='
                            <label for="">English: '.$rows['grade'].' </label> <br>  ';
                        
                        }

                
                    }

                //phase 1 term 1 math

                if($phase1_subject_id == 4 ){
                    $phase1_math = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_math = mysqli_query($conn,$phase1_math);
                    if(mysqli_num_rows($run_phase1_math) > 0){
                        $rows = mysqli_fetch_array($run_phase1_math);
                        while(mysqli_fetch_array($run_phase1_math));

                            $html.='
                            <label for="">Mathematics: '.$rows['grade'].' </label> <br>  ';
                        
                        }   

                
                    }

                    // phase 1 term 1 science

                if($phase1_subject_id == 5 ){
                    $phase1_science = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_science = mysqli_query($conn,$phase1_science);
                    if(mysqli_num_rows($run_phase1_science) > 0){
                        $rows = mysqli_fetch_array($run_phase1_science);
                        while(mysqli_fetch_array($run_phase1_science));

                            $html.='
                            <label for="">Science: '.$rows['grade'].' </label> <br>  ';
                        
                        }

                
                    }


                    // phase 1 term 1 ap
                if($phase1_subject_id == 6 ){
                    $phase1_AP = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_AP = mysqli_query($conn,$phase1_AP);
                    if(mysqli_num_rows($run_phase1_AP) > 0){
                        $rows = mysqli_fetch_array($run_phase1_AP);
                        while(mysqli_fetch_array($run_phase1_AP));

                        $html.='
                        <label for="">Araling Panlipunan: '.$rows['grade'].' </label> <br>  ';
                    
                    }


                }


                // phase 1 term 1 EPP_TLE
                if($phase1_subject_id == 7 ){
                    $phase1_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_ep_tle = mysqli_query($conn,$phase1_epp_tle);
                    if(mysqli_num_rows($run_phase1_ep_tle) > 0){
                        $rows = mysqli_fetch_array($run_phase1_ep_tle);
                        while(mysqli_fetch_array($run_phase1_ep_tle));

                        $html.='
                        <label for="">EPP / TLE: '.$rows['grade'].' </label> <br>  ';
                    
                    }


                }


                // phase 1 term 1 MAPEH
                if($phase1_subject_id == 8 ){
                    $phase1_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_mapeh = mysqli_query($conn,$phase1_mapeh);
                    if(mysqli_num_rows($run_phase1_mapeh) > 0){
                        $rows = mysqli_fetch_array($run_phase1_mapeh);
                        while(mysqli_fetch_array($run_phase1_mapeh));

                        $html.='
                        <label for="">MAPEH: '.$rows['grade'].' </label> <br>  ';
                    
                    }


                }
                
                    // phase 1 term 1 music
                if($phase1_subject_id == 9 ){
                    $phase1_music = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_music = mysqli_query($conn,$phase1_music);
                    if(mysqli_num_rows($run_phase1_music) > 0){
                        $rows = mysqli_fetch_array($run_phase1_music);
                        while(mysqli_fetch_array($run_phase1_music));

                        $html.='
                        <label for="">Music: '.$rows['grade'].' </label> <br>  ';
                    
                    }


                }


                        // phase 1 term 1 arts
                if($phase1_subject_id == 10 ){
                    $phase1_arts = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_arts = mysqli_query($conn,$phase1_arts);
                    if(mysqli_num_rows($run_phase1_arts) > 0){
                        $rows = mysqli_fetch_array($run_phase1_arts);
                        while(mysqli_fetch_array($run_phase1_arts));

                        $html.='
                        <label for="">Arts: '.$rows['grade'].' </label> <br>  ';
                    
                    }


                }


                // phase 1 term 1 PE
                if($phase1_subject_id == 11 ){
                    $phase1_pe = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_pe = mysqli_query($conn,$phase1_pe);
                    if(mysqli_num_rows($run_phase1_pe) > 0){
                        $rows = mysqli_fetch_array($run_phase1_pe);
                        while(mysqli_fetch_array($run_phase1_pe));

                        $html.='
                        <label for="">Physical Education: '.$rows['grade'].' </label> <br>  ';
                    
                    }


                }


                // phase 1 term 1 Health
                if($phase1_subject_id == 12 ){
                    $phase1_health = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_health = mysqli_query($conn,$phase1_health);
                    if(mysqli_num_rows($run_phase1_health) > 0){
                        $rows = mysqli_fetch_array($run_phase1_health);
                        while(mysqli_fetch_array($run_phase1_health));

                        $html.='
                        <label for="">Health: '.$rows['grade'].' </label> <br>  ';
                    
                    }


                }
                

                // phase 1 term 1 eduk sa pag papakatao
                if($phase1_subject_id == 13 ){
                    $phase1_esp = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_esp = mysqli_query($conn,$phase1_esp);
                    if(mysqli_num_rows($run_phase1_esp) > 0){
                        $rows = mysqli_fetch_array($run_phase1_esp);
                        while(mysqli_fetch_array($run_phase1_esp));

                        $html.='
                        <label for="">Eduk. Sa Pagpapakatao: '.$rows['grade'].' </label> <br>  ';
                    
                    }


                }


                // phase 1 term 1 arabic
                if($phase1_subject_id == 14 ){
                    $phase1_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_arabic = mysqli_query($conn,$phase1_arabic);
                    if(mysqli_num_rows($run_phase1_arabic) > 0){
                        $rows = mysqli_fetch_array($run_phase1_arabic);
                        while(mysqli_fetch_array($run_phase1_arabic));

                        $html.='
                        <label for="">*Arabic language: '.$rows['grade'].' </label> <br>  ';
                    
                    }


                }

                
                // phase 1 term 1 islamic
                if($phase1_subject_id == 15 ){
                    $phase1_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_islamic = mysqli_query($conn,$phase1_islamic);
                    if(mysqli_num_rows($run_phase1_islamic) > 0){
                        $rows = mysqli_fetch_array($run_phase1_islamic);
                        while(mysqli_fetch_array($run_phase1_islamic));

                        $html.='
                        <label for="">*Islamic values Education: '.$rows['grade'].' </label> <br>  ';
                    
                    }


                }


                //phase 1 term 1 general average
                if( $phase1_subject_id == 16){
                    $phase1_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$lrn' AND term = '$term' AND  phase = '$phase1'";
                    $run_phase1_term1_general_average = mysqli_query($conn,$phase1_term1_general_average_query);
                    if(mysqli_num_rows($run_phase1_term1_general_average)> 0 ){
                        $rows = mysqli_fetch_array($run_phase1_term1_general_average);
                        $html.='
                        <label for="">General average '.$rows['general_average'].' </label> <br>  ';
                    


                    }
                    


                }

            

    }// ending of for loop ending of phase 1 term 1



    // phase 1 term 2 ////////////////////////////////////////////////

    for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 2;
        
    
                if($phase1_subject_id == 1){
            
                            //phase 1 term 2 mother tongue 
                    $phase1_mt = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_mt = mysqli_query($conn,$phase1_mt);
                    if(mysqli_num_rows($run_phase1_mt) > 0){
                        $rows = mysqli_fetch_array($run_phase1_mt);
                        while(mysqli_fetch_array($run_phase1_mt));
    
                            $html.=' <h2> 2 </h2>
                            <label for="">Mother Tongue: '.$rows['grade'].' </label> <br>  ';
                        
                        }
                    }
    
                //phase 1 term 2 filipino
    
                if($phase1_subject_id == 2 ){
                    $phase1_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_filipino = mysqli_query($conn,$phase1_filipino);
                    if(mysqli_num_rows($run_phase1_filipino) > 0){
                        $rows = mysqli_fetch_array($run_phase1_filipino);
                        while(mysqli_fetch_array($run_phase1_filipino));
    
                            $html.='
                            <label for="">Filipino: '.$rows['grade'].' </label> <br>  ';
                        
                        }
    
                
                    }
    
                // phase 1 term 2 english 
    
                if($phase1_subject_id == 3 ){
                    $phase1_english = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_english = mysqli_query($conn,$phase1_english);
                    if(mysqli_num_rows($run_phase1_english) > 0){
                        $rows = mysqli_fetch_array($run_phase1_english);
                        while(mysqli_fetch_array($run_phase1_english));
    
                            $html.='
                            <label for="">English: '.$rows['grade'].' </label> <br>  ';
                        
                        }
    
                
                    }
    
                //phase 1 term 2 math
    
                if($phase1_subject_id == 4 ){
                    $phase1_math = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_math = mysqli_query($conn,$phase1_math);
                    if(mysqli_num_rows($run_phase1_math) > 0){
                        $rows = mysqli_fetch_array($run_phase1_math);
                        while(mysqli_fetch_array($run_phase1_math));
    
                            $html.='
                            <label for="">Mathematics: '.$rows['grade'].' </label> <br>  ';
                        
                        }   
    
                
                    }
    
                    // phase 1 term 2 science
    
                if($phase1_subject_id == 5 ){
                    $phase1_science = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_science = mysqli_query($conn,$phase1_science);
                    if(mysqli_num_rows($run_phase1_science) > 0){
                        $rows = mysqli_fetch_array($run_phase1_science);
                        while(mysqli_fetch_array($run_phase1_science));
    
                            $html.='
                            <label for="">Science: '.$rows['grade'].' </label> <br>  ';
                        
                        }
    
                
                    }
    
    
                    // phase 1 term 2 ap
                if($phase1_subject_id == 6 ){
                    $phase1_AP = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_AP = mysqli_query($conn,$phase1_AP);
                    if(mysqli_num_rows($run_phase1_AP) > 0){
                        $rows = mysqli_fetch_array($run_phase1_AP);
                        while(mysqli_fetch_array($run_phase1_AP));
    
                        $html.='
                        <label for="">Araling Panlipunan: '.$rows['grade'].' </label> <br>  ';
                    
                    }
    
    
                }
    
    
                // phase 1 term 2 EPP_TLE
                if($phase1_subject_id == 7 ){
                    $phase1_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_ep_tle = mysqli_query($conn,$phase1_epp_tle);
                    if(mysqli_num_rows($run_phase1_ep_tle) > 0){
                        $rows = mysqli_fetch_array($run_phase1_ep_tle);
                        while(mysqli_fetch_array($run_phase1_ep_tle));
    
                        $html.='
                        <label for="">EPP / TLE: '.$rows['grade'].' </label> <br>  ';
                    
                    }
    
    
                }
    
    
                // phase 1 term 2 MAPEH
                if($phase1_subject_id == 8 ){
                    $phase1_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_mapeh = mysqli_query($conn,$phase1_mapeh);
                    if(mysqli_num_rows($run_phase1_mapeh) > 0){
                        $rows = mysqli_fetch_array($run_phase1_mapeh);
                        while(mysqli_fetch_array($run_phase1_mapeh));
    
                        $html.='
                        <label for="">MAPEH: '.$rows['grade'].' </label> <br>  ';
                    
                    }
    
    
                }
                
                    // phase 1 term 2 music
                if($phase1_subject_id == 9 ){
                    $phase1_music = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_music = mysqli_query($conn,$phase1_music);
                    if(mysqli_num_rows($run_phase1_music) > 0){
                        $rows = mysqli_fetch_array($run_phase1_music);
                        while(mysqli_fetch_array($run_phase1_music));
    
                        $html.='
                        <label for="">Music: '.$rows['grade'].' </label> <br>  ';
                    
                    }
    
    
                }
    
    
                        // phase 1 term 2 arts
                if($phase1_subject_id == 10 ){
                    $phase1_arts = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_arts = mysqli_query($conn,$phase1_arts);
                    if(mysqli_num_rows($run_phase1_arts) > 0){
                        $rows = mysqli_fetch_array($run_phase1_arts);
                        while(mysqli_fetch_array($run_phase1_arts));
    
                        $html.='
                        <label for="">Arts: '.$rows['grade'].' </label> <br>  ';
                    
                    }
    
    
                }
    
    
                // phase 1 term 2 PE
                if($phase1_subject_id == 11 ){
                    $phase1_pe = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_pe = mysqli_query($conn,$phase1_pe);
                    if(mysqli_num_rows($run_phase1_pe) > 0){
                        $rows = mysqli_fetch_array($run_phase1_pe);
                        while(mysqli_fetch_array($run_phase1_pe));
    
                        $html.='
                        <label for="">Physical Education: '.$rows['grade'].' </label> <br>  ';
                    
                    }
    
    
                }
    
    
                // phase 1 term 2 Health
                if($phase1_subject_id == 12 ){
                    $phase1_health = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_health = mysqli_query($conn,$phase1_health);
                    if(mysqli_num_rows($run_phase1_health) > 0){
                        $rows = mysqli_fetch_array($run_phase1_health);
                        while(mysqli_fetch_array($run_phase1_health));
    
                        $html.='
                        <label for="">Health: '.$rows['grade'].' </label> <br>  ';
                    
                    }
    
    
                }
                
    
                // phase 1 term 2 eduk sa pag papakatao
                if($phase1_subject_id == 13 ){
                    $phase1_esp = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_esp = mysqli_query($conn,$phase1_esp);
                    if(mysqli_num_rows($run_phase1_esp) > 0){
                        $rows = mysqli_fetch_array($run_phase1_esp);
                        while(mysqli_fetch_array($run_phase1_esp));
    
                        $html.='
                        <label for="">Eduk. Sa Pagpapakatao: '.$rows['grade'].' </label> <br>  ';
                    
                    }
    
    
                }
    
    
                // phase 1 term 2 arabic
                if($phase1_subject_id == 14 ){
                    $phase1_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_arabic = mysqli_query($conn,$phase1_arabic);
                    if(mysqli_num_rows($run_phase1_arabic) > 0){
                        $rows = mysqli_fetch_array($run_phase1_arabic);
                        while(mysqli_fetch_array($run_phase1_arabic));
    
                        $html.='
                        <label for="">*Arabic language: '.$rows['grade'].' </label> <br>  ';
                    
                    }
    
    
                }
    
                
                // phase 1 term 2 islamic
                if($phase1_subject_id == 15 ){
                    $phase1_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_islamic = mysqli_query($conn,$phase1_islamic);
                    if(mysqli_num_rows($run_phase1_islamic) > 0){
                        $rows = mysqli_fetch_array($run_phase1_islamic);
                        while(mysqli_fetch_array($run_phase1_islamic));
    
                        $html.='
                        <label for="">*Islamic values Education: '.$rows['grade'].' </label> <br>  ';
                    
                    }
    
    
                }
    
    
                //phase 1 term 2 general average
                if( $phase1_subject_id == 16){
                    $phase1_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$lrn' AND term = '$term' AND  phase = '$phase1' ";
                    $run_phase1_term1_general_average = mysqli_query($conn,$phase1_term1_general_average_query);
                    if(mysqli_num_rows($run_phase1_term1_general_average)> 0 ){
                        $rows = mysqli_fetch_array($run_phase1_term1_general_average);
                        $html.='
                        <label for="">General average '.$rows['general_average'].' </label> <br>  ';
                    
    
    
                    }
                    
    
    
                }

           
    
    }// ending of for loop ending of phase 1 term 2 
    
                //phase 1 term 3 //////////////////////////////////////////////

for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
    $term = 3;
    

            if($phase1_subject_id == 1){
        
                        //phase 1 term 3 mother tongue 
                $phase1_mt = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_mt = mysqli_query($conn,$phase1_mt);
                if(mysqli_num_rows($run_phase1_mt) > 0){
                    $rows = mysqli_fetch_array($run_phase1_mt);
                    while(mysqli_fetch_array($run_phase1_mt));

                        $html.=' <h2> 3 </h2>
                        <label for="">Mother Tongue: '.$rows['grade'].' </label> <br>  ';
                    
                    }
                }

            //phase 1 term 3 filipino

            if($phase1_subject_id == 2 ){
                $phase1_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_filipino = mysqli_query($conn,$phase1_filipino);
                if(mysqli_num_rows($run_phase1_filipino) > 0){
                    $rows = mysqli_fetch_array($run_phase1_filipino);
                    while(mysqli_fetch_array($run_phase1_filipino));

                        $html.='
                        <label for="">Filipino: '.$rows['grade'].' </label> <br>  ';
                    
                    }

            
                }

            // phase 1 term 3 english 

            if($phase1_subject_id == 3 ){
                $phase1_english = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_english = mysqli_query($conn,$phase1_english);
                if(mysqli_num_rows($run_phase1_english) > 0){
                    $rows = mysqli_fetch_array($run_phase1_english);
                    while(mysqli_fetch_array($run_phase1_english));

                        $html.='
                        <label for="">English: '.$rows['grade'].' </label> <br>  ';
                    
                    }

            
                }

            //phase 1 term 3 math

            if($phase1_subject_id == 4 ){
                $phase1_math = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_math = mysqli_query($conn,$phase1_math);
                if(mysqli_num_rows($run_phase1_math) > 0){
                    $rows = mysqli_fetch_array($run_phase1_math);
                    while(mysqli_fetch_array($run_phase1_math));

                        $html.='
                        <label for="">Mathematics: '.$rows['grade'].' </label> <br>  ';
                    
                    }   

            
                }

                // phase 1 term 3 science

            if($phase1_subject_id == 5 ){
                $phase1_science = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_science = mysqli_query($conn,$phase1_science);
                if(mysqli_num_rows($run_phase1_science) > 0){
                    $rows = mysqli_fetch_array($run_phase1_science);
                    while(mysqli_fetch_array($run_phase1_science));

                        $html.='
                        <label for="">Science: '.$rows['grade'].' </label> <br>  ';
                    
                    }

            
                }


                // phase 1 term 3 ap
            if($phase1_subject_id == 6 ){
                $phase1_AP = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_AP = mysqli_query($conn,$phase1_AP);
                if(mysqli_num_rows($run_phase1_AP) > 0){
                    $rows = mysqli_fetch_array($run_phase1_AP);
                    while(mysqli_fetch_array($run_phase1_AP));

                    $html.='
                    <label for="">Araling Panlipunan: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            // phase 1 term 3 EPP_TLE
            if($phase1_subject_id == 7 ){
                $phase1_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_ep_tle = mysqli_query($conn,$phase1_epp_tle);
                if(mysqli_num_rows($run_phase1_ep_tle) > 0){
                    $rows = mysqli_fetch_array($run_phase1_ep_tle);
                    while(mysqli_fetch_array($run_phase1_ep_tle));

                    $html.='
                    <label for="">EPP / TLE: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            // phase 1 term 3 MAPEH
            if($phase1_subject_id == 8 ){
                $phase1_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_mapeh = mysqli_query($conn,$phase1_mapeh);
                if(mysqli_num_rows($run_phase1_mapeh) > 0){
                    $rows = mysqli_fetch_array($run_phase1_mapeh);
                    while(mysqli_fetch_array($run_phase1_mapeh));

                    $html.='
                    <label for="">MAPEH: '.$rows['grade'].' </label> <br>  ';
                
                }


            }
            
                // phase 1 term 3 music
            if($phase1_subject_id == 9 ){
                $phase1_music = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_music = mysqli_query($conn,$phase1_music);
                if(mysqli_num_rows($run_phase1_music) > 0){
                    $rows = mysqli_fetch_array($run_phase1_music);
                    while(mysqli_fetch_array($run_phase1_music));

                    $html.='
                    <label for="">Music: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


                    // phase 1 term 3 arts
            if($phase1_subject_id == 10 ){
                $phase1_arts = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_arts = mysqli_query($conn,$phase1_arts);
                if(mysqli_num_rows($run_phase1_arts) > 0){
                    $rows = mysqli_fetch_array($run_phase1_arts);
                    while(mysqli_fetch_array($run_phase1_arts));

                    $html.='
                    <label for="">Arts: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            // phase 1 term 3 PE
            if($phase1_subject_id == 11 ){
                $phase1_pe = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_pe = mysqli_query($conn,$phase1_pe);
                if(mysqli_num_rows($run_phase1_pe) > 0){
                    $rows = mysqli_fetch_array($run_phase1_pe);
                    while(mysqli_fetch_array($run_phase1_pe));

                    $html.='
                    <label for="">Physical Education: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            // phase 1 term 3 Health
            if($phase1_subject_id == 12 ){
                $phase1_health = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_health = mysqli_query($conn,$phase1_health);
                if(mysqli_num_rows($run_phase1_health) > 0){
                    $rows = mysqli_fetch_array($run_phase1_health);
                    while(mysqli_fetch_array($run_phase1_health));

                    $html.='
                    <label for="">Health: '.$rows['grade'].' </label> <br>  ';
                
                }


            }
            

            // phase 1 term 3 eduk sa pag papakatao
            if($phase1_subject_id == 13 ){
                $phase1_esp = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_esp = mysqli_query($conn,$phase1_esp);
                if(mysqli_num_rows($run_phase1_esp) > 0){
                    $rows = mysqli_fetch_array($run_phase1_esp);
                    while(mysqli_fetch_array($run_phase1_esp));

                    $html.='
                    <label for="">Eduk. Sa Pagpapakatao: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            // phase 1 term 3 arabic
            if($phase1_subject_id == 14 ){
                $phase1_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_arabic = mysqli_query($conn,$phase1_arabic);
                if(mysqli_num_rows($run_phase1_arabic) > 0){
                    $rows = mysqli_fetch_array($run_phase1_arabic);
                    while(mysqli_fetch_array($run_phase1_arabic));

                    $html.='
                    <label for="">*Arabic language: '.$rows['grade'].' </label> <br>  ';
                
                }


            }

            
            // phase 1 term 3 islamic
            if($phase1_subject_id == 15 ){
                $phase1_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_islamic = mysqli_query($conn,$phase1_islamic);
                if(mysqli_num_rows($run_phase1_islamic) > 0){
                    $rows = mysqli_fetch_array($run_phase1_islamic);
                    while(mysqli_fetch_array($run_phase1_islamic));

                    $html.='
                    <label for="">*Islamic values Education: '.$rows['grade'].' </label> <br>  ';
                    
                
                }


            }


            //phase 1 term 3 general average
            if( $phase1_subject_id == 16){
                $phase1_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$lrn' AND term = '$term' AND  phase = '$phase1' ";
                $run_phase1_term1_general_average = mysqli_query($conn,$phase1_term1_general_average_query);
                if(mysqli_num_rows($run_phase1_term1_general_average)> 0 ){
                    $rows = mysqli_fetch_array($run_phase1_term1_general_average);
                    $html.='
                    <label for="">General average '.$rows['general_average'].' </label> <br>  ';
                


                }
                


            }

    
}// ending of for loop  ending of phase 1 term 3 


//phase 1 term 4 

for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
    $term = 4;
    

            if($phase1_subject_id == 1){
        
                        //phase 1 term 4 mother tongue 
                $phase1_mt = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_mt = mysqli_query($conn,$phase1_mt);
                if(mysqli_num_rows($run_phase1_mt) > 0){
                    $rows = mysqli_fetch_array($run_phase1_mt);
                    while(mysqli_fetch_array($run_phase1_mt));

                        $html.=' <h2> 4 </h2>
                        <label for="">Mother Tongue: '.$rows['grade'].' </label> <br>  ';
                    
                    }
                }

            //phase 1 term 4 filipino

            if($phase1_subject_id == 2 ){
                $phase1_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_filipino = mysqli_query($conn,$phase1_filipino);
                if(mysqli_num_rows($run_phase1_filipino) > 0){
                    $rows = mysqli_fetch_array($run_phase1_filipino);
                    while(mysqli_fetch_array($run_phase1_filipino));

                        $html.='
                        <label for="">Filipino: '.$rows['grade'].' </label> <br>  ';
                    
                    }

            
                }

            // phase 1 term 4 english 

            if($phase1_subject_id == 3 ){
                $phase1_english = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_english = mysqli_query($conn,$phase1_english);
                if(mysqli_num_rows($run_phase1_english) > 0){
                    $rows = mysqli_fetch_array($run_phase1_english);
                    while(mysqli_fetch_array($run_phase1_english));

                        $html.='
                        <label for="">English: '.$rows['grade'].' </label> <br>  ';
                    
                    }

            
                }

            //phase 1 term 4 math

            if($phase1_subject_id == 4 ){
                $phase1_math = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_math = mysqli_query($conn,$phase1_math);
                if(mysqli_num_rows($run_phase1_math) > 0){
                    $rows = mysqli_fetch_array($run_phase1_math);
                    while(mysqli_fetch_array($run_phase1_math));

                        $html.='
                        <label for="">Mathematics: '.$rows['grade'].' </label> <br>  ';
                    
                    }   

            
                }

                // phase 1 term 4 science

            if($phase1_subject_id == 5 ){
                $phase1_science = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_science = mysqli_query($conn,$phase1_science);
                if(mysqli_num_rows($run_phase1_science) > 0){
                    $rows = mysqli_fetch_array($run_phase1_science);
                    while(mysqli_fetch_array($run_phase1_science));

                        $html.='
                        <label for="">Science: '.$rows['grade'].' </label> <br>  ';
                    
                    }

            
                }


                // phase 1 term 4 ap
            if($phase1_subject_id == 6 ){
                $phase1_AP = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_AP = mysqli_query($conn,$phase1_AP);
                if(mysqli_num_rows($run_phase1_AP) > 0){
                    $rows = mysqli_fetch_array($run_phase1_AP);
                    while(mysqli_fetch_array($run_phase1_AP));

                    $html.='
                    <label for="">Araling Panlipunan: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            // phase 1 term 4 EPP_TLE
            if($phase1_subject_id == 7 ){
                $phase1_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_ep_tle = mysqli_query($conn,$phase1_epp_tle);
                if(mysqli_num_rows($run_phase1_ep_tle) > 0){
                    $rows = mysqli_fetch_array($run_phase1_ep_tle);
                    while(mysqli_fetch_array($run_phase1_ep_tle));

                    $html.='
                    <label for="">EPP / TLE: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            // phase 1 term 4 MAPEH
            if($phase1_subject_id == 8 ){
                $phase1_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_mapeh = mysqli_query($conn,$phase1_mapeh);
                if(mysqli_num_rows($run_phase1_mapeh) > 0){
                    $rows = mysqli_fetch_array($run_phase1_mapeh);
                    while(mysqli_fetch_array($run_phase1_mapeh));

                    $html.='
                    <label for="">MAPEH: '.$rows['grade'].' </label> <br>  ';
                
                }


            }
            
                // phase 1 term 4 music
            if($phase1_subject_id == 9 ){
                $phase1_music = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_music = mysqli_query($conn,$phase1_music);
                if(mysqli_num_rows($run_phase1_music) > 0){
                    $rows = mysqli_fetch_array($run_phase1_music);
                    while(mysqli_fetch_array($run_phase1_music));

                    $html.='
                    <label for="">Music: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


                    // phase 1 term 4 arts
            if($phase1_subject_id == 10 ){
                $phase1_arts = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_arts = mysqli_query($conn,$phase1_arts);
                if(mysqli_num_rows($run_phase1_arts) > 0){
                    $rows = mysqli_fetch_array($run_phase1_arts);
                    while(mysqli_fetch_array($run_phase1_arts));

                    $html.='
                    <label for="">Arts: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            // phase 1 term 4 PE
            if($phase1_subject_id == 11 ){
                $phase1_pe = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_pe = mysqli_query($conn,$phase1_pe);
                if(mysqli_num_rows($run_phase1_pe) > 0){
                    $rows = mysqli_fetch_array($run_phase1_pe);
                    while(mysqli_fetch_array($run_phase1_pe));

                    $html.='
                    <label for="">Physical Education: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            // phase 1 term 4 Health
            if($phase1_subject_id == 12 ){
                $phase1_health = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_health = mysqli_query($conn,$phase1_health);
                if(mysqli_num_rows($run_phase1_health) > 0){
                    $rows = mysqli_fetch_array($run_phase1_health);
                    while(mysqli_fetch_array($run_phase1_health));

                    $html.='
                    <label for="">Health: '.$rows['grade'].' </label> <br>  ';
                
                }


            }
            

            // phase 1 term 4 eduk sa pag papakatao
            if($phase1_subject_id == 13 ){
                $phase1_esp = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_esp = mysqli_query($conn,$phase1_esp);
                if(mysqli_num_rows($run_phase1_esp) > 0){
                    $rows = mysqli_fetch_array($run_phase1_esp);
                    while(mysqli_fetch_array($run_phase1_esp));

                    $html.='
                    <label for="">Eduk. Sa Pagpapakatao: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            // phase 1 term 4 arabic
            if($phase1_subject_id == 14 ){
                $phase1_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_arabic = mysqli_query($conn,$phase1_arabic);
                if(mysqli_num_rows($run_phase1_arabic) > 0){
                    $rows = mysqli_fetch_array($run_phase1_arabic);
                    while(mysqli_fetch_array($run_phase1_arabic));

                    $html.='
                    <label for="">*Arabic language: '.$rows['grade'].' </label> <br>  ';
                
                }


            }

            
            // phase 1 term 4 islamic
            if($phase1_subject_id == 15 ){
                $phase1_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_islamic = mysqli_query($conn,$phase1_islamic);
                if(mysqli_num_rows($run_phase1_islamic) > 0){
                    $rows = mysqli_fetch_array($run_phase1_islamic);
                    while(mysqli_fetch_array($run_phase1_islamic));

                    $html.='
                    <label for="">*Islamic values Education: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            //phase 1 term 4 general average
            if( $phase1_subject_id == 16){
                $phase1_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$lrn' AND term = '$term' AND  phase = '$phase1' ";
                $run_phase1_term1_general_average = mysqli_query($conn,$phase1_term1_general_average_query);
                if(mysqli_num_rows($run_phase1_term1_general_average)> 0 ){
                    $rows = mysqli_fetch_array($run_phase1_term1_general_average);
                    $html.='
                    <label for="">General average '.$rows['general_average'].' </label> <br>  ';
                


                }
                


            }

    
}// ending of for loop end of phase 1 term 4 


// phase 1 final rating
//phase 1 final rating 

for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
    
    

    if($phase1_subject_id == 1){

                //phase 1 final rating mother tongue 
        $phase1_mt = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_mt = mysqli_query($conn,$phase1_mt);
        if(mysqli_num_rows($run_phase1_mt) > 0){
            $rows = mysqli_fetch_array($run_phase1_mt);
            while(mysqli_fetch_array($run_phase1_mt));

                $html.=' <h2> Final Rating </h2>
                <label for="">Mother Tongue: '.$rows['final_rating'].' </label> <br> 
                <label for=""> Remarks '.$rows['remarks'].' </label> <br>   ';
            
            }
        }

    //phase 1 final rating filipino

    if($phase1_subject_id == 2 ){
        $phase1_filipino = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_filipino = mysqli_query($conn,$phase1_filipino);
        if(mysqli_num_rows($run_phase1_filipino) > 0){
            $rows = mysqli_fetch_array($run_phase1_filipino);
            while(mysqli_fetch_array($run_phase1_filipino));

                $html.='
                <label for="">Filipino: '.$rows['final_rating'].' </label> <br>  
                <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
            
            }

    
        }

    // phase 1 final rating english 

    if($phase1_subject_id == 3 ){
        $phase1_english = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_english = mysqli_query($conn,$phase1_english);
        if(mysqli_num_rows($run_phase1_english) > 0){
            $rows = mysqli_fetch_array($run_phase1_english);
            while(mysqli_fetch_array($run_phase1_english));

                $html.='
                <label for="">English: '.$rows['final_rating'].' </label> <br>  
                <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
            
            }

    
        }

    //phase 1 final rating math

    if($phase1_subject_id == 4 ){
        $phase1_math = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_math = mysqli_query($conn,$phase1_math);
        if(mysqli_num_rows($run_phase1_math) > 0){
            $rows = mysqli_fetch_array($run_phase1_math);
            while(mysqli_fetch_array($run_phase1_math));

                $html.='
                <label for="">Mathematics: '.$rows['final_rating'].' </label> <br>  
                <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
            
            }   

    
        }

        // phase 1 final rating science

    if($phase1_subject_id == 5 ){
        $phase1_science = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_science = mysqli_query($conn,$phase1_science);
        if(mysqli_num_rows($run_phase1_science) > 0){
            $rows = mysqli_fetch_array($run_phase1_science);
            while(mysqli_fetch_array($run_phase1_science));

                $html.='
                <label for="">Science: '.$rows['final_rating'].' </label> <br> 
                <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
            
            }

    
        }


        // phase 1 final rating ap
    if($phase1_subject_id == 6 ){
        $phase1_AP = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_AP = mysqli_query($conn,$phase1_AP);
        if(mysqli_num_rows($run_phase1_AP) > 0){
            $rows = mysqli_fetch_array($run_phase1_AP);
            while(mysqli_fetch_array($run_phase1_AP));

            $html.='
            <label for="">Araling Panlipunan: '.$rows['final_rating'].' </label> <br>  
            <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
        
        }


    }


    // phase 1 final rating EPP_TLE
    if($phase1_subject_id == 7 ){
        $phase1_epp_tle = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_ep_tle = mysqli_query($conn,$phase1_epp_tle);
        if(mysqli_num_rows($run_phase1_ep_tle) > 0){
            $rows = mysqli_fetch_array($run_phase1_ep_tle);
            while(mysqli_fetch_array($run_phase1_ep_tle));

            $html.='
            <label for="">EPP / TLE: '.$rows['final_rating'].' </label> <br> 
            <label for=""> Remarks '.$rows['remarks'].' </label> <br>   ';
        
        }


    }


    // phase 1 final rating MAPEH
    if($phase1_subject_id == 8 ){
        $phase1_mapeh = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_mapeh = mysqli_query($conn,$phase1_mapeh);
        if(mysqli_num_rows($run_phase1_mapeh) > 0){
            $rows = mysqli_fetch_array($run_phase1_mapeh);
            while(mysqli_fetch_array($run_phase1_mapeh));

            $html.='
            <label for="">MAPEH: '.$rows['final_rating'].' </label> <br>  
            <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
        
        }


    }
    
        // phase 1 final rating music
    if($phase1_subject_id == 9 ){
        $phase1_music = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_music = mysqli_query($conn,$phase1_music);
        if(mysqli_num_rows($run_phase1_music) > 0){
            $rows = mysqli_fetch_array($run_phase1_music);
            while(mysqli_fetch_array($run_phase1_music));

            $html.='
            <label for="">Music: '.$rows['final_rating'].' </label> <br>  
            <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
        
        }


    }


            // phase 1 final rating arts
    if($phase1_subject_id == 10 ){
        $phase1_arts = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_arts = mysqli_query($conn,$phase1_arts);
        if(mysqli_num_rows($run_phase1_arts) > 0){
            $rows = mysqli_fetch_array($run_phase1_arts);
            while(mysqli_fetch_array($run_phase1_arts));

            $html.='
            <label for="">Arts: '.$rows['final_rating'].' </label> <br>  
            <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
        
        }


    }


    // phase 1 final rating PE
    if($phase1_subject_id == 11 ){
        $phase1_pe = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_pe = mysqli_query($conn,$phase1_pe);
        if(mysqli_num_rows($run_phase1_pe) > 0){
            $rows = mysqli_fetch_array($run_phase1_pe);
            while(mysqli_fetch_array($run_phase1_pe));

            $html.='
            <label for="">Physical Education: '.$rows['final_rating'].' </label> <br> 
            <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
        
        }


    }


    // phase 1 final rating Health
    if($phase1_subject_id == 12 ){
        $phase1_health = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_health = mysqli_query($conn,$phase1_health);
        if(mysqli_num_rows($run_phase1_health) > 0){
            $rows = mysqli_fetch_array($run_phase1_health);
            while(mysqli_fetch_array($run_phase1_health));

            $html.='
            <label for="">Health: '.$rows['final_rating'].' </label> <br>  
            <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
        
        }


    }
    

    // phase 1 final rating eduk sa pag papakatao
    if($phase1_subject_id == 13 ){
        $phase1_esp = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_esp = mysqli_query($conn,$phase1_esp);
        if(mysqli_num_rows($run_phase1_esp) > 0){
            $rows = mysqli_fetch_array($run_phase1_esp);
            while(mysqli_fetch_array($run_phase1_esp));

            $html.='
            <label for="">Eduk. Sa Pagpapakatao: '.$rows['final_rating'].' </label> <br> 
            <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
        
        }


    }


    // phase 1 final rating arabic
    if($phase1_subject_id == 14 ){
        $phase1_arabic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_arabic = mysqli_query($conn,$phase1_arabic);
        if(mysqli_num_rows($run_phase1_arabic) > 0){
            $rows = mysqli_fetch_array($run_phase1_arabic);
            while(mysqli_fetch_array($run_phase1_arabic));

            $html.='
            <label for="">*Arabic language: '.$rows['final_rating'].' </label> <br> 
            <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
        
        }


    }

    
    // phase 1 final rating islamic
    if($phase1_subject_id == 15 ){
        $phase1_islamic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_islamic = mysqli_query($conn,$phase1_islamic);
        if(mysqli_num_rows($run_phase1_islamic) > 0){
            $rows = mysqli_fetch_array($run_phase1_islamic);
            while(mysqli_fetch_array($run_phase1_islamic));

            $html.='
            <label for="">*Islamic values Education: '.$rows['final_rating'].' </label> <br> 
            <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
        
        }


    }


    //phase 1 final rating general average
    if( $phase1_subject_id == 16){
        $phase1_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$lrn' AND  phase = '$phase1' AND term = ' Final Rating' ";
        $run_phase1_term1_general_average = mysqli_query($conn,$phase1_term1_general_average_query);
        if(mysqli_num_rows($run_phase1_term1_general_average)> 0 ){
            $rows = mysqli_fetch_array($run_phase1_term1_general_average);
            $html.='
            <label for="">General average '.$rows['general_average'].' </label> <br>  ';
        


        }
        


    }


}// ending of for loop 

// insert remeidal here

for($phase1_remedial_term = 1; $phase1_remedial_term <=2; $phase1_remedial_term++){

    if($phase1_remedial_term == 1 ){

        $phase1_remedial_query = " SELECT * FROM `remedial_classes` WHERE lrn ='$lrn'AND phase = '$phase1' AND term = '$phase1_remedial_term' ";
        $phase1_run_query = mysqli_query($conn,$phase1_remedial_query);
        if(mysqli_num_rows($phase1_run_query)> 0 ){
            $rows = mysqli_fetch_array($phase1_run_query);
            while(mysqli_fetch_array($phase1_run_query));
            $html.='
           <h6> Remedial Classes </h6>  
           <h6> Date Conducted: '.$rows['date_from'].'</h6>
           <h6> To: '.$rows['date_to'].'</h6> 
           <label for="">Learning areas '.$rows['learning_areas'].' </label> <br> 
           <label for="">Final rating '.$rows['final_rating'].' </label> <br>
           <label for="">Remedial Class Mark '.$rows['remedial_class_mark'].' </label> <br> 
           <label for="">Recomputed Final Grade '.$rows['recomputed_final_grade'].' </label> <br>

           
           
           ';
            
        }

    }

            // term 2
        if($phase1_remedial_term == 2 ){

            $phase1_remedial_query = " SELECT * FROM `remedial_classes` WHERE lrn ='$lrn'AND phase = '$phase1' AND term = '$phase1_remedial_term' ";
        $phase1_run_query = mysqli_query($conn,$phase1_remedial_query);
        if(mysqli_num_rows($phase1_run_query)> 0 ){
            $rows = mysqli_fetch_array($phase1_run_query);
            while(mysqli_fetch_array($phase1_run_query));
            $html.='
           <label for="">Learning areas '.$rows['learning_areas'].' </label> <br> 
           <label for="">Final rating '.$rows['final_rating'].' </label> <br>
           <label for="">Remedial Class Mark '.$rows['remedial_class_mark'].' </label> <br> 
           <label for="">Recomputed Final Grade '.$rows['recomputed_final_grade'].' </label> <br>

           
        
           ';
        }

        }

    
}// end of remedial 




// end of pase 1/////////////////////////////////////


//start of phase 2 
// scholastic records phases 2 
// phase 2 scohlastic query 

$phase2_scholastic_query = "SELECT * FROM `scholastic_records` WHERE lrn = '$lrn' AND phase = $phase2";
$run_phase2_scholastic = mysqli_query($conn,$phase2_scholastic_query);
if(mysqli_num_rows($run_phase2_scholastic) > 0){
    $rows = mysqli_fetch_array($run_phase2_scholastic);

    while(mysqli_fetch_array($run_phase2_scholastic));


    $html.='<h2> Scholastic Record </h2>

    <label for="">School: '.$rows['school'].' </label> <br>
    <label for="">School ID: '.$rows['school_id'].' </label> <br>
    <label for="">District: '.$rows['district'].' </label><br>
    <label for="">Division: '.$rows['division'].' </label><br>
    <label for="">Region: '.$rows['region'].' </label><br>
    <label for="">Classified as Grade: '.$rows['classified_as_grade'].' </label><br>
    <label for="">Section: '.$rows['section'].' </label><br>
    <label for="">School year: '.$rows['school_year'].' </label><br>
    <label for="">Name of adviser: '.$rows['name_of_teacher'].' </label><br>
    <label for="">Signature: '.$rows['signature'].' </label><br>
    ';
}

//phase 2 term 1 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 1;
    

            if($phase2_subject_id == 1){
        
                        //phase 1 term 1 mother tongue 
                $phase2_mt = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_mt = mysqli_query($conn,$phase2_mt);
                if(mysqli_num_rows($run_phase2_mt) > 0){
                    $rows = mysqli_fetch_array($run_phase2_mt);
                    while(mysqli_fetch_array($run_phase2_mt));

                        $html.=' <h2> 1</h2>
                        
                         <label for="">Mother Tongue: '.$rows['grade'].' </label> <br> ';
                    
                    }
                }

            //phase 1 term 1 filipino

            if($phase2_subject_id == 2 ){
                $phase2_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_filipino = mysqli_query($conn,$phase2_filipino);
                if(mysqli_num_rows($run_phase2_filipino) > 0){
                    $rows = mysqli_fetch_array($run_phase2_filipino);
                    while(mysqli_fetch_array($run_phase2_filipino));

                        $html.='
                        <label for="">Filipino: '.$rows['grade'].' </label> <br>  ';
                    
                    }

            
                }

            // phase 2 term 1 english 

            if($phase2_subject_id == 3 ){
                $phase2_english = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_english = mysqli_query($conn,$phase2_english);
                if(mysqli_num_rows($run_phase2_english) > 0){
                    $rows = mysqli_fetch_array($run_phase2_english);
                    while(mysqli_fetch_array($run_phase2_english));

                        $html.='
                        <label for="">English: '.$rows['grade'].' </label> <br>  ';
                    
                    }

            
                }

            //phase 1 term 1 math

            if($phase2_subject_id == 4 ){
                $phase2_math = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_math = mysqli_query($conn,$phase2_math);
                if(mysqli_num_rows($run_phase2_math) > 0){
                    $rows = mysqli_fetch_array($run_phase2_math);
                    while(mysqli_fetch_array($run_phase2_math));

                        $html.='
                        <label for="">Mathematics: '.$rows['grade'].' </label> <br>  ';
                    
                    }   

            
                }

                // phase 2 term 1 science

            if($phase2_subject_id == 5 ){
                $phase2_science = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_science = mysqli_query($conn,$phase2_science);
                if(mysqli_num_rows($run_phase2_science) > 0){
                    $rows = mysqli_fetch_array($run_phase2_science);
                    while(mysqli_fetch_array($run_phase2_science));

                        $html.='
                        <label for="">Science: '.$rows['grade'].' </label> <br>  ';
                    
                    }

            
                }


                // phase 2 term 1 ap
            if($phase2_subject_id == 6 ){
                $phase2_AP = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_AP = mysqli_query($conn,$phase2_AP);
                if(mysqli_num_rows($run_phase2_AP) > 0){
                    $rows = mysqli_fetch_array($run_phase2_AP);
                    while(mysqli_fetch_array($run_phase2_AP));

                    $html.='
                    <label for="">Araling Panlipunan: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            // phase 2 term 1 EPP_TLE
            if($phase2_subject_id == 7 ){
                $phase2_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_ep_tle = mysqli_query($conn,$phase2_epp_tle);
                if(mysqli_num_rows($run_phase2_ep_tle) > 0){
                    $rows = mysqli_fetch_array($run_phase2_ep_tle);
                    while(mysqli_fetch_array($run_phase2_ep_tle));

                    $html.='
                    <label for="">EPP / TLE: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            // phase 2 term 1 MAPEH
            if($phase2_subject_id == 8 ){
                $phase2_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_mapeh = mysqli_query($conn,$phase2_mapeh);
                if(mysqli_num_rows($run_phase2_mapeh) > 0){
                    $rows = mysqli_fetch_array($run_phase2_mapeh);
                    while(mysqli_fetch_array($run_phase2_mapeh));

                    $html.='
                    <label for="">MAPEH: '.$rows['grade'].' </label> <br>  ';
                
                }


            }
            
                // phase 2 term 1 music
            if($phase2_subject_id == 9 ){
                $phase2_music = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_music = mysqli_query($conn,$phase2_music);
                if(mysqli_num_rows($run_phase2_music) > 0){
                    $rows = mysqli_fetch_array($run_phase2_music);
                    while(mysqli_fetch_array($run_phase2_music));

                    $html.='
                    <label for="">Music: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


                    // phase 2 term 1 arts
            if($phase2_subject_id == 10 ){
                $phase2_arts = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_arts = mysqli_query($conn,$phase2_arts);
                if(mysqli_num_rows($run_phase2_arts) > 0){
                    $rows = mysqli_fetch_array($run_phase2_arts);
                    while(mysqli_fetch_array($run_phase2_arts));

                    $html.='
                    <label for="">Arts: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            // phase 2 term 1 PE
            if($phase2_subject_id == 11 ){
                $phase2_pe = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_pe = mysqli_query($conn,$phase2_pe);
                if(mysqli_num_rows($run_phase2_pe) > 0){
                    $rows = mysqli_fetch_array($run_phase2_pe);
                    while(mysqli_fetch_array($run_phase2_pe));

                    $html.='
                    <label for="">Physical Education: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            // phase 2 term 1 Health
            if($phase2_subject_id == 12 ){
                $phase2_health = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_health = mysqli_query($conn,$phase2_health);
                if(mysqli_num_rows($run_phase2_health) > 0){
                    $rows = mysqli_fetch_array($run_phase2_health);
                    while(mysqli_fetch_array($run_phase2_health));

                    $html.='
                    <label for="">Health: '.$rows['grade'].' </label> <br>  ';
                
                }


            }
            

            // phase 2 term 1 eduk sa pag papakatao
            if($phase2_subject_id == 13 ){
                $phase2_esp = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_esp = mysqli_query($conn,$phase2_esp);
                if(mysqli_num_rows($run_phase2_esp) > 0){
                    $rows = mysqli_fetch_array($run_phase2_esp);
                    while(mysqli_fetch_array($run_phase2_esp));

                    $html.='
                    <label for="">Eduk. Sa Pagpapakatao: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            // phase 2 term 1 arabic
            if($phase2_subject_id == 14 ){
                $phase2_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_arabic = mysqli_query($conn,$phase2_arabic);
                if(mysqli_num_rows($run_phase2_arabic) > 0){
                    $rows = mysqli_fetch_array($run_phase2_arabic);
                    while(mysqli_fetch_array($run_phase2_arabic));

                    $html.='
                    <label for="">*Arabic language: '.$rows['grade'].' </label> <br>  ';
                
                }


            }

            
            // phase 2 term 1 islamic
            if($phase2_subject_id == 15 ){
                $phase2_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_islamic = mysqli_query($conn,$phase2_islamic);
                if(mysqli_num_rows($run_phase2_islamic) > 0){
                    $rows = mysqli_fetch_array($run_phase2_islamic);
                    while(mysqli_fetch_array($run_phase2_islamic));

                    $html.='
                    <label for="">*Islamic values Education: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            //phase 2 term 1 general average
            if( $phase2_subject_id == 16){
                $phase2_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$lrn' AND term = '$term' AND  phase = '$phase2' ";
                $run_phase2_term1_general_average = mysqli_query($conn,$phase2_term1_general_average_query);
                if(mysqli_num_rows($run_phase2_term1_general_average)> 0 ){
                    $rows = mysqli_fetch_array($run_phase2_term1_general_average);
                    $html.='
                    <label for="">General average '.$rows['general_average'].' </label> <br>  ';
                


                }
                


            }

        

}// ending of for loop ending of phase 2 term 1



// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;
    

            if($phase2_subject_id == 1){
        
                        //phase 1 term 2 mother tongue 
                $phase2_mt = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_mt = mysqli_query($conn,$phase2_mt);
                if(mysqli_num_rows($run_phase2_mt) > 0){
                    $rows = mysqli_fetch_array($run_phase2_mt);
                    while(mysqli_fetch_array($run_phase2_mt));

                        $html.=' <h2> 2 </h2>
                        <label for="">Mother Tongue: '.$rows['grade'].' </label> <br>  ';
                    
                    }
                }

            //phase 1 term 2 filipino

            if($phase2_subject_id == 2 ){
                $phase2_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_filipino = mysqli_query($conn,$phase2_filipino);
                if(mysqli_num_rows($run_phase2_filipino) > 0){
                    $rows = mysqli_fetch_array($run_phase2_filipino);
                    while(mysqli_fetch_array($run_phase2_filipino));

                        $html.='
                        <label for="">Filipino: '.$rows['grade'].' </label> <br>  ';
                    
                    }

            
                }

            // phase 2 term 2 english 

            if($phase2_subject_id == 3 ){
                $phase2_english = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_english = mysqli_query($conn,$phase2_english);
                if(mysqli_num_rows($run_phase2_english) > 0){
                    $rows = mysqli_fetch_array($run_phase2_english);
                    while(mysqli_fetch_array($run_phase2_english));

                        $html.='
                        <label for="">English: '.$rows['grade'].' </label> <br>  ';
                    
                    }

            
                }

            //phase 1 term 2 math

            if($phase2_subject_id == 4 ){
                $phase2_math = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_math = mysqli_query($conn,$phase2_math);
                if(mysqli_num_rows($run_phase2_math) > 0){
                    $rows = mysqli_fetch_array($run_phase2_math);
                    while(mysqli_fetch_array($run_phase2_math));

                        $html.='
                        <label for="">Mathematics: '.$rows['grade'].' </label> <br>  ';
                    
                    }   

            
                }

                // phase 2 term 2 science

            if($phase2_subject_id == 5 ){
                $phase2_science = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_science = mysqli_query($conn,$phase2_science);
                if(mysqli_num_rows($run_phase2_science) > 0){
                    $rows = mysqli_fetch_array($run_phase2_science);
                    while(mysqli_fetch_array($run_phase2_science));

                        $html.='
                        <label for="">Science: '.$rows['grade'].' </label> <br>  ';
                    
                    }

            
                }


                // phase 2 term 2 ap
            if($phase2_subject_id == 6 ){
                $phase2_AP = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_AP = mysqli_query($conn,$phase2_AP);
                if(mysqli_num_rows($run_phase2_AP) > 0){
                    $rows = mysqli_fetch_array($run_phase2_AP);
                    while(mysqli_fetch_array($run_phase2_AP));

                    $html.='
                    <label for="">Araling Panlipunan: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            // phase 2 term 2 EPP_TLE
            if($phase2_subject_id == 7 ){
                $phase2_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_ep_tle = mysqli_query($conn,$phase2_epp_tle);
                if(mysqli_num_rows($run_phase2_ep_tle) > 0){
                    $rows = mysqli_fetch_array($run_phase2_ep_tle);
                    while(mysqli_fetch_array($run_phase2_ep_tle));

                    $html.='
                    <label for="">EPP / TLE: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            // phase 2 term 2 MAPEH
            if($phase2_subject_id == 8 ){
                $phase2_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_mapeh = mysqli_query($conn,$phase2_mapeh);
                if(mysqli_num_rows($run_phase2_mapeh) > 0){
                    $rows = mysqli_fetch_array($run_phase2_mapeh);
                    while(mysqli_fetch_array($run_phase2_mapeh));

                    $html.='
                    <label for="">MAPEH: '.$rows['grade'].' </label> <br>  ';
                
                }


            }
            
                // phase 2 term 2 music
            if($phase2_subject_id == 9 ){
                $phase2_music = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_music = mysqli_query($conn,$phase2_music);
                if(mysqli_num_rows($run_phase2_music) > 0){
                    $rows = mysqli_fetch_array($run_phase2_music);
                    while(mysqli_fetch_array($run_phase2_music));

                    $html.='
                    <label for="">Music: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


                    // phase 2 term 2 arts
            if($phase2_subject_id == 10 ){
                $phase2_arts = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_arts = mysqli_query($conn,$phase2_arts);
                if(mysqli_num_rows($run_phase2_arts) > 0){
                    $rows = mysqli_fetch_array($run_phase2_arts);
                    while(mysqli_fetch_array($run_phase2_arts));

                    $html.='
                    <label for="">Arts: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            // phase 2 term 2 PE
            if($phase2_subject_id == 11 ){
                $phase2_pe = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_pe = mysqli_query($conn,$phase2_pe);
                if(mysqli_num_rows($run_phase2_pe) > 0){
                    $rows = mysqli_fetch_array($run_phase2_pe);
                    while(mysqli_fetch_array($run_phase2_pe));

                    $html.='
                    <label for="">Physical Education: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            // phase 2 term 2 Health
            if($phase2_subject_id == 12 ){
                $phase2_health = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_health = mysqli_query($conn,$phase2_health);
                if(mysqli_num_rows($run_phase2_health) > 0){
                    $rows = mysqli_fetch_array($run_phase2_health);
                    while(mysqli_fetch_array($run_phase2_health));

                    $html.='
                    <label for="">Health: '.$rows['grade'].' </label> <br>  ';
                
                }


            }
            

            // phase 2 term 2 eduk sa pag papakatao
            if($phase2_subject_id == 13 ){
                $phase2_esp = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_esp = mysqli_query($conn,$phase2_esp);
                if(mysqli_num_rows($run_phase2_esp) > 0){
                    $rows = mysqli_fetch_array($run_phase2_esp);
                    while(mysqli_fetch_array($run_phase2_esp));

                    $html.='
                    <label for="">Eduk. Sa Pagpapakatao: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            // phase 2 term 2 arabic
            if($phase2_subject_id == 14 ){
                $phase2_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_arabic = mysqli_query($conn,$phase2_arabic);
                if(mysqli_num_rows($run_phase2_arabic) > 0){
                    $rows = mysqli_fetch_array($run_phase2_arabic);
                    while(mysqli_fetch_array($run_phase2_arabic));

                    $html.='
                    <label for="">*Arabic language: '.$rows['grade'].' </label> <br>  ';
                
                }


            }

            
            // phase 2 term 2 islamic
            if($phase2_subject_id == 15 ){
                $phase2_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_islamic = mysqli_query($conn,$phase2_islamic);
                if(mysqli_num_rows($run_phase2_islamic) > 0){
                    $rows = mysqli_fetch_array($run_phase2_islamic);
                    while(mysqli_fetch_array($run_phase2_islamic));

                    $html.='
                    <label for="">*Islamic values Education: '.$rows['grade'].' </label> <br>  ';
                
                }


            }


            //phase 2 term 2 general average
            if( $phase2_subject_id == 16){
                $phase2_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$lrn' AND term = '$term' AND  phase = '$phase2' ";
                $run_phase2_term1_general_average = mysqli_query($conn,$phase2_term1_general_average_query);
                if(mysqli_num_rows($run_phase2_term1_general_average)> 0 ){
                    $rows = mysqli_fetch_array($run_phase2_term1_general_average);
                    $html.='
                    <label for="">General average '.$rows['general_average'].' </label> <br>  ';
                


                }
                


            }

       

}// ending of for loop ending of phase 2 term 2 

            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
$term = 3;


        if($phase2_subject_id == 1){
    
                    //phase 1 term 3 mother tongue 
            $phase2_mt = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_mt = mysqli_query($conn,$phase2_mt);
            if(mysqli_num_rows($run_phase2_mt) > 0){
                $rows = mysqli_fetch_array($run_phase2_mt);
                while(mysqli_fetch_array($run_phase2_mt));

                    $html.=' <h2> 3 </h2>
                    <label for="">Mother Tongue: '.$rows['grade'].' </label> <br>  ';
                
                }
            }

        //phase 1 term 3 filipino

        if($phase2_subject_id == 2 ){
            $phase2_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_filipino = mysqli_query($conn,$phase2_filipino);
            if(mysqli_num_rows($run_phase2_filipino) > 0){
                $rows = mysqli_fetch_array($run_phase2_filipino);
                while(mysqli_fetch_array($run_phase2_filipino));

                    $html.='
                    <label for="">Filipino: '.$rows['grade'].' </label> <br>  ';
                
                }

        
            }

        // phase 2 term 3 english 

        if($phase2_subject_id == 3 ){
            $phase2_english = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_english = mysqli_query($conn,$phase2_english);
            if(mysqli_num_rows($run_phase2_english) > 0){
                $rows = mysqli_fetch_array($run_phase2_english);
                while(mysqli_fetch_array($run_phase2_english));

                    $html.='
                    <label for="">English: '.$rows['grade'].' </label> <br>  ';
                
                }

        
            }

        //phase 1 term 3 math

        if($phase2_subject_id == 4 ){
            $phase2_math = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_math = mysqli_query($conn,$phase2_math);
            if(mysqli_num_rows($run_phase2_math) > 0){
                $rows = mysqli_fetch_array($run_phase2_math);
                while(mysqli_fetch_array($run_phase2_math));

                    $html.='
                    <label for="">Mathematics: '.$rows['grade'].' </label> <br>  ';
                
                }   

        
            }

            // phase 2 term 3 science

        if($phase2_subject_id == 5 ){
            $phase2_science = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_science = mysqli_query($conn,$phase2_science);
            if(mysqli_num_rows($run_phase2_science) > 0){
                $rows = mysqli_fetch_array($run_phase2_science);
                while(mysqli_fetch_array($run_phase2_science));

                    $html.='
                    <label for="">Science: '.$rows['grade'].' </label> <br>  ';
                
                }

        
            }


            // phase 2 term 3 ap
        if($phase2_subject_id == 6 ){
            $phase2_AP = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_AP = mysqli_query($conn,$phase2_AP);
            if(mysqli_num_rows($run_phase2_AP) > 0){
                $rows = mysqli_fetch_array($run_phase2_AP);
                while(mysqli_fetch_array($run_phase2_AP));

                $html.='
                <label for="">Araling Panlipunan: '.$rows['grade'].' </label> <br>  ';
            
            }


        }


        // phase 2 term 3 EPP_TLE
        if($phase2_subject_id == 7 ){
            $phase2_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_ep_tle = mysqli_query($conn,$phase2_epp_tle);
            if(mysqli_num_rows($run_phase2_ep_tle) > 0){
                $rows = mysqli_fetch_array($run_phase2_ep_tle);
                while(mysqli_fetch_array($run_phase2_ep_tle));

                $html.='
                <label for="">EPP / TLE: '.$rows['grade'].' </label> <br>  ';
            
            }


        }


        // phase 2 term 3 MAPEH
        if($phase2_subject_id == 8 ){
            $phase2_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_mapeh = mysqli_query($conn,$phase2_mapeh);
            if(mysqli_num_rows($run_phase2_mapeh) > 0){
                $rows = mysqli_fetch_array($run_phase2_mapeh);
                while(mysqli_fetch_array($run_phase2_mapeh));

                $html.='
                <label for="">MAPEH: '.$rows['grade'].' </label> <br>  ';
            
            }


        }
        
            // phase 2 term 3 music
        if($phase2_subject_id == 9 ){
            $phase2_music = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_music = mysqli_query($conn,$phase2_music);
            if(mysqli_num_rows($run_phase2_music) > 0){
                $rows = mysqli_fetch_array($run_phase2_music);
                while(mysqli_fetch_array($run_phase2_music));

                $html.='
                <label for="">Music: '.$rows['grade'].' </label> <br>  ';
            
            }


        }


                // phase 2 term 3 arts
        if($phase2_subject_id == 10 ){
            $phase2_arts = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_arts = mysqli_query($conn,$phase2_arts);
            if(mysqli_num_rows($run_phase2_arts) > 0){
                $rows = mysqli_fetch_array($run_phase2_arts);
                while(mysqli_fetch_array($run_phase2_arts));

                $html.='
                <label for="">Arts: '.$rows['grade'].' </label> <br>  ';
            
            }


        }


        // phase 2 term 3 PE
        if($phase2_subject_id == 11 ){
            $phase2_pe = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_pe = mysqli_query($conn,$phase2_pe);
            if(mysqli_num_rows($run_phase2_pe) > 0){
                $rows = mysqli_fetch_array($run_phase2_pe);
                while(mysqli_fetch_array($run_phase2_pe));

                $html.='
                <label for="">Physical Education: '.$rows['grade'].' </label> <br>  ';
            
            }


        }


        // phase 2 term 3 Health
        if($phase2_subject_id == 12 ){
            $phase2_health = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_health = mysqli_query($conn,$phase2_health);
            if(mysqli_num_rows($run_phase2_health) > 0){
                $rows = mysqli_fetch_array($run_phase2_health);
                while(mysqli_fetch_array($run_phase2_health));

                $html.='
                <label for="">Health: '.$rows['grade'].' </label> <br>  ';
            
            }


        }
        

        // phase 2 term 3 eduk sa pag papakatao
        if($phase2_subject_id == 13 ){
            $phase2_esp = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_esp = mysqli_query($conn,$phase2_esp);
            if(mysqli_num_rows($run_phase2_esp) > 0){
                $rows = mysqli_fetch_array($run_phase2_esp);
                while(mysqli_fetch_array($run_phase2_esp));

                $html.='
                <label for="">Eduk. Sa Pagpapakatao: '.$rows['grade'].' </label> <br>  ';
            
            }


        }


        // phase 2 term 3 arabic
        if($phase2_subject_id == 14 ){
            $phase2_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_arabic = mysqli_query($conn,$phase2_arabic);
            if(mysqli_num_rows($run_phase2_arabic) > 0){
                $rows = mysqli_fetch_array($run_phase2_arabic);
                while(mysqli_fetch_array($run_phase2_arabic));

                $html.='
                <label for="">*Arabic language: '.$rows['grade'].' </label> <br>  ';
            
            }


        }

        
        // phase 2 term 3 islamic
        if($phase2_subject_id == 15 ){
            $phase2_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_islamic = mysqli_query($conn,$phase2_islamic);
            if(mysqli_num_rows($run_phase2_islamic) > 0){
                $rows = mysqli_fetch_array($run_phase2_islamic);
                while(mysqli_fetch_array($run_phase2_islamic));

                $html.='
                <label for="">*Islamic values Education: '.$rows['grade'].' </label> <br>  ';
                
            
            }


        }


        //phase 2 term 3 general average
        if( $phase2_subject_id == 16){
            $phase2_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$lrn' AND term = '$term' AND  phase = '$phase2' ";
            $run_phase2_term1_general_average = mysqli_query($conn,$phase2_term1_general_average_query);
            if(mysqli_num_rows($run_phase2_term1_general_average)> 0 ){
                $rows = mysqli_fetch_array($run_phase2_term1_general_average);
                $html.='
                <label for="">General average '.$rows['general_average'].' </label> <br>  ';
            


            }
            


        }


}// ending of for loop  ending of phase 2 term 3 


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
$term = 4;


        if($phase2_subject_id == 1){
    
                    //phase 2 term 4 mother tongue 
            $phase2_mt = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_mt = mysqli_query($conn,$phase2_mt);
            if(mysqli_num_rows($run_phase2_mt) > 0){
                $rows = mysqli_fetch_array($run_phase2_mt);
                while(mysqli_fetch_array($run_phase2_mt));

                    $html.=' <h2> 4 </h2>
                    <label for="">Mother Tongue: '.$rows['grade'].' </label> <br>  ';
                
                }
            }

        //phase 2 term 4 filipino

        if($phase2_subject_id == 2 ){
            $phase2_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_filipino = mysqli_query($conn,$phase2_filipino);
            if(mysqli_num_rows($run_phase2_filipino) > 0){
                $rows = mysqli_fetch_array($run_phase2_filipino);
                while(mysqli_fetch_array($run_phase2_filipino));

                    $html.='
                    <label for="">Filipino: '.$rows['grade'].' </label> <br>  ';
                
                }

        
            }

        // phase 2 term 4 english 

        if($phase2_subject_id == 3 ){
            $phase2_english = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_english = mysqli_query($conn,$phase2_english);
            if(mysqli_num_rows($run_phase2_english) > 0){
                $rows = mysqli_fetch_array($run_phase2_english);
                while(mysqli_fetch_array($run_phase2_english));

                    $html.='
                    <label for="">English: '.$rows['grade'].' </label> <br>  ';
                
                }

        
            }

        //phase 1 term 4 math

        if($phase2_subject_id == 4 ){
            $phase2_math = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_math = mysqli_query($conn,$phase2_math);
            if(mysqli_num_rows($run_phase2_math) > 0){
                $rows = mysqli_fetch_array($run_phase2_math);
                while(mysqli_fetch_array($run_phase2_math));

                    $html.='
                    <label for="">Mathematics: '.$rows['grade'].' </label> <br>  ';
                
                }   

        
            }

            // phase 2 term 4 science

        if($phase2_subject_id == 5 ){
            $phase2_science = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_science = mysqli_query($conn,$phase2_science);
            if(mysqli_num_rows($run_phase2_science) > 0){
                $rows = mysqli_fetch_array($run_phase2_science);
                while(mysqli_fetch_array($run_phase2_science));

                    $html.='
                    <label for="">Science: '.$rows['grade'].' </label> <br>  ';
                
                }

        
            }


            // phase 2 term 4 ap
        if($phase2_subject_id == 6 ){
            $phase2_AP = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_AP = mysqli_query($conn,$phase2_AP);
            if(mysqli_num_rows($run_phase2_AP) > 0){
                $rows = mysqli_fetch_array($run_phase2_AP);
                while(mysqli_fetch_array($run_phase2_AP));

                $html.='
                <label for="">Araling Panlipunan: '.$rows['grade'].' </label> <br>  ';
            
            }


        }


        // phase 2 term 4 EPP_TLE
        if($phase2_subject_id == 7 ){
            $phase2_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_ep_tle = mysqli_query($conn,$phase2_epp_tle);
            if(mysqli_num_rows($run_phase2_ep_tle) > 0){
                $rows = mysqli_fetch_array($run_phase2_ep_tle);
                while(mysqli_fetch_array($run_phase2_ep_tle));

                $html.='
                <label for="">EPP / TLE: '.$rows['grade'].' </label> <br>  ';
            
            }


        }


        // phase 2 term 4 MAPEH
        if($phase2_subject_id == 8 ){
            $phase2_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_mapeh = mysqli_query($conn,$phase2_mapeh);
            if(mysqli_num_rows($run_phase2_mapeh) > 0){
                $rows = mysqli_fetch_array($run_phase2_mapeh);
                while(mysqli_fetch_array($run_phase2_mapeh));

                $html.='
                <label for="">MAPEH: '.$rows['grade'].' </label> <br>  ';
            
            }


        }
        
            // phase 2 term 4 music
        if($phase2_subject_id == 9 ){
            $phase2_music = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_music = mysqli_query($conn,$phase2_music);
            if(mysqli_num_rows($run_phase2_music) > 0){
                $rows = mysqli_fetch_array($run_phase2_music);
                while(mysqli_fetch_array($run_phase2_music));

                $html.='
                <label for="">Music: '.$rows['grade'].' </label> <br>  ';
            
            }


        }


                // phase 2 term 4 arts
        if($phase2_subject_id == 10 ){
            $phase2_arts = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_arts = mysqli_query($conn,$phase2_arts);
            if(mysqli_num_rows($run_phase2_arts) > 0){
                $rows = mysqli_fetch_array($run_phase2_arts);
                while(mysqli_fetch_array($run_phase2_arts));

                $html.='
                <label for="">Arts: '.$rows['grade'].' </label> <br>  ';
            
            }


        }


        // phase 2 term 4 PE
        if($phase2_subject_id == 11 ){
            $phase2_pe = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_pe = mysqli_query($conn,$phase2_pe);
            if(mysqli_num_rows($run_phase2_pe) > 0){
                $rows = mysqli_fetch_array($run_phase2_pe);
                while(mysqli_fetch_array($run_phase2_pe));

                $html.='
                <label for="">Physical Education: '.$rows['grade'].' </label> <br>  ';
            
            }


        }


        // phase 2 term 4 Health
        if($phase2_subject_id == 12 ){
            $phase2_health = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_health = mysqli_query($conn,$phase2_health);
            if(mysqli_num_rows($run_phase2_health) > 0){
                $rows = mysqli_fetch_array($run_phase2_health);
                while(mysqli_fetch_array($run_phase2_health));

                $html.='
                <label for="">Health: '.$rows['grade'].' </label> <br>  ';
            
            }


        }
        

        // phase 2 term 4 eduk sa pag papakatao
        if($phase2_subject_id == 13 ){
            $phase2_esp = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_esp = mysqli_query($conn,$phase2_esp);
            if(mysqli_num_rows($run_phase2_esp) > 0){
                $rows = mysqli_fetch_array($run_phase2_esp);
                while(mysqli_fetch_array($run_phase2_esp));

                $html.='
                <label for="">Eduk. Sa Pagpapakatao: '.$rows['grade'].' </label> <br>  ';
            
            }


        }


        // phase 2 term 4 arabic
        if($phase2_subject_id == 14 ){
            $phase2_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_arabic = mysqli_query($conn,$phase2_arabic);
            if(mysqli_num_rows($run_phase2_arabic) > 0){
                $rows = mysqli_fetch_array($run_phase2_arabic);
                while(mysqli_fetch_array($run_phase2_arabic));

                $html.='
                <label for="">*Arabic language: '.$rows['grade'].' </label> <br>  ';
            
            }


        }

        
        // phase 2 term 4 islamic
        if($phase2_subject_id == 15 ){
            $phase2_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_islamic = mysqli_query($conn,$phase2_islamic);
            if(mysqli_num_rows($run_phase2_islamic) > 0){
                $rows = mysqli_fetch_array($run_phase2_islamic);
                while(mysqli_fetch_array($run_phase2_islamic));

                $html.='
                <label for="">*Islamic values Education: '.$rows['grade'].' </label> <br>  ';
            
            }


        }


        //phase 2 term 4 general average
        if( $phase2_subject_id == 16){
            $phase2_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$lrn' AND term = '$term' AND  phase = '$phase2' ";
            $run_phase2_term1_general_average = mysqli_query($conn,$phase2_term1_general_average_query);
            if(mysqli_num_rows($run_phase2_term1_general_average)> 0 ){
                $rows = mysqli_fetch_array($run_phase2_term1_general_average);
                $html.='
                <label for="">General average '.$rows['general_average'].' </label> <br>  ';
            


            }
            


        }


}// ending of for loop end of phase 1 term 4 


// phase 2 final rating
//phase 1 final rating 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    



if($phase2_subject_id == 1){

            //phase 1 final rating mother tongue 
    $phase2_mt = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_mt = mysqli_query($conn,$phase2_mt);
    if(mysqli_num_rows($run_phase2_mt) > 0){
        $rows = mysqli_fetch_array($run_phase2_mt);
        while(mysqli_fetch_array($run_phase2_mt));

            $html.=' <h2> Final Rating </h2>
            <label for="">Mother Tongue: '.$rows['final_rating'].' </label> <br> 
            <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
        
        }
    }

//phase 1 final rating filipino

if($phase2_subject_id == 2 ){
    $phase2_filipino = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_filipino = mysqli_query($conn,$phase2_filipino);
    if(mysqli_num_rows($run_phase2_filipino) > 0){
        $rows = mysqli_fetch_array($run_phase2_filipino);
        while(mysqli_fetch_array($run_phase2_filipino));

            $html.='
            <label for="">Filipino: '.$rows['final_rating'].' </label> <br> 
            <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
        
        }


    }

// phase 2 final rating english 

if($phase2_subject_id == 3 ){
    $phase2_english = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_english = mysqli_query($conn,$phase2_english);
    if(mysqli_num_rows($run_phase2_english) > 0){
        $rows = mysqli_fetch_array($run_phase2_english);
        while(mysqli_fetch_array($run_phase2_english));

            $html.='
            <label for="">English: '.$rows['final_rating'].' </label> <br>  
            <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
        
        }


    }

//phase 1 final rating math

if($phase2_subject_id == 4 ){
    $phase2_math = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_math = mysqli_query($conn,$phase2_math);
    if(mysqli_num_rows($run_phase2_math) > 0){
        $rows = mysqli_fetch_array($run_phase2_math);
        while(mysqli_fetch_array($run_phase2_math));

            $html.='
            <label for="">Mathematics: '.$rows['final_rating'].' </label> <br>  
            <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
        
        }   


    }

    // phase 2 final rating science

if($phase2_subject_id == 5 ){
    $phase2_science = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_science = mysqli_query($conn,$phase2_science);
    if(mysqli_num_rows($run_phase2_science) > 0){
        $rows = mysqli_fetch_array($run_phase2_science);
        while(mysqli_fetch_array($run_phase2_science));

            $html.='
            <label for="">Science: '.$rows['final_rating'].' </label> <br>  
            <label for=""> Remarks '.$rows['remarks'].' </label> <br>   ';
        
        }


    }


    // phase 2 final rating ap
if($phase2_subject_id == 6 ){
    $phase2_AP = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_AP = mysqli_query($conn,$phase2_AP);
    if(mysqli_num_rows($run_phase2_AP) > 0){
        $rows = mysqli_fetch_array($run_phase2_AP);
        while(mysqli_fetch_array($run_phase2_AP));

        $html.='
        <label for="">Araling Panlipunan: '.$rows['final_rating'].' </label> <br>  
        <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
    
    }


}


// phase 2 final rating EPP_TLE
if($phase2_subject_id == 7 ){
    $phase2_epp_tle = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_ep_tle = mysqli_query($conn,$phase2_epp_tle);
    if(mysqli_num_rows($run_phase2_ep_tle) > 0){
        $rows = mysqli_fetch_array($run_phase2_ep_tle);
        while(mysqli_fetch_array($run_phase2_ep_tle));

        $html.='
        <label for="">EPP / TLE: '.$rows['final_rating'].' </label> <br>  
        <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
    
    }


}


// phase 2 final rating MAPEH
if($phase2_subject_id == 8 ){
    $phase2_mapeh = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_mapeh = mysqli_query($conn,$phase2_mapeh);
    if(mysqli_num_rows($run_phase2_mapeh) > 0){
        $rows = mysqli_fetch_array($run_phase2_mapeh);
        while(mysqli_fetch_array($run_phase2_mapeh));

        $html.='
        <label for="">MAPEH: '.$rows['final_rating'].' </label> <br>  
        <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
    
    }


}

    // phase 2 final rating music
if($phase2_subject_id == 9 ){
    $phase2_music = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_music = mysqli_query($conn,$phase2_music);
    if(mysqli_num_rows($run_phase2_music) > 0){
        $rows = mysqli_fetch_array($run_phase2_music);
        while(mysqli_fetch_array($run_phase2_music));

        $html.='
        <label for="">Music: '.$rows['final_rating'].' </label> <br>  
        <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
    
    }


}


        // phase 2 final rating arts
if($phase2_subject_id == 10 ){
    $phase2_arts = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_arts = mysqli_query($conn,$phase2_arts);
    if(mysqli_num_rows($run_phase2_arts) > 0){
        $rows = mysqli_fetch_array($run_phase2_arts);
        while(mysqli_fetch_array($run_phase2_arts));

        $html.='
        <label for="">Arts: '.$rows['final_rating'].' </label> <br>  
        <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
    
    }


}


// phase 2 final rating PE
if($phase2_subject_id == 11 ){
    $phase2_pe = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_pe = mysqli_query($conn,$phase2_pe);
    if(mysqli_num_rows($run_phase2_pe) > 0){
        $rows = mysqli_fetch_array($run_phase2_pe);
        while(mysqli_fetch_array($run_phase2_pe));

        $html.='
        <label for="">Physical Education: '.$rows['final_rating'].' </label> <br>  
        <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
    
    }


}


// phase 2 final rating Health
if($phase2_subject_id == 12 ){
    $phase2_health = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_health = mysqli_query($conn,$phase2_health);
    if(mysqli_num_rows($run_phase2_health) > 0){
        $rows = mysqli_fetch_array($run_phase2_health);
        while(mysqli_fetch_array($run_phase2_health));

        $html.='
        <label for="">Health: '.$rows['final_rating'].' </label> <br>  
        <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
    
    }


}


// phase 2 final rating eduk sa pag papakatao
if($phase2_subject_id == 13 ){
    $phase2_esp = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_esp = mysqli_query($conn,$phase2_esp);
    if(mysqli_num_rows($run_phase2_esp) > 0){
        $rows = mysqli_fetch_array($run_phase2_esp);
        while(mysqli_fetch_array($run_phase2_esp));

        $html.='
        <label for="">Eduk. Sa Pagpapakatao: '.$rows['final_rating'].' </label> <br>  
        <label for=""> Remarks '.$rows['remarks'].' </label> <br> ';
    
    }


}


// phase 2 final rating arabic
if($phase2_subject_id == 14 ){
    $phase2_arabic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_arabic = mysqli_query($conn,$phase2_arabic);
    if(mysqli_num_rows($run_phase2_arabic) > 0){
        $rows = mysqli_fetch_array($run_phase2_arabic);
        while(mysqli_fetch_array($run_phase2_arabic));

        $html.='
        <label for="">*Arabic language: '.$rows['final_rating'].' </label> <br>  
        <label for=""> Remarks '.$rows['remarks'].' </label> <br> ';
    
    }


}


// phase 2 final rating islamic
if($phase2_subject_id == 15 ){
    $phase2_islamic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_islamic = mysqli_query($conn,$phase2_islamic);
    if(mysqli_num_rows($run_phase2_islamic) > 0){
        $rows = mysqli_fetch_array($run_phase2_islamic);
        while(mysqli_fetch_array($run_phase2_islamic));

        $html.='
        <label for="">*Islamic values Education: '.$rows['final_rating'].' </label> <br> 
        <label for=""> Remarks '.$rows['remarks'].' </label> <br>  ';
    
    }


}


//phase 2 final rating general average
if( $phase2_subject_id == 16){
    $phase2_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$lrn' AND  phase = '$phase2' AND term = ' Final Rating' ";
    $run_phase2_term1_general_average = mysqli_query($conn,$phase2_term1_general_average_query);
    if(mysqli_num_rows($run_phase2_term1_general_average)> 0 ){
        $rows = mysqli_fetch_array($run_phase2_term1_general_average);
        $html.='
        <label for="">General average '.$rows['general_average'].' </label> <br>  ';
    


    }
    


}


}// ending of for loop end of phase 2  

/// remedial  here 
for($phase2_remedial_term = 1; $phase2_remedial_term <=2; $phase2_remedial_term++){

    if($phase2_remedial_term == 1 ){

        $phase2_remedial_query = " SELECT * FROM `remedial_classes` WHERE lrn ='$lrn'AND phase = '$phase2' AND term = '$phase2_remedial_term' ";
        $phase2_run_query = mysqli_query($conn,$phase2_remedial_query);
        if(mysqli_num_rows($phase2_run_query)> 0 ){
            $rows = mysqli_fetch_array($phase2_run_query);
            while(mysqli_fetch_array($phase2_run_query));
            $html.='
           <h6> Remedial Classes </h6>  
           <h6> Date Conducted: '.$rows['date_from'].'</h6>
           <h6> To: '.$rows['date_to'].'</h6> 
           <label for="">Learning areas '.$rows['learning_areas'].' </label> <br> 
           <label for="">Final rating '.$rows['final_rating'].' </label> <br>
           <label for="">Remedial Class Mark '.$rows['remedial_class_mark'].' </label> <br> 
           <label for="">Recomputed Final Grade '.$rows['recomputed_final_grade'].' </label> <br>

           
           
           ';
            
        }

    }

            // term 2
        if($phase2_remedial_term == 2 ){

            $phase2_remedial_query = " SELECT * FROM `remedial_classes` WHERE lrn ='$lrn'AND phase = '$phase2' AND term = '$phase2_remedial_term' ";
        $phase2_run_query = mysqli_query($conn,$phase2_remedial_query);
        if(mysqli_num_rows($phase2_run_query)> 0 ){
            $rows = mysqli_fetch_array($phase2_run_query);
            while(mysqli_fetch_array($phase2_run_query));
            $html.='
           <label for="">Learning areas '.$rows['learning_areas'].' </label> <br> 
           <label for="">Final rating '.$rows['final_rating'].' </label> <br>
           <label for="">Remedial Class Mark '.$rows['remedial_class_mark'].' </label> <br> 
           <label for="">Recomputed Final Grade '.$rows['recomputed_final_grade'].' </label> <br>

           
        
           ';
        }

        }

    
}// end of remedial phase 2 
    





$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('Legal', 'portrait');

// Render the HTML as PDF
$dompdf->render();



$dompdf->stream("name of student and lrn", Array("Attachment" =>0));
?>