<?php

namespace App\Http\Controllers;

use DB;
use App\owncode;
use App\likestable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Image;


class ViewcodeController extends Controller
{
    public function index($id)
    {
    	$code = owncode::where('id',$id)->first();



    	return view('viewcode',compact('code'));
    }




}
