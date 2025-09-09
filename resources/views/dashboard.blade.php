@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="flex min-h-screen">
    {{-- SIDEBAR --}}
    <aside class="w-56 bg-white dark:bg-zinc-950 border-r border-zinc-200 dark:border-zinc-800 p-6 flex flex-col gap-4 shadow-lg">
        <nav class="flex-1">
            <ul class="space-y-2 text-sm">
                <li>
                    <a href="{{ route('catalog') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-amber-50 dark:hover:bg-zinc-800 hover:text-amber-600 transition-colors">
                        📚 Ver catálogo
                    </a>
                </li>
                @if(auth()->user()->role === 'admin')
                <li>
                    <a href="{{ route('books.create') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-amber-50 dark:hover:bg-zinc-800 hover:text-amber-600 transition-colors">
                        ➕ Agregar libro
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{ route('loans.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-amber-50 dark:hover:bg-zinc-800 hover:text-amber-600 transition-colors">
                        📖 Préstamos
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    {{-- CONTENIDO PRINCIPAL --}}
    <main class="flex-1 p-8">
        <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 shadow">
            <h2 class="text-xl font-bold mb-4">Bienvenido al panel</h2>
            <p>Aquí puedes ver estadísticas generales de la biblioteca.</p>
        </div>
    </main>
</div>
@endsection