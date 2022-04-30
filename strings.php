<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action= "" method= "post">
<input type="text" name="num1" >
<input type="text" name="num2" >
<input type="submit" name="sumbit" value = "submit" >
</form>
</body>
</html>

<?php

if(isset($_POST)){
$fnum = intval($_POST['num1']);
$snum = intval( $_POST['num2']);
// $fnum = (int) $fnum; 
// $snum = (int) $snum; 
echo $fnum + $snum;
}




?>