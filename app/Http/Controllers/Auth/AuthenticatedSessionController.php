<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
//use App\Providers\RouteServiceProvider;
use App\Services\UserGateService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    protected UserGateService $dashboardService;

    public function __construct(UserGateService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    // ... другие методы ...

    /**
     * @throws ValidationException
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect($this->dashboardService->getHomePage());
    }

    // ... другие методы ...
}