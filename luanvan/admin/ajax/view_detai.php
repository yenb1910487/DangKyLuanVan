<?php
    require_once '../../config/config.php';
    if(isset($_SESSION['idgv'])){
        if(isset($_GET['id_detai'])){
            // Lấy giá trị từ người dùng nhập vào
            $id_detai = $_GET['id_detai'];
            $idgv = $_SESSION['idgv'];
            // Mặc định nếu thanh địa chỉ không có trang nó sẽ chạy vào trang 1
            $sql = "SELECT * FROM `detai`,dangkydetai,sinhvien,lop,giaovien where detai.id=dangkydetai.iddetai and dangkydetai.idsv = sinhvien.id and sinhvien.id_lop = lop.id and lop.idgv = giaovien.id and detai.id=$id_detai and giaovien.id=$idgv and dangkydetai.trangthai=1";
            $res = mysqli_query($conn,$sql);
            $kq = '';
            $count=0;
            if($res == true){
                $i=0;
                $count = mysqli_num_rows($res);
                while($rows = mysqli_fetch_array($res)){
                    $id = $rows['id'];
                    $i++;
                    $kq.= "
                        <tr>
                            <td>".$i."</td>
                            <td>".$rows['mssv']."</td>
                            <td>".$rows['hoten']."</td>
                            
                            <td>".$rows[15]."</td>
                            <td>".$rows[16]."</td>
                            <td>".$rows[17]."</td>
                            <td>".$rows['tenlop']."</td>
                        </tr>
                    ";
                }
            }
            $data = array(
                "dem"=>$count,
                "kq"=>$kq
            );
            echo json_encode($data);
        }else{
            header('location: ../quanlydetai.php');
            die();
        }
    }else{
        header('location: ../quanlydetai.php');
        die();
    }
?>