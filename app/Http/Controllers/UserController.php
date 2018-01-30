<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function checkAuth(Request $request)
    {
      $credentials = [
        'email' => $request->email,
        'password' => $request->password,
      ];

      if (!Auth::attempt($credentials)) {
        return response('Username or password is wrong!', 403);
      }

      return response(Auth::user(), 201);
    }

    public function index()
    {
        $users = User::all();
        $roles = Role::all();

        return view('users.index')
        ->withUsers($users)
        ->withRoles($roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'fullname' => 'required|max:255',
            'ktp_id' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
        ]);

        $user = new User;

        $user->fullname = $request->fullname;
        $user->ktp_id = $request->ktp_id;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->birth_date = $request->birth_date;
        $user->phone = $request->phone;
        $user->mobile = $request->mobile;
        $user->mobile2 = $request->mobile2;
        $user->pin_bb = $request->pin_bb;
        $user->notes = $request->notes;

        $user->photo = $request->photo;

        $user->address = $request->address;
        $user->zipcode = $request->zipcode;
        $user->fb = $request->fb;
        $user->tw = $request->tw;
        $user->website = $request->website;
        $user->status = $request->status;
        $user->hobby = $request->hobby;
        $user->reason = $request->reason;

//        Default User Role
        $user->role_id = 5;

//        Default Tenant and Branch
        $user->branch_id = 0;
        $user->tenant_id = 0;

        $user->save();

        return redirect()->back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeRole(Request $request, $id){
      $user = User::find($id);

      $user->role_id = $request->role_id;

      $user->save();

      return redirect()->back();
    }

    public function addRole(Request $request)
    {
      $user = User::find($request->user_id);
      $user->roles()->attach($request->role_id);

      return response()->json($user->roles);
    }

    public function deleteRole(Request $request)
    {
      $user = User::find($request->user_id);
      $user->roles()->detach($request->role_id);

      return response()->json($user->roles);
    }

    public function selectExpert(Request $request)
    {
        $user = User::find($request->user_id);
        $user->tenant_id = $request->tenant_id;

        $user->save();

        return redirect()->back();
    }

}
