@extends('layouts.frontend_layout')
@section('title', 'Shop Page')
@section('content')

    <!-- Page Title area start -->
    <div class="page-tile-area py-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('shop_page_view') }}">Shop</a></li>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title area start -->
    <div class="shop-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <!-- widget with Number start -->
                    <div class="widget-area ">
                        <ul id="myUL">
                            <!-- Title with underline-->
                            <div class="main-title-with-underline pb-4 mt-0">
                                <h4>categories</h4>
                            </div>
                            <!---  Category Start-->
                           
                            <li>
                                <div class="caret title caret-down">All Categories</div>
                                <ul class="nested active">
                                    @foreach($all_categories as $key => $all_category)
                                    <li><a href="{{ route('product_show_by_category',$all_category->id) }}">{{ $all_category->category_name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                          
                            <!---  Category Ends-->
                            

                            <!-- Title with underline-->
                            <div class="main-title-with-underline pb-4">
                                <h4>Shop by</h4>
                            </div>
                            <!---  color options-->
                            <li>
                                <div class="caret title">color options</div>
                                <ul class="nested">
                                    <li><a href="#">Black <span>(15)</span></a></li>
                                    <li><a href="#">White <span> (09)</span></a></li>
                                    <li><a href="#">Blue <span> (12)</span></a></li>
                                    <li><a href="#">Red<span> (4)</span></a></li>
                                    <li><a href="#">Screen<span> (05)</span></a></li>
                                </ul>
                            </li>
                            <!---  color options End-->
                            <!--- Size options-->
                            <li>
                                <div class="caret title">Size options</div>
                                <ul class="nested">
                                    <li><a href="#">l <span>(15)</span></a></li>
                                    <li><a href="#"> m <span> (09)</span></a></li>
                                    <li><a href="#">s <span> (12)</span></a></li>
                                    <li><a href="#">xl<span> (4)</span></a></li>
                                </ul>
                            </li>
                            <!---  Size options End-->
                            <li>
                                <div class="caret title">Beverages</div>
                                <ul class="nested">
                                    <li><a href="#">Chairs</a></li>
                                    <li><a href="#">Storage</a></li>
                                    <li>
                                        <div class="caret">Tea</div>
                                        <ul class="nested">
                                            <li><a href="#">Chairs</a></li>
                                            <li><a href="#">Storage</a></li>
                                            <li>
                                                <div class="caret">Green Tea</div>
                                                <ul class="nested">
                                                    <li><a href="#">Chairs</a></li>
                                                    <li><a href="#">Tables</a></li>
                                                    <li><a href="#">Office</a></li>
                                                    <li><a href="#">Storage</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <div class="main-title-with-underline pb-4">
                                <h4>Compare</h4>
                            </div>
                            <li>
                                <div class="caret title">Beverages</div>
                                <ul class="nested">
                                    <li><a href="#">l <span>(15)</span></a></li>
                                    <li><a href="#"> m <span> (09)</span></a></li>
                                    <li><a href="#">s <span> (12)</span></a></li>
                                    <li><a href="#">xl<span> (4)</span></a></li>
                                    <li>
                                        <div class="caret">Tea</div>
                                        <ul class="nested">
                                            <li><a href="#">l <span>(15)</span></a></li>
                                            <li><a href="#"> m <span> (09)</span></a></li>
                                            <li><a href="#">s <span> (12)</span></a></li>
                                            <li><a href="#">xl<span> (4)</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!---  Color option-->
                            <li>
                                <div class="caret title">color options</div>
                                <ul class="nested">
                                    <li><a href="#">Black <span>(15)</span></a></li>
                                    <li><a href="#">White <span> (09)</span></a></li>
                                    <li><a href="#">Blue <span> (12)</span></a></li>
                                    <li><a href="#">Red<span> (4)</span></a></li>
                                    <li><a href="#">Screen<span> (05)</span></a></li>

                                </ul>
                            </li>
                            <!---  Color option-->
                            <li>
                                <div class="caret title">color options</div>
                                <ul class="nested">
                                    <li><a href="#">Black <span>(15)</span></a></li>
                                    <li><a href="#">White <span> (09)</span></a></li>
                                    <li><a href="#">Blue <span> (12)</span></a></li>
                                    <li><a href="#">Red<span> (4)</span></a></li>
                                    <li><a href="#">Screen<span> (05)</span></a></li>

                                </ul>
                            </li>
                            <!---  Color option End-->
                        </ul>
                    </div>
                    <!-- widget Number End  -->

                </div> <!-- Col-3  end-->
                <div class="col-lg-9">
                    <!-- Banner area start  -->
                    <div class="banner-area">
                        <img src="img/banner-img/banner2.jpg" alt="" class="img-fluid">
                    </div>
                    <!-- Banner area  End-->
                    <!-- List view and grid view tab start-->
                    <div class="shop-layout-area py-5">
                        <div class="shop-layout-bar clearfix ">
                            <ul class="nav shop-tap" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#grid-view" role="tab">
                                        <i class="fas fa-th-large"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#list-view" role="tab">
                                        <i class="fas fa-list"></i>
                                    </a>
                                </li>
                            </ul>
                            <div class="filter-section">
                                <select name="" id="">
                                    <option value="#">Default short</option>
                                    <option value="#">Default short</option>
                                    <option value="#">Default short</option>
                                    <option value="#">Default short</option>
                                    <option value="#">Default short</option>
                                </select>
                            </div>
                            <div class="showing-result">
                                <span>Showing 1-12 of 30 relults</span>
                            </div>

                        </div>
                        <!-- tab content-->
                        <div class="tab-content pt-4">
                            <!-- tab grid content-->
                            <div class="tab-pane fade active show" id="grid-view" role="tabpanel">
                                <div class="row">
                                    @foreach($all_products as $key => $all_product)
                                    <div class="col-md-4">
                                        <!--Single product start-->
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <a href="{{ route('product_detail',$all_product->id) }}"> <img src="{{ asset('uploads/product_image') }}/{{ $all_product->product_image }}" alt=""></a>
                                                {{--  <a href="#"> <img class="secondary-img"
                                                        src="img/product-img/product1.jpg" alt=""></a>  --}}
                                                <span>hot</span>
                                                <div class="product-action">
                                                    <a href="#"><i class="far fa-eye"></i></a>
                                                    <a href="#"><i class="fas fa-balance-scale"></i></a>
                                                    <a href="#"><i class="fas fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <h3><a href="#">{{ $all_product->product_name }}</a></h3>
                                                <div class="rating">
                                                    <i class="fas far fa-star"></i>
                                                    <i class="fas far fa-star"></i>
                                                    <i class="fas far fa-star"></i>
                                                    <i class="fas far fa-star"></i>
                                                    <i class="fas far fa-star"></i>
                                                </div>
                                                <div class="price">
                                                    <span>$ {{ $all_product->product_price }} </span>
                                                    <span><del>$239.9</del></span>
                                                </div>
                                                <div class="cart-btn">
                                                    <form action="{{ route('add_to_cart') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="product_quantity" value="1">
                                                        <input type="hidden" name="product_id" value="{{ $all_product->id }}">
                                                   <div class="cart-pro">
                                                       <button class="btn btn-outline-dark btn-lg" type="submit">Add to Cart</button>
                                                   </div>
                                                  </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single product End-->
                                    </div>
                                    @endforeach
                                    {{ $all_products->links() }}
                                   
                                </div>
                            </div>
                            <!-- tab list content-->
                            <div class="tab-pane fade" id="list-view" role="tabpanel">
                               @foreach($all_products as $key => $all_product)
                               <div class="row pb-4">
                                <div class="col-md-4">
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="{{ route('product_detail',$all_product->id) }}"> <img src="{{ asset('uploads/product_image') }}/{{ $all_product->product_image }}" alt=""></a>
                                            {{--  <a href="#"> <img class="secondary-img"
                                                    src="img/product-img/product1.jpg" alt=""></a>  --}}
                                            <span>hot</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="product-content-list">
                                        <h3>{{ $all_product->product_name }}</h3>
                                        <p>{{ $all_product->product_summary }}</p>
                                        <div class="rating-list">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <span>3 Reating(s) | Add Your Reating(s)</span>
                                        </div>
                                        <div class="price-list">
                                            <span>$ {{ $all_product->product_price }} </span>
                                        </div>
                                        <div class="cart-and-action">
                                            <div class="cart-btn-list">
                                                <a href="{{ route('product_detail',$all_product->id) }}">Add  cart</a>
                                            </div>
                                            <div class="product-action-list">
                                                <a href="#"><i class="far fa-eye"></i></a>
                                                <a href="#"><i class="fas fa-balance-scale"></i></a>
                                                <a href="#"><i class="fas fa-heart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                               @endforeach
                               {{ $all_products->links() }}
                            </div>
                        </div>
                    </div>
                    <!-- List view and grid view tab End-->
                </div>
            </div>
        </div>
    </div>
   @endsection