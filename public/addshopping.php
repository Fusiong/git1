<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
    exit;
}

//这些是解决跨域问题的

$db_host = "127.0.0.1";
$db_user = "root";
$db_pwd = "123456";
$db_name = "text";
$db_port = 3306;
$db = @new mysqli($db_host, $db_user, $db_pwd);

$title = $_POST['title'];
$username = $_POST['username'];
$price = $_POST['price'];
$number= $_POST['number'];


$con = mysqli_connect($db_host, $db_user, $db_pwd, $db_name, $db_port);
if (!$con) {
    die("链接错误：" . mysqli_connect_error());
}

$db->query("SET NAMES 'utf8'");
$db->select_db('text') or die("不能连接数据库");


$arrays=array();
$arrays[0]=false;
$arrays[1]=$number;

$sql = "SELECT * FROM `goshopping` WHERE `账号` LIKE '$username' and `图书标题` LIKE '$title' and `状态` like '购物车' ";
$result = $db->query($sql);
$nums = $result->num_rows;
if($nums>0){
    $obj = $result->fetch_object();
    $numbers = $obj->数量;
    $allnumber=$number+$numbers;
    $sqls= "UPDATE `goshopping` SET `数量`='$allnumber' WHERE `账号` LIKE '$username' and `图书标题` LIKE '$title' and `状态` like '购物车' ";
    $results = $db->query($sqls);
    $arrays[0]=true;
    $arrays[1]=$allnumber;
}else{
    $sql2="INSERT INTO `goshopping`(`账号`, `图书标题`, `价格`, `数量`,`状态`) VALUES ('$username','$title','$price','$number','购物车');";
    $result2=$db->query($sql2);
}




  



echo json_encode($arrays, JSON_UNESCAPED_UNICODE);
