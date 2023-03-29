<?php
    
    require_once '../../config/config.php';
    if(isset($_SESSION['idgv'])){
        if(isset($_GET['giatri'])){
            $mssv = $_GET['giatri'];   
            $idgv = $_SESSION['idgv'];
            
            // Fix loi SQL Injection
            $mssv = str_replace('\'','\\\'',$mssv);
           
           
            $sql = "SELECT * FROM sinhvien,giaovien,lop where  mssv = '$mssv' and kiemtra=1 and giaovien.id = lop.idgv and sinhvien.id_lop = lop.id and giaovien.id=$idgv";
            $res = mysqli_query($conn,$sql);
            $kiemtra=0;
            $kiemtra = mysqli_num_rows($res);
            $kq = '';
            if($kiemtra > 0 ){
                while($rows = mysqli_fetch_array($res)){
                    $kq = $rows['hoten'];
                }
            }else{
                
            }
            $data = array(
                "kiemtra"=>$kiemtra,
                "kq"=>$kq
            );
            echo json_encode($data);

        }
        else{
            header('location: ../quanlydetai.php');
            die();
        }
    }else{
        header('location: ../quanlydetai.php');
        die();
    }
?>