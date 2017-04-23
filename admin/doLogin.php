<?php
require_once '../include.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$verify = $_POST['verify'];
$verify1 = $_SESSION['verify'];
if ($verify == $verify1) {
    $sql = "select * from yici_admin where name='${username}' and pwd='${password}'";
    $row=checkAdmin(connect(),$sql);
    //printf ("%s : %s :%s",$res["username"],$res["password"],$res["email"]);
    if($row){
        $_SESSION['adminName']=$row['name'];
        $_SESSION['adminId']=$row['id'];
        //alertMes("登陆成功！","index.php");
        header("location: index.php");
    }else{
        alertMes("登录失败，重新登录!","login.php");
    }
} else {
    alertMes("验证码错误！","login.php");
}

?>