<?php
namespace App\Http\Controllers;

use Validator,DB,Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Input;
use App\Http\Models\Role_type;

class ShopController extends Controller
{
	/**
	 * 店铺列表
	 * [add description]
	 */
	public function shoplist()
	{
		return view('shop.list');
	}
    public function shopadd()
    {
        return view('shop.shopadd');
    }
}
