<x-empty-layout>
    <x-slot name="title">Services</x-slot>

    <section>
        <div class="container mt-5">
            <div class="logo">
                {{-- <img src="{{ asset('images/logos/logo_with_name.svg') }}" class="h-100" alt=""> --}}
            <h1>City Diagnostic Center</h1>
            </div>
    
            <div class="mt-3">
                <h4 class="main-title">Select your Services</h4>
                <p><small>More <strong>services</strong> and <strong>features</strong> are available. Listed services down below are visible because of your app <strong>package</strong>, <strong>role</strong> and <strong>privilege</strong>.<br> Oh, one more thing, an admin can <strong>change</strong> your <strong>access privileges</strong>.</small></p>
            </div>
    
            <div class="service-wrapper">
                <div class="row g-4 mb-4">
                    <!-- Reception-->
                    <div class="col-xl-2 col-lg-3 col-md-4">
                        <a href="{{ route('dashboard.index') }}" class="service">
                            <i class="bi bi-person-video3"></i>
                            <h5>Reception</h5>
                            <p class="mt-1">All the functionality available in this section.</p>
                        </a>
                    </div>
                    
                    <!-- Accounting -->
                    <div class="col-xl-2 col-lg-3 col-md-4">
                        <a href="{{ route('accounting') }}" class="service">
                            <i class="bi bi-wallet2"></i>
                            <h5>Accounting</h5>
                            <p class="mt-1">All the functionality available in this section.</p>
                        </a>
                    </div>

                     <!-- LAB -->
                    <div class="col-xl-2 col-lg-3 col-md-4">
                        <a href="{{ route('lab.index') }}" class="service">
                            <i class="bi bi-clipboard2-pulse"></i>
                            <h5>LAB</h5>
                            <p class="mt-1">All the functionality available in this section.</p>
                        </a>
                    </div>

                    <!-- Admin -->
                    <div class="col-xl-2 col-lg-3 col-md-4">
                        <a href="#" class="service">
                            <i class="bi bi-person-square"></i>
                            <h5>Admin</h5>
                            <p class="mt-1">All the functionality available in this section.</p>
                        </a>
                    </div>
                </div>
    
                <div class="row g-4 mb-4">
                    <!-- role & policy -->
                    <div class="col-xl-2 col-lg-3 col-md-4">
                        <a href="#" class="service">
                            <i class="bi bi-envelope"></i>
                            <h5>SMS</h5>
                            <p class="mt-1">Broadcast & Short Message Service</p>
                        </a>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4">
                        <a href="#" class="service">
                            <i class="bi bi-shield-lock"></i>
                            <h5>Role&Policy</h5>
                            <p class="mt-1">Role, Policy and implement to User</p>
                        </a>
                    </div>
    
                    {{-- developer --}}
                    <div class="col-xl-2 col-lg-3 col-md-4">
                        <a href="#" class="service">
                            <i class="bi bi-code-square"></i>
                            <h5>Developer</h5>
                            <p class="mt-1">Configurations & Developer Tools</p>
                        </a>
                    </div>
    
                    <!-- sign out -->
                    <div class="col-xl-2 col-lg-3 col-md-4">
                        <a href="#" class="service" onclick="document.getElementById('logout-form').submit(); return false;">
                            <i class="bi bi-box-arrow-right"></i>
                            <h5>Sign Out</h5>
                            <p class="mt-1">We monitor your access privilege</p>
                        </a>
    
                        <form action="{{ route('logout') }}" method="POST" id="logout-form">
                            @csrf
                        </form>
                    </div>  
                </div>
            </div>

            <div class="mt-3">
                <small>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</small>
            </div>
        </div>
    </section>
</x-empty-layout>
