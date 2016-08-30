<?php
/**
 * Created by PhpStorm.
 * User: 远方
 * Date: 2016/7/15
 * Time: 20:49
 */

namespace Home\Controller;
use Think\Controller;
use Home\status\parm;
use Home\status\error;
use Home\status\success;

Class NewController extends CommonController
{

    public function new_type()
    {

        $tid = empty($this -> _data['type'])?1:$this -> _data['type'];
        $page = empty($this -> _data['page'])?1:$this -> _data['page'];
        $page_num = empty($this -> _data['page_num'])?3:$this -> _data['page_num'];
        $type_arr = M('type')->select();
        $Model = M('new')->join('type ON new.t_id = type.t_id')->where(['type.t_id'=>$tid])->select();
        $num=count($Model);
        $limit=($page-1)*$page_num;
        $arr= M('new')->join('type ON new.t_id = type.t_id')->where(['type.t_id'=>$tid])->limit($limit,$page_num)->select();
       //print_r($type_arr);die;
        $last_page = ceil($num /$page_num);
        $up_page = $page - 1 > 1 ? $page - 1 : 1;
        $next_page = $page + 1 < $last_page ? $page + 1 : $last_page;
        //$str = "<button type='button' class='btn btn-success'  onclick='page_data($page,$tid)'>**加载更多**</button>";
        $arr['page'] = 0;
        $arr['type'] = $type_arr;
        $arr['tid']=$tid;

        return  $this -> success($arr,success::PAGE_SUCCESS_MSG,success::PAGE_SUCCESS);
    }




    public function new_list()
    {

        $page = empty($this -> _data['page'])?1:$this -> _data['page'];
        $page_num = empty($this -> _data['page_num'])?3:$this -> _data['page_num'];
        $tid = empty($this -> _data['tid'])?1:$this -> _data['tid'];
       // echo $num;die;
        $Model = M('new')->join('type ON new.t_id = type.t_id')->where(['type.t_id'=>$tid])->select();
        $num=count($Model);
       // $limit=($page+$page_num);
       // $last_page = ceil($num /$page_num);
        $limit = $page + $page_num > $num ? $num: $page + $page_num ;
        $arr= M('new')->join('type ON new.t_id = type.t_id')->where(['type.t_id'=>$tid])->limit($limit,$page_num)->select();
        //print_r($arr);die;
        $arr['page'] =$limit;
        $arr['tid']=$tid;
        $arr['after']=$num;


        return  $this -> success($arr,success::PAGE_SUCCESS_MSG,success::PAGE_SUCCESS);

    }

}
?>