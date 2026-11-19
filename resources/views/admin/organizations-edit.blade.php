@extends('layouts.app')

@section('content')

  <div class="mx-auto max-w-3xl px-6 py-8">

    <h1 class="text-2xl font-bold text-gray-900">
      Edit Organization
    </h1>

    <p class="mt-2 text-gray-600">
      Update the organization's information.
    </p>

    <p class="mt-4 font-medium text-blue-700">
      Organization: {{ $organization->name }}
    </p>

    <form action="{{ route('admin.organizations.update', $organization) }}" method="POST" class="mt-8 space-y-6">

      @csrf
      @method('PUT')

      <div>

        <label class="mb-2 block font-medium text-gray-700">
          Organization Name
        </label>

        <input type="text" name="name" value="{{ old('name', $organization->name) }}"
          class="w-full rounded-lg border border-gray-300 px-4 py-3" placeholder="Enter organization name">

      </div>

      <div>
        <label class="mb-2 block font-medium text-gray-700">
          Organization Type
        </label>

        <select name="type" class="w-full rounded-lg border border-gray-300 px-4 py-3">
          <option value="company" @selected(old('type', $organization->type) === 'company')>
            Company
          </option>

          <option value="government" @selected(old('type', $organization->type) === 'government')>
            Government Institution
          </option>

          <option value="ngo" @selected(old('type', $organization->type) === 'ngo')>
            NGO
          </option>

          <option value="educational_institution" @selected(old('type', $organization->type) === 'educational_institution')>
            Educational Institution
          </option>

          <option value="other" @selected(old('type', $organization->type) === 'other')>
            Other
          </option>
        </select>
      </div>

      <div>
        <label class="mb-2 block font-medium text-gray-700">
          Email
        </label>

        <input type="email" name="email" value="{{ old('email', $organization->email) }}"
          class="w-full rounded-lg border border-gray-300 px-4 py-3" placeholder="Enter organization email">
      </div>

      <div>
        <label class="mb-2 block font-medium text-gray-700">
          Phone
        </label>

        <input type="text" name="phone" value="{{ old('phone', $organization->phone) }}"
          class="w-full rounded-lg border border-gray-300 px-4 py-3" placeholder="Enter organization phone">
      </div>

      <div>
        <label class="mb-2 block font-medium text-gray-700">
          Address
        </label>

        <input type="text" name="address" value="{{ old('address', $organization->address) }}"
          class="w-full rounded-lg border border-gray-300 px-4 py-3" placeholder="Enter organization address">
      </div>

      <div>
        <label class="mb-2 block font-medium text-gray-700">
          Website
        </label>

        <input type="url" name="website" value="{{ old('website', $organization->website) }}"
          class="w-full rounded-lg border border-gray-300 px-4 py-3" placeholder="https://example.com">
      </div>

      <div>
        <label class="mb-2 block font-medium text-gray-700">
          Description
        </label>

        <textarea name="description" rows="4" class="w-full rounded-lg border border-gray-300 px-4 py-3"
          placeholder="Describe the organization">{{ old('description', $organization->description) }}</textarea>
      </div>

      <button type="submit" class="rounded-lg bg-green-600 px-6 py-3 text-white hover:bg-green-400">
        Update Organization
      </button>


      <a href="{{ route('admin.organizations') }}"
        class="rounded-lg bg-red-600 border border-gray-300 px-5 py-3 text-white hover:bg-red-400">
        Cancel
      </a>

    </form>





  </div>

@endsection