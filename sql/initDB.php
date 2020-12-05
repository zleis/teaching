<?php

    require_once $_SERVER['DOCUMENT_ROOT']."/teaching/config.php";

    // print_r($conf_db)
    // 连接 mysql
    $conn = mysqli_connect($conf_db["host"], $conf_db["user"], $conf_db["pass"]);
    if(!$conn){
    	$_SESSION['error'] = 2;
        echo "error";
    }else{
    	mysqli_select_db($conn, $conf_db["name"]);  //选择数据库，注：没创建数据库时，此处会报错
    	mysqli_query($conn, "set names utf8;");     //设置字符集
    }
