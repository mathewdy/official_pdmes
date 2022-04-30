<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
2 dates

<form action="" method="POST">
<input type="date" name="date_to">
<input type="date" name="date_from">
</form>
</body>
</html>

<?php

include('../connection.php');
echo $dateCreated = date("m-d-Y h:i:a") . '<br>';
echo $dateUpdated = date("Y-m-d h:i:a");

$grade = 74;
$answer = "PASSED";

if( $grade  < 1){
    echo $answer;
}
?>