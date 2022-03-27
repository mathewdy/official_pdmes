


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include('connection.php');
    ?>
    <form action="" method="POST">
    <input type="text" name="name">
    <input type="text" name="name2">

    <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>
<?php

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $name2= $_POST['name2'];

    $insert = "INSERT INTO a (name,name2)VALUES ('$name', '$name2')";
    $run = mysqli_query($conn,$insert);

    if($run) {
        echo "added" . '<br>' ;

        $call_out = "SELECT * FROM a WHERE name = '$name'";
        $run_Call = mysqli_query($conn,$call_out);

        if(mysqli_num_rows($run_Call) > 0){
            foreach($run_Call as $row){
                echo $row['name'];
                echo $row ['name2'];
            }
        }
    }
    


    // $other = $_POST['other1'];
    // foreach($other as $another){
    //     echo $another;
    //     //lalagyan ko na lang hidden yung warning mamaya
    // }

    // $other2 = $_POST['other2'];

    // foreach($other2 as $another2){
    //     echo $another2;

    // }

   
    // $sql = "INSERT INTO a (other1,other2) VALUES ('$another' , '$another2')";
    // $run = mysqli_query($conn,$sql);

    // if($run ){
    //     echo "added";
    // }else{
    //     echo "error "  .  $conn->error;
    // }
}



// $count_array_passed = array("PASSED");
// $count_array_failed = array("FAILED");
// //eto yung nasa loob ng database, and i call out mo
// $string = "PASSED PASSED  PASSED PASSED";

// echo $string;

// foreach($count_array_passed as $word_passed){

//     $number = substr_count(strtoupper($string), $word_passed);
//     echo '<br>' . $word_passed  . $number . "times" . '<br>';
// }


// foreach($count_array_failed as $word_failed){

//     $number = substr_count(strtoupper($string), $word_failed);
//     echo '<br>' . $word_failed  . $number . "times" . '<br>';

//     if($number >= 3){
//         echo "RETAINED" . "<br>";
//     }else if($number  == 2){
       
//         echo "REMEDIAL" . "<br>";
//     }else if($number <= 1){
//         echo "PASSED";
//     }

// }


// if(75 >= 75){
//     echo $output = "passed";
// }else{
//     echo $output = "failed";
// }

?>