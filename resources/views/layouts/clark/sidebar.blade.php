<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ _('DCD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ _('Dean Office Clark DashBoard') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug=='clark.dashboard' ) class="active " @endif>
                <a href="{{ route('clark/dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>
            <!-- <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel"></i>
                    <span class="nav-link-text">{{ __('Laravel Examples') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        
                    </ul>
                </div>
            </li> -->
            <li @if ($pageSlug=='clark.departments' ) class="active " @endif>
                <a href="{{ route('departments.index')  }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ _('Departments') }}</p>
                </a>
            </li>
            <li @if ($pageSlug=='clark.lectures' ) class="active " @endif>
                <a href="{{ route('lectures.index')  }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ _('Lectures') }}</p>
                </a>
            </li>
            <li @if ($pageSlug=='clark.subjects' ) class="active " @endif>
                <a href="{{ route('subjects.index')  }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ _('subjects') }}</p>
                </a>
            </li>
            <li @if ($pageSlug=='clark.courses' ) class="active " @endif>
                <a href="{{ route('courses.index')  }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ _('Courses') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>