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
@endsection

@section('content')
  <div class="container-fluid">
    <div class="page-title">
      <div class="d-flex justify-content-between">
        <div class="">
          <h3>Customers</h3>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid list-products">
    <div class="row">
      <!-- Individual column searching (text inputs) Starts-->
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <h5>Customers </h5>
            <span>Welcome to the Customers List Page. Here, as an administrator, you have full control to manage the available products. You can easily perform various actions such as editing, deleting, or adding new products as per your requirements. Please use the provided menu and tools to efficiently manage your product catalog.</span>
          </div>
          <div class="card-body">
            <div class="table-responsive product-table">
              <table class="display" id="basic-1">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($customers as $row)
                    <tr>
                      <td class="text-start">{{ $row->name }}</td>
                      <td class="text-start">{{ $row->email }}</td>
                      <td>{{ date("d F Y", strtotime($row->created_at)) }}</td>
                      <td>
                        <button class="btn btn-primary btn-xs" onclick="window.location.href=`{{ route('admins.edit', $row->id) }}`">Edit</button>
                        @if ($row->id != auth()->user()->id)
                          <button class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="handleDelete({{ $row->id }})" data-bs-toggle="modal" data-bs-target="#delete-modal">Delete</button>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Individual column searching (text inputs) Ends-->
  <!-- Container-fluid Ends-->

@endsection