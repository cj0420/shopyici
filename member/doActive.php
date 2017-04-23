<?php
require_once '../include.php';
require_once 'sendEmail.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$verify = $_POST['verify'];
$verify1 = $_SESSION['verify'];
$regtime = time();
$token = md5($username . $password . $regtime); //创建用于激活识别码
$token_exptime = time() + 60 * 60 * 24;           //过期时间为24小时后

if (isset($username)) {
    $sql = "select username from yici_user where username='".$password."'";
    $mysqli=connect();   //连接数据库
    $row = fetchOne($mysqli, $sql);
    if (!$row) {
        close($mysqli);  //关闭数据库连接
        alertMes("申请失败，用户名不存在。", "activateMember.php");
    }
} else {
    alertMes("申请失败，用户名不能为空。", "activateMember.php");
}
if(!isset($password) ){
    alertMes("申请失败，密码不能为空。", "activateMember.php");
}else{
    $sql = "select username from yici_user where username='".$password."'";
    $mysqli=connect();   //连接数据库
    $row = fetchOne($mysqli, $sql);
    if (!$row) {
        close($mysqli);  //关闭数据库连接
        alertMes("申请失败，密码错误。", "activateMember.php");
    }
}

if (isset($email) && preg_match($pattern, $email)) {
    $sql = "select uId from yici_user where email='".$email."'";
    $mysqli=connect();   //连接数据库
    $row = fetchOne($mysqli, $sql);
    if (!$row) {
        close($mysqli);  //关闭数据库连接
        alertMes("申请失败，邮箱不存在或者错误。", "activateMember.php");
    }
}else{
    alertMes("申请失败，邮箱格式不正确。", "activateMember.php");
}
if ($verify == $verify1) {
    $arr = array(
        "regTime" => $regtime,
        "taken" => $token,
        "takenExptime" => $token_exptime,
    );
    $mysqli=connect();
    mysqli_autocommit($mysqli,false);   //由于在事务提交中系统默认提交，故这里设置为FALSE先不提交
    $where="username=".$username." password=".$password;
    $row = update($mysqli, "yici_user", $arr,$where);
    if ($row) {
        $rs = sendEmail($username, $email, $token,'active');
        if ($rs) {
            mysqli_commit($mysqli);  //成功则提交事务
            close($mysqli);
            session_destroy();      //注册成功后摧毁会话
            alertMes("恭喜您，申请激活成功！请登录到您的邮箱及时激活您的帐号！", "login.php");
        }else {
            $mysqli_rollback($mysqli);  //发送邮件出错则回滚事务
            close($mysqli);             //关闭数据库连接
        }
    }
} else {
    alertMes("申请失败，验证码错误！", "activateMember.php");
}

?>