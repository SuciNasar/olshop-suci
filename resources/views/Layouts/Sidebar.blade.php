<!--begin::Sidebar-->
<aside class="app-sidebar bg-dark shadow-lg" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand p-3 d-flex align-items-center bg-dark text-white shadow-sm">
        <!--begin::Brand Link-->
        <a href="./index.html" class="brand-link d-flex align-items-center text-decoration-none text-white">
            <!--begin::Brand Text-->
            <span class="brand-text fw-bold fs-5 text-uppercase">Admin Olshop</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper mt-4">
        <nav>
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" role="menu">
                <!-- Menu Header -->
                <li class="nav-item">
                    <a href="{{ url('daftar_jualan.index') }}" class="nav-link text-light py-3 px-4 rounded hover-bg-light">
                        <i class="fa-solid fa-bed me-3 fs-5 text-primary"></i>
                        <span class="m-0">Daftar barang</span>
                    </a>
                </li>
                <!-- Data Transaksi -->
                <li class="nav-item">
                    <a href="{{ url('transaksi.transaksi') }}" class="nav-link text-light py-3 px-4 rounded hover-bg-light">
                        <i class="fa-solid fa-calendar-check me-3 fs-5 text-danger"></i>
                        <span class="m-0">Transaksi pelanggan</span>
                    </a>
                </li>
                <!-- Add more menu items as needed -->
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
