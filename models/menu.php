<?php
  /**
   *
   */
  class Menu
  {
    var $Mid;   // 分类ID
    var $Name;  // 分类名称
    var $Des;   // 分类描述
    var $Forbidden; // 分类是否可用
    var $CreatedAt; // 分类创建时间
    var $UpdatedAt; // 分类更新时间
    function __construct() {
			$this -> Forbidden = 0;
		}
  }

  function TransMenuModel($res) {
    $menus = array();
		$idx = 0;
		while ($row = $res -> fetch_assoc()) {
			$me = new Menu;
      $me -> Mid = $row['id'];
      $me -> Name = $row['name'];
      $me -> Des = $row['des'];
      $me -> Forbidden = $row['forbidden'];
      $me -> CreatedAt = $row['created_at'];
      $me -> UpdatedAt = $row['updated_at'];
			$menus[$idx] = $me;
      $idx = $idx + 1;
		}
    return $menus;
  }
