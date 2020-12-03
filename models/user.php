<?php

	class User {
		var $Uid;	// 用户ID
		var $Pass;  // 用户密码
		var $Name;  // 用户名
		var $Level; // 用户权限
		var $Forbidden; // 用户是否可用
		var $CreatedAt; // 用户创建时间
		var $UpdatedAt; // 用户更新时间

		function __construct() {
			$this -> Forbidden = 0;
		}
	}

	function transUserModel($res) {
		$users = array();
		$idx = 0;
		while ($row = $res -> fetch_assoc()) {
			$u = new User;
      $u -> Uid = $row['uid'];
			$u -> Name = $row['name'];
			$u -> Pass = $row['pass'];
			$u -> Level = $row['level'];
			$u -> Forbidden = $row['forbidden'];
			$u -> CreatedAt = $row['created_at'];
			$u -> UpdatedAt = $row['updated_at'];
			$users[$idx] = $u;
			$idx = $idx + 1;
		}
    return $users;
	}
