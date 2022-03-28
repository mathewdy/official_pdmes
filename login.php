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


    <label for="">Username</label>
    <input type="text" name="username"> <br>
    <label for="">Password</label>
    <input type="password" name="password"> <br>

    <input type = "submit" name= "submit" value="submit" >

</form>
 <?php
   if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        
        $query="SELECT`username`, `password` FROM `admin` WHERE username = '$username'";
        $result = mysqli_query($conn,$query);
        if (mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                    if($password == "ADMIN" || $password == "admin" )
                    return  header("location: chngpass.php");
                if (password_verify($password, $row['password'])){ 
                    $_SESSION['username'] = $username;
                    header("location: sample.php");
                     die();
                    
                } 
                else{
                    echo '<script>alert("Incorrect credentials")</script>' ; 
                }
            
                
                
        

                

                
                    
                


                
                   
                

                

        

       
    }

    }
}


?> 

  
</body>
</html>