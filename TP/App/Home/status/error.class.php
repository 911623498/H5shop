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
//特卖商品列表
    const SPEC_MMEIAL = 2;
    const SPEC_MMEIAL_MSG = '当期没有热卖商品';
//商品列表
    const SHOW_MMEIAL = 2;
    const SHOW_MMEIAL_MSG = '当期没有上架商品';






//查询新品暂无数据
    const EMPTY_DATA = 1;
    const EMPTY_DATA_MSG = '暂无数据!';


//判断密码
    // 旧密码
    const ERROR_PWD = 1;
    const ERROE_CHECK_PWD = '您输入的旧密码有误';

    const ERROR_LEN = 1;
    const ERROE_PWD_STRLEN = '密码长度大于6位小于12位';


//分类
    const CATE_ERROR = 1;
    const CATE_ERROR_MSG = '成功获取数据';
}