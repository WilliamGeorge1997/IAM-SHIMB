@php $route = request()->route()->getName(); @endphp
<nav class="navbar navbar-expand-lg custom-navbar sticky-top">
    <div class="container">
        <a class="navbar-brand custom-navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('assets/images/logo.webp') }}" alt="IAM-SHIMB Logo" class="navbar-logo" width="50"
                height="50">
            <span class="ms-2 brand-text">IAM-SHIMB</span>
        </a>
        <button class="navbar-toggler custom-navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-2 mt-3 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link custom-nav-link {{ $route == 'index' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('index') }}">
                        <i class="bi bi-house-door me-1"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-nav-link {{ $route == 'about' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('about') }}">
                        <i class="bi bi-info-circle me-1"></i>About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-custom-navbar" href="{{ route('mega-buildings.index') }}">
                        <i class="bi bi-play-circle me-1"></i>Start Assessment
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
