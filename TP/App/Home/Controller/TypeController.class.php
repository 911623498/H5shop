<?php
namespace Home\Controller;
use Think\Controller;
use Home\status\parm;
use Home\status\error;
use Home\status\success;


class TypeController extends CommonController {
    public function type(){
        $data['table']= is_set($this -> _data , 'table' );
        /*
         *验证传参
         */
        if(empty($data['table']))
        {
            return $this -> failure( parm::PARAM_SHOP_NAME ,parm::PARAM_SHOP_NAME_MSG );
        }else
        {
            $type=M('type');
            $res=$type->query("select type_id,type_name from type_list where type_pid=0");
            if($res)
            {
                return $this -> success( $res,success::SHOP_SUCCESS ,success::SHOP_SUCCESS_MSG );
            }
        }
    }
    /*
     * 分类添加接口
     * */
    public function typeadd(){
        $data['type_name'] = is_set($this -> _data , 'type_name' );
        $data['type_img'] = is_set($this -> _data , 'type_img' );
        $data['type_pid'] = is_set($this -> _data , 'type_pid' );
        //var_dump($data);die;
        /*
         *验证传参
         */
        if(empty($data['type_name']))
        {
            return $this -> failure( parm::PARAM_TYPE_NAME ,parm::PARAM_TYPE_NAME_MSG );
        }elseif(empty($data['type_img']))
        {
            return $this -> failure( parm::PARAM_TYPE_IMG ,parm::PARAM_TYPE_IMG_MSG );
        }else{
            $type=M('type_list');
            $res=$type->add($data);
            if($res)
            {
                return $this -> success( success::TYPE_SUCCESS ,success::TYPE_SUCCESS_MSG );
            }
        }
    }
    /*
     * 分类列表
     * */
    public function typelist(){
        $page= is_set($this -> _data , 'page' );
        $search= is_set($this -> _data , 'search' );
        //echo $num;die;
        $type = M('type_list');
        // 查询满足要求的总记录数
        $count      = $type->where("type_name like '%$search%'")->count();
        //echo $count;die;
        //每页显示条数
        $num=10;
        // 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page       = new \Think\Page($count,$num);
        // 分页显示输出
        $max_page=ceil($count/$num);
        //计算偏移量
        $limit=($page-1)*$num;
        $res=$type->where("type_name like '%$search%'")->limit($limit,$num)->select();
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
    /*
     *分类删除接口
     **/
    public function typedels(){
        $type_id= is_set($this -> _data , 'type_id' );
        $shop = M('type_list');
        $res=$shop->query("delete from type_list where type_id='$type_id'");
        return $this -> success( success::SHOP_DEL_SUCCESS ,success::SHOP_DEL_SUCCESS_MSG );

    }
    /*
    *分类修改接口
    **/
    public function typeupd()
    {
        $type_id = is_set($this->_data, 'type_id');
        $type_pid = is_set($this->_data, 'type_pid');
        $type_name = is_set($this->_data, 'type_name');
        $type_img = is_set($this->_data, 'type_img');
        $shop = M('type_list');
        $res = $shop->query("update type_list set type_pid='$type_pid',type_name='$type_name',type_img='$type_img' where type_id='$type_id'");
        if ($res)
        {
            return $this -> success( success::TYPE_UPD_SUCCESS ,success::TYPE_UPD_SUCCESS_MSG );
        }else{
            return $this -> failure( parm::PARAM_TYPE_UPD ,parm::PARAM_TYPE_UPD_MSG );
        }

    }

}