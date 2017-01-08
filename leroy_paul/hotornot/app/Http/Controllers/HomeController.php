<?php

namespace App\Http\Controllers;

use DB;
use App\owncode;
use App\likestable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Image;

class HomeController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codemonth = owncode::where('created_at', '>=', Carbon::now()->startOfMonth())->orderby('likes','desc')->first();
        $codeweek = owncode::where('created_at', '>=', Carbon::now()->startOfWeek())->orderby('likes','desc')->first();
        $codeall = owncode::orderby('likes', 'desc')->first();

        return view('home',compact('codemonth','codeweek','codeall'));
    }
}
