<!-- sidebar -->
<aside class="page-aside" data-routeName="{{ \Request::route()->getName() }}">
    <!-- accordion menu -->

    <!-- aside brand -->
    <div class="aside-brand">
        <h5>{{ preg_replace('/[^A-Za-z0-9\-]/', '', \Request::route()->getPrefix()) }}</h5>
        
        {{-- <a href="#">
            <img src="{{ asset('images/logos/logo_with_name.svg') }}" alt="logo">
            <span>{{ preg_replace('/[^A-Za-z0-9\-]/', '', \Request::route()->getPrefix()) }}</span>
        </a> --}}
    </div>
    <!-- End aside-brand -->

    {{-- dashboard aside start --}}
    @if(\Request::route()->getPrefix() == '/reception')
        @include('layouts.partials.aside.reception')
    @endif
    {{-- dashboard aside end --}}
    @if(\Request::route()->getPrefix() == '/lab')
        @include('layouts.partials.aside.lab')
    @endif
    {{-- dashboard aside end --}}

    {{-- dashboard aside start --}}
    @if(\Request::route()->getPrefix() == '/accounting')
        @include('layouts.partials.aside.accounting')
    @endif
    {{-- dashboard aside end --}}

    {{-- Role-Policy aside start --}}
    @if(\Request::route()->getPrefix() == 'role-policy')
        @include('layouts.partials.aside.rolePolicy')
    @endif
    {{-- Role-Policy aside end --}}

    {{-- developer aside start --}}
    @if(\Request::route()->getPrefix() == 'developer')
        @include('layouts.partials.aside.developer')
    @endif
    {{-- developer aside end --}}
</aside>
<!-- End sidebar -->

<!-- page-aside-layer -->
<div class="page-aside-layer"></div>
