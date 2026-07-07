<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Logika kustom setelah user berhasil login untuk memisahkan 2 Role.
     */
    protected function authenticated(Request $request, $user)
    {
        // 1. Cek jika role user yang masuk adalah 'admin'
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard'); // Arahkan ke halaman dashboard admin
        }

        // 2. Jika bukan admin (berarti customer), arahkan ke halaman dashboard customer
        return redirect()->route('user.dashboard');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}