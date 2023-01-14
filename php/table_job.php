<table class="table" id="myTable">
    <thead class="bg-dark text-light">
        <tr>
            <th>ลำดับ</th>
            <th>วันที่</th>
            <th>รายละเอียด</th>
            <th>แผนก</th>
            <th>สถานะ</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;
            while($job_result = mysqli_fetch_array($job_query)){
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $job_result['Job_Date']; ?></td>
                        <td class="text-start"><?php echo $job_result['Job_detail']; ?></td>
                        <td><?php echo $job_result['Job_dept']; ?></td>
                        <td class="text-success" id="<?php echo $job_result['JobID'];?>">
                            <?php
                                if(isset($_SESSION['AdminID'])){
                                    if($job_result['Job_status'] == ""){
                                        ?>
                                            <button class="btn btn-warning btn-sm editor" data-id="<?php echo $job_result['JobID'];?>">ปิดงาน</button>
                                        <?php
                                    }else{
                                        echo $job_result['Job_status']; 
                                    }
                                }else{
                                    echo $job_result['Job_status']; 
                                }
                            ?>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm delete" data-bs-toggle="modal" data-bs-target="#deleteJob" data-id="<?php echo $job_result['JobID'];?>">ลบ</button>
                        </td>
                    </tr>
                <?php
            }
        ?>
    </tbody>
</table>

<!-- modal delete job? -->
<div class="modal fade" id="deleteJob" tabindex="-1" aria-labelledby="deleteJobModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="deleteJobModalLabel">ลบรายการซ่อมนี้หรือไม่!?</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="php/delete_job.php" method="post">
        <input name="JobID" type="text" class="form-control" style="display: none;" id="txtConfirm">
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-danger" type="submit">ยืนยัน</button>
        </div>
        </form>
        </div>
    </div>
</div>

<script>
    $(document).ready( function () {
        // delete job
        $('body').on('click','.delete',function(){
            var dataID = $(this).data('id');
            var txtConfirm = document.getElementById('txtConfirm');

            txtConfirm.value = dataID;
        })

        // update status
        $('body').on('click','.editor',function(){
            var JobID = $(this).data('id');
            
            $.ajax({
                type:"POST",
                url:"php/update_stt.php",
                data:{
                    JobID:JobID
                },
                success:function(data){

                    if(data == 'Success'){
                        var btndDel = document.getElementById(JobID);
                        btndDel.innerHTML = "แก้ไขแล้ว";
                    }else{
                        alert('error');
                    }
                }
            })
        })
    } );
</script>