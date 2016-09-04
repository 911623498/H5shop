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

    //品牌添加
    const PINPAI_SUCCESS = 0;
    const PINPAI_SUCCESS_MSG = '添加成功!';

    //品牌列表
    const PERLIST_SUCCESS = 0;
    const PERLIST_SUCCESS_MSG = '列表成功!';
    //品牌删除
    const PERDEL_SUCCESS = 1;
    const PERDEL_SUCCESS_MSG = '品牌删除成功!';

    //品牌删除
    const SHTJ_SUCCESS = 1;
    const SHTJ_SUCCESS_MSG = '商品添加成功!';
    //品牌删除
    const LBFY_SUCCESS = 1;
    const LBFY_SUCCESS_MSG = '分页成功!';
}