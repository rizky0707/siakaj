@extends('layouts.app')
@section('title', 'Profile')   
   
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Profile Users </h3>
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
                <h4 class="card-title">Profile</h4>
                <p class="card-description"> siakaj </p>
                <form class="forms-sample">
                    @csrf
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="{{ Auth::user()->name }}" class="form-control" id="name" placeholder="name" readonly>
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" value="{{ Auth::user()->username }}" class="form-control" id="username" placeholder="username" readonly>
                  </div>
                  <div class="form-group">
                    <label for="Dibuat">Dibuat</label>
                    <input type="text" value="{{ Auth::user()->created_at }}" class="form-control" id="Dibuat" placeholder="Dibuat" readonly>
                </div>
                  {{-- <button type="submit" class="btn btn-danger mr-2">Submit</button> --}}
                </form>
              </div>
            </div>
          </div>
    
    </div>
  </div>
@endsection
