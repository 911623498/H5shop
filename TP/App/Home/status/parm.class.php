<?php
namespace Home\status;
/**
 * 缺少参数的提示
 */
class parm {

    //用户名不能为空
    const USER_NAME_IS_NULL = 1;
    const USER_NAME_IS_NULL_MSG = '缺少参数:%s!';

    //密码不能为空
    const PASSWORD_IS_NULL = 1;
    const PASSWORD_IS_NULL_MSG = '参数错误:%s!';
    //用户不能为空
    const PARAM_MISS = 1;
    const PARAM_MISS_MSG = '用户名不能为空！';
    //用户不能为空
    const TYPE_MISS = 1;
    const TYPE_MISS_MSG = '分类不能为空！';

    //密码不能为空
    const PARAM_ERROR = 1;
    const PARAM_ERROR_MSG = '密码不能为空！';



    //用户id不能为空
    const USER_ERROR = 1;
    const USER_ERROR_MSG = '用户id不能为空！';

    //TOKEN不能为空
    const TOKEN_ERROR = 1;
    const TOKEN_ERROR_MSG = 'TOKEN不能为空！';


    //邮箱不能为空

    const PARAM_MMEIAL = 1;
    const PARAM_MMEIAL_MSG = '邮箱不能为空！';

    //类型

    const PARAM_USER = 1;
    const PARAM_USER_MSG = '请选择用类型！';


    //提醒我

    const TELLME_ADD = 1;
    const TELLME_ADD_MSG = '添加失败！';

    //提醒我删除

    const TELLME_DEL = 1;
    const TELLME_DEL_MSG = '删除失败！';


}