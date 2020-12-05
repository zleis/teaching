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

  if (!PowerVerify("menuAdd")) {
    die(GetDieError("NO_POWER"));
  }

  $name = urldecode($_POST['name']);
  $des = urldecode($_POST['des']);

  $menu = new Menu;
  $menu -> Name = $name;
  $menu -> Des = $des;

  $db = new DBHandler;
  $db -> AddMenu($menu);

  die(GetDieError("REQUST_SUCC"));
