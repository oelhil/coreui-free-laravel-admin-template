<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KGBFormSuratController extends Controller
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
        $this->middleware('kp');
    }

    public function index(Request $request){
        return view('KGB.formsurat', 
                    [
                        'userName' => 'nama',
                        'created_at' => 'password',
                        'email' => 'email',
                    ]
            );    
    }

    public function formsuratkgbtmp () {
        return view('KGB.formsuratkgbtmp', 
                    [
                        'userName' => 'nama',                    
                    ]
            );  
    }
}
