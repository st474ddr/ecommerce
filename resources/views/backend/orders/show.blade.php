@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Order') }} ({{ $order->ref_id }})</h6>
            <div class="ml-auto">
                <form action="{{ route('admin.orders.update', $order->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-row align-items-center">
                        <label class="sr-only" for="inlineFormInputGroupUsername">{{ __('Username') }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">{{ __('Order').__('Status') }}</div>
                            </div>
                            <select class="form-control" name="order_status" style="outline-style: none;" onchange="this.form.submit()">
                                <option value=""> {{ __('Choose the action') }} </option>
                                @foreach($order_status_array as $key => $value)
                                    <option value="{{ $key }}">{{ __($value) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex">
            <div class="col-8">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>Ref. Id</th>
                            <td>{{ $order->ref_id }}</td>
                            <th>{{ __('Customer') }}</th>
                            <td><a href="{{ route('admin.customers.show', $order->user_id) }}">{{ $order->user->full_name }}</a></td>
                        </tr>
                        <tr>
                            <th>{{ __('Address') }}</th>
                            <td><a href="{{ route('admin.customer_addresses.show', $order->user_address_id) }}">{{ $order->user_address->address_title }}</a></td>
                            <th nowrap>{{ __('Shipping Company') }}</th>
                            <td>{{ $order->shipping_company->name . '('. $order->shipping_company->code .')' }}</td>
                        </tr>
                        <tr>
                            <th nowrap>{{ __('Created at') }}</th>
                            <td>{{ $order->created_at->format('d-m-Y h:i a') }}</td>
                            <th>{{ __('Order').__('Status') }}</th>
                            <td>{!! $order->statusWithLabel() !!}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-4">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>{{ __('Subtotal') }}</th>
                            <td>{{ $order->currency() . $order->subtotal }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Discount code') }}</th>
                            <td>{{ $order->discount_code }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Discount') }}</th>
                            <td>{{ $order->currency() . $order->discount }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Shipping') }}</th>
                            <td>{{ $order->currency() . $order->shipping }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Tax') }}</th>
                            <td>{{ $order->currency() . $order->tax }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Amount') }}</th>
                            <td>{{ $order->currency() . $order->total }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Transactions') }}</h6>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>{{ __('Transaction') }}</th>
                    <th>{{ __('Transaction number') }}</th>
                    <th>{{ __('Payment result') }}</th>
                    <th>{{ __('Action date') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($order->transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->status($transaction->transaction) }}</td>
                        <td>{{ $transaction->transaction_number }}</td>
                        <td>{{ $transaction->payment_result }}</td>
                        <td>{{ $transaction->created_at->format('Y-m-d h:i a') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">{{ __('No transactions found') }}</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Details') }}</h6>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>{{ __('Product') }}</th>
                    <th>{{ __('Quantity') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($order->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">{{ __('No products found') }}</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
