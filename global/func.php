<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/teaching/config.php";
  require_once DIR_GLOBAL."verbal.php";


  // 校验是否登录
  function LoginVerify() {
    if (!isset($_SESSION['login'])) {
      return false;
    }

    if ($_SESSION['login'] != LOGIN_SATUS ) {
      return false;
    }

    return true;
  }

  function PowerVerify($key) {
    if(!isset($userPower[$_SESSION['power']]['articleAdd'])){
      return false;
    }


    if(!$userPower[$_SESSION['power']]['articleAdd']['isHave']){
      return false;
    }

    return true;
  }

  function GetError($key) {
    global $errorCode;
    if (isset($errorCode[$key])){
      return $errorCode[$key];
    }
    $res = array();
    $res['code'] = 0;
    $res['msg'] = "未知错误";
    return $res;
  }

  function GetDieError($key) {
    $res = array();
    global $errorCode;
    if (isset($errorCode[$key])){
      $res = $errorCode[$key];
    } else {
      $res['code'] = 0;
      $res['msg'] = "未知错误";
    }

    return '{"feedback":'.$res['code']. ', "msg":"'.$res['msg'].'"}';
  }
