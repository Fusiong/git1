<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");

if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
    exit;
}                      //这些是解决跨域问题的
   $params=json_decode(urldecode($_POST['ajax']),true);
   $username= $params['username'];
echo json_encode($username);

?>