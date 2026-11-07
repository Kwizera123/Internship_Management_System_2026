@extends('layouts.app')

@section('content')
  <div class="mx-auto max-w-7xl px-6 py-8">

    <h1 class="text-2xl font-bold text-gray-900">
      Institution Management
    </h1>
    <a href="{{ route('admin.institutions.create') }}"
      class="mt-4 inline-block rounded-lg bg-slate-900 px-5 py-3 text-white hover:bg-slate-700">
      + Add Institution
    </a>

    <p class="mt-2 text-gray-600">
      Manage universities and secondary schools registered in the IMS.
    </p>

    <div class="mt-8 overflow-hidden rounded-xl bg-white shadow">

      <table class="w-full text-left">

        <thead class="bg-gray-100">
          <tr>
            <th class="px-6 py-4">Institution Name</th>
            <th class="px-6 py-4">Institution Type</th>
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
                </tr>
          @empty
            <tr>
              <td colspan="2" class="px-6 py-4 text-center">
                No institutions registered yet.
              </td>
            </tr>
          @endforelse
        </tbody>

      </table>

    </div>

  </div>
@endsection