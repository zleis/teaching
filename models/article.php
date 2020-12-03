<?php
	class Article {
		var $id;	// 文章ID
		var $title; // 文章标题
		var $creatorID;// 文章作者
		var $readCount; // 阅读次数
		var $content;// 文章内容
		var $source; // 文章来源
		var $menu; // 文章类别
		var $createdAt; // 文章创建时间

	}

	function transModel($res) {
		$articles = array();
		while ($row = $res -> fetch_assoc()) {
			$artic = new Article;
			$artic -> id = $row['id'];
			$artic -> title = $row['title'] 
			$artic -> creatorID = $row['creator_id']
			$artic -> readCount = $row['read_count']
			$artic -> content = $row['content']
			$artic -> source = $row['source']
			$artic -> menu = $row['menu']
			$artic -> createdAt = $row['created_at']
			$articles.app
		}
	}



