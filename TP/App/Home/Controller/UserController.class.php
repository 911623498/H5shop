<?php
namespace Home\Controller;
use Think\Controller;
use Home\status\parm;
use Home\status\error;
use Home\status\success;

Class UserController extends CommonController
{

    public function user_list()
    {

        $page = empty($this -> _data['page'])?1:$this -> _data['page'];
        $page_num = empty($this -> _data['page_num'])?5:$this -> _data['page_num'];
        $Model = M('z_firm');
        $re=$Model->join('z_position ON z_firm.u_id = z_position.u_id')->select();
        //print_r($re);die;
        $num=count($re);
        //echo $num;die;
        $limit=($page-1)*$page_num;
        $Model = M('z_firm');
        $arr=$Model->join('z_position ON z_firm.u_id = z_position.u_id')->limit($limit,$page_num)->select();
        //print_r($arr);die;
        $last_page = ceil($num /$page_num);

        $next_page = $page + 1 >$last_page ?$last_page : $page + 1;
//        $str = " <button type='button' class='btn btn-success'  onclick='page_data(1)'>首页</button>";
//        $str .= " <button type='button' class='btn btn-success'  onclick='page_data(".$up_page.")'>上一页</button>";
//        $str .= " <button type='button' class='btn btn-success'  onclick='page_data(".$next_page.")'>下一页</button>";
//        $str .=" <button type='button' class='btn btn-success'  onclick='page_data(".$last_page.")'>尾页</button>";
        $arr['page'] = $next_page;
        $arr['page_num'] = $last_page;
        return  $this -> success($arr,success::PAGE_SUCCESS_MSG,success::PAGE_SUCCESS);
    }

//查询用户是否登陆
    public function test_user()
    {
        $user_id = is_set($this -> _data , 'uid' );
        $token= is_set($this -> _data , 'token' );
        $type= is_set($this -> _data , 'type' );
        //echo $token;die;
        $arr2=array(

            'res'=>'0'
        );
        if (empty($user_id)) {
            return $this -> failure( parm::USER_ERROR ,parm::USER_ERROR_MSG,$arr2 );
        }

        if (empty($token)) {
            return $this -> failure( parm::TOKEN_ERROR ,parm::TOKEN_ERROR_MSG,$arr2);
        }
        $user_model = M('add_type');
        $where = array(
            'u_id' => $user_id,
            'type'=>$type
        );

        //查询用户是否登陆
        $user_info = $user_model->where($where)->find();
        //print_r($user_info);die;

        if($user_info['token']==$token)
        {
            $arr=array(
                'res'=>'1'
            );

            return  $this -> success($arr,success::TOKEN_SUCCESS_MSG,success::TOKEN_SUCCESS);

        }
        else
        {

            return  $this -> failure(error::TOKEN_ERROR, error::TOKEN_ERROR_MSG,$arr2);
        }

    }

}
?>