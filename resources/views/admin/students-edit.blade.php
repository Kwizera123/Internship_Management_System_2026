@extends('layouts.app')
@section('title', 'Edit Student')
@section('content')
  <h2>Edit Student</h2>
  <p>Update the student's information below</p>

  <form action="#" method="POST" class="max-w-xl space-y-5">
    @csrf

    <div>
      <label for="student_number" class="mb-1 block text-sm font-medium text-gray-700">
        Student Number
      </label>
      <input type="text" id="student_number" name="student_number"
        value="{{ old('student_number', $student->student_number) }}"
        class="w-full rounded-lg border border-gray-300 px-4 py-2">
    </div>

    <div>
      <label for="first_name" class="mb-1 block text-sm font-medium text-gray-700">
        First Name
      </label>
      <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $student->first_name) }}"
        class="w-full rounded-lg border border-gray-300 px-4 py-2">
    </div>

    <div>
      <label for="last_name" class="mb-1 block text-sm font-medium text-gray-700">
        Last Name
      </label>
      <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $student->last_name) }}"
        class="w-full rounded-lg border border-gray-300 px-4 py-2">
    </div>
  </form>

@endsection