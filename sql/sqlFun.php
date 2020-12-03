<?php

	header("Content-Type:text/html;charset=utf-8");
	require_once $_SERVER['DOCUMENT_ROOT']."/teaching/config.php";
	require_once SERVER_ROOT."sql/initDB.php";

	define("TBL_USER", "user");
	define("TBL_MENU", "menus");
  define("TBL_ARTICLE", "article");

    /**
    * @todo 添加文章
    */
    function insertArticle($aid, $menu, $type, $title, $atime, $source, $content){
        global $conn;
        $sql = "INSERT INTO " . TBL_ARTICLE ."(aid, menu,  atype, atitle, atime, " .
               "asource, areadtime, adetail) VALUES ('$aid', $menu, $type, '$title',".
               " '$atime', '$source',0, '$content')";
        $res = @mysqli_query($conn, $sql);
        return $res;
    }

    /**
    * @todo 更新文章
    */
    function updateArticle($aid, $menu, $type, $title, $time, $source, $content){
        global $conn;
        $sql = "UPDATE " . TBL_ARTICLE .  " SET menu = $menu, atype = $type,".
               "atitle = '$title', atime = '$time',asource = '$source', adetail = '$content' ".
               "WHERE aid = '$aid'";
        mysqli_query($conn, $sql);
    }

    /**
    * @todo 文章是否存在
    */
    function isCreateArticle($aid){
        global $conn;
        $sql = "SELECT * FROM " . TBL_ARTICLE . " WHERE aid = '$aid'";
        $res = @mysqli_query($conn, $sql);
        return ($res -> num_rows > 0);
    }

    /**
    * @todo 获取文章列表
    */
    function getAllArticel($start, $len){
        global $conn;
        $sql = "SELECT * FROM " . TBL_ARTICLE . " where atype = 1 or atype = 2  ORDER BY atype desc, atime desc  limit $start, $len";
        $res = @mysqli_query($conn, $sql);
        return $res;
    }

    /**
    * @todo 获取文章列表长度
    */
    function getArticelLen(){
        global $conn;
        $sql = "SELECT COUNT(*) as num FROM " . TBL_ARTICLE . " where atype = 1 or atype = 2";
        $res = @mysqli_query($conn, $sql);
        $row = $res -> fetch_assoc();
        return $row['num'];
    }

    /**
    * @todo 根据文章ID删除文章
    */
    function delArticleByID($aid){
        global $conn;
        $sql = "DELETE FROM " . TBL_ARTICLE . " WHERE aid = '$aid'";
        $res = @mysqli_query($conn, $sql);
        return $res;
    }

    /**
    * @todo 根据文章ID获取文章
    */
    function getArticleByID($aid){
        global $conn;
        $sql = "SELECT * FROM " . TBL_ARTICLE . " WHERE aid = '$aid'";
        $res = @mysqli_query($conn, $sql);
        return $res;
    }

    /**
    * @todo 获取最新的文章列表
    */
    function getNewArticle($limit, $date){
        global $conn;
        $sql = "SELECT * FROM " . TBL_ARTICLE . " where atype = 1 and atime >= '$date' ORDER BY weight desc, atime desc  limit 0, $limit";
        $res = @mysqli_query($conn, $sql) or die($sql);
        return $res;
    }

    /**
    * @todo 根据文章类别获取文章
    */
    function getArticleByType($code, $num){
        global $conn;
        $sql = "SELECT * FROM " . TBL_ARTICLE . " where atype = 1 and menu = '$code' ORDER BY atime desc limit 0, $num";
        $res = @mysqli_query($conn, $sql);
        return $res;
    }

    /**
    * @todo 文章阅读量自增
    */
    function articleReadIncrease($code){
        global $conn;
        $sql = "UPDATE " . TBL_ARTICLE .  " SET areadtime = areadtime + 1 where aid = '$code'";
        $res = @mysqli_query($conn, $sql);
        return $res;
    }

    /**
    * @todo 获取某个类别文章列表
    */
    function getArticleOneTypeList($code,$start,$limit){
        global $conn;
        $sql = "SELECT * FROM " . TBL_ARTICLE . " where atype = 1 and menu = '$code' ORDER BY atime desc limit $start, $limit";
        $res = @mysqli_query($conn, $sql);
        return $res;
    }

    /**
    * @todo 获取某个类别文章列表数量
    */
    function getArticleOneTypeNum($code){
        global $conn;
        $sql = "SELECT count(*) as num FROM ".TBL_ARTICLE." where atype = 1 and menu = '$code'";
        $res = @mysqli_query($conn, $sql);
        $row = $res -> fetch_assoc();
        return $row['num'];
    }

    /**
    * @todo 获取阅读量排序列表
    */
    function getArticleQuantityList($num){
        global $conn;
        $sql = "SELECT * FROM ".TBL_ARTICLE." WHERE atype = 1 ORDER BY areadtime desc, atime desc".
               " limit 0, $num";
        $res = @mysqli_query($conn, $sql);
        return $res;
    }

    function getAritcleNameByCode($code){
        global $conn;
        $sql = "SELECT * FROM ".TBL_ARTICLE." WHERE atype = 1 and aid = '$code'";
        $res = @mysqli_query($conn, $sql);
        $row = $res -> fetch_assoc();
        return $row['atitle'];
    }

    /**
    * @return 一级菜单
    */
    function getAllMenu(){
        global $conn;
        $sql = "SELECT * FROM " . TBL_MENU . " where activity = 1";
        $res = @mysqli_query($conn, $sql);
        return $res;
    }

    /**
    * @todo 获取名为code的菜单名称
    */
    function getMenuNameByCode($code){
        global $conn;
        $sql = "SELECT * FROM ".TBL_MENU." WHERE code = '$code'";
        $res = @mysqli_query($conn, $sql);
        $row = $res -> fetch_assoc();
        return $row['name'];
    }

    /**
    * @todo 是否存在名为code的菜单
    */
    function isMenuExist($code){
        global $conn;
        $sql = "SELECT * FROM ".TBL_MENU." WHERE code = '$code'";
        $res = @mysqli_query($conn, $sql);
        return ($res -> num_rows > 0);
    }

    /**
    * @todo 更新名为code的菜单
    */
    function updataMenu($code, $name, $activity){
        global $conn;
        $sql = "UPDATE " . TBL_MENU .  " SET name = '$name', activity = '$activity' WHERE code = '$code'";
        $res = @mysqli_query($conn, $sql);
        return $res;
    }

    /**
    * @todo 添加菜单
    */
    function addMenu($code, $name, $activity){
        global $conn;
        $sql = "INSERT INTO ".TBL_MENU." (code, name, activity) VALUES('$code','$name',$activity)";
        $res = @mysqli_query($conn, $sql);
        return $res;
    }

    function getMenuByCode($code){
        global $conn;
        $sql = "SELECT * FROM ".TBL_MENU." WHERE code = '$code'";
        $res = @mysqli_query($conn, $sql);
        return $res;
    }

    function getMenuList(){
        global $conn;
        $sql = "SELECT * FROM " . TBL_MENU;
        $res = @mysqli_query($conn, $sql);
        return $res;
    }

    /**
    * @param uid 用户ID
    * @return 用户ID为uid的
    */
    function loginAction($uid){
        global $conn;
        $sql = "SELECT * FROM " . TBL_USER . " where uid = '$uid'";
        $res = @mysqli_query($conn, $sql);
        return $res;
    }

    function getAllUser(){
        global $conn;
        $sql = "SELECT * FROM " . TBL_USER;
        $res = @mysqli_query($conn, $sql);
        return $res;
    }

    function delUserByID($uid){
        global $conn;
        $sql = "DELETE FROM " . TBL_USER . " WHERE uid = '$uid'";
        $res = @mysqli_query($conn, $sql);
        return $res;
    }

    function isHasUser($uid){
        global $conn;
        $sql = "SELECT * FROM ". TBL_USER . " WHERE uid = '$uid'";
        $res = @mysqli_query($conn, $sql);
        return ($res -> num_rows > 0 );
    }

    function updataUser($uid, $nickName, $power){
        global $conn;
        $sql = "UPDATE " . TBL_USER .  " SET nickname = '$nickName', power = $power ".
               "WHERE uid = '$uid'";
        $res = @mysqli_query($conn, $sql) ;
        return $res;
    }

    function addUser($uid, $pass, $nickName, $power){
        global $conn;
        $sql = "INSERT INTO " . TBL_USER ."(uid, pass, power, nickname, con, nomodifier) VALUES ".
               "('$uid', '$pass', $power, '$nickName',1,2)";
        $res = @mysqli_query($conn, $sql) ;
        return $res;
    }

    function delUserByUid($uid){
        global $conn;
        $sql = "DELETE FROM " . TBL_USER . " WHERE uid = '$uid'";
        $res = @mysqli_query($conn, $sql);
        return $res;
    }

    function setUserPass($uid, $pass){
        global $conn;
        $sql = "UPDATE " . TBL_USER .  " SET pass = '$pass' "."WHERE uid = '$uid'";
        $res = @mysqli_query($conn, $sql);
        return $res;
    }


    function getAllImageList(){
        global $conn;
        $sql = "SELECT * FROM " . TBL_IMAGE ;
        $res = @mysqli_query($conn, $sql);
        return $res;
    }

    function getImageByID($id){
        global $conn;
        $sql = "SELECT * FROM " . TBL_IMAGE ." WHERE id = '$id'";
        $res = @mysqli_query($conn, $sql);
        return $res;
    }

    function delImageByID($id){
        global $conn;
        $sql = "DELETE FROM " . TBL_IMAGE . " WHERE id = '$id'";
        $res = @mysqli_query($conn, $sql);
        return $res;
    }

    function addImage($fileName, $aid, $text, $url){
        global $conn;
        $sql = "INSERT INTO " . TBL_IMAGE ."(img, aid, text, url) VALUES ('$fileName', '$aid', '$text', '$url')";
        $res = @mysqli_query($conn, $sql);
        return $res;
    }

    function editImage($id, $fileName, $aid, $text, $url){
        global $conn;
        $sql = "UPDATE " . TBL_IMAGE .  " SET img = '$fileName', aid = '$aid',".
               "text = '$text', url = '$url' WHERE id = '$id'";
        $res = @mysqli_query($conn, $sql);
        return $res;
    }
