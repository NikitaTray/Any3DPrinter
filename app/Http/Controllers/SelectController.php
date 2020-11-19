<?php

namespace App\Http\Controllers;

use App\Assigns;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Laravel\Socialite\Facades\Socialite;
use App\Printers;
use DB;
class SelectController extends Controller
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
    public function index()
    {
        $user = Auth::user();
        $name = explode(" ", $user->name)[0];
        return view('select')->with(['shortName' => $name]);
    }

    public function check(Request $request)
    {
        $email = $request->input('email', '');
        $password = $request->input('password', '');
        $find_printer =  Printers::where('email', $email)->where('password', $password)->first();
        if($find_printer){
//            session(['printer' => $email]);
            $user = Auth::user();
            DB::table('assigns')->updateOrInsert(['user'=>$user->id, 'printer'=>$find_printer->id], ['status'=>'approved']);
            return "YES";
        }
        return "NO";
    }
}
