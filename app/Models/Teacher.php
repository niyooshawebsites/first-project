<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    use HasFactory;

    public function user_details()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function class_details()
    {
        return $this->hasMany(Classes::class, 'teacher_id');
    }
}
