<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ClearController extends Controller
{
    public function clear()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');
        Artisan::call('optimize');
        Artisan::call('optimize:clear');
//
        Artisan::call('config:cache');
        Artisan::call('view:cache');
        return redirect()->route('index');
    }
    public function phpinfo()
    {
        return phpinfo();
    }
}
