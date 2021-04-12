<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkHour extends Model
{
    use HasFactory;

    protected $table = 'work_hour';

    protected $fillable = [
        'employee_id',
        'start_time',
        'end_time',
        'day',
    ];

    public function employee() {
        return $this->belongsToMany(Employee::class);
    }

    public function week() {
        return $this->belongsTo(DayOfWeek::class, 'day', 'id');
    }
}
