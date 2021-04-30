<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkDay extends Model
{
    use HasFactory;

    protected $table = 'work_day';

    protected $fillable = [
        'employee_id',
        'day_id',
    ];

    public function employee() {
        return $this->belongsTo(Employee::class);
    }

    public function day() {
        return $this->belongsTo(DayOfWeek::class);
    }
}
