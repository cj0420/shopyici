<?php
require_once '../include.php';
require_once 'sendEmail.php';

$email = $_POST['email'];
$verify = $_POST['verify'];
$verify1 = $_SESSION['verify'];
$pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";

if (isset($email) && preg_match($pattern, $email)) {
    $sql = "select uId from yici_user where email='".$email."'";
    $mysqli=connect();   //连接数据库
    $row = fetchOne($mysqli, $sql);
    if (!$row) {
        close($mysqli);  //关闭数据库连接
        alertMes("邮箱尚未注册，无法找回密码，请先注册", "findPwd.php");
    }
}else{
    alertMes("注册失败，邮箱格式不正确。", "findPwd.php");
}
if ($verify == $verify1) {
    $sql = "select username,password from yici_user where email='".$email."'";
    $mysqli=connect();
    $row=fetchOne($mysqli,$sql);
    if ($row) {
        $regtime = time();
        $token = md5($row['username'] . $orw['password'] . $regtime);   //创建用于重置密码
        $token_exptime = time() + 60 * 60 * 24;
        $rs = sendEmail($row['username'], $email,$token,'find');
        alertMes("请登录到您的邮箱重新设置新的密码,并登录！", "login.php");
    }
} else {
    alertMes("注册失败，验证码错误！", "register.php");
}

?>