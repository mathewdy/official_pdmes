<?php
include('connection.php');
ob_start();

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
    <h2>Phase 1 Scholastic Records</h2>
    <form action="" method="POST">

    <label for="">LRN:</label>
    <input type="number" name="lrn">
    <br>
    <label for="">School: </label>
    <input type="text" name="school">
    <br>
    <label for="">School Id:</label>
    <input type="number" name="school_id">
    <b></b>
    <label for="">District:</label>
    <input type="text" name="district">
    <br>
    <label for="">Division:</label>
    <input type="text" name="division">
    <br>
    <label for="">Region:</label>
    <input type="text" name="region">
    <br>
    <label for="">Classified As Grade:</label>
    <input type="text" name="classified_as_grade">
    <br>
    <label for="">Section:</label>
    <input type="text" name="section">
    <br>
    <label for="">Name of Adviser:</label>
    <input type="text" name="name_of_teacher">
    <br>
    <label for="">Signature:</label>
    <input type="text" name="signature">


    <br>
    <h3>Learning Areas</h3>
    <label for="">Mother Tounge</label>
    <label for="">Filipino</label>
    <label for="">English</label>
    <label for="">Mathematics</label>
    <label for="">Science</label>
    <label for="">Araling Panlipunan</label>
    <label for="">EPP / TLE</label>
    <label for="">Music</label>
    <label for="">Arts</label>
    <label for="">Physical Education</label>
    <label for="">Health</label>
    <label for="">Eduk. sa Pagpapakatao</label>
    <label for="">Arabic Language</label>
    <label for="">Islamic Values Education</label>
    <label for="">General Average</label>

    <h3>Quarterly Rating</h3>
    <h3>Term 1</h3>
    

    <br>
    <input type="submit" name="save" value="Save">

    </form>
</body>
</html>

<?php

if(isset($_POST['save'])){

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

    $fn = $_POST['FN'];
    $sn = $_POST['SN'];
    $tn = $_POST['TN'];
    $ftn = $_POST['FTN'];

    $array = array($fn, $sn, $tn, $ftn);
    $filter = array_filter($array);
    $count = count($filter);

    if($count == 0){
        $average = null;
    }else{
        $average = array_sum($array) / $count;
    }
    echo $average;

}


?>