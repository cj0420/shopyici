<?php
require_once '../include.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$verify = $_POST['verify'];
$verify1 = $_SESSION['verify'];

if (!isset($username)) {
    alertMes("登录失败，用户名不能为空。", "login.php");
}
if (!isset($password) ) {
    alertMes("登录失败，密码不能为空。", "login.php");
}
if ($verify == $verify1) {

    //先判断用户名
    $sql="select uId,password from yici_user where username='".$username."'";
    $mysqli=connect();
    $row = fetchOne($mysqli, $sql);
    if ($row)
    {
        if($row['password']==$password){
            $_SESSION['uId']=$row['uId'];
            close($mysqli);
            echo "<script>window.location='personal.php';</script>";
        }else{
            alertMes("登录失败，密码错误。", "login.php");
        }
        //header("Location: personal.php");
    }else{
        //邮箱登录判定
        $sql="select uId,username,password from yici_user where email='".$username."'";
        $mysqli=connect();
        $rowE = fetchOne($mysqli, $sql);
        if($rowE){
            if($rowE['password']==$password){
                $_SESSION['username']=$rowE['username'];
                $_SESSION['uId']=$rowE['uId'];
                close($mysqli);
                echo "<script>window.location='personal.php';</script>";
            }else{
                alertMes("登录失败，密码错误。", "login.php");
            }
        }else {
            close($mysqli);
            alertMes("用户不存在，请前往注册。", "login.php");
        }
    }
} else {
    alertMes("登录失败，验证码错误！", "login.php");
}

?>