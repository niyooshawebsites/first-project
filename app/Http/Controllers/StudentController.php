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
        // ----------------QUERY BUILDER----------------
        // deleting student data using query builder
        // $items = DB::table('students')->where('id', 100)->delete();

        // ----------------ELOQUENT ORM----------------
        $result = Student::findorFail(55);
        $result->delete();
        return response('Student data deleted successfully', 200);
    }

    // and where clause example
    public function whereClase1()
    {
        // fetching all students where age is less than 20
        $result1 = Student::where('age', '<', 20)->count();
        $result2 = Student::where('age', '<', 20)->where('gender', 'm')->get();
        return response()->json([
            'count' => $result1,
            'students' => $result2
        ], 200)->withHeaders([
            'content-type' => 'application/json',
            'foo' => 'bar',
        ]);
    }

    // orWhre clause example
    public function whereClase2()
    {
        // fetching all students where age is less than 20 or female
        $result = Student::where('age', '<', 20)->orWhere('gender', 'f')->get();
        return response()->json($result, 200)->withHeaders([
            'Content-Type' => 'application/json'
        ]);
    }

    public function whereClase3()
    {
        $result = Student::where('age', '>', 25)->where(function ($query) {
            $query->where('score', '>', 50)->orWhere('score', '<', 60);
        })->get();

        return response()->json($result, 200)->withHeaders([
            'Content-Type' => 'application/json'
        ]);
    }

    public function whereClause4()
    {
        // $result = Student::where('age', '>', 18)->where('age', '<', 25)->count();
        // $result = Student::whereBetween('age', [19, 24])->count();
        $result = Student::whereNotBetween('age', [19, 24])->count();
        return response()->json($result, 200)->withHeaders([
            'Content-Type' => 'application/json',
        ]);
    }

    // finding mutiple records using whereIn clause
    public function whereinClause()
    {
        // $result = Student::whereIn('id', [1, 2, 3, 4, 5])->get();
        $result = Student::whereNotIn('id', [1, 2, 3, 4, 5])->get();
        return response()->json($result, 200)->withHeaders([
            'Content-Type' => 'application/json',
        ]);
    }
}
