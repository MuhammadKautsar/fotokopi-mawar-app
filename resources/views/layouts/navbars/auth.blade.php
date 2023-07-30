<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a class="simple-text logo-mini">
        </a>
        <a class="simple-text logo-normal">
            {{ __('Fotokopi Mawar') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="nc-icon nc-shop"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'produk' ? 'active' : '' }}">
                <a href="{{ route('produk') }}">
                    <i class="nc-icon nc-single-copy-04"></i>
                    <p>{{ __('Produk') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'pembelian' ? 'active' : '' }}">
                <a href="{{ route('pembelian') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>{{ __('Pembelian') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'penjualan' ? 'active' : '' }}">
                <a href="{{ route('penjualan') }}">
                    <i class="nc-icon nc-money-coins"></i>
                    <p>{{ __('Penjualan') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
