<?php
include_once("../include.php");

$verify = stripslashes(trim($_GET['verify']));//去除反斜杠
$nowtime = time();

$sql="select uId,takenExptime from yici_user where activeFlag=0 and taken= '".$verify."'";
$mysqli=connect();
$row = fetchOne($mysqli, $sql);
if($row){
	if($nowtime>$row['takenExptime']){       //30min
		close($mysqli);
		alertMes("您的激活有效期已过，请重新激活您的账号。", "activateMember.php");
	}else{
		$arr = array(
			"activeFlag"=>1
		);
		$row=update($mysqli,'yici_user', $arr, $where =" uId= ".$row['uId'] );
		if($row){
			close($mysqli);
			alertMes("恭喜您，激活成功！请登录","login.php");
		}
	}
}else{
	close($mysqli);
	echo  '非常遗憾，出错了，请待会儿重新试一试 ^_^';
}


?>
