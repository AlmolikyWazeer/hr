<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainings =  Training::all();
        return view('training.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('training.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'empid' => 'required',
            'state' => 'required',
            'date' => 'required',
        ]);
        Training::create([
            'empid' => $request->employee,
            'state' => $request->state,
            'date' => $request->date,
        ]);
        return redirect()->route('training.index')->with('success', 'تم الحفــظ بنجــاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $training =  Training::findorfail($id);
        return view('training.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'empid' => 'required',
            'state' => 'required',
            'date' => 'required',
        ]);
        $training =  Training::findorfail($id);
        $training->update([
            'empid' => $request->employee,
            'state' => $request->state,
            'date' => $request->date,
        ]);
        return redirect()->route('training.index')->with('success', 'تم التعديــل بنجــاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Training::findorfail($id)->delete();
        return redirect()->route('training.index')->with('success', 'تم الحــذف بنجــاح');
    }
}
