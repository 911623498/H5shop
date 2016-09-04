<?php
namespace App\Http\Controllers;

use Validator,DB,Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Input;
use App\Http\Models\Role_type;


class BrandController extends Controller
{
	/**
	 * 品牌列表
	 * @return [type] [description]
	 */
	public function  brandlist()
	{
        @$data['page']=$_REQUEST['page']?$_REQUEST['page']:1;
        if($data['page'] == 0){
            $data['page'] = 1;
        }
        $url="http://www.aaa.net/TP/index.php/Home/Per/perlist";
        $arr=$this->curl_post($url,$data);
        $res=json_decode($arr,true);
        $last=$res['data']['page']-1<1?1:$res['data']['page']-1;
        $next=$res['data']['page']+1>$res['data']['max_page']?$res['data']['max_page']:$res['data']['page']+1;

        $res['str']="<a href='brandlist?page=1'>首页</a>";
        $res['str'].="<a href='brandlist?page=".$last."'>上一页</a>";
        $res['str'].="<a href='brandlist?page=".$next."'>下一页</a>";
        $res['str'].="<a href='brandlist?page=".$res['data']['max_page']."'>尾页</a>";

		return view('brand.brandlist',['res'=>$res]);
	}
    /**
     * 品牌添加
     * @return [type] [description]
     */
    public function  brandadd()
    {

        return view('brand.brandadd');
    }
    /**
     * 品牌添加
     */
    public function add_data(){
        $pre_name=$_POST['pre_name'];
        $files=$_FILES['pre_img'];

        //图片的保存路径
        $path="img/prefecture/";
        $path=$path.$files['name'];
        $tmp_name=$files['tmp_name'];
        $data['img_name']=$files['name'];

        $data['pre_name']=$pre_name;
        $url="http://www.aaa.net/TP/index.php/Home/Per/peradd";
        $tool=move_uploaded_file($tmp_name,$path);
        if($tool){
            $arr=$this->curl_post($url,$data);
            $res=json_decode($arr,true);
            if($res['status'] == 0){
                echo "<script>alert('添加成功');location.href='brandlist'</script>";
            }
        }

    }
    //验证唯一
    public function yz(){
        $name= $_POST['pre_name'];
        $sql="select pre_name from prefecture";
        $users=DB::select($sql);

        $rea_name="";
        foreach ($users as $k => $v) {
            foreach ($v as $kk => $vv) {
                $rea_name[$k] = $vv;
            }
        }

        if(in_array($name,$rea_name)){
            echo 1;
        }else{
            echo 0;
        }
    }
    //删除
    public function predel(){
        $id=$_POST['id'];
        $data['id']=$id;
        $url="http://www.aaa.net/TP/index.php/Home/Per/perdel";
        $arr=$this->curl_post($url,$data);
        $res=json_decode($arr,true);

        if($res['status'] == 0){
            echo 0;
        }else{
            echo 1;
        }
    }
    //CURL
    public function curl_post($url,$data)
    {
        $ch = curl_init();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS,$data);
        $return = curl_exec ( $ch );
        curl_close ( $ch );
        return $return;
    }
}