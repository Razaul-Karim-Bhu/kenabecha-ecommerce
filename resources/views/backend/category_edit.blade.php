@extends('backend.dashboard')
@section('content')
@if(session('category_add_msg'))
<div class="alert alert-success alert-dismissible fade show" role="alert">

    {{ session('category_add_msg') }}

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<form action="{{ route('category_edit_post') }}" method="post">
    @csrf
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Category Name</label>
      <div class="col-sm-10">
        <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control" id="inputEmail3">
        <input type="hidden" name="category_id" value="{{ $category->id }}" class="form-control" id="inputEmail3">
        @error('category_name')
        <div class="text-danger">{{ $message }}</div>
         @enderror
      </div>
     
    </div>
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Category Description</label>
      <div class="col-sm-10">
        <textarea class="form-control" name="category_description" id="" cols="30" rows="10">{{ $category->category_description }}</textarea>
        @error('category_description')
        <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <fieldset class="form-group">
      <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Status</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input"  type="radio" value="1" name="publication_status" id="gridRadios1" checked>
            <label class="form-check-label" for="gridRadios1">
              Published
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" {{ $category->publication_status == 0 ? 'checked' : ' ' }} value="0" name="publication_status" id="gridRadios2">
            <label class="form-check-label" for="gridRadios2">
              Unpublished
            </label>
          </div>
        </div>
      </div>
    </fieldset>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Category Update</button>
      </div>
    </div>
  </form>
@endsection