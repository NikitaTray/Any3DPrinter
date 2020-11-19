<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use App\Downloads;
use DB;

class DownloadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $result = Downloads::where('name', 'Repetrel')->first();
        $currentVersion = '';
        if ($result)
            $currentVersion = $result->version;
        $result = Downloads::where('name', 'SuferBuddy')->first();
        $surferVersion = '';
        if ($result)
            $surferVersion = $result->version;
        $result = Downloads::where('name', 'PhoneBuddy')->first();
        $phoneVersion = '';
        if ($result)
            $phoneVersion = $result->version;
//        $result = Downloads::all();
//        return view('download')->with(['currentVersion' => $currentVersion, 'downloads' => $result]);
        return view('download')->with(['currentVersion' => $currentVersion, 'surferVersion' => $surferVersion, 'phoneVersion' => $phoneVersion]);
    }

    public function currentVersion()
    {
        return "4.101_D";
    }

    public function currentGELVersion()
    {
        return "1.1.0";
    }

    public function currentSurferBuddyVersion()
    {
        $result = Downloads::where('name', 'SuferBuddy')->first();
        return $result->version;
    }

    public function currentSurferBuddyUrl()
    {
        $result = Downloads::where('name', 'SuferBuddy')->first();
        return $result->url;
    }

    public function currentSurferFullInfo()
    {
        $result = Downloads::where('name', 'SuferBuddy')->first();
        return $result->version . "," . $result->url;
    }

    public function downloadSurferBuddy()
    {
        $result = Downloads::where('name', 'main')->first();
        $currentVersion = '';
        if ($result)
            $currentVersion = $result->version;
        $result = Downloads::all();
        $file = Downloads::where('name', 'SuferBuddy')->first()->url;
        return view('download')->with(['currentVersion' => $currentVersion, 'downloads' => $result, 'file' => $file]);
    }

    public function currentRepetrelVersion()
    {
        $result = Downloads::where('name', 'Repetrel')->first();
        return $result->version;
    }

    public function currentRepetrelUrl()
    {
        $result = Downloads::where('name', 'Repetrel')->first();
        return $result->url;
    }

    public function currentRepetrelFullInfo()
    {
        $result = Downloads::where('name', 'Repetrel')->first();
        return $result->version . "," . $result->url;
    }

    public function downloadRepetrel()
    {
        $result = Downloads::where('name', 'main')->first();
        $currentVersion = '';
        if ($result)
            $currentVersion = $result->version;
        $result = Downloads::all();
        $file = Downloads::where('name', 'Repetrel')->first()->url;
        return view('download')->with(['currentVersion' => $currentVersion, 'downloads' => $result, 'file' => $file]);
    }
}
