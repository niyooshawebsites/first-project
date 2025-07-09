<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $nationality;
    protected $age;
    protected $id;
    protected $name;
    
    // constructor function
    public function __construct(){
        $this->nationality = 'Nepalese';
        $this->age = 25;
    }

    // index method
    public function index($id, $name){
        // return 'Cadet details: ID = ' . $id . ' and Name = ' . $name;
        $this->id = $id;
        $this->name = $name;
        return $this->confidentialInfo();
    }

    // about method
    public function about(){
        return $this->confidentialInfo();
    }

    private function confidentialInfo(){
        return view('cadet', [
            'id' => $this->id,
            'name' => $this->name,
            'nationality' => $this->nationality,
            'age' => $this->age
        ]);
    }
}
