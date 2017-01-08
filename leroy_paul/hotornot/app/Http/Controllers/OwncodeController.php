<?php

namespace App\Http\Controllers;

use DB;
use App\owncode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Image;

class OwncodeController extends Controller
{
    
    public function index()
    {
    	$userid = Auth::user()->id;
    	$codes = owncode::where('userID',$userid)->paginate(3);
    	


    	return view('owncode',compact('codes','userid'));
    }

    public function addcode(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'proglang' => 'required',
            'IDE' => 'required',
            'besch' => 'required',
            'fileinput' => 'required'


            ]);

    	 $file = Input::file('fileinput');
         $img = Image::make($file);
         Response::make($img->encode('jpeg'));

         

/*
    	  $imagename = $_FILES["fileinput"]["name"];
    	  $imagedata = file_get_contents($_FILES["fileinput"]["tmp_name"]);
*/
    	  
    	  $code = new owncode;
    	  $code->imagedata= $img;
    	  $code->title = $request->title;
    	  $code->program_language = $request->proglang;
    	  $code->IDE = $request->IDE;
    	  $code->description = $request->besch;
    	  $code->userID = Auth::user()->id;
		  $code->creation_date =  Carbon::today();
    	  $code->save();
    	  return Redirect::to('owncode');
    	  
    }

    public function viewpic($id)
    {

    	$picture = owncode::findOrFail($id);
    	$pic = Image::make($picture->imagedata);
    	$response = Response::make($pic->encode('jpeg'));
    	$response->header('Content-Type','image/jpeg');

    	return $response;
    }

}
