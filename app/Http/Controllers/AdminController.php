<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();
class AdminController extends Controller
{
    public function index() {
        return view('adminlogin');
    }

    public function show_dashboard() {
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
      if($result){
            Session::put('admin_name', $result->admin_name);
            Session::put('id', $request->id);
            return Redirect::to('/dashboard');
      }else{
            Session::put('message', 'Mật khẩu hoặc tài khoản không chính xác');
            return Redirect::to('/admin');
      }
    }
    public function logout()
    {
        Session::put('admin_name',null);
        Session::put('id',null);
        return Redirect::to('/admin');
    }
}