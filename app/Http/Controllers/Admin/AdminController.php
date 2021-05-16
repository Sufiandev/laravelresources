<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class AdminController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $settings = DB::table('settings')->find(1);

        $data = [
            'menu'  => 'dashboard',
            'settings'  => $settings
        ];
        
        return view('admin.dashboard',$data);
    }
    public function cms_user()
    {
        $data = [
            'menu'  => 'cms_user',
            'settings'  => DB::table('settings')->find(1),
            'data'  => DB::table('admins')->get()
        ];
        return view('admin.cms_user',$data);
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->guest(route( 'admin.login' ));

    }
}
