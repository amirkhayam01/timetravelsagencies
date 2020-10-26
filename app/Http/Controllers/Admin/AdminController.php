<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Admin;
use App\UserPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $roles = Role::select('name', 'id')->get();
        return view('admin.users.create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'cnic' => ['required', 'regex:/^[1-9][0-9]{12}$/', 'unique:users'],
            'gender' => ['required'],
            'phone' => ['required', 'regex:/^(03)[0-9]{9}$/'],
            'password' => ['required', 'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/', 'confirmed'],
            'image' => ['nullable','image','max:1999'],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->cnic = $request->cnic;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);

        if($user->save())
        {
            if ($request->hasFile('image')) {
                $photo = new UserPhoto();
                $image = $request->image;
                $ext = $image->getClientOriginalExtension();
                $filename = uniqid() . '.' . $ext;
                // $image->move('/images/users/', $filename);
                $image->storeAs('public/images', $filename);
                $photo->user_id = $user->id;
                $photo->name = $filename;
                $photo->save();
            }

        }
        // $role = Role::where('slug', 'admin')->first();
        $role = DB::table('roles')->where('slug','admin')->first();
        $user->roles()->attach($role->id); 
        
        session()->put('create',"User $user->name");
        
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
    
}
