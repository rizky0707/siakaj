<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Ustadz;
use App\Models\Acara;
use App\Models\Absensi;
use App\Models\User;
use Carbon\Carbon;
use DB;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // menampilkan data bulanan 

        $tahun = date('Y');
        $bulan = date('m');
        for ($i = 1; $i <= $bulan; $i++) {
            $totalAbsen = Absensi::whereYear('tgl_absen', $tahun)->whereMonth('tgl_absen', $i)->count();
            $dataBulan[] = Carbon::create()->month($i)->format('F');
            $dataTotalAbsen[] = $totalAbsen;
        }
    
        // menghitung jumlah perserta yang hadir

        $jumlahKehadiranPeserta = Absensi::select('peserta_id', DB::raw('count(*) as total_kehadiran'))
        ->where('kehadiran', 'hadir')
        ->groupBy('peserta_id')
        ->take(3)
        ->get();

        foreach ($jumlahKehadiranPeserta as $item){
            $nama[] = $item->peserta_id;
            $total[] = $item->total_kehadiran;
        }

         // menghitung jumlah pemateri yang hadir
        $jumlahAcara = Acara::select('pemateri', DB::raw('count(*) as total_materi'))
        ->where('kehadiran', 'hadir')
        ->groupBy('pemateri')
        ->get();

        foreach ($jumlahAcara as $item){
            $namaAcara[] = $item->pemateri;
            $totalAcara[] = $item->total_materi;
        }

    // dd($jumlahKehadiranPeserta);

        $data['nama'] = $nama;
        $data['namaAcara'] = $namaAcara;
        $data['total'] = $total;
        $data['totalAcara'] = $totalAcara;
        $data['jumlahKehadiranPeserta'] = $jumlahKehadiranPeserta;
        $data['jumlahAcara'] = $jumlahAcara;
        $data['dataBulan'] = $dataBulan;
        $data['dataTotalAbsen'] = $dataTotalAbsen;
        $data['count_peserta'] = Peserta::all()->count();
        $data['count_ustadz'] = Ustadz::all()->count();
        $data['count_acara'] = Acara::all()->count();
        
        return view('home', $data);
    }

    // public function notifikasiPeserta()
    // {
    //     $jumlahKehadiranPeserta = Absensi::select('peserta_id', DB::raw('count(*) as total_kehadiran'))
    //     ->where('kehadiran', 'hadir')
    //     ->groupBy('peserta_id')
    //     ->take(3)
    //     ->get();
    // }

    public function profile() 
    {
        return view('auth.profile');
    }

}
