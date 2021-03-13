<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department', 'department');
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

    public function expertise()
    {
        return $this->belongsToMany(Expertise::class);
    }
}
