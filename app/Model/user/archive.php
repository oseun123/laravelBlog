<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;


class archive extends Model
{
   	public function post(){
   		
   		return $this->belongsTo('App\Model\user\post');
   	}
   	 public function tags(){
   		return $this->belongsToMany('App\Model\user\tag','archive_tags')->withTimestamps();
   }
    public function categories(){
   		return $this->belongsToMany('App\Model\user\category','archive_categories')->withTimestamps();
   }
   //  public function getRouteKeyName(){
   // 	return 'slug';
   // }
}
