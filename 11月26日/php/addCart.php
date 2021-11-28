<?php
header('content-type:text/html,charset=utf-8');
$num = $_POST['num'];
$id = $_POST['id'];
$username = $_POST['username'];



$re = [];

$a = 'localhost:3306';
$b = 'root';
$c = 'root';
$d = 'userlist';

$con = mysqli_connect($a, $b, $c, $d);
$sql = "select * from cart where username = '$username' and  goods_id = '$id'";

$data = mysqli_query($con, $sql);
$data = mysqli_fetch_array($data);

if ($data) {

    $sql1 = "update cart set cart_num = cart_num + '$num' where username = '$username' and  goods_id = '$id'";
    mysqli_query($con, $sql1);
    $rows = mysqli_affected_rows($con);
    if ($rows > 0) {
        $re['status'] = true;
        $re['msg'] = '成功添加';
    } else {
        $re['status'] = false;
        $re['msg'] = '服务器失败';
    }
} else {
    $sql1 = "insert into cart (username,goods_id,cart_num) values ('$username','$id',1)";
    mysqli_query($con, $sql1);
    $rows = mysqli_affected_rows($con);
    if ($rows > 0) {
        $re['status'] = true;
        $re['msg'] = '成功加入购物车';
    } else {
        $re['status'] = false;
        $re['msg'] = '服务器错误';
    }
}

echo(json_encode($re,JSON_UNESCAPED_UNICODE));
?>