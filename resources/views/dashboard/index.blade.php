@extends('layouts.admin')

@section('content')
<div class="container-fluid">        
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-sm-6">
          <h3>Dashboard</h3>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid default-dash">
    <div class="row"> 
      <div class="col-xl-12 col-md-12">
        <div class="card profile-greeting">
          <div class="card-body">
            <div class="media">
              <div class="media-body"> 
                <div class="greeting-user">
                  <h1>Hello, {{ auth()->user()->name }}</h1>
                  <p>Selamat datang di menu dashboard!</p>
                </div>
              </div>
            </div>
            <div class="cartoon-img"><img class="img-fluid" src="{{ url('images/images.svg') }}" alt=""></div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card">
          <div class="card-body d-flex align-items-center">
            <i class="fa-light fa-user-group text-success fa-fw fa-2x"></i>
            <div class="mx-4">
              <h2 class="m-0">10</h2>
              <h5 class="m-0 fw-light">Karyawan</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card">
          <div class="card-body d-flex align-items-center">
            <i class="fa-light fa-building text-info fa-fw fa-2x"></i>
            <div class="mx-4">
              <h2 class="m-0">{{ 10 }}</h2>
              <h5 class="m-0 fw-light">Divisi</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card">
          <div class="card-body d-flex align-items-center">
            <i class="fa-light fa-location-dot text-primary fa-fw fa-2x"></i>
            <div class="mx-4">
              <h2 class="m-0">{{ 10 }}</h2>
              <h5 class="m-0 fw-light">Lokasi</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card bg-primary">
          <div class="card-body d-flex align-items-center">
            <i class="fa-light fa-clock fa-fw fa-2x"></i>
            <div class="mx-4">
              <h2 class="m-0">{{ 10 }}</h2>
              <h5 class="m-0 fw-light">Presensi</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->
@endsection