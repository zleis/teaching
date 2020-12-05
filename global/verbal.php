<?php


  define('REQUST_SUCC', 10000); // 请求正确

  // 常用错误
  define('PARAM_LACK', 10100); // 参数不足
  define('PARAM_ERROR', 10101); // 参数错误
  define('PARAM_LACK_MSG', "参数不足"); // 参数不足
  define('PARAM_ERROR_MSG', "参数错误"); // 参数错误

  // 用户相关错误
  define("LOGIN_ERROR",  20100);	// 登录错误
  define("ACCOUNT_ERROR", 20101); // 账户错误
  define("UID_EXITED", 20200); // 账号已注册
  define("REGISTER_ERROR", 20201); // 账号注册失败
  define("WITHOUT_LOGIN",  20300); // 用户未登录
  define("NO_POWER", 20400); // 用户没权限
  define("LOGIN_ERROR_MSG",  "登录错误");	// 登录错误
  define("ACCOUNT_ERROR_MSG", "账户错误"); // 账户错误
  define("UID_EXITED_MSG", "账号已注册"); // 账号已注册
  define("REGISTER_ERROR_MSG", "账号注册失败"); // 账号注册失败
  define("WITHOUT_LOGIN_MSG",  "用户未登录"); // 用户未登录
  define("NO_POWER_MSG", "用户没权限"); // 用户没权限

  // 文章


  define('FEEDBACK_WITHOUT_LOGIN', '{"feedback":'.WITHOUT_LOGIN. ', "msg":"'.WITHOUT_LOGIN_MSG.'"}'); // 超时
  define('FEEDBACK_NO_POWER',  '{"feedback":'.NO_POWER. ', "msg":"'.NO_POWER_MSG.  '"}'); // 超时
  define('FEEDBACK_PARAM_LACK_ERROR',  '{"feedback":'.PARAM_LACK. ', "msg":"'.PARAM_LACK_MSG.  '"}'); // 参数错误
  define('FEEDBACK_PARAM_TYPE_ERROR',  '{"feedback":'.PARAM_ERROR.  ', "msg":"'.PARAM_ERROR_MSG. '"}'); // 参数错误


  define('LOGIN_SATUS', 1); // 登录状态
