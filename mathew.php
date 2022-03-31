<?php
ob_start();
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
    <form action="" method="POST">
       <input type="text" name="username">
       <input type="text" name="password">
       <input type="submit" name="login" value="Login"> 
    </form>
</body>
</html>

<?php

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $run = mysqli_query($conn,$sql);

    
    if(mysqli_num_rows($run) > 0){
        echo "login";
        $_SESSION['username'] = $username;
        header("Location: phase1.php");
        exit();
    }else{
        echo "eror" . $conn->error;
    }
       
}



ob_end_flush();
?>