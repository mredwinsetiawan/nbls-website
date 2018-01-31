<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Tenant;
use Illuminate\Support\Facades\Log;

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

    public function postLogin(Request $request)
    {
//        0 = parent tenant
        $auth = Auth::guard('web')->attempt([
            'tenant_id' => 0,
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


    /* Tenant Authentication */
    public function getTenantLogin($subdomain)
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('me');
        }
        $tenant = Tenant::where('subdomain', $subdomain)->first();

        return view('tenants.login')->withTenant($tenant);
    }

    public function tenantLogin(Request $request, $subdomain)
    {
        Log::debug('Tenant Login');

        $tenant = Tenant::where('subdomain', $subdomain)->first();

        Log::error('Tenant ID = ' . $tenant->id);

        $auth = Auth::guard('web')->attempt([
            'tenant_id' => $tenant->id,
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($auth) {
            Log::debug('Login Oke!');
            return redirect()->route('tenant.dashboard', $subdomain);
        } else {
            Log::error('Bad Credential!');
        }

        return redirect()->route('tenant.landing', $subdomain);
    }

    public function tenantLogout($subdomain)
    {
        Auth::guard('web')->logout();

        return redirect()->route('tenant.landing', $subdomain);
    }
    /* end Tenant Authentication */
}
