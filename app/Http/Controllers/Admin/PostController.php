<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\post;
use App\Model\user\tag;
use App\Model\user\archive;
use App\Model\user\category;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=post::all();
         return view('admin.post.index', compact('posts')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        if (Auth::user()->can('posts.create')) {
           $tags =tag::all();
            $categories =category::all();
            // $archives =archive::all();
            return view('admin.post.create',compact('tags','categories'));
        }
        return redirect(route('admin.home'))->with('message','Access denied, only for authorized personel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // if($request->hasFile('image')){
         //      // return $request->image['name'];
             
         //      $allimage=array();
         //      foreach ($request->image as $image) {
         //          $imageName = $image->store('public'); 

         //          $allimage[]=$imageName;

         //      }
         //        $allimage= json_encode($allimage);
                
             
         //    }
            $this->validate($request, [

                 'title'=>'required',
                 'tags'=>'required',
                 'categories'=>'required',
                 'slug'=>'required',
                 'body'=>'required',
                 'image'=>'required|mimes:jpeg,png|max:5000',


                

            ]);
          if($request->hasFile('image')){
            $request->image->store('public');
            $imageName = $request->image->store('public');
          }
        
          
       
       $post =new post;
      

       $post->image= $imageName;
      

       $post->title = $request->title;
     

       $post->subtitle = $request->subtitle;
   

       $post->slug = $request->slug;
       

       $post->body = $request->body;
       

       $post->status = $request->status;
      

       $post->save();
       

       $post->tags()->sync($request->tags);
       
       $post->categories()->sync($request->categories);
       return redirect(route('post.index'))->with('message','Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if (Auth::user()->can('posts.update')) {
        $tags=tag::all();
        $categories=category::all();
        // $archives=archive::all();
      
        $post=post::with('tags','categories')->where('id',$id)->first();
         return view('admin.post.edit', compact('post','tags','categories'));
              }
        return redirect(route('admin.home'))->with('message','Access denied, only for authorized personel');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if($request->archive == 1){
             $this->validate($request, [

                 'title'=>'required',
                 'tags'=>'required',
                 'categories'=>'required',
                 'slug'=>'required',
                 'body'=>'required',  
            ]);
            $post =post::find($id);
            if ($post->title == $request->title && $post->body == $request->body  && $post->subtitle == $request->subtitle) {
                 return redirect()->back()->with('message','Can not archive this post because no changes were made.');
            }


            $archive =new archive;

            $archive->image= $post->image;
            

            $archive->title = $post->title;
            

            $archive->subtitle = $post->subtitle;
            

            $archive->slug = $post->slug;
            

            $archive->body = $post->body;
            

            $archive->status = $post->status;
            $archive->post_id = $post->id;
            

            $archive->save();
             // if ($archive->save()) {
             //     return "saved";
             // }else{
             //    return "not saved";
             // }
            $archive->tags()->sync($post->tags);
            $archive->categories()->sync($post->categories);



        }


         if($request->hasFile('image')){
           

             $this->validate($request, [

             'title'=>'required',
                 'tags'=>'required',
                 'categories'=>'required',
                 'slug'=>'required',
                 'body'=>'required',
                 'image'=>'required|mimes:jpeg,png|max:5000',
            
            

        ]);
            $request->image->store('public');
            $imageName = $request->image->store('public');
            $post =post::find($id);
           

            $post->image= $imageName;
         

        $post->title = $request->title;
        

        $post->subtitle = $request->subtitle;
        

        $post->slug = $request->slug;
    

        $post->body = $request->body;
       
       

        $post->status = $request->status;
       
        $post->save();
       
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        
        return redirect(route('post.index'))->with('message','Post edited successfully');




         }else{
              $this->validate($request, [

             'title'=>'required',
                 'tags'=>'required',
                 'categories'=>'required',
                 'slug'=>'required',
                 'body'=>'required',
                
            
            

        ]);
         $post =post::find($id);
        
        $post->title = $request->title;
         
        $post->subtitle = $request->subtitle;
          
        $post->slug = $request->slug;
       
        $post->body = $request->body;
        
        $post->status = $request->status;
       
        $post->save();
        
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        
        return redirect(route('post.index'))->with('message','Post edited successfully');

         }
              
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::where('id',$id)->delete();
       

        return redirect()->back()->with('message','Post deleted successfully');
    }
}
