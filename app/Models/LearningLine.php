<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningLine extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function employee() {
        return $this->belongsToMany(Employee::class);
    }
}
