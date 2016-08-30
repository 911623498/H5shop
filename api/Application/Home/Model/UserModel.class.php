<?php
/**
 * Created by PhpStorm.
 * User: 远方
 * Date: 2016/7/12
 * Time: 20:21
 */
namespace Home\Model;
use Think\Model;
class CategoryModel extends Model
{

    protected $tableName = 'z_user';

    function se_login($data)
    {
        $num['u_name']=$data['username'];
        $re=M($this->tableName);
        $reg=$re->where($num)->find();
        return $reg;
    }


}