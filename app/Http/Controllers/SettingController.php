<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::all();
        return view('settings.index', compact('settings'));
    }

    public function create()
    {
        return view('settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'hour' => 'required',
            'start' => 'required',
            'end' => 'required',
            'after_count_time' => 'required',
        ]);
        $setting = Setting::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'hour' => $request->hour,
            'start' => $request->start,
            'end' => $request->end,
            'after_count_time' => $request->after_count_time,
        ]);
        return redirect()->route('setting.index')->with('success', 'تم الحفــظ بنجــاح');
    }

    public function edit($id)
    {
        $setting = Setting::findorFail($id);
        return view('settings.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $setting =  Setting::findorFail($id);
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'hour' => 'required',
            'start' => 'required',
            'end' => 'required',
            'after_count_time' => 'required',
        ]);
        $setting->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'hour' => $request->hour,
            'start' => $request->start,
            'end' => $request->end,
            'after_count_time' => $request->after_count_time,
        ]);
        return redirect()->route('setting.index')->with('success', 'تم التعديــل بنجــاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Setting::findorFail($id)->delete();
        return redirect()->route('setting.index')->with('success', 'تم الحــذف بنجــاح');
    }
}
