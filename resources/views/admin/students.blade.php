@extends('layouts.app')
@section('title', 'Students')
@section('content')

  <div class="mb-8 flex items-center justify-between">

    <div>
      <h1 class="text-2xl font-bold text-gray-900">
        Student Management
      </h1>

      <p class="mt-2 text-sm text-gray-500">
        View and manage registered students.
      </p>
    </div>

    <a href="#" class="rounded-lg bg-slate-900 px-5 py-3 text-sm font-medium text-white hover:bg-slate-700">
      + Add Student
    </a>
  </div>

  @if (session('success'))
    <div class="mb-6 rounded-lg bg-green-100 px-4 py-3 text-green-800">
      {{ session('success') }}
    </div>
  @endif

  <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
    <h2 class="text-lg font-semibold text-gray-900">
      Registered Students
    </h2>
    <p class="mt-2 text-sm text-gray-500">
      Your student record will appear here.
    </p>

    <form action="{{ route('admin.students') }}" method="GET" class="mt-6 flex gap-3">
      <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Searchby name or student number..."
        class="w-full rounded-lg border border-gray-300 px-4 py-3">
      <button class="rounded-lg bg-slate-900 px-5 py-3 text-white hover:big-slate-700">
        Search
      </button>
    </form>

    <div class="overflow-x-auto">
      <table class="w-full text-left text-sm">
        <thead class="border-b border-gray-200 bg-gray-50 text-gray-500">
          <tr>
            <th class="px-4 py-3 font-medium">Student Number</th>
            <th class="px-4 py-3 font-medium">Full Name</th>
            <th class="px-4 py-3 font-medium">Student Type</th>
            <th class="px-4 py-3 font-medium">Institution</th>
            <th class="px-4 py-3 font-medium">Actions</th>
          </tr>
        </thead>

        <tbody class="divide-y divide-gray-100">
          @forelse ($students as $student)
            <tr class="hover:bg-gray-50">
              <td class="px-4 py-4 font-medium text-gray-900">
                {{ $student->student_number }}
              </td>

              <td class="px-4 py-4 text-gray-700">
                {{ $student->first_name }} {{ $student->last_name }}
              </td>

              <td class="px-4 py-4 text-gray-700">
                {{ $student->student_type }}
              </td>

              <td class="px-4 py-4 text-gray-700">
                {{ $student->institution?->name ?? 'Not assigned' }}
              </td>


              <td class="px-6 py-4">

                <button type="button"
                  class="view-student-details rounded-lg bg-slate-900 px-3 py-2 text-sm font-medium text-white hover:bg-slate-700"
                  data-student-name="{{ $student->first_name }} {{ $student->last_name }}"
                  data-student-number="{{ $student->student_number }}" data-student-type="{{ $student->student_type }}"
                  data-institution-name="{{ $student->institution?->name ?? 'Not assigned' }}">
                  View Details
                </button>


                <a href="#"
                  class="ml-2 inline-block rounded-lg border border-gray-300 px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100">
                  Edit
                </a>


              </td>

            </tr>
          @empty
            <tr>
              <td colspan="4" class="px-4 py-8 text-center text-gray-500">
                @if ($search)
                  No students found matching "{{ $search }}".
                @else
                  No students have been registered yet.
                @endif
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </div>

  <div id="student-details-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4">

    <div class="w-full max-w-lg overflow-hidden rounded-2xl bg-white p-6 shadow-2xl">

      <div class="mb-6 flex items-center justify-between">


        <div class="flex items-start justify-between border-b border-gray-200 bg-white-50 px-4 py-5 rounded-xl shadow-xl">
          <p class="text-sm font-medium uppercase tracking-wider text-indigo-600">
            Student Profile
          </p>

          <h3 class="mt-1 text-2xl font-bold underline decoration-sky-500 text-gray-900">
            Student Details
          </h3>

          <p class="mt-1 text-sm text-gray-500">
            Information about the selected student.
          </p>
        </div>


        <button type="button" id="close-student-modal"
          class="rounded-lg px-3 py-2 outline-2 outline-offset-2 outline-pink-500 text-gray-500 hover:bg-gray-100">
          Close
        </button>
      </div>

      <p class="mb-2 text-sm text-gray-500">
        Full Name
      </p>
      <p id="modal-student-name" class="mb-6 text-lg font-semibold text-gray-900">
        -
      </p>

      <p class="mb-2 text-sm text-gray-500">
        Student Number
      </p>

      <p id="modal-student-number" class="mb-6 text-lg font-semibold text-gray-900">
        —
      </p>

      <p class="mb-2 text-sm text-gray-500">
        Student Type
      </p>

      <p id="modal-student-type" class="mb-6 text-lg font-semibold text-gray-900">
        —
      </p>

      <p class="mb-2 text-sm text-gray-500">
        Institution
      </p>

      <p id="modal-institution-name" class="mb-6 text-lg font-semibold text-gray-900">
        —
      </p>

    </div>


    <script>
      const modal = document.getElementById('student-details-modal');
      const closeButton = document.getElementById('close-student-modal');
      const detailButtons = document.querySelectorAll('.view-student-details');

      const studentName = document.getElementById('modal-student-name');
      const studentNumber = document.getElementById('modal-student-number');
      const studentType = document.getElementById('modal-student-type');
      const institutionName = document.getElementById('modal-institution-name');

      detailButtons.forEach(function (button) {

        button.addEventListener('click', function () {
          studentName.textContent = button.dataset.studentName;
          studentNumber.textContent = button.dataset.studentNumber;
          studentType.textContent = button.dataset.studentType;
          institutionName.textContent = button.dataset.institutionName;

          modal.classList.remove('hidden');
          modal.classList.add('flex');
        });
      });

      closeButton.addEventListener('click', function () {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
      });

      modal.addEventListener('click', function (event) {
        if (event.target === modal) {
          modal.classList.add('hidden');
          modal.classList.remove('flex');
        }
      });


      document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
          modal.classList.add('hidden');
          modal.classList.remove('flex');
        }
      });






    </script>


  </div>
@endsection