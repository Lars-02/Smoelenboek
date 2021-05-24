<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function allowTo($ability)
    {
        $this->abilities()->save($ability);
    }

    public function abilities()
    {
        return $this->belongsToMany(Ability::class);
    }

    public function employee() {
        return $this->belongsToMany(Employee::class, "role_user", "role_id", "user_id");
    }
}
