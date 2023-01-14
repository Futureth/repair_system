<?php
    session_start();
    include('conn.php');
    
    $Job_Date = mysqli_real_escape_string($conn,$_POST['Job_Date']);
    $Job_detail = mysqli_real_escape_string($conn,$_POST['Job_detail']);
    $Job_dept = mysqli_real_escape_string($conn,$_POST['Job_dept']);

    $add_job_sql = "INSERT INTO table_job (Job_Date,Job_detail,Job_dept,Job_status) VALUE ('$Job_Date','$Job_detail','$Job_dept','$Job_status')";
    if(mysqli_query($conn,$add_job_sql)){
        header('location:../admin_page.php');
    }else{
        ?>
            <script>alert('ERROR!')</script>
        <?php
    }

?>