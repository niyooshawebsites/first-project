<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // adding the index method to fetch data from the database
    public function index()
    {
        return Teacher::with('class_details')->get();
    }

    public function add()
    {
        $item = new Teacher();
        $item->name = "John Doe";
        $item->email = 'john@gmail.com';
        $item->phone = '9895465465';
        $item->save();
        return 'Teacher added successfully!';
    }

    public function show($id)
    {
        $item = Teacher::findOrFail($id);
        return $item;
    }

    public function update($id)
    {
        $item = Teacher::findOrFail($id);
        $item->name = 'Jane Doe';
        $item->email = 'jane@gmail.com';
        $item->phone = '9999999999';
        $item->update();
        return 'Teacher updated successfully!';
    }

    public function delete($id)
    {
        $item = Teacher::findorFail($id);
        $item->delete();
        return 'Teacher deleted successfully!';
    }
}
