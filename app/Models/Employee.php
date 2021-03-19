<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employee';

    protected $fillable = [
        'username',
        'firstname',
        'lastname',
        'department',
        'phoneNumber',
        'linkedInUrl',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withTimestamps();
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department', 'department')->withTimestamps();
    }

    public function lectorate()
    {
        return $this->belongsToMany(Lectorate::class)->withTimestamps();
    }

    public function hobby()
    {
        return $this->belongsToMany(Hobby::class)->withTimestamps();;
    }

    public function course()
    {
        return $this->belongsToMany(Course::class)->withTimestamps();;
    }

    public function minor()
    {
        return $this->belongsToMany(Minor::class)->withTimestamps();;
    }

    public function learningLine()
    {
        return $this->belongsToMany(LearningLine::class)->withTimestamps();;
    }

    public function expertise()
    {
        return $this->belongsToMany(Expertise::class)->withTimestamps();
    }
}
