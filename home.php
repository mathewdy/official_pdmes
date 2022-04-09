<?php
ob_start();
include('connection.php');
session_start();
include('security.php');



if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

$num_per_page = 10;
$start_from = ($page-1)*10;
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/topnav.php'; ?>


<div class="container">
<form action="" method="POST">
    <input type="text" name="search" placeholder="Search">
</form>
<table class="table table-striped">
    <thead>
        <tr>
            <th>No.</th>
            <th>Full Name</th>
            <th>LRN</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM `learners_personal_infos` ORDER BY last_name LIMIT $start_from, $num_per_page";
        $run = mysqli_query($conn,$query);

        if(mysqli_num_rows($run) > 0){
            $number = 0;
            foreach($run as $row ){
                $number++;
        ?>
            <tr>
                <td><?php echo $number;?></td>
                <td><?php echo $row ['first_name'] . $row ['last_name']?></td>
                <td><?php echo $row ['lrn']?></td>
                <td>
                    <a href="">Edit</a>
                    <a href="">Delete</a>
                    <a href="">View</a>
                </td>
            </tr>
        <?php
        }
        }
        ?>
    </tbody>
</table>
<?php
    $pr_query = "SELECT * FROM learners_personal_infos";
    $pr_results = mysqli_query($conn,$pr_query);
    $total_record = mysqli_num_rows($pr_results);

    $total_page = ceil($total_record/$num_per_page);


    if($page > 1 ){
        echo  "<a href='home.php?page=".($page-1)."' class='btn btn-danger'>Previous</a> ";
    }

    for($i=1;$i<$total_page;$i++){
        echo  "<a href='home.php?page=".$i."' class='btn btn-primary'>$i</a> ";
    }

    if($i > $page ){
        echo  "<a href='home.php?page=".($page+1)."' class='btn btn-danger'>Next</a> ";
    }

?>
</div>
</body>
</html>

<?php

ob_end_flush();

?>