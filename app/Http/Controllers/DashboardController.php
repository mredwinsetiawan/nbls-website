<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{

    public function __construct()
    {
        return $this->middleware('web');
    }

    public function dashboard()
    {

        return view('layouts.main');
    }

    public function noPermission()
    {
        return redirect()->back();
    }

    /* Tenant */
    public function tenantDashboard($subdomain)
    {

        return view('layouts.tenant');
    }
    /* End Tenant */
}
