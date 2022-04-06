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
    <link rel="stylesheet" href="src/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="src/css/chngpass.css">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid px-0 py-1 text-center text-white bg-success">
        <p class="display-6 m-0">PLACIDO DEL MUNDO</p>
        <p class="lead m-0">ELEMENTARY SCHOOL</p>
        <p class="address">1116 Quirino Hwy, Novaliches, Quezon City, 1116 Metro Manila</p>
    </div>
    <div class="form-container container-lg mt-0 d-flex flex-column justify-content-center align-items-center text-center">
        <form action = "#" method = "POST" class="login-form"> 
            <span class="form-header">
                <h2 class="header-text bg-muted display-8"> Change password</h2>
            </span>
            <span class="input-boxes">
                <input type="password" class="form-control" name="new-password" placeholder="New Password" required> <br>
                <input type="password" class="form-control" name="Re_password" placeholder="Re-type Password" required> <br>
                <input type = "submit" name= "change" value="submit" >
            </span>
        </form>
    </div>
    <?php
    include "includes/footer.php";
    ?>
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