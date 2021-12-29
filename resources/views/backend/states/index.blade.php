@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('States') }}</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.states.create') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">{{ __('Add state') }}</span>
                </a>
            </div>
        </div>

        @include('backend.states.filter.filter')

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Cities count') }}</th>
                    <th>{{ __('Country') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th class="text-center" style="width: 30px;">{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($states as $state)
                    <tr>
                        <td>{{ $state->name }}</td>
                        <td>{{ $state->cities->count() }}</td>
                        <td>{{ $state->country->name }}</td>
                        <td>{{ $state->status() }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.states.edit', $state->id) }}" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void(0);" onclick="if (confirm('是否確認要刪除該筆資料')) { document.getElementById('delete-states-{{ $state->id }}').submit(); } else { return false; }" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                            <form action="{{ route('admin.states.destroy', $state->id) }}" method="post" id="delete-states-{{ $state->id }}" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No states found</td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">
                            <div class="float-right">
                                {!! $states->appends(request()->all())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection
