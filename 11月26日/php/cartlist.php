<?php
header('content-type:text/html,charset:utf-8');
$username = $_POST['username'];
$a = 'localhost:3306';
$b = 'root';
$c = 'root';
$d = 'userlist';

$con = mysqli_connect($a,$b,$c,$d);


if(!$con) {
    die('数据库连接失败');
}



$res = [] ;



$sql = "SELECT * from cart , goods_list where goods_list.goods_id = cart.goods_id and username = '$username'";
$res = mysqli_query($con , $sql) ;

$list = [] ;

while($data = mysqli_fetch_array($res)) {
    $temp = [] ;
    $temp['id'] = $data['goods_id'] ;
    $temp['name'] = $data['goods_name'] ;
    $temp['title'] = $data['goods_title'] ;
    $temp['des'] = $data['goods_des'] ;
    $temp['img'] = $data['goods_img'] ;
    $temp['price'] = $data['goods_price'] ;
    $temp['num'] = $data['cart_num'] ;
    array_push($list , $temp) ;
}

if($list) {
    $obj['status'] = true ;
    $obj['msg'] = '数据请求成功';
    $obj['data'] = $list ;
} else {
    $obj['status'] = false ;
    $obj['msg'] = '购物车为空';
    $obj['data'] = $list ;
}

echo(json_encode($obj , JSON_UNESCAPED_UNICODE));
?>

