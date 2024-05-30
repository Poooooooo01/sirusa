<?php

namespace App\Http\Controllers;

use App\Models\Schedules;
use App\Models\Doctor;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    public function index()
    {
        $schedules = Schedules::with('doctor')->orderBy('id')->get();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        return view('schedules.form', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'available_date' => 'required|date_format:Y-m-d\TH:i',
        ]);

        Schedules::create($request->all());

        return redirect()->route('schedules.index')->with('successMessage', 'Schedule created successfully.');
    }

    public function edit(Schedules $schedule)
    {
        $doctors = Doctor::all();
        return view('schedules.form', compact('schedule', 'doctors'));
    }

    public function update(Request $request, Schedules $schedule)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'available_date' => 'required|date_format:Y-m-d\TH:i',
        ]);

        $schedule->update($request->all());

        return redirect()->route('schedules.index')->with('successMessage', 'Schedule updated successfully.');
    }

    public function destroy(Schedules $schedule)
    {
        $schedule->delete();

        return redirect()->route('schedules.index')->with('successMessage', 'Schedule deleted successfully.');
    }
}
