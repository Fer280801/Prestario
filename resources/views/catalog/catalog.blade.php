@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mb-4">Catálogo de Libros</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Agregar nuevo libro</a>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Título</th>
                    <th>ISBN</th>
                    <th>Autor</th>
                    <th>Categoría</th>
                    <th>Subcategoría</th>
                    <th>Idioma</th>
                    <th>Páginas</th>
                    <th>Año</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->author->name ?? 'Desconocido' }}</td>
                    <td>{{ $book->category->name ?? 'Sin categoría' }}</td>
                    <td>{{ $book->subcategory->name ?? 'Sin subcategoría' }}</td>
                    <td>{{ $book->language->name ?? 'N/A' }}</td>
                    <td>{{ $book->pages ?? 'N/A' }}</td>
                    <td>{{ $book->year_pub ?? 'N/A' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">No hay libros en el catálogo.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection