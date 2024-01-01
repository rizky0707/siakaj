@extends('layouts.app')
@section('title', 'Edit Peserta')   
   
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Form Peserta Edit </h3>
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
                <form class="forms-sample" method="POST" action="{{route('peserta.update', $edit->peserta_id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" name="nama" value="{{$edit->nama}}" class="form-control" id="nama" placeholder="nama">
                    </div>
                    <div class="form-group">
                      <label for="status">Status Peserta</label>
                    <select class="form-control" name="status" id="status">
                      <option value="0" disabled selected>
                        Pilih Status Peserta*</option>
                      <option value="Daris" {{$edit->status == 'Daris' ? 'selected' : ''}}>Daris</option>
                      <option value="Halaqah Umum" {{$edit->status == 'Halaqah Umum' ? 'selected' : ''}}>Halaqah Umum</option>
                      <option value="Umum" {{$edit->status == 'Umum' ? 'selected' : ''}}>Umum</option>
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="no_hp">No HP</label>
                      <input type="text" name="no_hp" value="{{$edit->no_hp}}" class="form-control" id="no_hp" placeholder="no hp">
                    </div>
                  <div class="form-group">
                    <label for="tgl_acara">Tangggal Daftar</label>
                    <input type="date" name="tgl_daftar" value="{{$edit->tgl_daftar}}" class="form-control" id="tgl_daftar" placeholder="Tanggal Daftar">
                  </div>
                  <div class="form-group">
                    <label for="jam_daftar">Jam Daftar</label>
                    <input type="time" name="jam_daftar" value="{{$edit->jam_daftar}}" class="form-control" id="jam_daftar" placeholder="Jam Daftar">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat"  class="form-control" cols="30" rows="10">{{$edit->alamat}}</textarea>
                  </div>
                  <button type="submit" class="btn btn-danger mr-2">Update</button>
                </form>
              </div>
            </div>
          </div>
    </div>
  </div>
@endsection
