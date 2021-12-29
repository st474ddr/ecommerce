@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Payment Methods') }}</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.payment_methods.create') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">{{ __('Add payment method') }}</span>
                </a>
            </div>
        </div>

        @include('backend.payment_methods.filter.filter')

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Code') }}</th>
                    <th>{{ __('Environment') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th class="text-center" style="width: 30px;">{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($payment_methods as $payment_method)
                    <tr>
                        <td>{{ __($payment_method->name) }}</td>
                        <td>{{ $payment_method->code }}</a></td>
                        <td>{{ $payment_method->sandbox() }}</a></td>
                        <td>{{ __($payment_method->status()) }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.payment_methods.edit', $payment_method->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="javascript:void(0)" onclick="if (confirm('是否確認要刪除該筆資料') ) { document.getElementById('delete-payment-method-{{ $payment_method->id }}').submit(); } else { return false; }" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </div>
                            <form action="{{ route('admin.payment_methods.destroy', $payment_method->id) }}" method="post" id="delete-payment-method-{{ $payment_method->id }}" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No payment methods found</td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="5">
                        <div class="float-right">
                            {!! $payment_methods->appends(request()->input())->links() !!}
                        </div>
                    </th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection
