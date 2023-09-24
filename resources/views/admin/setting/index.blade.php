@extends('layouts.admin')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/owlcarousel.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/rating.css') }}">
@endsection

@section('js')
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
      <div class="row">
        <div class="col-12 col-sm-6">
          <h3>Settings</h3>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
      <div class="card">
          <div class="card-body">
            <div class="row gap-5">
              <div class="col-12">
                <span class="d-flex align-items-center">
                  <div  class="me-5">
                    <h2 class="pb-0 mb-0">Reset Products</h2>
                    <span>This is for resetting products</span>
                  </div>
                  <div class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal">Reset</div>
                </span>
              </div>
              <div class="col-12">
                <span class="d-flex align-items-center">
                  <div  class="me-5">
                    <h2 class="pb-0 mb-0">Reset Transactions</h2>
                    <span>This is for resetting Transactions</span>
                  </div>
                  <div class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#transaction-modal">Reset</div>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->
  
  <!-- Delete Modal -->
  <form method="POST" id="reset-form" action="{{ route('settings.product') }}">
    @csrf
    @method('DELETE')
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-danger" id="exampleModalLabel">Are you sure you want to delete?</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">it will delete all data! Deleted data cannot be recovered!</div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Hapus</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- Delete Modal -->
  <form method="POST" id="reset-form" action="{{ route('settings.transaction') }}">
    @csrf
    @method('DELETE')
    <div class="modal fade" id="transaction-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-danger" id="exampleModalLabel">Are you sure you want to delete?</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">it will delete all data! Deleted data cannot be recovered!</div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Hapus</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection