<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function allowTo($ability)
    {
        $this->abilities()->save($ability);
    }

    public function abilities()
    {
        return $this->belongsToMany(Ability::class)->withTimestamps();
    }
}
