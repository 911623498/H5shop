<?php
namespace Home\status;
/**
 * 成功时候的提示
 */
class success {

    //登录成功
    const LOGIN_SUCCESS = 0;
    const LOGIN_SUCCESS_MSG = '登录成功!';

    //邮箱验证通过

    const EMAIL_SUCCESS = 0;
    const EMAIL_SUCCESS_MSG = '账号注册成功,请到您的邮箱进行激活!';
    //激活成功
    const TEST_SUCCESS = 0;
    const TEST_SUCCESS_MSG = '账号激活成功!';
    //分页
    const PAGE_SUCCESS = 0;
    const PAGE_SUCCESS_MSG = '分页成功!';

    const TOKEN_SUCCESS = 0;
    const TOKEN_SUCCESS_MSG = '登录成功!';
	//修改密码
	const USER_PWD=0;
	const USER_PWD_MSG="密码正确！";


	//店铺添加成功
    const SHOP_SUCCESS = 0;
    const SHOP_SUCCESS_MSG = '店铺添加成功!';

    //店铺验证唯一成功
    const SHOP_WEIYI_SUCCESS = 0;
    const SHOP_WEIYI_SUCCESS_MSG = '店铺验证唯一成功!';

    //店铺删除成功
    const SHOP_DEL_SUCCESS = 0;
    const SHOP_DEL_SUCCESS_MSG = '店铺删除成功!';

    //分类添加成功
    const  TYPE_SUCCESS = 0;
    const  TYPE_SUCCESS_MSG = '分类添加成功!';


    //分类修改成功
    const  TYPE_UPD_SUCCESS = 0;
    const  TYPE_UPD_SUCCESS_MSG = '分类修改成功!';

}