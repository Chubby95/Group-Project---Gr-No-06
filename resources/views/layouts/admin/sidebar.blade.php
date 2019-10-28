<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ _('AD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ _('Admin DashBoard') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug=='admin' ) class="active " @endif>
                <a href="{{ route('admin') }}">
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
            <li @if ($pageSlug=='admin.profile' ) class="active " @endif>
                <a href="{{ route('profile.edit')  }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ _('User Profile') }}</p>
                </a>
            </li>
            <li @if ($pageSlug=='admin.users' ) class="active " @endif>
                <a href="{{ route('user.index')  }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ _('User Management') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>