@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <div class="w-64 bg-zinc-100 dark:bg-zinc-900 h-full p-4 space-y-4">
      <nav class="flex flex-col space-y-2">
        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-zinc-200 dark:hover:bg-zinc-800 transition font-medium">
          Dashboard
        </a>
        <a href="{{ route('catalog') }}" class="block px-4 py-2 rounded hover:bg-zinc-200 dark:hover:bg-zinc-800 transition font-medium">
          Ver catálogo
        </a>
        <a href="{{ route('books.create') }}" class="block px-4 py-2 rounded hover:bg-zinc-200 dark:hover:bg-zinc-800 transition font-medium">
          Agregar libro
        </a>
      </nav>
    </div>
    <!-- Main content -->
    <div class="flex-1 p-6">
      <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 shadow">
        <h2 class="text-xl font-bold mb-4">Bienvenido al panel</h2>
        <p>Aquí puedes ver estadísticas generales de la biblioteca.</p>
        <div class="mt-6">
          <a href="{{ route('books.create') }}" class="inline-block px-6 py-3 rounded-lg bg-amber-600 text-white hover:bg-amber-700 transition">
            Agregar nuevo libro
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection