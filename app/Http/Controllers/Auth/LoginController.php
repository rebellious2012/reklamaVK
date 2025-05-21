<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\UserGateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    protected UserGateService $dashboardService;

    public function __construct(UserGateService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function showLoginForm(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('auth.login');
    }

    /**
     * @throws ValidationException
     */
    public function login(LoginRequest $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {

        // $request->authenticate();
        // dd('123');
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            logger('Auth failed for email: ' . $request->email);
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }


        $request->session()->regenerate();
        return redirect($this->dashboardService->getHomePage());
    }

    public function logout(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
