@extends('backend.dashboard')
@section('title', 'Category Manage')
@section('content')
@if(session('product_delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">

    {{ session('product_delete') }}

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<h3 class="bg-primary text-white text-center p-2">Main Data</h3>

<table class="table table-dark table-responsive">
    <thead>
      <tr>
        <th scope="col">SN</th>
        <th scope="col">Product Name</th>
        <th scope="col">Category Id</th>
        <th scope="col">Product Summary</th>
        <th scope="col">Product Price</th>
        <th scope="col">Created At</th>
        <th scope="col">Publication Status</th>
        <th scope="col">Product Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

        
  
        
      @forelse($products as $key => $product)
      <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td>{{ $product->product_name }}</td>
        <td>{{ $product->relationToCategory->category_name }}</td>
        <td>{{ $product->product_summary }}</td>
        <td>{{ $product->product_price }}</td>
        <td>{{ $product->created_at->diffForHumans() }}</td>
        <td>{{($product->publication_status==1 ? 'Published':'Unpublished')}}</td>
        <td>
          <img src="{{ asset('uploads/product_image') }}/{{($product->product_image)}}" alt="" class="img-fluid">
        </td>
        <td class="btn-group">
            <a href="{{ route('product_edit',$product->id) }}" class="btn btn-outline-warning">Edit</a>
            <a href="{{ route('product_delete',$product->id) }}" class= "btn btn-outline-danger">Delete</a>
            @if($product->publication_status == 1)
            <a href="{{ route('unpublished_product',$product->id) }}" class= "btn btn-outline-info">Unpublish</a>
            @else
            <a href="{{ route('published_product',$product->id) }}" class= "btn btn-outline-info">Publish</a>
            @endif
        </td>
        @empty
        <td><h5>No data Found</h5></td>
      </tr>
      @endforelse
     
     
      
    </tbody>
  </table>
  {{ $products->links() }}

<h3 class="bg-primary text-white text-center p-2 mt-5">Trashed Data</h3>
  {{--  Soft Deleted Data  --}}
  <table class="table table-dark table-responsive">
    <thead>
      <tr>
        <th scope="col">SN</th>
        <th scope="col">Product Name</th>
        <th scope="col">Category Id</th>
        <th scope="col">Product Summary</th>
        <th scope="col">Product Price</th>
        <th scope="col">Created At</th>
        <th scope="col">Publication Status</th>
        <th scope="col">Product Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse($trashed as $key => $trashed_product)
      <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td>{{ $trashed_product->product_name }}</td>
        <td>{{ $trashed_product->category_id }}</td>
        <td>{{ $trashed_product->product_summary }}</td>
        <td>{{ $trashed_product->product_price }}</td>
        <td>{{ $trashed_product->created_at }}</td>
        <td>{{($trashed_product->publication_status==1 ? 'Published':'Unpublished')}}</td>
        <td>
          <img src="{{ asset('uploads/product_image') }}/{{($trashed_product->product_image)}}" alt="" class="img-fluid">
        </td>
        <td class="btn-group">
            <a href="{{ route('product_edit',$trashed_product->id) }}" class="btn btn-outline-warning">Edit</a>
            <a href="{{ route('product_restore',$trashed_product->id) }}" class= "btn btn-outline-danger">Restore</a>
            
            <a href="{{ route('product_destroy',$trashed_product->id) }}" class= "btn btn-outline-danger">Destroy</a>
        </td>
      </tr>
      @empty
        
      <td><h5>No data Found</h5></td>
      @endforelse
     
      
    </tbody>
  </table>
  {{ $trashed->links() }}
@endsection