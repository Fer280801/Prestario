@extends('layouts.app')

@section('title', 'Agregar miembro')

@section('content')
<div class="max-w-lg mx-auto bg-white dark:bg-zinc-800 p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Registrar nuevo miembro</h2>

    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium">Nombre completo</label>
            <input type="text" name="full_name" class="w-full px-3 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Correo electrónico</label>
            <input type="email" name="email" class="w-full px-3 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Estado</label>
            <select name="status" class="w-full px-3 py-2 border rounded">
                <option value="active">Activo</option>
                <option value="inactive">Inactivo</option>
            </select>
        </div>

        <button type="submit" class="px-4 py-2 bg-amber-600 text-white rounded hover:bg-amber-700">
            Guardar
        </button>
    </form>
</div>
@endsection