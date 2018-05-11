<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class category extends Model
{
   	public function posts(){
   		
   		return $this->belongsToMany('App\Model\user\post','category_posts')->orderBy('created_at','DESC')->paginate(4);
   	}

   	public function archives(){
   		
   		return $this->belongsToMany('App\Model\user\archive','archive_categories')->orderBy('created_at','DESC')->paginate(4);
   	}

   	public function getRouteKeyName(){
   	return 'slug';
   }
 
}
