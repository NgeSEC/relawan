<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header text-center">MENU</li>
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a href="/">
                    <i class="fa fa-dashboard"></i> <span>Home</span>

                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>