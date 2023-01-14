<?php
    session_start();
    include('php/conn.php');

    if(isset($_POST['Admin_name'])){
        $Admin_name = mysqli_real_escape_string($conn,$_POST['Admin_name']);
        $Admin_password = mysqli_real_escape_string($conn,$_POST['Admin_password']);

        $login_sql = "SELECT * FROM table_admin WHERE Admin_name = '$Admin_name'";
        $login_query = mysqli_query($conn,$login_sql);
        $login_check = mysqli_num_rows($login_query);

        if($login_check != 0){
            $login_check_pass = mysqli_fetch_array($login_query);
            if($Admin_password == $login_check_pass['Admin_password']){
                $_SESSION["AdminID"] = "1";
                header("location:admin_page.php");
            }else{
                ?>
                    <script>
                        alert("รหัสผ่านไม่ถูกต้อง!");
                    </script>
                <?php
            }
        }else{
            ?>
                <script>
                    alert("ไม่มีชื่อผู้ใช้นี้ ในระบบ!");
                </script>
            <?php
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('php/head.php'); ?>
    <title>เข้าสู่ระบบ</title>

</head>
<body>
    <form action="" method="POST">
        <section class="vh-100 login">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong border-primary bg-dark text-light" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                    <h3 class="mb-5">เข้าสู่ระบบ</h3>

                    <div class="form-outline mb-4">
                    <input name="Admin_name" type="text" id="typeEmailX-2" class="form-control form-control-lg border border-primary text-center" />
                    <label class="form-label mt-3" for="typeEmailX-2">ชื่อผู้ใช้</label>
                    </div>

                    <div class="form-outline mb-4">
                    <input name="Admin_password" type="password" id="typePasswordX-2" class="form-control form-control-lg border border-primary text-center" />
                    <label class="form-label mt-3" for="typePasswordX-2">รหัสผ่าน</label>
                    </div>

                    <button class="btn btn-primary btn-lg form-control" type="submit">เข้าสู่ระบบ</button>

                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
    </form>
        
</body>
</html>