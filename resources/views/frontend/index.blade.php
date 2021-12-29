@extends('layouts.app')

@section('content')

<!-- HERO SECTION-->
<section class="hero pb-3 bg-cover bg-center d-flex align-items-center"
    style="background: url('{{ asset('assets/sliders/hero-banner-alt.jpg') }}')">
    <div class="container py-5">
        <div class="row px-4 px-lg-5">
            <div class="col-lg-6">
                <p class="text-muted small text-uppercase mb-2">最新特惠</p>
                <h1 class="h2 text-uppercase mb-3">新品特價8折</h1><a class="btn btn-dark"
                    href="{{ route('frontend.shop') }}">查看商品</a>
            </div>
        </div>
    </div>
</section>
<!-- CATEGORIES SECTION-->
<section class="pt-5">
    <header class="text-center">
        <h4 class="h4 text-uppercase mb-4">{{ __('Product Categories') }}</h4>
    </header>
    <div class="row">
        <div class="col-md-4"><a class="category-item"
                href="{{ route('frontend.shop', $product_categories[3]->slug) }}"><img class="img-fluid"
                    src="{{ asset('assets/product_categories/' . $product_categories[3]->cover) }}" alt=""><strong
                    class="category-item-title">Electronics</strong></a></div>
        <div class="col-md-4 mb-4 mb-md-0"><a class="category-item mb-4"
                href="{{ route('frontend.shop', $product_categories[1]->slug) }}"><img class="img-fluid"
                    src="{{ asset('assets/product_categories/' . $product_categories[1]->cover) }}" alt=""><strong
                    class="category-item-title">Shoes</strong></a><a class="category-item"
                href="{{ route('frontend.shop', $product_categories[2]->slug) }}"><img class="img-fluid"
                    src="{{ asset('assets/product_categories/' . $product_categories[2]->cover) }}" alt=""><strong
                    class="category-item-title">Watches</strong></a></div>
        <div class="col-md-4 mb-4 mb-md-0"><a class="category-item"
                href="{{ route('frontend.shop', $product_categories[0]->slug) }}"><img class="img-fluid"
                    src="{{ asset('assets/product_categories/' . $product_categories[0]->cover) }}" alt=""><strong
                    class="category-item-title">{{ __('Clothes') }}</strong></a></div>
    </div>
</section>

<livewire:frontend.featured-product />

<!-- SERVICES-->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-4">
                <div class="d-inline-block">
                    <div class="media align-items-end">
                        <svg class="svg-icon svg-icon-big svg-icon-light">
                            <use xlink:href="#label-tag-1"> </use>
                        </svg>
                        <div class="media-body text-left ml-3">
                            <h6 class="text-uppercase mb-1">{{ __('Festival offer') }}</h6>
                            <p class="text-small mb-0 text-muted">{{ __('The greatest deal') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3 mb-lg-0">
                <div class="d-inline-block">
                    <div class="media align-items-end">
                        <svg class="svg-icon svg-icon-big svg-icon-light">
                            <use xlink:href="#helpline-24h-1"> </use>
                        </svg>
                        <div class="media-body text-left ml-3">
                            <h6 class="text-uppercase mb-1">{{ __('24 x 7 service') }}</h6>
                            <p class="text-small mb-0 text-muted">{{ __('Best customer service staff') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3 mb-lg-0">
                <div class="d-inline-block">
                    <div class="media align-items-end">
                        <svg class="svg-icon svg-icon-big svg-icon-light">
                            <use xlink:href="#delivery-truck-1"> </use>
                        </svg>
                        <div class="media-body text-left ml-3">
                            <h6 class="text-uppercase mb-1">{{ __('Free shipping') }}</h6>
                            <p class="text-small mb-0 text-muted">{{ __('Free shipping worlwide') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- NEWSLETTER-->
<section class="py-5">
    <div class="container p-0">
        <div class="row">
            <div class="col-lg-6">
                <form action="#">
                    <div class="input-group flex-column flex-sm-row mb-3">
                        <input class="form-control form-control-lg py-3" type="email"
                            placeholder="{{ __('Enter your e-mail address') }}" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-dark btn-block" id="button-addon2" type="submit">{{ __('Subscribe') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection