@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
  <div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-900">
      Admin Dashboard
    </h1>

    <p class="mt-2 text-sm text-gray-500">
      Welcome to your Internship Managament System.
      Here is an overview of your institution's activities
    </p>
  </div>
  <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4">
    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
      <p class="text-sm font-medium text-gray-500">
        Total Students
      </p>

      <p class="mt-3 text-3xl font-bold text-gray-900">
        {{ $totalStudents }}
      </p>

      <p class="mt-2 text-sm text-gray-500">
        Registered Students
      </p>

    </div>

    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
      <p class="text-sm font-medium text-gray-500">
        Instutitions
      </p>

      <p class="mt-3 text-3xl font-bold text-gray-900">
        {{ $totalInstitutions }}
      </p>

      <p class="mt-2 text-sm text-gray-500">
        Registered Students
      </p>
    </div>

    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
      <p class="text-sm font-medium text-gray-500">
        Internships
      </p>

      <p class="mt-3 text-3xl font-bold text-gray-900">
        {{ $totalInterships }}
      </p>

      <p class="mt-2 text-sm text-gray-500">
        Internship Records
      </p>

    </div>

    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
      <p class="text-sm font-medium text-gray-500">
        Payments
      </p>

      <p class="mt-3 text-3xl font-bold text-gray-900">
        {{ $totalPayments }}
      </p>

      <p class="mt-2 text-sm text-gray-500">
        Payment records
      </p>
    </div>


  </div>

  <div class="mt-8 rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
    <h2 class="text-lg font-semibold text-gray-900">
      Administration
    </h2>

    <p class="mt-2 text-sm text-gray-500">
      Use the sidebar to navigate the management system.
    </p>
  </div>

@endsection