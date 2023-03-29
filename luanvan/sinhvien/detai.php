<?php 
    require_once 'include/header.php';

?>

        <section class="detai">
            <h4>ĐĂNG KÝ ĐỀ TÀI</h4>
            <div>
                <?php 
                    $sql = "SELECT * FROM `dangkydetai`,sinhvien where sinhvien.id = dangkydetai.idsv and sinhvien.id=$idsv";
                    $res = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($res)>0){
                        $rows = mysqli_fetch_assoc($res);
                        if(isset($rows['phanhoi']) && isset($rows['trangthai']) && $rows['trangthai']==2){
                            echo "<div id='mes_error' class='text-danger' style='font-weight:bold'>".$rows['phanhoi']." Vui lòng đăng ký chủ đề khác nha!</div>";
                        }
                    }
                    
                ?>
                <form action="">

                    <?php 
                        $sql = "SELECT * FROM `dangkydetai`,detai,sinhvien where detai.id = dangkydetai.iddetai and sinhvien.id = dangkydetai.idsv and sinhvien.id=$idsv";
                        $res = mysqli_query($conn,$sql);
                        $rows = mysqli_fetch_assoc($res);
                    ?>
                    <?php if(isset($rows['kiemtra']) && $rows['kiemtra'] == 1){echo "<p style='color:green;font-weight:bold'>Đề tài bạn đã được duyệt! Bạn không thể thao tác.</p>";} ?>
                    <label for="dangkydetai" style="font-weight:bold"><i>Nhập mã đề tài</i></label>
                    <input value="<?php  if(isset($rows['madetai']) ){echo $rows['madetai'];} ?>" type="text" <?php if(isset($rows['kiemtra']) && $rows['kiemtra'] == 1){echo "disabled";} ?> class="form-control" id="madetai" style="width:70px">
                    
                    <label for="dangkydetai" style="font-weight:bold"><i>Điền đề tài cần đăng ký</i></label>
                    <textarea <?php if(isset($rows['kiemtra']) && $rows['kiemtra'] == 1){echo "disabled";} ?> class="form-control" id="tendetai" placeholder="Ghi rõ mã và tên đề tài"  rows="4"><?php  if(isset($rows['tendetai']) ){echo $rows['tendetai'];} ?></textarea>
                    <button <?php if(isset($rows['kiemtra']) && $rows['kiemtra'] == 1){echo "disabled";} ?>  class="btn btn-success mt-2" id="luudetai">Lưu</button>
                    
                    
                    <div id="message">
                    
                    </div>
                    
                </form>
                
            </div>
            <h4>DANH SÁCH CÁC ĐỀ TÀI</h4>
            
            <div class="mt-3 mb-3">
                <input type="text" id="tim_kiem_de_tai" class="form-control" style="width:50%;margin:0 auto" placeholder="Nhập và mã hoặc tên đề tài">
            </div>
            <table class="table">
                <thead >
                    <th>STT</th>
                    <th>Mã đề tài</th>
                    <th>Tên đề tài</th>
                    <th>Yêu cầu</th>
                </thead>
                <tbody id="detai">
                    <?php
                        $trang = 1;//mac dihn trang ban dau = 1
                        if(isset($_GET['trang'])){
                            $trang = $_GET['trang'];
                        }
                        $from = ($trang-1)*$sotin1trang;
                        $sql = "SELECT * FROM detai order by madetai asc limit $from,$sotin1trang";
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
                    </tr>
                    <?php            
                            }
                        }
                    ?>
                    
                </tbody>
            </table>
            <div id="phantrang" style="text-align:right">
                <?php 
                    $sql = "SELECT * FROM detai order by madetai asc";
                    $res = mysqli_query($conn,$sql);
                    $tongsotin = mysqli_num_rows($res);
                    $sotrang = ceil($tongsotin/$sotin1trang);
                    for($i=1;$i<=$sotrang;$i++){
                ?>
                <a href="detai.php?trang=<?php echo $i; ?>" style="margin-right:1%"><?php echo $i; ?></a>
                <?php
                    }
                ?>

            </div>
            
        </section>
    </div>
</body>

</html>