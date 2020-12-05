<?php

  header('Access-Control-Allow-Origin:*');

	require_once $_SERVER['DOCUMENT_ROOT']."/teaching/config.php";
  require_once DIR_GLOBAL."verbal.php";
  require_once DIR_SQL."db_handler.php";
  require_once DIR_MODELS."user.php";
  require_once DIR_MODELS."menu.php";

	$resJson = array();
  $user = new User;
  $user -> Uid = $_POST['uid'];
  $user -> Pass = $_POST['pass'];

  $uidPar = '/^[a-zA-Z0-9]+$/';
  if(!preg_match($uidPar, $user -> Uid)){
    die(GetDieError("ACCOUNT_ERROR"));
  }

  $db = new DBHandler;
  $dbUser = $db -> GetUser($user);
  if (count($dbUser) == 0) {
    die(GetDieError("ACCOUNT_ERROR"));
  }

  if ($user -> Pass == $dbUser[0] -> Pass) {
    $_SESSION['uid'] = $dbUser[0] -> Uid;
    $_SESSION['power'] = $dbUser[0] -> Power;
    $_SESSION['name'] = $dbUser[0] -> Name;
    $_SESSION['status'] = 1;
    die(GetDieError("REQUST_SUCC"));
  }

  die(GetDieError("PASS_ERROR"));
