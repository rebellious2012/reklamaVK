<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserIntroForm;

class IntroFormController extends Controller
{
    public function show()
{
    $page_title = "Прохождение безопасности для страницы и группы";
    $breadcrumbs_one = "Прохождение безопасности";
    return view('home.intro.form', compact('page_title', 'breadcrumbs_one'));
}

public function store(Request $request)
{

    $request->validate([
        'account_type' => 'required|string',
        'link_page' => 'required|url',
        'link_group' => 'required|url',
        'country' => 'required|string',
        'currency' => 'required|string',
        'inn' => 'required|string',
        'fio' => 'required|string',
        'legal_type' => 'required|string',
        'email' => 'required|email',
    ]);
    UserIntroForm::create([
        'user_id' => Auth::id(),
        'account_type' => $request->input('account_type'),
        'link_page' => $request->input('link_page'),
        'link_group' => $request->input('link_group'),
        'country' => $request->input('country'),
        'currency' => $request->input('currency'),
        'inn' => $request->input('inn'),
        'fio' => $request->input('fio'),
        'legal_type' => $request->input('legal_type'),
        'email' => $request->input('email'),
    ]);

    return redirect()->route('home')->with('success', 'Форма успешно отправлена. Ожидайте ответа от модератора.');
}
}
