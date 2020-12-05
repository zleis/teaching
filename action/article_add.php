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

  if (!PowerVerify("articleAdd")) {
    die(GetDieError("NO_POWER"));
  }
  $aid = $_POST['aid'];
  $title = urldecode($_POST['title']);
  $readCount =  $_POST['read_count'];
  $weight =  $_POST['weight'];
	$content = urldecode($_POST['content']);
	$source = urldecode($_POST['source']);
	$menu = $_POST['menu'];
  $draft = $_POST['draft'];
  $forbidden = $_POST['forbidden'];

	if(!isset($menu) || !isset($type)){
    die(GetDieError("PARAM_LACK"));
  }
  
  $article = new Article;
  $article -> ID = $aid;
  $article -> Title = $title;
  $article -> ReadCount = $readCount;
  $article -> Weight = $weight;
  $article -> Content = $content;
  $article -> Source = $source;
  $article -> Menu = $menu;
  $article -> Draft = $draft;
  $article -> Forbidden = $forbidden;

  $db = new DBHandler;
  $res = $db -> GetArticle($article);
  if ($res -> num_rows > 0){
    $db -> updateArticle($article);
  } else {
    $article -> CreatorID = $_SESSION['uid'];
    $db -> AddArticle($article);
  }
  die(GetDieError("REQUST_SUCC"));
