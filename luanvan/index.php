<?php 
    require_once 'config/config.php';
    
    if(isset($_POST['submit'])){

        $mssv = $password = '';
        if(isset($_POST['mssv'])){
            $mssv = $_POST['mssv'];
        }
        if(isset($_POST['password'])){
            $password = $_POST['password'];
        }
        // Fix lỗi sql Injection
        $mssv = str_replace('\'','\\\'',$mssv);
        $password = str_replace('\'','\\\'',$password);
        $password = md5($password);

        if(isset($_POST['check'])){
            $sql = "SELECT * FROM giaovien where msgv = '$mssv' and matkhau = '$password'";
            $result  = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
              while($rows = mysqli_fetch_assoc($result)){
                $_SESSION['idgv'] = $rows['id'];
              }
                header('location: admin/index.php');

            }else{
                $_SESSION['error'] = 'Đăng nhập thất bại';
            }
        }else{
            $sql = "SELECT * FROM sinhvien where mssv = '$mssv' and matkhau = '$password'";
            $result  = mysqli_query($conn,$sql);
            
            if(mysqli_num_rows($result) > 0){
                while($rows = mysqli_fetch_assoc($result)){
                  $_SESSION['idsv'] = $rows['id'];
                }
                header('location: sinhvien/index.php');

            }else{
                $_SESSION['error'] = 'Đăng nhập thất bại';
            }
        }
        

    }
?>
<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="css/login.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="images/logo.png" alt="logo" width="200.52px">
        
      </div>
      
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="mssv" placeholder="Tài khoản" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Nhập mật khẩu" required>
              </div>
              <div style="text-align:center;">
              
              
                <span style="padding-top:2%;font-size:0.9rem">Nếu là giáo viên<br>Vui lòng check vào đây</span><br>
                
                <input style="padding-top:2%" type="checkbox" name="check" style="height:22.4px">
              </div>
              <div class="message" style="text-align:center;color:red;font-weight:bold">
                    <?php 
                        if(isset($_SESSION['error'])){
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                    ?>
              </div>
              <div class="button input-box">
                <input type="submit" value="Đăng nhập" name="submit">
              </div>
              
            </div>
        </form>
      </div>
        <div class="signup-form">
          
    </div>
    </div>
  </div>
</body>
</html>
