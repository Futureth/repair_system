<?php
    session_start();
    include('php/conn.php');
    $job_sql = "SELECT * FROM table_job ORDER BY JobID DESC";
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
            <button class="btn btn-primary mb-3 float-end" data-bs-toggle="modal" data-bs-target="#addJob">เพิ่มงาน</button>
            <?php include('php/table_job.php') ?>
        </div>
    </div>

    <!-- modal add job-->
    <div class="modal fade" id="addJob" aria-labelledby="addJobModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addJobModalLabel">เพิ่มรายงานการซ่อม</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <form action="php/add_job.php" method="POST">
                    <input type="date" name="Job_Date" class="form-control my-3" value="<?php echo date('Y-m-d'); ?>" required>
                    <input type="text" name="Job_detail" class="form-control my-3" placeholder="รายละเอียด" required>
                    <input type="text" name="Job_dept" class="form-control my-3" placeholder="แผนก" required>
                    <button type="submit" class="btn btn-primary" >บันทึกงาน</button>
                </form>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                
            </div>
            </div>
        </div>
    </div>

    


</body>
</html>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
        
    } );

    
</script>