<!DOCTYPE html>
<html>
<?php 
	require_once $_SERVER['DOCUMENT_ROOT']."/teaching/config.php";
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
	<title></title>

	<link rel="stylesheet" type="text/css" href="<?php echo CSS;?>login.css">
</head>
<body>
<div class="p-body-container" id="jp-bg" style="">
    <div class="p-body-bg-img p-bg" style=" width: 100%; height: 680px; margin-top: 100px; ">
        <div class="i-main">
            <div class="p-login-container" id="jp-login">
                <ul class="p-login-menu" id="jp-login-menu">
                    <li class="p-login-menu-item" data-type="1">
                        <a href="./login.php">登录</a>
                    </li>
                    <li class="p-login-menu-item on divide" data-type="1">
                        <a href="javascript:void(0);">注册</a>
                    </li>
                </ul>
                <form method="post" target="_self" action="https://wy.koolearn.com/login/accountLogin" class="jp-form form1" id="dataForm">
                    <input type="hidden" name="userType" id="jp-user-type" value="1">
                    <div class="p-show-error" id="inputErrorDiv">
                        <span class="p-error-msg"></span>
                    </div>
                    <div class="p-input-group p-login-username jp-input-group">
                        <input type="text" id="userName" name="userName" placeholder="请输入学号/工号">
                        <label class="p-error-icon p-gf-hide"></label>
                    </div>
                    <div class="p-input-group p-login-password jp-input-group">
                        <input type="password" id="password" name="password" placeholder="请输入密码">
                        <label class="p-error-icon p-gf-hide"></label>
                    </div>
                    <div class="p-input-group p-login-password jp-input-group">
                        <input type="password" id="password" name="password" placeholder="请确认密码">
                        <label class="p-error-icon p-gf-hide"></label>
                    </div>
                    <div class="p-login-btns p-login-mode-1" id="jp-mode">
                        <button class="p-form-submit-btn" type="button" id="submitButt">注册</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>