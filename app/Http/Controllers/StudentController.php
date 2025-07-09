<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    // protected $nationality;
    // protected $age;
    // protected $id;
    // protected $name;

    // // constructor function
    // public function __construct(){
    //     $this->nationality = 'Nepalese';
    //     $this->age = 25;
    // }

    // // index method
    // public function index($id, $name){
    //     // return 'Cadet details: ID = ' . $id . ' and Name = ' . $name;
    //     $this->id = $id;
    //     $this->name = $name;
    //     return $this->confidentialInfo();
    // }

    // // about method
    // public function about(){
    //     return $this->confidentialInfo();
    // }

    // private function confidentialInfo(){
    //     return view('cadet', [
    //         'id' => $this->id,
    //         'name' => $this->name,
    //         'nationality' => $this->nationality,
    //         'age' => $this->age
    //     ]);
    // }

    // adding data to the students table 
    public function addData()
    {
        // ----------------QUERY BUILDER----------------
        // DB::table('students')->insert([
        //     [
        //         'name' => 'Oliver Tuist',
        //         'email' => 'ot@gmail.com',
        //         'age' => 22,
        //         'DOB' => '2001-05-15',
        //         'gender' => 'f',
        //     ],
        //     [
        //         'name' => 'James Cameron',
        //         'email' => 'jc@gmail.com',
        //         'age' => 25,
        //         'DOB' => '2001-02-15',
        //         'gender' => 'm',
        //     ]
        // ]);

        // ----------------ELOQUENT ORM----------------
        $result = new Student();
        $result->name = 'Will Smith';
        $result->email = 'willSmith@gmail.com';
        $result->age = 30;
        $result->DOB = '1993-01-01';
        $result->gender = 'm';
        $result->save();

        return response('Student data added successfully!', 200);
    }

    // function for getting student data
    public function getData()
    {
        // ----------------QUERY BUILDER----------------

        // Fetching all items from the students table
        // $result = DB::table('students')->get();

        // getting the first two items from the students table
        // $result = DB::table('students')->limit(2)->get();

        // getting the first item from the students table
        // $result = DB::table('students')->first();

        // getting the last item from the students table
        // $result = DB::table('students')->orderBy('id', 'desc')->first();

        // getting students data using conditions using the multile where clause and select clause
        // $result = DB::table('students')->where('id', '>=', '100')->where('email', 'ot@gmail.com')->select('id', 'name')->get();

        // getting the total number of records in the students table
        // $result = DB::table('students')->count();

        // getting the total number of records in the students table with a condition
        // $result = DB::table('students')->where('age', '<', 20)->count();

        // getting the maximum age of the students
        // $result = DB::table('students')->max('age');

        // getting the minimum age of the students
        // $result = DB::table('students')->min('age');

        // getting the average age of the students
        // $result = DB::table('students')->avg('age');

        // ----------------ELOQUENT ORM----------------
        // getting all students data using Eloquent ORM
        // $result = Student::all();

        // getting only selective columns from the students table
        // $result = Student::select('id', 'name')->where('id', '>', 100)->get();
        // $result = Student::select('id', 'name')->find(55);
        $result = Student::find(55);
        return $result;
    }

    // function for updating student data
    public function updateData()
    {
        // ----------------QUERY BUILDER----------------
        // updating students data using query builder
        // $items = DB::table('students')->where('id', 102)->update([
        //     'email' => 'jamescameron@gmail.com',
        // ]);
        // return response('Student data updated successfully', 200);

        // ----------------ELOQUENT ORM----------------
        $result = Student::find(103);
        $result->name = 'Will Turner';
        $result->email = 'willturner@gmail.com';
        $result->update();

        return response('Student data updated successfully', 200);
    }

    // function for deleting student data
    public function deleteData()
    {
        $items = DB::table('students')->where('id', 100)->delete();
        return response('Student data deleted successfully', 200);
    }
}
