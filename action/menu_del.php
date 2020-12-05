<?php
  header('Access-Control-Allow-Origin:*');
  require_once $_SERVER['DOCUMENT_ROOT']."/teaching/config.php";
  require_once DIR_SQL."db_handler.php";
  require_once DIR_MODELS."user.php";
  require_once DIR_MODELS."menu.php";
  require_once DIR_MODELS."article.php";

  if(!LoginVerify()) {
    die(GetDieError("WITHOUT_LOGIN"));
  }

  if (!PowerVerify("menuDel")) {
    die(GetDieError("NO_POWER"));
  }

  $mid = $_POST['mid'];

  $menu = new Menu;
  $menu -> Mid = $mid;

  $db = new DBHandler;
  $db -> DeleteMenu($menu);

  die(GetDieError("REQUST_SUCC"));
