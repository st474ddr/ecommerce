@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Products') }}</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">{{ __('Add product') }}</span>
                </a>
            </div>
        </div>

        @include('backend.products.filter.filter')

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Featured') }}</th>
                    <th>{{ __('Quantity') }}</th>
                    <th>{{ __('Price') }}</th>
                    <th>{{ __('Tags') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Created at') }}</th>
                    <th class="text-center" style="width: 30px;">{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>
                            @if ($product->firstMedia)
                                <img src="{{ asset('assets/products/' . $product->firstMedia->file_name) }}" width="60" height="60" alt="{{ $product->name }}">
                            @else
                                <img src="{{ asset('assets/no-image.jpg') }}" width="60" height="60" alt="{{ $product->name }}">
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->featured() }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->tags->pluck('name')->join(', ') }}</td>
                        <td>{{ $product->status() }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void(0);" onclick="if (confirm('是否確認要刪除該筆資料')) { document.getElementById('delete-product-{{ $product->id }}').submit(); } else { return false; }" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="post" id="delete-product-{{ $product->id }}" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">{{ __('No products found') }}</td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="9">
                            <div class="float-right">
                                {!! $products->appends(request()->all())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection
