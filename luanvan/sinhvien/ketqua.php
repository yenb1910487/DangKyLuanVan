<?php 
    require_once 'include/header.php';

?>

        <section class="thongtinsinhvien">
            <h4>KẾT QUẢ HỌC TẬP</h4>
            <div class="ttsv">
                <?php 
                    $sql = "SELECT * FROM `ketqua`,sinhvien,detai,dangkydetai where detai.id = dangkydetai.iddetai and dangkydetai.idsv =sinhvien.id and sinhvien.id = ketqua.idsv and sinhvien.id=$idsv";
                    $res = mysqli_query($conn,$sql);
                    if($res == true){
                        if(mysqli_num_rows($res)==0){
                            echo "<div >Bạn chưa được nhập điểm vui lòng quay lại sau!</div>";
                        }else{
                            while($rows = mysqli_fetch_assoc($res)){
                                $canhbao = '';
                                if($rows['diemchu']=='F'){
                                    $canhbao="<img src='/luanvan/images/alert-symbol.png' alt=''><i>Bạn bị cảnh báo học vụ</i>";
                                }
                                
                                echo "
                                <div >
                                    <div >Đề tài</div>
                                    <div >".$rows['tendetai']."</div>
                                </div>
                                <div >
                                    <div >Điểm số</div>
                                    <div >".$rows['diemso']."</div>
                                </div>
                                
                                <div >
                                    <div >Điểm chữ</div>
                                    <div >".$rows['diemchu']."</div>
                                </div>
                                <div style='margin-left:15%'>".$canhbao."</div>";
                            }
                        }
                        
                    }
                ?>
                
                
            </div>
            
        </section>
    </div>
</body>

</html>