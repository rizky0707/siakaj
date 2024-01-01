@extends('layouts.app')
@section('title', 'Edit Acara')   
   
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Form Acara Edit </h3>
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
                <h4 class="card-title">Edit Acara</h4>
                <p class="card-description"> siakaj </p>
                <form class="forms-sample" method="POST" action="{{route('acara.update', $edit->acara_id)}}">
                    @csrf
                    @method('PUT')
                  <div class="form-group">
                    <label for="tgl_acara">Tangggal acara</label>
                    <input type="date" name="tgl_acara" value="{{ $edit->tgl_acara }}" class="form-control" id="tgl_acara" placeholder="tgl_acara">
                  </div>
                  <div class="form-group">
                    <label for="materi">Materi</label>
                    <input type="text" name="materi" value="{{ $edit->materi }}" class="form-control" id="materi" placeholder="materi">
                  </div>
                  <div class="form-group">
                    <label for="jam_acara">Jam Acara</label>
                    <input type="time" name="jam_acara" value="{{ $edit->jam_acara }}" class="form-control" id="jam_acara" placeholder="jam_acara">
                  </div>
                  <div class="form-group">
                    <label for="tempat">Tempat</label>
                    <input type="text" name="tempat" value="{{ $edit->tempat }}" class="form-control" id="tempat" placeholder="tempat">
                  </div>
                  <div class="form-group">
                    <label for="materi">Pemateri</label>
                  <select class="form-control" name="pemateri" id="sub_category_name">
                    <option value="0" disabled selected>
                      Pilih Pemateri *</option>
                    @foreach($ustadz as $item)
                    <option value="{{$item->ustadz_id}}" {{$item->ustadz_id == $edit->pemateri ? 'selected' : ''}}>{{$item->nama}}</option>
                    @endforeach
                  </select>
                  </div>
                  <button type="submit" class="btn btn-danger mr-2">Update</button>
                </form>
              </div>
            </div>
          </div>
    </div>
  </div>
@endsection
