<?php 
    require_once 'include/header.php';

?>

        <section class="thongtinsinhvien mt-3">
            <h4>BIỂU ĐỒ</h4>
            <div id="piechart" style="background:white"></div>
            
            <h4>BẢNG THỐNG KÊ</h4>
            
            <div class="row" style="width:100%;background:White">
                <div class="col" style="background:White">
                <div style="color:black;"><i>Sinh viên nam</i></div>
                    <table class="table">
                        <thead style="background-image:radial-gradient( circle farthest-corner at 10% 20%,  rgba(147,67,67,1) 0%, rgba(111,27,27,1) 90% );color: #fff;">
                            <th>STT</th>
                            <th>MSSV</th>
                            <th>Tên</th>
                            <th>Lớp</th>
                            
                        </thead>
                        <tbody id="dangkydetai">
                            <?php
                                
                                $sql = "SELECT mssv,sinhvien.hoten,lop.tenlop FROM `sinhvien`,lop,giaovien where sinhvien.id_lop=lop.id and giaovien.id = lop.idgv and giaovien.id=$idgv and sinhvien.gioitinh='Nam' order by tenlop,mssv asc";
                                $res = mysqli_query($conn,$sql);
                                if($res == true){
                                    $i=0;
                                    while($rows = mysqli_fetch_assoc($res)){
                                        $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $rows['mssv']; ?></td>
                                <td><?php echo $rows['hoten']; ?></td>
                                <td><?php echo $rows['tenlop']; ?></td>
                                
                            </tr>
                            <?php            
                                    }
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <div style="color:black;"><i>Sinh viên nữ</i></div>
                    <table class="table">
                        <thead style="background-image:radial-gradient( circle farthest-corner at 10% 20%,  rgba(147,67,67,1) 0%, rgba(111,27,27,1) 90% );color: #fff;">
                            <th>STT</th>
                            <th>MSSV</th>
                            <th>Tên</th>
                            <th>Lớp</th>
                            
                        </thead>
                        <tbody id="dangkydetai">
                            <?php
                                
                                $sql = "SELECT mssv,sinhvien.hoten,lop.tenlop FROM `sinhvien`,lop,giaovien where sinhvien.id_lop=lop.id and giaovien.id = lop.idgv and giaovien.id=$idgv and sinhvien.gioitinh='Nữ' order by tenlop,mssv asc";
                                $res = mysqli_query($conn,$sql);
                                if($res == true){
                                    $i=0;
                                    while($rows = mysqli_fetch_assoc($res)){
                                        $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $rows['mssv']; ?></td>
                                <td><?php echo $rows['hoten']; ?></td>
                                <td><?php echo $rows['tenlop']; ?></td>
                                
                            </tr>
                            <?php            
                                    }
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" style="width:100%;background:White">
                <div class="col" style="background:White">
                <div style="color:black;"><i>Sinh viên đã đăng ký đề tài</i></div>
                    <table class="table">
                        <thead style="background-image:radial-gradient( circle farthest-corner at 10% 20%,  rgba(147,67,67,1) 0%, rgba(111,27,27,1) 90% );color: #fff;">
                            <th>STT</th>
                            <th>MSSV</th>
                            <th>Tên</th>
                            <th>Lớp</th>
                            
                        </thead>
                        <tbody id="dangkydetai">
                            <?php
                                
                                $sql = "SELECT mssv,sinhvien.hoten,lop.tenlop FROM `sinhvien`,lop,giaovien where sinhvien.id_lop=lop.id and giaovien.id = lop.idgv and giaovien.id=$idgv and sinhvien.kiemtra=1 order by tenlop,mssv asc";
                                $res = mysqli_query($conn,$sql);
                                if($res == true){
                                    $i=0;
                                    while($rows = mysqli_fetch_assoc($res)){
                                        $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $rows['mssv']; ?></td>
                                <td><?php echo $rows['hoten']; ?></td>
                                <td><?php echo $rows['tenlop']; ?></td>
                                
                            </tr>
                            <?php            
                                    }
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <div style="color:black;"><i>Sinh viên chưa đăng ký đề tài</i></div>
                    <table class="table">
                        <thead style="background-image:radial-gradient( circle farthest-corner at 10% 20%,  rgba(147,67,67,1) 0%, rgba(111,27,27,1) 90% );color: #fff;">
                            <th>STT</th>
                            <th>MSSV</th>
                            <th>Tên</th>
                            <th>Lớp</th>
                            
                        </thead>
                        <tbody id="dangkydetai">
                            <?php
                                
                                $sql = "SELECT mssv,sinhvien.hoten,lop.tenlop FROM `sinhvien`,lop,giaovien where sinhvien.id_lop=lop.id and giaovien.id = lop.idgv and giaovien.id=1 and sinhvien.kiemtra=0 order by tenlop,mssv asc";
                                $res = mysqli_query($conn,$sql);
                                if($res == true){
                                    $i=0;
                                    while($rows = mysqli_fetch_assoc($res)){
                                        $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $rows['mssv']; ?></td>
                                <td><?php echo $rows['hoten']; ?></td>
                                <td><?php echo $rows['tenlop']; ?></td>
                                
                            </tr>
                            <?php            
                                    }
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            
        </section>
    </div>
</body>

</html>