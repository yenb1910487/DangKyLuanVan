
<?php 
    require_once '../config/config.php';
    if(!isset($_SESSION['idgv'])){
        header('location: ../index.php');
        die();
    }
    $idgv = $_SESSION['idgv'];
    // Xử lý lấy id trên thanh địa chỉ
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * from detai where id = $id";//Lay thong tin cua de tai co id lay từ thanh địa chỉ
        $res = mysqli_query($conn,$sql);
        if(mysqli_num_rows($res) == 0){ //Truong hop: Khong co du lieu
            header('location: quanlydetai.php');
            die(); //co nhiem vu khong cho chay những dòng phía dưới nữa
        }else{
            // Nguoc lai: tồn tại dữ liệu thì gán dữ liệu ban đầu
            while($rows = mysqli_fetch_assoc($res)){
                $madetai = $rows['madetai'];
                $tendetai = $rows['tendetai'];
                $noidung = $rows['noidung'];
            }
        }
    }else{
        header('location: quanlydetai.php');
        die();
    }
    // Kiem tra nguoi dung co bam submit form khong?
    if(isset($_POST['luu'])){

        if(isset($_GET['id'])){
            $id = $_GET['id'];//lay ID tu thanh địa chỉ , để xíu nữa UPDATE cho dễ

        }
        if(isset($_POST['tendetai']) && isset($_POST['noidung'])){
            $tendetai = $_POST['tendetai'];//lay du lieu tu nguoi dung
            $noidung = $_POST['noidung'];//lay du lieu tu nguoi dung
        }
        //Fix loi SQL Injection 
        $tendetai = str_replace('\'','\\\'',$tendetai);
        $noidung = str_replace('\'','\\\'',$noidung);
        // Kiem tra neu nguoi dung khong nhập => error message
        
        if($tendetai == '' || $noidung==''){
            $_SESSION['message_edit'] = 'Vui lòng nhập tất cả thông tin';
        }else{
            $sql = "UPDATE detai set tendetai='$tendetai', noidung='$noidung' where id = $id";
            $res = mysqli_query($conn,$sql);
            if($res == true){
                $_SESSION['message_edit'] = 'Chúc mừng! Bạn đã chỉnh sửa thành công';
            }
        }
    }
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
        
        <section class="thongtinsinhvien  mt-3">
            <a href="/luanvan/admin/quanlydetai.php"><img src="/luanvan/images/arrow-left.png" alt=""></a>
            <h4 class="mt-3 mb-3">CHỈNH SỬA THÔNG TIN ĐỀ TÀI</h4>

                <div id="thongtincanhan" class="mb-3 text-center ">
                    <div class="mt-1 mb-2" id="message_chinhsua">
                        <?php
                            if(isset($_SESSION['MESSAGE'])){
                                echo $_SESSION['MESSAGE'];
                                unset($_SESSION['MESSAGE']);
                            }
                        ?>
                    </div>
                    <form action="" method="POST">
                        <div class="text">
                            <div>
                            Mã đề tài
                            </div>
                            <div>
                                <input name="madetai" value="<?php if(isset($madetai)) echo $madetai; ?>" disabled type="text" class="form-control" >
                            </div>
                        </div>
                        <div class="text">
                            <div>
                            Tên đề tài
                            </div>
                            <div>
                                <input  name="tendetai" value="<?php if(isset($tendetai)) echo $tendetai; ?>" type="text" class="form-control" >
                            </div>
                        </div>
                        
                        <div class="text">
                            <div>
                                Nội dung
                            </div>
                            <div>
                                <textarea name="noidung" style=" margin-top:2%" name="" id="" cols="30" class="form-control" rows="3"><?php if(isset($noidung)) echo $noidung; ?></textarea>

                            </div>
                        </div>
                        
                        <div class=" mt-3 mb-3" id="mes_submitpw">
                            <?php
                            if(isset($_SESSION['message_edit'])){
                                echo $_SESSION['message_edit'];
                                unset($_SESSION['message_edit']);
                            }?>
                        </div>
                        <div class="text mt-3 mb-3">
                            <input type="submit" value="Lưu" name="luu" class="btn" style="font-weight:bold;background-color:#fff;color:black;">
                        </div>
                    </form>
                </div>

            
            
        </section>
    </div>
</body>

</html>