<div class="print-none">
    <ul class="mt-2 nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'sale.index') ? 'active' : '' }}" href="{{ route('sale.index') }}">All Records</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'sale.create') ? 'active' : '' }}" href="{{ route('sale.create') }}">New Entry</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'sale.trash') ? 'active' : '' }}" href="{{ route('sale.trash') }}">Recycle Bin</a>
        </li>
    </ul>
</div>
