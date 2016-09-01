<?php
namespace Home\status;
/**
 * 错误时候的提示
 */
class error {

    //用户被锁定
    const USER_IS_LOCKER = 1;
    const USER_IS_LOCKER_MSG = '账号被锁定，请稍后再试!';


    //用户没有找到
    const USER_NOT_FOUND = 2;
    const USER_NOT_FOUND_MSG = '您输入的账号有误!';

    //账号密码不匹配
    const USER_PASSWORD_ERROR = 2;
    const USER_PASSWORD_ERROR_MSG = '您输入的密码有误!';


    //TOKEN不匹配
    const TOKEN_ERROR = 2;
    const TOKEN_ERROR_MSG = 'TOKEN不匹配!';

    //邮箱已存在

    const PARAM_MMEIAL = 2;
    const PARAM_MMEIAL_MSG = '该用户名已存在！';

//激活用户

    const LOCK_MMEIAL = 2;
    const LOCK_MMEIAL_MSG = '您的验证信息已过期！';
	
	//账号状态错误
	
	const USER_IS_LOCKERS = 3;
    const LOCK_MMEIAL_MSGS = '账号状态错误！';

}