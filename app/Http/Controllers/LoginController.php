<?php

namespace App\Http\Controllers;
use App\Models\Admins;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function loginSubmit(Request $req)
    {
        
        $this->validate($req,[
            "email"=>"required|exists:admin,email",
            "password"=>"required"
        ],[
            "email.exits"=>"Provide email is not registered"
        ]);
        $admin=Admins::where('email',$req->email)
                    ->where('password',$req->password)->first();
        if($admin){
            $req->session()->put('logged', $admin->email);
            return redirect()->route('dash');
        }
        else{
            return back()->with('fail','invalid password');
        }
    }
    function logout(){
        session()->forget('logged');
        session()->flash('msg','Sucessfully Logged out');
        return redirect()->route('login');
    }
}
