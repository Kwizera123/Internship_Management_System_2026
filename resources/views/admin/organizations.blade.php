@extends('layouts.app')

@section('content')

  <div class="mx-auto max-w-7xl px-6 py-8">

    <h1 class="text-2xl font-bold text-gray-900">
      Organization Management
    </h1>

    @if (session('success'))
      <div class="mt-4 rounded-lg bg-green-100 p-4 text-green-700">
        {{ session('success') }}
      </div>
    @endif

    <p class="mt-2 text-gray-600">
      Manage organizations registered in the Internship Management System.
    </p>

    <a href="{{ route('admin.organizations.create') }}"
      class="mt-4 inline-block rounded-lg bg-slate-900 px-5 py-3 text-white hover:bg-slate-700">
      + Add Organization
    </a>

    <div class="mt-8 overflow-hidden rounded-xl bg-white shadow">
      <table class="w-full text-left">
        <thead class="bg-gray-100">
          <tr>
            <th class="px-6 py-4">Organization Name</th>
            <th class="px-6 py-4">Organization Type</th>
            <th class="px-6 py-4">Email</th>
            <th class="px-6 py-4">Phone</th>
          </tr>
        </thead>

        <tbody>
          @forelse ($organizations as $organization)
            <tr class="border-t">
              <td class="px-6 py-4">
                {{ $organization->name }}
              </td>

              <td class="px-6 py-4">
                {{ $organization->type }}
              </td>

              <td class="px-6 py-4">
                {{ $organization->email }}
              </td>

              <td class="px-6 py-4">
                {{ $organization->phone }}
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="px-6 py-4 text-center">
                No organizations registered yet.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-6">
      {{ $organizations->links() }}
    </div>

  </div>

@endsection