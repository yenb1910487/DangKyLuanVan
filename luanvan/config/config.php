<?php 
    session_start();
    $servername = 'localhost';
    $hostname='root';
    $password='';
    $dbname = 'luanvan';
    $conn = mysqli_connect($servername,$hostname,$password,$dbname);
    mysqli_set_charset($conn, 'UTF8');
?>