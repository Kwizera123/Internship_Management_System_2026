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

    <form action="{{ route('admin.organizations') }}" method="GET" class="mt-6">
      <div class="flex flex-wrap items-center gap-2">

        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search organizations by name..."
          class="min-w-0 flex-1 rounded-lg border border-gray-300 px-4 py-3">

        <select name="type" class="rounded-lg border border-gray-300 px-4 py-3">
          <option value="">All Organization Types</option>

          <option value="company" @selected(request('type') === 'company')>
            Company
          </option>

          <option value="government" @selected(request('type') === 'government')>
            Government
          </option>

          <option value="ngo" @selected(request('type') === 'ngo')>
            NGO
          </option>

          <option value="educational_institution" @selected(request('type') === 'educational_institution')>
            Educational Institution
          </option>

          <option value="other" @selected(request('type') === 'other')>
            Other
          </option>
        </select>

        <button type="submit" class="rounded-lg bg-blue-600 px-5 py-3 text-white hover:bg-blue-700">
          Search
        </button>

        <a href="{{ route('admin.organizations') }}"
          class="rounded-lg bg-gray-200 px-5 py-3 text-gray-700 hover:bg-gray-300">
          Clear Filters
        </a>

      </div>

    </form>

    <div class="mt-8 overflow-hidden rounded-xl bg-white shadow">
      <table class="w-full text-left">
        <thead class="bg-gray-100">
          <tr>
            <th class="px-6 py-4">Organization Name</th>
            <th class="px-6 py-4">Organization Type</th>
            <th class="px-6 py-4">Email</th>
            <th class="px-6 py-4">Phone</th>
            <th class="px-6 py-4">Actions</th>
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

              <td class="space-x-2 whitespace-nowrap px-6 py-4">

                <a href="{{ route('admin.organizations.edit', $organization->id) }}"
                  class="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                  Edit
                </a>

                <form action="{{ route('admin.organizations.destroy', $organization) }}" method="POST" class="inline"
                  onsubmit="return confirm('Are you sure you want to delete this organization?')">

                  @csrf
                  @method('DELETE')

                  <button type="submit" class="rounded-lg bg-red-600 px-4 py-2 text-white hover:bg-red-700">
                    Delete
                  </button>
                </form>

              </td>

              </td>

            </tr>
          @empty
            <tr>
              <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                @if (request('search'))
                  No organizations found matching "{{ request('search') }}".
                @else
                  No organizations registered yet.
                @endif
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