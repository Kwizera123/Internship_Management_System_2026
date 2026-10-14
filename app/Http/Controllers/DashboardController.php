<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('admin.dashboard');

    }// End Method

    public function student()
    {
        return view('student.dashboard');
    }
}
