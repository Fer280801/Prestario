<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Prestario') }} · Biblioteca</title>

  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
      @vite(['resources/css/app.css', 'resources/js/app.js'])
  @else
      <script src="https://cdn.tailwindcss.com"></script>
  @endif
</head>
<body class="min-h-screen bg-amber-50/40 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100">

  <header class="border-b border-zinc-200/60 dark:border-zinc-800/60">
    <nav class="mx-auto max-w-7xl px-6 py-4 flex items-center justify-between">
      <a href="{{ url('/') }}" class="flex items-center gap-2 font-semibold">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-width="1.5" d="M3.75 6.75A2.25 2.25 0 0 1 6 4.5h12a2.25 2.25 0 0 1 2.25 2.25v11.25A1.5 1.5 0 0 1 18.75 19.5H6A2.25 2.25 0 0 0 3.75 21V6.75z" />
          <path stroke-width="1.5" d="M6 4.5v12.75A2.25 2.25 0 0 1 3.75 21" />
        </svg>
        <span>{{ config('app.name', 'Prestario') }}</span>
      </a>


    </nav>
  </header>

  <section class="mx-auto max-w-7xl px-6 py-16 grid lg:grid-cols-2 gap-10 items-center">
    <div>
      <p class="text-sm uppercase tracking-wide text-amber-700 dark:text-amber-400 font-medium">Sistema de bibliotecam Prestario</p>
      <h1 class="mt-2 text-4xl md:text-5xl font-extrabold leading-tight">
        Gestiona préstamos, catálogo y usuarios <span class="text-amber-600">sin complicaciones</span>.
      </h1>
      <p class="mt-4 text-zinc-600 dark:text-zinc-300">
        {{ config('app.name', 'Prestario') }} te ayuda a organizar libros, ejemplares, préstamos, reservas y multas.
      </p>

      <div class="mt-6 flex flex-wrap gap-3">
       @auth
         <a href="{{ url('/dashboard') }}" class="px-5 py-3 rounded-xl bg-amber-600 text-white hover:bg-amber-700 transition">Ir al panel</a>
       @endauth
        
      </div>

      <ul class="mt-8 grid sm:grid-cols-2 gap-3 text-sm">
        <li class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-amber-600"></span> Préstamos y devoluciones</li>
        <li class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-amber-600"></span> Reservas y notificaciones</li>
        <li class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-amber-600"></span> Catálogo por categorías y autores</li>
      </ul>
    </div>
          <div class="flex items-center gap-2">
        @guest
          @if (Route::has('login'))
            <a href="{{ route('login') }}" class="px-4 py-2 rounded-lg border border-amber-600 text-amber-700 hover:bg-amber-50 transition dark:border-amber-500 dark:text-amber-400 dark:hover:bg-amber-900/20">
              Log in
            </a>
          @endif
          @if (Route::has('register'))
            <a href="{{ route('register') }}" class="px-4 py-2 rounded-lg bg-amber-600 text-white hover:bg-amber-700 transition">
              Register
            </a>
          @endif
          <a href="{{ url('/catalog') }}" class="px-5 py-3 rounded-xl border border-transparent hover:border-zinc-300 dark:hover:border-zinc-700 transition">
            Ver catálogo
          </a>
        @endguest
      </div>
    <div class="relative">
      <div class="rounded-2xl border border-zinc-200 dark:border-zinc-800 p-6 bg-white/70 dark:bg-zinc-900/60 backdrop-blur">
        <div class="mt-6 flex gap-3">
          <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Library" class="rounded-lg shadow-lg w-full object-cover h-64">
        </div>
      </div>
    </div>
  </section>

  <footer class="border-t border-zinc-200/60 dark:border-zinc-800/60">
    <div class="mx-auto max-w-7xl px-6 py-6 text-sm text-zinc-600 dark:text-zinc-400 flex items-center justify-between">
      <span>© {{ date('Y') }} {{ config('app.name', 'Prestario') }} · Biblioteca</span>
      <div class="flex gap-4">
        <a href="{{ url('/about') }}" class="hover:underline">Acerca</a>
        <a href="{{ url('/contact') }}" class="hover:underline">Contacto</a>
      </div>
    </div>
  </footer>

</body>
</html>