@extends('layouts.app')
@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
            <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">{{ __('Checkout') }}</h1>
            </div>
            <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                        <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('frontend.cart') }}">{{ __('Cart') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Checkout') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <livewire:frontend.checkout-component />
</section>
@endsection
