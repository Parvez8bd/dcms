<div class="print-none">
    <ul class="mt-2 nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'account.index') ? 'active' : '' }}" href="{{ route('account.index') }}">All Records</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'account.create') ? 'active' : '' }}" href="{{ route('account.create') }}">New Entry</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'account.trash') ? 'active' : '' }}" href="{{ route('account.trash') }}">Recycle Bin</a>
        </li>
    </ul>
</div>
