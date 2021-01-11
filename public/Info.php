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
$username = $_POST['username'];
$name=$_POST['name'];
$gender=$_POST['gender'];
$phone=$_POST['phone'];


$con = mysqli_connect($db_host, $db_user, $db_pwd, $db_name, $db_port);
if (!$con) {
    die("链接错误：" . mysqli_connect_error());
}

$db->query("SET NAMES 'utf8'");
$db->select_db('text') or die("不能连接数据库");
$sql = "UPDATE `user` SET `name`='$name',`gender`='$gender',`phonenumber`='$phone' WHERE `username` like '$username'";
$result = $db->query($sql);
$nums = $result->num_rows;
if ($nums > 0) {
    echo json_encode($results,JSON_UNESCAPED_UNICODE);
}

?>