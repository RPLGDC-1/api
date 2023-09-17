@extends('layouts.admin')

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $('.dropify').dropify();
  </script>
@endsection

@section('content')
<div class="container-fluid">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-sm-6">
        <h3>Edit Customer</h3>
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="date-picker">
            <form class="theme-form" action="{{ route('admins.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3 row g-3">
                <label class="col-sm-3 col-form-label text-sm-end">Name</label>
                <div class="col-xl-5 col-sm-9">
                  <div class="input-group">
                    <input class="form-control @error('name') is-invalid border-danger @enderror" name="name" type="text" placeholder="Enter name" value="{{ old('name', $customer->name) }}">
                    @error('name')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="mb-3 row g-3">
                <label class="col-sm-3 col-form-label text-sm-end">Email</label>
                <div class="col-xl-5 col-sm-9">
                  <div class="input-group">
                    <input class="form-control @error('email') is-invalid border-danger @enderror" name="email" type="email" placeholder="Enter email" value="{{ old('email', $customer->email) }}" readonly>
                    @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="mb-3 row g-3">
                <label class="col-sm-3 col-form-label text-sm-end"></label>
                <div class="col-xl-5 col-sm-9">
                  <div class="input-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid Ends-->
@endsection