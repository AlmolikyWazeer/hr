<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $balances = Balance::all();
        return view('balance.index', compact('balances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('balance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->request([
            'amount' => 'required',
            'type' => 'required',
            'empid' => 'required',
            'state' => 'required',
            'date' => 'required'
        ]);
        Balance::create([
            'amount' => $request->amount,
            'type' => $request->type,
            'empid' => $request->employee,
            'state' => $request->state,
            'date' => $request->date,
        ]);
        return redirect()->route('balance.index')->with('success', 'تم الحفظ بنجــاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Balance $balance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $balance = Balance::findOrFail($id);
        return view('balance.edit', compact('balance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->request([
            'amount' => 'required',
            'type' => 'required',
            'empid' => 'required',
            'state' => 'required',
            'date' => 'required'
        ]);
        $balance = Balance::findOrFail($id);
        $balance->update([
            'amount' => $request->amount,
            'type' => $request->type,
            'empid' => $request->employee,
            'state' => $request->state,
            'date' => $request->date,
        ]);
        return redirect()->route('balance.index')->with('success', 'تم التعديـل بنجــاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Balance::findOrFail($id)->delete();
        return redirect()->route('balance.index')->with('success', 'تم الحــذف بنجــاح');
    }
}
