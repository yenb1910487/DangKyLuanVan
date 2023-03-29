<?php
    require_once '../../config/config.php';
    $sotin1trang = 6;
    if(isset($_SESSION['idsv'])){
        if(isset($_GET['giatri'])){
            // Lấy giá trị từ người dùng nhập vào
            $giatri = $_GET['giatri'];
            // Mặc định nếu thanh địa chỉ không có trang nó sẽ chạy vào trang 1
            $trang = 1;
            if(isset($_GET['trang'])){
                $trang = $_GET['trang'];
            }
            // Công thức tính phân trang
            $from = ($trang-1)*$sotin1trang;
            $sql = "SELECT * FROM detai order by madetai asc limit $from,$sotin1trang";
            // Khong nhap gi het thi su dung cau $sql dong 15
            if($giatri != ''){
                $sql = "SELECT * FROM detai where madetai like '%$giatri%' or tendetai like '%$giatri%' order by madetai asc ";
            }
            $res = mysqli_query($conn,$sql);
            $kq = '';
            if($res == true){
                $i=0;
                while($rows = mysqli_fetch_assoc($res)){
                    $i++;
                    $kq.= "
                        <tr>
                        <td>".$i."</td>
                        <td>".$rows['madetai']."</td>
                        <td>".$rows['tendetai']."</td>
                        <td>".$rows['noidung']."</td>
                        </tr>
                    ";
                }
            }
        //---------------------
            $sql = "SELECT * FROM detai order by madetai asc";
            $res = mysqli_query($conn,$sql);
            $tongsotin = mysqli_num_rows($res);
            $sotrang = ceil($tongsotin/$sotin1trang);
            $trang = '';
            for($i=1;$i<=$sotrang;$i++){
                $trang .= "<a href='detai.php?trang=".$i."' style='margin-right:1%'>".$i."</a>";
            }
            if($giatri != ''){
                $trang = '';
            }
            $data = array(
                "trang" => $trang,
                "kq" =>$kq
            );
            // Trả về dữ liệu kiểu JSON
            echo json_encode($data);
        }else{
            header('location: ../detai.php');
            die();
        }
    }else{
        header('location: ../detai.php');
        die();
    }
?>