<?php
    require_once '../../config/config.php';
    if(isset($_SESSION['idgv'])){
        if(isset($_GET['id_dangkydetai'])){
            $id_dangkydetai = $_GET['id_dangkydetai'];

            echo $id_dangkydetai;
            
        }else{
            header('location: ../quanlysinhvien.php');
            die();
        }
    }else{
        header('location: ../quanlysinhvien.php');
        die();
    }
?>