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
    const url = 'categories';

    function handleDelete(id) {
      $('#delete-form').attr('action', `{{ url('${url}/${id}') }}`);
    }

    function handleCreate() {
      $('#crud-form input[name="_method"]').val('POST');
      $('input[name="name"]').val("");
    };

    function handleUpdate(id) {
      $('#crud-form input[name="_method"]').val('PUT');
      $('#crud-form').attr('action', `{{ url('${url}/${id}') }}`);

      $.ajax({
        url: `{{ url('${url}/${id}') }}`,
        complete: function() {
          $('#crud-modal').modal('show');
        },
        success: function(data) {
          $('input[name="name"]').val(data.name);
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
          <h3>Category list</h3>
        </div>
        <div class="">
          <a class="btn btn-primary" href="javascript:void(0)" onclick="handleCreate()" data-bs-toggle="modal" data-bs-target="#crud-modal">Add Category</a>
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
            <h5>Category </h5>
            <span>Welcome to the Category List Page. Here, as an administrator, you have full control to manage the available categories. You can easily perform various actions such as editing, deleting, or adding new categories as per your requirements. Please use the provided menu and tools to efficiently manage your product catalog.</span>
          </div>
          <div class="card-body">
            <div class="table-responsive product-table">
              <table class="display" id="basic-1">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $row)
                    <tr>
                      <td class="text-start">{{ $row->name }}</td>
                      <td>{{ date("d F Y", strtotime($row->created_at)) }}</td>
                      <td>
                        <button class="btn btn-primary btn-xs" onclick="handleUpdate({{ $row->id }})" data-original-title="btn btn-danger btn-xs" title="">Edit</button>
                        <button class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="handleDelete({{ $row->id }})" data-bs-toggle="modal" data-bs-target="#delete-modal">Delete</button>
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

  <!-- CRUD Modal -->
<form action="{{ route('categories.store') }}" method="POST" id="crud-form">
  @csrf
  @method('POST')
  <div class="modal fade" id="crud-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="crud-body">
          <div class="form-group">
            <label for="name">Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" autocomplete="off" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>

  <!-- Delete Modal -->
  <form method="POST" id="delete-form">
    @csrf
    @method('DELETE')
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-danger" id="exampleModalLabel">Are you sure you want to delete?</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">Deleted data cannot be recovered!</div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Hapus</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection