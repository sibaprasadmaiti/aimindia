<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html">PRODIGY</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            {{-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> --}}
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item" href="/admin/setting">Settings
                    </a>
                </li>
                {{-- <li><a class="dropdown-item" href="#!">Activity Log</a></li> --}}
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="logout">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="/admin/dashboard">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>

                    <a class="nav-link" href="/admin/banner-management">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Banner Management
                    </a>
                    <a class="nav-link" href="/admin/on-mouce-hover-management">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        On Mouce Hover Management
                    </a>
                    <a class="nav-link" href="/admin/form-management">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Form Management
                    </a>
                    <a class="nav-link" href="/admin/page-content-management">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                       Page Content Management
                    </a>
                    <a class="nav-link" href="/admin/design-center-cms">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Design Center Page CMS
                    </a>
                    {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#cmspages" aria-expanded="false" aria-controls="cmspages">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        CMS Pages
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="cmspages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/admin/about-us">About Us</a>
                            <a class="nav-link" href="/admin/home-page-footer-cms">Home Page Footer CMS</a>
                            <a class="nav-link" href="/admin/design-center-cms">Design Center Page CMS</a>
                        </nav>
                    </div> --}}

                    <a class="nav-link" href="/admin/service-management">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Service Management
                    </a>
                    {{-- <a class="nav-link" href="/admin/calculator-page-cms">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Calculator Page CMS
                    </a> --}}
                    {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#service" aria-expanded="false" aria-controls="service">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Services
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="service" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/admin/add-services-categories">Add Services Categories</a>
                            <a class="nav-link" href="/admin/add-services">Add Services</a>
                        </nav>
                    </div> --}}
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                PRODIGY Admin
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
