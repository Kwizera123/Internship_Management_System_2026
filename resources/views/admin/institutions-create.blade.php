@extends('layouts.app')

@section('content')
  <div class="mx-auto max-w-3xl px-6 py-8">

    <h1 class="text-2xl font-bold text-gray-900">
      Register New Institution
    </h1>

    <p class="mt-2 text-gray-600">
      Enter the details of the institution you want to register.
    </p>
    @if ($errors->any())
      <div class="mt-4 rounded-lg bg-red-100 p-4 text-red-700">
        @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif

    <form action="{{ route('admin.institutions.store') }}" method="POST" class="mt-8 space-y-6">

      @csrf

      <div>
        <label class="mb-2 block font-medium text-gray-700">
          Institution Name
        </label>

        <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter institution name"
          class="w-full rounded-lg border border-gray-300 px-4 py-3">
      </div>

      <div>
        <label class="mb-2 block font-medium text-gray-700">
          Institution Type
        </label>

        <select name="type" class="w-full rounded-lg border border-gray-300 px-4 py-3">
          <option value="">Select institution type</option>
          <option value="secondary_school" @selected(old('type') === 'secondary_school')>
            Secondary School
          </option>
          <option value="university" @selected(old('type') === 'university')>
            University
          </option>
        </select>
      </div>

      <button type="submit" class="rounded-lg bg-slate-900 px-6 py-3 text-white hover:bg-slate-700">
        Register Institution
      </button>

      <a href="{{ route('admin.institutions') }}"
        class="rounded-lg bg-red-600 border border-gray-300 px-5 py-3 text-white hover:bg-red-400">
        Cancel
      </a>

    </form>

  </div>
@endsection