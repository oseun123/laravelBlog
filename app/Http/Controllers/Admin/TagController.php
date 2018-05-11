<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\tag;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
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
        $tags=tag::all();
        return view('admin.tag.index', compact('tags') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('posts.tag')) {
         return view('admin.tag.create');
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
        $this->validate($request,[
            'name' =>'required',
            'slug' =>'required',

        ]);
         $tag = new tag;
         $tag->name = $request->name;
         $tag->slug = $request->slug;
         $tag->save();

         return redirect(route('tag.index'));
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
       if (Auth::user()->can('posts.tag')) { 
        $tag=tag::where('id',$id)->first();
        return view('admin.tag.edit', compact('tag'));
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
        $this->validate($request,[
            'name' =>'required',
            'slug' =>'required',

        ]);
         $tag =tag::find($id);
         $tag->name = $request->name;
         $tag->slug = $request->slug;
         $tag->save();

         return redirect(route('tag.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       tag::where('id',$id)->delete();

        return redirect()->back();
    }
}
