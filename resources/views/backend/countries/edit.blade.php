@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Edit').__('Country') }} {{ $country->name }}</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.countries.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">{{ __('Countries') }}</span>
                </a>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route('admin.countries.update', $country->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-9">
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" name="name" value="{{ old('name', $country->name) }}" class="form-control">
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <label for="status">{{ __('Status') }}</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status', $country->status) == '1' ? 'selected' : null }}>{{ __('Active') }}</option>
                            <option value="0" {{ old('status', $country->status) == '0' ? 'selected' : null }}>{{ __('Inactive') }}</option>
                        </select>
                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="form-group pt-4">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>

@endsection
