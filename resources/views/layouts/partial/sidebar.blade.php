<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ url($settingItem->path_logo) }}" alt="logo.png" style="width: 30px;">
            </span>
            <span class="demo menu-text fw-bolder ms-2"
                style="font-size: 23px;">{{ $settingItem->nama_perusahaan }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ $active === 'Dashboard' ? ' active' : '' }}">
            <a href="/dashboard" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-tachometer"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        @if (auth()->user()->role == 'admin')
            <!-- Master Data -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Master Data</span>
            </li>

            <li class="menu-item {{ $active === 'Produk' ? ' active' : '' }}">
                <a href="/produk" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-package"></i>
                    <div data-i18n="Analytics">Produk</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->role == 'admin')
            <li class="menu-item {{ $active === 'Supplier' ? ' active' : '' }}">
                <a href="/supplier" class="menu-link ">
                    <i class="menu-icon tf-icons bx bx-archive-in"></i>
                    <div data-i18n="Analytics">Supplier</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->role == 'admin')
            <li class="menu-item {{ $active === 'Kategori' ? ' active' : '' }}">
                <a href="/kategori" class="menu-link ">
                    <i class="menu-icon tf-icons bx bx-grid-alt"></i>
                    <div data-i18n="Analytics">Kategori</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->role == 'admin')
            <li class="menu-item {{ $active === 'Satuan' ? ' active' : '' }}">
                <a href="/satuan" class="menu-link ">
                    <i class="menu-icon tf-icons bx bx-customize"></i>
                    <div data-i18n="Analytics">Satuan</div>
                </a>
            </li>
        @endif


        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'kasir')
            {{-- @if (auth()->user()->role == 'admin' || auth()->user()->role == 'kasir' || auth()->user()->role == 'owner') --}}
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Transaksi</span>
            </li>

            <li class="menu-item {{ $active === 'Gudang' ? ' active' : '' }}">
                <a href="/gudang" class="menu-link ">
                    <i class="menu-icon tf-icons bx bx-cart-add"></i>
                    <div data-i18n="Account Settings">Transaksi Gudang</div>
                </a>
            </li>
            </li>

            <li class="menu-item {{ $active === 'TransaksiT' ? ' active' : '' }}">
                <a href="/transaksi" class="menu-link ">
                    <i class="menu-icon tf-icons bx bx-cart-download"></i>
                    <div data-i18n="Account Settings">Transaksi Toko</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'kasir' || auth()->user()->role == 'owner')
            <!-- Components -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Laporan</span></li>
            <!-- Cards -->
            <li class="menu-item {{ $active === 'Laporan' ? ' active' : '' }}">
                <a href="/laporan" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-book-bookmark"></i>
                    <div data-i18n="Analytics">Laporan</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'kasir' || auth()->user()->role == 'owner')
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Sistem</span></li>
            <li class="menu-item {{ $active === 'Users' ? ' active' : '' }} ">
                <a href="/users" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user-circle"></i>
                    <div data-i18n="Analytics">Users</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'kasir')
            <li class="menu-item {{ $active === 'Setting' ? ' active' : '' }}">
                <a href="/setting" class="menu-link ">
                    <i class="menu-icon tf-icons bx bx-cog"></i>
                    <div data-i18n="Analytics">Setting</div>
                </a>
            </li>
        @endif
    </ul>
    <br>

</aside>
