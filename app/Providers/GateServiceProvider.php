<?php
namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class GateServiceProvider extends ServiceProvider
{
    const ROLE_ADMIN = 'Admin';
    const ROLE_SUPPORT = 'Support';
    const ROLE_CLIENT = 'Client';

    public function boot(): void
    {
        $rules = [
            'access-admin-dashboard' => [self::ROLE_ADMIN, self::ROLE_SUPPORT],
            'access-client-dashboard' => [self::ROLE_CLIENT, self::ROLE_ADMIN, self::ROLE_SUPPORT],
            'edit-roles' => [self::ROLE_ADMIN],
        ];

        foreach ($rules as $ability => $roles) {
            Gate::define($ability, fn(User $user) => $this->userHasRole($user, $roles));
        }
    }

    private function userHasRole(User $user, array $roles): bool
    {
        static $cachedRoles;

        if (!$cachedRoles) {
            $cachedRoles = $user->roles->pluck('name');
        }

        return $cachedRoles->intersect($roles)->isNotEmpty();
    }
}
