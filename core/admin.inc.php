<?php
require_once '../include.php';

/**查询管理员是否存在
 * @param $mysqli
 * @param $sql
 * @return array|null
 */
function checkAdmin($mysqli,$sql)
{
    return fetchOne($mysqli,$sql);
}
/**
 * 检查管理员是否登录
 */
function checkAdminLogined(){
    if(!isset($_SESSION['adminId']) || ($_SESSION['adminId']=="")){
        alertMes("请先登录","../admin/login.php");
    }
}

/**
 * 注销管理员
 */
function logoutAdmin(){
    $_SESSION=array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    session_destroy();
    header("location: admin/login.php");
}

?>