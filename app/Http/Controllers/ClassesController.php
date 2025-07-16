<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    //
    public function index()
    {
        return Classes::with('student_details', 'teacher_details')->get();
    }
}
