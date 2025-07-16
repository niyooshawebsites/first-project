<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    //
    use HasFactory;

    public function student_details()
    {
        return $this->hasMany(Student::class, 'class_id');
    }

    public function teacher_details()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
