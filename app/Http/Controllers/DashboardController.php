<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Institution;
use App\Models\Internship;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('student.dashboard');
    }
    //end Method

    public function admin()
    {
        $totalStudents = Student::count();
        $totalInstitutions = Institution::count();
        $totalInterships = Internship::count();
        $totalPayments = Payment::count();

        return view('admin.dashboard', [
            'totalStudents' => $totalStudents,
            'totalInstitutions' => $totalInstitutions,
            'totalInterships' => $totalInterships,
            'totalPayments' => $totalPayments,
        ]);

    }// End Method

    public function students()
    {
        $students = Student::all();

        return view('admin.students', [
            'students' => $students,
        ]);
    }// End Method

    public function student()
    {
        return view('student.dashboard');
    }
}
