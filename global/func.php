<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/teaching/config.php";
  require_once DIR_GLOBAL."verbal.php";


  // 校验是否登录
  function LoginVerify() {
    if (!isset($_SESSION['login']) {
      return false;
    }

    if ($_SESSION['login'] != LOGIN_SATUS ) {
      return false;
    }

    return true;
  }

  function PowerVerify($key) {
    if(!isset($userPower[$_SESSION['power']]['articleAdd']){
      return false;
    }


    if(!$userPower[$_SESSION['power']]['articleAdd']['isHave']){
      return false;
    }

    return true;
  }

  
