<?php
namespace App\Http\Controllers;

use Validator,DB,Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Input;
use App\Http\Models\Role_type;

class SearchController extends Controller
{
	/**
	 * 热词搜索
	 * @return [type] [description]
	 */
	public function search()
	{
		return view('search.search');
	}
}