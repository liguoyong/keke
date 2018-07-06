<?php
    header("Content-Type:text/html;charset=UTF-8");
    //转编码字符格式，识别中文
   $conn = new mysqli("localhost","root","root","db_1803");
    //判断数据库是否连接成功connect_error为后台的方法
   if($conn->connect_error){
    die("连接失败".$conn->connect_error);
}
//    连接数据库，第一个参数为ip地址，参数可变；第二个参数为数据库账号，第三个参数为密码，第四个参数为数据库名，第五个参数为；
   $id = $_GET['id'];//    获取ajax传递过来的id
//    $id = $_COOKIE['id'];后端获取cookie的id的方法
    // 执行sql语句，增删改，返回的是布尔值boolen类型，查返回的是结果集
   $sql = "SELECT * FROM shops WHERE id = $id";
   $conn->query("SET CHARACTER SET 'utf8'");//读库   
   $conn->query("SET NAMES 'utf8'");//写库 ，要记住别忘了写，没写会让html拿不到数据的！！！！
   $result = $conn ->Query($sql);//返回的是结果集
   $row = $result -> fetch_assoc();//返回的是条数
 
   if($row) {
    //    msg是前端与后台要求返回的，一般失败时使用，code相当于状态，正确时为200，data为要传递的$row数据，
    $array = array("msg"=>"","code"=>"200", "data"=>$row);
}else{
    $array = array("code"=>"100", "msg"=> "账号或者用户名错误！！");
}

echo json_encode($array);
// json_decode (PHP 5 >= 5.2.0, PECL json >= 1.2.0)  对 JSON 格式的字符串进行编码 

// 说明 ：mixed json_decode ( string $json [, bool $assoc ] ) 接受一个 JSON 格式的字符串并且把它转换为 PHP 变量 

// 参数 
// json 待解码的 json string 格式的字符串。 
// assoc 
// 当该参数为 TRUE 时，将返回 array 而非 object 。 
// json_decode($data,true)输出的一个关联数组,由此可知json_decode($data）输出的是对象,而json_decode("$arr",true)是把它强制生成PHP关联数组. 
// json_encode (PHP 5 >= 5.2.0, PECL json >= 1.2.0) json_encode — 对变量进行 JSON 编码 
// Report a bug 说明 
// string json_encode ( mixed $value [, int $options = 0 ] ) 
// 返回 value 值的 JSON 形式 



?>