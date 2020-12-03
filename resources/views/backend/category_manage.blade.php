@extends('backend.dashboard')
@section('title', 'Category Manage')
@section('content')
@if(session('category_delete_message'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">

    {{ session('category_delete_message') }}

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">SN</th>
        <th scope="col">Category Name</th>
        <th scope="col">Category Description</th>
        <th scope="col">Publication  Status</th>
        <th scope="col">Created At</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($categories as $key => $category)
      <tr>
        <th scope="row">{{ $loop->index + 1}}</th>
        <td>{{ $category->category_name }}</td>
        <td>{{ $category->category_description }}</td>
        <td>{{ $category->publication_status ==1 ? 'Published' : 'Unpublished' }}</td>
        <td>{{ $category->created_at }}</td>
        <td class="btn-group">
            <a href="{{ route('category_edit',$category->id) }}" class="btn btn-outline-warning">Edit</a>
            <a href="{{ route('category_delete',$category->id) }}" class= "btn btn-outline-danger">Delete</a>
            @if($category->publication_status == 1)
            <a href="{{ route('category_unpublish',$category->id) }}" class= "btn btn-outline-info">Unpublish</a>
            @else
            <a href="{{ route('category_publish',$category->id) }}" class= "btn btn-outline-info">Publish</a>
            @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $categories->links() }}
@endsection