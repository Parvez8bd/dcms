<div class="print-none">
    <ul class="mt-2 nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'fine.index') ? 'active' : '' }}" href="{{ route('fine.index') }}">All Records</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'fine.create') ? 'active' : '' }}" href="{{ route('fine.create') }}">New Entry</a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'installment.trash') ? 'active' : '' }}" href="{{ route('sale.trash') }}">Recycle Bin</a>
        </li> --}}
    </ul>
</div>
