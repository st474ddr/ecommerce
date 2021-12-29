@extends('layouts.app')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
            <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">{{ __('RegisterPage') }}</h1>
            </div>
            <div class="col-lg-6 text-lg-right">

            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="row">
        <div class="col-6 offset-3">
            <h2 class="h5 text-uppercase mb-4">{{ __('Register') }}</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="text-small text-uppercase" for="last_name">{{ __('Last Name') }}</label>
                            <input class="form-control form-control-lg" name="last_name" type="text"
                                value="{{ old('last_name') }}" placeholder="{{ __('Enter your last name') }}">
                            @error('last_name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="text-small text-uppercase" for="first_name">{{ __('First Name') }}</label>
                            <input class="form-control form-control-lg" name="first_name" type="text"
                                value="{{ old('first_name') }}" placeholder="{{ __('Enter your first name') }}">
                            @error('first_name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-small text-uppercase" for="username">{{ __('Username') }}</label>
                            <input class="form-control form-control-lg" name="username" type="text"
                                value="{{ old('username') }}" placeholder="{{ __('Enter your username') }}">
                            @error('username')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-small text-uppercase" for="email">{{ __('E-mail Address') }}</label>
                            <input class="form-control form-control-lg" name="email" type="email"
                                value="{{ old('email') }}" placeholder="{{ __('Enter your e-mail address') }}">
                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-small text-uppercase" for="mobile">{{ __('Mobile Number') }}</label>
                            <input class="form-control form-control-lg" name="mobile" type="number"
                                value="{{ old('mobile') }}" placeholder="{{ __('Enter your mobile number') }}">
                            @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-small text-uppercase" for="password">{{ __('Password') }}</label>
                            <input class="form-control form-control-lg" name="password" type="password"
                                placeholder="{{ __('Enter your password') }}">
                            @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-small text-uppercase" for="password_confirmation">{{ __('Confirm Password') }}</label>
                            <input class="form-control form-control-lg" name="password_confirmation" type="password"
                                placeholder="{{__('Enter your password again') }}">
                            @error('password_confirmation')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <button class="btn btn-dark" type="submit">{{ __('Register') }}</button>

                            @if (Route::has('login'))
                            <a class="btn btn-link" href="{{ route('login') }}">
                                {{ __('Have an account?') }}
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
