@extends('layouts.app')

@section('title', 'Nuevo Préstamo')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Registrar nuevo préstamo</h1>

    <form action="{{ route('loans.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="copy_id" class="block text-sm font-medium">Libro / Copia</label>
            <select name="copy_id" id="copy_id" class="form-select w-full">
                @foreach ($copies as $copy)
                    <option value="{{ $copy->copy_id }}">
                        {{ $copy->book->title }} (Copia #{{ $copy->copy_id }})
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="member_id" class="block text-sm font-medium">Miembro</label>
            <select name="member_id" id="member_id" class="form-select w-full">
                @foreach ($members as $member)
                    <option value="{{ $member->member_id }}">{{ $member->full_name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="start_date" class="block text-sm font-medium">Fecha inicio</label>
            <input type="date" name="start_date" id="start_date" value="{{ now()->toDateString() }}" class="form-input w-full">
        </div>

        <div>
            <label for="due_date" class="block text-sm font-medium">Fecha de entrega</label>
            <input type="date" name="due_date" id="due_date" class="form-input w-full">
        </div>

        <div>
            <label for="notes" class="block text-sm font-medium">Notas</label>
            <textarea name="notes" id="notes" rows="3" class="form-textarea w-full"></textarea>
        </div>

        <button type="submit" class="px-6 py-2 bg-amber-600 text-white rounded hover:bg-amber-700">
            Guardar préstamo
        </button>
    </form>
</div>
@endsection