<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('doctors.index', [
            'doctors' => Doctor::orderBy('total_earnings', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctors.create', [
            'doctors' => Doctor::orderBy('total_earnings', 'desc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'rate' => 'required|numeric|min:1',
            'path' => 'required|image|max:2048', // Max file size is set to 2MB (2048KB)
        ]);

        if ($request->hasFile('path')) {
            $image = $request->file('path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/doctors', $imageName);
        } else {
            $imageName = null; // Handle if no image is uploaded
        }

        $doctor = new Doctor();
        $doctor->name = $validated['name'];
        $doctor->email = $validated['email'];
        $doctor->description = $validated['description'];
        $doctor->rate = $validated['rate'];
        $doctor->path = $imageName;
        $doctor->save();
 
        return redirect(route('doctors.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor): View
    {
        return view('doctors.show', [
            'doctor' => $doctor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }

    public function __construct()
    {
            $this->middleware('admin')->only(['store','update','edit','create']);
    }
}
