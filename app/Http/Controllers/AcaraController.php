<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acara;
use App\Models\Ustadz;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $acara = Acara::latest()->get();
        return view('admin.acara.index', compact('acara'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ustadz = Ustadz::all();
        return view('admin.acara.create', compact('ustadz'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Acara $acara)
    {
        Acara::create($request->all());
        return redirect()->route('acara.index')->with('success', 'Data Berhasil Di Tambahkan');
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
    public function edit($acara_id)
    {
        $edit = Acara::findorfail($acara_id);
        $ustadz = Ustadz::all();
        return view('admin.acara.edit', compact('edit', 'ustadz'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Acara $acara)
    {
        $acara->update($request->all());
        return redirect()->route('acara.index')->with('success', 'Data Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($acara_id)
    {
        $acara = Acara::findorfail($acara_id);
        $acara->delete();
        return redirect()->route('acara.index')->with('success', 'Data Berhasil Di Delete');
    }
}
