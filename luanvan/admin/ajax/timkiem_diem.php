<?php
    require_once '../../config/config.php';
    if(isset($_SESSION['idgv'])){
        if(isset($_GET['giatri'])){
            // Lấy giá trị từ người dùng nhập vào
            $giatri = $_GET['giatri'];
            $idgv = $_SESSION['idgv'];
            // Mặc định nếu thanh địa chỉ không có trang nó sẽ chạy vào trang 1
            $sql = "SELECT ketqua.id,sinhvien.mssv,sinhvien.gioitinh,sinhvien.nganh,sinhvien.hoten,lop.tenlop,ketqua.diemso,ketqua.diemchu FROM lop,`ketqua`,sinhvien where (mssv like '%$giatri%' or hoten like '%$giatri%') and lop.id = sinhvien.id_lop and sinhvien.id=ketqua.idsv order by lop.tenlop,mssv";
            $res = mysqli_query($conn,$sql);
            $kq = '';
            if($res == true){
                $i=0;
                while($rows = mysqli_fetch_assoc($res)){
                    $id = $rows['id'];
                    $i++;
                    $kq.= "
                    <tr>
                        <td>".$i."</td>
                        <td>".$rows['mssv']."</td>
                        <td>".$rows['hoten']."</td>
                        <td>".$rows['tenlop']."</td>
                        <td>".$rows['nganh']."</td>
                        <td>".$rows['gioitinh']."</td>
                        <td>".$rows['diemso']."</td>
                        <td>".$rows['diemchu']."</td>
                        

                        <td>
                            <a href='/luanvan/admin/chinhsuadiem.php?id=".$id."'><img src='/luanvan/images/user.png' alt='xoa'></a>
                            <a style='cursor:pointer' onclick='canhbao3(".$id.")'><img src='/luanvan/images/delete.png' alt='xoa'></a>
                        </td>
                    </tr>
                    ";
                }
            }
            echo $kq;
        }else{
            header('location: ../quanlydetai.php');
            die();
        }
    }else{
        header('location: ../quanlydetai.php');
        die();
    }
?>