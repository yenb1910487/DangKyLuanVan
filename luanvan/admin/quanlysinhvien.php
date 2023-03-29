<?php 
    require_once 'include/header.php';

?>

        <section class="thongtinsinhvien  mt-3">
            <h4>DUYỆT ĐỀ TÀI SINH VIÊN</h4>
            <div class="mt-3 mb-3">
                <input type="text" id="tim_kiem_sinh_vien" class="form-control" style="width:50%;margin:0 auto" placeholder="Nhập mã hoặc tên sinh viên">
            </div>
            <table class="table">
                <thead style="background-image:radial-gradient( circle farthest-corner at 10% 20%,  rgba(147,67,67,1) 0%, rgba(111,27,27,1) 90% );color: #fff;">
                    <th>STT</th>
                    <th>Mã số sinh viên</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Lớp</th>
                    <th>Tên đề tài</th>
                    <th>Thao tác</th>
                    <th>Lý do</th>
                </thead>
                <tbody id="dangkydetai">
                    <?php
                        
                        $sql = "SELECT * FROM `sinhvien`,lop,giaovien,dangkydetai,detai where lop.id = sinhvien.id_lop and lop.idgv =giaovien.id and dangkydetai.idsv = sinhvien.id and detai.id = dangkydetai.iddetai and idgv=$idgv order by tenlop,mssv";
                        $res = mysqli_query($conn,$sql);
                        if($res == true){
                            $i=0;
                            while($rows = mysqli_fetch_array($res)){
                                $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $rows['mssv']; ?></td>
                        <td><?php echo $rows['hoten']; ?></td>
                        <td><?php echo $rows['email']; ?></td>
                        <td><?php echo $rows['sodienthoai']; ?></td>
                        <td><?php echo $rows['tenlop']; ?></td>
                        <td><?php echo $rows['tendetai']; ?></td>
                        <td>
                            <?php 
                                if($rows['trangthai']==0){
                                    echo '<a style="cursor:pointer" data-id-sinhvien="'.$rows[0].'" data-id-dangkydetai="'.$rows[24].'" class="check_detai"><img src="/luanvan/images/check.png"  alt=""></a>
                                    <a data-bs-toggle="modal" data-bs-target="#myModal1" style="cursor:pointer" data-id-dangkydetai="'.$rows[24].'" class="clear_detai"><img src="/luanvan/images/clear.png"  alt=""></a>';
                                }
                                if($rows['trangthai']==1){
                                    echo '<img src="/luanvan/images/check-mark.png"  alt="">';
                                }if($rows['trangthai']==2){
                                    echo '<img src="/luanvan/images/x-button.png"  alt="">';
                                }
                            ?>    
                        </td>
                        <td><?php echo $rows['phanhoi'] ?></td>
                    </tr>
                    <?php            
                            }
                        }
                    ?>
                    
                </tbody>
            </table>
            <div class="modal fade" id="myModal1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Phản hồi cho sinh viên</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                        <form action="" id="lydo_form">
                                            <div class="inputDiv">
                                                
                                                <input type="hidden" class="form-control" id="id_dangkydetai">
                                            </div>
                                            <div class="inputDiv">
                                                <label style="color:black" for="">Lý do</label>
                                                <input type="text" class="form-control" id="lydo">
                                            </div>
                                            
                                        </form>
                                        <div class="inputDiv text-center">
                                                <button class="btn btn-success" id="ghinhan" >Ghi nhận</button>
                                            </div>   
                                            
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
    </div>
</body>

</html>