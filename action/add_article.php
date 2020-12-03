<?php
  header('Access-Control-Allow-Origin:*');
  require_once $_SERVER['DOCUMENT_ROOT']."/teaching/config.php";
  require_once DIR_SQL."db_handler.php";
  require_once DIR_MODELS."user.php";
  require_once DIR_MODELS."menu.php";
  require_once DIR_MODELS."article.php";

  

  if(isset($userPower[$_SESSION['power']]['articleAdd']) && $userPower[$_SESSION['power']]['articleAdd']['isHave']){
	$title = urldecode($_POST['title']);
	$content = urldecode($_POST['content']);
	$source = urldecode($_POST['source']);
	$aid = $_POST['aid'];
	$menu = $_POST['menu'];
	$type = $_POST['type'];
	$date = $_POST['date'];
	if(!isset($menu) || !isset($type)){
		$resJson['feedback'] = PARAM_LACK;
	}else{
		$resJson['feedback'] = REQUST_SUCC;
		// date_default_timezone_set("Asia/Shanghai");
		// $time = date('Y-m-d H:i:s',time());
		if(isCreateArticle($aid)){
			updateArticle($aid, $menu, $type, $title, $date, $source, $content);
		}else{
			insertArticle($aid, $menu, $type, $title, $date, $source, $content);
		}
	}
}else{
	$resJson['feedback'] = NO_POWER;
}
