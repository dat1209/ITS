<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Validator;

class LoginController extends Controller
{
    function index(){
        return view('admin.login');
    }
    function login(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'password' => 'required'
        ]);
        $a = User::where('name','=',$request->name)->get();
        if(Auth::attempt(array(
            'name' => $request->get ( 'name' ),
            'password' => $request->get ( 'password' )
        ))){
            session([
                'name' => $request->name
            ]);
            return Redirect('/admin/home');
        }else{
            return Redirect::back()->withErrors(['Tên tài khoản hoặc mật khẩu sai']);
        }
    }
}
