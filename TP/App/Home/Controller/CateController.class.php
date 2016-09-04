<?php
/**
 * Created by PhpStorm.
 * User: yao
 * Date: 2016/8/30
 * Time: 19:36
 */

namespace Home\Controller;
use Think\Controller;
use Home\status\parm;
use Home\status\error;
use Home\status\success;

class CateController  extends CommonController{

    /**
     * 查询分类的数据
     */
    public function index(){
        //查询父级分类
        $type = M("type_list"); // 实例化User对象
        // 查找type_pid值为0的分类数据
        $data = $type->select();
        if($data){
            return  $this -> success($data,success::CATE_SUCCESS_MSG,success::CATE_SUCCESS);
        }else{
            return  $this -> success($data,success::CATE_SUCCESS_MSG,success::CATE_SUCCESS);
        }
    }
    /**
     * 根据分类的id查询商品
     */
    public function show(){
        //分类id不能为空
        $type_id= is_set($this -> _data , 'type_id' );
        //当前页
        $page= is_set($this -> _data , 'page' )?is_set($this -> _data , 'page' ):1;
        //每页显示条数
        $pageNum= is_set($this -> _data , 'pageNum' )?is_set($this -> _data , 'pageNum' ):5;
        if (empty($type_id)) {
            return $this -> failure( parm::TYPE_MISS ,parm::TYPE_MISS_MSG );
        }
        //查询商品
        $goods = M("goods");
        $cou = $goods->where('type_id = '.$type_id)->select();
        $count=count($cou);
        //总页数
        $sum=ceil($count/$pageNum);
        //偏移量
        $limit=($page-1)*$pageNum;
        //print_r($cou);die;
        //显示数据
        $list= $goods->where('type_id = '.$type_id)->limit($limit,$pageNum)->select();
        //print_r($list);die;
        $data['list']=$list;
        $data['sum']=$sum;
        $data['page']=$page+1;
        return  $this -> success($data,success::CATE_SUCCESS_MSG,success::CATE_SUCCESS);
    }
    /**
     * 根据分类的id查询商品
     */
    public function search(){
        $search= is_set($this -> _data , 'sh' );
        //当前页
        $page= is_set($this -> _data , 'page' )?is_set($this -> _data , 'page' ):1;
        //每页显示条数
        $pageNum= is_set($this -> _data , 'pageNum' )?is_set($this -> _data , 'pageNum' ):5;
        //查询商品
        $goods = M("goods");
        $map['goods_name'] = array('like',"$search%");
        $cou = $goods->where($map)->select();
        $count=count($cou);
        //总页数
        $sum=ceil($count/$pageNum);
        //偏移量
        $limit=($page-1)*$pageNum;
        //print_r($cou);die;
        //显示数据
        $list= $goods->where($map)->limit($limit,$pageNum)->select();
        //print_r($list);die;
        $data['list']=$list;
        $data['sum']=$sum;
        $data['page']=$page+1;
        return  $this -> success($data,success::CATE_SUCCESS_MSG,success::CATE_SUCCESS);
    }
}
//根据父类得到子类
