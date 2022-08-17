    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="{{asset('template/admin/img/logo/begal.png')}}" alt="" /></a>
                <strong><a href="index.html"><img src="{{asset('template/admin/img/logo/begalsn.png')}}" alt="" /></a></strong>
                <hr>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a title="Landing Page" href="{{route('admin.dashboard')}}" aria-expanded="false"><span class="educate-icon educate-home icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Dashboard</span></a>
                        </li>
                        <li>
                            <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span class="educate-icon educate-event icon-wrap"></span> <span class="mini-click-non">Data Master</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Professors" href="{{route('kategori')}}"><span class="mini-sub-pro">Kategori Kasus</span></a></li>
                                <li><a title="Add Professor" href="{{route('Jalan')}}"><span class="mini-sub-pro">Jalan</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a title="Landing Page" href="{{route('Kasus')}}" aria-expanded="false"><span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Kasus</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
