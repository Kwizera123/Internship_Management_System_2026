@extends('layouts.app')
@section('title', 'Edit Student')
@section('content')
  <h2>Edit Student</h2>
  <p>Update the student's information below</p>

  <form action="{{ route('admin.students.update', $student) }}" method="POST" class="max-w-xl space-y-5">
    @csrf
    @method('PUT')

    <div>
      <label for="student_number" class="mb-1 block text-sm font-medium text-gray-700">
        Student Number
      </label>
      <input type="text" id="student_number" name="student_number"
        value="{{ old('student_number', $student->student_number) }}"
        class="w-full rounded-lg border border-gray-300 px-4 py-2">

      @error('student_number')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="first_name" class="mb-1 block text-sm font-medium text-gray-700">
        First Name
      </label>
      <input type="text" id="first_name" value="{{ old('first_name', $student->first_name) }}" name="first_name"
        value="{{ old('first_name', $student->first_name) }}" class="w-full rounded-lg border border-gray-300 px-4 py-2">

      @error('first_name')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="last_name" class="mb-1 block text-sm font-medium text-gray-700">
        Last Name
      </label>
      <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $student->last_name) }}"
        class="w-full rounded-lg border border-gray-300 px-4 py-2">

      @error('last_name')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
      @enderror
    </div>


    <div>
      <label for="student_type" class="mb-1 block text-sm font-medium text-gray-700">
        Student Type
      </label>

      <select id="student_type" name="student_type" class="w-full rounded-lg border border-gray-300 px-4 py-2">
        <option value="secondary" @selected(old('student_type', $student->student_type) === 'secondary')>
          Secondary School
        </option>

        <option value="university" @selected(old('student_type', $student->student_type) === 'university')>
          University
        </option>
      </select>

      @error('student_type')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
      @enderror

    </div>

    <div>
      <label for="institution_id" class="mb-1 block text-sm font-medium text-gray-700">
        Institution
      </label>

      <select id="institution_id" name="institution_id" class="w-full rounded-lg border border-gray-300 px-4 py-2">
        @foreach ($institutions as $institution)
          <option value="{{ $institution->id }}" @selected((string) old('institution_id', $student->institution_id) === (string) $institution->id)>
            {{ $institution->name }}
          </option>
        @endforeach
      </select>

      @error('institution_id')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
      @enderror

    </div>


    <div class="flex items-center gap-3 pt-3">
      <button type="submit" class="rounded-lg bg-indigo-600 px-5 py-2 font-medium text-white hover:bg-indigo-700">
        Save Changes
      </button>

      <a href="{{ route('admin.students') }}"
        class="rounded-lg border border-gray-300 px-5 py-2 font-medium text-gray-700 hover:bg-gray-100">
        Cancel
      </a>
    </div>


  </form>

@endsection