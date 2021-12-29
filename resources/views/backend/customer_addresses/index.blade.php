@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Customer').__('Addresses') }}</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.customer_addresses.create') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">{{ __('Add address') }}</span>
                </a>
            </div>
        </div>

        @include('backend.customer_addresses.filter.filter')

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>{{ __('Customer') }}</th>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Shipping Info') }}</th>
                    <th>{{ __('Location') }}</th>
                    <th>{{ __('Address') }}</th>
                    <th>{{ __('ZIP code') }}</th>
                    <th class="text-center" style="width: 30px;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($customer_addresses as $address)
                    <tr>
                        <td>
                            <a href="{{ route('admin.customers.show', $address->user_id) }}">{{ $address->user->full_name }}</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.customer_addresses.show', $address->id) }}">{{ $address->address_title }}</a>
                            <p class="text-gray-400"><b>{{ $address->defaultAddress() }}</b></p>
                        </td>
                        <td>
                            {{ $address->first_name . ' ' . $address->last_name }}
                            <p class="text-gray-400">{{ $address->email }}<br/>{{ $address->mobile }}</p>
                        </td>
                        <td>{{ $address->country->name . ' - ' . $address->state->name .' - ' . $address->city->name }}</td>
                        <td>{{ $address->address }}</td>
                        <td>{{ $address->zip_code }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.customer_addresses.edit', $address->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="javascript:void(0)" onclick="if (confirm('是否確認要刪除該筆資料') ) { document.getElementById('delete-address-{{ $address->id }}').submit(); } else { return false; }" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                <form action="{{ route('admin.customer_addresses.destroy', $address->id) }}" method="post" id="delete-address-{{ $address->id }}" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No addresses found</td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8">
                            <div class="float-right">
                                {!! $customer_addresses->appends(request()->all())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection
