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
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department', 'department');
    }

    public function lectorate()
    {
        return $this->belongsToMany(Lectorate::class);
    }

    public function hobby()
    {
        return $this->belongsToMany(Hobby::class);
    }

    public function course()
    {
        return $this->belongsToMany(Course::class);
    }

    public function minor()
    {
        return $this->belongsToMany(Minor::class);
    }

    public function learningLine()
    {
        return $this->belongsToMany(LearningLine::class);
    }

    public function expertise()
    {
        return $this->belongsToMany(Expertise::class);
    }
}
