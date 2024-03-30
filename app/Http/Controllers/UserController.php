<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Anda belum login, silahkan login terlebih dahulu');
        }
        else{
            return view('index');
        }
    }

    public function login(){
        return view('auth.login');
    }

    public function loginPost(Request $request){
        $email = $request->email;
                $password = $request->password;
        $data = User::where('email',$email)->first();
                if($data){ //apakah email tersebut ada atau tidak
                    if(Hash::check($password,$data->password)){
                        Session::put('name',$data->name);
                        Session::put('email',$data->email);
                        Session::put('posisi',$data->posisi);
                        Session::put('foto',$data->foto);
                        Session::put('login',TRUE);
                        return redirect('/');
                    }
                    else{
                        return redirect('login')->with('alert','Email atau Password anda salah!');
                    }
                }
                else{
                    return redirect('login')->with('alert','Email atau Password anda salah!');
                }
    }

    public function logout(){
        Session::flush();
        return redirect('login')->with('alert','Anda telah logout');
    }
}
