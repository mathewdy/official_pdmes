<?php
ob_start();
include('connection.php');
session_start();



if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

$num_per_page = 10;
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
    
<form action="" method="POST">

    <label for="">LRN</label>
    <input type="text" name="lrn" id="lrn">
    <br>
    <label for="">First Name</label>
    <input type="text" name="first_name" id="first_name">
    <br>
    <label for="">Middle Name</label>
    <input type="text" name="middle_name" id="middle_name">
    <br>
    <label for="">Last Name</label>
    <input type="text" name="last_name" id="last_name">
    <br>
    <label for="">Birthdate</label>
    <input type="date" name="birth_date" id="birth_date">
    <input type="submit" name="search" value="Search">
    <button 
    onclick="
    document.getElementById('lrn').value =  '' 
    document.getElementById('first_name').value = ''
    document.getElementById('middle_name').value =  '' 
    document.getElementById('last_name').value = ''
    document.getElementById('birth_date').value = ''
    "
    >Clear</button>
    </form>
</body>
</html>



<table>
    <thead>
        <tr>
            <th>LRN</th>
            <th>First Name</th>
            <th>Middle Name </th>
            <th>Last Name</th>
            <th>Birthdate</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if(isset($_POST['search'])){

                $lrn = $_POST['lrn'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $middle_name = $_POST['middle_name'];
                $birth_date = $_POST['birth_date'];

                if(empty($lrn)){
                    
                }else{
                    $search_lrn = "SELECT * FROM learners_personal_infos WHERE lrn = '$lrn'";
                    $run_lrn = mysqli_query($conn,$search_lrn);
    
                    if(mysqli_num_rows($run_lrn) > 0){
                        foreach($run_lrn as $row1 ){
                            
                            ?>
                
                            
                                <tbody>
                                    <tr>
                                        <td><?php echo $row1 ['lrn']?></td>
                                        <td><?php echo $row1 ['first_name']?></td>
                                        <td><?php echo $row1 ['middle_name']?></td>
                                        <td><?php echo $row1 ['last_name']?></td>
                                        <td><?php echo $row1 ['birth_date']?></td>
                                    </tr>
                                </tbody>
                           
                            <?php
                            
                        }
                    }
    
                }

                if(empty($first_name)){
                    echo "";
                }else{
                    $search_first_name = "SELECT * FROM learners_personal_infos WHERE first_name LIKE '%$first_name%'";
                    $run_first_name = mysqli_query($conn,$search_first_name);

                    if(mysqli_num_rows($run_first_name) > 0){
                        foreach($run_first_name as $row2){
                            ?>
                
                            
                                <tbody>
                                    <tr>
                                        <td><?php echo $row2 ['lrn']?></td>
                                        <td><?php echo $row2 ['first_name']?></td>
                                        <td><?php echo $row2 ['middle_name']?></td>
                                        <td><?php echo $row2 ['last_name']?></td>
                                        <td><?php echo $row2 ['birth_date']?></td>
                                    </tr>
                                </tbody>
                        
                            <?php
                        }
                    }
                }
                
                if(empty($middle_name)){
                    echo "";
                }else{
                    $search_middle_name = "SELECT * FROM learners_personal_infos WHERE middle_name LIKE '%$middle_name%'";
                    $run_middle_name = mysqli_query($conn,$search_middle_name);
    
                    if(mysqli_num_rows($run_middle_name) > 0){
                        foreach($run_middle_name as $row3){
                            ?>
                
                            
                                <tbody>
                                    <tr>
                                        <td><?php echo $row3 ['lrn']?></td>
                                        <td><?php echo $row3 ['first_name']?></td>
                                        <td><?php echo $row3 ['middle_name']?></td>
                                        <td><?php echo $row3 ['last_name']?></td>
                                        <td><?php echo $row3 ['birth_date']?></td>
                                    </tr>
                                </tbody>
                           
                            <?php
                        }
                    }
                }

                if(empty($last_name)){
                    echo "";
                }else{
                    $search_last_name = "SELECT * FROM learners_personal_infos WHERE last_name LIKE '%$last_name%'";
                    $run_last_name = mysqli_query($conn,$search_last_name);

                    if(mysqli_num_rows($run_last_name) > 0){
                        foreach($run_last_name as $row4){
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row4 ['lrn']?></td>
                                        <td><?php echo $row4 ['first_name']?></td>
                                        <td><?php echo $row4 ['middle_name']?></td>
                                        <td><?php echo $row4 ['last_name']?></td>
                                        <td><?php echo $row4 ['birth_date']?></td>
                                    </tr>
                                </tbody>
                        
                            <?php
                        }
                    }
                }

                if(empty($birth_date)){
                    echo "";
                }else{
                    $search_birth_date = "SELECT * FROM learners_personal_infos WHERE birth_date LIKE '%$birth_date%'";
                    $run_birth_date = mysqli_query($conn,$search_birth_date);

                    if(mysqli_num_rows($run_birth_date) > 0){
                        foreach($run_birth_date as $row5){
                            ?>
                
                            
                                <tbody>
                                    <tr>
                                        <td><?php echo $row5 ['lrn']?></td>
                                        <td><?php echo $row5 ['first_name']?></td>
                                        <td><?php echo $row5 ['middle_name']?></td>
                                        <td><?php echo $row5 ['last_name']?></td>
                                        <td><?php echo $row5 ['birth_date']?></td>
                                    </tr>
                                </tbody>
                        
                            <?php
                        }
                    }
                }
                

            } 
        ?>
</table>
<?php
    $pr_query = "SELECT * FROM learners_personal_infos";
    $pr_results = mysqli_query($conn,$pr_query);
    $total_record = mysqli_num_rows($pr_results);

    $total_page = ceil($total_record/$num_per_page);


    if($page > 1 ){
        echo  "<a href='search.php?page=".($page-1)."' class='btn btn-danger'>Previous</a> ";
    }

    for($i=1;$i<$total_page;$i++){
        echo  "<a href='search.php?page=".$i."' class='btn btn-primary'>$i</a> ";
    }

    if($i > $page ){
        echo  "<a href='search.php?page=".($page+1)."' class='btn btn-danger'>Next</a> ";
    }

?>