<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class UserGateService
{
    public function getHomePage(): string
    {
        $user = Auth::user();

        if (!$user) {
            return '/';  // Если пользователь не авторизован, перенаправляем на главную страницу
        }

        // Проверяем роли пользователя
        $role = $user->roles->first();

        if ($role) {
            switch ($role->name) {
                case 'Admin':
                    return route('admin.home');
                case 'Client':
                    return route('home');
                default:
                    // Добавьте здесь другие роли, если необходимо
                    break;
            }
        }

        // Если у пользователя нет роли или роль не соответствует известным,
        // возвращаем на главную страницу
        return '/';
    }
}
