<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Tenant;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $email = 'email';
    protected $guard = 'guest';


    public function getLogin()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('me');
        }

        return view('login');
    }

    public function getTenantLogin($subdomain)
    {
//        if (Auth::guard('web')->check()) {
//            return redirect()->route('me');
//        }
        $tenant = Tenant::where('subdomain', $subdomain)->first();

        return view('tenants.login')->withTenant($tenant);
    }

    public function postLogin(Request $request)
    {
        $auth = Auth::guard('web')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($auth) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('/');
    }

    public function tenantLogin(Request $request, $subdomain)
    {
        $auth = Auth::guard('web')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($auth) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('/');
    }


    public function getLogout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('/');
    }
}
