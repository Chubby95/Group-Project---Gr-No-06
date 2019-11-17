@extends('layouts.clark.app')

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12  order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Add New Subject') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('subjects.index') }}" class="btn btn-sm btn-primary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('subjects.store') }}" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="heading-small text-muted mb-4">{{ __('Department') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('department_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="select-user-department">{{ __('Department') }}</label>
                                        <select name="department_id" id="select-user-department" class="form-control form-control-alternative" required>
                                            @foreach ($departments as $department)
                                            <option value="{{ $department['id'] }}">{{ $department["department_name"] }}</option>
                                            @endforeach
                                        </select>
                                        @include('alerts.feedback', ['field' => 'department_id'])
                                    </div>
                                </div>
                                <h6 class="heading-small text-muted mb-4">{{ __('subject information') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('Title') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                        <input type="text" name="Title" id="input-Title" class="form-control form-control-alternative{{ $errors->has('Title') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('Title') }}" required autofocus>
                                        @include('alerts.feedback', ['field' => 'Title'])
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection