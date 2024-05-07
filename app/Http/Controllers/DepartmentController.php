<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return view('departments.department', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departments.department'); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $department = Department::create([
            'name' => $request->name,
        ]);
        return redirect()->route('departments.department')->with('Add', 'تم الحفــظ بنجــاح');
    }


    public function edit($id)
    {
        $department =  Department::findorFail();
        return view('departments.department', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $department =  Department::findorFail($request->id);
        $request->validate([
            'name' => 'required',
        ]);
        $department->update(['name' => $request->name]);
        return redirect()->route('departments.department')->with('update', 'تم التعديــل بنجــاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Department::findorFail($request->id)->delete();
        return redirect()->route('department.department')->with('delete', 'تم الحــذف بنجــاح');
    }
}
