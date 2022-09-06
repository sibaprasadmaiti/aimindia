<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class UserAuthControler extends Controller
{

    public function adminView(){
        return redirect('admin/login');
    }

    public function login(){
        return view("auth.login");
    }

    public function registration(){
        return view("auth.registration");
    }

    public function registerUser(Request $request){
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12',
            'confirmpassword'=>'required|min:5|same:password',
        ]);
        $user = new User();
        $user->name = $request->firstname .' '. $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if ($res) {
            return back()->with('success','You have registered successfully!');
        }else{
            return back()->with('fail','Something went wrong!');
        }
    }

    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12',
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginUserId', $user->id);

                //rememberme
                if($request->has('rememberpassword')){
                    Cookie::queue('adminuser', $request->email, 1440);
                    Cookie::queue('adminpwd', $request->password, 1440);
                }else{
                    Cookie::queue('adminuser', $request->email, -1440);
                    Cookie::queue('adminpwd', $request->password, -1440);
                }

                return redirect('admin/dashboard');
            }else{
                return back()->with('fail', 'Invalid password!');
            }
        }else{
            return back()->with('fail','This email is not registered!');
        }
    }

    public function dashboard(){
        $data = array();
        if(Session::has('loginUserId')){
            $data = User::where('id', '=', Session::get('loginUserId'))->first();
        }
        return view("auth.dashboard", compact('data'));
    }

    public function logout(){
       if(Session::has('loginUserId')){
            Session::pull('loginUserId');
            return redirect('admin/login');
       }
    }
}
