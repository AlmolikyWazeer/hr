<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees =  Employee::all();
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'salary' => 'required',
            'departid' => 'required',
        ]);
        $employee =  Employee::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'salary' => $request->salary,
            'departid' => $request->department,
        ]);
        return redirect()->route('employee.index')->with('success', 'تم الحفــظ بنجــاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee =  Employee::findorfail($id);
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'salary' => 'required',
            'departid' => 'required',
        ]);

        $employee =  Employee::findorfail($id);
        $employee->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'salary' => $request->salary,
            'departid' => $request->department,
        ]);
        return redirect()->route('employee.index')->with('success', 'تم التعديــل بنجــاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Employee::findorfail($id)->delete();
        return redirect()->route('employee.index')->with('success', 'تم الحــذف بنجــاح');
    }
}
