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

    //密码不能为空
    const PARAM_ERROR = 1;
    const PARAM_ERROR_MSG = '密码不能为空！';

    //密码不能为空
    const DETAIL_ERROR = 1;
    const DETAIL_ERROR_MSG = '商品ID不能为空！';

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
	//修改密码
	const USER_PWD=1;
	const USER_PWD_MSG="密码不正确！";

	//类型

    const PARAM_USER = 1;
    const PARAM_USER_MSG = '请选择用类型！';


    //店铺名称
    const PARAM_SHOP_NAME = 1;
    const PARAM_SHOP_NAME_MSG = '店铺名称不能为空！';

    //店铺logo
    const PARAM_SHOP_LOGO = 1;
    const PARAM_SHOP_LOGO_MSG = '店铺logo不能为空！';


    //店铺描述
    const PARAM_SHOP_DESC = 1;
    const PARAM_SHOP_DESC_MSG = '店铺描述不能为空！';


    //店铺url
    const PARAM_SHOP_URL = 1;
    const PARAM_SHOP_URL_MSG = '店铺url不能为空！';

    //店铺唯一
    const PARAM_SHOP_WEIYI = 1;
    const PARAM_SHOP_WEIYI_MSG = '店铺已存在！';

    //店铺删除失败
    const PARAM_SHOP_DEL= 1;
    const PARAM_SHOP_DEL_MSG = '店铺删除失败！';

    //分类名称
    const PARAM_TYPE_NAME = 1;
    const PARAM_TYPE_NAME_MSG = '分类名称不能为空！';

    //分类logo
    const PARAM_TYPE_IMG  = 1;
    const PARAM_TYPE_IMG_MSG = '分类logo不能为空！';

    //分类修改失败
    const PARAM_TYPE_UPD= 1;
    const PARAM_TYPE_UPD_MSG = '分类修改失败！';

}