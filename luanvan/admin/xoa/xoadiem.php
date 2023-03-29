<?php
    
    require_once '../../config/config.php';
    if(isset($_SESSION['idgv'])){
        if(isset($_GET['id'])){
            $idgv = $_SESSION['idgv'];
            $id = $_GET['id']; // lấy id trên thanh địa chỉ
            // Xóa dữ liệu
            $sql = "DELETE FROM `ketqua` WHERE id = $id";
            $res = mysqli_query($conn,$sql);
            if($res == true){
                header('location: ../ketqua.php');
                die();
            }
  
        }else{
            header('location: ../ketqua.php');
            die();
        }
    }else{
        header('location: ../ketqua.php');
        die();
    }
?>