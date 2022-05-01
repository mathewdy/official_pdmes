<?php
ob_start();
include 'connection.php';
session_start();
include 'security.php';
include 'includes/header.php';
?>
  <link rel="stylesheet" href="src/css/table.data.css">
  <script src="src/js/table_init.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<?php include 'includes/topnav.php';?>
<div class="container py-4">
<div class="card px-3 pb-3 pt-2" style="box-shadow: 5px 5px 20px 2px #EBEBEB ;">
<div class="card-header bg-white px-0 pb-3" style="border-bottom: none;">
    <a href="new-student.php" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="25" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 18">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
</svg>
        Add New Record</a>
</div>
<table class="table table-hover table-light text-center mt-5" id="data">
    <thead style="font-family:var(--poppins); font: weight 500px;">
        <tr>
            <th>No.</th>
            <th>LRN</th>
            <th>Full Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $sql = "SELECT * FROM learners_personal_infos ORDER BY id DESC ";
        $run = mysqli_query($conn,$sql);

        if(mysqli_num_rows($run) > 0){
            $count = 0;
            foreach($run as $row){
              $lrn = $row['lrn'];
              $encrypted_data = (($lrn*12345678911*56789)/987654);
              $edit_link = "edit-student.php?sid=" . urlencode(base64_encode($encrypted_data));
              $view_link = "student-profile.php?sid=" . urlencode(base64_encode($encrypted_data));
              $delete_link = "delete-student.php?sid=" . urlencode(base64_encode($encrypted_data));
                $count++;
                ?>

                    <tr class="clickable-row" data-href="<?php echo $view_link ?>" style="cursor:pointer;">
                        <td><?php echo $count;?></td>
                        <td><?php echo $row ['lrn']?></td>
                        <td><?php echo $row ['first_name'] . $row ['last_name']?></td>
                        <td class="d-flex flex-row justify-content-evenly">
                            <a href="<?php echo $edit_link ?>"><i style="color:#56BBF1; font-size:25px;" class="fa-solid fa-pen-to-square"></i></a>
                            <a href="<?php echo $delete_link ?>"><i style="color:red; font-size:25px;" class="fa-solid fa-circle-minus"></i></a>
                        </td>
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