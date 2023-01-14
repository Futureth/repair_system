<table class="table text-center" id="myTable">
    <thead class="bg-dark text-light">
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