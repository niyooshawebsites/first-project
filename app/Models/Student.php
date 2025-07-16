<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    //
    use HasFactory;
    use SoftDeletes;

    // hiding particular colums from the public view
    // protected $hidden = ['email', 'DOB'];

    public function scopeGetSpecificStudents($query, $age, $score, $gender = 'm')
    {
        return $query->where('age', $age)->where('score', $score)->where('gender', $gender)->get();
    }

    public function user_details()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function class_details()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
