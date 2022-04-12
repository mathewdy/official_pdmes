<style>
    table{
        border: 2px solid black;
    }
</style>
<?php
// include 'connection.php';
$connect = new PDO("mysql:host=localhost; dbname=official_pdmes", "root", "");

/*function get_total_row($connect)
{
  $query = "
  SELECT * FROM tbl_webslesson_post
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  return $statement->rowCount();
}

$total_record = get_total_row($connect);*/

$limit = '10';
$page = 1;
if($_POST['page'] > 1){
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}else{
  $start = 0;
}

$query = "
SELECT * FROM learners_personal_infos
";

if(isset($_POST['query'])){
  $query .= '
  WHERE first_name LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR
  middle_name LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR
  last_name LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR
  lrn LIKE "%'.str_replace(' ', '%', $_POST['query']).'%"  
  ';
}

$query .= 'ORDER BY id ASC ';

$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';
$current_total = ($limit + $start);
$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();
$number= $start;
$starting_num = $start + 1;
$output= '';
if($total_data > 0){
  $output = '
<table class="table table-hover table-light table-striped text-center">
<thead>
  <tr>
    <th>No.</th>
    <th>LRN</th>
    <th>Student Name</th>
    <th colspan="2">Actions</th>
  </tr>
</thead>
';
  foreach($result as $row){
    $lrn = $row['lrn'];
    $parse_lrn = intval($lrn);
    $int_lrn = (($parse_lrn * 123456789 * 5977)/ 859475);
    $edit_link = "new-edit-students.php?sid=". urlencode(base64_encode($int_lrn));
    $view_link = "view-student-profile.php?sid=" . urlencode(base64_encode($int_lrn));
    $delete_link = "delete-student.php?sid=" . urlencode(base64_encode($int_lrn));
    $number++;
    $output .= '
    <tr class="clickable-row text-center" data-href="'.$view_link.'" style="cursor:pointer;">
        <td>'.$number.'</td>
        <td>'.$row["lrn"].'</td>
        <td>'.$row["first_name"].' '.$row["middle_name"].' '.$row["last_name"].'</td>
        <td class="d-flex flex-row justify-content-evenly">
            <a href="'.$edit_link.'"><i style="color:#56BBF1; font-size:25px;" class="fa-solid fa-pen-to-square"></i></a>
            <a href="'.$delete_link.'"><i style="color:red; font-size:25px;" class="fa-solid fa-circle-minus"></i></a>
        </td>
    </tr>
    ';
  }

$output .= '
</table>
<br />
<div>
  <label style="float:left;">Showing '.$starting_num.'  to '.$current_total.'</label>
  <ul style="float:right;" class="pagination">
';

$total_links = ceil($total_data/$limit); 
$previous_link = '';
$next_link = '';
$page_link = '';

if($total_links > 4){
  if($page < 10){
    for($count = 1; $count < 5; $count++){
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }else{
    $end_limit = $total_links - 5;
    if($page > $end_limit){
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count < $total_links; $count++){
        $page_array[] = $count;
      }
    }else{
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}else{
  for($count = 1; $count < $total_links; $count++){
    $page_array[] = $count;
  }
}

// link disabling (next and previous button)
for($count = 0; $count < count($page_array); $count++){
  if($page == $page_array[$count]){
    $page_link .= '
    <li class="page-item disabled">
      <a class="page-link bg-success text-white" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';
    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0){
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }else{
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id > $total_links){
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
    }else{
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }
  }else{
    if($page_array[$count] == '...'){
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }else{
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}
$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>
</div>
';
}else{
  $output .= '
  <div class="alert alert-danger">
    No data Found
  </div>
  ';
}
echo $output;

?>
<script>
    $(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
          // Select all the columns in the table
          // and get the count of the selected elements
        var colCount = $(".clickable-row #rowNumber").length;
        var count = 0; 
        while(++count <= colCount){
          console.log(count);
        }
          
    });
</script>
