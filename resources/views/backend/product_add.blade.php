@extends('backend.dashboard')
@section('title', 'Add Product')
@section('content')
@if(session('product_add_msg'))
<div class="alert alert-success alert-dismissible fade show" role="alert">

    {{ session('product_add_msg') }}

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<form action="{{ route('product_save') }}" method="post" name="product_form" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
      <label for="procuct_name" class="col-sm-2 col-form-label">Product Name</label>
      <div class="col-sm-10">
        <input type="text" name="product_name" value="{{ old('product_name') }}" class="form-control" id="procuct_name">
        @error('product_name')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <div class="form-group row">
        <label for="category_id" class="col-sm-2 col-form-label">Category Name</label>
        <div class="col-sm-10">
          <select name="category_id" id="category_id" class="form-control">
              <option value="">--Select a Category--</option>
              @foreach($categories as $key => $category)
              <option value="{{ $category->id }}">{{ $category->category_name }}</option>
              @endforeach
             
          </select>
          @error('category_id')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>


      <div class="form-group row">
        <label for="product_summary" class="col-sm-2 col-form-label">Product Summary</label>
        <div class="col-sm-10">
          <textarea name="product_summary" id="product_summary" cols="30" rows="2" class="form-control">{{ old('product_summary') }}</textarea>
          @error('product_summary')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>


      <div class="form-group row">
        <label for="summary-ckeditor" class="col-sm-2 col-form-label">Product Description</label>
        <div class="col-sm-10">
          <textarea name="product_description" id="summary-ckeditor" cols="30" rows="5" class="form-control">{{ old('product_description') }}</textarea>
          @error('product_description')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="procuct_price" class="col-sm-2 col-form-label">Product Price</label>
        <div class="col-sm-10">
          <input type="text" value="{{ old('product_price') }}" name="product_price" class="form-control" id="procuct_price">
          @error('product_price')
          <div class="text-danger">{{ $message }}</div>
           @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="procuct_image" class="col-sm-2 col-form-label">Product Image</label>
        <div class="col-sm-10">
          <input type="file" name="product_image" class="form-control" id="procuct_image">
          @error('product_image')
          <div class="text-danger">{{ $message }}</div>
           @enderror
        </div>
      </div>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0">Status</legend>
          <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" type="radio" value="1" name="publication_status" id="gridRadios1" checked>
              <label class="form-check-label" for="gridRadios1">
                Published
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="0" name="publication_status" id="gridRadios2">
              <label class="form-check-label" for="gridRadios2">
                Unpublished
              </label>
            </div>
          </div>
        </div>
      </fieldset>


    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Add Product</button>
      </div>
    </div>
  </form>
  
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
document.forms['product_form'].elements['category_id'].value = {{ old('category_id') }};
</script>
@endsection

