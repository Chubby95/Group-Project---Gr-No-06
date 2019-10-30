<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ _('HodD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ _('Head Of Department Dashboard') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug=='hod.dashboard' ) class="active " @endif>
                <a href="{{ route('hod/dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#Settings" aria-expanded="true">
                    <i class="fab fa-laravel"></i>
                    <span class="nav-link-text">{{ __('Settings') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="Settings">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug=='hod.profile' ) class="active " @endif>
                            <a href="{{ route('hod.profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('User Profile') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>