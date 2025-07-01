<?php

namespace App\Http\Controllers;

use DataTables;
use DB;
use Session;


use App\User;
use App\Http\Requests\AkunRequest;
use Illuminate\Support\Facades\Hash;
use App\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class DownloadController extends Controller
{

     public function excel()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

  }
