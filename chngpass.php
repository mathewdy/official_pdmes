<?php
include('connection.php');
session_start();
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
    
    <form action = "" method = "POST"> 
    <h2> Change password</h2>

    <label for="">New password</label>
    <input type="text" name="password"> <br>
    <label for="">Re-type password</label>
    <input type="password" name="Re_password"> <br>

    <input type = "submit" name= "change" value="submit" >


<?php
    if(isset($_POST['change'])){
       $new_password = $_POST['password'];
       $re_password = $_POST['Re_password']; 
      

       if($new_password == $re_password){
        $new_password = password_hash($new_password,PASSWORD_DEFAULT);
            $update_query = "UPDATE `admin` SET `password` = '$new_password' WHERE id = '1'";
            $result = mysqli_query($conn,$update_query);
            header ("location: login.php");
            
            
            
       }

       else {
           echo("Password does not match");
       }

    }
?>
</form>
</body>
</html>