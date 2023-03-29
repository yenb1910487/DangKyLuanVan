<?php
    
    require_once '../../config/config.php';
    if(isset($_SESSION['idgv'])){
        if(isset($_GET['idgv']) && isset($_GET['mssv']) && isset($_GET['diemso'])){
            $idgv = $_SESSION['idgv'];
            $idgv = $_GET['idgv'];   
            $mssv = $_GET['mssv'];         
            $diemso = $_GET['diemso'];  
            $diemchu = '';
            // Fix loi SQL Injection
            $idgv = str_replace('\'','\\\'',$idgv);
            $mssv = str_replace('\'','\\\'',$mssv);
            $diemso = str_replace('\'','\\\'',$diemso);
            //Lay ID cua sinh vien 
            $sql = "SELECT id from sinhvien where mssv = '$mssv'";
            $idsv = '';
            $res = mysqli_query($conn,$sql);
            if($res==true){
                while($rows=mysqli_fetch_array($res)){
                    $idsv = $rows['id'];
                }
            }
            // Xử lý từ diemso => diemchu
            if($diemso<=10 && $diemso>=9){
                $diemchu = 'A';
            }
            if($diemso<9 && $diemso>=8){
                $diemchu = 'B+';
            }
            if($diemso<8 && $diemso>=7){
                $diemchu = 'B';
            }
            if($diemso<7 && $diemso>=6.5){
                $diemchu = 'C+';
            }
            if($diemso<6.5 && $diemso>=6){
                $diemchu = 'C';
            }
            if($diemso<6 && $diemso>=5){
                $diemchu = 'D+';
            }
            if($diemso<5 && $diemso>=4){
                $diemchu = 'D';
            }
            if($diemso<4){
                $diemchu = 'F';
            }
            $sql = "SELECT * FROM ketqua where idsv = $idsv";
            $res = mysqli_query($conn,$sql);
            $kiemtra=0;
            $kiemtra = mysqli_num_rows($res);
            $kq = '';
            if($kiemtra > 0 ){
                
            }else{
                $sql = "INSERT INTO `ketqua` (`idsv`, `idgv`, `diemso`, `diemchu`) 
                VALUES ($idsv, $idgv, '$diemso', '$diemchu');";
                $res = mysqli_query($conn,$sql);
                if($res == true){
                    $sql = "SELECT ketqua.id,sinhvien.mssv,sinhvien.gioitinh,sinhvien.nganh,sinhvien.hoten,lop.tenlop,ketqua.diemso,ketqua.diemchu FROM lop,`ketqua`,sinhvien where lop.id = sinhvien.id_lop and sinhvien.id=ketqua.idsv and ketqua.idgv = $idgv order by lop.tenlop,mssv";
                    $res = mysqli_query($conn,$sql);
                    if($res == true){
                        $i=0;
                        while($rows = mysqli_fetch_assoc($res)){
                            $id = $rows['id'];
                            $i++;
                            $kq.= "
                                <tr>
                                <td>".$i."</td>
                                <td>".$rows['mssv']."</td>
                                <td>".$rows['hoten']."</td>
                                <td>".$rows['tenlop']."</td>
                                <td>".$rows['nganh']."</td>
                                <td>".$rows['gioitinh']."</td>
                                <td>".$rows['diemso']."</td>
                                <td>".$rows['diemchu']."</td>
                                

                                <td>
                                    <a href='/luanvan/admin/chinhsuadiem.php?id=".$id."'><img src='/luanvan/images/user.png' alt='xoa'></a>
                                    <a style='cursor:pointer' onclick='canhbao3(".$id.")'><img src='/luanvan/images/delete.png' alt='xoa'></a>
                                </td>
                                </tr>
                            ";
                        }
                    }
                }
            }
            $data = array(
                "kiemtra"=>$kiemtra,
                "kq"=>$kq
            );
            echo json_encode($data);

        }
        else{
            header('location: ../ketqua.php');
            die();
        }
    }else{
        header('location: ../ketqua.php');
        die();
    }
?>