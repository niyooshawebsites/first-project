<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //fetching all the users
    public function index()
    {
        // fetching all the users at one
        // $result = User::all();

        // fetching all the users with student data
        // $result = User::with('studentDetails', 'teacherDetails')->get();

        // get all the teahers with user data
        $result = Teacher::with('user_details')->get();
        // $result = Student::with('user_details')->get();
        return $result;
    }
}
