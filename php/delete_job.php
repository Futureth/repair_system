<?php

    session_start();
    include('conn.php');

    // echo $_POST['JobID'];

    $delete_sql = "DELETE FROM table_job WHERE JobID = $_POST[JobID]";
    if(mysqli_query($conn,$delete_sql)){
        header('location:../admin_page.php');
    }

?>