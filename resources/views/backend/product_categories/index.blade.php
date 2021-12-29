@extends('layouts.admin')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Product Categories') }}</h6>
        <div class="ml-auto">
            @ability('admin','create_product_categories')
            <a href="{{ route('admin.product_categories.create') }}" class="btn btn-primary">
                <span class="icon text-white-50">
                    <i class="fa fa-plus"></i>
                </span>
                <span class="text">{{ __('Add category') }}</span>
            </a>
            @endability
        </div>
    </div>

    @include('backend.product_categories.filter.filter')

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Products count') }}</th>
                    <th>{{ __('Parent category') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Created at') }}</th>
                    <th class="text-center" style="width: 30px;">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->products_count }}</td>
                    <td>{{ $category->parent != null ? $category->parent->name : '-' }}</td>
                    <td>{{ $category->status() }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('admin.product_categories.edit', $category->id) }}"
                                class="btn btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="javascript:void(0);"
                                onclick="if (confirm('是否確認要刪除該筆資料')) { document.getElementById('delete-product-category-{{ $category->id }}').submit(); } else { return false; }"
                                class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                        <form action="{{ route('admin.product_categories.destroy', $category->id) }}" method="post"
                            id="delete-product-category-{{ $category->id }}" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">{{ __('No categories found') }}</td>
                </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">
                        <div class="float-right">
                            {!! $categories->appends(request()->all())->links() !!}
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection
