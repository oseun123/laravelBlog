<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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
        $categorys=category::all();
        return view('admin.category.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('posts.category')) {
        return view('admin.category.create');
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
         $category = new category;
         $category->name = $request->name;
         $category->slug = $request->slug;
         $category->save();

         return redirect(route('category.index'));
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
         if (Auth::user()->can('posts.category')) { 
                 $category=category::find($id);
         
                return view('admin.category.edit', compact('category'));
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
         $category = category::find($id);
         $category->name = $request->name;
         $category->slug = $request->slug;
         $category->save();

         return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        category::where('id',$id)->delete();

        return redirect()->back();
    }
}
