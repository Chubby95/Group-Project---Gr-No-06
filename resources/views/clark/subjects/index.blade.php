@extends('layouts.clark.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">{{ __('subjects') }}</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('subjects.create') }}" class="btn btn-sm btn-primary">{{ __('Add subject') }}</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('alerts.success')

                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <th scope="col">{{ __('subject Name') }}</th>
                            <th scope="col">{{ __('Department') }}</th>
                            <th scope="col">{{ __('Creation Date') }}</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            @foreach ($subjects as $subject)
                            <tr>
                                <td>{{ $subject->Title }}</td>
                                <td>{{ $subject->departments->department_name }}</td>
                                <td>{{ $subject->created_at->format('d/m/Y H:i') }}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <form action="{{ route('subjects.destroy', $subject) }}" method="post">
                                                @csrf
                                                <!-- @method('delete') -->

                                                <a class="dropdown-item" href="{{ route('subjects.edit', $subject) }}">{{ __('Edit') }}</a>
                                                <!-- <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Delete') }}
                                                </button> -->
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">
                    {{ $subjects->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection