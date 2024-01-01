@extends('layouts.app')
@section('title', 'Create Ustadz')   
   
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Form Ustadz Create </h3>
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
                <h4 class="card-title">Create Ustadz</h4>
                <p class="card-description"> siakaj </p>
                <form class="forms-sample" method="POST" action="{{route('ustadz.store')}}">
                    @csrf
                  <div class="form-group">
                    <label for="nohp">Nama</label>
                    <input type="text" name="nama" value="{{old('nama')}}" class="form-control" id="nama" placeholder="nama" required>
                  </div>
                  <div class="form-group">
                    <label for="nohp">No HP</label>
                    <input type="number" name="no_hp" value="{{old('no_hp')}}" class="form-control" id="nohp" placeholder="nohp" required>
                    <small>Nomor HP 0877xxxx</small>
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
