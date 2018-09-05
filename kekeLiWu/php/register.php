<?php
    include "public.php";
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "INSERT INTO `user_info`( `username`, `password`) VALUES ('$username','$password')";
    echo $sql;
    $conn->query("SET CHARACTER SET 'utf8'");//读库   
    $conn->query("SET NAMES 'utf8'");
    $rows = mysqli_query($conn,$sql);
     if(!$rows){
         echo "<script>alert('注册失败')</script>";
     }else{       
             echo "<script>alert('注册成功');location.href='../login.html'</script>"; 
     }
?>