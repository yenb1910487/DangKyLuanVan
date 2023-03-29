<?php
    require_once '../../config/config.php';
    if(isset($_SESSION['idsv'])){
        if(isset($_GET['madetai'])){
            // Lấy giá trị từ người dùng nhập vào
            $idsv = $_SESSION['idsv'];
            $iddetai = '';
            $madetai = $_GET['madetai'];
            $tendetai = $_GET['tendetai'];
            $kiemtra = 0;
            //Fix lỗi SQL injection ( mysqli)
            $madetai = str_replace('\'','\\\'',$madetai);
            $tendetai = str_replace('\'','\\\'',$tendetai);
            $sql = "SELECT id FROM detai where madetai = '$madetai' and tendetai='$tendetai'";
            $res = mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)>0){
                $kiemtra = 1;
                while($rows = mysqli_fetch_assoc($res)){
                    $iddetai = $rows['id'];
                }
                $sql = "SELECT * from dangkydetai where idsv = $idsv";
                $res = mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)>0){//tồn tại rồi thì cập nhật
                    $sql = "UPDATE `dangkydetai` SET `iddetai`='$iddetai',`trangthai`=0,phanhoi='' WHERE idsv = $idsv";
                }else{// chưa tồn tại thì insert
                    $sql = "INSERT INTO `dangkydetai`(`idsv`, `iddetai`, `trangthai`) VALUES ('$idsv','$iddetai','0')";
                }
                $res = mysqli_query($conn,$sql);
                
            }
        echo $kiemtra;
        }else{
            header('location: ../detai.php');
            die();
        }
    }else{
        header('location: ../detai.php');
        die();
    }
?>