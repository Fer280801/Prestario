@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="bg-white dark:bg-zinc-900 rounded-xl shadow p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $book->title }}</h1>
        
        <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
        <p><strong>Autor:</strong> {{ $book->author->name ?? 'Desconocido' }}</p>
        <p><strong>Categoría:</strong> {{ $book->category->name ?? 'N/A' }}</p>
        <p><strong>Idioma:</strong> {{ $book->language->name ?? 'N/A' }}</p>
        <p><strong>Editorial:</strong> {{ $book->publisher->name ?? 'N/A' }}</p>
        <p><strong>Páginas:</strong> {{ $book->pages ?? 'N/A' }}</p>
        <p><strong>Año de publicación:</strong> {{ $book->year_pub ?? 'N/A' }}</p>

        @if ($book->description)
            <div class="mt-4">
                <h2 class="text-xl font-semibold mb-2">Descripción</h2>
                <p>{{ $book->description }}</p>
            </div>
        @endif

        <div class="mt-6 flex space-x-4">
            <a href="{{ route('catalog') }}" class="px-4 py-2 bg-zinc-300 text-zinc-900 rounded hover:bg-zinc-400 dark:bg-zinc-700 dark:text-white dark:hover:bg-zinc-600">Volver al catálogo</a>

            @auth
                <form action="{{ route('reservations.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->book_id }}">
                    <button type="submit" class="px-4 py-2 bg-amber-600 text-white rounded hover:bg-amber-700">Solicitar préstamo</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="px-4 py-2 bg-amber-600 text-white rounded hover:bg-amber-700">Iniciar sesión para solicitar préstamo</a>
            @endauth
        </div>
    </div>
</div>
@endsection