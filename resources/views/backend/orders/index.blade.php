@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Orders') }}</h6>
        </div>

        @include('backend.orders.filter.filter')

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>{{ __('Ref. Id') }}</th>
                    <th>{{ __('Customer') }}</th>
                    <th>{{ __('Payment method') }}</th>
                    <th>{{ __('Amount') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Created at') }}</th>
                    <th class="text-center" style="width: 30px;">{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->ref_id }}</td>
                        <td>{{ $order->user->full_name }}</td>
                        <td>{{ $order->payment_method->name }}</td>
                        <td>{{ $order->currency() . $order->total }}</td>
                        <td>{!! $order->statusWithLabel() !!}</td>
                        <td>{{ $order->created_at->format('Y-m-d h:i a') }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="javascript:void(0);" onclick="if (confirm('是否確認要刪除該筆資料')) { document.getElementById('delete-orders-{{ $order->id }}').submit(); } else { return false; }" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="post" id="delete-orders-{{ $order->id }}" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No orders found</td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">
                            <div class="float-right">
                                {!! $orders->appends(request()->all())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection
