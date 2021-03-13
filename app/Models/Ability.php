<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    use HasFactory;
    
    protected $table = 'ability';

    public function role() {
        return $this->belongsToMany(Role::class);
    }
}
