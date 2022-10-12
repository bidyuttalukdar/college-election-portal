<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // return view('home');
        $users= Auth::user();

        // $request->session()->put('users', $users);
	    
	    
        if($users->role_id==1){ 
           return redirect('admin/index');
        }
        elseif($users->role_id==2 && $is_active==1) { 
            return redirect('voting/dashboard');
        }else{
            return $this->logout();
        }
       
    }

    public function logout()
    {
        $this->guard()->logout();

        // $request->session()->invalidate();

        return $this->loggedOut() ?: redirect('/login');
    }
    protected function loggedOut()
    {
        //
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
