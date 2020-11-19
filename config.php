<?php 
	// 全局配置文件
	define("ROOT", "/teaching/");
	define("SERVER_ROOT", $_SERVER['DOCUMENT_ROOT'] . ROOT);
	define('ACTION', ROOT. "action/");
	define('IMAGE', ROOT."static/image/");
	define('CSS', ROOT.'static/css/');
	define('JS', ROOT.'static/js/');
	
	$conf_db = parse_ini_file(SERVER_ROOT."config/sql.ini");
    $power_string = file_get_contents(SERVER_ROOT.'config/power.json');
	$powerJson = json_decode($power_string, true);
	$userPower = $powerJson['power'];

	$requstURL = array(
		'loginAction' => ACTION."loginAction.php",// 用户登录
	);

	session_start();