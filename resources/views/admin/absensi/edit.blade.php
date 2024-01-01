@extends('layouts.app')
@section('title', 'Edit Absensi')   
   
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
  .select2-container .select2-selection--single {
    display: block !important;
    width: 100% !important;
    height: calc(1.5em + 0.75rem + 2px) !important;
    padding: 0.375rem 0.2rem !important;
    /* padding: 0.375rem 0.75rem; */
    font-size: 1rem !important;
    font-weight: 400 !important;
    line-height: 1.5 !important;
    color: #6e707e !important;
    background-color: #fff !important;
    background-clip: padding-box !important;
    border: 1px solid #d1d3e2 !important;
    border-radius: 0.35rem !important;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
</style>
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Form Absensi Edit </h3>
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
                <h4 class="card-title">Edit Absensi</h4>
                <p class="card-description"> siakaj </p>
                <form class="forms-sample" method="POST" action="{{route('absensi.update', $edit->absensi_id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="nama">Nama</label>
                    <select class="form-control js-example-placeholder-single" name="peserta_id" id="sub_category_name">
                      <option value="0" disabled selected>
                        Pilih Nama *</option>
                      @foreach($peserta as $item)
                      <option value="{{$item->nama}}" {{$item->nama == $edit->peserta_id ? 'selected' : ''}}>{{$item->nama}}</option>
                      @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="acara_id">Materi</label>
                      @foreach($acara as $item)
                      <input type="text" name="acara_id" value="{{$item->materi}}" {{$item->materi == $edit->acara_id}}  class="form-control" id="acara_id" placeholder="acara_id" readonly>
                      @endforeach
                    </div>
                    <div class="form-group">
                      <label for="kehadiran">Komfirmasi Kehadiran</label>
                      <div class="form-check">
                        <input class="form-check-input" id="ya" type="radio" name="kehadiran" value="hadir" {{$edit->kehadiran = 'hadir' ? 'checked' : ''}} >
                        <label class="form-check-label" for="ya">Hadir</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" id="tidak" type="radio" name="kehadiran" value="tidak" {{$edit->kehadiran = 'tidak' ? 'checked' : ''}}>
                      <label class="form-check-label" for="tidak">Tidak</label>
                  </div>
                    </div>
                  <div class="form-group">
                    <label for="jam_absensi">Jam Absensi</label>
                    <input type="time" name="jam_absensi" value="{{$edit->jam_absensi}}" class="form-control" id="jam_absensi" placeholder="jam_absensi">
                  </div>
                  <div class="form-group">
                    <label for="tgl_absen">Tanggal Absen</label>
                    <input type="date" name="tgl_absen" value="{{$edit->tgl_absen}}" class="form-control" id="tgl_absen" placeholder="tgl_absen">
                  </div>
                  
                  <button type="submit" class="btn btn-danger mr-2">Update</button>
                </form>
              </div>
            </div>
          </div>
    </div>
  </div>
  <script src="{{asset('assets/admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 
  <script>
    $(".js-example-placeholder-single").select2({
    allowClear: true
});
  </script>

@endsection
