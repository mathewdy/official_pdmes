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



$png1 = file_get_contents("../official_pdmes/src/images/DepEd.png");
$png1base64 = base64_encode($png1);
$png2 = file_get_contents("../official_pdmes/src/images/DepEd_2.png");
$png2base64 = base64_encode($png2); 
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
*{
    font-family:Arial, sans-serif;
}
table, tr ,th ,td{
    border:1px solid black;
    border-collapse:collapse;

}

td {
    font-size:11px;
}

th{
    font-size:12px;
}


th{
    text-align:center;
}

td{
    text-align:center;
 }


.container-1 label{
    font-size:10pt;
}

input type = [checkbox]{
    height: 15px;
    width:15px;
    border:1px solid black;"
}


.credential{
    width:95%;
    border:1px solid black;
    margin:0 auto;
}


.kinder{
    font-size:7.4pt;
    font-style: italic;
}


.school-container{
    width:95%;
}
.Name-of-School{
    margin-right:4rem;
}

.School_ID{
    margin-right:1rem;
}
.checkbox{
    margin-top:1rem;
    width:100%
}

.Address-School1{
    margin-right:12rem;

}

.rating{
    margin-right:4rem;
}


.
table {
    width:10cm;
}

.row {
    margin-left:-5px;
    margin-right:-5px;
  }
    
  .column {
    float: left;
    width: 50%;
    padding: 5px;
  }
  
  /* Clearfix (clear floats) */
  .row::after {
    content: "";
    clear: both;
    display: table;
  }
  







.container-phase-1{
    margin-right:auto;
    margin:5rem 0;
    position:absolute;
    top:11.5cm;
    right:12.45cm;
    
}


.container-phase-2{
    width:100%;

    margin-right:auto;
    margin:5rem 0;
    position:absolute;
    top:11.5cm;
    left:10cm;
}

.container-phase-3{
    margin-right:auto;
   
    position:absolute;
    top:2.1cm;
    right:13.4cm;
}

.container-phase-4{
    width:100%;
    margin-right:auto;
    position:absolute;
    top:2.1cm;
    left:10cm;
}

.container-phase-5{
    margin-right:auto;
   
    position:absolute;
    top:4.1cm;
    right:13.46cm;
}

.container-phase-6{
    width:100%;
    margin-right:auto;
    position:absolute;
    top:4.1cm;
    left:10cm;
}

.container-phase-7{
    margin-right:auto;
   
    position:absolute;
    top:1.7cm;
    right:12.29cm;
   
}

.container-phase-8{
    width:100%;
    margin-right:auto;
    position:absolute;
    top:1.7cm;
    left:10cm;
}




.learners-information1{
    width:376px;
    position:absolute;
    right:9.88cm;
    top:11.5cm;
    border:1px solid black;
    

}


.container-4 label{
    font-size:11pt;
}
.learners-information1 label{
    font-size:11pt;
}

.learners-information-2{
    width:376px;
    position:absolute;
    right:9.74cm;
    border:1px solid black;
    
}

.learners-information-2 label{
    font-size:11pt;
}

.learners-information-3{
    width:376px;
    position:absolute;
    right:9.80cm;
    border:1px solid black;
    
}
.learners-information-7{
    width:376px;
    position:absolute;
    top:-0.4cm;
    right:9.80cm;
    border:1px solid black;
    
}

.bottom-container{
    width:20cm;
    border:1px solid black;
    position:absolute;
    top:19cm;
    left:-0.5cm;
    right:2cm;

    
}

.bottom-container-1{
    width:20cm;
    
    border:1px solid black;
    position:absolute;
    top:24.5cm;
    left:-0.5cm;
    right:2cm;
}

.bottom-container-2{
    width:20cm;
    
    border:1px solid black;
    position:absolute;
    top:30cm;
    left:-0.5cm;
    right:2cm;
}



.transfer-out{
    width:100%;
    right:0.4cm;
    position:absolute;
    top:18cm;
}

.certification-top{
    background:#E7E7E7;
    width:100%;
    margin:0.5cm 0;
    margin-top:-1.1rem;
}

.cert{
    text-align:center;
}

.certify{
    width:1rem;
    font-size:9pt;
   
}
.LRN{
    margin-left:0.1rem;
    margin-right:0.9rem;
    font-size:9pt;
}

.admission{
    width:200px;
    font-size:12.5px;
    
}

.school-name{
    width:1rem;
    margin: 0 3rem;
    font-size:11px;
}

.school-id{
    width:1rem;
    font-size:11px;
    margin-right:  4rem;
    padding: 0 1rem;
}

.Division{
    font-size:11px;
    margin: 0 2rem;
    width:1rem;
    padding: 0 2rem;
}

.last-school{
    font-size:11px;
    width:1rem;
}


.Certify{
    margin:0 auto;

    width:95%;

}

.second-row{

    margin:0 auto;
    margin-right:1.3rem;
    margin-top:0.5rem;
    width:95%;
}

.second-row label{
    margin: 0 0.2rem;
    margin-top:1rem 0;
}

.third-row{

    margin:0 auto;
    margin-left:1.1rem;
    width:95%;
}

.bottom-names{
    width:100%;
    font-size:11px;
}

.data-name{
    margin-left:10rem;
    font-size:11px;
}

.data-date{
    margin-left:1rem;
    font-size:11px;
}
.date{

    width:2rem;
    margin-left:1.9rem;
}

.affix{
    margin-left:5rem;
    font-size:11px;
}   

.bottom-col{
    margin-top:1rem;
    }

.name-of-principal{
    margin-left:3rem;
    font-size:11px;
    padding: 0 1rem;
}










.learners-information-4{
    width:100%;
}



.container-row-2{
    width:100%;

}

.learners-information-5{
    width:376px;
    position:absolute;
    right:9.80cm;
    top:2cm;
    border:1px solid black;
    
}

.container-2{
    width:52%;
    margin:0 2rem;
    max-width:50%;
    margin:0 0.5rem;
    margin-right:auto;
}


.container-4{
    width:376px;
    margin:0 2rem;
    position:absolute;
    left:9.16cm;
     top:11.5cm;
    border:1px solid
}



.left-container{
    width:376px;
    position:absolute;
    left:10cm;
    border:1px solid black;
    
}

.left-container label{
    font-size:11pt;
    }

.left-container-2{
    width:376px;
    position:absolute;
    top:2cm;
    left:10cm;
    border:1px solid black;
    
}

.left-container-3{
    width:376px;
    position:absolute;
    top:-0.4cm;
    left:10cm;
    border:1px solid black;
    
}



.top-1{
    text-align:center;
}

.top-2{
   
    position:absolute;
    left:3.33cm;
    top:0.7cm;
}

.center{
    text-align:center;
}

.deped{
    position:absolute;
    left:18cm;
    height:1.9cm;
    width:10cm;

}

.deped-2{
    width:2cm
}


.second-page{
    position:absolute;
    top:200px;
}

table {page-break-before:auto;}
.page_break { page-break-before: always; }


.learners{
    text-align:center;
    background:grey;
   

}
.first{
  margin:0.5rem 0 ;
}


.third{
    margin:1rem 0 ;
    
}

.fourth{
    margin:1rem 0;
   
}



.row label{
    margin: 0 1rem;
}

.row1 label{
    margin:0 1rem;
}

.row2 label{
    margin: 0 1rem;
}


.container-1{
    width:95%;
    margin:0 auto;
   
}

.container-5{
    width:52%;
    margin:0 2rem;
    max-width:50%;
    margin:0 0.5rem;
    margin-right:auto;
    
}






.school{
    margin:0 0.2rem;
}


.division{
    width:4rem;
    margin:0 2rem;
    
}

.region{
    width:4rem;
    margin:0 0.5rem;
}

.district{
    width:4rem;
    margin:0 0.2rem;
   
}

.section{
    width:2rem;
    
    margin-right:0.6rem;
}

.as_grade{
    width:2rem;
    margin:0 0.1rem;
    
}
.school_year{
    width:2rem;
    margin:0 -0.9rem;
}



.school{
    width:65%;
    max-width:880px;
    
}

.adviser{
    margin:0 0.2rem;
}

.SF{
    font-size:10px;
}

.sf{
    position:absolute;
    top:-0.4cm;
    right:18cm;
}


.remdial-2{
    position:absolute;
    left:51%;
    top: 84.8%;
   
}

.deped_2{
    width:5cm;
    height:1.5cm;
}

.deped{
    width:3cm;
    height:1.5cm;
    position:absolute;
    top:0.2cm;
    left:16.9cm;
    right:1cm;


}

.deped2{
    width:2.3cm;
    height:2.3cm;
    
}

.deped_2{
    position:relative;
    top:-0.99cm;
    left:0.7cm;
}

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
        <body>
   

    <div class="top-1">
        <label class="block ">Republic of The Philippines</label><br>
        <label class="block">Department of education</label>
    </div>
    <div class="top-2">
    <h4 class="center">Learner&#8216s Permanent Academic Record for Elementary School</h5>
    <h4 class="center">(SF-10 ES)</h4>
    </div>

    <div class="sf">
   <p class="SF">Sf-10-ES</p>
   </div>
    
