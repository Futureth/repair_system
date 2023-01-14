<?php
    // $server = 'localhost';
    // $user = 'root';
    // $password = '';
    // $dbname = 'repair_work';

    $server = 'iu51mf0q32fkhfpl.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
    $user = 'm4eyckr34hjoazmi';
    $password = 'hlcpnczuo68pdrur';
    $dbname = 'jy35tcjdmnhrphlq';

    
    $conn = mysqli_connect($server,$user,$password,$dbname);

    mysqli_set_charset($conn, 'utf8');
    date_default_timezone_set("Asia/Bangkok");
?>