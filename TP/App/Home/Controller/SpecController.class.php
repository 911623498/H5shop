<?php
namespace Home\Controller;
use Think\Controller;
use Home\status\parm;
use Home\status\error;
use Home\status\success;


Class SpecController extends CommonController
{

    /*
     * 特价商品列表
     *
     * */

    function special()
    {
        $goods_one = M('goods')->where('is_hot=1 and is_show=2')->select();
        $goods_two = M('goods')->where('is_show=1')->select();
       // print_r($goods_two);
//        if(empty($goods_one))
//        {
//            return  $this -> failure(error::SPEC_MMEIAL_MSG,error::SPEC_MMEIAL);
//        }
//
//        if(empty($goods_two))
//        {
//            return  $this -> failure(error::SHOW_MMEIAL_MSG,error::SHOW_MMEIAL);
//        }

        $data['one']=$goods_one;
        $data['two']=$goods_two;
        return  $this -> success($data,success::SPEC_SUCCESS_MSG,success::SPEC_SUCCESS);
    }

    /*
     *商品详情
     *
     * */
    function detail()
    {
        $id = is_set($this -> _data , 'id' );
        if (empty($id)) {

            return $this -> failure( parm::DETAIL_ERROR ,parm::DETAIL_ERROR_MSG );
        }

        $goods= M('goods')->where('goods_id='.$id)->select();
       // print_r($goods);
        return  $this -> success($goods,success::SPEC_SUCCESS_MSG,success::SPEC_SUCCESS);

    }

    /*
     * 预订商品
     *
     * */
    public function reds()
    {

        $goods = M('goods')->where('is_show=1')->select();
        return  $this -> success($goods,success::SPEC_SUCCESS_MSG,success::SPEC_SUCCESS);
       //print_r($goods);
    }

    /*
     * 添加预订商品
     * */

    public function add_shop()
    {
        $u_name = is_set($this -> _data,'u_name');
        $areas = is_set($this -> _data,'areas');
        $moneys = is_set($this -> _data,'moneys');
        $goods_id = is_set($this -> _data,'goods_id');
        $new_money = is_set($this -> _data,'new_money');
        $poss = is_set($this -> _data,'poss');
        $phones = is_set($this -> _data,'phones');
        $user_id = is_set($this -> _data,'user_id');
        $User = M("reds"); //实例化User对象
        $data['user_id'] = $user_id;
        $data['goods_id'] = $goods_id ;
        $data['u_name'] = $u_name ;
        $data['phones'] = $phones ;
        $data['moneys'] = $moneys ;
        $data['poss'] = $poss ;
        $data['areas'] = $areas ;
        $data['new_money'] = $new_money ;
        $res=$User->add($data);

       if($res)
       {

           return  $this -> success(success::SPEC_SUCCESS_MSG,success::SPEC_SUCCESS);
       }

    }

    public function shop_list()
    {
        $uid = is_set($this -> _data,'user_id');
        $Model = M('reds');
        $res= $Model->join('goods ON reds.goods_id = goods.goods_id')->where('user_id='.$uid)->select();

        return  $this -> success($res,success::SPEC_SUCCESS_MSG,success::SPEC_SUCCESS);
    }

    public function seckill()
    {
        $id = is_set($this -> _data,'id');
        $Model = M('goods');
        $res= $Model->where('goods_id='.$id)->find();


    }

    public function shop()
    {

        $id = is_set($this -> _data,'id');
        $Model = M('goods');
        $res=  M('shop')->where('shop_id='.$id)->find();
        $data['shop']=$res['shop_name'];
        $res2= $Model->where('shop_id='.$id ." and is_show=2")->select();
        $data['goods']=$res2;
        return  $this -> success($data,success::SPEC_SUCCESS_MSG,success::SPEC_SUCCESS);


    }

}