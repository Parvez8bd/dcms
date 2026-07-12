<div class="print-none">
    <ul class="mt-2 nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'investment.index') ? 'active' : '' }}" href="{{ route('investment.index') }}">All Records</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'investment.create') ? 'active' : '' }}" href="{{ route('investment.create') }}">New Entry</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'investment.trash') ? 'active' : '' }}" href="{{ route('investment.trash') }}">Recycle Bin</a>
        </li>
    </ul>
</div>
