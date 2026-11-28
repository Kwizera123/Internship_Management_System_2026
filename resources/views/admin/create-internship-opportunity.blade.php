@extends('layouts.app')

@section('content')

  <div class="mx-auto max-w-4xl px-6 py-8">

    <h1 class="text-2xl font-bold text-gray-900">
      Create Internship Opportunity
    </h1>

    <p class="mt-2 text-gray-600">
      Register a new internship opportunity for eligible students.
    </p>

    <form action="{{ route('admin.internship-opportunities.store') }}" method="POST">
      @csrf

      <div class="mt-6">

        <label for="organization_id" class="block text-sm font-medium text-gray-700">
          Organization
        </label>

        <select name="organization_id" id="organization_id"
          class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2">
          <option value="">Select an organization</option>
          @foreach ($organizations as $organization)

            <option value="{{ $organization->id }}">
              {{ $organization->name }}
            </option>

          @endforeach
        </select>

      </div>

      <div class="mt-6">

        <label for="title" class="block text-sm font-medium text-gray-700">
          Internship Title
        </label>

        <input type="text" name="title" id="title" placeholder="e.g. Software Development Intern"
          class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2">

      </div>

      <div class="mt-6">

        <label for="description" class="block text-sm font-medium text-gray-700">
          Internship Description
        </label>

        <textarea name="description" id="description" rows="5"
          placeholder="Describe the internship responsibilities and activities..."
          class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2"></textarea>

      </div>

      <div class="mt-6">

        <label for="location" class="block text-sm font-medium text-gray-700">
          Internship Location
        </label>

        <input type="text" name="location" id="location" placeholder="e.g. Kigali, Rwanda"
          class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2">

      </div>


      <div class="mt-6">

        <label for="eligibility" class="block text-sm font-medium text-gray-700">
          Student Eligibility
        </label>

        <select name="eligibility" id="eligibility" class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2">
          <option value="">Select student eligibility</option>
          <option value="university">University Students</option>
          <option value="secondary">Secondary School Students</option>
          <option value="both">Both University and Secondary School Students</option>
        </select>

      </div>

      <div class="mt-6">

        <label for="available_positions" class="block text-sm font-medium text-gray-700">
          Available Positions
        </label>

        <input type="number" name="available_positions" id="available_positions" min="1" placeholder="e.g. 5"
          class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2">

      </div>

      <div class="mt-6">

        <label for="application_deadline" class="block text-sm font-medium text-gray-700">
          Application Deadline
        </label>

        <input type="date" name="application_deadline" id="application_deadline"
          class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2">

      </div>

      <div class="mt-8">

        <button type="submit" class="rounded-lg bg-blue-600 px-6 py-3 text-sm font-semibold text-white hover:bg-blue-700">
          Submit Internship Opportunity
        </button>

        <a href="{{ route('admin.internship-opportunities') }}"
          class="rounded-lg bg-red-600 border border-gray-300 px-5 py-3 text-white hover:bg-red-400">
          Cancel
        </a>

      </div>

    </form>

  </div>

@endsection