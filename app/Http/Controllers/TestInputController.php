<?php

namespace App\Http\Controllers;

use DataTables;
use DB;
use Session;
use App\User;

use App\Akun;
use App\Http\Requests\AkunRequest;
use Illuminate\Support\Facades\Hash;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class TestInputController extends Controller
{

    public function index(Request $request)
    {
        $username = $request->session()->get('authenticated');
        return view('testinput.index',compact('username'));
    }

    public function list(Request $request){
        
        if (($request->startdate != '') && ($request->enddate != '')){
            $lists = Akun::
            whereBetween('date', [$request->startdate, $request->enddate])
            ->get();

        }
        else{
            $lists = Akun::get();            
        }

        
        return DataTables()->of($lists)->make(true);
    }

    public function store(Request $request)
    {

        $nama = $request->name;
        $tanggal = $request->tanggal;
        $nohp = $request->nohp;
        

    $user = User::where('nohp', $nohp)
                ->where('status', 'pending')
                ->first();

    $user->status = 'sended';
    $user->save();



return redirect()->route('dashboardawal');
    }


  }