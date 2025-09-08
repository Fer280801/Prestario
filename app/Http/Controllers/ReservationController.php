<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,book_id',
        ]);

        // Verifica que el usuario no tenga una reserva activa del mismo libro
        $alreadyReserved = Reservation::where('book_id', $request->book_id)
            ->where('member_id', Auth::id())
            ->where('status', 'active')
            ->exists();

        if ($alreadyReserved) {
            return redirect()->back()->with('error', 'Ya tienes una reserva activa de este libro.');
        }

        Reservation::create([
            'book_id' => $request->book_id,
            'member_id' => Auth::id(),
            'queued_at' => now(),
            'expires_at' => now()->addDays(2),
            'status' => 'active',
        ]);

        return redirect()->route('loans.index')->with('success', 'Libro reservado exitosamente');
    }
}
