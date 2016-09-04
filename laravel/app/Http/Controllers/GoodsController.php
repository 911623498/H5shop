<?php
namespace App\Http\Controllers;

use Validator,DB,Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Input;
use App\Http\Models\Role_type;

class GoodsController extends Controller
{
	/**
	 * 商品列表
	 * @return [type] [description]
	 */
	public function goodslist()
	{
		return view('goods.goodslist');
	}

	/**
	 * 商品添加
	 * @return [type] [description]
	 */
	public function goodsadd()
	{
		return view('goods.goodsadd');
	}
}