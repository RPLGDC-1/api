@extends('layouts.admin')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/datatables.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/owlcarousel.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/rating.css') }}">
@endsection

@section('js')
  <script src="{{ url('/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('/js/rating/jquery.barrating.js') }}"></script>
  <script src="{{ url('/js/rating/rating-script.js') }}"></script>
  <script src="{{ url('/js/owlcarousel/owl.carousel.js') }}"></script>
  <script src="{{ url('/js/ecommerce.js') }}"></script>
  <script src="{{ url('/js/product-list-custom.js') }}"></script>

  <script>
    const url = 'roles';

    function handleDelete(id) {
      $('#delete-form').attr('action', `{{ url('${url}/${id}') }}`);
    }
  </script>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="page-title">
      <div class="d-flex justify-content-between">
        <div class="">
          <h3>Edit Role</h3>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid list-roles">
    
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="mb-5 row g-3">
                <label class="col-sm-3 col-form-label text-sm-end">Name</label>
                <div class="col-xl-5 col-sm-9">
                  <div class="input-group">
                    <input class="form-control @error('name') is-invalid border-danger @enderror" name="name" type="text" placeholder="Enter name" value="{{ old('name', $role->name) }}">
                    @error('name')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              @foreach ($permissions as $row)
                <div class="mb-3 row g-3">
                  <label class="col-sm-3 col-form-label text-sm-end"></label>
                  <div class="col-xl-5 col-sm-9">
                    <div class="input-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="{{ $row->id }}" @if($role->permissions->contains($row->id)) checked @endif  id="{{ $row->id }}">
                        <label class="form-check-label" for="{{ $row->id }}">{{ ucfirst($row->name) }}</label>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
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
  <!-- Individual column searching (text inputs) Ends-->
  <!-- Container-fluid Ends-->
@endsection