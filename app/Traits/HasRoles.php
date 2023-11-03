<?php

namespace App\Traits;

trait HasRoles
{
    public function hasRole(string $roles): bool
    {
        return $this->roles()->whereName($roles)->exists();
    }

    public function hasRoles(array $names): bool
    {
        return $this->roles()->whereIn('name', $names)->exists();
    }


    public function hasPermission(string $permissions): bool
    {
        return $this->roles()
                ->whereHas('permissions', function($query) use ($permissions) {
                    $query->whereName($permissions);
                })
                ->exists();
    }
}
