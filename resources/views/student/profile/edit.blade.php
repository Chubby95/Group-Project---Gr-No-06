@extends('layouts.student.app', ['page' => __('User Profile'), 'pageSlug' => 'student.profile'])

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-user">
            <div class="card-body">
                <p class="card-text">
                    <div class="author">
                        <div class="block block-one"></div>
                        <div class="block block-two"></div>
                        <div class="block block-three"></div>
                        <div class="block block-four"></div>
                        <a href="#">
                            <img class="avatar" src="{{ asset('img/emilyz.jpg') }}" alt="">
                            <h5 class="title">{{ auth()->user()->name }}</h5>
                        </a>
                        <p class="description">
                            {{ _('Student') }}
                        </p>
                        <p class="description">
                            {{ _('Registration Number') }}
                        </p>
                        <p class="description">
                            {{ _('Index Number') }}
                        </p>
                        <p class="description">
                            {{ _('Address') }}
                        </p>
                    </div>
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <label>Departments</label>
                        <label>Fallowing Subjects</label>
                        <label>Fallowing Courses</label>
                        <label>Styding Level</label>
                    </div>
                    <div class="col-md-6">
                        <label>Gender</label>
                        <label>Address in Jaffna</label>
                        <label>Contact Details</label>
                        <label>Email</label>
                    </div>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ _('Password') }}</h5>
            </div>
            <form method="post" action="{{ route('dashboard.profile.password') }}" autocomplete="off">
                <div class="card-body">
                    @csrf
                    @method('put')

                    @include('alerts.success', ['key' => 'password_status'])

                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                        <label>{{ __('Current Password') }}</label>
                        <input type="password" name="old_password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>
                        @include('alerts.feedback', ['field' => 'old_password'])
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label>{{ __('New Password') }}</label>
                        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
                        @include('alerts.feedback', ['field' => 'password'])
                    </div>
                    <div class="form-group">
                        <label>{{ __('Confirm New Password') }}</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm New Password') }}" value="" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ _('Change password') }}</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ _('Edit Profile') }}</h5>
            </div>
            <form method="post" action="{{ route('dashboard.profile.update') }}" autocomplete="off">
                <div class="card-body">
                    @csrf
                    @method('put')

                    @include('alerts.success')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('stu_prefix') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="select-user-subject">{{ __('Gender') }}</label>
                                <select name="stu_prefix" id="select-user-subject" class="form-control form-control-alternative" required>
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Miss">Miss</option>
                                </select>
                                @include('alerts.feedback', ['field' => 'stu_prefix'])
                            </div>
                            <div class="form-group{{ $errors->has('stu_address_jaffna') ? ' has-danger' : '' }}">
                                <label>{{ _('Student Full Name') }}</label>
                                <input type="text" name="stu_full_name" class="form-control{{ $errors->has('stu_full_name') ? ' is-invalid' : '' }}" placeholder="{{ _('Student Full Name') }}" value="{{ old('stu_full_name', auth()->user()->stu_full_name) }}">
                                @include('alerts.feedback', ['field' => 'stu_full_name'])
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ _('Name') }}</label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label>{{ _('Email address') }}</label>
                                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Email address') }}" value="{{ old('email', auth()->user()->email) }}">
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('stu_address_jaffna') ? ' has-danger' : '' }}">
                                <label>{{ _('Student Address In Jaffna') }}</label>
                                <input type="text" name="stu_address_jaffna" class="form-control{{ $errors->has('stu_address_jaffna') ? ' is-invalid' : '' }}" placeholder="{{ _('Student Address In Jaffna') }}" value="{{ old('stu_address_jaffna', auth()->user()->stu_address_jaffna) }}">
                                @include('alerts.feedback', ['field' => 'stu_address_jaffna'])
                            </div>
                            <div class="form-group{{ $errors->has('stu_address_perment') ? ' has-danger' : '' }}">
                                <label>{{ _('Student Permenent Address') }}</label>
                                <input type="text" name="stu_address_perment" class="form-control{{ $errors->has('stu_address_perment') ? ' is-invalid' : '' }}" placeholder="{{ _('Student Permenent Address') }}" value="{{ old('stu_address_perment', auth()->user()->stu_address_perment) }}">
                                @include('alerts.feedback', ['field' => 'stu_address_perment'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('stu_gender') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="select-user-subject">{{ __('Gender') }}</label>
                                <select name="stu_gender" id="select-user-subject" class="form-control form-control-alternative" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                @include('alerts.feedback', ['field' => 'stu_gender'])
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('stu_mobile') ? ' has-danger' : '' }}">
                                <label>{{ _('Student Mobile No') }}</label>
                                <input type="text" name="stu_mobile" class="form-control{{ $errors->has('stu_mobile') ? ' is-invalid' : '' }}" placeholder="{{ _('Student Mobile No') }}" value="{{ old('stu_mobile', auth()->user()->stu_mobile) }}">
                                @include('alerts.feedback', ['field' => 'stu_mobile'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('stu_index_no') ? ' has-danger' : '' }}">
                                        <label>{{ _('Student Index No') }}</label>
                                        <input type="text" name="stu_index_no" class="form-control{{ $errors->has('stu_index_no') ? ' is-invalid' : '' }}" placeholder="{{ _('Student Index No') }}" value="{{ old('stu_index_no', auth()->user()->stu_index_no) }}">
                                        @include('alerts.feedback', ['field' => 'stu_index_no'])
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('stu_register_no') ? ' has-danger' : '' }}">
                                        <label>{{ _('Student Registration No') }}</label>
                                        <input type="text" name="stu_register_no" class="form-control{{ $errors->has('stu_register_no') ? ' is-invalid' : '' }}" placeholder="{{ _('Student Registration No') }}" value="{{ old('stu_register_no', auth()->user()->stu_register_no) }}">
                                        @include('alerts.feedback', ['field' => 'stu_register_no'])
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has('stu_styding_year') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="select-user-subject">{{ __('Student Styding Level') }}</label>
                                        <select name="stu_styding_year" id="select-user-subject" class="form-control form-control-alternative" required>
                                            <option value="1G">1G</option>
                                            <option value="2G">2G</option>
                                            <option value="3G">3G</option>
                                            <option value="3M">3M</option>
                                            <option value="4M">4M</option>
                                            <option value="1S">1S</option>
                                            <option value="2S">2S</option>
                                            <option value="3S">3S</option>
                                            <option value="4S">4S</option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'stu_styding_year'])
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection