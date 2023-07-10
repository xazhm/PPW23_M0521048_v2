<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'username', 'role'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'account_role');
    }

    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }
}