<br>
<br>


   <h2 class="learners ">LEARNER`S PERSONAL INFORMATION </h2>
   <div class="container-1">
   <div class="first row">
   <label for="">LASTNAME: '.$rows['last_name'].' </label> 
   <label for="">FIRSTNAME: '.$rows['first_name'].' </label> 
   <label for="">MIDDLENAME: '.$rows['middle_name'].' </label>
   <label for="">NAMEEXTN(JR,I,II): '.$rows['suffix'].' </label>
   </div>

   <div class="second row1">
   <label for="">Learner Reference Number (LRN): '.$rows['lrn'].' </label>
   <label for="">Birthdate(mm/yy/dd): '.$rows['birth_date'].' </label>
   <label for="">Sex: '.$rows['sex'].' </label>
   </div>
  
   </div>
   

   <h2 class="learners "> ELIGIBITY FOR ELEMENTARY SCHOOL ENROLLMENT </h2>
   <div class="credential">
   
   <label for="">Credential Presented for grade 1: </label>
  
   <input type="text" class="checkbox" style="height: 15px;width:15px;border:1px solid black;"> 
   <label class="kinder">Kinder Progress Report </label>
   <input type="text" class="checkbox" style="height: 15px;width:15px;border:1px solid black;"> 
   <label class="kinder">ECCD checklist </label>
   <input type="text" class="checkbox" style="height: 15px;width:15px;border:1px solid black;"> 
   <label class="kinder">Kindergarten Certificate of Completion </label><<br>
   <div class="school-container">
   <label class="Name-of-School" for="">Name of School: '.$rows['name_of_school'].' </label>
   <label class="School_ID" for="">School ID: '.$rows['school_id'].' </label>
   <label class="Address-School" for="">Address of School: '.$rows['address_of_school'].' </label>
   </div>

   </div>
     
   <label class="Address-School1"  for="">Address of School: '.$rows['pept_passer'].' </label>
   <label class="rating" for="">Rating: '.$rows['rating'].' </label>
   <label class="date-of-assesment" for="">Date of Assesment '.$rows['date_of_assessment'].' </label>


 
    
      ';
    
    }


    // phase 1 scohlastic query 

    $phase1_scholastic_query = "SELECT * FROM `scholastic_records` WHERE lrn = '$lrn' AND phase = $phase1";
    $run_phase1_scholastic = mysqli_query($conn,$phase1_scholastic_query);
    if(mysqli_num_rows($run_phase1_scholastic) > 0){
        $rows = mysqli_fetch_array($run_phase1_scholastic);

        while(mysqli_fetch_array($run_phase1_scholastic));

    
        $html.='<h2 class="learners"> Scholastic Record </h2>
        <div class="learners-information1">
            <div class="school">
            <label class="school" for="">School: '.$rows['school'].' </label> 
            <label class="school_id" for="">School ID: '.$rows['school_id'].' </label> 
            </div>
            <div>
            <label class="district" for="">District: '.$rows['district'].' </label>
            <label class="division" for="">Division: '.$rows['division'].' </label>
            <label class="region" for="">Region: '.$rows['region'].' </label>
            </div>

            <div>
            <label for="">Classified as Grade: '.$rows['classified_as_grade'].' </label>
            <label for="">Section: '.$rows['section'].' </label>
            <label for="">School year: '.$rows['school_year'].' </label>
            </div>

            <div>
            <label for="">Name of adviser: '.$rows['name_of_teacher'].' </label>
            <label for="">Signature: '.$rows['signature'].' </label>
            </div>

        </div>


            
            
                
        
        
        ';
    }

    $html.='
    <div class="container-phase-1">
        <table class="a">
        <thead>
        <tr>
        <th rowspan="2">Learnering Areas</th>
        <th class="quarterly" colspan="4">Quarterly Rating</th>
        <th class="final-raiting" rowspan="2" >Final Rating</th>
        <th rowspan="2">Remarks</th>
        </tr>
        <tr class="quarter">
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        </tr>
        </thead>    
     
    ';
    
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

            $html.=' 
           
            <td>Mother&#8216s Tongue</td>
            <td>'.$rows['grade'].'</td>
            
      ';
        
        }
    }
}
    for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 2;
        if($phase1_subject_id == 1){
            
            //phase 1 term 2 mother tongue 
    $phase1_mt = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
    $run_phase1_mt = mysqli_query($conn,$phase1_mt);
    if(mysqli_num_rows($run_phase1_mt) > 0){
        $rows2 = mysqli_fetch_array($run_phase1_mt);
        while(mysqli_fetch_array($run_phase1_mt));

            $html.='
            <td>'.$rows2['grade'].'</td>
            
            ';
        
        }
    }
}

      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
            $term = 3;

                      
            if($phase1_subject_id == 1){
        
                //phase 1 term 3 mother tongue 
        $phase1_mt = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
        $run_phase1_mt = mysqli_query($conn,$phase1_mt);
        if(mysqli_num_rows($run_phase1_mt) > 0){
            $rows3 = mysqli_fetch_array($run_phase1_mt);
            while(mysqli_fetch_array($run_phase1_mt));
            $html.='
            <td>'.$rows3['grade'].'</td>
           
            ';
            
            }
        }

      }

             for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
               $term = 4;
               if($phase1_subject_id == 1){
        
                        //phase 1 term 4 mother tongue 
                $phase1_mt = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_mt = mysqli_query($conn,$phase1_mt);
                if(mysqli_num_rows($run_phase1_mt) > 0){
                    $rows4 = mysqli_fetch_array($run_phase1_mt);
                    while(mysqli_fetch_array($run_phase1_mt));

                        $html.='  <td>'.$rows4['grade'].'</td>
                         ';
                    
                    }
                }
            }
                for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
    
                    if($phase1_subject_id == 1){
                
                                //phase 1 final rating mother tongue 
                        $phase1_mt = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
                        $run_phase1_mt = mysqli_query($conn,$phase1_mt);
                        if(mysqli_num_rows($run_phase1_mt) > 0){
                            $rows5 = mysqli_fetch_array($run_phase1_mt);
                            while(mysqli_fetch_array($run_phase1_mt));
        
                    $html.='
                    <td>'.$rows5['final_rating'].'</td>
                    <td> '.$rows5['remarks'].'</td>
                
                    ';
                
                }
            }

        }

    
                //phase 1 term 1 filipino
                for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
                    $term = 1;
                    
                
                    if($phase1_subject_id == 2){


                    $phase1_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_filipino = mysqli_query($conn,$phase1_filipino);
                    if(mysqli_num_rows($run_phase1_filipino) > 0){
                        $rows = mysqli_fetch_array($run_phase1_filipino);
                        while(mysqli_fetch_array($run_phase1_filipino));

                            $html.='
                          <tr>
                          <td>Filipino</td>
                            <td>'.$rows['grade'].'</td>
                         
                            

                            ';
                        
                        }
                    }
}
for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
    $term = 2;

        if($phase1_subject_id == 2 ){
                    $phase1_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_filipino = mysqli_query($conn,$phase1_filipino);
                    if(mysqli_num_rows($run_phase1_filipino) > 0){
                        $row2 = mysqli_fetch_array($run_phase1_filipino);
                        while(mysqli_fetch_array($run_phase1_filipino));
    
                            $html.='

                            <td>'.$rows2['grade'].'</td> ';
                        



                        }
    
                
                    }

}

         
for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
    $term = 3;
    if($phase1_subject_id == 2 ){
        $phase1_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
        $run_phase1_filipino = mysqli_query($conn,$phase1_filipino);
        if(mysqli_num_rows($run_phase1_filipino) > 0){
            $rows3 = mysqli_fetch_array($run_phase1_filipino);
            while(mysqli_fetch_array($run_phase1_filipino));

                $html.='
                <td>'.$rows3['grade'].'</td>
                ';
            
            }

    
        }
              

            
            }



  //term4
  for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {

    
    $term = 4;
    if($phase1_subject_id == 2 ){
        $phase1_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
        $run_phase1_filipino = mysqli_query($conn,$phase1_filipino);
        if(mysqli_num_rows($run_phase1_filipino) > 0){
            $rows4 = mysqli_fetch_array($run_phase1_filipino);
            while(mysqli_fetch_array($run_phase1_filipino));

                $html.='
                <td>'.$rows4['grade'].'</td>';
            
            }

    
        }

 

  }

  for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
    


  if($phase1_subject_id == 2 ){
    $phase1_filipino = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
    $run_phase1_filipino = mysqli_query($conn,$phase1_filipino);
    if(mysqli_num_rows($run_phase1_filipino) > 0){
        $rows5 = mysqli_fetch_array($run_phase1_filipino);
        while(mysqli_fetch_array($run_phase1_filipino));

            $html.='
            <td>'.$rows5['final_rating'].'</td>
            <td>'.$rows5['remarks'].'</td>
            </tr>    ';
        
        }


    }

}

      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 1;

        if($phase1_subject_id == 3 ){
            $phase1_english = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_english = mysqli_query($conn,$phase1_english);
            if(mysqli_num_rows($run_phase1_english) > 0){
                $rows = mysqli_fetch_array($run_phase1_english);
                while(mysqli_fetch_array($run_phase1_english));

                $html.='
                <tr>
                <td>English</td>
                <td>'.$rows['grade'].'</td>
                 ';
            }
        }
    }


    //term2
    for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        $term = 2;
        if($phase1_subject_id == 3 ){
            $phase1_english = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_english = mysqli_query($conn,$phase1_english);
            if(mysqli_num_rows($run_phase1_english) > 0){
                $rows2 = mysqli_fetch_array($run_phase1_english);
                while(mysqli_fetch_array($run_phase1_english));

                    $html.='
                    <td>'.$rows2['grade'].'</td>
                   
                    ';
                
                }

        
            }

        }
                  
      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        $term = 3;

        if($phase1_subject_id == 3 ){
            $phase1_english = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_english = mysqli_query($conn,$phase1_english);
            if(mysqli_num_rows($run_phase1_english) > 0){
                $rows3 = mysqli_fetch_array($run_phase1_english);
                while(mysqli_fetch_array($run_phase1_english));

                    $html.='
                    <td>'.$rows3['grade'].' </td>
                   
                   ';
                
                }

        
            }
      }


      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
        $term = 4;

        if($phase1_subject_id == 3 ){
            $phase1_english = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_english = mysqli_query($conn,$phase1_english);
            if(mysqli_num_rows($run_phase1_english) > 0){
                $rows4 = mysqli_fetch_array($run_phase1_english);
                while(mysqli_fetch_array($run_phase1_english));

                    $html.='
                    <td>'.$rows4['grade'].' </td>
                    ';
                
                }

        
            }
      }


      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        if($phase1_subject_id == 3 ){
            $phase1_english = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
            $run_phase1_english = mysqli_query($conn,$phase1_english);
            if(mysqli_num_rows($run_phase1_english) > 0){
                $rows = mysqli_fetch_array($run_phase1_english);
                while(mysqli_fetch_array($run_phase1_english));
    
                    $html.='
                    <td>'.$rows['final_rating'].'</td>
                    <td>'.$rows['remarks'].' </td>
                    </tr>
                    ';
                
                }
    
        
            }
      }


        

               
      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 1;
        
      if($phase1_subject_id == 4 ){
        $phase1_math = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
        $run_phase1_math = mysqli_query($conn,$phase1_math);
        if(mysqli_num_rows($run_phase1_math) > 0){
            $rows = mysqli_fetch_array($run_phase1_math);
            while(mysqli_fetch_array($run_phase1_math));

                $html.='
                <tr>
                <td>Math</td>
                <td>'.$rows['grade'].'</td>
                
                ';
            
            }   

        }

      }

      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 2;
        
        
        if($phase1_subject_id == 4 ){
            $phase1_math = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_math = mysqli_query($conn,$phase1_math);
            if(mysqli_num_rows($run_phase1_math) > 0){
                $rows2 = mysqli_fetch_array($run_phase1_math);
                while(mysqli_fetch_array($run_phase1_math));

                    $html.='
                    <td> '.$rows2['grade'].'</td>
                    ';
                
                }   

        
            }
      }


      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        $term = 3;

        if($phase1_subject_id == 4 ){
            $phase1_math = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_math = mysqli_query($conn,$phase1_math);
            if(mysqli_num_rows($run_phase1_math) > 0){
                $rows3 = mysqli_fetch_array($run_phase1_math);
                while(mysqli_fetch_array($run_phase1_math));

                    $html.='
                    <td> '.$rows3['grade'].'</td> ';
                
                }   

        
            }
      }

      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
        $term = 4;
        if($phase1_subject_id == 4 ){
            $phase1_math = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_math = mysqli_query($conn,$phase1_math);
            if(mysqli_num_rows($run_phase1_math) > 0){
                $row4 = mysqli_fetch_array($run_phase1_math);
                while(mysqli_fetch_array($run_phase1_math));

                    $html.='
                    <td> '.$rows4['grade'].'</td>  ';
                
                }   

        
            }
      }

      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
      
        
    if($phase1_subject_id == 4 ){
        $phase1_math = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_math = mysqli_query($conn,$phase1_math);
        if(mysqli_num_rows($run_phase1_math) > 0){
            $rows = mysqli_fetch_array($run_phase1_math);
            while(mysqli_fetch_array($run_phase1_math));

                $html.='
                <td>'.$rows['final_rating'].'</td>
                <td>'.$rows['remarks'].'</td>
                </tr>';
            
            }   

    
        }
      }

                
      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 1;
           if($phase1_subject_id == 5 ){
                    $phase1_science = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_science = mysqli_query($conn,$phase1_science);
                    if(mysqli_num_rows($run_phase1_science) > 0){
                        $rows = mysqli_fetch_array($run_phase1_science);
                        while(mysqli_fetch_array($run_phase1_science));

                            $html.='
                            <tr>
                            <td>Science</td>
                            <td>'.$rows['grade'].' </td>
                           
                            ';
                        
                        }

                
                    }

      }
      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 2;
        if($phase1_subject_id == 5 ){
            $phase1_science = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_science = mysqli_query($conn,$phase1_science);
            if(mysqli_num_rows($run_phase1_science) > 0){
                $rows2 = mysqli_fetch_array($run_phase1_science);
                while(mysqli_fetch_array($run_phase1_science));
    
                    $html.='
                    <td>'.$rows2['grade'].'</td>
                      ';
                
                }
            }    

      }


      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        $term = 3;
        
        if($phase1_subject_id == 5 ){
            $phase1_science = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_science = mysqli_query($conn,$phase1_science);
            if(mysqli_num_rows($run_phase1_science) > 0){
                $rows3 = mysqli_fetch_array($run_phase1_science);
                while(mysqli_fetch_array($run_phase1_science));

                    $html.='
                    <td>'.$rows3['grade'].'</td>
                    ';
                
                }

        
            }


      }

      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
        $term = 4;
        if($phase1_subject_id == 5 ){
            $phase1_science = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_science = mysqli_query($conn,$phase1_science);
            if(mysqli_num_rows($run_phase1_science) > 0){
                $rows4 = mysqli_fetch_array($run_phase1_science);
                while(mysqli_fetch_array($run_phase1_science));

                    $html.='
                    <td> '.$rows4['grade'].'</td>
                    ';
                
                }

        
            }


      }

      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        $term = 1;
        if($phase1_subject_id == 5 ){
            $phase1_science = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
            $run_phase1_science = mysqli_query($conn,$phase1_science);
            if(mysqli_num_rows($run_phase1_science) > 0){
                $rows = mysqli_fetch_array($run_phase1_science);
                while(mysqli_fetch_array($run_phase1_science));
    
                    $html.='
                    <td> '.$rows['final_rating'].'</td>
                    <td> '.$rows['remarks'].'</td>
                    </tr>';
                
                }
    
        
            }         
          
      }

            
      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 1;
      if($phase1_subject_id == 6 ){
        $phase1_AP = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
        $run_phase1_AP = mysqli_query($conn,$phase1_AP);
        if(mysqli_num_rows($run_phase1_AP) > 0){
            $rows = mysqli_fetch_array($run_phase1_AP);
            while(mysqli_fetch_array($run_phase1_AP));

            $html.='
            <tr>
            <td>Araling Panlipunan</td>
            <td>'.$rows['grade'].' </td>
              ';
        
        }


    }
}

      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 2;

              // phase 1 term 2 ap
              if($phase1_subject_id == 6 ){
                $phase1_AP = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_AP = mysqli_query($conn,$phase1_AP);
                if(mysqli_num_rows($run_phase1_AP) > 0){
                    $rows2 = mysqli_fetch_array($run_phase1_AP);
                    while(mysqli_fetch_array($run_phase1_AP));

                    $html.='
                    <td>'.$rows2['grade'].'</td>
                     ';
                
                }


            }
      }

      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        $term = 3;

             // phase 1 term 3 ap
             if($phase1_subject_id == 6 ){
                $phase1_AP = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_AP = mysqli_query($conn,$phase1_AP);
                if(mysqli_num_rows($run_phase1_AP) > 0){
                    $rows3 = mysqli_fetch_array($run_phase1_AP);
                    while(mysqli_fetch_array($run_phase1_AP));

                    $html.='
                    <td>'.$rows3['grade'].' </td>
                    ';
                
                }


            }
      }

      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
        $term = 4;
        if($phase1_subject_id == 6 ){
            $phase1_AP = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_AP = mysqli_query($conn,$phase1_AP);
            if(mysqli_num_rows($run_phase1_AP) > 0){
                $rows4 = mysqli_fetch_array($run_phase1_AP);
                while(mysqli_fetch_array($run_phase1_AP));

                $html.='
                <td>'.$rows4['grade'].'</td>
                >  ';
            
            }


        }
      }

       for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
           
        // phase 1 final rating ap
    if($phase1_subject_id == 6 ){
        $phase1_AP = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_AP = mysqli_query($conn,$phase1_AP);
        if(mysqli_num_rows($run_phase1_AP) > 0){
            $rows = mysqli_fetch_array($run_phase1_AP);
            while(mysqli_fetch_array($run_phase1_AP));

            $html.='
            <td>'.$rows['final_rating'].'</td>
            <td>'.$rows['remarks'].'</td>
            </tr> ';
        
        }


    }

       }

       //EPP/TLE
       for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 1;
// phase 1 term 1 EPP_TLE
if($phase1_subject_id == 7 ){
    $phase1_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
    $run_phase1_ep_tle = mysqli_query($conn,$phase1_epp_tle);
    if(mysqli_num_rows($run_phase1_ep_tle) > 0){
        $rows = mysqli_fetch_array($run_phase1_ep_tle);
        while(mysqli_fetch_array($run_phase1_ep_tle));

        $html.='
        <tr>
        <td>EPP/TLE</td>
        <td>'.$rows['grade'].' </td>
          ';
    
    }


}

       }

       for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 2;
        if($phase1_subject_id == 7 ){
            $phase1_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_ep_tle = mysqli_query($conn,$phase1_epp_tle);
            if(mysqli_num_rows($run_phase1_ep_tle) > 0){
                $rows2 = mysqli_fetch_array($run_phase1_ep_tle);
                while(mysqli_fetch_array($run_phase1_ep_tle));

                $html.='
                <td> '.$rows2['grade'].'</td>
                    ';
            
            }


        }
       }

       for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        $term = 3;

        if($phase1_subject_id == 7 ){
            $phase1_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_ep_tle = mysqli_query($conn,$phase1_epp_tle);
            if(mysqli_num_rows($run_phase1_ep_tle) > 0){
                $rows3 = mysqli_fetch_array($run_phase1_ep_tle);
                while(mysqli_fetch_array($run_phase1_ep_tle));

                $html.='
                <td>'.$rows3['grade'].'</td>
                ';
            
            }


        }
       }

       for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
        $term = 4;
        if($phase1_subject_id == 7 ){
            $phase1_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
            $run_phase1_ep_tle = mysqli_query($conn,$phase1_epp_tle);
            if(mysqli_num_rows($run_phase1_ep_tle) > 0){
                $rows4 = mysqli_fetch_array($run_phase1_ep_tle);
                while(mysqli_fetch_array($run_phase1_ep_tle));

                $html.='
               <td>'.$rows4['grade'].'</td>  ';
            
            }


        }


       }
           //term5
    for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        if($phase1_subject_id == 7 ){
            $phase1_epp_tle = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
            $run_phase1_ep_tle = mysqli_query($conn,$phase1_epp_tle);
            if(mysqli_num_rows($run_phase1_ep_tle) > 0){
                $rows = mysqli_fetch_array($run_phase1_ep_tle);
                while(mysqli_fetch_array($run_phase1_ep_tle));
    
                $html.='
                <td>'.$rows['final_rating'].'</td>
                <td> '.$rows['remarks'].'</td>
                </tr>  ';
            
            }
    
    
        }
    }

                  //term1
          
      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 1;

        
                // phase 1 term 1 MAPEH
                if($phase1_subject_id == 8 ){
                    $phase1_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_mapeh = mysqli_query($conn,$phase1_mapeh);
                    if(mysqli_num_rows($run_phase1_mapeh) > 0){
                        $rows = mysqli_fetch_array($run_phase1_mapeh);
                        while(mysqli_fetch_array($run_phase1_mapeh));

                        $html.='
                        <tr>
                        <td>MAPEH</td>
                        <td>'.$rows['grade'].' </td>
                         ';
                    
                    }


                }
                
           
      }
        //term2
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
            $term = 2;

            
                // phase 1 term 2 MAPEH
                if($phase1_subject_id == 8 ){
                    $phase1_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_mapeh = mysqli_query($conn,$phase1_mapeh);
                    if(mysqli_num_rows($run_phase1_mapeh) > 0){
                        $rows2 = mysqli_fetch_array($run_phase1_mapeh);
                        while(mysqli_fetch_array($run_phase1_mapeh));
    
                        $html.='
                        <td> '.$rows2['grade'].'</td>
                          ';
                    
                    }
    
    
                }
        }

              //term3
              for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
                $term = 3;
                if($phase1_subject_id == 8 ){
                    $phase1_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_mapeh = mysqli_query($conn,$phase1_mapeh);
                    if(mysqli_num_rows($run_phase1_mapeh) > 0){
                        $rows3 = mysqli_fetch_array($run_phase1_mapeh);
                        while(mysqli_fetch_array($run_phase1_mapeh));
    
                        $html.='
                        <td> '.$rows3['grade'].'</td> ';
                    
                    }
    
    
                }
            }

               //term4
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
            $term = 4;
            
            // phase 1 term 4 MAPEH
            if($phase1_subject_id == 8 ){
                $phase1_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_mapeh = mysqli_query($conn,$phase1_mapeh);
                if(mysqli_num_rows($run_phase1_mapeh) > 0){
                    $rows4 = mysqli_fetch_array($run_phase1_mapeh);
                    while(mysqli_fetch_array($run_phase1_mapeh));

                    $html.='
                    <td> '.$rows4['grade'].'</td>  ';
                
                }


            }
        }
         //term5
         for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
            
        // phase 1 final rating MAPEH
        if($phase1_subject_id == 8 ){
            $phase1_mapeh = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
            $run_phase1_mapeh = mysqli_query($conn,$phase1_mapeh);
            if(mysqli_num_rows($run_phase1_mapeh) > 0){
                $rows = mysqli_fetch_array($run_phase1_mapeh);
                while(mysqli_fetch_array($run_phase1_mapeh));

                $html.='
                <td>'.$rows['final_rating'].'</td>
                <td>'.$rows['remarks'].'</td>
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
                    $phase1_music = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_music = mysqli_query($conn,$phase1_music);
                    if(mysqli_num_rows($run_phase1_music) > 0){
                        $rows = mysqli_fetch_array($run_phase1_music);
                        while(mysqli_fetch_array($run_phase1_music));
    
                        $html.='
                        <tr>
                        <td>Music</td>
                        <td>'.$rows['grade'].' </td>
                         ';
                    
                    }
    
    
                }
           }


             //term2
             for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
                $term = 2;

                     
                    // phase 1 term 2 music
                    if($phase1_subject_id == 9 ){
                        $phase1_music = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                        $run_phase1_music = mysqli_query($conn,$phase1_music);
                        if(mysqli_num_rows($run_phase1_music) > 0){
                            $rows2 = mysqli_fetch_array($run_phase1_music);
                            while(mysqli_fetch_array($run_phase1_music));
        
                            $html.='
                            <td> '.$rows2['grade'].'</td>
                            ';
                        
                        }
        
        
                    }
             }    
             
                  //term3
            for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
                $term = 3;

                        // phase 1 term 3 music
            if($phase1_subject_id == 9 ){
                $phase1_music = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_music = mysqli_query($conn,$phase1_music);
                if(mysqli_num_rows($run_phase1_music) > 0){
                    $rows3 = mysqli_fetch_array($run_phase1_music);
                    while(mysqli_fetch_array($run_phase1_music));

                    $html.='
                    <td> '.$rows3['grade'].'</td>
                    ';
                
                }


            }
            }
            
              //term4
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
            $term = 4;
                    // phase 1 term 4 music
                    if($phase1_subject_id == 9 ){
                        $phase1_music = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                        $run_phase1_music = mysqli_query($conn,$phase1_music);
                        if(mysqli_num_rows($run_phase1_music) > 0){
                            $rows4 = mysqli_fetch_array($run_phase1_music);
                            while(mysqli_fetch_array($run_phase1_music));
        
                            $html.='
                            <td>'.$rows4['grade'].'</td>
                             ';
                        
                        }
        
        
                    }
        }    

        
        //term5
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
                 // phase 1 final rating music
    if($phase1_subject_id == 9 ){
        $phase1_music = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_music = mysqli_query($conn,$phase1_music);
        if(mysqli_num_rows($run_phase1_music) > 0){
            $rows = mysqli_fetch_array($run_phase1_music);
            while(mysqli_fetch_array($run_phase1_music));

            $html.='
            <td>'.$rows['final_rating'].'</td>
            <td> '.$rows['remarks'].'</td>
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
                            $phase1_arts = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                            $run_phase1_arts = mysqli_query($conn,$phase1_arts);
                            if(mysqli_num_rows($run_phase1_arts) > 0){
                                $rows = mysqli_fetch_array($run_phase1_arts);
                                while(mysqli_fetch_array($run_phase1_arts));
        
                                $html.='
                                <tr>
                                <td>Arts</td>
                                <td>'.$rows['grade'].' </td>
                               ';
                            
                            }
        
        
                        }
        
      }

         //term2
         for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
            $term = 2;

            
                        // phase 1 term 2 arts
                        if($phase1_subject_id == 10 ){
                            $phase1_arts = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                            $run_phase1_arts = mysqli_query($conn,$phase1_arts);
                            if(mysqli_num_rows($run_phase1_arts) > 0){
                                $rows2 = mysqli_fetch_array($run_phase1_arts);
                                while(mysqli_fetch_array($run_phase1_arts));
            
                                $html.='
                                <td>'.$rows2['grade'].'</td>
                                  ';
                            
                            }
            
            
                        }
            
         }
         
            //term3
            for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
                $term = 3;
                
                    // phase 1 term 3 arts
            if($phase1_subject_id == 10 ){
                $phase1_arts = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_arts = mysqli_query($conn,$phase1_arts);
                if(mysqli_num_rows($run_phase1_arts) > 0){
                    $rows3 = mysqli_fetch_array($run_phase1_arts);
                    while(mysqli_fetch_array($run_phase1_arts));

                    $html.='
                    <td>'.$rows3['grade'].'</td>
                    ';
                
                }


            }
            }      
            
        //term4
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
            $term = 4;
            
                    // phase 1 term 4 arts
                    if($phase1_subject_id == 10 ){
                        $phase1_arts = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                        $run_phase1_arts = mysqli_query($conn,$phase1_arts);
                        if(mysqli_num_rows($run_phase1_arts) > 0){
                            $rows4 = mysqli_fetch_array($run_phase1_arts);
                            while(mysqli_fetch_array($run_phase1_arts));
        
                            $html.='
                            <td> '.$rows4['grade'].'</td>
                            ';
                        
                        }
        
        
                    }
        }  
        
        //term5
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
                      // phase 1 final rating arts
        if($phase1_subject_id == 10 ){
            $phase1_arts = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
            $run_phase1_arts = mysqli_query($conn,$phase1_arts);
            if(mysqli_num_rows($run_phase1_arts) > 0){
                $rows = mysqli_fetch_array($run_phase1_arts);
                while(mysqli_fetch_array($run_phase1_arts));

                $html.='
                <td> '.$rows['final_rating'].'</td>
                <td>'.$rows['remarks'].'</td>
                ';
            
            }


    }
        }

        
                //term1
          
      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 1;
        
                // phase 1 term 1 PE
                if($phase1_subject_id == 11 ){
                    $phase1_pe = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_pe = mysqli_query($conn,$phase1_pe);
                    if(mysqli_num_rows($run_phase1_pe) > 0){
                        $rows = mysqli_fetch_array($run_phase1_pe);
                        while(mysqli_fetch_array($run_phase1_pe));

                        $html.='
                        <tr>
                            <td>Physical Education</td>
                            <td>'.$rows['grade'].' </td>
                            ';
                    
                    }


                }
      }

        //term2
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
            $term = 2;
                // phase 1 term 2 PE
                if($phase1_subject_id == 11 ){
                    $phase1_pe = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_pe = mysqli_query($conn,$phase1_pe);
                    if(mysqli_num_rows($run_phase1_pe) > 0){
                        $rows2 = mysqli_fetch_array($run_phase1_pe);
                        while(mysqli_fetch_array($run_phase1_pe));
    
                        $html.='
                        <td>'.$rows2['grade'].'</td>
                        ';
                    
                    }
    
    
                }
        }    

        
            //term3
            for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
                $term = 3;
                       // phase 1 term 3 PE
            if($phase1_subject_id == 11 ){
                $phase1_pe = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_pe = mysqli_query($conn,$phase1_pe);
                if(mysqli_num_rows($run_phase1_pe) > 0){
                    $rows3 = mysqli_fetch_array($run_phase1_pe);
                    while(mysqli_fetch_array($run_phase1_pe));

                    $html.='
                    <td> '.$rows3['grade'].'</td>
                    ';
                
                }


            }
            }    
            
               //term4
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
            $term = 4;
            

            // phase 1 term 4 PE
            if($phase1_subject_id == 11 ){
                $phase1_pe = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_pe = mysqli_query($conn,$phase1_pe);
                if(mysqli_num_rows($run_phase1_pe) > 0){
                    $rows4 = mysqli_fetch_array($run_phase1_pe);
                    while(mysqli_fetch_array($run_phase1_pe));

                    $html.='
                    <td> '.$rows4['grade'].'</td>
                ';
                
                }


            }

        }    

              //term5
              for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
                  

    // phase 1 final rating PE
    if($phase1_subject_id == 11 ){
        $phase1_pe = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_pe = mysqli_query($conn,$phase1_pe);
        if(mysqli_num_rows($run_phase1_pe) > 0){
            $rows = mysqli_fetch_array($run_phase1_pe);
            while(mysqli_fetch_array($run_phase1_pe));

            $html.='
            <td>'.$rows['final_rating'].'</td>
            <td>'.$rows['remarks'].'<   /td>
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
                    $phase1_health = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_health = mysqli_query($conn,$phase1_health);
                    if(mysqli_num_rows($run_phase1_health) > 0){
                        $rows = mysqli_fetch_array($run_phase1_health);
                        while(mysqli_fetch_array($run_phase1_health));

                        $html.='
                        <tr>
                        <td>Health</td>
                        <td>'.$rows['grade'].' </td>
                         ';
                    
                    }


                }
      }

        //term2
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
            $term = 2;
            
                // phase 1 term 2 Health
                if($phase1_subject_id == 12 ){
                    $phase1_health = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_health = mysqli_query($conn,$phase1_health);
                    if(mysqli_num_rows($run_phase1_health) > 0){
                        $rows2 = mysqli_fetch_array($run_phase1_health);
                        while(mysqli_fetch_array($run_phase1_health));
    
                        $html.='
                        <td>'.$rows2['grade'].'</td>
                        ';
                    
                    }
    
    
                }
        }

             //term3
            for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
                $term = 3;
                      // phase 1 term 3 Health
            if($phase1_subject_id == 12 ){
                $phase1_health = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_health = mysqli_query($conn,$phase1_health);
                if(mysqli_num_rows($run_phase1_health) > 0){
                    $rows3 = mysqli_fetch_array($run_phase1_health);
                    while(mysqli_fetch_array($run_phase1_health));

                    $html.='
                    <td>'.$rows3['grade'].'</td>
                    ';
                
                }


            }
            
         }

         
        //term4
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
            $term = 4;
            

            // phase 1 term 4 Health
            if($phase1_subject_id == 12 ){
                $phase1_health = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_health = mysqli_query($conn,$phase1_health);
                if(mysqli_num_rows($run_phase1_health) > 0){
                    $rows4 = mysqli_fetch_array($run_phase1_health);
                    while(mysqli_fetch_array($run_phase1_health));

                    $html.='
                    <td>'.$rows4['grade'].' </td>
                    ';
                
                }


            }
        }

          //term5
          for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
              
    // phase 1 final rating Health
    if($phase1_subject_id == 12 ){
        $phase1_health = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_health = mysqli_query($conn,$phase1_health);
        if(mysqli_num_rows($run_phase1_health) > 0){
            $rows = mysqli_fetch_array($run_phase1_health);
            while(mysqli_fetch_array($run_phase1_health));

            $html.='
            <td>'.$rows['final_rating'].'</td>
            <td>'.$rows['remarks'].'</td>
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
                $phase1_esp = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_esp = mysqli_query($conn,$phase1_esp);
                if(mysqli_num_rows($run_phase1_esp) > 0){
                    $rows = mysqli_fetch_array($run_phase1_esp);
                    while(mysqli_fetch_array($run_phase1_esp));

                    $html.='
                    <tr>
                    <td>Eduk. sa Pagpapakatao  </td>
                    <td>'.$rows['grade'].' </td>
                     ';
                
                }


            }

      }

        //term2
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
            $term = 2;
            
                // phase 1 term 2 eduk sa pag papakatao
                if($phase1_subject_id == 13 ){
                    $phase1_esp = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_esp = mysqli_query($conn,$phase1_esp);
                    if(mysqli_num_rows($run_phase1_esp) > 0){
                        $rows2 = mysqli_fetch_array($run_phase1_esp);
                        while(mysqli_fetch_array($run_phase1_esp));
    
                        $html.='
                        <td> '.$rows2['grade'].'</td>
                        ';
                    
                    }
    
    
                }
        }

        
            //term3
            for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
                $term = 3;
                   // phase 1 term 3 eduk sa pag papakatao
            if($phase1_subject_id == 13 ){
                $phase1_esp = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_esp = mysqli_query($conn,$phase1_esp);
                if(mysqli_num_rows($run_phase1_esp) > 0){
                    $rows3 = mysqli_fetch_array($run_phase1_esp);
                    while(mysqli_fetch_array($run_phase1_esp));

                    $html.='
                    <td>'.$rows3['grade'].'</td>
                    ';
                
                }


            }

            }

               //term4
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
            $term = 4;
                // phase 1 term 4 eduk sa pag papakatao
                if($phase1_subject_id == 13 ){
                    $phase1_esp = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_esp = mysqli_query($conn,$phase1_esp);
                    if(mysqli_num_rows($run_phase1_esp) > 0){
                        $rows4 = mysqli_fetch_array($run_phase1_esp);
                        while(mysqli_fetch_array($run_phase1_esp));
    
                        $html.='
                        <td> '.$rows4['grade'].'</td>
                        ';
                    
                    }
    
    
                }
        }

        
        //term5
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
            // phase 1 final rating eduk sa pag papakatao
    if($phase1_subject_id == 13 ){
        $phase1_esp = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_esp = mysqli_query($conn,$phase1_esp);
        if(mysqli_num_rows($run_phase1_esp) > 0){
            $rows = mysqli_fetch_array($run_phase1_esp);
            while(mysqli_fetch_array($run_phase1_esp));

            $html.='
            <td>'.$rows['final_rating'].'</td>
            <td>'.$rows['remarks'].'</td>
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
                    $phase1_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_arabic = mysqli_query($conn,$phase1_arabic);
                    if(mysqli_num_rows($run_phase1_arabic) > 0){
                        $rows = mysqli_fetch_array($run_phase1_arabic);
                        while(mysqli_fetch_array($run_phase1_arabic));

                        $html.='
                        <tr>
                        <td>*Arabic Language</td>
                        <td>'.$rows['grade'].' </td>
                        ';
                    
                    }


                }
      }

           //term2
           for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
            $term = 2;
            
                // phase 1 term 2 arabic
                if($phase1_subject_id == 14 ){
                    $phase1_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_arabic = mysqli_query($conn,$phase1_arabic);
                    if(mysqli_num_rows($run_phase1_arabic) > 0){
                        $rows2 = mysqli_fetch_array($run_phase1_arabic);
                        while(mysqli_fetch_array($run_phase1_arabic));
    
                        $html.='
                        <td> '.$rows2['grade'].'</td>
                        ';
                    
                    }
    
    
                }
    
           }    

           
            //term3
            for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
                $term = 3;
                      // phase 1 term 3 arabic
            if($phase1_subject_id == 14 ){
                $phase1_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_arabic = mysqli_query($conn,$phase1_arabic);
                if(mysqli_num_rows($run_phase1_arabic) > 0){
                    $rows3 = mysqli_fetch_array($run_phase1_arabic);
                    while(mysqli_fetch_array($run_phase1_arabic));

                    $html.='
                    <td>'.$rows3['grade'].'</td>
                    ';
                
                }


            }
            }       
            
            
        //term4
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
            $term = 4;
                 // phase 1 term 4 arabic
                 if($phase1_subject_id == 14 ){
                    $phase1_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_arabic = mysqli_query($conn,$phase1_arabic);
                    if(mysqli_num_rows($run_phase1_arabic) > 0){
                        $rows4 = mysqli_fetch_array($run_phase1_arabic);
                        while(mysqli_fetch_array($run_phase1_arabic));
    
                        $html.='
                        <td>'.$rows4['grade'].'</td>
                        ';
                    
                    }
    
    
                }
        }    

        
        //term5
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
            
    // phase 1 final rating arabic
    if($phase1_subject_id == 14 ){
        $phase1_arabic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_arabic = mysqli_query($conn,$phase1_arabic);
        if(mysqli_num_rows($run_phase1_arabic) > 0){
            $rows = mysqli_fetch_array($run_phase1_arabic);
            while(mysqli_fetch_array($run_phase1_arabic));

            $html.='
            <td>'.$rows['final_rating'].'</td>
            <td>'.$rows['remarks'].'</td>
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
                    $phase1_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_islamic = mysqli_query($conn,$phase1_islamic);
                    if(mysqli_num_rows($run_phase1_islamic) > 0){
                        $rows = mysqli_fetch_array($run_phase1_islamic);
                        while(mysqli_fetch_array($run_phase1_islamic));

                        $html.='
                        <tr>
                        <td>*Islamic Values Education</td>
                        <td>'.$rows['grade'].' </td>
                         ';
                    
                    }


                }
        

      }

      //term2
      for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
        $term = 2;
                 
                // phase 1 term 2 islamic
                if($phase1_subject_id == 15 ){
                    $phase1_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                    $run_phase1_islamic = mysqli_query($conn,$phase1_islamic);
                    if(mysqli_num_rows($run_phase1_islamic) > 0){
                        $rows2 = mysqli_fetch_array($run_phase1_islamic);
                        while(mysqli_fetch_array($run_phase1_islamic));
    
                        $html.='
                        <td>'.$rows['grade'].'</td>
                          ';
                    
                    }
    
    
                }
    
      }

      
            //term3
            for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
                $term = 3;
                       
            // phase 1 term 3 islamic
            if($phase1_subject_id == 15 ){
                $phase1_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_islamic = mysqli_query($conn,$phase1_islamic);
                if(mysqli_num_rows($run_phase1_islamic) > 0){
                    $rows3 = mysqli_fetch_array($run_phase1_islamic);
                    while(mysqli_fetch_array($run_phase1_islamic));

                    $html.='
                    <td>'.$rows3['grade'].'</td>
                    ';
                    
                
                }


            }

            }   
            
            
        //term4
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
            $term = 4;
                
            // phase 1 term 4 islamic
            if($phase1_subject_id == 15 ){
                $phase1_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1' AND term = '$term'";
                $run_phase1_islamic = mysqli_query($conn,$phase1_islamic);
                if(mysqli_num_rows($run_phase1_islamic) > 0){
                    $rows4 = mysqli_fetch_array($run_phase1_islamic);
                    while(mysqli_fetch_array($run_phase1_islamic));

                    $html.='
                    <td> '.$rows4['grade'].'</td>
                     ';
                
                }


            }
        }
        
        //term5
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
            
    // phase 1 final rating islamic
    if($phase1_subject_id == 15 ){
        $phase1_islamic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase1_subject_id' AND phase = '$phase1'";
        $run_phase1_islamic = mysqli_query($conn,$phase1_islamic);
        if(mysqli_num_rows($run_phase1_islamic) > 0){
            $rows = mysqli_fetch_array($run_phase1_islamic);
            while(mysqli_fetch_array($run_phase1_islamic));

            $html.='
            <td> '.$rows['final_rating'].'</td>
            <td> '.$rows['remarks'].' </td>
           
            ';
        
        }


    }
        }

        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
            $term = 1;
                   //phase 1 term 1 general average
                   if( $phase1_subject_id == 16){
                    $phase1_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$lrn' AND term = '$term' AND  phase = '$phase1'";
                    $run_phase1_term1_general_average = mysqli_query($conn,$phase1_term1_general_average_query);
                    if(mysqli_num_rows($run_phase1_term1_general_average)> 0 ){
                        $rows = mysqli_fetch_array($run_phase1_term1_general_average);
                        $html.='
                        <tr>
                        <td>General Average</td>
                        <td>'.$rows['general_average'].'</td>
                       
                        ';
                    


                    }
                    


                }

        }    

               //term2
               for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
        
                $term = 2;
                       //phase 1 term 2 general average
                       if( $phase1_subject_id == 16){
                        $phase1_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$lrn' AND term = '$term' AND  phase = '$phase1' ";
                        $run_phase1_term1_general_average = mysqli_query($conn,$phase1_term1_general_average_query);
                        if(mysqli_num_rows($run_phase1_term1_general_average)> 0 ){
                            $rows2 = mysqli_fetch_array($run_phase1_term1_general_average);
                            $html.='
                            <td>'.$rows2['general_average'].'</td>
                             ';
                        
        
        
                        }
                        
        
        
                    }
               }        
    
            //term3
            for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
                $term = 3;
                

            //phase 1 term 3 general average
            if( $phase1_subject_id == 16){
                $phase1_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$lrn' AND term = '$term' AND  phase = '$phase1' ";
                $run_phase1_term1_general_average = mysqli_query($conn,$phase1_term1_general_average_query);
                if(mysqli_num_rows($run_phase1_term1_general_average)> 0 ){
                    $rows3 = mysqli_fetch_array($run_phase1_term1_general_average);
                    $html.='
                    <td>'.$rows3['general_average'].'</td>
                      ';
                


                }
                


            }


            }

            
        //term4
        for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
        
 
            $term = 4;
            

            //phase 1 term 4 general average
            if( $phase1_subject_id == 16){
                $phase1_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$lrn' AND term = '$term' AND  phase = '$phase1' ";
                $run_phase1_term1_general_average = mysqli_query($conn,$phase1_term1_general_average_query);
                if(mysqli_num_rows($run_phase1_term1_general_average)> 0 ){
                    $rows4 = mysqli_fetch_array($run_phase1_term1_general_average);
                    $html.='
                    <td>'.$rows4['general_average'].'</td>
                      ';
                


                }
                


            }
        }
             //term5
             for ($phase1_subject_id = 1; $phase1_subject_id <= 16 ; $phase1_subject_id++) {
                 //phase 1 final rating general average
    if( $phase1_subject_id == 16){
        $phase1_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$lrn' AND  phase = '$phase1' AND term = ' Final Rating' ";
        $run_phase1_term1_general_average = mysqli_query($conn,$phase1_term1_general_average_query);
        if(mysqli_num_rows($run_phase1_term1_general_average)> 0 ){
            $rows = mysqli_fetch_array($run_phase1_term1_general_average);
            $html.='
            <td>'.$rows['general_average'].'</td>
            <td></td>  
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

        $phase1_remedial_query = " SELECT * FROM `remedial_classes` WHERE lrn ='$lrn'AND phase = '$phase1' AND term = '$phase1_remedial_term' ";
        $phase1_run_query = mysqli_query($conn,$phase1_remedial_query);
        if(mysqli_num_rows($phase1_run_query)> 0 ){
            $rows = mysqli_fetch_array($phase1_run_query);
            while(mysqli_fetch_array($phase1_run_query));
            $html.='
            <table class="remedial-2">
            <thead>
            <tr>
            <th colspan="2">Remedial Classes</th>
            <th colspan="2"> Date Conducted: '.$rows['date_from'].'</th>
            <th colspan="1">To: '.$rows['date_to'].'</th>
            </tr>
            <tr>
            <th>Learning Areas</th>
            <th>Final Rating</th>
            <th>Remedial Class Mark</th>
            <th>Remarks</th>
            <th>Recomputed Final Grade</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td>'.$rows['learning_areas'].'</td>
            <td>'.$rows['final_rating'].'</td>
            <td>'.$rows['remarks'].'</td>
            <td>'.$rows['remedial_class_mark'].'</td>
            <td>'.$rows['recomputed_final_grade'].'</td>
            </tr>
            <tr>
            <td>'.$rows['learning_areas'].'</td>
            <td>'.$rows['final_rating'].'</td>
            <td>'.$rows['remarks'].'</td>
            <td>'.$rows['remedial_class_mark'].'</td>
            <td>'.$rows['recomputed_final_grade'].'</td>
            </tr>
            </tbody>

            
            

            
            </table>
            </div>

           
           
           ';
            
        }

    }
}

$phase1_scholastic_query = "SELECT * FROM `scholastic_records` WHERE lrn = '$lrn' AND phase = $phase1";
$run_phase1_scholastic = mysqli_query($conn,$phase1_scholastic_query);
if(mysqli_num_rows($run_phase1_scholastic) > 0){
    $rows = mysqli_fetch_array($run_phase1_scholastic);

    while(mysqli_fetch_array($run_phase1_scholastic));

$html.='

<div class="container-4">
<div class="School">
<label class="school" for="">School: '.$rows['school'].' </label> 
<label class="school_id" for="">School ID: '.$rows['school_id'].' </label> 
</div>

<div class="">
<label class="district" for="">District: '.$rows['district'].' </label>
<label class="division" for="">Division: '.$rows['division'].' </label>
<label class="region" for="">Region: '.$rows['region'].' </label> <br>
</div>

<div class="container-3">
<label for="">Classified as Grade: '.$rows['classified_as_grade'].' </label>
<label for="">Section: '.$rows['section'].' </label>
<label for="">School year: '.$rows['school_year'].' </label><br>
</div>
<div>
<label for="">Name of adviser: '.$rows['name_of_teacher'].' </label>
<label for="">Signature: '.$rows['signature'].' </label>
</div>
</div>
</div>
';

}

//----------------------------------------------PHASE2----------------------------- -----------------


$html.='
    <div class="container-phase-2">
    <table>
        <thead>
        <tr>
        <th rowspan="2">Learnering Areas</th>
<th class="quarterly" colspan="4">Quarterly Rating</th>
<th class="final-raiting" rowspan="2" >Final Rating</th>
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
$phase2_mt = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
$run_phase2_mt = mysqli_query($conn,$phase2_mt);
if(mysqli_num_rows($run_phase2_mt) > 0){
$rows = mysqli_fetch_array($run_phase2_mt);
while(mysqli_fetch_array($run_phase2_mt));

$html.=' 
<tr>
<td>Mother&#8216s Tongue</td>
<td>'.$rows['grade'].'</td>




 ';

}
}
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {


$term = 2;


if($phase2_subject_id == 1){

//phase 2 term 2 mother tongue 
$phase2_mt = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
$run_phase2_mt = mysqli_query($conn,$phase2_mt);
if(mysqli_num_rows($run_phase2_mt) > 0){
$rows2 = mysqli_fetch_array($run_phase2_mt);
while(mysqli_fetch_array($run_phase2_mt));

$html.=' <td>'.$rows2['grade'].'</td>';

}
}
}
for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {


$term = 3;


if($phase2_subject_id == 1){

//phase 2 term 3 mother tongue 
$phase2_mt = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
$run_phase2_mt = mysqli_query($conn,$phase2_mt);
if(mysqli_num_rows($run_phase2_mt) > 0){
$rows3 = mysqli_fetch_array($run_phase2_mt);
while(mysqli_fetch_array($run_phase2_mt));

$html.='<td> '.$rows3['grade'].'</td>
 ';

}
}
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {


$term = 4;


if($phase2_subject_id == 1){

            //phase 2 term 4 mother tongue 
    $phase2_mt = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
    $run_phase2_mt = mysqli_query($conn,$phase2_mt);
    if(mysqli_num_rows($run_phase2_mt) > 0){
        $rows4 = mysqli_fetch_array($run_phase2_mt);
        while(mysqli_fetch_array($run_phase2_mt));

            $html.='<td>'.$rows4['grade'].'</td>
          ';
        
        }
    }
}

    for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {





        if($phase2_subject_id == 1){
        
                    //phase 1 final rating mother tongue 
            $phase2_mt = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
            $run_phase2_mt = mysqli_query($conn,$phase2_mt);
            if(mysqli_num_rows($run_phase2_mt) > 0){
                $rows = mysqli_fetch_array($run_phase2_mt);
                while(mysqli_fetch_array($run_phase2_mt));
        
                    $html.=' 
                    <td>'.$rows['final_rating'].'</td>
                    <td>'.$rows['remarks'].'</td>
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
        $phase2_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_filipino = mysqli_query($conn,$phase2_filipino);
        if(mysqli_num_rows($run_phase2_filipino) > 0){
            $rows = mysqli_fetch_array($run_phase2_filipino);
            while(mysqli_fetch_array($run_phase2_filipino));

                $html.='
                <tr>
                <td>Filipino</td>
                <td>'.$rows['grade'].' </td>
                  ';
            
            }

    
        }

}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;

        //phase 1 term 2 filipino

        if($phase2_subject_id == 2 ){
            $phase2_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_filipino = mysqli_query($conn,$phase2_filipino);
            if(mysqli_num_rows($run_phase2_filipino) > 0){
                $rows2 = mysqli_fetch_array($run_phase2_filipino);
                while(mysqli_fetch_array($run_phase2_filipino));

                    $html.='
                    <td> '.$rows2['grade'].'</td>
                    ';
                
                }

        
            }
    

}

    //phase 2 term 3 //////////////////////////////////////////////

    for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {


    $term = 3;

    
        //phase 1 term 3 filipino

        if($phase2_subject_id == 2 ){
            $phase2_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_filipino = mysqli_query($conn,$phase2_filipino);
            if(mysqli_num_rows($run_phase2_filipino) > 0){
                $rows3 = mysqli_fetch_array($run_phase2_filipino);
                while(mysqli_fetch_array($run_phase2_filipino));

                    $html.='
                    <td> '.$rows3['grade'].'</td>
                    ';
                
                }

        
            }


}

//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
    
        //phase 2 term 4 filipino

        if($phase2_subject_id == 2 ){
            $phase2_filipino = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_filipino = mysqli_query($conn,$phase2_filipino);
            if(mysqli_num_rows($run_phase2_filipino) > 0){
                $rows4 = mysqli_fetch_array($run_phase2_filipino);
                while(mysqli_fetch_array($run_phase2_filipino));

                    $html.='
                    <td> '.$rows4['grade'].'</td>
                    ';
                
                }

        
            }
}


for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
//phase 1 final rating filipino

if($phase2_subject_id == 2 ){
    $phase2_filipino = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_filipino = mysqli_query($conn,$phase2_filipino);
    if(mysqli_num_rows($run_phase2_filipino) > 0){
        $rows = mysqli_fetch_array($run_phase2_filipino);
        while(mysqli_fetch_array($run_phase2_filipino));

            $html.='
            <td>'.$rows['final_rating'].'</td>
            <td>'.$rows['remarks'].'</td>
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
        $phase2_english = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_english = mysqli_query($conn,$phase2_english);
        if(mysqli_num_rows($run_phase2_english) > 0){
            $rows = mysqli_fetch_array($run_phase2_english);
            while(mysqli_fetch_array($run_phase2_english));

                $html.='
                <tr>
                <td>English</td>
                <td>'.$rows['grade'].'</td>
                    ';
            
            }

    
        }


}

// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;

    
    // phase 2 term 2 english 

    if($phase2_subject_id == 3 ){
        $phase2_english = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_english = mysqli_query($conn,$phase2_english);
        if(mysqli_num_rows($run_phase2_english) > 0){
            $rows2 = mysqli_fetch_array($run_phase2_english);
            while(mysqli_fetch_array($run_phase2_english));

                $html.='
                <td>'.$rows2['grade'].'</td>
                ';
            
            }

    
        }

}

            
//phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {


    $term = 3;
    
        // phase 2 term 3 english 

    if($phase2_subject_id == 3 ){
        $phase2_english = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_english = mysqli_query($conn,$phase2_english);
        if(mysqli_num_rows($run_phase2_english) > 0){
            $rows3 = mysqli_fetch_array($run_phase2_english);
            while(mysqli_fetch_array($run_phase2_english));

                $html.='
                <td>'.$rows3['grade'].'</td>
                    ';
            
            }


        }

}

//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
    
        // phase 2 term 4 english 

if($phase2_subject_id == 3 ){
    $phase2_english = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
    $run_phase2_english = mysqli_query($conn,$phase2_english);
    if(mysqli_num_rows($run_phase2_english) > 0){
        $rows4 = mysqli_fetch_array($run_phase2_english);
        while(mysqli_fetch_array($run_phase2_english));

            $html.='
            <td>'.$rows4['grade'].'</td>
            ';
        
        }


    }
}
for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    // phase 2 final rating english 

if($phase2_subject_id == 3 ){
    $phase2_english = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_english = mysqli_query($conn,$phase2_english);
    if(mysqli_num_rows($run_phase2_english) > 0){
        $rows = mysqli_fetch_array($run_phase2_english);
        while(mysqli_fetch_array($run_phase2_english));

            $html.='
            <td>'.$rows['final_rating'].'</td>
            <td>'.$rows['remarks'].'</td>
            </tr> ';
        
        }


    }


}

// Mathematics Phase-2 

//phase 2 term 1 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
        //phase 1 term 1 math

        if($phase2_subject_id == 4 ){
            $phase2_math = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_math = mysqli_query($conn,$phase2_math);
            if(mysqli_num_rows($run_phase2_math) > 0){
                $rows = mysqli_fetch_array($run_phase2_math);
                while(mysqli_fetch_array($run_phase2_math));

                    $html.='
                    <tr>
                    <td>Mathematics</td>
                    <td> '.$rows['grade'].'</td>
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
                $phase2_math = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_math = mysqli_query($conn,$phase2_math);
                if(mysqli_num_rows($run_phase2_math) > 0){
                    $rows2 = mysqli_fetch_array($run_phase2_math);
                    while(mysqli_fetch_array($run_phase2_math));

                        $html.='
                        <td>'.$rows2['grade'].'</td>
                         ';
                    
                    }   

            
                }
   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;

        //phase 2 term 3 math

        if($phase2_subject_id == 4 ){
            $phase2_math = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_math = mysqli_query($conn,$phase2_math);
            if(mysqli_num_rows($run_phase2_math) > 0){
                $rows3 = mysqli_fetch_array($run_phase2_math);
                while(mysqli_fetch_array($run_phase2_math));

                    $html.='
                    <td> '.$rows3['grade'].'</td>
                    ';
                
                }   

        
            }

}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;

    //phase 2 term 4 math

    if($phase2_subject_id == 4 ){
        $phase2_math = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_math = mysqli_query($conn,$phase2_math);
        if(mysqli_num_rows($run_phase2_math) > 0){
            $rows4 = mysqli_fetch_array($run_phase2_math);
            while(mysqli_fetch_array($run_phase2_math));

                $html.='
                <td> '.$rows4['grade'].'</td>
                    ';
            
            }   

    
        }
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    //phase 2 final rating math

if($phase2_subject_id == 4 ){
    $phase2_math = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_math = mysqli_query($conn,$phase2_math);
    if(mysqli_num_rows($run_phase2_math) > 0){
        $rows = mysqli_fetch_array($run_phase2_math);
        while(mysqli_fetch_array($run_phase2_math));

            $html.='
            <td>'.$rows['final_rating'].'</td>
            <td>'.$rows['remarks'].' </td>
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
                    $phase2_science = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                    $run_phase2_science = mysqli_query($conn,$phase2_science);
                    if(mysqli_num_rows($run_phase2_science) > 0){
                        $rows = mysqli_fetch_array($run_phase2_science);
                        while(mysqli_fetch_array($run_phase2_science));
    
                            $html.='
                            <tr>
                            <td>Science</td>
                            <td>'.$rows['grade'].'</td>
                            ';
                        
                        }
    
                
                    }
    


}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;
         // phase 2 term 2 science

         if($phase2_subject_id == 5 ){
            $phase2_science = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_science = mysqli_query($conn,$phase2_science);
            if(mysqli_num_rows($run_phase2_science) > 0){
                $rows2 = mysqli_fetch_array($run_phase2_science);
                while(mysqli_fetch_array($run_phase2_science));

                    $html.='
                    <td>'.$rows2['grade'].'</td>
                    ';
                
                }

        
            }
   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;
               // phase 2 term 3 science

               if($phase2_subject_id == 5 ){
                $phase2_science = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_science = mysqli_query($conn,$phase2_science);
                if(mysqli_num_rows($run_phase2_science) > 0){
                    $rows3 = mysqli_fetch_array($run_phase2_science);
                    while(mysqli_fetch_array($run_phase2_science));
    
                        $html.='
                        <td>'.$rows3['grade'].'</td>
                        ';
                    
                    }
    
            
                }

}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
          // phase 2 term 4 science

          if($phase2_subject_id == 5 ){
            $phase2_science = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_science = mysqli_query($conn,$phase2_science);
            if(mysqli_num_rows($run_phase2_science) > 0){
                $rows4 = mysqli_fetch_array($run_phase2_science);
                while(mysqli_fetch_array($run_phase2_science));

                    $html.='
                    <td>'.$rows4['grade'].'</td>
                        ';
                
                }

        
            }
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    // phase 2 final rating science

if($phase2_subject_id == 5 ){
    $phase2_science = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_science = mysqli_query($conn,$phase2_science);
    if(mysqli_num_rows($run_phase2_science) > 0){
        $rows = mysqli_fetch_array($run_phase2_science);
        while(mysqli_fetch_array($run_phase2_science));

            $html.='
            <td> '.$rows['final_rating'].'</td>
            <td>'.$rows['remarks'].'</td>
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
                    $phase2_AP = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                    $run_phase2_AP = mysqli_query($conn,$phase2_AP);
                    if(mysqli_num_rows($run_phase2_AP) > 0){
                        $rows = mysqli_fetch_array($run_phase2_AP);
                        while(mysqli_fetch_array($run_phase2_AP));
    
                        $html.='
                        <tr>
                        <td>Aralin Panlipunan</td>
                        <td>'.$rows['grade'].'</td>
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
            $phase2_AP = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_AP = mysqli_query($conn,$phase2_AP);
            if(mysqli_num_rows($run_phase2_AP) > 0){
                $rows2 = mysqli_fetch_array($run_phase2_AP);
                while(mysqli_fetch_array($run_phase2_AP));

                $html.='
                <td>'.$rows2['grade'].'</td>
                    ';
            
            }


        }

   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;
          // phase 2 term 3 ap
          if($phase2_subject_id == 6 ){
            $phase2_AP = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_AP = mysqli_query($conn,$phase2_AP);
            if(mysqli_num_rows($run_phase2_AP) > 0){
                $rows3 = mysqli_fetch_array($run_phase2_AP);
                while(mysqli_fetch_array($run_phase2_AP));

                $html.='
                <td>'.$rows3['grade'].'</td>
                ';
            
            }


        }

}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
    
            // phase 2 term 4 ap
            if($phase2_subject_id == 6 ){
                $phase2_AP = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_AP = mysqli_query($conn,$phase2_AP);
                if(mysqli_num_rows($run_phase2_AP) > 0){
                    $rows5 = mysqli_fetch_array($run_phase2_AP);
                    while(mysqli_fetch_array($run_phase2_AP));
    
                    $html.='
                    <td>'.$rows4['grade'].'</td>
                    ';
                
                }
    
    
            }
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
       // phase 2 final rating ap
if($phase2_subject_id == 6 ){
    $phase2_AP = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_AP = mysqli_query($conn,$phase2_AP);
    if(mysqli_num_rows($run_phase2_AP) > 0){
        $rows = mysqli_fetch_array($run_phase2_AP);
        while(mysqli_fetch_array($run_phase2_AP));

        $html.='
        <td>'.$rows['final_rating'].'</td>
        <td>'.$rows['remarks'].'</td>
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
                $phase2_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_ep_tle = mysqli_query($conn,$phase2_epp_tle);
                if(mysqli_num_rows($run_phase2_ep_tle) > 0){
                    $rows = mysqli_fetch_array($run_phase2_ep_tle);
                    while(mysqli_fetch_array($run_phase2_ep_tle));

                    $html.='
                    <tr>
                    <td>EPP/TLE</td>
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
                $phase2_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_ep_tle = mysqli_query($conn,$phase2_epp_tle);
                if(mysqli_num_rows($run_phase2_ep_tle) > 0){
                    $rows2 = mysqli_fetch_array($run_phase2_ep_tle);
                    while(mysqli_fetch_array($run_phase2_ep_tle));

                    $html.='
                    <td>'.$rows2['grade'].'</td>
                        ';
                
                }


            }
   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;
    
        // phase 2 term 3 EPP_TLE
        if($phase2_subject_id == 7 ){
            $phase2_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_ep_tle = mysqli_query($conn,$phase2_epp_tle);
            if(mysqli_num_rows($run_phase2_ep_tle) > 0){
                $rows3 = mysqli_fetch_array($run_phase2_ep_tle);
                while(mysqli_fetch_array($run_phase2_ep_tle));

                $html.='
                <td>'.$rows3['grade'].'</td>
                ';
            
            }


        }


}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
    
        // phase 2 term 4 EPP_TLE
        if($phase2_subject_id == 7 ){
            $phase2_epp_tle = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_ep_tle = mysqli_query($conn,$phase2_epp_tle);
            if(mysqli_num_rows($run_phase2_ep_tle) > 0){
                $rows4 = mysqli_fetch_array($run_phase2_ep_tle);
                while(mysqli_fetch_array($run_phase2_ep_tle));

                $html.='
                <td>'.$rows4['grade'].'</td>
                ';
            
            }


        }
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    // phase 2 final rating EPP_TLE
if($phase2_subject_id == 7 ){
    $phase2_epp_tle = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_ep_tle = mysqli_query($conn,$phase2_epp_tle);
    if(mysqli_num_rows($run_phase2_ep_tle) > 0){
        $rows = mysqli_fetch_array($run_phase2_ep_tle);
        while(mysqli_fetch_array($run_phase2_ep_tle));

        $html.='
        <td> '.$rows['final_rating'].'</td>
        <td> '.$rows['remarks'].'</td>
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
                $phase2_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_mapeh = mysqli_query($conn,$phase2_mapeh);
                if(mysqli_num_rows($run_phase2_mapeh) > 0){
                    $rows = mysqli_fetch_array($run_phase2_mapeh);
                    while(mysqli_fetch_array($run_phase2_mapeh));

                    $html.='
                    <tr>
                    <td>MAPEH</td>
                    <td> '.$rows['grade'].'</td>
                    
                    ';
                
                }


            }


}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;
          // phase 2 term 2 MAPEH
          if($phase2_subject_id == 8 ){
            $phase2_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_mapeh = mysqli_query($conn,$phase2_mapeh);
            if(mysqli_num_rows($run_phase2_mapeh) > 0){
                $rows2 = mysqli_fetch_array($run_phase2_mapeh);
                while(mysqli_fetch_array($run_phase2_mapeh));

                $html.='
                <td>'.$rows2['grade'].'</td>
                ';
            
            }


        }
   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;

          // phase 2 term 3 MAPEH
          if($phase2_subject_id == 8 ){
            $phase2_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_mapeh = mysqli_query($conn,$phase2_mapeh);
            if(mysqli_num_rows($run_phase2_mapeh) > 0){
                $rows3 = mysqli_fetch_array($run_phase2_mapeh);
                while(mysqli_fetch_array($run_phase2_mapeh));

                $html.='
                <td>'.$rows3['grade'].'</td>
                ';
            
            }


        }

}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;

    
        // phase 2 term 4 MAPEH
        if($phase2_subject_id == 8 ){
            $phase2_mapeh = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_mapeh = mysqli_query($conn,$phase2_mapeh);
            if(mysqli_num_rows($run_phase2_mapeh) > 0){
                $rows4 = mysqli_fetch_array($run_phase2_mapeh);
                while(mysqli_fetch_array($run_phase2_mapeh));

                $html.='
               <td>'.$rows4['grade'].'</td>  ';
            
            }


        }
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    // phase 2 final rating MAPEH
if($phase2_subject_id == 8 ){
    $phase2_mapeh = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_mapeh = mysqli_query($conn,$phase2_mapeh);
    if(mysqli_num_rows($run_phase2_mapeh) > 0){
        $rows = mysqli_fetch_array($run_phase2_mapeh);
        while(mysqli_fetch_array($run_phase2_mapeh));

        $html.='
        <td>'.$rows['final_rating'].'</td>
        <td> '.$rows['remarks'].'</td>
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
                    $phase2_music = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                    $run_phase2_music = mysqli_query($conn,$phase2_music);
                    if(mysqli_num_rows($run_phase2_music) > 0){
                        $rows = mysqli_fetch_array($run_phase2_music);
                        while(mysqli_fetch_array($run_phase2_music));
    
                        $html.='
                        <tr>
                        <td>Music</td>
                        <td>'.$rows['grade'].'</td>
                        ';
                    
                    }
    
    
                }

}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;
         // phase 2 term 2 music
         if($phase2_subject_id == 9 ){
            $phase2_music = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_music = mysqli_query($conn,$phase2_music);
            if(mysqli_num_rows($run_phase2_music) > 0){
                $rows2 = mysqli_fetch_array($run_phase2_music);
                while(mysqli_fetch_array($run_phase2_music));

                $html.='
                <td> '.$rows2['grade'].'</td>
                ';
            
            }


        }

   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;

         // phase 2 term 3 music
         if($phase2_subject_id == 9 ){
            $phase2_music = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_music = mysqli_query($conn,$phase2_music);
            if(mysqli_num_rows($run_phase2_music) > 0){
                $rows3 = mysqli_fetch_array($run_phase2_music);
                while(mysqli_fetch_array($run_phase2_music));

                $html.='
                <td>'.$rows3['grade'].'</td>
                ';
            
            }


        }

}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
         // phase 2 term 4 music
         if($phase2_subject_id == 9 ){
            $phase2_music = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_music = mysqli_query($conn,$phase2_music);
            if(mysqli_num_rows($run_phase2_music) > 0){
                $rows4 = mysqli_fetch_array($run_phase2_music);
                while(mysqli_fetch_array($run_phase2_music));

                $html.='
                <td>'.$rows4['grade'].'</td>
                ';
            
            }


        }
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
   // phase 2 final rating music
   if($phase2_subject_id == 9 ){
    $phase2_music = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_music = mysqli_query($conn,$phase2_music);
    if(mysqli_num_rows($run_phase2_music) > 0){
        $rows = mysqli_fetch_array($run_phase2_music);
        while(mysqli_fetch_array($run_phase2_music));

        $html.='
        <td>'.$rows['final_rating'].'</td>
        <td>'.$rows['remarks'].'</td>
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
                        $phase2_arts = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                        $run_phase2_arts = mysqli_query($conn,$phase2_arts);
                        if(mysqli_num_rows($run_phase2_arts) > 0){
                            $rows = mysqli_fetch_array($run_phase2_arts);
                            while(mysqli_fetch_array($run_phase2_arts));
        
                            $html.='
                            <tr>
                            <td>Arts</td>
                            <td> '.$rows['grade'].'</td>
                             ';
                        
                        }
        
        
                    }
        


}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;
    // phase 2 term 2 arts
    if($phase2_subject_id == 10 ){
    $phase2_arts = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
    $run_phase2_arts = mysqli_query($conn,$phase2_arts);
    if(mysqli_num_rows($run_phase2_arts) > 0){
        $rows2 = mysqli_fetch_array($run_phase2_arts);
        while(mysqli_fetch_array($run_phase2_arts));

        $html.='
        <td> '.$rows2['grade'].'</td>
        ';
    
    }


}
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;
        // phase 2 term 3 arts
        if($phase2_subject_id == 10 ){
        $phase2_arts = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_arts = mysqli_query($conn,$phase2_arts);
        if(mysqli_num_rows($run_phase2_arts) > 0){
            $rows3 = mysqli_fetch_array($run_phase2_arts);
            while(mysqli_fetch_array($run_phase2_arts));

            $html.='
            <td>'.$rows3['grade'].'</td>
            ';
        
        }


    }
        

}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
        // phase 2 term 4 arts
        if($phase2_subject_id == 10 ){
        $phase2_arts = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_arts = mysqli_query($conn,$phase2_arts);
        if(mysqli_num_rows($run_phase2_arts) > 0){
            $rows4 = mysqli_fetch_array($run_phase2_arts);
            while(mysqli_fetch_array($run_phase2_arts));

            $html.='
            <td>'.$rows4['grade'].'</td>
            ';
        
        }


    }
    
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
          // phase 2 final rating arts
if($phase2_subject_id == 10 ){
    $phase2_arts = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_arts = mysqli_query($conn,$phase2_arts);
    if(mysqli_num_rows($run_phase2_arts) > 0){
        $rows = mysqli_fetch_array($run_phase2_arts);
        while(mysqli_fetch_array($run_phase2_arts));

        $html.='
        <td>'.$rows['final_rating'].'</td>
        <td>'.$rows['remarks'].'</td>
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
        $phase2_pe = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_pe = mysqli_query($conn,$phase2_pe);
        if(mysqli_num_rows($run_phase2_pe) > 0){
            $rows = mysqli_fetch_array($run_phase2_pe);
            while(mysqli_fetch_array($run_phase2_pe));

            $html.='
            <tr>
            <td>Physical Education </td>
            <td>'.$rows['grade'].'</td>
            ';
        
        }


    }


}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;
    
            // phase 2 term 2 PE
            if($phase2_subject_id == 11 ){
                $phase2_pe = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_pe = mysqli_query($conn,$phase2_pe);
                if(mysqli_num_rows($run_phase2_pe) > 0){
                    $rows2 = mysqli_fetch_array($run_phase2_pe);
                    while(mysqli_fetch_array($run_phase2_pe));

                    $html.='
                    <td>'.$rows2['grade'].' </td>
                    ';
                
                }


            }
   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;
    
        // phase 2 term 3 PE
        if($phase2_subject_id == 11 ){
            $phase2_pe = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_pe = mysqli_query($conn,$phase2_pe);
            if(mysqli_num_rows($run_phase2_pe) > 0){
                $rows3 = mysqli_fetch_array($run_phase2_pe);
                while(mysqli_fetch_array($run_phase2_pe));

                $html.='
                <td>'.$rows3['grade'].'</td>
                ';
            
            }


        }

}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
        // phase 2 term 4 PE
        if($phase2_subject_id == 11 ){
            $phase2_pe = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_pe = mysqli_query($conn,$phase2_pe);
            if(mysqli_num_rows($run_phase2_pe) > 0){
                $rows4 = mysqli_fetch_array($run_phase2_pe);
                while(mysqli_fetch_array($run_phase2_pe));

                $html.='
                <td>'.$rows4['grade'].'</td>
                ';
            
            }


        }
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
// phase 2 final rating PE
if($phase2_subject_id == 11 ){
    $phase2_pe = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_pe = mysqli_query($conn,$phase2_pe);
    if(mysqli_num_rows($run_phase2_pe) > 0){
        $rows = mysqli_fetch_array($run_phase2_pe);
        while(mysqli_fetch_array($run_phase2_pe));

        $html.='
        <td>'.$rows['final_rating'].'</td>
        <td> '.$rows['remarks'].'</td>
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
            $phase2_health = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_health = mysqli_query($conn,$phase2_health);
            if(mysqli_num_rows($run_phase2_health) > 0){
                $rows = mysqli_fetch_array($run_phase2_health);
                while(mysqli_fetch_array($run_phase2_health));

                $html.='
                <tr>
                <td>Health</td>
                <td>'.$rows['grade'].'</td>
                ';
            
            }


        }


}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;
    
            // phase 2 term 2 Health
            if($phase2_subject_id == 12 ){
                $phase2_health = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_health = mysqli_query($conn,$phase2_health);
                if(mysqli_num_rows($run_phase2_health) > 0){
                    $rows2 = mysqli_fetch_array($run_phase2_health);
                    while(mysqli_fetch_array($run_phase2_health));

                    $html.='
                    <td>'.$rows2['grade'].'</td>
                    ';
                
                }


            }
            
   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;
    
        // phase 2 term 3 Health
        if($phase2_subject_id == 12 ){
            $phase2_health = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_health = mysqli_query($conn,$phase2_health);
            if(mysqli_num_rows($run_phase2_health) > 0){
                $rows3 = mysqli_fetch_array($run_phase2_health);
                while(mysqli_fetch_array($run_phase2_health));

                $html.='
                <td>'.$rows3['grade'].'</td>
                ';
            
            }


        }
        

}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
    
        // phase 2 term 4 Health
        if($phase2_subject_id == 12 ){
            $phase2_health = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_health = mysqli_query($conn,$phase2_health);
            if(mysqli_num_rows($run_phase2_health) > 0){
                $rows4 = mysqli_fetch_array($run_phase2_health);
                while(mysqli_fetch_array($run_phase2_health));

                $html.='
                <td>'.$rows4['grade'].'</td>
                ';
            
            }


        }
        
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    // phase 2 final rating Health
if($phase2_subject_id == 12 ){
    $phase2_health = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_health = mysqli_query($conn,$phase2_health);
    if(mysqli_num_rows($run_phase2_health) > 0){
        $rows = mysqli_fetch_array($run_phase2_health);
        while(mysqli_fetch_array($run_phase2_health));

        $html.='
        <td> '.$rows['final_rating'].' </td>
        <td>'.$rows['remarks'].'</td>
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
        $phase2_esp = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_esp = mysqli_query($conn,$phase2_esp);
        if(mysqli_num_rows($run_phase2_esp) > 0){
            $rows = mysqli_fetch_array($run_phase2_esp);
            while(mysqli_fetch_array($run_phase2_esp));

            $html.='
            <tr>
            <td>Eduk. Sa Pagpapakatao</td>
            <td>'.$rows['grade'].'</td>
                ';
        
        }


    }

}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;
    
            // phase 2 term 2 eduk sa pag papakatao
            if($phase2_subject_id == 13 ){
                $phase2_esp = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_esp = mysqli_query($conn,$phase2_esp);
                if(mysqli_num_rows($run_phase2_esp) > 0){
                    $rows2 = mysqli_fetch_array($run_phase2_esp);
                    while(mysqli_fetch_array($run_phase2_esp));

                    $html.='
                    <td> '.$rows2['grade'].'</td>
                    ';
                
                }


            }

   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;
        // phase 2 term 3 eduk sa pag papakatao
        if($phase2_subject_id == 13 ){
            $phase2_esp = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_esp = mysqli_query($conn,$phase2_esp);
            if(mysqli_num_rows($run_phase2_esp) > 0){
                $rows3 = mysqli_fetch_array($run_phase2_esp);
                while(mysqli_fetch_array($run_phase2_esp));

                $html.='
                <td>'.$rows['grade'].' </td>
                ';
            
            }


        }


}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
    
        // phase 2 term 4 eduk sa pag papakatao
        if($phase2_subject_id == 13 ){
            $phase2_esp = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_esp = mysqli_query($conn,$phase2_esp);
            if(mysqli_num_rows($run_phase2_esp) > 0){
                $rows4 = mysqli_fetch_array($run_phase2_esp);
                while(mysqli_fetch_array($run_phase2_esp));

                $html.='
                <td>'.$rows4['grade'].' </td>
                ';
            
            }


        }

}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    // phase 2 final rating eduk sa pag papakatao
if($phase2_subject_id == 13 ){
    $phase2_esp = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_esp = mysqli_query($conn,$phase2_esp);
    if(mysqli_num_rows($run_phase2_esp) > 0){
        $rows = mysqli_fetch_array($run_phase2_esp);
        while(mysqli_fetch_array($run_phase2_esp));

        $html.='
        <td> '.$rows['final_rating'].'</td>
        <td>'.$rows['remarks'].'</td>
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
                $phase2_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_arabic = mysqli_query($conn,$phase2_arabic);
                if(mysqli_num_rows($run_phase2_arabic) > 0){
                    $rows = mysqli_fetch_array($run_phase2_arabic);
                    while(mysqli_fetch_array($run_phase2_arabic));

                    $html.='
                    <tr>
                    <td>*Arabic Language</td>
                    <td> '.$rows['grade'].' </td>
                   

                    ';
                
                }


            }


}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;

        // phase 2 term 2 arabic
        if($phase2_subject_id == 14 ){
            $phase2_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_arabic = mysqli_query($conn,$phase2_arabic);
            if(mysqli_num_rows($run_phase2_arabic) > 0){
                $rows2 = mysqli_fetch_array($run_phase2_arabic);
                while(mysqli_fetch_array($run_phase2_arabic));

                $html.='
                <td>'.$rows2['grade'].'</td>
               ';
            
            }


        }
   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;

           // phase 2 term 3 arabic
           if($phase2_subject_id == 14 ){
            $phase2_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_arabic = mysqli_query($conn,$phase2_arabic);
            if(mysqli_num_rows($run_phase2_arabic) > 0){
                $rows = mysqli_fetch_array($run_phase2_arabic);
                while(mysqli_fetch_array($run_phase2_arabic));

                $html.='
                <td>'.$rows3['grade'].'</td>
                ';
            
            }


        }


}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
       // phase 2 term 4 arabic
       if($phase2_subject_id == 14 ){
        $phase2_arabic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_arabic = mysqli_query($conn,$phase2_arabic);
        if(mysqli_num_rows($run_phase2_arabic) > 0){
            $rows4 = mysqli_fetch_array($run_phase2_arabic);
            while(mysqli_fetch_array($run_phase2_arabic));

            $html.='
            <td> '.$rows4['grade'].'</td>
            ';
        
        }


    }
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    // phase 2 final rating arabic
if($phase2_subject_id == 14 ){
    $phase2_arabic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_arabic = mysqli_query($conn,$phase2_arabic);
    if(mysqli_num_rows($run_phase2_arabic) > 0){
        $rows = mysqli_fetch_array($run_phase2_arabic);
        while(mysqli_fetch_array($run_phase2_arabic));

        $html.='
        <td>'.$rows['final_rating'].'</td>
        <td>'.$rows['remarks'].'</td>
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
        $phase2_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_islamic = mysqli_query($conn,$phase2_islamic);
        if(mysqli_num_rows($run_phase2_islamic) > 0){
            $rows = mysqli_fetch_array($run_phase2_islamic);
            while(mysqli_fetch_array($run_phase2_islamic));

            $html.='
            <tr>
            <td>*Islamic Values</td>
            <td>'.$rows['grade'].'</td>
            
              ';
        
        }


    }

}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2;
        
            // phase 2 term 2 islamic
            if($phase2_subject_id == 15 ){
                $phase2_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
                $run_phase2_islamic = mysqli_query($conn,$phase2_islamic);
                if(mysqli_num_rows($run_phase2_islamic) > 0){
                    $rows2 = mysqli_fetch_array($run_phase2_islamic);
                    while(mysqli_fetch_array($run_phase2_islamic));

                    $html.='
                    <td>'.$rows2['grade'].' </td>
                    ';
                
                }


            }

   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;
       // phase 2 term 3 islamic
       if($phase2_subject_id == 15 ){
        $phase2_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
        $run_phase2_islamic = mysqli_query($conn,$phase2_islamic);
        if(mysqli_num_rows($run_phase2_islamic) > 0){
            $rows3 = mysqli_fetch_array($run_phase2_islamic);
            while(mysqli_fetch_array($run_phase2_islamic));

            $html.='
            <td> '.$rows3['grade'].'</td>
            ';
            
        
        }


    }

}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;
        // phase 2 term 4 islamic
        if($phase2_subject_id == 15 ){
            $phase2_islamic = "SELECT * FROM `student_grades` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2' AND term = '$term'";
            $run_phase2_islamic = mysqli_query($conn,$phase2_islamic);
            if(mysqli_num_rows($run_phase2_islamic) > 0){
                $rows4 = mysqli_fetch_array($run_phase2_islamic);
                while(mysqli_fetch_array($run_phase2_islamic));

                $html.='
                <td>'.$rows4['grade'].'</td>
                ';
            
            }


        }
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    // phase 2 final rating islamic
if($phase2_subject_id == 15 ){
    $phase2_islamic = "SELECT * FROM `student_final_ratings` WHERE lrn = '$lrn' AND subject_id = '$phase2_subject_id' AND phase = '$phase2'";
    $run_phase2_islamic = mysqli_query($conn,$phase2_islamic);
    if(mysqli_num_rows($run_phase2_islamic) > 0){
        $rows = mysqli_fetch_array($run_phase2_islamic);
        while(mysqli_fetch_array($run_phase2_islamic));

        $html.='
        <td>'.$rows['final_rating'].'</td>
        <td>'.$rows['remarks'].'</td>
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
                $phase2_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$lrn' AND term = '$term' AND  phase = '$phase2' ";
                $run_phase2_term1_general_average = mysqli_query($conn,$phase2_term1_general_average_query);
                if(mysqli_num_rows($run_phase2_term1_general_average)> 0 ){
                    $rows = mysqli_fetch_array($run_phase2_term1_general_average);
                    $html.='
                    <tr>
                    <td>General Average</td>
                    <td>'.$rows['general_average'].' </td>
                   
                    
                    ';
                


                }
                


            }

}


// phase 2 term 2 ////////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 2; 
    
            //phase 2 term 2 general average
            if( $phase2_subject_id == 16){
                $phase2_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$lrn' AND term = '$term' AND  phase = '$phase2' ";
                $run_phase2_term1_general_average = mysqli_query($conn,$phase2_term1_general_average_query);
                if(mysqli_num_rows($run_phase2_term1_general_average)> 0 ){
                    $rows2 = mysqli_fetch_array($run_phase2_term1_general_average);
                    $html.='
                    <td>'.$rows2['general_average'].'</td>
                    ';
                


                }
                


            }
   
}



                
            //phase 2 term 3 //////////////////////////////////////////////

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 3;
    
        //phase 2 term 3 general average
        if( $phase2_subject_id == 16){
            $phase2_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$lrn' AND term = '$term' AND  phase = '$phase2' ";
            $run_phase2_term1_general_average = mysqli_query($conn,$phase2_term1_general_average_query);
            if(mysqli_num_rows($run_phase2_term1_general_average)> 0 ){
                $rows3 = mysqli_fetch_array($run_phase2_term1_general_average);
                $html.='
                <td>'.$rows3['general_average'].'</td>
                ';
            


            }
            


        }

}


//phase 2 term 4 

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
    
    
    $term = 4;

     //phase 2 term 4 general average
     if( $phase2_subject_id == 16){
        $phase2_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$lrn' AND term = '$term' AND  phase = '$phase2' ";
        $run_phase2_term1_general_average = mysqli_query($conn,$phase2_term1_general_average_query);
        if(mysqli_num_rows($run_phase2_term1_general_average)> 0 ){
            $rows4 = mysqli_fetch_array($run_phase2_term1_general_average);
            $html.='
            <td>'.$rows['general_average'].'</td>
                ';
        


        }
        


    }
}

for ($phase2_subject_id = 1; $phase2_subject_id <= 16 ; $phase2_subject_id++) {
        //phase 2 final rating general average
if( $phase2_subject_id == 16){
    $phase2_term1_general_average_query = "SELECT * FROM `student_general_averages` WHERE lrn = '$lrn' AND  phase = '$phase2' AND term = ' Final Rating' ";
    $run_phase2_term1_general_average = mysqli_query($conn,$phase2_term1_general_average_query);
    if(mysqli_num_rows($run_phase2_term1_general_average)> 0 ){
        $rows = mysqli_fetch_array($run_phase2_term1_general_average);
        $html.='
        <td> '.$rows['general_average'].'</td>
        <td></td>
        </tr>
        </tbody>
          ';
    


    }
    


}


}



$html.=' 
</table>
';
            



for($phase2_remedial_term = 1; $phase2_remedial_term <=2; $phase2_remedial_term++){

    if($phase2_remedial_term == 1 ){

        $phase2_remedial_query = " SELECT * FROM `remedial_classes` WHERE lrn ='$lrn'AND phase = '$phase2' AND term = '$phase2_remedial_term' ";
        $phase2_run_query = mysqli_query($conn,$phase2_remedial_query);
        if(mysqli_num_rows($phase2_run_query)> 0 ){
            $rows = mysqli_fetch_array($phase2_run_query);
            while(mysqli_fetch_array($phase2_run_query));
            $html.='
            <table class="remedial-2">
            <thead>
            <tr>
            <th colspan="2">Remedial Classes</th>
            <th colspan="2"> Date Conducted: '.$rows['date_from'].'</th>
            <th colspan="1">To: '.$rows['date_to'].'</th>
            </tr>
            <tr>
            <th>Learning Areas</th>
            <th>Final Rating</th>
            <th>Remedial Class Mark</th>
            <th>Remarks</th>
            <th>Recomputed Final Grade</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td>'.$rows['learning_areas'].'</td>
            <td>'.$rows['final_rating'].'</td>
            <td>'.$rows['remarks'].'</td>
            <td>'.$rows['remedial_class_mark'].'</td>
            <td>'.$rows['recomputed_final_grade'].'</td>
            </tr>
           

            
            

          
           
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
             <tr>
            <td>'.$rows['learning_areas'].'</td>
            <td>'.$rows['final_rating'].'</td>
            <td>'.$rows['remarks'].'</td>
            <td>'.$rows['remedial_class_mark'].'</td>
            <td>'.$rows['recomputed_final_grade'].'</td>
            </tr>
            </tbody>


      </table>
      </div>

    
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