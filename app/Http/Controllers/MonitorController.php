<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use DB;
use App\Printers;

class MonitorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('printer');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
//        $printers = DB::table("assigns")
//            ->leftJoin("users", "assigns.user", "=", "users.id")
//            ->leftJoin("printers", "assigns.printer", "=", "printers.id")
//            ->where("users.email", $user["email"])
//            ->where("assigns.status", "approved")
//            ->select("printers.email as email", "printers.status as status", "printers.name as name")
//            ->get()->toArray();
        $printers = DB::table("assigns")
            ->leftJoin("users", "assigns.user", "=", "users.id")
            ->leftJoin("printers", "assigns.printer", "=", "printers.id")
            ->leftJoin("printer_metas", "assigns.printer", "=", "printer_metas.printer")
            ->where("users.email", $user["email"])
//            ->where("assigns.status", "approved")
            ->where(function ($query) {
                $query->where("assigns.status", "approved")
                    ->orWhere("assigns.status", "readonly");
            })
//            ->where("printer_metas.meta_name", "property")
            ->where(function ($query) {
                $query->where('printer_metas.meta_name', 'property')
                    ->orWhereNull('printer_metas.meta_name');
            })
            ->select("printers.email as email", "printers.status as status", "printers.name as name", "printers.type as type", "printer_metas.meta_value as property")
            ->get()->toArray();
        foreach ($printers as $key => $printer){
            if($printer->email === "admin"){
                $property = array();
                $property['hothead'] = (string)(int)$this->get_server_cpu_usage(). "%";
                $property['hotbed'] = (string)(int)$this->get_server_memory_usage(). "%";
                $property['filament'] = '----';
                $property['time'] = 'CPU,RAM';
                $printer->property = json_encode($property);
                $printers[$key] = $printer;
            }
        }
        return view('monitor')->with(['user' => $user, 'printers' => $printers]);
    }

    function get_server_memory_usage(){

        $free = shell_exec('free');
        $free = (string)trim($free);
        $free_arr = explode("\n", $free);
        $mem = explode(" ", $free_arr[1]);
        $mem = array_filter($mem);
        $mem = array_merge($mem);
        $memory_usage = $mem[2]/$mem[1]*100;

        return $memory_usage;
    }

    function get_server_cpu_usage(){

        $load = sys_getloadavg();
        return $load[0] * 100;

    }

//    public function printers(Request $request){
//        $user_mail = $request->input('user_mail', '');
//        $printers = DB::table("assigns")
//            ->leftJoin("users", "assigns.user", "=", "users.id")
//            ->leftJoin("printers", "assigns.printer", "=", "printers.id")
//            ->where("users.email", $user_mail)
//            ->where("assigns.status", "approved")
//            ->select("printers.email as email", "printers.status as status")
//            ->get()->toArray();
//        return $printers;
//    }
//
//    public function delete(Request $request)
//    {
//        $email = $request->input('printer_mail', '');
//        $find_printer =  Printers::where('email', $email)->first();
//        if($find_printer){
//            $user = Auth::user();
//            DB::table('assigns')->where('user',$user->id)->where('printer', $find_printer->id)->update(['status'=>'']);
//            return "YES";
//        }
//        return "NO";
//    }

    public function status(Request $request)
    {
        $email = $request->input('email', '');
        $find_printer = Printers::where('email', $email)->where("status", "connected")->first();
        if ($find_printer) {
            $result = DB::table("printer_metas")
                ->where("printer", $find_printer->id)
                ->select("meta_name", "meta_value")
                ->get()->toArray();
            if ($result) {
                $picture = array();
                $picture["meta_name"] = "picture";
                $picture["meta_value"] = $this->getImage($request);
                $result[] = $picture;

                $user = Auth::user();
                $assign = DB::table('assigns')->where('user', $user->id)->where('printer', $find_printer->id)->select('status')->first();

                $permission = array();
                $permission["meta_name"] = "permission";
                $permission["meta_value"] = $assign->status;

                $result[] = $permission;
            }
            return $result;
        }
        return "NO";
    }


    public function getImage(Request $request)
    {
        $email = $request->input('email', '');
        $image = null;
        if (file_exists('upload/' . $email . '.txt')) {
            $image = file_get_contents('upload/' . $email . '.txt');
        }
        return $image;
    }
}
