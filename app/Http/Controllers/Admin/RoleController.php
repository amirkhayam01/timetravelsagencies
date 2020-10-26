<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
class RoleController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('admin')) {
            return redirect()->back();
        }
        $i = 1;
        $role = Role::all();
        return view('admin.roles.index')->with('roles', $role)->with('i',$i);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateRole($request);
        Role::create($data);
        session()->put('create',"Role $data[name]");
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $data = $this->validateRole($request);
        $role->update($data);
        session()->put('update',"Role $data[name]");
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if($role->delete()) {
            session()->put('delete',"Role ");
        }
        return redirect()->route('roles.index');
    }


    public function validateRole(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);   
        $slug = str_replace(' ', '', $data['name']);
        $data['slug'] = strtolower($slug);

        // $data['permissions'] = "{\"$data[slug]\": true}";
        return $data;
    }

}
