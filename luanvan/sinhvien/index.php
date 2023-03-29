<?php 
    require_once 'include/header.php';

?>

        <section class="thongtinsinhvien">
            <h4>THÔNG TIN SINH VIÊN</h4>
            <div class="ttsv">
                <?php 
                    $sql = "SELECT * FROM sinhvien,lop where sinhvien.id_lop = lop.id and sinhvien.id = $idsv";
                    $res = mysqli_query($conn,$sql);
                    if($res == true){
                        while($rows = mysqli_fetch_assoc($res)){
                ?>
                    <div >
                        <div >MSSV</div>
                        <div  ><?php echo $rows['mssv'] ?></div>
                    </div>
                    <div >
                        <div >Họ tên</div>
                        <div ><?php echo $rows['hoten'] ?></div>
                    </div>
                    <div >
                        <div >Ngày sinh</div>
                        <div >
                            <?php 
                                $ngaysinh = new DateTime($rows['ngaysinh']);
                                $formattedweddingdate = date_format($ngaysinh, 'd/m/Y');
                                
                                echo $formattedweddingdate;
                            ?>
                        </div>
                    </div>
                    <div >
                        <div >Quê quán</div>
                        <div ><?php echo $rows['quequan'] ?></div>
                    </div>
                    <div >
                        <div >Giới tính</div>
                        <div ><?php echo $rows['gioitinh'] ?></div>
                    </div>
                    <div >
                        <div >Số điện thoại</div>
                        <div ><?php echo $rows['sodienthoai'] ?></div>
                    </div>
                    <div >
                        <div >Ngành</div>
                        <div ><?php echo $rows['nganh'] ?></div>
                    </div>
                    <div >
                        <div >Lớp</div>
                        <div><?php echo $rows['tenlop'] ?></div>
                    </div>
                <?php        
                        }
                    }
                ?>
                
                
            </div>
            
        </section>
    </div>
</body>

</html>