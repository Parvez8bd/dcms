<div class="print-none">
    <ul class="mt-2 nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'commission.index') ? 'active' : '' }}" href="{{ route('commission.index') }}">All Records</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'commission.create') ? 'active' : '' }}" href="{{ route('commission.create') }}">New Entry</a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'commission.trash') ? 'active' : '' }}" href="{{ route('sale.trash') }}">Recycle Bin</a>
        </li> --}}
    </ul>
</div>
