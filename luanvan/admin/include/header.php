<?php 
    require_once '../config/config.php';
    if(!isset($_SESSION['idgv'])){
        header('location: ../index.php');
        die();
    }
    $idgv = $_SESSION['idgv'];
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
    <link rel="stylesheet" href="/luanvan/css/admin.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:500,900,100,300,700,400' rel='stylesheet' type='text/css'>
    <script src="/luanvan/js/doimatkhau.js"></script>
    <script src="/luanvan/js/xulydetaidangky.js"></script>
    
    <script>

        function canhbao(id){
            swal({
                title: "Bạn có chắc chắn muốn xóa?",
                text: "Sau khi đồng ý, bạn không thể phục hồi lại được!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if(willDelete){
                    
                    window.location="/luanvan/admin/xoa/xoadangkydetai.php?id="+id;
                    
                }else{
                    swal("Thao tác đã bị hủy bỏ");
                }
            })
        }
        
        function canhbao3(id){
            swal({
                title: "Bạn có chắc chắn muốn xóa?",
                text: "Sau khi đồng ý, bạn không thể phục hồi lại được!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if(willDelete){
                    
                    window.location="/luanvan/admin/xoa/xoadiem.php?id="+id;
                    
                }else{
                    swal("Thao tác đã bị hủy bỏ");
                }
            })
        }
        $(document).ready(function(){
            // Tim kiem trang quanlysinhvien.php
            $("#tim_kiem_sinh_vien").on('input',function(e){
 
                var giatri = $(this).val();
                $.ajax({
                    url: '/luanvan/admin/ajax/timkiem_dangkydetai.php',
                    data:{giatri:giatri},
                    success:function(data){

                        $("#dangkydetai").html(data);
                        clear_detai()
                        check_detai()
                        click_modal()
                    }
                })
            })
            // Check đề tài
            function check_detai(){
                $(".check_detai").on('click',function(e){
                    var id_dangkydetai = $(this).attr("data-id-dangkydetai");
                    var id_sinhvien = $(this).attr("data-id-sinhvien");

                    $.ajax({
                        url: '/luanvan/admin/ajax/check_detai.php',
                        data:{id_sinhvien:id_sinhvien,id_dangkydetai:id_dangkydetai},
                        success:function(data){
                            $("#dangkydetai").html(data);
                            clear_detai()
                            check_detai()
                            click_modal()
                        }
                    })
                })
            }
            check_detai()
            function click_modal(){
                $(".clear_detai").on('click',function(e){
                    var id_dangkydetai = $(this).attr("data-id-dangkydetai");
                    $.ajax({
                        url: '/luanvan/admin/ajax/click_detai.php',
                        data:{id_dangkydetai:id_dangkydetai},
                        success:function(data){
                            $("#id_dangkydetai").val(data);
                            clear_detai()
                            check_detai()
                            click_modal()
                        }
                    })
                })
            }
            click_modal()
            function clear_detai(){
                $("#ghinhan").on('click',function(e){
                    var id_dangkydetai = $("#id_dangkydetai").val();
                    var phanhoi = $("#lydo").val();
                    if(phanhoi==''){
                        swal({
                            title: "Không được bỏ trống",
                            text: "Nhập lý do",
                            icon: "error"
                        })
                    }else{
                        $.ajax({
                            url: '/luanvan/admin/ajax/clear_detai.php',
                            data:{id_dangkydetai:id_dangkydetai,phanhoi:phanhoi},
                            success:function(data){
                                $("#dangkydetai").html(data);
                                swal({
                                    title: "Success",
                                    text: "Lưu lại thành công",
                                    icon: "success"
                                })
                                $("#lydo_form")[0].reset();
                                clear_detai()
                                check_detai()
                                click_modal()
                            }
                        })
                    }
                    
                })
            }
            clear_detai()
            // Tim kiem trang quanlydetai.php
            $("#tim_kiem_de_tai").on('input',function(e){
 
                var giatri = $(this).val();
                $.ajax({
                    url: '/luanvan/admin/ajax/timkiem_detai.php',
                    data:{giatri:giatri},
                    success:function(data){
                        
                        $("#detai").html(data);
                        view_detai()
                    }
                })
            })
            // Xử lý ajax them de tai
            $("#them_detai").on('click',function(e){
                e.preventDefault();
                var madetai = $("#them_madetai").val();
                var tendetai = $("#them_tendetai").val();
                var noidung = $("#them_noidung").val();
                if(madetai =='' || tendetai=='' ||noidung==''){
                    swal({
                        title: "Error",
                        text: "Vui lòng nhập tất cả các trường",
                        icon: "error"
                    })
                }else{
                    $.ajax({
                        url: '/luanvan/admin/ajax/themdetai.php',
                        data:{madetai:madetai,tendetai:tendetai,noidung:noidung},
                        success:function(string){
                            var getData = JSON.parse(string);
                            if(getData.kiemtra == 0){
                                $("#detai").html(getData.kq);
                                view_detai()
                                swal({
                                    title: "Success",
                                    text: "Thêm đề tài thành công",
                                    icon: "success"
                                })
                            }else{
                                swal({
                                    title: "Error",
                                    text: "Mã đề tài đã trùng ",
                                    icon: "error"
                                })
                            }
                        }
                    });
                }
            })
            // View detai.php
            function view_detai(){
                $(".view").on('click',function(e){
 
                var id_detai = $(this).attr("data-id");

                $.ajax({
                    url: '/luanvan/admin/ajax/view_detai.php',
                    data:{id_detai:id_detai},
                    success:function(string){
                        var layDuLieu = JSON.parse(string);
                        $("#body_view").html(layDuLieu.kq);
                        $("#count").html(layDuLieu.dem);
                    }
                })
                })
            }
            view_detai()
            // Tim kiem trong ketqua.php
            $("#tim_kiem_diem").on('input',function(e){

                var giatri = $(this).val();
                $.ajax({
                    url: '/luanvan/admin/ajax/timkiem_diem.php',
                    data:{giatri:giatri},
                    success:function(data){

                        $("#diem").html(data);
                    }
                })
            })
            $("#loc_khoa").on('input',function(e){
                var giatri = $(this).val();
                var loc_gioitinh = $("#loc_gioitinh").val();
                $.ajax({
                    url: "./ajax/loc_khoa_dssv.php",
                    type: "GET",
                    data: {giatri:giatri,loc_gioitinh:loc_gioitinh},
                    success:function(data){
                        $("#diem").html(data);
                        $("#form_tim_kiem")[0].reset();
                    }
                })
            })
            $("#loc_gioitinh").on('input',function(e){
                var giatri = $(this).val();
                var loc_khoa = $("#loc_khoa").val();
                
                $.ajax({
                    url: "./ajax/loc_gioitinh_dssv.php",
                    type: "GET",
                    data: {giatri:giatri,loc_khoa:loc_khoa},
                    success:function(data){
                        $("#diem").html(data);
                        $("#form_tim_kiem")[0].reset();
                    }
                })
            })
            // Xử lý ô text mssv trong file ketqua.php
            $("#mssv").on('input',function(e){
                var giatri = $(this).val();
                if(giatri == ""){
                    $("#hotensv").val("");
                }
                else{
                    $.ajax({
                        url: '/luanvan/admin/ajax/sinhvien.php',
                        data:{giatri:giatri},
                        success:function(string){
                            var getData = JSON.parse(string);
                            console.log(getData.kiemtra+getData.kq)
                            if(getData.kiemtra ==0){
                                $("#hotensv").val("");
                            }else{
                                $("#hotensv").val(getData.kq);
                            }
                        }
                    })
                }
            })
            $("#them_diem").on('click',function(e){
                e.preventDefault();
                var idgv = $("#idgv").val();
                var mssv = $("#mssv").val();
                var hotensv = $("#hotensv").val();
                var diemso = $("#diemso").val();
                if(mssv == ""||hotensv==""||diemso==""){
                    swal({
                        title: "Error",
                        icon: "error",
                        text: "Vui lòng nhập tất cả thông tin"
                    })
                }
                else{
                    if(diemso<0 || diemso>10){
                        swal({
                            title: "Error",
                            icon: "error",
                            text: "Nhập điểm hợp lệ từ 0->10"
                        })
                    }else{
                        $.ajax({
                            url: '/luanvan/admin/ajax/themdiem.php',
                            data:{idgv:idgv,mssv:mssv,hotensv:hotensv,diemso:diemso},
                            success:function(string){
                                var getData = JSON.parse(string);
                                if(getData.kiemtra >0){
                                    
                                    swal({
                                        title: "Error",
                                        icon: "error",
                                        text: "Sinh viên này nhập điểm rồi"
                                    })
                                }else{
                                    $("#diem").html(getData.kq);
                                    swal({
                                        title: "Success",
                                        icon: "success",
                                        text: "Thêm điểm cho sinh viên thành công"
                                    })
                                }
                            }
                        })
                    }
                    
                }
            })
            
        })


    </script>
    <!-- Biểu đồ tròn-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php 
                $sql ="SELECT sinhvien.gioitinh,count(*) as soluong FROM `giaovien`,lop,sinhvien where sinhvien.id_lop = lop.id and lop.idgv = giaovien.id and giaovien.id = $idgv  GROUP BY sinhvien.gioitinh                ";
                $res = mysqli_query($conn,$sql);
                if($res == true){
                    while($rows = mysqli_fetch_array($res)){
            ?>
            ['<?php echo $rows['gioitinh'] ?>',<?php echo $rows['soluong'] ?>],
            <?php
                    }
                }
          ?>

        ]);

    // Optional; add a title and set the width and height of the chart
    var options = {'title':'Biểu đồ giới tính sinh viên thuộc lớp giáo viên phụ trách',is3D: true, 'width':650, 'height':500};

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
    }

    
      
    </script>
    <!-- Ket thuc biểu đồ -->
    <!-- Biểu đồ cột -->
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
                 <?php $sql = "SELECT * FROM giaovien where id = '$idgv'";
                    $res = mysqli_query($conn,$sql);
                    if($res == true){
                        while($rows = mysqli_fetch_assoc($res)){
                            echo $rows['tengv'];
                        }} ?>
                 </span>
            </p>
            
            <!-- By Dominik Biedebach @domobch -->


            <div id="menu" style="background: #2ecc71; color: rgba(0, 0, 0, 0.5);">
                <h2></h2>
                <nav class="fill">
                    <ul>
                    <li><a href="index.php">INFO</a></li>
                    <li><a href="quanlysinhvien.php">STUDENTS</a></li>
                    <li><a href="quanlydetai.php">TOPICS</a></li>
                    <li><a href="ketqua.php">MARK</a></li>
                    <li><a href="thongke.php">STATISTIC</a></li>
                    
                    </ul>
                </nav>
            </div>
            
            
        </section>
        