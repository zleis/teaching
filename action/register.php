<?php
	header('Access-Control-Allow-Origin:*');

	require_once $_SERVER['DOCUMENT_ROOT']."/teaching/config.php";
	require_once DIR_GLOBAL."verbal.php";
	require_once DIR_SQL."db_handler.php";
	require_once DIR_MODELS."user.php";
	require_once DIR_MODELS."menu.php";


	$uid = $_POST['uid'];
	$pass = $_POST['pass'];
	$nickName = urldecode($_POST['nickName']);
	if(!isset($uid) || !isset($pass)) {
		die(GetDieError("PARAM_LACK"));
	}

	$user = new User;
	$db = new DBHandler;

	$dbUser = $db -> GetUser($user);
	if ($dbUser -> row_nums > 0) {
		die(GetDieError("UID_EXITED"));
	}

	$db -> AddUser($user);
	die(GetDieError("REQUST_SUCC"));
