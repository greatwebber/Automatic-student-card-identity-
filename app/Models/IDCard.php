<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IDCard extends Model
{
    use HasFactory;

    protected $table = 'id_cards';

    protected $fillable = ['student_id', 'issue_date', 'photo','signature'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
