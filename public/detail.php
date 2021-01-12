<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
    exit;
}                      //这些是解决跨域问题的



$db_host = "127.0.0.1";
$db_user = "root";
$db_pwd = "123456";
$db_name = "text";
$db_port = 3306;
$db = @new mysqli($db_host, $db_user, $db_pwd);
$bookname = $_POST['bookname'];

$con = mysqli_connect($db_host, $db_user, $db_pwd, $db_name, $db_port);
if (!$con) {
    die("链接错误：" . mysqli_connect_error());
}

$db->query("SET NAMES 'utf8'");
$db->select_db('text') or die("不能连接数据库");

$sql = "SELECT * FROM `bookshop` WHERE `图书标题` LIKE '$bookname'";
$result = $db->query($sql);
$nums = $result->num_rows;

if ($nums < 1) {
    echo null;
} else {
    $obj = $result->fetch_object();

    $ISBN = $obj->ISBN;
    $title=$obj->图书标题;
    $writer=$obj->作者;
    $press=$obj->出版社;
    $year=$obj->出版年份;
    $price=$obj->价格;

    $arrays[0]=$ISBN;
    $arrays[1]=$title;
    $arrays[2]=$writer;
    $arrays[3]=$press;
    $arrays[4]=$year;
    $arrays[5]=$price;

    echo json_encode($arrays,JSON_UNESCAPED_UNICODE);
}


?>