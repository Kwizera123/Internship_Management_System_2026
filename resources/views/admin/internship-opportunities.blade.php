@extends('layouts.app')

@section('content')

  <div class="mx-auto max-w-7xl px-6 py-8">

    <h1 class="text-2xl font-bold text-gray-900">
      Internship Opportunity Management
    </h1>

    @if (session('success'))
      <div class="mt-4 rounded-lg bg-green-100 p-4 text-green-700">
        {{ session('success') }}
      </div>
    @endif

    <p class="mt-2 text-gray-600">
      Manage internship opportunities submitted by organizations.
    </p>

    <div class="mt-6">
      <a href="#"
        class="inline-block rounded-lg bg-blue-600 px-5 py-2 text-sm font-semibold text-white hover:bg-blue-700">
        + Create Opportunity
      </a>
    </div>

    <div class="mt-8 overflow-x-auto rounded-lg border border-gray-200">

      <table class="w-full text-left text-sm">

        <thead class="bg-gray-100 text-gray-700">
          <tr>
            <th class="px-4 py-3">#</th>
            <th class="px-4 py-3">Title</th>
            <th class="px-4 py-3">Organization</th>
            <th class="px-4 py-3">Eligibility</th>
            <th class="px-4 py-3">Positions</th>
            <th class="px-4 py-3">Deadline</th>
            <th class="px-4 py-3">Approval</th>
            <th class="px-4 py-3">Publication</th>
          </tr>
        </thead>

        <tbody class="divide-y divide-gray-200 bg-white">

          @forelse ($opportunities as $opportunity)

            <tr>
              <td class="px-4 py-3">
                {{ $opportunity->id }}
              </td>

              <td class="px-4 py-3">
                {{ $opportunity->title }}
              </td>

              <td class="px-4 py-3">
                {{ $opportunity->organization->name }}
              </td>

              <td class="px-4 py-3">
                {{ $opportunity->eligibility }}
              </td>

              <td class="px-4 py-3">
                {{ $opportunity->available_positions }}
              </td>

              <td class="px-4 py-3">
                {{ $opportunity->application_deadline }}
              </td>

              <td class="px-4 py-3">
                {{ $opportunity->approval_status }}
              </td>

              <td class="px-4 py-3">
                {{ $opportunity->publication_status }}
              </td>
            </tr>

          @empty

            <tr>
              <td colspan="8" class="px-4 py-8 text-center text-gray-500">
                No internship opportunities have been registered yet.
              </td>
            </tr>

          @endforelse

        </tbody>

      </table>

    </div>

    <div class="mt-6">
      {{ $opportunities->links() }}
    </div>

@endsection