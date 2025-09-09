<?php
namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Copy;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['copy.book','member'])->latest()->paginate(15);
        return view('loans.index', compact('loans'));
    }

    public function create(Request $request)
    {
        // opcionalmente prefiltrar por libro: /loans/create?book=ID
        $bookId = $request->query('book');

        $copies = Copy::with('book')
            ->when($bookId, fn($q) => $q->where('book_id', $bookId))
            ->where('status', 'available')        // ajusta al valor real que uses
            ->orderBy('copy_id')
            ->get();

        $members = Member::orderBy('full_name')->get();

        return view('loans.create', compact('copies','members','bookId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'copy_id'   => ['required','integer', Rule::exists('copies','copy_id')],
            'member_id' => ['required','integer', Rule::exists('members','member_id')],
            'start_date'=> ['nullable','date'],
            'due_date'  => ['required','date','after_or_equal:start_date'],
            'notes'     => ['nullable','string'],
        ]);

        DB::transaction(function () use ($request) {
            $copy = Copy::lockForUpdate()->findOrFail($request->copy_id);

            if ($copy->status !== 'available') {
                abort(422, 'La copia seleccionada no está disponible.');
            }

            Loan::create([
                'copy_id'    => $copy->copy_id,
                'member_id'  => $request->member_id,
                'start_date' => $request->start_date ?: now()->toDateString(),
                'due_date'   => $request->due_date,
                'status'     => 'active',
                'notes'      => $request->notes,
            ]);

            // Marca la copia como prestada
            $copy->update(['status' => 'loaned']);
        });

        return redirect()->route('loans.index')->with('success', 'Préstamo creado correctamente.');
    }
}