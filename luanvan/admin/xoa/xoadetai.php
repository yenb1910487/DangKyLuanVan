<?php
    
    require_once '../../config/config.php';
    if(isset($_SESSION['idgv'])){
        if(isset($_GET['id'])){
            $idgv = $_SESSION['idgv'];
            $id = $_GET['id']; // lấy id trên thanh địa chỉ
            // Xóa dữ liệu
            $sql = "DELETE FROM `detai` WHERE id = $id";
            $res = mysqli_query($conn,$sql);
            if($res == true){
                header('location: ../quanlydetai.php');
                die();
            }
  
        }else{
            header('location: ../quanlydetai.php');
            die();
        }
    }else{
        header('location: ../index.php');
        die();
    }
?>