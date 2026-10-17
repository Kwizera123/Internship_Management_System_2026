@extends('layouts.app')
@section('title', 'Add Student')
@section('content')
  <div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-900">
      Add Student
    </h1>
    <p class="mt-2 text-sm text-gray-500">
      Register anew student in the system.
    </p>
  </div>

  <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
    <form action="{{ route('admin.students.store') }}" method="POST">
      @csrf
      <h2 class="text-lg font-semibold text-gray-900">
        Student Information
      </h2>

      <div class="mt-6">
        <label for="student_number" class="mb-2 block text-sm font-medium text-gray-700">
          Student Number
        </label>
        <input type="text" name="student_number" id="student_number" placeholder="e.g. STU-002"
          class="w-full rounded-lg border border-gray-300 px-4 py-3">
      </div>

      <div class="mt-6">
        <label for="first_name" class="mb-2 block text-sm font-medium text-gray-700">
          First Name
        </label>

        <input type="text" id="first_name" name="first_name" placeholder="Enter first name"
          class="w-full rounded-lg border border-gray-300 px-4 py-3">
      </div>


      <div class="mt-6">
        <label for="last_name" class="mb-2 block text-sm font-medium text-gray-700">
          Last Name
        </label>

        <input type="text" id="last_name" name="last_name" placeholder="Enter last name"
          class="w-full rounded-lg border border-gray-300 px-4 py-3">
      </div>


      <div class="mt-6">
        <label for="student_type" class="mb-2 block text-sm font-medium text-gray-700">
          Student Type
        </label>

        <select id="student_type" name="student_type" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3">
          <option value="">Select student type</option>

          @foreach ($institutions as $institution)

            <option value="{{ $institution->id }}">
              {{ $institution->name }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="mt-8 flex items-center gap-3">
        <button class="rounded-lg bg-slate-900 px-5 py-3 text-sm font-medium text-white hover:bg-slate-700">
          Save Student
        </button>

        <a href="{{ route('admin.students') }}"
          class="rounded-lg border border-gray-300 px-5 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50">
          Cancel
        </a>
      </div>
    </form>
  </div>
@endsection