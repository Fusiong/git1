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
$number= $_POST['number'];


$con = mysqli_connect($db_host, $db_user, $db_pwd, $db_name, $db_port);
if (!$con) {
    die("链接错误：" . mysqli_connect_error());
}

$db->query("SET NAMES 'utf8'");
$db->select_db('text') or die("不能连接数据库");
$sqls= "UPDATE `goshopping` SET `数量`='$number' WHERE `账号` LIKE '$username' and `图书标题` LIKE '$title' and `状态` LIKE '购物车' ";
$result = $db->query($sqls);
$istrue=true;

echo json_encode($istrue,JSON_UNESCAPED_UNICODE);

?>
