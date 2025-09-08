<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', config('app.name', 'Prestario'))</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-zinc-100">

  <div class="flex min-h-screen">
    {{-- SIDEBAR --}}
    <aside class="w-64 bg-white dark:bg-zinc-950 border-r border-zinc-200 dark:border-zinc-800 p-6 flex flex-col shadow-lg">
      <div class="mb-8">
        <a href="{{ url('/dashboard') }}" class="flex items-center gap-2 font-bold text-lg hover:text-amber-700 transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-width="1.5" d="M3.75 6.75A2.25 2.25 0 0 1 6 4.5h12a2.25 2.25 0 0 1 2.25 2.25v11.25A1.5 1.5 0 0 1 18.75 19.5H6A2.25 2.25 0 0 0 3.75 21V6.75z" />
            <path stroke-width="1.5" d="M6 4.5v12.75A2.25 2.25 0 0 1 3.75 21" />
          </svg>
          Prestario
        </a>
      </div>

      <nav class="flex-1">
        <ul class="space-y-2 text-sm">
          <li>
            <a href="{{ url('/dashboard/loans') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-amber-50 dark:hover:bg-zinc-800 hover:text-amber-600 transition-colors">
              <span class="h-2 w-2 rounded-full bg-amber-600"></span>
              Préstamos y devoluciones
            </a>
          </li>
          <li>
            <a href="{{ url('/dashboard/reservations') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-amber-50 dark:hover:bg-zinc-800 hover:text-amber-600 transition-colors">
              <span class="h-2 w-2 rounded-full bg-amber-600"></span>
              Reservas y notificaciones
            </a>
          </li>
          <li>
            <a href="{{ url('catalog') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-amber-50 dark:hover:bg-zinc-800 hover:text-amber-600 transition-colors">
              <span class="h-2 w-2 rounded-full bg-amber-600"></span>
              Catálogo de libros
            </a>
          </li>
          <li>
            <a href="{{ url('categories') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-amber-50 dark:hover:bg-zinc-800 hover:text-amber-600 transition-colors">
              <span class="h-2 w-2 rounded-full bg-amber-600"></span>
              Categorías
            </a>
          </li>
          <li>
            <a href="{{ url('/dashboard/members') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-amber-50 dark:hover:bg-zinc-800 hover:text-amber-600 transition-colors">
              <span class="h-2 w-2 rounded-full bg-amber-600"></span>
              Miembros
            </a>
          </li>
          <li>
            <a href="{{ url('/dashboard/settings') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-amber-50 dark:hover:bg-zinc-800 hover:text-amber-600 transition-colors">
              <span class="h-2 w-2 rounded-full bg-amber-600"></span>
              Roles y permisos
            </a>
          </li>
        </ul>
      </nav>

      {{-- Cerrar sesión --}}
      <form method="POST" action="{{ route('logout') }}" class="mt-6">
        @csrf
        <button class="w-full flex items-center gap-2 px-3 py-2 rounded-lg bg-amber-600 text-white hover:bg-amber-700 transition-colors font-semibold shadow">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1" />
          </svg>
          Cerrar sesión
        </button>
      </form>
    </aside>

    {{-- CONTENIDO PRINCIPAL --}}
    <div class="flex-1 flex flex-col">
      {{-- NAVBAR SUPERIOR --}}
      <header class="h-16 bg-white dark:bg-zinc-950 border-b border-zinc-200 dark:border-zinc-800 flex items-center justify-between px-6 shadow">
        <h1 class="font-semibold text-lg">@yield('title', 'Dashboard')</h1>

        <div class="flex items-center gap-3">
          <span class="text-sm text-zinc-600 dark:text-zinc-400">
            {{ auth()->user()->name ?? 'Usuario' }}
          </span>
          <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-amber-600 text-white font-bold">
            {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
          </span>
        </div>
      </header>

      {{-- CONTENIDO DE LA VISTA --}}
      <main class="flex-1 p-8">
      @yield('content')
      </main>
    </div>
  </div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const authorSelect = document.getElementById("author_id");
        const newAuthorContainer = document.getElementById("new-author-container");

        if (authorSelect && newAuthorContainer) {
            authorSelect.addEventListener("change", function () {
                if (this.value === "new") {
                    newAuthorContainer.classList.remove("hidden");
                } else {
                    newAuthorContainer.classList.add("hidden");
                }
            });
        }
    });
</script>
</body>
</html>