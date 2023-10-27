<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $transactions = Transaction::orderBy('created_at', 'desc')->get();

        $totalIncome = $transactions->where('type', 'income')->sum('amount');
        $totalExpense = $transactions->where('type', 'expense')->sum('amount');
        $balance = $totalIncome - $totalExpense;
        $totalIncomeCount = $transactions->where('type', 'income')->count();
        $totalExpenseCount = $transactions->where('type', 'expense')->count();

        return view('transaction.index', compact('transactions', 'balance', 'totalIncome', 'totalExpense', 'totalIncomeCount', 'totalExpenseCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaction.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'category' => 'required|in:uncategorized,wage,bonus,gift,food & drinks,shopping,charity,housing,insurance,taxes,transportation',
            'notes' => 'required|string',




        ]);

        $transaction = Transaction::create([
            'amount' => $validated['amount'],
            'type' => $validated['type'],
            'category' => $validated['category'],
            'notes' => $validated['notes'],
            'published_at' => $request->has('is_published') ? Carbon::now() : false,
        ]);

        return $transaction;
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return view('transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('transaction.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'type' => 'required|in: income,expense',
            'category' => 'required|string|in: wage, bonus, gift, food & drinks, shopping, charity, housing, insurance, taxes, transportation',
            'notes' => 'required|string',
        ]);


        // Update artikel
        $transaction->update([
            'amount' => $validated['amount'],
            'type' => $validated['type'],
            'category' => $validated['category'],
            'notes' => $validated['notes'],
            'published_at' => $request->has('is_published') ? Carbon::now() : false,

        ]);
        return redirect()->route('transaction.index')->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transaction.index')->with('success', 'Transaction delete successfully.');
    }
}
