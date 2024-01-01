@extends('layouts.app')
@section('title', 'Peserta')   

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" type="text/css">
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">  Peserta Tables </h3>
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
                <h6 class="m-0 font-weight-bold text-primary card-title">DataTables Peserta</h6>
                </div>
                <div class="col text-right">
                    <a href="{{route('peserta.create')}}" class="btn btn-primary btn-sm">Create Peserta</a>
                </div>
                </div>
                <form action="{{route('peserta.import')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row justify-content-center">
                    
                      <label for="">Pilih File</label>
                      <div class="col-md-4">
                      <input type="file" class="form-control" name="file" required>
                      </div>
                      <div class="col-md-2">
                        <button class="btn btn-success" type="submit">Import</button>
                      </div>
                  </div>
                </form>
            </p>
            <table id="example" class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Tanggal Daftar</th>
                  <th> Nama</th>
                  <th> Status</th>
                  <th> No HP</th>
                  <th> Jam Daftar</th>
                  <th> Alamat</th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php $no= 1; ?>
                @foreach ($peserta as $item)   
                <tr>
                  <td> {{$no++}} </td>
                  <td> {{$item->tgl_daftar}} </td>
                  <td> {{$item->nama}} </td>
                  <td> {{$item->status}} </td>
                  <td> {{$item->no_hp}} </td>
                  <td> {{$item->jam_daftar}} </td>
                  <td> {{$item->alamat}} </td>
                  <td>
                    <form action="{{ route('peserta.destroy', $item->peserta_id) }}" method="POST">
                        <a href="{{ route('peserta.edit', $item->peserta_id) }}" class="btn btn-success btn-xs" style="
                          padding-top: 1px;
                          padding-bottom: 1px;
                      ">Edit</a> 
                        @csrf
                        @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-xs" style="
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