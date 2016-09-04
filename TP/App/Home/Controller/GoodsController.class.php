<?php
namespace Home\Controller;
use Think\Controller;
use Home\status\parm;
use Home\status\error;
use Home\status\success;


class GoodsController extends CommonController {
	public function goodsadd(){
		$goods_name= is_set($this -> _data , 'goods_name' );
		$pre_id= is_set($this -> _data , 'pre_id' );
		$type_id= is_set($this -> _data , 'type_id' );
		$shop_id= is_set($this -> _data , 'shop_id' );
		$goods_url= is_set($this -> _data , 'goods_url' );
		$goods_price= is_set($this -> _data , 'goods_price' );
		$goods_rebate= is_set($this -> _data , 'goods_rebate' );
		$goods_seckill= is_set($this -> _data , 'goods_seckill' );
		$add_time= is_set($this -> _data , 'add_time' );
		$end_time= is_set($this -> _data , 'end_time' );
		$goods_desc= is_set($this -> _data , 'goods_desc' );
		$goods_num= is_set($this -> _data , 'goods_num' );
		$is_hot= is_set($this -> _data , 'is_hot' );
		$is_show= is_set($this -> _data , 'is_show' );
		$goods_img= is_set($this -> _data , 'goods_img' );
		$data['goods_name']=$goods_name;
		$data['pre_id']=$pre_id;
		$data['type_id']=$type_id;
		$data['shop_id']=$shop_id;
		$data['goods_url']=$goods_url;
		$data['goods_price']=$goods_price;
		$data['goods_rebate']=$goods_rebate;
		$data['goods_seckill']=$goods_seckill;
		$data['add_time']=$add_time;
		$data['end_time']=$end_time;
		$data['goods_num']=$goods_num;
		$data['is_hot']=$is_hot;
		$data['is_show']=$is_show;
		$data['goods_img']=$goods_img;
		$data['goods_desc']=$goods_desc;
		$User = D("goods"); // 实例化User对象
    	$res=$User->add($data);
    	if($res){
    		return $this -> failure(success::SHTJ_SUCCESS ,success::SHTJ_SUCCESS_MSG );
    	}
	}
	public function goodslist(){
		   $page= is_set($this -> _data , 'page' );
	     $page_size=empty($_REQUEST['page_size']) ? 2 : $_REQUEST['page_size'];
        //echo $num;die;
        $type = M('goods');
        // 查询满足要求的总记录数
        $count      = $type->count();
        //每页显示条数
        $num=5;
        // 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page       = new \Think\Page($count,$num);
        // 分页显示输出
        $max_page=ceil($count/$num);
        //计算偏移量
        $limit=($page-1)*$num;
        $sql="select * from goods INNER JOIN prefecture on goods.pre_id = prefecture.pre_id INNER JOIN type_list on goods.type_id = type_list.type_id INNER JOIN shop on goods.shop_Id = shop.shop_id limit $limit,$num";
        
        $res['list']=$type->query($sql);
        $res['count']=$count;
        $res['num']=$num;
        $res['page']=$page;
        $res['max_page']=$max_page;
        if(!empty($res))
        {
            return $this -> success($res, success::PERLIST_SUCCESS ,success::PERLIST_SUCCESS_MSG );
		}
	}
}