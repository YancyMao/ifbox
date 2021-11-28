<?php
header('content-type:text/html,charset:utf-8');
$username = $_POST['username'];
$id = $_POST['id'];
$a = 'localhost:3306';
$b = 'root';
$c = 'root';
$d = 'userlist';

$con = mysqli_connect($a,$b,$c,$d);


if(!$con) {
    die('数据库连接失败');
}




$sql = "delete  from cart where goods_id = '$id' and username = '$username'";
mysqli_query($con , $sql) ;
$res = mysqli_affected_rows($con);

$obj = [];

if($res >= 0) {
    $obj['status'] = true ;
    $obj['msg'] = '删除成功';
} else {
    $obj['status'] = false ;
    $obj['msg'] = '删除失败';
}

echo(json_encode($obj , JSON_UNESCAPED_UNICODE));
?>

