<?php
    include "public.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM shopcar";
    $conn->query("SET CHARACTER SET 'utf8'");//读库   
   $conn->query("SET NAMES 'utf8'");
   $result = $conn ->Query($sql);
    $row = $result -> fetch_all();
    if($row) {
        //    msg是前端与后台要求返回的，一般失败时使用，code相当于状态，正确时为200，data为要传递的$row数据，
        $array = array("msg"=>"","code"=>"200", "data"=>$row);
    }else{
        $array = array("code"=>"100", "msg"=> "数据加载出错！！");
    }
    
    echo json_encode($array);
?>