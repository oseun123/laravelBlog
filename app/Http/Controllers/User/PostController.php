<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\post;
use App\Model\user\archive;
use App\Model\user\category;

class PostController extends Controller
{
    public function post(post $post ){
    	$allpost= $post->where('status',1)->inRandomOrder()->get();
    
    	$archives=$post->archives;
        $postcat=$post->categories;
        $postag=$post->tags;
        // return $postcat;
       
    	$post4=post::where('status',1)->orderBy('created_at','DESC')->take(3)->get();
    	$categorys=category::all();
    	
    	 return view('user.post', compact('post','allpost','post4','categorys','archives','postcat','postag'));
    }

     public function archive($date, $slug ){
        $post=archive::where('created_at',$date)->first();

        $allpost= post::where('status',1)->inRandomOrder()->get();
      
        $originalpost=$post->post;
        $postcat=$post->categories;
        $postag=$post->tags;
        
      
        $post4=post::where('status',1)->orderBy('created_at','DESC')->take(3)->get();
        $categorys=category::all();
        
         return view('user.archive', compact('post','allpost','post4','categorys','originalpost','postcat','postag'));
    }
}
