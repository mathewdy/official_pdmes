<?php
include('connection.php');
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
                $mail->Username   = 'thaddeusgamit31@gmail.com';                     //SMTP username // email username
                $mail->Password   = 'ztqejvrgppyaqfjm';                               //SMTP // email password password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->SetFrom('thaddeusgamit31@gmail.com');
                $mail->addAddress($email);
                $mail->addAttachment($path);       //Add a recipient
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = "Students Grades";
                $mail->Body    = "Sample Body" ;
    
                $mail->send();
                return true;
            } 
            catch (Exception $e) {
                return false;
            }

    
   
                    }

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $grade_level = $_POST['grade_level'];
    $subject = $_POST['subject'];  
    $lrn = $_POST['lrn'];
    $status;

    $dateCreated = date("M-d-Y h:i:a");
    $dateUpdated = date("y-m-d h:i:a");


    ///////// USERS SA LAPTOP NI MAM///////////
    if($grade_level == "prep"){
        $path = 'C:\Users\Thaddeus\Documents\files\prep'. basename($_FILES['file']['name']);
        if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
        
            sendMail($email,$path);
            $status = 'Sent';
    
        }else{
            echo  "Please upload the pdf";
        } 
            
    
    }
    
    
    if ($grade_level == "grade1"){
    $path = 'C:\Users\mathe\Documents\mama'. basename($_FILES['file']['name']);
    if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
    
        sendMail($email,$path);
        $status = 'Sent';

        }else{
            echo  "Please upload the pdf";
        } 
    }

    if ($grade_level == "grade2"){
        $path = 'C:\Users\mathe\Documents\mama'. basename($_FILES['file']['name']);
        if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
        
            sendMail($email,$path);
            $status = 'Sent';
            
        }else{
            echo  "Please upload the pdf";
        }
    }

    if ($grade_level == "grade3"){
        $path = 'C:\Users\mathe\Documents\mama'. basename($_FILES['file']['name']);
        if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
        
            sendMail($email,$path);
            $status = 'Sent';

        }else{
            echo  "Please upload the pdf";
        } 
    }

    if ($grade_level == "grade4"){
        $path = 'C:\Users\mathe\Documents\mama'. basename($_FILES['file']['name']);
        if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
        
            sendMail($email,$path);
            $status = 'Sent';
            
            }else{
                echo  "Please upload the pdf";
            }
            
    
        }

    if ($grade_level == "grade5"){
        $path = 'C:\Users\mathe\Documents\mama'. basename($_FILES['file']['name']);
        if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
        
            sendMail($email,$path);
            $status = 'Sent';
            
        }else{
            echo  "Please upload the pdf";
        } 
    }

    if ($grade_level == "grade6"){
        $path = 'C:\Users\mathe\Documents\mama'. basename($_FILES['file']['name']);
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
