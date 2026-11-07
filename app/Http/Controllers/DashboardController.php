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

    public function students(Request $request)
    {
        $search = $request->input('search');

        $institutionId = $request->input('institution_id');

        $studentType = $request->input('student_type');

        $sortBy = $request->input('sort_by', 'student_number');

        $direction = $request->input('direction', 'asc');

        $allowedColumns = ['student_number', 'first_name'];

        if (! in_array($sortBy, $allowedColumns, true)) {
            $sortBy = 'student_number';
        }

        if (! in_array($direction, ['asc', 'desc'], true)) {
            $direction = 'asc';
        } 

        $students = Student::where(function ($query) use ($search) {
        $query->where('first_name', 'like', "%{$search}%")
        ->orWhere('last_name', 'like', "%{$search}%")
        ->orWhere('student_number', 'like', "%{$search}%");
        })

        ->when($institutionId, function ($query) use ($institutionId) {
            $query->where('institution_id', $institutionId);
         })

         ->when($studentType, function ($query) use ($studentType) {
            $query->where('student_type', $studentType);
        })

       ->when($sortBy === 'student_number', function ($query) use ($direction) {
            $query->orderByRaw("CAST(SUBSTRING(student_number, 5) AS UNSIGNED) {$direction}");
        })
        ->when($sortBy === 'first_name', function ($query) use ($direction) {
            $query->orderBy('first_name', $direction);
        })


        ->paginate(10)
        ->withQueryString();

        $institutions = Institution::orderBy('name')->get();

        return view('admin.students', [
            'students' => $students,
            'search' => $search,
            'sortBy' => $sortBy,
            'direction' => $direction,
            'institutions' => $institutions,
        ]);
    }
    // End Method

    public function createStudent()
    {
        $institutions = Institution::all();

        return view('admin.dashboard-create', [
            'institutions' => $institutions,
        ]);
    }

    public function storeStudent(Request $request)
    {
        $validated = $request->validate([
            'student_number' => ['required', 'string', 'max:50', 'unique:students,student_number'],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'student_type' => ['required', 'in:secondary,university'],
            'institution_id' => ['required', 'exists:institutions,id'],
        ],[
            'student_number.required' => 'Please enter the student number.',
            'student_number.unique' => 'This student number is already registered.',
            'first_name.required' => 'Please enter the student\'s first name.',
            'last_name.required' => 'Please enter the student\'s last name.',
            'student_type.required' => 'Please select a student type.',
            'institution_id.required' => 'Please select an institution.',
            'institution_id.exists' => 'The selected institution is invalid.',
        ]);

        $student = Student::create($validated);

        return redirect()
            ->route('admin.students')
            ->with('success', 'Student registered successfully.');
    }// End method

    public function editStudent(Student $student)
    {
        $institutions = Institution::all();

        return view('admin.students-edit', [
            'student' => $student,
            'institutions' => $institutions,
        ]);
    }// end method

    public function updateStudent(Request $request, Student $student)
    {
        $validated = $request->validate([
            'student_number' => [
                'required',
                'string',
                'max:50',
                'unique:students,student_number,' . $student->id,
            ],

            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'student_type' => ['required', 'in:secondary,university'],
            'institution_id' => ['required', 'exists:institutions,id'],
        ], [
            'student_number.required' => 'Please enter the student number.',
            'student_number.unique' => 'This student number is already registered.',
            'first_name.required' => 'Please enter the student\'s first name.',
            'last_name.required' => 'Please enter the student\'s last name.',
            'student_type.required' => 'Please select a student type.',
            'institution_id.required' => 'Please select an institution.',
            'institution_id.exists' => 'The selected institution is invalid.',
        ]);

        $student->update($validated);

        return redirect()
            ->route('admin.students')
            ->with('success', 'Student updated successfully');
    } // End method



    public function student()
    {
        return view('student.dashboard');
    }
}
