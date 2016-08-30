<?php
namespace App\Http\Controllers;

use Validator,DB,Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Input;
use App\Http\Models\Role_type;

class SystemController extends Controller
{
	/**
	 * 修改密码
	 * @return [type] [description]
	 */
	public function changepwd()
	{
		return view('system.changepwd');
	}
}