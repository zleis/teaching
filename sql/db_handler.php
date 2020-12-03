<?php

  header("Content-Type:text/html;charset=utf-8");
  require_once $_SERVER['DOCUMENT_ROOT']."/teaching/config.php";
  require_once DIR_MODELS."user.php";
  require_once DIR_MODELS."menu.php";
  require_once DIR_MODELS."article.php";

  define("TBL_USER", "user");
  define("TBL_MENU", "menu");
  define("TBL_ARTICLE", "article");

  /**
   * DB 类
   */
  class DBHandler
  {
    var $Conn;
    var $ErrCode;

    function __construct()
    {
      global $conf_db;
      $this -> Conn = mysqli_connect($conf_db["host"], $conf_db["user"], $conf_db["pass"]);
      if(!$this -> Conn){
      	$this -> ErrorCode = 2;
      }else{
      	mysqli_select_db($this -> Conn, $conf_db["name"]);  //选择数据库，注：没创建数据库时，此处会报错
      	mysqli_query($this -> Conn, "set names utf8;");     //设置字符集
      }
    }

    // 用户
    function AddUser($user) {
      $sql = "INSERT INTO " . TBL_USER ."(uid, name, pass, level) VALUES ". "('" . $user -> Uid . "', '" . $user -> Name . "', " . $user -> Pass . ", " . $user -> Level . ")";
      $res = mysqli_query($this -> Conn, $sql);
      return $res;
    }

    function UpdateUser($user) {
      $sql = "UPDATE " . TBL_USER .  " SET name = '" . $user -> Name . "', level = " . $user -> Level . " ". "WHERE uid = '" . $user -> Uid . "'";
      $res = mysqli_query($this -> Conn, $sql);
      return $res;
    }

    function DelUser($user) {
      $sql = "DELETE FROM " . TBL_USER . " WHERE uid = '" . $user -> Uid . "'";
      $res = mysqli_query($this -> Conn, $sql);
      return $res;
    }

    function GetUsers($offset, $limit) {
      $sql = "SELECT * FROM " . TBL_USER . " limit $offset, $limit";
      $res = mysqli_query($this -> Conn, $sql);
      return $res;
    }

    function GetUserCount() {
      $sql = "SELECT * FROM " . TBL_USER ;
      $res = mysqli_query($this -> Conn, $sql);
      return $res -> num_rows;
    }

    function GetUser($user) {
      $sql = "SELECT * FROM " . TBL_USER . " WHERE uid = '" . $user -> Uid . "'";
      $res = mysqli_query($this -> Conn, $sql);
      return $res;
    }


    // 分类
    function AddMenu($menu) {
      $sql = "INSERT INTO ".TBL_MENU." (name) VALUES('" . $menu -> Name . "')";
      $res = mysqli_query($this -> Conn, $sql);
      return $res;
    }

    function UpdateMenu($menu) {
      $sql = "UPDATE " . TBL_MENU .  " SET name = '" . $menu -> Name . "', ".
        " forbidden = ". $menu -> Forbidden . "," .
        " des = '" .  $menu -> Des . "'" .
        " WHERE id = ". $menu -> ID;
      $res = mysqli_query($this -> Conn, $sql);
      echo $sql;
      return $res;
    }

    function GetMenu($menu) {
      $sql = "SELECT * FROM ".TBL_MENU." WHERE id = " . $menu -> ID . "";
      $res = mysqli_query($this -> Conn, $sql);
      return $res;
    }

    function GetMenus($offset, $limit) {
      $sql = "SELECT * FROM ".TBL_MENU." limit $offset, $limit";
      $res = mysqli_query($this -> Conn, $sql);
      return $res;
    }

    function GetMenuCount() {
      $sql = "SELECT * FROM " . TBL_MENU ;
      $res = mysqli_query($this -> Conn, $sql);
      return $res -> num_rows;
    }


    // 文章
    function AddArticle($article) {
      $sql = "INSERT INTO ".TBL_ARTICLE." (title, creator_id, read_count, image, weight, content, source, menu, draft, forbidden) VALUES ".
          "('" . $article -> Title . "', '" . $article -> CreatorID . "'," . $article -> ReadCount . ",'" . $article -> Image . "'," .
          $article -> Weight . ",'" . $article -> Content . "', '" . $article -> Source . "', " .
          $article -> Menu . ", " . $article -> Draft . ", " . $article -> Forbidden . ")";
      $res = mysqli_query($this -> Conn, $sql);
      return $res;
    }

    function UpdateArticle($article) {
      $sql = "UPDATE " . TBL_ARTICLE .  " SET ".
        " title = '" . $article -> Title . "', ".
        " read_count = " . $article -> ReadCount . ", ".
        " image = '" . $article -> Image . "', ".
        " weight = " . $article -> Weight . ", ".
        " content = '" . $article -> Content . "', ".
        " source = '" . $article -> Source . "', ".
        " menu = " . $article -> Menu . ", ".
        " draft = " . $article -> Draft . ", ".
        " forbidden = " . $article -> Forbidden .
        " WHERE id = ". $article -> ID;
      $res = mysqli_query($this -> Conn, $sql);
      echo $sql;
      return $res;
    }

    function DelArticle($article) {
      $sql = "DELETE FROM " . TBL_ARTICLE . " WHERE id = '" . $article -> ID . "'";
      $res = mysqli_query($this -> Conn, $sql);
      return $res;
    }

    function GetArticle($article) {
      $sql = "SELECT * FROM " . TBL_ARTICLE . " WHERE id = " . $article -> ID . "";
      $res = mysqli_query($this -> Conn, $sql);
      return $res;
    }

    function GetArticles($offset, $limit) {
      $sql = "SELECT * FROM " . TBL_ARTICLE . " limit $offset, $limit";
      $res = mysqli_query($this -> Conn, $sql);
      return $res;
    }

    function GetArticleCount() {
      $sql = "SELECT * FROM " . TBL_ARTICLE ;
      $res = mysqli_query($this -> Conn, $sql);
      return $res -> num_rows;
    }


  }
