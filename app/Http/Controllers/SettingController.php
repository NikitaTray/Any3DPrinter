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
class SettingController extends Controller
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
//        return view('setting');
        $user = Auth::user();
        $printers = DB::table("assigns")
            ->leftJoin("users", "assigns.user", "=", "users.id")
            ->leftJoin("printers", "assigns.printer", "=", "printers.id")
            ->where("users.email", $user["email"])
//            ->where("assigns.status", "approved")
            ->where(function ($query) {
                $query->where("assigns.status", "approved")
                    ->orWhere("assigns.status", "readonly");
            })
            ->select("printers.name as name", "printers.password as password", "printers.readonlypassword as readonlypassword", "printers.type as type", "printers.email as email", "printers.status as status", "printers.name as name", "assigns.status as permission")
            ->get()->toArray();
        return view('setting')->with(['user' => $user, 'printers' => $printers]);
    }

    public function add(Request $request){
        $email = $request->input('email', '');
        $password = $request->input('password', '');
        $name = $request->input('name', '');
        $type = $request->input('type', '');
        if($email == '' or $password == '' or $name == '' or $name == '')
            return 'EMPTY';
        $find_printer =  Printers::where('email', $email)->where('password', $password)->first();
        if($find_printer){
            $user = Auth::user();
            DB::table('assigns')->updateOrInsert(['user'=>$user->id, 'printer'=>$find_printer->id], ['status'=>'approved']);
            DB::table('printers')->updateOrInsert(['email'=>$email], ['name'=>$name, 'type'=>$type]);
            return "YES";
        }
        else{
            $find_printer =  Printers::where('email', $email)->where('readonlypassword', $password)->first();
            if($find_printer){
                $user = Auth::user();
                DB::table('assigns')->updateOrInsert(['user'=>$user->id, 'printer'=>$find_printer->id], ['status'=>'readonly']);
                DB::table('printers')->updateOrInsert(['email'=>$email], ['name'=>$name, 'type'=>$type]);
                return "ReadOnly";
            }
        }
        return "NO";
    }

    public function delete(Request $request)
    {
        $email = $request->input('email', '');
        if($email == '')
            return 'EMPTY';
        $find_printer =  Printers::where('email', $email)->first();
        if($find_printer){
            $user = Auth::user();
            DB::table('assigns')->where('user',$user->id)->where('printer', $find_printer->id)->update(['status'=>'']);
            return "YES";
        }
        return "NO";
    }

    public function update(Request $request){
        $email = $request->input('email', '');
        $password = $request->input('password', '');
        $name = $request->input('name', '');
        $type = $request->input('type', '');
        if($email == '' or $password == '' or $name == '' or $name == '')
            return 'EMPTY';
        $find_printer =  Printers::where('email', $email)->where('password', $password)->first();
        $user = Auth::user();
        if($find_printer){
            DB::table('assigns')->updateOrInsert(['user'=>$user->id, 'printer'=>$find_printer->id], ['status'=>'approved']);
            DB::table('printers')->updateOrInsert(['email'=>$email], ['name'=>$name, 'type'=>$type]);
            return "YES";
        }
        else{
            $find_printer =  Printers::where('email', $email)->where('readonlypassword', $password)->first();
            if($find_printer){
                DB::table('assigns')->updateOrInsert(['user'=>$user->id, 'printer'=>$find_printer->id], ['status'=>'readonly']);
                DB::table('printers')->updateOrInsert(['email'=>$email], ['name'=>$name, 'type'=>$type]);
                return "ReadOnly";
            }
        }
        return "NO";
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
