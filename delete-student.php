<?php
ob_start();
include('connection.php');
session_start();
if(empty($_SESSION['username'])){
    echo "<script>window.location.href='login.php'</script>";
}

error_reporting(E_ERROR & E_WARNING);
if(isset($_GET['sid'])){
  // Store the cipher method
  $ciphering = "AES-128-CTR";
  $options = 0;
  // Non-NULL Initialization Vector for decryption
  $decryption_iv = '1234567891011121';

  // Store the decryption key
  $decryption_key = "TeamAgnat";

  // Use openssl_decrypt() function to decrypt the data
  $decrypted_lrn=openssl_decrypt ($_GET['sid'], $ciphering,
      $decryption_key, $options, $decryption_iv);
    // foreach ($_GET as $encrypting_lrn => $encrypt_lrn){
    //     $decrypt_lrn = $_GET[$encrypting_lrn] = base64_decode(urldecode($encrypt_lrn));
    //     $decrypted_lrn = ((($decrypt_lrn*987654)/56789)/12345678911);
    //   }
        
        if(empty($_GET['sid'])){    //lrn verification starts here
            echo "<script>alert('LRN not found');
            window.location = 'home.php';</script>";
            exit();
        }
        $verify_lrn = "DELETE FROM `learners_personal_infos` WHERE lrn = '$decrypted_lrn'";
        $query_request = mysqli_query($conn, $verify_lrn) or die (mysqli_error($conn));
        if($query_request == true){
                echo "
                <script type = 'text/javascript'>
                window.location = 'home.php';
                </script>";
                exit();
        }
      }

?>