<?php
ob_start();
session_start();

echo $_SESSION['lrn'] ;


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

  
    <input type="submit" name="next" value="Next">

</form>

    
</body>
</html>


<?php


if(isset($_POST['next'])){
    
    
    
  
}


ob_end_flush();
?>