<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pegawai;
use DataTables;

class KGBController extends Controller
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
        $pegawai = Pegawai::latest()->get();

        if ($request->ajax()) {
            return Datatables::of($pegawai)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<button class="btn btn-sm btn-square btn-info" type="submit">Edit</button>';

                    $btn = $btn . ' <button class="btn btn-sm btn-square btn-danger" type="reset"> Delete</button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
        return view('KGB.index', compact('pegawai'));   
    }
}
