<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class, "role_user")->withTimestamps();
    }

    public function assignRole($role) {
        $this->roles()->save($role);
    }

    public function ability() {
        return $this->roles()->map->abilites->flatten()->pluck('name')->unique();
    }

    public function employee() {
        return $this->hasOne(Employee::class);
    }

    public function isAdmin() {
        return $this->roles()->where('role_id', 1)->first();
    }
}
