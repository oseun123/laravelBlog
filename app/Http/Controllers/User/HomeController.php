<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\post;
use App\Model\user\tag;
use App\Model\user\category;


class HomeController extends Controller
{
    public function index(Request $request){
         $s = $request->input('s');
    	$posts=post::where('status',1)->orderBy('created_at','DESC')
        ->search($s)
        ->paginate(4);
       
        $categorys=category::all();

    	 return view('user.home',compact('posts','categorys','s'));
    }

    public function tag(tag $tag, Request $request){
    	$posts=$tag->posts();
        $categorys=category::all();
        $s = $request->input('s');
    	return view('user.home',compact('posts','categorys','s'));
    }

     public function category(category $category, Request $request){
    	$posts= $category->posts();
        
        $s = $request->input('s');
         $categorys=category::all();
    	return view('user.home',compact('posts','categorys','s'));
    }
}
