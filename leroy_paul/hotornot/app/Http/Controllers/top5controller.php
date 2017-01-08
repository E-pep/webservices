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

class top5controller extends Controller
{
    public function index()
    {
    	$codemonth = owncode::where('created_at', '>=', Carbon::now()->startOfMonth())->orderby('likes','desc')->take(5)->get();
    	$codeweek = owncode::where('created_at', '>=', Carbon::now()->startOfWeek())->orderby('likes','desc')->take(5)->get();
    	$codeall = owncode::orderby('likes', 'desc')->take(5)->get();

    	return view('top5',compact('codemonth','codeweek','codeall'));
    }
}
