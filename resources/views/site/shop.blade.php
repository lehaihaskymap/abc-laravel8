@extends('layouts.site')

@section('content')

<!-- Hero Section Begin -->
@livewire('hero', ['home' => 0] )
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{url('site')}}/img/breadcrumb.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="breadcrumb__text">
          <h2>Organi Shop</h2>
          <div class="breadcrumb__option">
            <a href="./index.html">Home</a>
            <span>Shop</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-5">
        @livewire('select-condition')
      </div>
      <div class="col-lg-9 col-md-7">
        @livewire('saleoff-product')

        @livewire('product-shopping')

      </div>
    </div>
  </div>
</section>
<!-- Product Section End -->

@endsection
