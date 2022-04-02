<?php
// dali tangina mo ayusin mo na yung body and subject ng php mailer kasi pang tanga nilagay ko 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



        function sendMail($email,$path){
        require ("PHPMailer.php");
        require("SMTP.php");
        require("Exception.php");


            
            try {

                $mail = new PHPMailer(true);
                //Server settings
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'thaddeusgamit31@gmail.com';                     //SMTP username
                $mail->Password   = 'ztqejvrgppyaqfjm';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('thaddeusgamit31@gmail.com', '');//wait si dali
                $mail->addAddress($email);
                $mail->addAttachment($path);       //Add a recipient
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Debugging';
                $mail->Body    = "Dali tangina mo " ;
    
                $mail->send();
                return true;
            } 
            catch (Exception $e) {
                return false;
            }

    
   
                    }
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
    <form action="" method="POST" enctype="multipart/form-data" >
    <label for="">Enter Email: </label>
        <input class="" type="text" name="email" required> <br>
        <label for="">please select the grade below </label> <br>
        <label for="">prep </label>
        <input class="" type="radio" name="grades" value = "prep" required> <br>
        <label for=""> Grade 1 </label>

        <input class="" type="radio" name="grades" value = "grade1" required> <br>
        <label for=""> Grade 2 </label>
        <input class="" type="radio" name="grades" value = "grade2" required> <br>
        <label for=""> Grade 3 </label>
        <input class="" type="radio" name="grades" value = "grade3" required> <br>
        <label for=""> Grade 4 </label>
        <input class="" type="radio" name="grades" value = "grade4" required> <br>
        <label for=""> Grade 5 </label>
        <input class="" type="radio" name="grades" value = "grade5" required> <br>
        <label for=""> Grade 6 </label>
        <input class="" type="radio" name="grades" value = "grade6" required> <br>
                

        <label for="">Select files: </label>
        <input class="" type="file" name="file" accept= "application/pdf"> <br>
        

        <input class="" type="submit" name="submit" value="submit">
    </form>
</body>
<?php


if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $grades = $_POST['grades'];
      

    if ($grades == "prep"){
        $path = 'C:\Users\Thaddeus\Documents\files\prep/'. basename($_FILES['file']['name']);
        if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
        
            sendMail($email,$path);
    
            }
            else echo  "Please upload the pdf";
            
    
        }
    
    
    if ($grades == "grade1"){
    $path = 'C:\Users\Thaddeus\Documents\files\Grade 1/'. basename($_FILES['file']['name']);
    if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
    
        sendMail($email,$path);

        }
        else echo  "Please upload the pdf";
        

    }

    if ($grades == "grade2"){
        $path = 'C:\Users\Thaddeus\Documents\files\Grade 2/'. basename($_FILES['file']['name']);
        if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
        
            sendMail($email,$path);
    
            }
            else echo  "Please upload the pdf";
            
    
        }

        if ($grades == "grade3"){
            $path = 'C:\Users\Thaddeus\Documents\files\Grade 3/'. basename($_FILES['file']['name']);
            if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
            
                sendMail($email,$path);
        
                }
                else echo  "Please upload the pdf";
                
        
            }

            if ($grades == "grade4"){
                $path = 'C:\Users\Thaddeus\Documents\files\Grade 4/'. basename($_FILES['file']['name']);
                if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
                
                    sendMail($email,$path);
            
                    }
                    else echo  "Please upload the pdf";
                    
            
                }

                if ($grades == "grade5"){
                    $path = 'C:\Users\Thaddeus\Documents\files\Grade 5/'. basename($_FILES['file']['name']);
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
                    
                        sendMail($email,$path);
                
                        }
                        else echo  "Please upload the pdf";
                        
                
                    }

                    if ($grades == "grade6"){
                        $path = 'C:\Users\Thaddeus\Documents\files\Grade 6/'. basename($_FILES['file']['name']);
                        if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
                        
                            sendMail($email,$path);
                    
                            }
                            else echo  "Please upload the pdf";
                            
                    
                        }

    
}
?>
</html>