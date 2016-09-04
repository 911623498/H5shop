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
		return view('brand.brandlist');
	}
    /**
     * 品牌添加
     * @return [type] [description]
     */
    public function  brandadd()
    {
        return view('brand.brandadd');
    }
}