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
        <h3>Edit Product</h3>
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
            <form class="theme-form" action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3 row g-3">
                <label class="col-sm-3 col-form-label text-sm-end">Image</label>
                <div class="col-xl-5 col-sm-9">
                  <div class="input-group  @error('image') is-invalid border-danger @enderror">
                    <input type="file" class="dropify " name="image" data-default-file="{{ $product->image }}" data-show-remove="false" data-allowed-file-extensions="png jpg jpeg" data-max-file-size="1M" />
                    @error('image')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="mb-3 row g-3">
                <label class="col-sm-3 col-form-label text-sm-end">Name</label>
                <div class="col-xl-5 col-sm-9">
                  <div class="input-group">
                    <input class="form-control @error('name') is-invalid border-danger @enderror" name="name" type="text" placeholder="Enter name" value="{{ old('name', $product->name) }}">
                    @error('name')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="mb-3 row g-3">
                <label class="col-sm-3 col-form-label text-sm-end">Stock</label>
                <div class="col-xl-5 col-sm-9">
                  <div class="input-group">
                    <input class="form-control @error('stock') is-invalid border-danger @enderror" name="stock" type="number" placeholder="Enter stock" value="{{ old('stock', $product->quantity) }}">
                    @error('stock')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="mb-3 row g-3">
                <label class="col-sm-3 col-form-label text-sm-end">Price</label>
                <div class="col-xl-5 col-sm-9">
                  <div class="input-group">
                    <input class="form-control @error('price') is-invalid border-danger @enderror numeric" name="price" type="text" placeholder="Enter price" value="{{ old('price', $product->price) }}">
                    @error('price')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="mb-3 row g-3">
                <label class="col-sm-3 col-form-label text-sm-end">Selling Price</label>
                <div class="col-xl-5 col-sm-9">
                  <div class="input-group">
                    <input class="form-control @error('selling_price') is-invalid border-danger @enderror numeric" name="selling_price" type="text" placeholder="Enter Selling price" value="{{ old('selling_price', $product->selling_price) }}">
                    @error('selling_price')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="mb-3 row g-3">
                <label class="col-sm-3 col-form-label text-sm-end">Category</label>
                <div class="col-xl-5 col-sm-9">
                  <div class="input-group">
                    <select class="form-select @error('category_id') is-invalid border-danger @enderror" name="category_id">
                      <option value="">Choose Category</option>
                      @foreach ($categories as $row)
                        <option value="{{ $row->id }}" {{ $row->id == old('category_id', $product->category_id) ? 'selected' : '' }}>{{ $product->name }}</option>
                      @endforeach
                    </select>
                    @error('category_id')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="mb-3 row g-3">
                <label class="col-sm-3 col-form-label text-sm-end">Description</label>
                <div class="col-xl-5 col-sm-9">
                  <div class="input-group">
                    <textarea class="form-control @error('description') is-invalid border-danger @enderror" placeholder="Enter description" name="description" rows="4">{{ old('description', $product->description) }}</textarea>
                    @error('description')
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