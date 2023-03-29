<?php 
    require_once '../config/config.php';
    if(!isset($_SESSION['idsv'])){
        header('location: ../index.php');
        die();
    }
    $idsv = $_SESSION['idsv'];
    $sotin1trang = 6; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="/luanvan/css/sinhvien.css">
    <!--  -->

    <script>
        $(document).ready(function(){
            $("#tim_kiem_de_tai").on('input',function(e){
                var giatri = $(this).val();
                $.ajax({
                    url: '/luanvan/sinhvien/ajax/timkiemdetai.php',
                    data:{giatri:giatri},
                    type: "GET",
                    success:function(string){
                        var getData = JSON.parse(string);
                        //get Data dag la kieu ObJECT
                        // getData{
                        // kq, trang
                        //}
                        // getData{
                        //     kq: "...",
                        //     trang: "..."
                        // }
                        $("#detai").html(getData.kq);
                        $("#phantrang").html(getData.trang);
                    }
                })
            })
            $("#luudetai").on('click',function(e){
                e.preventDefault();
                var madetai = $("#madetai").val();
                var tendetai = $("#tendetai").val();
                if(madetai == '' || tendetai==''){
                    $("#message").html("<p style='color:red;font-weight:bold'>Vui lòng nhập đề tài luận văn cần đăng ký</p>");
                }else{
                    $.ajax({
                    url: '/luanvan/sinhvien/ajax/dangkydetai.php',
                    data:{madetai:madetai,tendetai:tendetai},
                    type: "GET",
                    success:function(data){
                        if(data == 0){
                            $("#message").html("<p style='color:red;font-weight:bold'>Mã đề tài hoặc tên đề tài không hợp lệ! Nhập lại.</p>");
                        }else{
                            $("#message").html("<p style='color:green;font-weight:bold'>Đăng ký đề tài thành công</p>");
                        }
                        $("#mes_error").html("");
                    }
                })
                }
            })
        })
    </script>
</head>
<body>
    <div class="container">
        <section class="header">
            <p><a class="btn " href="../dangxuat.php">
                <img src="/luanvan/images/2.png" alt="" width="50px">
            </a></p>
            <p class="ten pt-3">
                 Xin chào, 
                 <span style="color:radial-gradient(circle farthest-corner at center, rgba(0, 159, 255, 1) 10%, rgba(0, 133, 226, 1) 20%, rgba(0, 108, 198, 1) 30%, rgba(0, 84, 170, 1) 40%, rgba(0, 62, 143, 1) 50%, rgba(0, 41, 117, 1) 60%, rgba(0, 21, 91, 1) 70%, rgba(0, 7, 67, 1) 80%, rgba(0, 3, 44, 1) 90%, rgba(0, 1, 22, 1) 100%)">
                 <?php $sql = "SELECT * FROM sinhvien where id = '$idsv'";
                    $res = mysqli_query($conn,$sql);
                    if($res == true){
                        while($rows = mysqli_fetch_assoc($res)){
                            echo $rows['hoten'];
                        }} ?>
                 </span>
            </p>
            
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item list-group-item-action list-group-item-light text-center"><a href="/luanvan/sinhvien/index.php">Thông tin sinh viên</a></li>
                <li class="list-group-item list-group-item-action list-group-item-light text-center"><a href="/luanvan/sinhvien/detai.php">Danh sách đề tài</a></li>
                <li  class="list-group-item list-group-item-action list-group-item-light text-center"><a  href="/luanvan/sinhvien/ketqua.php">Kết quả học tập</a></li>
                         
            </ul>
            <div style="text-align:center;">
                <img src="/luanvan/images/photo-1580582932707-520aed937b7b.jfif" alt="logo" width="1296.52px" height="300px">

            </div>
        </section>
        