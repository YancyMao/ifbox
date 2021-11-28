<?php

header('content-type:text/html,charset:utf-8');
$type = $_POST['type'];


$re=[];


$a = 'localhost:3306';
$b = 'root';
$c = 'root';
$d = 'userlist';

$con = mysqli_connect($a,$b,$c,$d);
$sql = 'select * from infolist';

if($type === 'list'){
    $res = mysqli_query($con,$sql);
    $resArray = [];
    while($data = mysqli_fetch_array($res)){
        $temp = [];
        $temp['id'] = $data['id'];
        $temp['name'] = $data['name'];
        $temp['sex'] = $data['sex'];
        $temp['phone'] = $data['phone'];
        $temp['age'] = $data['age'];
        array_push($resArray,$temp);
    }
    if($resArray){
        $re['status'] = true;
        $re['info'] = $resArray;
        $re['msg'] = '请求数据成功';

    }
    else{
        $re['status'] = false;
        $re['msg'] = '请求数据失败';

    }

}
if($type === 'update'){
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $id = $_POST['id'];
    $sql_updata = "update infolist set name = '$name',sex = '$sex', age = '$age' ,phone = '$phone' where id = '$id'";
    mysqli_query($con,$sql_updata);
    $n = mysqli_affected_rows($con);
    if( $n > 0 ){
        $re['status'] = true;
        $re['msg'] = '修改成功';
    }
    else{
        $re['status'] = false;
        $re['msg'] = '修改失败';
    }
}
if($type === 'delete'){

    $id = $_POST['id'];
    $sql_delete = "delete from infolist where id = '$id'";
    mysqli_query($con,$sql_delete);
    $n=mysqli_affected_rows($con);
    if( $n > 0 ){
        $re['status'] = true;
        $re['msg'] = '删除成功';
    }
    else{
        $re['status'] = false;
        $re['msg'] = '删除失败';
    }


}


if($type === 'insert'){
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $id = $_POST['id'];
    $sql_updata = "insert into infolist (name,sex,age,phone) value ('$name','$sex','$age','$phone')";
    mysqli_query($con,$sql_updata);
    $n = mysqli_affected_rows($con);
    if( $n > 0 ){
        $id = mysqli_insert_id($con);
        $re['status'] = true;
        $re['msg'] = '新增成功';
        $re['id'] = $id;
    }
    else{
        $re['status'] = false;
        $re['msg'] = '新增失败';
    }
}


if($type === 'search'){
    $keyword = $_POST['keyword'];
    $sql_search = "select * from infolist where name  like  '%$keyword%' or age  like  '%$keyword%' or sex  like  '%$keyword%' or phone  like  '%$keyword%'";
    $res = mysqli_query($con,$sql_search);
    $resArray = [];
    while($data = mysqli_fetch_array($res)){
        $temp = [];
        $temp['id'] = $data['id'];
        $temp['name'] = $data['name'];
        $temp['sex'] = $data['sex'];
        $temp['phone'] = $data['phone'];
        $temp['age'] = $data['age'];
        array_push($resArray,$temp);
    }
    if($resArray){
        $re['status'] = true;
        $re['info'] = $resArray;
        $re['msg'] = '搜索结束';

    }
    else{
        $re['status'] = false;
        $re['msg'] = '搜索无结果';

    }


}

echo(json_encode($re,JSON_UNESCAPED_UNICODE));

?>
