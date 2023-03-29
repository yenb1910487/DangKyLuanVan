<?php
    require_once '../../config/config.php';
    if(isset($_SESSION['idgv'])){
        if(isset($_GET['giatri'])){
            // Lấy giá trị từ người dùng nhập vào
            $giatri = $_GET['giatri'];
            $idgv = $_SESSION['idgv'];
            // Mặc định nếu thanh địa chỉ không có trang nó sẽ chạy vào trang 1
            
            $sql = "SELECT * FROM `sinhvien`,lop,giaovien,dangkydetai,detai where (mssv like '%$giatri%' or hoten like '%$giatri%') and lop.id = sinhvien.id_lop and lop.idgv =giaovien.id and dangkydetai.idsv = sinhvien.id and detai.id = dangkydetai.iddetai and idgv=$idgv order by tenlop,mssv";
            $res = mysqli_query($conn,$sql);
            $kq = '';
            if($res == true){
                $i=0;
                while($rows = mysqli_fetch_array($res)){
                    $tt='';
                    if($rows['trangthai']==0){
                        $tt= '<a style="cursor:pointer" data-id-sinhvien="'.$rows[0].'" data-id-dangkydetai="'.$rows[24].'" class="check_detai"><img src="/luanvan/images/check.png"  alt=""></a>
                        <a data-bs-toggle="modal" data-bs-target="#myModal1" style="cursor:pointer" data-id-dangkydetai="'.$rows[24].'" class="clear_detai"><img src="/luanvan/images/clear.png"  alt=""></a>';
                    }
                    if($rows['trangthai']==1){
                        $tt= '<img src="/luanvan/images/check-mark.png"  alt="">';
                    }if($rows['trangthai']==2){
                        $tt= '<img src="/luanvan/images/x-button.png"  alt="">';
                    }
                    $i++;
                    $kq.= "
                        <tr>
                        <td>".$i."</td>
                        <td>".$rows['mssv']."</td>
                        <td>".$rows['hoten']."</td>
                        <td>".$rows['email']."</td>
                        <td>".$rows['sodienthoai']."</td>
                        <td>".$rows['tenlop']."</td>
                        <td>".$rows['tendetai']."</td>
                        
                        <td>".$tt."</td>
                        <td>".$rows['phanhoi']."</td>
                        </tr>
                    ";
                }
            }
            echo $kq;
        }else{
            header('location: ../quanlysinhvien.php');
            die();
        }
    }else{
        header('location: ../quanlysinhvien.php');
        die();
    }
?>