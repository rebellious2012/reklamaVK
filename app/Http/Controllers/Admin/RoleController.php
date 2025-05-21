<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        // Получаем все роли
        $roles = Role::all();

        // Возвращаем представление со списком ролей
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Валидируем данные из формы
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string',
        ]);

        // Создаем новую роль
        Role::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        // Перенаправляем на список ролей с успешным сообщением
        return redirect()->route('roles.index')->with('success', 'Роль создана успешно!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        // Находим роль по ID
        $role = Role::findOrFail($id);

        // Возвращаем представление для показа роли
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        // Находим роль по ID
       // $role = Role::findOrFail($id);

        // Возвращаем представление для редактирования роли
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role): \Illuminate\Http\RedirectResponse
    {
        // Валидируем данные из формы
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string',
        ]);

        // Находим роль по ID и обновляем ее
       // $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        // Перенаправляем на список ролей с успешным сообщением
        return redirect()->route('roles.index')->with('success', 'Роль обновлена успешно!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): \Illuminate\Http\RedirectResponse
    {
        // Находим роль по ID и удаляем ее
       // $role = Role::findOrFail($id);
        $role->delete();

        // Перенаправляем на список ролей с успешным сообщением
        return redirect()->route('roles.index')->with('success', 'Роль удалена успешно!');
    }
}
