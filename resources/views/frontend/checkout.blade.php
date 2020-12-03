@extends('layouts.frontend_layout')
@section('title', 'Checkout')
@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Resister, if you are not Register betore!
                </div>
                <div class="card-body">
                    <form action="{{ route('customer_sign_up') }}" method="post" >
                        @csrf
                       
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input id="first_name" class="form-control" type="text" name="first_name"
                                value="" placeholder="Enter First Name">
                                @error('first_name')
                            <div style="color:red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input id="last_name" class="form-control" type="text" name="last_name"
                                value="" placeholder="Enter Last Name">
                                @error('last_name')
                                <div style="color:red">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="email_address">Email Address</label>
                            <input id="email_address" class="form-control" type="text" name="email_address" value="" placeholder="Enter Your Email">
                            @error('email_address')
                            <div style="color:red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone_number"> Phone Number</label>
                            <input id="phone_number" class="form-control" type="text" name="phone_number"
                            value="" placeholder="Enter Your Phone Number">
                            @error('phone_number')
                            <div style="color:red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" class="form-control" type="password" name="password"
                                value="" placeholder="Enter Your Password">
                                @error('password')
                                <div style="color:red">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" id="address" cols="30"
                                rows="2" placeholder="Enter Your full address "></textarea>
                                @error('address')
                                <div style="color:red">{{ $message }}</div>
                                @enderror
                        </div>
                        <input class="btn btn-success btn-lg btn-block" type="submit" value="Resister">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            @if(session('wrong_info'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('wrong_info') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
         
         
          
          
        
            <div class="card">
                <div class="card-header">
                   Already Registered? Login here!
                </div>
                <div class="card-body">
                    <form action="{{ route('customer_login') }}" method="post" >
                        @csrf
                        <div class="form-group">
                            <label for="email_address">Email Address</label>
                            <input id="email_address" class="form-control" type="text" name="email_address"
                                value="" placeholder="Enter Your Email">
                                @error('email_address')
                                <div style="color:red">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" class="form-control" type="password" name="password"
                                value="" placeholder="Enter Your Password">
                                @error('passwrod')
                                <div style="color:red">{{ $message }}</div>
                                @enderror
                        </div>

                        <input class="btn btn-success btn-lg btn-block" type="submit" value="Login">
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection