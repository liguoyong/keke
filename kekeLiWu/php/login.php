<?php
   include "public.php";
   $username = $_POST["username"];
   $password = $_POST["password"];
//    echo $username;
   $sql="SELECT * FROM user_info WHERE username = '$username'";
   $conn->query("SET CHARACTER SET 'utf8'");//读库   
   $conn->query("SET NAMES 'utf8'");
   $result = $conn -> Query($sql);
   $row = $result -> fetch_assoc();
    if(!$row){
        echo "<script>alert('用户名或密码错误');location.href ='../login.html'</script>";
    }else{
        if($password ===$row['password']){
            $uname = $row['mark'];
            $shopnum = $row['shop_num'];     
            echo "<script>localStorage.setItem('username','$uname');localStorage.setItem('shop_num','$shopnum');location.href='../page.html';</script>"; 
        }else{
            echo "<script>alert('密码错误');location.href ='../login.html'</script>";
        }
          
    }

?>