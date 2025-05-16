<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'unit_id', 'grade'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}

