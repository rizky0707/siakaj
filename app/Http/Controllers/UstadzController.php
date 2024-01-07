<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ustadz;
use App\Models\Acara;
use DB;

class UstadzController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ustadz = Ustadz::latest()->get();


        // dd($item->total_materi);
        
        return view('admin.ustadz.index', compact('ustadz', 'jumlahAcara', 'total'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ustadz.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Ustadz $ustadz)
    {
       
        Ustadz::create($request->all());
        return redirect()->route('ustadz.index')->with('success', 'Data Berhasil Di Tambahkan');
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
    public function edit($ustadz_id)
    {
        $edit = Ustadz::findorfail($ustadz_id);
        return view('admin.ustadz.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ustadz $ustadz)
    {
        $ustadz->update($request->all());
        // dd($request->all());

        return redirect()->route('ustadz.index')->with('success', 'Data Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ustadz_id)
    {
        $ustadz = Ustadz::findorfail($ustadz_id);
        $ustadz->delete();
        return redirect()->route('ustadz.index')->with('success', 'Data Berhasil Di Delete');
    }
}
