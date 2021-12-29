@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" href="{{ asset('backend/vendor/pickadate/themes/classic.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendor/pickadate/themes/classic.date.css') }}">
    <style>
        .picker__select--month, .picker__select--year {
            padding: 0 !important;
        }
    </style>
@endsection
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Create').__('Coupon') }}</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.product_coupons.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">{{ __('Coupons') }}</span>
                </a>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route('admin.product_coupons.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="code">{{ __('Code') }}</label>
                            <input type="text" name="code" id="code" value="{{ old('code') }}" class="form-control">
                            @error('code')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <label for="type">{{ __('Discount type') }}</label>
                        <select name="type" class="form-control">
                            <option value="">---</option>
                            <option value="fixed" {{ old('type') == 'fixed' ? 'selected' : null }}>{{ __('Fixed discount type') }}</option>
                            <option value="percentage" {{ old('type') == 'percentage' ? 'selected' : null }}>{{ __('Percentage discount type') }}</option>
                        </select>
                         @error('type')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="value">{{ __('Discount') }}</label>
                            <input type="text" name="value" value="{{ old('value') }}" class="form-control">
                            @error('value')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="use_times">{{ __('Use times') }}</label>
                            <input type="number" name="use_times" value="{{ old('use_times') }}" class="form-control">
                            @error('use_times')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="start_date">{{ __('Start date') }}</label>
                            <input type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" class="form-control">
                            @error('start_date')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="expire_date">{{ __('Expire date') }}</label>
                            <input type="text" name="expire_date" id="expire_date" value="{{ old('expire_date') }}" class="form-control">
                            @error('expire_date')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="greater_than">{{ __('Greater than') }}</label>
                            <input type="number" name="greater_than" value="{{ old('greater_than') }}" class="form-control">
                            @error('greater_than')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="status">{{ __('Status') }}</label>
                            <select name="status" class="form-control">
                                <option value="1" {{ old('status') == '1' ? 'selected' : null }}>{{ __('Active') }}</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : null }}>{{ __('Inactive') }}</option>
                            </select>
                            @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                            @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="form-group pt-4">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Add Coupon') }}</button>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{ asset('backend/vendor/pickadate/picker.js') }}"></script>
    <script src="{{ asset('backend/vendor/pickadate/picker.date.js') }}"></script>
    <script>
        $.extend($.fn.pickadate.defaults, {
            monthsFull: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
            weekdaysShort: ['一', '二', '三', '四', '五', '六', '日'],
            today: '移至今天',
            clear: '清除',
            close: '確認',
            formatSubmit: 'yyyy-mm-dd'
        })
        $(function(){
            $('#code').keyup(function () {
                this.value = this.value.toUpperCase();
            });

            $('#start_date').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: true, // Creates a dropdown to control month
                closeOnSelect: true, // Close upon selecting a date,
            });
            var startdate = $('#start_date').pickadate('picker');
            var enddate = $('#expire_date').pickadate('picker');

            $('#start_date').change(function() {
                selected_ci_date ="";
                selected_ci_date = $('#start_date').val();
                if (selected_ci_date != null)   {
                    var cidate = new Date(selected_ci_date);
                    min_codate = "";
                    min_codate = new Date();
                    min_codate.setDate(cidate.getDate()+1);
                    enddate.set('min', min_codate);
                }
            });

            $('#expire_date').pickadate({
                format: 'yyyy-mm-dd',
                min : new Date(),
                selectMonths: true, // Creates a dropdown to control month
                selectYears: true, // Creates a dropdown to control month
                clear: '清除',
                close: '確認',
                closeOnSelect: true // Close upon selecting a date,
            });

        });
    </script>
@endsection
