<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkHour extends Model
{
    use HasFactory;

    protected $table = 'work_hour';

    public function employee() {
        return $this->belongsToMany(Employee::class);
    }
}
