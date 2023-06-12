<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Login;
use Laravel\Socialite\Facades\Socialite;

use App\Models\Social;
session_start();
class AdminController extends Controller
{
    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
          return Redirect::to('admin');
        }
    }
    public function index() {
        return view('adminlogin');
    }

    public function show_dashboard() {
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
        $data = $request->all();
        $admin_email = $data['admin_email'];
        $admin_password =md5 ($data['admin_password']);
        $login = Login::Where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        $login_count = $login->count();
        // $admin_email = $request->admin_email;
        // $admin_password = md5($request->admin_password);

        // $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
      if($login_count){
            Session::put('admin_name', $login->admin_name);
            Session::put('admin_id', $login->admin_id);
            return Redirect::to('/dashboard');
      }else{
            Session::put('message', 'Mật khẩu hoặc tài khoản không chính xác');
            return Redirect::to('/admin');
      }
    }
    public function logout()
    {
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('id',null);
        return Redirect::to('/admin');
    }
    //login fb
    public function login_facebook () {
        return Socialite::driver('facebook')->stateless()->redirect();
    }
    public function callback_facebook()
    {
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider', 'facebook')->where('provider_user_id', $provider->getId())->first();
        if ($account) {
            $account_name = Login::where('admin_id', $account->user)->first();
            Session::put('admin_name', $account_name->admin_name);
            Session::put('admin_id', $account_name->admin_id);

            return redirect('/dashboard')->with('message', 'Đăng nhập admin thành công');
        } else {
            $david = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook',
            ]);
            $orang = Login::where('admin_email', $provider->getEmail())->first();
            if(!$orang){
                $orang = Login::create([
                    'admin_name' => $provider->getName(),
                    'admin_email' => $provider->getEmail(),
                    'admin_password' => '',
                    'admin_phone' => '',
                    
                ]);
            }
            $david->Login()->associate($orang);
            $david->save();
            $account_name = Login::where('admin_id', $account->user)->first();
            Session::put('admin_name', $account_name->admin_name);
            Session::put('admin_id', $account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập admin thành công');
        }
    }
}