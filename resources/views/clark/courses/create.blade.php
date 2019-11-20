@extends('layouts.clark.app')

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12  order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Add New Course') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('courses.index') }}" class="btn btn-sm btn-primary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('courses.store') }}" autocomplete="off">
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
                                    <div class="form-group{{ $errors->has('lecture_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="select-user-lecture">{{ __('Lectures') }}</label>
                                        <select name="lecture_id" id="select-user-lecture" class="form-control form-control-alternative" required>
                                            @foreach ($lectures as $lecture)
                                            <option value="{{ $lecture['id'] }}">{{ $lecture["lecture_name"] }}</option>
                                            @endforeach
                                        </select>
                                        @include('alerts.feedback', ['field' => 'lecture_id'])
                                    </div>
                                    <div class="form-group{{ $errors->has('subject_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="select-user-subject">{{ __('subjects') }}</label>
                                        <select name="subject_id" id="select-user-subject" class="form-control form-control-alternative" required>
                                            @foreach ($subjects as $subject)
                                            <option value="{{ $subject['id'] }}">{{ $subject["Title"] }}</option>
                                            @endforeach
                                        </select>
                                        @include('alerts.feedback', ['field' => 'subject_id'])
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="heading-small text-muted mb-4">{{ __('Course information') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('course_name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Course Name') }}</label>
                                        <input type="text" name="course_name" id="input-course_name" class="form-control form-control-alternative{{ $errors->has('course_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Course Name') }}" value="{{ old('course_name') }}" required autofocus>
                                        @include('alerts.feedback', ['field' => 'course_name'])
                                    </div>
                                </div>
                                <div class="pl-lg-4">                                    
                                    <div class="form-group{{ $errors->has('level') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="level">{{ __('Student Styding Level') }}</label>
                                        <select name="level" id="level" class="form-control form-control-alternative" required>
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
                                        @include('alerts.feedback', ['field' => 'level'])
                                    </div>
                                </div>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('credit') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Credits for course') }}</label>
                                        <input type="text" name="credit" id="input-credit" class="form-control form-control-alternative{{ $errors->has('credit') ? ' is-invalid' : '' }}" placeholder="{{ __('Credits for course') }}" value="{{ old('credit') }}" required autofocus>
                                        @include('alerts.feedback', ['field' => 'credit'])
                                    </div>
                                </div>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('course_code') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Course Code') }}</label>
                                        <input type="text" name="course_code" id="input-course_code" class="form-control form-control-alternative{{ $errors->has('course_code') ? ' is-invalid' : '' }}" placeholder="{{ __('Course Code') }}" value="{{ old('course_code') }}" required autofocus>
                                        @include('alerts.feedback', ['field' => 'course_code'])
                                    </div>
                                </div>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('course_code') ? ' has-danger' : '' }}">
                                        <label class="form-control-label">{{ __('Course Type') }}</label>
                                        <div class="pl-lg-4">
                                            <label class="form-check-label">
                                                <input class="form-check-input {{ $errors->has('theory') ? ' is-invalid' : '' }}" name="theory" type="checkbox" {{ old('theory') ? 'checked' : '' }}>
                                                <span class="form-check-sign"></span>
                                                {{ _('Theory') }}
                                                @include('alerts.feedback', ['field' => 'theory'])
                                            </label>
                                        </div>
                                        <div class="pl-lg-4">
                                            <label class="form-check-label">
                                                <input class="form-check-input {{ $errors->has('practical') ? ' is-invalid' : '' }}" name="practical" type="checkbox" {{ old('practical') ? 'checked' : '' }}>
                                                <span class="form-check-sign"></span>
                                                {{ _('Practical') }}
                                                @include('alerts.feedback', ['field' => 'practical'])
                                            </label>
                                        </div>
                                        <div class="pl-lg-4">
                                            <label class="form-check-label">
                                                <input class="form-check-input {{ $errors->has('group_project') ? ' is-invalid' : '' }}" name="group_project" type="checkbox" {{ old('group_project') ? 'checked' : '' }}>
                                                <span class="form-check-sign"></span>
                                                {{ _('group_project') }}
                                                @include('alerts.feedback', ['field' => 'group_project'])
                                            </label>
                                        </div>
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