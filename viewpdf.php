<?php 
include('connection.php');
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;


session_start();
if(empty($_SESSION['username'])){
    echo "<script>window.location.href='login.php'</script>";
}



if(isset($_GET['sid'])){
// Store the cipher method
$ciphering = "AES-128-CTR";
$options = 0;
// Non-NULL Initialization Vector for decryption
$decryption_iv = '1234567891011121';

// Store the decryption key
$decryption_key = "TeamAgnat";

// Use openssl_decrypt() function to decrypt the data
$decrypted_lrn=openssl_decrypt ($_GET['sid'], $ciphering,
    $decryption_key, $options, $decryption_iv);

    

    // foreach ($_GET as $encrypting_lrn => $encrypt_lrn){
    //   $decrypt_lrn = $_GET[$encrypting_lrn] = base64_decode(urldecode($encrypt_lrn));
    //   $decrypted_lrn = ((($decrypt_lrn*987654)/56789)/12345678911);
    // }
      
      if(empty($_GET['sid'])){    //lrn verification starts here
          echo "<script>alert('LRN not found');
          window.location = 'home.php';</script>";
          exit();
      }
      $verify_lrn = "SELECT learners_personal_infos.lrn FROM `learners_personal_infos` WHERE lrn = '$decrypted_lrn'";
      $query_request = mysqli_query($conn, $verify_lrn) or die (mysqli_error($conn));
      if(mysqli_num_rows($query_request) == 0){
              echo "
              <script type = 'text/javascript'>
              window.location = 'home.php';
              </script>";
              exit();
      }
      

$phase1 = 1;
$phase2 = 2;
$phase3 = 3;
$phase4 = 4;
$phase5 = 5;
$phase6 = 6;
$phase7 = 7;
$phase8 = 8;


$png1 = file_get_contents("../official_pdmes/src/images/DepEd.png");
$png1base64 = base64_encode($png1);
$png2 = file_get_contents("../official_pdmes/src/images/DepEd_2.png");
$png2base64 = base64_encode($png2); 
$html='
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>

:root{
    --calibri: "Calibri, sans-serif";
    --arial:  Arial, Helvetica, sans-serif;
}

*, *::before, *::after{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}
body{
    margin: .5em;
}
.small-pad-left{
    padding-left: 7px;
}
.text-start{
    text-align: left;
}
.text-center{
    text-align: center;
}
.text-end{
    text-align: right;
}
.wd{
    width: 10em;
}
.italic{
    font-style: italic;
}

.heading-content{
    position: relative;
} 
.heading-texts{
    text-align: center;
}
.calibri-text{
    font-family: var(--calibri);
    font-weight: light;
    font-size: 14px;
}
.SF{
    position: absolute;
    font-size: 11px;
    left: 0;
    top: 0; 
}
.arial-text{
    font-family: var(--arial);
    font-weight: 700;
    font-size: 18px;
}
img{
    position: absolute;
}
.img_2{
    height: 4.7rem;
    width: 4.7rem;
    margin: 0 0 0 2.5em;
    left: 0;
    
}
.img_1{
    height: 2.7rem;
    width: 5.7rem;
    margin: 1em 2.2em 0 0;
    right: 0;
}
.main-content-header{
    text-align: center;
    padding: 2px 0;
    border:1px solid black;
}
.learners{
    background: #a9a9a9;
}
.eligibility{
    background: #d3d3d3;
}
.scholastic{
    background: #acacac;
}

.arial-header{
    font-family: var(--arial);
    font-weight: bold;
    font-size: 11px;
}
.main-arial-text{
    font-family: var(--arial);
    font-size: 11px;
}
.eligibility-content{
    margin: 4px 0;
    padding: auto 5px;
    border:1px solid black;
}
.phase_head{
    border-bottom: none;
}
.phase_head tr,
.phase_head td{
    border:none;
    padding:2px;
}

table, 
tr,
th, 
td{
    border: 1px solid black;
    border-collapse: collapse;
}

table{
    width: 100%;
}
td{
    padding: 4px 0 0 0;
}
.subject{
    font-weight: bold;
    padding-left: 2px;
}
.remedial th{
    padding: 4px 0;
}
</style>

    ';

    // leaners and eligibty query



    $learners_query = "SELECT * FROM learners_personal_infos  
    LEFT JOIN eligibility_for_elementary_school_enrollment 
    ON learners_personal_infos.lrn = eligibility_for_elementary_school_enrollment.lrn 
    WHERE learners_personal_infos.lrn = '$decrypted_lrn'";

    $run_learners_query = mysqli_query($conn, $learners_query);
    if(mysqli_num_rows($run_learners_query) > 0){
    $rows = mysqli_fetch_array($run_learners_query);

    $credentials = explode(',',$rows['credential_presented']);
    $pept_passer = $rows['pept_passer'];
    $others = $rows['others'];
 
    if (in_array("Kinder Progress Report", $credentials)) {
         $kinder = "checked"; 
     }
 
     else{
         $kinder = "";
     }
 
 
     if (in_array("ECCD Checklist", $credentials)) {
         $eccd   = "checked" ;
     }
 
     else
     {
         $eccd   = "" ;
     }
 
     if (in_array("Kindergarden Certificate of Completion", $credentials)) {
         $complete = "checked";
     }
 
     else{
 
         $complete = "";
     }
 
     if($pept_passer == 1 ){
         $pept = "checked";
         $ratings = $rows['rating'];
     }
 
     else {
         $pept = "";
         $ratings = "";
     }
 
     if($others == 1 ){
         $checkbox = "checked";
         $specify = $rows['specify'];
     }
 
     else {
         $checkbox = "";
         $specify = "";
     }


while(mysqli_fetch_array($run_learners_query));

    
    $html.='
        <body>
     <div class="heading-container">
        <div class="heading-content">
            <img src="DepEd_2.svg" class="img_1" alt="DepEd">
            <img src="DepEd.svg" class="img_2" alt="DepEd">
            <div class="heading-texts">
                <p class="calibri-text SF">SF10-ES</p>
                <p class="calibri-text">Republic of The Philippines</p>
                <p class="calibri-text">Department of Education</p>
                <p class="arial-text">Learner&#8216s Permanent Academic Record for Elementary School</p>
                <p class="arial-text">(SF-10 ES)</p>
            </div>
        </div>
     </div>
     <main>
        <div class="main-content">
            <div class="main-content-header learners">
                <p class="arial-header">LEARNER`S PERSONAL INFORMATION</p>
            </div>
            <div class="learners-content">
                <span class="main-arial-text" style="padding: 1px 6em 1px 0;">LAST NAME: <span style="font-weight: bold;">'.$rows['last_name'].' </span></span>
                <span class="main-arial-text" style="padding: 1px 4em;">FIRST NAME: <span style="font-weight: bold;">'.$rows['first_name'].'</span></span>
                <span class="main-arial-text" style="padding: 1px 4em;">NAME EXTN(Jr,I,II): <span style="font-weight: bold;">'.$rows['suffix'].'</span></span>
                <span class="main-arial-text" style="padding: 1px 6em 1px 6em;">MIDDLE NAME: <span style="font-weight: bold;">'.$rows['middle_name'].'</span></span>
                <br>
                <span class="main-arial-text" style="padding: 1px 4em 1px 0;">Learner Reference Number (LRN): <span style="font-weight: bold;">'.$rows['lrn'].'</span></span>
                <span class="main-arial-text" style="padding: 1px 6em;">Birthdate(mm/yy/dd): <span style="font-weight: bold;">'.$rows['birth_date'].'</span></span>
                <span class="main-arial-text" style="padding: 1px 4em 1px 22em;">Sex: <span style="font-weight: bold;">'.$rows['sex'].'</span></span>
            </div>
            <div class="main-content-header eligibility">
                <p class="arial-header">ELIGIBILITY FOR ELEMENTARY SCHOOL ENROLLMENT</p>
            </div>
            <div class="eligibility-content">
                <span class="main-arial-text" style="padding: 1px 2em 1px 0;"><i>Credential Presented for grade 1: </i></span>
                <span class="main-arial-text"><input type="checkbox" style="vertical-align: text-bottom;" class="checkbox" '.$kinder.' "><i>Kinder Progress Report</i></span>
                <span class="wd">  </span>
                <span class="wd">  </span>
                <span class="wd">  </span>
                <span class="main-arial-text"><input type="checkbox" style="vertical-align: text-bottom;" class="checkbox" '.$eccd.' "><i>ECCD checklist</i></span>
                <span class="wd">  </span>
                <span class="wd">  </span>
                <span class="wd">  </span>
                <span class="main-arial-text"><input type="checkbox" style="vertical-align: text-bottom;" class="checkbox" '.$complete.' "><i>Kindergarten Certificate of Completion</i></span>
                <br>
                <span class="main-arial-text" style="padding: 1px 4em 1px 0;">Name of School: <span style="font-weight: bold;">'.$rows['name_of_school'].'</span></span>
                <span class="main-arial-text" style="padding: 1px 6em;">School ID: <span style="font-weight: bold;">'.$rows['school_id'].'</span></span>
                <span class="main-arial-text" style="padding: 1px 4em 1px 4em;">Address of School: <span style="font-weight: bold;">'.$rows['address_of_school'].'</span></span>
            </div>
            <div class="eligibility-bottom">
                <p class="main-arial-text">Other Credential Presented</p>
                <div class="bottom-texts" style="margin: 0 1.3em;">
                    <span class="main-arial-text" style="padding: 1px 1em 1px 0;"><input type="checkbox" style="vertical-align: text-bottom;" class="checkbox" '.$pept.' ">PEPT Passer</span>
                    <span class="main-arial-text" style="padding: 1px 4em;">Rating: <span style="font-weight: bold;"> '.$ratings.' </span></span>
                    <span class="main-arial-text" style="padding: 1px 4em;">Date of Examination/Assessment (mm/dd/yyyy): <span style="font-weight: bold;"> '.$rows['date_of_assessment'].' </span></span>
                    <span class="main-arial-text" style="padding: 1px 6em 1px 6em;"><input type="checkbox" style="vertical-align: text-bottom;" class="checkbox" '.$checkbox.' "> Other (Pls.Specify): '.$specify.'</span>
                    <br>
                    <span class="main-arial-text" style="padding: 1px 8em 1px 0;"> Name and Address of Testing Center:<span style="font-weight: bold;"> </span></span>
                    <span class="main-arial-text" style="padding: 1px 12em; text-align:right;"> Remark:<span style="font-weight: bold;"> </span></span>
                </div>
            </div>
        </div>
     </main>
    
      ';
    
    }


    // phase 1 scohlastic query 

    $phase1_scholastic_query = "SELECT * FROM `scholastic_records` WHERE lrn = '$decrypted_lrn' AND phase = $phase1";
    $run_phase1_scholastic = mysqli_query($conn,$phase1_scholastic_query);
    if(mysqli_num_rows($run_phase1_scholastic) > 0){
        $rows = mysqli_fetch_array($run_phase1_scholastic);

        while(mysqli_fetch_array($run_phase1_scholastic));

    
        $html.='
        <div class="main-content-header scholastic">
            <p class="arial-header">Scholastic Record</p>
        </div>
        <div class="scholastic-content main-arial-text">
            <table style" border:none;">
                <tr class="row_1" style="width: 100vw; margin-bottom: 2em;  border:none;">
                    <td class="phase_1" style="width: 48%;  border:none;">
                        <table class="phase_head">
                            <tr>
                                <td colspan="6"><span class="main-arial-text">School: <span style="font-weight: bold;">'.$rows['school'].'</span></span></td>
                                <td colspan="6" style="text-align: right;><span class="main-arial-text">School ID: <span style="font-weight: bold;">'.$rows['school_id'].'</span></span></td>
                            </tr>
                            <tr>
                                <td colspan="4"><span class="main-arial-text">District: <span style="font-weight: bold;">'.$rows['district'].'</span></span></td>
                                <td colspan="4" style="text-align: center;"><span class="main-arial-text">Division: <span style="font-weight: bold;">'.$rows['division'].'</span></span></td>
                                <td colspan="4" style="text-align: right;"><span class="main-arial-text">Region: <span style="font-weight: bold;">'.$rows['region'].'</span></span></td>
                            </tr>
                            <tr>
                                <td colspan="3"><span class="main-arial-text">Classified as Grade: <span style="font-weight: bold;">'.$rows['classified_as_grade'].'</span></span></td>
                                <td colspan="5" style="text-align: center;"><span class="main-arial-text" >Section: <span style="font-weight: bold;">'.$rows['section'].'</span></span></td>
                                <td colspan="4" style="text-align: right;"><span class="main-arial-text">School year: <span style="font-weight: bold;">'.$rows['school_year'].'-2012</span></span></td>
                            </tr>
                            <tr>
                                <td colspan="6"><span class="main-arial-text">Name of adviser: <span style="font-weight: bold;">'.$rows['name_of_teacher'].'</span></span></td>
                                <td colspan="6" style="text-align: right;"><span class="main-arial-text">Signature:<span style="font-weight: bold;">'.$rows['signature'].'</span></span></td>
                            </tr>
                        </table>
    ';
    }

    $html.='
                        <table>
                            <thead>
                                <tr>
                                    <th rowspan="2">Learning Areas</th>
                                    <th class="quarterly" colspan="4">Quarterly Rating</th>
                                    <th colspan="1" class="final-rating" rowspan="2" >Final <br> Rating</th>
                                    <th rowspan="2">Remarks</th>
                                </tr>
                                <tr class="quarter">
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                </tr>
                            </thead>    
                            <tbody> 
     
    ';
    
    //phase 1 term 1 

for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 1;
        
    
        if($phase1_subject_id == 1){
            
            //phase 1 term 1 mother tongue 
    $phase1_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
    $run_phase1_mt = mysqli_query($conn,$phase1_mt);
    if(mysqli_num_rows($run_phase1_mt) > 0){
        $rows = mysqli_fetch_array($run_phase1_mt);
        while(mysqli_fetch_array($run_phase1_mt));
        if($rows['grade'] == 0 ){
            $rows['grade'] = " ";
            }

            $html.=' 
         
            <td class="subject">Mother Tongue</td>
            <td class="text-center">'.$rows['grade'].'</td>
            
      ';
        
        }
    }
}
    for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 2;
        if($phase1_subject_id == 1){
            
            //phase 1 term 2 mother tongue 
    $phase1_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
    $run_phase1_mt = mysqli_query($conn,$phase1_mt);
    if(mysqli_num_rows($run_phase1_mt) > 0){
        $rows2 = mysqli_fetch_array($run_phase1_mt);
        while(mysqli_fetch_array($run_phase1_mt));

        if($rows2['grade'] == 0 ){
            $rows2['grade'] = " ";
            }


            $html.='
            <td class="text-center">'.$rows2['grade'].'</td>
            
            ';
        
        }
    }
}

      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
            $term = 3;

                      
            if($phase1_subject_id == 1){
        
                //phase 1 term 3 mother tongue 
        $phase1_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
        $run_phase1_mt = mysqli_query($conn,$phase1_mt);
        if(mysqli_num_rows($run_phase1_mt) > 0){
            $rows3 = mysqli_fetch_array($run_phase1_mt);
            while(mysqli_fetch_array($run_phase1_mt));

            if($rows3['grade'] == 0 ){
                $rows3['grade'] = " ";
                }
            $html.='
            <td class="text-center">'.$rows3['grade'].'</td>
           
            ';
            
            }
        }

      }

             for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
               $term = 4;
               if($phase1_subject_id == 1){
        
                        //phase 1 term 4 mother tongue 
                $phase1_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_mt = mysqli_query($conn,$phase1_mt);
                if(mysqli_num_rows($run_phase1_mt) > 0){
                    $rows4 = mysqli_fetch_array($run_phase1_mt);
                    while(mysqli_fetch_array($run_phase1_mt));

                    if($rows4['grade'] == 0 ){
                        $rows4['grade'] = " ";
                        }

                        $html.='  <td class="text-center">'.$rows4['grade'].'</td>
                         ';
                    
                    }
                }
            }
                for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
    
                    if($phase1_subject_id == 1){
                
                                //phase 1 final rating mother tongue 
                        $phase1_mt = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
                        $run_phase1_mt = mysqli_query($conn,$phase1_mt);
                        if(mysqli_num_rows($run_phase1_mt) > 0){
                            $rows5 = mysqli_fetch_array($run_phase1_mt);
                            while(mysqli_fetch_array($run_phase1_mt));

                            if($rows5['final_rating'] == 0 ){
                                $rows5['final_rating'] = " ";
                                $rows5['remarks'] = " ";
                               }
        
                    $html.='
                    <td class="text-center">'.$rows5['final_rating'].'</td>
                    <td class="text-center"> '.$rows5['remarks'].'</td>
                </tr>
                    ';
                
                }
            }

        }

    
                //phase 1 term 1 filipino
                for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
                    $term = 1;
                    
                
                    if($phase1_subject_id == 2){


                    $phase1_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_filipino = mysqli_query($conn,$phase1_filipino);
                    if(mysqli_num_rows($run_phase1_filipino) > 0){
                        $rows = mysqli_fetch_array($run_phase1_filipino);
                        while(mysqli_fetch_array($run_phase1_filipino));
                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }

                            $html.='
                          <tr>
                            <td class="subject">Filipino</td>
                            <td class="text-center">'.$rows['grade'].'</td>
                         
                            

                            ';
                        
                        }
                    }
}
for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
    $term = 2;

        if($phase1_subject_id == 2 ){
                    $phase1_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_filipino = mysqli_query($conn,$phase1_filipino);
                    if(mysqli_num_rows($run_phase1_filipino) > 0){
                        $row2 = mysqli_fetch_array($run_phase1_filipino);
                        while(mysqli_fetch_array($run_phase1_filipino));

                        if($rows2['grade'] == 0 ){
                            $rows2['grade'] = " ";
                            }
            
    
                            $html.='
                            
                            <td class="text-center">'.$rows2['grade'].'</td> ';
                        



                        }
    
                
                    }

}

         
for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
    $term = 3;
    if($phase1_subject_id == 2 ){
        $phase1_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
        $run_phase1_filipino = mysqli_query($conn,$phase1_filipino);
        if(mysqli_num_rows($run_phase1_filipino) > 0){
            $rows3 = mysqli_fetch_array($run_phase1_filipino);
            while(mysqli_fetch_array($run_phase1_filipino));

            if($rows3['grade'] == 0 ){
                $rows3['grade'] = " ";
                }

                $html.='
                <td class="text-center">'.$rows3['grade'].'</td>
                ';
            
            }

    
        }
              

            
            }



  //term4
  for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {

    
    $term = 4;
    if($phase1_subject_id == 2 ){
        $phase1_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
        $run_phase1_filipino = mysqli_query($conn,$phase1_filipino);
        if(mysqli_num_rows($run_phase1_filipino) > 0){
            $rows4 = mysqli_fetch_array($run_phase1_filipino);
            while(mysqli_fetch_array($run_phase1_filipino));

            if($rows4['grade'] == 0 ){
                $rows4['grade'] = " ";
                }

                $html.='
                <td class="text-center">'.$rows4['grade'].'</td>';
            
            }

    
        }

 

  }

  for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
    


  if($phase1_subject_id == 2 ){
    $phase1_filipino = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
    $run_phase1_filipino = mysqli_query($conn,$phase1_filipino);
    if(mysqli_num_rows($run_phase1_filipino) > 0){
        $rows5 = mysqli_fetch_array($run_phase1_filipino);
        while(mysqli_fetch_array($run_phase1_filipino));

        if($rows5['final_rating'] == 0 ){
            $rows5['final_rating'] = " ";
            $rows5['remarks'] = " ";
           }

            $html.='
            <td class="text-center">'.$rows5['final_rating'].'</td>
            <td class="text-center">'.$rows5['remarks'].'</td>
            </tr>    ';
        
        }


    }

}

      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 1;

        if($phase1_subject_id == 3 ){
            $phase1_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_english = mysqli_query($conn,$phase1_english);
            if(mysqli_num_rows($run_phase1_english) > 0){
                $rows = mysqli_fetch_array($run_phase1_english);
                while(mysqli_fetch_array($run_phase1_english));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <tr>
                <td class="subject">English</td>
                <td class="text-center">'.$rows['grade'].'</td>
                 ';
            }
        }
    }


    //term2
    for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        $term = 2;
        if($phase1_subject_id == 3 ){
            $phase1_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_english = mysqli_query($conn,$phase1_english);
            if(mysqli_num_rows($run_phase1_english) > 0){
                $rows2 = mysqli_fetch_array($run_phase1_english);
                while(mysqli_fetch_array($run_phase1_english));

                if($rows2['grade'] == 0 ){
                    $rows2['grade'] = " ";
                    }
    

                    $html.='
                    <td class="text-center"">'.$rows2['grade'].'</td>
                   
                    ';
                
                }

        
            }

        }
                  
      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        $term = 3;

        if($phase1_subject_id == 3 ){
            $phase1_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_english = mysqli_query($conn,$phase1_english);
            if(mysqli_num_rows($run_phase1_english) > 0){
                $rows3 = mysqli_fetch_array($run_phase1_english);
                while(mysqli_fetch_array($run_phase1_english));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows3['grade'].' </td>
                   
                   ';
                
                }

        
            }
      }


      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
        $term = 4;

        if($phase1_subject_id == 3 ){
            $phase1_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_english = mysqli_query($conn,$phase1_english);
            if(mysqli_num_rows($run_phase1_english) > 0){
                $rows4 = mysqli_fetch_array($run_phase1_english);
                while(mysqli_fetch_array($run_phase1_english));

                if($rows4['grade'] == 0 ){
                    $rows4['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows4['grade'].' </td>
                    ';
                
                }

        
            }
      }


      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        if($phase1_subject_id == 3 ){
            $phase1_english = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
            $run_phase1_english = mysqli_query($conn,$phase1_english);
            if(mysqli_num_rows($run_phase1_english) > 0){
                $rows = mysqli_fetch_array($run_phase1_english);
                while(mysqli_fetch_array($run_phase1_english));

                if($rows['final_rating'] == 0 ){
                    $rows['final_rating'] = " ";
                    $rows['remarks'] = " ";
                   }
    
                    $html.='
                    <td class="text-center">'.$rows['final_rating'].'</td>
                    <td class="text-center">'.$rows['remarks'].' </td>
                    </tr>
                    ';
                
                }
    
        
            }
      }


        

               
      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 1;
        
      if($phase1_subject_id == 4 ){
        $phase1_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
        $run_phase1_math = mysqli_query($conn,$phase1_math);
        if(mysqli_num_rows($run_phase1_math) > 0){
            $rows = mysqli_fetch_array($run_phase1_math);
            while(mysqli_fetch_array($run_phase1_math));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

                $html.='
                <tr>
                <td class="subject">Mathematics</td>
                <td class="text-center">'.$rows['grade'].'</td>
                
                ';
            
            }   

        }

      }

      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 2;
        
        
        if($phase1_subject_id == 4 ){
            $phase1_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_math = mysqli_query($conn,$phase1_math);
            if(mysqli_num_rows($run_phase1_math) > 0){
                $rows2 = mysqli_fetch_array($run_phase1_math);
                while(mysqli_fetch_array($run_phase1_math));

                if($rows2['grade'] == 0 ){
                    $rows2['grade'] = " ";
                    }
    

                    $html.='
                    <td class="text-center"> '.$rows2['grade'].'</td>
                    ';
                
                }   

        
            }
      }


      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        $term = 3;

        if($phase1_subject_id == 4 ){
            $phase1_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_math = mysqli_query($conn,$phase1_math);
            if(mysqli_num_rows($run_phase1_math) > 0){
                $rows3 = mysqli_fetch_array($run_phase1_math);
                while(mysqli_fetch_array($run_phase1_math));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center"> '.$rows3['grade'].'</td> ';
                
                }   

        
            }
      }

      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
        $term = 4;
        if($phase1_subject_id == 4 ){
            $phase1_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_math = mysqli_query($conn,$phase1_math);
            if(mysqli_num_rows($run_phase1_math) > 0){
                $row4 = mysqli_fetch_array($run_phase1_math);
                while(mysqli_fetch_array($run_phase1_math));

                if($rows4['grade'] == 0 ){
                    $rows4['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center"> '.$rows4['grade'].'</td>  ';
                
                }   

        
            }
      }

      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
      
        
    if($phase1_subject_id == 4 ){
        $phase1_math = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_math = mysqli_query($conn,$phase1_math);
        if(mysqli_num_rows($run_phase1_math) > 0){
            $rows = mysqli_fetch_array($run_phase1_math);
            while(mysqli_fetch_array($run_phase1_math));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
                $rows['remarks'] = " ";
               }

                $html.='
                <td class="text-center">'.$rows['final_rating'].'</td>
                <td class="text-center">'.$rows['remarks'].'</td>
                </tr>';
            
            }   

    
        }
      }

                
      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 1;
           if($phase1_subject_id == 5 ){
                    $phase1_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_science = mysqli_query($conn,$phase1_science);
                    if(mysqli_num_rows($run_phase1_science) > 0){
                        $rows = mysqli_fetch_array($run_phase1_science);
                        while(mysqli_fetch_array($run_phase1_science));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }

                            $html.='
                            <tr>
                            <td class="subject">Science</td>
                            <td class="text-center">'.$rows['grade'].' </td>
                           
                            ';
                        
                        }

                
                    }

      }
      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 2;
        if($phase1_subject_id == 5 ){
            $phase1_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_science = mysqli_query($conn,$phase1_science);
            if(mysqli_num_rows($run_phase1_science) > 0){
                $rows2 = mysqli_fetch_array($run_phase1_science);
                while(mysqli_fetch_array($run_phase1_science));

                if($rows2['grade'] == 0 ){
                    $rows2['grade'] = " ";
                    }
    
    
                    $html.='
                    <td class="text-center">'.$rows2['grade'].'</td>
                      ';
                
                }
            }    

      }


      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        $term = 3;
        
        if($phase1_subject_id == 5 ){
            $phase1_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_science = mysqli_query($conn,$phase1_science);
            if(mysqli_num_rows($run_phase1_science) > 0){
                $rows3 = mysqli_fetch_array($run_phase1_science);
                while(mysqli_fetch_array($run_phase1_science));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows3['grade'].'</td>
                    ';
                
                }

        
            }


      }

      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
        $term = 4;
        if($phase1_subject_id == 5 ){
            $phase1_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_science = mysqli_query($conn,$phase1_science);
            if(mysqli_num_rows($run_phase1_science) > 0){
                $rows4 = mysqli_fetch_array($run_phase1_science);
                while(mysqli_fetch_array($run_phase1_science));

                if($rows4['grade'] == 0 ){
                    $rows4['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center"> '.$rows4['grade'].'</td>
                    ';
                
                }

        
            }


      }

      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        $term = 1;
        if($phase1_subject_id == 5 ){
            $phase1_science = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
            $run_phase1_science = mysqli_query($conn,$phase1_science);
            if(mysqli_num_rows($run_phase1_science) > 0){
                $rows = mysqli_fetch_array($run_phase1_science);
                while(mysqli_fetch_array($run_phase1_science));

                if($rows['final_rating'] == 0 ){
                    $rows['final_rating'] = " ";
                    $rows['remarks'] = " ";
                   }
                
    
                    $html.='
                    <td class="text-center"> '.$rows['final_rating'].'</td>
                    <td class="insert-remarks text-center"> '.$rows['remarks'].'</td>
                    </tr>';
                
                }
    
        
            }         
          
      }

            
      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 1;
      if($phase1_subject_id == 6 ){
        $phase1_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
        $run_phase1_AP = mysqli_query($conn,$phase1_AP);
        if(mysqli_num_rows($run_phase1_AP) > 0){
            $rows = mysqli_fetch_array($run_phase1_AP);
            while(mysqli_fetch_array($run_phase1_AP));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }



            $html.='
            <tr>
            <td class="subject">Araling Panlipunan</td>
            <td class="text-center">'.$rows['grade'].' </td>
              ';
        
        }


    }
}

      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 2;

              // phase 1 term 2 ap
              if($phase1_subject_id == 6 ){
                $phase1_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_AP = mysqli_query($conn,$phase1_AP);
                if(mysqli_num_rows($run_phase1_AP) > 0){
                    $rows2 = mysqli_fetch_array($run_phase1_AP);
                    while(mysqli_fetch_array($run_phase1_AP));

                    if($rows2['grade'] == 0 ){
                        $rows2['grade'] = " ";
                        }
        

                    $html.='
                    <td class="text-center">'.$rows2['grade'].'</td>
                     ';
                
                }


            }
      }

      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        $term = 3;

             // phase 1 term 3 ap
             if($phase1_subject_id == 6 ){
                $phase1_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_AP = mysqli_query($conn,$phase1_AP);
                if(mysqli_num_rows($run_phase1_AP) > 0){
                    $rows3 = mysqli_fetch_array($run_phase1_AP);
                    while(mysqli_fetch_array($run_phase1_AP));

                    if($rows3['grade'] == 0 ){
                        $rows3['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows3['grade'].' </td>
                    ';
                
                }


            }
      }

      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
        $term = 4;
        if($phase1_subject_id == 6 ){
            $phase1_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_AP = mysqli_query($conn,$phase1_AP);
            if(mysqli_num_rows($run_phase1_AP) > 0){
                $rows4 = mysqli_fetch_array($run_phase1_AP);
                while(mysqli_fetch_array($run_phase1_AP));

                if($rows4['grade'] == 0 ){
                    $rows4['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows4['grade'].'</td>
                >  ';
            
            }


        }
      }

       for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
           
        // phase 1 final rating ap
    if($phase1_subject_id == 6 ){
        $phase1_AP = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_AP = mysqli_query($conn,$phase1_AP);
        if(mysqli_num_rows($run_phase1_AP) > 0){
            $rows = mysqli_fetch_array($run_phase1_AP);
            while(mysqli_fetch_array($run_phase1_AP));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
                $rows['remarks'] = " ";
               }

            $html.='
            <td class="text-center">'.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].'</td>
            </tr> ';
        
        }


    }

       }

       //EPP/TLE
       for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 1;
// phase 1 term 1 EPP_TLE
if($phase1_subject_id == 7 ){
    $phase1_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
    $run_phase1_ep_tle = mysqli_query($conn,$phase1_epp_tle);
    if(mysqli_num_rows($run_phase1_ep_tle) > 0){
        $rows = mysqli_fetch_array($run_phase1_ep_tle);
        while(mysqli_fetch_array($run_phase1_ep_tle));

        if($rows['grade'] == 0 ){
            $rows['grade'] = " ";
            }

        $html.='
        <tr>
        <td class="subject">EPP/TLE</td>
        <td class="text-center">'.$rows['grade'].' </td>
          ';
    
    }


}

       }

       for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 2;
        if($phase1_subject_id == 7 ){
            $phase1_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_ep_tle = mysqli_query($conn,$phase1_epp_tle);
            if(mysqli_num_rows($run_phase1_ep_tle) > 0){
                $rows2 = mysqli_fetch_array($run_phase1_ep_tle);
                while(mysqli_fetch_array($run_phase1_ep_tle));

                if($rows2['grade'] == 0 ){
                    $rows2['grade'] = " ";
                    }
    

                $html.='
                <td class="text-center"> '.$rows2['grade'].'</td>
                    ';
            
            }


        }
       }

       for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        $term = 3;

        if($phase1_subject_id == 7 ){
            $phase1_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_ep_tle = mysqli_query($conn,$phase1_epp_tle);
            if(mysqli_num_rows($run_phase1_ep_tle) > 0){
                $rows3 = mysqli_fetch_array($run_phase1_ep_tle);
                while(mysqli_fetch_array($run_phase1_ep_tle));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows3['grade'].'</td>
                ';
            
            }


        }
       }

       for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
        $term = 4;
        if($phase1_subject_id == 7 ){
            $phase1_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_ep_tle = mysqli_query($conn,$phase1_epp_tle);
            if(mysqli_num_rows($run_phase1_ep_tle) > 0){
                $rows4 = mysqli_fetch_array($run_phase1_ep_tle);
                while(mysqli_fetch_array($run_phase1_ep_tle));

                if($rows4['grade'] == 0 ){
                    $rows4['grade'] = " ";
                    }

                $html.='
               <td class="text-center">'.$rows4['grade'].'</td>  ';
            
            }


        }


       }
           //term5
    for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        if($phase1_subject_id == 7 ){
            $phase1_epp_tle = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
            $run_phase1_ep_tle = mysqli_query($conn,$phase1_epp_tle);
            if(mysqli_num_rows($run_phase1_ep_tle) > 0){
                $rows = mysqli_fetch_array($run_phase1_ep_tle);
                while(mysqli_fetch_array($run_phase1_ep_tle));

                if($rows['final_rating'] == 0 ){
                    $rows['final_rating'] = " ";
                    $rows['remarks'] = " ";
                   }
    
                $html.='
                <td class="text-center">'.$rows['final_rating'].'</td>
                <td class="insert-remarks text-center"> '.$rows['remarks'].'</td>
                </tr>  ';
            
            }
    
    
        }
    }

                  //term1
          
      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 1;

        
                // phase 1 term 1 MAPEH
                if($phase1_subject_id == 8 ){
                    $phase1_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_mapeh = mysqli_query($conn,$phase1_mapeh);
                    if(mysqli_num_rows($run_phase1_mapeh) > 0){
                        $rows = mysqli_fetch_array($run_phase1_mapeh);
                        while(mysqli_fetch_array($run_phase1_mapeh));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }

                        $html.='
                        <tr>
                        <td class="subject">MAPEH</td>
                        <td class="text-center">'.$rows['grade'].' </td>
                         ';
                    
                    }


                }
                
           
      }
        //term2
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
            $term = 2;

            
                // phase 1 term 2 MAPEH
                if($phase1_subject_id == 8 ){
                    $phase1_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_mapeh = mysqli_query($conn,$phase1_mapeh);
                    if(mysqli_num_rows($run_phase1_mapeh) > 0){
                        $rows2 = mysqli_fetch_array($run_phase1_mapeh);
                        while(mysqli_fetch_array($run_phase1_mapeh));

                        if($rows2['grade'] == 0 ){
                            $rows2['grade'] = " ";
                            }
            
    
                        $html.='
                        <td class="text-center"> '.$rows2['grade'].'</td>
                          ';
                    
                    }
    
    
                }
        }

              //term3
              for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
                $term = 3;
                if($phase1_subject_id == 8 ){
                    $phase1_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_mapeh = mysqli_query($conn,$phase1_mapeh);
                    if(mysqli_num_rows($run_phase1_mapeh) > 0){
                        $rows3 = mysqli_fetch_array($run_phase1_mapeh);
                        while(mysqli_fetch_array($run_phase1_mapeh));

                        if($rows3['grade'] == 0 ){
                            $rows3['grade'] = " ";
                            }
    
                        $html.='
                        <td class="text-center"> '.$rows3['grade'].'</td> ';
                    
                    }
    
    
                }
            }

               //term4
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
            $term = 4;
            
            // phase 1 term 4 MAPEH
            if($phase1_subject_id == 8 ){
                $phase1_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_mapeh = mysqli_query($conn,$phase1_mapeh);
                if(mysqli_num_rows($run_phase1_mapeh) > 0){
                    $rows4 = mysqli_fetch_array($run_phase1_mapeh);
                    while(mysqli_fetch_array($run_phase1_mapeh));

                    if($rows4['grade'] == 0 ){
                        $rows4['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center"> '.$rows4['grade'].'</td>  ';
                
                }


            }
        }
         //term5
         for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
            
        // phase 1 final rating MAPEH
        if($phase1_subject_id == 8 ){
            $phase1_mapeh = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
            $run_phase1_mapeh = mysqli_query($conn,$phase1_mapeh);
            if(mysqli_num_rows($run_phase1_mapeh) > 0){
                $rows = mysqli_fetch_array($run_phase1_mapeh);
                while(mysqli_fetch_array($run_phase1_mapeh));

                if($rows['final_rating'] == 0 ){
                    $rows['final_rating'] = " ";
                    $rows['remarks'] = " ";
                   }

                $html.='
                <td class="text-center">'.$rows['final_rating'].'</td>
                <td class="text-center">'.$rows['remarks'].'</td>
                </tr>        
                ';
            
            }


    }
}

           //term1
          
           for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
            $term = 1;
            
                // phase 1 term 1 music
                if($phase1_subject_id == 9 ){
                    $phase1_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_music = mysqli_query($conn,$phase1_music);
                    if(mysqli_num_rows($run_phase1_music) > 0){
                        $rows = mysqli_fetch_array($run_phase1_music);
                        while(mysqli_fetch_array($run_phase1_music));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
    
                        $html.='
                        <tr>
                        <td class="small-pad-left italic">Music</td>
                        <td class="text-center">'.$rows['grade'].' </td>
                         ';
                    
                    }
    
    
                }
           }


             //term2
             for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
                $term = 2;

                     
                    // phase 1 term 2 music
                    if($phase1_subject_id == 9 ){
                        $phase1_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                        $run_phase1_music = mysqli_query($conn,$phase1_music);
                        if(mysqli_num_rows($run_phase1_music) > 0){
                            $rows2 = mysqli_fetch_array($run_phase1_music);
                            while(mysqli_fetch_array($run_phase1_music));

                            if($rows2['grade'] == 0 ){
                                $rows2['grade'] = " ";
                                }
        
                            $html.='
                            <td class="text-center"> '.$rows2['grade'].'</td>
                            ';
                        
                        }
        
        
                    }
             }    
             
                  //term3
            for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
                $term = 3;

                        // phase 1 term 3 music
            if($phase1_subject_id == 9 ){
                $phase1_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_music = mysqli_query($conn,$phase1_music);
                if(mysqli_num_rows($run_phase1_music) > 0){
                    $rows3 = mysqli_fetch_array($run_phase1_music);
                    while(mysqli_fetch_array($run_phase1_music));

                    if($rows3['grade'] == 0 ){
                        $rows3['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center"> '.$rows3['grade'].'</td>
                    ';
                
                }


            }
            }
            
              //term4
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
            $term = 4;
                    // phase 1 term 4 music
                    if($phase1_subject_id == 9 ){
                        $phase1_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                        $run_phase1_music = mysqli_query($conn,$phase1_music);
                        if(mysqli_num_rows($run_phase1_music) > 0){
                            $rows4 = mysqli_fetch_array($run_phase1_music);
                            while(mysqli_fetch_array($run_phase1_music));

                            if($rows4['grade'] == 0 ){
                                $rows4['grade'] = " ";
                                }
        
                            $html.='
                            <td class="text-center">'.$rows4['grade'].'</td>
                             ';
                        
                        }
        
        
                    }
        }    

        
        //term5
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
                 // phase 1 final rating music
    if($phase1_subject_id == 9 ){
        $phase1_music = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_music = mysqli_query($conn,$phase1_music);
        if(mysqli_num_rows($run_phase1_music) > 0){
            $rows = mysqli_fetch_array($run_phase1_music);
            while(mysqli_fetch_array($run_phase1_music));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
                $rows['remarks'] = " ";
               }

            $html.='
            <td class="text-center">'.$rows['final_rating'].'</td>
            <td class="insert-remarks text-center"> '.$rows['remarks'].'</td>
            </tr>
                ';
        
        }


    }
        }

        
                //term1
          
      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 1;
        

                        // phase 1 term 1 arts
                        if($phase1_subject_id == 10 ){
                            $phase1_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                            $run_phase1_arts = mysqli_query($conn,$phase1_arts);
                            if(mysqli_num_rows($run_phase1_arts) > 0){
                                $rows = mysqli_fetch_array($run_phase1_arts);
                                while(mysqli_fetch_array($run_phase1_arts));

                                if($rows['grade'] == 0 ){
                                    $rows['grade'] = " ";
                                    }
        
                                $html.='
                                <tr>
                                <td class="small-pad-left italic">Arts</td>
                                <td class="text-center">'.$rows['grade'].' </td>
                               ';
                            
                            }
        
        
                        }
        
      }

         //term2
         for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
            $term = 2;

            
                        // phase 1 term 2 arts
                        if($phase1_subject_id == 10 ){
                            $phase1_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                            $run_phase1_arts = mysqli_query($conn,$phase1_arts);
                            if(mysqli_num_rows($run_phase1_arts) > 0){
                                $rows2 = mysqli_fetch_array($run_phase1_arts);
                                while(mysqli_fetch_array($run_phase1_arts));

                                if($rows2['grade'] == 0 ){
                                    $rows2['grade'] = " ";
                                    }
            
                                $html.='
                                <td class="text-center">'.$rows2['grade'].'</td>
                                  ';
                            
                            }
            
            
                        }
            
         }
         
            //term3
            for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
                $term = 3;
                
                    // phase 1 term 3 arts
            if($phase1_subject_id == 10 ){
                $phase1_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_arts = mysqli_query($conn,$phase1_arts);
                if(mysqli_num_rows($run_phase1_arts) > 0){
                    $rows3 = mysqli_fetch_array($run_phase1_arts);
                    while(mysqli_fetch_array($run_phase1_arts));

                    if($rows3['grade'] == 0 ){
                        $rows3['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows3['grade'].'</td>
                    ';
                
                }


            }
            }      
            
        //term4
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
            $term = 4;
            
                    // phase 1 term 4 arts
                    if($phase1_subject_id == 10 ){
                        $phase1_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                        $run_phase1_arts = mysqli_query($conn,$phase1_arts);
                        if(mysqli_num_rows($run_phase1_arts) > 0){
                            $rows4 = mysqli_fetch_array($run_phase1_arts);
                            while(mysqli_fetch_array($run_phase1_arts));

                            if($rows4['grade'] == 0 ){
                                $rows4['grade'] = " ";
                                }
        
                            $html.='
                            <td class="text-center"> '.$rows4['grade'].'</td>
                            ';
                        
                        }
        
        
                    }
        }  
        
        //term5
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
                      // phase 1 final rating arts
        if($phase1_subject_id == 10 ){
            $phase1_arts = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
            $run_phase1_arts = mysqli_query($conn,$phase1_arts);
            if(mysqli_num_rows($run_phase1_arts) > 0){
                $rows = mysqli_fetch_array($run_phase1_arts);
                while(mysqli_fetch_array($run_phase1_arts));

                if($rows['final_rating'] == 0 ){
                    $rows['final_rating'] = " ";
                    $rows['remarks'] = " ";
                   }

                $html.='
                <td class="text-center"> '.$rows['final_rating'].'</td>
                <td class="text-center">'.$rows['remarks'].'</td>
                ';
            
            }


    }
        }

        
                //term1
          
      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 1;
        
                // phase 1 term 1 PE
                if($phase1_subject_id == 11 ){
                    $phase1_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_pe = mysqli_query($conn,$phase1_pe);
                    if(mysqli_num_rows($run_phase1_pe) > 0){
                        $rows = mysqli_fetch_array($run_phase1_pe);
                        while(mysqli_fetch_array($run_phase1_pe));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }

                        $html.='
                        <tr>
                            <td class="small-pad-left italic">Physical Education</td>
                            <td class="text-center">'.$rows['grade'].' </td>
                            ';
                    
                    }


                }
      }

        //term2
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
            $term = 2;
                // phase 1 term 2 PE
                if($phase1_subject_id == 11 ){
                    $phase1_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_pe = mysqli_query($conn,$phase1_pe);
                    if(mysqli_num_rows($run_phase1_pe) > 0){
                        $rows2 = mysqli_fetch_array($run_phase1_pe);
                        while(mysqli_fetch_array($run_phase1_pe));

                        if($rows2['grade'] == 0 ){
                            $rows2['grade'] = " ";
                            }
    
                        $html.='
                        <td class="text-center">'.$rows2['grade'].'</td>
                        ';
                    
                    }
    
    
                }
        }    

        
            //term3
            for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
                $term = 3;
                       // phase 1 term 3 PE
            if($phase1_subject_id == 11 ){
                $phase1_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_pe = mysqli_query($conn,$phase1_pe);
                if(mysqli_num_rows($run_phase1_pe) > 0){
                    $rows3 = mysqli_fetch_array($run_phase1_pe);
                    while(mysqli_fetch_array($run_phase1_pe));

                    if($rows3['grade'] == 0 ){
                        $rows3['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center"> '.$rows3['grade'].'</td>
                    ';
                
                }


            }
            }    
            
               //term4
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
            $term = 4;
            

            // phase 1 term 4 PE
            if($phase1_subject_id == 11 ){
                $phase1_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_pe = mysqli_query($conn,$phase1_pe);
                if(mysqli_num_rows($run_phase1_pe) > 0){
                    $rows4 = mysqli_fetch_array($run_phase1_pe);
                    while(mysqli_fetch_array($run_phase1_pe));

                    if($rows4['grade'] == 0 ){
                        $rows4['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center"> '.$rows4['grade'].'</td>
                ';
                
                }


            }

        }    

              //term5
              for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
                  

    // phase 1 final rating PE
    if($phase1_subject_id == 11 ){
        $phase1_pe = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_pe = mysqli_query($conn,$phase1_pe);
        if(mysqli_num_rows($run_phase1_pe) > 0){
            $rows = mysqli_fetch_array($run_phase1_pe);
            while(mysqli_fetch_array($run_phase1_pe));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
                $rows['remarks'] = " ";
               }

            $html.='
            <td class="text-center">'.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].'<   /td>
            </tr>
         ';
        
        }


    }
              }
              
                //term1
          
      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 1;
        
                // phase 1 term 1 Health
                if($phase1_subject_id == 12 ){
                    $phase1_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_health = mysqli_query($conn,$phase1_health);
                    if(mysqli_num_rows($run_phase1_health) > 0){
                        $rows = mysqli_fetch_array($run_phase1_health);
                        while(mysqli_fetch_array($run_phase1_health));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }

                        $html.='
                        <tr>
                        <td class="small-pad-left italic">Health</td>
                        <td class="text-center">'.$rows['grade'].' </td>
                         ';
                    
                    }


                }
      }

        //term2
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
            $term = 2;
            
                // phase 1 term 2 Health
                if($phase1_subject_id == 12 ){
                    $phase1_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_health = mysqli_query($conn,$phase1_health);
                    if(mysqli_num_rows($run_phase1_health) > 0){
                        $rows2 = mysqli_fetch_array($run_phase1_health);
                        while(mysqli_fetch_array($run_phase1_health));

                        if($rows2['grade'] == 0 ){
                            $rows2['grade'] = " ";
                            }
    
                        $html.='
                        <td class="text-center">'.$rows2['grade'].'</td>
                        ';
                    
                    }
    
    
                }
        }

             //term3
            for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
                $term = 3;
                      // phase 1 term 3 Health
            if($phase1_subject_id == 12 ){
                $phase1_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_health = mysqli_query($conn,$phase1_health);
                if(mysqli_num_rows($run_phase1_health) > 0){
                    $rows3 = mysqli_fetch_array($run_phase1_health);
                    while(mysqli_fetch_array($run_phase1_health));

                    if($rows3['grade'] == 0 ){
                        $rows3['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows3['grade'].'</td>
                    ';
                
                }


            }
            
         }

         
        //term4
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
            $term = 4;
            

            // phase 1 term 4 Health
            if($phase1_subject_id == 12 ){
                $phase1_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_health = mysqli_query($conn,$phase1_health);
                if(mysqli_num_rows($run_phase1_health) > 0){
                    $rows4 = mysqli_fetch_array($run_phase1_health);
                    while(mysqli_fetch_array($run_phase1_health));

                    if($rows4['grade'] == 0 ){
                        $rows4['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows4['grade'].' </td>
                    ';
                
                }


            }
        }

          //term5
          for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
              
    // phase 1 final rating Health
    if($phase1_subject_id == 12 ){
        $phase1_health = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_health = mysqli_query($conn,$phase1_health);
        if(mysqli_num_rows($run_phase1_health) > 0){
            $rows = mysqli_fetch_array($run_phase1_health);
            while(mysqli_fetch_array($run_phase1_health));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
                $rows['remarks'] = " ";
               }

            $html.='
            <td class="text-center">'.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].'</td>
            </tr>
            ';
        
        }


    }

          }

          
                //term1
          
      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 1;
             // phase 1 term 1 eduk sa pag papakatao
             if($phase1_subject_id == 13 ){
                $phase1_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_esp = mysqli_query($conn,$phase1_esp);
                if(mysqli_num_rows($run_phase1_esp) > 0){
                    $rows = mysqli_fetch_array($run_phase1_esp);
                    while(mysqli_fetch_array($run_phase1_esp));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="subject">Eduk. sa Pagpapakatao  </td>
                    <td class="text-center">'.$rows['grade'].' </td>
                     ';
                
                }


            }

      }

        //term2
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
            $term = 2;
            
                // phase 1 term 2 eduk sa pag papakatao
                if($phase1_subject_id == 13 ){
                    $phase1_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_esp = mysqli_query($conn,$phase1_esp);
                    if(mysqli_num_rows($run_phase1_esp) > 0){
                        $rows2 = mysqli_fetch_array($run_phase1_esp);
                        while(mysqli_fetch_array($run_phase1_esp));

                        if($rows2['grade'] == 0 ){
                            $rows2['grade'] = " ";
                            }
    
                        $html.='
                        <td class="text-center"> '.$rows2['grade'].'</td>
                        ';
                    
                    }
    
    
                }
        }

        
            //term3
            for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
                $term = 3;
                   // phase 1 term 3 eduk sa pag papakatao
            if($phase1_subject_id == 13 ){
                $phase1_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_esp = mysqli_query($conn,$phase1_esp);
                if(mysqli_num_rows($run_phase1_esp) > 0){
                    $rows3 = mysqli_fetch_array($run_phase1_esp);
                    while(mysqli_fetch_array($run_phase1_esp));

                    if($rows3['grade'] == 0 ){
                        $rows3['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows3['grade'].'</td>
                    ';
                
                }


            }

            }

               //term4
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
            $term = 4;
                // phase 1 term 4 eduk sa pag papakatao
                if($phase1_subject_id == 13 ){
                    $phase1_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_esp = mysqli_query($conn,$phase1_esp);
                    if(mysqli_num_rows($run_phase1_esp) > 0){
                        $rows4 = mysqli_fetch_array($run_phase1_esp);
                        while(mysqli_fetch_array($run_phase1_esp));

                        if($rows4['grade'] == 0 ){
                            $rows4['grade'] = " ";
                            }
    
                        $html.='
                        <td class="text-center"> '.$rows4['grade'].'</td>
                        ';
                    
                    }
    
    
                }
        }

        
        //term5
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
            // phase 1 final rating eduk sa pag papakatao
    if($phase1_subject_id == 13 ){
        $phase1_esp = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_esp = mysqli_query($conn,$phase1_esp);
        if(mysqli_num_rows($run_phase1_esp) > 0){
            $rows = mysqli_fetch_array($run_phase1_esp);
            while(mysqli_fetch_array($run_phase1_esp));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
                $rows['remarks'] = " ";
               }

            $html.='
            <td class="text-center">'.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].'</td>
            </tr>
            ';
        
        }


    }
        }

                     //term1
          
      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 1;
        
                // phase 1 term 1 arabic
                if($phase1_subject_id == 14 ){
                    $phase1_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_arabic = mysqli_query($conn,$phase1_arabic);
                    if(mysqli_num_rows($run_phase1_arabic) > 0){
                        $rows = mysqli_fetch_array($run_phase1_arabic);
                        while(mysqli_fetch_array($run_phase1_arabic));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }

                        $html.='
                        <tr>
                        <td class="small-pad-left">*Arabic Language</td>
                        <td class="text-center">'.$rows['grade'].' </td>
                        ';
                    
                    }


                }
      }

           //term2
           for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
            $term = 2;
            
                // phase 1 term 2 arabic
                if($phase1_subject_id == 14 ){
                    $phase1_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_arabic = mysqli_query($conn,$phase1_arabic);
                    if(mysqli_num_rows($run_phase1_arabic) > 0){
                        $rows2 = mysqli_fetch_array($run_phase1_arabic);
                        while(mysqli_fetch_array($run_phase1_arabic));

                        if($rows2['grade'] == 0 ){
                            $rows2['grade'] = " ";
                            }
    
                        $html.='
                        <td class="text-center"> '.$rows2['grade'].'</td>
                        ';
                    
                    }
    
    
                }
    
           }    

           
            //term3
            for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
                $term = 3;
                      // phase 1 term 3 arabic
            if($phase1_subject_id == 14 ){
                $phase1_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_arabic = mysqli_query($conn,$phase1_arabic);
                if(mysqli_num_rows($run_phase1_arabic) > 0){
                    $rows3 = mysqli_fetch_array($run_phase1_arabic);
                    while(mysqli_fetch_array($run_phase1_arabic));

                    if($rows3['grade'] == 0 ){
                        $rows3['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows3['grade'].'</td>
                    ';
                
                }


            }
            }       
            
            
        //term4
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
            $term = 4;
                 // phase 1 term 4 arabic
                 if($phase1_subject_id == 14 ){
                    $phase1_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_arabic = mysqli_query($conn,$phase1_arabic);
                    if(mysqli_num_rows($run_phase1_arabic) > 0){
                        $rows4 = mysqli_fetch_array($run_phase1_arabic);
                        while(mysqli_fetch_array($run_phase1_arabic));

                        if($rows4['grade'] == 0 ){
                            $rows4['grade'] = " ";
                            }
    
                        $html.='
                        <td class="text-center">'.$rows4['grade'].'</td>
                        ';
                    
                    }
    
    
                }
        }    

        
        //term5
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
            
    // phase 1 final rating arabic
    if($phase1_subject_id == 14 ){
        $phase1_arabic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_arabic = mysqli_query($conn,$phase1_arabic);
        if(mysqli_num_rows($run_phase1_arabic) > 0){
            $rows = mysqli_fetch_array($run_phase1_arabic);
            while(mysqli_fetch_array($run_phase1_arabic));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
                $rows['remarks'] = " ";
               }

            $html.='
            <td class="text-center">'.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].'</td>
            </tr>
             ';
        
        }


    }
        }

        
                //term1
          
      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 1;
                 
                // phase 1 term 1 islamic
                if($phase1_subject_id == 15 ){
                    $phase1_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_islamic = mysqli_query($conn,$phase1_islamic);
                    if(mysqli_num_rows($run_phase1_islamic) > 0){
                        $rows = mysqli_fetch_array($run_phase1_islamic);
                        while(mysqli_fetch_array($run_phase1_islamic));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }

                        $html.='
                        <tr>
                        <td class="small-pad-left">*Islamic Values Education</td>
                        <td class="text-center">'.$rows['grade'].' </td>
                         ';
                    
                    }


                }
        

      }

      //term2
      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 2;
                 
                // phase 1 term 2 islamic
                if($phase1_subject_id == 15 ){
                    $phase1_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_islamic = mysqli_query($conn,$phase1_islamic);
                    if(mysqli_num_rows($run_phase1_islamic) > 0){
                        $rows2 = mysqli_fetch_array($run_phase1_islamic);
                        while(mysqli_fetch_array($run_phase1_islamic));

                        if($rows2['grade'] == 0 ){
                            $rows2['grade'] = " ";
                            }
    
                        $html.='
                        <td class="text-center">'.$rows['grade'].'</td>
                          ';
                    
                    }
    
    
                }
    
      }

      
            //term3
            for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
                $term = 3;
                       
            // phase 1 term 3 islamic
            if($phase1_subject_id == 15 ){
                $phase1_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_islamic = mysqli_query($conn,$phase1_islamic);
                if(mysqli_num_rows($run_phase1_islamic) > 0){
                    $rows3 = mysqli_fetch_array($run_phase1_islamic);
                    while(mysqli_fetch_array($run_phase1_islamic));

                    if($rows3['grade'] == 0 ){
                        $rows3['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows3['grade'].'</td>
                    ';
                    
                
                }


            }

            }   
            
            
        //term4
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
            $term = 4;
                
            // phase 1 term 4 islamic
            if($phase1_subject_id == 15 ){
                $phase1_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_islamic = mysqli_query($conn,$phase1_islamic);
                if(mysqli_num_rows($run_phase1_islamic) > 0){
                    $rows4 = mysqli_fetch_array($run_phase1_islamic);
                    while(mysqli_fetch_array($run_phase1_islamic));

                    if($rows4['grade'] == 0 ){
                        $rows4['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center"> '.$rows4['grade'].'</td>
                     ';
                
                }


            }
        }
        
        //term5
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
            
    // phase 1 final rating islamic
    if($phase1_subject_id == 15 ){
        $phase1_islamic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_islamic = mysqli_query($conn,$phase1_islamic);
        if(mysqli_num_rows($run_phase1_islamic) > 0){
            $rows = mysqli_fetch_array($run_phase1_islamic);
            while(mysqli_fetch_array($run_phase1_islamic));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
                $rows['remarks'] = " ";
               }

            $html.='
            <td class="text-center"> '.$rows['final_rating'].'</td>
            <td class="text-center"> '.$rows['remarks'].' </td>
           
            ';
        
        }


    }
        }

        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
            $term = 1;
                   //phase 1 term 1 general average
                   if( $phase1_subject_id == 16){
                    $phase1_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase1'";
                    $run_phase1_term1_general_average = mysqli_query($conn,$phase1_term1_general_average_query);
                    if(mysqli_num_rows($run_phase1_term1_general_average)> 0 ){
                        $rows = mysqli_fetch_array($run_phase1_term1_general_average);

                        if($rows['general_average'] == 0 ){
                            $rows['general_average'] = " ";
                            }
                        $html.='
                        <tr>
                        <td class="subject">General Average</td>
                        <td class="insert-gen-av text-center">'.$rows['general_average'].'</td>
                       
                        ';
                    


                    }
                    


                }

        }    

               //term2
               for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
                $term = 2;
                       //phase 1 term 2 general average
                       if( $phase1_subject_id == 16){
                        $phase1_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase1' ";
                        $run_phase1_term1_general_average = mysqli_query($conn,$phase1_term1_general_average_query);
                        if(mysqli_num_rows($run_phase1_term1_general_average)> 0 ){
                            $rows2 = mysqli_fetch_array($run_phase1_term1_general_average);

                            if($rows2['general_average'] == 0 ){
                                $rows2['general_average'] = " ";
                                }

                            $html.='
                            <td class="text-center">'.$rows2['general_average'].'</td>
                             ';
                        
        
        
                        }
                        
        
        
                    }
               }        
    
            //term3
            for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
                $term = 3;
                

            //phase 1 term 3 general average
            if( $phase1_subject_id == 16){
                $phase1_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase1' ";
                $run_phase1_term1_general_average = mysqli_query($conn,$phase1_term1_general_average_query);
                if(mysqli_num_rows($run_phase1_term1_general_average)> 0 ){
                    $rows3 = mysqli_fetch_array($run_phase1_term1_general_average);

                    if($rows3['general_average'] == 0 ){
                        $rows3['general_average'] = " ";
                        }
                    $html.='
                    <td class="text-center">'.$rows3['general_average'].'</td>
                      ';
                


                }
                


            }


            }

            
        //term4
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
            $term = 4;
            

            //phase 1 term 4 general average
            if( $phase1_subject_id == 16){
                $phase1_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase1' ";
                $run_phase1_term1_general_average = mysqli_query($conn,$phase1_term1_general_average_query);
                if(mysqli_num_rows($run_phase1_term1_general_average)> 0 ){
                    $rows4 = mysqli_fetch_array($run_phase1_term1_general_average);

                    if($rows4['general_average'] == 0 ){
                        $rows4['general_average'] = " ";
                        }
                    $html.='
                    <td class="text-center">'.$rows4['general_average'].'</td>
                      ';
                


                }
                


            }
        }
             //term5
             for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
                 //phase 1 final rating general average
    if( $phase1_subject_id == 16){
        $phase1_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND  phase = '$phase1' AND term = 'Final Rating' ";
        $run_phase1_term1_general_average = mysqli_query($conn,$phase1_term1_general_average_query);
        if(mysqli_num_rows($run_phase1_term1_general_average)> 0 ){

            $rows = mysqli_fetch_array($run_phase1_term1_general_average);

            if($rows['general_average'] == 0 ){
                $rows['general_average'] = " ";
                }


            //phase 1 remarks
            $sql_total_remarks_phase1 = "SELECT final_rating, final_rating, COUNT(remarks) AS 'total_remarks' , lrn FROM student_final_ratings 
            WHERE phase = '1' AND lrn = '$decrypted_lrn' AND remarks= 'FAILED' ";
            $run_total_remarks_phase1 = mysqli_query($conn,$sql_total_remarks_phase1);

            $remarks = mysqli_fetch_array($run_total_remarks_phase1);

            if($remarks['total_remarks'] == 15){
                $output = "";
              }else if($remarks['total_remarks'] >= 3){
                $output = "RETAINED";
              }else if ($remarks['total_remarks'] == 2){
                $output = "REMEDIAL";
              }else if($remarks['total_remarks'] <= 1){
                $output = "PROMOTED";
              }


            
            
            $html.='
            <td class="insert-gen-av text-center">'.$rows['general_average'].'</td>
            <td> '.$output.' </td>
          
            </tr>
            </tbody>
            

            ';

           

        }
        


    }
             }
$html.='

</table>


';

// insert remeidal here

for($phase1_remedial_term = 1; $phase1_remedial_term <=2; $phase1_remedial_term++){

    if($phase1_remedial_term == 1 ){

        $phase1_remedial_query = " SELECT * FROM `remedial_classes` WHERE lrn ='$decrypted_lrn'AND phase = '$phase1' AND term = '$phase1_remedial_term' ";
        $phase1_run_query = mysqli_query($conn,$phase1_remedial_query);
        if(mysqli_num_rows($phase1_run_query)> 0 ){
            $rows = mysqli_fetch_array($phase1_run_query);
            while(mysqli_fetch_array($phase1_run_query));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
               }

               if($rows['recomputed_final_grade'] == 0 ){
                $rows['recomputed_final_grade'] = " ";
               }

               if($rows['date_from'] == "1970-01-01" || $rows['date_from'] == "0000-00-00"){
                $rows['date_from'] = "";
            }

            if($rows['date_to'] == "1970-01-01" || $rows['date_to'] == "0000-00-00"){
             $rows['date_to'] = "";
            }


            $html.='
            <table style="margin-top:4px;">
                <thead>
                    <tr class="remedial">
                        <th colspan="2">Remedial Classes</th>
                        <th colspan="2" class="text-start" style="border-right: none;"> Date Conducted: '.$rows['date_from'].'</th>
                        <th colspan="2" class="text-start" style="border-left: none;">To: '.$rows['date_to'].'</th>
                    </tr>
                    <tr class="arial-header text-center">
                        <td colspan="2">Learning Areas</td>
                        <td>Final Rating</td>
                        <td>Remedial Class <br> Mark</td>
                        <td>Recomputed <br> Final Grade</td>
                        <td>Remarks</td>
                    </tr>
                </thead>
                <tbody>
                <tr >
                    <td colspan="2" class="remedial-2 text-center">'.$rows['learning_areas'].'</td>
                    <td class="remedial-2 text-center">'.$rows['final_rating'].'</td>
                    <td class="remedial-2 text-center">'.$rows['remarks'].'</td>
                    <td class="remedial-2 text-center">'.$rows['recomputed_final_grade'].'</td>
                    <td class="remedial-2 text-center">'.$rows['remedial_class_mark'].'</td>
                    
                </tr>
            ';
        }
        //last 1
        
    }


            if($phase1_remedial_term == 2 ){

                $phase1_remedial_query = " SELECT * FROM `remedial_classes` WHERE lrn ='$decrypted_lrn'AND phase = '$phase1' AND term = '$phase1_remedial_term' ";
            $phase1_run_query = mysqli_query($conn,$phase1_remedial_query);
            if(mysqli_num_rows($phase1_run_query)> 0 ){
                $rows = mysqli_fetch_array($phase1_run_query);
                while(mysqli_fetch_array($phase1_run_query));

                if($rows['final_rating'] == 0 ){
                    $rows['final_rating'] = " ";
                   }
    
                   if($rows['recomputed_final_grade'] == 0 ){
                    $rows['recomputed_final_grade'] = " ";
                   }

                $html.='
                    <tr >
                        <td colspan="2" class="remedial-2 text-center">'.$rows['learning_areas'].'</td>
                        <td class="remedial-2 text-center">'.$rows['final_rating'].'</td>
                        <td class="remedial-2 text-center">'.$rows['remarks'].'</td>
                        <td class="remedial-2 text-center">'.$rows['remedial_class_mark'].'</td>
                        <td class="remedial-2 text-center">'.$rows['recomputed_final_grade'].'</td>
                    </tr>
                </tbody>
            </table>   
        </td>
        <td style="width:.8em; border:none;">
        </td>
           ';
            
        }

    }
}

$phase2_scholastic_query = "SELECT * FROM `scholastic_records` WHERE lrn = '$decrypted_lrn' AND phase = $phase2";
$run_phase2_scholastic = mysqli_query($conn,$phase2_scholastic_query);
if(mysqli_num_rows($run_phase2_scholastic) > 0){
    $rows = mysqli_fetch_array($run_phase2_scholastic);

    while(mysqli_fetch_array($run_phase2_scholastic));

$html.='
        <td class="phase_2" style="width: 48%;  border:none;">
            <table class="phase_head">
                <tr>
                    <td colspan="6"><span class="main-arial-text">School: <span style="font-weight: bold;">'.$rows['school'].'</span></span></td>
                    <td colspan="6" style="text-align: right;><span class="main-arial-text">School ID: <span style="font-weight: bold;">'.$rows['school_id'].'</span></span></td>
                </tr>
                <tr>
                    <td colspan="4"><span class="main-arial-text">District: <span style="font-weight: bold;">'.$rows['district'].'</span></span></td>
                    <td colspan="4" style="text-align: center;"><span class="main-arial-text">Division: <span style="font-weight: bold;">'.$rows['division'].'</span></span></td>
                    <td colspan="4" style="text-align: right;"><span class="main-arial-text">Region: <span style="font-weight: bold;">'.$rows['region'].'</span></span></td>
                </tr>
                <tr>
                    <td colspan="3"><span class="main-arial-text">Classified as Grade: <span style="font-weight: bold;">'.$rows['classified_as_grade'].'</span></span></td>
                    <td colspan="5" style="text-align: center;"><span class="main-arial-text" >Section: <span style="font-weight: bold;">'.$rows['section'].'</span></span></td>
                    <td colspan="4" style="text-align: right;"><span class="main-arial-text">School year: <span style="font-weight: bold;">'.$rows['school_year'].'-2012</span></span></td>
                </tr>
                <tr>
                    <td colspan="6"><span class="main-arial-text">Name of adviser: <span style="font-weight: bold;">'.$rows['name_of_teacher'].'</span></span></td>
                    <td colspan="6" style="text-align: right;"><span class="main-arial-text">Signature:<span style="font-weight: bold;">'.$rows['signature'].'</span></span></td>
                </tr>
            </table>
';

}

//----------------------------------------------PHASE2----------------------------- -----------------


$html.='
                <table>
                    <thead>
                        <tr>
                            <th rowspan="2">Learning Areas</th>
                            <th class="quarterly" colspan="4">Quarterly Rating</th>
                            <th colspan="1" class="final-rating" rowspan="2" >Final <br> Rating</th>
                            <th rowspan="2">Remarks</th>
                        </tr>
                        <tr class="quarter">
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                        </tr>
                    </thead>    
                    <tbody> 
                
        
      
';

//Mohers Tongue Phase 2 
//phase 2 term 1 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 1;
    

if($phase2_subject_id == 1){

//phase 1 term 1 mother tongue 
$phase2_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
$run_phase2_mt = mysqli_query($conn,$phase2_mt);
if(mysqli_num_rows($run_phase2_mt) > 0){
$rows = mysqli_fetch_array($run_phase2_mt);
while(mysqli_fetch_array($run_phase2_mt));

if($rows['grade'] == 0 ){
    $rows['grade'] = " ";
    }

$html.=' 
<tr>
<td class="subject">Mother Tongue</td>
<td class="text-center">'.$rows['grade'].'</td>




 ';

}
}
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {


$term = 2;


if($phase2_subject_id == 1){

//phase 2 term 2 mother tongue 
$phase2_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
$run_phase2_mt = mysqli_query($conn,$phase2_mt);
if(mysqli_num_rows($run_phase2_mt) > 0){
$rows2 = mysqli_fetch_array($run_phase2_mt);
while(mysqli_fetch_array($run_phase2_mt));

if($rows2['grade'] == 0 ){
    $rows2['grade'] = " ";
    }

$html.=' <td class="text-center">'.$rows2['grade'].'</td>';

}
}
}
for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {


$term = 3;


if($phase2_subject_id == 1){

//phase 2 term 3 mother tongue 
$phase2_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
$run_phase2_mt = mysqli_query($conn,$phase2_mt);
if(mysqli_num_rows($run_phase2_mt) > 0){
$rows3 = mysqli_fetch_array($run_phase2_mt);
while(mysqli_fetch_array($run_phase2_mt));

if($rows3['grade'] == 0 ){
    $rows3['grade'] = " ";
    }

$html.='<td class="text-center"> '.$rows3['grade'].'</td>
 ';

}
}
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {


$term = 4;


if($phase2_subject_id == 1){

            //phase 2 term 4 mother tongue 
    $phase2_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
    $run_phase2_mt = mysqli_query($conn,$phase2_mt);
    if(mysqli_num_rows($run_phase2_mt) > 0){
        $rows4 = mysqli_fetch_array($run_phase2_mt);
        while(mysqli_fetch_array($run_phase2_mt));

        if($rows4['grade'] == 0 ){
            $rows4['grade'] = " ";
            }


            $html.='<td class="text-center">'.$rows4['grade'].'</td>
          ';
        
        }
    }
}

    for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {





        if($phase2_subject_id == 1){
        
                    //phase 1 final rating mother tongue 
            $phase2_mt = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
            $run_phase2_mt = mysqli_query($conn,$phase2_mt);
            if(mysqli_num_rows($run_phase2_mt) > 0){
                $rows = mysqli_fetch_array($run_phase2_mt);
                while(mysqli_fetch_array($run_phase2_mt));

                if($rows['final_rating'] == 0 ){
                    $rows['final_rating'] = " ";
                    $rows['remarks'] = " ";
                   }
        
                    $html.=' 
                    <td class="text-center">'.$rows['final_rating'].'</td>
                    <td class="text-center">'.$rows['remarks'].'</td>
                      ';
                
                }
            }
        }


        //Filipino Phase 2 
        //phase 2 term 1 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 1;
    //phase 1 term 1 filipino

    if($phase2_subject_id == 2 ){
        $phase2_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_filipino = mysqli_query($conn,$phase2_filipino);
        if(mysqli_num_rows($run_phase2_filipino) > 0){
            $rows = mysqli_fetch_array($run_phase2_filipino);
            while(mysqli_fetch_array($run_phase2_filipino));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

                $html.='
                <tr>
                <td class="subject">Filipino</td>
                <td class="text-center">'.$rows['grade'].' </td>
                  ';
            
            }

    
        }

}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;

        //phase 1 term 2 filipino

        if($phase2_subject_id == 2 ){
            $phase2_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_filipino = mysqli_query($conn,$phase2_filipino);
            if(mysqli_num_rows($run_phase2_filipino) > 0){
                $rows2 = mysqli_fetch_array($run_phase2_filipino);
                while(mysqli_fetch_array($run_phase2_filipino));

                if($rows2['grade'] == 0 ){
                    $rows2['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center"> '.$rows2['grade'].'</td>
                    ';
                
                }

        
            }
    

}

    //phase 2 term 3 //////////////////////////////////////////////

    for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {


    $term = 3;

    
        //phase 1 term 3 filipino

        if($phase2_subject_id == 2 ){
            $phase2_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_filipino = mysqli_query($conn,$phase2_filipino);
            if(mysqli_num_rows($run_phase2_filipino) > 0){
                $rows3 = mysqli_fetch_array($run_phase2_filipino);
                while(mysqli_fetch_array($run_phase2_filipino));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center"> '.$rows3['grade'].'</td>
                    ';
                
                }

        
            }


}

//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
    
        //phase 2 term 4 filipino

        if($phase2_subject_id == 2 ){
            $phase2_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_filipino = mysqli_query($conn,$phase2_filipino);
            if(mysqli_num_rows($run_phase2_filipino) > 0){
                $rows4 = mysqli_fetch_array($run_phase2_filipino);
                while(mysqli_fetch_array($run_phase2_filipino));

                if($rows4['grade'] == 0 ){
                    $rows4['grade'] = " ";
                    }
    

                    $html.='
                    <td class="text-center"> '.$rows4['grade'].'</td>
                    ';
                
                }

        
            }
}


for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
//phase 1 final rating filipino

if($phase2_subject_id == 2 ){
    $phase2_filipino = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_filipino = mysqli_query($conn,$phase2_filipino);
    if(mysqli_num_rows($run_phase2_filipino) > 0){
        $rows = mysqli_fetch_array($run_phase2_filipino);
        while(mysqli_fetch_array($run_phase2_filipino));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

            $html.='
            <td class="text-center">'.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].'</td>
            </tr> 
            ';
        
        }


    }

}
// English Phase 2 

//phase 2 term 1 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 1;
    
    // phase 2 term 1 english 

    if($phase2_subject_id == 3 ){
        $phase2_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_english = mysqli_query($conn,$phase2_english);
        if(mysqli_num_rows($run_phase2_english) > 0){
            $rows = mysqli_fetch_array($run_phase2_english);
            while(mysqli_fetch_array($run_phase2_english));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

                $html.='
                <tr>
                <td class="subject">English</td>
                <td class="text-center">'.$rows['grade'].'</td>
                    ';
            
            }

    
        }


}

// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;

    
    // phase 2 term 2 english 

    if($phase2_subject_id == 3 ){
        $phase2_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_english = mysqli_query($conn,$phase2_english);
        if(mysqli_num_rows($run_phase2_english) > 0){
            $rows2 = mysqli_fetch_array($run_phase2_english);
            while(mysqli_fetch_array($run_phase2_english));

            if($rows2['grade'] == 0 ){
                $rows2['grade'] = " ";
                }

                $html.='
                <td class="text-center">'.$rows2['grade'].'</td>
                ';
            
            }

    
        }

}

            
//phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {


    $term = 3;
    
        // phase 2 term 3 english 

    if($phase2_subject_id == 3 ){
        $phase2_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_english = mysqli_query($conn,$phase2_english);
        if(mysqli_num_rows($run_phase2_english) > 0){
            $rows3 = mysqli_fetch_array($run_phase2_english);
            while(mysqli_fetch_array($run_phase2_english));

            if($rows3['grade'] == 0 ){
                $rows3['grade'] = " ";
                }

                $html.='
                <td class="text-center">'.$rows3['grade'].'</td>
                    ';
            
            }


        }

}

//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
    
        // phase 2 term 4 english 

if($phase2_subject_id == 3 ){
    $phase2_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
    $run_phase2_english = mysqli_query($conn,$phase2_english);
    if(mysqli_num_rows($run_phase2_english) > 0){
        $rows4 = mysqli_fetch_array($run_phase2_english);
        while(mysqli_fetch_array($run_phase2_english));

        if($rows4['grade'] == 0 ){
            $rows4['grade'] = " ";
            }


            $html.='
            <td class="text-center">'.$rows4['grade'].'</td>
            ';
        
        }


    }
}
for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    // phase 2 final rating english 

if($phase2_subject_id == 3 ){
    $phase2_english = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_english = mysqli_query($conn,$phase2_english);
    if(mysqli_num_rows($run_phase2_english) > 0){
        $rows = mysqli_fetch_array($run_phase2_english);
        while(mysqli_fetch_array($run_phase2_english));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

            $html.='
            <td class="text-center">'.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].'</td>
            </tr> ';
        
        }


    }


}

// Mathematics Phase-2 

//phase 2 term 1 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
        //phase 1 term 1 math

        if($phase2_subject_id == 4 ){
            $phase2_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_math = mysqli_query($conn,$phase2_math);
            if(mysqli_num_rows($run_phase2_math) > 0){
                $rows = mysqli_fetch_array($run_phase2_math);
                while(mysqli_fetch_array($run_phase2_math));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <tr>
                    <td class="subject">Mathematics</td>
                    <td class="text-center"> '.$rows['grade'].'</td>
                    ';
                
                }   

        
            }
    
    $term = 1;


}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;
    
            //phase 1 term 2 math

            if($phase2_subject_id == 4 ){
                $phase2_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_math = mysqli_query($conn,$phase2_math);
                if(mysqli_num_rows($run_phase2_math) > 0){
                    $rows2 = mysqli_fetch_array($run_phase2_math);
                    while(mysqli_fetch_array($run_phase2_math));

                    if($rows2['grade'] == 0 ){
                        $rows2['grade'] = " ";
                        }

                        $html.='
                        <td class="text-center">'.$rows2['grade'].'</td>
                         ';
                    
                    }   

            
                }
   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;

        //phase 2 term 3 math

        if($phase2_subject_id == 4 ){
            $phase2_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_math = mysqli_query($conn,$phase2_math);
            if(mysqli_num_rows($run_phase2_math) > 0){
                $rows3 = mysqli_fetch_array($run_phase2_math);
                while(mysqli_fetch_array($run_phase2_math));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center"> '.$rows3['grade'].'</td>
                    ';
                
                }   

        
            }

}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;

    //phase 2 term 4 math

    if($phase2_subject_id == 4 ){
        $phase2_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_math = mysqli_query($conn,$phase2_math);
        if(mysqli_num_rows($run_phase2_math) > 0){
            $rows4 = mysqli_fetch_array($run_phase2_math);
            while(mysqli_fetch_array($run_phase2_math));

            if($rows4['grade'] == 0 ){
                $rows4['grade'] = " ";
                }


                $html.='
                <td class="text-center"> '.$rows4['grade'].'</td>
                    ';
            
            }   

    
        }
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    //phase 2 final rating math

if($phase2_subject_id == 4 ){
    $phase2_math = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_math = mysqli_query($conn,$phase2_math);
    if(mysqli_num_rows($run_phase2_math) > 0){
        $rows = mysqli_fetch_array($run_phase2_math);
        while(mysqli_fetch_array($run_phase2_math));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

            $html.='
            <td class="text-center">'.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].' </td>
            </tr>
            ';
        
        }   


    }

}


// Science phase 2
        


//phase 2 term 1 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 1;
    
                // phase 2 term 1 science

                if($phase2_subject_id == 5 ){
                    $phase2_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                    $run_phase2_science = mysqli_query($conn,$phase2_science);
                    if(mysqli_num_rows($run_phase2_science) > 0){
                        $rows = mysqli_fetch_array($run_phase2_science);
                        while(mysqli_fetch_array($run_phase2_science));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
    
                            $html.='
                            <tr>
                            <td class="subject">Science</td>
                            <td class="text-center">'.$rows['grade'].'</td>
                            ';
                        
                        }
    
                
                    }
    


}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;
         // phase 2 term 2 science

         if($phase2_subject_id == 5 ){
            $phase2_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_science = mysqli_query($conn,$phase2_science);
            if(mysqli_num_rows($run_phase2_science) > 0){
                $rows2 = mysqli_fetch_array($run_phase2_science);
                while(mysqli_fetch_array($run_phase2_science));

                if($rows2['grade'] == 0 ){
                    $rows2['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows2['grade'].'</td>
                    ';
                
                }

        
            }
   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;
               // phase 2 term 3 science

               if($phase2_subject_id == 5 ){
                $phase2_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_science = mysqli_query($conn,$phase2_science);
                if(mysqli_num_rows($run_phase2_science) > 0){
                    $rows3 = mysqli_fetch_array($run_phase2_science);
                    while(mysqli_fetch_array($run_phase2_science));

                    if($rows3['grade'] == 0 ){
                        $rows3['grade'] = " ";
                        }
    
                        $html.='
                        <td class="text-center">'.$rows3['grade'].'</td>
                        ';
                    
                    }
    
            
                }

}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
          // phase 2 term 4 science

          if($phase2_subject_id == 5 ){
            $phase2_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_science = mysqli_query($conn,$phase2_science);
            if(mysqli_num_rows($run_phase2_science) > 0){
                $rows4 = mysqli_fetch_array($run_phase2_science);
                while(mysqli_fetch_array($run_phase2_science));

                if($rows4['grade'] == 0 ){
                    $rows4['grade'] = " ";
                    }
    

                    $html.='
                    <td class="text-center">'.$rows4['grade'].'</td>
                        ';
                
                }

        
            }
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    // phase 2 final rating science

if($phase2_subject_id == 5 ){
    $phase2_science = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_science = mysqli_query($conn,$phase2_science);
    if(mysqli_num_rows($run_phase2_science) > 0){
        $rows = mysqli_fetch_array($run_phase2_science);
        while(mysqli_fetch_array($run_phase2_science));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

            $html.='
            <td class="text-center"> '.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].'</td>
            </tr>
            ';
        
        }


    }

}


//Aralin Panlipunan phase 2 




//phase 2 term 1 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
                // phase 2 term 1 ap
                if($phase2_subject_id == 6 ){
                    $phase2_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                    $run_phase2_AP = mysqli_query($conn,$phase2_AP);
                    if(mysqli_num_rows($run_phase2_AP) > 0){
                        $rows = mysqli_fetch_array($run_phase2_AP);
                        while(mysqli_fetch_array($run_phase2_AP));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
    
                        $html.='
                        <tr>
                        <td class="subject">Araling Panlipunan</td>
                        <td class="text-center">'.$rows['grade'].'</td>
                        ';
                    
                    }
    
    
                }
    $term = 1;


}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;
           // phase 2 term 2 ap
           if($phase2_subject_id == 6 ){
            $phase2_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_AP = mysqli_query($conn,$phase2_AP);
            if(mysqli_num_rows($run_phase2_AP) > 0){
                $rows2 = mysqli_fetch_array($run_phase2_AP);
                while(mysqli_fetch_array($run_phase2_AP));

                if($rows2['grade'] == 0 ){
                    $rows2['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows2['grade'].'</td>
                    ';
            
            }


        }

   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;
          // phase 2 term 3 ap
          if($phase2_subject_id == 6 ){
            $phase2_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_AP = mysqli_query($conn,$phase2_AP);
            if(mysqli_num_rows($run_phase2_AP) > 0){
                $rows3 = mysqli_fetch_array($run_phase2_AP);
                while(mysqli_fetch_array($run_phase2_AP));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows3['grade'].'</td>
                ';
            
            }


        }

}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
    
            // phase 2 term 4 ap
            if($phase2_subject_id == 6 ){
                $phase2_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_AP = mysqli_query($conn,$phase2_AP);
                if(mysqli_num_rows($run_phase2_AP) > 0){
                    $rows5 = mysqli_fetch_array($run_phase2_AP);
                    while(mysqli_fetch_array($run_phase2_AP));

                    if($rows4['grade'] == 0 ){
                        $rows4['grade'] = " ";
                        }
        
    
                    $html.='
                    <td class="text-center">'.$rows4['grade'].'</td>
                    ';
                
                }
    
    
            }
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
       // phase 2 final rating ap
if($phase2_subject_id == 6 ){
    $phase2_AP = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_AP = mysqli_query($conn,$phase2_AP);
    if(mysqli_num_rows($run_phase2_AP) > 0){
        $rows = mysqli_fetch_array($run_phase2_AP);
        while(mysqli_fetch_array($run_phase2_AP));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr> ';
    
    }


}

}


// EPP/TLE




//phase 2 term 1 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 1;
    

            // phase 2 term 1 EPP_TLE
            if($phase2_subject_id == 7 ){
                $phase2_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_ep_tle = mysqli_query($conn,$phase2_epp_tle);
                if(mysqli_num_rows($run_phase2_ep_tle) > 0){
                    $rows = mysqli_fetch_array($run_phase2_ep_tle);
                    while(mysqli_fetch_array($run_phase2_ep_tle));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="subject">EPP/TLE</td>
                    <td>'.$rows['grade'].'</td>
                  
                    ';
                
                }


            }


}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;
    
            // phase 2 term 2 EPP_TLE
            if($phase2_subject_id == 7 ){
                $phase2_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_ep_tle = mysqli_query($conn,$phase2_epp_tle);
                if(mysqli_num_rows($run_phase2_ep_tle) > 0){
                    $rows2 = mysqli_fetch_array($run_phase2_ep_tle);
                    while(mysqli_fetch_array($run_phase2_ep_tle));

                    if($rows2['grade'] == 0 ){
                        $rows2['grade'] = " ";
                        }

                    $html.='
                    <td >'.$rows2['grade'].'</td>
                        ';
                
                }


            }
   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;
    
        // phase 2 term 3 EPP_TLE
        if($phase2_subject_id == 7 ){
            $phase2_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_ep_tle = mysqli_query($conn,$phase2_epp_tle);
            if(mysqli_num_rows($run_phase2_ep_tle) > 0){
                $rows3 = mysqli_fetch_array($run_phase2_ep_tle);
                while(mysqli_fetch_array($run_phase2_ep_tle));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows3['grade'].'</td>
                ';
            
            }


        }


}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
    
        // phase 2 term 4 EPP_TLE
        if($phase2_subject_id == 7 ){
            $phase2_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_ep_tle = mysqli_query($conn,$phase2_epp_tle);
            if(mysqli_num_rows($run_phase2_ep_tle) > 0){
                $rows4 = mysqli_fetch_array($run_phase2_ep_tle);
                while(mysqli_fetch_array($run_phase2_ep_tle));

                if($rows4['grade'] == 0 ){
                    $rows4['grade'] = " ";
                    }
    

                $html.='
                <td class="text-center">'.$rows4['grade'].'</td>
                ';
            
            }


        }
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    // phase 2 final rating EPP_TLE
if($phase2_subject_id == 7 ){
    $phase2_epp_tle = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_ep_tle = mysqli_query($conn,$phase2_epp_tle);
    if(mysqli_num_rows($run_phase2_ep_tle) > 0){
        $rows = mysqli_fetch_array($run_phase2_ep_tle);
        while(mysqli_fetch_array($run_phase2_ep_tle));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center"> '.$rows['final_rating'].'</td>
        <td class="insert-remarks text-center"> '.$rows['remarks'].'</td>
        </tr>
        ';
    
    }


}

}

///MAPEH Phase 2 





//phase 2 term 1 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 1;
    
            // phase 2 term 1 MAPEH
            if($phase2_subject_id == 8 ){
                $phase2_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_mapeh = mysqli_query($conn,$phase2_mapeh);
                if(mysqli_num_rows($run_phase2_mapeh) > 0){
                    $rows = mysqli_fetch_array($run_phase2_mapeh);
                    while(mysqli_fetch_array($run_phase2_mapeh));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="subject">MAPEH</td>
                    <td class="text-center"> '.$rows['grade'].'</td>
                    
                    ';
                
                }


            }


}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;
          // phase 2 term 2 MAPEH
          if($phase2_subject_id == 8 ){
            $phase2_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_mapeh = mysqli_query($conn,$phase2_mapeh);
            if(mysqli_num_rows($run_phase2_mapeh) > 0){
                $rows2 = mysqli_fetch_array($run_phase2_mapeh);
                while(mysqli_fetch_array($run_phase2_mapeh));

                if($rows2['grade'] == 0 ){
                    $rows2['grade'] = " ";
                    }

                $html.='
                <td >'.$rows2['grade'].'</td>
                ';
            
            }


        }
   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;

          // phase 2 term 3 MAPEH
          if($phase2_subject_id == 8 ){
            $phase2_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_mapeh = mysqli_query($conn,$phase2_mapeh);
            if(mysqli_num_rows($run_phase2_mapeh) > 0){
                $rows3 = mysqli_fetch_array($run_phase2_mapeh);
                while(mysqli_fetch_array($run_phase2_mapeh));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows3['grade'].'</td>
                ';
            
            }


        }

}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;

    
        // phase 2 term 4 MAPEH
        if($phase2_subject_id == 8 ){
            $phase2_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_mapeh = mysqli_query($conn,$phase2_mapeh);
            if(mysqli_num_rows($run_phase2_mapeh) > 0){
                $rows4 = mysqli_fetch_array($run_phase2_mapeh);
                while(mysqli_fetch_array($run_phase2_mapeh));

                if($rows4['grade'] == 0 ){
                    $rows4['grade'] = " ";
                    }
    

                $html.='
               <td class="text-center">'.$rows4['grade'].'</td>  ';
            
            }


        }
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    // phase 2 final rating MAPEH
if($phase2_subject_id == 8 ){
    $phase2_mapeh = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_mapeh = mysqli_query($conn,$phase2_mapeh);
    if(mysqli_num_rows($run_phase2_mapeh) > 0){
        $rows = mysqli_fetch_array($run_phase2_mapeh);
        while(mysqli_fetch_array($run_phase2_mapeh));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="insert-remarks text-center"> '.$rows['remarks'].'</td>
        </tr>  ';
    
    }


}

}


//Music Phase 2 





//phase 2 term 1 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 1;
    
            
                // phase 2 term 1 music
                if($phase2_subject_id == 9 ){
                    $phase2_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                    $run_phase2_music = mysqli_query($conn,$phase2_music);
                    if(mysqli_num_rows($run_phase2_music) > 0){
                        $rows = mysqli_fetch_array($run_phase2_music);
                        while(mysqli_fetch_array($run_phase2_music));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
    
                        $html.='
                        <tr>
                        <td class="small-pad-left italic">Music</td>
                        <td class="text-center">'.$rows['grade'].'</td>
                        ';
                    
                    }
    
    
                }

}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;
         // phase 2 term 2 music
         if($phase2_subject_id == 9 ){
            $phase2_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_music = mysqli_query($conn,$phase2_music);
            if(mysqli_num_rows($run_phase2_music) > 0){
                $rows2 = mysqli_fetch_array($run_phase2_music);
                while(mysqli_fetch_array($run_phase2_music));

                if($rows2['grade'] == 0 ){
                    $rows2['grade'] = " ";
                    }

                $html.='
                <td class="text-center"> '.$rows2['grade'].'</td>
                ';
            
            }


        }

   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;

         // phase 2 term 3 music
         if($phase2_subject_id == 9 ){
            $phase2_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_music = mysqli_query($conn,$phase2_music);
            if(mysqli_num_rows($run_phase2_music) > 0){
                $rows3 = mysqli_fetch_array($run_phase2_music);
                while(mysqli_fetch_array($run_phase2_music));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows3['grade'].'</td>
                ';
            
            }


        }

}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
         // phase 2 term 4 music
         if($phase2_subject_id == 9 ){
            $phase2_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_music = mysqli_query($conn,$phase2_music);
            if(mysqli_num_rows($run_phase2_music) > 0){
                $rows4 = mysqli_fetch_array($run_phase2_music);
                while(mysqli_fetch_array($run_phase2_music));

                if($rows4['grade'] == 0 ){
                    $rows4['grade'] = " ";
                    }
    

                $html.='
                <td class="text-center">'.$rows4['grade'].'</td>
                ';
            
            }


        }
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
   // phase 2 final rating music
   if($phase2_subject_id == 9 ){
    $phase2_music = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_music = mysqli_query($conn,$phase2_music);
    if(mysqli_num_rows($run_phase2_music) > 0){
        $rows = mysqli_fetch_array($run_phase2_music);
        while(mysqli_fetch_array($run_phase2_music));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
        ';
    
    }


}
}

//Arts Phase 2 




//phase 2 term 1 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 1;
    
                    // phase 2 term 1 arts
                    if($phase2_subject_id == 10 ){
                        $phase2_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                        $run_phase2_arts = mysqli_query($conn,$phase2_arts);
                        if(mysqli_num_rows($run_phase2_arts) > 0){
                            $rows = mysqli_fetch_array($run_phase2_arts);
                            while(mysqli_fetch_array($run_phase2_arts));

                            if($rows['grade'] == 0 ){
                                $rows['grade'] = " ";
                                }
        
                            $html.='
                            <tr>
                            <td class="small-pad-left italic">Arts</td>
                            <td class="text-center"> '.$rows['grade'].'</td>
                             ';
                        
                        }
        
        
                    }
        


}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;
    // phase 2 term 2 arts
    if($phase2_subject_id == 10 ){
    $phase2_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
    $run_phase2_arts = mysqli_query($conn,$phase2_arts);
    if(mysqli_num_rows($run_phase2_arts) > 0){
        $rows2 = mysqli_fetch_array($run_phase2_arts);
        while(mysqli_fetch_array($run_phase2_arts));

        if($rows2['grade'] == 0 ){
            $rows2['grade'] = " ";
            }

        $html.='
        <td class="text-center"> '.$rows2['grade'].'</td>
        ';
    
    }


}
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;
        // phase 2 term 3 arts
        if($phase2_subject_id == 10 ){
        $phase2_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_arts = mysqli_query($conn,$phase2_arts);
        if(mysqli_num_rows($run_phase2_arts) > 0){
            $rows3 = mysqli_fetch_array($run_phase2_arts);
            while(mysqli_fetch_array($run_phase2_arts));

            if($rows3['grade'] == 0 ){
                $rows3['grade'] = " ";
                }

            $html.='
            <td class="text-center">'.$rows3['grade'].'</td>
            ';
        
        }


    }
        

}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
        // phase 2 term 4 arts
        if($phase2_subject_id == 10 ){
        $phase2_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_arts = mysqli_query($conn,$phase2_arts);
        if(mysqli_num_rows($run_phase2_arts) > 0){
            $rows4 = mysqli_fetch_array($run_phase2_arts);
            while(mysqli_fetch_array($run_phase2_arts));

            if($rows4['grade'] == 0 ){
                $rows4['grade'] = " ";
                }


            $html.='
            <td class="text-center">'.$rows4['grade'].'</td>
            ';
        
        }


    }
    
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
          // phase 2 final rating arts
if($phase2_subject_id == 10 ){
    $phase2_arts = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_arts = mysqli_query($conn,$phase2_arts);
    if(mysqli_num_rows($run_phase2_arts) > 0){
        $rows = mysqli_fetch_array($run_phase2_arts);
        while(mysqli_fetch_array($run_phase2_arts));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
        ';
    
    }


}

}


//PE Phase 2



//phase 2 term 1 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 1;
    


    // phase 2 term 1 PE
    if($phase2_subject_id == 11 ){
        $phase2_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_pe = mysqli_query($conn,$phase2_pe);
        if(mysqli_num_rows($run_phase2_pe) > 0){
            $rows = mysqli_fetch_array($run_phase2_pe);
            while(mysqli_fetch_array($run_phase2_pe));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

            $html.='
            <tr>
            <td class="small-pad-left italic">Physical Education </td>
            <td class="text-center">'.$rows['grade'].'</td>
            ';
        
        }


    }


}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;
    
            // phase 2 term 2 PE
            if($phase2_subject_id == 11 ){
                $phase2_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_pe = mysqli_query($conn,$phase2_pe);
                if(mysqli_num_rows($run_phase2_pe) > 0){
                    $rows2 = mysqli_fetch_array($run_phase2_pe);
                    while(mysqli_fetch_array($run_phase2_pe));

                    if($rows2['grade'] == 0 ){
                        $rows2['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows2['grade'].' </td>
                    ';
                
                }


            }
   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;
    
        // phase 2 term 3 PE
        if($phase2_subject_id == 11 ){
            $phase2_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_pe = mysqli_query($conn,$phase2_pe);
            if(mysqli_num_rows($run_phase2_pe) > 0){
                $rows3 = mysqli_fetch_array($run_phase2_pe);
                while(mysqli_fetch_array($run_phase2_pe));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows3['grade'].'</td>
                ';
            
            }


        }

}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
        // phase 2 term 4 PE
        if($phase2_subject_id == 11 ){
            $phase2_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_pe = mysqli_query($conn,$phase2_pe);
            if(mysqli_num_rows($run_phase2_pe) > 0){
                $rows4 = mysqli_fetch_array($run_phase2_pe);
                while(mysqli_fetch_array($run_phase2_pe));

                if($rows4['grade'] == 0 ){
                    $rows4['grade'] = " ";
                    }
    

                $html.='
                <td class="text-center">'.$rows4['grade'].'</td>
                ';
            
            }


        }
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
// phase 2 final rating PE
if($phase2_subject_id == 11 ){
    $phase2_pe = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_pe = mysqli_query($conn,$phase2_pe);
    if(mysqli_num_rows($run_phase2_pe) > 0){
        $rows = mysqli_fetch_array($run_phase2_pe);
        while(mysqli_fetch_array($run_phase2_pe));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="insert-remarks text-center"> '.$rows['remarks'].'</td>
        </tr>';
    
    }


}

}

// Health Phase 2 




//phase 2 term 1 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 1;
        // phase 2 term 1 Health
        if($phase2_subject_id == 12 ){
            $phase2_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_health = mysqli_query($conn,$phase2_health);
            if(mysqli_num_rows($run_phase2_health) > 0){
                $rows = mysqli_fetch_array($run_phase2_health);
                while(mysqli_fetch_array($run_phase2_health));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <tr>
                <td class="small-pad-left italic">Health</td>
                <td class="text-center">'.$rows['grade'].'</td>
                ';
            
            }


        }


}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;
    
            // phase 2 term 2 Health
            if($phase2_subject_id == 12 ){
                $phase2_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_health = mysqli_query($conn,$phase2_health);
                if(mysqli_num_rows($run_phase2_health) > 0){
                    $rows2 = mysqli_fetch_array($run_phase2_health);
                    while(mysqli_fetch_array($run_phase2_health));

                    if($rows2['grade'] == 0 ){
                        $rows2['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows2['grade'].'</td>
                    ';
                
                }


            }
            
   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;
    
        // phase 2 term 3 Health
        if($phase2_subject_id == 12 ){
            $phase2_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_health = mysqli_query($conn,$phase2_health);
            if(mysqli_num_rows($run_phase2_health) > 0){
                $rows3 = mysqli_fetch_array($run_phase2_health);
                while(mysqli_fetch_array($run_phase2_health));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows3['grade'].'</td>
                ';
            
            }


        }
        

}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
    
        // phase 2 term 4 Health
        if($phase2_subject_id == 12 ){
            $phase2_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_health = mysqli_query($conn,$phase2_health);
            if(mysqli_num_rows($run_phase2_health) > 0){
                $rows4 = mysqli_fetch_array($run_phase2_health);
                while(mysqli_fetch_array($run_phase2_health));

                if($rows4['grade'] == 0 ){
                    $rows4['grade'] = " ";
                    }
    

                $html.='
                <td class="text-center">'.$rows4['grade'].'</td>
                ';
            
            }


        }
        
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    // phase 2 final rating Health
if($phase2_subject_id == 12 ){
    $phase2_health = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_health = mysqli_query($conn,$phase2_health);
    if(mysqli_num_rows($run_phase2_health) > 0){
        $rows = mysqli_fetch_array($run_phase2_health);
        while(mysqli_fetch_array($run_phase2_health));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center"> '.$rows['final_rating'].' </td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
      ';
    
    }


}

}

//Eduk. Pagpapakatao




//phase 2 term 1 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 1;
    // phase 2 term 1 eduk sa pag papakatao
    if($phase2_subject_id == 13 ){
        $phase2_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_esp = mysqli_query($conn,$phase2_esp);
        if(mysqli_num_rows($run_phase2_esp) > 0){
            $rows = mysqli_fetch_array($run_phase2_esp);
            while(mysqli_fetch_array($run_phase2_esp));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

            $html.='
            <tr>
            <td class="subject">Eduk. Sa Pagpapakatao</td>
            <td class="text-center">'.$rows['grade'].'</td>
                ';
        
        }


    }

}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;
    
            // phase 2 term 2 eduk sa pag papakatao
            if($phase2_subject_id == 13 ){
                $phase2_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_esp = mysqli_query($conn,$phase2_esp);
                if(mysqli_num_rows($run_phase2_esp) > 0){
                    $rows2 = mysqli_fetch_array($run_phase2_esp);
                    while(mysqli_fetch_array($run_phase2_esp));

                    if($rows2['grade'] == 0 ){
                        $rows2['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center"> '.$rows2['grade'].'</td>
                    ';
                
                }


            }

   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;
        // phase 2 term 3 eduk sa pag papakatao
        if($phase2_subject_id == 13 ){
            $phase2_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_esp = mysqli_query($conn,$phase2_esp);
            if(mysqli_num_rows($run_phase2_esp) > 0){
                $rows3 = mysqli_fetch_array($run_phase2_esp);
                while(mysqli_fetch_array($run_phase2_esp));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].' </td>
                ';
            
            }


        }


}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
    
        // phase 2 term 4 eduk sa pag papakatao
        if($phase2_subject_id == 13 ){
            $phase2_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_esp = mysqli_query($conn,$phase2_esp);
            if(mysqli_num_rows($run_phase2_esp) > 0){
                $rows4 = mysqli_fetch_array($run_phase2_esp);
                while(mysqli_fetch_array($run_phase2_esp));

                if($rows4['grade'] == 0 ){
                    $rows4['grade'] = " ";
                    }
    

                $html.='
                <td class="text-center">'.$rows4['grade'].' </td>
                ';
            
            }


        }

}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    // phase 2 final rating eduk sa pag papakatao
if($phase2_subject_id == 13 ){
    $phase2_esp = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_esp = mysqli_query($conn,$phase2_esp);
    if(mysqli_num_rows($run_phase2_esp) > 0){
        $rows = mysqli_fetch_array($run_phase2_esp);
        while(mysqli_fetch_array($run_phase2_esp));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center"> '.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
        ';
    
    }


}

}


//arabic Language Phase2




//phase 2 term 1 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 1;
    
            // phase 2 term 1 arabic
            if($phase2_subject_id == 14 ){
                $phase2_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_arabic = mysqli_query($conn,$phase2_arabic);
                if(mysqli_num_rows($run_phase2_arabic) > 0){
                    $rows = mysqli_fetch_array($run_phase2_arabic);
                    while(mysqli_fetch_array($run_phase2_arabic));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="small-pad-left">*Arabic Language</td>
                    <td class="text-center"> '.$rows['grade'].' </td>
                   

                    ';
                
                }


            }


}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;

        // phase 2 term 2 arabic
        if($phase2_subject_id == 14 ){
            $phase2_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_arabic = mysqli_query($conn,$phase2_arabic);
            if(mysqli_num_rows($run_phase2_arabic) > 0){
                $rows2 = mysqli_fetch_array($run_phase2_arabic);
                while(mysqli_fetch_array($run_phase2_arabic));

                if($rows2['grade'] == 0 ){
                    $rows2['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows2['grade'].'</td>
               ';
            
            }


        }
   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;

           // phase 2 term 3 arabic
           if($phase2_subject_id == 14 ){
            $phase2_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_arabic = mysqli_query($conn,$phase2_arabic);
            if(mysqli_num_rows($run_phase2_arabic) > 0){
                $rows = mysqli_fetch_array($run_phase2_arabic);
                while(mysqli_fetch_array($run_phase2_arabic));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows3['grade'].'</td>
                ';
            
            }


        }


}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
       // phase 2 term 4 arabic
       if($phase2_subject_id == 14 ){
        $phase2_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_arabic = mysqli_query($conn,$phase2_arabic);
        if(mysqli_num_rows($run_phase2_arabic) > 0){
            $rows4 = mysqli_fetch_array($run_phase2_arabic);
            while(mysqli_fetch_array($run_phase2_arabic));

            if($rows4['grade'] == 0 ){
                $rows4['grade'] = " ";
                }


            $html.='
            <td class="text-center"> '.$rows4['grade'].'</td>
            ';
        
        }


    }
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    // phase 2 final rating arabic
if($phase2_subject_id == 14 ){
    $phase2_arabic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_arabic = mysqli_query($conn,$phase2_arabic);
    if(mysqli_num_rows($run_phase2_arabic) > 0){
        $rows = mysqli_fetch_array($run_phase2_arabic);
        while(mysqli_fetch_array($run_phase2_arabic));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
        ';
    
    }


}


}


// Islamic Value Phase 2 




//phase 2 term 1 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 1;
     
    // phase 2 term 1 islamic
    if($phase2_subject_id == 15 ){
        $phase2_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_islamic = mysqli_query($conn,$phase2_islamic);
        if(mysqli_num_rows($run_phase2_islamic) > 0){
            $rows = mysqli_fetch_array($run_phase2_islamic);
            while(mysqli_fetch_array($run_phase2_islamic));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

            $html.='
            <tr>
            <td class="small-pad-left">*Islamic Values Education</td>
            <td class="text-center">'.$rows['grade'].'</td>
            
              ';
        
        }


    }

}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;
        
            // phase 2 term 2 islamic
            if($phase2_subject_id == 15 ){
                $phase2_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_islamic = mysqli_query($conn,$phase2_islamic);
                if(mysqli_num_rows($run_phase2_islamic) > 0){
                    $rows2 = mysqli_fetch_array($run_phase2_islamic);
                    while(mysqli_fetch_array($run_phase2_islamic));

                    if($rows2['grade'] == 0 ){
                        $rows2['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows2['grade'].' </td>
                    ';
                
                }


            }

   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;
       // phase 2 term 3 islamic
       if($phase2_subject_id == 15 ){
        $phase2_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_islamic = mysqli_query($conn,$phase2_islamic);
        if(mysqli_num_rows($run_phase2_islamic) > 0){
            $rows3 = mysqli_fetch_array($run_phase2_islamic);
            while(mysqli_fetch_array($run_phase2_islamic));

            if($rows3['grade'] == 0 ){
                $rows3['grade'] = " ";
                }

            $html.='
            <td class="text-center"> '.$rows3['grade'].'</td>
            ';
            
        
        }


    }

}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
        // phase 2 term 4 islamic
        if($phase2_subject_id == 15 ){
            $phase2_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_islamic = mysqli_query($conn,$phase2_islamic);
            if(mysqli_num_rows($run_phase2_islamic) > 0){
                $rows4 = mysqli_fetch_array($run_phase2_islamic);
                while(mysqli_fetch_array($run_phase2_islamic));

                if($rows4['grade'] == 0 ){
                    $rows4['grade'] = " ";
                    }
    

                $html.='
                <td class="text-center">'.$rows4['grade'].'</td>
                ';
            
            }


        }
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    // phase 2 final rating islamic
if($phase2_subject_id == 15 ){
    $phase2_islamic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_islamic = mysqli_query($conn,$phase2_islamic);
    if(mysqli_num_rows($run_phase2_islamic) > 0){
        $rows = mysqli_fetch_array($run_phase2_islamic);
        while(mysqli_fetch_array($run_phase2_islamic));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
        ';
    
    }


}

}


//General Average




//phase 2 term 1 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 1;
    

            //phase 2 term 1 general average
            if( $phase2_subject_id == 16){
                $phase2_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase2' ";
                $run_phase2_term1_general_average = mysqli_query($conn,$phase2_term1_general_average_query);
                if(mysqli_num_rows($run_phase2_term1_general_average)> 0 ){
                    $rows = mysqli_fetch_array($run_phase2_term1_general_average);

                    if($rows['general_average'] == 0 ){
                        $rows['general_average'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="subject">General Average</td>
                    <td class="text-center">'.$rows['general_average'].' </td>
                   
                    
                    ';
                


                }
                


            }

}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2; 
    
            //phase 2 term 2 general average
            if( $phase2_subject_id == 16){
                $phase2_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase2' ";
                $run_phase2_term1_general_average = mysqli_query($conn,$phase2_term1_general_average_query);
                if(mysqli_num_rows($run_phase2_term1_general_average)> 0 ){
                    $rows2 = mysqli_fetch_array($run_phase2_term1_general_average);

                    if($rows2['general_average'] == 0 ){
                        $rows2['general_average'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows2['general_average'].'</td>
                    ';
                


                }
                


            }
   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;
    
        //phase 2 term 3 general average
        if( $phase2_subject_id == 16){
            $phase2_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase2' ";
            $run_phase2_term1_general_average = mysqli_query($conn,$phase2_term1_general_average_query);
            if(mysqli_num_rows($run_phase2_term1_general_average)> 0 ){
                $rows3 = mysqli_fetch_array($run_phase2_term1_general_average);

                if($rows3['general_average'] == 0 ){
                    $rows3['general_average'] = " ";
                    }
                $html.='
                <td class="text-center">'.$rows3['general_average'].'</td>
                ';
            


            }
            


        }

}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;

     //phase 2 term 4 general average
     if( $phase2_subject_id == 16){
        $phase2_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase2' ";
        $run_phase2_term1_general_average = mysqli_query($conn,$phase2_term1_general_average_query);
        if(mysqli_num_rows($run_phase2_term1_general_average)> 0 ){
            $rows4 = mysqli_fetch_array($run_phase2_term1_general_average);

            if($rows4['general_average'] == 0 ){
                $rows4['general_average'] = " ";
                }
            $html.='
            <td class="text-center">'.$rows4['general_average'].'</td>
           

                ';
        


        }
        


    }
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
        //phase 2 final rating general average
if( $phase2_subject_id == 16){
    $phase2_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND  phase = '$phase2' AND term = 'Final Rating' ";
    $run_phase2_term1_general_average = mysqli_query($conn,$phase2_term1_general_average_query);
    if(mysqli_num_rows($run_phase2_term1_general_average)> 0 ){
        $rows5 = mysqli_fetch_array($run_phase2_term1_general_average);

        if($rows5['general_average'] == 0 ){
            $rows5['general_average'] = " ";
            }


            //phase 2 remarks
            $sql_total_remarks_phase1 = "SELECT final_rating, final_rating, COUNT(remarks) AS 'total_remarks' , lrn FROM student_final_ratings 
            WHERE phase = '2' AND lrn = '$decrypted_lrn' AND remarks= 'FAILED' ";
            $run_total_remarks_phase1 = mysqli_query($conn,$sql_total_remarks_phase1);

            $remarks = mysqli_fetch_array($run_total_remarks_phase1);

            if($remarks['total_remarks'] == 15){
                $output = "";
              }else if($remarks['total_remarks'] >= 3){
                $output = "RETAINED";
              }else if ($remarks['total_remarks'] == 2){
                $output = "REMEDIAL";
              }else if($remarks['total_remarks'] <= 1){
                $output = "PROMOTED";
              }


        $html.='
        <td class="text-center">'.$rows5['general_average'].'</td>
        <td class="text-center">'.$output.'</td>

        </tr>
        </tbody>
            ';
    
    //count


    }
    


}


}



$html.=' 
</table>
';
            



for($phase2_remedial_term = 1; $phase2_remedial_term <=2; $phase2_remedial_term++){

    if($phase2_remedial_term == 1 ){

        $phase2_remedial_query = " SELECT * FROM `remedial_classes` WHERE lrn ='$decrypted_lrn'AND phase = '$phase2' AND term = '$phase2_remedial_term' ";
        $phase2_run_query = mysqli_query($conn,$phase2_remedial_query);
        if(mysqli_num_rows($phase2_run_query)> 0 ){
            $rows = mysqli_fetch_array($phase2_run_query);
            while(mysqli_fetch_array($phase2_run_query));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
               }

               if($rows['recomputed_final_grade'] == 0 ){
                $rows['recomputed_final_grade'] = " ";
               }


               if($rows['date_from'] == "1970-01-01" || $rows['date_from'] == "0000-00-00"){
                $rows['date_from'] = "";
            }

            if($rows['date_to'] == "1970-01-01" || $rows['date_to'] == "0000-00-00"){
             $rows['date_to'] = "";
            }

            $html.='
            <table style="margin-top:4px;">
                <thead>
                    <tr class="remedial">
                        <th colspan="2">Remedial Classes</th>
                        <th colspan="2" class="text-start" style="border-right: none;"> Date Conducted: '.$rows['date_from'].'</th>
                        <th colspan="2" class="text-start" style="border-left: none;">To: '.$rows['date_to'].'</th>
                    </tr>
                    <tr class="arial-header text-center">
                        <td colspan="2">Learning Areas</td>
                        <td>Final Rating</td>
                        <td>Remedial Class <br> Mark</td>
                        <td>Recomputed <br> Final Grade</td>
                        <td>Remarks</td>
                    </tr>
                </thead>
                <tbody>
                <tr >
                    <td colspan="2" class="remedial-2 text-center">'.$rows['learning_areas'].'</td>
                    <td class="remedial-2 text-center">'.$rows['final_rating'].'</td>
                    <td class="remedial-2 text-center">'.$rows['remarks'].'</td>
                    <td class="remedial-2 text-center">'.$rows['recomputed_final_grade'].'</td>
                    <td class="remedial-2 text-center">'.$rows['remedial_class_mark'].'</td>
                </tr>    
           ';
            
        }

    }
    


      // term 2
      if($phase2_remedial_term == 2 ){

        $phase2_remedial_query = " SELECT * FROM `remedial_classes` WHERE lrn ='$decrypted_lrn'AND phase = '$phase2' AND term = '$phase2_remedial_term' ";
    $phase2_run_query = mysqli_query($conn,$phase2_remedial_query);
    if(mysqli_num_rows($phase2_run_query)> 0 ){
        $rows = mysqli_fetch_array($phase2_run_query);
        while(mysqli_fetch_array($phase2_run_query));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
           }

           if($rows['recomputed_final_grade'] == 0 ){
            $rows['recomputed_final_grade'] = " ";
           }


      $html.='
                    <tr >
                        <td colspan="2" class="remedial-2 text-center">'.$rows['learning_areas'].'</td>
                        <td class="remedial-2 text-center">'.$rows['final_rating'].'</td>
                        <td class="remedial-2 text-center">'.$rows['remarks'].'</td>
                        <td class="remedial-2 text-center">'.$rows['remedial_class_mark'].'</td>
                        <td class="remedial-2 text-center">'.$rows['recomputed_final_grade'].'</td>
                    </tr>
                </tbody>
            </table>   
        </td>
    </tr>
      ';
   // last 2
    }
}

      
    
}// end of remedial phase 2 



    
//start of phase 3 
// scholastic records phase 3 
// phase 3 scohlastic query 

$phase3_scholastic_query = "SELECT * FROM `scholastic_records` WHERE lrn = '$decrypted_lrn' AND phase = $phase3";
$run_phase3_scholastic = mysqli_query($conn,$phase3_scholastic_query);
if(mysqli_num_rows($run_phase3_scholastic) > 0){
    $rows = mysqli_fetch_array($run_phase3_scholastic);

    while(mysqli_fetch_array($run_phase3_scholastic));


    $html.='
    <tr style="border:none;">
        <td style="height: 6px; border:none;"></td>
    </tr>
    <tr class="row_2" style="width: 100vw; height:50vh; border:none;">
         <td class="phase_3" style="width: 48%;  border:none;">
            <table class="phase_head">
                <tr>
                    <td colspan="6"><span class="main-arial-text">School: <span style="font-weight: bold;">'.$rows['school'].'</span></span></td>
                    <td colspan="6" style="text-align: right;><span class="main-arial-text">School ID: <span style="font-weight: bold;">'.$rows['school_id'].'</span></span></td>
                </tr>
                <tr>
                    <td colspan="4"><span class="main-arial-text">District: <span style="font-weight: bold;">'.$rows['district'].'</span></span></td>
                    <td colspan="4" style="text-align: center;"><span class="main-arial-text">Division: <span style="font-weight: bold;">'.$rows['division'].'</span></span></td>
                    <td colspan="4" style="text-align: right;"><span class="main-arial-text">Region: <span style="font-weight: bold;">'.$rows['region'].'</span></span></td>
                </tr>
                <tr>
                    <td colspan="3"><span class="main-arial-text">Classified as Grade: <span style="font-weight: bold;">'.$rows['classified_as_grade'].'</span></span></td>
                    <td colspan="5" style="text-align: center;"><span class="main-arial-text" >Section: <span style="font-weight: bold;">'.$rows['section'].'</span></span></td>
                    <td colspan="4" style="text-align: right;"><span class="main-arial-text">School year: <span style="font-weight: bold;">'.$rows['school_year'].'-2012</span></span></td>
                </tr>
                <tr>
                    <td colspan="6"><span class="main-arial-text">Name of adviser: <span style="font-weight: bold;">'.$rows['name_of_teacher'].'</span></span></td>
                    <td colspan="6" style="text-align: right;"><span class="main-arial-text">Signature:<span style="font-weight: bold;">'.$rows['signature'].'</span></span></td>
                </tr>
            </table>
    ';
}


$html.='
            <table>
                <thead>
                    <tr>
                        <th rowspan="2">Learning Areas</th>
                        <th class="quarterly" colspan="4">Quarterly Rating</th>
                        <th colspan="1" class="final-rating" rowspan="2" >Final <br> Rating</th>
                        <th rowspan="2">Remarks</th>
                    </tr>
                    <tr class="quarter">
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                    </tr>
                </thead>    
                <tbody> 
    
     
    ';






//phase 3 term 1 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 1;
    

            if($phase3_subject_id == 1){
        
                        //phase 1 term 1 mother tongue 
                $phase3_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                $run_phase3_mt = mysqli_query($conn,$phase3_mt);
                if(mysqli_num_rows($run_phase3_mt) > 0){
                    $rows = mysqli_fetch_array($run_phase3_mt);
                    while(mysqli_fetch_array($run_phase3_mt));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                        $html.=' 
                        <tr>
                        <td class="subject">Mother Tongue</td>
                        
                        <td class="text-center">'.$rows['grade'].'</td>';
                    
                    }
                }
            }
            for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
                $term = 2;

                
            if($phase3_subject_id == 1){
        
                //phase 3 term 2 mother tongue 
        $phase3_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
        $run_phase3_mt = mysqli_query($conn,$phase3_mt);
        if(mysqli_num_rows($run_phase3_mt) > 0){
            $rows2 = mysqli_fetch_array($run_phase3_mt);
            while(mysqli_fetch_array($run_phase3_mt));

            if($rows2['grade'] == 0 ){
                $rows2['grade'] = " ";
                }

                $html.=' 
                <td class="text-center">'.$rows2['grade'].'</td>
                ';
            
            }
        }
    }

    for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
        $term = 3;
        
        if($phase3_subject_id == 1){
    
            //phase 1 term 3 mother tongue 
    $phase3_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
    $run_phase3_mt = mysqli_query($conn,$phase3_mt);
    if(mysqli_num_rows($run_phase3_mt) > 0){
        $rows3 = mysqli_fetch_array($run_phase3_mt);
        while(mysqli_fetch_array($run_phase3_mt));

        if($rows3['grade'] == 0 ){
            $rows3['grade'] = " ";
            }



            $html.='  <td class="text-center">'.$rows3['grade'].'</td>  ';
        
        }
    }


    }


    for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
        $term = 4;

        
        if($phase3_subject_id == 1){
    
            //phase 3 term 4 mother tongue 
    $phase3_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
    $run_phase3_mt = mysqli_query($conn,$phase3_mt);
    if(mysqli_num_rows($run_phase3_mt) > 0){
        $rows4 = mysqli_fetch_array($run_phase3_mt);
        while(mysqli_fetch_array($run_phase3_mt));

        if($rows4['grade'] == 0 ){
            $rows4['grade'] = " ";
            }

            $html.=' <td class="text-center">'.$rows4['grade'].'</td> ';
        
        }
    }

    }


    
for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    if($phase3_subject_id == 1){

        //phase 3 final rating mother tongue 
$phase3_mt = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3'";
$run_phase3_mt = mysqli_query($conn,$phase3_mt);
if(mysqli_num_rows($run_phase3_mt) > 0){
    $rows5 = mysqli_fetch_array($run_phase3_mt);
    while(mysqli_fetch_array($run_phase3_mt));

    if($rows5['final_rating'] == 0 ){
        $rows5['final_rating'] = " ";
        $rows5['remarks'] = " ";
       }



        $html.=' 
        <td class="text-center">'.$rows5['final_rating'].'</td>
        <td class="text-center">'.$rows5['remarks'].' </td>
        </tr>
        ';
    
    }
}
}

// Phase 3 term 1 
for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 1;

    
    // phase 3 term 1 filipino

    if($phase3_subject_id == 2 ){
        $phase3_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
        $run_phase3_filipino = mysqli_query($conn,$phase3_filipino);
        if(mysqli_num_rows($run_phase3_filipino) > 0){
            $rows = mysqli_fetch_array($run_phase3_filipino);
            while(mysqli_fetch_array($run_phase3_filipino));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

                $html.='
                <tr>
                <td class="subject">Filipino</td>
                <td class="text-center">'.$rows['grade'].'</td>
                ';
            
            }

    
        }


}


    // phase 3 term 2 ////////////////////////////////////////////////

    for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
        $term = 2;

          //phase 1 term 2 filipino

          if($phase3_subject_id == 2 ){
            $phase3_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
            $run_phase3_filipino = mysqli_query($conn,$phase3_filipino);
            if(mysqli_num_rows($run_phase3_filipino) > 0){
                $rows2 = mysqli_fetch_array($run_phase3_filipino);
                while(mysqli_fetch_array($run_phase3_filipino));

                if($rows2['grade'] == 0 ){
                    $rows2['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows2['grade'].'</td>
                    ';
                
                }

        
            }
    
    
    }


      //phase 3 term 3 //////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 3;
    
    
         //phase 1 term 3 filipino

         if($phase3_subject_id == 2 ){
            $phase3_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
            $run_phase3_filipino = mysqli_query($conn,$phase3_filipino);
            if(mysqli_num_rows($run_phase3_filipino) > 0){
                $rows3 = mysqli_fetch_array($run_phase3_filipino);
                while(mysqli_fetch_array($run_phase3_filipino));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows3['grade'].'</td>
                  ';
                
                }

        
            }
    
    
    }


    
//phase 3 term 4 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 4;
    
    
        //phase 3 term 4 filipino

        if($phase3_subject_id == 2 ){
            $phase3_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
            $run_phase3_filipino = mysqli_query($conn,$phase3_filipino);
            if(mysqli_num_rows($run_phase3_filipino) > 0){
                $rows4 = mysqli_fetch_array($run_phase3_filipino);
                while(mysqli_fetch_array($run_phase3_filipino));

                if($rows4['grade'] == 0 ){
                    $rows4['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows4['grade'].'</td>
                    ';
                
                }

        
            }
    }


    
for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
//phase 1 final rating filipino

if($phase3_subject_id == 2 ){
    $phase3_filipino = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3'";
    $run_phase3_filipino = mysqli_query($conn,$phase3_filipino);
    if(mysqli_num_rows($run_phase3_filipino) > 0){
        $rows5 = mysqli_fetch_array($run_phase3_filipino);
        while(mysqli_fetch_array($run_phase3_filipino));

        if($rows5['final_rating'] == 0 ){
            $rows5['final_rating'] = " ";
            $rows5['remarks'] = " ";
           }

            $html.='
            <td class="text-center">'.$rows5['final_rating'].'</td>
            <td class="text-center">'.$rows5['remarks'].'</td>
            </tr>
            ';
        
        }


    }
}

// Phase 3 term 1 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 1;

    
            // phase 3 term 1 english 

            if($phase3_subject_id == 3 ){
                $phase3_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                $run_phase3_english = mysqli_query($conn,$phase3_english);
                if(mysqli_num_rows($run_phase3_english) > 0){
                    $rows = mysqli_fetch_array($run_phase3_english);
                    while(mysqli_fetch_array($run_phase3_english));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                        $html.='
                        <tr>
                        <td class="subject">English</td>
                        <td class="text-center">'.$rows['grade'].'</td>
                          ';
                    
                    }

            
                }

}


    // phase 3 term 2 ////////////////////////////////////////////////

    for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
        
    
        $term = 2;
        
            // phase 3 term 2 english 

            if($phase3_subject_id == 3 ){
                $phase3_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                $run_phase3_english = mysqli_query($conn,$phase3_english);
                if(mysqli_num_rows($run_phase3_english) > 0){
                    $rows2 = mysqli_fetch_array($run_phase3_english);
                    while(mysqli_fetch_array($run_phase3_english));

                    if($rows2['grade'] == 0 ){
                        $rows2['grade'] = " ";
                        }

                        $html.='
                        <td class="text-center"> '.$rows2['grade'].'</td>
                       ';
                    
                    }

            
                }
    
    
    }
        

    
    //phase 3 term 3 //////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 3;

          // phase 3 term 3 english 

          if($phase3_subject_id == 3 ){
            $phase3_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
            $run_phase3_english = mysqli_query($conn,$phase3_english);
            if(mysqli_num_rows($run_phase3_english) > 0){
                $rows3 = mysqli_fetch_array($run_phase3_english);
                while(mysqli_fetch_array($run_phase3_english));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows3['grade'].'</td>
                    ';
                
                }

        
            }

    
    
    
    
    }
    

    //phase 3 term 4 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 4;

    
        // phase 3 term 4 english 

        if($phase3_subject_id == 3 ){
            $phase3_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
            $run_phase3_english = mysqli_query($conn,$phase3_english);
            if(mysqli_num_rows($run_phase3_english) > 0){
                $rows4 = mysqli_fetch_array($run_phase3_english);
                while(mysqli_fetch_array($run_phase3_english));

                if($rows4['grade'] == 0 ){
                    $rows4['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows4['grade'].'</td>
                   ';
                
                }

        
            }
    
    }

    
for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
 // phase 3 final rating english 

if($phase3_subject_id == 3 ){
    $phase3_english = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3'";
    $run_phase3_english = mysqli_query($conn,$phase3_english);
    if(mysqli_num_rows($run_phase3_english) > 0){
        $rows5 = mysqli_fetch_array($run_phase3_english);
        while(mysqli_fetch_array($run_phase3_english));

        if($rows5['final_rating'] == 0 ){
            $rows5['final_rating'] = " ";
            $rows5['remarks'] = " ";
           }

            $html.='
            <td class="text-center">'.$rows5['final_rating'].'</td>
            <td class="text-center">'.$rows5['remarks'].'</td>
            </tr>
           ';
        
        }


    }   

}



// Phase 3 term 1 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 1;

    
            // phase 3 term 1 math

            if($phase3_subject_id == 4 ){
                $phase3_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                $run_phase3_math = mysqli_query($conn,$phase3_math);
                if(mysqli_num_rows($run_phase3_math) > 0){
                    $rows = mysqli_fetch_array($run_phase3_math);
                    while(mysqli_fetch_array($run_phase3_math));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                        $html.='
                        <tr>
                        <td class="subject">Mathematics</td>
                        <td class="text-center">'.$rows['grade'].' </td>
                        ';
                    
                    }   

            
                }

}


    // phase 3 term 2 ////////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 2;

        // phase 3 term 2 math

        if($phase3_subject_id == 4 ){
            $phase3_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
            $run_phase3_math = mysqli_query($conn,$phase3_math);
            if(mysqli_num_rows($run_phase3_math) > 0){
                $rows2 = mysqli_fetch_array($run_phase3_math);
                while(mysqli_fetch_array($run_phase3_math));

                if($rows2['grade'] == 0 ){
                    $rows2['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows2['grade'].'</td>
                    ';
                
                }   

        
            }


}
    
    //phase 3 term 3 //////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 3;

   //phase 1 term 3 math

   if($phase3_subject_id == 4 ){
    $phase3_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
    $run_phase3_math = mysqli_query($conn,$phase3_math);
    if(mysqli_num_rows($run_phase3_math) > 0){
        $rows3 = mysqli_fetch_array($run_phase3_math);
        while(mysqli_fetch_array($run_phase3_math));

        if($rows3['grade'] == 0 ){
            $rows3['grade'] = " ";
            }

            $html.='
            <td class="text-center"> '.$rows3['grade'].'</td>
            ';
        
        }   


    }




}




//phase 3 term 4 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 4;

   //phase 1 term 4 math

   if($phase3_subject_id == 4 ){
    $phase3_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
    $run_phase3_math = mysqli_query($conn,$phase3_math);
    if(mysqli_num_rows($run_phase3_math) > 0){
        $rows4 = mysqli_fetch_array($run_phase3_math);
        while(mysqli_fetch_array($run_phase3_math));

        if($rows4['grade'] == 0 ){
            $rows4['grade'] = " ";
            }

            $html.='
            <td class="text-center"> '.$rows4['grade'].'</td>
            ';
        
        }   


    }

}


//phase 3 final raiting
for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    // phase 3 final rating math

if($phase3_subject_id == 4 ){
    $phase3_math = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3'";
    $run_phase3_math = mysqli_query($conn,$phase3_math);
    if(mysqli_num_rows($run_phase3_math) > 0){
        $rows5 = mysqli_fetch_array($run_phase3_math);
        while(mysqli_fetch_array($run_phase3_math));

        if($rows5['final_rating'] == 0 ){
            $rows5['final_rating'] = " ";
            $rows5['remarks'] = " ";
           }

            $html.='
            <td class="text-center">'.$rows5['final_rating'].'</td>
            <td class="text-center">'.$rows5['remarks'].'</td>
            </tr>
            ';
        
        }   


    }


}



// Phase 3 term 1 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 1;


// phase 3 term 1 science

if($phase3_subject_id == 5 ){
    $phase3_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
    $run_phase3_science = mysqli_query($conn,$phase3_science);
    if(mysqli_num_rows($run_phase3_science) > 0){
        $rows = mysqli_fetch_array($run_phase3_science);
        while(mysqli_fetch_array($run_phase3_science));

        if($rows['grade'] == 0 ){
            $rows['grade'] = " ";
            }

            $html.='
            <tr>
            <td class="subject">Science</td>
            <td class="text-center"> '.$rows['grade'].'</td>
            ';
        
        }


    }

}


    // phase 3 term 2 ////////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 2;

    
    // phase 3 term 2 science

    if($phase3_subject_id == 5 ){
        $phase3_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
        $run_phase3_science = mysqli_query($conn,$phase3_science);
        if(mysqli_num_rows($run_phase3_science) > 0){
            $rows2 = mysqli_fetch_array($run_phase3_science);
            while(mysqli_fetch_array($run_phase3_science));

            if($rows2['grade'] == 0 ){
                $rows2['grade'] = " ";
                }

                $html.='
                <td class="text-center">'.$rows2['grade'].'</td>
                  ';
            
            }

    
        }


}
    
    //phase 3 term 3 //////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 3;


    // phase 3 term 3 science

    if($phase3_subject_id == 5 ){
        $phase3_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
        $run_phase3_science = mysqli_query($conn,$phase3_science);
        if(mysqli_num_rows($run_phase3_science) > 0){
            $rows3 = mysqli_fetch_array($run_phase3_science);
            while(mysqli_fetch_array($run_phase3_science));

            if($rows3['grade'] == 0 ){
                $rows3['grade'] = " ";
                }

                $html.='
                <td class="text-center">'.$rows3['grade'].'</td>
                  ';
            
            }

    
        }




}




//phase 3 term 4 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 4;

// phase 3 term 4 science

if($phase3_subject_id == 5 ){
    $phase3_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
    $run_phase3_science = mysqli_query($conn,$phase3_science);
    if(mysqli_num_rows($run_phase3_science) > 0){
        $rows4 = mysqli_fetch_array($run_phase3_science);
        while(mysqli_fetch_array($run_phase3_science));

        if($rows4['grade'] == 0 ){
            $rows4['grade'] = " ";
            }

            $html.='
            <td class="text-center">'.$rows4['grade'].'</td>
            ';
        
        }


    }
    
}


//phase 3 final raiting
for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    

// phase 3 final rating science

if($phase3_subject_id == 5 ){
$phase3_science = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3'";
$run_phase3_science = mysqli_query($conn,$phase3_science);
if(mysqli_num_rows($run_phase3_science) > 0){
$rows5 = mysqli_fetch_array($run_phase3_science);
while(mysqli_fetch_array($run_phase3_science));

if($rows5['final_rating'] == 0 ){
    $rows5['final_rating'] = " ";
    $rows5['remarks'] = " ";
   }

    $html.='
    <td class="text-center">'.$rows5['final_rating'].'</td>
    <td class="text-center">'.$rows5['remarks'].'</td>
        </tr>';

}


    }


}



// Phase 3 term 1 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 1;

    


    // phase 3 term 1 ap
    if($phase3_subject_id == 6 ){
        $phase3_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
        $run_phase3_AP = mysqli_query($conn,$phase3_AP);
        if(mysqli_num_rows($run_phase3_AP) > 0){
            $rows = mysqli_fetch_array($run_phase3_AP);
            while(mysqli_fetch_array($run_phase3_AP));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

            $html.='
            <tr>
            <td class="subject">Araling Panlipunan</td>
            <td class="text-center"> '.$rows['grade'].'</td>            
          ';
        
        }


    }

}


    // phase 3 term 2 ////////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 2;
    

                // phase 3 term 2 ap
                if($phase3_subject_id == 6 ){
                    $phase3_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                    $run_phase3_AP = mysqli_query($conn,$phase3_AP);
                    if(mysqli_num_rows($run_phase3_AP) > 0){
                        $rows2 = mysqli_fetch_array($run_phase3_AP);
                        while(mysqli_fetch_array($run_phase3_AP));

                        if($rows2['grade'] == 0 ){
                            $rows2['grade'] = " ";
                            }
    
                        $html.='
                        <td class="text-center"> '.$rows2['grade'].' </td>
                          ';
                    
                    }
    
    
                }
    


}
    
    //phase 3 term 3 //////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 3;


            // phase 3 term 3 ap
            if($phase3_subject_id == 6 ){
                $phase3_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                $run_phase3_AP = mysqli_query($conn,$phase3_AP);
                if(mysqli_num_rows($run_phase3_AP) > 0){
                    $rows3 = mysqli_fetch_array($run_phase3_AP);
                    while(mysqli_fetch_array($run_phase3_AP));

                    if($rows3['grade'] == 0 ){
                        $rows3['grade'] = " ";
                        }
    
                    $html.='
                    <td class="text-center"> '.$rows3['grade'].'</td>
                   ';
                
                }
    
    
            }




}




//phase 3 term 4 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 4;

            // phase 3 term 4 ap
            if($phase3_subject_id == 6 ){
                $phase3_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                $run_phase3_AP = mysqli_query($conn,$phase3_AP);
                if(mysqli_num_rows($run_phase3_AP) > 0){
                    $rows4 = mysqli_fetch_array($run_phase3_AP);
                    while(mysqli_fetch_array($run_phase3_AP));

                    if($rows4['grade'] == 0 ){
                        $rows4['grade'] = " ";
                        }
    
                    $html.='
                    <td class="text-center">'.$rows4['grade'].'</td>
                    ';
                
                }
    
    
            }

}


//phase 3 final raiting
for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    


    // phase 3 final rating ap
if($phase3_subject_id == 6 ){
    $phase3_AP = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3'";
    $run_phase3_AP = mysqli_query($conn,$phase3_AP);
    if(mysqli_num_rows($run_phase3_AP) > 0){
        $rows5 = mysqli_fetch_array($run_phase3_AP);
        while(mysqli_fetch_array($run_phase3_AP));

        if($rows5['final_rating'] == 0 ){
            $rows5['final_rating'] = " ";
            $rows5['remarks'] = " ";
           }

        $html.='
        <td class="text-center"> '.$rows5['final_rating'].'</td>
        <td class="text-center">'.$rows5['remarks'].'</td>
        </tr>
       ';
    
    }


}



}



// Phase 3 term 1 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 1;

    
            // phase 3 term 1 EPP_TLE
            if($phase3_subject_id == 7 ){
                $phase3_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                $run_phase3_ep_tle = mysqli_query($conn,$phase3_epp_tle);
                if(mysqli_num_rows($run_phase3_ep_tle) > 0){
                    $rows = mysqli_fetch_array($run_phase3_ep_tle);
                    while(mysqli_fetch_array($run_phase3_ep_tle));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="subject">EPP/TLE</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                   ';
                
                }


            }

}


    // phase 3 term 2 ////////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 2;

    
            // phase 3 term 2 EPP_TLE
            if($phase3_subject_id == 7 ){
                $phase3_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                $run_phase3_ep_tle = mysqli_query($conn,$phase3_epp_tle);
                if(mysqli_num_rows($run_phase3_ep_tle) > 0){
                    $rows2 = mysqli_fetch_array($run_phase3_ep_tle);
                    while(mysqli_fetch_array($run_phase3_ep_tle));

                    if($rows2['grade'] == 0 ){
                        $rows2['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows2['grade'].'</td>
                   ';
                
                }


            }



}
    
    //phase 3 term 3 //////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 3;

   // phase 3 term 3 EPP_TLE
   if($phase3_subject_id == 7 ){
    $phase3_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
    $run_phase3_ep_tle = mysqli_query($conn,$phase3_epp_tle);
    if(mysqli_num_rows($run_phase3_ep_tle) > 0){
        $rows3 = mysqli_fetch_array($run_phase3_ep_tle);
        while(mysqli_fetch_array($run_phase3_ep_tle));

        if($rows3['grade'] == 0 ){
            $rows3['grade'] = " ";
            }

        $html.='
        <td class="text-center">'.$rows3['grade'].'</td>
        ';
    
    }


}



}




//phase 3 term 4 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 4;

  // phase 3 term 4 EPP_TLE
  if($phase3_subject_id == 7 ){
    $phase3_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
    $run_phase3_ep_tle = mysqli_query($conn,$phase3_epp_tle);
    if(mysqli_num_rows($run_phase3_ep_tle) > 0){
        $rows4 = mysqli_fetch_array($run_phase3_ep_tle);
        while(mysqli_fetch_array($run_phase3_ep_tle));

        if($rows4['grade'] == 0 ){
            $rows4['grade'] = " ";
            }

        $html.='
        <td class="text-center">'.$rows4['grade'].'</td>
         ';
    
    }


}


}


//phase 3 final raiting
for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
// phase 3 final rating EPP_TLE
if($phase3_subject_id == 7 ){
    $phase3_epp_tle = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3'";
    $run_phase3_ep_tle = mysqli_query($conn,$phase3_epp_tle);
    if(mysqli_num_rows($run_phase3_ep_tle) > 0){
        $rows5 = mysqli_fetch_array($run_phase3_ep_tle);
        while(mysqli_fetch_array($run_phase3_ep_tle));

        if($rows5['final_rating'] == 0 ){
            $rows5['final_rating'] = " ";
            $rows5['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows5['final_rating'].'</td>
        <td class="text-center">'.$rows5['remarks'].'</td>
        </tr>
        ';
    
    }


}



}





// Phase 3 term 1 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 1;
    


            // phase 3 term 1 MAPEH
            if($phase3_subject_id == 8 ){
                $phase3_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                $run_phase3_mapeh = mysqli_query($conn,$phase3_mapeh);
                if(mysqli_num_rows($run_phase3_mapeh) > 0){
                    $rows = mysqli_fetch_array($run_phase3_mapeh);
                    while(mysqli_fetch_array($run_phase3_mapeh));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="subject">MAPEH</td>
                    <td class="text-center">'.$rows['grade'].'</td>

                    ';
                
                }


            }

}


    // phase 3 term 2 ////////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 2;
    
            // phase 3 term 2 MAPEH
            if($phase3_subject_id == 8 ){
                $phase3_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                $run_phase3_mapeh = mysqli_query($conn,$phase3_mapeh);
                if(mysqli_num_rows($run_phase3_mapeh) > 0){
                    $rows2 = mysqli_fetch_array($run_phase3_mapeh);
                    while(mysqli_fetch_array($run_phase3_mapeh));

                    if($rows2['grade'] == 0 ){
                        $rows2['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows2['grade'].'</td>
                    ';
                
                }


            }

}
    
    //phase 3 term 3 //////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 3;

        // phase 3 term 3 MAPEH
        if($phase3_subject_id == 8 ){
            $phase3_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
            $run_phase3_mapeh = mysqli_query($conn,$phase3_mapeh);
            if(mysqli_num_rows($run_phase3_mapeh) > 0){
                $rows3 = mysqli_fetch_array($run_phase3_mapeh);
                while(mysqli_fetch_array($run_phase3_mapeh));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows3['grade'].'</td>
                ';
            
            }


        }




}




//phase 3 term 4 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 4;
      // phase 3 term 4 MAPEH
      if($phase3_subject_id == 8 ){
        $phase3_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
        $run_phase3_mapeh = mysqli_query($conn,$phase3_mapeh);
        if(mysqli_num_rows($run_phase3_mapeh) > 0){
            $rows4 = mysqli_fetch_array($run_phase3_mapeh);
            while(mysqli_fetch_array($run_phase3_mapeh));

            if($rows4['grade'] == 0 ){
                $rows4['grade'] = " ";
                }

            $html.='
            <td class="text-center"> '.$rows4['grade'].' </td>
            ';
        
        }


    }

}


//phase 3 final raiting
for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
// phase 3 final rating MAPEH
if($phase3_subject_id == 8 ){
    $phase3_mapeh = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3'";
    $run_phase3_mapeh = mysqli_query($conn,$phase3_mapeh);
    if(mysqli_num_rows($run_phase3_mapeh) > 0){
        $rows5 = mysqli_fetch_array($run_phase3_mapeh);
        while(mysqli_fetch_array($run_phase3_mapeh));

        if($rows5['final_rating'] == 0 ){
            $rows5['final_rating'] = " ";
            $rows5['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows5['final_rating'].' </td>
        <td class="text-center"> '.$rows5['remarks'].'</td>
        </tr>
            ';
    
    }


}
    


}




// Phase 3 term 1 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 1;

    
            
                // phase 3 term 1 music
                if($phase3_subject_id == 9 ){
                    $phase3_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                    $run_phase3_music = mysqli_query($conn,$phase3_music);
                    if(mysqli_num_rows($run_phase3_music) > 0){
                        $rows = mysqli_fetch_array($run_phase3_music);
                        while(mysqli_fetch_array($run_phase3_music));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
    
                        $html.='
                        <tr>
                        <td class="small-pad-left italic">Music</td>
                        <td class="text-center"> '.$rows['grade'].'</td>
                        ';
                    
                    }
    
    
                }

}


    // phase 3 term 2 ////////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 2;

    

            
                // phase 3 term 2 music
                if($phase3_subject_id == 9 ){
                    $phase3_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                    $run_phase3_music = mysqli_query($conn,$phase3_music);
                    if(mysqli_num_rows($run_phase3_music) > 0){
                        $rows2 = mysqli_fetch_array($run_phase3_music);
                        while(mysqli_fetch_array($run_phase3_music));

                        if($rows2['grade'] == 0 ){
                            $rows2['grade'] = " ";
                            }
    
                        $html.='
                        <td class="text-center"> '.$rows2['grade'].'</td>
                        ';
                    
                    }
    
    
                }


}
    
    //phase 3 term 3 //////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 3;

        
            // phase 3 term 3 music
            if($phase3_subject_id == 9 ){
                $phase3_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                $run_phase3_music = mysqli_query($conn,$phase3_music);
                if(mysqli_num_rows($run_phase3_music) > 0){
                    $rows3 = mysqli_fetch_array($run_phase3_music);
                    while(mysqli_fetch_array($run_phase3_music));

                    if($rows3['grade'] == 0 ){
                        $rows3['grade'] = " ";
                        }
    
                    $html.='
                    <td class="text-center"> '.$rows3['grade'].'</td>
                        ';
                
                }
    
    
            }




}




//phase 3 term 4 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 4;

            // phase 3 term 4 music
            if($phase3_subject_id == 9 ){
                $phase3_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                $run_phase3_music = mysqli_query($conn,$phase3_music);
                if(mysqli_num_rows($run_phase3_music) > 0){
                    $rows4 = mysqli_fetch_array($run_phase3_music);
                    while(mysqli_fetch_array($run_phase3_music));

                    if($rows4['grade'] == 0 ){
                        $rows4['grade'] = " ";
                        }
    
                    $html.='
                    <td class="text-center">'.$rows4['grade'].'</td>

                     ';
                
                }
    
    
            }

}


//phase 3 final raiting
for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    // phase 3 final rating music
if($phase3_subject_id == 9 ){
    $phase3_music = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3'";
    $run_phase3_music = mysqli_query($conn,$phase3_music);
    if(mysqli_num_rows($run_phase3_music) > 0){
        $rows5 = mysqli_fetch_array($run_phase3_music);
        while(mysqli_fetch_array($run_phase3_music));

        if($rows5['final_rating'] == 0 ){
            $rows5['final_rating'] = " ";
            $rows5['remarks'] = " ";
           }

        $html.='
        <td class="text-center"> '.$rows5['final_rating'].'</td>
        <td class="text-center">'.$rows5['remarks'].'</td>
        </tr>
        ';
    
    }


}
}



// Phase 3 term 1 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 1;

    
                    // phase 3 term 1 arts
                    if($phase3_subject_id == 10 ){
                        $phase3_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                        $run_phase3_arts = mysqli_query($conn,$phase3_arts);
                        if(mysqli_num_rows($run_phase3_arts) > 0){
                            $rows = mysqli_fetch_array($run_phase3_arts);
                            while(mysqli_fetch_array($run_phase3_arts));

                            if($rows['grade'] == 0 ){
                                $rows['grade'] = " ";
                                }
        
                            $html.='
                            <tr>
                            <td class="small-pad-left italic">Arts</td>
                            <td class="text-center"> '.$rows['grade'].'</td>
                            ';
                        
                        }
        
        
                    }

}


    // phase 3 term 2 ////////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 2;



    // phase 3 term 2 arts
    if($phase3_subject_id == 10 ){
        $phase3_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
        $run_phase3_arts = mysqli_query($conn,$phase3_arts);
        if(mysqli_num_rows($run_phase3_arts) > 0){
            $rows2 = mysqli_fetch_array($run_phase3_arts);
            while(mysqli_fetch_array($run_phase3_arts));

            if($rows2['grade'] == 0 ){
                $rows2['grade'] = " ";
                }

            $html.='
            <td class="text-center">'.$rows2['grade'].' </td>
             ';
        
        }


    }
        

}
    
    //phase 3 term 3 //////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 3;


        // phase 3 term 3 arts
        if($phase3_subject_id == 10 ){
            $phase3_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
            $run_phase3_arts = mysqli_query($conn,$phase3_arts);
            if(mysqli_num_rows($run_phase3_arts) > 0){
                $rows3 = mysqli_fetch_array($run_phase3_arts);
                while(mysqli_fetch_array($run_phase3_arts));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows3['grade'].' </td>
                ';
            
            }


        }




}




//phase 3 term 4 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 4;

        // phase 3 term 4 arts
        if($phase3_subject_id == 10 ){
            $phase3_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
            $run_phase3_arts = mysqli_query($conn,$phase3_arts);
            if(mysqli_num_rows($run_phase3_arts) > 0){
                $rows4 = mysqli_fetch_array($run_phase3_arts);
                while(mysqli_fetch_array($run_phase3_arts));

                if($rows4['grade'] == 0 ){
                    $rows4['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows4['grade'].'</td>
                ';
            
            }


        }

}


//phase 3 final raiting
for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
        // phase 3 final rating arts
if($phase3_subject_id == 10 ){
    $phase3_arts = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3'";
    $run_phase3_arts = mysqli_query($conn,$phase3_arts);
    if(mysqli_num_rows($run_phase3_arts) > 0){
        $rows5 = mysqli_fetch_array($run_phase3_arts);
        while(mysqli_fetch_array($run_phase3_arts));

        if($rows5['final_rating'] == 0 ){
            $rows5['final_rating'] = " ";
            $rows5['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows5['final_rating'].'</td>
        <td class="text-center"> '.$rows5['remarks'].'</td>
        </tr>
    ';
    
    }


}


}




// Phase 3 term 1 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 1;
    


            // phase 3 term 1 PE
            if($phase3_subject_id == 11 ){
                $phase3_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                $run_phase3_pe = mysqli_query($conn,$phase3_pe);
                if(mysqli_num_rows($run_phase3_pe) > 0){
                    $rows = mysqli_fetch_array($run_phase3_pe);
                    while(mysqli_fetch_array($run_phase3_pe));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="small-pad-left italic">Physical Education</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                        ';
                
                }


            }

}


    // phase 3 term 2 ////////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 2;
    

            // phase 3 term 2 PE
            if($phase3_subject_id == 11 ){
                $phase3_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                $run_phase3_pe = mysqli_query($conn,$phase3_pe);
                if(mysqli_num_rows($run_phase3_pe) > 0){
                    $rows2 = mysqli_fetch_array($run_phase3_pe);
                    while(mysqli_fetch_array($run_phase3_pe));

                    if($rows2['grade'] == 0 ){
                        $rows2['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows2['grade'].'</td>
                        ';
                
                }


            }



}
    
    //phase 3 term 3 //////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 3;

        // phase 3 term 3 PE
        if($phase3_subject_id == 11 ){
            $phase3_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
            $run_phase3_pe = mysqli_query($conn,$phase3_pe);
            if(mysqli_num_rows($run_phase3_pe) > 0){
                $rows3 = mysqli_fetch_array($run_phase3_pe);
                while(mysqli_fetch_array($run_phase3_pe));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows3['grade'].'</td>
               ';
            
            }


        }




}




//phase 3 term 4 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 4;
  // phase 3 term 4 PE
  if($phase3_subject_id == 11 ){
    $phase3_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
    $run_phase3_pe = mysqli_query($conn,$phase3_pe);
    if(mysqli_num_rows($run_phase3_pe) > 0){
        $rows4 = mysqli_fetch_array($run_phase3_pe);
        while(mysqli_fetch_array($run_phase3_pe));

        if($rows4['grade'] == 0 ){
            $rows4['grade'] = " ";
            }

        $html.='
        <td class="text-center">'.$rows4['grade'].'</td>
    ';
    
    }


}


}


//phase 3 final raiting
for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    

// phase 3 final rating PE
if($phase3_subject_id == 11 ){
    $phase3_pe = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3'";
    $run_phase3_pe = mysqli_query($conn,$phase3_pe);
    if(mysqli_num_rows($run_phase3_pe) > 0){
        $rows5 = mysqli_fetch_array($run_phase3_pe);
        while(mysqli_fetch_array($run_phase3_pe));

        if($rows5['final_rating'] == 0 ){
            $rows5['final_rating'] = " ";
            $rows5['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows5['final_rating'].' </td>
        <td class="text-center">'.$rows5['remarks'].'</td>
       </tr> ';
    
    }


}


}


// Phase 3 term 1 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 1;
    
            // phase 3 term 1 Health
            if($phase3_subject_id == 12 ){
                $phase3_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                $run_phase3_health = mysqli_query($conn,$phase3_health);
                if(mysqli_num_rows($run_phase3_health) > 0){
                    $rows = mysqli_fetch_array($run_phase3_health);
                    while(mysqli_fetch_array($run_phase3_health));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="small-pad-left italic">Health</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                 ';
                
                }


            }

}


    // phase 3 term 2 ////////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 2;
         // phase 3 term 2 Health
         if($phase3_subject_id == 12 ){
            $phase3_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
            $run_phase3_health = mysqli_query($conn,$phase3_health);
            if(mysqli_num_rows($run_phase3_health) > 0){
                $rows2 = mysqli_fetch_array($run_phase3_health);
                while(mysqli_fetch_array($run_phase3_health));

                if($rows2['grade'] == 0 ){
                    $rows2['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows2['grade'].'</td>  ';
            
            }


        }


}
    
    //phase 3 term 3 //////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 3;

   // phase 3 term 3 Health
   if($phase3_subject_id == 12 ){
    $phase3_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
    $run_phase3_health = mysqli_query($conn,$phase3_health);
    if(mysqli_num_rows($run_phase3_health) > 0){
        $rows3 = mysqli_fetch_array($run_phase3_health);
        while(mysqli_fetch_array($run_phase3_health));

        if($rows3['grade'] == 0 ){
            $rows3['grade'] = " ";
            }

        $html.='
        <td class="text-center">'.$rows3['grade'].'</td>';
    
    }


}




}




//phase 3 term 4 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 4;

    // phase 3 term 4 Health
    if($phase3_subject_id == 12 ){
        $phase3_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
        $run_phase3_health = mysqli_query($conn,$phase3_health);
        if(mysqli_num_rows($run_phase3_health) > 0){
            $rows4 = mysqli_fetch_array($run_phase3_health);
            while(mysqli_fetch_array($run_phase3_health));

            if($rows4['grade'] == 0 ){
                $rows4['grade'] = " ";
                }

            $html.='
            <td class="text-center">'.$rows4['grade'].'</td> ';
        
        }


    }

}


//phase 3 final raiting
for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    // phase 3 final rating Health
if($phase3_subject_id == 12 ){
    $phase3_health = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3'";
    $run_phase3_health = mysqli_query($conn,$phase3_health);
    if(mysqli_num_rows($run_phase3_health) > 0){
        $rows = mysqli_fetch_array($run_phase3_health);
        while(mysqli_fetch_array($run_phase3_health));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>';
    
    }


}


}



// Phase 3 term 1 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 1;
            

            // phase 3 term 1 eduk sa pag papakatao
            if($phase3_subject_id == 13 ){
                $phase3_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                $run_phase3_esp = mysqli_query($conn,$phase3_esp);
                if(mysqli_num_rows($run_phase3_esp) > 0){
                    $rows = mysqli_fetch_array($run_phase3_esp);
                    while(mysqli_fetch_array($run_phase3_esp));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="subject">Eduk. Sa Pagpapakatao</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                ';
                
                }


            }


}


    // phase 3 term 2 ////////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 2;
     

            // phase 3 term 2 eduk sa pag papakatao
            if($phase3_subject_id == 13 ){
                $phase3_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                $run_phase3_esp = mysqli_query($conn,$phase3_esp);
                if(mysqli_num_rows($run_phase3_esp) > 0){
                    $rows2 = mysqli_fetch_array($run_phase3_esp);
                    while(mysqli_fetch_array($run_phase3_esp));

                    if($rows2['grade'] == 0 ){
                        $rows2['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows2['grade'].'</td>';
                
                }


            }


}
    
    //phase 3 term 3 //////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 3;


        // phase 3 term 3 eduk sa pag papakatao
        if($phase3_subject_id == 13 ){
            $phase3_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
            $run_phase3_esp = mysqli_query($conn,$phase3_esp);
            if(mysqli_num_rows($run_phase3_esp) > 0){
                $rows3 = mysqli_fetch_array($run_phase3_esp);
                while(mysqli_fetch_array($run_phase3_esp));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows3['grade'].'</td> ';
            
            }


        }




}




//phase 3 term 4 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 4;

        // phase 3 term 4 eduk sa pag papakatao
        if($phase3_subject_id == 13 ){
            $phase3_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
            $run_phase3_esp = mysqli_query($conn,$phase3_esp);
            if(mysqli_num_rows($run_phase3_esp) > 0){
                $rows4 = mysqli_fetch_array($run_phase3_esp);
                while(mysqli_fetch_array($run_phase3_esp));

                if($rows4['grade'] == 0 ){
                    $rows4['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows4['grade'].'</td>';
            
            }


        }

}


//phase 3 final raiting
for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
// phase 3 final rating eduk sa pag papakatao
if($phase3_subject_id == 13 ){
    $phase3_esp = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3'";
    $run_phase3_esp = mysqli_query($conn,$phase3_esp);
    if(mysqli_num_rows($run_phase3_esp) > 0){
        $rows = mysqli_fetch_array($run_phase3_esp);
        while(mysqli_fetch_array($run_phase3_esp));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>';
    
    }


}


}


// Phase 3 term 1 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 1;

    

            // phase 3 term 1 arabic
            if($phase3_subject_id == 14 ){
                $phase3_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                $run_phase3_arabic = mysqli_query($conn,$phase3_arabic);
                if(mysqli_num_rows($run_phase3_arabic) > 0){
                    $rows = mysqli_fetch_array($run_phase3_arabic);
                    while(mysqli_fetch_array($run_phase3_arabic));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="small-pad-left">*Arabic Language</td>
                    <td class="text-center">'.$rows['grade'].' </td>
                ';
                
                }


            }

}


    // phase 3 term 2 ////////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 2;

         // phase 3 term 2 arabic
         if($phase3_subject_id == 14 ){
            $phase3_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
            $run_phase3_arabic = mysqli_query($conn,$phase3_arabic);
            if(mysqli_num_rows($run_phase3_arabic) > 0){
                $rows2 = mysqli_fetch_array($run_phase3_arabic);
                while(mysqli_fetch_array($run_phase3_arabic));

                if($rows2['grade'] == 0 ){
                    $rows2['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows2['grade'].' </td> ';
            
            }


        }


}
    
    //phase 3 term 3 //////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 3;



        // phase 3 term 3 arabic
        if($phase3_subject_id == 14 ){
            $phase3_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
            $run_phase3_arabic = mysqli_query($conn,$phase3_arabic);
            if(mysqli_num_rows($run_phase3_arabic) > 0){
                $rows3 = mysqli_fetch_array($run_phase3_arabic);
                while(mysqli_fetch_array($run_phase3_arabic));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows3['grade'].' </td>  ';
            
            }


        }




}




//phase 3 term 4 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 4;


        // phase 3 term 4 arabic
        if($phase3_subject_id == 14 ){
            $phase3_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
            $run_phase3_arabic = mysqli_query($conn,$phase3_arabic);
            if(mysqli_num_rows($run_phase3_arabic) > 0){
                $rows4 = mysqli_fetch_array($run_phase3_arabic);
                while(mysqli_fetch_array($run_phase3_arabic));

                if($rows4['grade'] == 0 ){
                    $rows4['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows4['grade'].' </td>  ';
            
            }


        }

}


//phase 3 final raiting
for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    // phase 3 final rating arabic
if($phase3_subject_id == 14 ){
    $phase3_arabic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3'";
    $run_phase3_arabic = mysqli_query($conn,$phase3_arabic);
    if(mysqli_num_rows($run_phase3_arabic) > 0){
        $rows = mysqli_fetch_array($run_phase3_arabic);
        while(mysqli_fetch_array($run_phase3_arabic));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center"> '.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>';
    
    }


}


}


// Phase 3 term 1 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 1;
    

            // phase 3 term 1 islamic
            if($phase3_subject_id == 15 ){
                $phase3_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                $run_phase3_islamic = mysqli_query($conn,$phase3_islamic);
                if(mysqli_num_rows($run_phase3_islamic) > 0){
                    $rows = mysqli_fetch_array($run_phase3_islamic);
                    while(mysqli_fetch_array($run_phase3_islamic));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="small-pad-left">*Islamic Values Education </td>
                    <td class="text-center">'.$rows['grade'].'</td>
                    ';
                
                }


            }


}


    // phase 3 term 2 ////////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 2;

    
            // phase 3 term 2 islamic
            if($phase3_subject_id == 15 ){
                $phase3_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
                $run_phase3_islamic = mysqli_query($conn,$phase3_islamic);
                if(mysqli_num_rows($run_phase3_islamic) > 0){
                    $rows2 = mysqli_fetch_array($run_phase3_islamic);
                    while(mysqli_fetch_array($run_phase3_islamic));

                    if($rows2['grade'] == 0 ){
                        $rows2['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows2['grade'].'</td>  ';
                
                }


            }


}
    
    //phase 3 term 3 //////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 3;
       
        // phase 3 term 3 islamic
        if($phase3_subject_id == 15 ){
            $phase3_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
            $run_phase3_islamic = mysqli_query($conn,$phase3_islamic);
            if(mysqli_num_rows($run_phase3_islamic) > 0){
                $rows3 = mysqli_fetch_array($run_phase3_islamic);
                while(mysqli_fetch_array($run_phase3_islamic));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows3['grade'].'</td> ';
                
            
            }


        }





}




//phase 3 term 4 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 4;
  // phase 3 term 4 islamic
  if($phase3_subject_id == 15 ){
    $phase3_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3' AND term = '$term'";
    $run_phase3_islamic = mysqli_query($conn,$phase3_islamic);
    if(mysqli_num_rows($run_phase3_islamic) > 0){
        $rows4 = mysqli_fetch_array($run_phase3_islamic);
        while(mysqli_fetch_array($run_phase3_islamic));

        if($rows4['grade'] == 0 ){
            $rows4['grade'] = " ";
            }

        $html.='
        <td class="text-center">'.$rows4['grade'].'</td>  ';
    
    }


}

}


//phase 3 final raiting
for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
// phase 3 final rating islamic
if($phase3_subject_id == 15 ){
    $phase3_islamic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase3_subject_id' AND phase = '$phase3'";
    $run_phase3_islamic = mysqli_query($conn,$phase3_islamic);
    if(mysqli_num_rows($run_phase3_islamic) > 0){
        $rows = mysqli_fetch_array($run_phase3_islamic);
        while(mysqli_fetch_array($run_phase3_islamic));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center"> '.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
       ';
    
    }


}


}


// Phase 3 term 1 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 1;
    
            //phase 3 term 1 general average
            if( $phase3_subject_id == 16){
                $phase3_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase3' ";
                $run_phase3_term1_general_average = mysqli_query($conn,$phase3_term1_general_average_query);
                if(mysqli_num_rows($run_phase3_term1_general_average)> 0 ){
                    $rows = mysqli_fetch_array($run_phase3_term1_general_average);

                    if($rows['general_average'] == 0 ){
                        $rows['general_average'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="subject">General average</td>
                    <td class="insert-gen-av text-center">'.$rows['general_average'].'</td>

                   ';
                


                }
                


            }

}


    // phase 3 term 2 ////////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
    $term = 2;

    
            //phase 3 term 2 general average
            if( $phase3_subject_id == 16){
                $phase3_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase3' ";
                $run_phase3_term1_general_average = mysqli_query($conn,$phase3_term1_general_average_query);
                if(mysqli_num_rows($run_phase3_term1_general_average)> 0 ){
                    $rows2 = mysqli_fetch_array($run_phase3_term1_general_average);

                    if($rows2['general_average'] == 0 ){
                        $rows2['general_average'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows2['general_average'].'</td>
                    ';
                


                }
                


            }



}
    
    //phase 3 term 3 //////////////////////////////////////////////

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 3;


        //phase 3 term 3 general average
        if( $phase3_subject_id == 16){
            $phase3_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase3' ";
            $run_phase3_term1_general_average = mysqli_query($conn,$phase3_term1_general_average_query);
            if(mysqli_num_rows($run_phase3_term1_general_average)> 0 ){
                $rows3 = mysqli_fetch_array($run_phase3_term1_general_average);

                if($rows3['general_average'] == 0 ){
                    $rows3['general_average'] = " ";
                    }

                $html.='
                <td class="text-center"> '.$rows3['general_average'].'</td>
                ';
            


            }
            


        }




}




//phase 3 term 4 

for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    
$term = 4;

      //phase 3 term 4 general average
      if( $phase3_subject_id == 16){
        $phase3_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase3' ";
        $run_phase3_term1_general_average = mysqli_query($conn,$phase3_term1_general_average_query);
        if(mysqli_num_rows($run_phase3_term1_general_average)> 0 ){
            $rows4 = mysqli_fetch_array($run_phase3_term1_general_average);

            if($rows4['general_average'] == 0 ){
                $rows4['general_average'] = " ";
                }
            $html.='
            <td class="text-center"> '.$rows4['general_average'].'</td>
           \
           ';
        


        }
        


    }

}


//phase 3 final raiting
for ($phase3_subject_id = 1; $phase3_subject_id <= 16 ; $phase3_subject_id++) {
    
    //phase 3 final rating general average
    if( $phase3_subject_id == 16){
        $phase3_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND  phase = '$phase3' AND term = 'Final Rating' ";
        $run_phase3_term1_general_average = mysqli_query($conn,$phase3_term1_general_average_query);
        if(mysqli_num_rows($run_phase3_term1_general_average)> 0 ){
            $rows = mysqli_fetch_array($run_phase3_term1_general_average);

            if($rows['general_average'] == 0 ){
                $rows['general_average'] = " ";
                }



                //phase 3 remarks
            $sql_total_remarks_phase1 = "SELECT final_rating, final_rating, COUNT(remarks) AS 'total_remarks' , lrn FROM student_final_ratings 
            WHERE phase = '3' AND lrn = '$decrypted_lrn' AND remarks= 'FAILED' ";
            $run_total_remarks_phase1 = mysqli_query($conn,$sql_total_remarks_phase1);

            $remarks = mysqli_fetch_array($run_total_remarks_phase1);

            if($remarks['total_remarks'] == 15){
                $output = "";
              }else if($remarks['total_remarks'] >= 3){
                $output = "RETAINED";
              }else if ($remarks['total_remarks'] == 2){
                $output = "REMEDIAL";
              }else if($remarks['total_remarks'] <= 1){
                $output = "PROMOTED";
              }


            $html.='
            <td class="insert-gen-av text-center">'.$rows['general_average'].'</td>
            <td class="text-center">'.$output.'</td>
          
            </tr>
            ';

            //count
        
    
    
        }
        
    
    
    }


}

$html.='
</tbody>
</table>
';

/// Phase 3 remedial  here 

/// Phase 3 remedial  here 
for($phase3_remedial_term = 1; $phase3_remedial_term <=2; $phase3_remedial_term++){

    if($phase3_remedial_term == 1 ){

        $phase3_remedial_query = " SELECT * FROM `remedial_classes` WHERE lrn ='$decrypted_lrn'AND phase = '$phase3' AND term = '$phase3_remedial_term' ";
        $phase3_run_query = mysqli_query($conn,$phase3_remedial_query);
        if(mysqli_num_rows($phase3_run_query)> 0 ){
            $rows = mysqli_fetch_array($phase3_run_query);
            while(mysqli_fetch_array($phase3_run_query));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
               }

               if($rows['recomputed_final_grade'] == 0 ){
                $rows['recomputed_final_grade'] = " ";
               }


               if($rows['date_from'] == "1970-01-01" || $rows['date_from'] == "0000-00-00"){
                $rows['date_from'] = "";
            }

            if($rows['date_to'] == "1970-01-01" || $rows['date_to'] == "0000-00-00"){
             $rows['date_to'] = "";
            }

            $html.='
            <table style="margin-top:4px;">
            <thead>
                <tr class="remedial">
                    <th colspan="2">Remedial Classes</th>
                    <th colspan="2" class="text-start" style="border-right: none;"> Date Conducted: '.$rows['date_from'].'</th>
                    <th colspan="2" class="text-start" style="border-left: none;">To: '.$rows['date_to'].'</th>
                </tr>
                <tr class="arial-header text-center">
                    <td colspan="2">Learning Areas</td>
                    <td>Final Rating</td>
                    <td>Remedial Class <br> Mark</td>
                    <td>Recomputed <br> Final Grade</td>
                    <td>Remarks</td>
                </tr>
            </thead>
            <tbody>
            <tr >
                <td colspan="2" class="remedial-2 text-center">'.$rows['learning_areas'].'</td>
                <td class="remedial-2 text-center">'.$rows['final_rating'].'</td>
                <td class="remedial-2 text-center">'.$rows['remarks'].'</td>
                <td class="remedial-2 text-center">'.$rows['recomputed_final_grade'].'</td>
                <td class="remedial-2 text-center">'.$rows['remedial_class_mark'].'</td>
            </tr>    
           ';
            
        }

    }

            // term 2
        if($phase3_remedial_term == 2 ){

            $phase3_remedial_query = " SELECT * FROM `remedial_classes` WHERE lrn ='$decrypted_lrn'AND phase = '$phase3' AND term = '$phase3_remedial_term' ";
        $phase3_run_query = mysqli_query($conn,$phase3_remedial_query);
        if(mysqli_num_rows($phase3_run_query)> 0 ){
            $rows = mysqli_fetch_array($phase3_run_query);
            while(mysqli_fetch_array($phase3_run_query));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
               }

               if($rows['recomputed_final_grade'] == 0 ){
                $rows['recomputed_final_grade'] = " ";
               }
          
      $html.='
                    <tr>
                        <td colspan="2" class="remedial-2 text-center">'.$rows['learning_areas'].'</td>
                        <td class="remedial-2 text-center">'.$rows['final_rating'].'</td>
                        <td class="remedial-2 text-center">'.$rows['remarks'].'</td>
                        <td class="remedial-2 text-center">'.$rows['remedial_class_mark'].'</td>
                        <td class="remedial-2 text-center">'.$rows['recomputed_final_grade'].'</td>
                    </tr>
                </tbody>
            </table>   
        </td>
        <td style="width:.8em; border:none;">
        </td>

';
        }
//last 3
        }

    
}// end of remedial phase 3 





//start of phase 4 
// scholastic records phase 4 
// phase 4 scohlastic query 

$phase4_scholastic_query = "SELECT * FROM `scholastic_records` WHERE lrn = '$decrypted_lrn' AND phase = $phase4";
$run_phase4_scholastic = mysqli_query($conn,$phase4_scholastic_query);
if(mysqli_num_rows($run_phase4_scholastic) > 0){
    $rows = mysqli_fetch_array($run_phase4_scholastic);

    while(mysqli_fetch_array($run_phase4_scholastic));


    $html.='

    <td class="phase_4" style="width: 48%; border:none;">
    <table class="phase_head">
        <tr>
            <td colspan="6"><span class="main-arial-text">School: <span style="font-weight: bold;">'.$rows['school'].'</span></span></td>
            <td colspan="6" style="text-align: right;><span class="main-arial-text">School ID: <span style="font-weight: bold;">'.$rows['school_id'].'</span></span></td>
        </tr>
        <tr>
            <td colspan="4"><span class="main-arial-text">District: <span style="font-weight: bold;">'.$rows['district'].'</span></span></td>
            <td colspan="4" style="text-align: center;"><span class="main-arial-text">Division: <span style="font-weight: bold;">'.$rows['division'].'</span></span></td>
            <td colspan="4" style="text-align: right;"><span class="main-arial-text">Region: <span style="font-weight: bold;">'.$rows['region'].'</span></span></td>
        </tr>
        <tr>
            <td colspan="3"><span class="main-arial-text">Classified as Grade: <span style="font-weight: bold;">'.$rows['classified_as_grade'].'</span></span></td>
            <td colspan="5" style="text-align: center;"><span class="main-arial-text" >Section: <span style="font-weight: bold;">'.$rows['section'].'</span></span></td>
            <td colspan="4" style="text-align: right;"><span class="main-arial-text">School year: <span style="font-weight: bold;">'.$rows['school_year'].'-2012</span></span></td>
        </tr>
        <tr>
            <td colspan="6"><span class="main-arial-text">Name of adviser: <span style="font-weight: bold;">'.$rows['name_of_teacher'].'</span></span></td>
            <td colspan="6" style="text-align: right;"><span class="main-arial-text">Signature:<span style="font-weight: bold;">'.$rows['signature'].'</span></span></td>
        </tr>
    </table>
';
}


$html.='
    <table>
        <thead>
            <tr>
                <th rowspan="2">Learning Areas</th>
                <th class="quarterly" colspan="4">Quarterly Rating</th>
                <th colspan="1" class="final-rating" rowspan="2" >Final <br> Rating</th>
                <th rowspan="2">Remarks</th>
            </tr>
            <tr class="quarter">
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
            </tr>
        </thead>    
        <tbody> 


';




//phase 4 term 1 

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 1;
    if($phase4_subject_id == 1){
        
        //phase 1 term 1 mother tongue 
$phase4_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
$run_phase4_mt = mysqli_query($conn,$phase4_mt);
if(mysqli_num_rows($run_phase4_mt) > 0){
    $rows = mysqli_fetch_array($run_phase4_mt);
    while(mysqli_fetch_array($run_phase4_mt));

    if($rows['grade'] == 0 ){
        $rows['grade'] = " ";
        }

        $html.=' 
        <tr>
        <td class="subject">Mother Tongue</td>
        <td class="text-center"> '.$rows['grade'].'</td>
        
        ';
    
    }
}



}


// phase 4 term 2 ////////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 2;

    
    if($phase4_subject_id == 1){
        
        //phase 1 term 2 mother tongue 
$phase4_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
$run_phase4_mt = mysqli_query($conn,$phase4_mt);
if(mysqli_num_rows($run_phase4_mt) > 0){
    $rows2 = mysqli_fetch_array($run_phase4_mt);
    while(mysqli_fetch_array($run_phase4_mt));

    if($rows2['grade'] == 0 ){
        $rows2['grade'] = " ";
        }

        $html.=' 
        <td class="text-center"> '.$rows2['grade'].' </td>
        ';
    
    }
}

}


//phase 4 term 3 //////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 3;

    if($phase4_subject_id == 1){
    
        //phase 1 term 3 mother tongue 
$phase4_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
$run_phase4_mt = mysqli_query($conn,$phase4_mt);
if(mysqli_num_rows($run_phase4_mt) > 0){
    $rows3 = mysqli_fetch_array($run_phase4_mt);
    while(mysqli_fetch_array($run_phase4_mt));

    if($rows3['grade'] == 0 ){
        $rows3['grade'] = " ";
        }

        $html.='
        <td class="text-center"> '.$rows3['grade'].'</td>
            ';
    
    }
}

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 4;

    
    if($phase4_subject_id == 1){
    
        //phase 4 term 4 mother tongue 
$phase4_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
$run_phase4_mt = mysqli_query($conn,$phase4_mt);
if(mysqli_num_rows($run_phase4_mt) > 0){
    $rows4 = mysqli_fetch_array($run_phase4_mt);
    while(mysqli_fetch_array($run_phase4_mt));

    if($rows4['grade'] == 0 ){
        $rows4['grade'] = " ";
        }

        $html.=' <td class="text-center">'.$rows4['grade'].'</td>';
    
    }
}


}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    if($phase4_subject_id == 1){

        //phase 1 final rating mother tongue 
$phase4_mt = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4'";
$run_phase4_mt = mysqli_query($conn,$phase4_mt);
if(mysqli_num_rows($run_phase4_mt) > 0){
    $rows5 = mysqli_fetch_array($run_phase4_mt);
    while(mysqli_fetch_array($run_phase4_mt));

    if($rows5['final_rating'] == 0 ){
        $rows5['final_rating'] = " ";
        $rows5['remarks'] = " ";
       }

        $html.=' 
        <td class="text-center">'.$rows5['final_rating'].'</td>
        <td class="text-center">'.$rows5['remarks'].'</td>
        </tr>';
    
    }
}


}




//phase 4 term 1 

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 1;
     // phase 4 term 1 filipino

     if($phase4_subject_id == 2 ){
        $phase4_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
        $run_phase4_filipino = mysqli_query($conn,$phase4_filipino);
        if(mysqli_num_rows($run_phase4_filipino) > 0){
            $rows = mysqli_fetch_array($run_phase4_filipino);
            while(mysqli_fetch_array($run_phase4_filipino));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

                $html.='
                <tr>
                <td class="subject ">Filipino</td>
                <td class="text-center"> '.$rows['grade'].'</td>
                    ';
            
            }

    
        }



}


// phase 4 term 2 ////////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 2;

    
            //phase 1 term 2 filipino

            if($phase4_subject_id == 2 ){
                $phase4_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
                $run_phase4_filipino = mysqli_query($conn,$phase4_filipino);
                if(mysqli_num_rows($run_phase4_filipino) > 0){
                    $rows2 = mysqli_fetch_array($run_phase4_filipino);
                    while(mysqli_fetch_array($run_phase4_filipino));

                    if($rows2['grade'] == 0 ){
                        $rows2['grade'] = " ";
                        }

                        $html.='
                        <td> '.$rows2['grade'].'</td>
                        ';
                    
                    }

            
                }

}


//phase 4 term 3 //////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 3;

    
        //phase 1 term 3 filipino

        if($phase4_subject_id == 2 ){
            $phase4_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
            $run_phase4_filipino = mysqli_query($conn,$phase4_filipino);
            if(mysqli_num_rows($run_phase4_filipino) > 0){
                $rows3 = mysqli_fetch_array($run_phase4_filipino);
                while(mysqli_fetch_array($run_phase4_filipino));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center"> '.$rows3['grade'].'</td>
                    ';
                
                }

        
            }

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 4;
    
        //phase 4 term 4 filipino

        if($phase4_subject_id == 2 ){
            $phase4_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
            $run_phase4_filipino = mysqli_query($conn,$phase4_filipino);
            if(mysqli_num_rows($run_phase4_filipino) > 0){
                $rows4 = mysqli_fetch_array($run_phase4_filipino);
                while(mysqli_fetch_array($run_phase4_filipino));

                if($rows4['grade'] == 0 ){
                    $rows4['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center"> '.$rows4['grade'].'</td>
                     ';
                
                }

        
            }

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    //phase 1 final rating filipino

if($phase4_subject_id == 2 ){
    $phase4_filipino = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4'";
    $run_phase4_filipino = mysqli_query($conn,$phase4_filipino);
    if(mysqli_num_rows($run_phase4_filipino) > 0){
        $rows5 = mysqli_fetch_array($run_phase4_filipino);
        while(mysqli_fetch_array($run_phase4_filipino));

        if($rows5['final_rating'] == 0 ){
            $rows5['final_rating'] = " ";
            $rows5['remarks'] = " ";
           }

            $html.='
            <td class="text-center"> '.$rows5['final_rating'].' </td>
            <td class="text-center">'.$rows5['remarks'].'</td>
            </tr>
                ';
        
        }


    }

}

//phase 4 term 1 

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 1;
      
    // phase 4 term 1 english 

    if($phase4_subject_id == 3 ){
        $phase4_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
        $run_phase4_english = mysqli_query($conn,$phase4_english);
        if(mysqli_num_rows($run_phase4_english) > 0){
            $rows = mysqli_fetch_array($run_phase4_english);
            while(mysqli_fetch_array($run_phase4_english));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

                $html.='
                <tr>
                <td class="subject">English</td>
                <td class="text-center">'.$rows['grade'].'</td>
                
              
                ';
            
            }

    
        }


}


// phase 4 term 2 ////////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 2;

    
    // phase 4 term 2 english 

    if($phase4_subject_id == 3 ){
        $phase4_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
        $run_phase4_english = mysqli_query($conn,$phase4_english);
        if(mysqli_num_rows($run_phase4_english) > 0){
            $rows2 = mysqli_fetch_array($run_phase4_english);
            while(mysqli_fetch_array($run_phase4_english));
            

            if($rows2['grade'] == 0 ){
                $rows2['grade'] = " ";
                }

                $html.='
                <td class="text-center">'.$rows2['grade'].'</td>
               ';
            
            }

    
        }

}


//phase 4 term 3 //////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 3;
    
        // phase 4 term 3 english 

        if($phase4_subject_id == 3 ){
            $phase4_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
            $run_phase4_english = mysqli_query($conn,$phase4_english);
            if(mysqli_num_rows($run_phase4_english) > 0){
                $rows3 = mysqli_fetch_array($run_phase4_english);
                while(mysqli_fetch_array($run_phase4_english));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows3['grade'].'</td>  ';
                
                }

        
            }

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 4;

    // phase 4 term 4 english 

    if($phase4_subject_id == 3 ){
        $phase4_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
        $run_phase4_english = mysqli_query($conn,$phase4_english);
        if(mysqli_num_rows($run_phase4_english) > 0){
            $rows4 = mysqli_fetch_array($run_phase4_english);
            while(mysqli_fetch_array($run_phase4_english));

            if($rows4['grade'] == 0 ){
                $rows4['grade'] = " ";
                }

                $html.='
                <td class="text-center"> '.$rows4['grade'].'</td> ';
            
            }

    
        }

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
// phase 4 final rating english 

if($phase4_subject_id == 3 ){
    $phase4_english = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4'";
    $run_phase4_english = mysqli_query($conn,$phase4_english);
    if(mysqli_num_rows($run_phase4_english) > 0){
        $rows5 = mysqli_fetch_array($run_phase4_english);
        while(mysqli_fetch_array($run_phase4_english));

        if($rows5['final_rating'] == 0 ){
            $rows5['final_rating'] = " ";
            $rows5['remarks'] = " ";
           }

            $html.='
            <td class="text-center"> '.$rows5['final_rating'].'</td>
            <td class="text-center">'.$rows5['remarks'].'</td>
            </tr>
            ';
        
        }


    }

}


//phase 4 term 1 

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 1;

    
            // phase 4 term 1 math

            if($phase4_subject_id == 4 ){
                $phase4_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
                $run_phase4_math = mysqli_query($conn,$phase4_math);
                if(mysqli_num_rows($run_phase4_math) > 0){
                    $rows = mysqli_fetch_array($run_phase4_math);
                    while(mysqli_fetch_array($run_phase4_math));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                        $html.='
                        <tr>
                        <td class="subject">Mathematics</td>
                        <td class="text-center">'.$rows['grade'].'</td>
                       ';
                    
                    }   

            
                }


}


// phase 4 term 2 ////////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 2;

    
            // phase 4 term 2 math

            if($phase4_subject_id == 4 ){
                $phase4_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
                $run_phase4_math = mysqli_query($conn,$phase4_math);
                if(mysqli_num_rows($run_phase4_math) > 0){
                    $rows2 = mysqli_fetch_array($run_phase4_math);
                    while(mysqli_fetch_array($run_phase4_math));

                    if($rows2['grade'] == 0 ){
                        $rows2['grade'] = " ";
                        }

                        $html.='
                        <td class="text-center">'.$rows2['grade'].'</td>
                        ';
                    
                    }   

            
                }


}


//phase 4 term 3 //////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 3;

    
        //phase 4 term 3 math

        if($phase4_subject_id == 4 ){
            $phase4_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
            $run_phase4_math = mysqli_query($conn,$phase4_math);
            if(mysqli_num_rows($run_phase4_math) > 0){
                $rows3 = mysqli_fetch_array($run_phase4_math);
                while(mysqli_fetch_array($run_phase4_math));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows3['grade'].'</td>
                    ';
                
                }   

        
            }


}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 4;

    

        //phase 4 term 4 math

        if($phase4_subject_id == 4 ){
            $phase4_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
            $run_phase4_math = mysqli_query($conn,$phase4_math);
            if(mysqli_num_rows($run_phase4_math) > 0){
                $rows = mysqli_fetch_array($run_phase4_math);
                while(mysqli_fetch_array($run_phase4_math));

                if($rows4['grade'] == 0 ){
                    $rows4['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows4['grade'].'</td>
                    ';
                
                }   

        
            }


}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
// phase 4 final rating math

if($phase4_subject_id == 4 ){
    $phase4_math = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4'";
    $run_phase4_math = mysqli_query($conn,$phase4_math);
    if(mysqli_num_rows($run_phase4_math) > 0){
        $rows = mysqli_fetch_array($run_phase4_math);
        while(mysqli_fetch_array($run_phase4_math));

        if($rows5['final_rating'] == 0 ){
            $rows5['final_rating'] = " ";
            $rows5['remarks'] = " ";
           }

            $html.='
            <td class="text-center">'.$rows5['final_rating'].' </td>
            <td class="text-center">'.$rows5['remarks'].' </td>
            </tr>
            ';
        
        }   


    }

}



//phase 4 term 1 

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 1;
    


        // phase 4 term 1 science

        if($phase4_subject_id == 5 ){
            $phase4_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
            $run_phase4_science = mysqli_query($conn,$phase4_science);
            if(mysqli_num_rows($run_phase4_science) > 0){
                $rows = mysqli_fetch_array($run_phase4_science);
                while(mysqli_fetch_array($run_phase4_science));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <tr>
                    <td class="subject">Science</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                    ';
                
                }

        
            }


}


// phase 4 term 2 ////////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 2;

    
    // phase 4 term 2 science

    if($phase4_subject_id == 5 ){
        $phase4_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
        $run_phase4_science = mysqli_query($conn,$phase4_science);
        if(mysqli_num_rows($run_phase4_science) > 0){
            $rows2 = mysqli_fetch_array($run_phase4_science);
            while(mysqli_fetch_array($run_phase4_science));

            if($rows2['grade'] == 0 ){
                $rows2['grade'] = " ";
                }

                $html.='
                <td class="text-center">'.$rows2['grade'].'</td>
                ';
            
            }

    
        }

}


//phase 4 term 3 //////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 3;
        // phase 4 term 3 science

        if($phase4_subject_id == 5 ){
        $phase4_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
        $run_phase4_science = mysqli_query($conn,$phase4_science);
        if(mysqli_num_rows($run_phase4_science) > 0){
            $rows3 = mysqli_fetch_array($run_phase4_science);
            while(mysqli_fetch_array($run_phase4_science));

            if($rows3['grade'] == 0 ){
                $rows3['grade'] = " ";
                }

                $html.='
                <td class="text-center">'.$rows3['grade'].'</td>
              ';
            
            }

    
        }


}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 4;
    
    // phase 4 term 4 science

    if($phase4_subject_id == 5 ){
        $phase4_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
        $run_phase4_science = mysqli_query($conn,$phase4_science);
        if(mysqli_num_rows($run_phase4_science) > 0){
            $rows4 = mysqli_fetch_array($run_phase4_science);
            while(mysqli_fetch_array($run_phase4_science));

            if($rows4['grade'] == 0 ){
                $rows4['grade'] = " ";
                }

                $html.='
                <td class="text-center">'.$rows4['grade'].'</td>
                ';
            
            }

    
        }

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    // phase 4 final rating science

if($phase4_subject_id == 5 ){
    $phase4_science = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4'";
    $run_phase4_science = mysqli_query($conn,$phase4_science);
    if(mysqli_num_rows($run_phase4_science) > 0){
        $rows5 = mysqli_fetch_array($run_phase4_science);
        while(mysqli_fetch_array($run_phase4_science));

        if($rows5['final_rating'] == 0 ){
            $rows5['final_rating'] = " ";
            $rows5['remarks'] = " ";
           }

            $html.='
            <td class="text-center"> '.$rows5['final_rating'].'</td>
            <td class="text-center">'.$rows5['remarks'].'</td>
            </tr>
            ';
        
        }


    }


}




//phase 4 term 1 

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 1;
          // phase 4 term 1 ap
          if($phase4_subject_id == 6 ){
            $phase4_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
            $run_phase4_AP = mysqli_query($conn,$phase4_AP);
            if(mysqli_num_rows($run_phase4_AP) > 0){
                $rows = mysqli_fetch_array($run_phase4_AP);
                while(mysqli_fetch_array($run_phase4_AP));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <tr>
                <td class="subject">Araling Panlipunan</td>
                <td class="text-center">'.$rows['grade'].' </td>
                ';
            
            }


        }


}


// phase 4 term 2 ////////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 2;
      // phase 4 term 2 ap
      if($phase4_subject_id == 6 ){
        $phase4_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
        $run_phase4_AP = mysqli_query($conn,$phase4_AP);
        if(mysqli_num_rows($run_phase4_AP) > 0){
            $rows2 = mysqli_fetch_array($run_phase4_AP);
            while(mysqli_fetch_array($run_phase4_AP));

            if($rows2['grade'] == 0 ){
                $rows2['grade'] = " ";
                }

            $html.='
            <td class="text-center">'.$rows2['grade'].' </td>
             ';
        
        }


    }


}


//phase 4 term 3 //////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 3;

             // phase 4 term 3 ap
             if($phase4_subject_id == 6 ){
                $phase4_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
                $run_phase4_AP = mysqli_query($conn,$phase4_AP);
                if(mysqli_num_rows($run_phase4_AP) > 0){
                    $rows3 = mysqli_fetch_array($run_phase4_AP);
                    while(mysqli_fetch_array($run_phase4_AP));

                    if($rows3['grade'] == 0 ){
                        $rows3['grade'] = " ";
                        }
    
                    $html.='
                    <td class="text-center">'.$rows3['grade'].' </td>
                  ';
                
                }
    
    
            }
    

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 4;
         // phase 4 term 4 ap
         if($phase4_subject_id == 6 ){
            $phase4_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
            $run_phase4_AP = mysqli_query($conn,$phase4_AP);
            if(mysqli_num_rows($run_phase4_AP) > 0){
                $rows4 = mysqli_fetch_array($run_phase4_AP);
                while(mysqli_fetch_array($run_phase4_AP));

                if($rows4['grade'] == 0 ){
                    $rows4['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows4['grade'].' </td>
                  ';
            
            }


        }

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    // phase 4 final rating ap
if($phase4_subject_id == 6 ){
    $phase4_AP = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4'";
    $run_phase4_AP = mysqli_query($conn,$phase4_AP);
    if(mysqli_num_rows($run_phase4_AP) > 0){
        $rows5 = mysqli_fetch_array($run_phase4_AP);
        while(mysqli_fetch_array($run_phase4_AP));

        if($rows5['final_rating'] == 0 ){
            $rows5['final_rating'] = " ";
            $rows5['remarks'] = " ";
           }

        $html.='
        <td class="text-center"> '.$rows5['final_rating'].'</td>
        <td class="text-center"> '.$rows5['remarks'].' </td>
        </tr>
        ';
    
    }


}


}




//phase 4 term 1 

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 1;
    

            // phase 4 term 1 EPP_TLE
            if($phase4_subject_id == 7 ){
                $phase4_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
                $run_phase4_ep_tle = mysqli_query($conn,$phase4_epp_tle);
                if(mysqli_num_rows($run_phase4_ep_tle) > 0){
                    $rows = mysqli_fetch_array($run_phase4_ep_tle);
                    while(mysqli_fetch_array($run_phase4_ep_tle));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="subject">EPP/TLE</td>
                    <td class="text-center"> '.$rows['grade'].'</td>
                     
                
                    ';
                    
                }


            }


}


// phase 4 term 2 ////////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 2;
    
            // phase 4 term 2 EPP_TLE
            if($phase4_subject_id == 7 ){
                $phase4_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
                $run_phase4_ep_tle = mysqli_query($conn,$phase4_epp_tle);
                if(mysqli_num_rows($run_phase4_ep_tle) > 0){
                    $rows2 = mysqli_fetch_array($run_phase4_ep_tle);
                    while(mysqli_fetch_array($run_phase4_ep_tle));

                    if($rows2['grade'] == 0 ){
                        $rows2['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center"> '.$rows2['grade'].'</td> ';
                
                }


            }

}


//phase 4 term 3 //////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 3;

          // phase 4 term 3 EPP_TLE
          if($phase4_subject_id == 7 ){
            $phase4_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
            $run_phase4_ep_tle = mysqli_query($conn,$phase4_epp_tle);
            if(mysqli_num_rows($run_phase4_ep_tle) > 0){
                $rows3 = mysqli_fetch_array($run_phase4_ep_tle);
                while(mysqli_fetch_array($run_phase4_ep_tle));

                if($rows3['grade'] == 0 ){
                    $rows3['grade'] = " ";
                    }

                $html.='
                <td class="text-center"> '.$rows3['grade'].'</td>  ';
            
            }


        }

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 4;

     // phase 4 term 4 EPP_TLE
     if($phase4_subject_id == 7 ){
        $phase4_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
        $run_phase4_ep_tle = mysqli_query($conn,$phase4_epp_tle);
        if(mysqli_num_rows($run_phase4_ep_tle) > 0){
            $rows4 = mysqli_fetch_array($run_phase4_ep_tle);
            while(mysqli_fetch_array($run_phase4_ep_tle));

            if($rows4['grade'] == 0 ){
                $rows4['grade'] = " ";
                }

            $html.='
            <td class="text-center"> '.$rows4['grade'].'</td>  ';
        
        }


    }


}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
// phase 4 final rating EPP_TLE
if($phase4_subject_id == 7 ){
    $phase4_epp_tle = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4'";
    $run_phase4_ep_tle = mysqli_query($conn,$phase4_epp_tle);
    if(mysqli_num_rows($run_phase4_ep_tle) > 0){
        $rows5 = mysqli_fetch_array($run_phase4_ep_tle);
        while(mysqli_fetch_array($run_phase4_ep_tle));

        if($rows5['final_rating'] == 0 ){
            $rows5['final_rating'] = " ";
            $rows5['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows5['final_rating'].'</td>
        <td class="text-center"> '.$rows5['remarks'].'</td>
       
        </tr>
        ';
    }


}
}



//phase 4 term 1 

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 1;

    
            // phase 4 term 1 MAPEH
            if($phase4_subject_id == 8 ){
                $phase4_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
                $run_phase4_mapeh = mysqli_query($conn,$phase4_mapeh);
                if(mysqli_num_rows($run_phase4_mapeh) > 0){
                    $rows = mysqli_fetch_array($run_phase4_mapeh);
                    while(mysqli_fetch_array($run_phase4_mapeh));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="subject">MAPEH</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                   ';
                
                }


            }


}


// phase 4 term 2 ////////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 2;

      



            // phase 4 term 2 MAPEH
            if($phase4_subject_id == 8 ){
                $phase4_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
                $run_phase4_mapeh = mysqli_query($conn,$phase4_mapeh);
                if(mysqli_num_rows($run_phase4_mapeh) > 0){
                    $rows = mysqli_fetch_array($run_phase4_mapeh);
                    while(mysqli_fetch_array($run_phase4_mapeh));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>
                      ';
                
                }


            }

}


//phase 4 term 3 //////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 3;
     // phase 4 term 3 MAPEH
     if($phase4_subject_id == 8 ){
        $phase4_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
        $run_phase4_mapeh = mysqli_query($conn,$phase4_mapeh);
        if(mysqli_num_rows($run_phase4_mapeh) > 0){
            $rows = mysqli_fetch_array($run_phase4_mapeh);
            while(mysqli_fetch_array($run_phase4_mapeh));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

            $html.='
            <td class="text-center">'.$rows['grade'].'</td>';
        
        }


    }

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 4;
      // phase 4 term 4 MAPEH
      if($phase4_subject_id == 8 ){
        $phase4_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
        $run_phase4_mapeh = mysqli_query($conn,$phase4_mapeh);
        if(mysqli_num_rows($run_phase4_mapeh) > 0){
            $rows = mysqli_fetch_array($run_phase4_mapeh);
            while(mysqli_fetch_array($run_phase4_mapeh));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

            $html.='
            <td class="text-center">'.$rows['grade'].'</td> ';
        
        }


    }

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
// phase 4 final rating MAPEH
if($phase4_subject_id == 8 ){
    $phase4_mapeh = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4'";
    $run_phase4_mapeh = mysqli_query($conn,$phase4_mapeh);
    if(mysqli_num_rows($run_phase4_mapeh) > 0){
        $rows = mysqli_fetch_array($run_phase4_mapeh);
        while(mysqli_fetch_array($run_phase4_mapeh));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }



        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="insert-remarks text-center"> '.$rows['remarks'].'</td>
       
        </tr>
        ';
        
    }


}

}






//phase 4 term 1 

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 1;
    
            
                // phase 4 term 1 music
                if($phase4_subject_id == 9 ){
                    $phase4_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
                    $run_phase4_music = mysqli_query($conn,$phase4_music);
                    if(mysqli_num_rows($run_phase4_music) > 0){
                        $rows = mysqli_fetch_array($run_phase4_music);
                        while(mysqli_fetch_array($run_phase4_music));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
    
                        $html.='
                        <tr>
                        <td class="small-pad-left italic">Music</td>
                        <td class="text-center"> '.$rows['grade'].'</td>
                       ';
                    
                    }
    
    
                }


}


// phase 4 term 2 ////////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 2;
    
            
            
                // phase 4 term 2 music
                if($phase4_subject_id == 9 ){
                    $phase4_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
                    $run_phase4_music = mysqli_query($conn,$phase4_music);
                    if(mysqli_num_rows($run_phase4_music) > 0){
                        $rows = mysqli_fetch_array($run_phase4_music);
                        while(mysqli_fetch_array($run_phase4_music));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
    
                        $html.='
                        <td class="text-center"> '.$rows['grade'].'</td>  ';
                    
                    }
    
    
                }

}


//phase 4 term 3 //////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 3;
    
            // phase 4 term 3 music
            if($phase4_subject_id == 9 ){
                $phase4_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
                $run_phase4_music = mysqli_query($conn,$phase4_music);
                if(mysqli_num_rows($run_phase4_music) > 0){
                    $rows = mysqli_fetch_array($run_phase4_music);
                    while(mysqli_fetch_array($run_phase4_music));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
    
                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td>';
                
                }
    
    
            }

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 4;
         // phase 4 term 4 music
         if($phase4_subject_id == 9 ){
            $phase4_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
            $run_phase4_music = mysqli_query($conn,$phase4_music);
            if(mysqli_num_rows($run_phase4_music) > 0){
                $rows = mysqli_fetch_array($run_phase4_music);
                while(mysqli_fetch_array($run_phase4_music));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center"> '.$rows['grade'].'</td>';
            
            }


        }

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
     // phase 4 final rating music
if($phase4_subject_id == 9 ){
    $phase4_music = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4'";
    $run_phase4_music = mysqli_query($conn,$phase4_music);
    if(mysqli_num_rows($run_phase4_music) > 0){
        $rows = mysqli_fetch_array($run_phase4_music);
        while(mysqli_fetch_array($run_phase4_music));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center"> '.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
        ';
    
    }


} 

}





//phase 4 term 1 

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 1;
    


        // phase 4 term 1 arts
        if($phase4_subject_id == 10 ){
            $phase4_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
            $run_phase4_arts = mysqli_query($conn,$phase4_arts);
            if(mysqli_num_rows($run_phase4_arts) > 0){
                $rows = mysqli_fetch_array($run_phase4_arts);
                while(mysqli_fetch_array($run_phase4_arts));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <tr>
                <td class="small-pad-left italic">Arts</td>
                <td class="text-center"> '.$rows['grade'].'</td>
                  ';
            
            }


        }


}


// phase 4 term 2 ////////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 2;
    
        // phase 4 term 2 arts
        if($phase4_subject_id == 10 ){
            $phase4_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
            $run_phase4_arts = mysqli_query($conn,$phase4_arts);
            if(mysqli_num_rows($run_phase4_arts) > 0){
                $rows = mysqli_fetch_array($run_phase4_arts);
                while(mysqli_fetch_array($run_phase4_arts));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center"> '.$rows['grade'].'</td> ';
            
            }


        }

}


//phase 4 term 3 //////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 3;

        // phase 4 term 3 arts
        if($phase4_subject_id == 10 ){
            $phase4_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
            $run_phase4_arts = mysqli_query($conn,$phase4_arts);
            if(mysqli_num_rows($run_phase4_arts) > 0){
                $rows = mysqli_fetch_array($run_phase4_arts);
                while(mysqli_fetch_array($run_phase4_arts));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center"> '.$rows['grade'].'</td> ';
            
            }


        }

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 4;

        // phase 4 term 4 arts
        if($phase4_subject_id == 10 ){
        $phase4_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
        $run_phase4_arts = mysqli_query($conn,$phase4_arts);
        if(mysqli_num_rows($run_phase4_arts) > 0){
            $rows = mysqli_fetch_array($run_phase4_arts);
            while(mysqli_fetch_array($run_phase4_arts));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

            $html.='
            <td class="text-center"> '.$rows['grade'].'</td>  ';
        
        }


            }

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    

        // phase 4 final rating arts
if($phase4_subject_id == 10 ){
    $phase4_arts = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4'";
    $run_phase4_arts = mysqli_query($conn,$phase4_arts);
    if(mysqli_num_rows($run_phase4_arts) > 0){
        $rows = mysqli_fetch_array($run_phase4_arts);
        while(mysqli_fetch_array($run_phase4_arts));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
         ';
    
    }


}

}




//phase 4 term 1 

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 1;
    


    // phase 4 term 1 PE
    if($phase4_subject_id == 11 ){
        $phase4_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
        $run_phase4_pe = mysqli_query($conn,$phase4_pe);
        if(mysqli_num_rows($run_phase4_pe) > 0){
            $rows = mysqli_fetch_array($run_phase4_pe);
            while(mysqli_fetch_array($run_phase4_pe));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

            $html.='
            <tr>
            <td class="small-pad-left italic">Physical Education </td>
            <td class="text-center">'.$rows['grade'].'</td>
             ';
        
        }


    }


}


// phase 4 term 2 ////////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 2;
    
            // phase 4 term 2 PE
            if($phase4_subject_id == 11 ){
                $phase4_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
                $run_phase4_pe = mysqli_query($conn,$phase4_pe);
                if(mysqli_num_rows($run_phase4_pe) > 0){
                    $rows = mysqli_fetch_array($run_phase4_pe);
                    while(mysqli_fetch_array($run_phase4_pe));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }


            }

}


//phase 4 term 3 //////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 3;

     // phase 4 term 3 PE
     if($phase4_subject_id == 11 ){
        $phase4_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
        $run_phase4_pe = mysqli_query($conn,$phase4_pe);
        if(mysqli_num_rows($run_phase4_pe) > 0){
            $rows = mysqli_fetch_array($run_phase4_pe);
            while(mysqli_fetch_array($run_phase4_pe));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

            $html.='
            <td class="text-center">'.$rows['grade'].'</td>  ';
        
        }


    }


}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 4;
    

        // phase 4 term 4 PE
        if($phase4_subject_id == 11 ){
            $phase4_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
            $run_phase4_pe = mysqli_query($conn,$phase4_pe);
            if(mysqli_num_rows($run_phase4_pe) > 0){
                $rows = mysqli_fetch_array($run_phase4_pe);
                while(mysqli_fetch_array($run_phase4_pe));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td> ';
            
            }


        }

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    

// phase 4 final rating PE
if($phase4_subject_id == 11 ){
    $phase4_pe = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4'";
    $run_phase4_pe = mysqli_query($conn,$phase4_pe);
    if(mysqli_num_rows($run_phase4_pe) > 0){
        $rows = mysqli_fetch_array($run_phase4_pe);
        while(mysqli_fetch_array($run_phase4_pe));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center"> '.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
            ';
    
    }


}

}






//phase 4 term 1 

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 1;

    // phase 4 term 1 Health
    if($phase4_subject_id == 12 ){
        $phase4_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
        $run_phase4_health = mysqli_query($conn,$phase4_health);
        if(mysqli_num_rows($run_phase4_health) > 0){
            $rows = mysqli_fetch_array($run_phase4_health);
            while(mysqli_fetch_array($run_phase4_health));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

            $html.='
            <tr>
            <td class="small-pad-left italic">Health</td>
            <td class="text-center">'.$rows['grade'].'</td>
            ';
        
        }


    }
            


}


// phase 4 term 2 ////////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 2;
    

            // phase 4 term 2 Health
            if($phase4_subject_id == 12 ){
                $phase4_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
                $run_phase4_health = mysqli_query($conn,$phase4_health);
                if(mysqli_num_rows($run_phase4_health) > 0){
                    $rows = mysqli_fetch_array($run_phase4_health);
                    while(mysqli_fetch_array($run_phase4_health));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }


            }

}


//phase 4 term 3 //////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 3;
       // phase 4 term 3 Health
       if($phase4_subject_id == 12 ){
        $phase4_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
        $run_phase4_health = mysqli_query($conn,$phase4_health);
        if(mysqli_num_rows($run_phase4_health) > 0){
            $rows = mysqli_fetch_array($run_phase4_health);
            while(mysqli_fetch_array($run_phase4_health));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

            $html.='
            <td class="text-center">'.$rows['grade'].'</td>  ';
        
        }


    }

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 4;
      // phase 4 term 4 Health
      if($phase4_subject_id == 12 ){
        $phase4_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
        $run_phase4_health = mysqli_query($conn,$phase4_health);
        if(mysqli_num_rows($run_phase4_health) > 0){
            $rows = mysqli_fetch_array($run_phase4_health);
            while(mysqli_fetch_array($run_phase4_health));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

            $html.='
            <td class="text-center">'.$rows['grade'].'</td>  ';
        
        }


    }

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
// phase 4 final rating Health
if($phase4_subject_id == 12 ){
    $phase4_health = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4'";
    $run_phase4_health = mysqli_query($conn,$phase4_health);
    if(mysqli_num_rows($run_phase4_health) > 0){
        $rows = mysqli_fetch_array($run_phase4_health);
        while(mysqli_fetch_array($run_phase4_health));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="insert-remarks text-center"> '.$rows['remarks'].'</td>
        </tr>
          ';
    
    }


}

}

//phase 4 term 1 

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 1;
    

            // phase 4 term 1 eduk sa pag papakatao
            if($phase4_subject_id == 13 ){
                $phase4_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
                $run_phase4_esp = mysqli_query($conn,$phase4_esp);
                if(mysqli_num_rows($run_phase4_esp) > 0){
                    $rows = mysqli_fetch_array($run_phase4_esp);
                    while(mysqli_fetch_array($run_phase4_esp));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="subject">Eduk. Sa Pagpapakatao</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                    ';
                
                }


            }


}


// phase 4 term 2 ////////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 2;
              

            // phase 4 term 2 eduk sa pag papakatao
            if($phase4_subject_id == 13 ){
                $phase4_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
                $run_phase4_esp = mysqli_query($conn,$phase4_esp);
                if(mysqli_num_rows($run_phase4_esp) > 0){
                    $rows = mysqli_fetch_array($run_phase4_esp);
                    while(mysqli_fetch_array($run_phase4_esp));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }


            }

}


//phase 4 term 3 //////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 3;
    
     
        

        // phase 4 term 3 eduk sa pag papakatao
        if($phase4_subject_id == 13 ){
            $phase4_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
            $run_phase4_esp = mysqli_query($conn,$phase4_esp);
            if(mysqli_num_rows($run_phase4_esp) > 0){
                $rows = mysqli_fetch_array($run_phase4_esp);
                while(mysqli_fetch_array($run_phase4_esp));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td> ';
            
            }


        }

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 4;
    
        // phase 4 term 4 eduk sa pag papakatao
        if($phase4_subject_id == 13 ){
            $phase4_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
            $run_phase4_esp = mysqli_query($conn,$phase4_esp);
            if(mysqli_num_rows($run_phase4_esp) > 0){
                $rows = mysqli_fetch_array($run_phase4_esp);
                while(mysqli_fetch_array($run_phase4_esp));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td> ';
            
            }


        }

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
// phase 4 final rating eduk sa pag papakatao
if($phase4_subject_id == 13 ){
    $phase4_esp = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4'";
    $run_phase4_esp = mysqli_query($conn,$phase4_esp);
    if(mysqli_num_rows($run_phase4_esp) > 0){
        $rows = mysqli_fetch_array($run_phase4_esp);
        while(mysqli_fetch_array($run_phase4_esp));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
        ';
    
    }


}

}



//phase 4 term 1 

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 1;
    // phase 4 term 1 arabic
    if($phase4_subject_id == 14 ){
        $phase4_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
        $run_phase4_arabic = mysqli_query($conn,$phase4_arabic);
        if(mysqli_num_rows($run_phase4_arabic) > 0){
            $rows = mysqli_fetch_array($run_phase4_arabic);
            while(mysqli_fetch_array($run_phase4_arabic));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

            $html.='
            <tr>
            <td class="small-pad-left">*Arabic language</td>
            <td class="text-center">'.$rows['grade'].'</td>
           ';
        
        }


    }


}


// phase 4 term 2 ////////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 2;
    
    // phase 4 term 2 arabic
    if($phase4_subject_id == 14 ){
        $phase4_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
        $run_phase4_arabic = mysqli_query($conn,$phase4_arabic);
        if(mysqli_num_rows($run_phase4_arabic) > 0){
            $rows = mysqli_fetch_array($run_phase4_arabic);
            while(mysqli_fetch_array($run_phase4_arabic));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

            $html.='
            <td class="text-center"> '.$rows['grade'].'</td> ';
        
        }


    }


}


//phase 4 term 3 //////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 3;
    
        // phase 4 term 3 arabic
        if($phase4_subject_id == 14 ){
            $phase4_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
            $run_phase4_arabic = mysqli_query($conn,$phase4_arabic);
            if(mysqli_num_rows($run_phase4_arabic) > 0){
                $rows = mysqli_fetch_array($run_phase4_arabic);
                while(mysqli_fetch_array($run_phase4_arabic));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td>  ';
            
            }


        }


}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 4;
    

        // phase 4 term 4 arabic
        if($phase4_subject_id == 14 ){
            $phase4_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
            $run_phase4_arabic = mysqli_query($conn,$phase4_arabic);
            if(mysqli_num_rows($run_phase4_arabic) > 0){
                $rows = mysqli_fetch_array($run_phase4_arabic);
                while(mysqli_fetch_array($run_phase4_arabic));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td> ';
            
            }


        }

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    // phase 4 final rating arabic
if($phase4_subject_id == 14 ){
    $phase4_arabic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4'";
    $run_phase4_arabic = mysqli_query($conn,$phase4_arabic);
    if(mysqli_num_rows($run_phase4_arabic) > 0){
        $rows = mysqli_fetch_array($run_phase4_arabic);
        while(mysqli_fetch_array($run_phase4_arabic));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
         ';
    
    }


}

}



//phase 4 term 1 

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 1;
    

            
            // phase 4 term 1 islamic
            if($phase4_subject_id == 15 ){
                $phase4_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
                $run_phase4_islamic = mysqli_query($conn,$phase4_islamic);
                if(mysqli_num_rows($run_phase4_islamic) > 0){
                    $rows = mysqli_fetch_array($run_phase4_islamic);
                    while(mysqli_fetch_array($run_phase4_islamic));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="small-pad-left">*Islamic values Education</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                    ';
                
                }


            }


}


// phase 4 term 2 ////////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 2;
    
            
            // phase 4 term 2 islamic
            if($phase4_subject_id == 15 ){
                $phase4_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
                $run_phase4_islamic = mysqli_query($conn,$phase4_islamic);
                if(mysqli_num_rows($run_phase4_islamic) > 0){
                    $rows = mysqli_fetch_array($run_phase4_islamic);
                    while(mysqli_fetch_array($run_phase4_islamic));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td> ';
                
                }


            }


}


//phase 4 term 3 //////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 3;
            
        // phase 4 term 3 islamic
        if($phase4_subject_id == 15 ){
            $phase4_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
            $run_phase4_islamic = mysqli_query($conn,$phase4_islamic);
            if(mysqli_num_rows($run_phase4_islamic) > 0){
                $rows = mysqli_fetch_array($run_phase4_islamic);
                while(mysqli_fetch_array($run_phase4_islamic));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td> ';
                
            
            }


        }

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 4;
          
        // phase 4 term 4 islamic
        if($phase4_subject_id == 15 ){
            $phase4_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4' AND term = '$term'";
            $run_phase4_islamic = mysqli_query($conn,$phase4_islamic);
            if(mysqli_num_rows($run_phase4_islamic) > 0){
                $rows = mysqli_fetch_array($run_phase4_islamic);
                while(mysqli_fetch_array($run_phase4_islamic));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td> ';
            
            }


        }

}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
// phase 4 final rating islamic
if($phase4_subject_id == 15 ){
    $phase4_islamic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase4_subject_id' AND phase = '$phase4'";
    $run_phase4_islamic = mysqli_query($conn,$phase4_islamic);
    if(mysqli_num_rows($run_phase4_islamic) > 0){
        $rows = mysqli_fetch_array($run_phase4_islamic);
        while(mysqli_fetch_array($run_phase4_islamic));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
        ';
    
    }


}

}





//phase 4 term 1 

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 1;
    
            //phase 4 term 1 general average
            if( $phase4_subject_id == 16){
                $phase4_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase4' ";
                $run_phase4_term1_general_average = mysqli_query($conn,$phase4_term1_general_average_query);
                if(mysqli_num_rows($run_phase4_term1_general_average)> 0 ){
                    $rows = mysqli_fetch_array($run_phase4_term1_general_average);

                    if($rows['general_average'] == 0 ){
                        $rows['general_average'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="subject">General Average</td>
                    <td class="insert-gen-av text-center">'.$rows['general_average'].'</td>
                    
                    
                  ';
                


                }
                


            }



}


// phase 4 term 2 ////////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 2;
    


            //phase 4 term 2 general average
            if( $phase4_subject_id == 16){
                $phase4_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase4' ";
                $run_phase4_term1_general_average = mysqli_query($conn,$phase4_term1_general_average_query);
                if(mysqli_num_rows($run_phase4_term1_general_average)> 0 ){
                    $rows = mysqli_fetch_array($run_phase4_term1_general_average);


                    if($rows['general_average'] == 0 ){
                        $rows['general_average'] = " ";
                        }

                    $html.='
                    <td class="insert-gen-av text-center">'.$rows['general_average'].'</td>  ';
                


                }
                


            }


}


//phase 4 term 3 //////////////////////////////////////////////

for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 3;
    

        //phase 4 term 3 general average
        if( $phase4_subject_id == 16){
            $phase4_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase4' ";
            $run_phase4_term1_general_average = mysqli_query($conn,$phase4_term1_general_average_query);
            if(mysqli_num_rows($run_phase4_term1_general_average)> 0 ){
                $rows = mysqli_fetch_array($run_phase4_term1_general_average);

                if($rows['general_average'] == 0 ){
                    $rows['general_average'] = " ";
                    }
                $html.='
                <td class="insert-gen-av text-center">'.$rows['general_average'].'</td> ';
            


            }
            


        }


}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
    
    $term = 4;
    
        //phase 4 term 4 general average
        if( $phase4_subject_id == 16){
            $phase4_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase4' ";
            $run_phase4_term1_general_average = mysqli_query($conn,$phase4_term1_general_average_query);
            if(mysqli_num_rows($run_phase4_term1_general_average)> 0 ){
                $rows = mysqli_fetch_array($run_phase4_term1_general_average);

                if($rows['general_average'] == 0 ){
                    $rows['general_average'] = " ";
                    }

                $html.='
                <td class="insert-gen-av text-center">'.$rows['general_average'].'</td> ';
            


            }
            


        }



}


for ($phase4_subject_id = 1; $phase4_subject_id <= 16 ; $phase4_subject_id++) {
    
//phase 4 final rating general average
if( $phase4_subject_id == 16){
    $phase4_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND  phase = '$phase4' AND term = 'Final Rating' ";
    $run_phase4_term1_general_average = mysqli_query($conn,$phase4_term1_general_average_query);
    if(mysqli_num_rows($run_phase4_term1_general_average)> 0 ){
        $rows = mysqli_fetch_array($run_phase4_term1_general_average);

        if($rows['general_average'] == 0 ){
            $rows['general_average'] = " ";
            }


            //phase 4 remarks
            $sql_total_remarks_phase1 = "SELECT final_rating, final_rating, COUNT(remarks) AS 'total_remarks' , lrn FROM student_final_ratings 
            WHERE phase = '4' AND lrn = '$decrypted_lrn' AND remarks= 'FAILED' ";
            $run_total_remarks_phase1 = mysqli_query($conn,$sql_total_remarks_phase1);

            $remarks = mysqli_fetch_array($run_total_remarks_phase1);

            if($remarks['total_remarks'] == 15){
                $output = "";
              }else if($remarks['total_remarks'] >= 3){
                $output = "RETAINED";
              }else if ($remarks['total_remarks'] == 2){
                $output = "REMEDIAL";
              }else if($remarks['total_remarks'] <= 1){
                $output = "PROMOTED";
              }

        $html.='
        <td class="insert-gen-av text-center">'.$rows['general_average'].'</td>
        <td class="text-center">'.$output.'</td>
       
        </tr>
        </tbody> ';

        //count
    


    }
    


}



}

$html.='
</table>
';


/// remedial  here 
for($phase4_remedial_term = 1; $phase4_remedial_term <=2; $phase4_remedial_term++){

    if($phase4_remedial_term == 1 ){

        $phase4_remedial_query = " SELECT * FROM `remedial_classes` WHERE lrn ='$decrypted_lrn'AND phase = '$phase4' AND term = '$phase4_remedial_term' ";
        $phase4_run_query = mysqli_query($conn,$phase4_remedial_query);
        if(mysqli_num_rows($phase4_run_query)> 0 ){
            $rows = mysqli_fetch_array($phase4_run_query);
            while(mysqli_fetch_array($phase4_run_query));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
               }

               if($rows['recomputed_final_grade'] == 0 ){
                $rows['recomputed_final_grade'] = " ";
               }

               if($rows['date_from'] == "1970-01-01" || $rows['date_from'] == "0000-00-00"){
                $rows['date_from'] = "";
            }

            if($rows['date_to'] == "1970-01-01" || $rows['date_to'] == "0000-00-00"){
             $rows['date_to'] = "";
            }

            $html.='
            <table style="margin-top:4px;">
                <thead>
                    <tr class="remedial">
                        <th colspan="2">Remedial Classes</th>
                        <th colspan="2" class="text-start" style="border-right: none;"> Date Conducted: '.$rows['date_from'].'</th>
                        <th colspan="2" class="text-start" style="border-left: none;">To: '.$rows['date_to'].'</th>
                    </tr>
                    <tr class="arial-header text-center">
                        <td colspan="2">Learning Areas</td>
                        <td>Final Rating</td>
                        <td>Remedial Class <br> Mark</td>
                        <td>Recomputed <br> Final Grade</td>
                        <td>Remarks</td>
                    </tr>
                </thead>
                <tbody>
                <tr >
                    <td colspan="2" class="remedial-2 text-center">'.$rows['learning_areas'].'</td>
                    <td class="remedial-2 text-center">'.$rows['final_rating'].'</td>
                    <td class="remedial-2 text-center">'.$rows['remarks'].'</td>
                    <td class="remedial-2 text-center">'.$rows['recomputed_final_grade'].'</td>
                    <td class="remedial-2 text-center">'.$rows['remedial_class_mark'].'</td>
                </tr>    
           ';
            
        }
        //last 4
    }

            // term 2
        if($phase4_remedial_term == 2 ){

            $phase4_remedial_query = " SELECT * FROM `remedial_classes` WHERE lrn ='$decrypted_lrn'AND phase = '$phase4' AND term = '$phase4_remedial_term' ";
        $phase4_run_query = mysqli_query($conn,$phase4_remedial_query);
        if(mysqli_num_rows($phase4_run_query)> 0 ){
            $rows = mysqli_fetch_array($phase4_run_query);
            while(mysqli_fetch_array($phase4_run_query));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
               }

               if($rows['recomputed_final_grade'] == 0 ){
                $rows['recomputed_final_grade'] = " ";
               }
            $html.='
                <tr>
                    <td colspan="2" class="remedial-2 text-center">'.$rows['learning_areas'].'</td>
                    <td class="remedial-2 text-center">'.$rows['final_rating'].'</td>
                    <td class="remedial-2 text-center">'.$rows['remarks'].'</td>
                    <td class="remedial-2 text-center">'.$rows['remedial_class_mark'].'</td>
                    <td class="remedial-2 text-center">'.$rows['recomputed_final_grade'].'</td>
                </tr>
            </tbody>
        </table>   
    </td>
</tr>
      
      ';
              }
      
              }
      
          
      }// end of remedial phase 3 
      


//start of phase 5 
// scholastic records phase 5 
// phase 5 scohlastic query 

$phase5_scholastic_query = "SELECT * FROM `scholastic_records` WHERE lrn = '$decrypted_lrn' AND phase = $phase5";
$run_phase5_scholastic = mysqli_query($conn,$phase5_scholastic_query);
if(mysqli_num_rows($run_phase5_scholastic) > 0){
    $rows = mysqli_fetch_array($run_phase5_scholastic);

    while(mysqli_fetch_array($run_phase5_scholastic));


    $html.='
                <tr class="row_1" style="width: 100vw; margin-bottom: 2em;  border:none;">
                    <td class="phase_5" style="width: 48%;  border:none;">
                        <table class="phase_head">
                            <tr>
                                <td colspan="6"><span class="main-arial-text">School: <span style="font-weight: bold;">'.$rows['school'].'</span></span></td>
                                <td colspan="6" style="text-align: right;><span class="main-arial-text">School ID: <span style="font-weight: bold;">'.$rows['school_id'].'</span></span></td>
                            </tr>
                            <tr>
                                <td colspan="4"><span class="main-arial-text">District: <span style="font-weight: bold;">'.$rows['district'].'</span></span></td>
                                <td colspan="4" style="text-align: center;"><span class="main-arial-text">Division: <span style="font-weight: bold;">'.$rows['division'].'</span></span></td>
                                <td colspan="4" style="text-align: right;"><span class="main-arial-text">Region: <span style="font-weight: bold;">'.$rows['region'].'</span></span></td>
                            </tr>
                            <tr>
                                <td colspan="3"><span class="main-arial-text">Classified as Grade: <span style="font-weight: bold;">'.$rows['classified_as_grade'].'</span></span></td>
                                <td colspan="5" style="text-align: center;"><span class="main-arial-text" >Section: <span style="font-weight: bold;">'.$rows['section'].'</span></span></td>
                                <td colspan="4" style="text-align: right;"><span class="main-arial-text">School year: <span style="font-weight: bold;">'.$rows['school_year'].'-2012</span></span></td>
                            </tr>
                            <tr>
                                <td colspan="6"><span class="main-arial-text">Name of adviser: <span style="font-weight: bold;">'.$rows['name_of_teacher'].'</span></span></td>
                                <td colspan="6" style="text-align: right;"><span class="main-arial-text">Signature:<span style="font-weight: bold;">'.$rows['signature'].'</span></span></td>
                            </tr>
                        </table>
    ';
    }

    $html.='
                        <table>
                            <thead>
                                <tr>
                                    <th rowspan="2">Learning Areas</th>
                                    <th class="quarterly" colspan="4">Quarterly Rating</th>
                                    <th colspan="1" class="final-rating" rowspan="2" >Final <br> Rating</th>
                                    <th rowspan="2">Remarks</th>
                                </tr>
                                <tr class="quarter">
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                </tr>
                            </thead>    
                            <tbody> 
     
    ';
    
//phase 5 term 1 


    

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 1;
    
    if($phase5_subject_id == 1){
        
        //phase 1 term 1 mother tongue 
$phase5_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
$run_phase5_mt = mysqli_query($conn,$phase5_mt);
if(mysqli_num_rows($run_phase5_mt) > 0){
    $rows = mysqli_fetch_array($run_phase5_mt);
    while(mysqli_fetch_array($run_phase5_mt));

    if($rows['grade'] == 0 ){
        $rows['grade'] = " ";
        }


        $html.=' 
        <tr>
        <td class="subject">Mother Tongue</td>
        <td class="text-center"> '.$rows['grade'].'</td>
        
        ';
    
    }
}
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 2;
    

// phase 5 term 2 ////////////////////////////////////////////////

    

if($phase5_subject_id == 1){
        
    //phase 1 term 2 mother tongue 
$phase5_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
$run_phase5_mt = mysqli_query($conn,$phase5_mt);
if(mysqli_num_rows($run_phase5_mt) > 0){
$rows = mysqli_fetch_array($run_phase5_mt);
while(mysqli_fetch_array($run_phase5_mt));

if($rows['grade'] == 0 ){
    $rows['grade'] = " ";
    }



    $html.=' 
    <td class="text-center"> '.$rows['grade'].'</td> ';

}
}
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 3;
            //phase 5 term 3 //////////////////////////////////////////////




            if($phase5_subject_id == 1){
    
                //phase 1 term 3 mother tongue 
        $phase5_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
        $run_phase5_mt = mysqli_query($conn,$phase5_mt);
        if(mysqli_num_rows($run_phase5_mt) > 0){
            $rows = mysqli_fetch_array($run_phase5_mt);
            while(mysqli_fetch_array($run_phase5_mt));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

                $html.='  <td class="text-center"> '.$rows['grade'].'</td>  ';
            
            }
        }


}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 4;
    
//phase 5 term 4 



if($phase5_subject_id == 1){
    
    //phase 5 term 4 mother tongue 
$phase5_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
$run_phase5_mt = mysqli_query($conn,$phase5_mt);
if(mysqli_num_rows($run_phase5_mt) > 0){
$rows = mysqli_fetch_array($run_phase5_mt);
while(mysqli_fetch_array($run_phase5_mt));

if($rows['grade'] == 0 ){
    $rows['grade'] = " ";
    }


    $html.=' <td class="text-center"> '.$rows['grade'].'</td>';

}
}

}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
if($phase5_subject_id == 1){

    //phase 1 final rating mother tongue 
$phase5_mt = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5'";
$run_phase5_mt = mysqli_query($conn,$phase5_mt);
if(mysqli_num_rows($run_phase5_mt) > 0){
$rows = mysqli_fetch_array($run_phase5_mt);
while(mysqli_fetch_array($run_phase5_mt));

if($rows['final_rating'] == 0 ){
    $rows['final_rating'] = " ";
    $rows['remarks'] = " ";
   }

    $html.=' 
    <td class="text-center">'.$rows['final_rating'].'</td>
    <td class="text-center">'.$rows['remarks'].'</td>
    </tr>
    ';

}
}
}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 1;

    


            // phase 5 term 1 filipino

            if($phase5_subject_id == 2 ){
                $phase5_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                $run_phase5_filipino = mysqli_query($conn,$phase5_filipino);
                if(mysqli_num_rows($run_phase5_filipino) > 0){
                    $rows = mysqli_fetch_array($run_phase5_filipino);
                    while(mysqli_fetch_array($run_phase5_filipino));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        

                        $html.='
                        <tr>
                        <td class="subject">Filipino</td>
                        <td class="text-center">'.$rows['grade'].'</td>
                        ';
                    
                    }

            
                }
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 2;
      //phase 1 term 2 filipino

      if($phase5_subject_id == 2 ){
        $phase5_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
        $run_phase5_filipino = mysqli_query($conn,$phase5_filipino);
        if(mysqli_num_rows($run_phase5_filipino) > 0){
            $rows = mysqli_fetch_array($run_phase5_filipino);
            while(mysqli_fetch_array($run_phase5_filipino));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }



                $html.='
                <td class="text-center">'.$rows['grade'].'</td> ';
            
            }

    
        }
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 3;
     
        //phase 1 term 3 filipino

        if($phase5_subject_id == 2 ){
            $phase5_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
            $run_phase5_filipino = mysqli_query($conn,$phase5_filipino);
            if(mysqli_num_rows($run_phase5_filipino) > 0){
                $rows = mysqli_fetch_array($run_phase5_filipino);
                while(mysqli_fetch_array($run_phase5_filipino));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td> ';
                
                }

        
            }

}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 4;
         //phase 5 term 4 filipino

         if($phase5_subject_id == 2 ){
            $phase5_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
            $run_phase5_filipino = mysqli_query($conn,$phase5_filipino);
            if(mysqli_num_rows($run_phase5_filipino) > 0){
                $rows = mysqli_fetch_array($run_phase5_filipino);
                while(mysqli_fetch_array($run_phase5_filipino));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }
    

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }

        
            }

}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    

//phase 1 final rating filipino

if($phase5_subject_id == 2 ){
    $phase5_filipino = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5'";
    $run_phase5_filipino = mysqli_query($conn,$phase5_filipino);
    if(mysqli_num_rows($run_phase5_filipino) > 0){
        $rows = mysqli_fetch_array($run_phase5_filipino);
        while(mysqli_fetch_array($run_phase5_filipino));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

            $html.='
            <td class="text-center"> '.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].'</td>
            </tr>
                ';
        
        }


    }
}



for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 1;
      // phase 5 term 1 english 

      if($phase5_subject_id == 3 ){
        $phase5_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
        $run_phase5_english = mysqli_query($conn,$phase5_english);
        if(mysqli_num_rows($run_phase5_english) > 0){
            $rows = mysqli_fetch_array($run_phase5_english);
            while(mysqli_fetch_array($run_phase5_english));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }


                $html.='
                <tr>
                <td class="subject">English</td>
                <td class="text-center">'.$rows['grade'].'</td>
                
                ';
            
            }

    
        }
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 2;
          // phase 5 term 2 english 

          if($phase5_subject_id == 3 ){
            $phase5_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
            $run_phase5_english = mysqli_query($conn,$phase5_english);
            if(mysqli_num_rows($run_phase5_english) > 0){
                $rows = mysqli_fetch_array($run_phase5_english);
                while(mysqli_fetch_array($run_phase5_english));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }
    
    

                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td> ';
                
                }

        
            }
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 3;
    
        // phase 5 term 3 english 

        if($phase5_subject_id == 3 ){
            $phase5_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
            $run_phase5_english = mysqli_query($conn,$phase5_english);
            if(mysqli_num_rows($run_phase5_english) > 0){
                $rows = mysqli_fetch_array($run_phase5_english);
                while(mysqli_fetch_array($run_phase5_english));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td> ';
                
                }

        
            }


}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 4;
    // phase 5 term 4 english 

    if($phase5_subject_id == 3 ){
        $phase5_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
        $run_phase5_english = mysqli_query($conn,$phase5_english);
        if(mysqli_num_rows($run_phase5_english) > 0){
            $rows = mysqli_fetch_array($run_phase5_english);
            while(mysqli_fetch_array($run_phase5_english));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }


                $html.='
                <td class="text-center">'.$rows['grade'].'</td>  ';
            
            }

    
        }

}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {


// phase 5 final rating english 

if($phase5_subject_id == 3 ){
    $phase5_english = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5'";
    $run_phase5_english = mysqli_query($conn,$phase5_english);
    if(mysqli_num_rows($run_phase5_english) > 0){
        $rows = mysqli_fetch_array($run_phase5_english);
        while(mysqli_fetch_array($run_phase5_english));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

            $html.='
            <td class="text-center">'.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].'</td>
            </tr>
            ';
        
        }


    }
}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 1;
    


          

            // phase 5 term 1 math

            if($phase5_subject_id == 4 ){
                $phase5_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                $run_phase5_math = mysqli_query($conn,$phase5_math);
                if(mysqli_num_rows($run_phase5_math) > 0){
                    $rows = mysqli_fetch_array($run_phase5_math);
                    while(mysqli_fetch_array($run_phase5_math));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        

                        $html.='
                        <tr>
                        <td class="subject">Mathematics</td>
                        <td class="text-center"> '.$rows['grade'].'</td>
                        ';
                    
                    }   

            
                }
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 2;
    // phase 5 term 2 math

    if($phase5_subject_id == 4 ){
        $phase5_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
        $run_phase5_math = mysqli_query($conn,$phase5_math);
        if(mysqli_num_rows($run_phase5_math) > 0){
            $rows = mysqli_fetch_array($run_phase5_math);
            while(mysqli_fetch_array($run_phase5_math));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }



                $html.='
                <td class="text-center"> '.$rows['grade'].'</td> ';
            
            }   

    
        }
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 3;
    
        //phase 1 term 3 math

        if($phase5_subject_id == 4 ){
            $phase5_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
            $run_phase5_math = mysqli_query($conn,$phase5_math);
            if(mysqli_num_rows($run_phase5_math) > 0){
                $rows = mysqli_fetch_array($run_phase5_math);
                while(mysqli_fetch_array($run_phase5_math));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td>';
                
                }   

        
            }

}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 4;
    
        //phase 1 term 4 math

        if($phase5_subject_id == 4 ){
            $phase5_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
            $run_phase5_math = mysqli_query($conn,$phase5_math);
            if(mysqli_num_rows($run_phase5_math) > 0){
                $rows = mysqli_fetch_array($run_phase5_math);
                while(mysqli_fetch_array($run_phase5_math));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }
    

                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td>';
                
                }   

        
            }

}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {

// phase 5 final rating math

if($phase5_subject_id == 4 ){
    $phase5_math = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5'";
    $run_phase5_math = mysqli_query($conn,$phase5_math);
    if(mysqli_num_rows($run_phase5_math) > 0){
        $rows = mysqli_fetch_array($run_phase5_math);
        while(mysqli_fetch_array($run_phase5_math));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

            $html.='
            <td class="text-center"> '.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].'</td>
            </tr>
            ';
        
        }   


    }
}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 1;
    

        // phase 5 term 1 science

        if($phase5_subject_id == 5 ){
            $phase5_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
            $run_phase5_science = mysqli_query($conn,$phase5_science);
            if(mysqli_num_rows($run_phase5_science) > 0){
                $rows = mysqli_fetch_array($run_phase5_science);
                while(mysqli_fetch_array($run_phase5_science));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }
    

                    $html.='
                    <tr>
                    <td class="subject">Science</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                    ';
                
                }

        
            }
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 2;
           // phase 5 term 2 science

           if($phase5_subject_id == 5 ){
            $phase5_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
            $run_phase5_science = mysqli_query($conn,$phase5_science);
            if(mysqli_num_rows($run_phase5_science) > 0){
                $rows = mysqli_fetch_array($run_phase5_science);
                while(mysqli_fetch_array($run_phase5_science));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }
    
    

                    $html.='

                   <td class="text-center">'.$rows['grade'].'</td> ';
                
                }

        
            }
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 3;
    
            // phase 5 term 3 science

            if($phase5_subject_id == 5 ){
                $phase5_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                $run_phase5_science = mysqli_query($conn,$phase5_science);
                if(mysqli_num_rows($run_phase5_science) > 0){
                    $rows = mysqli_fetch_array($run_phase5_science);
                    while(mysqli_fetch_array($run_phase5_science));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
    
                        $html.='
                        <td class="text-center">'.$rows['grade'].'</td>  ';
                    
                    }
    
            
                }

}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 4;
    
            // phase 5 term 4 science

            if($phase5_subject_id == 5 ){
                $phase5_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                $run_phase5_science = mysqli_query($conn,$phase5_science);
                if(mysqli_num_rows($run_phase5_science) > 0){
                    $rows = mysqli_fetch_array($run_phase5_science);
                    while(mysqli_fetch_array($run_phase5_science));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        
    
                        $html.='
                        <td class="text-center">'.$rows['grade'].'</td> ';
                    
                    }
    
            
                }
    

}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
      // phase 5 final rating science

if($phase5_subject_id == 5 ){
    $phase5_science = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5'";
    $run_phase5_science = mysqli_query($conn,$phase5_science);
    if(mysqli_num_rows($run_phase5_science) > 0){
        $rows = mysqli_fetch_array($run_phase5_science);
        while(mysqli_fetch_array($run_phase5_science));


        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }
            $html.='
            <td class="text-center"> '.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].'</td>
            </tr>
            ';
        
        }


    }
}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 1;

    
                // phase 5 term 1 ap
                if($phase5_subject_id == 6 ){
                    $phase5_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                    $run_phase5_AP = mysqli_query($conn,$phase5_AP);
                    if(mysqli_num_rows($run_phase5_AP) > 0){
                        $rows = mysqli_fetch_array($run_phase5_AP);
                        while(mysqli_fetch_array($run_phase5_AP));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
            
    
                        $html.='
                        <tr>
                        <td class="subject">Araling Panlipunan</td>
                        <td class="text-center"> '.$rows['grade'].'</td>
                        ';
                    
                    }
    
    
                }
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 2;
    
                // phase 5 term 2 ap
                if($phase5_subject_id == 6 ){
                    $phase5_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                    $run_phase5_AP = mysqli_query($conn,$phase5_AP);
                    if(mysqli_num_rows($run_phase5_AP) > 0){
                        $rows = mysqli_fetch_array($run_phase5_AP);
                        while(mysqli_fetch_array($run_phase5_AP));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
            
            
    
                        $html.='
                        <td class="text-center"> '.$rows['grade'].'</td> ';
                    
                    }
    
    
                }
    
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 3;
    
            // phase 5 term 3 ap
            if($phase5_subject_id == 6 ){
                $phase5_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                $run_phase5_AP = mysqli_query($conn,$phase5_AP);
                if(mysqli_num_rows($run_phase5_AP) > 0){
                    $rows = mysqli_fetch_array($run_phase5_AP);
                    while(mysqli_fetch_array($run_phase5_AP));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
    
                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td> ';
                
                }
    
    
            }

}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 4;
     // phase 5 term 4 ap
     if($phase5_subject_id == 6 ){
        $phase5_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
        $run_phase5_AP = mysqli_query($conn,$phase5_AP);
        if(mysqli_num_rows($run_phase5_AP) > 0){
            $rows = mysqli_fetch_array($run_phase5_AP);
            while(mysqli_fetch_array($run_phase5_AP));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }


            $html.='
            <td class="text-center"> '.$rows['grade'].'</td> ';
        
        }


    }
}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    // phase 5 final rating ap
if($phase5_subject_id == 6 ){
    $phase5_AP = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5'";
    $run_phase5_AP = mysqli_query($conn,$phase5_AP);
    if(mysqli_num_rows($run_phase5_AP) > 0){
        $rows = mysqli_fetch_array($run_phase5_AP);
        while(mysqli_fetch_array($run_phase5_AP));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
        ';
    
    }


}
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 1;
    
            // phase 5 term 1 EPP_TLE
            if($phase5_subject_id == 7 ){
                $phase5_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                $run_phase5_ep_tle = mysqli_query($conn,$phase5_epp_tle);
                if(mysqli_num_rows($run_phase5_ep_tle) > 0){
                    $rows = mysqli_fetch_array($run_phase5_ep_tle);
                    while(mysqli_fetch_array($run_phase5_ep_tle));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        

                    $html.='
                    <tr>
                    <td class="subject">EPP/TLE</td>
                    <td class="text-center"> '.$rows['grade'].'</td>
                 ';
                
                }


            }

}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 2;
    
            // phase 5 term 2 EPP_TLE
            if($phase5_subject_id == 7 ){
                $phase5_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                $run_phase5_ep_tle = mysqli_query($conn,$phase5_epp_tle);
                if(mysqli_num_rows($run_phase5_ep_tle) > 0){
                    $rows = mysqli_fetch_array($run_phase5_ep_tle);
                    while(mysqli_fetch_array($run_phase5_ep_tle));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        
        

                    $html.='
                    <td> '.$rows['grade'].'</td>  ';
                
                }


            }
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 3;
    // phase 5 term 3 EPP_TLE
    if($phase5_subject_id == 7 ){
        $phase5_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
        $run_phase5_ep_tle = mysqli_query($conn,$phase5_epp_tle);
        if(mysqli_num_rows($run_phase5_ep_tle) > 0){
            $rows = mysqli_fetch_array($run_phase5_ep_tle);
            while(mysqli_fetch_array($run_phase5_ep_tle));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

            $html.='
            <td class="text-center"> '.$rows['grade'].'</td> ';
        
        }


    }


}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 4;
    // phase 5 term 4 EPP_TLE
    if($phase5_subject_id == 7 ){
        $phase5_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
        $run_phase5_ep_tle = mysqli_query($conn,$phase5_epp_tle);
        if(mysqli_num_rows($run_phase5_ep_tle) > 0){
            $rows = mysqli_fetch_array($run_phase5_ep_tle);
            while(mysqli_fetch_array($run_phase5_ep_tle));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }


            $html.='
            <td class="text-center"> '.$rows['grade'].'</td> ';
        
        }


    }


}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
// phase 5 final rating EPP_TLE
if($phase5_subject_id == 7 ){
    $phase5_epp_tle = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5'";
    $run_phase5_ep_tle = mysqli_query($conn,$phase5_epp_tle);
    if(mysqli_num_rows($run_phase5_ep_tle) > 0){
        $rows = mysqli_fetch_array($run_phase5_ep_tle);
        while(mysqli_fetch_array($run_phase5_ep_tle));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
         ';
    
    }


}
}




for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 1;
    

            // phase 5 term 1 MAPEH
            if($phase5_subject_id == 8 ){
                $phase5_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                $run_phase5_mapeh = mysqli_query($conn,$phase5_mapeh);
                if(mysqli_num_rows($run_phase5_mapeh) > 0){
                    $rows = mysqli_fetch_array($run_phase5_mapeh);
                    while(mysqli_fetch_array($run_phase5_mapeh));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        

                    $html.='
                    <tr>
                    <td class="mapeh">MAPEH</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                     ';
                
                }


            }
            
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 2;
    
            // phase 5 term 2 MAPEH
            if($phase5_subject_id == 8 ){
                $phase5_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                $run_phase5_mapeh = mysqli_query($conn,$phase5_mapeh);
                if(mysqli_num_rows($run_phase5_mapeh) > 0){
                    $rows = mysqli_fetch_array($run_phase5_mapeh);
                    while(mysqli_fetch_array($run_phase5_mapeh));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        
        

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td> ';
                
                }


            }
    
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 3;
    
        // phase 5 term 3 MAPEH
        if($phase5_subject_id == 8 ){
            $phase5_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
            $run_phase5_mapeh = mysqli_query($conn,$phase5_mapeh);
            if(mysqli_num_rows($run_phase5_mapeh) > 0){
                $rows = mysqli_fetch_array($run_phase5_mapeh);
                while(mysqli_fetch_array($run_phase5_mapeh));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td> ';
            
            }


        }
        

}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 4;
    
        // phase 5 term 4 MAPEH
        if($phase5_subject_id == 8 ){
            $phase5_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
            $run_phase5_mapeh = mysqli_query($conn,$phase5_mapeh);
            if(mysqli_num_rows($run_phase5_mapeh) > 0){
                $rows = mysqli_fetch_array($run_phase5_mapeh);
                while(mysqli_fetch_array($run_phase5_mapeh));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }
    

                $html.='
                <td class="text-center">'.$rows['grade'].'</td> ';
            
            }


        }

}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {



// phase 5 final rating MAPEH
if($phase5_subject_id == 8 ){
    $phase5_mapeh = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5'";
    $run_phase5_mapeh = mysqli_query($conn,$phase5_mapeh);
    if(mysqli_num_rows($run_phase5_mapeh) > 0){
        $rows = mysqli_fetch_array($run_phase5_mapeh);
        while(mysqli_fetch_array($run_phase5_mapeh));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
       ';
    
    }


}

}



for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 1;
    

                // phase 5 term 1 music
                if($phase5_subject_id == 9 ){
                    $phase5_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                    $run_phase5_music = mysqli_query($conn,$phase5_music);
                    if(mysqli_num_rows($run_phase5_music) > 0){
                        $rows = mysqli_fetch_array($run_phase5_music);
                        while(mysqli_fetch_array($run_phase5_music));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
            
    
                        $html.='
                        <tr>
                        <td class="small-pad-left italic">Music</td>
                        <td class="text-center"> '.$rows['grade'].'</td>
                       ';
                    
                    }
    
    
                }
    
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 2;
            
    // phase 5 term 2 music
if($phase5_subject_id == 9 ){
    $phase5_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
    $run_phase5_music = mysqli_query($conn,$phase5_music);
    if(mysqli_num_rows($run_phase5_music) > 0){
        $rows = mysqli_fetch_array($run_phase5_music);
        while(mysqli_fetch_array($run_phase5_music));

        if($rows['grade'] == 0 ){
            $rows['grade'] = " ";
            }



        $html.='
        <td class="text-center"> '.$rows['grade'].'</td>';
    
    }


}
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 3;
    // phase 5 term 3 music
if($phase5_subject_id == 9 ){
    $phase5_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
    $run_phase5_music = mysqli_query($conn,$phase5_music);
    if(mysqli_num_rows($run_phase5_music) > 0){
        $rows = mysqli_fetch_array($run_phase5_music);
        while(mysqli_fetch_array($run_phase5_music));

        if($rows['grade'] == 0 ){
            $rows['grade'] = " ";
            }

        $html.='
        <td class="text-center" > '.$rows['grade'].'</td>';
    
    }


}
    

}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 4;  
    // phase 5 term 4 music
if($phase5_subject_id == 9 ){
    $phase5_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
    $run_phase5_music = mysqli_query($conn,$phase5_music);
    if(mysqli_num_rows($run_phase5_music) > 0){
        $rows = mysqli_fetch_array($run_phase5_music);
        while(mysqli_fetch_array($run_phase5_music));

        if($rows['grade'] == 0 ){
            $rows['grade'] = " ";
            }


        $html.='
        <td class="text-center"> '.$rows['grade'].'</td>';
    
    }


}

}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {


    // phase 5 final rating music
    if($phase5_subject_id == 9 ){
        $phase5_music = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5'";
        $run_phase5_music = mysqli_query($conn,$phase5_music);
        if(mysqli_num_rows($run_phase5_music) > 0){
            $rows = mysqli_fetch_array($run_phase5_music);
            while(mysqli_fetch_array($run_phase5_music));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
                $rows['remarks'] = " ";
               }
    
            $html.='
            <td class="text-center">'.$rows['final_rating'].'</td>
            <td class="insert-remarks text-center"> '.$rows['remarks'].'</td>
            </tr>
           ';
        
        }
    
    
    }
}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 1;

    // phase 5 term 1 arts
if($phase5_subject_id == 10 ){
$phase5_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
$run_phase5_arts = mysqli_query($conn,$phase5_arts);
if(mysqli_num_rows($run_phase5_arts) > 0){
    $rows = mysqli_fetch_array($run_phase5_arts);
    while(mysqli_fetch_array($run_phase5_arts));

    if($rows['grade'] == 0 ){
        $rows['grade'] = " ";
        }


    $html.='
    <tr>
    <td class="small-pad-left italic">Arts</td>
    <td class="text-center">'.$rows['grade'].'</td>
    ';

}


}
    
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 2;
               // phase 5 term 2 arts
               if($phase5_subject_id == 10 ){
                $phase5_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                $run_phase5_arts = mysqli_query($conn,$phase5_arts);
                if(mysqli_num_rows($run_phase5_arts) > 0){
                    $rows = mysqli_fetch_array($run_phase5_arts);
                    while(mysqli_fetch_array($run_phase5_arts));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        
        

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td> ';
                
                }


            }
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 3;
                  // phase 5 term 3 arts
                  if($phase5_subject_id == 10 ){
                    $phase5_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                    $run_phase5_arts = mysqli_query($conn,$phase5_arts);
                    if(mysqli_num_rows($run_phase5_arts) > 0){
                        $rows = mysqli_fetch_array($run_phase5_arts);
                        while(mysqli_fetch_array($run_phase5_arts));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
        
                        $html.='
                        <td class="text-center">'.$rows['grade'].'</td> ';
                    
                    }
        
        
                }
        

}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 4;

                // phase 5 term 4 arts
                if($phase5_subject_id == 10 ){
                    $phase5_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                    $run_phase5_arts = mysqli_query($conn,$phase5_arts);
                    if(mysqli_num_rows($run_phase5_arts) > 0){
                        $rows = mysqli_fetch_array($run_phase5_arts);
                        while(mysqli_fetch_array($run_phase5_arts));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
            
        
                        $html.='
                        <td class="text-center">'.$rows['grade'].'</td>  ';
                    
                    }
        
        
                }
        
        
}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {


        // phase 5 final rating arts
        if($phase5_subject_id == 10 ){
            $phase5_arts = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5'";
            $run_phase5_arts = mysqli_query($conn,$phase5_arts);
            if(mysqli_num_rows($run_phase5_arts) > 0){
                $rows = mysqli_fetch_array($run_phase5_arts);
                while(mysqli_fetch_array($run_phase5_arts));

                if($rows['final_rating'] == 0 ){
                    $rows['final_rating'] = " ";
                    $rows['remarks'] = " ";
                   }
        
                $html.='<td class="text-center">'.$rows['final_rating'].' </td>
                <td class="text-center">'.$rows['remarks'].'</td>
                </tr>
                ';
            
            }
        
        
        }
        
}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 1;
    

            // phase 5 term 1 PE
            if($phase5_subject_id == 11 ){
                $phase5_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                $run_phase5_pe = mysqli_query($conn,$phase5_pe);
                if(mysqli_num_rows($run_phase5_pe) > 0){
                    $rows = mysqli_fetch_array($run_phase5_pe);
                    while(mysqli_fetch_array($run_phase5_pe));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        

                    $html.='
                    <tr>
                    <td class="small-pad-left italic">Physical Education</td>
                    <td class="text-center">'.$rows['grade'].' </td>
                    ';
                
                }


            }
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 2;
    // phase 5 term 2 PE
    if($phase5_subject_id == 11 ){
        $phase5_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
        $run_phase5_pe = mysqli_query($conn,$phase5_pe);
        if(mysqli_num_rows($run_phase5_pe) > 0){
            $rows = mysqli_fetch_array($run_phase5_pe);
            while(mysqli_fetch_array($run_phase5_pe));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }



            $html.='
            <td class="text-center">'.$rows['grade'].' </td> ';
        
        }


    }
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 3;
    // phase 5 term 3 PE
    if($phase5_subject_id == 11 ){
        $phase5_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
        $run_phase5_pe = mysqli_query($conn,$phase5_pe);
        if(mysqli_num_rows($run_phase5_pe) > 0){
            $rows = mysqli_fetch_array($run_phase5_pe);
            while(mysqli_fetch_array($run_phase5_pe));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

            $html.='
            <td class="text-center">'.$rows['grade'].' </td>  ';
        
        }


    }


}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 4;
         // phase 5 term 4 PE
         if($phase5_subject_id == 11 ){
            $phase5_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
            $run_phase5_pe = mysqli_query($conn,$phase5_pe);
            if(mysqli_num_rows($run_phase5_pe) > 0){
                $rows = mysqli_fetch_array($run_phase5_pe);
                while(mysqli_fetch_array($run_phase5_pe));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }
    

                $html.='
                <td class="text-center">'.$rows['grade'].' </td>  ';
            
            }


        }

}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {

// phase 5 final rating PE
if($phase5_subject_id == 11 ){
    $phase5_pe = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5'";
    $run_phase5_pe = mysqli_query($conn,$phase5_pe);
    if(mysqli_num_rows($run_phase5_pe) > 0){
        $rows = mysqli_fetch_array($run_phase5_pe);
        while(mysqli_fetch_array($run_phase5_pe));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center"> '.$rows['final_rating'].'</td>
        <td class="insert-remarks text-center"> '.$rows['remarks'].'</td>
        </tr>
         ';
    
    }


}

}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 1;
    // phase 5 term 1 Health
    if($phase5_subject_id == 12 ){
        $phase5_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
        $run_phase5_health = mysqli_query($conn,$phase5_health);
        if(mysqli_num_rows($run_phase5_health) > 0){
            $rows = mysqli_fetch_array($run_phase5_health);
            while(mysqli_fetch_array($run_phase5_health));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }


            $html.='
            <tr>
            <td class="small-pad-left italic">Health</td>
            <td class="text-center">'.$rows['grade'].'</td>
                ';
        
        }


    }
    
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 2;
    
            // phase 5 term 2 Health
            if($phase5_subject_id == 12 ){
                $phase5_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                $run_phase5_health = mysqli_query($conn,$phase5_health);
                if(mysqli_num_rows($run_phase5_health) > 0){
                    $rows = mysqli_fetch_array($run_phase5_health);
                    while(mysqli_fetch_array($run_phase5_health));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        
        

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }


            }
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 3;


        // phase 5 term 3 Health
        if($phase5_subject_id == 12 ){
            $phase5_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
            $run_phase5_health = mysqli_query($conn,$phase5_health);
            if(mysqli_num_rows($run_phase5_health) > 0){
                $rows = mysqli_fetch_array($run_phase5_health);
                while(mysqli_fetch_array($run_phase5_health));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td> ';
            
            }


        }
}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 4;
   // phase 5 term 4 Health
   if($phase5_subject_id == 12 ){
    $phase5_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
    $run_phase5_health = mysqli_query($conn,$phase5_health);
    if(mysqli_num_rows($run_phase5_health) > 0){
        $rows = mysqli_fetch_array($run_phase5_health);
        while(mysqli_fetch_array($run_phase5_health));

        if($rows['grade'] == 0 ){
            $rows['grade'] = " ";
            }


        $html.='
        <td class="text-center">'.$rows['grade'].'</td>  ';
    
    }


}

}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {

// phase 5 final rating Health
if($phase5_subject_id == 12 ){
    $phase5_health = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5'";
    $run_phase5_health = mysqli_query($conn,$phase5_health);
    if(mysqli_num_rows($run_phase5_health) > 0){
        $rows = mysqli_fetch_array($run_phase5_health);
        while(mysqli_fetch_array($run_phase5_health));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
        ';
    
    }


}
}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 1;



            // phase 5 term 1 eduk sa pag papakatao
            if($phase5_subject_id == 13 ){
                $phase5_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                $run_phase5_esp = mysqli_query($conn,$phase5_esp);
                if(mysqli_num_rows($run_phase5_esp) > 0){
                    $rows = mysqli_fetch_array($run_phase5_esp);
                    while(mysqli_fetch_array($run_phase5_esp));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        

                    $html.='
                    <tr>
                    <td class="subject">Eduk. Sa Pagpapakatao</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                ';
                
                }


            }
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 2;
    

            

            // phase 5 term 2 eduk sa pag papakatao
            if($phase5_subject_id == 13 ){
                $phase5_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                $run_phase5_esp = mysqli_query($conn,$phase5_esp);
                if(mysqli_num_rows($run_phase5_esp) > 0){
                    $rows = mysqli_fetch_array($run_phase5_esp);
                    while(mysqli_fetch_array($run_phase5_esp));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        
        

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }


            }
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 3;

        // phase 5 term 3 eduk sa pag papakatao
        if($phase5_subject_id == 13 ){
            $phase5_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
            $run_phase5_esp = mysqli_query($conn,$phase5_esp);
            if(mysqli_num_rows($run_phase5_esp) > 0){
                $rows = mysqli_fetch_array($run_phase5_esp);
                while(mysqli_fetch_array($run_phase5_esp));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td> ';
            
            }


        }
}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 4;

        // phase 5 term 4 eduk sa pag papakatao
        if($phase5_subject_id == 13 ){
            $phase5_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
            $run_phase5_esp = mysqli_query($conn,$phase5_esp);
            if(mysqli_num_rows($run_phase5_esp) > 0){
                $rows = mysqli_fetch_array($run_phase5_esp);
                while(mysqli_fetch_array($run_phase5_esp));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }
    

                $html.='
                <td class="text-center">'.$rows['grade'].'</td> ';
            
            }


        }
}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {

// phase 5 final rating eduk sa pag papakatao
if($phase5_subject_id == 13 ){
    $phase5_esp = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5'";
    $run_phase5_esp = mysqli_query($conn,$phase5_esp);
    if(mysqli_num_rows($run_phase5_esp) > 0){
        $rows = mysqli_fetch_array($run_phase5_esp);
        while(mysqli_fetch_array($run_phase5_esp));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center"> '.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr> ';
    
    }


}
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 1;
    
            // phase 5 term 1 arabic
            if($phase5_subject_id == 14 ){
                $phase5_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                $run_phase5_arabic = mysqli_query($conn,$phase5_arabic);
                if(mysqli_num_rows($run_phase5_arabic) > 0){
                    $rows = mysqli_fetch_array($run_phase5_arabic);
                    while(mysqli_fetch_array($run_phase5_arabic));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        

                    $html.='
                    <tr>
                    <td class="small-pad-left">*Arabic language</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                   ';
                
                }


            }

}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 2;
    
            // phase 5 term 2 arabic
            if($phase5_subject_id == 14 ){
                $phase5_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                $run_phase5_arabic = mysqli_query($conn,$phase5_arabic);
                if(mysqli_num_rows($run_phase5_arabic) > 0){
                    $rows = mysqli_fetch_array($run_phase5_arabic);
                    while(mysqli_fetch_array($run_phase5_arabic));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        
        

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }


            }
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 3;


        // phase 5 term 3 arabic
        if($phase5_subject_id == 14 ){
            $phase5_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
            $run_phase5_arabic = mysqli_query($conn,$phase5_arabic);
            if(mysqli_num_rows($run_phase5_arabic) > 0){
                $rows = mysqli_fetch_array($run_phase5_arabic);
                while(mysqli_fetch_array($run_phase5_arabic));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td>  ';
            
            }


        }
}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 4;

        // phase 5 term 4 arabic
        if($phase5_subject_id == 14 ){
            $phase5_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
            $run_phase5_arabic = mysqli_query($conn,$phase5_arabic);
            if(mysqli_num_rows($run_phase5_arabic) > 0){
                $rows = mysqli_fetch_array($run_phase5_arabic);
                while(mysqli_fetch_array($run_phase5_arabic));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }
    

                $html.='
                <td class="text-center">'.$rows['grade'].'</td>  ';
            
            }


        }
}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {


// phase 5 final rating arabic
if($phase5_subject_id == 14 ){
    $phase5_arabic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5'";
    $run_phase5_arabic = mysqli_query($conn,$phase5_arabic);
    if(mysqli_num_rows($run_phase5_arabic) > 0){
        $rows = mysqli_fetch_array($run_phase5_arabic);
        while(mysqli_fetch_array($run_phase5_arabic));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center"> '.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
       ';
    
    }


}
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 1;
    
            
            // phase 5 term 1 islamic
            if($phase5_subject_id == 15 ){
                $phase5_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                $run_phase5_islamic = mysqli_query($conn,$phase5_islamic);
                if(mysqli_num_rows($run_phase5_islamic) > 0){
                    $rows = mysqli_fetch_array($run_phase5_islamic);
                    while(mysqli_fetch_array($run_phase5_islamic));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        

                    $html.='
                    <tr>
                    <td class="small-pad-left">*Islamic values Education</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                  ';
                
                }


            }
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 2;
    

            
            // phase 5 term 2 islamic
            if($phase5_subject_id == 15 ){
                $phase5_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
                $run_phase5_islamic = mysqli_query($conn,$phase5_islamic);
                if(mysqli_num_rows($run_phase5_islamic) > 0){
                    $rows = mysqli_fetch_array($run_phase5_islamic);
                    while(mysqli_fetch_array($run_phase5_islamic));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        
        

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }


            }

}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 3;
 
        // phase 5 term 3 islamic
        if($phase5_subject_id == 15 ){
            $phase5_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
            $run_phase5_islamic = mysqli_query($conn,$phase5_islamic);
            if(mysqli_num_rows($run_phase5_islamic) > 0){
                $rows = mysqli_fetch_array($run_phase5_islamic);
                while(mysqli_fetch_array($run_phase5_islamic));

                if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td>  ';
                
            
            }


        }
}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 4;
        // phase 5 term 4 islamic
        if($phase5_subject_id == 15 ){
            $phase5_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5' AND term = '$term'";
            $run_phase5_islamic = mysqli_query($conn,$phase5_islamic);
            if(mysqli_num_rows($run_phase5_islamic) > 0){
                $rows = mysqli_fetch_array($run_phase5_islamic);
                while(mysqli_fetch_array($run_phase5_islamic));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }
    

                $html.='
                <td class="text-center">'.$rows['grade'].'</td> ';
            
            }


        }


}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {

// phase 5 final rating islamic
if($phase5_subject_id == 15 ){
    $phase5_islamic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase5_subject_id' AND phase = '$phase5'";
    $run_phase5_islamic = mysqli_query($conn,$phase5_islamic);
    if(mysqli_num_rows($run_phase5_islamic) > 0){
        $rows = mysqli_fetch_array($run_phase5_islamic);
        while(mysqli_fetch_array($run_phase5_islamic));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center"> '.$rows['final_rating'].'</td>
        <td class="text-center"> '.$rows['remarks'].' </td>
        </tr>
       ';
    
    }


}
}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 1;
    


            //phase 5 term 1 general average
            if( $phase5_subject_id == 16){
                $phase5_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase5' ";
                $run_phase5_term1_general_average = mysqli_query($conn,$phase5_term1_general_average_query);
                if(mysqli_num_rows($run_phase5_term1_general_average)> 0 ){
                    $rows = mysqli_fetch_array($run_phase5_term1_general_average);

                    if($rows['general_average'] == 0 ){
                        $rows['general_average'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="subject">General average</td>
                    <td class="text-center"> '.$rows['general_average'].'</td>
                    ';
                


                }
                


            }
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 2;
    

            //phase 5 term 2 general average
            if( $phase5_subject_id == 16){
                $phase5_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase5' ";
                $run_phase5_term1_general_average = mysqli_query($conn,$phase5_term1_general_average_query);
                if(mysqli_num_rows($run_phase5_term1_general_average)> 0 ){
                    $rows = mysqli_fetch_array($run_phase5_term1_general_average);

                    if($rows['general_average'] == 0 ){
                        $rows['general_average'] = " ";
                        }

                    $html.='
                    <td class="text-center"> '.$rows['general_average'].'</td> ';
                


                }
                


            }
}

for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 3;

        //phase 5 term 3 general average
        if( $phase5_subject_id == 16){
            $phase5_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase5' ";
            $run_phase5_term1_general_average = mysqli_query($conn,$phase5_term1_general_average_query);
            if(mysqli_num_rows($run_phase5_term1_general_average)> 0 ){
                $rows = mysqli_fetch_array($run_phase5_term1_general_average);

                if($rows['general_average'] == 0 ){
                    $rows['general_average'] = " ";
                    }
                $html.='
                <td class="text-center"> '.$rows['general_average'].'</td>';
            


            }
            


        }
}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {
    
    
    $term = 4;

        //phase 5 term 4 general average
        if( $phase5_subject_id == 16){
            $phase5_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase5' ";
            $run_phase5_term1_general_average = mysqli_query($conn,$phase5_term1_general_average_query);
            if(mysqli_num_rows($run_phase5_term1_general_average)> 0 ){
                $rows = mysqli_fetch_array($run_phase5_term1_general_average);

                if($rows['general_average'] == 0 ){
                    $rows['general_average'] = " ";
                    }
                $html.='
                <td class="text-center"> '.$rows['general_average'].'</td>  ';
            


            }
            


        }
}


for ($phase5_subject_id = 1; $phase5_subject_id <= 16 ; $phase5_subject_id++) {

//phase 5 final rating general average
if( $phase5_subject_id == 16){
    $phase5_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND  phase = '$phase5' AND term = 'Final Rating' ";
    $run_phase5_term1_general_average = mysqli_query($conn,$phase5_term1_general_average_query);
    if(mysqli_num_rows($run_phase5_term1_general_average)> 0 ){
        $rows = mysqli_fetch_array($run_phase5_term1_general_average);

        if($rows['general_average'] == 0 ){
            $rows['general_average'] = " ";
            }


            //phase 5 remarks
            $sql_total_remarks_phase1 = "SELECT final_rating, final_rating, COUNT(remarks) AS 'total_remarks' , lrn FROM student_final_ratings 
            WHERE phase = '5' AND lrn = '$decrypted_lrn' AND remarks= 'FAILED' ";
            $run_total_remarks_phase1 = mysqli_query($conn,$sql_total_remarks_phase1);

            $remarks = mysqli_fetch_array($run_total_remarks_phase1);

            if($remarks['total_remarks'] == 15){
                $output = "";
              }else if($remarks['total_remarks'] >= 3){
                $output = "RETAINED";
              }else if ($remarks['total_remarks'] == 2){
                $output = "REMEDIAL";
              }else if($remarks['total_remarks'] <= 1){
                $output = "PROMOTED";
              }

        $html.='
        <td class="text-center"> '.$rows['general_average'].'</td>
        <td class="text-center">'.$output.'</td>
       
        </tr>
        ';
    
        //count


    }
    


}
}

$html.='
</tbody>
</table>
';


// ending of for loop end of phase 5  

/// remedial  here 
for($phase5_remedial_term = 1; $phase5_remedial_term <=2; $phase5_remedial_term++){

    if($phase5_remedial_term == 1 ){

        $phase5_remedial_query = " SELECT * FROM `remedial_classes` WHERE lrn ='$decrypted_lrn'AND phase = '$phase5' AND term = '$phase5_remedial_term' ";
        $phase5_run_query = mysqli_query($conn,$phase5_remedial_query);
        if(mysqli_num_rows($phase5_run_query)> 0 ){
            $rows = mysqli_fetch_array($phase5_run_query);
            while(mysqli_fetch_array($phase5_run_query));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
               }

               if($rows['recomputed_final_grade'] == 0 ){
                $rows['recomputed_final_grade'] = " ";
               }

               if($rows['date_from'] == "1970-01-01" || $rows['date_from'] == "0000-00-00"){
                $rows['date_from'] = "";
            }

            if($rows['date_to'] == "1970-01-01" || $rows['date_to'] == "0000-00-00"){
             $rows['date_to'] = "";
            }

            $html.='
            <table style="margin-top:4px;">
                <thead>
                    <tr class="remedial">
                        <th colspan="2">Remedial Classes</th>
                        <th colspan="2" class="text-start" style="border-right: none;"> Date Conducted: '.$rows['date_from'].'</th>
                        <th colspan="2" class="text-start" style="border-left: none;">To: '.$rows['date_to'].'</th>
                    </tr>
                    <tr class="arial-header text-center">
                        <td colspan="2">Learning Areas</td>
                        <td>Final Rating</td>
                        <td>Remedial Class <br> Mark</td>
                        <td>Recomputed <br> Final Grade</td>
                        <td>Remarks</td>
                    </tr>
                </thead>
                <tbody>
                <tr >
                    <td colspan="2" class="remedial-2 text-center">'.$rows['learning_areas'].'</td>
                    <td class="remedial-2 text-center">'.$rows['final_rating'].'</td>
                    <td class="remedial-2 text-center">'.$rows['remarks'].'</td>
                    <td class="remedial-2 text-center">'.$rows['recomputed_final_grade'].'</td>
                    <td class="remedial-2 text-center">'.$rows['remedial_class_mark'].'</td>
                </tr>
            ';
        }
        //last 5
        
    }

            // term 2
        if($phase5_remedial_term == 2 ){

            $phase5_remedial_query = " SELECT * FROM `remedial_classes` WHERE lrn ='$decrypted_lrn'AND phase = '$phase5' AND term = '$phase5_remedial_term' ";
        $phase5_run_query = mysqli_query($conn,$phase5_remedial_query);
        if(mysqli_num_rows($phase5_run_query)> 0 ){
            $rows = mysqli_fetch_array($phase5_run_query);
            while(mysqli_fetch_array($phase5_run_query));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
               }

               if($rows['recomputed_final_grade'] == 0 ){
                $rows['recomputed_final_grade'] = " ";
               }
            $html.='
                    <tr >
                        <td colspan="2" class="remedial-2 text-center">'.$rows['learning_areas'].'</td>
                        <td class="remedial-2 text-center">'.$rows['final_rating'].'</td>
                        <td class="remedial-2 text-center">'.$rows['remarks'].'</td>
                        <td class="remedial-2 text-center">'.$rows['remedial_class_mark'].'</td>
                        <td class="remedial-2 text-center">'.$rows['recomputed_final_grade'].'</td>
                    </tr>
                </tbody>
            </table>   
        </td>
        <td style="width:.8em; border:none;">
        </td>
           ';
        }

        }

    
}// end of remedial phase 5 



//start of phase 6 
// scholastic records phase 6 
// phase 6 scohlastic query 

$phase6_scholastic_query = "SELECT * FROM `scholastic_records` WHERE lrn = '$decrypted_lrn' AND phase = $phase6";
$run_phase6_scholastic = mysqli_query($conn,$phase6_scholastic_query);
if(mysqli_num_rows($run_phase6_scholastic) > 0){
    $rows = mysqli_fetch_array($run_phase6_scholastic);

    while(mysqli_fetch_array($run_phase6_scholastic));


    $html.='
    <td class="phase_6" style="width: 48%;  border:none;">
    <table class="phase_head">
        <tr>
            <td colspan="6"><span class="main-arial-text">School: <span style="font-weight: bold;">'.$rows['school'].'</span></span></td>
            <td colspan="6" style="text-align: right;><span class="main-arial-text">School ID: <span style="font-weight: bold;">'.$rows['school_id'].'</span></span></td>
        </tr>
        <tr>
            <td colspan="4"><span class="main-arial-text">District: <span style="font-weight: bold;">'.$rows['district'].'</span></span></td>
            <td colspan="4" style="text-align: center;"><span class="main-arial-text">Division: <span style="font-weight: bold;">'.$rows['division'].'</span></span></td>
            <td colspan="4" style="text-align: right;"><span class="main-arial-text">Region: <span style="font-weight: bold;">'.$rows['region'].'</span></span></td>
        </tr>
        <tr>
            <td colspan="3"><span class="main-arial-text">Classified as Grade: <span style="font-weight: bold;">'.$rows['classified_as_grade'].'</span></span></td>
            <td colspan="5" style="text-align: center;"><span class="main-arial-text" >Section: <span style="font-weight: bold;">'.$rows['section'].'</span></span></td>
            <td colspan="4" style="text-align: right;"><span class="main-arial-text">School year: <span style="font-weight: bold;">'.$rows['school_year'].'-2012</span></span></td>
        </tr>
        <tr>
            <td colspan="6"><span class="main-arial-text">Name of adviser: <span style="font-weight: bold;">'.$rows['name_of_teacher'].'</span></span></td>
            <td colspan="6" style="text-align: right;"><span class="main-arial-text">Signature:<span style="font-weight: bold;">'.$rows['signature'].'</span></span></td>
        </tr>
    </table>
';

}


$html.='
        <table>
            <thead>
                <tr>
                    <th rowspan="2">Learning Areas</th>
                    <th class="quarterly" colspan="4">Quarterly Rating</th>
                    <th colspan="1" class="final-rating" rowspan="2" >Final <br> Rating</th>
                    <th rowspan="2">Remarks</th>
                </tr>
                <tr class="quarter">
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                </tr>
            </thead>    
            <tbody> 
        


';

//phase 6 term 1 

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 1;
    if($phase6_subject_id == 1){
        
            //phase 1 term 1 mother tongue 
    $phase6_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
    $run_phase6_mt = mysqli_query($conn,$phase6_mt);
    if(mysqli_num_rows($run_phase6_mt) > 0){
        $rows = mysqli_fetch_array($run_phase6_mt);
        while(mysqli_fetch_array($run_phase6_mt));

        if($rows['grade'] == 0 ){
            $rows['grade'] = " ";
            }


            $html.=' 
            <tr>
            <td class="subject">Mother Tongue</td>
            <td class="text-center"> '.$rows['grade'].'</td>
            
            ';
        
        }
    }

    }

   
// phase 6 term 2 ////////////////////////////////////////////////

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 2;
    

    if($phase6_subject_id == 1){
        
        //phase 1 term 2 mother tongue 
$phase6_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
$run_phase6_mt = mysqli_query($conn,$phase6_mt);
if(mysqli_num_rows($run_phase6_mt) > 0){
    $rows = mysqli_fetch_array($run_phase6_mt);
    while(mysqli_fetch_array($run_phase6_mt));

    if($rows['grade'] == 0 ){
        $rows['grade'] = " ";
        }

        $html.=' 
        <td class="text-center"> '.$rows['grade'].'</td> ';
    
    }
}


}


for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 3;

    
    if($phase6_subject_id == 1){
    
        //phase 1 term 3 mother tongue 
$phase6_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
$run_phase6_mt = mysqli_query($conn,$phase6_mt);
if(mysqli_num_rows($run_phase6_mt) > 0){
    $rows = mysqli_fetch_array($run_phase6_mt);
    while(mysqli_fetch_array($run_phase6_mt));
    

    if($rows['grade'] == 0 ){
        $rows['grade'] = " ";
        }

        $html.=' 
        <td class="text-center"> '.$rows['grade'].'</td>  ';
    
    }
}


}



for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 4;

    
    if($phase6_subject_id == 1){
    
        //phase 6 term 4 mother tongue 
$phase6_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
$run_phase6_mt = mysqli_query($conn,$phase6_mt);
if(mysqli_num_rows($run_phase6_mt) > 0){
    $rows = mysqli_fetch_array($run_phase6_mt);
    while(mysqli_fetch_array($run_phase6_mt));

    if($rows['grade'] == 0 ){
        $rows['grade'] = " ";
        }

        $html.=' 
        <td class="text-center"> '.$rows['grade'].'</td>  ';
    
    }
}

}


for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
if($phase6_subject_id == 1){

    //phase 1 final rating mother tongue 
$phase6_mt = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6'";
$run_phase6_mt = mysqli_query($conn,$phase6_mt);
if(mysqli_num_rows($run_phase6_mt) > 0){
$rows = mysqli_fetch_array($run_phase6_mt);
while(mysqli_fetch_array($run_phase6_mt));

if($rows['final_rating'] == 0 ){
    $rows['final_rating'] = " ";
    $rows['remarks'] = " ";
   }

    $html.='
    <td class="text-center"> '.$rows['final_rating'].'</td>
    <td class="text-center">'.$rows['remarks'].'</td>
    </tr>
      ';

}
}
}



//phase 6 term 1 

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 1;
      

            // phase 6 term 1 filipino

            if($phase6_subject_id == 2 ){
                $phase6_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                $run_phase6_filipino = mysqli_query($conn,$phase6_filipino);
                if(mysqli_num_rows($run_phase6_filipino) > 0){
                    $rows = mysqli_fetch_array($run_phase6_filipino);
                    while(mysqli_fetch_array($run_phase6_filipino));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        

                        $html.='
                        <tr>
                        <td class="subject">Filipino</td>
                        <td class="text-center">'.$rows['grade'].' </td>
                      ';
                    
                    }

            
                }


}


// phase 6 term 2 ////////////////////////////////////////////////

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 2;
    
            //phase 1 term 2 filipino

            if($phase6_subject_id == 2 ){
                $phase6_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                $run_phase6_filipino = mysqli_query($conn,$phase6_filipino);
                if(mysqli_num_rows($run_phase6_filipino) > 0){
                    $rows = mysqli_fetch_array($run_phase6_filipino);
                    while(mysqli_fetch_array($run_phase6_filipino));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                        $html.='
                        <td class="text-center">'.$rows['grade'].' </td>  ';
                    
                    }

            
                }

}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 3;

    
        //phase 1 term 3 filipino

        if($phase6_subject_id == 2 ){
            $phase6_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
            $run_phase6_filipino = mysqli_query($conn,$phase6_filipino);
            if(mysqli_num_rows($run_phase6_filipino) > 0){
                $rows = mysqli_fetch_array($run_phase6_filipino);
                while(mysqli_fetch_array($run_phase6_filipino));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows['grade'].' </td>  ';
                
                }

        
            }

}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    $term = 4;

    
        //phase 6 term 4 filipino

        if($phase6_subject_id == 2 ){
            $phase6_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
            $run_phase6_filipino = mysqli_query($conn,$phase6_filipino);
            if(mysqli_num_rows($run_phase6_filipino) > 0){
                $rows = mysqli_fetch_array($run_phase6_filipino);
                while(mysqli_fetch_array($run_phase6_filipino));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows['grade'].' </td>  ';
                
                }

        
            }

}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {

//phase 1 final rating filipino

if($phase6_subject_id == 2 ){
    $phase6_filipino = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6'";
    $run_phase6_filipino = mysqli_query($conn,$phase6_filipino);
    if(mysqli_num_rows($run_phase6_filipino) > 0){
        $rows = mysqli_fetch_array($run_phase6_filipino);
        while(mysqli_fetch_array($run_phase6_filipino));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

            $html.='
            <td class="text-center"> '.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].' </td>
            </tr>
             ';
        
        }


    }

}



//phase 6 term 1 

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 1;
         // phase 6 term 1 english 

         if($phase6_subject_id == 3 ){
            $phase6_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
            $run_phase6_english = mysqli_query($conn,$phase6_english);
            if(mysqli_num_rows($run_phase6_english) > 0){
                $rows = mysqli_fetch_array($run_phase6_english);
                while(mysqli_fetch_array($run_phase6_english));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }
    

                    $html.='
                    <tr>
                    <td class="subject">English</td>
                    <td class="text-center"> '.$rows['grade'].'</td>
                 ';
                
                }

        
            }

}


// phase 6 term 2 ////////////////////////////////////////////////

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 2;
    

            // phase 6 term 2 english 

            if($phase6_subject_id == 3 ){
                $phase6_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                $run_phase6_english = mysqli_query($conn,$phase6_english);
                if(mysqli_num_rows($run_phase6_english) > 0){
                    $rows = mysqli_fetch_array($run_phase6_english);
                    while(mysqli_fetch_array($run_phase6_english));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                        $html.='
                        <td class="text-center"> '.$rows['grade'].'</td>  ';
                    
                    }

            
                }


}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 3;
    
        // phase 6 term 3 english 

        if($phase6_subject_id == 3 ){
            $phase6_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
            $run_phase6_english = mysqli_query($conn,$phase6_english);
            if(mysqli_num_rows($run_phase6_english) > 0){
                $rows = mysqli_fetch_array($run_phase6_english);
                while(mysqli_fetch_array($run_phase6_english));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td>  ';
                
                }

        
            }

}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    $term = 4;
    
        // phase 6 term 4 english 

        if($phase6_subject_id == 3 ){
            $phase6_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
            $run_phase6_english = mysqli_query($conn,$phase6_english);
            if(mysqli_num_rows($run_phase6_english) > 0){
                $rows = mysqli_fetch_array($run_phase6_english);
                while(mysqli_fetch_array($run_phase6_english));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td>  ';
                
                }

        
            }

}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
// phase 6 final rating english 

if($phase6_subject_id == 3 ){
    $phase6_english = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6'";
    $run_phase6_english = mysqli_query($conn,$phase6_english);
    if(mysqli_num_rows($run_phase6_english) > 0){
        $rows = mysqli_fetch_array($run_phase6_english);
        while(mysqli_fetch_array($run_phase6_english));


        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }
            $html.='
            <td class="text-center"> '.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].'</td>
            </tr>
              ';
        
        }


    }
}



//phase 6 term 1 

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 1;

         

            // phase 6 term 1 math

            if($phase6_subject_id == 4 ){
                $phase6_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                $run_phase6_math = mysqli_query($conn,$phase6_math);
                if(mysqli_num_rows($run_phase6_math) > 0){
                    $rows = mysqli_fetch_array($run_phase6_math);
                    while(mysqli_fetch_array($run_phase6_math));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        

                        $html.='
                        <tr>
                        <td class="subject">Mathematics</td>
                        <td class="text-center"> '.$rows['grade'].'</td>
                    ';
                    
                    }   

            
                }

}


// phase 6 term 2 ////////////////////////////////////////////////

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 2;
    
    
            // phase 6 term 2 math

            if($phase6_subject_id == 4 ){
                $phase6_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                $run_phase6_math = mysqli_query($conn,$phase6_math);
                if(mysqli_num_rows($run_phase6_math) > 0){
                    $rows = mysqli_fetch_array($run_phase6_math);
                    while(mysqli_fetch_array($run_phase6_math));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                        $html.='

                        <td class="text-center"> '.$rows['grade'].'</td>  ';
                    
                    }   

            
                }

}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 3;
    
        //phase 1 term 3 math

        if($phase6_subject_id == 4 ){
            $phase6_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
            $run_phase6_math = mysqli_query($conn,$phase6_math);
            if(mysqli_num_rows($run_phase6_math) > 0){
                $rows = mysqli_fetch_array($run_phase6_math);
                while(mysqli_fetch_array($run_phase6_math));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td>  ';
                
                }   

        
            }

}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    $term = 4;

    


        //phase 1 term 4 math

        if($phase6_subject_id == 4 ){
            $phase6_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
            $run_phase6_math = mysqli_query($conn,$phase6_math);
            if(mysqli_num_rows($run_phase6_math) > 0){
                $rows = mysqli_fetch_array($run_phase6_math);
                while(mysqli_fetch_array($run_phase6_math));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td> ';
                
                }   

        
            }
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {

// phase 6 final rating math

if($phase6_subject_id == 4 ){
    $phase6_math = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6'";
    $run_phase6_math = mysqli_query($conn,$phase6_math);
    if(mysqli_num_rows($run_phase6_math) > 0){
        $rows = mysqli_fetch_array($run_phase6_math);
        while(mysqli_fetch_array($run_phase6_math));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

            $html.='
            <td class="text-center">'.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].'</td>
            </tr>
            ';
        
        }   


    }

}



//phase 6 term 1 

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 1;
    
                // phase 6 term 1 science

                if($phase6_subject_id == 5 ){
                    $phase6_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                    $run_phase6_science = mysqli_query($conn,$phase6_science);
                    if(mysqli_num_rows($run_phase6_science) > 0){
                        $rows = mysqli_fetch_array($run_phase6_science);
                        while(mysqli_fetch_array($run_phase6_science));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = "";
                            }
            
    
                            $html.='
                            <tr>
                            <td class="subject">Science</td>
                            <td class="text-center">'.$rows['grade'].'</td>
                        ';
                        
                        }
    
                
                    }

}


// phase 6 term 2 ////////////////////////////////////////////////

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 2;

                // phase 6 term 2 science

                if($phase6_subject_id == 5 ){
                    $phase6_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                    $run_phase6_science = mysqli_query($conn,$phase6_science);
                    if(mysqli_num_rows($run_phase6_science) > 0){
                        $rows = mysqli_fetch_array($run_phase6_science);
                        while(mysqli_fetch_array($run_phase6_science));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
    
                            $html.='
                            <td class="text-center"> '.$rows['grade'].'</td>  ';
                        
                        }
    
                
                    }
    
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 3;

            // phase 6 term 3 science

            if($phase6_subject_id == 5 ){
                $phase6_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                $run_phase6_science = mysqli_query($conn,$phase6_science);
                if(mysqli_num_rows($run_phase6_science) > 0){
                    $rows = mysqli_fetch_array($run_phase6_science);
                    while(mysqli_fetch_array($run_phase6_science));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
    
                        $html.='
                        <td class="text-center"> '.$rows['grade'].'</td>  ';
                    
                    }
    
            
                }
    
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    $term = 4;
           // phase 6 term 4 science

           if($phase6_subject_id == 5 ){
            $phase6_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
            $run_phase6_science = mysqli_query($conn,$phase6_science);
            if(mysqli_num_rows($run_phase6_science) > 0){
                $rows = mysqli_fetch_array($run_phase6_science);
                while(mysqli_fetch_array($run_phase6_science));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td>  ';
                
                }

        
            }


}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {



    // phase 6 final rating science

    if($phase6_subject_id == 5 ){
        $phase6_science = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6'";
        $run_phase6_science = mysqli_query($conn,$phase6_science);
        if(mysqli_num_rows($run_phase6_science) > 0){
            $rows = mysqli_fetch_array($run_phase6_science);
            while(mysqli_fetch_array($run_phase6_science));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
                $rows['remarks'] = " ";
               }
    
                $html.='
                <td class="text-center">'.$rows['final_rating'].'</td>
                <td class="insert-remarks text-center"> '.$rows['remarks'].'</td>
                </tr>
                 ';
            
            }
    
    
        }
}
for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 1;
    // phase 6 term 1 ap
    if($phase6_subject_id == 6 ){
        $phase6_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
        $run_phase6_AP = mysqli_query($conn,$phase6_AP);
        if(mysqli_num_rows($run_phase6_AP) > 0){
            $rows = mysqli_fetch_array($run_phase6_AP);
            while(mysqli_fetch_array($run_phase6_AP));

            if($rows['grade'] == 0){
                $rows['grade'] = " ";
                }

            $html.='
            <tr>
            <td class="subject">Araling Panlipunan</td>
            <td class="text-center">'.$rows['grade'].'</td>
            ';
        
        }


    }

}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 2;


                // phase 6 term 2 ap
                if($phase6_subject_id == 6 ){
                    $phase6_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                    $run_phase6_AP = mysqli_query($conn,$phase6_AP);
                    if(mysqli_num_rows($run_phase6_AP) > 0){
                        $rows = mysqli_fetch_array($run_phase6_AP);
                        while(mysqli_fetch_array($run_phase6_AP));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
    
                        $html.='
                        <td class="text-center">'.$rows['grade'].'</td>  ';
                    
                    }
    
    
                }
    
}


for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 3;

            // phase 6 term 3 ap
            if($phase6_subject_id == 6 ){
                $phase6_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                $run_phase6_AP = mysqli_query($conn,$phase6_AP);
                if(mysqli_num_rows($run_phase6_AP) > 0){
                    $rows = mysqli_fetch_array($run_phase6_AP);
                    while(mysqli_fetch_array($run_phase6_AP));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
    
                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>';
                
                }
    
    
            }
}


//phase 6 term 4 

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
$term = 4;


            // phase 6 term 4 ap
            if($phase6_subject_id == 6 ){
                $phase6_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                $run_phase6_AP = mysqli_query($conn,$phase6_AP);
                if(mysqli_num_rows($run_phase6_AP) > 0){
                    $rows = mysqli_fetch_array($run_phase6_AP);
                    while(mysqli_fetch_array($run_phase6_AP));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
    
                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td> ';
                
                }
    
    
            }
}



for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    

    // phase 6 final rating ap
    if($phase6_subject_id == 6 ){
        $phase6_AP = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6'";
        $run_phase6_AP = mysqli_query($conn,$phase6_AP);
        if(mysqli_num_rows($run_phase6_AP) > 0){
            $rows = mysqli_fetch_array($run_phase6_AP);
            while(mysqli_fetch_array($run_phase6_AP));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
                $rows['remarks'] = " ";
               }
    
            $html.='
                <td class="text-center">'.$rows['final_rating'].'</td>
                <td class="text-center">'.$rows['remarks'].'</td>
            </tr>
          ';
        
        }
    
    
    }

}



// End of AP phase 7 copy paste 



//phase 6 term 1 

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 1;


            // phase 6 term 1 EPP_TLE
            if($phase6_subject_id == 7 ){
                $phase6_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                $run_phase6_ep_tle = mysqli_query($conn,$phase6_epp_tle);
                if(mysqli_num_rows($run_phase6_ep_tle) > 0){
                    $rows = mysqli_fetch_array($run_phase6_ep_tle);
                    while(mysqli_fetch_array($run_phase6_ep_tle));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        

                    $html.='
                    <tr>
                    <td class="subject">EPP/TLE</td>
                    <td class="text-center"> '.$rows['grade'].'</td>
                  ';
                
                }


            }
}


// phase 6 term 2 ////////////////////////////////////////////////

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 2;

            // phase 6 term 2 EPP_TLE
            if($phase6_subject_id == 7 ){
                $phase6_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                $run_phase6_ep_tle = mysqli_query($conn,$phase6_epp_tle);
                if(mysqli_num_rows($run_phase6_ep_tle) > 0){
                    $rows = mysqli_fetch_array($run_phase6_ep_tle);
                    while(mysqli_fetch_array($run_phase6_ep_tle));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td>  ';
                
                }


            }
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 3;
// phase 6 term 3 EPP_TLE
if($phase6_subject_id == 7 ){
    $phase6_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
    $run_phase6_ep_tle = mysqli_query($conn,$phase6_epp_tle);
    if(mysqli_num_rows($run_phase6_ep_tle) > 0){
        $rows = mysqli_fetch_array($run_phase6_ep_tle);
        while(mysqli_fetch_array($run_phase6_ep_tle));

        if($rows['grade'] == 0 ){
            $rows['grade'] = " ";
            }

        $html.='
        <td class="text-center"> '.$rows['grade'].'</td> ';
    
    }


}
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    $term = 4;

        // phase 6 term 4 EPP_TLE
        if($phase6_subject_id == 7 ){
            $phase6_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
            $run_phase6_ep_tle = mysqli_query($conn,$phase6_epp_tle);
            if(mysqli_num_rows($run_phase6_ep_tle) > 0){
                $rows = mysqli_fetch_array($run_phase6_ep_tle);
                while(mysqli_fetch_array($run_phase6_ep_tle));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center"> '.$rows['grade'].'</td>';
            
            }


        }
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {

// phase 6 final rating EPP_TLE
if($phase6_subject_id == 7 ){
    $phase6_epp_tle = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6'";
    $run_phase6_ep_tle = mysqli_query($conn,$phase6_epp_tle);
    if(mysqli_num_rows($run_phase6_ep_tle) > 0){
        $rows = mysqli_fetch_array($run_phase6_ep_tle);
        while(mysqli_fetch_array($run_phase6_ep_tle));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
        ';
    
    }


}

}



//phase 6 term 1 

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 1;

    
            // phase 6 term 1 MAPEH
            if($phase6_subject_id == 8 ){
                $phase6_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                $run_phase6_mapeh = mysqli_query($conn,$phase6_mapeh);
                if(mysqli_num_rows($run_phase6_mapeh) > 0){
                    $rows = mysqli_fetch_array($run_phase6_mapeh);
                    while(mysqli_fetch_array($run_phase6_mapeh));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        

                    $html.='
                    <tr>
                    <td class="subject">MAPEH</td>
                    <td class="text-center"> '.$rows['grade'].'</td>
                     ';
                
                }


            }

}


// phase 6 term 2 ////////////////////////////////////////////////

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 2;
 // phase 6 term 2 MAPEH
 if($phase6_subject_id == 8 ){
    $phase6_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
    $run_phase6_mapeh = mysqli_query($conn,$phase6_mapeh);
    if(mysqli_num_rows($run_phase6_mapeh) > 0){
        $rows = mysqli_fetch_array($run_phase6_mapeh);
        while(mysqli_fetch_array($run_phase6_mapeh));

        if($rows['grade'] == 0 ){
            $rows['grade'] = " ";
            }

        $html.='
        <td class="text-center"> '.$rows['grade'].'</td>  ';
    
    }


}
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 3;

        // phase 6 term 3 MAPEH
        if($phase6_subject_id == 8 ){
            $phase6_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
            $run_phase6_mapeh = mysqli_query($conn,$phase6_mapeh);
            if(mysqli_num_rows($run_phase6_mapeh) > 0){
                $rows = mysqli_fetch_array($run_phase6_mapeh);
                while(mysqli_fetch_array($run_phase6_mapeh));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center"> '.$rows['grade'].'</td>  ';
            
            }


        }
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    $term = 4;
    

        // phase 6 term 4 MAPEH
        if($phase6_subject_id == 8 ){
            $phase6_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
            $run_phase6_mapeh = mysqli_query($conn,$phase6_mapeh);
            if(mysqli_num_rows($run_phase6_mapeh) > 0){
                $rows = mysqli_fetch_array($run_phase6_mapeh);
                while(mysqli_fetch_array($run_phase6_mapeh));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center"> '.$rows['grade'].'</td>  ';
            
            }


        }
        
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {


// phase 6 final rating MAPEH
if($phase6_subject_id == 8 ){
    $phase6_mapeh = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6'";
    $run_phase6_mapeh = mysqli_query($conn,$phase6_mapeh);
    if(mysqli_num_rows($run_phase6_mapeh) > 0){
        $rows = mysqli_fetch_array($run_phase6_mapeh);
        while(mysqli_fetch_array($run_phase6_mapeh));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="insert-remarks text-center"> '.$rows['remarks'].'</td>
        </tr>
         ';
    
    }


}
}

 

//phase 6 term 1 

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 1;
         // phase 6 term 1 music
         if($phase6_subject_id == 9 ){
            $phase6_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
            $run_phase6_music = mysqli_query($conn,$phase6_music);
            if(mysqli_num_rows($run_phase6_music) > 0){
                $rows = mysqli_fetch_array($run_phase6_music);
                while(mysqli_fetch_array($run_phase6_music));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }
    

                $html.='
                <tr>
                <td class="small-pad-left italic">Music</td>
                <td class="text-center"> '.$rows['grade'].'</td>
                ';
            
            }


        }

}


// phase 6 term 2 ////////////////////////////////////////////////

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 2;
    
            
                // phase 6 term 2 music
                if($phase6_subject_id == 9 ){
                    $phase6_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                    $run_phase6_music = mysqli_query($conn,$phase6_music);
                    if(mysqli_num_rows($run_phase6_music) > 0){
                        $rows = mysqli_fetch_array($run_phase6_music);
                        while(mysqli_fetch_array($run_phase6_music));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
    
                        $html.='
                        <td class="text-center"> '.$rows['grade'].'</td>  ';
                    
                    }
    
    
                }
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 3;

        
            // phase 6 term 3 music
            if($phase6_subject_id == 9 ){
                $phase6_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                $run_phase6_music = mysqli_query($conn,$phase6_music);
                if(mysqli_num_rows($run_phase6_music) > 0){
                    $rows = mysqli_fetch_array($run_phase6_music);
                    while(mysqli_fetch_array($run_phase6_music));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
    
                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td>  ';
                
                }
    
    
            }
    
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    $term = 4;

            // phase 6 term 4 music
            if($phase6_subject_id == 9 ){
                $phase6_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                $run_phase6_music = mysqli_query($conn,$phase6_music);
                if(mysqli_num_rows($run_phase6_music) > 0){
                    $rows = mysqli_fetch_array($run_phase6_music);
                    while(mysqli_fetch_array($run_phase6_music));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
    
                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td> ';
                
                }
    
    
            }
    
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {

    // phase 6 final rating music
    if($phase6_subject_id == 9 ){
        $phase6_music = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6'";
        $run_phase6_music = mysqli_query($conn,$phase6_music);
        if(mysqli_num_rows($run_phase6_music) > 0){
            $rows = mysqli_fetch_array($run_phase6_music);
            while(mysqli_fetch_array($run_phase6_music));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
                $rows['remarks'] = " ";
               }
    
            $html.='
            <td class="text-center">'.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].'</td>
            </tr>
            ';
        
        }
    
    
    }
    
}     



//phase 6 term 1 

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 1;


                    // phase 6 term 1 arts
                    if($phase6_subject_id == 10 ){
                        $phase6_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                        $run_phase6_arts = mysqli_query($conn,$phase6_arts);
                        if(mysqli_num_rows($run_phase6_arts) > 0){
                            $rows = mysqli_fetch_array($run_phase6_arts);
                            while(mysqli_fetch_array($run_phase6_arts));

                            if($rows['grade'] == 0 ){
                                $rows['grade'] = " ";
                                }
                
        
                            $html.='
                            <tr>
                            <td class="small-pad-left italic">Arts</td>
                            <td class="text-center">'.$rows['grade'].' </td>
                            ';
                        
                        }
        
        
                    }
        
}


// phase 6 term 2 ////////////////////////////////////////////////

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 2;

                    // phase 6 term 2 arts
                    if($phase6_subject_id == 10 ){
                        $phase6_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                        $run_phase6_arts = mysqli_query($conn,$phase6_arts);
                        if(mysqli_num_rows($run_phase6_arts) > 0){
                            $rows = mysqli_fetch_array($run_phase6_arts);
                            while(mysqli_fetch_array($run_phase6_arts));

                            if($rows['grade'] == 0 ){
                                $rows['grade'] = " ";
                                }
        
                            $html.='
                            <td class="text-center">'.$rows['grade'].' </td>  ';
                        
                        }
        
        
                    }
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 3;


                // phase 6 term 3 arts
                if($phase6_subject_id == 10 ){
                    $phase6_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                    $run_phase6_arts = mysqli_query($conn,$phase6_arts);
                    if(mysqli_num_rows($run_phase6_arts) > 0){
                        $rows = mysqli_fetch_array($run_phase6_arts);
                        while(mysqli_fetch_array($run_phase6_arts));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
        
                        $html.='
                        <td class="text-center">'.$rows['grade'].' </td> ';
                    
                    }
        
        
                }
        
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    $term = 4;

    

                // phase 6 term 3 arts
                if($phase6_subject_id == 10 ){
                    $phase6_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                    $run_phase6_arts = mysqli_query($conn,$phase6_arts);
                    if(mysqli_num_rows($run_phase6_arts) > 0){
                        $rows = mysqli_fetch_array($run_phase6_arts);
                        while(mysqli_fetch_array($run_phase6_arts));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
        
                        $html.='
                        <td class="text-center">'.$rows['grade'].' </td> ';
                    
                    }
        
        
                }
        
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {

        // phase 6 final rating arts
        if($phase6_subject_id == 10 ){
            $phase6_arts = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6'";
            $run_phase6_arts = mysqli_query($conn,$phase6_arts);
            if(mysqli_num_rows($run_phase6_arts) > 0){
                $rows = mysqli_fetch_array($run_phase6_arts);
                while(mysqli_fetch_array($run_phase6_arts));

                if($rows['final_rating'] == 0 ){
                    $rows['final_rating'] = " ";
                    $rows['remarks'] = " ";
                   }
        
                $html.='
                <td class="text-center">'.$rows['final_rating'].'</td>
                <td class="text-center">'.$rows['remarks'].'</td>
                </tr>
                ';
            
            }
        
        
        }
}

   

//phase 6 term 1 

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 1;


            // phase 6 term 1 PE
            if($phase6_subject_id == 11 ){
                $phase6_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                $run_phase6_pe = mysqli_query($conn,$phase6_pe);
                if(mysqli_num_rows($run_phase6_pe) > 0){
                    $rows = mysqli_fetch_array($run_phase6_pe);
                    while(mysqli_fetch_array($run_phase6_pe));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        

                    $html.='
                    <tr>
                    
                    <td class="small-pad-left italic">Physical Education</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                    ';
                
                }


            }
}


// phase 6 term 2 ////////////////////////////////////////////////

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 2;


            // phase 6 term 2 PE
            if($phase6_subject_id == 11 ){
                $phase6_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                $run_phase6_pe = mysqli_query($conn,$phase6_pe);
                if(mysqli_num_rows($run_phase6_pe) > 0){
                    $rows = mysqli_fetch_array($run_phase6_pe);
                    while(mysqli_fetch_array($run_phase6_pe));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }


            }

}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 3;
 // phase 6 term 3 PE
 if($phase6_subject_id == 11 ){
    $phase6_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
    $run_phase6_pe = mysqli_query($conn,$phase6_pe);
    if(mysqli_num_rows($run_phase6_pe) > 0){
        $rows = mysqli_fetch_array($run_phase6_pe);
        while(mysqli_fetch_array($run_phase6_pe));


         if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }
        $html.='
        <td class="text-center">'.$rows['grade'].'</td>  ';
    
    }


}
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    $term = 4;

        // phase 6 term 4 PE
        if($phase6_subject_id == 11 ){
            $phase6_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
            $run_phase6_pe = mysqli_query($conn,$phase6_pe);
            if(mysqli_num_rows($run_phase6_pe) > 0){
                $rows = mysqli_fetch_array($run_phase6_pe);
                while(mysqli_fetch_array($run_phase6_pe));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td> ';
            
            }


        }

    
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {


// phase 6 final rating PE
if($phase6_subject_id == 11 ){
    $phase6_pe = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6'";
    $run_phase6_pe = mysqli_query($conn,$phase6_pe);
    if(mysqli_num_rows($run_phase6_pe) > 0){
        $rows = mysqli_fetch_array($run_phase6_pe);
        while(mysqli_fetch_array($run_phase6_pe));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center"> '.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
        ';
    
    }


}
}         
   

//phase 6 term 1 

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 1;
       // phase 6 term 1 Health
       if($phase6_subject_id == 12 ){
        $phase6_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
        $run_phase6_health = mysqli_query($conn,$phase6_health);
        if(mysqli_num_rows($run_phase6_health) > 0){
            $rows = mysqli_fetch_array($run_phase6_health);
            while(mysqli_fetch_array($run_phase6_health));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }


            $html.='
            <tr>
            <td class="small-pad-left italic">Health</td>
            <td class="text-center">'.$rows['grade'].'</td>
            ';
        
        }


    }

}


// phase 6 term 2 ////////////////////////////////////////////////

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 2;


            // phase 6 term 2 Health
            if($phase6_subject_id == 12 ){
                $phase6_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                $run_phase6_health = mysqli_query($conn,$phase6_health);
                if(mysqli_num_rows($run_phase6_health) > 0){
                    $rows = mysqli_fetch_array($run_phase6_health);
                    while(mysqli_fetch_array($run_phase6_health));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }


            }
            

}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 3;
    // phase 6 term 3 Health
    if($phase6_subject_id == 12 ){
        $phase6_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
        $run_phase6_health = mysqli_query($conn,$phase6_health);
        if(mysqli_num_rows($run_phase6_health) > 0){
            $rows = mysqli_fetch_array($run_phase6_health);
            while(mysqli_fetch_array($run_phase6_health));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

            $html.='
            <td class="text-center">'.$rows['grade'].'</td>  ';
        
        }


    }
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    $term = 4;


        // phase 6 term 4 Health
        if($phase6_subject_id == 12 ){
            $phase6_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
            $run_phase6_health = mysqli_query($conn,$phase6_health);
            if(mysqli_num_rows($run_phase6_health) > 0){
                $rows = mysqli_fetch_array($run_phase6_health);
                while(mysqli_fetch_array($run_phase6_health));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td> ';
            
            }


        }
        
    
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {


// phase 6 final rating Health
if($phase6_subject_id == 12 ){
    $phase6_health = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6'";
    $run_phase6_health = mysqli_query($conn,$phase6_health);
    if(mysqli_num_rows($run_phase6_health) > 0){
        $rows = mysqli_fetch_array($run_phase6_health);
        while(mysqli_fetch_array($run_phase6_health));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center"> '.$rows['final_rating'].'</td>
        <td class="text-center"> '.$rows['remarks'].' </td>
        </tr>
          ';
    
    }


}
}    


 

//phase 6 term 1 

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 1;

            // phase 6 term 1 eduk sa pag papakatao
            if($phase6_subject_id == 13 ){
                $phase6_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                $run_phase6_esp = mysqli_query($conn,$phase6_esp);
                if(mysqli_num_rows($run_phase6_esp) > 0){
                    $rows = mysqli_fetch_array($run_phase6_esp);
                    while(mysqli_fetch_array($run_phase6_esp));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        

                    $html.='
                    <tr>
                    <td class="subject">Eduk. Sa Pagpapakatao</td>
                    <td class="text-center"> '.$rows['grade'].'</td>
                   ';
                
                }


            }

}


// phase 6 term 2 ////////////////////////////////////////////////

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 2;

            // phase 6 term 2 eduk sa pag papakatao
            if($phase6_subject_id == 13 ){
                $phase6_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                $run_phase6_esp = mysqli_query($conn,$phase6_esp);
                if(mysqli_num_rows($run_phase6_esp) > 0){
                    $rows = mysqli_fetch_array($run_phase6_esp);
                    while(mysqli_fetch_array($run_phase6_esp));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td>  ';
                
                }


            }

}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 3;

        // phase 6 term 3 eduk sa pag papakatao
        if($phase6_subject_id == 13 ){
            $phase6_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
            $run_phase6_esp = mysqli_query($conn,$phase6_esp);
            if(mysqli_num_rows($run_phase6_esp) > 0){
                $rows = mysqli_fetch_array($run_phase6_esp);
                while(mysqli_fetch_array($run_phase6_esp));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center"> '.$rows['grade'].'</td> ';
            
            }


        }
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    $term = 4;

   
        // phase 6 term 4 eduk sa pag papakatao
        if($phase6_subject_id == 13 ){
            $phase6_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
            $run_phase6_esp = mysqli_query($conn,$phase6_esp);
            if(mysqli_num_rows($run_phase6_esp) > 0){
                $rows = mysqli_fetch_array($run_phase6_esp);
                while(mysqli_fetch_array($run_phase6_esp));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center"> '.$rows['grade'].'</td> ';
            
            }


        }
 
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {

// phase 6 final rating eduk sa pag papakatao
if($phase6_subject_id == 13 ){
    $phase6_esp = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6'";
    $run_phase6_esp = mysqli_query($conn,$phase6_esp);
    if(mysqli_num_rows($run_phase6_esp) > 0){
        $rows = mysqli_fetch_array($run_phase6_esp);
        while(mysqli_fetch_array($run_phase6_esp));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="insert-remarks text-center"> '.$rows['remarks'].'</td>
        </tr>
      ';
    
    }


}
}        
            


//phase 6 term 1 

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 1;


            // phase 6 term 1 arabic
            if($phase6_subject_id == 14 ){
                $phase6_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                $run_phase6_arabic = mysqli_query($conn,$phase6_arabic);
                if(mysqli_num_rows($run_phase6_arabic) > 0){
                    $rows = mysqli_fetch_array($run_phase6_arabic);
                    while(mysqli_fetch_array($run_phase6_arabic));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        

                    $html.='
                    <tr>
                    <td class="small-pad-left">*Arabic language</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                    ';
                
                }


            }

}


// phase 6 term 2 ////////////////////////////////////////////////

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 2;


            // phase 6 term 2 arabic
            if($phase6_subject_id == 14 ){
                $phase6_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                $run_phase6_arabic = mysqli_query($conn,$phase6_arabic);
                if(mysqli_num_rows($run_phase6_arabic) > 0){
                    $rows = mysqli_fetch_array($run_phase6_arabic);
                    while(mysqli_fetch_array($run_phase6_arabic));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }


            }
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 3;

        // phase 6 term 3 arabic
        if($phase6_subject_id == 14 ){
            $phase6_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
            $run_phase6_arabic = mysqli_query($conn,$phase6_arabic);
            if(mysqli_num_rows($run_phase6_arabic) > 0){
                $rows = mysqli_fetch_array($run_phase6_arabic);
                while(mysqli_fetch_array($run_phase6_arabic));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td>  ';
            
            }


        }
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    $term = 4;

  


        // phase 6 term 4 arabic
        if($phase6_subject_id == 14 ){
            $phase6_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
            $run_phase6_arabic = mysqli_query($conn,$phase6_arabic);
            if(mysqli_num_rows($run_phase6_arabic) > 0){
                $rows = mysqli_fetch_array($run_phase6_arabic);
                while(mysqli_fetch_array($run_phase6_arabic));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td>  ';
            
            }


        }  
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {



// phase 6 final rating arabic
if($phase6_subject_id == 14 ){
    $phase6_arabic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6'";
    $run_phase6_arabic = mysqli_query($conn,$phase6_arabic);
    if(mysqli_num_rows($run_phase6_arabic) > 0){
        $rows = mysqli_fetch_array($run_phase6_arabic);
        while(mysqli_fetch_array($run_phase6_arabic));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
        ';
    
    }


}

}
     


//phase 6 term 1 

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 1;

            // phase 6 term 1 islamic
            if($phase6_subject_id == 15 ){
                $phase6_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                $run_phase6_islamic = mysqli_query($conn,$phase6_islamic);
                if(mysqli_num_rows($run_phase6_islamic) > 0){
                    $rows = mysqli_fetch_array($run_phase6_islamic);
                    while(mysqli_fetch_array($run_phase6_islamic));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
        

                    $html.='
                    <tr>
                    <td class="small-pad-left">*Islamic values Education</td>
                    <td class="text-center">'.$rows['grade'].' </td>
                    ';
                
                }


            }
}


// phase 6 term 2 ////////////////////////////////////////////////

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 2;
    
            // phase 6 term 2 islamic
            if($phase6_subject_id == 15 ){
                $phase6_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
                $run_phase6_islamic = mysqli_query($conn,$phase6_islamic);
                if(mysqli_num_rows($run_phase6_islamic) > 0){
                    $rows = mysqli_fetch_array($run_phase6_islamic);
                    while(mysqli_fetch_array($run_phase6_islamic));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows['grade'].' </td>  ';
                
                }


            }
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 3;
     
        // phase 6 term 3 islamic
        if($phase6_subject_id == 15 ){
            $phase6_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
            $run_phase6_islamic = mysqli_query($conn,$phase6_islamic);
            if(mysqli_num_rows($run_phase6_islamic) > 0){
                $rows = mysqli_fetch_array($run_phase6_islamic);
                while(mysqli_fetch_array($run_phase6_islamic));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].' </td>  ';
                
            
            }


        }
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    $term = 4;

        
        // phase 6 term 4 islamic
        if($phase6_subject_id == 15 ){
            $phase6_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6' AND term = '$term'";
            $run_phase6_islamic = mysqli_query($conn,$phase6_islamic);
            if(mysqli_num_rows($run_phase6_islamic) > 0){
                $rows = mysqli_fetch_array($run_phase6_islamic);
                while(mysqli_fetch_array($run_phase6_islamic));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].' </td>  ';
            
            }


        }
    
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {

// phase 6 final rating islamic
if($phase6_subject_id == 15 ){
    $phase6_islamic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase6_subject_id' AND phase = '$phase6'";
    $run_phase6_islamic = mysqli_query($conn,$phase6_islamic);
    if(mysqli_num_rows($run_phase6_islamic) > 0){
        $rows = mysqli_fetch_array($run_phase6_islamic);
        while(mysqli_fetch_array($run_phase6_islamic));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
         ';
    
    }


}
}



//phase 6 term 1 

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 1;

            //phase 6 term 1 general average
            if( $phase6_subject_id == 16){
                $phase6_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase6' ";
                $run_phase6_term1_general_average = mysqli_query($conn,$phase6_term1_general_average_query);
                if(mysqli_num_rows($run_phase6_term1_general_average)> 0 ){
                    $rows = mysqli_fetch_array($run_phase6_term1_general_average);

                    if($rows['general_average'] == 0 ){
                        $rows['general_average'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="subject">General average</td>
                    <td class="text-center"> '.$rows['general_average'].'</td>
                 ';
                


                }
                


            }
}


// phase 6 term 2 ////////////////////////////////////////////////

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 2;



        


            //phase 6 term 2 general average
            if( $phase6_subject_id == 16){
                $phase6_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase6' ";
                $run_phase6_term1_general_average = mysqli_query($conn,$phase6_term1_general_average_query);
                if(mysqli_num_rows($run_phase6_term1_general_average)> 0 ){
                    $rows = mysqli_fetch_array($run_phase6_term1_general_average);

                    if($rows['general_average'] == 0 ){
                        $rows['general_average'] = " ";
                        }

                    $html.='
                    <td class="text-center"> '.$rows['general_average'].'</td> ';
                


                }
                


            }

}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    
    
    $term = 3;



        //phase 6 term 3 general average
        if( $phase6_subject_id == 16){
            $phase6_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase6' ";
            $run_phase6_term1_general_average = mysqli_query($conn,$phase6_term1_general_average_query);
            if(mysqli_num_rows($run_phase6_term1_general_average)> 0 ){
                $rows = mysqli_fetch_array($run_phase6_term1_general_average);

                if($rows['general_average'] == 0 ){
                    $rows['general_average'] = " ";
                    }
                $html.='
                <td class="text-center"> '.$rows['general_average'].'</td>  ';
            


            }
            


        }
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {
    $term = 4;


        //phase 6 term 4 general average
        if( $phase6_subject_id == 16){
            $phase6_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase6' ";
            $run_phase6_term1_general_average = mysqli_query($conn,$phase6_term1_general_average_query);
            if(mysqli_num_rows($run_phase6_term1_general_average)> 0 ){
                $rows = mysqli_fetch_array($run_phase6_term1_general_average);

                if($rows['general_average'] == 0 ){
                    $rows['general_average'] = " ";
                    }
                $html.='
                <td class="text-center"> '.$rows['general_average'].'</td> ';
            


            }
            


        }
    
}

for ($phase6_subject_id = 1; $phase6_subject_id <= 16 ; $phase6_subject_id++) {

//phase 6 final rating general average
if( $phase6_subject_id == 16){
    $phase6_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND  phase = '$phase6' AND term = 'Final Rating' ";
    $run_phase6_term1_general_average = mysqli_query($conn,$phase6_term1_general_average_query);
    if(mysqli_num_rows($run_phase6_term1_general_average)> 0 ){
        $rows = mysqli_fetch_array($run_phase6_term1_general_average);

        if($rows['general_average'] == 0 ){
            $rows['general_average'] = " ";
            }


            //phase 6 remarks
            $sql_total_remarks_phase1 = "SELECT final_rating, final_rating, COUNT(remarks) AS 'total_remarks' , lrn FROM student_final_ratings 
            WHERE phase = '6' AND lrn = '$decrypted_lrn' AND remarks= 'FAILED' ";
            $run_total_remarks_phase1 = mysqli_query($conn,$sql_total_remarks_phase1);

            $remarks = mysqli_fetch_array($run_total_remarks_phase1);

            if($remarks['total_remarks'] == 15){
                $output = "";
              }else if($remarks['total_remarks'] >= 3){
                $output = "RETAINED";
              }else if ($remarks['total_remarks'] == 2){
                $output = "REMEDIAL";
              }else if($remarks['total_remarks'] <= 1){
                $output = "PROMOTED";
              }


        $html.='
        <td class="text-center"> '.$rows['general_average'].'</td>  
        <td class="text-center">'.$output.'</td>
     
        </tr>
        ';

        //count


    }
    


}
}

$html.='
</tbody>


</table>

';
 

/// remedial  here 
for($phase6_remedial_term = 1; $phase6_remedial_term <=2; $phase6_remedial_term++){

    if($phase6_remedial_term == 1 ){

        $phase6_remedial_query = " SELECT * FROM `remedial_classes` WHERE lrn ='$decrypted_lrn'AND phase = '$phase6' AND term = '$phase6_remedial_term' ";
        $phase6_run_query = mysqli_query($conn,$phase6_remedial_query);
        if(mysqli_num_rows($phase6_run_query)> 0 ){
            $rows = mysqli_fetch_array($phase6_run_query);
            while(mysqli_fetch_array($phase6_run_query));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
               }

               if($rows['recomputed_final_grade'] == 0 ){
                $rows['recomputed_final_grade'] = " ";
               }

               if($rows['date_from'] == "1970-01-01" || $rows['date_from'] == "0000-00-00"){
                $rows['date_from'] = "";
            }

            if($rows['date_to'] == "1970-01-01" || $rows['date_to'] == "0000-00-00"){
             $rows['date_to'] = "";
            }
            $html.='
            <table style="margin-top:4px;">
                <thead>
                    <tr class="remedial">
                        <th colspan="2">Remedial Classes</th>
                        <th colspan="2" class="text-start" style="border-right: none;"> Date Conducted: '.$rows['date_from'].'</th>
                        <th colspan="2" class="text-start" style="border-left: none;">To: '.$rows['date_to'].'</th>
                    </tr>
                    <tr class="arial-header text-center">
                        <td colspan="2">Learning Areas</td>
                        <td>Final Rating</td>
                        <td>Remedial Class <br> Mark</td>
                        <td>Recomputed <br> Final Grade</td>
                        <td>Remarks</td>
                    </tr>
                </thead>
                <tbody>
                <tr >
                    <td colspan="2" class="remedial-2 text-center">'.$rows['learning_areas'].'</td>
                    <td class="remedial-2 text-center">'.$rows['final_rating'].'</td>
                    <td class="remedial-2 text-center">'.$rows['remarks'].'</td>
                    <td class="remedial-2 text-center">'.$rows['recomputed_final_grade'].'</td>
                    <td class="remedial-2 text-center">'.$rows['remedial_class_mark'].'</td>
                </tr>    
            ';
           
            
        }

    }

            // term 2
        if($phase6_remedial_term == 2 ){

            $phase6_remedial_query = " SELECT * FROM `remedial_classes` WHERE lrn ='$decrypted_lrn'AND phase = '$phase6' AND term = '$phase6_remedial_term' ";
        $phase6_run_query = mysqli_query($conn,$phase6_remedial_query);
        if(mysqli_num_rows($phase6_run_query)> 0 ){
            $rows = mysqli_fetch_array($phase6_run_query);
            while(mysqli_fetch_array($phase6_run_query));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
               }

               if($rows['recomputed_final_grade'] == 0 ){
                $rows['recomputed_final_grade'] = " ";
               }
            $html.='
                    <tr >
                        <td colspan="2" class="remedial-2 text-center">'.$rows['learning_areas'].'</td>
                        <td class="remedial-2 text-center">'.$rows['final_rating'].'</td>
                        <td class="remedial-2 text-center">'.$rows['remarks'].'</td>
                        <td class="remedial-2 text-center">'.$rows['remedial_class_mark'].'</td>
                        <td class="remedial-2 text-center">'.$rows['recomputed_final_grade'].'</td>
                    </tr>
                </tbody>
            </table>   
        </td>
    </tr>

        
           ';
        }
        //last 6
        }

    
}// end of remedial phase 6 








//start of phase 7 
// scholastic records phase 7 
// phase 7 scohlastic query 

$phase7_scholastic_query = "SELECT * FROM `scholastic_records` WHERE lrn = '$decrypted_lrn' AND phase = $phase7";
$run_phase7_scholastic = mysqli_query($conn,$phase7_scholastic_query);
if(mysqli_num_rows($run_phase7_scholastic) > 0){
    $rows = mysqli_fetch_array($run_phase7_scholastic);

    while(mysqli_fetch_array($run_phase7_scholastic));


    $html.='
    <tr style="border:none;">
        <td style="height: 6px; border:none;"></td>
    </tr>
    <tr class="row_2" style="width: 100vw; height:50vh; border:none;">
        <td class="phase_3" style="width: 48%;  border:none;">
            <table class="phase_head">
                <tr>
                    <td colspan="6"><span class="main-arial-text">School: <span style="font-weight: bold;">'.$rows['school'].'</span></span></td>
                    <td colspan="6" style="text-align: right;><span class="main-arial-text">School ID: <span style="font-weight: bold;">'.$rows['school_id'].'</span></span></td>
                </tr>
                <tr>
                    <td colspan="4"><span class="main-arial-text">District: <span style="font-weight: bold;">'.$rows['district'].'</span></span></td>
                    <td colspan="4" style="text-align: center;"><span class="main-arial-text">Division: <span style="font-weight: bold;">'.$rows['division'].'</span></span></td>
                    <td colspan="4" style="text-align: right;"><span class="main-arial-text">Region: <span style="font-weight: bold;">'.$rows['region'].'</span></span></td>
                </tr>
                <tr>
                    <td colspan="3"><span class="main-arial-text">Classified as Grade: <span style="font-weight: bold;">'.$rows['classified_as_grade'].'</span></span></td>
                    <td colspan="5" style="text-align: center;"><span class="main-arial-text" >Section: <span style="font-weight: bold;">'.$rows['section'].'</span></span></td>
                    <td colspan="4" style="text-align: right;"><span class="main-arial-text">School year: <span style="font-weight: bold;">'.$rows['school_year'].'-2012</span></span></td>
                </tr>
                <tr>
                    <td colspan="6"><span class="main-arial-text">Name of adviser: <span style="font-weight: bold;">'.$rows['name_of_teacher'].'</span></span></td>
                    <td colspan="6" style="text-align: right;"><span class="main-arial-text">Signature:<span style="font-weight: bold;">'.$rows['signature'].'</span></span></td>
                </tr>
            </table>
    ';
    }


    $html.='
            <table>
                <thead>
                    <tr>
                        <th rowspan="2">Learning Areas</th>
                        <th class="quarterly" colspan="4">Quarterly Rating</th>
                        <th colspan="1" class="final-rating" rowspan="2" >Final <br> Rating</th>
                        <th rowspan="2">Remarks</th>
                    </tr>
                    <tr class="quarter">
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                    </tr>
                </thead>    
                <tbody> 

    
    ';

//phase 7 term 1 

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 1;
    

            if($phase7_subject_id == 1){
        
                        //phase 1 term 1 mother tongue 
                $phase7_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_mt = mysqli_query($conn,$phase7_mt);
                if(mysqli_num_rows($run_phase7_mt) > 0){
                    $rows = mysqli_fetch_array($run_phase7_mt);
                    while(mysqli_fetch_array($run_phase7_mt));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                        $html.=' 
                        <tr>
                        <td class="subject">Mother Tongue</td>
                        <td class="text-center"> '.$rows['grade'].'</td>                        
                       ';
                    
                    }
                }
            }

            for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
                $term = 2;
            
// phase 7 term 2 ////////////////////////////////////////////////

    

if($phase7_subject_id == 1){
        
    //phase 1 term 2 mother tongue 
$phase7_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
$run_phase7_mt = mysqli_query($conn,$phase7_mt);
if(mysqli_num_rows($run_phase7_mt) > 0){
$rows = mysqli_fetch_array($run_phase7_mt);
while(mysqli_fetch_array($run_phase7_mt));

if($rows['grade'] == 0 ){
    $rows['grade'] = " ";
    }

    $html.='    <td class="text-center"> '.$rows['grade'].'</td>   ';

}
}
            }
            
            
            for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
                
                
                $term = 3;
            
        if($phase7_subject_id == 1){
    
            //phase 1 term 3 mother tongue 
    $phase7_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
    $run_phase7_mt = mysqli_query($conn,$phase7_mt);
    if(mysqli_num_rows($run_phase7_mt) > 0){
        $rows = mysqli_fetch_array($run_phase7_mt);
        while(mysqli_fetch_array($run_phase7_mt));

        if($rows['grade'] == 0 ){
            $rows['grade'] = " ";
            }

            $html.='    <td class="text-center"> '.$rows['grade'].'</td>    ';
        
        }
    }
            }
            
            
            //phase 7 term 4 
            
            for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
                
                
            $term = 4;
            
        if($phase7_subject_id == 1){
    
            //phase 7 term 4 mother tongue 
    $phase7_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
    $run_phase7_mt = mysqli_query($conn,$phase7_mt);
    if(mysqli_num_rows($run_phase7_mt) > 0){
        $rows = mysqli_fetch_array($run_phase7_mt);
        while(mysqli_fetch_array($run_phase7_mt));

        if($rows['grade'] == 0 ){
            $rows['grade'] = " ";
            }

            $html.='   <td class="text-center"> '.$rows['grade'].'</td>   ';
        
        }
    }
            }
            
            
            
            for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
                
            

if($phase7_subject_id == 1){

    //phase 1 final rating mother tongue 
$phase7_mt = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7'";
$run_phase7_mt = mysqli_query($conn,$phase7_mt);
if(mysqli_num_rows($run_phase7_mt) > 0){
$rows = mysqli_fetch_array($run_phase7_mt);
while(mysqli_fetch_array($run_phase7_mt));

if($rows['final_rating'] == 0 ){
    $rows['final_rating'] = " ";
    $rows['remarks'] = " ";
   }

    $html.=' 
    <td class="text-center">'.$rows['final_rating'].'</td>
    <td class="insert-remarks text-center"> '.$rows['remarks'].'</td>
    </tr>
    ';

}
}
            
            }
            

            


for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 1;

            // phase 7 term 1 filipino

            if($phase7_subject_id == 2 ){
                $phase7_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_filipino = mysqli_query($conn,$phase7_filipino);
                if(mysqli_num_rows($run_phase7_filipino) > 0){
                    $rows = mysqli_fetch_array($run_phase7_filipino);
                    while(mysqli_fetch_array($run_phase7_filipino));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                        $html.='
                        <tr>
                        <td class="subject">Filipino</td>
                        <td class="text-center">'.$rows['grade'].'</td>
                      ';
                    
                    }

            
                }
}

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 2;

            //phase 1 term 2 filipino

            if($phase7_subject_id == 2 ){
                $phase7_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_filipino = mysqli_query($conn,$phase7_filipino);
                if(mysqli_num_rows($run_phase7_filipino) > 0){
                    $rows = mysqli_fetch_array($run_phase7_filipino);
                    while(mysqli_fetch_array($run_phase7_filipino));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                        $html.='
                        <td class="text-center">'.$rows['grade'].'</td> ';
                    
                    }

            
                }
}


for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 3;


        //phase 1 term 3 filipino

        if($phase7_subject_id == 2 ){
            $phase7_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
            $run_phase7_filipino = mysqli_query($conn,$phase7_filipino);
            if(mysqli_num_rows($run_phase7_filipino) > 0){
                $rows = mysqli_fetch_array($run_phase7_filipino);
                while(mysqli_fetch_array($run_phase7_filipino));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }

        
            }

}


//phase 7 term 4 

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
$term = 4;

        //phase 7 term 4 filipino

        if($phase7_subject_id == 2 ){
            $phase7_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
            $run_phase7_filipino = mysqli_query($conn,$phase7_filipino);
            if(mysqli_num_rows($run_phase7_filipino) > 0){
                $rows = mysqli_fetch_array($run_phase7_filipino);
                while(mysqli_fetch_array($run_phase7_filipino));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td> ';
                
                }

        
            }
}



for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    


//phase 1 final rating filipino

if($phase7_subject_id == 2 ){
    $phase7_filipino = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7'";
    $run_phase7_filipino = mysqli_query($conn,$phase7_filipino);
    if(mysqli_num_rows($run_phase7_filipino) > 0){
        $rows = mysqli_fetch_array($run_phase7_filipino);
        while(mysqli_fetch_array($run_phase7_filipino));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

            $html.='
            <td class="text-center"> '.$rows['final_rating'].'</td>
            <td class="insert-remarks text-center"> '.$rows['remarks'].'</td>
            </tr>
            ';
        
        }


    }

}





for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 1;
// phase 7 term 1 english 

if($phase7_subject_id == 3 ){
    $phase7_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
    $run_phase7_english = mysqli_query($conn,$phase7_english);
    if(mysqli_num_rows($run_phase7_english) > 0){
        $rows = mysqli_fetch_array($run_phase7_english);
        while(mysqli_fetch_array($run_phase7_english));

        if($rows['grade'] == 0 ){
            $rows['grade'] = " ";
            }

            $html.='
            <tr>
            <td class="subject">English</td>
            <td class="text-center">'.$rows['grade'].'</td>
            ';
        
        }


    }

}

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 2;


            // phase 7 term 2 english 

            if($phase7_subject_id == 3 ){
                $phase7_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_english = mysqli_query($conn,$phase7_english);
                if(mysqli_num_rows($run_phase7_english) > 0){
                    $rows = mysqli_fetch_array($run_phase7_english);
                    while(mysqli_fetch_array($run_phase7_english));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                        $html.='
                        <td class="text-center">'.$rows['grade'].'</td>  ';
                    
                    }

            
                }
}


for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 3;

        // phase 7 term 3 english 

        if($phase7_subject_id == 3 ){
            $phase7_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
            $run_phase7_english = mysqli_query($conn,$phase7_english);
            if(mysqli_num_rows($run_phase7_english) > 0){
                $rows = mysqli_fetch_array($run_phase7_english);
                while(mysqli_fetch_array($run_phase7_english));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }

        
            }
}


//phase 7 term 4 

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
$term = 4;

        // phase 7 term 4 english 

        if($phase7_subject_id == 3 ){
            $phase7_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
            $run_phase7_english = mysqli_query($conn,$phase7_english);
            if(mysqli_num_rows($run_phase7_english) > 0){
                $rows = mysqli_fetch_array($run_phase7_english);
                while(mysqli_fetch_array($run_phase7_english));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td> ';
                
                }

        
            }
}



for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    

// phase 7 final rating english 

if($phase7_subject_id == 3 ){
    $phase7_english = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7'";
    $run_phase7_english = mysqli_query($conn,$phase7_english);
    if(mysqli_num_rows($run_phase7_english) > 0){
        $rows = mysqli_fetch_array($run_phase7_english);
        while(mysqli_fetch_array($run_phase7_english));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

            $html.='
            <td class="text-center">'.$rows['final_rating'].'</td>
            <td class="text-center"> '.$rows['remarks'].' </td>
            </tr>
             ';
        
        }


    }

}






for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 1;
  
            // phase 7 term 1 math

            if($phase7_subject_id == 4 ){
                $phase7_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_math = mysqli_query($conn,$phase7_math);
                if(mysqli_num_rows($run_phase7_math) > 0){
                    $rows = mysqli_fetch_array($run_phase7_math);
                    while(mysqli_fetch_array($run_phase7_math));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                        $html.='
                        <tr>
                        <td class="subject">Mathematics</td>
                        <td class="text-center">'.$rows['grade'].'</td>
                      ';
                    
                    }   

            
                }
}

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 2;

            // phase 7 term 2 math

            if($phase7_subject_id == 4 ){
                $phase7_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_math = mysqli_query($conn,$phase7_math);
                if(mysqli_num_rows($run_phase7_math) > 0){
                    $rows = mysqli_fetch_array($run_phase7_math);
                    while(mysqli_fetch_array($run_phase7_math));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                        $html.='
                        <td class="text-center">'.$rows['grade'].'</td>  ';
                    
                    }   

            
                }

}


for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 3;
    //phase 1 term 3 math

    if($phase7_subject_id == 4 ){
        $phase7_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
        $run_phase7_math = mysqli_query($conn,$phase7_math);
        if(mysqli_num_rows($run_phase7_math) > 0){
            $rows = mysqli_fetch_array($run_phase7_math);
            while(mysqli_fetch_array($run_phase7_math));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td>  ';
            
            }   

    
        }
}


//phase 7 term 4 

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
$term = 4;

        //phase 1 term 4 math

        if($phase7_subject_id == 4 ){
            $phase7_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
            $run_phase7_math = mysqli_query($conn,$phase7_math);
            if(mysqli_num_rows($run_phase7_math) > 0){
                $rows = mysqli_fetch_array($run_phase7_math);
                while(mysqli_fetch_array($run_phase7_math));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }   

        
            }
}



for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    

// phase 7 final rating math

if($phase7_subject_id == 4 ){
    $phase7_math = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7'";
    $run_phase7_math = mysqli_query($conn,$phase7_math);
    if(mysqli_num_rows($run_phase7_math) > 0){
        $rows = mysqli_fetch_array($run_phase7_math);
        while(mysqli_fetch_array($run_phase7_math));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

            $html.='
            <td class="text-center">'.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].'</td>
            </tr>
             ';
        
        }   


    }

}






for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 1;

          

                // phase 7 term 1 science

                if($phase7_subject_id == 5 ){
                    $phase7_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                    $run_phase7_science = mysqli_query($conn,$phase7_science);
                    if(mysqli_num_rows($run_phase7_science) > 0){
                        $rows = mysqli_fetch_array($run_phase7_science);
                        while(mysqli_fetch_array($run_phase7_science));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
    
                            $html.='
                            <tr>
                            <td class="subject">Science</td>
                            <td class="text-center">'.$rows['grade'].'</td>
                              ';
                        
                        }
    
                
                    }
}

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 2;

                // phase 7 term 2 science

                if($phase7_subject_id == 5 ){
                    $phase7_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                    $run_phase7_science = mysqli_query($conn,$phase7_science);
                    if(mysqli_num_rows($run_phase7_science) > 0){
                        $rows = mysqli_fetch_array($run_phase7_science);
                        while(mysqli_fetch_array($run_phase7_science));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
    
                            $html.='
                            <td class="text-center">'.$rows['grade'].'</td> ';
                        
                        }
    
                
                    }
}


for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 3;

    

            // phase 7 term 3 science

            if($phase7_subject_id == 5 ){
                $phase7_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_science = mysqli_query($conn,$phase7_science);
                if(mysqli_num_rows($run_phase7_science) > 0){
                    $rows = mysqli_fetch_array($run_phase7_science);
                    while(mysqli_fetch_array($run_phase7_science));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
    
                        $html.='
                        <td class="text-center">'.$rows['grade'].'</td>  ';
                    
                    }
    
            
                }
    
}


//phase 7 term 4 

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
$term = 4;



            // phase 7 term 4 science

            if($phase7_subject_id == 5 ){
                $phase7_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_science = mysqli_query($conn,$phase7_science);
                if(mysqli_num_rows($run_phase7_science) > 0){
                    $rows = mysqli_fetch_array($run_phase7_science);
                    while(mysqli_fetch_array($run_phase7_science));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
    
                        $html.='
                        <td class="text-center">'.$rows['grade'].'</td>  ';
                    
                    }
    
            
                }
    
}



for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    

    // phase 7 final rating science

    if($phase7_subject_id == 5 ){
        $phase7_science = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7'";
        $run_phase7_science = mysqli_query($conn,$phase7_science);
        if(mysqli_num_rows($run_phase7_science) > 0){
            $rows = mysqli_fetch_array($run_phase7_science);
            while(mysqli_fetch_array($run_phase7_science));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
                $rows['remarks'] = " ";
               }
    
                $html.='
                <td class="text-center">'.$rows['final_rating'].'</td>
                <td class="text-center">'.$rows['remarks'].'</td>
                </tr>
                  ';
            
            }
    
    
        }

}



// TJ phase 6 term 1 Ap


for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 1;
    // phase 7 term 1 ap
    if($phase7_subject_id == 6 ){
        $phase7_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
        $run_phase7_AP = mysqli_query($conn,$phase7_AP);
        if(mysqli_num_rows($run_phase7_AP) > 0){
            $rows = mysqli_fetch_array($run_phase7_AP);
            while(mysqli_fetch_array($run_phase7_AP));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

            $html.='
            <tr>
            <td class="subject">Araling Panlipunan</td>
            <td class="text-center">'.$rows['grade'].'</td>
            ';
        
        }


    }

}

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 2;


                // phase 7 term 2 ap
                if($phase7_subject_id == 6 ){
                    $phase7_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                    $run_phase7_AP = mysqli_query($conn,$phase7_AP);
                    if(mysqli_num_rows($run_phase7_AP) > 0){
                        $rows = mysqli_fetch_array($run_phase7_AP);
                        while(mysqli_fetch_array($run_phase7_AP));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
    
                        $html.='
                        <td class="text-center">'.$rows['grade'].'</td>  ';
                    
                    }
    
    
                }
    
}


for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 3;

            // phase 7 term 3 ap
            if($phase7_subject_id == 6 ){
                $phase7_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_AP = mysqli_query($conn,$phase7_AP);
                if(mysqli_num_rows($run_phase7_AP) > 0){
                    $rows = mysqli_fetch_array($run_phase7_AP);
                    while(mysqli_fetch_array($run_phase7_AP));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
    
                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }
    
    
            }
}


//phase 7 term 4 

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
$term = 4;


            // phase 7 term 4 ap
            if($phase7_subject_id == 6 ){
                $phase7_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_AP = mysqli_query($conn,$phase7_AP);
                if(mysqli_num_rows($run_phase7_AP) > 0){
                    $rows = mysqli_fetch_array($run_phase7_AP);
                    while(mysqli_fetch_array($run_phase7_AP));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
    
                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td> ';
                
                }
    
    
            }
}



for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    

    // phase 7 final rating ap
    if($phase7_subject_id == 6 ){
        $phase7_AP = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7'";
        $run_phase7_AP = mysqli_query($conn,$phase7_AP);
        if(mysqli_num_rows($run_phase7_AP) > 0){
            $rows = mysqli_fetch_array($run_phase7_AP);
            while(mysqli_fetch_array($run_phase7_AP));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
                $rows['remarks'] = " ";
               }
    
            $html.='
            <td class="text-center">'.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].'</td>
            </tr>
          ';
        
        }
    
    
    }

}




for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 1;


            // phase 7 term 1 EPP_TLE
            if($phase7_subject_id == 7 ){
                $phase7_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_ep_tle = mysqli_query($conn,$phase7_epp_tle);
                if(mysqli_num_rows($run_phase7_ep_tle) > 0){
                    $rows = mysqli_fetch_array($run_phase7_ep_tle);
                    while(mysqli_fetch_array($run_phase7_ep_tle));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="subject">EPP/TLE</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                      ';
                
                }


            }
}

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 2;

            // phase 7 term 2 EPP_TLE
            if($phase7_subject_id == 7 ){
                $phase7_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_ep_tle = mysqli_query($conn,$phase7_epp_tle);
                if(mysqli_num_rows($run_phase7_ep_tle) > 0){
                    $rows = mysqli_fetch_array($run_phase7_ep_tle);
                    while(mysqli_fetch_array($run_phase7_ep_tle));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }


            }
}


for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 3;

        // phase 7 term 3 EPP_TLE
        if($phase7_subject_id == 7 ){
            $phase7_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
            $run_phase7_ep_tle = mysqli_query($conn,$phase7_epp_tle);
            if(mysqli_num_rows($run_phase7_ep_tle) > 0){
                $rows = mysqli_fetch_array($run_phase7_ep_tle);
                while(mysqli_fetch_array($run_phase7_ep_tle));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td> ';
            
            }


        }

}


//phase 7 term 4 

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
$term = 4;



        // phase 7 term 4 EPP_TLE
        if($phase7_subject_id == 7 ){
            $phase7_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
            $run_phase7_ep_tle = mysqli_query($conn,$phase7_epp_tle);
            if(mysqli_num_rows($run_phase7_ep_tle) > 0){
                $rows = mysqli_fetch_array($run_phase7_ep_tle);
                while(mysqli_fetch_array($run_phase7_ep_tle));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td> ';
            
            }


        }
}



for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    

// phase 7 final rating EPP_TLE
if($phase7_subject_id == 7 ){
    $phase7_epp_tle = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7'";
    $run_phase7_ep_tle = mysqli_query($conn,$phase7_epp_tle);
    if(mysqli_num_rows($run_phase7_ep_tle) > 0){
        $rows = mysqli_fetch_array($run_phase7_ep_tle);
        while(mysqli_fetch_array($run_phase7_ep_tle));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
        ';
    
    }


}

}





for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 1;


            // phase 7 term 1 MAPEH
            if($phase7_subject_id == 8 ){
                $phase7_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_mapeh = mysqli_query($conn,$phase7_mapeh);
                if(mysqli_num_rows($run_phase7_mapeh) > 0){
                    $rows = mysqli_fetch_array($run_phase7_mapeh);
                    while(mysqli_fetch_array($run_phase7_mapeh));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="subject">MAPEH</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                     ';
                
                }


            }
            
}

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 2;


            // phase 7 term 2 MAPEH
            if($phase7_subject_id == 8 ){
                $phase7_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_mapeh = mysqli_query($conn,$phase7_mapeh);
                if(mysqli_num_rows($run_phase7_mapeh) > 0){
                    $rows = mysqli_fetch_array($run_phase7_mapeh);
                    while(mysqli_fetch_array($run_phase7_mapeh));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td> ';
                
                }


            }
            
}


for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 3;

        // phase 7 term 3 MAPEH
        if($phase7_subject_id == 8 ){
            $phase7_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
            $run_phase7_mapeh = mysqli_query($conn,$phase7_mapeh);
            if(mysqli_num_rows($run_phase7_mapeh) > 0){
                $rows = mysqli_fetch_array($run_phase7_mapeh);
                while(mysqli_fetch_array($run_phase7_mapeh));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td> ';
            
            }


        }
}


//phase 7 term 4 

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
$term = 4;

        // phase 7 term 4 MAPEH
        if($phase7_subject_id == 8 ){
            $phase7_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
            $run_phase7_mapeh = mysqli_query($conn,$phase7_mapeh);
            if(mysqli_num_rows($run_phase7_mapeh) > 0){
                $rows = mysqli_fetch_array($run_phase7_mapeh);
                while(mysqli_fetch_array($run_phase7_mapeh));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td> ';
            
            }


        }
}



for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    


// phase 7 final rating MAPEH
if($phase7_subject_id == 8 ){
    $phase7_mapeh = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7'";
    $run_phase7_mapeh = mysqli_query($conn,$phase7_mapeh);
    if(mysqli_num_rows($run_phase7_mapeh) > 0){
        $rows = mysqli_fetch_array($run_phase7_mapeh);
        while(mysqli_fetch_array($run_phase7_mapeh));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].' </td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
          ';
    
    }


}


}





for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 1;
    

                // phase 7 term 1 music
                if($phase7_subject_id == 9 ){
                    $phase7_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                    $run_phase7_music = mysqli_query($conn,$phase7_music);
                    if(mysqli_num_rows($run_phase7_music) > 0){
                        $rows = mysqli_fetch_array($run_phase7_music);
                        while(mysqli_fetch_array($run_phase7_music));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
    
                        $html.='
                        <tr>
                        <td class="small-pad-left italic">Music</td>
                        <td class="text-center">'.$rows['grade'].'</td>
                     ';
                    
                    }
    
    
                }
}

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 2;


                // phase 7 term 2 music
                if($phase7_subject_id == 9 ){
                    $phase7_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                    $run_phase7_music = mysqli_query($conn,$phase7_music);
                    if(mysqli_num_rows($run_phase7_music) > 0){
                        $rows = mysqli_fetch_array($run_phase7_music);
                        while(mysqli_fetch_array($run_phase7_music));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
    
                        $html.='
                        <td class="text-center">'.$rows['grade'].'</td>  ';
                    
                    }
    
    
                }
    
}


for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 3;
      
            // phase 7 term 3 music
            if($phase7_subject_id == 9 ){
                $phase7_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_music = mysqli_query($conn,$phase7_music);
                if(mysqli_num_rows($run_phase7_music) > 0){
                    $rows = mysqli_fetch_array($run_phase7_music);
                    while(mysqli_fetch_array($run_phase7_music));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
    
                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td> ';
                
                }
    
    
            }
    
}


//phase 7 term 4 

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
$term = 4;

            // phase 7 term 4 music
            if($phase7_subject_id == 9 ){
                $phase7_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_music = mysqli_query($conn,$phase7_music);
                if(mysqli_num_rows($run_phase7_music) > 0){
                    $rows = mysqli_fetch_array($run_phase7_music);
                    while(mysqli_fetch_array($run_phase7_music));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
    
                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }
    
    
            }
}



for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    


    // phase 7 final rating music
    if($phase7_subject_id == 9 ){
        $phase7_music = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7'";
        $run_phase7_music = mysqli_query($conn,$phase7_music);
        if(mysqli_num_rows($run_phase7_music) > 0){
            $rows = mysqli_fetch_array($run_phase7_music);
            while(mysqli_fetch_array($run_phase7_music));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
                $rows['remarks'] = " ";
               }
    
            $html.='
            <td class="text-center">'.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].' </td>
            </tr>
              ';
        
        }
    
    
    }

}





for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 1;

                    // phase 7 term 1 arts
                    if($phase7_subject_id == 10 ){
                        $phase7_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                        $run_phase7_arts = mysqli_query($conn,$phase7_arts);
                        if(mysqli_num_rows($run_phase7_arts) > 0){
                            $rows = mysqli_fetch_array($run_phase7_arts);
                            while(mysqli_fetch_array($run_phase7_arts));

                            if($rows['grade'] == 0 ){
                                $rows['grade'] = " ";
                                }
        
                            $html.='
                            <tr>
                            <td class="small-pad-left italic">Arts</td>
                            <td class="text-center"> '.$rows['grade'].' </td>
                            ';
                        
                        }
        
        
                    }
        
}

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 2;

                    // phase 7 term 2 arts
                    if($phase7_subject_id == 10 ){
                        $phase7_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                        $run_phase7_arts = mysqli_query($conn,$phase7_arts);
                        if(mysqli_num_rows($run_phase7_arts) > 0){
                            $rows = mysqli_fetch_array($run_phase7_arts);
                            while(mysqli_fetch_array($run_phase7_arts));

                            if($rows['grade'] == 0 ){
                                $rows['grade'] = " ";
                                }
        
                            $html.='
                            <td class="text-center"> '.$rows['grade'].' </td>  ';
                        
                        }
        
        
                    }
}


for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 3;

                // phase 7 term 3 arts
                if($phase7_subject_id == 10 ){
                    $phase7_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                    $run_phase7_arts = mysqli_query($conn,$phase7_arts);
                    if(mysqli_num_rows($run_phase7_arts) > 0){
                        $rows = mysqli_fetch_array($run_phase7_arts);
                        while(mysqli_fetch_array($run_phase7_arts));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
        
                        $html.='
                        <td class="text-center"> '.$rows['grade'].' </td>  ';
                    
                    }
        
        
                }
        
}


//phase 7 term 4 

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
$term = 4;

                // phase 7 term 4 arts
                if($phase7_subject_id == 10 ){
                    $phase7_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                    $run_phase7_arts = mysqli_query($conn,$phase7_arts);
                    if(mysqli_num_rows($run_phase7_arts) > 0){
                        $rows = mysqli_fetch_array($run_phase7_arts);
                        while(mysqli_fetch_array($run_phase7_arts));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
        
                        $html.='
                        <td class="text-center"> '.$rows['grade'].' </td>  ';
                    
                    }
        
        
                }
}



for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
        // phase 7 final rating arts
if($phase7_subject_id == 10 ){
    $phase7_arts = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7'";
    $run_phase7_arts = mysqli_query($conn,$phase7_arts);
    if(mysqli_num_rows($run_phase7_arts) > 0){
        $rows = mysqli_fetch_array($run_phase7_arts);
        while(mysqli_fetch_array($run_phase7_arts));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center"> '.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
         ';
    
    }


}



}





for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 1;




            // phase 7 term 1 PE
            if($phase7_subject_id == 11 ){
                $phase7_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_pe = mysqli_query($conn,$phase7_pe);
                if(mysqli_num_rows($run_phase7_pe) > 0){
                    $rows = mysqli_fetch_array($run_phase7_pe);
                    while(mysqli_fetch_array($run_phase7_pe));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="small-pad-left italic">Physical Education</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                     ';
                
                }


            }
}

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 2;

            // phase 7 term 2 PE
            if($phase7_subject_id == 11 ){
                $phase7_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_pe = mysqli_query($conn,$phase7_pe);
                if(mysqli_num_rows($run_phase7_pe) > 0){
                    $rows = mysqli_fetch_array($run_phase7_pe);
                    while(mysqli_fetch_array($run_phase7_pe));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }


            }

}


for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 3;



        // phase 7 term 3 PE
        if($phase7_subject_id == 11 ){
            $phase7_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
            $run_phase7_pe = mysqli_query($conn,$phase7_pe);
            if(mysqli_num_rows($run_phase7_pe) > 0){
                $rows = mysqli_fetch_array($run_phase7_pe);
                while(mysqli_fetch_array($run_phase7_pe));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td>  ';
            
            }


        }
}


//phase 7 term 4 

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
$term = 4;

        // phase 7 term 4 PE
        if($phase7_subject_id == 11 ){
            $phase7_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
            $run_phase7_pe = mysqli_query($conn,$phase7_pe);
            if(mysqli_num_rows($run_phase7_pe) > 0){
                $rows = mysqli_fetch_array($run_phase7_pe);
                while(mysqli_fetch_array($run_phase7_pe));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td>  ';
            
            }


        }
}



for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
// phase 7 final rating PE
if($phase7_subject_id == 11 ){
    $phase7_pe = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7'";
    $run_phase7_pe = mysqli_query($conn,$phase7_pe);
    if(mysqli_num_rows($run_phase7_pe) > 0){
        $rows = mysqli_fetch_array($run_phase7_pe);
        while(mysqli_fetch_array($run_phase7_pe));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center"> '.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
       ';
    
    }


}


}





for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 1;

            // phase 7 term 1 Health
            if($phase7_subject_id == 12 ){
                $phase7_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_health = mysqli_query($conn,$phase7_health);
                if(mysqli_num_rows($run_phase7_health) > 0){
                    $rows = mysqli_fetch_array($run_phase7_health);
                    while(mysqli_fetch_array($run_phase7_health));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="small-pad-left italic">Health</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                      ';
                
                }


            }
            
}

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 2;
   // phase 7 term 2 Health
   if($phase7_subject_id == 12 ){
    $phase7_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
    $run_phase7_health = mysqli_query($conn,$phase7_health);
    if(mysqli_num_rows($run_phase7_health) > 0){
        $rows = mysqli_fetch_array($run_phase7_health);
        while(mysqli_fetch_array($run_phase7_health));

        if($rows['grade'] == 0 ){
            $rows['grade'] = " ";
            }

        $html.='
        <td class="text-center">'.$rows['grade'].'</td>  ';
    
    }


}
}


for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 3;
    // phase 7 term 3 Health
    if($phase7_subject_id == 12 ){
        $phase7_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
        $run_phase7_health = mysqli_query($conn,$phase7_health);
        if(mysqli_num_rows($run_phase7_health) > 0){
            $rows = mysqli_fetch_array($run_phase7_health);
            while(mysqli_fetch_array($run_phase7_health));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

            $html.='
            <td class="text-center">'.$rows['grade'].'</td>  ';
        
        }


    }
}


//phase 7 term 4 

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
$term = 4;



        // phase 7 term 4 Health
        if($phase7_subject_id == 12 ){
            $phase7_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
            $run_phase7_health = mysqli_query($conn,$phase7_health);
            if(mysqli_num_rows($run_phase7_health) > 0){
                $rows = mysqli_fetch_array($run_phase7_health);
                while(mysqli_fetch_array($run_phase7_health));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td>  ';
            
            }


        }
}



for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    

// phase 7 final rating Health
if($phase7_subject_id == 12 ){
    $phase7_health = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7'";
    $run_phase7_health = mysqli_query($conn,$phase7_health);
    if(mysqli_num_rows($run_phase7_health) > 0){
        $rows = mysqli_fetch_array($run_phase7_health);
        while(mysqli_fetch_array($run_phase7_health));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center"> '.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
         ';
    
    }


}


}





for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 1;




            // phase 7 term 1 eduk sa pag papakatao
            if($phase7_subject_id == 13 ){
                $phase7_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_esp = mysqli_query($conn,$phase7_esp);
                if(mysqli_num_rows($run_phase7_esp) > 0){
                    $rows = mysqli_fetch_array($run_phase7_esp);
                    while(mysqli_fetch_array($run_phase7_esp));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="subject">Eduk. Sa Pagpapakatao</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                   ';
                
                }


            }
}

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 2;

            // phase 7 term 2 eduk sa pag papakatao
            if($phase7_subject_id == 13 ){
                $phase7_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_esp = mysqli_query($conn,$phase7_esp);
                if(mysqli_num_rows($run_phase7_esp) > 0){
                    $rows = mysqli_fetch_array($run_phase7_esp);
                    while(mysqli_fetch_array($run_phase7_esp));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }


            }
}


for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 3;

        // phase 7 term 3 eduk sa pag papakatao
        if($phase7_subject_id == 13 ){
            $phase7_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
            $run_phase7_esp = mysqli_query($conn,$phase7_esp);
            if(mysqli_num_rows($run_phase7_esp) > 0){
                $rows = mysqli_fetch_array($run_phase7_esp);
                while(mysqli_fetch_array($run_phase7_esp));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td>  ';
            
            }


        }
}


//phase 7 term 4 

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
$term = 4;


        // phase 7 term 4 eduk sa pag papakatao
        if($phase7_subject_id == 13 ){
            $phase7_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
            $run_phase7_esp = mysqli_query($conn,$phase7_esp);
            if(mysqli_num_rows($run_phase7_esp) > 0){
                $rows = mysqli_fetch_array($run_phase7_esp);
                while(mysqli_fetch_array($run_phase7_esp));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td>  ';
            
            }


        }
}



for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    



// phase 7 final rating eduk sa pag papakatao
if($phase7_subject_id == 13 ){
    $phase7_esp = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7'";
    $run_phase7_esp = mysqli_query($conn,$phase7_esp);
    if(mysqli_num_rows($run_phase7_esp) > 0){
        $rows = mysqli_fetch_array($run_phase7_esp);
        while(mysqli_fetch_array($run_phase7_esp));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
       ';
    
    }


}

}


for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 1;

            // phase 7 term 1 arabic
            if($phase7_subject_id == 14 ){
                $phase7_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_arabic = mysqli_query($conn,$phase7_arabic);
                if(mysqli_num_rows($run_phase7_arabic) > 0){
                    $rows = mysqli_fetch_array($run_phase7_arabic);
                    while(mysqli_fetch_array($run_phase7_arabic));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="small-pad-left">*Arabic language</td>
                    <td class="text-center"> '.$rows['grade'].'</td>
                     ';
                
                }


            }
}

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 2;

            // phase 7 term 2 arabic
            if($phase7_subject_id == 14 ){
                $phase7_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_arabic = mysqli_query($conn,$phase7_arabic);
                if(mysqli_num_rows($run_phase7_arabic) > 0){
                    $rows = mysqli_fetch_array($run_phase7_arabic);
                    while(mysqli_fetch_array($run_phase7_arabic));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td>  ';
                
                }


            }

}


for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 3;


        // phase 7 term 3 arabic
        if($phase7_subject_id == 14 ){
            $phase7_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
            $run_phase7_arabic = mysqli_query($conn,$phase7_arabic);
            if(mysqli_num_rows($run_phase7_arabic) > 0){
                $rows = mysqli_fetch_array($run_phase7_arabic);
                while(mysqli_fetch_array($run_phase7_arabic));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center"> '.$rows['grade'].'</td>  ';
            
            }


        }
}


//phase 7 term 4 

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
$term = 4;
 // phase 7 term 4 arabic
 if($phase7_subject_id == 14 ){
    $phase7_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
    $run_phase7_arabic = mysqli_query($conn,$phase7_arabic);
    if(mysqli_num_rows($run_phase7_arabic) > 0){
        $rows = mysqli_fetch_array($run_phase7_arabic);
        while(mysqli_fetch_array($run_phase7_arabic));

        if($rows['grade'] == 0 ){
            $rows['grade'] = " ";
            }

        $html.='
        <td class="text-center"> '.$rows['grade'].'</td>  ';
    
    }


}
}



for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    


// phase 7 final rating arabic
if($phase7_subject_id == 14 ){
    $phase7_arabic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7'";
    $run_phase7_arabic = mysqli_query($conn,$phase7_arabic);
    if(mysqli_num_rows($run_phase7_arabic) > 0){
        $rows = mysqli_fetch_array($run_phase7_arabic);
        while(mysqli_fetch_array($run_phase7_arabic));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
        < ';
    
    }


}

}




for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 1;

            
            // phase 7 term 1 islamic
            if($phase7_subject_id == 15 ){
                $phase7_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_islamic = mysqli_query($conn,$phase7_islamic);
                if(mysqli_num_rows($run_phase7_islamic) > 0){
                    $rows = mysqli_fetch_array($run_phase7_islamic);
                    while(mysqli_fetch_array($run_phase7_islamic));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="small-pad-left">*Islamic values Education</td>
                    <td class="text-center"> '.$rows['grade'].'</td>
                   ';
                
                }


            }
}

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 2;

            // phase 7 term 2 islamic
            if($phase7_subject_id == 15 ){
                $phase7_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
                $run_phase7_islamic = mysqli_query($conn,$phase7_islamic);
                if(mysqli_num_rows($run_phase7_islamic) > 0){
                    $rows = mysqli_fetch_array($run_phase7_islamic);
                    while(mysqli_fetch_array($run_phase7_islamic));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td>  ';
                
                }


            }

}


for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 3;


        
        // phase 7 term 3 islamic
        if($phase7_subject_id == 15 ){
            $phase7_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
            $run_phase7_islamic = mysqli_query($conn,$phase7_islamic);
            if(mysqli_num_rows($run_phase7_islamic) > 0){
                $rows = mysqli_fetch_array($run_phase7_islamic);
                while(mysqli_fetch_array($run_phase7_islamic));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center"> '.$rows['grade'].'</td>  ';
                
            
            }


        }
}


//phase 7 term 4 

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
$term = 4;
  
        // phase 7 term 4 islamic
        if($phase7_subject_id == 15 ){
            $phase7_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7' AND term = '$term'";
            $run_phase7_islamic = mysqli_query($conn,$phase7_islamic);
            if(mysqli_num_rows($run_phase7_islamic) > 0){
                $rows = mysqli_fetch_array($run_phase7_islamic);
                while(mysqli_fetch_array($run_phase7_islamic));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center"> '.$rows['grade'].'</td>  ';
            
            }


        }
}



for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    


// phase 7 final rating islamic
if($phase7_subject_id == 15 ){
    $phase7_islamic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase7_subject_id' AND phase = '$phase7'";
    $run_phase7_islamic = mysqli_query($conn,$phase7_islamic);
    if(mysqli_num_rows($run_phase7_islamic) > 0){
        $rows = mysqli_fetch_array($run_phase7_islamic);
        while(mysqli_fetch_array($run_phase7_islamic));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
        ';
    
    }


}

}






for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 1;


            //phase 7 term 1 general average
            if( $phase7_subject_id == 16){
                $phase7_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase7' ";
                $run_phase7_term1_general_average = mysqli_query($conn,$phase7_term1_general_average_query);
                if(mysqli_num_rows($run_phase7_term1_general_average)> 0 ){
                    $rows = mysqli_fetch_array($run_phase7_term1_general_average);

                    if($rows['general_average'] == 0 ){
                        $rows['general_average'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="subject">General average</td>
                    <td class="insert-gen-av text-center">'.$rows['general_average'].'</td>
                     ';
                


                }
                


            }

}

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 2;
    //phase 7 term 2 general average
    if( $phase7_subject_id == 16){
        $phase7_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase7' ";
        $run_phase7_term1_general_average = mysqli_query($conn,$phase7_term1_general_average_query);
        if(mysqli_num_rows($run_phase7_term1_general_average)> 0 ){
            $rows = mysqli_fetch_array($run_phase7_term1_general_average);

            if($rows['general_average'] == 0 ){
                $rows['general_average'] = " ";
                }
            $html.='
            <td class="insert-gen-av text-center">'.$rows['general_average'].'</td>  ';
        


        }
        


    }

}


for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
    $term = 3;

        //phase 7 term 3 general average
        if( $phase7_subject_id == 16){
            $phase7_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase7' ";
            $run_phase7_term1_general_average = mysqli_query($conn,$phase7_term1_general_average_query);
            if(mysqli_num_rows($run_phase7_term1_general_average)> 0 ){
                $rows = mysqli_fetch_array($run_phase7_term1_general_average);

                if($rows['general_average'] == 0 ){
                    $rows['general_average'] = " ";
                    }
                $html.='
                <td class="insert-gen-av text-center">'.$rows['general_average'].'</td>  ';
            


            }
            


        }
}


//phase 7 term 4 

for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    
    
$term = 4;



        //phase 7 term 4 general average
        if( $phase7_subject_id == 16){
            $phase7_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase7' ";
            $run_phase7_term1_general_average = mysqli_query($conn,$phase7_term1_general_average_query);
            if(mysqli_num_rows($run_phase7_term1_general_average)> 0 ){
                $rows = mysqli_fetch_array($run_phase7_term1_general_average);

                if($rows['general_average'] == 0 ){
                    $rows['general_average'] = " ";
                    }

                $html.='
                  <td class="insert-gen-av text-center">'.$rows['general_average'].'</td>  ';
            


            }
            


        }
}



for ($phase7_subject_id = 1; $phase7_subject_id <= 16 ; $phase7_subject_id++) {
    




//phase 7 final rating general average
if( $phase7_subject_id == 16){
    $phase7_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND  phase = '$phase7' AND term = 'Final Rating' ";
    $run_phase7_term1_general_average = mysqli_query($conn,$phase7_term1_general_average_query);
    if(mysqli_num_rows($run_phase7_term1_general_average)> 0 ){
        $rows = mysqli_fetch_array($run_phase7_term1_general_average);

        if($rows['general_average'] == 0 ){
            $rows['general_average'] = " ";
            }


            //phase 7 remarks
            $sql_total_remarks_phase1 = "SELECT final_rating, final_rating, COUNT(remarks) AS 'total_remarks' , lrn FROM student_final_ratings 
            WHERE phase = '7' AND lrn = '$decrypted_lrn' AND remarks= 'FAILED' ";
            $run_total_remarks_phase1 = mysqli_query($conn,$sql_total_remarks_phase1);

            $remarks = mysqli_fetch_array($run_total_remarks_phase1);

            if($remarks['total_remarks'] == 15){
                $output = "";
              }else if($remarks['total_remarks'] >= 3){
                $output = "RETAINED";
              }else if ($remarks['total_remarks'] == 2){
                $output = "REMEDIAL";
              }else if($remarks['total_remarks'] <= 1){
                $output = "PROMOTED";
              }

        $html.='
        <td class="insert-gen-av text-center">'.$rows['general_average'].'</td> 
        <td class="text-center">'.$output.'</td>
       
        </tbody>
        </tr>
        ';

        //count

    }
    


}

}


$html.='
</table>


';


// ending of for loop end of phase 7  

/// remedial  here 
for($phase7_remedial_term = 1; $phase7_remedial_term <=2; $phase7_remedial_term++){

    if($phase7_remedial_term == 1 ){

        $phase7_remedial_query = " SELECT * FROM `remedial_classes` WHERE lrn ='$decrypted_lrn'AND phase = '$phase7' AND term = '$phase7_remedial_term' ";
        $phase7_run_query = mysqli_query($conn,$phase7_remedial_query);
        if(mysqli_num_rows($phase7_run_query)> 0 ){
            $rows = mysqli_fetch_array($phase7_run_query);
            while(mysqli_fetch_array($phase7_run_query));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
               }

               if($rows['recomputed_final_grade'] == 0 ){
                $rows['recomputed_final_grade'] = " ";
               }

               if($rows['date_from'] == "1970-01-01" || $rows['date_from'] == "0000-00-00"){
                $rows['date_from'] = "";
            }

            if($rows['date_to'] == "1970-01-01" || $rows['date_to'] == "0000-00-00"){
             $rows['date_to'] = "";
            }
            $html.='
            <table style="margin-top:4px;">
                <thead>
                    <tr class="remedial">
                        <th colspan="2">Remedial Classes</th>
                        <th colspan="2" class="text-start" style="border-right: none;"> Date Conducted: '.$rows['date_from'].'</th>
                        <th colspan="2" class="text-start" style="border-left: none;">To: '.$rows['date_to'].'</th>
                    </tr>
                    <tr class="arial-header text-center">
                        <td colspan="2">Learning Areas</td>
                        <td>Final Rating</td>
                        <td>Remedial Class <br> Mark</td>
                        <td>Recomputed <br> Final Grade</td>
                        <td>Remarks</td>
                    </tr>
                </thead>
                <tbody>
                <tr >
                    <td colspan="2" class="remedial-2 text-center">'.$rows['learning_areas'].'</td>
                    <td class="remedial-2 text-center">'.$rows['final_rating'].'</td>
                    <td class="remedial-2 text-center">'.$rows['remarks'].'</td>
                    <td class="remedial-2 text-center">'.$rows['recomputed_final_grade'].'</td>
                    <td class="remedial-2 text-center">'.$rows['remedial_class_mark'].'</td>
                </tr>
            ';
           
            
        }

    }
           
           
           
            
      

            // term 2
        if($phase7_remedial_term == 2 ){

            $phase7_remedial_query = " SELECT * FROM `remedial_classes` WHERE lrn ='$decrypted_lrn'AND phase = '$phase7' AND term = '$phase7_remedial_term' ";
        $phase7_run_query = mysqli_query($conn,$phase7_remedial_query);
        if(mysqli_num_rows($phase7_run_query)> 0 ){
            $rows = mysqli_fetch_array($phase7_run_query);
            while(mysqli_fetch_array($phase7_run_query));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
               }

               if($rows['recomputed_final_grade'] == 0 ){
                $rows['recomputed_final_grade'] = " ";
               }
            $html.='
            <tr >
                <td colspan="2" class="remedial-2 text-center">'.$rows['learning_areas'].'</td>
                <td class="remedial-2 text-center">'.$rows['final_rating'].'</td>
                <td class="remedial-2 text-center">'.$rows['remarks'].'</td>
                <td class="remedial-2 text-center">'.$rows['remedial_class_mark'].'</td>
                <td class="remedial-2 text-center">'.$rows['recomputed_final_grade'].'</td>
            </tr>
        </tbody>
    </table>   
    </td>
    <td style="width:.8em; border:none;">
    </td>
           ';
        }
//last 7
        }

    
}// end of remedial phase 7 


//start of phase 8 
// scholastic records phase 8 
// phase 8 scohlastic query 

$phase8_scholastic_query = "SELECT * FROM `scholastic_records` WHERE lrn = '$decrypted_lrn' AND phase = $phase8";
$run_phase8_scholastic = mysqli_query($conn,$phase8_scholastic_query);
if(mysqli_num_rows($run_phase8_scholastic) > 0){
    $rows = mysqli_fetch_array($run_phase8_scholastic);

    while(mysqli_fetch_array($run_phase8_scholastic));


   
    $html.='
    <td class="phase_8" style="width: 48%;  border:none;">
    <table class="phase_head">
        <tr>
            <td colspan="6"><span class="main-arial-text">School: <span style="font-weight: bold;">'.$rows['school'].'</span></span></td>
            <td colspan="6" style="text-align: right;><span class="main-arial-text">School ID: <span style="font-weight: bold;">'.$rows['school_id'].'</span></span></td>
        </tr>
        <tr>
            <td colspan="4"><span class="main-arial-text">District: <span style="font-weight: bold;">'.$rows['district'].'</span></span></td>
            <td colspan="4" style="text-align: center;"><span class="main-arial-text">Division: <span style="font-weight: bold;">'.$rows['division'].'</span></span></td>
            <td colspan="4" style="text-align: right;"><span class="main-arial-text">Region: <span style="font-weight: bold;">'.$rows['region'].'</span></span></td>
        </tr>
        <tr>
            <td colspan="3"><span class="main-arial-text">Classified as Grade: <span style="font-weight: bold;">'.$rows['classified_as_grade'].'</span></span></td>
            <td colspan="5" style="text-align: center;"><span class="main-arial-text" >Section: <span style="font-weight: bold;">'.$rows['section'].'</span></span></td>
            <td colspan="4" style="text-align: right;"><span class="main-arial-text">School year: <span style="font-weight: bold;">'.$rows['school_year'].'-2012</span></span></td>
        </tr>
        <tr>
            <td colspan="6"><span class="main-arial-text">Name of adviser: <span style="font-weight: bold;">'.$rows['name_of_teacher'].'</span></span></td>
            <td colspan="6" style="text-align: right;"><span class="main-arial-text">Signature:<span style="font-weight: bold;">'.$rows['signature'].'</span></span></td>
        </tr>
    </table>
';

}


$html.='
        <table>
            <thead>
                <tr>
                    <th rowspan="2">Learning Areas</th>
                    <th class="quarterly" colspan="4">Quarterly Rating</th>
                    <th colspan="1" class="final-rating" rowspan="2" >Final <br> Rating</th>
                    <th rowspan="2">Remarks</th>
                </tr>
                <tr class="quarter">
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                </tr>
            </thead>    
            <tbody> 
';

//phase 8 term 1 

for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 1;
    

            if($phase8_subject_id == 1){
        
                        //phase 1 term 1 mother tongue 
                $phase8_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_mt = mysqli_query($conn,$phase8_mt);
                if(mysqli_num_rows($run_phase8_mt) > 0){
                    $rows = mysqli_fetch_array($run_phase8_mt);
                    while(mysqli_fetch_array($run_phase8_mt));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                        $html.=' 
                        <tr>
                        <td class="subject">Mother&#8216s Tongue</td>
                        <td class="text-center">'.$rows['grade'].'</td>
                        ';
                    
                    }
                }
            }

            


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 2;

    if($phase8_subject_id == 1){
        
        //phase 1 term 2 mother tongue 
$phase8_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
$run_phase8_mt = mysqli_query($conn,$phase8_mt);
if(mysqli_num_rows($run_phase8_mt) > 0){
    $rows = mysqli_fetch_array($run_phase8_mt);
    while(mysqli_fetch_array($run_phase8_mt));

    if($rows['grade'] == 0 ){
        $rows['grade'] = " ";
        }

        $html.='   <td class="text-center">'.$rows['grade'].'</td>  ';
    
    }
}

}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 3;

    if($phase8_subject_id == 1){
    
        //phase 1 term 3 mother tongue 
$phase8_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
$run_phase8_mt = mysqli_query($conn,$phase8_mt);
if(mysqli_num_rows($run_phase8_mt) > 0){
    $rows = mysqli_fetch_array($run_phase8_mt);
    while(mysqli_fetch_array($run_phase8_mt));

    if($rows['grade'] == 0 ){
        $rows['grade'] = " ";
        }

        $html.='  <td class="text-center">'.$rows['grade'].'</td> ';
    
    }
}
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 4;

//phase 8 term 4 



if($phase8_subject_id == 1){
    
    //phase 8 term 4 mother tongue 
$phase8_mt = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
$run_phase8_mt = mysqli_query($conn,$phase8_mt);
if(mysqli_num_rows($run_phase8_mt) > 0){
$rows = mysqli_fetch_array($run_phase8_mt);
while(mysqli_fetch_array($run_phase8_mt));

if($rows['grade'] == 0 ){
    $rows['grade'] = " ";
    }

    $html.='  <td class="text-center">'.$rows['grade'].'</td>  ';

}
}

}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {



    if($phase8_subject_id == 1){

        //phase 1 final rating mother tongue 
$phase8_mt = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8'";
$run_phase8_mt = mysqli_query($conn,$phase8_mt);
if(mysqli_num_rows($run_phase8_mt) > 0){
    $rows = mysqli_fetch_array($run_phase8_mt);
    while(mysqli_fetch_array($run_phase8_mt));

    if($rows['final_rating'] == 0 ){
        $rows['final_rating'] = " ";
        $rows['remarks'] = " ";
       }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="insert-remarks text-center"> '.$rows['remarks'].'</td>
        </tr>
        ';
    
    }
}

}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 1;
    
            // phase 8 term 1 filipino

            if($phase8_subject_id == 2 ){
                $phase8_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_filipino = mysqli_query($conn,$phase8_filipino);
                if(mysqli_num_rows($run_phase8_filipino) > 0){
                    $rows = mysqli_fetch_array($run_phase8_filipino);
                    while(mysqli_fetch_array($run_phase8_filipino));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                        $html.='
                        <tr>
                        <td class="subject">Filipino</td>
                        <td class="text-center"> '.$rows['grade'].'</td>
                        ';
                    
                    }

            
                }
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 2;

            //phase 1 term 2 filipino

            if($phase8_subject_id == 2 ){
                $phase8_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_filipino = mysqli_query($conn,$phase8_filipino);
                if(mysqli_num_rows($run_phase8_filipino) > 0){
                    $rows = mysqli_fetch_array($run_phase8_filipino);
                    while(mysqli_fetch_array($run_phase8_filipino));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                        $html.='
                        <td class="text-center"> '.$rows['grade'].'</td>  ';
                    
                    }

            
                }
}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 3;


        //phase 1 term 3 filipino

        if($phase8_subject_id == 2 ){
            $phase8_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
            $run_phase8_filipino = mysqli_query($conn,$phase8_filipino);
            if(mysqli_num_rows($run_phase8_filipino) > 0){
                $rows = mysqli_fetch_array($run_phase8_filipino);
                while(mysqli_fetch_array($run_phase8_filipino));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td>  ';
                
                }

        
            }

}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 4;


        //phase 8 term 4 filipino

        if($phase8_subject_id == 2 ){
            $phase8_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
            $run_phase8_filipino = mysqli_query($conn,$phase8_filipino);
            if(mysqli_num_rows($run_phase8_filipino) > 0){
                $rows = mysqli_fetch_array($run_phase8_filipino);
                while(mysqli_fetch_array($run_phase8_filipino));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td> ';
                
                }

        
            }

}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {


//phase 1 final rating filipino

if($phase8_subject_id == 2 ){
    $phase8_filipino = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8'";
    $run_phase8_filipino = mysqli_query($conn,$phase8_filipino);
    if(mysqli_num_rows($run_phase8_filipino) > 0){
        $rows = mysqli_fetch_array($run_phase8_filipino);
        while(mysqli_fetch_array($run_phase8_filipino));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

            $html.='
            <td class="text-center">'.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].'</td>
            </tr>
            ';
        
        }


    }
}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 1;
    // phase 8 term 1 english 

    if($phase8_subject_id == 3 ){
        $phase8_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
        $run_phase8_english = mysqli_query($conn,$phase8_english);
        if(mysqli_num_rows($run_phase8_english) > 0){
            $rows = mysqli_fetch_array($run_phase8_english);
            while(mysqli_fetch_array($run_phase8_english));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

                $html.='
                <tr>
                <td class="subject">English</td>
                <td class="text-center"> '.$rows['grade'].'</td>
               ';
            
            }

    
        }
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 2;

            // phase 8 term 2 english 

            if($phase8_subject_id == 3 ){
                $phase8_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_english = mysqli_query($conn,$phase8_english);
                if(mysqli_num_rows($run_phase8_english) > 0){
                    $rows = mysqli_fetch_array($run_phase8_english);
                    while(mysqli_fetch_array($run_phase8_english));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                        $html.='
                        <td class="text-center"> '.$rows['grade'].'</td> ';
                    
                    }

            
                }
}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 3;

        // phase 8 term 3 english 

        if($phase8_subject_id == 3 ){
            $phase8_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
            $run_phase8_english = mysqli_query($conn,$phase8_english);
            if(mysqli_num_rows($run_phase8_english) > 0){
                $rows = mysqli_fetch_array($run_phase8_english);
                while(mysqli_fetch_array($run_phase8_english));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td> ';
                
                }

        
            }
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 4;

        // phase 8 term 4 english 

        if($phase8_subject_id == 3 ){
            $phase8_english = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
            $run_phase8_english = mysqli_query($conn,$phase8_english);
            if(mysqli_num_rows($run_phase8_english) > 0){
                $rows = mysqli_fetch_array($run_phase8_english);
                while(mysqli_fetch_array($run_phase8_english));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td>  ';
                
                }

        
            }


}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {

// phase 8 final rating english 

if($phase8_subject_id == 3 ){
    $phase8_english = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8'";
    $run_phase8_english = mysqli_query($conn,$phase8_english);
    if(mysqli_num_rows($run_phase8_english) > 0){
        $rows = mysqli_fetch_array($run_phase8_english);
        while(mysqli_fetch_array($run_phase8_english));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

            $html.='
            <td class="text-center">'.$rows['final_rating'].' </td>
            <td class="insert-remarks text-center"> '.$rows['remarks'].'</td>
            </tr>
             ';
        
        }


    }
}
     

for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 1;
    
            // phase 8 term 1 math

            if($phase8_subject_id == 4 ){
                $phase8_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_math = mysqli_query($conn,$phase8_math);
                if(mysqli_num_rows($run_phase8_math) > 0){
                    $rows = mysqli_fetch_array($run_phase8_math);
                    while(mysqli_fetch_array($run_phase8_math));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                        $html.='
                        <tr>
                        <td class="subject">Mathematics</td>
                        <td class="text-center">'.$rows['grade'].'</td>
                        ';
                    
                    }   

            
                }
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 2;




            // phase 8 term 2 math

            if($phase8_subject_id == 4 ){
                $phase8_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_math = mysqli_query($conn,$phase8_math);
                if(mysqli_num_rows($run_phase8_math) > 0){
                    $rows = mysqli_fetch_array($run_phase8_math);
                    while(mysqli_fetch_array($run_phase8_math));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                        $html.='
                        <td class="text-center">'.$rows['grade'].'</td> ';
                    
                    }   

            
                }
}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 3;

        //phase 1 term 3 math

        if($phase8_subject_id == 4 ){
            $phase8_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
            $run_phase8_math = mysqli_query($conn,$phase8_math);
            if(mysqli_num_rows($run_phase8_math) > 0){
                $rows = mysqli_fetch_array($run_phase8_math);
                while(mysqli_fetch_array($run_phase8_math));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td> ';
                
                }   

        
            }

}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 4;

        //phase 1 term 4 math

        if($phase8_subject_id == 4 ){
            $phase8_math = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
            $run_phase8_math = mysqli_query($conn,$phase8_math);
            if(mysqli_num_rows($run_phase8_math) > 0){
                $rows = mysqli_fetch_array($run_phase8_math);
                while(mysqli_fetch_array($run_phase8_math));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }   

        
            }

}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {


// phase 8 final rating math

if($phase8_subject_id == 4 ){
    $phase8_math = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8'";
    $run_phase8_math = mysqli_query($conn,$phase8_math);
    if(mysqli_num_rows($run_phase8_math) > 0){
        $rows = mysqli_fetch_array($run_phase8_math);
        while(mysqli_fetch_array($run_phase8_math));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

            $html.='
            <td class="text-center">'.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].' </td>
            </tr>
            ';
        
        }   


    }
}       


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 1;
    
                // phase 8 term 1 science

                if($phase8_subject_id == 5 ){
                    $phase8_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                    $run_phase8_science = mysqli_query($conn,$phase8_science);
                    if(mysqli_num_rows($run_phase8_science) > 0){
                        $rows = mysqli_fetch_array($run_phase8_science);
                        while(mysqli_fetch_array($run_phase8_science));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
    
                            $html.='
                            <tr>
                            <td class="subject">Science</td>
                            <td class="text-center">'.$rows['grade'].'</td>
                          ';
                        
                        }
    
                
                    }
    
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 2;


                // phase 8 term 2 science

                if($phase8_subject_id == 5 ){
                    $phase8_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                    $run_phase8_science = mysqli_query($conn,$phase8_science);
                    if(mysqli_num_rows($run_phase8_science) > 0){
                        $rows = mysqli_fetch_array($run_phase8_science);
                        while(mysqli_fetch_array($run_phase8_science));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
    
                            $html.='
                            <td class="text-center">'.$rows['grade'].'</td>  ';
                        
                        }
    
                
                    }
    
}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 3;


            // phase 8 term 3 science

            if($phase8_subject_id == 5 ){
                $phase8_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_science = mysqli_query($conn,$phase8_science);
                if(mysqli_num_rows($run_phase8_science) > 0){
                    $rows = mysqli_fetch_array($run_phase8_science);
                    while(mysqli_fetch_array($run_phase8_science));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
    
                        $html.='
                        <td class="text-center">'.$rows['grade'].'</td>  ';
                    
                    }
    
            
                }
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 4;


            // phase 8 term 4 science

            if($phase8_subject_id == 5 ){
                $phase8_science = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_science = mysqli_query($conn,$phase8_science);
                if(mysqli_num_rows($run_phase8_science) > 0){
                    $rows = mysqli_fetch_array($run_phase8_science);
                    while(mysqli_fetch_array($run_phase8_science));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
    
                        $html.='
                        <td class="text-center">'.$rows['grade'].'</td>  ';
                    
                    }
    
            
                }
    

}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {

    // phase 8 final rating science

    if($phase8_subject_id == 5 ){
        $phase8_science = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8'";
        $run_phase8_science = mysqli_query($conn,$phase8_science);
        if(mysqli_num_rows($run_phase8_science) > 0){
            $rows = mysqli_fetch_array($run_phase8_science);
            while(mysqli_fetch_array($run_phase8_science));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
                $rows['remarks'] = " ";
               }
    
                $html.='
                <td class="text-center">'.$rows['final_rating'].'</td>
                <td class="insert-remarks text-center"> '.$rows['remarks'].'</td>
                </tr>
                 ';
            
            }
    
    
        }
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 1;
    
                // phase 8 term 1 ap
                if($phase8_subject_id == 6 ){
                    $phase8_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                    $run_phase8_AP = mysqli_query($conn,$phase8_AP);
                    if(mysqli_num_rows($run_phase8_AP) > 0){
                        $rows = mysqli_fetch_array($run_phase8_AP);
                        while(mysqli_fetch_array($run_phase8_AP));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
    
                        $html.='
                        <tr>
                        <td class="subject">Araling Panlipunan</td>
                        <td class="text-center"> '.$rows['grade'].'</td>
                     ';
                    
                    }
    
    
                }
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 2;

                // phase 8 term 2 ap
                if($phase8_subject_id == 6 ){
                    $phase8_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                    $run_phase8_AP = mysqli_query($conn,$phase8_AP);
                    if(mysqli_num_rows($run_phase8_AP) > 0){
                        $rows = mysqli_fetch_array($run_phase8_AP);
                        while(mysqli_fetch_array($run_phase8_AP));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
    
                        $html.='
                        <td class="text-center"> '.$rows['grade'].'</td>  ';
                    
                    }
    
    
                }
}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 3;

            // phase 8 term 3 ap
            if($phase8_subject_id == 6 ){
                $phase8_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_AP = mysqli_query($conn,$phase8_AP);
                if(mysqli_num_rows($run_phase8_AP) > 0){
                    $rows = mysqli_fetch_array($run_phase8_AP);
                    while(mysqli_fetch_array($run_phase8_AP));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }
    
                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td>  ';
                
                }
    
    
            }
    
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 4;
           // phase 8 term 4 ap
           if($phase8_subject_id == 6 ){
            $phase8_AP = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
            $run_phase8_AP = mysqli_query($conn,$phase8_AP);
            if(mysqli_num_rows($run_phase8_AP) > 0){
                $rows = mysqli_fetch_array($run_phase8_AP);
                while(mysqli_fetch_array($run_phase8_AP));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                  <td class="text-center"> '.$rows['grade'].'</td> ';
            
            }


        }


}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {

    // phase 8 final rating ap
    if($phase8_subject_id == 6 ){
        $phase8_AP = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8'";
        $run_phase8_AP = mysqli_query($conn,$phase8_AP);
        if(mysqli_num_rows($run_phase8_AP) > 0){
            $rows = mysqli_fetch_array($run_phase8_AP);
            while(mysqli_fetch_array($run_phase8_AP));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
                $rows['remarks'] = " ";
               }
    
            $html.='
            <td class="text-center">'.$rows['final_rating'].'</td>
            <td class="text-center"> '.$rows['remarks'].' </td>
            </tr>
             ';
        
        }
    
    
    }
    
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 1;
    
            // phase 8 term 1 EPP_TLE
            if($phase8_subject_id == 7 ){
                $phase8_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_ep_tle = mysqli_query($conn,$phase8_epp_tle);
                if(mysqli_num_rows($run_phase8_ep_tle) > 0){
                    $rows = mysqli_fetch_array($run_phase8_ep_tle);
                    while(mysqli_fetch_array($run_phase8_ep_tle));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="subject">EPP/TLE</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                  ';
                
                }


            }
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 2;


            // phase 8 term 2 EPP_TLE
            if($phase8_subject_id == 7 ){
                $phase8_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_ep_tle = mysqli_query($conn,$phase8_epp_tle);
                if(mysqli_num_rows($run_phase8_ep_tle) > 0){
                    $rows = mysqli_fetch_array($run_phase8_ep_tle);
                    while(mysqli_fetch_array($run_phase8_ep_tle));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }


            }
}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 3;


        // phase 8 term 3 EPP_TLE
        if($phase8_subject_id == 7 ){
            $phase8_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
            $run_phase8_ep_tle = mysqli_query($conn,$phase8_epp_tle);
            if(mysqli_num_rows($run_phase8_ep_tle) > 0){
                $rows = mysqli_fetch_array($run_phase8_ep_tle);
                while(mysqli_fetch_array($run_phase8_ep_tle));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td> ';
            
            }


        }
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 4;

        // phase 8 term 4 EPP_TLE
        if($phase8_subject_id == 7 ){
            $phase8_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
            $run_phase8_ep_tle = mysqli_query($conn,$phase8_epp_tle);
            if(mysqli_num_rows($run_phase8_ep_tle) > 0){
                $rows = mysqli_fetch_array($run_phase8_ep_tle);
                while(mysqli_fetch_array($run_phase8_ep_tle));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td> ';
            
            }


        }

}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {




// phase 8 final rating EPP_TLE
if($phase8_subject_id == 7 ){
    $phase8_epp_tle = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8'";
    $run_phase8_ep_tle = mysqli_query($conn,$phase8_epp_tle);
    if(mysqli_num_rows($run_phase8_ep_tle) > 0){
        $rows = mysqli_fetch_array($run_phase8_ep_tle);
        while(mysqli_fetch_array($run_phase8_ep_tle));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
       ';
    
    }


}

}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 1;
    
            // phase 8 term 1 MAPEH
            if($phase8_subject_id == 8 ){
                $phase8_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_mapeh = mysqli_query($conn,$phase8_mapeh);
                if(mysqli_num_rows($run_phase8_mapeh) > 0){
                    $rows = mysqli_fetch_array($run_phase8_mapeh);
                    while(mysqli_fetch_array($run_phase8_mapeh));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="subject">MAPEH</td>
                    <td class="text-center"> '.$rows['grade'].'</td>
                     ';
                
                }


            }
            
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 2;



            // phase 8 term 2 MAPEH
            if($phase8_subject_id == 8 ){
                $phase8_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_mapeh = mysqli_query($conn,$phase8_mapeh);
                if(mysqli_num_rows($run_phase8_mapeh) > 0){
                    $rows = mysqli_fetch_array($run_phase8_mapeh);
                    while(mysqli_fetch_array($run_phase8_mapeh));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td>  ';
                
                }


            }
}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 3;

        // phase 8 term 3 MAPEH
        if($phase8_subject_id == 8 ){
            $phase8_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
            $run_phase8_mapeh = mysqli_query($conn,$phase8_mapeh);
            if(mysqli_num_rows($run_phase8_mapeh) > 0){
                $rows = mysqli_fetch_array($run_phase8_mapeh);
                while(mysqli_fetch_array($run_phase8_mapeh));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center"> '.$rows['grade'].'</td>  ';
            
            }


        }
        
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 4;

    // phase 8 term 4 MAPEH
    if($phase8_subject_id == 8 ){
        $phase8_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
        $run_phase8_mapeh = mysqli_query($conn,$phase8_mapeh);
        if(mysqli_num_rows($run_phase8_mapeh) > 0){
            $rows = mysqli_fetch_array($run_phase8_mapeh);
            while(mysqli_fetch_array($run_phase8_mapeh));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

            $html.='
            <td class="text-center"> '.$rows['grade'].'</td>  ';
        
        }


    }
}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {



// phase 8 final rating MAPEH
if($phase8_subject_id == 8 ){
    $phase8_mapeh = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8'";
    $run_phase8_mapeh = mysqli_query($conn,$phase8_mapeh);
    if(mysqli_num_rows($run_phase8_mapeh) > 0){
        $rows = mysqli_fetch_array($run_phase8_mapeh);
        while(mysqli_fetch_array($run_phase8_mapeh));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center"> '.$rows['final_rating'].'</td>
        <td class="insert-remarks text-center"> '.$rows['remarks'].'</td>
        </tr>
         ';
    
    }


}
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 1;
          // phase 8 term 1 music
          if($phase8_subject_id == 9 ){
            $phase8_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
            $run_phase8_music = mysqli_query($conn,$phase8_music);
            if(mysqli_num_rows($run_phase8_music) > 0){
                $rows = mysqli_fetch_array($run_phase8_music);
                while(mysqli_fetch_array($run_phase8_music));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <tr>
                <td class="small-pad-left italic">Music</td>
                <td class="text-center">'.$rows['grade'].'</td>
                  ';
            
            }


        }
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 2;
          
                // phase 8 term 2 music
                if($phase8_subject_id == 9 ){
                    $phase8_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                    $run_phase8_music = mysqli_query($conn,$phase8_music);
                    if(mysqli_num_rows($run_phase8_music) > 0){
                        $rows = mysqli_fetch_array($run_phase8_music);
                        while(mysqli_fetch_array($run_phase8_music));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
    
                        $html.='
                        <td class="text-center">'.$rows['grade'].'</td>  ';
                    
                    }
    
    
                }
}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 3;
       // phase 8 term 3 music
       if($phase8_subject_id == 9 ){
        $phase8_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
        $run_phase8_music = mysqli_query($conn,$phase8_music);
        if(mysqli_num_rows($run_phase8_music) > 0){
            $rows = mysqli_fetch_array($run_phase8_music);
            while(mysqli_fetch_array($run_phase8_music));

            if($rows['grade'] == 0 ){
                $rows['grade'] = " ";
                }

            $html.='
            <td class="text-center">'.$rows['grade'].'</td>  ';
        
        }


    }

}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 4;
   // phase 8 term 4 music
   if($phase8_subject_id == 9 ){
    $phase8_music = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
    $run_phase8_music = mysqli_query($conn,$phase8_music);
    if(mysqli_num_rows($run_phase8_music) > 0){
        $rows = mysqli_fetch_array($run_phase8_music);
        while(mysqli_fetch_array($run_phase8_music));

        if($rows['grade'] == 0 ){
            $rows['grade'] = " ";
            }

        $html.='
        <td class="text-center">'.$rows['grade'].'</td> ';
    
    }


}

}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {

    // phase 8 final rating music
    if($phase8_subject_id == 9 ){
        $phase8_music = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8'";
        $run_phase8_music = mysqli_query($conn,$phase8_music);
        if(mysqli_num_rows($run_phase8_music) > 0){
            $rows = mysqli_fetch_array($run_phase8_music);
            while(mysqli_fetch_array($run_phase8_music));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
                $rows['remarks'] = " ";
               }
    
            $html.='
            <td class="text-center"> '.$rows['final_rating'].'</td>
            <td class="text-center">'.$rows['remarks'].'</td>
            </tr>
              ';
        
        }
    
    
    }
}
          


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 1;
             // phase 8 term 1 arts
             if($phase8_subject_id == 10 ){
                $phase8_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_arts = mysqli_query($conn,$phase8_arts);
                if(mysqli_num_rows($run_phase8_arts) > 0){
                    $rows = mysqli_fetch_array($run_phase8_arts);
                    while(mysqli_fetch_array($run_phase8_arts));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="small-pad-left italic">Arts</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                   ';
                
                }


            }
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 2;


                    // phase 8 term 2 arts
                    if($phase8_subject_id == 10 ){
                        $phase8_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                        $run_phase8_arts = mysqli_query($conn,$phase8_arts);
                        if(mysqli_num_rows($run_phase8_arts) > 0){
                            $rows = mysqli_fetch_array($run_phase8_arts);
                            while(mysqli_fetch_array($run_phase8_arts));

                            if($rows['grade'] == 0 ){
                                $rows['grade'] = " ";
                                }
        
                            $html.='
                            <td class="text-center">'.$rows['grade'].'</td>  ';
                        
                        }
        
        
                    }
        
}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 3;


                // phase 8 term 3 arts
                if($phase8_subject_id == 10 ){
                    $phase8_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                    $run_phase8_arts = mysqli_query($conn,$phase8_arts);
                    if(mysqli_num_rows($run_phase8_arts) > 0){
                        $rows = mysqli_fetch_array($run_phase8_arts);
                        while(mysqli_fetch_array($run_phase8_arts));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
        
                        $html.='
                        <td class="text-center">'.$rows['grade'].'</td> ';
                    
                    }
        
        
                }
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 4;


                // phase 8 term 4 arts
                if($phase8_subject_id == 10 ){
                    $phase8_arts = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                    $run_phase8_arts = mysqli_query($conn,$phase8_arts);
                    if(mysqli_num_rows($run_phase8_arts) > 0){
                        $rows = mysqli_fetch_array($run_phase8_arts);
                        while(mysqli_fetch_array($run_phase8_arts));

                        if($rows['grade'] == 0 ){
                            $rows['grade'] = " ";
                            }
        
                        $html.='
                        <td class="text-center">'.$rows['grade'].'</td>  ';
                    
                    }
        
        
                }
        

}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {



        // phase 8 final rating arts
        if($phase8_subject_id == 10 ){
            $phase8_arts = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8'";
            $run_phase8_arts = mysqli_query($conn,$phase8_arts);
            if(mysqli_num_rows($run_phase8_arts) > 0){
                $rows = mysqli_fetch_array($run_phase8_arts);
                while(mysqli_fetch_array($run_phase8_arts));

                if($rows['final_rating'] == 0 ){
                    $rows['final_rating'] = " ";
                    $rows['remarks'] = " ";
                   }
        
                $html.='
                <td class="text-center">'.$rows['final_rating'].'</td>
                <td class="text-center">'.$rows['remarks'].'</td>
                </tr>
                ';
            
            }
        
        
        }
}

       

for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 1;
    
            // phase 8 term 1 PE
            if($phase8_subject_id == 11 ){
                $phase8_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_pe = mysqli_query($conn,$phase8_pe);
                if(mysqli_num_rows($run_phase8_pe) > 0){
                    $rows = mysqli_fetch_array($run_phase8_pe);
                    while(mysqli_fetch_array($run_phase8_pe));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="small-pad-left italic">Physical Education</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                   ';
                
                }


            }
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 2;

            // phase 8 term 2 PE
            if($phase8_subject_id == 11 ){
                $phase8_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_pe = mysqli_query($conn,$phase8_pe);
                if(mysqli_num_rows($run_phase8_pe) > 0){
                    $rows = mysqli_fetch_array($run_phase8_pe);
                    while(mysqli_fetch_array($run_phase8_pe));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }


            }

}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 3;


        // phase 8 term 3 PE
        if($phase8_subject_id == 11 ){
            $phase8_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
            $run_phase8_pe = mysqli_query($conn,$phase8_pe);
            if(mysqli_num_rows($run_phase8_pe) > 0){
                $rows = mysqli_fetch_array($run_phase8_pe);
                while(mysqli_fetch_array($run_phase8_pe));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td>  ';
            
            }


        }
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 4;
// phase 8 term 4 PE
if($phase8_subject_id == 11 ){
    $phase8_pe = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
    $run_phase8_pe = mysqli_query($conn,$phase8_pe);
    if(mysqli_num_rows($run_phase8_pe) > 0){
        $rows = mysqli_fetch_array($run_phase8_pe);
        while(mysqli_fetch_array($run_phase8_pe));

        if($rows['grade'] == 0 ){
            $rows['grade'] = " ";
            }

        $html.='
        <td class="text-center">'.$rows['grade'].'</td>  ';
    
    }


}

}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {

// phase 8 final rating PE
if($phase8_subject_id == 11 ){
    $phase8_pe = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8'";
    $run_phase8_pe = mysqli_query($conn,$phase8_pe);
    if(mysqli_num_rows($run_phase8_pe) > 0){
        $rows = mysqli_fetch_array($run_phase8_pe);
        while(mysqli_fetch_array($run_phase8_pe));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
         ';
    
    }


}
}    




for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 1;
    
            // phase 8 term 1 Health
            if($phase8_subject_id == 12 ){
                $phase8_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_health = mysqli_query($conn,$phase8_health);
                if(mysqli_num_rows($run_phase8_health) > 0){
                    $rows = mysqli_fetch_array($run_phase8_health);
                    while(mysqli_fetch_array($run_phase8_health));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="small-pad-left italic">Health</td>
                    <td class="text-center"> '.$rows['grade'].'</td>
                ';
                
                }


            }
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 2;


            // phase 8 term 2 Health
            if($phase8_subject_id == 12 ){
                $phase8_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_health = mysqli_query($conn,$phase8_health);
                if(mysqli_num_rows($run_phase8_health) > 0){
                    $rows = mysqli_fetch_array($run_phase8_health);
                    while(mysqli_fetch_array($run_phase8_health));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td> ';
                
                }


            }
            
}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 3;


        // phase 8 term 3 Health
        if($phase8_subject_id == 12 ){
            $phase8_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
            $run_phase8_health = mysqli_query($conn,$phase8_health);
            if(mysqli_num_rows($run_phase8_health) > 0){
                $rows = mysqli_fetch_array($run_phase8_health);
                while(mysqli_fetch_array($run_phase8_health));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center"> '.$rows['grade'].'</td> ';
            
            }


        }
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 4;



        // phase 8 term 4 Health
        if($phase8_subject_id == 12 ){
            $phase8_health = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
            $run_phase8_health = mysqli_query($conn,$phase8_health);
            if(mysqli_num_rows($run_phase8_health) > 0){
                $rows = mysqli_fetch_array($run_phase8_health);
                while(mysqli_fetch_array($run_phase8_health));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center"> '.$rows['grade'].'</td> ';
            
            }


        }

}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {


// phase 8 final rating Health
if($phase8_subject_id == 12 ){
    $phase8_health = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8'";
    $run_phase8_health = mysqli_query($conn,$phase8_health);
    if(mysqli_num_rows($run_phase8_health) > 0){
        $rows = mysqli_fetch_array($run_phase8_health);
        while(mysqli_fetch_array($run_phase8_health));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
         ';
    
    }


}
}

   

for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 1;
    
            // phase 8 term 1 eduk sa pag papakatao
            if($phase8_subject_id == 13 ){
                $phase8_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_esp = mysqli_query($conn,$phase8_esp);
                if(mysqli_num_rows($run_phase8_esp) > 0){
                    $rows = mysqli_fetch_array($run_phase8_esp);
                    while(mysqli_fetch_array($run_phase8_esp));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="subject">Eduk. Sa Pagpapakatao</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                   ';
                
                }


            }

}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 2;


            // phase 8 term 2 eduk sa pag papakatao
            if($phase8_subject_id == 13 ){
                $phase8_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_esp = mysqli_query($conn,$phase8_esp);
                if(mysqli_num_rows($run_phase8_esp) > 0){
                    $rows = mysqli_fetch_array($run_phase8_esp);
                    while(mysqli_fetch_array($run_phase8_esp));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }


            }
}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 3;
 // phase 8 term 3 eduk sa pag papakatao
 if($phase8_subject_id == 13 ){
    $phase8_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
    $run_phase8_esp = mysqli_query($conn,$phase8_esp);
    if(mysqli_num_rows($run_phase8_esp) > 0){
        $rows = mysqli_fetch_array($run_phase8_esp);
        while(mysqli_fetch_array($run_phase8_esp));

        if($rows['grade'] == 0 ){
            $rows['grade'] = " ";
            }

        $html.='
        <td class="text-center">'.$rows['grade'].'</td>  ';
    
    }


}
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 4;
  

        // phase 8 term 4 eduk sa pag papakatao
        if($phase8_subject_id == 13 ){
            $phase8_esp = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
            $run_phase8_esp = mysqli_query($conn,$phase8_esp);
            if(mysqli_num_rows($run_phase8_esp) > 0){
                $rows = mysqli_fetch_array($run_phase8_esp);
                while(mysqli_fetch_array($run_phase8_esp));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td>  ';
            
            }


        }

}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {

// phase 8 final rating eduk sa pag papakatao
if($phase8_subject_id == 13 ){
    $phase8_esp = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8'";
    $run_phase8_esp = mysqli_query($conn,$phase8_esp);
    if(mysqli_num_rows($run_phase8_esp) > 0){
        $rows = mysqli_fetch_array($run_phase8_esp);
        while(mysqli_fetch_array($run_phase8_esp));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center"> '.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
         ';
    
    }


}

}         



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 1;
    
            // phase 8 term 1 arabic
            if($phase8_subject_id == 14 ){
                $phase8_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_arabic = mysqli_query($conn,$phase8_arabic);
                if(mysqli_num_rows($run_phase8_arabic) > 0){
                    $rows = mysqli_fetch_array($run_phase8_arabic);
                    while(mysqli_fetch_array($run_phase8_arabic));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="small-pad-left">*Arabic language</td>
                    <td class="text-center"> '.$rows['grade'].'</td>
                    ';
                
                }


            }
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 2;


            // phase 8 term 2 arabic
            if($phase8_subject_id == 14 ){
                $phase8_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_arabic = mysqli_query($conn,$phase8_arabic);
                if(mysqli_num_rows($run_phase8_arabic) > 0){
                    $rows = mysqli_fetch_array($run_phase8_arabic);
                    while(mysqli_fetch_array($run_phase8_arabic));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center"> '.$rows['grade'].'</td>  ';
                
                }


            }

}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 3;


        // phase 8 term 3 arabic
        if($phase8_subject_id == 14 ){
            $phase8_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
            $run_phase8_arabic = mysqli_query($conn,$phase8_arabic);
            if(mysqli_num_rows($run_phase8_arabic) > 0){
                $rows = mysqli_fetch_array($run_phase8_arabic);
                while(mysqli_fetch_array($run_phase8_arabic));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center"> '.$rows['grade'].'</td>  ';
            
            }


        }
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 4;



        // phase 8 term 4 arabic
        if($phase8_subject_id == 14 ){
            $phase8_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
            $run_phase8_arabic = mysqli_query($conn,$phase8_arabic);
            if(mysqli_num_rows($run_phase8_arabic) > 0){
                $rows = mysqli_fetch_array($run_phase8_arabic);
                while(mysqli_fetch_array($run_phase8_arabic));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center"> '.$rows['grade'].'</td>  ';
            
            }


        }

}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {



// phase 8 final rating arabic
if($phase8_subject_id == 14 ){
    $phase8_arabic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8'";
    $run_phase8_arabic = mysqli_query($conn,$phase8_arabic);
    if(mysqli_num_rows($run_phase8_arabic) > 0){
        $rows = mysqli_fetch_array($run_phase8_arabic);
        while(mysqli_fetch_array($run_phase8_arabic));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
         ';
    
    }


}
}

       

for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 1;
    
            // phase 8 term 1 islamic
            if($phase8_subject_id == 15 ){
                $phase8_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_islamic = mysqli_query($conn,$phase8_islamic);
                if(mysqli_num_rows($run_phase8_islamic) > 0){
                    $rows = mysqli_fetch_array($run_phase8_islamic);
                    while(mysqli_fetch_array($run_phase8_islamic));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="small-pad-left">*Islamic values Education</td>
                    <td class="text-center">'.$rows['grade'].'</td>
                   ';
                
                }


            }

}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 2;

            
            // phase 8 term 2 islamic
            if($phase8_subject_id == 15 ){
                $phase8_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
                $run_phase8_islamic = mysqli_query($conn,$phase8_islamic);
                if(mysqli_num_rows($run_phase8_islamic) > 0){
                    $rows = mysqli_fetch_array($run_phase8_islamic);
                    while(mysqli_fetch_array($run_phase8_islamic));

                    if($rows['grade'] == 0 ){
                        $rows['grade'] = " ";
                        }

                    $html.='
                    <td class="text-center">'.$rows['grade'].'</td>  ';
                
                }


            }
}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 3;
      
        // phase 8 term 3 islamic
        if($phase8_subject_id == 15 ){
            $phase8_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
            $run_phase8_islamic = mysqli_query($conn,$phase8_islamic);
            if(mysqli_num_rows($run_phase8_islamic) > 0){
                $rows = mysqli_fetch_array($run_phase8_islamic);
                while(mysqli_fetch_array($run_phase8_islamic));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td>  ';
                
            
            }


        }
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 4;

        
        // phase 8 term 4 islamic
        if($phase8_subject_id == 15 ){
            $phase8_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8' AND term = '$term'";
            $run_phase8_islamic = mysqli_query($conn,$phase8_islamic);
            if(mysqli_num_rows($run_phase8_islamic) > 0){
                $rows = mysqli_fetch_array($run_phase8_islamic);
                while(mysqli_fetch_array($run_phase8_islamic));

                if($rows['grade'] == 0 ){
                    $rows['grade'] = " ";
                    }

                $html.='
                <td class="text-center">'.$rows['grade'].'</td>  ';
            
            }


        }

}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {



// phase 8 final rating islamic
if($phase8_subject_id == 15 ){
    $phase8_islamic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$decrypted_lrn' AND subject_id = '$phase8_subject_id' AND phase = '$phase8'";
    $run_phase8_islamic = mysqli_query($conn,$phase8_islamic);
    if(mysqli_num_rows($run_phase8_islamic) > 0){
        $rows = mysqli_fetch_array($run_phase8_islamic);
        while(mysqli_fetch_array($run_phase8_islamic));

        if($rows['final_rating'] == 0 ){
            $rows['final_rating'] = " ";
            $rows['remarks'] = " ";
           }

        $html.='
        <td class="text-center">'.$rows['final_rating'].'</td>
        <td class="text-center">'.$rows['remarks'].'</td>
        </tr>
         ';
    
    }


}
}     




for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 1;
   
            //phase 8 term 1 general average
            if( $phase8_subject_id == 16){
                $phase8_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase8' ";
                $run_phase8_term1_general_average = mysqli_query($conn,$phase8_term1_general_average_query);
                if(mysqli_num_rows($run_phase8_term1_general_average)> 0 ){
                    $rows = mysqli_fetch_array($run_phase8_term1_general_average);

                    if($rows['general_average'] == 0 ){
                        $rows['general_average'] = " ";
                        }

                    $html.='
                    <tr>
                    <td class="subject">General average</td>
                    <td class="insert-gen-av text-center">'.$rows['general_average'].'</td>
                   ';
                


                }
                


            }
 
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 2;
        //phase 8 term 2 general average
        if( $phase8_subject_id == 16){
            $phase8_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase8' ";
            $run_phase8_term1_general_average = mysqli_query($conn,$phase8_term1_general_average_query);
            if(mysqli_num_rows($run_phase8_term1_general_average)> 0 ){
                $rows = mysqli_fetch_array($run_phase8_term1_general_average);

                if($rows['general_average'] == 0 ){
                    $rows['general_average'] = " ";
                    }
                $html.='
                <td class="insert-gen-av text-center">'.$rows['general_average'].'</td>  ';
            


            }
            


        }

}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 3;


        //phase 8 term 3 general average
        if( $phase8_subject_id == 16){
            $phase8_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase8' ";
            $run_phase8_term1_general_average = mysqli_query($conn,$phase8_term1_general_average_query);
            if(mysqli_num_rows($run_phase8_term1_general_average)> 0 ){
                $rows = mysqli_fetch_array($run_phase8_term1_general_average);

                if($rows['general_average'] == 0 ){
                    $rows['general_average'] = " ";
                    }

                $html.='
                <td class="insert-gen-av text-center">'.$rows['general_average'].'</td>  ';
            


            }
            


        }
}



for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {
    
    
    $term = 4;

        //phase 8 term 4 general average
        if( $phase8_subject_id == 16){
            $phase8_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND term = '$term' AND  phase = '$phase8' ";
            $run_phase8_term1_general_average = mysqli_query($conn,$phase8_term1_general_average_query);
            if(mysqli_num_rows($run_phase8_term1_general_average)> 0 ){
                $rows = mysqli_fetch_array($run_phase8_term1_general_average);

                if($rows['general_average'] == 0 ){
                    $rows['general_average'] = " ";
                    }
                $html.='
                <td class="insert-gen-av text-center">'.$rows['general_average'].'</td> ';
            


            }
            


        }


}


for ($phase8_subject_id = 1; $phase8_subject_id <= 16 ; $phase8_subject_id++) {

//phase 8 final rating general average
if( $phase8_subject_id == 16){
    $phase8_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$decrypted_lrn' AND  phase = '$phase8' AND term = 'Final Rating' ";
    $run_phase8_term1_general_average = mysqli_query($conn,$phase8_term1_general_average_query);
    if(mysqli_num_rows($run_phase8_term1_general_average)> 0 ){
        $rows = mysqli_fetch_array($run_phase8_term1_general_average);

        if($rows['general_average'] == 0 ){
            $rows['general_average'] = " ";
            }


            //phase 8 remarks
            $sql_total_remarks_phase1 = "SELECT final_rating, final_rating, COUNT(remarks) AS 'total_remarks' , lrn FROM student_final_ratings 
            WHERE phase = '8' AND lrn = '$decrypted_lrn' AND remarks= 'FAILED' ";
            $run_total_remarks_phase1 = mysqli_query($conn,$sql_total_remarks_phase1);

            $remarks = mysqli_fetch_array($run_total_remarks_phase1);

            if($remarks['total_remarks'] == 15){
                $output = "";
              }else if($remarks['total_remarks'] >= 3){
                $output = "RETAINED";
              }else if ($remarks['total_remarks'] == 2){
                $output = "REMEDIAL";
              }else if($remarks['total_remarks'] <= 1){
                $output = "PROMOTED";
              }

        $html.='
        <td class="insert-gen-av text-center">'.$rows['general_average'].'</td>
        <td class="text-center">'.$output.'</td>
       
        </tr>
        </tbody>

        ';

        // count 
    


    }
    


}
}

$html.='
</table>
';
/// remedial  here 
for($phase8_remedial_term = 1; $phase8_remedial_term <=2; $phase8_remedial_term++){

    if($phase8_remedial_term == 1 ){

        $cert_query = " SELECT * FROM `remedial_classes` WHERE lrn ='$decrypted_lrn'AND phase = '$phase8' AND term = '$phase8_remedial_term' ";
        $run_cert_query = mysqli_query($conn,$cert_query);
        if(mysqli_num_rows($run_cert_query)> 0 ){
            $rows = mysqli_fetch_array($run_cert_query);
            while(mysqli_fetch_array($run_cert_query));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
               }

               if($rows['recomputed_final_grade'] == 0 ){
                $rows['recomputed_final_grade'] = " ";
               }

               if($rows['date_from'] == "1970-01-01" || $rows['date_from'] == "0000-00-00"){
                   $rows['date_from'] = "";
               }

               if($rows['date_to'] == "1970-01-01" || $rows['date_to'] == "0000-00-00"){
                $rows['date_to'] = "";
            }


            $html.='
                <table style="margin-top:4px;">
                    <thead>
                        <tr class="remedial">
                            <th colspan="2">Remedial Classes</th>
                            <th colspan="2" class="text-start" style="border-right: none;"> Date Conducted: '.$rows['date_from'].'</th>
                            <th colspan="2" class="text-start" style="border-left: none;">To: '.$rows['date_to'].'</th>
                        </tr>
                        <tr class="arial-header text-center">
                            <td colspan="2">Learning Areas</td>
                            <td>Final Rating</td>
                            <td>Remedial Class <br> Mark</td>
                            <td>Recomputed <br> Final Grade</td>
                            <td>Remarks</td>
                        </tr>
                    </thead>
                    <tbody>
                    <tr >
                        <td colspan="2" class="remedial-2 text-center">'.$rows['learning_areas'].'</td>
                        <td class="remedial-2 text-center">'.$rows['final_rating'].'</td>
                        <td class="remedial-2 text-center">'.$rows['remarks'].'</td>
                        <td class="remedial-2 text-center">'.$rows['recomputed_final_grade'].'</td>
                        <td class="remedial-2 text-center">'.$rows['remedial_class_mark'].'</td>
                    </tr>    
           
           ';
            
        }

    }

            // term 2
        if($phase8_remedial_term == 2 ){

            $cert_query = " SELECT * FROM `remedial_classes` WHERE lrn ='$decrypted_lrn'AND phase = '$phase8' AND term = '$phase8_remedial_term' ";
        $run_cert_query = mysqli_query($conn,$cert_query);
        if(mysqli_num_rows($run_cert_query)> 0 ){
            $rows = mysqli_fetch_array($run_cert_query);
            while(mysqli_fetch_array($run_cert_query));

            if($rows['final_rating'] == 0 ){
                $rows['final_rating'] = " ";
               }

               if($rows['recomputed_final_grade'] == 0 ){
                $rows['recomputed_final_grade'] = " ";
               }
            $html.='
                        <tr >
                            <td colspan="2" class="remedial-2 text-center">'.$rows['learning_areas'].'</td>
                            <td class="remedial-2 text-center">'.$rows['final_rating'].'</td>
                            <td class="remedial-2 text-center">'.$rows['remarks'].'</td>
                            <td class="remedial-2 text-center">'.$rows['remedial_class_mark'].'</td>
                            <td class="remedial-2 text-center">'.$rows['recomputed_final_grade'].'</td>
                        </tr>
                    </tbody>
                </table>   
            </td>
        </tr>
    </table>
</div>
           ';
        }
//last 8
        }

    
}// end of remedial phase 8 


//certifications



$cert_query = " SELECT * FROM `certifications` WHERE lrn ='$decrypted_lrn' AND phase = '$phase1' ";
$run_cert_query = mysqli_query($conn,$cert_query);
if(mysqli_num_rows($run_cert_query)> 0 ){
    $rows = mysqli_fetch_array($run_cert_query);
    while(mysqli_fetch_array($run_cert_query));

    if($rows['grade'] == 0   ){
        $rows['grade'] = "";
    }

    if($rows['last_school_year_attended'] == "0000-00-00" || $rows['last_school_year_attended'] == "1971-00-00" ){
        $rows['last_school_year_attended'] = "";
    }
   
    if($rows['date'] == "0000-00-00"  ){
        $rows['date'] = "";
    }

        

  $html .='
  <div class="transfer-out">
<h6>For Transfer Out/ Elementary School Completer Only</h6>
</div> 
<div class="bottom-container">
<div class="certification-top">
<h4 class="cert">Certification</h4>
</div>
<div class="Certify">
<label class="certify" for="">CERTIFY that this is a true record of <span class="certify_underline">'.$rows['name'].' </span> </label> 
<label class="LRN" for="">with LRN <span class="LRN_underline">'.$rows['lrn'].'</span> </label> 
<label class="admission" for="">and that he/she is eligible for admission to Grade<span class="admission_underline"> '.$rows['grade'].'</span> </label> 
</div>
<div class="second-row">

<label class="school-name" for="">School Name:<span class="school-name-underline">'.$rows['name_of_school'].'</span>  </label> 
<label class="school-id" for="">School ID<span class="school-id-underline">'.$rows['school_id'].'</span>  </label> 
<label class="Division" for="">Division <span class="Division-underline">'.$rows['division'].'</span>  </label> 
<label class="last-school" for="">Last School Year Attended <span class="last-school-underline"> '.$rows['last_school_year_attended'].'</span> </label>
</div>


<div class="third-row">
<div class="bottom-col">
<label class="data-date"> <span class="date-underline">'.$rows['date'].'</span></label>
<label class="data-name"> <span class="name-underline">'.$rows['name_of_principal'].'</span></label>
</div>
<div class="bottom-names">
<label class="date">Date</label>
<label class="name-of-principal">Name of Principal/ School Head Over Printed Name</label>
<label class="affix">(Affix School Seal Here)</label>
</div>

</div>


</div>
';}

//phase 2 certification


$cert_query = " SELECT * FROM `certifications` WHERE lrn ='$decrypted_lrn' AND phase = '$phase2' ";
$run_cert_query = mysqli_query($conn,$cert_query);
if(mysqli_num_rows($run_cert_query)> 0 ){
    $rows = mysqli_fetch_array($run_cert_query);
    while(mysqli_fetch_array($run_cert_query));

    if($rows['grade'] == 0   ){
        $rows['grade'] = "";
    }

    if($rows['last_school_year_attended'] == "0000-00-00" || $rows['last_school_year_attended'] == "1971-00-00" ){
        $rows['last_school_year_attended'] = "";
    }
   
    if($rows['date'] == "0000-00-00"  ){
        $rows['date'] = "";
    }

        

  $html .='
  <div class="transfer-out">
<h6>For Transfer Out/ Elementary School Completer Only</h6>
</div> 
<div class="bottom-container-1">
<div class="certification-top">
<h4 class="cert">Certification</h4>
</div>
<div class="Certify">
<label class="certify" for="">CERTIFY that this is a true record of <span class="certify_underline">'.$rows['name'].' </span> </label> 
<label class="LRN" for="">with LRN <span class="LRN_underline">'.$rows['lrn'].'</span> </label> 
<label class="admission" for="">and that he/she is eligible for admission to Grade<span class="admission_underline"> '.$rows['grade'].'</span> </label> 
</div>
<div class="second-row">

<label class="school-name" for="">School Name:<span class="school-name-underline">'.$rows['name_of_school'].'</span>  </label> 
<label class="school-id" for="">School ID<span class="school-id-underline">'.$rows['school_id'].'</span>  </label> 
<label class="Division" for="">Division <span class="Division-underline">'.$rows['division'].'</span>  </label> 
<label class="last-school" for="">Last School Year Attended <span class="last-school-underline"> '.$rows['last_school_year_attended'].'</span> </label>
</div>


<div class="third-row">
<div class="bottom-col">
<label class="data-date"> <span class="date-underline">'.$rows['date'].'</span></label>
<label class="data-name"> <span class="name-underline">'.$rows['name_of_principal'].'</span></label>
</div>
<div class="bottom-names">
<label class="date">Date</label>
<label class="name-of-principal">Name of Principal/ School Head Over Printed Name</label>
<label class="affix">(Affix School Seal Here)</label>
</div>

</div>


</div>
';}



//phase 3 certification


$cert_query = " SELECT * FROM `certifications` WHERE lrn ='$decrypted_lrn' AND phase = '$phase3' ";
$run_cert_query = mysqli_query($conn,$cert_query);
if(mysqli_num_rows($run_cert_query)> 0 ){
    $rows = mysqli_fetch_array($run_cert_query);
    while(mysqli_fetch_array($run_cert_query));

    if($rows['grade'] == 0   ){
        $rows['grade'] = "";
    }

    if($rows['last_school_year_attended'] == "0000-00-00" || $rows['last_school_year_attended'] == "1971-00-00" ){
        $rows['last_school_year_attended'] = "";
    }
   
    if($rows['date'] == "0000-00-00"  ){
        $rows['date'] = "";
    }

        

  $html .='
  <div class="transfer-out">
<h6>For Transfer Out/ Elementary School Completer Only</h6>
</div> 
<div class="bottom-container-2">
<div class="certification-top">
<h4 class="cert">Certification</h4>
</div>
<div class="Certify">
<label class="certify" for="">CERTIFY that this is a true record of <span class="certify_underline">'.$rows['name'].' </span> </label> 
<label class="LRN" for="">with LRN <span class="LRN_underline">'.$rows['lrn'].'</span> </label> 
<label class="admission" for="">and that he/she is eligible for admission to Grade<span class="admission_underline"> '.$rows['grade'].'</span> </label> 
</div>
<div class="second-row">

<label class="school-name" for="">School Name:<span class="school-name-underline">'.$rows['name_of_school'].'</span>  </label> 
<label class="school-id" for="">School ID<span class="school-id-underline">'.$rows['school_id'].'</span>  </label> 
<label class="Division" for="">Division <span class="Division-underline">'.$rows['division'].'</span>  </label> 
<label class="last-school" for="">Last School Year Attended <span class="last-school-underline"> '.$rows['last_school_year_attended'].'</span> </label>
</div>


<div class="third-row">
<div class="bottom-col">
<label class="data-date"> <span class="date-underline">'.$rows['date'].'</span></label>
<label class="data-name"> <span class="name-underline">'.$rows['name_of_principal'].'</span></label>
</div>
<div class="bottom-names">
<label class="date">Date</label>
<label class="name-of-principal">Name of Principal/ School Head Over Printed Name</label>
<label class="affix">(Affix School Seal Here)</label>
</div>

</div>


</div>
';}

}// end of if

// end of remedial
// end of phase 8 

$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('Legal', 'portrait');

// Render the HTML as PDF
$dompdf->render();



$dompdf->stream("Placido del monte", Array("Attachment" =>0));
?>



