<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Imports\PesertaImport;
use Maatwebsite\Excel\Facades\Excel;


class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peserta = Peserta::latest()->get();
        return view('admin.peserta.index', compact('peserta'));
    }

    /**
     * Import data Peserta.
     */
    public function import(Request $request)
    {
        $file = $request->file('file')->store('public/import');

        $import = new PesertaImport;
        $import->import($file);
 
        if($import->failures()->isNotEmpty()){
            return back()->withFailures($import->failures());
        }

        return redirect('admin/peserta')->with('success-import', 'Data Berhasil di Import');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.peserta.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Peserta $peserta)
    {
               
        Peserta::create($request->all());
        return redirect()->route('peserta.index')->with('success', 'Data Berhasil Di Tambahkan');

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
    public function edit($peserta_id)
    {
        $edit = Peserta::findorfail($peserta_id);
        return view('admin.peserta.edit', compact('edit'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $pesertum)
    {
        // $peserta->update($request->all());
        // return redirect()->route('peserta.index')->with('success', 'Data Berhasil Di Update');
        $peserta = Peserta::findOrFail($pesertum);
        $peserta->update($request->all()); 
        return redirect()->route('peserta.index')->with('success', 'Data Berhasil Di Update');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($peserta_id)
    {
        $peserta = Peserta::findorfail($peserta_id);
        $peserta->delete();
        return redirect()->route('peserta.index')->with('success', 'Data Berhasil Di Delete');

    }
}
