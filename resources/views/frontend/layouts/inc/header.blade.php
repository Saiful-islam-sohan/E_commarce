<header class="header-area">
    <div class="header-top bg-2">
        <div class="fluid-container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <ul class="d-flex header-contact">
                        <li><i class="fa fa-phone"></i> +01 123 456 789</li>
                        <li><i class="fa fa-envelope"></i> youremail@gmail.com</li>
                    </ul>
                </div>
                <div class="col-md-6 col-12">
                    <ul class="d-flex account_login-area">
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-user"></i> My Account <i
                                    class="fa fa-angle-down"></i></a>
                            <ul class="dropdown_style">
                                <li><a href="{{route('login_page')}}">Login</a></li>
                                <li><a href="{{route('register_page_c')}}">Register</a></li>
                                <li><a href="{{ route('cart.page') }}">Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="wishlist.html">wishlist</a></li>
                                <li><a href="{{route('customer_logout')}}">logout</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('register_page_c')}}"> Login/Register </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="fluid-container">
            <div class="row">
                <div class="col-lg-3 col-md-7 col-sm-6 col-6">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assest/frontend') }}/images/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 d-none d-lg-block">
                    <nav class="mainmenu">
                        <ul class="d-flex">
                            <li class="active"><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="about.html">About</a></li>
                            <li>
                                <a href="javascript:void(0);">Shop <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_style">
                                    <li><a href="{{ route('shope') }}">Shop Page</a></li>
                                    <li><a href="single-product.html">Product Details</a></li>
                                    <li><a href="{{ route('cart.page') }}">Shopping cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Pages <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_style">
                                    <li><a href="about.html">About Page</a></li>
                                    <li><a href="single-product.html">Product Details</a></li>
                                    <li><a href="{{ route('cart.page') }}">Shopping cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Blog <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_style">
                                    <li><a href="blog.html">blog Page</a></li>
                                    <li><a href="blog-details.html">blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-4 col-lg-2 col-sm-5 col-4">
                    <ul class="search-cart-wrapper d-flex">
                        <li class="search-tigger"><a href="javascript:void(0);"><i class="flaticon-search"></i></a></li>
                        <li>
                            <a href="javascript:void(0);"><i class="flaticon-like"></i> <span>2</span></a>
                            <ul class="cart-wrap dropdown_style">

                                @php
                                    $carts = \Gloudemans\Shoppingcart\Facades\Cart::content();
                                    $total_price = \Gloudemans\Shoppingcart\Facades\Cart::subtotal();
                                @endphp
                                @foreach ($carts as $item)
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img
                                                src="{{ asset('uplodes/product_photos') }}/{{ $item->options->product_image }}" class=""
                                            alt="">
                                        </div>
                                        <div class="cart-content">
                                            <a href="{{ route('cart.page') }}">{{ $item->name }}t</a>
                                            <span>{{ $item->qty }}</span>
                                            <p>{{ $item->qty * $item->price }}</p>
                                            {{-- <a href="{{ route('removefrom.cart',['cart_id' => $cartitem->rowId]) }}">
                                            <i class="fa fa-times"></i>
                                        </a> --}}
                                        </div>
                                    </li>
                                @endforeach


                                <li>Subtotol: <span class="pull-right">{{ $total_price }}</span></li>
                                <li>
                                    <button>Check Out</button>
                                </li>
                            </ul>
                        </li>
                        {{-- crt items --}}
                        <li>
                            <a href="javascript:void(0);"><i class="flaticon-shop"></i> <span>3</span></a>
                            <ul class="cart-wrap dropdown_style">


                                @php
                                    $carts = \Gloudemans\Shoppingcart\Facades\Cart::content();
                                    $total_price = \Gloudemans\Shoppingcart\Facades\Cart::subtotal();
                                @endphp

                                @foreach ($carts as $item)
                                {{-- {{$carts}} --}}
                                    <li class="cart-items">
                                        <div class="cart-img">

                                            {{-- <img src="{{ asset('uplodes/product_photos') }}" />{{ $item->options->product_image }}"  class=""> --}}
                                            <img src="{{ asset('uplodes/product_photos') }}/{{ $item->options->product_image }}" alt="" class="h-10 w-10" style="width: 70px">


                                        </div>
                                        <div class="cart-content">
                                            <a href="{{ route('cart.page') }}">{{ $item->name }}t</a>
                                            <span>{{ $item->qty }}</span>
                                            <p>{{ $item->qty * $item->price }}</p>
                                            <a href="{{ route('removefrom.cart',['cart_id' => $item->rowId]) }}">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach



                                <li>Subtotol: <span class="pull-right">{{$total_price}}</span></li>
                                <li>
                                    <button>Check Out</button>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-md-1 col-sm-1 col-2 d-block d-lg-none">
                    <div class="responsive-menu-tigger">
                        <a href="javascript:void(0);">
                            <span class="first"></span>
                            <span class="second"></span>
                            <span class="third"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- responsive-menu area start -->
        <div class="responsive-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-block d-lg-none">
                        <ul class="metismenu">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About</a></li>
                            <li class="sidemenu-items">
                                <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Shop </a>
                                <ul aria-expanded="false">
                                    <li><a href="shop.html">Shop Page</a></li>
                                    <li><a href="single-product.html">Product Details</a></li>
                                    <li><a href="{{ route('cart.page') }}">Shopping cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                </ul>
                            </li>
                            <li class="sidemenu-items">
                                <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Pages </a>
                                <ul aria-expanded="false">
                                    <li><a href="about.html">About Page</a></li>
                                    <li><a href="single-product.html">Product Details</a></li>
                                    <li><a href="{{ route('cart.page') }}">Shopping cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                </ul>
                            </li>
                            <li class="sidemenu-items">
                                <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Blog</a>
                                <ul aria-expanded="false">
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- responsive-menu area start -->
    </div>
</header>
