<?php
header('content-type:text/html,charset:utf-8');
$uname = $_POST['username'];
$upwd  = $_POST['password'];
$type  = $_POST['type'];


//数据库连接
$a = 'localhost:3306';
$b = 'root';
$c = 'root';
$d = 'userlist';


$e = mysqli_connect($a, $b, $c, $d);
$re = [];
$search = "select * from user where username = '$uname'";
if ($uname && $upwd) {


    if ($type === 'login') {
        $dbre = mysqli_query($e, $search);
        $dbre = mysqli_fetch_array($dbre);
        if ($dbre) {
            if ($dbre['password'] === $upwd) {

                $re['status'] = true;
                $re['msg'] = '登录成功';
            } else {
                $re['status'] = false;
                $re['msg'] = '密码不正确';
            }
        } else {
            $re['status'] = false;
            $re['msg'] = '用户名不存在';
        }
    }
    if ($type === 'register') {
        $dbre = mysqli_query($e, $search);
        $dbre = mysqli_fetch_array($dbre);
        if ($dbre) {
            $re['status'] = false;
            $re['msg'] = '用户名已存在';
        } else {
            $insert = "insert into user (username,password) value ('$uname','$upwd')";
            mysqli_query($e, $insert);
            $dbre2 = mysqli_query($e, $search);
            if ($dbre2) {
                $re['status'] = true;
                $re['msg'] = '注册成功';
            } else {
                $re['status'] = false;
                $re['msg'] = '注册失败';
            }
        }
    }
} else {
    $re['status'] = false;
    $re['msg'] = '输入不能为空';
}
echo (json_encode($re, JSON_UNESCAPED_UNICODE));
