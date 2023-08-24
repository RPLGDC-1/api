@if ($errors->count() > 0)
  @foreach ($errors->all() as $message)
  <div class="alert alert-danger" role="alert">
      {{ $message }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  @endforeach
@endif
