<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labs = Lab::all();
        return view('aslab.lab', compact('labs'));
    }

    public function toggle(Lab $lab)
    {
        $lab->update(['status' => $lab->status->toggle()]);

        return back()->with('success', 'Status lab diperbarui');
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_lab' => 'required|string|max:255',
            'nama_lab' => 'required|string|max:255',
            'kapasitas' => 'required|integer|min:1',
            'lokasi' => 'required|string|max:255',
            'fasilitas' => 'required|string|max:255',
            
        ]);

        Lab::create($validated);

        return redirect()->route('aslab.lab.index')->with('success', 'Lab berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lab = Lab::findOrFail($id);
        $roleAktif = 'aslab';
        return view('aslab.lab', compact('lab', 'roleAktif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lab $lab)
    {
        $validated = $request->validate([
            'kode_lab'  => ['required', 'string', 'max:50'],
            'nama_lab'  => ['required', 'string', 'max:255'],
            'lokasi'    => ['required', 'string', 'max:255'],
            'kapasitas' => ['required', 'integer', 'min:1'],
            'fasilitas' => ['required', 'string'],
        ]);

        $lab->update($validated);

        return back()->with('success', 'Data lab diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lab = Lab::find($id);
        $lab->delete();
        return redirect() ->route('aslab.lab.index')->with('success', 'deleted successfully');
    }
}
