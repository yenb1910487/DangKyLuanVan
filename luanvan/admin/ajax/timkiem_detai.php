<?php
    require_once '../../config/config.php';
    if(isset($_SESSION['idgv'])){
        if(isset($_GET['giatri'])){
            // Lấy giá trị từ người dùng nhập vào
            $giatri = $_GET['giatri'];
            $idgv = $_SESSION['idgv'];
            // Mặc định nếu thanh địa chỉ không có trang nó sẽ chạy vào trang 1
            $sql = "SELECT * FROM detai where madetai like '%$giatri%' or tendetai like '%$giatri%' order by madetai,tendetai ";
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
                        <td>".$rows['madetai']."</td>
                        <td>".$rows['tendetai']."</td>
                        <td>".$rows['noidung']."</td>

                        <td>
                            <a href='/luanvan/admin/chinhsuadetai.php?id=".$id."'><img src='/luanvan/images/user.png' alt='xoa'></a>
                            
                            <a style='cursor:pointer' data-bs-toggle='modal' data-bs-target='#myModal1' class='view' data-id ='".$rows['id']."'><img src='/luanvan/images/view.png'></a>
    
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