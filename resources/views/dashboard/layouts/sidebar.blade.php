    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <a href="index.html"><img src="" alt="SIARAT DEREN" srcset=""></a>
                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>

                    <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : ''}} ">
                        <a href="/dashboard" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::is('dashboard/arsip') ? 'active' : ''}} ">
                        <a href="/dashboard/arsip" class='sidebar-link'>
                            <i class="iconly-boldPaper"></i>
                            <span>Arsip Surat</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::is('dashboard/kategori-arsip') ? 'active' : ''}}">
                        <a href="/dashboard/kategori-arsip" class='sidebar-link'>
                            <i class="iconly-boldPaper"></i>
                            <span>Kategori Surat</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::is('dashboard/about') ? 'active' : ''}}">
                        <a href="/dashboard/about" class='sidebar-link'>
                            <i class="iconly-boldInfo-Circle"></i>
                            <span>About</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Account</li>
                    <li class="sidebar-item ">
                        <form action="/logout" method="post">
                            @csrf
                            <button class='sidebar-link' type='submit'>
                                <i class="iconly-boldLogout"></i>
                                <span>Logout</span>
                            </button>
                        </form>

                    </li>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>
