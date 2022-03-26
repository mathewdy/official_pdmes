<?php

$conn = new mysqli('localhost', 'root' , '' , 'official_pdmes');

if($conn == false) {
    echo "error" . $conn->error;
}
?>