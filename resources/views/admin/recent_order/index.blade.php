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
          <h3>Recent orders</h3>
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
            <h5>Recent orders </h5>
            <span>Welcome to the Recent orders List Page. Here, as an administrator, you have full control to manage the available products. You can easily perform various actions such as editing, deleting, or adding new products as per your requirements. Please use the provided menu and tools to efficiently manage your product catalog.</span>
          </div>
          <div class="card-body">
            <div class="table-responsive product-table">
              <table class="display" id="basic-1">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Details</th>
                    <th>Customer</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Start date</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($recent_orders as $row)
                    <tr>
                      <td><a href="javascript:void(0)"><img class="rounded" src="{{ $row->product->image }}" alt=""></a></td>
                      <td><a href="javascript:void(0)">
                          <h6> {{ $row->product->name }} </h6></a><span>{{ $row->product->description }}</span></td>
                      <td><a href="javascript:void(0)">
                          <h6> {{ $row->user->name }} </h6></a><span>{{ $row->user->description }}</span></td>
                      <td>Rp. {{ number_format($row->subtotal) }}</td>
                      <td>{{ $row->quantity }}</td>
                      <td>{{ date("d F Y", strtotime($row->created_at)) }}</td>
                      <td>{{ $row->status }}</td>
                      
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