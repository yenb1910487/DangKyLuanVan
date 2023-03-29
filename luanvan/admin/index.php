<?php 
    require_once 'include/header.php';

?>

        <section class="thongtinsinhvien mt-3">
            <h4>THÔNG TIN GIÁO VIÊN</h4>
            <div class="ttsv">
                <?php 
                    $sql = "SELECT * FROM `giaovien`,bomon where giaovien.id_bomon=bomon.id and giaovien.id = $idgv";
                    $res = mysqli_query($conn,$sql);
                    if($res == true){
                        while($rows = mysqli_fetch_assoc($res)){
                ?>
                    <div >
                        <div >MSSV</div>
                        <div  ><?php echo $rows['msgv'] ?></div>
                    </div>
                    <div >
                        <div >Họ tên</div>
                        <div ><?php echo $rows['tengv'] ?></div>
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
                        <div >Bộ môn</div>
                        <div ><?php echo $rows['tenbomon'] ?></div>
                    </div>

                <?php        
                        }
                    }
                ?>
                
                
            </div>
            <h4 class=" mt-3">ĐỔI MẬT KHẨU</h4>
            <div id="thongtincanhan" class="mb-3 text-center ">
                    <form method="POST">
                        <div class="text">
                            <div>
                                Mật khẩu cũ
                            </div>
                            <div>
                                <input id="matkhaucu" type="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="text">
                            <div>
                                Mật khẩu mới
                            </div>
                            <div>
                                <input id="matkhaumoi" type="password" class="form-control" placeholder="New Password"  >
                            </div>
                        </div>
                        
                        <div class="text">
                            <div>
                                Nhập lại mật khẩu mới
                            </div>
                            <div>
                                <input id="nhaplaimkmoi" type="password" class="form-control"  placeholder="New Password (2)">
                            </div>
                        </div>
                        
                        <div class=" mt-3 mb-3" id="mes_submitpw">
                            
                        </div>
                        <div class="text mt-3 mb-3">
                            <input id="luumatkhau" type="submit" value="Lưu" class="btn" style="font-weight:bold;background-color:#fff;color:black;">
                        </div>
                        
                    </form>
                </div>
        </section>
    </div>
</body>

</html>