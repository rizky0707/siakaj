@extends('layouts.app')
@section('title', 'Create Peserta')   
   
@section('content')
 
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Form Peserta Create </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Tables</a></li>
          <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
        </ol>
      </nav>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Create Peserta</h4>
                <p class="card-description"> siakaj </p>
                <form class="forms-sample" method="POST" action="{{route('peserta.store')}}">
                    @csrf
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" name="nama" value="{{old('nama')}}" class="form-control" id="nama" placeholder="nama" required>
                    </div>
                    <div class="form-group">
                      <label for="status">Status Peserta</label>
                    <select class="form-control" name="status" id="status" required>
                      <option value="" disabled selected>
                        Pilih Status Peserta*</option>
                      <option value="Daris">Daris</option>
                      <option value="Halaqah Umum">Halaqah Umum</option>
                      <option value="Umum">Umum</option>
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="no_hp">No HP</label>
                      <input type="number" name="no_hp" value="{{old('no_hp')}}" class="form-control" id="no_hp" placeholder="no hp" required>
                      <small>Nomor HP 0877xxxx</small>

                    </div>
                  <div class="form-group">
                    <label for="tgl_acara">Tangggal Daftar</label>
                    <input type="date" name="tgl_daftar" value="{{old('tgl_daftar')}}" class="form-control" id="tgl_daftar" placeholder="Tanggal Daftar" required>
                  </div>
                  <div class="form-group">
                    <label for="jam_daftar">Jam Daftar</label>
                    <input type="time" name="jam_daftar" value="{{old('jam_daftar')}}" class="form-control" id="jam_daftar" placeholder="Jam Daftar" required>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat"  class="form-control" cols="30" rows="10" required>{{old('alamat')}}</textarea>
                  </div>
                  <button type="submit" class="btn btn-danger mr-2">Submit</button>
                </form>
              </div>
            </div>
          </div>
    </div>
  </div>
@endsection
