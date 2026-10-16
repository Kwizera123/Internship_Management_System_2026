@extends('layouts.app')
@section('title', 'Students')
@section('content')

  <div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-900">
      Student Management
    </h1>

    <p class="mt-2 text-sm text-gray-500">
      View and manage registered students.
    </p>
  </div>
  <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
    <h2 class="text-lg font-semibold text-gray-900">
      Registered Students
    </h2>
    <p class="mt-2 text-sm text-gray-500">
      Your student record will appear here.

    <div class="overflow-x-auto">
      <table class="w-full text-left text-sm">
        <thead class="border-b border-gray-200 bg-gray-50 text-gray-500">
          <tr>
            <th class="px-4 py-3 font-medium">Student Number</th>
            <th class="px-4 py-3 font-medium">Full Name</th>
            <th class="px-4 py-3 font-medium">Student Type</th>
            <th class="px-4 py-3 font-medium">Institution</th>
          </tr>
        </thead>

        <tbody class="divide-y divide-gray-100">
          @forelse ($students as $student)
            <tr class="hover:bg-gray-50">
              <td class="px-4 py-4 font-medium text-gray-900">
                {{ $student->student_number }}
              </td>

              <td class="px-4 py-4 text-gray-700">
                {{ $student->first_name }} {{ $student->last_name }}
              </td>

              <td class="px-4 py-4 text-gray-700">
                {{ $student->student_type }}
              </td>

              <td class="px-4 py-4 text-gray-700">
                —
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="px-4 py-8 text-center text-gray-500">
                No students have been registered yet.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    </p>
  </div>
@endsection