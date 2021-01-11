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

$addre = $_POST['addre'];
$username = $_POST['username'];



$con = mysqli_connect($db_host, $db_user, $db_pwd, $db_name, $db_port);
if (!$con) {
    die("链接错误：" . mysqli_connect_error());
}

$db->query("SET NAMES 'utf8'");
$db->select_db('text') or die("不能连接数据库");

$istrue = false;


$sql = "SELECT * FROM `user` WHERE `username` LIKE '$username'  ";
$result = $db->query($sql);
$obj = $result->fetch_object();
$nums = $result->num_rows;
$address1 = $obj->address1;
$address2 = $obj->address2;
$address3 = $obj->address3;
$name=$obj->name;

if ($address1 != "" && $address1==$addre) {
    $sqls = "UPDATE `user` SET `address1`=null WHERE `username` LIKE '$username' ";
    $resultes = $db->query($sqls);
    $istrue = true;
} else if ($address2 != "" && $address2==$addre) {
    $sqls = " UPDATE `user` SET `address2`=null WHERE `username` LIKE '$username' ";
    $resultes = $db->query($sqls);
    $istrue = true;
} else if ($address3 != "" && $address3==$addre) {
    $sqls = " UPDATE `user` SET `address3`=null WHERE `username` LIKE '$username' ";
    $resultes = $db->query($sqls);
    $istrue = true;
}



echo json_encode($istrue, JSON_UNESCAPED_UNICODE);
