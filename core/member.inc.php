<?php
/**
 * 检查用户是否登录
 */
function checkMemberLogined()
{
    if (!isset($_SESSION['uId']) || ($_SESSION['uId'] == "")) {
        alertMes("请先登录", "../member/login.php");
    }
}

/**
 * 注销用户
 */
function logoutMember()
{
//    $_SESSION=array();
//    if(isset($_COOKIE[session_name()])){
//        setcookie(session_name(),"",time()-1);
//    }
//    session_destroy();
//    header("location: login.php");
}

?>