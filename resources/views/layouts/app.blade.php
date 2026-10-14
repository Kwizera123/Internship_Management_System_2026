<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <title>@yield('title', 'IMS')</title>
</head>

<body class="min-h-screen bg-gray-100 font-sans text-gray-800">
  <div class="flex min-h-screen">

    <aside class="w-64 shrink-0 bg-slate-900 p-6 text-white">
      <h1 class="text-xl font-bold">
        IMS
      </h1>
      <p class="mt-2 text-sm text-slate-400">
        Internship Management
      </p>
      <nav class="mt-8 space-y-2">

        <a href="/dashboard" class="block rounded-lg bg-slate-800 px-4 py-3 text-sm font-medium text-white">
          Dashboard
        </a>
        @if(auth()->user()->isAdmin())

          <a href="#" class="block rounded-lg px-4 py-3 text-sm text-slate-300 hover:bg-slate-800 hover:text-white">
            Institutions
          </a>

          <a href="#" class="block rounded-lg px-4 py-3 text-sm text-slate-300 hover:bg-slate-800 hover:text-white">
            Student
          </a>

          <a href="#" class="block rounded-lg px-4 py-3 text-sm text-slate-300 hover:bg-slate-800 hover:text-white">
            Internship
          </a>

          <a href="#" class="block rounded-lg px-4 py-3 text-sm text-slate-300 hover:bg-slate-800 hover:text-white">
            Payments
          </a>

        @else

          <a href="#" class="block rounded-lg px-4 py-3 text-sm text-slate-300 hover:bg-slate-800 hover:text-white">
            My Profile
          </a>

          <a href="#" class="block rounded-lg px-4 py-3 text-sm text-slate-300 hover:bg-slate-800 hover:text-white">
            Internship
          </a>

          <a href="#" class="block rounded-lg px-4 py-3 text-sm text-slate-300 hover:bg-slate-800 hover:text-white">
            My Fees
          </a>

          <a href="#" class="block rounded-lg px-4 py-3 text-sm text-slate-300 hover:bg-slate-800 hover:text-white">
            Payment History
          </a>

        @endif
      </nav>
    </aside>

    <div class="min-w-0 flex-1">
      <header class="flex items-center justify-between gap-4 border-b border-gray-200 bg-white px-6 py-4">
        <div>
          <h2 class="text-xl font-bold text-gray-900">
            Internship Management System
          </h2>

          <p class="mt-1 text-sm text-gray-500">
            Manage internships, students and payments
          </p>
        </div>

        <div class="flex items-center gap-4">
          <div class="text-right">

            <p class="text-sm font-semibold text-gray-900">
              {{ auth()->user()->name }}
            </p>

            <p class="text-xs text-gray-500">
              {{ auth()->user()->email }}
            </p>

          </div>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">
              Logout
            </button>
          </form>

        </div>

      </header>

      <main class="p-6">
        @yield('content')
      </main>

    </div>
  </div>
</body>

</html>