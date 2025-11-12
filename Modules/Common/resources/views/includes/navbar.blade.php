@php $route = request()->route()->getName(); @endphp
<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top shadow-sm ">
    <div class="container">
        <a class="navbar-brand fw-bolder " href="{{ route('index') }}">
            <img src="{{ asset('assets/images/logo.webp') }}" alt="IAM-SHIMB Logo" class="navbar-logo" width="50"
                height="50">
            <span class="ms-2">IAM-SHIMB</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-3 mt-3 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link ps-2 {{ $route == 'index' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ps-2 {{ $route == 'about' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ps-2 {{ $route == 'project' ? 'active' : '' }}" aria-current="page"
                        href="#">Project</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
