<div class="print-none">
    <ul class="mt-2 nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'diposit.index') ? 'active' : '' }}" href="{{ route('diposit.index') }}">All Records</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'diposit.create') ? 'active' : '' }}" href="{{ route('diposit.create') }}">New Entry</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'diposit.trash') ? 'active' : '' }}" href="{{ route('diposit.trash') }}">Recycle Bin</a>
        </li>
    </ul>
</div>
