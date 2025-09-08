@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Catálogo de Libros</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($books->isEmpty())
        <p class="text-gray-600">No hay libros disponibles en este momento.</p>
    @else
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($books as $book)
                <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md p-5 border border-zinc-200 dark:border-zinc-700">
                    <h2 class="text-xl font-semibold mb-2">{{ $book->title }}</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-1">Autor: {{ $book->author->name ?? 'Desconocido' }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Categoría: {{ $book->category->name ?? 'N/A' }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Subcategoría: {{ $book->subcategory->name ?? 'N/A' }}</p>

                    <div class="mt-4">
                        @auth
                            <a href="{{ route('loans.create', ['book' => $book->id]) }}"
                               class="inline-block px-4 py-2 bg-amber-600 text-white rounded hover:bg-amber-700 transition">
                                Solicitar préstamo
                            </a>
                        @else
                            <a href="{{ route('login', ['redirect_book' => $book->id]) }}"
                               class="inline-block px-4 py-2 bg-amber-500 text-white rounded hover:bg-amber-600 transition">
                                Iniciar sesión para pedir
                            </a>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection