<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
	
	public function admin_login(Request $request){
		if($request->isMethod('post')){
			Auth::guard('admin')->attempt(
			['email' => $request->email, 'password' => $request->password], $request->get('remember')
			);
			return redirect()->route('admin.dashboard');
		}
		return view('admin.login');
	}
}
