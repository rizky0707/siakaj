@extends('layouts.app')
@section('title', 'Edit Ustadz')   
   
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Form Ustadz Edit </h3>
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
                <h4 class="card-title">Edit Ustadz</h4>
                <p class="card-description"> siakaj </p>
                <form class="forms-sample" method="POST" action="{{route('ustadz.update', $edit->ustadz_id)}}">
                    @csrf
                    @method('PUT')
                  <div class="form-group">
                    <label for="nohp">Nama</label>
                    <input type="text" value="{{$edit->nama}}" name="nama" class="form-control" id="nama" placeholder="nama">
                  </div>
                  <div class="form-group">
                    <label for="nohp">No HP</label>
                    <input type="text" value="{{$edit->no_hp}}" name="no_hp"  class="form-control" id="nohp" placeholder="nohp">
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
