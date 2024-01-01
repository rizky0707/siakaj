@extends('layouts.app')
@section('title', 'Absensi')   

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" type="text/css">
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Report Absensi Tables </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Tables</a></li>
          <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            
          <div class="card-body">
            {{-- @if ($message = Session::get('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Berhasil !</strong> {{ $message }}.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif --}}
            <div class="row">
                <div class="col">
                <h6 class="m-0 font-weight-bold text-primary card-title">Report DataTables Absensi</h6>
                </div>
                <div class="col text-right">
                    <a href="{{route('absensi.create')}}" class="btn btn-primary btn-sm">Create Absensi</a>
                </div>
                
                </div>
                <form action="{{route('indexLaporan')}}" method="GET">
                    <div class="row justify-content-center">
                        <label for="">Mulai</label>
                      <div class="col-md-2">
                        <input type="date" class="form-control" name="start_date">
                      </div>
                      <label for="">Akhir</label>
                      <div class="col-md-2">
                        <input type="date" class="form-control" name="end_date">
                      </div>
                      <div class="col-md-2">
                        <button class="btn btn-primary btn-sm" type="submit">Cari</button>
                        <a href="{{route('indexLaporan')}}" class="btn btn-danger btn-sm">Reset</a>
                    </div>
                    </div>
                  </form>
            </p>
            <table id="example" class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Nama</th>
                  <th> Acara</th>
                  <th> Kehadiran</th>
                  <th> Jam Register</th>
                  <th> Tanggal Absen</th>
                </tr>
              </thead>
              <tbody>
                <?php $no= 1; ?>
                @foreach ($absensi as $item)   
                <tr>
                  <td> {{$no++}} </td>
                  <td> {{$item->peserta_id}} </td>
                  <td> {{$item->acara_id}} </td>
                  <td> {{$item->kehadiran}} </td>
                  <td> {{$item->jam_absensi}} </td>
                  <td> {{$item->tgl_absen}} </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection
@section('script')
<script>
    $(document).ready(function() {
    $('#example').DataTable();
    } );
  </script> 
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
@endsection