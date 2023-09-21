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
      const url = 'sales';

      function handleDelete(id) {
        $('#delete-form').attr('action', `{{ url('${url}/${id}') }}`);

        $.ajax({
          url: `{{ url('${url}/${id}') }}`,
          complete: function() {
            $('#delete-modal').modal('show');
          },
          success: function(data) {
            $('#address').html(data.address);
          }
        });
      }
  </script>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="page-title">
      <div class="d-flex justify-content-between">
        <div class="">
          <h3>Sales</h3>
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
            <h5>Sales </h5>
            <span>Welcome to the Sales List Page. Here, as an administrator, you have full control to manage the available products. You can easily perform various actions such as editing, deleting, or adding new products as per your requirements. Please use the provided menu and tools to efficiently manage your product catalog.</span>
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
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($transactions as $row)
                    <tr>
                      <td><a href="javascript:void(0)"><img class="rounded" src="{{ $row->product->image }}" alt=""></a></td>
                      <td><a href="javascript:void(0)">
                          <h6> {{ $row->product->name }} </h6></a><span>{{ $row->product->description }}</span></td>
                      <td><a href="javascript:void(0)">
                          <h6> {{ $row->user->name }} </h6></a><span>{{ $row->user->description }}</span></td>
                      <td>Rp. {{ number_format($row->subtotal) }}</td>
                      <td>{{ $row->quantity }}</td>
                      <td>{{ $row->status }}</td>
                      <td>
                        @if ($row->status == 'paid')
                          <button class="btn btn-warning btn-xs" onclick="handleDelete({{ $row->id }})" data-bs-toggle="modal" data-bs-target="#delete-modal">Process</button>
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

    <!-- Delete Modal -->
    <form method="POST" id="delete-form">
      @csrf
      <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger" id="exampleModalLabel">Are you sure you want to process?</h5>
              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <h4>Address :</h4>
              <p id="address"></p>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" type="submit">Process</button>
            </div>
          </div>
        </div>
      </div>
    </form>
@endsection