<div class="print-none">
    <ul class="mt-2 nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'profit-distribution.index') ? 'active' : '' }}" href="{{ route('profit-distribution.index') }}">All Records</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'profit-distribution.create') ? 'active' : '' }}" href="{{ route('profit-distribution.create') }}">New Entry</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'profit-distribution.trash') ? 'active' : '' }}" href="{{ route('profit-distribution.trash') }}">Recycle Bin</a>
        </li>
    </ul>
</div>
