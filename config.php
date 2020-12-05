<?php
	// 全局配置文件
	define("ROOT", "/teaching/");
	define("SERVER_ROOT", $_SERVER['DOCUMENT_ROOT'] . ROOT);
	define('DIR_MODELS', SERVER_ROOT. "models/");	// model url
	define('DIR_SQL', SERVER_ROOT."sql/"); // 数据库操作目录
	define('DIR_CONFIG', SERVER_ROOT."config/"); // 配置目录
	define('DIR_GLOBAL', SERVER_ROOT."global/"); // 公共资源

	define('URL_ACTION', SERVER_ROOT. "action/");	// 请求url
	define('URL_IMAGE', ROOT."static/image/"); // 图片 url
	define('URL_CSS', ROOT.'static/css/'); // css urle
	define('URL_JS', ROOT.'static/js/'); // js url

	$conf_db = parse_ini_file(DIR_CONFIG."sql.ini");
  $power_string = file_get_contents(DIR_CONFIG.'power.json');
	$error_string = file_get_contents(DIR_CONFIG.'error.json');
	$powerJson = json_decode($power_string, true);
	$errorCode = json_decode($error_string, true);
	$userPower = $powerJson['power'];



	session_start();
