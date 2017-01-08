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

class NewcodeController extends Controller
{
    public function index()
    {
    	$codes = owncode::orderBy('created_at', 'desc')->paginate(5);



		return view('newcode',compact('codes'));


    }


    public function likecode(Request $request)
    {
    	$alreadyliked2 = likestable::where('userID', Auth::user()->id)->where('owncode_ID', $request->codeID)->first();
    	$code = owncode::where('id', $request->codeID)->first();

    	if($alreadyliked2 == NULL)
    	{
    		$like = new likestable;
    		$like->userID = Auth::user()->id;
    		$like->owncode_ID = $request->codeID;
    		$like->like = 1;
    		$like->save();
    	}
    	else
    	{
    		$like = likestable::where('userID', Auth::user()->id)->where('owncode_ID', $request->codeID)->first();
    		$like->like = 1;
    		$like->save();
    		$temp = $code->dislikes;
    		$temp -= 1;
    		$code->dislikes = $temp;
    	}


    	
    	$temp = $code->likes;
    	$temp += 1;
    	$code->likes = $temp;
    	$code->save();
    	return Redirect()->back();
    }

    public function dislikecode(Request $request)
    {
    	$alreadyliked2 = likestable::where('userID', Auth::user()->id)->where('owncode_ID', $request->codeID)->first();
    	$code = owncode::where('id', $request->codeID)->first();
    	if($alreadyliked2 == NULL)
    	{
    		$like = new likestable;
    		$like->userID = Auth::user()->id;
    		$like->owncode_ID = $request->codeID;
    		$like->like = 0;
    		$like->save();
    	}
    	else
    	{
    		$like = likestable::where('userID', Auth::user()->id)->where('owncode_ID', $request->codeID)->first();
    		$like->like = 0;
    		$like->save();
    		$temp = $code->likes;
    		$temp -= 1;
    		$code->likes = $temp;
    	}

    	
    	$temp = $code->dislikes;
    	$temp += 1;
    	$code->dislikes = $temp;
    	$code->save();


    	return Redirect()->back();
    }


}
