<?php

use App\Http\Controllers\FirstTestController;
use App\Http\Controllers\SecondTestController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('welcome');
// })->name('home');

// get urls...
Route::get("/", function () {
    return view('home');
});

// passing data into the views
Route::get('about', function () {
    $name = 'Tony Shark';
    $email = 'tonyshark@gmail.com';
    // return view('about')->with('name', $name)->with('email', $email);
    // return view('about', compact('name', 'email'));
    return view('about', ['name' => $name, 'email' => $email]);
});


Route::get('contact/{name}', function ($name) {
    return view('contact')->with('name', $name);
});

// loading the view
Route::view('services/{service_name}/{service_no}', 'services');

Route::get('products/{name}/{id}', function ($name, $id) {
    return view('products', compact('name', 'id'));
});

// group routes....
Route::prefix('details')->group(function () {
    Route::get('teacher', function () {
        return "this is about reacher";
    })->name('teacher-details');

    Route::get("student", function () {
        return "this is a student";
    })->name('student-details');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

// routes with parameters
Route::get('student/{id}/{class}', function ($id, $class) {
    return "student id is " . $id . ' and the class is ' . $class;
});

// // using controller
// Route::get('student', [StudentController::class, 'index']);
// Route::get('about-codeshetra', [StudentController::class, 'about']);

// group controllers
Route::controller(StudentController::class)->group(function () {
    Route::get('cadet/{id}/{name}', 'index');
    Route::get('about-codeshetra', 'about');
});

// invokable controller route
Route::get('invoke', FirstTestController::class);

// resource controller route
Route::get('resourceControler', [SecondTestController::class, 'index']);

// fallback route
Route::fallback(function () {
    return "This page was not found. Please try again";
});

// fetching data from the database
Route::get('teachers', [TeacherController::class, 'index']);

// adding data to the teachers table
Route::get('add-teacher', [TeacherController::class, 'add']);

// fetching a single teacher by id
Route::get('teacher/{id}', [TeacherController::class, 'show']);

// updating a teacher by id
Route::get('update-teacher/{id}', [TeacherController::class, 'update']);

// deleting a teacher by id
Route::get('delete-teacher/{id}', [TeacherController::class, 'delete']);

// adding student data - using query builder
Route::get('add-student', [StudentController::class, 'addData']);

// fetching all students data using query builder
Route::get('get-students', [StudentController::class, 'getData']);

// updating student data using query builder
Route::get('update-student', [StudentController::class, 'updateData']);

// deleting student data using query builder
Route::get('delete-student', [StudentController::class, 'deleteData']);

// getting all students where the agae is less than 20
Route::get('where-clause-1', [StudentController::class, 'whereClase1']);

// getting all students where the age is less than 20 or female
Route::get('where-clause-2', [StudentController::class, 'whereClase2']);

// getting all the students where age is less than 20 and marks is between 50 and 60
Route::get('where-clause-3', [StudentController::class, 'whereclase3']);

// getting all students between 18 and 25 year
Route::get('where-clause-4', [StudentController::class, 'whereClause4']);

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
