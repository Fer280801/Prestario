@extends('layouts.app')

@section('title', 'Préstamos')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Listado de Préstamos</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($loans->isEmpty())
        <p class="text-gray-600">No hay préstamos registrados.</p>
    @else
        <table class="table-auto w-full border border-gray-300 rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Libro</th>
                    <th class="px-4 py-2">Miembro</th>
                    <th class="px-4 py-2">Inicio</th>
                    <th class="px-4 py-2">Vencimiento</th>
                    <th class="px-4 py-2">Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($loans as $loan)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $loan->loan_id }}</td>
                        <td class="px-4 py-2">{{ $loan->copy->book->title ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $loan->member->full_name ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $loan->start_date }}</td>
                        <td class="px-4 py-2">{{ $loan->due_date }}</td>
                        <td class="px-4 py-2">{{ ucfirst($loan->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $loans->links() }} {{-- Paginación de Laravel --}}
        </div>
    @endif
</div>
@endsection