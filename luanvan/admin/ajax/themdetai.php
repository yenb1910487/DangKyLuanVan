<?php
    
    require_once '../../config/config.php';
    if(isset($_SESSION['idgv'])){
        if(isset($_GET['madetai']) && isset($_GET['tendetai']) && isset($_GET['noidung'])){
            $madetai = $_GET['madetai'];   
            $tendetai = $_GET['tendetai'];         
            $noidung = $_GET['noidung'];  
            
            // Fix loi SQL Injection
            $madetai = str_replace('\'','\\\'',$madetai);
            $tendetai = str_replace('\'','\\\'',$tendetai);
            $noidung = str_replace('\'','\\\'',$noidung);
           
            $sql = "SELECT * FROM detai where madetai = '$madetai'";
            $res = mysqli_query($conn,$sql);
            $kiemtra=0;
            $kiemtra = mysqli_num_rows($res);
            $kq = '';
            if($kiemtra > 0 ){
                
            }else{
                $sql = "INSERT INTO `detai`(`madetai`, `tendetai`, `noidung`) 
                VALUES ('$madetai','$tendetai','$noidung')";
                $res = mysqli_query($conn,$sql);
                if($res == true){
                    $sql = "SELECT * FROM detai order by madetai,tendetai asc";
                    $res = mysqli_query($conn,$sql);
                    if($res == true){
                        $i=0;
                        while($rows = mysqli_fetch_assoc($res)){
                            $id = $rows['id'];
                            $i++;
                            $kq.= "
                                <tr>
                                <td>".$i."</td>
                                <td>".$rows['madetai']."</td>
                                <td>".$rows['tendetai']."</td>
                                <td>".$rows['noidung']."</td>

                                <td>
                                    <a href='/luanvan/admin/chinhsuadetai.php?id=".$id."'><img src='/luanvan/images/user.png' alt='xoa'></a>
                                    
                                    <a style='cursor:pointer' data-bs-toggle='modal' data-bs-target='#myModal1' class='view' data-id ='".$rows['id']."'><img src='/luanvan/images/view.png'></a>
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
            header('location: ../quanlydetai.php');
            die();
        }
    }else{
        header('location: ../quanlydetai.php');
        die();
    }
?>