<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; //untuk input::get
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\HttpRequest;
use View;
use App\Model\Menu;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         config(['app.locale' => 'id']);
        \Carbon\Carbon::setLocale('id');
        $request = app(\Illuminate\Http\Request::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        // URL::forceScheme('https');
        //
        view()->composer('*', function ($view) 
        {
            $request = app(\Illuminate\Http\Request::class);
            $user1 = DB::table('users')->where('id',Auth::id())->first();
            $username = $request->session()->get('authenticated');
            // $akses = DB::table('users')->where('grup','hrd')->where('id',Auth::id())->where('is_deleted',0)->get();
   

            // if ($user1){
            //     $karyawan = DB::table('t_karyawan')
            //     ->where('idkaryawan',$user1->idkaryawan)
            //     ->where(function ($query) {
            //         $query->orwhere('idkeljabatan', '1')
            //               ->orwhere('idkeljabatan', '2');
            //     })
            //     ->where('is_deleted',0)->get();
            //     View::share('User1',$karyawan);   
            // }

            // dd($user1);

            
            


        });  
    }
}
