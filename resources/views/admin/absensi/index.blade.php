@extends('layouts.app')
@section('title', 'Absensi')   

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" type="text/css">
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">  Absensi Tables </h3>
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
            @if ($message = Session::get('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Berhasil !</strong> {{ $message }}.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

    @if ($message = Session::get('success-import'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Berhasil !</strong> {{ $message }}.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
    @endif

    @if (isset($errors) && $errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      @foreach ($errors->all() as $error)
      {{$error}}
      @endforeach
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
    @endif

    @if(session()->has('failures'))
    <table class="table table-warning">
      <tr>
        <th>Baris</th>
        <th>Attributes</th>
        <th>Error</th>
        <th>Value</th>
      </tr>
      @foreach (session()->get('failures') as $validasi)
      <tr>
        <td>{{$validasi->row()}}</td>
        <td>{{$validasi->attribute()}}</td>
        <td>
          <ul>
            @foreach($validasi->errors() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
        </td>
        <td>{{$validasi->values()[$validasi->attribute()]}}</td>
      </tr>
      @endforeach
    </table>
    @endif
            <div class="row">
                <div class="col">
                <h6 class="m-0 font-weight-bold text-primary card-title">DataTables Absensi ( {{date('d-m-Y')}} )</h6>
                </div>
                <div class="col text-right">
                    <a href="{{route('absensi.create')}}" class="btn btn-primary btn-sm">Create Absensi</a>
                </div>
                </div>
                <form action="{{route('absensi.import')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row justify-content-center">
                    
                      <label for="">Pilih File</label>
                      <div class="col-md-4">
                      <input type="file" class="form-control" name="file" required>
                      </div>
                      <div class="col-md-2">
                        <button class="btn btn-success" type="submit">Import</button>
                        <a href="{{route('absensi.export')}}" class="btn btn-primary">Export</a>
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
                  <th> Action </th>
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
                  <td>
                    <form action="{{ route('absensi.destroy', $item->absensi_id) }}" method="POST">
                        <a href="{{ route('absensi.edit', $item->absensi_id) }}" class="btn btn-primary btn-sm" style="
                          padding-top: 1px;
                          padding-bottom: 1px;
                      ">Edit</a> 
                        @csrf
                        @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" style="
                      padding-top: 1px;
                      padding-bottom: 1px;
                  "
                      onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                    </td>
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