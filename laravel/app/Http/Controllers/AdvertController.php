<?php
namespace App\Http\Controllers;

use Validator,DB,Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Input;
use App\Http\Models\Role_type;

class AdvertController extends Controller
{
	/**
	 * 广告管理
	 * @return [type] [description]
	 */
	public function advert()
	{
		return view('advert.advert');
	}

	/**
	 * 广告添加
	 * @return [type] [description]
	 */
	public function advertadd()
	{
		return view('advert.advertadd');
	}
}