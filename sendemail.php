<?php
// dali tangina mo ayusin mo na yung body and subject ng php mailer kasi pang tanga nilagay ko 



////////////BABAGUHIN KAPAG NASA PDMES NA /////////////////////
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
    <label for="">To: </label>
        <input class="" type="email" name="email" placeholder="Recipients" required> <br>

        <label for="">Subject:</label>
        <input type="text" name="subject" required>


        <br>
        <label for="">LRN:</label>
        <input type="text" name="lrn" required>
        <br>
                    
        <label for="">Select Grade Level</label>

        <select name="grade_level" id="" required>
            <option value="">-Select-</option>
            <option value="preparatory">Preparatory</option>
            <option value="grade1">Grade 1</option>
            <option value="grade2">Grade 2</option>
            <option value="grade3">Grade 3</option>
            <option value="grade4">Grade 4</option>
            <option value="grade5">Grade 5</option>
            <option value="grade6">Grade 6</option>
        </select>

        <br>
        

        <label for="">Select files: </label>
        <input class="" type="file" name="file" accept= "application/pdf" required> <br>
        <input class="" type="submit" name="submit" value="Send">
    </form>
</body>
<?php


if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $grade_level = $_POST['grade_level'];
    $subject = $_POST['subject'];  
    $lrn = $_POST['lrn'];

    $dateCreated = date("M-d-Y h:i:a");
    $dateUpdated = date("y-m-d h:i:a");


    ///////// USERS SA LAPTOP NI MAM///////////
    if($grade_level == "prep"){
        $path = 'C:\Users\Thaddeus\Documents\files\prep/'. basename($_FILES['file']['name']);
        if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
        
            sendMail($email,$path);
            $status = 'Sent';
    
        }else{
            echo  "Please upload the pdf";
        } 
            
    
    }
    
    
    if ($grade_level == "grade1"){
    $path = 'C:\Users\Thaddeus\Documents\files\Grade 1/'. basename($_FILES['file']['name']);
    if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
    
        sendMail($email,$path);
        $status = 'Sent';

        }else{
            echo  "Please upload the pdf";
        } 
    }

    if ($grade_level == "grade2"){
        $path = 'C:\Users\Thaddeus\Documents\files\Grade 2/'. basename($_FILES['file']['name']);
        if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
        
            sendMail($email,$path);
            $status = 'Sent';
            
        }else{
            echo  "Please upload the pdf";
        }
    }

    if ($grade_level == "grade3"){
        $path = 'C:\Users\Thaddeus\Documents\files\Grade 3/'. basename($_FILES['file']['name']);
        if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
        
            sendMail($email,$path);
            $status = 'Sent';

        }else{
            echo  "Please upload the pdf";
        } 
    }

    if ($grade_level == "grade4"){
        $path = 'C:\Users\Thaddeus\Documents\files\Grade 4/'. basename($_FILES['file']['name']);
        if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
        
            sendMail($email,$path);
            $status = 'Sent';
            
            }else{
                echo  "Please upload the pdf";
            }
            
    
        }

    if ($grade_level == "grade5"){
        $path = 'C:\Users\Thaddeus\Documents\files\Grade 5/'. basename($_FILES['file']['name']);
        if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
        
            sendMail($email,$path);
            $status = 'Sent';
            
        }else{
            echo  "Please upload the pdf";
        } 
    }

    if ($grade_level == "grade6"){
        $path = 'C:\Users\Thaddeus\Documents\files\Grade 6/'. basename($_FILES['file']['name']);
        if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
        
            sendMail($email,$path);
            $status = 'Sent';
            
        }else{
            echo  "Please upload the pdf";  
        }
            
    
    }

    $query = "INSERT INTO history (lrn,send_to,subject,grade_level,remarks,date_time_created,date_time_updated)
    VALUES ('$lrn' , '$email' , '$subject' , '$grade_level', '$status', '$dateCreated', '$dateUpdated')";
    $run = mysqli_query($conn,$query);

    if($run){
        echo "sent in database";
    }
    
}
?>
</html>