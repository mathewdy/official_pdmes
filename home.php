<?php
ob_start();
include('connection.php');
session_start();
include('security.php');
?>

<?php include 'includes/header.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<?php include 'includes/topnav.php'; ?>
<?php include 'includes/pre-load.php';?>
    <br />
    <div class="container">
        <div class="form-group d-flex justify-content-between py-4">
            <a href="new-student.php" class="btn btn-success">Add New Record</a>
            <input type="text" name="search_box" id="search_box" placeholder="Search..." />
        </div>
        <div id="dynamic_content"></div>
    </div>
  </body>
</html>
<script src="src/js/loading_screen.js"></script>
<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query);
    });

    $('#search_box').keyup(function(){
      var query = $('#search_box').val();
      load_data(1, query);
    });

  });
</script>
