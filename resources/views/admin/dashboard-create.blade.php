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

      @if ($errors->any())

        <div class="mb-6 rounded-lg bg-red-100 px-4 py-3 text-red-800">
          <p class="font-medium">
            Please correct the following errors:
          </p>

          <ul class="mt-2 list-disc pl-5">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>

      @endif

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
        {{-- Student Type --}}
        <div class="mb-4">
          <label for="student_type" class="mb-2 block text-sm font-medium text-gray-700">
            Student Type
          </label>

          <select id="student_type" name="student_type"
            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3">
            <option value="">Select student type</option>
            <option value="Secondary">Secondary School</option>
            <option value="University">University</option>
          </select>
        </div>

        {{-- Institution --}}
        <div class="mb-4">
          <label for="institution_id" class="mb-2 block text-sm font-medium text-gray-700">
            Institution
          </label>

          <select id="institution_id" name="institution_id"
            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3">
            <option value="">Select institution</option>

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