<?php
header('Access-Control-Allow-Origin:*');

require_once $_SERVER['DOCUMENT_ROOT']."/teaching/config.php";
require_once SERVER_ROOT."global/globalVar.php";
require_once SERVER_ROOT."sql/sqlFun.php";
$resJson = array();
if(isset($userPower[$_SESSION['power']]['userAdd']) && $userPower[$_SESSION['power']]['userAdd']['isHave']){
	$uid = $_POST['uid'];
	$pass = $_POST['pass'];
	$nickName = urldecode($_POST['nickName']);
	$power = $_POST['power'];
	if(!isset($uid) || !isset($pass) || !isset($nickName) || !isset($power)){
		$resJson['feedback'] = PARAM_LACK;
	}else{
		$resJson['feedback'] = REQUST_SUCC;
		if(isHasUser($uid)){
			$resJson['feedback'] = USER_EXIT;
		}else{
			addUser($uid, $pass, $nickName, $power);
			// insertArticle($aid, $menu, $subMenu, $type, $title, $time, $source, $content);
		}
	}
}else{
	$resJson['feedback'] = NO_POWER;
}



echo json_encode($resJson);
