<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
   public function tags(){
   		return $this->belongsToMany('App\Model\user\tag','post_tags')->withTimestamps();
   }

   public function categories(){
   		return $this->belongsToMany('App\Model\user\category','category_posts')->withTimestamps();
   }
    public function archives(){
         return $this->hasMany('App\Model\user\archive');
   }

   public function getRouteKeyName(){
   	return 'slug';
   }
   public function scopeSearch($query, $s){
   	 $query->where('status',1)->where('title','like','%'.$s.'%' )
   				->orWhere('subtitle','like','%'.$s.'%' )
   				->orWhere('body','like','%'.$s.'%' )
   				->orWhere('subtitle','like','%'.$s.'%' ); 
         if (empty($query)) {
            return 'Sorry, No result found.';
         }else{
            return $query;
         }
   }

}
