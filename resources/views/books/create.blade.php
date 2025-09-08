<!-- Book Creation Form -->
@extends('layouts.app')
@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow">
        <div class="card-body">
          <h3 class="card-title mb-4">Agregar Libro</h3>
          @if (session('status'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
  </div>
@endif

@if (session('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
  </div>
@endif
          <form action="{{ route('books.store') }}" method="POST">
            @csrf

            <div class="mb-3">
              <label for="title" class="form-label">Título</label>
              <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">
            </div>

            <div class="mb-4">
    <label for="author_id" class="block text-gray-700">Autor</label>
  <select name="author_id" id="author_id" class="w-full border p-2 rounded">
    <option value="">{{ __('Selecciona un autor') }}</option>
    @foreach($authors as $author)
        <option value="{{ $author->id }}">{{ $author->name }}</option>
    @endforeach
    <option value="new">{{ __('Agregar nuevo autor') }}</option>
</select>

<div id="new-author-container" class="mb-4 hidden">
    <label for="new_author" class="block text-gray-700">Nuevo Autor</label>
    <input type="text" name="new_author" id="new_author" class="w-full border p-2 rounded">
</div>

            <div class="mb-3">
              <label for="category_id" class="form-label">Categoría</label>
              <select name="category_id" id="category_id" class="form-select">
                <option value="">-- Selecciona una categoría --</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->category_id }}" {{ old('category_id') == $category->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="lang_id" class="form-label">Idioma</label>
              <select name="lang_id" id="lang_id" class="form-select">
                <option value="">-- Selecciona un idioma --</option>
                @foreach ($languages as $language)
                  <option value="{{ $language->lang_id }}" {{ old('lang_id') == $language->lang_id ? 'selected' : '' }}>{{ $language->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="isbn" class="form-label">ISBN</label>
              <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}" class="form-control">
            </div>

            <div class="mb-3">
              <label for="pages" class="form-label">Número de páginas</label>
              <input type="number" name="pages" id="pages" value="{{ old('pages') }}" class="form-control">
            </div>

            <div class="mb-3">
              <label for="year_pub" class="form-label">Año de publicación</label>
              <input type="number" name="year_pub" id="year_pub" value="{{ old('year_pub') }}" class="form-control">
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Descripción</label>
              <textarea name="description" id="description" rows="4" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
    <label for="publishers_id" class="block text-sm font-medium text-gray-700">Editorial</label>
    <select name="publishers_id" id="publishers_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        <option value="">Selecciona una editorial</option>
        @foreach ($publishers as $publisher)
            <option value="{{ $publisher->publishers_id }}" {{ old('publishers_id') == $publisher->publishers_id ? 'selected' : '' }}>
                {{ $publisher->name }}
            </option>
        @endforeach
    </select>
    @error('publishers_id')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>

            <button type="submit" class="btn btn-dark w-100">Agregar Libro</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection