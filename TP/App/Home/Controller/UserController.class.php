<?php
namespace Home\Controller;
use Think\Controller;
use Home\status\parm;
use Home\status\error;
use Home\status\success;

Class UserController extends CommonController
{
  public function user(){
		$page = is_set($this -> _data , 'pageNum' );
		$sou = is_set($this -> _data , 'sou' );
		//$page = intval($_POST['pageNum']);
		//echo json_encode($page);
		$User=M("users");
		if($sou){
			$result= $User->where("user_name='$sou'")->getField('user_id',true);
		//$result = mysql_query("select id from users");
		$total = count($result);//总记录数
		}else{
			$result= $User->getField('user_id',true);
		//$result = mysql_query("select id from users");
		$total = count($result);//总记录数
		}
		

		$pageSize = 6; //每页显示数
		$totalPage = ceil($total/$pageSize); //总页数

		$startPage = $page*$pageSize;
		$arr['total'] = $total;
		$arr['pageSize'] = $pageSize;
		$arr['totalPage'] = $totalPage;
		if($sou){
			$query=$User->where("user_name='$sou'")->order(' user_id asc')->limit($startPage,$pageSize)->select();
		}else{
			$query=$User->order(' user_id asc')->limit($startPage,$pageSize)->select();
		}
		
		//$query = mysql_query("select * from users order by id asc limit $startPage,$pageSize");
		foreach($query as $k=>$v){
			$arr['list'][] = array(
				'user_id' => $v['user_id'],
				'user_name' => $v['user_name'],
			 );
		}
		/* while($row=mysql_fetch_array($query)){
			 $arr['list'][] = array(
				'id' => $row['id'],
				'title' => $row['title'],
				'pic' => $row['pic'],
			 );
		} */
		//print_r($arr);
		echo json_encode($arr);
		
		//echo json_encode( $pageNum );
  }
}
?>