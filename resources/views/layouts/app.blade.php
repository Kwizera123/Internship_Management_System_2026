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
      <nav class="mt-8">
        <a href="/dashboard" class="block rounded-lg bg-slate-800 px-4 py-3 text-sm font-medium text-white">
          Dashboard
        </a>
      </nav>
    </aside>

    <div class="min-w-0 flex-1">
      <header class="border-b border-gray-200 bg-white px-6 py-4">
        <h2 class="text-xl font-bold text-gray-900">
          Internship Management System
        </h2>
        <p class="mt-1 text-sm text-gray-500">
          Manage internships, students and payments
        </p>
      </header>

      <main class="p-6">
        @yield('content')
      </main>

    </div>
  </div>
</body>

</html>