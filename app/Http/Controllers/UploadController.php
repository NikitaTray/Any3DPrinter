<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use DB;
use App\Printers;
class UploadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index()
    {

    }

    public function setImage(Request $request){
        $email = $request->input('email', '');
        $token = $request->input('token', '');
        $image = $request->input('image', '');
        if($email == '' or $token == '' or $token == ''){
            return 'Invalid Request';
        }
        $find_printer =  Printers::where(['email' => $email, 'token' => $token])->first();
        if($find_printer){
            file_put_contents('upload/'.$email.'.txt', $image);
            return 'Success';
        }
        return 'Validation Error';
    }

}
