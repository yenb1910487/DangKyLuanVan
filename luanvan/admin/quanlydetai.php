<?php 
    require_once 'include/header.php';

?>

        <section class="thongtinsinhvien  mt-3">
            <h4>DANH SÁCH ĐỀ TÀI</h4>
            <div class="mt-3 mb-3">
                <input type="text" id="tim_kiem_de_tai" class="form-control" style="width:50%;margin:0 auto" placeholder="Nhập mã hoặc tên đề tài">
            </div>
            <a href="" data-bs-toggle="modal" data-bs-target="#myModal"><img src="/luanvan/images/add.png" alt=""></a>
            <!--  -->
            <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Thêm đề tài</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form method="GET" >

                                        <div class="inputDiv">
                                            <label style="color:black" for="">Mã đề tài</label>
                                            <input type="text" class="form-control" id="them_madetai">
                                        </div>
                                        <div class="inputDiv">
                                            <label style="color:black" for="">Tên đề tài</label>
                                            <input type="text" class="form-control" id="them_tendetai">
                                        </div>
                                        <div class="inputDiv">
                                            <label style="color:black" for="">Nội dung</label>
                                            <textarea class="form-control" name="" id="them_noidung" cols="3" rows="5">

                                            </textarea>
                                        </div>
                                        
                                        <div class="inputDiv text-center">
                                            <button id="them_detai" >Thêm</button>
                                        </div>       
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            <!--  -->
            <table class="table">
                <thead style="background-image:radial-gradient( circle farthest-corner at 10% 20%,  rgba(147,67,67,1) 0%, rgba(111,27,27,1) 90% );color: #fff;">
                    <th>STT</th>
                    <th>Mã số đề tài</th>
                    <th>Tên đề tài</th>
                    <th>Nội dung</th>
                    <th>Thao tác</th>
                </thead>
                <tbody id="detai">
                    <?php
                        
                        $sql = "SELECT * FROM detai order by madetai,tendetai";
                        $res = mysqli_query($conn,$sql);
                        if($res == true){
                            $i=0;
                            while($rows = mysqli_fetch_assoc($res)){
                                $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $rows['madetai']; ?></td>
                        <td><?php echo $rows['tendetai']; ?></td>
                        <td><?php echo $rows['noidung']; ?></td>
                        
                        <td>
                            <a href="/luanvan/admin/chinhsuadetai.php?id=<?php echo $rows['id'] ?>"><img src="/luanvan/images/user.png" alt="xoa"></a>
                            
                            <a style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#myModal1" class="view" data-id ='<?php echo $rows['id']; ?>'><img src="/luanvan/images/view.png"></a>
                        </td>
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
                                    <h4 class="modal-title">Danh sách sinh viên đăng ký đề tài</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                <p style="color:black">
                                    Có <span id="count" style="color:red"></span><span  style="color:red"> sinh viên</span> đăng ký đề tài này
                                </p>
                                <table class="table">
                                        <thead class="table-dark">
                                        <tr>
                                            <th>STT</th>
                                            <th>MSSV</th>
                                            <th>Họ tên</th>
                                            
                                            <th>Giới tính</th>
                                            <th>SĐT</th>
                                            <th>Email</th>
                                            <th>Lớp</th>
                                        </tr>
                                        </thead>
                                        <tbody id="body_view">
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
    </div>
</body>

</html>