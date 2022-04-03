<?php
ob_start();
session_start();

include('connection.php');


if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

$num_per_age = 10;
$start_from = ($page-1)*10;


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
    
<a href="home.php">Back</a>


<h1>History</h1>
<!----latest data na sinend----->
<!--------- page ination_--SELECT * FROM `history` WHERE ORDER BY date_time_created DESC--->
<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>LRN</th>
            <th>Full Name</th>
            <th>Grade Level</th>
            <th>Email</th>
            <th>Date Sent</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $sql = "SELECT learners_personal_infos.lrn, learners_personal_infos.first_name , learners_personal_infos.last_name , history.send_to, history.date_time_created AS 'date_sent', history.grade_level
        FROM learners_personal_infos 
        LEFT JOIN history ON learners_personal_infos.lrn = history.lrn 
        ORDER BY history.date_time_created DESC ";
        $run = mysqli_query($conn,$sql);

        if(mysqli_num_rows($run) > 0){
            $count = 0;
            foreach($run as $row){
                $count++;
                ?>

                    <tr>
                        <td><?php echo $count;?></td>
                        <td><?php echo $row ['lrn']?></td>
                        <td><?php echo $row ['first_name'] . $row ['last_name']?></td>
                        <td><?php echo $row ['send_to']?></td>
                        <td><?php echo $row ['grade_level']?></td>
                        <td><?php echo $row ['date_sent']?></td>
                    </tr>



                <?php
            }
        }

        ?>
    </tbody>
</table>






</body>
</html>


<?php


$pr_query = "SELECT learners_personal_infos.lrn, learners_personal_infos.first_name , learners_personal_infos.last_name , history.send_to, history.date_time_created AS 'date_sent', history.grade_level
FROM learners_personal_infos 
LEFT JOIN history ON learners_personal_infos.lrn = history.lrn 
ORDER BY history.date_time_created DESC ";
$pr_results = mysqli_query($conn,$pr_query);
$total_record = mysqli_num_rows($pr_results);

$total_page = ceil($total_record/$num_per_age);


if($page > 1 ){
    echo  "".($page-1)."' class='btn btn-danger'>Previous</a> ";
}

for($i=1;$i<$total_page;$i++){
    echo  "".$i."' class='btn btn-primary'>$i</a> ";
}

if($i > $page ){
    echo  "".($page+1)."' class='btn btn-danger'>Next</a> ";
}



ob_end_flush();

?>