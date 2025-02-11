<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'name',
        'email',
        'phone',
        'password',
        'faculty_id',
        'department_id',
        'status',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    // Relationship with Department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function idCard()
    {
        return $this->hasOne(IDCard::class);
    }

}
