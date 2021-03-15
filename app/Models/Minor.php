<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minor extends Model
{
    use HasFactory;

    protected $table = 'minor';

    public function employee() {
        return $this->belongsToMany(Employee::class);
    }
}
