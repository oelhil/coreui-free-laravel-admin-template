<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminKpController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('kp');
    }

    public function index(Request $request){
        return view('dashboard.homekp', 
                    [
                        'userName' => Auth::user()->name,
                        'created_at' => date('d F Y', strtotime(Auth::user()->created_at)),
                        'email' => Auth::user()->email,
                    ]
                    );    
    }
}
