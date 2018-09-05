<?php
     header("Content-Type:text/html;charset=UTF-8");
     //转编码字符格式，识别中文
    $conn = new mysqli("localhost","root","root","db_1803","3306");
     //判断数据库是否连接成功connect_error为后台的方法
    if($conn->connect_error){
     die("连接失败".$conn->connect_error);
 }
 
?>