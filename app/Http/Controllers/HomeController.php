<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    //Frondend HomeController Page

    public function hello()
    {
        return '<h1>Hello from IMS</h1>';
    }
    //Frondend HomeController Page

    public function student($id)
    {
        $student = Student::findOrFail($id);
        return view('student', 
        ['student' => $student]);
    }
}
