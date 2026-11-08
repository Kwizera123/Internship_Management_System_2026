@extends('layouts.app')

@section('content')
  <div class="mx-auto max-w-7xl px-6 py-2">

    <h1 class="text-2xl font-bold text-gray-900">
      Institution Management
    </h1>

    @if (session('success'))
      <div class="mt-4 rounded-lg bg-green-100 p-4 text-green-800">
        {{ session('success') }}
      </div>
    @endif

    @if (session('error'))
      <div class="mt-4 rounded-lg bg-red-100 p-4 text-red-800">
        {{ session('error') }}
      </div>
    @endif

    <a href="{{ route('admin.institutions.create') }}"
      class="mt-4 inline-block rounded-lg bg-slate-900 px-5 py-3 text-white hover:bg-slate-700">
      + Add Institution
    </a>


    <p class="mt-2 text-gray-600">
      Manage universities and secondary schools registered in the IMS.
    </p>

    <form action="{{ route('admin.institutions') }}" method="GET" class="mt-6 flex flex-wrap items-center gap-3">

      <input type="text" name="search" value="{{ request('search') }}" placeholder="Search institution name..."
        class="rounded-lg border border-gray-300 px-4 py-3">

      <select name="type" class="rounded-lg border border-gray-300 px-4 py-3">
        <option value="">All Institution Types</option>

        <option value="secondary_school" @selected(request('type') === 'secondary_school')>
          Secondary School
        </option>

        <option value="university" @selected(request('type') === 'university')>
          University
        </option>
      </select>

      <button type="submit" class="rounded-lg bg-slate-900 px-5 py-3 text-white hover:bg-slate-700">
        Search
      </button>

      <a href="{{ route('admin.institutions') }}"
        class="rounded-lg border border-gray-300 px-5 py-3 text-gray-700 hover:bg-gray-100">
        Clear Filters
      </a>

    </form>



    <div class="mt-8 overflow-hidden rounded-xl bg-white shadow">

      <table class="w-full text-left">

        <thead class="bg-gray-100">
          <tr>
            <th class="px-6 py-4">Institution Name</th>
            <th class="px-6 py-4">Institution Type</th>
            <th class="px-6 py-4">Actions</th>
          </tr>
        </thead>

        <tbody>
          @forelse ($institutions as $institution)
                <tr class="border-t">
                  <td class="px-6 py-4">
                    {{ $institution->name }}
                  </td>

                  <td class="px-6 py-4">
                    {{ $institution->type === 'secondary_school'
            ? 'Secondary School'
            : 'University' 
                                                                                                                                                                                                                                                                                                                   }}
                  </td>

                  <td class="px-6 py-4">
                    <div class="flex items-center gap-2">

                      <a href="{{ route('admin.institutions.edit', $institution->id) }}"
                        class="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                        Edit
                      </a>

                      <form action="{{ route('admin.institutions.destroy', $institution->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this institution?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="rounded-lg bg-red-600 px-4 py-2 text-white hover:bg-red-700">
                          Delete
                        </button>
                      </form>

                    </div>
                  </td>

                </tr>
          @empty
            <tr>
              <td colspan="3" class="px-6 py-4 text-center">
                No institutions registered yet.
              </td>
            </tr>
          @endforelse
        </tbody>

      </table>

    </div>

  </div>
@endsection