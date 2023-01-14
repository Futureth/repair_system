<?php
    session_start();
    include('conn.php');

    $JobID = mysqli_real_escape_string($conn,$_POST['JobID']);
    $update_sql = "UPDATE table_job SET Job_status = 'แก้ไขแล้ว' WHERE JobID = '$JobID'";
    
    if(mysqli_query($conn,$update_sql)){
       echo "Success"; 
    }else{
        echo "Error";
    }

    
?>