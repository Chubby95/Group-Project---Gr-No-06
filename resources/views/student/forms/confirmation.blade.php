@extends('layouts.student.app')

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-4  order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Student Confirmation Form') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('dashboard.confirmation.store') }}" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('full_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Full Name') }}</label>
                                    <input type="text" name="full_name" id="input-full_name" class="form-control form-control-alternative{{ $errors->has('full_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Full Name (IN BLOCK CAPITAL)') }}" value="{{ old('full_name') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'full_name'])
                                </div>
                                <div class="form-group{{ $errors->has('stu_register_no') ? ' has-danger' : '' }}">
                                    <label>{{ _('Student Registration No') }}</label>
                                    <input type="text" name="stu_register_no" class="form-control{{ $errors->has('stu_register_no') ? ' is-invalid' : '' }}" placeholder="{{ _('Student Registration No') }}" value="{{ old('stu_register_no') }}">
                                    @include('alerts.feedback', ['field' => 'stu_register_no'])
                                </div>
                                <div class="form-group{{ $errors->has('stu_mobile') ? ' has-danger' : '' }}">
                                    <label>{{ _('Student Mobile No') }}</label>
                                    <input type="text" name="stu_mobile" class="form-control{{ $errors->has('stu_mobile') ? ' is-invalid' : '' }}" placeholder="{{ _('Student Mobile No') }}" value="{{ old('stu_mobile') }}">
                                    @include('alerts.feedback', ['field' => 'stu_mobile'])
                                </div>
                                <div class="form-group{{ $errors->has('stu_styding_year') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="stu_styding_year">{{ __('Student Styding Level') }}</label>
                                    <select name="stu_styding_year" id="stu_styding_year" class="form-control form-control-alternative" required>
                                        <option value="">Select Level</option>
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
                                <div class="form-group{{ $errors->has('stu_subject_specification') ? ' has-danger' : '' }}">
                                    <label>{{ _('Subject of specification') }}</label>
                                    <input type="text" name="stu_subject_specification" class="form-control{{ $errors->has('stu_subject_specification') ? ' is-invalid' : '' }}" placeholder="{{ _('Subject of specification') }}" value="{{ old('stu_subject_specification') }}">
                                    @include('alerts.feedback', ['field' => 'stu_subject_specification'])
                                </div>
                                <div class="form-group{{ $errors->has('stu_address_perment') ? ' has-danger' : '' }}">
                                    <label>{{ _('Student Permenent Address') }}</label>
                                    <input type="text" name="stu_address_perment" class="form-control{{ $errors->has('stu_address_perment') ? ' is-invalid' : '' }}" placeholder="{{ _('Student Permenent Address') }}" value="{{ old('stu_address_perment') }}">
                                    @include('alerts.feedback', ['field' => 'stu_address_perment'])
                                </div>
                                <div class="form-group{{ $errors->has('stu_purpose') ? ' has-danger' : '' }}">
                                    <label>{{ _('Purpose') }}</label>
                                    <input type="text" name="stu_purpose" class="form-control{{ $errors->has('stu_purpose') ? ' is-invalid' : '' }}" placeholder="{{ _('Purpose') }}" value="{{ old('stu_purpose') }}">
                                    @include('alerts.feedback', ['field' => 'stu_purpose'])
                                </div>
                                <div class="form-group{{ $errors->has('stu_any_other_info') ? ' has-danger' : '' }}">
                                    <label>{{ _('Any Other Information') }}</label>
                                    <input type="text" name="stu_any_other_info" class="form-control{{ $errors->has('stu_any_other_info') ? ' is-invalid' : '' }}" placeholder="{{ _('Any Other Information') }}" value="{{ old('stu_any_other_info') }}">
                                    @include('alerts.feedback', ['field' => 'stu_any_other_info'])
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