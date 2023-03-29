<?php 
    require_once 'include/header.php';

?>

        <section class="thongtinsinhvien  mt-3">
            <h4>DANH SÁCH ĐIỂM SINH VIÊN</h4>
            <div class="mt-3 mb-3">
                <form action="" id="form_tim_kiem">
                    <input type="text" id="tim_kiem_diem" class="form-control" style="width:50%;margin:0 auto" placeholder="Nhập mã hoặc tên sinh viên">

                </form>
            </div>
            <div class="mt-3 mb-3">
                <form action="">
                    <div >
                        <div style="display:inline-block">
                            <label for="">
                                LỌC GIỚI TÍNH
                            </label><br>
                            <select name="" id="loc_gioitinh">
                                <option value="">
                                    Nam và Nữ
                                </option>
                                <option value="Nam">
                                    Nam
                                </option>
                                <option value="Nữ">
                                    Nữ
                                </option>
                            </select>
                        </div>
                        
                        <div style="display:inline-block;float:right">
                            <label for="">
                                LỌC KHÓA HỌC
                            </label><br>
                            <select name="" id="loc_khoa">
                                <option value="">
                                    Tất cả khóa
                                </option>
                                <?php 
                                    $sql = "SELECT * FROM `sinhvien`,lop,giaovien where giaovien.id = lop.idgv and lop.id = sinhvien.id_lop and giaovien.id = $idgv";
                                    $res = mysqli_query($conn,$sql);
                                    $ms_list = array();

                                    if($res==true){
                                        while($rows = mysqli_fetch_array($res)){
                                            if(!in_array(substr($rows['mssv'],0, 3),$ms_list)){
                                                array_push($ms_list, substr($rows['mssv'],0, 3));
                                            }
                                            
                                        }
                                    }
                                ?>
                                <?php 
                                    for($i=0;$i<count($ms_list) ;$i++){
                                        
                                        
                                ?>
                                <option value="<?php echo $ms_list[$i]; ?>"><?php echo $ms_list[$i]; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    
                </form>
            </div>
            <a href="" data-bs-toggle="modal" data-bs-target="#myModal"><img src="/luanvan/images/add.png" alt=""></a>
            <!--  -->
            <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Thêm điểm cho sinh viên</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form method="GET" >
                                        <div class="inputDiv">
                                            
                                            <input type="hidden" value="<?php echo $idgv; ?>" class="form-control" id="idgv">
                                        </div>
                                        <div class="inputDiv">
                                            <label style="color:black" for="">MSSV</label>
                                            <input type="text" class="form-control" id="mssv">
                                        </div>
                                        <div class="inputDiv">
                                            <label style="color:black" for="">Họ tên</label>
                                            <input type="text" disabled class="form-control" id="hotensv">
                                        </div>
                                        <div class="inputDiv">
                                            <label style="color:black" for="">Điểm số</label>
                                            <input type="number" class="form-control" id="diemso">
                                        </div>
                                        
                                        <div class="inputDiv text-center">
                                            <button  id="them_diem" >Thêm</button>
                                        </div>       
                                        <script>
                                            
                                        </script>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            <!--  -->
            <table class="table">
                <thead style="background-image:radial-gradient( circle farthest-corner at 10% 20%,  rgba(147,67,67,1) 0%, rgba(111,27,27,1) 90% );color: #fff;">
                    <th>STT</th>
                    <th>MSSV</th>
                    <th>Họ tên</th>
                    <th>Lớp</th>
                    <th>Ngành</th>
                    <th>Gioi tính</th>
                    <th>Điểm số</th>
                    <th>Điểm chữ</th>
                    <th>Thao tác</th>
                </thead>
                <tbody id="diem">
                    <?php
                        
                        $sql = "SELECT ketqua.id,sinhvien.nganh,sinhvien.gioitinh,sinhvien.mssv,sinhvien.hoten,lop.tenlop,ketqua.diemso,ketqua.diemchu FROM lop,`ketqua`,sinhvien where lop.id = sinhvien.id_lop and sinhvien.id=ketqua.idsv order by lop.tenlop,mssv";
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
                        <td><?php echo $rows['nganh']; ?></td>
                        <td><?php echo $rows['gioitinh']; ?></td>
                        <td><?php echo $rows['diemso']; ?></td>
                        <td><?php echo $rows['diemchu']; ?></td>
                        <td>
                            <a href="/luanvan/admin/chinhsuadiem.php?id=<?php echo $rows['id'] ?>"><img src="/luanvan/images/user.png" alt="xoa"></a>
                            <a style="cursor:pointer" onclick='canhbao3(<?php echo $rows["id"] ?>)'><img src="/luanvan/images/delete.png" alt="xoa"></a>
                        </td>
                    </tr>
                    <?php            
                            }
                        }
                    ?>
                    
                </tbody>
            </table>
        </section>
    </div>
</body>

</html>