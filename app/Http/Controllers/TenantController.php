<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Tenant;
use App\User;
use Session;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = Tenant::all();
        return view('tenants.index')
            ->withTenants($tenants);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        Validate request
        $this->validate($request, [
            'name' => 'required|unique:tenants|max:255',
            'subdomain' => 'required|unique:tenants|max:10',
        ]);

//        Save Tenant to database
        $tenant = new Tenant;
        $tenant->name = $request->name;
        $tenant->description = $request->description;
        $tenant->subdomain = $request->subdomain;
        $tenant->company_logo = "wowowowowo";
        $tenant->author_id = Auth::id();

        $tenant->save();

//        add success message with session flash (hanya untuk 1 page)
        Session::flash('success', 'Tenant berhasil di tambahkan !');

//        refresh the page
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tenant = Tenant::find($id);
        $users = User::all();

        return view('tenants.detail')
            ->withTenant($tenant)
            ->withUsers($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tenant = Tenant::find($id);

//        if ($tenant->file != null) {
//            unlink('file/research/'.$tenant->file);
//        }

        $tenant->delete();

        return redirect()->back();
    }
}
