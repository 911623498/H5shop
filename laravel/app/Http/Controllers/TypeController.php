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
	 * 职位分类
	 * @return [type] [description]
	 */
	public function type()
	{

        //echo 5655;die;
		return view('type.type');
	}
}