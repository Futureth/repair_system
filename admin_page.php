<?php
    session_start();
    include('php/conn.php');
    $job_sql = "SELECT * FROM table_job";
    $job_query = mysqli_query($conn,$job_sql);

    if(empty($_SESSION['AdminID'])){
        header('location:index.php');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('php/head.php'); ?>
    <title>ระบบแจ้งซ่อม</title>
</head>
<body>
    <?php include('php/navbar.php') ?>    
    <div class="container">
        <div class="contain my-4">
            <?php include('php/table_job.php') ?>
        </div>
    </div>
</body>
</html>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>