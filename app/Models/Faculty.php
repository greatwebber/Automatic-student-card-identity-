<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    // Relationship with Students
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}

