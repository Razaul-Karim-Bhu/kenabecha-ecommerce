@extends('backend.dashboard')
@section('title', 'Manage Order')
@section('content')
@if(session('category_delete_message'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">

    {{ session('category_delete_message') }}

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif


<div class="container">
   
              
    <div class="row">
            <div class="col-md-12 mb-5">
                    <h2 class="text-center">Product info for this order</h2>
                <table class="table table-hover table-bordered ">
                    <thead class="thead-light">
                        <tr>
                            <th>SN.</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order_details as $key => $order_detail)
                        <tr>
                            <td>{{ $loop->index +1 }}</td>
                            <td>{{ $order_detail->product_id }}</td>
                            <td>{{ $order_detail->product_name }}</td>
                            <td><img src="{{ asset('uploads/product_image') }}/{{ $order_detail->product_image }}" class="img-fluid" width="100px" alt=""></td>
                            <td>{{ $order_detail->product_price }}</td>
                            <td>{{ $order_detail->product_quantity }}</td>
                            <td>{{ $order_detail->product_quantity * $order_detail->product_price}}</td>
                        </tr> 
                        @endforeach
                             
                    </tbody>
                </table>
            </div>
        </div>

</div>

@endsection