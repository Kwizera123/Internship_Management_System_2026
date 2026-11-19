@extends('layouts.app')

@section('content')

  <div class="mx-auto max-w-3xl px-6 py-8">

    <h1 class="text-2xl font-bold text-gray-900">
      Register Organization
    </h1>

    <p class="mt-2 text-gray-600">
      Register an organization that offers internship opportunities to students.
    </p>

    <form action="{{ route('admin.organizations.store') }}" method="POST" class="mt-8 space-y-6">

      @csrf

      <div>
        <label class="mb-2 block font-medium text-gray-700">
          Organization Name
        </label>

        <input type="text" name="name" class="w-full rounded-lg border border-gray-300 px-4 py-3"
          placeholder="Enter organization name">
      </div>

      <div>
        <label class="mb-2 block font-medium text-gray-700">
          Organization Type
        </label>

        <select name="type" class="w-full rounded-lg border border-gray-300 px-4 py-3">
          <option value="">Select organization type</option>
          <option value="company">Company</option>
          <option value="government">Government Institution</option>
          <option value="ngo">NGO</option>
          <option value="educational_institution">Educational Institution</option>
          <option value="other">Other</option>
        </select>
      </div>

      <div>
        <label class="mb-2 block font-medium text-gray-700">
          Email
        </label>

        <input type="email" name="email" class="w-full rounded-lg border border-gray-300 px-4 py-3"
          placeholder="Enter organization email">
      </div>

      <div>
        <label class="mb-2 block font-medium text-gray-700">
          Phone
        </label>

        <input type="text" name="phone" class="w-full rounded-lg border border-gray-300 px-4 py-3"
          placeholder="Enter organization phone">
      </div>

      <div>
        <label class="mb-2 block font-medium text-gray-700">
          Address
        </label>

        <input type="text" name="address" class="w-full rounded-lg border border-gray-300 px-4 py-3"
          placeholder="Enter organization address">
      </div>

      <div>
        <label class="mb-2 block font-medium text-gray-700">
          Website
        </label>

        <input type="url" name="website" class="w-full rounded-lg border border-gray-300 px-4 py-3"
          placeholder="https://example.com">
      </div>

      <div>
        <label class="mb-2 block font-medium text-gray-700">
          Description
        </label>

        <textarea name="description" rows="4" class="w-full rounded-lg border border-gray-300 px-4 py-3"
          placeholder="Describe the organization"></textarea>
      </div>

      <button type="submit" class="rounded-lg bg-slate-900 px-6 py-3 text-white hover:bg-slate-700">
        Register Organization
      </button>

    </form>

  </div>

@endsection