<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ _('SD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ _('Student Dashboard') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug=='student.dashboard' ) class="active " @endif>
                <a href="{{ route('dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>
            <li @if ($pageSlug=='student.form.renew' ) class="active " @endif>
                <a href="{{ route('dashboard/form/renew') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Renewal Of Registration') }}</p>
                </a>
            </li>
            <li @if ($pageSlug=='student.form.confirmation' ) class="active " @endif>
                <a href="{{ route('dashboard/form/confirmation') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Confirmation Of Studentship') }}</p>
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
                        <li @if ($pageSlug=='student.profile' ) class="active " @endif>
                            <a href="{{ route('dashboard.profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('Student Profile') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>