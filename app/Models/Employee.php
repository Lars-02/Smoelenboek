<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'phoneNumber',
        'linkedInUrl',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function roles()
    {
        return $this->hasManyThrough(Role::class, User::class);
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, "employee_department");
    }

    public function lectorates()
    {
        return $this->belongsToMany(Lectorate::class);
    }

    public function hobbies()
    {
        return $this->belongsToMany(Hobby::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function minors()
    {
        return $this->belongsToMany(Minor::class);
    }

    public function learningLines()
    {
        return $this->belongsToMany(LearningLine::class);
    }

    public function expertises()
    {
        return $this->belongsToMany(Expertise::class);
    }

    public function workDays()
    {
        return $this->belongsToMany(WorkDay::class);
    }

    public function getFullNameAttribute($value)
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}
