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
        <div class="col-md-8 mx-auto mb-4">
                <h2 class="text-center">Order info for this order</h2>
            <table class="table table-hover table-bordered ">
                    <tr>
                        <th>Order No</th>
                        <td>{{ $order->id }}</td>
                    </tr>
                    <tr>
                        <th>Order Total </th>
                        <td>{{ $order->total_price }}</td>
                    </tr>
                    <tr>
                        <th>Order Status  </th>
                        <td>{{ $order->order_status }}</td>
                    </tr>
					<tr>
                        <th>Payment Status  </th>
                        <td>{{ $order->payment_status }}</td>
                    </tr>
					<tr>
                        <th>Payment type  </th>
                        <td>{{ $order->payment_type }}</td>
                    </tr>
                    <tr>
                        <th>Order Date </th>
                        <td>{{ $order->created_at }}</td>
                    </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto mb-4">
                <h2 class="text-center">Customer info for this order</h2>
            <table class="table table-hover table-bordered ">
                    <tr>
                        <th>Customer Name </th>
                        <td>{{ $customer->first_name.' '.$customer->last_name }}</td>
                    </tr>
                    <tr>
                        <th>Phone Number </th>
                        <td>{{ $customer->phone_number }}</td>
                    </tr>
                    <tr>
                        <th>Email Address </th>
                        <td>{{ $customer->email_address }}</td>
                    </tr>
                    <tr>
                        <th>Address </th>
                        <td>{{ $customer->address }}</td>
                    </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto mb-4">
                <h2 class="text-center">Shipping info for this order</h2>
            <table class="table table-hover table-bordered ">
                    <tr>
                        <th>Full Name </th>
                        <td>{{ $shipping->full_name }}</td>
                    </tr>
                    <tr>
                        <th>Phone Number </th>
                        <td>{{ $shipping->phone_number }}</td>
                    </tr>
                    <tr>
                        <th>Email Address </th>
                        <td>{{ $shipping->email_address }}</td>
                    </tr>
                    <tr>
                        <th>Address </th>
                        <td>{{ $shipping->address }}</td>
                    </tr>
            </table>
        </div>
    </div>
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