<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
            </div>
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            {{ __('Welcome Back!') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'kelas' ? 'active' : '' }}">
                <a href="{{ route('kelas.index') }}">
                    <i class="nc-icon nc-layout-11"></i>
                    <p>{{ __('Kelas') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'mapel' ? 'active' : '' }}">
                <a href="{{ route('mapel.index') }}">
                    <i class="nc-icon nc-layout-11"></i>
                    <p>{{ __('Mata Pelajaran') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>