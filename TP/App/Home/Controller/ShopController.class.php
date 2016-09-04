<?php
namespace Home\Controller;
use Think\Controller;
use Home\status\parm;
use Home\status\error;
use Home\status\success;


class ShopController extends CommonController {
    public function shopadd(){
        $data['shop_name'] = is_set($this -> _data , 'shop_name' );
        $data['shop_img'] = is_set($this -> _data , 'shop_img' );
        $data['shop_desc'] = is_set($this -> _data , 'shop_desc' );
        $data['shop_url'] = is_set($this -> _data , 'shop_url' );
        $data['shop_time']=date("Y-m-d H:i:s",time());
        /*
         *验证传参
         */
        if(empty($data['shop_name']))
        {
            return $this -> failure( parm::PARAM_SHOP_NAME ,parm::PARAM_SHOP_NAME_MSG );
        }elseif(empty($data['shop_img']))
        {
            return $this -> failure( parm::PARAM_SHOP_IMG ,parm::PARAM_SHOP_IMG_MSG );
        }elseif(empty($data['shop_desc']))
        {
            return $this -> failure( parm::PARAM_SHOP_DESC ,parm::PARAM_SHOP_DESC_MSG );
        }elseif(empty($data['shop_url']))
        {
            return $this -> failure( parm::PARAM_SHOP_URL ,parm::PARAM_SHOP_URL_MSG );
        }else{
            $shop=M('shop');
            $res=$shop->add($data);
            if($res)
            {
                return $this -> success( success::SHOP_SUCCESS ,success::SHOP_SUCCESS_MSG );
            }
        }
    }
    public function shoplist(){
        $page= is_set($this -> _data , 'page' );
        $search= is_set($this -> _data , 'search' );
        //echo $num;die;
        $shop = M('shop');
        //var_dump($shop);die;
        // 查询满足要求的总记录数
        $count      = $shop->where("shop_name like '%$search%'")->count();
        //echo $count;die;
        //每页显示条数
        $num=10;
        // 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page       = new \Think\Page($count,$num);
        // 分页显示输出
        $max_page=ceil($count/$num);
        //计算偏移量
        $limit=($page-1)*$num;
        $res=$shop->query("select * from shop where shop_name like '%$search%' order by  shop_id desc   limit $limit,$num ");
        //var_dump($res);die;
        $res['count']=$count;
        $res['num']=$num;
        $res['page']=$page;
        $res['max_page']=$max_page;
        //print_r($res);die;
        if(!empty($res))
        {
            return $this -> success($res, success::SHOP_SUCCESS ,success::SHOP_SUCCESS_MSG );

        }
    }
    public function shopweiyi(){
        $shop_name= is_set($this -> _data , 'shop_name' );
        $shop = M('shop');
        $res=$shop->query("select * from shop where shop_name='$shop_name'");
        if($res)
        {
            return $this -> failure( parm::PARAM_SHOP_WEIYI ,parm::PARAM_SHOP_WEIYI_MSG );
        }else
        {
            return $this -> success( success::SHOP_WEIYI_SUCCESS ,success::SHOP_WEIYI_SUCCESS_MSG );
        }



    }
    public function shopdels(){
        $shop_id= is_set($this -> _data , 'shop_id' );
        $shop = M('shop');
        $res=$shop->query("delete from shop where shop_id='$shop_id'");
        return $this -> success( success::SHOP_DEL_SUCCESS ,success::SHOP_DEL_SUCCESS_MSG );

    }

}