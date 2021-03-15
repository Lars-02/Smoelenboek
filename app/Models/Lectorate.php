<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lectorate extends Model
{
    use HasFactory;

    protected $table = 'lectorate';

    public function employee() {
        return $this->belongsToMany(Employee::class);
    }
}
