<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';

    public function allowTo($ability)
    {
        $this->abilities()->save($ability);
    }

    public function ability()
    {
        return $this->belongsToMany(Ability::class)->withTimestamps();
    }

    public function employee() {
        return $this->belongsToMany(Employee::class, "role_user", "role_id", "user_id");
    }
}
