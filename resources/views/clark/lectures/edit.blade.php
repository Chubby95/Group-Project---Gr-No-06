@extends('layouts.clark.app')

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12  order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Edit lecture') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('lectures.index') }}" class="btn btn-sm btn-primary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('lectures.update', $lecture) }}" autocomplete="off">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="heading-small text-muted mb-4">{{ __('lecture information') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('lecture_name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                        <input type="text" name="lecture_name" id="input-lecture_name" class="form-control form-control-alternative{{ $errors->has('lecture_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('lecture_name',$lecture->lecture_name) }}" required autofocus>
                                        @include('alerts.feedback', ['field' => 'lecture_name'])
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