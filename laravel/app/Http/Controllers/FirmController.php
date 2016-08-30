<?php
namespace App\Http\Controllers;

use Validator,DB,Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Input;
use App\Http\Models\Role_type;

class FirmController extends Controller
{
	/**
	 * 公司列表
	 * [add description]
	 */
	public function liebiao()
	{
		return view('firm.list');
	}
}
