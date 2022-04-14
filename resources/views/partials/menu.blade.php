<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('gestao_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/juntas-freguesia*") ? "c-show" : "" }} {{ request()->is("admin/grupos*") ? "c-show" : "" }} {{ request()->is("admin/equipas*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-hand-paper c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.gestao.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('juntas_freguesium_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.juntas-freguesia.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/juntas-freguesia") || request()->is("admin/juntas-freguesia/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-home c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.juntasFreguesium.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('grupo_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.grupos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/grupos") || request()->is("admin/grupos/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.grupo.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('equipa_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.equipas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/equipas") || request()->is("admin/equipas/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.equipa.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('atividade_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/actividadejfs*") ? "c-show" : "" }} {{ request()->is("admin/atividadeparticipantes*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-chart-line c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.atividade.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('actividadejf_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.actividadejfs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/actividadejfs") || request()->is("admin/actividadejfs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.actividadejf.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('atividadeparticipante_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.atividadeparticipantes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/atividadeparticipantes") || request()->is("admin/atividadeparticipantes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.atividadeparticipante.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>