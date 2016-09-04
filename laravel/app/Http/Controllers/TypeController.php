<?php
namespace App\Http\Controllers;

use Validator,DB,Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Input;
use App\Http\Models\Role_type;

class TypeController extends Controller
{
	/**
	 * 分类管理
	 * @return [type] [description]
	 */
	public function typeadd()
	{
        $url="http://www.aaa.net/TP/index.php/Home/Type/type";
        @$data['table']=$_REQUEST['table']?$_REQUEST['table']:'type_list';
        $arr=$this->curl_post($url,$data);
        $res=json_decode($arr,true);
        $re=$res['data'];
        //var_dump($re);die;
        return view('type.typeadd',['re'=>$re]);
	}
    public function typelist()
    {
        return view('type.typelist');
    }
    /*
     * 分类列表
     * */
    public function typelists()
    {
        $url="www.aaa.net/TP/index.php/Home/Type/typelist";
        @$data['page']=$_REQUEST['page']?$_REQUEST['page']:1;
        @$data['search']=$_REQUEST['search']?$_REQUEST['search']:"";
        $json=$this->curl_post($url,$data);
        //echo $json;
        //var_dump($arr);die;
        $res=json_decode($json,true);
        $new_arr['count']=$res['data']['count'];
        $new_arr['num']=$res['data']['num'];
        $new_arr['page']=$res['data']['page'];
        $new_arr['max_page']=$res['data']['max_page'];
        unset($res['data']['count']);
        unset($res['data']['num']);
        unset($res['data']['page']);
        unset($res['data']['max_page']);
        $new_arr['data'] = $res['data'];
        echo json_encode($new_arr);

    }
    /*
     * 分类添加
     * */
    public function typetianjia( Request $request)
    {
        //接值
        $data['type_name']=$request->input('type_name');
        $data['type_pid']=$request->input('type_pid');
        //$data['type_img']=$request->input('type_img');
        $file =$request->file('type_img');
        if($file -> isValid()){
            $data['type_img'] = $file -> getClientOriginalName();
            $entension = $file -> getClientOriginalExtension();
            $newName = md5(date('ymdhis').$data['type_img']).'.'.$entension;
            $path = $file -> move('Type/uploads',$newName);
        }
        $data['type_img']=$newName;
        //var_dump($data);die;
        $url="http://www.aaa.net/TP/index.php/Home/Type/typeadd";
        $arr=$this->curl_post($url,$data);
        $res=json_decode($arr,true);
        if($res['status']==0)
        {
            echo "<script>alert('添加成功');location.href='typeadd'</script>";
        }else
        {
            echo "<script>alert('添加失败');</script>";
        }
    }
    /*
     * 删除分类
     * */
    public function typedels(Request $request)
    {
        //接值
        $data['type_id']=$request->input('type_id');
        $url="www.aaa.net/TP/index.php/Home/Type/typedels";
        $arr=$this->curl_post($url,$data);
        $res=json_decode($arr);
        //var_dump($res);die;
        if($res->status==0)
        {
            echo 0;
        }else{
            echo 1;
        }

    }
    /*
     * 修改分类
     * */
    public function typeupd(Request $request)
    {
        $url="http://www.aaa.net/TP/index.php/Home/Type/type";
        @$data['table']=$_REQUEST['table']?$_REQUEST['table']:'type_list';
        $data['type_id']=$_REQUEST['type_id'];
        $arr=$this->curl_post($url,$data);
        $res=json_decode($arr,true);
        $re=$res['data'];
        return view('type.typeupd',['re'=>$re,'type_id'=>$data['type_id']]);
    }
    /*
     * 修改分类
     * */
    public function typeupds(Request $request)
    {
        //接值
        $data['type_name']=$request->input('type_name');
        $data['type_pid']=$request->input('type_pid');
        $data['type_id']=$request->input('type_id');
        //$data['type_img']=$request->input('type_img');
        $file =$request->file('type_img');
        if($file -> isValid()){
            $data['type_img'] = $file -> getClientOriginalName();
            $path = $file -> move('Type/uploads',$data['type_img']);
        }
        //var_dump($data);die;
        $url="http://www.aaa.net/TP/index.php/Home/Type/typeupd";
        $arr=$this->curl_post($url,$data);
        $res=json_decode($arr,true);
        if($res['status']==0)
        {
            echo "<script>alert('修改成功');location.href='typelist'</script>";
        }else
        {
            echo "<script>alert('修改失败');</script>";
        }
    }
    public function curl_post($uri,$data)
    {
        $ch = curl_init();
        curl_setopt ( $ch, CURLOPT_URL, $uri );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
        $return = curl_exec ( $ch );
        curl_close ( $ch );
        return $return;
    }
}