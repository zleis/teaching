<?php
	class Article {
		var $ID;	// 文章ID
		var $Title; // 文章标题
		var $CreatorID;// 文章作者
		var $ReadCount; // 阅读次数
		var $Image;	// 封面图
		var $Weight; // 文章权重
		var $Content;// 文章内容
		var $Source; // 文章来源
		var $Menu; // 文章类别
		var $Draft;	// 是否可见
		var $Forbidden; // 是否可见
		var $CreatedAt; // 文章创建时间
		var $UpdatedAt;
	}

	function TransArticleModel($res) {
		$articles = array();
		while ($row = $res -> fetch_assoc()) {
			$artic = new Article;
			$artic -> ID = $row['id'];
			$artic -> Title = $row['title'];
			$artic -> CreatorID = $row['creator_id'];
			$artic -> ReadCount = $row['read_count'];
			$artic -> Image = $row['iamge'];
			$artic -> Weight = $row['weight'];
			$artic -> Content = $row['content'];
			$artic -> Source = $row['source'];
			$artic -> Menu = $row['menu'];
			$artic -> Draft = $row['draft'];
			$artic -> Forbidden = $row['forbidden'];
			$artic -> CreatedAt = $row['created_at'];
			$artic -> UpdatedAt = $row['updated_at'];
			$articles[$idx] = $artic;
      $idx = $idx + 1;
		}
		return $articles;
	}
