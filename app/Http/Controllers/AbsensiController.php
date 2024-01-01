<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Ustadz;
use App\Models\Absensi;
use App\Models\Acara;
use Carbon\Carbon;
use App\Imports\AbsensiImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AbsensiExport;


class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensi = Absensi::whereDay('tgl_absen', now()->day)->latest()->get();
        return view('admin.absensi.index', compact('absensi'));

    }

     /**
     * Import data Absensi.
     */
    public function import(Request $request)
    {
        $file = $request->file('file')->store('public/import');

        $import = new AbsensiImport;
        $import->import($file);
 
        if($import->failures()->isNotEmpty()){
            return back()->withFailures($import->failures());
        }

        return redirect('admin/absensi')->with('success-import', 'Data Berhasil di Import');
    }

    public function export() 
    {
      return (new AbsensiExport)->download('data_absensi.xlsx');   
    }

    public function indexLaporan()
    {
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $absensi = Absensi::whereBetween('tgl_absen',[$start_date,$end_date])->get();
        } else {
            $absensi = Absensi::latest()->get();
        }
        return view('admin.laporan.index', compact('absensi'));

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $absensi = Absensi::all();
        $peserta = Peserta::all();
        $acara = Acara::latest()->limit(1)->get();
        return view('admin.absensi.create', compact('absensi', 'peserta', 'acara'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Absensi $absensi)
    {
        Absensi::create($request->all());
        return redirect()->route('absensi.index')->with('success', 'Data Berhasil Di Tambahkan');

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
    public function edit($absensi_id)
    {
        $edit = Absensi::findorfail($absensi_id);
        $peserta = Peserta::all();
        $acara = Acara::latest()->limit(1)->get();
        return view('admin.absensi.edit', compact('edit', 'peserta', 'acara'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absensi $absensi)
    {
        $absensi->update($request->all());
        return redirect()->route('absensi.index')->with('success', 'Data Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($absensi_id)
    {
        $absensi = Absensi::findorfail($absensi_id);
        $absensi->delete();
        return redirect()->route('absensi.index')->with('success', 'Data Berhasil Di Delete');

    }
}
