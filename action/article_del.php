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

  if (!PowerVerify("articleDel")) {
    die(GetDieError("NO_POWER"));
  }
  $db = new DBHandler;
  $aid = $_POST['aid'];
  $res = $db -> GetArticle($article);
  if ($res -> num_rows == 0) {
    die(GetDieError("ARTICLE_NOT_EXIT"));
  }

  $dbArticle = TransArticleModel($res);
  if ($dbArticle -> CreatorID != $_SESSION['uid']) {
    die(GetDieError("NO_POWER"));
  }

  $db -> DelArticle($dbArticle);
  die(GetDieError("REQUST_SUCC"));
