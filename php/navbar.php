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