@extends('frontend.layouts.master')

@section('frontendtille')
    Home Page
@endsection


@section('frontend_content')
<!-- slider-area start -->
@include('frontend.pages.widgest.slider')
<!-- slider-area end -->


<!-- featured-area start -->
@include('frontend.pages.widgest.featured')
<!-- featured-area end -->


<!-- start count-down-section -->
@include('frontend.pages.widgest.countdown')
<!-- end count-down-section -->


<!--  best seller product-area start -->
@include('frontend.pages.widgest.best-seller')
<!--  best seller product-area end -->


<!-- lartest product-area start -->
@include('frontend.pages.widgest.lateast-product')
<!-- latest product-area end -->

<!-- testmonial-area start -->
@include('frontend.pages.widgest.testmonial')
<!-- testmonial-area end -->


@endsection



