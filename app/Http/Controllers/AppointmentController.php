<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('appointments.index', [
            'appointments' => Appointment::where('user_id', Auth::id())->get(),
            'doctors' => Doctor::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'doctor' => 'required|not_in: 0',
            'date' => 'required|date|after:tomorrow',
        ]);

        $doctor = Doctor::find($validated['doctor']);
        $doctor->total_earnings += $doctor->rate;
        $doctor->patients++;
        $doctor->active_appointments++;
        $doctor->total_appointments++;
        $doctor->save();

        Auth::user()->type = 'patient';

        $request->user()->appointments()->create($validated);
 
        return redirect(route('appointments.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment): View
    {
        $this->authorize('update', $appointment);

        return view('appointments.edit', [
            'appointment' => $appointment,
            'doctors' => Doctor::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment): RedirectResponse
    {
        $this->authorize('update', $appointment);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'doctor' => 'required|not_in: 0',
            'date' => 'required|date|after:tomorrow',
        ]);

        if($validated['doctor'] != $appointment->doctor) {
            $doctor = Doctor::find($appointment->doctor); // old doctor

            $doctor->total_earnings -= $doctor->rate;
            $doctor->patients--;
            $doctor->active_appointments--;
            $doctor->total_appointments--;
            $doctor->save();

            $doctor = Doctor::find($validated['doctor']); // new doctor
            
            $doctor->total_earnings += $doctor->rate;
            $doctor->patients++;
            $doctor->active_appointments++;
            $doctor->total_appointments++;
            $doctor->save();
        }

        $appointment->update($validated);

        return redirect(route('appointments.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment): RedirectResponse
    {
        $this->authorize('delete', $appointment);

        $doctor = Doctor::find($appointment->doctor);

        $doctor->total_earnings -= $doctor->rate;
        $doctor->patients--;
        $doctor->active_appointments--;
        $doctor->total_appointments--;
        $doctor->save();

        $appointment->delete();

        return redirect(route('appointments.index'));
    }
}
