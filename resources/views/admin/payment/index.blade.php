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
  <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>

  <script>
    const url = 'customers';

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
          <h3>Customer list</h3>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid list-categories">
    <div class="row">
      <!-- Individual column searching (text inputs) Starts-->
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <h5>Customer </h5>
            <span>Welcome to the Customer List Page. Here, as an administrator, you have full control to manage the available categories. You can easily perform various actions such as editing, deleting, or adding new categories as per your requirements. Please use the provided menu and tools to efficiently manage your product catalog.</span>
          </div>
          <div class="card-body">
            <div class="table-responsive product-table">
              <table class="display" id="basic-1">
                <thead>
                  <tr>
                    <th>Method</th>
                    <th>Body</th>
                    <th>TransactionId</th>
                    <th>Status</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($logs as $row)
                    <tr>
                      <td class="text-start">{{ $row->method }}</td>
                      <td>
                        <pre class="prettyprint">{{ json_encode(json_decode($row->body), JSON_PRETTY_PRINT) }}</pre>
                      </td>
                      <td class="text-start">{{ $row->transactionId }}</td>
                      <td class="text-start">{{ json_decode($row->body)->transaction_status }}</td>
                      <td>{{ date("d F Y", strtotime($row->created_at)) }}</td>
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