<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header text-center">MENU</li>
            <li class="{{ Request::is('admin.home') ? 'active' : '' }}">
                <a href="{{ route('admin.home') }}">
                    <i class="fa fa-dashboard"></i> <span>Home</span>

                </a>
            </li>
            <li class="{{ Request::is('admin/posko*') ? 'active' : '' }}">
                <a href="{{route('admin.references.posko.index')}}">
                    <i class="fa fa-hotel"></i> <span>Posko</span>

                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>