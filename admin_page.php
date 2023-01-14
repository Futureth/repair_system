<?php
    session_start();
    include('php/conn.php');
    $job_sql = "SELECT * FROM table_job";
    $job_query = mysqli_query($conn,$job_sql);
    
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
    <nav class="navbar bg-primary" data-bs-theme="dark">
        <div class="container">
            <div class="contain">
                <h3> <i class="bi bi-tools"></i> ระบบแจ้งซ่อม</h3>
            </div>
            <div class="contain">
                <?php
                    if(isset($_SESSION['AdminID'])){
                        ?>
                            <a href="logout.php">
                                <button class="btn btn-danger rounded-pill">ออกจากระบบ</button>
                            </a>
                        <?php
                    }else{
                        header('location:index.php');
                        ?>
                            <a href="login.php">
                                <button class="btn btn-warning rounded-pill" >
                                เข้าสู่ระบบ
                                </button>
                            </a>
                        <?php
                    }
                ?>
                
            </div>
            
        </div>
        
    </nav>
    
    <div class="container">
        <div class="contain my-4">
            <table class="table text-center" id="myTable">
                <thead class="bg-ocean text-light">
                    <tr>
                        <th>ลำดับ</th>
                        <th>วันที่</th>
                        <th>รายละเอียด</th>
                        <th>แผนก</th>
                        <th>สถานะ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 0;
                        while($job_result = mysqli_fetch_array($job_query)){
                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $job_result['Job_Date']; ?></td>
                                    <td class="text-start"><?php echo $job_result['Job_detail']; ?></td>
                                    <td><?php echo $job_result['Job_dept']; ?></td>
                                    <td><?php echo $job_result['Job_status']; ?></td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>