@extends('layouts.app', ['class' => 'register-page', 'page' => _('Register Page'), 'contentClass' => 'register-page'])

@section('content')
<div class="row">
    <div class="col-md-5 ml-auto">
        <div class="info-area info-horizontal mt-5">
            <div class="icon icon-warning">
                <i class="tim-icons icon-wifi"></i>
            </div>
            <div class="description">
                <h3 class="info-title">{{ _('Online') }}</h3>
                <p class="description">
                    {{ _('Keep In Touch') }}
                </p>
            </div>
        </div>
        <div class="info-area info-horizontal">
            <div class="icon icon-primary">
                <i class="tim-icons icon-triangle-right-17"></i>
            </div>
            <div class="description">
                <h3 class="info-title">{{ _('Reduce waiting time') }}</h3>
                <p class="description">
                    {{ _('Manage your Profile and reduce time') }}
                </p>
            </div>
        </div>
        <div class="info-area info-horizontal">
            <div class="icon icon-info">
                <i class="tim-icons icon-trophy"></i>
            </div>
            <div class="description">
                <h3 class="info-title">{{ _('Built Audience') }}</h3>
                <p class="description">
                    {{ _('Apply you all aplications online') }}
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-7 mr-auto">
        <form class="form" method="post" action="{{ route('register') }}">
            @csrf
            <div class="card card-register card-white">
                <div class="card-header">
                    <img class="card-img" src="{{ asset('img/card-primary.png') }}" alt="Card image">
                    <h4 class="card-title">{{ _('Register') }}</h4>
                </div>
                <div class="card-body">
                    <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                            </div>
                        </div>
                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Name') }}" value="{{ old('name') }}">
                        @include('alerts.feedback', ['field' => 'name'])
                    </div>
                    <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Email') }}" value="{{ old('email') }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                    <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-lock-circle"></i>
                            </div>
                        </div>
                        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ _('Password') }}">
                        @include('alerts.feedback', ['field' => 'password'])
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-lock-circle"></i>
                            </div>
                        </div>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="{{ _('Confirm Password') }}">
                    </div>
                    <div class="form-check text-left {{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label class="form-check-label">
                            <input class="form-check-input {{ $errors->has('agree_terms_and_conditions') ? ' is-invalid' : '' }}" name="agree_terms_and_conditions" type="checkbox" {{ old('agree_terms_and_conditions') ? 'checked' : '' }}>
                            <span class="form-check-sign"></span>
                            {{ _('I agree to the') }}
                            <a href="#">{{ _('terms and conditions') }}</a>.
                            @include('alerts.feedback', ['field' => 'agree_terms_and_conditions'])
                        </label>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-round btn-lg">{{ _('Get Started') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection