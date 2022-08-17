<?php
ob_start();
session_start();

include('connection.php');
?>
<?php include 'includes/header.php';?>
    <link rel="stylesheet" href="src/css/table.data.css">
    <script src="src/js/table_init.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<?php include 'includes/topnav.php'; ?>
<div class="container py-4">
    <div class="card px-3 pb-3 pt-2" style="box-shadow: 5px 5px 20px 2px #EBEBEB ;">
        <table class="table table-hover table-light text-center mt-5" id="data">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>LRN</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Grade Level</th>
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
    </div>
</div>
<script src="src/js/table.click.js"></script>
</body>
</html>

<?php

ob_end_flush();

?>