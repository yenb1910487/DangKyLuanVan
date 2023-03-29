<?php
    
    require_once '../../config/config.php';
    if(isset($_SESSION['idgv'])){
        if(isset($_GET['id'])){
            $idgv = $_SESSION['idgv'];
            $id = $_GET['id']; // lấy id trên thanh địa chỉ
            $sql = "SELECT * FROM dangkydetai where id = $id";
            $res = mysqli_query($conn,$sql);
            $idsv='';
            if($res==true){
                while($rows= mysqli_fetch_assoc($res)){
                    $idsv = $rows['idsv'];
                }
            }
            // Xóa dữ liệu
            $sql = "DELETE FROM `dangkydetai` WHERE id = $id";
            $res = mysqli_query($conn,$sql);
            if($res == true){
                $sql = "UPDATE `sinhvien` SET `kiemtra`=0 WHERE id = $idsv ";
                mysqli_query($conn,$sql);
                $sql = "DELETE FROM `ketqua` WHERE idsv = $idsv";
                $res = mysqli_query($conn,$sql);
                header('location: ../quanlysinhvien.php');
                die();
            }
  
        }else{
            header('location: ../quanlysinhvien.php');
            die();
        }
    }else{
        header('location: ../index.php');
        die();
    }
?>