<?php

header('Access-Control-Allow-Origin:*');
$kw   = $_POST['keyword'];
$sort = $_POST['sort'];
$sortItem = $_POST['sortItem'];

$a = 'localhost:3306';
$b = 'root';
$c = 'root';
$d = 'userlist';


$con = mysqli_connect($a,$b,$c,$d);


$sql = "select * from goods_list where goods_name like '%$kw%' or goods_des like '%$kw%' or goods_title like '%$kw%' order by $sortItem $sort";


$resSql = mysqli_query($con,$sql);

$resArray = [];
while($data = mysqli_fetch_array($resSql)){
    $temp = [];

    $temp['name'] = $data['goods_name'];
    $temp['des'] = $data['goods_des'];
    $temp['img'] = $data['goods_img'];
    $temp['price'] = $data['goods_price'];
    $temp['title'] = $data['goods_title'];
    $temp['type'] = $data['goods_type'];
    $temp['id'] = $data['goods_id'];

    array_push($resArray,$temp);
}
$res = [];
if($resArray){

    $res['status'] = true;
    $res['goods']  = $resArray;
    $res['msg']  = '数据请求成功';
}
else{
    $res['status'] = false;
    $res['msg']  = '数据请求失败';
}


echo(json_encode($res,JSON_UNESCAPED_UNICODE));
?>