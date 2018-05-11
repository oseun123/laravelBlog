<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\role;
use App\Model\admin\Permission;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
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
        if (Auth::user()->can('posts.role_admin')) {
        $roles = role::all();
        return view('admin.role.index', compact('roles'));
           }
        return redirect(route('admin.home'))->with('message','Access denied, only for authorized personel');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('posts.role_admin')) {
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
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
        $this->validate($request, [
            'name' => 'required|max:50|unique:roles',
        ] );
        $role = new role;
        $role->name = $request->name;
        $role->save();
        $role->permissions()->sync($request->permission);
        return redirect(route('role.index'))->with('message','Role created successfully');
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
         if (Auth::user()->can('posts.role_admin')) {
        $role = role::find($id);
        $permissions = Permission::all();
        return view('admin.role.edit',compact('role','permissions') );
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
        $this->validate($request, [
            'name' => 'required|max:50',
        ] );
        // return $request->permission;
        $role = role::find($id);
        $role->name = $request->name;
        $role->save();
        $role->permissions()->sync($request->permission);
        return redirect(route('role.index'))->with('message','Role updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        role::where('id', $id )->delete();
        return redirect()->back()->with('message','Role deleted successfully');
    }
}
