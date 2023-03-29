<?php
    
    require_once '../../config/config.php';
    if(isset($_SESSION['idgv'])){
        if(isset($_POST['matkhaucu']) && isset($_POST['matkhaumoi']) && isset($_POST['nhaplaimkmoi'])){
            $idgv = $_SESSION['idgv'];
            // Dùng sql để lấy mật khẩu hiện tại ( tức là mật khẩu cũ)
            $sql ="SELECT * FROM giaovien where id='$idgv'";
            $run = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($run);
            // Lấy mật khẩu hiện tại
            $matkhauAdmin = $row['matkhau'];
            
             $nhapmatkhaucu = $_POST['matkhaucu']; //Lấy giá trị mật khẩu cũ do người dùng nhập
             $nhapmatkhaumoi = $_POST['matkhaumoi'];//Lấy giá trị mật khẩu mới do người dùng nhập
             $nhaplaimkmoi = $_POST['nhaplaimkmoi'];//Lấy giá trị mật khẩu mới lần 2 do người dùng nhập
            // Fix lỗi SQL injection
            $nhapmatkhaucu = str_replace('\'','\\\'',$nhapmatkhaucu);
            $nhapmatkhaumoi = str_replace('\'','\\\'',$nhapmatkhaumoi);
            $nhaplaimkmoi = str_replace('\'','\\\'',$nhaplaimkmoi);
            // Mã hóa mật khẩu md5
            $nhapmatkhaucu = md5($nhapmatkhaucu);
            
            if($nhapmatkhaucu == $matkhauAdmin){// Nếu giá trị mật khẩu cũ do người dùng nhập giống mật khẩu hiện tại
                
                if($nhapmatkhaumoi == $nhaplaimkmoi){//Nếu nhập mật khẩu mới 2 lần đúng thì mới chạy
                    

                    $nhapmatkhaumoi = md5($nhapmatkhaumoi);
                    $nhaplaimkmoi = md5($nhaplaimkmoi);
                    $sql = "UPDATE giaovien set matkhau = '$nhapmatkhaumoi' where id = $idgv";
                    $run = mysqli_query($conn,$sql);
                    if($run == true){
                        echo '<script>
                        swal({
                                        title: "Success",
                                        text: "Thay đổi mật khẩu thành công",
                                        icon: "success"
                                    })
                        </script>';
                    }else{
                        echo '<script>
                        swal({
                                        title: "Error",
                                        text: "Thay đổi mật khẩu thất bại",
                                        icon: "error"
                                    })
                    </script>';
                    }
                }
                else{
                    echo '<script>
                    swal({
                                    title: "Error",
                                    text: "Mật khẩu mới và nhập lại mật khẩu mới phải giống nhau",
                                    icon: "error"
                                })
                </script>';
                }
            }
            else{
                echo '<script>
                swal({
                                title: "Error",
                                text: "Mật khẩu cũ không chính xác",
                                icon: "error"
                            })
            </script>';
            }
        }
    }else{
        header('location: ../index.php');
    }
?>