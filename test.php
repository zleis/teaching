<?php

  require_once "./config.php";
  require_once DIR_SQL."db_handler.php";
  require_once DIR_MODELS."user.php";
  require_once DIR_MODELS."menu.php";
  require_once DIR_GLOBAL."func.php";

  var_dump(GetDieError("REQUST_SUCC"));
  var_dump(GetDieError("REQUST_SUCC11"));
  // $db = new DBHandler;
  // // 测试用户
  // $user = new User;
  // $user -> Uid = "12234";
  // $user -> Pass = "123";
  // $user -> Name = "张磊";
  // $user -> Level = 10;
  // // 注册用户
  // $db -> AddUser($user);
  // echo "<br>";
  //
  // // 获取用户
  // $us = $db -> GetUser($user);
  // $users = transUserModel($us);
  // var_dump($users);
  //
  // // 更新用户
  // echo "<br>";
  // $user -> Name = "张磊1103";
  // $user -> Level = 1003;
  // $db -> UpdateUser($user);
  //
  // echo "<br>";
  // // 获取用户列表
  // $us1 = $db -> GetUsers(0, 10);
  // $users1 = transUserModel($us1);
  // var_dump($users1);
  //
  // echo "<br>";
  // // 用户数目
  // var_dump($db -> GetUserCount());

  // 删除用户
  // $db -> DelUser($user);
  //
  // $menu = new Menu;
  // $menu -> Name = "课件1";
  // // var_dump($menu);
  // // echo $db -> AddMenu($menu);
  // $menu -> ID = 1;
  // $menu -> Des = "描述1";
  // $db -> UpdateMenu($menu);
  //
  // $menusql = $db -> GetMenus(0, 10);
  // $menus = transMenuModel($menusql);
  // var_dump($menus);
  //
  // echo "<br>";
  // $msql = $db -> GetMenu($menu);
  // $m = transMenuModel($msql);
  // var_dump($m);

  // echo $db -> GetMenuCount();
  //
  // $article = new Article;
  // $article -> Title = "文章标题";
  // $article -> Content = "asdfasdfasdf";
  // $article -> CreatorID = "asdfasdf";
  // $article -> ID = 1;
  // $article -> ReadCount = 10;
  // $article -> Image = "asdfasdfasasdfasdfasdfasdfasdfasdfsda";
  // // $db -> UpdateArticle($article);
  // $res = $db -> GetArticle($article);
  // var_dump(transArticleModel($res));
  // echo $db -> GetArticleCount();
  // // $db -> AddArticle($article);
